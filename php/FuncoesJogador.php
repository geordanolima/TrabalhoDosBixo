<?php

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){
        case 'excluir':
            excluirjogador();
            break;
        
        case 'editar':
            busarjogador();
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
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/Jog'.$idjogador.'.png');   
    }
    return $validacao;
}

function excluirjogador()
{

    if(!isset($_GET['id'])){
        header('Location: ListaJogador.html?erro=1');
        exit;
    }
    $idjogador = strip_tags($_GET['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    if($jogador->excluirItem()){
        echo "Jogador de ID = " . $idjogador . ' excluido!';    
    }else{
        echo "Jogador de ID = " . $idjogador . 'não pode ser excluido!';
    }

}

function buscaJogador(){
    if(!isset($_GET['id'])){
        header('Location: listaJogador.php?erro=404');
        exit;
    }

    $idjogador = strip_tags($_GET['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    if($jogador->buscaJogador()){
        echo "Jogador de ID = " . $idjogador . ' encontrado #bora editar!';    
    }else{
        echo "Jogador de ID = " . $idjogador . 'não encontrado #porque não quero!';
    }

    $bagaca = $jogador;
    require_once('cadastroJogador.php');
    exit;
}

function editarjogador()
{
    $idjogador = strip_tags($_GET['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    if($jogador->editarjogador()){
        echo "Jogador de ID = " . $idjogador . ' alterado #agora é um ciborg!';    
    }else{
        echo "Jogador de ID = " . $idjogador . ' sem alterações!';
    }
    
    require_once('listaJogador.php');
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
    editarjogador();
    header('Location: listaJogador.php?atualizado=' . ($_POST['nome']));
    exit;    
}

function listarjogador(){
    $vetor = array();
    array_push($vetor, listaJogador());

    header('Location: listaJogador.php');
    exit;
}
