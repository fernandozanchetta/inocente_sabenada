<?php
$con = @mysql_connect("localhost", "root", "segredo90") or die ("Não foi possível conectar com o servidor de dados!");
mysql_select_db("pi", $con) or die("Banco de dados não localizado!");
?>