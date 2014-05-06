<?php
if (@$_GET['go'] == 'logar') {
  $user = $_POST['user'];
  $pwd = md5($_POST['senha']);

  if (empty($user)) {
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  } else if (empty($pwd)) {
    echo "<script>alert('Preencha todos os campos para logar-se.'); history.back();</script>";
  } else {
    $query1 = mysql_num_rows(mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$pwd'"));
    if ($query1 == 1) {

        //iniciando a sessão do usuário
      session_start();

        //pegando os dados do usuário
      $session_query = mysql_query("SELECT * FROM usuarios WHERE usuario = '$user' AND senha = '$pwd'");
      $session = mysql_fetch_array($session_query);      
      
        $_SESSION['user_id'] = $session['id']; //id do usuário
        $_SESSION['user_nome'] = $session['nome']; //nome do usuário
        $_SESSION['user_email'] = $session['email']; //email do usuário
        $_SESSION['user_user'] = $session['usuario']; //nome de usuário

        echo "<meta http-equiv='refresh' content='0, url=dashboard.php'>";
      } else {
        echo "<script>alert('Usuário e senha não encontrados.'); history.back();</script>";
      }
    }
  }

  ?>