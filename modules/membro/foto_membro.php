<?php
// CONEXAO
	$host  = "localhost";
	$user  = "root";
	$pass = "";
	$db    = "dbigreja";
	
	$con   = mysql_connect( $host, $user, $pass) or die('Não foi possível conectar: '.mysql_error());
	$sel   = mysql_select_db( $db, $con );
	
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
// FIM CONEXAO

if( isset( $_GET['id_membro'] ) ){
	
	$id_membro = $_GET['id_membro'];
	
	// Executa a query, trazendo a foto do banco
	$query = "SELECT id_membro, nome, foto FROM tb_membro WHERE ativo = 1 AND id_membro =". $id_membro;
	$resultado = mysql_query($query);
	
	//$tipo = mysql_result($resultado, 0, "tipo_foto_membro"); 
	$foto = mysql_result($resultado, 0, "foto"); 
	//header("Content-type: $tipo"); 
	print $foto;
	
}


?>