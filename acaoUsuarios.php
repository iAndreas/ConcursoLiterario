<?php
	require_once "autoload.php";

	if (isset($_POST["login"])){
		$aluno= new Aluno;
		$jurado= new Jurado;
		$adm= new Adm;

		$setAlunoU = $aluno->setUsuario($_POST["usuario"]);
		$setJuradoU = $jurado->setUsuario($_POST["usuario"]);
		$setAdmU = $adm->setUsuario($_POST["usuario"]);

		$userIsAluno = $aluno->userUnico();
		$userIsJurado = $jurado->userUnico();
		$userIsAdm = $adm->userUnico();

		if ($userIsAluno == true and $userIsJurado == true and $userIsAdm == true){
			header("Location: indexLogin.php?erro=erLog2");
		}else if ($userIsAluno == false){

			$aluno->setSenha($_POST["senha"]);

			$logar = $aluno->Logar();
			
			if($logar == "foi"){
				header("Location: page_aluno.php");
			}else if($logar == "erro1"){
				header("Location: indexLogin.php?erro=erLog1");
			}else if($logar == "erro2"){
				header("Location: indexLogin.php?erro=erLog2");
			}
		}else if ($userIsJurado == false){

			$jurado->setSenha($_POST["senha"]);

			$logar = $jurado->Logar();
			
			if($logar == "foi"){
				header("Location: page_jurado.php");
			}else if($logar == "erro1"){
				header("Location: indexLogin.php?erro=erLog1");
			}else if($logar == "erro2"){
				header("Location: indexLogin.php?erro=erLog2");
			}
		}else if ($userIsAdm == false){

			$adm->setSenha($_POST["senha"]);

			$logar = $adm->Logar();
			
			if($logar == "foi"){
				header("Location: page_adm.php");
			}else if($logar == "erro1"){
				header("Location: indexLogin.php?erro=erLog1");
			}else if($logar == "erro2"){
				header("Location: indexLogin.php?erro=erLog2");
			}
		}
	}
?>