<?php
session_start();
require('../database.php');

if (isset($_POST['projname'])) {
?>
<script>
$('.myfield').text('<?= $_POST['projname'] ?>');
</script>
<?php
    $name = $_POST['projname'];
    $inicio = $_POST['inicio'];
    $fim = $_POST['fim'];


    $insert = $conn->prepare('INSERT INTO projeto(pj_name, inicio,  final, empresa) VALUES(?,?,?,?)');
    $insert->execute(array($name, $inicio, $fim, $_SESSION['Company']));

    $select = $conn->prepare("SELECT MAX(pj_id) as pj_id FROM projeto");
    $select->execute();

    $id = $select->fetch();
    foreach ($conn->query("SELECT * FROM operador") as $row) {
        if (isset($_POST['check' . $row['op_id']])) {
            $insert2 = $conn->prepare('INSERT INTO equipe(fk_op_id,fk_pj_id) VALUES(?,?)');
            $insert2->execute(array($row['op_id'], $id['pj_id']));
        }
    }
} else {
    $id = $_GET['id'];

    $select = $conn->prepare("SELECT * FROM projeto WHERE pj_id = ?");
    $select->execute(array($id));
    $proj = $select->fetch();
    ?>
<script>
$('.myfield').text('<?=$proj['pj_name']?>');
</script>
<?php
}
?>


<form action="" method="post">
    <div class="modal fade" id="newObjective" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Novo Objetivo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="material-icons">clear</i>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" placeholder="Nome do Objetivo">
                    <input type="text" class="form-control" placeholder="Descrição">
                    <input type="number" class="form-control" placeholder="Valor da Meta">
                    <select class="form-control" name="tipo" id="">
                        <option value=">=">Maior ou Igual (>=)</option>
                        <option value=">=">Menor ou Igual (<=)</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button id="save-btn-obj" type="button" data-dismiss="modal" class="btn btn-success btn-link">Salvar</button>
                    <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Cancelar</button>
                </div>
            </div>
        </div>
    </div>
</form>


<div class="row">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header card-header-tabs card-header-primary">
                <div class="nav-tabs-navigation">
                    <div class="nav-tabs-wrapper">
                        <span class="nav-tabs-title">Objetivos</span>
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="modal" data-target="#newObjective">
                                    <i class="material-icons">add_circle_outline</i> Novo Objetivo
                                    <div class="ripple-container"></div>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane active" id="profile">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Sign contract for "What are conference organizers afraid of?"</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Editar Tarefa" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Editar Tarefa" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
                                    </td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Editar Tarefa" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" value="" checked>
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                    <td class="td-actions text-right">
                                        <button type="button" rel="tooltip" title="Editar Tarefa" class="btn btn-primary btn-link btn-sm">
                                            <i class="material-icons">edit</i>
                                        </button>
                                        <button type="button" rel="tooltip" title="Remover" class="btn btn-danger btn-link btn-sm">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6 col-md-12 tabela">
        
    </div>
</div>

<script>
$('#newObjective').click(function() {

});

    $.ajax({
        type: "GET",
        url: "./people.php",
        data:{id: <?=$_GET['id']?>},
        beforeSend: function () {
            
        },
        success: function (data) {

        $(".tabela").html(data);
        },
        error: function ()
        {
            
        }
    });
</script>