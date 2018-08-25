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

    <title>Lista de Itens</title>

</head>
<body>
    <?php
        require_once('Funcoeshtml.php');
        montamenu();
      
    ?>

 <!-- ############################################################################### -->
    
 <div class="container cadastro">
            <div class="card card-register ">
                <div class="d-flex bd-highlight mb-3 card-header">
                    <div class="mr-auto p-2 bd-highlight">
                        <h5>Lista de Itens:<h5>
                    </div>
                    <div class="p-2 bd-highlight">
                        <a href="cadastroItem.php" class="btn btn-block btn-success" role="button" aria-pressed="true" >Cadastrar</a> 
                    </div>
                </div>
                <div class="form-group">
                    <?php
                        if(isset($_GET['excluido'])){
                    ?>
                    <div class="alert alert-danger" role="alert"> 
                        O Item <?=$_GET['excluido']?> foi excluido!
                    </div>
                   <?php } else if (isset($_GET['atualizado'])){ ?>
                    <div class="alert alert-warning" role="alert"> 
                        O Item <?=$_GET['atualizado']?> foi alterado!
                    </div>
                    <?php } else if (isset($_GET['erro']) && ($_GET['erro']=='404')){ ?>
                    <div class="alert alert-danger" role="alert"> 
                        Erro! O item se foi!
                        </div>
                    <?php } else if (isset($_GET['cadastro'])){ ?>
                    <div class="alert alert-success" role="alert"> 
                        O Item <?=$_GET['cadastro']?> foi Cadastrado!
                    </div>
                    <?php } ?>                        
                </div>
                <div class="card-body">
                    <form>
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 1)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row" >
                                <div class="col-md-9">
                                    <label for="inputItem1">Nome</label>
                                    <input type="text" class="form-control" id="inputItem1"  value="Chimarrao" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                            <a href="FuncoesItem.php?op=editar&id=1" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>                                            
                                        </div>
                                        <div class="col-md-6">
                                            <a href="FuncoesItem.php?op=excluir&id=1" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 2)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputItem2">Nome</label>
                                    <input type="text" class="form-control" id="inputItem2" value="Erva" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                        <a href="FuncoesItem.php?op=editar&id=2" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="FuncoesItem.php?op=excluir&id=2" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>    
                        <div class="form-group" <?php if(isset($_GET['excluido']) && ($_GET['excluido'] == 3)){ ?> style="visibility: hidden"<?php } ?>>
                            <div class="form-row">
                                <div class="col-md-9">
                                    <label for="inputItem3">Nome</label>
                                    <input type="text" class="form-control" id="inputItem3" value="Agua Quente" disabled>
                                </div>
                                <div class="col-md-3">
                                    <div class=" form-row" style="padding-top: 30px;">
                                        <div class="col-md-6">
                                        <a href="FuncoesItem.php?op=editar&id=3" class="btn btn-block btn-warning"role="button" aria-pressed="true">Editar</a>
                                        </div>
                                        <div class="col-md-6">
                                            <a href="FuncoesItem.php?op=excluir&id=3" class="btn btn-block btn-danger"role="button" aria-pressed="true">Excluir</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>                     
                    </form>
                </div>
            </div>
        </div>


<!--- rafa --> 
<!--
<h1 align="center">Lista de Itens</h1>
	<br>
	<p align="center">Item 1
		<a href="manager.php?opcao=editar&id=1">Editar</a>	
		<a href="manager.php?opcao=excluir&id=1">Excluir</a>
	</p>
	<p align="center">Item 2
		<a href="manager.php?opcao=editar&id=2">Editar</a>	
		<a href="manager.php?opcao=excluir&id=2">Excluir</a>
	</p>
	<p align="center">Item 3
		<a href="manager.php?opcao=editar&id=3">Editar</a>	
		<a href="manager.php?opcao=excluir&id=3">Excluir</a>
    </p>
    -->
 

 <!-- ############################################################################### -->


    <div class="card-footer" id="rodape">Joguinho maroto dos pokemons TADS V @2018</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

    <script src="../js/script.js"></script>
</body>
</html>