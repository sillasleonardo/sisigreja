<?php include_once "class/class.php"; ?>
<?php $form	= new Form( 'form-login', 'POST', 'login.php'); ?>

<?php

if( isset( $_POST['btn-submit'] ) ){
	$login 	  = new Login();
	$login->logar( $_POST['login'], $_POST['password'] );
}
?>
<html lang="en"><head>
    <meta charset="utf-8">
    <title>SisIgreja - Controle de Membro</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="description">
    <meta content="" name="author">

    <!-- Le styles -->
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <style type="text/css">
        body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #f5f5f5;
        }

        .form-signin {
            max-width: 300px;
            padding: 19px 29px 29px;
            margin: 0 auto 20px;
            background-color: #fff;
            border: 1px solid #e5e5e5;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            -webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);
            box-shadow: 0 1px 2px rgba(0,0,0,.05);
        }
        .form-signin .form-signin-heading,
        .form-signin .checkbox {
            margin-bottom: 10px;
        }
        .form-signin input[type="text"],
        .form-signin input[type="password"] {
            font-size: 16px;
            height: auto;
            margin-bottom: 15px;
            padding: 7px 9px;
        }

    </style>
    <link rel="stylesheet" href="library/bootstrap-twitter/assets/css/bootstrap-responsive.css">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link href="assets/img/favicon.ico" rel="shortcut icon">
    <link href="assets/ico/apple-touch-icon-144-precomposed.png" sizes="144x144" rel="apple-touch-icon-precomposed">
    <link href="assets/ico/apple-touch-icon-114-precomposed.png" sizes="114x114" rel="apple-touch-icon-precomposed">
    <link href="assets/ico/apple-touch-icon-72-precomposed.png" sizes="72x72" rel="apple-touch-icon-precomposed">
    <link href="assets/ico/apple-touch-icon-57-precomposed.png" rel="apple-touch-icon-precomposed">
</head>

<body>

<div class="container">

    <form class="form-signin" name="<?php echo $form->getName(); ?>" id="<?php echo $form->getName(); ?>" method="<?php echo $form->getMethod(); ?>" action="<?php echo $form->getAction(); ?>">
        <h3 class="form-signin-heading">Por Favor Entre!</h3>
        <!--<input type="text" placeholder="Login" name="login" id="login" class="input-block-level"> -->
        <?php echo $form->formText( 'login', 'input-block-level', 'Login' ) ?>
        <!--<input type="password" placeholder="Password" name="password" id="password" class="input-block-level"> -->
        <?php echo $form->formPassword( 'password', 'input-block-level', 'Password' ) ?>
        <label class="checkbox">
            <input type="checkbox" value="remember-me"> Lembrar - me
        </label>
        <!--<button type="submit" class="btn btn-large btn-primary">Entrar</button> -->
        <?php echo $form->formSubmit( 'btn-submit', 'Entrar','btn btn-large btn-primary' ) ?>
    </form>
  
    <?php if( isset( $_GET['msg'] ) && $_GET['msg'] == 'error_login' ): ?>
  	<div id="msg-error-login"> Efetue o login. </div>
    <?php endif; ?>
    <?php if( isset( $_GET['msg'] ) && $_GET['msg'] == 'error' ): ?>
  	<div id="msg-error" align="center"> Login e/ou senha inválido(s). </div>
    <?php endif; ?>    
 
</div> <!-- /container -->

<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="library/jquery/jquery-1.11.1.min.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-transition.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-alert.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-modal.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-dropdown.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-scrollspy.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-tab.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-tooltip.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-popover.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-button.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-collapse.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-carousel.js"></script>
<script src="library/bootstrap-twitter/assets/js/bootstrap-typeahead.js"></script>



</body></html>