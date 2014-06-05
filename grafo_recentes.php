<?php include("config.php")  ?>

<?php
function multiexplode ($delimiters,$string) {
    
    $ready = str_replace($delimiters, $delimiters[0], $string);
    $launch = explode($delimiters[0], $ready);
    return  $launch;
}

function implementa ($id,$titulo,$conteudo,$ano,$mes,$dia,$arrayGrafo){
    if ($arrayGrafo == null){
        $arrayGrafo[1]= array(
            'dia' => $dia,
            'mes' => $mes,
            'ano' =>  $ano,
            'id' => $id,
            'titulo' => $titulo,
            'conteudo' => $conteudo,            
            'flag' => false,
            'vizinhos' => array_keys($arrayGrafo) 
        );
        return $arrayGrafo;
    }else{
        $id = array(
            'dia' => $dia,
            'mes' => $mes,
            'ano' =>  $ano,
            'id' => $id,
            'titulo' => $titulo,
            'conteudo' => $conteudo,   
            'flag' => false,
            'vizinhos' => array_keys($arrayGrafo) 
        );
    array_push($arrayGrafo, $id);
    return $arrayGrafo;
    }
}

function busca ($arrayGrafo,$diaAtual,$mesAtual,$anoAtual){
    $x = count($arrayGrafo);
    $postsEncontrados = array();
    $i = 1;

    while($i <= $x) {
        $vert = $arrayGrafo[$i];   
        if($vert['flag'] == false){    
            if($vert['ano'] == $anoAtual){ //mesmo ano
            	if($vert['mes'] == $mesAtual){	// mesmo mês
            		if($vert['dia'] == $diaAtual){ //mesmo dia
            			if($contador = count($postsEncontrados) == 5){
            				break;
            			}else{

            				$id = $vert['id'];            			
            				$titulo = $vert['titulo'];
            				$cont = $vert['conteudo'];

            				$um = array ($id,$titulo,$cont);
            				array_push($postsEncontrados, $um);             
            			}
					}else{
						if($contador = count($postsEncontrados) == 5){
            				break;
            			}else{

            				$id = $vert['id'];            			
            				$titulo = $vert['titulo'];
            				$cont = $vert['conteudo'];

            				$um = array ($id,$titulo,$cont);
            				array_push($postsEncontrados, $um);             
            			}
					}

				}else{
					if($contador = count($postsEncontrados) == 5){
            			break;
            		}else{

            			$id = $vert['id'];            			
            			$titulo = $vert['titulo'];
            			$cont = $vert['conteudo'];

            			$um = array ($id,$titulo,$cont);
            			array_push($postsEncontrados, $um);             
            		}
				}

            }else{
            	if($contador = count($postsEncontrados) == 5){
            		break;
            	}else{

            		$id = $vert['id'];            			
            		$titulo = $vert['titulo'];
            		$cont = $vert['conteudo'];

            		$um = array ($id,$titulo,$cont);
            		array_push($postsEncontrados, $um);             
            	}
            }
            $vert['vizinho'] = true;

        }        
        $i++;
    }   
    return $postsEncontrados;
}


$sql = "SELECT * FROM posts";
$query = mysql_query($sql,$con);

$arrayGrafo = array();
$createdData = array();

while($result = mysql_fetch_array($query)){ 
	$createdData = multiexplode(array("-",":"," "),$result[3]);
    $arrayGrafo = implementa($result[0],$result[1],$result[2],$createdData[0],$createdData[1],$createdData[2],$arrayGrafo); 
}
$today = getDate();
$achou = array();
$achou = busca($arrayGrafo,$today['wday'],$today['mon'],$today['year']);

foreach ($achou as $key) {
	echo "Post " . $key[0] . ": <br />";
	echo $key[1] . "<br />"; //titulo
	echo mb_substr($key[2], 0, 20) . "...<br />"; //conteudo do post
	echo "<br /><br />";
}