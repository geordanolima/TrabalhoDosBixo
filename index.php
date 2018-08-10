<!DOCTYPE html>

    <?php
    require_once('php/funcoes.php');
    $visitas = contadorVisutas();
    ?>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p> tu ta aqui de novo?! já é a <?=$visitas;?> que tu entra nessa pagina</p>
</body>
</html>