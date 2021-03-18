<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/8f37dd1c37.js" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container">

	    <div class="row no-gutters mt-3 mb-5">
	      <div class="col-10 col-sm-6 offset-1 offset-sm-3">
	        <div class="container-fluid" style="border-style: solid; border-width: 1.5px; background-color: white; border-radius: 5px;">
	          <h3 class="text-center my-4">LOGIN</h3>
	          <form class="mb-3 px-5" method="post" action="">
	          <?= $this->session->flashdata('message');?>
	            <div class="form-group">
	              <label for="email">Email</label>
	              <input type="text" class="form-control" id="email" name="email" placeholder="Masukkan email..." value="<?=set_value('email');?>">
	              <?=form_error('email','<small class="text-danger pl-1">','</small>');?>
	            </div>
	            <div class="form-group">
	              <label for="password">Password</label>
	              <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password...">
	              <?=form_error('password','<small class="text-danger pl-1">','</small>');?>
	            </div>
	            <button type="submit" class="btn btn-secondary col-6 col-sm-2 offset-3 offset-sm-5 my-4">Login</button>
	          </form>
	          <div class="col-10 col-sm-8 offset-1 offset-sm-2 text-center mb-5">
				<a href="<?= htmlspecialchars($loginURL);?>" class="btn btn-danger" style="align-items: center;">Buat Akun Menggunakan Google</a>
	          </div>
	        </div>
	      </div>
	    </div>

	  </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>