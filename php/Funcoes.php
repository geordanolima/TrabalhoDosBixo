<?php

session_start();
session_regenerate_id();
//fingi que pesquisei as  credenciais no BD
//usuario é quem realmente diz que é
// session_regenerate_id();
//af6o5cfqg9c4lgu2lvuocfr154
//lbf7g62dcqf2ofmj4n3tvsq1b2

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
    
    default:
        listarbixos();
        break;
     
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


function logar(){
    
    $_SESSION['nome'] = 'Nome Completo';
    $_SESSION['logado'] = true;

    //require_once('menu.php');
    header('Location: mapa.php');
}

function deslogar(){
    session_destroy();
    header('Location: login.php?deslogado=true');
}