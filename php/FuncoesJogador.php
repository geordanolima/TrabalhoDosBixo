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
        header('Location: ListaJogador.html?erro=1');
        exit;
    }
    $idjogador = strip_tags($_GET['id']);
    $jogador = new Jogador();
    $jogador->setId($idjogador);
    if($jogador->excluirItem()){
        echo "Item de ID = " . $idjogador . ' excluido!';    
    }else{
        echo "Item de ID = " . $idjogador . 'não pode ser excluido!';
    }
    //pesquiso no banco de dados o registro ID = 1
    //achado registro, executar comando DELETE ID = 1
    //em caso de sucesso verificar retorno para true, senao false
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
                'genero'        => 'Masculino',
                'email'         => 'zezao@gmail.com',
                'senha'         => 'senha1',
                'descImg'       => 'jog' . $idjogador . '.png',
                'img'           => '../public/imgs/jog' . $idjogador . '.png'
            ],
            2=>[
                'id'            => 2,
                'nome'          => 'Fordencia',
                'apelido'       => 'Fordencinha',
                'genero'        => 'machona',
                'email'         => 'fordencinha@gmail.com',
                'senha'         => 'senha2',
                'descImg'       => 'jog' . $idjogador . '.png',
                'img'           => '../public/imgs/jog' . $idjogador . '.png'
            ],
            3=>[
                'id'            => 3,
                'nome'          => 'Jao',
                'apelido'       => 'Jaozaço',
                'genero'        => 'Indefinido',
                'senha'         => 'senha3',
                'email'         => 'jaozinho@gmail.com',
                'descImg'       => 'jog' . $idjogador . '.png',
                'img'           => '../public/imgs/jog' . $idjogador . '.png'
            ]
        ];
    $bagaca = $dadosjogador[$idjogador];
    require_once('cadastroJogador.php');
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
