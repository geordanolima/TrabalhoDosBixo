<?php
class Item
{
    private $id;
    private $nome;
    private $valor;
    private $bonus;
    private $imagem;

    public function __construct($nome = null, $valor = null, $bonus = null, $imagem = null){
        if($nome != null) $this->nome = $nome;
        if($valor != null) $this->valor = $valor;
        if($bonus != null) $this->bonus = $bonus;
        if($imagem != null) $this->imagem = $imagem;
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




    //refatoracao com o projeto em andamento com o
    //intuito de diminuir impacto da manutencao,
    //na ideia de gerar menos bugs em manutencoes
    // public function salvar()
    // {

    //     if($this->id != null) return $this->atualizar();

    //     if($this->id == null) return $this->criar();

    //     return false;
    // }

    public function cadastrarItem(){
        $sql = 'INSERT INTO itens (nome, bonus, valor, img) 
        VALUES (:nome, :bonus, :valor, :img)';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(':bonus', $this->bonus, PDO::PARAM_INT);
        $consulta->bindValue(':valor', $this->valor, PDO::PARAM_INT);
        $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);
        
        return $consulta->execute();
       
    }

   public function excluirItem(){
    if($this->id != null){
        $conexao = $this->database->getConexao();
        $retornoQuery = $conexao->exec('DELETE FROM itens 
                                        WHERE id =' . $this->id);
        if($retornoQuery) return true;
    }
    return false;
   }

   public function listarItens(){
    $sql = 'SELECT * FROM itens WHERE id = :id';
    $conexao = $this->database->getConexao();
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $retornoQuery = $consulta->execute();
    if(!$retornoQuery) return false;
    $registro = $consulta->fetchObject('classItem');
    return $registro;
   }

   public function atualizarItem(){
    if($this->id != null){
        $sql = 'UPDATE itens SET nome = :nome, 
        WHERE id = :id';
        $conexao = $this->database->getConexao();
        $update = $conexao->prepare($sql);
        $update->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(':bonus', $this->bonus, PDO::PARAM_INT);
        $consulta->bindValue(':valor', $this->valor, PDO::PARAM_INT);
        $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);
       
        return $update->execute();
    }
    return false;
   }
   
   public function buscarItem(){
    $sql = 'SELECT * FROM itens WHERE id = :id';
    $conexao = $this->database->getConexao();
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $retornoQuery = $consulta->execute();

    if(!$retornoQuery) return false;
    $registro = $consulta->fetchObject('classItem');
    return $registro;
   }
}