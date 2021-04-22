<?php
session_start();
require('../database.php');

?>

<div class=" projeto">
    <form action="" id="form-project" class="row">
        <div class="col-md-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <span class="nav-tabs-title">Nome do Projeto:</span>
                        <input type="text" required id="field1" class="form-control" name="projname">
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <span class="nav-tabs-title">Tempo de Duração:</span><br>
                        <label  for="inicio">Início</label>
                        <input required id="field2" name="inicio" type="date" class="form-control"><br>
                        <label for="fim">Fim</label>
                        <input required id="field3" name="fim" type="date" class="form-control"><br>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <span class="nav-tabs-title">Selecione a Equipe</span>
                    <div class="col-12" style="height: 300px; overflow-y:auto;">
                        <table class="table">
                            <tbody>
                                <?php
                                foreach ($conn->query("SELECT * FROM operador WHERE removed = '0'") as $row) {
                                ?>
                                <tr>
                                    <td>
                                        <div class="form-check">
                                            <label class="form-check-label">
                                                <input class="form-check-input" type="checkbox" name="check<?=$row['op_id']?>" value="<?= $row['op_id'] ?>">
                                                <span class="form-check-sign">
                                                    <span class="check"></span>
                                                </span>
                                            </label>
                                        </div>
                                    </td>
                                    <td>
                                        <?= $row['op_name'] ?> - <?= $row['op_user'] ?> < <?= $row['op_mail'] ?>>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </form>

    <div class="text-center">
        <button id="newProjectBtn" class="btn btn-success">Criar Projeto</button>
        <button class="btn btn-warning" data-toggle="modal" data-target="#newUser">Adicionar Usuário</button>
    </div>

</div>

<script>
$('#newProjectBtn').click(function() {

    if ( document.getElementById('field1').value ==  '' || document.getElementById('field2').value ==  '' ||  document.getElementById('field3').value ==  '' ) {
        alert('Por Favor, preencha todos os campos para criar um novo projeto.');
    } else {
        $.ajax({
        type: "POST",
        url: "./components/project.php",
        data: $("#form-project").serialize(),
        beforeSend: function() {

        },
        success: function(data) {
            $(".return").html(data);
        },
        error: function() {

        }
    });
    }


}); 
</script>