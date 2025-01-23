USE graduation;

CREATE TABLE IF NOT EXISTS footer (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    link VARCHAR(255) NOT NULL,
    icon_class VARCHAR(50) NOT NULL,
    category ENUM('Menu', 'Contact info', 'Follow us') NOT NULL
);
