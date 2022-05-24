<?php

class Conexao {

    private $host = 'localhost';
    private $dbname = 'db_listadetarefas';
    private $user = 'root';
    private $pass = '78832112';

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