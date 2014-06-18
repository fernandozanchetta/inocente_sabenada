<?php 
function cortaFrase($frase, $qtde_letras = 230)
{
   /*
    *
    * $frase = string com o conteúdo a ser formatada
    * $qtde_letras = quantidade de caracteres máximo
    *
    *
    * OBS:
    * CONSIDERAR A RETICÊNCIAS ADICIONADA CASO A STRING
    * SEJA MAIOR QUE A QUANTIDADE MÁXIMA DE CARACTERES
    *
    */
 
   $p = explode(' ', $frase);
   $c = 0;
   $cortada = '';
 
   foreach($p as $p1){
      if ($c<$qtde_letras && ($c+strlen($p1) <= $qtde_letras)){
         $cortada .= ' '.$p1;
         $c += strlen($p1)+1;
      }else{
         break;
      }
   }
 
   return strlen($cortada) < $qtde_letras ? $cortada.'...' : $cortada;
}
?>
<?php 
	include("config.php");
	$artigos = mysql_query("SELECT * FROM posts ORDER BY id DESC") or die(mysql_error());
	while ($artigo = mysql_fetch_array($artigos)) {
	?>
	<div class="center">
   <div class="post">
     <h2><?php echo $artigo['titulo']; ?></h2>
     <em>Postado dia <?php echo date('d/m/Y', strtotime($artigo['created'])); ?></em>
     <div class="texto">
       <p><?php echo cortaFrase($artigo["conteudo"]); ?></p>
     </div>
     <div class="download"><a href="#">download</a></div>
     <div class="leia-mais"><a href="#">leia mais</a></div>
     <div class="clr"></div>
   </div>
 </div>
	<?php
	}
?>