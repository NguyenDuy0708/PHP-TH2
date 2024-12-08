<?php
require_once './models/News.php';

class HomeController {
    public function index() {
        // Hiển thị trang chủ với danh sách các bài viết
        $newsModel = new News();
        $latestNews = $newsModel->getLatestNews(5); // 5 tin mới nhất

        

}
public function detail() {
    $id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    $newsModel = new News();
    $newsDetail = $newsModel->getNewsById($id);

    require 'views/news/detail.php';
}
public function search() {
    $keyword = isset($_GET['keyword']) ? trim($_GET['keyword']) : '';

    $newsModel = new News();
    $newsList = $newsModel->searchNews($keyword);

    require 'views/home/index.php';
}


}
?>
