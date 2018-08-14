<?php

session_start();

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){
        case 'excluir':
            excluirbixo();
            break;
        
        case 'editar':
            editarbixo();
            break;
        
        case 'atualizar':
            atualizarbixo();
            break;

        case 'logar':
            logar();
            break;

        case 'Maligna':
            deslogar();
            break;
        
        case 'listar':
            listarbixos();
            break;
        case 'sair':
            logout();
            break;    
    }   
}

function carregarFotoBixo($arquivoEmProcesso, $idbixo)
{
    
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/bixo'.$idbixo.'.png');   
    }
    return $validacao;
}

function excluirbixo()
{

    if(!isset($_GET['id'])){
        header('Location: ListaBixo.php?erro=1');
        exit;
    }
    $idbixo = strip_tags($_GET['id']);
    
    header('Location: listaBixo.php?excluido=' . $idbixo);
    exit;
}

function editarbixo()
{
    if(!isset($_GET['id'])){
        header('Location: listaBixo.php?erro=404');
        exit;
    }
    $idbixo = strip_tags($_GET['id']);



    $dadosbixo = 
        [
            1=>[
                'id'            => 1,
                'nome'          => 'Cusco',
                'descricaoBixo' => 'tambem conhecido como cachorro',
                'vida'          => 10,
                'ataque'        => 20,
                'defesa'        => 40,
                'latitude'      => 1254,
                'longitude'     => 6544,
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
            ],
            2=>[
                'id'            => 2,
                'nome'          => 'Guaipeca',
                'descricaoBixo' => 'Melhor amigo do Gaucho',
                'vida'          => 30,
                'ataque'        => 10,
                'defesa'        => 50,
                'latitude'      => 6655,
                'longitude'     => 6547,
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
            ],
            3=>[
                'id'            => 3,
                'nome'          => 'Tomba',
                'descricaoBixo' => 'Tomba lata, ou Vira-Latas',
                'vida'          => 80,
                'ataque'        => 20,
                'defesa'        => 60,
                'latitude'      => 5544,
                'longitude'     => 9877,
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
            ]
        ];
    require_once('cadastrobixo.php');
    exit;

}


function atualizarbixo()
{       
    if(empty($_POST['nome'])){
        header('Location: cadastrobixo.php');
        exit;
    }
    if(!empty($_FILES['foto'])){
        $carregou = carregarFotoBixo($_FILES['foto'], $_POST['id']);
    }
    header('Location: listaBixo.php?atualizado=' . ($_POST['nome']));
    exit;    
}

function listarbixos(){
    
    header('Location: listaBixo.php');
    exit;
}

function contadorVisutas(){
    if (!isset($_COOKIE['visitas'])){
        setcookie('visitas', '1',time() + 150000);
    }
    $variavil =  $_COOKIE['visitas'] + 1 ;
    setcookie('visitas', $variavil);

    return $variavil;
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