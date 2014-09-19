<?php



if( isset( $_POST['btn-enviar'] ) ){
    
        $id_membro      	= $_POST['id_membro'];
	$id_cargo       	= $_POST['id_cargo'];
	$id_conjuto     	= $_POST['id_conjunto'];
	$nome           	= $_POST['nome'];
	$dt_nascimento      	= explode( '/', $_POST['dt_nascimento'] );
	$estado_civil   	= $_POST['estado_civil'];
	$endereco       	= $_POST['endereco'];
	$bairro         	= $_POST['bairro'];
	$uf             	= $_POST['uf'];
	$municipio      	= $_POST['municipio'];
	$email          	= $_POST['email'];
	$rg             	= $_POST['rg'];
        $cpf            	= $_POST['cpf'];
        $dt_batismo     	= explode( '/', $_POST['dt_batismo'] );
        $sexo           	= $_POST['sexo'];
        $telefone       	= $_POST['telefone'];
        $celular        	= $_POST['celular'];
        $ativo                  = $_POST['ativo'];
        $observacao_ativo	= $_POST['observacao_ativo'];
        $foto           	= $_FILES['foto']['name'];
        $nome_conjuge   	= $_POST['nome_conjuge'];
        $dt_nascimento_conjuge	= explode( '/', $_POST['dt_nascimento_conjuge'] );
        $dt_casamento   	= $_POST['dt_casamento'];
        $nome_pai       	= $_POST['nome_pai'];
        $nome_mae       	= $_POST['nome_mae'];
        $filhos                 = $_POST['filhos'];
        $msg_edit	        = '';
    
	if( empty( $dt_nascimento ) ){
		$msg_edit_cad = '- Preencha Data Nascimento <br />';
	}
        
        if( empty(  $dt_batismo ) ){
		$msg_edit_cad = '- Preencha Data Batismo <br />';
	}
        
        if( empty( $dt_nascimento_conjuge ) ){
		$msg_edit_cad = '- Preencha Data Conjuge <br />';
	}
	
	if( empty( $nome ) ){
		$msg_edit_cad .= '- Preencha Nome <br />';
	}
	
	if( empty( $textarea ) ){
		$msg_edit_cad .= '- Preencha Notícia <br />';
	}
	

	if( !empty( $foto ) ){
	
	// foto
	
		$foto = $_FILES['foto']['tmp_name'];
		//$tipo_foto_noticia = $_FILES['foto_noticia']['type'];
		
		$fp = fopen($foto,"rb");
		$imagem_temp = fread($fp,filesize($foto));
		fclose($fp);
		$foto = addslashes($imagem_temp);
		
	}
	
	if( $msg_edit_cad != '' ){
		echo "<script>  window.location = 'index.php?mb=membro&pg=cadastrar&msg=null';  </script>";
	}
	else{
		
		try{
			
			$con = new Connect();
			
			$sql = "INSERT INTO
                                    tb_membro
                                      VALUES (
                                          null,
                                          '". $id_cargo ."',
                                          '". $id_conjuto ."',
                                          '". $nome ."',
                                          '". $dt_nascimento . "',
                                          '". $estado_civil ."',
                                          '". $endereco ."',
                                          '". $bairro ."',
                                          '". $uf ."',
                                          '". $municipio ."',
                                          '". $email ."',
                                          '". $rg ."',
                                          '". $cpf ."',
                                          '". $dt_batismo ."',
                                          '". $sexo ."',
                                          '". $telefone ."',
                                          '". $celular ."',
                                          '". $ativo ."',
                                          '". $observacao_ativo ."',
                                          '". $foto ."',
                                          '". $nome_conjuge ."',
                                          '". $dt_nascimento_conjuge ."',
                                          '". $dt_casamento ."',
                                          '". $nome_pai ."',
                                          '". $nome_mae ."',
                                          '". $filhos ."'
                                    );";

			$con->execQuery( $sql );
			
			echo "<script> window.location = 'index.php?mb=membro&pg=grid-cadastrar&msg=ok'; </script>";
		}
		catch ( Exception $e ){
			
			echo "<script> window.location = 'index.php?mb=membro&pg=grid-cadastrar&msg=error'; </script>";
		}
		
	}

}
elseif( isset( $_POST['btn-editar'] ) ){

	$id_membro      	= $_POST['id_membro'];
	$id_cargo       	= $_POST['id_cargo'];
	$id_conjuto     	= $_POST['id_conjunto'];
	$nome           	= $_POST['nome'];
	$dt_nascimento      	= explode( '/', $_POST['dt_nascimento'] );
	$estado_civil   	= $_POST['estado_civil'];
	$endereco       	= $_POST['endereco'];
	$bairro         	= $_POST['bairro'];
	$uf             	= $_POST['uf'];
	$municipio      	= $_POST['municipio'];
	$email          	= $_POST['email'];
	$rg             	= $_POST['rg'];
        $cpf            	= $_POST['cpf'];
        $dt_batismo     	= explode( '/', $_POST['dt_batismo'] );
        $sexo           	= $_POST['sexo'];
        $telefone       	= $_POST['telefone'];
        $celular        	= $_POST['celular'];
        $ativo                  = $_POST['ativo'];
        $observacao_ativo	= $_POST['observacao_ativo'];
        $foto           	= $_FILES['foto']['name'];
        $nome_conjuge   	= $_POST['nome_conjuge'];
        $dt_nascimento_conjuge	= explode( '/', $_POST['dt_nascimento_conjuge'] );
        $dt_casamento   	= $_POST['dt_casamento'];
        $nome_pai       	= $_POST['nome_pai'];
        $nome_mae       	= $_POST['nome_mae'];
        $filhos                 = $_POST['filhos'];
        $msg_edit	        = '';

	$con  = new Connect();
	
	// se nao for pra alterar foto_miniatura e foto_noticia
	if( isset( $_POST['alterar_foto_miniatura'] ) && $_POST['alterar_foto_miniatura'] == 'nao' && isset( $_POST['alterar_foto_noticia'] ) && $_POST['alterar_foto_noticia'] == 'nao' ){

		$update = "UPDATE tb_noticia SET dt_noticia='". $dt_noticia ."' , titulo='". $titulo ."' , noticia='". $textarea ."' ,
					ativo=". $ativo ." , titulo_foto_noticia='". $titulo_foto_noticia ."' WHERE id_noticia = ". $id_noticia .";";
		
		$res_up = $con->execQuery( $update );
		
	}
	else{
		
		// se for pra alterar as duas
		if( isset( $_POST['alterar_foto_miniatura'] ) && $_POST['alterar_foto_miniatura'] == 'sim' && isset( $_POST['alterar_foto_noticia'] ) && $_POST['alterar_foto_noticia'] == 'sim' ){
			
			// altera foto_miniatura
			
				if( !empty( $_FILES['foto_miniatura'] ) ){
					
					// foto_miniatura
				
					$foto_miniatura = $_FILES['foto_miniatura']['tmp_name'];
					$tipo_foto_miniatura = $_FILES['foto_miniatura']['type'];
					
					$fp = fopen($foto_miniatura,"rb");
					$imagem_temp = fread($fp,filesize($foto_miniatura));
					fclose($fp);
					$foto_miniatura = addslashes($imagem_temp);
					
				}
				
				// altera foto_noticia
		
				if( !empty( $_FILES['foto_noticia'] ) ){
	
					$foto_noticia = $_FILES['foto_noticia']['tmp_name'];
					$tipo_foto_noticia = $_FILES['foto_noticia']['type'];
					
					$fp = fopen($foto_noticia,"rb");
					$imagem_temp = fread($fp,filesize($foto_noticia));
					fclose($fp);
					$foto_noticia = addslashes($imagem_temp);
					
				}
				
				// atualiza no banco
		
				$update = "UPDATE tb_noticia
							SET dt_noticia='". $dt_noticia ."',
								titulo='". $titulo ."',
								noticia='". $textarea ."',
								ativo=". $ativo .",
								tipo_foto_miniatura='". $tipo_foto_miniatura ."',
								tipo_foto_noticia='". $tipo_foto_noticia ."',
								titulo_foto_noticia='". $titulo_foto_noticia ."',
								foto_miniatura='". $foto_miniatura ."',
								foto_noticia='". $foto_noticia ."'
							WHERE id_noticia = ". $id_noticia .";";
		
				$res_up = $con->execQuery( $update );
				
		} // se for pra alterar apenas a foto_miniatura
		elseif( isset( $_POST['alterar_foto_miniatura'] ) && $_POST['alterar_foto_miniatura'] == 'sim' && isset( $_POST['alterar_foto_noticia'] ) && $_POST['alterar_foto_noticia'] == 'nao' ){
		
				if( !empty( $_FILES['foto_miniatura'] ) ){
					
					// foto_miniatura
				
					$foto_miniatura = $_FILES['foto_miniatura']['tmp_name'];
					$tipo_foto_miniatura = $_FILES['foto_miniatura']['type'];
					
					$fp = fopen($foto_miniatura,"rb");
					$imagem_temp = fread($fp,filesize($foto_miniatura));
					fclose($fp);
					$foto_miniatura = addslashes($imagem_temp);
					
				}
				
				// atualiza no banco
		
				$update = "UPDATE tb_noticia
							SET dt_noticia='". $dt_noticia ."',
								titulo='". $titulo ."',
								noticia='". $textarea ."',
								ativo=". $ativo .",
								tipo_foto_miniatura='". $tipo_foto_miniatura ."',
								titulo_foto_noticia='". $titulo_foto_noticia ."',
								foto_miniatura='". $foto_miniatura ."'
							WHERE id_noticia = ". $id_noticia .";";
		
				$res_up = $con->execQuery( $update );
			
		} // se for pra alterar apenas a foto_noticia
		elseif( isset( $_POST['alterar_foto_miniatura'] ) && $_POST['alterar_foto_miniatura'] == 'nao' && isset( $_POST['alterar_foto_noticia'] ) && $_POST['alterar_foto_noticia'] == 'sim' ){

			if( !empty( $_FILES['foto_noticia'] ) ){
			
			// foto_noticia
			
				$foto_noticia = $_FILES['foto_noticia']['tmp_name'];
				$tipo_foto_noticia = $_FILES['foto_noticia']['type'];
				
				$fp = fopen($foto_noticia,"rb");
				$imagem_temp = fread($fp,filesize($foto_noticia));
				fclose($fp);
				$foto_noticia = addslashes($imagem_temp);
				
			}
			
			// atualiza no banco
		
			$update = "UPDATE tb_noticia
						SET dt_noticia='". $dt_noticia ."',
							titulo='". $titulo ."',
							noticia='". $textarea ."',
							ativo=". $ativo .",
							tipo_foto_noticia='". $tipo_foto_noticia ."',
							titulo_foto_noticia='". $titulo_foto_noticia ."',
							foto_noticia='". $foto_noticia ."'
						WHERE id_noticia = ". $id_noticia .";";
	
			$res_up = $con->execQuery( $update );
		}
		
		// se for pra excluir a foto_miniatura
		if( isset( $_POST['alterar_foto_miniatura'] ) && $_POST['alterar_foto_miniatura'] == 'excluir' ){
		
			$update = "UPDATE tb_noticia
					SET tipo_foto_miniatura = null,
						foto_miniatura = null
					WHERE id_noticia = ". $id_noticia .";";
	
			$res_up = $con->execQuery( $update );
		}
		
		// se for pra excluir a foto_noticia
		if( isset( $_POST['alterar_foto_noticia'] ) && $_POST['alterar_foto_noticia'] == 'excluir' ){
		
			$update = "UPDATE tb_noticia
					SET tipo_foto_noticia = null,
						titulo_foto_noticia = null,
						foto_noticia = null
					WHERE id_noticia = ". $id_noticia .";";
	
			$res_up = $con->execQuery( $update );
		}
		
	}
	
	if( !empty( $res_up ) ){
		echo "<script>  window.location = 'index.php?md=noticia&pg=grid-cadastrar&msg=ok-edit';  </script>";
	}
	else{
		echo "<script>  window.location = 'index.php?md=noticia&pg=grid-cadastrar&msg=error-edit';  </script>";
	}
	
}
elseif( isset( $_GET['acao'] ) && $_GET['acao'] == 'inativar' ){
	
	$con  = new Connect();
	
	$id_noticia = $_GET['ntc'];
	
	$sql = "UPDATE tb_noticia SET ativo = 0 WHERE id_noticia = ". $id_noticia .";";
	
	$con->execQuery( $sql );
	
	echo "<script>  window.location = 'index.php?mb=membro&pg=grid-cadastrar&msg=ok-inativ';  </script>";

}
elseif( isset( $_GET['acao'] ) && $_GET['acao'] == 'ativar' ){
	
	$con  = new Connect();
	
	$id_noticia = $_GET['ntc'];
	
	$sql = "UPDATE tb_noticia SET ativo = 1 WHERE id_noticia = ". $id_noticia .";";
	
	$con->execQuery( $sql );
	
	echo "<script>  window.location = 'index.php?mb=membro&pg=grid-cadastrar&msg=ok-ativ';  </script>";

}

echo "<script>  window.location = 'index.php?mb=membro&pg=grid-cadastrar';  </script>";
