<?php

require_once "autoload.php";

class Obra{
 private $inscricao, $pseudonimo, $turma, $idconsurso;

 public function getInscricao(){
   return $this->inscricao;
 }

 public function setInscricao($inscricao){
   $this->inscricao = $inscricao;
 }

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
}
?>