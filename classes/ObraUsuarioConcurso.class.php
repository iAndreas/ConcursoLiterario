<?php

require_once "autoload.php";

class ObraUsuarioConcurso{
 private $idaluno, $numinscri, $idcategoria;

 public function getIdaluno(){
   return $this->idaluno;
 }

 public function setIdaluno(Aluno $codigo){
   $this->idaluno = $idaluno;
 }

 public function getNuminscri(){
   return $this->numinscri;
 }

 public function setNuminscri(Obra $codigo){
   $this->turma = $turma;
 }

 public function getIdcategoria(){
   return $this->idcategoria;
 }

 public function setIdcategoria(Categoria $codigo){
   $this->idcategoria = $idcategoria;
 }

//  public function insertObra(){
//   try {
//     $banco= Conexao::getInstance();
//     $pdo= $banco->getConexao();
//     $stmt = $pdo->prepare('INSERT INTO inscricaotexto (pseudonimo, turma, concurso_idconcurso) VALUES(:pseudonimo, :turma, :idconcurso)');
//     $stmt->bindParam(':pseudonimo', $this->pseudonimo);
//     $stmt->bindParam(':turma', $this->turma);
//     $stmt->bindParam(':idconcurso', $this->idconcurso);
//     $stmt->execute();
//     if ($stmt->rowCount() == 0) {
//       var_dump($stmt->errorInfo());
//     }else{
//       return true;
//     }
//     } catch(PDOException $e) {
//       return 'Error: ' . $e->getMessage();
//   }
// }
}
?>