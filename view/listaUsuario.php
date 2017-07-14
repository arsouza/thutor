<?php include('menu.php');?> 
<?php
  require_once('../controller/usuario.php');
  Processo('consultar');
?>
<br>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">Usuarios </div>
        <table class="table table-striped">
            <thead align="center">
            <td><b>ID</b></td>
            <td><b>NOME</b></td>
            <td><b>DATA NASCIMENTO</b></td>
            <td><b>TELEFONE RESIDENCIAL</b></td>
            </thead>
            <?php foreach($rs as $row) { ?>
                <tbody align="center">
                <td><?=$row['ID'];?> </td>
                <td><?=utf8_encode($row['NOME']);?> </td>
                <td><?=$row['DATA_NASCIMENTO'];?> </td>
                <td><?=$row['TELEFONE_RESIDENCIAL'];?> </td>                
                <td>
                    <a href="alterarUsuario.php?ID=<?=$row['ID'];?>"><button type="button" class="btn btn-primary">Editar</button></a>
                    <a href="listaUsuario.php?OK=excluir&id=<?=$row['ID'];?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>              
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>