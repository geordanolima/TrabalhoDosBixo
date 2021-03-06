<?php
    require_once('FuncoesLogin.php');
    require_once('Funcoeshtml.php');
    isAutenticado();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php montaHeader(); ?>
    <title>Lista de bixo</title>

</head>
<body>
    <?php montamenu(); ?>

 <!-- ############################################################################### -->
    
    <div class="container cadastro">
            <div class="card card-register ">
                <div class="d-flex bd-highlight mb-3 card-header">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5>Lista de Jogadores:<h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="cadastroJogador.php" class="btn btn-block btn-success" role="button" aria-pressed="true" >Cadastrar</a>  
                    </div>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($_GET['excluido'])){
                    ?>
                    <div class="alert alert-danger" role="alert"> 
                        O Jogador <?=$_GET['excluido']?> foi excluido!
                    </div>
                   <?php } else if (isset($_GET['atualizado'])){ ?>
                    <div class="alert alert-warning" role="alert"> 
                        O Jogador <?=$_GET['atualizado']?> foi alterado. #Ciborgue!
                    </div>
                    <?php } else if (isset($_GET['erro']) && ($_GET['erro']=='404')){ ?>
                    <div class="alert alert-danger" role="alert"> 
                        Erro! O Jogador morreu!
                    </div>
                    <?php } else if (isset($_GET['cadastro'])){ ?>
                    <div class="alert alert-success" role="alert"> 
                        O Jogador <?=$_GET['cadastro']?> foi Cadastrado!
                    </div>
                    <?php } ?>              
                      
                </div>
                <div class="card-body">
                    <form>
                        <?php foreach ($vetor as $registro) { ?>
                            <div class="form-group">
                                <div class="form-row" >
                                    <div class="col-md-9">
                                        <label for="inputBixo1">Nome</label>
                                        <input type="text" class="form-control" id="inputBixo1"  value="<?=$registro->getNome()?>" disabled>
                                    </div>
                                    <div class="col-md-3">
                                        <div class=" form-row" style="padding-top: 30px;">
                                            <div class="col-md-6">
                                                <a href="FuncoesJogador.php?op=editar&id=<?=$registro->getId()?>" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>                                            
                                            </div>
                                            <div class="col-md-6">
                                                <a href="FuncoesJogador.php?op=excluir&id=<?=$registro->getId()?>" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                        <?php } ?>                     
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