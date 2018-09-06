<?php
require_once('Conexao.php');
class Jogador
{
    private $id;
    private $nome;
    private $apelido;
    private $genero;
    private $email;
    private $imagem;
    private $senha;

    public function __construct($nome = null, 
                                $apelido = null, 
                                $genero = null, 
                                $email = null, 
                                $imagem = null, 
                                $senha = null){  
        if($nome != null) $this->nome = $nome;
        if($apelido != null) $this->apelido = $apelido;
        if($genero != null) $this->genero = $genero;
        if($email != null) $this->email = $email;
        if($imagem != null) $this->imagem = $imagem;
        if($senha != null) $this->senha = $senha;

        $this->database = Conexao::getInstancia();
    }

    public function cadastrarJogador(){
        $sql = "INSERT INTO jogador (jogador.nome, 
                                    jogador.apelido, 
                                    jogador.genero, 
                                    jogador.email, 
                                    jogador.img, 
                                    jogador.senha) 
                            VALUES ('" . $this->nome . "', 
                                    '" . $this->apelido . "', 
                                    '" . $this->genero . "', 
                                    '" . $this->email . "', 
                                    '" . $this->imagem . "', 
                                    '" . $this->senha . "');";
        $conexao = $this->database->getConexao();
        $consulta = $conexao->prepare($sql);

        return  $consulta->execute();
    }

    public function atualizarJogador(){
        if ($this->id != null) {
            $sql = "UPDATE jogador SET  nome = '" . $this->nome . "',
                                        apelido = '" . $this->apelido . "', 
                                        genero = '" . $this->genero . "', 
                                        email = '" . $this->email . "', 
                                        img = 'item" . $this->id . ".png', 
                                        senha = '" . $this->senha . "'
                    WHERE id = " . $this->senha . ";";
            $conexao = $this->database->getConexao();
            $consulta = $conexao->prepare($sql);                
            return  $consulta->execute();
        } else {
            return false;
        }  
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
        return $consulta->fetchAll(PDO::FETCH_CLASS, 'Jogador');
    }   

    public function buscaJogador(){
        $conexao = $this->database->getConexao();
        $sql = "SELECT * FROM jogador WHERE id = " . $this->id . ";";
        $consulta = $conexao->prepare($sql);
        $retornoQuery = $consulta->execute();
        if(!$retornoQuery){
            return false;
        }
        $registro = $consulta->fetchObject('Jogador');
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
}