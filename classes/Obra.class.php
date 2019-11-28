<?php

require_once "autoload.php";

class Obra{
 private $pseudonimo, $turma, $idconsurso;

 public function getPseudonimo(){
   return $this->pseudonimo;
 }

 public function setPseudonimo($pseudonimo){
   $this->pseudonimo = $pseudonimo;
 }

 public function getTurma(){
   return $this->turma;
 }

 public function setTurma($turma){
   $this->turma = $turma;
 }

 public function getIdconcurso(){
   return $this->idconcurso;
 }

 public function setIdconcurso($idconcurso){
   $this->idconcurso = $idconcurso;
 }

 public function insertObra(){
  try {
    $banco= Conexao::getInstance();
    $pdo= $banco->getConexao();
    $stmt = $pdo->prepare('INSERT INTO inscricaotexto (pseudonimo, turma, concurso_idconcurso) VALUES(:pseudonimo, :turma, :idconcurso)');
    $stmt->bindParam(':pseudonimo', $this->pseudonimo);
    $stmt->bindParam(':turma', $this->turma);
    $stmt->bindParam(':idconcurso', $this->idconcurso);
    $stmt->execute();
    if ($stmt->rowCount() == 0) {
      var_dump($stmt->errorInfo());
    }else{
      return true;
    }
    } catch(PDOException $e) {
      return 'Error: ' . $e->getMessage();
  }
}
}
?>