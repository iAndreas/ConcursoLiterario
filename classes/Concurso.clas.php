<?php
require_once "autoload.php";

class Concurso
{
    private $idconcurso, $regulamento, $datai, $dataf;

    public function getRegulamento()
    {
        return $this->regulamento;
    }

    public function setRegulamento($regulamento)
    {
        $this->regulamento = $regulamento;
    }

    public function getIdconcurso()
    {
        return $this->idconcurso;
    }

    public function setIdconcurso($idconcurso)
    {
        $this->idconcurso = $idconcurso;
    }

    public function getDatai()
    {
        return $this->datai;
    }

    public function setDatai($datai)
    {
        $this->datai = $datai;
    }

    public function getDataf()
    {
        return $this->dataf;
    }

    public function setDataf($dataf)
    {
        $this->dataf = $dataf;
    }

    public function insertConcurso()
    {
        try {
            $banco = Conexao::getInstance();
            $pdo = $banco->getConexao();
            $stmt = $pdo->prepare('INSERT INTO concurso (regulamento, dataI, dataF) VALUES( :regulamento, :dataI, :dataF)');
            $regulamento = parent::getRegulamento();
            $datai = parent::getDatai();
            $dataf = (parent::getDataf());
            $stmt->bindParam(':regulamento', $regulamento);
            $stmt->bindParam(':dataI', $datai);
            $stmt->bindParam(':dataF', $dataf);
            $stmt->execute();
            if ($stmt->rowCount() == 0) {
                var_dump($stmt->errorInfo());
            } else {
                return true;
            }
        } catch (PDOException $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
