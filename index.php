<a href="index.php?controller=news&action=add">Add News</a>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($newsList)): ?>
            <?php foreach ($newsList as $news): ?>
                <tr>
                    <td><?php echo htmlspecialchars($news['title']); ?></td>
                    <td>
                        <a href="index.php?controller=news&action=edit&id=<?php echo $news['id']; ?>">Edit</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="2">No news found.</td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>

