<?php include('menu.php');?> 
<?php
  require_once('../controller/mensagem.php');
  Processo('consultar');
?>
<br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Mensagens</div>
        <table class="table table-striped ">
            <thead align="center">
            <td><b>NOME</b></td>
            <td><b>MENSAGEM</b></td>
            <td><b>DATA DO ENVIO</b></td>
            </thead>
            <?php foreach($rs as $row) { ?>
                <tbody align="center">
                <td> <?=utf8_encode($row['NOME']);?> </td>
                <td> <?=utf8_encode($row['MENSAGEM']);?> </td>
                <td> <?=$row['DATA_ENVIO'];?> </td>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>