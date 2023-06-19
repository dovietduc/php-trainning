<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

class RegisterUser {

    private $pdo;

    // ket noi database
    public function __construct() 
    {
        $host = '127.0.0.1';
        $db   = 'api_demo';
        $user = 'root';
        $pass = '';
        $port = "3306";
        $charset = 'utf8mb4';
      
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";
        try {
            $this->pdo = new \PDO($dsn, $user, $pass);
        } catch (\PDOException $e) {
            throw new \PDOException($e->getMessage(), (int)$e->getCode());
        }
    }

    public function createUser() 
    {
        try {
            if($_SERVER['REQUEST_METHOD'] === 'POST') {
                $data = json_decode(file_get_contents("php://input"), true);
                // 1. insert database
                $sql = "INSERT INTO users (name, email, role, password) VALUES (?, ?, ?, ?)";
                $stmt= $this->pdo->prepare($sql);
                $stmt->execute(array_values($data));
                // 2. tra ve thong bao cho client
                $insertId = $this->pdo->lastInsertId();
                
                if($insertId) {
                    echo json_encode([
                        'code' => 201,
                        'message' => 'data insert success'               
                    ]);
                } else {
                    echo json_encode([
                        'code' => 400,
                        'message' => 'something wrong, data insert fail'               
                    ]);
                }
            } else {
                echo json_encode([
                    'code' => 400,
                    'message' => 'bad request'               
                ]);
            }
        } catch(Exception $e) {
            echo json_encode([
                'code' => 500,
                'message' => 'server error'               
            ]);
        }

    }

}


$userRegister = new RegisterUser();
// api tao user
return $userRegister->createUser();

