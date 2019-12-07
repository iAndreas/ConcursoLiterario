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

}

?>