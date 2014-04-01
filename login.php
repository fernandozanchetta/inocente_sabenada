<?php

if(@$_GET['go'] == 'logar'){
  $user = $_POST['user'];
  $pwd = $_POST['senha'];

  if(empty($user)){
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  }elseif(empty($pwd)){
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  }else{
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$pwd'"));
    if($query1 == 1){
      echo "<script>alert('Usuário logado com sucesso.');</script>"; 
      echo "<meta http-equiv='refresh' content='0, url=dashboard.php'>";
    }else{
      echo "<script>alert('Usuário e senha não correspondem.'); history.back();</script>";
    }
  }
}

?>