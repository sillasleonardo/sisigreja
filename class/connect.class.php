<?php

define('DBHOST', 'localhost');    // Endereco do host do banco de dados
define('DBUSER', 'root');         // Usuario de conexao do banco de dados
define('DBPASS', '');            // Senha do usuario de banco de dados
define('DBNAME', 'dbigreja');    // Nome do banco de dados

/**
 * Classe de conexao com o banco de dados
 *
 * @author Desenvolvedor: Sillas Leonardo
 */
class Connect{
  
  /*
   * Funcao construtora que inicializa uma conexao com o banco de dados
   *  
   */
  public function __construct(){
    // Conectar no banco de dados
    mysql_connect(DBHOST, DBUSER, DBPASS) or die ('Erro ao conectar no banco: '. mysql_error());
    // Selecionar o banco 
    mysql_select_db(DBNAME);
    
    $this->execQuery('SET character_set_connection=utf8');
    $this->execQuery('SET character_set_client=utf8');
    $this->execQuery('SET character_set_results=utf8');
  }
  
  /*
   * Funcao que previne contra sql injection
   * 
   */
  
  public function anti_sql_injection( $valor ) {
	if (!is_numeric( $valor )) {
		 $valor = get_magic_quotes_gpc() ? stripslashes( $valor ): $valor ;
		 $valor = function_exists('mysql_real_escape_string') ? mysql_real_escape_string( $valor ) : mysql_escape_string( $valor );
	}
	return  $valor;
  }
  
  /*
   * Funcao que executa uma query SQL
   *  
   */
  public function execQuery($sql){
    return mysql_query($sql);
  }
  
  /*
   * Funcao busca os dados de uma query SQL
   *  
   */
  public function fetchArray($query){
    return mysql_fetch_array($query);
  }
  
  public function fetchRow($query){
  	return mysql_fetch_row($query);
  }
  
  public function fetchAssoc($query){
	return mysql_fetch_assoc($query);
  }
  
  /*
   * Funcao que retorna o total de linhas
   *  
   */
  public function numRows($query){
    
  	if( !empty( $query ) ){
  	
  		return mysql_num_rows($query);
  	}
  }
  
}

?>