<?php
function montaHeader(){
    echo(
    '<meta charset="UTF-8">' . 
    '<meta name="viewport" content="width=device-width, initial-scale=1.0">' .
    '<meta http-equiv="X-UA-Compatible" content="ie=edge">' .
    '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">' .
    '<link rel="stylesheet" href="../css/estilo.css">' .    
    '<link rel="icon" href="../img/dog-w.png" type="image/x-icon" />' .
    '<link rel="shortcut icon" href="../img/dog-w.png" type="image/x-icon" />');
}

function montamenu(){
    echo('<div class="pos-f-t">'.
            '<nav class="navbar navbar-dark bg-dark fixed-top 5-col">' . 
                '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">' .
                    '<span> <img src="../img/dog-w.png" style="width: 30px; height: 35px;"></span>' . 
                    '<label>' . 
                        'Joguinho dos bixo' .
                    '</label>' .
                '</button>' .
            '</nav>' .
        '</div>' .
    '<div id="menuLateral" class="sidenav">');
    if(isset($_SESSION['nome'])) {
        echo ('<a id="buena" href="#"> Buenas ' . $_SESSION['nome'] . '!</a>');
    } 
    echo ('<a href="cadastroBixo.php">Cadastro bixo</a>' . 
        '<a href="ListaBixo.php">Lista de bixo</a>' .
        '<a href="cadastroJogador.php">Cadastro jogador</a>' .
        '<a href="ListaJogador.php">Lista de Jogadores</a>' .
        '<a href="cadastroitem.php">Cadastro item</a>' .
        '<a href="mapa.php">Mapa</a>' .
        '<img src="../img/dog-w.png" style="width:100px;margin-top: 50%;margin-left: 30px;">' .
        '<label class="logo">Joguinho dos bixo</label>' .
        '<a href="FuncoesLogin.php?op=sair">Sair</a>' .
    '</div>');
}
