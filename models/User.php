<?php
class User {
    private $db;
    public function __construct() {
        $this->db = new Database(); 
    }

    public function login($username, $password) {
        $sql = "SELECT * FROM users WHERE username = :username";  
        $stmt = $this->db->getCon()->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);                   
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        } else {
            return false;
        }
    }

    public function logout(){
        session_start();
        session_destroy();
        header('Location: index.php');
    }
}
?>
