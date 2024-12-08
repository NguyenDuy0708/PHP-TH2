<form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $news['id']; ?>">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" value="<?php echo $news['title']; ?>" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required><?php echo $news['content']; ?></textarea>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <label for="category_id">Category:</label>
    <input type="text" name="category_id" id="category_id" value="<?php echo $news['category_id']; ?>" required>
    <button type="submit">Edit News</button>
</form>
