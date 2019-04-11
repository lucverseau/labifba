<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, width=device-width">
	<title>LabIFBA</title>
    <link href="resources/img/favicon.png" rel="shortcut icon" type="image/x-icon">
	<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="resources/css/styles.css" rel="stylesheet" type="text/css" media="only screen and (min-width: 768px)">
    <link href="resources/css/mobile.css" rel="stylesheet" type="text/css" media="only screen and (max-width: 767px)">
	<script src="vendor/jquery/jquery-3.1.1.min.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/printThis-master/printThis.js"></script>
	<script src="resources/js/scripts.js"></script>
</head>

<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="?page=home">LabIFBA</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class="<?php echo ($_GET["page"] == "reservas" || $_GET["page"] == "home" ? "active" : ""); ?>"><a href="?page=reservas">Reservas</a></li>

				<?php if($_SESSION["perf"] > 0){ //0 representa protocolo ?>
					<li class="<?php echo ($_GET["page"] == "sched" ? "active" : ""); ?>"><a href="?page=sched">Consultar Horários</a></li>
					<li class="<?php echo ($_GET["page"] == "labs" ? "active" : ""); ?>"><a href="?page=labs">Laboratórios</a></li>
				<?php } ?>

				<?php if($_SESSION["perf"] > 1){ //1 representa usuário e 2 administrador ?>
					<li class="<?php echo ($_GET["page"] == "users" ? "active" : ""); ?>"><a href="?page=users">Usuários</a></li>
					<li class="<?php echo ($_GET["page"] == "afix" ? "active" : ""); ?>"><a href="?page=afix">Aulas Fixas</a></li>
					<li class="<?php echo ($_GET["page"] == "report" ? "active" : ""); ?>"><a href="?page=report">Gerar Relatório</a></li>
				<?php } ?>
			</ul>

			<ul class="nav navbar-nav navbar-right">
				<li class="<?php echo ($_GET["page"] == "change" ? "active" : ""); ?>" title="Alterar meus dados"><a href="?page=change"><span class="glyphicon glyphicon-user"></span></a></li>
				<li title="Sair"><a href="resources/php/sair.php"><span class="glyphicon glyphicon-off"></span></a></li>
			</ul>

			<p class="nav navbar-text navbar-right"><b><?php echo "Olá ".$_SESSION["Nome"]."!"; ?></b>&nbsp;&nbsp;&nbsp;</p>

		</div><!-- /.navbar-collapse -->
	</div><!-- /.container-fluid -->
</nav>

<main class="container-fluid">
	<?php
		if(isset($_GET["page"])){
			switch($_GET["page"]){
				case "accueil":
					include "resources/php/reservas.php";
					break;
				case "sched":
					include "resources/php/sched.php";
					break;
				case "reservas":
					include "resources/php/reservas.php";
					break;
				case "users":
					include "resources/php/users.php";
					break;
				case "labs":
					include "resources/php/labs.php";
					break;
				case "afix":
					include "resources/php/afix.php";
					break;
				case "report":
					include "resources/php/report.php";
					break;
				case "change":
					include "resources/php/change.php";
					break;
				default:
					include "resources/php/reservas.php";
					break;
			}

		}
	?>
</main>
</body>

</html>