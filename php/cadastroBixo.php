<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="../css/estilo.css">

    <link rel="icon" href="../img/dog-w.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/dog-w.png" type="image/x-icon" />
    
    <title>Cadastro dos Bixo</title>

</head>
<body>
        <div class="pos-f-t">
            <nav class="navbar navbar-dark bg-dark fixed-top 5-col">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">
                    <span> <img src="../img/dog-w.png" style="width: 30px; height: 35px;"></span>
                    <label>
                        Joguinho dos bixo
                    </label>
                </button>
            </nav>
            
        </div>

    <div id="menuLateral" class="sidenav">
        <?php
            if(isset($_SESSION['nome'])) {
            ?>
            <a id="buena" href="#"> Buenas <?=$_SESSION['nome']?> !</a>  
        <?php } ?>
        <a href="cadastroBixo.php">Cadastro bixo</a>
        <a href="ListaBixo.php">Lista de bixo</a>
        <a href="cadastroJogador.php">Cadastro jogador</a>
        <a href="cadastroitem.php">Cadastro item</a>
        <a href="mapa.php">Mapa</a>
        <img src="../img/dog-w.png" style="width:100px;margin-top: 50%;margin-left: 30px;">
        <label class="logo">Joguinho dos bixo</label>
        <a href="funcoes.php?op=sair">Sair</a>
    </div>    

<!-- ############################################################################### -->
    
<div class="container cadastro">
        <div class="card card-register ">
            <div class="card-header">Cadastrar um bicho:</div>
            <div class="card-body">
                <form method="post" action="Funcoes.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?=$idbixo;?>">
                <input type="hidden" name="op" value="atualizar">
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome Bicho" 
                                    value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['nome'] : '';?>">
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputDefesa">Descrição</label>
                                <input type="text" class="form-control" name="descricaoBixo"  placeholder="Descrição do bixo" 
                                    value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['descricaoBixo'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputVida">Vida</label>
                                <input type="number" class="form-control" name="Vida" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['vida'] : '';?>">
                            </div>                         
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAtaque">Ataque</label>
                                <input type="number" class="form-control" name="Ataque" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['ataque'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputDefesa">Defesa</label>
                                <input type="number" class="form-control" name="ValorDefesa" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['defesa'] : '';?>">
                            </div>                                                     
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAtaque">Latitude</label>
                                <input type="number" class="form-control" name="Latitude" min="0" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['latitude'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputDefesa">Longitude</label>
                                <input type="number" class="form-control" name="Longitude" min="0" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['longitude'] : '';?>">
                            </div>
                                                        
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <label for="customFileLang">Imagem Bixo</label>
                                    <div class="input-group form-row">
                                        <input type="text" class="form-control" readonly="" value="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['descImg'] : '';?>">
                                        <label style="height: 10px;">
                                            <span class="btn btn-primary input-group-btn">
                                                Buscar <input type="file" style="display: none;" multiple="" name="foto" accept="image/*"> 
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?=(isset($_GET['id'])) ? $dadosbixo[$idbixo]['img'] : '../public/imgs/padrao.png' ?>" height="90px" width="90px" style="border-radius: 50%;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Atualizar">
                </form>
            </div>
        </div>
    </div>

 <!-- ############################################################################### -->


    <div class="card-footer" id="rodape">Joguinho maroto dos bixo TADS V @2018</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>
</body>
</html>