<hr />
<?php include("config.php") ?>
<?php include("header.php") ?>

<?php
function bfs($list,$buscar,$assuntosIdenticos)
{
    $x = count($list);
    $total = 0;

    for($i = 1; $i < $x ;$i++) {
        $vert = $list[$i];   
        if($vert['visitado'] == false){
            if($vert['assunto'] == $buscar){
                $total++;
                if($assuntosIdenticos == null){
                	$assuntosIdenticos[1] = $vert;
                }else{
                	array_push($assuntosIdenticos, $vert);
                }               
            }
                $vert['vizinho'] = true;
            }        
    }   
    return $assuntosIdenticos;
}
function implementaGrafo ($id,$assunto,$incidencia){
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
$termos = explode(" ",$busca);
$i = 0;

$query = "SELECT * FROM materias WHERE ";
$sql = "Select * from materias";
$queryGrafo = mysql_query($sql,$con);
$contadorAssuntos = 0;

$incidencia = array();
$assuntosIdenticos = array();

while($rowGrafo = mysql_fetch_array($queryGrafo)){  //implementando o Grafo
    $incidencia = implementaGrafo($rowGrafo[0],$rowGrafo[2],$incidencia);
    $contadorAssuntos++;
}

foreach ($termos as $each){
	$i++;

	if ($i == 1){
		$query .= "materia LIKE '$each' ";
	}else{
		$query .= "OR materia LIKE '%".$busca."%'";
	}
}

$query = mysql_query($query);
$rows = mysql_num_rows($query);
$assuntosIdenticos = bfs($incidencia,$busca,$assuntosIdenticos);
$total = count($assuntosIdenticos);

if($total == 0){
	echo "<h5>Não existem assuntos idênticos ao pesquisado.</h5>";
}elseif ($total == 1) {
	echo "<h5>Em um total de " . $contadorAssuntos . " artigos registrados, existem ". $total . " assunto idêntico: </h5><br />";
	foreach ($assuntosIdenticos as $key) {
		echo $key['assunto'] . "<br />";
	}	
}else{
	echo "<h5>Em um total de " . $contadorAssuntos . " artigos registrados, existem ". $total . " assuntos idênticos: </h5><br />";
	foreach ($assuntosIdenticos as $key) {
		echo $key['assunto'] . "<br />";
	}	
}

echo "<hr />Assuntos Relacionados: <br/><br /> ";

if($rows > 0){
	while($row = mysql_fetch_assoc($query)){
		$id = $row['id'];
		$titulo = $row['materia'];
		$descricao = $row['descricao'];	
		$assunto = $row['assunto'];		

		if(array_search($id,$assuntosIdenticos)){
			continue;
		}else{
			echo "$assunto <br>";
		}
	}	
}else{
	echo "Sem resultados!";
}

