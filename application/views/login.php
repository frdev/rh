
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Recursos Humanos - Harmonia Benefícios">
    <meta name="author" content="Ufirst">
    <link rel="icon" href="../../../../favicon.ico">
    <title>RH - Harmonia</title>
    <link href="<?=base_url('css/bootstrap.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('css/mdb.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('css/toastr.min.css')?>" rel="stylesheet">
    <link href="<?=base_url('css/all.min.css')?>" rel="stylesheet">
  </head>
<body>
<div data-controller="login" class="d-flex justify-content-center align-items-center bg-login" style="height: 100vh; width: 100vw">
	<div class="">
		<div class="card">
		  <div class="card-body px-5 py-4">
			<form action="" id="formSignIn" method="POST" class="text-center" style="color: #757575;">
			  <div class="md-form mt-5">
				<input type="text" id="usuario" name="usuario" class="form-control" required>
				<label for="usuario">Usuário</label>
			  </div>
			  <div class="md-form">
				<input type="password" id="senha" name="senha" class="form-control" required>
				<label for="senha">Senha</label>
			  </div>
			  <button class="btn btn-info btn-block my-4 waves-effect z-depth-0" type="submit">ENTRAR</button>
			</form>
		  </div>
		</div>
	</div>
</div>
<script type="text/javascript">var base_url = "<?=base_url()?>";</script>
<script type="text/javascript" src="<?=base_url('js/popper.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/jquery.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/toastr.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/bootstrap.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/mdb.min.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/app.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/controller.js')?>"></script>
<script type="text/javascript" src="<?=base_url('js/run.js')?>"></script>
</body>
</html>