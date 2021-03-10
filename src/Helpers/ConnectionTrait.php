<?php 

namespace Helpers;

use PDO;
use PDOException;

trait ConnectionTrait
{
    protected PDO $conn;
    
    public function __construct() {
        try {
            $connect = new PDO(
                'mysql:host=localhost;dbname=we_point',
                'root',
                ''
            );
            
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
            $this->conn = $connect;
        } catch (PDOException $except) {
            'Erro ao se conectar ao banco de dados, tente novamente mais tarde';
        }
    }
}