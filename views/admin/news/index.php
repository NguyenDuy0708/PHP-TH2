<?php
// Kết nối CSDL
require_once '../../Database.php';

$itemsPerPage = 5; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$page = max($page, 1);
$offset = ($page - 1) * $itemsPerPage;

$stmt = $db->query('SELECT COUNT(*) FROM news');
$totalItems = $stmt->fetchColumn();
$totalPages = ceil($totalItems / $itemsPerPage);

$query = "
    SELECT news.id, news.title, news.image, news.created_at, categories.name AS category
    FROM news
    LEFT JOIN categories ON news.category_id = categories.id
    ORDER BY news.created_at DESC
    LIMIT :limit OFFSET :offset
";
$stmt = $db->prepare($query);
$stmt->bindValue(':limit', $itemsPerPage, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$newsList = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản lý Tin tức - TLUNews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1a1a1a;
            color: white;
            margin: 0;
            padding: 20px;
        }
        header {
            background-color: #007bff;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-radius: 5px;
        }
        h1 {
            margin: 0;
            font-size: 24px;
        }
        .buttons {
            display: flex;
            gap: 10px;
        }
        .button {
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .add {
            background-color: green;
            color: white;
        }
        .edit {
            background-color: blue;
            color: white;
        }
        .delete {
            background-color: red;
            color: white;
        }
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid white;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: #333;
        }
        .pagination {
            margin-top: 20px;
            text-align: center;
        }
        .pagination a {
            margin: 0 5px;
            padding: 5px 10px;
            text-decoration: none;
            background-color: #007bff;
            color: white;
            border-radius: 5px;
        }
        .pagination a.active {
            background-color: #333;
        }
    </style>
</head>
<body>

<header>
    <h1>TLUNews</h1>
    <div class="buttons">
        <a href="add.php" class="button add">Thêm Tin</a>
        <a href="edit.php" class="button edit">🖉</a>
        <a href="delete.php" class="button delete">🗑️</>
        <a href="index.php?controller=admin&action=logout" class="logout">Log out</>
    </div>
</header>

<h2>Danh sách tin tức</h2>

<table>
    <thead>
        <tr>
            <th>STT</th>
            <th>Tiêu đề</th>
            <th>Hình ảnh</th>
            <th>Thể loại</th>
            <th>Ngày đăng</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $index => $news): ?>
                <tr>
                    <td><?= $offset + $index + 1 ?></td>
                    <td><?= htmlspecialchars($news['title']) ?></td>
                    <td>
                        <?php if (!empty($news['image'])): ?>
                            <img src="<?= htmlspecialchars($news['image']) ?>" alt="Hình ảnh" width="50">
                        <?php endif; ?>
                    </td>
                    <td><?= htmlspecialchars($news['category'] ?? 'Không rõ') ?></td>
                    <td><?= htmlspecialchars($news['created_at']) ?></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có tin tức nào.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>

</body>
</html>
