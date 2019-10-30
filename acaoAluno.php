<?php
	require_once "autoload.php";

	if (isset($_POST["precadastro"])){
		$aluno= new Aluno;

		$aluno->setMatricula($_POST["matricula"]);

		$exM = $aluno->matriculaExist();

		if ($exM == false){
			header("Location: indexLogin.php?erro=preC");
		}else{
			$aluno->setMatricula($exM);
			setcookie("matricula", $exM);
			$email = $aluno->PegaEmail();
			$preC = $aluno->preCadastro();

			if ($preC == true){
				header("Location: phpmailer/email.php?email=$email&matricula=$exM");
			}else{
				header("Location: indexLogin.php?erro=preCadR");
			}
		}
	}

	if (isset($_POST["cadA"])){

		$aluno= new Aluno;
		$jurado= new Jurado;
		$adm= new Adm;
		$aluno->setNome($_POST["nome"]);
		$aluno->setUsuario($_POST["usuario"]);
		$aluno->setSenha($_POST["senha"]);
		$aluno->setCidade($_POST["cidade"]);
		$aluno->setTelefone($_POST["telefone"]);
		$aluno->setUnidadeInstituicao($_POST["unidade"]);
		$aluno->setMatricula($_COOKIE["matricula"]);

		$idPC = $aluno->FindIdPreCadastro();

		$aluno->setIdPreCadastro($idPC);
		
		$jurado->setUsuario($_POST["usuario"]);
		$adm->setUsuario($_POST["usuario"]);
		
		$unicoU = $aluno->userUnico();
		$unicoU2 = $jurado->userUnico();
		$unicoU3 = $adm->userUnico();

		//echo $_COOKIE["matricula"];

		if ($unicoU == true and $unicoU2 == true and $unicoU3 == true and $_POST["confirmS"] == $_POST["senha"]){
			$aluno->insertAluno();		
			header("Location: indexLogin.php?sucesso=SucessoCadA");
		}else if ($unicoU != true or $unicoU2 != true or $unicoU3 != true){
			header("Location: cadAluno.php?erro=erroU");
		}else if ($_POST["confirmS"] != $_POST["senha"]){
			header("Location: cadAluno.php?erro=erroS");
		}	
	}


?>