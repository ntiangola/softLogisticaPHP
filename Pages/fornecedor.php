<?php
include '../Apllication/core/FacadePrincipal.php';
$fornecedor = $facadePrincipal->fornecedorController()->getDTO()->findFornecedor();
$fornecedorById = $facadePrincipal->fornecedorController()->getDTO()->findFornecedorById(@$_GET['id']);

include '../Pages/commons/header.php';
?>
<div class="container topo" >
    <form method="post" action="../controllerGateway.php?controller=Fornecedor&method=save" class="form-horizontal">
        <input type="hidden" name="field[Fornecedor.id]" value="<?php echo @$fornecedorById[0]->id ?>">
        <fieldset>
            <legend>Dados Fornecedor</legend>
            <label for="field[Fornecedor.nome]">Fornecedor:</label>
            <input class="form-control" type="text" name="field[Fornecedor.nome]" value="<?php echo @$fornecedorById[0]->nome ?>">
            <label for="field[Fornecedor.razaoSocial]">Razão Social:</label>
            <input class="form-control" type="text" name="field[Fornecedor.razaoSocial]" value="<?php echo @$fornecedorById[0]->razaoSocial ?>">
            <label for="field[Fornecedor.email]">Email:</label>
            <input class="form-control" type="text" name="field[Fornecedor.email]" value="<?php echo @$fornecedorById[0]->email ?>">
            <label for="field[Fornecedor.bairro]">Bairro:</label>
            <input class="form-control" type="text" name="field[Fornecedor.bairro]" value="<?php echo @$fornecedorById[0]->bairro ?>">
            <label for="field[Fornecedor.telefone]">Telefone:</label>
            <input class="form-control" type="text" name="field[Fornecedor.telefone]" value="<?php echo @$fornecedorById[0]->telefone ?>">
            <label for="field[Fornecedor.cp]">Cp:</label>
            <input class="form-control" type="text" name="field[Fornecedor.cp]" value="<?php echo @$fornecedorById[0]->cp ?>">
            <label for="field[Fornecedor.fax]">Fax:</label>
            <input class="form-control" type="text" name="field[Fornecedor.fax]" value="<?php echo @$fornecedorById[0]->fax ?>">
            <label for="field[Fornecedor.cidade]">Cidade:</label>
            <input class="form-control" type="text" name="field[Fornecedor.cidade]" value="<?php echo @$fornecedorById[0]->cidade ?>">
            <label for="field[Fornecedor.site]">Site:</label>
            <input class="form-control" type="text" name="field[Fornecedor.site]" value="<?php echo @$fornecedorById[0]->site ?>">
        </fieldset>
        <fieldset style="margin-top: 30px">
            <legend>Dados Representante</legend>
            <label for="field[Representante.nome]">Representante:</label>
            <input class="form-control" type="text" name="field[Representante.nome]" value="<?php echo @$fornecedorById[0]->representante ?>">
            <label for="field[Representante.bairro]">Bairro:</label>
            <input class="form-control" type="text" name="field[Representante.bairro]" value="<?php echo @$fornecedorById[0]->bairroR ?>">
            <label for="field[Representante.email]">Email:</label>
            <input class="form-control" type="text" name="field[Representante.email]" value="<?php echo @$fornecedorById[0]->emailR ?>">
            <label for="field[Representante.cidade]">Cidade:</label>
            <input class="form-control" type="text" name="field[Representante.cidade]" value="<?php echo @$fornecedorById[0]->cidadeR ?>">
        </fieldset>
        <input class="btn btn-primary" type="submit" value="Cadastrar" style="margin: 10px 0px;">
        <?php if (@count(@$_GET['id']) == 1) { ?>
            <nakassonyActionButton id="btnAct" value="Actualizar" action="actualizarFornecedor"></nakassonyActionButton>
        <?php } ?>
    </form>
    <table class="table table-bordered"style="margin-top: 50px;">
        <tr>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Fornecedor</td>
            <td>Site</td>
            <td>Representante</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($fornecedor as $f) { ?>
            <tr>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->site ?></td>
                <td><?php echo $f->representante ?></td>
                <td>
                    <a href="fornecedor.php?id=<?php echo $f->id ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Fornecedor&method=excluir&field[Fornecedor.id]=<?php echo $f->id ?>&field[Representante.id]=<?php echo $f->idRepresentante ?>"><span class="glyphicon glyphicon-trash" style="color: red"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>