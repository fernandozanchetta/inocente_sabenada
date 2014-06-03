<?php include("config.php"); 
	session_start();

	if (!empty($_POST)) {
		$senha = $_POST['senha'];

		$atualiza = mysql_query("UPDATE usuarios SET senha = md5('".$senha."') WHERE id = ".$_SESSION['user_id']) or die(mysql_error());
		if($atualiza) {
			echo '<script>alert("Senha alterada com sucesso!");</script>';
		}
	}
?>
<form id="mudarsenha" method="post" action="mudarsenha.php">
	<h2>Alterar senha</h2>
	<div class="clr"></div>
	<div>
	<label>Senha:</label><br />
		<input name="senha" type="password" id="senha" class="input" value="" />
	</div>
	<div>
		<label>Re-Senha:</label><br />
		<input name="resenha" type="password" id="resenha" class="input" value="" />
	</div>
	<br /><br />
	<div>
		<input name="alterar" onclick="atualizasenha();" type="button" id="alterar" value="Alterar" class="download" style="width: 100%" />
	</div>
	<div>
		<input name="cancelar" onclick="ajaxload('dashboard.php');" type="button" id="cancelar" value="Cancelar" class="download" style="width: 100%" />
	</div>
</form>

<div class="clr"></div>