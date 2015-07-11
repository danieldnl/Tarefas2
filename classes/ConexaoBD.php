<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ConexaoBD
 *
 * @author Daniel
 */
class ConexaoBD {

    private $servidor;
    private $usuario;
    private $senha;
    private $banco;
    private $conexao;
    private $qry;
    private $dados;
    private $totalDados;

    public function __construct() {
        $this->servidor = "localhost";
        $this->usuario = "root";
        $this->senha = "root";  
        $this->banco = "tarefas";
        self::conectar();
    }

    public function conectar() {
        $this->conexao = @mysqli_connect($this->servidor, $this->usuario, $this->senha, $this->banco) or
                die("Não foi possível conectar com o servidor de banco de dados" . mysqli_error());

//        $this->banco = @mysqli_select_db($this->banco) or
//                die("Não foi possível conectar com o Banco de dados" . mysqli_error());
    }

    public function executarSQL($sql) {
        $this->qry = mysqli_query($this->conexao,$sql) or die("Erro ao executar o comando SQL: $sql <br>" . mysqli_error());
        return $this->qry;
    }

    public function desconectar() {
        return mysqli_close($this->conexao);
    }

}

?>
