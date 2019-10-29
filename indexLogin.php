<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Acesso</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,600' rel='stylesheet' type='text/css'><link rel="stylesheet" href="css/styleLogin.css">

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

</head>
<body style="font-family: 'hind', sans-serif;">
  <?php
    if (isset($_GET["sucesso"])) {
      switch ($_GET["sucesso"]) {
        case 'preC':
          echo "<script> Swal.fire({
                title: 'Pré-cadastro confirmado com sucesso!',
                text: 'Um link foi enviado para seu e-mail (cadastrado no Sigaa), confira sua caixa de entrada e confirme para continuar o cadastro.',
                type: 'success'
              }) </script>";
          break;
      }
    }

    if (isset($_GET["erro"])) {
      switch ($_GET["erro"]) {
        case 'preC':
          echo "<script> Swal.fire({
                title: 'Pré-cadastro não confirmado!',
                text: 'A matricula inserida é inválida.',
                type: 'error'
              }) </script>";
          break;
        case 'preCadR':
          echo "<script> Swal.fire({
                title: 'Pré cadastro já confirmado!',
                text: 'Verifique a caixa de entrada do seu e-mail (cadastrado no Sigaa) novamente e confirme o e-mail para continuar o cadastro.',
                type: 'warning'
              }) </script>";
          break;
          case 'erLog1':
          echo "<script> Swal.fire({
                    title: 'Você tem certeza?',
                    text: 'A senha está incorreta!',
                    width: 450,
                    type: 'warning'
                  }) </script>";
          break;
          case 'erLog2':
          echo "<script> Swal.fire({
                    title: 'Usuário não existente!',
                    width: 450,
                    type: 'error'
                  }) </script>";
          break;
      }
    }
  ?>
<!-- partial:index.partial.html -->
<div id="back">
  <canvas id="canvas" class="canvas-back"></canvas>
  <div class="backRight" style="background-image: url(img/login01.jpg);" >    
  </div>
  <div class="backLeft" style="background-image: url(img/login0.jpg);" >
  </div>
</div>

<div id="slideBox">
  <div class="topLayer">
    <div class="left">
      <div class="content">
        <h2>Cadastrar</h2>
          <form method="post" action="acaoAluno.php">
            <div class="form-element form-stack">
              <label for="matricula" class="form-label">Matrícula</label>
              <input id="matricula" type="number" name="matricula">
            </div>
            <div class="form-element form-submit">
              <button id="signUp" class="signup" type="submit" name="precadastro">Pré-Cadastrar</button>
          </form>
        <form id="form-signup" onsubmit="return false;">
            <button id="goLeft" class="signup off">Entrar</button> 
          </div>
        </form>
      </div>
    </div>
    <div class="right">
      <div class="content">
        <h2>Entrar</h2>
        
          <form method="post" action="acaoUsuarios.php">
            <div class="form-element form-stack">
              <label for="usuario" class="form-label">Usuário</label>
              <input id="usuario" type="text" name="usuario">
            </div>
            <div class="form-element form-stack">
              <label for="senha" class="form-label">Senha</label>
              <input id="senha" type="password" name="senha">
            </div>
            <div class="form-element form-submit">
              <button id="logIn" class="login" type="submit" name="login">Entrar</button>
          </form>
          <form id="form-login" onsubmit="return false;">
            <button id="goRight" class="login off" name="signup">Pré-Cadastrar</button>
          </div>   
        </form>
      </div>
    </div>
  </div>
</div>

<!-- 

Remixed from "Sliding Login Form" Codepen by
C-Rodg (github.com/C-Rodg)
https://codepen.io/crodg/pen/yNKxej

Remixed from "Paper.js - Animated Shapes Header" Codepen by
Connor Hubeny (@cooper_hu)
https://codepen.io/cooper_hu/pen/ybxoev

Custom Checkbox based on the blog post by
Mik Ted (@inserthtml):
https://www.inserthtml.com/2012/06/custom-form-radio-checkbox/

HTML5 Form Validation based on the blog post by
Thoriq Firdaus (@tfirdaus):
https://webdesign.tutsplus.com/tutorials/
html5-form-validation-with-the-pattern-attribute--cms-25145

-->
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/paper.js/0.11.3/paper-full.min.js'></script>
<script  src="js/scriptLogin.js"></script>

</body>
</html>