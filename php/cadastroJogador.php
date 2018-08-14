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
    <meta http-equiv="Content-Language" content="pt-br">
      <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

  <link rel="stylesheet" href="../css/estilo.css">
  
    <link rel="icon" href="../img/dog-w.png" type="image/x-icon" />
    <link rel="shortcut icon" href="../img/dog-w.png" type="image/x-icon" />
    <title>Cadastro do Jogador</title>

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
            <div class="card-header">Cadastrar um Jogador:</div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Nome Jogador -->
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" id="inputNome" placeholder="Nome Jogador">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                            <!-- apelido Jogador -->
                            <label for="inputApelido">Apelido</label>
                            <input type="text" class="form-control" id="inputApelido" placeholder="Apelido Jogador">
                            </div>
                            <div class="col-md-6">
                                <label for="inputGenero">Genero</label>
                                <select id="inputGenero" class="form-control">
                                    <option selected>Selecione...</option>
                                    <option>Masculino</option>
                                    <option>Feminino</option>
                                    <option>Outro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <!-- Nome email -->
                                    <label for="inputEmail">E-mail</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                                <div class="col-md-6">
                                    <label for="customFileLang">Imagem de perfil</label>
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
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputSenha">Senha</label>
                                <input type="password" class="form-control" id="inputSenha" placeholder="Senha">  
                            </div>
                            <div class="col-md-6">
                                <label for="inputConfirmaSenha">Confirme a Senha</label>
                                <input type="password" class="form-control" id="inputConfirmaSenha" placeholder="Confirme a Senha">
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