<?php
class Acesso {   

    //dados de acesso do banco de dados
    private $user = 'root';
    private $password = '';
    private $pdo_string = 'mysql:host=localhost;dbname=thutor';
    //variavel de conexao
    private $conexao;
    public function Conexao(){
        try{
          $this->conexao = new PDO($this->pdo_string, $this->user, $this->password);
        }
        catch(PDOException $error){
          echo $error->getMessage();
        }  
    }

    public function Query($sql) {
       $pSQL = $this->conexao->prepare($sql);
       if ($pSQL->execute()){
         return $pSQL->fetchAll(PDO::FETCH_ASSOC);
      }
      else{
        return false;}
    }
   
    public function __destruct() {
        unset($this->conexao);
    }
}
?> 

