<!DOCTYPE html>
<html>
<head>
	<title>Hai <?= $user['nama'];?></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://kit.fontawesome.com/8f37dd1c37.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/style.css')?>">
</head>
<body>
	<div class="container">

	    <div class="row no-gutters mt-3 mb-5">
	      <div class="col-10 col-sm-6 offset-1 offset-sm-3 text-center">
	        <div class="container-fluid" style="border-style: solid; border-width: 1.5px; background-color: white; border-radius: 5px;">
	          <h3 class="text-center my-4"><?= $user['nama'];?></h3>
	          <img src="<?= $user['gambar'];?>" class="img-fluid mt-3 mb-2" style="display: block; margin-left: auto; margin-right: auto;">
	          <p class="mb-5"><?= $user['email'];?></p>
	          <a href="<?=base_url('login/logout')?>" class="btn btn-danger mb-5">Logout</a>
	        </div>
	      </div>
	    </div>

	  </div>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>