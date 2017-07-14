<!DOCTYPE html>
<html>
<head>
  <title>Thutor Trainning</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/ie10-viewport-bug-workaround.css" rel="stylesheet">
  <link href="css/justified-nav.css" rel="stylesheet">
  <link href="css/signin.css" rel="stylesheet">
  <script src="js/ie-emulation-modes-warning.js"></script>
</head>
<body>
  <div class="container">  
    <div class="masthead">
      <img src="img/logo.svg" style="padding-bottom: 20px;"">
      <nav>                   
        <ul class="nav nav-justified">
          <li class='<?=(($_GET["rota"] == "HOME")?"active":"sem estilo")?>'><a href="index.php?rota=HOME">HOME</a></li>
          <li class='<?=(($_GET["rota"] == "USUARIO")?"active":"sem estilo")?>'><a href="listaUsuario.php?rota=USUARIO">USUARIO</a></li>
          <li class='<?=(($_GET["rota"] == "MENSAGEM")?"active":"sem estilo")?>'><a href="listaMensagem.php?rota=MENSAGEM">MENSAGEM</a></li>
        </ul>
      </nav>
    </div>
  </div>
</body>
</html>
