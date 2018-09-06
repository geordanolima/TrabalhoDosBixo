<?php
require_once('Conexao.php');
class Bixo
{
    private $id;
    private $nome;
    private $descricao;
    private $vida;
    private $defesa;
    private $ataque;
    private $img;
    private $lati;
    private $long;

    public function __construct($nome = null,
                                $descricao = null, 
                                $vida = null,                                
                                $defesa = null, 
                                $ataque = null, 
                                $img = null,
                                $lati = null,
                                $long = null){
        if($nome != null) $this->nome = $nome;
        if($descricao != null) $this->descrcao = $descricao;
        if($vida != null) $this->vida = $vida;
        if($defesa != null) $this->defesa = $defesa;
        if($ataque != null) $this->ataque = $ataque;
        if($img != null) $this->img = $img;
        if($lati != null) $this->lati = $lati;
        if($long != null) $this->long = $long;

        $this->database = Conexao::getInstancia();
    }

    public function cadastrarBixo(){
        $sql = "INSERT INTO bixos (bixos.nome, 
                                   bixos.descricao, 
                                   bixos.vida, 
                                   bixos.ataque, 
                                   bixos.defesa, 
                                   bixos.lati, 
                                   bixos.long, 
                                   bixos.img) 
                           VALUES ('" . $this->nome . "', 
                                   '" . $this->descricao ."', 
                                    " . $this->vida . ", 
                                    " . $this->ataque . ", 
                                    " . $this->defesa . ", 
                                   '" . $this->lati . "', 
                                   '" . $this->long . "', 
                                   '" . $this->img . "')";
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);

        return  $consulta->execute();
    }

    public function atualizarBixo(){
        if ($this->id != null) {
            $sql = "UPDATE bixos SET bixos.nome = '" . $this->nome . "',
                                    bixos.descricao = '" . $this->descricao ."', 
                                    bixos.vida = " . $this->vida . ", 
                                    bixos.ataque = " . $this->ataque . ", 
                                    bixos.defesa = " . $this->defesa . ", 
                                    bixos.lati = '" . $this->lati . "', 
                                    bixos.long = '" . $this->long . "', 
                                    bixos.img = 'bixo" . $this->id . ".png'
                    WHERE bixos.id = " . $this->id . ";";
            $conexao = $this->database->getConexao();
            $consulta = $conexao->prepare($sql);
            
            return  $consulta->execute();            
        } else {
            return false;
        }
    }

    public function excluirBixo(){
        if($this->id != null){
            $conexao = $this->database->getConexao();
            $retornoQuery = $conexao->exec('DELETE FROM bixos 
                                            WHERE id =' . $this->id);
            return $retornoQuery;
        }
        return false;
    }

    public function ListarBixos(){
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare('SELECT * FROM bixos');
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Bixo');
    }

    public function buscarBixo(){
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare('SELECT * FROM bixos WHERE id = :id');
        $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);
        $retornoQuery = $consulta->execute();

        if(!$retornoQuery) {
            return false;
        }
        $registro = $consulta->fetchObject('Bixo');
        return $registro;
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
     * Get the value of vida
     */ 
    public function getVida()
    {
        return $this->vida;
    }

    /**
     * Set the value of vida
     *
     * @return  self
     */ 
    public function setVida($vida)
    {
        $this->vida = $vida;

        return $this;
    }

    /**
     * Get the value of defesa
     */ 
    public function getDefesa()
    {
        return $this->defesa;
    }

    /**
     * Set the value of defesa
     *
     * @return  self
     */ 
    public function setDefesa($defesa)
    {
        $this->defesa = $defesa;

        return $this;
    }

    /**
     * Get the value of ataque
     */ 
    public function getAtaque()
    {
        return $this->ataque;
    }

    /**
     * Set the value of ataque
     *
     * @return  self
     */ 
    public function setAtaque($ataque)
    {
        $this->ataque = $ataque;

        return $this;
    }

    /**
     * Get the value of img
     */ 
    public function getimg()
    {
        return $this->img;
    }

    /**
     * Set the value of img
     *
     * @return  self
     */ 
    public function setimg($img)
    {
        $this->img = $img;

        return $this;
    }
    
    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of lati
     */ 
    public function getlati()
    {
        return $this->lati;
    }

    /**
     * Set the value of lati
     *
     * @return  self
     */ 
    public function setlati($lati)
    {
        $this->lati = $lati;

        return $this;
    }

    /**
     * Get the value of long
     */ 
    public function getlong()
    {
        return $this->long;
    }

    /**
     * Set the value of long
     *
     * @return  self
     */ 
    public function setlong($long)
    {
        $this->long = $long;

        return $this;
    }
}