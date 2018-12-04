<?php
session_start();
include '../Apllication/core/FacadePrincipal.php';
$produto = $facadePrincipal->produtoController()->getDTO()->findAll();
$funcionarios = $facadePrincipal->funcionarioController()->getDTO()->findAllFuncionario();
$itensBySessao = $facadePrincipal->requisicaoController()->getDTO()->intensBySessao(isset($_SESSION['requisicaoSessao']) ? $_SESSION['requisicaoSessao'] : NULL);
$requisicao = $facadePrincipal->requisicaoController()->getDTO()->findRequisicao();

require '../Pages/commons/header.php';
?>
<script>
    window.addEventListener('load', defineComponent, true);

    function iserirItemRequisicao(id) {
        var linha = document.createElement('tr');
        linha.id = "ItemRequisicao" + id;
        var servico = document.createElement('td');
        var valor = document.createElement('td');
        var valorSelecionado = idProduto.getElementsByTagName("option")[idProduto.selectedIndex].innerHTML;
        var contServico = document.createTextNode(valorSelecionado);
        var valorCusto = qtdRequisicao.value;
        var conteudoValor = document.createTextNode(valorCusto);
        var eliminar = document.createElement('td');
        var linkEliminar = "";
        eliminar.innerHTML = linkEliminar;

        servico.appendChild(contServico);
        valor.appendChild(conteudoValor);
        linha.appendChild(servico);
        linha.appendChild(valor);
        linha.appendChild(eliminar);
        tabelaDeItens.appendChild(linha);
        idProduto.value = "";
        qtdRequisicao.value = "";

    }

    function enviarItens() {
        var xhr = new XMLHttpRequest();
        var qtd = qtdRequisicao.value;
        var rf = idProduto.value;
        var param = "&field[ItensRequisicao.idProduto]=" + rf + "&field[ItensRequisicao.qtd]=" + qtd;
        var url = "../controllerGateway.php?controller=Requisicao&method=enviarItemRequisicao" + param;
        xhr.open("GET", url, true);
        xhr.send();
        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4) {
                iserirItemRequisicao(xhr.responseText);

            }
        }
    }

</script>
<div class="container topo">
    <form method="post" action="../controllerGateway.php?controller=Requisicao&method=saveRequisicao">
        <input type="hidden" name="field[Requisicao.id]" value="<?php echo @$funcionarioById[0]->id; ?>">
        <fieldset>
            <label for="field[Requisicao.idFuncionario]">Nº Funcionário:</label>
            <input class="form-control" type="text" name="field[Requisicao.idFuncionario]" value="<?php echo @$funcionarioById[0]->a; ?>">
            <label for="idProduto">Ref:</label>
            <select class="form-control" name="idProduto" id="idProduto">
                <option value="">Selecione</option>
                <?php foreach ($produto as $prod) { ?>
                    <option value="<?php echo $prod->id ?>"><?php echo $prod->nome ?></option>
                <?php } ?>
            </select>
            <label for="qtdRequisicao">Quantidade:</label>
            <input class="form-control" type="text" name="qtdRequisicao" id="qtdRequisicao" value="<?php echo @$funcionarioById[0]->cargo; ?>"><br>

            <a href="#" onclick="enviarItens()" class="btn btn-primary">Adicionar</a>
        </fieldset>


        <!-- ##########INICIO TABELA DE ITENS CORRENTE -->
        <div class="mt-1"></div>
        <table class="table table-bordered" width="100%" id="tabelaDeItens" name="tabelaDeItens">
            <thead>
                <tr>
                    <th colspan="3" align="center">
                        Itens da Requisão
                    </th>
                </tr>
                <tr>
                    <td>Referência</td>
                    <td>Qtd</td>
                    <td>Oprações</td>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($itensBySessao as $req) { ?>
                    <tr id="ItemRequisicao<?php echo $req->id; ?>">
                        <th><?php echo $req->nome; ?></th>
                        <th><?php echo $req->qtd; ?></th>
                        <th><a href="#" onclick="">Eliminar</a></th>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <!-- ##########FIM TABELA DE ITENS CORRENTE -->

        <input class="btn btn-success" type="submit" value="Requisitar">
    </form>

    <div class="mt-1"></div>

    <table class="table table-bordered">
        <tr>
            <td>Ref</td>
            <td>Nome</td>
            <td>Departamento</td>
            <td>Data da Requisição</td>
            <td>Operações</td>
        </tr>
        <?php foreach ($requisicao as $rq) { ?>
            <tr>
                <td><?php echo "RA0" . $rq->id ?></td>
                <td><?php echo $rq->nome ?></td>
                <td><?php echo $rq->departamento ?></td>
                <td><?php echo $rq->data ?></td>
                <td>
                    <a href="../controllerGateway.php?controller=Requisicao&method=changeStatus&field[Requisicao.sessao]=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-ok"></span>Aprovar Requisição</a>
                    <a style="color: red" href="../controllerGateway.php?controller=Requisicao&method=excluir&field[Requisicao.sessao]=<?php echo $rq->sessao ?>"><span class="glyphicon glyphicon-trash"></span>Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>