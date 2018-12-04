<?php
include '../Apllication/core/FacadePrincipal.php';
$funcionarios = $facadePrincipal->funcionarioController()->getDTO()->findAllFuncionario();
$funcionarioById = $facadePrincipal->funcionarioController()->getDTO()->findFuncionarioById(@$_GET['id']);

require '../Pages/commons/header.php';
?>

<div class="container topo">
    <form method="post" action="../controllerGateway.php?controller=Funcionario&method=save" class="form-horizontal">
         <input type="hidden" name="field[Funcionario.id]" value="<?php echo @$funcionarioById[0]->id; ?>">
        <fieldset>
            <label for="field[Funcionario.nom]">Nome:</label>
            <input class="form-control" type="text" name="field[Funcionario.nome]" value="<?php echo @$funcionarioById[0]->nome; ?>">
            <label for="field[Funcionario.cargo]">Cargo:</label>
            <input class="form-control" type="text" name="field[Funcionario.cargo]" value="<?php echo @$funcionarioById[0]->cargo; ?>">

            <label for="field[Funcionario.departamento]">Referência:</label><select class="form-control" name="field[Funcionario.departamento]" id="Funcionario.departamento">
                <option value="">Selecione</option>
                <option value="DIR">DIR</option>
                <option value="DOF">DOF</option>
                <option value="DF">DF</option>
            </select>
            <br>

            <input class="btn btn-primary" type="submit" value="Cadastrar" style="margin-bottom: 10px">
            <?php if (@count(@$_GET['id']) == 1) { ?>
                <nakassonyActionButton id="btnAct" value="Actualizar" action="actualizarFuncionario"></nakassonyActionButton>
                <?php } ?>
        </fieldset>
    </form>
    <table class="table table-bordered">
        <tr>
            <td>Nº</td>
            <td>Nome</td>
            <td>Cargo</td>
            <td>Departamento</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($funcionarios as $f) { ?>
            <tr>
                <td><?php echo "F0" . $f->id ?></td>
                <td><?php echo $f->nome ?></td>
                <td><?php echo $f->cargo ?></td>
                <td><?php echo $f->departamento ?></td>
                <td>
                    <a href="funcionario.php?id=<?php echo $f->id ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Funcionario&method=excluir&field[Funcionario.id]=<?php echo $f->id ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>