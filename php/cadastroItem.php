<?php
    require_once('FuncoesLogin.php');
    require_once('Funcoeshtml.php');
    isAutenticado();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php montaHeader();?>
    <title>Cadastro do Item</title>

</head>
<body>
    <?php montamenu();?>

 <!-- ############################################################################### -->
    
    <div class="container cadastro">

            <div class="card card-register ">
                <div class="card-header">Cadastrar um Item:</div>
                <div class="card-body">
                    <form class="container" action="FuncoesItem.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="op" 
                        value="<?=(isset($_GET['id'])) ? 'atualizar' : 'cadastro';?>">
                    <input type="hidden" name="id" 
                        value="<?=(isset($_GET['id'])) ? $_GET['id'] : '';?>">

                        <div class="form-group">
                            <div class="form-row">
                                <div class="col-md-6">
                                    <label for="inputItem">Nome</label>
                                    <input type="text" class="form-control" id="inputItem" name="nome" placeholder="Nome Item" required
                                        value="<?=(isset($item)) ? $item['nome'] : '';?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputBonus">Bônus</label>
                                    <select id="inputBonus" name="bonus" class="form-control" required 
                                        value="<?=(isset($item)) ? $item['bonus'] : '';?>">
                                        <option selected>Água</option>
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
                                    <input type="number" class="form-control" name="valor" min="0" max="100" step="10" placeholder="0" required 
                                        value="<?=(isset($item)) ? $item['valor'] : '';?>">
                                </div>
                                <div class="col-md-6">
                                    <div class="form-row">
                                        <div class="col-md-10">
                                            <label for="customFileLang">Imagem Item</label>
                                            <div class="input-group form-row">
                                                <input type="text" class="form-control" readonly="" name="imagem" value="<?=(isset($_GET['id'])) ? $item['imagem'] : '';?>">
                                                <label style="height: 10px;">
                                                    <span class="btn btn-primary input-group-btn">
                                                        Buscar <input type="file" style="display: none;" multiple="" name="foto" accept="image/*"> 
                                                    </span>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-2">
                                            <img src="<?=(isset($_GET['id'])) ? '../public/imgs/' . $item['imagem'] : '../public/imgs/padrao.png' ?>" height="90px" width="90px" style="border-radius: 50%;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Cadastrar / Atualizar</button>
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