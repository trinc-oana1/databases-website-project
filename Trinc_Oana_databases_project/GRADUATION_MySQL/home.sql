USE graduation;

CREATE TABLE IF NOT EXISTS home (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    image_url VARCHAR(255),
    link_to_about VARCHAR(255)
);

INSERT INTO home (title, description, image_url, link_to_about) VALUES
('Graduation Regalia', 'Excited to see yourself in the graduation regalia? Let us take care of it and find your best suit.', 'images/service1.jpg', 'about.php'),
('Diploma', 'Excited to get your diploma? We have a lot of templates you can choose from.', 'images/service2.jpg', 'about.php'),
('Graduation Ceremony', 'Excited for the graduation ceremony? We can plan every detail of it.', 'images/service3.jpg', 'about.php'),
('Graduation Party', 'Excited for the graduation party? We have the best chef and singer to make a memorable night.', 'images/service4.jpg', 'about.php');
