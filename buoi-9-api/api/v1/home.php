<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, X-Requested-With");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

require_once(__DIR__ . '/authenticate.php');


class Home {

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

    public function getAllNews() 
    {
        // b1. xác thực user có token hợp lệ hay không
        $authenticate = new Authenticate();

        // get token from client
        $jwtToken = $_SERVER['HTTP_AUTHORIZATION'];
        $jwtToken = explode(' ', $jwtToken);
        $jwtToken = $jwtToken[1];

        // check token valid?
        $tokenValid = $authenticate->validateTokenValid($jwtToken);
        if($tokenValid) {
            $stmt = $this->pdo->prepare("SELECT * FROM news");
            $stmt->execute(); 
            $data = $stmt->fetchAll(PDO::FETCH_OBJ);
    
            echo json_encode([
                'code' => 200,
                'message' => 'success',
                'news' => $data
            ]);
            return;
        }

        echo json_encode([
            'code' => 400,
            'message' => 'token no valid',
        ]);


    }
}

$home = new Home();
$home->getAllNews();