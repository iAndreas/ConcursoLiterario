<?php
session_start();
require_once "autoload.php";

 class Login{

   public function deslogar(){
      session_destroy();
      header("Location: indexLogin.php");
   }
}
?>