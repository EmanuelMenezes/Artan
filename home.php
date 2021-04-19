<!--
=========================================================
Material Dashboard - v2.1.2
=========================================================

Product Page: https://www.creative-tim.com/product/material-dashboard
Copyright 2020 Creative Tim (https://www.creative-tim.com)
Coded by Creative Tim

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<?php 
session_start();

require('database.php');
if(!isset($_SESSION['Company']) || !isset($_SESSION['User'])){
  header('Location:index.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>
        Sistema de Gerenciamento de Processos | Artan Empreendimentos
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <?php include('./components/header.php'); ?>

</head>

<body style="overflow: hidden;">

    <div class="modal fade" id="newCompany" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de Empresa Filial</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Nome Filial">
                    <input type="text" class="form-control" placeholder="CNPJ">
                </div>
                <div class="modal-footer">
                    <button id="save-btn" type="button" data-dismiss="modal" class="btn btn-success btn-link">Salvar</button>
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <form action="" method="post">
        <div class="modal fade" id="newProject" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro de Novo Projeto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="material-icons">clear</i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input type="text" name="project-name" class="form-control" placeholder="Nome do Projeto">
                        <input type="number" name="duration" class="form-control" style="width: 30%;float:left; margin-right: 10px" placeholder="Duração">
                        <input type="text" name="type" class="form-control" readonly style="width: 30%;float:left" value="Semanas">

                    </div>
                    <div class="modal-footer">
                        <button id="save-btn" type="button" data-dismiss="modal" class="btn btn-success btn-link">Salvar</button>
                        <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>



    <div class="wrapper">
        <div class="main-panel">




            <?php 
        include('./components/navbar.php');
    ?>
            <div class="content">
                <div class="content-fluid">

                    <?php 
        if($_SESSION['op_role'] == 'system'){
            include('full.php');
        } else if($_SESSION['op_role'] == 'admin'){
            include('admin.php');
        } else if($_SESSION['op_role'] == 'gestor'){
            include('gestor.php');
        } else if($_SESSION['op_role'] == 'user'){
            include('user.php');
        }
    ?>
                </div>
            </div>
        </div>
    </div>

    <script>
    //$('#filial2').addClass('yellow');
    //$('#newCompanyBtn').click(function() {
    //  $('#newCompany').addClass('show');
    //});
    </script>

    <?php include('./components/footer.php'); ?>


</body>

</html>