USE graduation;

CREATE TABLE shop (
    shop_id INT AUTO_INCREMENT PRIMARY KEY,
    shop_name VARCHAR(255) NOT NULL,
    description TEXT,
    image_url VARCHAR(255)
);

INSERT INTO shop (shop_name, description, image_url) VALUES
    ('Graduation regalia', '...', 'images/shop1.jpg'),
    ('Diploma templates', '...', 'images/shop2.jpg'),
    ('Photos & video plans', '...', 'images/shop3.jpg'),
    ('Food menu', '...', 'images/shop4.jpg'),
    ('Drinks menu', '...', 'images/shop5.jpg');

