<?php
class Conexao //singleton
{
    private static $banco = null;
    private $conexao;

    private $debug = TRUE;
    private $servidor = 'localhost';
    private $login = 'root';
    private $senha = '';
    private $database = 'joguinhobixos';
    private $driver = 'mysql';

    private function __construct()
    {
        try{
            $this->conexao = new PDO("$this->driver:host=$this->servidor;dbname=$this->database;", $this->login, $this->senha);
            if($this->debug) $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        }catch(PDOException $e){
            echo 'Problemas na conexão, DEU TRETA NA BAGAÇA';
            if($this->debug) echo $e->getMessage();
        }

    }

    private function __clone()
    {

    }

    public static function getInstancia()
    {
        if(self::$banco == null) self::$banco = new Conexao();
        return self::$banco;
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}