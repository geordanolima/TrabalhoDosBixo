<?php

require_once('Funcoes.php');
if(!isset($_REQUEST['op'])){
    listarbixos();
    exit;
}
$opcao = strip_tags($_REQUEST['op']);

switch($opcao){
    case 'excluir':
        excluirbixo();
        break;
    
    case 'editar':
        editarbixo();
        break;
    
    case 'atualizar':
        atualizarbixo();
        break;
    
    default:
        listarbixos();
        break;
     
}

function carregarFotoBixo($arquivoEmProcesso, $idbixo)
{
    
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

function excluirbixo()
{

    if(!isset($_GET['id'])){
        header('Location: ListaBixo.php?erro=1');
        exit;
    }
    $idbixo = strip_tags($_GET['id']);
    
    header('Location: listaBixo.php?excluido=' . $idbixo);
    exit;
}

function editarbixo()
{
    if(!isset($_GET['id'])){
        header('Location: listaBixo.php?erro=404');
        exit;
    }
    $idbixo = strip_tags($_GET['id']);



    $dadosbixo = 
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
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
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
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
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
                'descImg'       => 'bixo' . $idbixo . '.png',
                'img'           => '../public/imgs/bixo' . $idbixo . '.png'
            ]
        ];
    require_once('cadastrobixo.php');
    exit;

}


function atualizarbixo()
{
       
    if(empty($_POST['nome']) || empty($_POST['descricaoBixo'])){
        header('Location: cadastrobixo.php?op=editar&id=' . $_POST['id']);
        exit;
    }
    if(!empty($_FILES['foto'])){
        $carregou = carregarFotoBixo($_FILES['foto'], $_POST['id']);
    }
    header('Location: listaBixo.php?atualizado=' . ($_POST['nome']));
    exit;    
}

function listarbixos(){
    
    header('Location: listaBixo.php');
    exit;
}