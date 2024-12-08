<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($newsDetail['title']) ?> - TLUNews</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #f5f5f5;
            color: #333;
        }
        header {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        header h1 {
            margin: 0;
            font-size: 24px;
        }
        .container {
            display: flex;
            margin: 20px;
            gap: 20px;
        }
        .main-content {
            flex: 3;
        }
        .sidebar {
            flex: 1;
        }
        .news-content img {
            max-width: 100%;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .news-content h2 {
            font-size: 24px;
        }
        .news-content p {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>
</head>
<body>

<header>
    <h1>TLUNews</h1>
    <button class="logout">Log out</button>
</header>

<div class="container">
    <div class="main-content">
        <div class="news-content">
            <h2><?= htmlspecialchars($newsDetail['title']) ?></h2>
            <p><strong>Tác giả:</strong> <?= htmlspecialchars($newsDetail['author'] ?? 'Không rõ') ?></p>
            <img src="<?= htmlspecialchars($newsDetail['image']) ?>" alt="Hình ảnh bài viết">
            <p><?= nl2br(htmlspecialchars($newsDetail['content'])) ?></p>
        </div>
    </div>
    <div class="sidebar">
        <h3>Tin mới nhất</h3>
        <?php foreach ($latestNews as $news): ?>
            <div class="news-item">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                <div>
                    <h4><a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>"><?= htmlspecialchars($news['title']) ?></a></h4>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

</body>
</html>
