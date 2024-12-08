<?php
class News {
    private $db;

    public function __construct() {
        $this->db = new PDO('mysql:host=localhost;dbname=tintuc', 'root', '');
    }

    public function getAllNews() {
        $stmt = $this->db->prepare("SELECT * FROM news");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addNews($title, $content, $image, $category_id) {
        $stmt = $this->db->prepare("INSERT INTO news (title, content, image, category_id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $content, $image['name'], $category_id]);
    }

    public function editNews($id, $title, $content, $image, $category_id) {
        $stmt = $this->db->prepare("UPDATE news SET title=?, content=?, image=?, category_id=? WHERE id=?");
        $stmt->execute([$title, $content, $image['name'], $category_id, $id]);
    }

    public function getNewsById($id) {
        $stmt = $this->db->prepare("SELECT * FROM news WHERE id=?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
