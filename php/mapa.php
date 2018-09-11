<?php
    require_once('FuncoesLogin.php');
    require_once('Funcoeshtml.php');
    require_once('classBixo.php');
    isAutenticado();
    $poke = new Bixo();
    $dbPokemons = $poke->getAllJSON();    
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php montaHeader(); ?>
    <title>Mapa da treta</title>

</head>
<body>
    <?php montamenu(); ?>

    <div id="map" class="mapa">
        <script> var dbPokemons = '<?=json_encode($dbPokemons);?>'; </script>
        <script src="../js/mapa_bichos.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rTJoFE53R8-bpetMDjJrljrtR-YbXpQ&callback=initMap" async defer>
        </script>
    </div>

    <div class="card-footer" id="rodape">Joguinho maroto dos bixo TADS V @2018</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>
</body>
</html>