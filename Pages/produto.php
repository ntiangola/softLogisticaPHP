<?php
include '../Apllication/core/FacadePrincipal.php';
$produtos = $facadePrincipal->produtoController()->getDTO()->findAll();

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
            <form method="post" action="../controllerGateway.php?controller=Produto&method=save">
                Categoria:<input type="text" name="field[Produto.categoria]">
                Nome:<input type="text" name="field[Produto.nome]">
                <input type="submit" value="cadastrar">
            </form>
            <table >
                <tr>
                    <td>Categoria</td>
                    <td>Nome</td>
                </tr>
                <?php foreach ($produtos as $p){ ?>
                <tr>
                    <td><?php echo $p->categoria ?></td>
                    <td><?php echo $p->nome ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </body>
</html>