<?php 

require_once 'class/class.php';
$login = new Login();

if( isset( $_POST['btn-submit'] ) ){
	$logado = $login->logar( $_POST['login'], $_POST['password'] );
}
else{
	$login->verificaLogin( $_SESSION['logado'] );
}


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title> Sistema Igreja </title>
  <link rel="stylesheet" href="assets/css/mystyle.css" type="text/css" media="screen" />
  <link rel="icon" href="library/bootstrap-twitter/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="library/bootstrap-twitter/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme -->
    <link href="library/bootstrap-twitter/dist/css/bootstrap-theme.min.css" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="theme.css" rel="stylesheet">
    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <script src="library/bootstrap-twitter/assets/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="library/bootstrap-twitter/dist/js/bootstrap.min.js"></script>
    <script src="library/bootstrap-twitter/assets/js/docs.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="library/bootstrap-twitter/assets/js/ie10-viewport-bug-workaround.js"></script>
</head>
<body>

<div id="topo"> <!--  class="navbar-fixed-top" -->
	<div id="logo"> 
		<a href="index.php">
			<img src="assets/img/topo.png" title="Sistema Igreja" alt="Sistema Igreja" />
		</a>
	</div>
	<div id="ola-usuario">
		Olá <strong> <?php echo $_SESSION['nome'] ?> </strong>, Bem-Vindo a <span id="friz"> Área de Administração </span> do site "Sistema Igreja".
	</div>
	<div id="sair">
		<a href="sair.php"> <img src="assets/img/close.png" /> </a>
	</div>
	<div style="clear: both;"></div>
	
        
        <!-- Fixed navbar -->
        <div class="navbar  navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">Sistema Igreja</a>
                </div>
                <div class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="index.php">Início</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Membros <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="index.php?mb=membro&pg=grid-cadastrar">Cadastrar</a></li>
                                <li><a href="#">Listar</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!--/.nav-collapse -->
            </div>
        </div>
</div>