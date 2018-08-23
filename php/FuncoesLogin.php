<?php

session_start();

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){

        case 'logar':
            logar();
            break;
        
        case 'sair':
            logout();
            break; 
    }   
}
/*  funções de login */

function logar(){
    if (($_POST['email'] =='bixo@joguinho.com') && ($_POST['senha'] == 'admin')) {
        session_regenerate_id();
        $_SESSION['nome'] = 'Vivente';
        $_SESSION['logado'] = true;
        $_SESSION["sessiontime"] = time() + 3600;    
        header('Location: mapa.php');    
    } else {
        header('Location: ../login.php?erro=LoginInvalido'); 
    }
}

function logout(){

    session_destroy();
    header('Location: ../login.php?deslogado=true');
}

function isAutenticado(){
    
    if ( isset( $_SESSION["sessiontime"] ) ) { 
        if ($_SESSION["sessiontime"] < time() ) { 
            session_unset();
            header('Location: funcoes.php?op=sair');
        }
    } else { 
        session_unset();
        header('Location: ../login.php');
    }
}