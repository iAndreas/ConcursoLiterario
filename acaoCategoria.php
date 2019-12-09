<?php
    require_once "autoload.php";
	if (isset($_POST["cadC"])){

		$categoria= new Categoria;
		$categoria->setTipo($_POST["tipo"]);
		$categoria->insertCategoria();
#		if ($unicoU == true and $unicoU2 == true and $unicoU3 == true and $_POST["confirmS"] == $_POST["senha"]){
#			$aluno->insertAluno();		
#			header("Location: indexLogin.php?sucesso=SucessoCadA");
#		}else if ($unicoU != true or $unicoU2 != true or $unicoU3 != true){
#			header("Location: cadAluno.php?erro=erroU");
#		}else if ($_POST["confirmS"] != $_POST["senha"]){
#			header("Location: cadAluno.php?erro=erroS");
#		}
        header("Location: cadCategoria.php?sucesso=SucessoCadC");
	}


?>