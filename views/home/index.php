<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLUNews - Trang Chủ</title>
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
        header .search-bar {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        header .search-bar input {
            padding: 5px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }
        header .search-bar button {
            padding: 5px 10px;
            font-size: 16px;
            background-color: white;
            color: #007bff;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        .logout {
            background-color: #ff4d4d;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        nav {
            background-color: #333;
            padding: 10px;
        }
        nav a {
            color: white;
            margin: 0 10px;
            text-decoration: none;
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
        .news-item {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            background-color: white;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        .news-item img {
            width: 120px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }
        .news-item h3 {
            margin: 0;
            font-size: 18px;
        }
        .news-item p {
            margin: 5px 0;
        }
    </style>
</head>
<body>

<header>
    <h1>TLUNews</h1>
    <div class="search-bar">
        <form method="GET" action="index.php">
            <input type="hidden" name="controller" value="home">
            <input type="hidden" name="action" value="search">
            <input type="text" name="keyword" placeholder="Tìm kiếm tại đây..." />
            <button type="submit">🔍</button>
        </form>
        <button class="logout">Log out</button>
    </div>
</header>

<nav>
    <a href="#">Thể thao</a>
    <a href="#">Thời trang</a>
    <a href="#">Khoa học</a>
    <a href="#">Giải trí</a>
    <a href="#">Giáo dục</a>
</nav>

<div class="container">
    <div class="main-content">
        <h2>Tin nổi bật</h2>
        <?php foreach ($newsList as $news): ?>
            <div class="news-item">
                <img src="<?= htmlspecialchars($news['image']) ?>" alt="<?= htmlspecialchars($news['title']) ?>">
                <div>
                    <h3><a href="index.php?controller=home&action=detail&id=<?= $news['id'] ?>"><?= htmlspecialchars($news['title']) ?></a></h3>
                    <p><?= htmlspecialchars(substr($news['content'], 0, 100)) ?>...</p>
                </div>
            </div>
        <?php endforeach; ?>
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
