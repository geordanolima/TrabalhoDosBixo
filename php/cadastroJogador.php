<?php
    require_once('FuncoesLogin.php');
    require_once('Funcoeshtml.php');
    isAutenticado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        montaHeader();
    ?>
    <title>Cadastro do Jogador</title>

</head>
<body>
    <?php
        montamenu();
    ?>   

    <!-- ############################################################################### -->


    <div class="container cadastro">
        <div class="card card-register ">
            <div class="card-header">Cadastrar um Jogador:</div>
            <div class="card-body">
                <form class="container" action="FuncoesJogador.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="op" 
                        value="<?=(isset($_GET['id'])) ? 'atualizar' : 'cadastro';?>">
                    <input type="hidden" name="id" 
                        value="<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>">
                    <div class="form-group">
                        <div class="form-row">
                            <!-- Nome Jogador -->
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" id="inputNome" name="nome" placeholder="Nome Jogador" required
                                    value="<?=(isset($_GET['id'])) ? $bagaca['nome'] : '';?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                            <!-- apelido Jogador -->
                            <label for="inputApelido">Apelido</label>
                            <input type="text" class="form-control" id="inputApelido"  name="apelido" placeholder="Apelido Jogador"
                                value="<?=(isset($bagaca)) ? $bagaca['apelido'] : '';?>">
                            </div>
                            <div class="col-md-6">
                                <label for="inputGenero">Genero</label>
                                <select id="inputGenero" class="form-control" required name="genero">
                                    <option selected='selected'> Masculino</option>
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
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email" name="email" required
                                    value="<?=(isset($bagaca)) ? $bagaca['email'] : '';?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <label for="customFileLang">Imagem de perfil</label>
                                            <div class="input-group form-row">
                                                <input type="text" class="form-control" readonly="" name="imagem" value="<?=(isset($bagaca)) ? $bagaca['descImg'] : '';?>">
                                                <label style="height: 10px;">
                                                    <span class="btn btn-primary input-group-btn">
                                                        Buscar <input type="file" style="display: none;" multiple="" name="foto" accept="image/*"> 
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="<?=(isset($_GET['id'])) ? '../public/imgs/' . $bagaca['descImg'] : '../public/imgs/padrao.png' ?>" height="90px" width="90px" style="border-radius: 50%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputSenha">Senha</label>
                                <input type="password" class="form-control" id="inputSenha" name="senha" placeholder="Senha" required value="<?=(isset($bagaca)) ? $bagaca['senha'] : '';?>">  
                            </div>
                            <div class="col-md-6">
                                <label for="inputConfirmaSenha">Confirme a Senha</label>
                                <input type="password" class="form-control" id="inputConfirmaSenha" placeholder="Confirme a Senha" required value="<?=(isset($bagaca)) ? $bagaca['senha'] : '';?>">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar / Atualizar</button>
                </form>
            </div>
        </div>
    </div>
<!-- ############################################################################### -->


<?php montafooterScripts(); ?>
    
</body>
</html>