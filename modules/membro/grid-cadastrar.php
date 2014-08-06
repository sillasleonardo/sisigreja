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
	
	<div id="msg-ok"> Membro ativado com sucesso. </div>
	
<?php
	
}

?>

<?php $con  	= new Connect();?>
<?php $sql  	= "SELECT id_membro,
                        nome,
                        DATE_FORMAT(dt_nascimento, '%d/%m/%Y') as dt_nascimento,
                        DATE_FORMAT(dt_batismo, '%d/%m/%Y') as dt_batismo,
                        telefone,
                        celular,
                        endereco,
                        bairro,
			IF( ativo = 1, 'Ativo', 'Não Ativo') as status

		FROM tb_membro;"; ?>
<?php $rs   	= $con->execQuery( $sql ); ?>
<?php $numRows 	= $con->numRows( $rs ); ?>


<?php if( $numRows > 0 ): ?>
	<table border='1' bordercolor="#ccc" width='auto'>
		<tr style="background: #ccc;">
			<th width="50px">
				Código
			</th>
			<th width="600px">
				Nome
			</th>
			<th width="170px">
				Data de Nascimento
			</th>
			<th width="150px">
				Data de Batismo
			</th>
			<th width="100px">
				Telefone
			</th>
                        <th width="100px">
				Celular
			</th>
                        <th width="100px">
				Endereco
			</th>
                        <th width="100px">
				Bairro
			</th>
                        <th width="100px">
				status
			</th>
                        <th width="100px">
				Ações
			</th>
		</tr>
		
		
	
		<?php while( $dado = $con->fetchAssoc( $rs ) ):?>
				<tr>
					<td style="text-align: center;">
						<?php echo str_pad( $dado['id_membro'], 3, 0, STR_PAD_LEFT ); ?>
					</td>
					<td>
						<?php echo $dado['nome']; ?>
					</td>
					<td>
						<?php echo $dado['dt_nascimento']; ?>
					</td>
					<td style="padding: 0 20px;">
						<span style="color: <?php echo $dado['ativo'] == 1? 'green': 'red'; ?>;"> <?php echo $dado['status']; ?> </span>
					</td>
					<td style="text-align: center;">
						<a href="index.php?mb=membro&pg=form-cadastrar&mbr=<?php echo $dado['id_membro'] ?>"> <img src="../images/EDIT_16.png" title="Editar" alt="Editar" /> </a> &nbsp;&nbsp;&nbsp;
						
						<?php if( $dado['ativo'] == 1 ): ?>
							<a href="index.php?mb=membro&pg=trata-form-cadastrar&acao=inativar&mbr=<?php echo $dado['id_membro'] ?>"> <img src="../images/close_filtro.png" width="15px" height="15px" title="Inativar" alt="Inativar" /> </a>
						<?php else:?>
							<a href="index.php?mb=membro&pg=trata-form-cadastrar&acao=ativar&mbr=<?php echo $dado['id_membro'] ?>"> <img src="../images/ativo.png" width="15px" height="15px"  title="Ativar" alt="Ativar" /> </a>
						<?php endif; ?>
					</td>
				</tr>
		<?php endwhile; ?>
	</table>
<?php else:?>

<span style=""> Nenhum Membro cadastrado. </span>

<?php endif; ?>
