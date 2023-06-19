<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");

require_once(__DIR__ . '/authenticate.php');


class Login {

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

    public function loginUser() 
    {
        $data = json_decode(file_get_contents("php://input"), true);
        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
        $stmt->execute(array_values($data)); 
        $user = $stmt->fetch(PDO::FETCH_OBJ);
      

        if($user) {
            // create token by json web token
            $authenticate = new Authenticate();
            $jwtToken = $authenticate->createToken($user);
            echo json_encode([
                'code' => 200,
                'message' => 'login success',
                'token' => $jwtToken              
            ]);
        } else {
            echo json_encode([
                'code' => 400,
                'message' => 'login fail'               
            ]);
        }
    }
}

$login = new Login();
$login->loginUser();