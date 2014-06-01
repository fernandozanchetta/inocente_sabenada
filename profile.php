<?php include("config.php"); 
	session_start();
	$dados = mysql_query("SELECT * FROM usuarios WHERE id = ".$_SESSION['user_id']) or die(mysql_error());
	$dado = mysql_fetch_row($dados);
?>
<h2>Meu perfil</h2>
<div class="clr"></div>
<div>
<label>Nome:</label><br />
	<input name="nome" value="<?php echo $dado[1]; ?>" type="text" id="nome" class="input" />
</div>
<div>
	<label>Usuário:</label><br />
	<input name="usuario" type="text" value="<?php echo $dado[2] ?>" id="usuario" class="input" />
</div>
<div>
	<label>E-mail:</label><br />
	<input name="email" type="text" value="<?php echo $dado[3] ?>" id="email" class="input" />
</div>
<br />
<div>
	<a href="javascript:;" onclick="ajaxload('mudarsenha.php')">Clique aqui para mudar sua senha</a>
</div>
<br />
<div>
	<label>Curso:</label><br />
	<select name="curso" id="curso" class="input">
	<?php 
		$curso_atual = mysql_query("SELECT curso FROM cursos WHERE id = ".$dado[6]);
		$curso_nome = mysql_fetch_row($curso_atual);
		if (!empty($curso_nome)) {
	?>
		<option value="<?php echo $dado[6]; ?>"><?php echo utf8_encode($curso['curso']); ?></option>
	<?php
		}
		$cursos = mysql_query("SELECT * FROM cursos");
		while ($curso = mysql_fetch_array($cursos)) {
	?>
		<option value="<?php echo $curso['id']; ?>"><?php echo utf8_encode($curso['curso']); ?></option>
	<?php } ?>
	</select>
</div>
<div>
	<label>Localização:</label><br />
	<input name="localizacao" type="text" value="<?php echo $dado[7]; ?>" id="localizacao" class="input" />
</div>
<div>
	<input name="alterar" type="submit" id="alterar" value="Alterar" class="download" style="width: 100%" />
</div>

<div class="clr"></div>