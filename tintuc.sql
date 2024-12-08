CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role INT NOT NULL DEFAULT 0 
);

CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE news (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    image VARCHAR(255),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    category_id INT,
    FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE
);

INSERT INTO users (username, password, role) VALUES 
('user1','password1', 0),
('user2','password2', 0),
('user3','password3', 0),
('user4','password4', 0),
('user5','password5', 0),
('user6','password6', 0),
('user7','password7', 0),
('user8','password8', 0),
('user9','password9', 0);
('admin', 'admin123', 1),

INSERT INTO categories (name) VALUES
('Thể thao'),
('Công nghệ'),
('Giáo dục'),
('Giải trí'),
('Sức khỏe'),
('Thời sự'),
('Du lịch'),
('Kinh doanh'),
('Khoa học'),
('Thời trang');

insert into news (title, content, image, created_at, category_id) VALUES 
('Kia', 'Sedona', 'http://dummyimage.com/210x100.png/ff4444/ffffff', '2024-12-01', 1),
('Ford', 'F-Series', 'http://dummyimage.com/166x100.png/5fa2dd/ffffff', '2024-05-12', 2),
('GMC', 'Sierra 3500', 'http://dummyimage.com/166x100.png/cc0000/ffffff', '2024-03-23', 3),
('Infiniti', 'FX', 'http://dummyimage.com/177x100.png/dddddd/000000', '2024-10-30', 4),
('Cadillac', 'DTS', 'http://dummyimage.com/107x100.png/dddddd/000000', '2024-10-15', 5),
('Land Rover', 'Discovery', 'http://dummyimage.com/211x100.png/cc0000/ffffff', '2023-12-30', 6),
('Lexus', 'IS F', 'http://dummyimage.com/196x100.png/cc0000/ffffff', '2024-09-13', 7),
('Chrysler', 'Concorde', 'http://dummyimage.com/175x100.png/dddddd/000000', '2024-07-25', 8),
('GMC', 'Savana', 'http://dummyimage.com/237x100.png/5fa2dd/ffffff', '2024-03-08', 9),
('Mitsubishi', 'Mighty Max Macro', 'http://dummyimage.com/235x100.png/5fa2dd/ffffff', '2024-01-16', 10);
