<?php 
  include("header.php"); 
  session_start();
?>

<div class="header">
  <div class="header-resize">
    <div class="logo"><img src="images/logo.png" width="143" height="55"></div>
    <div class="menu">
      <nav style="width:480px">
        <ul>
          <li><a href="profile.php">Meu perfil</a></li>
          <li><a href="materias.php">Matérias</a></li>
          <li><a href="downloads.php">Downloads</a></li>
          <li><a href="#">Blog</a></li>
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
  <div class="left">
    <h1>Navegação</h1>
    <ul>
      <li><a href="#">Estrutura de Dados</a>
        <ul>
          <li><a href="#">Aula 1 - Blablabla</a></li>
          <li><a href="#">Aula 2 - Blablabla</a></li>
          <li><a href="#">Aula 3 - Blablabla</a></li>
          <li><a href="#">Aula 4 - Blablabla</a></li>
          <li><a href="#">Aula 5 - Blablabla</a></li>
          <li><a href="#">Aula 6 - Blablabla</a></li>
        </ul>
      </li>
    </ul>
    <ul>
      <li><a href="#">Fundamentos da Administração</a>
        <ul>
          <li><a href="#">Aula 1 - Blablabla</a></li>
          <li><a href="#">Aula 2 - Blablabla</a></li>
          <li><a href="#">Aula 3 - Blablabla</a></li>
          <li><a href="#">Aula 4 - Blablabla</a></li>
          <li><a href="#">Aula 5 - Blablabla</a></li>
          <li><a href="#">Aula 6 - Blablabla</a></li>
        </ul>
      </li>
    </ul>
  </div>
  <div class="center">
    <div class="post" id="page">
      <h2>Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla Bla bla bla </h2>
      <em>Postado dia 22 de Março de 2014 às 21:34 pm</em>
      <div class="texto">
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          Curabitur pretium tincidunt lacus. Nulla gravida orci a odio. Nullam varius, turpis et commodo pharetra, est eros bibendum elit, nec luctus magna felis sollicitudin mauris. Integer in mauris eu nibh euismod gravida. Duis ac tellus et risus vulputate vehicula. Donec lobortis risus a elit. Etiam tempor. Ut ullamcorper, ligula eu tempor congue, eros est euismod turpis, id tincidunt sapien risus a quam. Maecenas fermentum consequat mi. Donec fermentum.</p>
        <div class="download"><a href="#">download</a></div>
        <div class="leia-mais"><a href="#">leia mais</a></div>
        <div class="clr"></div>
      </div>
    </div>
  </div>
  <div class="right">
    <h1>Arquivos acessados</h1>
    <ul>
      <li><a href="#">Aula 4 - Blablabla &raquo; Estrutura de Dados</a></li>
      <li><a href="#">Aula 4 - Blablabla &raquo; Estrutura de Dados</a></li>
      <li><a href="#">Aula 4 - Blablabla &raquo; Estrutura de Dados</a></li>
      <li><a href="#">Aula 4 - Blablabla &raquo; Estrutura de Dados</a></li>
      <li><a href="#">Aula 4 - Blablabla &raquo; Estrutura de Dados</a></li>
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
