<?php
class Bixo
{
    private $id;
    private $nome;
    private $descricao;
    private $vida;
    private $defesa;
    private $ataque;
    private $imagem;
    private $latitude;
    private $longitude;

    public function __construct($nome = null,
                                $descricao = null, 
                                $vida = null,                                
                                $defesa = null, 
                                $ataque = null, 
                                $imagem = null,
                                $latitude = null,
                                $longitude = null)
    {
        if($nome != null) $this->nome = $nome;
        if($descricao != null) $this->descrcao = $descricao;
        if($vida != null) $this->vida = $vida;
        if($defesa != null) $this->defesa = $defesa;
        if($ataque != null) $this->ataque = $ataque;
        if($imagem != null) $this->imagem = $imagem;
        if($latitude != null) $this->latitude = $latitude;
        if($longitude != null) $this->longitude = $longitude;
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
         //teremos futuramente um INSERT INTO TITULARES 
            //                          (nome, documento) 
            //                      VALUES 
            //                  ($this->nome, $this->documento )
        //executo a query
        $retornoQuery = 1; //insert executado com sucesso
        if($retornoQuery) return true;
        return false;
    }

    public function atualizarBixo()
    {
        //teremos futuramento um
            //UPDATE Titular SET nome = $this->nome,
            //                  documento = $this->getDocumento 
            //WHERE id = $this->id 
        //executo a query
        $retornoQuery = 1; //update executado com sucesso
        if($retornoQuery) return true;
        return false;
    }

    public function excluirBixo()
    {
        if($this->id != null){
            //teremos futuramente un
            //DELETE FROM TITULAR WHERE id = $this->id;
            //executar a query e tratar o retorno
            $retornoQuery = 1;
            if($retornoQuery) return true;
        }
        return false;
    }

    public function ListarBixos($id = null)
    {
        //teremos futuramente um
        //SELECT * FROM Titular WHERE id = $this->id
        return true;
    }

    public function buscarBixo(){
        return true;
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
     * Get the value of latitude
     */ 
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Set the value of latitude
     *
     * @return  self
     */ 
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Get the value of longitude
     */ 
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Set the value of longitude
     *
     * @return  self
     */ 
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

        return $this;
    }
}