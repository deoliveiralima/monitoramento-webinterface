<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script> <!-- biblioteca para gerar qrcode em javascript -->
</head>
<body>


    <div class="conteudo" style="margin-left: 50%">
      <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
        <ul class="list-group list-group-flush">
          <li class="list-group-item" id="nome"></li>
          <li class="list-group-item" id="matricula"></li>
          <li class="list-group-item" id="situacao"></li>
          
        </ul>
        <div class="card-body">
          <div id="qrcode"></div>
        </div>
      </div>
    
     

    </div>

    <script type="text/javascript">

  
        var apiUrl = 'http://localhost:8080/aluno/555';
        fetch(apiUrl).then(response => {
          return response.json();
        }).then(data => {
          console.log(data);
          $("#nome").empty();
          $("#matricula").empty();
          $("foto").empty();
          $("situacao").empty();

          $("#nome").append(data.nome+" "+data.sobrenome);
          $("#matricula").append(data.matricula);
          $("situacao").append(data.situacao);

          //gerar o qrcode
          new QRCode(document.getElementById("qrcode"), "http://192.168.1.5:8080/monitor/atualizar/"+data.matricula);
         
          
          
        }).catch(err => {
          // Do something for an error here
        });
  
    </script>
    
</body>
</html>