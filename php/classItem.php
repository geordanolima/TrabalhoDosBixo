<?php
require_once('Conexao.php');
class Item
{
    private $id;
    private $nome;
    private $valor;
    private $bonus;
    private $imagem;

    public function __construct($nome = null, 
                                $valor = null, 
                                $bonus = null, 
                                $imagem = null){
        if($nome != null) $this->nome = $nome;
        if($valor != null) $this->valor = $valor;
        if($bonus != null) $this->bonus = $bonus;
        if($imagem != null) $this->imagem = $imagem;

        $this->database = Conexao::getInstancia();
    }

    public function cadastrarItem(){
        $sql = "INSERT INTO itens ( itens.nome, 
                                    itens.bonus, 
                                    itens.valor, 
                                    itens.img) 
                            VALUES ('" . $this->nome . "', 
                                    '" . $this->bonus . "',
                                     " . $this->valor . ", 
                                    '" . $this->imagem . "');";
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);        

        return $consulta->execute();       
    }

    public function atualizarItem(){
        if($this->id != null){
            $conexao = $this->database->getConexao();            
            $sql = "UPDATE itens SET 
                                itens.nome = '" . $this->nome . "',
                                itens.bonus = '" . $this->bonus . "' ,
                                itens.valor = " . $this->valor . " ,
                                itens.img = '" . $this->imagem . "'  
                    WHERE id = " . $this->id . ";";
            $update = $conexao->prepare($sql);
            return $update->execute();
        } else {
            return false;
        }
    }

    public function excluirItem(){
        if($this->id != null){
            $conexao = $this->database->getConexao();
            $retornoQuery = $conexao->exec('DELETE FROM itens 
                                            WHERE id =' . $this->id);
            return $retornoQuery;
        }
        return false;
    }

   public function ListarItens(){        
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare('SELECT * FROM itens');
        $consulta->execute();
        
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Item');
   }
   
   public function buscarItem(){
    $conexao = $this->database->getConexao();    
    $consulta = $conexao->prepare('SELECT * FROM itens WHERE id = ' . $this->id . ';');
    $retornoQuery = $consulta->execute();

    if(!$retornoQuery) {
        return false;
    }
    $item = $consulta->fetchObject('Item');
    return $item;
   }

    /**
     * Get the value of bonus
     */ 
    public function getBonus()
    {
        return $this->bonus;
    }

    /**
     * Set the value of bonus
     *
     * @return  self
     */ 
    public function setBonus($bonus)
    {
        $this->bonus = $bonus;

        return $this;
    }

    /**
     * Get the value of imagem
     */ 
    public function getImagem()
    {
        return $this->imagem;
    }

    /**
     * Set the value of imagem
     *
     * @return  self
     */ 
    public function setImagem($imagem)
    {
        $this->imagem = $imagem;

        return $this;
    }

    /**
     * Get the value of valor
     */ 
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set the value of valor
     *
     * @return  self
     */ 
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}