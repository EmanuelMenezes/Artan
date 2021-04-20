<?php 
    session_start();
    require('database.php');

    if(isset($_POST['name'])){
    
    $password .= substr($_POST['cpf'], 0,3);
    $name = explode(' ', $_POST['name'], 2);
    $first = $name[0];
    $password .= $first;

    $insert = $conn->prepare('INSERT INTO operador(op_name, op_user,  op_pass, op_role, op_mail) VALUES(?,?,?,?,?)');
    $insert->execute(array($_POST['name'], $_POST['cpf'], $password, 'user', $_POST['mail']));
    } 


?>

<div class="card card-plain">
    <div class="card-header card-header-primary">
        <h4 class="card-title mt-0"> Equipe</h4>
        <p class="card-category"> Gerencie os funcionários cadastrados</p>
        <div class="action-menu" style="cursor:pointer"data-toggle="modal" data-target="#newUser">
            <i readonly class="material-icons">add_circle_outline</i>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="">
                    <th>
                        ID
                    </th>
                    <th>
                        Nome
                    </th>
                    <th>
                        CPF
                    </th>
                    <th>
                        Email
                    </th>
                    <th>
                        #
                    </th>
                </thead>
                <tbody>
                <?php 
                    foreach($conn->query("SELECT * FROM operador WHERE removed = '0'") as $row){
                ?>
                    <tr id="<?=$row['op_id']?>user">
                        <td>
                            <?=$row['op_id']?>
                        </td>
                        <td>
                        <?=$row['op_name']?>
                        </td>
                        <td>
                        <?=$row['op_user']?>
                        </td>
                        <td>
                        <?=$row['op_mail']?>
                        </td>
                        <td class="td-actions text-right">
                            <button type="button" rel="tooltip" title="Remover" onclick="remove(<?=$row['op_id']?>)" class="btn btn-danger btn-link btn-sm">
                                <i class="material-icons">close</i>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>

    function remove(id){
            $.ajax({
                type: "GET",
                url: "removeUser.php",
                data: {op_id: id},
                beforeSend: function () {
                    
                },
                success: function (data) {
                    $('#'+id+'user').remove();
                    $('.tooltip').css="display:none";
                },
                error: function ()
                {
                    
                }
            });
    }

</script>