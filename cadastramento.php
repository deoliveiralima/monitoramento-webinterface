
<div class="container">
        <form id="formcadastroaluno" method="post" action="#">
            <div class="mb-3">
                <label for="nome"  class="nome">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome">
            </div>
            <div class="mb-3">
                <label for="sobrenome"  class="form-label">Sobrenome</label>
                <input type="text" name="sobrenome"class="form-control" id="sobrenome">
            </div>
            <div class="mb-3">
                <label for="sobrenome"  class="form-label">Matrícula</label>
                <input type="text" name="matricula" class="form-control" id="matricula">
            </div>

            <!-- <div class="input-group">
                <input type="file" class="form-control" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                <button class="btn btn-outline-secondary" type="button" id="inputGroupFileAddon04">Button</button>
            </div> -->
            
            <button type="button" class="btn btn-primary" id="btncadastro">Cadastrar</button>
        </form>
        <div id="mensagem">
           
        </div>
    </div>

        <script type="text/javascript">
   
//data: {"nome": $("#nome").val(), "sobrenome": $("#sobrenome").val(), "matricula": $("#matricula").val()},
        $('#btncadastro').click( function() {
            console.log($('#formcadastroaluno').serialize());
            
            $.ajax({
                type: "POST",
                cache: false,
                url: 'http://localhost:8080/aluno',
                data: $('#formcadastroaluno').serialize(),
                datatype: 'json',
                success: function(result) {
                    
                    $('#formcadastroaluno').trigger("reset");
                    $("#mensagem").addClass("alert alert-success");
                    $("#mensagem").append("Aluno cadastrado");
                    setTimeout(function() { 
                        $('#mensagem').removeClass('alert')
                        $('#mensagem').removeClass('alert-success')
                        $("#mensagem").empty();
                        
                    }, 2000);

            },
            error: function(xhr, resp, text) {
                   // console.log(xhr, resp, text);
                    
                } 
            
            
            });
        });
        </script>
