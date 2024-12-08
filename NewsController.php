<?php
class NewsController {
    public function index() {
        require_once 'models/News.php';
        $newsModel = new News();
        $newsList = $newsModel->getAllNews();

        require_once 'views/admin/news/index.php';
    }
}
?>
