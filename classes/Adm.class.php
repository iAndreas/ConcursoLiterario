<?php
session_start();
require_once "autoload.php";

 class Adm extends AbsClassCodigoNome{

 	public function userUnico(){
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM adm WHERE usuario = :usuario');
        $usuario= parent::getUsuario();
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        
        if (count($stmt->fetchAll()) == 0) {
          return true;  
        }else{
          return false;
        }
        } catch(PDOException $e) {
          return 'Error: ' . $e->getMessage();
      }
    }

  public function Logar(){
      session_start();
      try {
        $banco= Conexao::getInstance();
        $pdo= $banco->getConexao();
        $stmt = $pdo->prepare('SELECT * FROM adm WHERE usuario = :usuario');
        $usuario= parent::getUsuario();
        $senha= parent::getSenha();
        $stmt->bindParam(':usuario', $usuario);
        $stmt->execute();
        $d_usuario = $stmt->fetchAll();   
        if(count($d_usuario) == 1){                
           if($d_usuario[0]['senha'] == sha1($senha)){
              $_SESSION["codigo"] = $d_usuario[0]["idAdm"];
              $_SESSION["nome"] = $d_usuario[0]["nome"];
              $_SESSION["usuario"] = $d_usuario[0]["usuario"];
              $_SESSION["senha"] = $d_usuario[0]["senha"];
              $_SESSION["logadoAdm"] = true;
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