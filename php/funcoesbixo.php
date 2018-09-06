<?php
require_once('classBixo.php');
if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);
    switch($opcao){
        case 'excluir':
            excluirBixo();
            break;

        case 'editar':
            buscarBixo();
            break;

        case 'atualizar':
            atualizarBixo();
            break;

        case 'listar':
            listarBixo();
            break;
        
        case 'cadastro':
            cadastrarBixo();
            break;
    }
}

function carregarFotoBixo($arquivoEmProcesso, $idbixo){
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

function excluirBixo(){
    if(!isset($_GET['id'])){
        header('Location: ListaBixo.html?erro=404');
        exit;
    }
    $idBixo = strip_tags($_GET['id']);
    $Bixo = new Bixo();
    $Bixo->setId($idBixo);
    if($Bixo->excluirBixo()){
        listarBixo();
    }else{
        echo "Bixo de ID = " . $idBixo . 'não pode ser excluido!';
    }
}

function buscarBixo(){
    if(!isset($_GET['id'])){
        header('Location: ListaBixo.html?erro=404');
        exit;
    }      
    $idBixo = strip_tags($_GET['id']);
    $Bixo = new Bixo();
    $Bixo->setId($idBixo);
    $achou = $Bixo->buscarBixo();
    if($achou){
        $dadosbixo = [
            'id'            => $achou->getId(),
            'nome'          => $achou->getNome(),
            'descricao'     => $achou->getDescricao(),
            'vida'          => $achou->getVida(),
            'defesa'        => $achou->getDefesa(),
            'ataque'        => $achou->getAtaque(),
            'descImg'       => $achou->getimg(),
            'latitude'      => $achou->getlati(),
            'longitude'     => $achou->getlong()
        ];
        require_once('cadastroBixo.php');
        exit;         
    }else{
        echo "Bixo de ID = " . $idBixo . ' nao encontrado!';
    }
}

function editarBixo(){    
    $idBixo = strip_tags($_REQUEST['id']);
    $bixo = new Bixo();
    $bixo->setId($idBixo);
    $bixo->setNome($_POST['nome']);
    $bixo->setDescricao($_POST['descricao']);
    $bixo->setVida($_POST['vida']);
    $bixo->setAtaque($_POST['ataque']);
    $bixo->setDefesa($_POST['defesa']);
    $bixo->setLati($_POST['latitude']);
    $bixo->setLong($_POST['longitude']);
    $bixo->setImg('bixo'.$idBixo.'.png');
    if($bixo->atualizarBixo()){
        listarBixo();
        exit;
    }else{
        echo "Bixo de ID = " . $idBixo . ' sem alterações!';
    }    
    require_once('listaBixo.php');
    exit;
}

function atualizarBixo(){
    if(empty($_POST['nome'])){
        header('Location: cadastrobixo.php?opcao=editar&id='.$_POST['id']);
        exit;
    }
    $carregou = carregarFotoBixo($_FILES['foto'], $_POST['id']);
    editarBixo();    
}

function cadastrarBixo(){
    if (!empty($_POST['nome'])){
        $bixo = new Bixo($_POST['nome'],$_POST['descricao'],$_POST['vida'],$_POST['defesa'],$_POST['ataque'],'bixo.png',$_POST['latitude'],$_POST['longitude']);
        if($bixo->cadastrarBixo()){
            listarBixo();
            exit;
        }else{
            echo "bixo de nome = " . $_POST['nome'] . ' Não cadastrado! #DeuTreta';
        }    
    }
}

function listarBixo(){
    $vetor = array();
    $bixo = new Bixo();
    $vetor = $bixo->ListarBixos();
    require_once('listabixo.php');
    exit;
}
