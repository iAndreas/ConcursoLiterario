<?php

require_once "autoload.php";

class Categoria{
 private $codigo, $tipo;

 public function getCodigo(){
   return $this->codigo;
 }

 public function setCodigo($codigo){
   $this->codigo = $codigo;
 }

 public function getTipo(){
    return $this->tipo;
  }
 
  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function insertCategoria(){
    try {
      $banco= Conexao::getInstance();
      $pdo= $banco->getConexao();
      $stmt = $pdo->prepare('INSERT INTO categoria (tipo) VALUES(:tipo)');
      $stmt->bindParam(':tipo', $this->tipo);
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