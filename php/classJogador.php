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

    public function cadastrarJogador(){
        $sql = 'INSERT INTO jogador (nome, 
                                   apelido, 
                                   genero, 
                                   email, 
                                   img, 
                                   senha) 
                           VALUES (:nome, 
                                   :apelido, 
                                   :genero, 
                                   :email, 
                                   :img, 
                                   :senha)';
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);
        $consulta->bindValue(':nome', $this->nome, PDO::PARAM_STR);
        $consulta->bindValue(':apelido', $this->apelido, PDO::PARAM_STR);
        $consulta->bindValue(':genero', $this->genero, PDO::PARAM_INT);
        $consulta->bindValue(':email', $this->email, PDO::PARAM_INT);
        $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);
        $consulta->bindValue(':senha', $this->senha, PDO::PARAM_STR);

        return  $consulta->execute();
    }

   public function excluirJogador(){
    if($this->id != null){
        $conexao = $this->database->getConexao();
        $retornoQuery = $conexao->exec('DELETE FROM jogador 
                                        WHERE id =' . $this->id);
        return $retornoQuery;
    }
    return false;
   }

   public function listarJogador(){
    $conexao = $this->database->getConexao();
    $consulta = $conexao->prepare('SELECT * FROM jogador');
    $consulta->execute();
    return $consulta->fetchAll(PDO::FETCH_CLASS, 'classJogador');
   }

   public function atualizarJogador(){
    if ($this->id != null) {
        $sql = 'UPDATE jogador SET (nome = :nome,
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
        $consulta->bindValue(':apelido', $this->apelido, PDO::PARAM_STR);
        $consulta->bindValue(':genero', $this->genero, PDO::PARAM_INT);
        $consulta->bindValue(':email', $this->email, PDO::PARAM_INT);
        $consulta->bindValue(':img', $this->img, PDO::PARAM_STR);
        $consulta->bindValue(':senha', $this->senha, PDO::PARAM_STR);                 
        return  $consulta->execute();
    } else {
        return false;
    }  
   }

   public function buscaJogador(){
    $sql = 'SELECT * FROM jogador WHERE id = :id';
    $conexao = $this->database->getConexao();
    $consulta = $conexao->prepare($sql);
    $consulta->bindValue(':id', $id, PDO::PARAM_INT);
    $retornoQuery = $consulta->execute();

    if(!$retornoQuery) return false;
    $registro = $consulta->fetchObject('classJogador');
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