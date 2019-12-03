<?php
require_once "autoload.php";

if (isset($_POST["acao"])) {
    $concurso = new concurso;
    $concurso->setRegulamento($_POST["regulamento"]);
    $concurso->setDatai($_POST["datai"]);
    
    $concurso->setDataf($_POST["dataf"]);




    /* $unicoU = $concurso->userUnico();
    $unicoU2 = $aluno->userUnico();
    $unicoU3 = $adm->userUnico();
    $unicoE = $concurso->emailUnico();

    if ($unicoU == true and $unicoU2 == true and $unicoU3 == true and $unicoE == true and $_POST["confirmS"] == $_POST["senha"]) {
        $concurso->insertConcurso();
        header("Location: juradoInsereTeste.php?sucesso=SucessoCadJ");
    } else if ($unicoU != true or $unicoU2 != true or $unicoU3 != true) {
        header("Location: cadconcurso.php?erro=erroU");
    } else if ($unicoE != true) {
        header("Location: cadconcurso.php?erro=erroE");
    } else if ($_POST["confirmS"] != $_POST["senha"]) {
        header("Location: cadconcurso.php?erro=erroS");
    }  */
}
