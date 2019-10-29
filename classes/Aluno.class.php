<?php
require_once "autoload.php";

 class Aluno extends AbsClassCodigoNome{
  private $email, $cidade, $telefone, $unidadeInstituicao, $matricula;

  public function getCidade(){
    return $this->cidade;
  }

  public function setCidade($cidade){
    $this->cidade = $cidade;
  }

  public function getEmail(){
    return $this->email;
  }

  public function setEmail($email){
    $this->email = $email;
  }

  public function getTelefone(){
    return $this->telefone;
  }

  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }

  public function getUnidadeInstituicao(){
    return $this->unidadeInstituicao;
  }

  public function setUnidadeInstituicao($unidadeInstituicao){
    $this->unidadeInstituicao = $unidadeInstituicao;
  }

  public function getMatricula(){
    return $this->matricula;
  }

  public function setMatricula($matricula){
    $this->matricula = $matricula;
  }

  public function matriculaExist(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM pre_cadastro WHERE matricula = :matricula');
        $stmt->bindParam(':matricula', $this->matricula);
        $stmt->execute();
        $aluno = $stmt->fetchAll();
        if (count($aluno) == 1) {
          return $aluno[0]["matricula"]; 
        }else{
          return false;
        }
        } catch(PDOException $e) {
          return 'Error: ' . $e->getMessage();
      }
    }

  public function preCadastro(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('UPDATE pre_cadastro SET hash = :hash WHERE matricula = :matricula');
        $stmt->bindParam(':hash', hash("sha256", date().$this->matricula));
        $stmt->bindParam(':matricula', $this->matricula);
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

    public function userUnico(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM aluno WHERE usuario = :usuario');
        $usuario= parent::getUsuario();
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        
        if (count($stmt->fetchAll()) === 0) {
          return true;  
        }else{
          return false;
        }
        } catch(PDOException $e) {
          return 'Error: ' . $e->getMessage();
      }
    }

    public function emailUnico(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = :email');
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        if (count($stmt->fetchAll()) === 0) {
          return true;
        }else{
          return false;
        }
        } catch(PDOException $e) {
          return 'Error: ' . $e->getMessage();
      }
    }

    public function Logar(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM aluno WHERE usuario = :usuario');
        $usuario= parent::getUsuario();
        $senha= parent::getSenha();
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $d_usuario = $stmt->fetchAll();   
        if(count($d_usuario) == 1){                
           if($d_usuario[0]['senha'] == sha1($senha)){
              $_SESSION["codigo"] = $d_usuario[0]["idAluno"];
              $_SESSION["nome"] = $d_usuario[0]["nome"];
              $_SESSION["usuario"] = $d_usuario[0]["usuario"];
              $_SESSION["senha"] = $d_usuario[0]["senha"];
              $_SESSION["cidade"] = $d_usuario[0]["cidade"];
              $_SESSION["telefone"] = $d_usuario[0]["telefone"];
              $_SESSION["unidadeInstituicao"] = $d_usuario[0]["unidadeInstituicao"];
              $_SESSION["logado"] = true;
              return "foi";
           }else{
              $Erro = "erro1";
              return $Erro;
           }
        }else if(count($stmt->fetchAll()) === 0){
          $Erro= "erro2";
          return $Erro;
        }
      } catch(PDOException $e) {
          return 'Error: ' . $e->getMessage();
        }
  }
}
?>