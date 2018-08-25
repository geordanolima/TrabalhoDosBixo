<?php
class Jogador
{
    private $id;
    private $nome;
    private $apelido;
    private $genero;
    private $email;
    private $urlImagem;
    private $senha;

    public function __construct($nome = null, $apelido = null, $genero = null, $email = null, $urlImagem = null, $senha = null)
    {  
        if($nome != null) $this->nome = $nome;
        if($apelido != null) $this->apelido = $apelido;
        if($genero != null) $this->genero = $genero;
        if($email != null) $this->email = $email;
        if($urlImagem != null) $this->urlImagem = $urlImagem;
        if($senha != null) $this->senha = $senha;
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

    public function cadastrar()
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

   public function excluirItem()
   {
        //fazer delete from item where id=$this->id
        return true;
   }

   public function listar()
   {
        return true;
   }

   public function atualizarItem()
   {
        return true;   
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
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Get the value of urlImagem
     */ 
    public function getUrlImagem()
    {
        return $this->urlImagem;
    }

    /**
     * Set the value of urlImagem
     *
     * @return  self
     */ 
    public function setUrlImagem($urlImagem)
    {
        $this->urlImagem = $urlImagem;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }

    /**
     * Set the value of genero
     *
     * @return  self
     */ 
    public function setGenero($genero)
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * Get the value of apelido
     */ 
    public function getApelido()
    {
        return $this->apelido;
    }

    /**
     * Set the value of apelido
     *
     * @return  self
     */ 
    public function setApelido($apelido)
    {
        $this->apelido = $apelido;

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

}