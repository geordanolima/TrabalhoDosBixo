<?php
    require_once('FuncoesLogin.php');
    require_once('Funcoeshtml.php');
    isAutenticado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php montaHeader(); ?>
    <link rel="stylesheet" href="css/estilo.css">
    <title>Captura Bixo</title>
</head>
<body>
    <?php montamenu(); ?>

    <div class="container captura">
    <img src="../img/animacai.gif" height="400px" width="400px" style="border-radius: 10%; margin 2%;">
    <img src="<?=(isset($_GET['id'])) ? 'img/bichosmapa/00' . $_GET['id'] . '.png' : '../public/imgs/padrao.png' ?>" height="150px" width="150px" style="border-radius: 50%;">
    
    
    
    <center>
        <button class="btn btn-dark" onclick="Gifffer()">Pegar a treta</button>
    <center>
    </div>
    <?php montafooterScripts(); ?>
</body>
</html>
