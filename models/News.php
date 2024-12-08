<?php
class News {
    private $db;

    public function __construct() {
        $this->db = new Database();
    }
    public function getNewsById($id) {
        $query = "SELECT news.id, news.title, news.content, news.image, news.created_at, categories.name AS category
                  FROM news
                  LEFT JOIN categories ON news.category_id = categories.id
                  WHERE news.id = :id";
        $stmt = $this->db->getCon()->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function searchNews($keyword) {
        $query = "SELECT news.id, news.title, news.image, news.created_at, categories.name AS category
                  FROM news
                  LEFT JOIN categories ON news.category_id = categories.id
                  WHERE news.title LIKE :keyword
                  ORDER BY news.created_at DESC";
        $stmt = $this->db->getCon()->prepare($query);
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getLatestNews($limit) {
        $query = "SELECT id, title, image FROM news ORDER BY created_at DESC LIMIT :limit";
        $stmt = $this->db->getCon()->prepare($query);
        $stmt->bindParam(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
}
?>
