<?php
    require_once('FuncoesLogin.php');
    isAutenticado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        require_once('Funcoeshtml.php');
        montaHeader();
    ?>
    <title>Cadastro do Jogador</title>

</head>
<body>
    <?php
        require_once('Funcoeshtml.php');
        montamenu();
    ?>   

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
                                <input type="text" class="form-control" id="inputNome" placeholder="Nome Jogador"
                                value="<?=(isset($bagaca)) ? $bagaca['nome'] : '';?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                            <!-- apelido Jogador -->
                            <label for="inputApelido">Apelido</label>
                            <input type="text" class="form-control" id="inputApelido" placeholder="Apelido Jogador"
                                value="<?=(isset($bagaca)) ? $bagaca['apelido'] : '';?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputGenero">Genero</label>
                                <select id="inputGenero" class="form-control" >
                                    <option selected='selected'> Selecione...</option>
                                    <option <?=(isset($bagaca)) ? (($bagaca['genero'] == 'Masculino') ? "selected='selected'" : '') : '';?>> Masculino</option>
                                    <option <?=(isset($bagaca)) ? (($bagaca['genero'] == 'Feminino') ? "selected='selected'" : '') : '';?>> Feminino</option>
                                    <option <?=(isset($bagaca)) ? (($bagaca['genero'] == 'Outro') ? "selected='selected'" : '') : '';?>> Outro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                <!-- Nome email -->
                                    <label for="inputEmail">E-mail</label>
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email"
                                    value="<?=(isset($bagaca)) ? $bagaca['email'] : '';?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="customFileLang">Imagem de perfil</label>
                                    <div class="input-group form-row">
                                        <input type="text" class="form-control" readonly="" value="<?=(isset($bagaca)) ? $bagaca['descImg'] : '';?>">
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
                                <input type="password" class="form-control" id="inputSenha" placeholder="Senha" value="<?=(isset($bagaca)) ? $bagaca['senha'] : '';?>">  
                            </div>
                            <div class="col-md-6">
                                <label for="inputConfirmaSenha">Confirme a Senha</label>
                                <input type="password" class="form-control" id="inputConfirmaSenha" placeholder="Confirme a Senha" value="<?=(isset($bagaca)) ? $bagaca['senha'] : '';?>">
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