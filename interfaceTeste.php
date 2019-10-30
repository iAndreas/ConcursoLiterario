<?php
    if (isset($_GET["erro"])) {
      switch ($_GET["erro"]) {
        case 'erroU':
          echo "<script> Swal.fire({
      				  title: 'Usuário já existente!',
      				  text: 'O nome de usuário escolhido já está sendo usado.',
      				  width: 450,
      				  type: 'error'
      				}) </script>";
          break;
        case 'erroE':
          echo "<script> Swal.fire({
      				  title: 'E-mail já existente!',
      				  text: 'Este endereço de e-mail já foi cadastrado.',
      				  width: 450,
      				  type: 'error'
      				}) </script>";
          break;
          case 'erroS':
          echo "<script> Swal.fire({
                title: 'As senhas devem ser iguais!',
                text: '',
                width: 450,
                type: 'warning'
              }) </script>";
          break;
      }
    }
  ?>
<form method="post" action="acaoJurado.php">
	Nome<input type="text" name="nome">
	Usuário<input type="text" name="usuario">
	Senha<input type="password" name="senha">
	Confirma S<input type="password" name="confirmS">
	E-mail<input type="email" name="email">
	Telefone<input type="text" name="telefone">
	<button name="cadJ">Enviar</button>
</form>