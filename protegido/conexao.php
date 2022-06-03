<?php

class Conexao {

    private $host = 'localhost'; // local
    private $dbname = 'db_listadetarefas'; // nome do banco de dados
    private $user = 'root'; // usuario
    private $pass = ''; // senha do usuario

    public function conectar() {
        try {
            
            $conexao = new PDO(
                "mysql:host=$this->host;dbname=$this->dbname",
                "$this->user",
                "$this->pass"
                
            );

            return $conexao;


        } catch (PDOException $e) {
            echo '<p>'.$e->getMessage().'</p>';
        }
    }
}