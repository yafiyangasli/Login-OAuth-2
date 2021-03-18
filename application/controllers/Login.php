<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library('form_validation');
		include_once APPPATH.'libraries/Google/Google_Client.php';
        include_once APPPATH.'libraries/Google/contrib/Google_Oauth2Service.php';
	}

	public function index(){
		if($this->session->userdata('email')!=NULL){
			redirect('login/view');
		}
		$googleappid = "268748558603-rvce2gsc681eg9ccs3kpb0bl6dv1ic3n.apps.googleusercontent.com"; 
		$googleappsecret = "3sDc_I7BDJVnPiKAHmF2yYBG"; 

		$redirectURL = "http://localhost/loginoauth/login/oauth"; 
		$googleClient = new Google_Client();
		$googleClient->setApplicationName('Login OAuth Yafi');
		$googleClient->setClientId($googleappid);
		$googleClient->setClientSecret($googleappsecret);
		$googleClient->setRedirectUri($redirectURL);

		$google_oauthV2 = new Google_Oauth2Service($googleClient);
		
		$loginURL="";
		$authUrl = $googleClient->createAuthUrl();
		$data['loginURL'] = filter_var($authUrl, FILTER_SANITIZE_URL);

		$this->form_validation->set_rules('email','Email','required|trim');
		$this->form_validation->set_rules('password','Password','required|trim');

		if($this->form_validation->run()==false){
			$this->load->view('login/index',$data);
		}else{
			$this->auth();
		}
	}

	public function oauth(){
		$googleappid = "268748558603-rvce2gsc681eg9ccs3kpb0bl6dv1ic3n.apps.googleusercontent.com"; 
		$googleappsecret = "3sDc_I7BDJVnPiKAHmF2yYBG"; 

		$redirectURL = "http://localhost/loginoauth/login/oauth"; 
		$googleClient = new Google_Client();
		$googleClient->setApplicationName('Login OAuth Yafi');
		$googleClient->setClientId($googleappid);
		$googleClient->setClientSecret($googleappsecret);
		$googleClient->setRedirectUri($redirectURL);

		$google_oauthV2 = new Google_Oauth2Service($googleClient);

		if(isset($_GET['code'])){
			$googleClient->authenticate($_GET['code']);
			$_SESSION['token'] = $googleClient->getAccessToken();
			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) {
			$googleClient->setAccessToken($_SESSION['token']);
		}


		if ($googleClient->getAccessToken()) {

			try {
				$gpUserProfile = $google_oauthV2->userinfo->get();
			}
			catch (\Exception $e) {
				echo 'Graph returned an error: ' . $e->getMessage();
				session_destroy();
				redirect('login');
				exit;
			}

			$data['user'] = $this->db->get_where('user', ['email' => $gpUserProfile['email']])->row_array();
			if($data['user'] != NULL){
				$email = ['username' => $data['user']['email']];
				$this->session->set_userdata($email);
				redirect('login/view');
			}
			
			$sessionIni = [
				'email' => $gpUserProfile['email'],
				'nama' => $gpUserProfile['given_name']." ".$gpUserProfile['family_name'],
				'gambar' => $gpUserProfile['picture']
			];

			$this->session->set_userdata($sessionIni);

			$this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]',[
			'min_length'=>'Password to short, please input more than 8 character'
		]);

			$this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]',['matches'=>'Password dont match']);

			if($this->form_validation->run()==false){
				$this->load->view('login/oauth');
			}else{
				$this->register();
			}
		} else {
			redirect('login');
		}
	}

	public function auth(){
		$id=$this->input->post('email');
		$password=$this->input->post('password');

		$user=$this->db->get_where('user',['email'=>$id])->row_array();

		if($user){
			$data=['username' => $user['email']];
			$this->session->set_userdata($data);
			redirect('login/view');
		}else{
			redirect('login');
		}
	}

	public function register(){
		$password=$this->input->post('password1');

		$data=[
			'email' => $this->session->userdata('email'),
			'nama' => $this->session->userdata('nama'),
			'password' => $password,
			'gambar' => $this->session->userdata('gambar')
		];

		$this->db->insert('user',$data);
		$sessionSekarang = ['username' => $this->session->userdata('email')];

		$this->session->unset_userdata('email');
		$this->session->unset_userdata('nama');
		$this->session->unset_userdata('gambar');

		$this->session->set_userdata($sessionSekarang);
		redirect('login/view');
	}

	public function view(){
		if($this->session->userdata('username')==NULL) {
			redirect('login');
		}
		$data['user']=$this->db->get_where('user',['email' => $this->session->userdata('username')])->row_array();
		$this->load->view('login/view',$data);
	}

	public function logout(){
		$this->session->unset_userdata('username');
		redirect('login');
	}

}
