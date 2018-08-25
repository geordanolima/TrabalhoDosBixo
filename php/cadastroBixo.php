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
    <title>Cadastro dos Bixo</title>

</head>
<body>
    <?php
        require_once('Funcoeshtml.php');
        montamenu();
    ?>

<!-- ############################################################################### -->
    
<div class="container cadastro">
        <div class="card card-register ">
            <div class="card-header">Cadastrar um bicho:</div>
            <div class="card-body">
                <form method="post" action="Funcoesbixo.php" enctype="multipart/form-data">
                    <input type="hidden" name="op" 
                        value="<?=(isset($_GET['id'])) ? 'atualizar' : 'cadastro';?>">
                    <input type="hidden" name="id" 
                        value="<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>">

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="inputNome">Nome</label>
                                <input type="text" class="form-control" name="nome" id="inputNome" placeholder="Nome Bicho" 
                                    value="<?=(isset($dadosbixo)) ? $dadosbixo['nome'] : '';?>">
                            </div>                            
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputDefesa">Descrição</label>
                                <input type="text" class="form-control" name="descricaoBixo"  placeholder="Descrição do bixo" 
                                    value="<?=(isset($_GET['id'])) ? $dadosbixo['descricaoBixo'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputVida">Vida</label>
                                <input type="number" class="form-control" name="Vida" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo['vida'] : '';?>">
                            </div>                         
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAtaque">Ataque</label>
                                <input type="number" class="form-control" name="Ataque" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo['ataque'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputDefesa">Defesa</label>
                                <input type="number" class="form-control" name="ValorDefesa" min="0" max="100" step="10" placeholder="0" value="<?=(isset($_GET['id'])) ? $dadosbixo['defesa'] : '';?>">
                            </div>                                                     
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="inputAtaque">Latitude</label>
                                <input type="number" class="form-control" name="Latitude" min="0" value="<?=(isset($_GET['id'])) ? $dadosbixo['latitude'] : '';?>">
                            </div>   
                            <div class="col-md-6">
                                <label for="inputDefesa">Longitude</label>
                                <input type="number" class="form-control" name="Longitude" min="0" value="<?=(isset($_GET['id'])) ? $dadosbixo['longitude'] : '';?>">
                            </div>
                                                        
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-10">
                                    <label for="customFileLang">Imagem Bixo</label>
                                    <div class="input-group form-row">
                                        <input type="text" class="form-control" readonly="" value="<?=(isset($_GET['id'])) ? $dadosbixo['descImg'] : '';?>">
                                        <label style="height: 10px;">
                                            <span class="btn btn-primary input-group-btn">
                                                Buscar <input type="file" style="display: none;" multiple="" name="foto" accept="image/*"> 
                                            </span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img src="<?=(isset($_GET['id'])) ? $dadosbixo['img'] : '../public/imgs/padrao.png' ?>" height="90px" width="90px" style="border-radius: 50%;">
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