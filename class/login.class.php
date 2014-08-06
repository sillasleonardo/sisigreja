<?php

session_start();

class Login{

	public $login;
	public $password;
	public $msg = '';
	
	public function logar( $login, $password ){

		if( !empty( $login ) ){
			$this->login = $login;
		}
		else{
			$this->msg += '- Preencha o campo Login \n<br />';
		}
		
		if( !empty( $password ) ){
			$this->password = $password;
		}
		else{
			$this->msg += '- Preencha o campo Senha \n<br />';
		}
		
		if( $this->msg != '' ){
			return $this->msg;
		}
		else{
			
			$con = new Connect();
			
			$sql = "SELECT * FROM tb_usuario WHERE login = '". $con->anti_sql_injection( $this->login ) ."' AND senha = '". $con->anti_sql_injection( md5( $this->password ) ) ."' AND ativo = 1";

			$rs = $con->execQuery( $sql );
//echo '<pre>'; print_r( $sql ); exit;
			if( $con->numRows( $rs ) && $con->numRows( $rs )  > 0 ){
				
				$dados = $con->fetchAssoc($rs);
				
				$_SESSION['id_usuario'] = $dados['id_usuario'];
				$_SESSION['login'] 		= $dados['login'];
				$_SESSION['senha'] 		= $dados['senha'];
				$_SESSION['nome']		= $dados['nome'];
				$_SESSION['logado'] 	= true;
				
				echo "<script> window.location = 'index.php'; </script>";
				//header( "Location: index.php" );
				return true;
			}
			else{
				echo "<script>  window.location = 'login.php?msg=error';  </script>";
				//header( 'Location: login.php?msg=error' );
				return false;
			}
		}
		
	}
	
	public function verificaLogin( $logado ){

		if( isset( $logado ) ){
			if( $logado == true ){
				return true;
			}
		}
		else{
			echo "<script> window.location = 'login.php?msg=error_login'; </script>";
			//header( 'Location: login.php' );exit;
		}
		return "<script> window.location = 'sair.php'; </script>";
		//return header( 'Location: sair.php' );
	}

}