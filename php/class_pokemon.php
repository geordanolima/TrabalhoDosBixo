<?php
class Pokemon
{
    private $id;
    private $nome;
    private $vida;
    private $defesa;
    private $ataque;
    private $imagem;

    public function __construct($nome = null, $vida = null, $defesa = null, $ataque = null, $imagem = null)
    {
        if($nome != null) $this->nome = $nome;
        if($vida != null) $this->vida = $vida;
        if($defesa != null) $this->defesa = $defesa;
        if($ataque != null) $this->ataque = $ataque;
        if($imagem != null) $this->imagem = $imagem;
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

    public function criar()
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

    public function atualizar()
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

    public function remover()
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

    public function selecionar($id = null)
    {
        //teremos futuramente um
        //SELECT * FROM Titular WHERE id = $this->id
    }

    public function selecionarTodos()
    {
        //teremos futuramente
        //SELECT * FROM titular
    }


   
}