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

<?php
// the graph
$G = array(
   0 => array( 0,  4,  0,  0,  0,  0,  0,  0,  8),
   1 => array( 4,  0,  8,  0,  0,  0,  0,  0,  11),
   2 => array( 0,  8,  0,  7,  0,  4,  2,  0,  0),
   3 => array( 0,  0,  7,  0,  9,  14,  0,  0,  0),
   4 => array( 0,  0,  0,  9,  0,  10,  0,  0,  0),
   5 => array( 0,  0,  4,  14,  10,  0,  0,  2,  0),
   6 => array( 0,  0,  2,  0,  0,  0,  0,  6,  7),
   7 => array( 0,  0,  0,  0,  0,  2,  6,  0,  1),
   8 => array( 8,  11,  0,  0,  0,  0,  7,  1,  0),
);

function Kruskal(&$G){
   $len = count($G);

   // 1. Make T the empty tree (we'll modify the array G to keep only MST
   $T = array();

   // 2. Make a single node trees (sets) out of each vertex
   $S = array();
   foreach (array_keys($G) as $k) {
       $S[$k] = array($k);
   }

   // 3. Sort the edges
   $weights = array();
   for ($i = 0; $i < $len; $i++) {
       for ($j = 0; $j < $i; $j++) {
           if (!$G[$i][$j]) continue;

           $weights[$i . ' ' . $j] = $G[$i][$j];
       }
   }
   asort($weights);

   foreach ($weights as $k => $w) {
       list($i, $j) = explode(' ', $k);

       $iSet = find_set($S, $i);
       $jSet = find_set($S, $j);
       if ($iSet != $jSet) {
           $T[] = "Edge: ($i, $j)";
           union_sets($S, $iSet, $jSet);
       }
   }

   return $T;
}

function find_set(&$set, $index){
   foreach ($set as $k => $v) {
       if (in_array($index, $v)) {
           return $k;
       }
   }

   return false;
}

function union_sets(&$set, $i, $j){
   $a = $set[$i];
   $b = $set[$j];
   unset($set[$i], $set[$j]);
   $set[] = array_merge($a, $b);
}

$mst = Kruskal($G);

//Edge: (8, 7)
//Edge: (6, 2)
//Edge: (7, 5)
//Edge: (1, 0)
//Edge: (5, 2)
//Edge: (3, 2)
//Edge: (2, 1)
//Edge: (4, 3)
foreach ($mst as $v) {
   echo $v . PHP_EOL;
}
?>