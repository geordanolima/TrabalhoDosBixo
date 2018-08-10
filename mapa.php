<!-- Grupo:
    Dierlys R
    Geordano L
    Madson N
    Rafael T
    Tiago W -->
<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilo.css">
    
    <link rel="icon" href="img/dog-w.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/dog-w.png" type="image/x-icon" />
    <title>Mapa da treta</title>

</head>
<body>

        <div class="pos-f-t">
            <nav class="navbar navbar-dark bg-dark fixed-top 5-col">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">
                    <span> <img src="img/dog-w.png" style="width: 30px; height: 35px;"></span>
                    <label>
                        Joguinho dos bixo
                    </label>
                </button>
            </nav>
            
        </div>

    <div id="menuLateral" class="sidenav">
        <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
        <a href="php/cadastroBixo.php">Cadastro bixo</a>
        <a href="php/ListaBixo.php">Lista de bixo</a>
        <a href="cadastroJogador.html">Cadastro jogador</a>
        <a href="cadastroitem.html">Cadastro item</a>
        <a href="mapa.html">Mapa</a>
        <img class="logoimg" src="img/dog-w.png">
        <label class="logo">Joguinho dos bixo</label>
        <a href="logout.php">Sair</a>
    </div>    

    <div id="map" class="mapa">
        <script src="js/mapa_bichos.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rTJoFE53R8-bpetMDjJrljrtR-YbXpQ&callback=initMap" async defer>
        </script>
    </div>

    <div class="card-footer" id="rodape">Joguinho maroto dos bixo TADS V @2018</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="js/script.js"></script>
</body>
</html>