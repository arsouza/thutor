<?php
  require_once('database.php');
  class Mensagem{      
      public function consultar($sql) {
          $Acesso = new Acesso();
          $Acesso->Conexao();
          $this->Result = $Acesso->Query($sql);;
      }
  }
?>
