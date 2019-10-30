<?php
require_once "autoload.php";

	if (isset($_POST["cadJ"])){
		$jurado= new Jurado;
		$aluno= new Aluno;
		$adm= new Adm;
		$jurado->setNome($_POST["nome"]);
		$jurado->setUsuario($_POST["usuario"]);
		$jurado->setSenha($_POST["senha"]);
		$jurado->setEmail($_POST["email"]);
		$jurado->setTelefone($_POST["telefone"]);
		

		$aluno->setUsuario($_POST["usuario"]);
		$adm->setUsuario($_POST["usuario"]);
		
		$unicoU = $jurado->userUnico();
		$unicoU2 = $aluno->userUnico();
		$unicoU3 = $adm->userUnico();
		$unicoE = $jurado->emailUnico();

		if ($unicoU == true and $unicoU2 == true and $unicoU3 == true and $unicoE == true and $_POST["confirmS"] == $_POST["senha"]){
			$jurado->insertJurado();		
			header("Location: cadJurado.php?sucesso=SucessoCadJ");
		}else if ($unicoU != true or $unicoU2 != true or $unicoU3 != true){
			header("Location: cadJurado.php?erro=erroU");
		}else if ($unicoE != true){
			header("Location: cadJurado.php?erro=erroE");
		}else if ($_POST["confirmS"] != $_POST["senha"]){
			header("Location: cadJurado.php?erro=erroS");
		}
	}
?>