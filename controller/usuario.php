<?php
  require_once("../model/Usuario.php");
function Processo($Processo) {
    switch ($Processo) {
        case 'incluir':
            global $rs;
            $usuario = new Usuario();
            $usuario->consultar("SELECT * FROM USUARIO");
            $rs = $usuario->Result;
            if ($_POST['OK'] == 'true') {
                $usuario->incluir($_POST['nome'], $_POST['email'],$_POST['senha']);
                echo '<script>alert("Cadastrado com sucesso !");</script>';
                echo '<script>window.location="index.php";</script>';
            }
            break;

        case 'consultar':
            global $rs; //
            $usuario = new Usuario();
            $usuario->consultar("SELECT ID, NOME, DATE_FORMAT(DATA_NASCIMENTO, \"%d/%m/%Y\") DATA_NASCIMENTO, BIOGRAFIA, DATA_CRIACAO, CEP, ENDERECO, ENDERECO_NUMERO, BAIRRO, COMPLEMENTO, CIDADE, UF, TELEFONE_RESIDENCIAL FROM USUARIO");
            $linha = $usuario->Linha;
            $rs = $usuario->Result;
            if ($_GET['OK'] == "excluir"){
                if ($usuario->excluir($_GET['id']) === false){
                  echo '<script>alert("O registro não pode ser excluído, verifique se ele possui algum vinculo com outra tabela!");</script>';                                   
                }
                else{
                  echo '<script>alert("Excluido com sucesso !");</script>';
                  echo '<script>window.location="listaUsuario.php";</script>';
                }
            }
            break;

        case 'alterar':
            global $rs;
            $usuario = new Usuario();
            $usuario->consultar("SELECT * FROM USUARIO WHERE ID = " . $_GET['ID']);
            $rs = $usuario->Result;
            if ($_POST['OK'] == "true") {
                $usuario->alterar($_GET['ID']);
                echo '<script>alert("Alterado com sucesso !");</script>';
                echo '<script>window.location="listaUsuario.php";</script>';
            }
            break;
    }
}
