<?php
  require_once('database.php');
class Usuario {

    public function incluir() { 
        /*$insert = 'insert into usuario(nome, email, senha)values("' . $nome . '","' . $email . '","' . $senha . '")';
        $Acesso = new Acesso();
        $Acesso->Conexao();
        $Acesso->Query($insert);*/
    }
    
    public function consultar($sql) {
        $Acesso = new Acesso();
        $Acesso->Conexao();
        $this->Result = $Acesso->Query($sql);
    }
    
    public function excluir($id) {
        $delete = 'DELETE FROM USUARIO WHERE ID = "' . $id . '"';
        $Acesso = new Acesso();
        $Acesso->Conexao();
        return $Acesso->Query($delete);
    }
    
    public function alterar($id) {       
        extract($_REQUEST);
        $CEP = preg_replace("/[^0-9]/", "", $CEP);
        $TELEFONE_RESIDENCIAL = preg_replace("/[^0-9]/", "", $TELEFONE_RESIDENCIAL);
        $update = "UPDATE USUARIO SET NOME = '{$NOME}', DATA_NASCIMENTO = '{$DATA_NASCIMENTO}', BIOGRAFIA = '{$BIOGRAFIA}', CEP = '{$CEP}', ENDERECO = '{$ENDERECO}', ENDERECO_NUMERO = '{$ENDERECO_NUMERO}', BAIRRO = '{$BAIRRO}', COMPLEMENTO = '{$COMPLEMENTO}', CIDADE = '{$CIDADE}', UF = '{$UF}', TELEFONE_RESIDENCIAL = '{$TELEFONE_RESIDENCIAL}' WHERE ID = {$id}";
        $Acesso = new Acesso();
        $Acesso->Conexao();
        $Acesso->Query(utf8_decode($update));
        $this->Result = $Acesso->result;
    }
}
