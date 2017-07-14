<?php include('menu.php'); // ----- CARREGA O MENU ----- // ?> 

<?php include('default.php');  // ----- CARREGA A DEFAULT----- // ?>

<?php
require_once('../controller/ControleUsuario.php'); // ----- CARREGA O CONTROLE ----- //
Processo('consultar'); // ----- PASSA O PROCESSO AO CONTROLE ----- //
?>

<br>

<div class="container">

    <div class="panel panel-primary">

        <div class="panel-heading">Usuarios </div>

        <table class="table table-striped">
            <thead align="center">
            <td><b>COD</b></td>
            <td><b>NOME</b></td>
            <td><b>EMAIL</b></td>
            <td><b>SENHA</b></td>
            </thead>

            <?php while ($row = mysqli_fetch_array($rs)) { ?>
                <tbody align="center">
                <td> <?php echo $row['id']; ?> </td>
                <td> <?php echo $row['nome']; ?> </td>
                <td> <?php echo $row['email']; ?> </td>
                <td> <?php echo $row['senha']; ?> </td>
                <td>
                    <a href="editarusuario.php?id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-primary">Editar</button></a>
                    <a href="consultarusuario.php?ok=excluir&id=<?php echo $row['id']; ?>"><button type="button" class="btn btn-danger">Excluir</button></a></td>

                </tbody>
            <?php } ?>
        </table>


    </div>
</div>