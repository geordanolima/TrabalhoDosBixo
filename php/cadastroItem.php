<?php
    require_once('FuncoesLogin.php');
    isAutenticado();
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

    <title>Cadastro do Item</title>

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
        <a href="ListaJogador.php">Lista de Jogadores</a>
        <a href="cadastroitem.php">Cadastro item</a>
        <a href="mapa.php">Mapa</a>
        <img src="../img/dog-w.png" style="width:100px;margin-top: 50%;margin-left: 30px;">
        <label class="logo">Joguinho dos bixo</label>
        <a href="FuncoesLogin.php?op=sair">Sair</a>
    </div>    

 <!-- ############################################################################### -->
    
    <div class="container cadastro">

            <div class="card card-register ">
                <div class="card-header">Cadastrar um Item:</div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <!-- Nome Item -->
                                    <label for="inputItem">Nome</label>
                                    <input type="text" class="form-control" id="inputItem" placeholder="Nome Item">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputGenero">Bônus</label>
                                    <select id="inputGenero" class="form-control">
                                        <option selected>Selecione o Bônus</option>
                                        <option>Água</option>
                                        <option>Fogo</option>
                                        <option>Terra</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="inputValor">Valor Item</label>
                                    <input type="number" class="form-control" name="ValorItem" min="0" max="100" step="10" placeholder="0"> 
                                </div>
                                <div class="col-md-6">
                                    <label for="customFileLang">Imagem Item</label>
                                    <div class="input-group form-row">
                                        <input type="text" class="form-control" readonly="">
                                        <label style="height: 10px;">
                                            <span class="btn btn-primary input-group-btn">
                                                Buscar <input type="file" style="display: none;" multiple=""> 
                                            </span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
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