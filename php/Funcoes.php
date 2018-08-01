<?php
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

require_once('Funcoes.php');
//if(!isset($_GET['op']) && !isset($_POST['op'])){
if(!isset($_REQUEST['op'])){
    listarClientes();
    exit;
}
$opcao = strip_tags($_REQUEST['op']);

//controller nao profissional
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

function listarClientes(){
    //SELECT * FROM cliente
    //retornar para a view (frontend) array com os dados
    header('Location: listaBixo.php');
    exit;
}