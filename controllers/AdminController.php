<?php
class AdminController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $user = $this->userModel->login($username, $password);
            if ($user) {
                $_SESSION['user'] = $user;
                $_SESSION['role'] = $user['role'];  
                header('Location: index.php?controller=admin&action=index');
                exit;
            } else {
                $error = "Sai tên đăng nhập hoặc mật khẩu.";
                require_once 'views/admin/login.php';  
                exit;
        }
        }
        require_once 'views/admin/login.php';  
    }
    
    public function logout() {
        session_start();  
        session_unset();
        session_destroy();  
        header('Location: index.php?controller=admin&action=login');  
        exit;
    }

    public function index() {
        if (!isset($_SESSION['user'])) {
            header('Location: index.php?controller=admin&action=login');
            exit;
        }
        header('Location: index.php?controller=news&action=index');
    }       
    public function dashboard() {
        // Kiểm tra nếu người dùng đã đăng nhập
        
}
}