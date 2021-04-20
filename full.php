<div class="container">
    <div class="row">
        <div class="title">
            <h2>Empresas</h2>
        </div>
        <div class="col-12 card" style="display: inline;">
            <div style="overflow-x:auto;">
                <div class="scroll" style="display: inline-flex;">
                    <div class="square card exist" id="filial2">
                        <div class="icon-box">
                            <i class="material-icons">store</i>
                        </div>
                        <div class="name">
                            <h6><strong>Filial 2</strong></h6>
                        </div>
                    </div>
                    <div class="square card exist" id="filial3">
                        <div class="icon-box">
                            <i class="material-icons">store</i>
                        </div>
                        <div class="name">
                            <h6><strong>Filial 3</strong></h6>

                        </div>
                    </div>
                    <div class="square card exist" id="filial4">
                        <div class="icon-box">
                            <i class="material-icons">store</i>
                        </div>
                        <div class="name">
                            <h6><strong>Filial 4</strong></h6>

                        </div>
                    </div>
                    <div class="square card new" id="newCompany" data-toggle="modal" data-target="#newCompany">
                        <div class="icon-box">
                            <i class="material-icons">add_circle_outline</i>
                        </div>
                        <div class="name">
                            <h6><strong>Nova Empresa</strong></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title">
            <h2>Projetos</h2>
        </div>
        <div class="col-12 card" style="display: inline;">
            <div style="overflow-x:auto;">
                <div class="scroll" style="display: inline-flex;">
                    <div class="square card exist project" id="filial2">
                        <div class="icon-box">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <div class="name">
                            <h6><strong>Economia</strong></h6>

                        </div>
                    </div>
                    <div class="square card exist project" id="filial3">
                        <div class="icon-box">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <div class="name">
                            <h6><strong>Gestão de Tempo</strong></h6>

                        </div>
                    </div>
                    <div class="square card exist project" id="filial4">
                        <div class="icon-box">
                            <i class="material-icons">content_paste</i>
                        </div>
                        <div class="name">
                            <h6><strong>Rotina</strong></h6>

                        </div>
                    </div>
                    <div class="square card new" id="newProject">
                        <div class="icon-box">
                            <i class="material-icons">add_circle_outline</i>
                        </div>
                        <div class="name">
                            <h6><strong>Novo Projeto</strong></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-12 return-table">

        </div>
    </div>
</div>
<script>
$.ajax({
    type: "GET",
    url: "people.php",
    beforeSend: function() {

    },
    success: function(data) {
        $(".return-table").html(data);
    },
    error: function() {

    }
});

$('.project').click(function() {

    var id = this.id;
    $.ajax({
        type: "POST",
        url: "./components/project.php?id=" + id,
        data: $("#project-form").serialize(),
        beforeSend: function() {

        },
        success: function(data) {
            $(".return").html(data);
        },
        error: function() {

        }
    });
});


$('#newProject').click(function() {

    var id = this.id;
    $.ajax({
        type: "POST",
        url: "./components/newproject.php",
        data: $("#project-form").serialize(),
        beforeSend: function() {

        },
        success: function(data) {
            $(".return").html(data);
        },
        error: function() {

        }
    });
});

$('#newCompany').click(function() {

var id = this.id;
$.ajax({
    type: "POST",
    url: "./components/newcompany.php",
    data: $("#project-form").serialize(),
    beforeSend: function() {

    },
    success: function(data) {
        $(".return").html(data);
    },
    error: function() {

    }
});
});
</script>