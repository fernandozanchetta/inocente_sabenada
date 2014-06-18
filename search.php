<?php include("config.php") ?>


<?php
mb_internal_encoding('UTF-8');
function bfs($list,$buscar,$termos,$assuntosIdenticos)
{
    $x = count($list);
    $z = count($termos);
    $total = 0;

    for($i = 1; $i <= $x ;$i++) {
        $vert = $list[$i];   
        if($vert['visitado'] == false){
            $word_assunto = explode(" ", $vert['assunto']);
            foreach ($termos as $keyBusca => $palavraBusca) {
                foreach ($word_assunto as $keyVertice => $palavraAssunto){       
                    if ($palavraAssunto == $palavraBusca) {
                        $total++;
                        if($assuntosIdenticos == null){
                            $assuntosIdenticos[1] = $vert;
                        }else{
                            array_push($assuntosIdenticos, $vert);
                        }
                        break;
                    }
                }               
            }            
            $vert['vizinho'] = true;
        }        
    }   
    return $assuntosIdenticos;
}
function implementaGrafo ($id,$assunto,$incidencia){
    $assunto = mb_strtolower($assunto);
    if ($incidencia == null){
        $incidencia[1]= array(
            'assunto' => $assunto, //nome do vertice, no caso assunto.
            'visitado' => false, // uma flag, que marca se ja foi visitado.
            'id' => $id, //uma id/valor pro vertice.
            'vizinhos' => array_keys($incidencia) //vizinhos, os ultimos valores dentro de um array.
        );
        return $incidencia;
    }else{
        $id = array(
            'assunto' => $assunto, //nome do vertice, no caso assunto.
            'visitado' => false, // uma flag.
            'id' => $id, //uma id/valor pro vertice.
            'vizinhos' => array_keys($incidencia) //vizinhos, os ultimos valores dentro de um array.
        );
    array_push($incidencia, $id);
    return $incidencia;
    }
}

$busca = $_GET['search'];
$busca = mb_strtolower($busca);
$termos = explode(" ",$busca);
$i = 0;


$query = "SELECT * FROM posts WHERE ";
$sql = "SELECT * FROM posts";
$queryGrafo = mysql_query($sql,$con);
$contadorAssuntos = 0;

$incidencia = array();
$assuntosIdenticos = array();

while($rowGrafo = mysql_fetch_array($queryGrafo)){  //implementando o Grafo
    $incidencia = implementaGrafo($rowGrafo['id'],$rowGrafo['titulo'],$incidencia);
    $contadorAssuntos++;
}


foreach ($termos as $each){
	$i++;

	if ($i == 1){
		$query .= "titulo LIKE '$each' ";
	}else{
		$query .= "OR titulo LIKE '%".$busca."%'";
	}
}

$query = mysql_query($query,$con);
$rows = mysql_num_rows($query);
$assuntosIdenticos = bfs($incidencia,$busca,$termos,$assuntosIdenticos);
$total = count($assuntosIdenticos);

if($total == 0){
	echo "<h5>Não existem assuntos idênticos ao pesquisado.</h5>";
}elseif ($total == 1) {
	echo "<h5>Em um total de " . $contadorAssuntos . " artigos registrados, existem ". $total . " assunto idêntico: </h5>";
	foreach ($assuntosIdenticos as $key) {
        ?>
		<ol><a href="#"><h5><?php echo ucfirst($key['assunto']) ?></h5></a></ol>
        <?php
	}	
}else{
	echo "<h5>Em um total de " . $contadorAssuntos . " artigos registrados, existem ". $total . " assuntos idênticos: </h5>";
	foreach ($assuntosIdenticos as $key) {
        ?>
		<ol><a href="#"><h5><?php echo ucfirst($key['assunto']) ?></h5></a></ol>
        <?php
	}	
}

$sql2 = "SELECT * FROM posts";
if($rows > 0){
    echo "<hr />Confira outros artigos: <br/><br /> ";
	while($row = mysql_fetch_assoc($query)){
		if(array_search($id,$assuntosIdenticos)){
			continue;
		}else{
            if($sql2 = mysql_query($sql2,$con)){
			    while ($row = mysql_fetch_array($sql2)) {
                    ?>
                    <a href="#"><h5><?php echo $row['titulo'] ?></h5></a>
                    <ul><h6><?php echo $row['conteudo'] ?></h6></ul>
                    <?php
                }
            }
		}
	}	
}else{
    echo "<hr />";
	echo "<h3>Confira outros artigos: <br /><br /></h3>";  
    if($sql2 = mysql_query($sql2,$con)){
        while ($row = mysql_fetch_array($sql2)) {
            ?>
            <a href="#"><h5><?php echo $row['titulo'] ?></h5></a>
            <ul><h6><?php echo $row['conteudo'] ?></h6></ul>
            <?php
        }
    }
}

