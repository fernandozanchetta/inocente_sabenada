<?php 
  include("header.php"); 
  session_start();
?>

<div class="header">
  <div class="header-resize">
    <div class="logo"><a href="javascript:;" onclick="ajaxload('homedash.php');"><img src="images/logo.png" width="143" height="55"></a></div>
    <div class="menu">
      <nav style="width:480px">
        <ul>
          <li><a href="javascript:;" onclick="ajaxload('profile.php');">Meu perfil</a></li>
          <li><a href="javascript:;" onclick="ajaxload('artigos.php');">Artigos</a></li>
          <li><a href="downloads.php">Downloads</a></li>
          <li class="last"><a href="logout.php">Sair</a></li>
        </ul>
        <div class="clr"></div>
      </nav>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
<div class="content">
  <?php include("materias.php"); ?>
  <div class="center">
    <div class="search">
      <input type="text" name="search" id="search" style="width: 280px; padding: 12px;" class="input" placeholder="Procure seu artigo aqui!" />
      <a href="javascript:;" onclick="ajaxload('novo_post.php');" class="download">Novo Artigo</a>
    </div>
    <div class="post" id="page">
      
    </div>
  </div>
  <div class="right">
    <h1>Artigos Recentes</h1>
    <ul>
      <li><a href="#">Aula 1 - Estrutura de Dados &raquo; Nessa aula apresentaresmo...</a></li>
      <li><a href="#">Aula 2 - Estrutura de Dados &raquo; Alocação Estática e Dinâmica... </a></li>
      <li><a href="#">Aula 3 - Estrutura de Dados &raquo; Ponteiros...</a></li>
      <li><a href="#">Aula 4 - Estrutura de Dados &raquo; Aplicação de ponteiros...</a></li>
      <li><a href="#">Aula 5 - Estrutura de Dados &raquo; Grafos...</a></li>
    </ul>
    <h1>Usuários Online</h1>
    <div class="user"> <a href="#"><img src="images/users/01/01.jpg" width="34" height="37"></a>
      <div class="nome"><a href="#">Brenda Ricci</a></div>
    </div>
    <div class="user"> <a href="#"><img src="images/users/01/01.jpg" width="34" height="37"></a>
      <div class="nome"><a href="#">Brenda Ricci</a></div>
    </div>
    <div class="user"> <a href="#"><img src="images/users/01/01.jpg" width="34" height="37"></a>
      <div class="nome"><a href="#">Brenda Ricci</a></div>
    </div>
    <div class="user"> <a href="#"><img src="images/users/01/01.jpg" width="34" height="37"></a>
      <div class="nome"><a href="#">Brenda Ricci</a></div>
    </div>
  </div>
  <div class="clr"></div>
</div>
<?php include("footer.php") ?>
