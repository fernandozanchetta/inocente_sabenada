<?php
if(@$_GET['go'] == 'cadastrar'){
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $user = $_POST['user'];
  $pwd = md5($_POST['senha']);

  if(empty($nome)){
    echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
  }elseif(empty($email)){
    echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
  }elseif(empty($user)){
    echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
  }elseif(empty($pwd)){
    echo "<script>alert('Preencha todos os campos para se cadastrar.'); history.back();</script>";
  }else{
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '$user'"));
    if($query1 == 1){
      echo "<script>alert('Usuário já existe.'); history.back();</script>"; 
    }else{
      mysql_query("INSERT INTO usuarios (nome, usuario, email, senha) VALUES ('$nome', '$user', '$email', '$pwd')");
      echo "<script>alert('Usuário cadastrado com sucesso.');</script>";
      echo "<meta http-equiv='refresh' content='0, url=./'>";
    }
  }
}

?>