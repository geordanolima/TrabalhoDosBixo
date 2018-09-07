<?php
require('classJogador.php');
if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);
    switch($opcao){
        case 'excluir':
            excluirjogador();
            break;
        
        case 'editar':
            buscaJogador();
            break;
        
        case 'atualizar':
            atualizarjogador();
            break;
                
        case 'listar':
            listarjogador();
            break;
        
        case 'cadastro':
            cadastrarJogador();
            break;
    }   
} else {
    listarjogador();
}

function carregarFotoJogador($arquivoEmProcesso, $idjogador){
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/jog'.$idjogador.'.png');   
    }
    return $validacao;
}

function excluirjogador(){
    if(!isset($_GET['id'])){
        header('Location: ListaJogador.html?erro=1');
        exit;
    }
    $idjogador = strip_tags($_GET['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    if($jogador->excluirJogador()){
        listarJogador();
        exit;  
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
    $achou = $jogador->buscaJogador();
    if($achou){
        $bagaca = [
            'id'            => $achou->getId(),
            'nome'          => $achou->getNome(),
            'apelido'       => $achou->getApelido(),
            'genero'        => $achou->getGenero(),
            'email'         => $achou->getEmail(),
            'senha'         => $achou->getSenha(),
            'descImg'       => 'jog' . $achou->getId() . '.png',
        ];

        require_once('cadastroJogador.php');
        exit;      
    }else{
        echo "Jogador de ID = " . $idjogador . 'não encontrado #porque não quero!';
    }
    
}

function editarjogador(){
    $idjogador = strip_tags($_REQUEST['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    $jogador->setNome($_POST['nome']);
    $jogador->setApelido($_POST['apelido']);
    $jogador->setGenero($_POST['genero']);
    $jogador->setEmail($_POST['email']);
    $jogador->setSenha($_POST['senha']);
    $jogador->setImagem($_POST['imagem']);
    if($jogador->atualizarJogador()){
        listarJogador();
        exit;
    }else{
        echo "Jogador de ID = " . $idjogador . ' sem alterações!';
    }    
    listarJogador();
    exit;
}

function atualizarjogador(){       
    if(empty($_POST['nome'])){
        header('Location: cadastroJogador.php');
        exit;
    }
    
    if(!empty($_FILES['foto'])){
        $carregou = carregarFotoJogador($_FILES['foto'], $_POST['id']);
    }
    editarjogador();    
}

function cadastrarJogador(){
    if (!empty($_POST['nome'])){
        if ($_POST['genero'] === 'Masculino'){
            $sex = 'Masculino';
        } else  if ($_POST['genero'] === 'Feminino'){
            $sex = 'Feminino';
        } else {
            $sex = 'Outro';
        }
        $jogador = new Jogador( $_POST['nome'],
                                $_POST['apelido'],
                                $sex,
                                $_POST['email'],
                                $_POST['descImg'],
                                $_POST['senha']);

        if($jogador->cadastrarJogador()){
            listarJogador();
            exit;
        }else{
            echo "Jogador de nome = " . $_POST['nome'] . ' Não cadastrado! #DeuTreta';
        }    
    }
}

function listarJogador(){
    $vetor = array();
    $jogador = new Jogador();
    $vetor = $jogador->listarJogador();
    require_once('listaJogador.php');
    exit;
}
