<?php

if (isset($_REQUEST['op'])){
    $opcao = strip_tags($_REQUEST['op']);

    switch($opcao){
        case 'excluir':
            excluirItem();
            break;
        
        case 'editar':
            busarItem();
            break;
        
        case 'atualizar':
            atualizarItem();
            break;
                
        case 'listar':
            listarItem();
            break;
    }   
}

 function excluirItem()
{

    if(!isset($_GET['id'])){
        header('Location: index.html?erro=1');
        exit;
    }
    $idItem = strip_tags($_GET['id']);
    $item = new Item();
    $item->setId($idItem);
    if($item->excluirItem()){
        echo "Item de ID = " . $idItem . ' excluido!';    
    }else{
        echo "Item de ID = " . $idItem . 'não pode ser excluido!';
    }
    //pesquiso no banco de dados o registro ID = 1
    //achado registro, executar comando DELETE ID = 1
    //em caso de sucesso verificar retorno para true, senao false
    

}

function editarPokemon()
{
    if(!isset($_GET['id'])){
        header('Location: index.html?erro=1');
        exit;
    }
    if(isset($_GET['error'])){
        if($_GET['error'] == 3){
            //redirecionar para uma pagina de erros
            //ou retornar com mensagem explicativa do erro para
            //a mesma pagina de edicao do cadastro
        }
    }
   


    //procurar no banco, pegar dados do cliente
    $dadosPokemon = [
    	1 =>[
        'id'        => 1,
        'nome'      => 'Charizard',
        'vida'  => '100',
        'ataque'  => '80',
        'defesa'  => '65',
        'latitude'  => '100',
        'longetude'  => '100'],
        2=>[
        	 'id'        => 2,
        'nome'      => 'Blostaise',
        'vida'  => '100',
        'ataque'  => '85',
        'defesa'  => '70',
        'latitude'  => '100',
        'longetude'  => '100'],
        3=>[
        	 'id'        => 3,
        'nome'      => 'Pikachu',
        'vida'  => '100',
        'ataque'  => '100',
        'defesa'  => '100',
        'latitude'  => '100',
        'longetude'  => '100']
    ];
    require_once('edit-pokemon.php');
    exit;

    
    $idItem = strip_tags($_GET['id']);
    $item = new Item();
    $item->setId($idItem);
    if($item->atualizarItem()){
        echo "Item de ID = " . $idItem . ' excluido!';    
    }else{
        echo "Item de ID = " . $idItem . 'não pode ser excluido!';
    }

}

function atualizarPokemon()
{
    if(empty($_POST['nome']) || empty($_POST['vida'])){
        header('Location: manager.php?opcao=editar&id='.$_POST['id']);
        exit;
    }

    //procura no banco onde o ID for igual ao repassado
    //via hidden e modifica os dados de acordo com o que vier
    //do form e em seguida envia UPDATE pro banco
    // echo '<pre>';
    // print_r($_FILES);
    // echo '</pre>';
        $carregou = carregarFotoPokemon($_FILES['foto'], $_POST['nome']);
        if($carregou){
            header('Location: listagem.php?error=4');
            exit;
        }else{
            echo 'Algum erro aconteceu'. $_FILES['foto']['error'];
        }
    
    
}