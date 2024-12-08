<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLUNews - Đăng nhập</title>
</head>
<style>
    body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #000; /* Nền đen */
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.login-container {
    display: flex;
    width: 70%;
    height: 60%;
    background-color: #1c1c1c; /* Màu nền container */
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.5);
}

.image-section {
    flex: 2;
    background-color: #000;
}

.image-section img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.form-section {
    flex: 1;
    background-color: #00aaff; /* Màu xanh nhạt */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 20px;
}

h1 {
    color: #001c55;
    font-size: 2rem;
    margin-bottom: 20px;
    font-weight: bold;
}

form {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.input-group {
    width: 80%;
    margin-bottom: 20px;
}

input {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
}

input:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
}

.login-button {
    width: 80%;
    padding: 10px;
    background-color: #001c55;
    color: white;
    border: none;
    border-radius: 5px;
    font-size: 1rem;
    font-weight: bold;
    cursor: pointer;
    transition: background-color 0.3s;
}

.login-button:hover {
    background-color: #003377;
}

</style>
<body>
    <div class="login-container">
        <div class="image-section">
            <img src="DHTL.jpg" alt="Đại học Thủy Lợi">
        </div>
        <div class="form-section">
            <h1>TLUNews</h1>
            <form action="/admin/login" method="POST">
                <div class="input-group">
                    <input type="text" name="username" placeholder="user name" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="password" required>
                </div>
                <button type="submit" class="login-button">Đăng nhập</button>
            </form>
        </div>
    </div>
</body>
</html>
