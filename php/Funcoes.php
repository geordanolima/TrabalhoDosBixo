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

function carregarFotoCliente($arquivoEmProcesso, $nomeCliente)
{
    $mimesValidos = [
        'image/png',
        'image/jpg',
        'image/jpeg'
    ];
    $validacao = in_array($arquivoEmProcesso['type'], $mimesValidos);
    if($validacao){
        $validacao = move_uploaded_file($arquivoEmProcesso['tmp_name'], './public/imgs/'.$nomeCliente.'.jpg');   
    }
    return $validacao;
}

function excluirCliente()
{

    if(!isset($_GET['id'])){
        header('Location: ../ListaBixo.php?erro=1');
        exit;
    }
    $idCliente = strip_tags($_GET['id']);
    
    header('Location: ../listaBixo.php?excluido=' . $idCliente);
    exit;
}

function editarCliente()
{
    if(!isset($_GET['id'])){
        header('Location: listaBixo.php?erro=1');
        exit;
    }
    $idCliente = strip_tags($_GET['id']);



    $dadosCliente = 
        [1=>[
            'id'        => 1,
            'nome'      => 'aaaaaaaaa',
            'DescricaoBixo'  => 'aaaaaaaa'
        ],
        2=>[
            'id'        => 2,
            'nome'      => 'bbbbbbbb',
            'DescricaoBixo'  => 'BBBBB'  
        ],
        3=>[
            'id'        => 3,
            'nome'      => 'ccccccc',
            'DescricaoBixo'  => 'ccccccccc'  
        ]

        ]
    ;
    require_once('../cadastrobixo.php');
    exit;

}


function listarClientes(){
    header('Location: listaBixo.php');
    exit;
}