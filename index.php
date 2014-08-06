<?php require_once 'header.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Desenvolvido por: Sillas Leonardo 29/07/2014 -->
</head>

<body role="document">
<?php 
	if( isset( $_GET['mb'] ) && isset( $_GET['pg'] ) ){		
		switch( $_GET['mb'] ){
			case "membro":
				switch( $_GET['pg'] ){
					case "grid-cadastrar":
						require_once "modules/membro/grid-cadastrar.php";
						break;
					case "form-cadastrar":
						require_once "modules/membro/form-cadastrar.php";
						break;
					case "trata-form-cadastrar":
						require_once "modules/membro/trata-form-cadastrar.php";
						break;
				}
			default:
				require_once "index.php";
				break;
		}
	}
?>
    <?php require_once 'footer.php';?>

</body>
</html>
