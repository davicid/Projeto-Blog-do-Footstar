<?php

class db
{


    private $host = "localhost";


    private $usuario = "root";


    private $senha = "";


    private $database = "blog_footstar";

    public function conecta_mysql()
    {

        $conexao = mysqli_connect($this->host, $this->usuario, $this->senha, $this->database);

        mysqli_set_charset($conexao, "utf-8");

        if (mysqli_connect_errno()) {
            echo "Erro ao tentar se conectar com o banco de dados MYSQL: " . mysqli_connect_error();
        }

        return $conexao;
    }
}
