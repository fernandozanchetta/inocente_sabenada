<?php 
	include("config.php");
	$artigos = mysql_query("SELECT * FROM posts ORDER BY id DESC") or die(mysql_error());
	while ($artigo = mysql_fetch_array($artigos)) {
	?>
	<div class="center">
   <div class="post">
     <h2><?php echo $artigo[1]; ?></h2>
     <em>Postado dia 22 de Março de 2014 às 21:34 pm</em>
     <div class="texto">
       <p><?php echo $artigo["conteudo"] ?></p>
     </div>
     <div class="download"><a href="#">download</a></div>
     <div class="leia-mais"><a href="#">leia mais</a></div>
     <div class="clr"></div>
   </div>
 </div>
	<?php
	}
?>