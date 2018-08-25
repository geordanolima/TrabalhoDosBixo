<?php
require('class_jogador.php');

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);
    // die($opcao);
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
    if($jogador->excluirJogador()){
        header('Location: listaJogador.php?excluido=' . ($idjogador));
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
    $jogador = new Jogador('nome','apelido','Masculino','email@email.com','jog1.png','senha');
    $jogador->setId(1);
    if($jogador->buscaJogador()){
        $bagaca = [
            'id'            => 1,
            'nome'          => $jogador->getnome(),
            'apelido'       => $jogador->getapelido(),
            'genero'        => $jogador->getgenero(),
            'email'         => $jogador->getemail(),
            'senha'         => $jogador->getsenha(),
            'descImg'       => $jogador->geturlImagem(),
            'img'           => '../public/imgs/' . $jogador->geturlImagem()
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
    if($jogador->atualizarJogador()){
        header('Location: listaJogador.php?atualizado=' . ($idjogador));
        exit;
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
}

function listarjogador(){
    $vetor = array();
    array_push($vetor, listaJogador());

    header('Location: listaJogador.php');
    exit;
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

        $jogador = new Jogador($_POST['nome'],$_POST['apelido'],$sex,$_POST['email'],$_POST['imagem'],$_POST['senha']);

        if($jogador->cadastrarJogador()){
            header('Location: listaJogador.php?cadastro=' . $_POST['nome']);
            exit;
        }else{
            echo "Jogador de nome = " . $_POST['nome'] . ' Não cadastrado! #DeuTreta';
        }    
    }
}
