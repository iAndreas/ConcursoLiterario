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

			$preC = $aluno->preCadastro();

			if ($preC == true){
				header("Location: indexLogin.php?sucesso=preC");
			}else{
				header("Location: indexLogin.php?erro=preCadR");
			}
		}

		
	}


?>