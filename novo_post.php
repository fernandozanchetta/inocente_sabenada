<?php 
session_start();
var_dump($_SESSION);
//die();
	if (!empty($_POST)) {
		echo '<script>alert("eae");</script>';
		$conteudo = $_POST['conteudo'];
		$usuario_id = $_SESSION['user_id'];
		$salva_artigo = mysql_query("INSERT INTO posts SET conteudo = '".$conteudo."', usuario_id = '".$usuario_id."', downloads = 0, created = '".date("Y-m-d H:i:s")."'");
	}
?>
<form id="novo_artigo" method="POST" action="novo_post.php">
	<h3>Digite seu artigo e compartilhe com o mundo.</h3>
	<textarea class="input" rows="10" name="artigo" placeholder="Digite aqui o seu artigo" style="float:none; width: 96%;" id="artigo"></textarea>
	<input type="button" onclick="salvaForm();" class="download" value="Publicar Artigo" style="width: 100%; float: none" id="salvar_artigo">
</form>