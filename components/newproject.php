<?php 
session_start();
require('../database.php');

?>


<div class="row projeto">
    <div class="col-md-4">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <span class="nav-tabs-title">Nome do Projeto:</span>
                    <input type="text" class="form-control">
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <span class="nav-tabs-title">Tempo de Duração:</span><br>
                    <label for="inicio">Início</label>
                    <input name="inicio" type="date" class="form-control"><br>
                    <label for="fim">Fim</label>
                    <input name="fim" type="date" class="form-control"><br>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <span class="nav-tabs-title">Selecione a Equipe</span>
                <div class="col-12" style="height: 300px; overflow-y:auto;">
                    <table class="table">
                        <tbody>
                            <?php 
                    foreach($conn->query("SELECT * FROM operador WHERE removed = '0'") as $row){
                ?>
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
                                <td>
                                    <?=$row['op_name']?> - <?=$row['op_user']?> < <?=$row['op_mail']?> >
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success">Criar Projeto</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#newUser">Adicionar Usuário</button>
            </div>
        </div>
    </div>
</div>