<!-- Grupo:
    Dierlys R
    Geordano L
    Madson N
    Rafael T
    Tiago W -->


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

    <title>Login</title>
</head>
    <body >
        
        <form class="container login p-4" action="php/FuncoesLogin.php" method="post">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="EmailLogin" name="email" placeholder="email@examplo.com">
            </div>
            <div class="form-group">
                <label for="Senha">Senha</label>
                <input type="password" class="form-control" id="SenhaLogin" name="senha" placeholder="Senha">
            </div>
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="dropdownCheck2">
                <label class="form-check-label" for="dropdownCheck2">
                    Lembrar-me
                </label>
            </div>
            <input type="hidden" name="op" value="logar">
                <button type="reset" class="btn btn-secundary left">Cadastrar</button>
                <button type="submit" class="btn btn-primary left"> Login </button>
                <span id="corpo" style="display: inline; padding-top: 15px;"></span>
        </form>

        <?php
        if(isset($_GET['deslogado'])) {
        ?>
            <div class="container alert alert-danger p-4 col-2 mt-3" role="alert"> 
               O Mamute Morreu!
            </div>  
        <?php } else if(isset($_GET['erro'])){ ?>
            <div class="container alert alert-danger p-4 col-2 mt-3" role="alert"> 
               Ta sabendo de nada tchê!
            </div>
        <?php } ?>
        <div class="card-footer" id="rodape">
            Joguinho maroto dos bixo TADS V @2018
        </div>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

        <script src="js/script.js"></script>
    </body>
</html>