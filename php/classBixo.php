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
                                $long = null)
    {
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

    
    //refatoracao com o projeto em andamento com o
    //intuito de diminuir impacto da manutencao,
    //na ideia de gerar menos bugs em manutencoes
    // public function salvar()
    // {
        
    //     if($this->id != null) return $this->atualizar(); 
        
    //     if($this->id == null) return $this->criar();            
        
    //     return false;
    // }

    public function cadastrarBixo()
    {
        $sql = 'INSERT INTO bixos (nome, 
                                   descricao, 
                                   vida, 
                                   ataque, 
                                   defesa, 
                                   lati, 
                                   long, 
                                   img) 
                           VALUES (:nome, 
                                   :descricao, 
                                   :vida, 
                                   :ataque, 
                                   :defesa, 
                                   :lati, 
                                   :long, 
                                   :img)';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
        $consulta->bindValue(':vida', $this->vida, PDO::PARAM_INT);
        $consulta->bindValue(':ataque', $this->ataque, PDO::PARAM_INT);
        $consulta->bindValue(':defesa', $this->defesa, PDO::PARAM_INT);
        $consulta->bindValue(':lati', $this->lati, PDO::PARAM_STR);
        $consulta->bindValue(':long', $this->long, PDO::PARAM_STR);
        $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);

        return  $consulta->execute();
    }

    public function atualizarBixo()
    {
        if ($this->id != null) {
            $sql = 'UPDATE bixos SET (nome = :nome,
                                    descricao = :descricao, 
                                    vida = :vida, 
                                    ataque = :ataque, 
                                    defesa = :defesa, 
                                    lati = :lati, 
                                    long = :long, 
                                    img = :img)
                    WHERE id = :id;';
            $conexao = $this->database->getConexao();
            $consulta = $conexao->prepare($sql);
            $consulta->bindValue(':nome', $this->nome, PDO::PARAM_STR);
            $consulta->bindValue(':descricao', $this->descricao, PDO::PARAM_STR);
            $consulta->bindValue(':vida', $this->vida, PDO::PARAM_INT);
            $consulta->bindValue(':ataque', $this->ataque, PDO::PARAM_INT);
            $consulta->bindValue(':defesa', $this->defesa, PDO::PARAM_INT);
            $consulta->bindValue(':lati', $this->lati, PDO::PARAM_STR);
            $consulta->bindValue(':long', $this->long, PDO::PARAM_STR);
            $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);
            $consulta->bindValue(':id', $this->id, PDO::PARAM_INT);                    
            return  $consulta->execute();
        } else {
            return false;
        }
    }

    public function excluirBixo()
    {
        if($this->id != null){
            $conexao = $this->database->getConexao();
            $retornoQuery = $conexao->exec('DELETE FROM bixos 
                                            WHERE id =' . $this->id);
            return $retornoQuery;
        }
        return false;
    }

    public function ListarBixos()
    {
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare('SELECT * FROM bixos');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Bixo');
        
    }

    public function buscarBixo(){
        $sql = 'SELECT * FROM bixos WHERE id = :id';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':id', $id, PDO::PARAM_INT);
        $retornoQuery = $consulta->execute();

        if(!$retornoQuery) return false;
        $registro = $consulta->fetchObject('Bixo');
        return $registro;
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