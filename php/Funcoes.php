<?php

require_once('Funcoes.php');
if(!isset($_REQUEST['op'])){
    listarClientes();
    exit;
}
$opcao = strip_tags($_REQUEST['op']);

switch($opcao){
    case 'excluir':
        excluirCliente();
        break;
    
    case 'editar':
        editarCliente();
        break;
    
    case 'atualizar':
        atualizarCliente();
        break;
    
    default:
        listarClientes();
        break;
     
}

function carregarFotoCliente($arquivoEmProcesso, $idCliente)
{
    
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], '../public/imgs/bixo'.$idCliente.'.png');   
    }
    return $validacao;
}

function excluirCliente()
{

    if(!isset($_GET['id'])){
        header('Location: ListaBixo.php?erro=1');
        exit;
    }
    $idCliente = strip_tags($_GET['id']);
    
    header('Location: listaBixo.php?excluido=' . $idCliente);
    exit;
}

function editarCliente()
{
    if(!isset($_GET['id'])){
        header('Location: listaBixo.php?erro=404');
        exit;
    }
    $idCliente = strip_tags($_GET['id']);



    $dadosCliente = 
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
                'descImg'       => 'bixo' . $idCliente . '.png',
                'img'           => '../public/imgs/bixo' . $idCliente . '.png'
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
                'descImg'       => 'bixo' . $idCliente . '.png',
                'img'           => '../public/imgs/bixo' . $idCliente . '.png'
            ],
            3=>[
                'id'        => 3,
                'nome'      => 'Tomba',
                'descricaoBixo'  => 'Tomba lata, ou Vira-Latas',
                'vida'          => 80,
                'ataque'        => 20,
                'defesa'        => 60,
                'latitude'      => 5544,
                'longitude'     => 9877,
                'descImg'       => 'bixo' . $idCliente . '.png',
                'img'           => '../public/imgs/bixo' . $idCliente . '.png'
            ]
        ];
    require_once('cadastrobixo.php');
    exit;

}


function atualizarCliente()
{
       
    if(empty($_POST['nome']) || empty($_POST['descricaoBixo'])){
        header('Location: cadastrobixo.php?op=editar&id=' . $_POST['id']);
        exit;
    }
    if(!empty($_FILES['foto'])){
        $carregou = carregarFotoCliente($_FILES['foto'], $_POST['id']);
    }
    header('Location: listaBixo.php?atualizado=' . ($_POST['nome']));
    exit;    
}

function listarClientes(){
    
    header('Location: listaBixo.php');
    exit;
}