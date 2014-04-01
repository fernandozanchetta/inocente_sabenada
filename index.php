<?php include("header.php") ?>
<?php include("config.php") ?>
<?php include("cadastro.php") ?>
<?php include("login.php") ?>

<div class="header">
  <div class="header-resize">
    <div class="logo"><img src="images/logo.png" width="143" height="55"></div>
    <div class="menu">
      <nav>
        <ul>
          <li><a href="#">Sobre</a></li>
          <li><a href="#">Recursos</a></li>
          <li><a href="#">Blog</a></li>
          <li class="last"><a href="#">Contato</a></li>
        </ul>
        <div class="clr"></div>
      </nav>
      <div id="loginContainer"> <a href="#" id="loginButton"><span>ENTRAR</span><em></em></a>
        <div class="clr"></div>
        <div id="loginBox">
          <form id="loginForm" method="POST" action="?go=logar">
            <fieldset id="body">
              <fieldset>
                <label for="user">Usuário</label>
                <input type="text" name="user" id="user" />
              </fieldset>
              <fieldset>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" />
              </fieldset>
              <input type="submit" id="login" value="Entrar" />
              <label for="checkbox">
                <input type="checkbox" id="checkbox" />
                Lembrar-me</label>
            </fieldset>
            <span><a href="#">Esqueceu usuário ou senha?</a></span>
          </form>
        </div>
      </div>
    </div>
    <div class="clr"></div>
  </div>
  <div class="clr"></div>
</div>
<div class="banner">
  <div class="banner-resize">
    <div class="left">
      <h2>Codifique, compartilhe e organize suas ideias!</h2>
      <div class="coffee-code"></div>
    </div>
    <div class="right">
      <h1>Cadastre-se agora!</h1>
      <form action="?go=cadastrar" method="POST" id="cadastro">
        <input name="nome" type="text" class="input" id="nome" placeholder="Seu nome">
        <input name="user" type="text" class="input" id="user" placeholder="Escolha um usuário">
        <input name="email" type="text" class="input" id="email" placeholder="Seu e-mail">
        <input name="senha" type="password" class="input" id="senha" placeholder="Sua senha">
        <input type="submit" class="btn-cadastro">
      </form>
    </div>
    <div class="clr"></div>
  </div>
</div>
<div class="como-funciona">
 <h1>//////////// O que é o Surihub? ////////////</h1>
</div>

<?php include("footer.php") ?>

