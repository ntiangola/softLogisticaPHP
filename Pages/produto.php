<?php
include '../Apllication/core/FacadePrincipal.php';
$produtos = $facadePrincipal->produtoController()->getDTO()->findAll();
$produtosById = $facadePrincipal->produtoController()->getDTO()->findAllProdById(@$_GET['id']);

require '../Pages/commons/header.php';
?>

<script>
    window.addEventListener('load', defineComponent, true);
    window.addEventListener('load', selectInit, true);

    function selectInit() {
        populateSelect('Produto.categoria', '<?php echo @$produtosById[0]->categoria; ?>');
    }
    function populateSelect(elm, value) {
        try {
            document.getElementById(elm).value = value;
        } catch (e) {
            //  
        }
    }

</script>
<div class="container topo">
    <form method="post" action="../controllerGateway.php?controller=Produto&method=save">
        <input type="hidden" name="field[Produto.id]" value="<?php echo @$produtosById[0]->id; ?>">
        <fieldset>

            Referência:<select class="form-control" name="field[Produto.categoria]" id="Produto.categoria">
                <option value="">Selecione</option>
                <option value="Produto">Produto</option>
                <option value="Serviço">Serviço</option>
            </select>
            <br>
            <label for="field[Produto.nome]">Nome:</label>
            <input class="form-control" type="text" name="field[Produto.nome]" value="<?php echo @$produtosById[0]->nome; ?>">
            <input class="btn btn-primary" type="submit" value="cadastrar" style="margin: 20px 0px">
            <?php if (@count(@$_GET['id']) == 1) { ?>
                <nakassonyActionButton id="btnAct" value="Actualizar" action="actualizarProduto"></nakassonyActionButton>
                <?php } ?>
        </fieldset>
    </form>
    <table class="table table-bordered">
        <tr>
            <td>Categoria</td>
            <td>Nome</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($produtos as $p) { ?>
            <tr>
                <td><?php echo $p->categoria ?></td>
                <td><?php echo $p->nome ?></td>
                <td>
                    <a href="produto.php?id=<?php echo $p->id ?>"><span class="glyphicon glyphicon-edit"></span>Editar</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Produto&method=excluir&field[Produto.id]=<?php echo $p->id ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>