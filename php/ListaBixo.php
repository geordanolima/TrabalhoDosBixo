<?php
    session_start();
    if(!isset($_SESSION['logado'])){
        header('Location: ../login.php');
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<?php
        require_once('Funcoeshtml.php');
        montaHeader();
    ?>

    <title>Lista de bixo</title>

</head>
<body>
    <?php
        require_once('Funcoeshtml.php');
        montamenu();
    ?>
 <!-- ############################################################################### -->
    
    <div class="container cadastro">
            <div class="card card-register ">
                <div class="row card-header justify-content-between">
                    <h5>Lista de Bixos:<h5>
                    <a href="cadastroBixo.php" class="btn btn-block btn-success" role="button" aria-pressed="true" >Cadastrar</a>  
                </div>
                <div class="form-group">
                    <?php
                        if(isset($_GET['excluido'])){
                    ?>
                    <div class="alert alert-danger" role="alert"> 
                        O bixo <?=$_GET['excluido']?> foi excluido!
                    </div>
                   <?php } else if (isset($_GET['atualizado'])){ ?>
                    <div class="alert alert-warning" role="alert"> 
                        O bixo <?=$_GET['atualizado']?> foi alterado!
                    </div>
                    <?php } else if (isset($_GET['erro']) && ($_GET['erro']=='404')){ ?>
                    <div class="alert alert-danger" role="alert"> 
                        Erro! Bixo morreu!
                    </div>
                    <?php } ?>                  
                        
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 1)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row" >
                                <div class="col-md-9">
                                    <label for="inputBixo1">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo1"  value="Cusco" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                            <a href="Funcoes.php?op=editar&id=1" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <a href="Funcoes.php?op=excluir&id=1" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 2)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputBixo2">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo2" value="Guaipeca" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                        <a href="Funcoes.php?op=editar&id=2" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="Funcoes.php?op=excluir&id=2" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 3)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputBixo3">Nome</label>
                                    <input type="text" class="form-control" id="inputBixo3" value="Tomba" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                        <a href="Funcoes.php?op=editar&id=3" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="Funcoes.php?op=excluir&id=3" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
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

    <script src="../js/script.js"></script>
</body>
</html>