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
            'id'            => 1,
            'nome'          => 'Cusco',
            'descricaoBixo' => 'tambem conhecido como cachorro',
            'vida'          => 10,
            'ataque'        => 17,
            'defesa'        => 32,
            'latitude'      => 1254,
            'longitude'     => 6544,
            'descImg'       => 'bixo' . $idCliente . '.png',
            'img'           => '../public/imgs/bixo' . $idCliente . '.png'
        ],
        2=>[
            'id'            => 2,
            'nome'          => 'Guaipeca',
            'descricaoBixo' => 'Melhor amigo do Gaucho',
            'vida'          => 35,
            'ataque'        => 11,
            'defesa'        => 51,
            'latitude'      => 6655,
            'longitude'     => 6547,
            'descImg'       => 'bixo' . $idCliente . '.png',
            'img'           => '../public/imgs/bixo' . $idCliente . '.png'
        ],
        3=>[
            'id'        => 3,
            'nome'      => 'Tomba',
            'descricaoBixo'  => 'Tomba lata, ou Vira-Latas',
            'vida'          => 85,
            'ataque'        => 33,
            'defesa'        => 12,
            'latitude'      => 5544,
            'longitude'     => 9877,
            'descImg'       => 'bixo' . $idCliente . '.png',
            'img'           => '../public/imgs/bixo' . $idCliente . '.png'
        ]

        ]
    ;
    require_once('cadastrobixo.php');
    exit;

}


function listarClientes(){
    header('Location: listaBixo.php');
    exit;
}