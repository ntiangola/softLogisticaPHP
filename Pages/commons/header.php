
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Fixed Top Navbar Example for Bootstrap</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script type="text/javascript" src="../Apllication/core/lib/UIComponent/nakassonyComponent.js"></script>
    <script>
     window.addEventListener('load',defineComponent,true);
     window.addEventListener('load',selectInit,true);
      
    function selectInit() {
                populateSelect('Funcionario.departamento', '<?php echo @$funcionarioById[0]->departamento; ?>');
            }
            function populateSelect(elm, value) {
                try {
                    document.getElementById(elm).value = value;
                } catch (e) {
                    //  
                }
            }
          
        </script>
        
        <style>
            div.topo {
                padding-top: 90px;
            }
            .mt-1{
                margin-top: 25px;
            }
        </style>
  </head>

  <body>

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">SoftLogistica</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
              <li><a href="/projectos/softLogistica/Pages/requisicao.php">Requisição</a></li>
              <li><a href="/projectos/softLogistica/Pages/funcionario.php">Funcionario</a></li>
              <li><a href="/projectos/softLogistica/Pages/produto.php">Produto</a></li>
              <li><a href="/projectos/softLogistica/Pages/fornecedor.php">Fornecedor</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
                <a href="../Pages/admin/logout.php">Sair</a>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    