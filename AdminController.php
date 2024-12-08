<?php
class AdminController {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            require_once 'models/User.php';
            $userModel = new User();
            $user = $userModel->authenticate($_POST['username'], $_POST['password']);
            if ($user) {
                $_SESSION['user'] = $user;
                header('Location: index.php?controller=admin&action=dashboard');
            } else {
                $error = "Tài khoản hoặc mật khẩu không đúng.";
            }
        }
        require_once 'views/admin/login.php';
    }

    public function dashboard() {
        require_once 'views/admin/dashboard.php';
    }
}
?>

