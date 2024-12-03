<?php 

namespace connect;

// conexao com o banco de dados
class Conn {
    private static $instance;
    
    public static function getConn() {
        if (!isset(self::$instance)) {
            try {
                self::$instance = new \PDO(
                    'pgsql:host=kesavan.db.elephantsql.com;dbname=afxbyhvt',
                    'afxbyhvt', 
                    'L146id5xEjIwPBYaYjdubG5g95-WGdRX'
                );
                self::$instance->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo "Erro ao conectar: " . $e->getMessage();
            }
        }
        return self::$instance;
    }
}
?>