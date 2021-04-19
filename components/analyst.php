<?php 
session_start();

require('../database.php');
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
    <?php include('./header.php'); ?>
</head>

<body class="">
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Cadastro de Usuário</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Nome">
                    <input type="text" class="form-control" placeholder="CPF">
                </div>
                <div class="modal-footer">
                    <button id="save-btn" type="button" data-dismiss="modal" class="btn btn-success btn-link">Salvar</button>
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper ">
        <div class="main-panel">
            <!-- Navbar -->
            <?php include('./navbar.php'); ?>

            <!-- End Navbar -->
            <div class="content">
                <div class="container-fluid">
                    <div class="return"></div>
                </div>
            </div>
        </div>
    </div>
    <?php include('./footer.php'); ?>
    <script>
    $('.novo').click(function() {

        $('#new-modal').style = 'display: block !important';

        $.ajax({
            type: "GET",
            url: "newproject.php",
            beforeSend: function() {

            },
            success: function(data) {
                $(".return").html(data);
            },
            error: function() {

            }
        });
    });
    $('#save-btn').click(function() {

                $.ajax({
                    type: "POST",
                    url: "",
                    data: $("#idFormulario").serialize(),
                    beforeSend: function () {
                        
                    },
                    success: function (data) {
                    $(".return").html(data);
                    },
                    error: function ()
                    {
                        
                    }
                });
    });
    </script>
</body>

</html>