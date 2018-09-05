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


 function excluirBixo()
{

    if(!isset($_GET['id'])){
        header('Location: ListaBixo.html?erro=404');
        exit;
    }
    $idBixo = strip_tags($_GET['id']);
    $Bixo = new Bixo();
    $Bixo->setId($idBixo);
    if($Bixo->excluirBixo()){
        header('Location: ListaBixo.php?excluido=' . ($idBixo));
        exit;   
    }else{
        echo "Bixo de ID = " . $idBixo . 'não pode ser excluido!';
    }
    //pesquiso no banco de dados o registro ID = 1
    //achado registro, executar comando DELETE ID = 1
    //em caso de sucesso verificar retorno para true, senao false
}

function buscarBixo()
{
    if(!isset($_GET['id'])){
        header('Location: ListaBixo.html?erro=404');
        exit;
    }
      
    $idBixo = strip_tags($_GET['id']);
    $Bixo = new Bixo('nome', 'descricao', '10', '15', '20', 'bixo1', '654', '123');
    $Bixo->setId($idBixo);
    if($Bixo->buscarBixo()){
        $dadosbixo = [
            'id'            => $Bixo->getId(),
            'nome'          => $Bixo->getNome(),
            'descricaoBixo' => $Bixo->getDescricao(),
            'Vida'          => $Bixo->getVida(),
            'ValorDefesa'   => $Bixo->getDefesa(),
            'Ataque'        => $Bixo->getAtaque(),
            'descImg'       => $Bixo->getImagem(),
            'Latitude'      => $Bixo->getLatitude(),
            'Longitude'     => $Bixo->getLongitude()
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
    if($bixo->atualizarBixo()){
        header('Location: listaBixo.php?atualizado=' . ($idBixo));
        exit;
    }else{
        echo "Bixo de ID = " . $idBixo . ' sem alterações!';
    }
    
    require_once('listaBixo.php');
    exit;

}

function atualizarBixo()
{
    if(empty($_POST['nome'])){
        header('Location: cadastrobixo.php?opcao=editar&id='.$_POST['id']);
        exit;
    }

    $carregou = carregarFotoBixo($_FILES['foto'], $_POST['nome']);
    if($carregou){
        header('Location: listagem.php?error=4');
        exit;
    }else{
        echo 'Algum erro aconteceu'. $_FILES['foto']['error'];
    }
    editarBixo();
    
}

function cadastrarBixo(){
    if (!empty($_POST['nome'])){
        $bixo = new Bixo($_POST['nome'],$_POST['descricaoBixo'],$_POST['Vida'],$_POST['ValorDefesa'],$_POST['Ataque'],$_POST['descImg'],$_POST['Latitude'],$_POST['Longitude']);

        if($bixo->cadastrarBixo()){
            header('Location: listabixo.php?cadastro=' . $_POST['nome']);
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

