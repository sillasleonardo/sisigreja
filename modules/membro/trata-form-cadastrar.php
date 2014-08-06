<?php



if( isset( $_POST['btn-enviar'] ) ){

	$dt_noticia1 		 = explode( '/', $_POST['dt_noticia'] );
	$dt_noticia1		 = $dt_noticia1[2] .'-'. $dt_noticia1[1] .'-'. $dt_noticia1[0];
	$hora				 = $_POST['hora'];
	$min				 = $_POST['min'];
	$dt_noticia			 = $dt_noticia1 .' '. $hora .':'. $min .':'. 0;

	$titulo 			 = $_POST['titulo'];
	$textarea 			 = $_POST['textarea'];
	$ativo				 = $_POST['ativo'];
	$foto_miniatura 	 = $_FILES['foto_miniatura']['name'];
	$foto_noticia 		 = $_FILES['foto_noticia']['name'];
	$titulo_foto_noticia = $_POST['titulo_foto_noticia'];
	$msg_edit_cad			 = '';

	if( empty( $dt_noticia1 ) ){
		$msg_edit_cad = '- Preencha Data <br />';
	}
	
	if( empty( $titulo ) ){
		$msg_edit_cad .= '- Preencha Titulo <br />';
	}
	
	if( empty( $textarea ) ){
		$msg_edit_cad .= '- Preencha Notícia <br />';
	}
	
	if( !empty( $foto_miniatura ) ){
		
	// foto_miniatura
		
		$foto_miniatura = $_FILES['foto_miniatura']['tmp_name'];
		$tipo_foto_miniatura = $_FILES['foto_miniatura']['type'];
		
		$fp = fopen($foto_miniatura,"rb");
		$imagem_temp = fread($fp,filesize($foto_miniatura));
		fclose($fp);
		$foto_miniatura = addslashes($imagem_temp);
	}

	if( !empty( $foto_noticia ) ){
	
	// foto_noticia
	
		$foto_noticia = $_FILES['foto_noticia']['tmp_name'];
		$tipo_foto_noticia = $_FILES['foto_noticia']['type'];
		
		$fp = fopen($foto_noticia,"rb");
		$imagem_temp = fread($fp,filesize($foto_noticia));
		fclose($fp);
		$foto_noticia = addslashes($imagem_temp);
		
	}
	
	if( $msg_edit_cad != '' ){
		echo "<script>  window.location = 'index.php?mb=membro&pg=cadastrar&msg=null';  </script>";
	}
	else{
		
		try{
			
			$con = new Connect();
			
			$sql = "INSERT INTO tb_noticia VALUES ( null, '". $dt_noticia ."', '". $titulo ."', '". $textarea ."', $ativo, '". $tipo_foto_miniatura ."', '". $tipo_foto_noticia ."', '". $titulo_foto_noticia ."', '". $foto_miniatura ."', '". $foto_noticia ."' );";

			$con->execQuery( $sql );
			
			echo "<script> window.location = 'index.php?mb=membro&pg=grid-cadastrar&msg=ok'; </script>";
		}
		catch ( Exception $e ){
			
			echo "<script> window.location = 'index.php?md=noticia&pg=grid-cadastrar&msg=error'; </script>";
		}
		
	}

}
elseif( isset( $_POST['btn-editar'] ) ){

	$id_noticia			 = $_POST['id_noticia'];
	$dt_noticia1 		 = explode( '/', $_POST['dt_noticia'] );
	$dt_noticia1		 = $dt_noticia1[2] .'-'. $dt_noticia1[1] .'-'. $dt_noticia1[0];
	$hora				 = $_POST['hora'];
	$min				 = $_POST['min'];
	$dt_noticia			 = $dt_noticia1 .' '. $hora .':'. $min .':'. 0;

	$titulo 			 = $_POST['titulo'];
	$textarea 			 = $_POST['textarea'];
	$ativo				 = $_POST['ativo'];
	
	$titulo_foto_noticia = $_POST['titulo_foto_noticia'];
	$msg_edit				 = '';

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
