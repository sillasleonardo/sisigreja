<a href="index.php?mb=membro&pg=form-cadastrar"> Novo Membro </a>
<br /><br />

<?php 

if( isset( $_GET['msg'] ) && $_GET['msg'] == 'ok' ){
	
?>
	
	<div id="msg-ok"> Membro cadastrado com sucesso. </div>
	
<?php
	
}
elseif( isset( $_GET['msg'] ) && $_GET['msg'] == 'error' ){
	
?>
	
	<div id="msg-error"> Ocorreu um erro ao salvar o Membro. Entre em contato com o administrador do sistema. </div>
	
<?php
	
}
elseif( isset( $_GET['msg'] ) && $_GET['msg'] == 'ok-edit' ){

	?>
	
	<div id="msg-ok"> Membro alterado com sucesso. </div>
	
<?php
	
}
elseif( isset( $_GET['msg'] ) && $_GET['msg'] == 'error-edit' ){

	?>
	
	<div id="msg-oerror"> Ocorreu um erro ao alterar o Membro. Entre em contato com o administrador do sistema. </div>
	
<?php
	
}
elseif( isset( $_GET['msg'] ) && $_GET['msg'] == 'ok-inativ' ){

	?>
	
	<div id="msg-ok"> Membro inativado com sucesso. </div>
	
<?php
	
}
elseif( isset( $_GET['msg'] ) && $_GET['msg'] == 'ok-ativ' ){

	?>
	
	<div id="msg-ok"> Membro ativada com sucesso. </div>
	
<?php
	
}

?>

<?php $con  	= new Connect();?>
<?php $sql  	= "SELECT id_noticia, 
						DATE_FORMAT(dt_noticia, '%d/%m/%Y %H:%i') as dt_noticia,
						DATE_FORMAT(dt_noticia, '%d') as dia,
			        	DATE_FORMAT(dt_noticia, '%m') as mes,
			        	DATE_FORMAT(dt_noticia, '%Y') as ano,
						titulo,
						IF( ativo = 1, 'Publicada', 'Não publicada') as status,
						ativo
					FROM tb_noticia
					ORDER BY  ano DESC, mes DESC, dia DESC;"; ?>
<?php $rs   	= $con->execQuery( $sql ); ?>
<?php $numRows 	= $con->numRows( $rs ); ?>


<?php if( $numRows > 0 ): ?>
	<table border='1' bordercolor="#ccc" width='auto'>
		<tr style="background: #ccc;">
			<th width="50px">
				Código
			</th>
			<th width="600px">
				Título
			</th>
			<th width="170px">
				Data
			</th>
			<th width="150px">
				Status
			</th>
			<th width="100px">
				Ações
			</th>
		</tr>
		
		
	
		<?php while( $dado = $con->fetchAssoc( $rs ) ):?>
				<tr>
					<td style="text-align: center;">
						<?php echo str_pad( $dado['id_noticia'], 3, 0, STR_PAD_LEFT ); ?>
					</td>
					<td>
						<?php echo $dado['titulo']; ?>
					</td>
					<td>
						<?php echo $dado['dt_noticia']; ?>
					</td>
					<td style="padding: 0 20px;">
						<span style="color: <?php echo $dado['ativo'] == 1? 'green': 'red'; ?>;"> <?php echo $dado['status']; ?> </span>
					</td>
					<td style="text-align: center;">
						<a href="index.php?md=noticia&pg=form-cadastrar&ntc=<?php echo $dado['id_noticia'] ?>"> <img src="../images/EDIT_16.png" title="Editar" alt="Editar" /> </a> &nbsp;&nbsp;&nbsp;
						
						<?php if( $dado['ativo'] == 1 ): ?>
							<a href="index.php?md=noticia&pg=trata-form-cadastrar&acao=inativar&ntc=<?php echo $dado['id_noticia'] ?>"> <img src="../images/close_filtro.png" width="15px" height="15px" title="Inativar" alt="Inativar" /> </a>
						<?php else:?>
							<a href="index.php?md=noticia&pg=trata-form-cadastrar&acao=ativar&ntc=<?php echo $dado['id_noticia'] ?>"> <img src="../images/ativo.png" width="15px" height="15px"  title="Ativar" alt="Ativar" /> </a>
						<?php endif; ?>
					</td>
				</tr>
		<?php endwhile; ?>
	</table>
<?php else:?>

<span style=""> Nenhum Membro cadastrado. </span>

<?php endif; ?>
