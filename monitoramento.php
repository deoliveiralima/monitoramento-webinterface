


        <div class="container">
                Data: <input class="datepicker" data-date-format="mm/dd/yyyy"> <button type="button" id="btnpesquisa" class="btn btn-primary">Enviar</button>
        <table class="table">
                <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Aluno</th>
                        <th scope="col">Matrícula</th>
                        <th scope="col">Data</th>
                        <th scope="col">Hora</th>
                        <th scope="col">Situação</th>
                        
                        </tr>
                </thead>
                <tbody id="monitoramentotbody">
                        
                </tbody>
        </table>

        </div>

        <script type="text/javascript">

                $('#btnpesquisa').click( function() {
                        //obter data do datepicker
                        var data = $(".datepicker").datepicker( 'getDate' );

                        //converter o objeto data em string
                        var dateAt = new Date(data).toLocaleString();
                        //remover a parte da hora
                        data = dateAt.split(' ')[0];
                        
                        //substituir as duas / por -
                        data = data.replace("/","-");
                        data = data.replace("/","-");
                        
                        console.log(data);
                        
                        $.ajax({
                                type: "GET",
                                cache: false,
                                url: 'http://localhost:8080/monitoramento/buscar/'+data,

                                success: function(result) {
                                        var tr = '';
                                        $.each(result, function(i, item) {
                                               tr = "<tr>"+
                                                        "<td>"+item.aluno.nome +"</td>"+
                                                        "<td> "+item.aluno.matricula+"</td>"+
                                                        "<td> "+ item.data +"</td>"+
                                                        "<td>"+ item.hora +"</td>"+
                                                        "<td>"+ item.situacao +"</td>"+

                                                    "</tr>";
                                               
                                               
                                                console.log(item.data);
                                        });
                                       $("#monitoramentotbody").append(tr);
                                //console.log(result);
                               
                         

                        }, 
                        error: function(xhr, resp, text) {
                                // console.log(xhr, resp, text);
                                
                                } 
                        
                        
                        });
                        });
                        $('.datepicker').datepicker({
                        format: 'dd/mm/yyyy',
                        
                        });


                        

                

        </script>
