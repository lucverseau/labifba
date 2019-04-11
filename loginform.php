<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="user-scalable=no, width=device-width">
    <title>LabIFBA</title>
	<link href="resources/img/favicon.png" rel="shortcut icon" type="image/x-icon">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="resources/css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 767px)">
</head>
<body class="container-fluid">

	<div class="col-sm-11 text-center">
		<img src="resources/img/logifba.png" alt="IFBA Jacobina">
	</div>

	<h4 class="col-sm-11 text-center"><span class="lead">LabIFBA</span> - Sistema de Agendamento de Laboratórios de Informática</h4>


	<form method="post" action="resources/php/login.php" class="form-horizontal">
		<div class="form-group">
			<label for="inputLogin" class="col-sm-offset-2 col-sm-2 control-label">Login</label>
			<div class="col-sm-3">
				<input name="inputLogin" type="text" class="form-control" id="inputLogin" placeholder="Nome de usuário" required>
			</div>
		</div>
		<div class="form-group">
			<label for="inputSenha" class="col-sm-offset-2 col-sm-2 control-label">Senha</label>
			<div class="col-sm-3">
				<input name="inputSenha" type="password" class="form-control" id="inputSenha" placeholder="Digite sua senha" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-5 col-sm-10">
				<button type="submit" class="btn btn-default">Entrar</button>
			</div>
		</div>
		<?php if(isset($_GET["senha"]) && $_GET["senha"] == "false"){?>
			<div class="alert alert-danger col-sm-3 col-sm-offset-4 text-center"> Senha incorreta! </div> <?php } ?> <?php if(isset($_GET["u"]) && $_GET["u"] == "false"){?>
			<div class="alert alert-danger col-sm-3 col-sm-offset-4 text-center"> Usuário não existe! </div>
		<?php } ?>

	</form>
</body>
</html>