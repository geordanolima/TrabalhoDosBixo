<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <link rel="stylesheet" href="css/estilo.css">
    

    <link rel="icon" href="img/dog-w.png" type="image/x-icon" />
    <link rel="shortcut icon" href="img/dog-w.png" type="image/x-icon" />

    <title>Lista de bixo</title>

</head>
<body>

        <div class="pos-f-t">
            <nav class="navbar navbar-dark bg-dark fixed-top 5-col">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation" onclick="openNav()">
                    <span> <img src="img/dog-w.png" style="width: 30px; height: 35px;"></span>
                    <label>
                        Joguinho dos bixo
                    </label>
                </button>
            </nav>
            
        </div>

    <div id="menuLateral" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="cadastroBixo.html">Cadastro bixo</a>
        <a href="cadastroJogador.html">Cadastro jogador</a>
        <a href="cadastroitem.html">Cadastro item</a>
        <a href="mapa.html">Mapa</a>
        <img class="logoimg" src="img/dog-w.png">
        <label class="logo">Joguinho dos bixo</label>
    </div>    

 <!-- ############################################################################### -->
    
    <div class="container cadastro">
            <div class="card card-register ">
                <div class="card-header">Lista de Bixo:</div>
                <div class="form-group">
                    <?php
                        if(isset($_GET['excluido'])){
                    ?>
                    <div class="alert alert-danger" role="alert"> 
                        O cliente <?=$_GET['excluido']?> foi excluido!
                    </div>
                   <?php }
                    ?>
                    
                        
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputBixo1">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo1" placeholder="Nome bixo" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-warning">Editar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="php/Funcoes.php?op=excluir&id=1" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputBixo2">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo2" placeholder="Nome bixo" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-warning">Editar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="php/Funcoes.php?op=excluir&id=2" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputBixo3">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo3" placeholder="Nome bixo" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                            <button type="button" class="btn btn-block btn-warning">Editar</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="php/Funcoes.php?op=excluir&id=3" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
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

    <script src="js/script.js"></script>
</body>
</html>