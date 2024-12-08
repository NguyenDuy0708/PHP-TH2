<?php
class HomeController {
    public function index() {
        require_once 'models/News.php';
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();
        require_once 'views/home/index.php';
    }
}
?>
