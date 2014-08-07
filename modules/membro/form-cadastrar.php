<?php

$form = new Form( 'form', 'POST', 'index.php?mb=membro&pg=trata-form-cadastrar', 'multipart/form-data' );
$con  = new Connect();
?>

<?php 

if( isset( $_GET['msg'] ) && $_GET['msg'] == 'null' ){
	
?>
	
	<div id="msg-error"> * Campos obrigatórios não preenchidos. </div>
	
<?php
	
}

?>

<?php

if( isset( $_GET['mbr'] ) ){
	
	$id_membro = $_GET['mbr'];
	
	$sql = "SELECT
                    id_membro,
                    id_cargo,
                    id_conjunto,
                    nome,
                    DATE_FORMAT(dt_nascimento, '%d/%m/%Y') as dt_nascimento,
                    estado_civil,
                    endereco,
                    bairro,
                    uf,
                    municipio,
                    email,
                    rg,
                    cpf,
                    DATE_FORMAT(dt_batismo, '%d/%m/%Y') as dt_batismo,
                    sexo,
                    telefone,
                    celular,
                    ativo,
                    observacao_ativo,
                    foto,
                    nome_conjuge,
                    DATE_FORMAT(dt_nascimento_conjuge, '%d/%m/%Y') as dt_nascimento_conjuge,
                    DATE_FORMAT(dt_casamento, '%d/%m/%Y') as dt_casamento,
                    nome_pai,
                    nome_mae,
                    filhos

               FROM tb_membro
               WHERE id_membro = ". $id_membro .";";
	
	$rs = $con->execQuery( $sql );
	
	$numRows = $con->numRows( $rs );
	
	$dado = $con->fetchAssoc( $rs );
	
	$id_membro      	= $dado['id_membro'];
	$id_cargo       	= $dado['id_cargo'];
	$id_conjuto     	= $dado['id_conjunto'];
	$nome           	= $dado['nome'];
	$dt_nascimento      	= $dado['dt_nascimento'];
	$estado_civil   	= $dado['estado_civil'];
	$endereco       	= $dado['endereco'];
	$bairro         	= $dado['bairro'];
	$uf             	= $dado['uf'];
	$municipio      	= $dado['municipio'];
	$email          	= $dado['email'];
	$rg             	= $dado['rg'];
        $cpf            	= $dado['cpf'];
        $dt_batismo     	= $dado['dt_batismo'];
        $sexo           	= $dado['sexo'];
        $telefone       	= $dado['telefone'];
        $celular        	= $dado['celular'];
        $ativo                  = $dado['ativo'];
        $observacao_ativo	= $dado['observacao_ativo'];
        $foto           	= $dado['foto'];
        $nome_conjuge   	= $dado['nome_conjuge'];
        $dt_nascimento_conjuge	= $dado['dt_nascimento_conjuge'];
        $dt_casamento   	= $dado['dt_casamento'];
        $nome_pai       	= $dado['nome_pai'];
        $nome_mae       	= $dado['rnome_mae'];
        $filhos         	= $dado['filhos'];
        
}

?>

<a href="javascript:history.go(-1)">Voltar</a>
<br /><br />

<div class="container" style="border: solid 1px">
<h1> <?php echo $numRows <= 0 ? "Cadastrar Membro": "Editar Membro"; ?> </h1>
<form class="form-signin" action="<?php echo $form->action; ?>" method="<?php echo $form->method; ?>" name="<?php echo $form->name; ?>" id="<?php echo $form->name; ?>" enctype="<?php echo $form->enctype ?>" style="width:auto;">

	<?php echo $form->formHidden( 'id_membro', $id_membro ) ?>

	<table width="635" border="1">
            <tr>
              <td width="99">Membro:</td>
              <td width="185"><label>
                <?php echo $form->formText( 'nome', 'input-block-level', 'Nome' ) ?>
              </label></td>
              <td width="136">Data de Nascimento: </td>
              <td width="187"><label>
                <?php echo $form->formText( 'dt_nascimento', 'input-block-level', 'Data Nascimento' ) ?>
              </label></td>
            </tr>
            <tr>
              <td height="24">Foto:</td>
              <td>
                <label for="foto"></label>
                  <input name="foto" type="file" id="foto" size="15" />
              </td>
                  <td height="24">Estado Civil:</td>
              <td>
                <label for="foto"></label>
                  <?php echo $form->formText( 'estado_civil', 'input-block-level', 'Estado Civil' ) ?>
              </td>
            </tr>   
            <tr>
              <td>RG: </td>
              <td><label>
                <?php echo $form->formText( 'rg', 'input-block-level', 'RG' ) ?>
              </label></td>
              <td>CPF:</td>
              <td><label>
                <?php echo $form->formText( 'cpf', 'input-block-level', 'CPF' ) ?>
              </label></td>
            </tr>
            <tr>
              <td>Sexo:</td>
              <td><label>
                <select name="sexo">
                  <option value="selecione">Selecione...</option>
                  <option value="m">Masculino</option>
                  <option value="f">Feminino</option>
                </select>
              </label></td>
              <td>Data de Batismo: </td>
              <td><label>
                <?php echo $form->formText( 'dt_batismo', 'input-block-level', 'Data Batismo' ) ?>
              </label></td>
            </tr>
            <tr>
              <td>Endere&ccedil;o:</td>
              <td><label>
                <?php echo $form->formText( 'endereco', 'input-block-level', 'Endereço' ) ?>
              </label></td>
              <td>E-Mail:</td>
              <td><label>
                <?php echo $form->formText( 'email', 'input-block-level', 'E-Mail' ) ?>
              </label></td>
            </tr>
            <tr>
              <td>Cargo:</td>
              <td><label>
                <?php echo $form->formText( 'cargo', 'input-block-level', 'Cargo' ) ?>
              </label></td>
              <td>Telefone:</td>
              <td><label for="telefone">
                <select name="telefone" id="telefone">
                  <option value="telefone">telefone</option>
                </select>
              </label></td>
            </tr>
            <tr>
              <td>Conjuge:</td>
              <td><label for="conjuge">
                <select name="conjuge" id="conjuge">
                  <option value="Conjuge">conjuge</option>
                </select>
              </label></td>
              <td>Filho:</td>
              <td><label for="filho">
                <select name="filho" id="filho">
                  <option value="filho">Filho</option>
                </select>
              </label></td>
            </tr>
            <tr>
              <td>Filia&ccedil;&atilde;o:</td>
              <td><label for="filiacao">
                <select name="filiacao" id="filiacao">
                  <option value="filiacao">Filiacao</option>
                </select>
              </label></td>
              <td>Pa&iacute;s:</td>
              <td><label for="pais">
                <select name="pais" id="pais">
                  <option value="pais">Pais</option>
                </select>
              </label></td>
            </tr>
            <tr>
              <td height="29">Estado:</td>
              <td><label for="estado">
                <select name="estado" id="estado">
                  <option value="estado">Estado</option>
                </select>
              </label></td>
              <td>Cidade:</td>
              <td><label for="cidade">
                <select name="cidade" id="cidade">
                  <option value="cidade">Cidade</option>
                </select>
              </label></td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <?php echo $form->formReset( null, 'Limpar','btn btn-large btn-primary' ) ?>
                    <?php echo $form->formSubmit( $numRows <= 0? 'btn-enviar' : 'btn-editar', 'Enviar','btn btn-large btn-primary' ) ?>
                </td>
            </tr>
          </table>
	<br />
	<div style="color: red; font-size: 12px; padding-left: 200px;"> * Campos obrigatorios </div>



</form>
</div>
<script type="text/javascript">

$(document).ready(function(){

	$("#dt_nascimento").setMask('date');

	$("#dt_nascimento").datepicker({
	    showOn: 'button',
	    buttonImage: '../plugins/jquery-ui/css/sunny/images/calendar.gif',
	    buttonImageOnly: true,
	    dateFormat: 'dd/mm/yy',
	    dayNamesMin: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
	    monthNames: ['Janeiro', 'Fevereiro', 'Mar&ccedil;o', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro' ],
	    changeYear: true,
	});

	$("#form").submit( function(){

		var msg 			= "";
		var dt_noticia			= $("#dt_noticia").val();
		var titulo				= $("#titulo").val();
		var textarea			= $("#textarea").val();
		var foto_miniatura		= $("#foto_miniatura").val();
		var foto_noticia		= $("#foto_noticia").val();
		var titulo_foto_noticia	= $("#titulo_foto_noticia").val();

		if( dt_noticia == "" ){
			msg += "- Selecione a Data \n";
		}

		if( titulo == "" ){
			msg += "- Digite o Título \n";
		}

		if( textarea == "" ){
			msg += "- Digite a Notícia \n";
		}
		
		if( msg != "" ){
			alert( msg );
			return false;
		}

		
		
	});
	
});

</script>