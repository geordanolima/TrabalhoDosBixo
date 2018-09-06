<?php
require('classItem.php');
if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){
        case 'excluir':
            excluirItem();
            break;
        
        case 'editar':
            buscarItem();
            break;
        
        case 'atualizar':
            atualizarItem();
            break;
                
        case 'listar':
            listarItem();
            break;
        
        case 'cadastro':
            cadastrarItem();
            break;
    }   
}

function carregarFotoItem($arquivoEmProcesso, $iditem){ 
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/item'.$iditem.'.png');   
    }
    return $validacao;
}

function excluirItem(){
    if(!isset($_GET['id'])){
        header('Location: istaItens.html?erro=404');
        exit;
    }
    $idItem = strip_tags($_GET['id']);
    $item = new Item();
    $item->setId($idItem);
    if($item->excluirItem()){
        lisarItem();
    }else{
        echo "Item de ID = " . $idItem . 'não pode ser excluido!';
    }
}

function buscarItem(){
    if(!isset($_GET['id'])){
        header('Location: listaItens.php?erro=404');
        exit;
    }
    $idItem = strip_tags($_GET['id']);
    $item = new Item();
    $item->setId($idItem);
    $achou = $item->buscarItem();
    if($achou){
        $item = [
            'id'            => $achou->getId(),
            'nome'          => $achou->getNome(),
            'bonus'         => $achou->getBonus(),
            'valor'         => $achou->getValor(),
            'imagem'        => 'item' . $achou->getId() . '.png'
        ];
        require_once('cadastroItem.php');
        exit;      
    } else {
        echo "Item de ID = " . $item . 'não encontrado';
    }
}

function editarItem(){
    $idItem = strip_tags($_REQUEST['id']);
    $item = new Item();
    $item->setId($idItem);
    $item->setNome($_POST['nome']);
    $item->setBonus($_POST['bonus']);
    $item->setValor($_POST['valor']);
    $item->setImagem('Item' . $idItem . '.png');
    if($item->atualizarItem()){
        listarItem();
        exit;
    }else{
        echo "Item de ID = " . $idItem . ' sem alterações!';
    }
    require_once('listaItem.php');
    exit;
}

function atualizarItem(){
    if(empty($_POST['nome'])){
        listarItem();
        exit;
    }
    $carregou = carregarFotoItem($_FILES['imagem'], $_POST['id']);
    editaritem();
}

function cadastrarItem(){
    if (!empty($_POST['nome'])){
        $item = new Item($_POST['nome'],$_POST['valor'],$_POST['bonus'],$_POST['imagem']);
        if($item->cadastrarItem()){
            listarItem();
            exit;
        }else{
            echo "Item de nome = " . $_POST['nome'] . ' Não cadastrado! #DeuTreta';
        }    
    }
}

function listarItem(){
    $vetor = array();
    $item = new Item();
    $vetor = $item->ListarItens();
    require_once('listaitem.php');
    exit;
}
