<?php 
include("config.php");
session_start();
//var_dump($_SESSION);
//die();
	if (!empty($_POST)) {
		$titulo = $_POST['titulo'];
		$conteudo = $_POST['artigo'];
		$usuario_id = $_SESSION['user_id'];
		$materia = $_POST['materia'];
		$salva_artigo = mysql_query("INSERT INTO posts SET titulo = '".$titulo."', conteudo = '".$conteudo."', usuario_id = '".$usuario_id."', downloads = 0, materia_id = '".$materia."', created = '".date("Y-m-d H:i:s")."'") or die(mysql_error());
	}
?>
<form id="novo_artigo" method="POST" action="novo_post.php">
	<h3>Digite seu artigo e compartilhe com o mundo.</h3>
	<label>Digite o Título do artigo:</label>
	<input type="text" name="titulo" id="titulo">
	<textarea class="input" rows="10" name="artigo" placeholder="Digite aqui o seu artigo" style="float:none; width: 96%;" id="artigo"></textarea><br /><br />
	Qual Matéria deseja relacionar? <br /> <select name="materia" style="width: 100%">
	<?php 
		$rows_materias = mysql_query("select * from materias order by materia desc");
		while ($materias = mysql_fetch_array($rows_materias)) {
	?>
		<option value="<?php echo $materias['id'] ?>"><?php echo $materias['materia']; ?></option>
	<?php } ?>
	</select><br /><br />
	<input type="button" onclick="salvaForm();" class="download" value="Publicar Artigo" style="width: 100%; float: none" id="salvar_artigo">
</form>