<?php
require_once "autoload.php";

 class Concurso {
  private $idconcurso, $regulamento, $datai, $dataf;

  public function getRegulamento(){
    return $this->regulamento;
  }

  public function setRegulamento($regulamento){
    $this->regulamento = $regulamento;
  }

  public function getIdconcurso(){
    return $this->idconcurso;
  }

  public function setIdconcurso($idconcurso){
    $this->idconcurso = $idconcurso;
  }

  public function getDatai(){
    return $this->datai;
  }

  public function setDatai($datai){
    $this->datai = $datai;
  }

  public function getDataf(){
    return $this->dataf;
  }

  public function setDataf($dataf){
    $this->dataf = $dataf;
  }

?>