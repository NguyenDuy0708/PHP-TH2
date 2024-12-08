<form method="post" action="" enctype="multipart/form-data">
    <label for="title">Title:</label>
    <input type="text" name="title" id="title" required>
    <label for="content">Content:</label>
    <textarea name="content" id="content" required></textarea>
    <label for="image">Image:</label>
    <input type="file" name="image" id="image">
    <label for="category_id">Category:</label>
    <input type="text" name="category_id" id="category_id" required>
    <button type="submit">Add News</button>
</form>
