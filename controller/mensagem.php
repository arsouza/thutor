<?php
  require_once("../model/Mensagem.php");
function Processo($Processo) {
    switch ($Processo) { 
        case 'consultar':
            global $rs; //
            $mensagem = new Mensagem();
            $mensagem->consultar("SELECT U.NOME, M.MENSAGEM, DATE_FORMAT(M.DATA_ENVIO, \"%d/%m/%Y\") AS DATA_ENVIO FROM MENSAGEM M INNER JOIN USUARIO U ON U.ID = M.FK_USUARIO_ID");
            $rs = $mensagem->Result;
            break;        
    }
}
