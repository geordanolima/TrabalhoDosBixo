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


function carregarFotoItem($arquivoEmProcesso, $idItem)
{
    
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/Item'.$idItem.'.png');   
    }
    return $validacao;
}

 function excluirItem()
{
    if(!isset($_GET['id'])){
        header('Location: istaItens.html?erro=404');
        exit;
    }
    $idItem = strip_tags($_GET['id']);
    $item = new Item();
    $item->setId($idItem);
    if($item->excluirItem()){
        header('Location: listaItem.php?excluido=' . ($idItem));
        exit; 
    }else{
        echo "Item de ID = " . $idItem . 'não pode ser excluido!';
    }
    //pesquiso no banco de dados o registro ID = 1
    //achado registro, executar comando DELETE ID = 1
    //em caso de sucesso verificar retorno para true, senao false
}

function buscarItem()
{
    if(!isset($_GET['id'])){
        header('Location: listaItens.php?erro=404');
        exit;
    }
    $idItem = strip_tags($_GET['id']);
    $item = new Item('nome','10','bonus','Item1.png');
    $item->setId($idItem);

    if($item->buscarItem()){
        $Item = [
            'id'            => $item->getid(),
            'nome'          => $item->getnome(),
            'genero'        => $item->getbonus(),
            'ValorItem'     => $item->getvalor(),
            'imagem'        => $item->getImagem()
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
    if($item->atualizarItem()){
        header('Location: listaitem.php?atualizado=' . ($idItem));
        exit;
    }else{
        echo "Item de ID = " . $idItem . ' sem alterações!';
    }
    
    require_once('listaItem.php');
    exit;

}


function atualizarItem()
{
    if(empty($_POST['nome'])){
        header('Location: cadastroItem.php');
        exit;
    }
    $carregou = carregarFotoItem($_FILES['foto'], $_POST['nome']);
    if(!$carregou){
        echo 'Algum erro aconteceu'. $_FILES['foto']['error'];
    }
    editaritem();
}

function cadastrarItem(){
    if (!empty($_POST['nome'])){
        $item = new Item($_POST['nome'],$_POST['ValorItem'],$_POST['bonus'],$_POST['imagem']);

        if($item->cadastrarItem()){
            header('Location: listaItem.php?cadastro=' . $_POST['nome']);
            exit;
        }else{
            echo "Item de nome = " . $_POST['nome'] . ' Não cadastrado! #DeuTreta';
        }    
    }
}