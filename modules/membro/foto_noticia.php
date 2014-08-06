<?php
// CONEXAO
	$host  = "localhost";
	$user  = "root";
	$pass = "";
	$db    = "regularizouehseu";
	
	$con   = mysql_connect( $host, $user, $pass) or die('Não foi possível conectar: '.mysql_error());
	$sel   = mysql_select_db( $db, $con );
	
	mysql_query('SET character_set_connection=utf8');
	mysql_query('SET character_set_client=utf8');
	mysql_query('SET character_set_results=utf8');
// FIM CONEXAO

if( isset( $_GET['id_noticia'] ) ){
	
	$id_noticia = $_GET['id_noticia'];
	
	// Executa a query, trazendo a foto do banco
	$query = "SELECT id_noticia, tipo_foto_noticia, titulo, foto_noticia FROM tb_noticia WHERE ativo = 1 AND id_noticia =". $id_noticia;
	$resultado = mysql_query($query);
	
	$tipo = mysql_result($resultado, 0, "tipo_foto_noticia"); 
	$foto = mysql_result($resultado, 0, "foto_noticia"); 
	header("Content-type: $tipo"); 
	print $foto;
	
}


?>