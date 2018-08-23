<?php

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){
        case 'excluir':
            excluirjogador();
            break;
        
        case 'editar':
            editarjogador();
            break;
        
        case 'atualizar':
            atualizarjogador();
            break;
                
        case 'listar':
            listarjogador();
            break;
    }   
}

function carregarFotoJogador($arquivoEmProcesso, $idjogador)
{
    
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/bixo'.$idjogador.'.png');   
    }
    return $validacao;
}

function excluirjogador()
{

    if(!isset($_GET['id'])){
        header('Location: ListaJogador.php?erro=1');
        exit;
    }
    $idbixo = strip_tags($_GET['id']);
    
    header('Location: listaJogador.php?excluido=' . $idbixo);
    exit;
}

function editarjogador()
{
    if(!isset($_GET['id'])){
        header('Location: listaJogador.php?erro=404');
        exit;
    }
    
    $idjogador = strip_tags($_GET['id']);

    $dadosjogador = 
        [
            1=>[
                'id'            => 1,
                'nome'          => 'Zezao',
                'apelido'       => 'Zezinho',
                'genero'        => 'machao',
                'email'         => 'zezao@gmail.com',
                'descImg'       => 'jogador' . $idjogador . '.png',
                'img'           => '../public/imgs/bixo' . $idjogador . '.png'
            ],
            2=>[
                'id'            => 2,
                'nome'          => 'Fordencia',
                'apelido'       => 'Fordencinha',
                'genero'        => 'machona',
                'email'        => 'fordencinha@gmail.com',
                'descImg'       => 'jogador' . $idjogador . '.png',
                'img'           => '../public/imgs/bixo' . $idjogador . '.png'
            ],
            3=>[
                'id'            => 3,
                'nome'          => 'Jao',
                'apelido'       => 'Jaozaço',
                'genero'        => 'Indefinido',
                'email'        => 'jaozinho@gmail.com',
                'descImg'       => 'jogador' . $idjogador . '.png',
                'img'           => '../public/imgs/bixo' . $idjogador . '.png'
            ]
        ];
    
    require_once('cadastroJogador.php');
    header('Location: cadastroJogador.php');
    exit;

}


function atualizarjogador()
{       
    if(empty($_POST['nome'])){
        header('Location: cadastroJogador.php');
        exit;
    }
    if(!empty($_FILES['foto'])){
        $carregou = carregarFotoJogador($_FILES['foto'], $_POST['id']);
    }
    header('Location: listaJogador.php?atualizado=' . ($_POST['nome']));
    exit;    
}

function listarjogador(){
    
    header('Location: listaBixo.php');
    exit;
}
