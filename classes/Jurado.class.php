<?php
require_once "autoload.php";

 class Jurado extends AbsClassCodigoNome{

  private $email, $telefone;

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

 	public function userUnico(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM jurado WHERE usuario = :usuario');
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

  public function Logar(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM jurado WHERE usuario = :usuario');
        $usuario= parent::getUsuario();
        $senha= parent::getSenha();
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $d_usuario = $stmt->fetchAll();   
        if(count($d_usuario) == 1){                
           if($d_usuario[0]['senha'] == sha1($senha)){
              $_SESSION["codigo"] = $d_usuario[0]["idJurado"];
              $_SESSION["nome"] = $d_usuario[0]["nome"];
              $_SESSION["usuario"] = $d_usuario[0]["usuario"];
              $_SESSION["senha"] = $d_usuario[0]["senha"];
              $_SESSION["email"] = $d_usuario[0]["email"];
              $_SESSION["telefone"] = $d_usuario[0]["telefone"];
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