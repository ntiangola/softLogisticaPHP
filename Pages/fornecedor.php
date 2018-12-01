<?php
include '../Apllication/core/FacadePrincipal.php';
$fornecedor = $facadePrincipal->fornecedorController()->getDTO()->findFornecedor();

 ?>

<!DOCTYPE html>
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
    <body>
        <div>
            <form method="post" action="../controllerGateway.php?controller=Fornecedor&method=save">
                Fornecedor:<input type="text" name="field[Fornecedor.nome]">
                Site:<input type="text" name="field[Fornecedor.site]">
                Representante:<input type="text" name="field[Representante.nome]">
                <input type="submit" value="cadastrar">
            </form>
            <table >
                <tr>
                    <td>Fornecedor</td>
                    <td>site</td>
                    <td>Representante</td>
                </tr>
                <?php foreach ($fornecedor as $f){ ?>
                <tr>
                    <td><?php echo $f->nome ?></td>
                    <td><?php echo $f->site ?></td>
                    <td><?php echo $f->representante ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>