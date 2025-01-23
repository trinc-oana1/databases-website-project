USE graduation;

CREATE TABLE IF NOT EXISTS pricing (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pack_name VARCHAR(255) NOT NULL,
    price DECIMAL(10,2) NOT NULL, 
    content VARCHAR(255) NOT NULL
);

INSERT INTO pricing (pack_name, price, content) VALUES
('Basic pack', 300, 'Photography, 1 course menu + 3 free drinks of choice, 1 hour of live music, basic graduation regalia, 10 diploma templates that you can choose from'),
('Upgraded pack', 500, 'Photography and video, 2 course menu + 5 free drinks of choice, 2 hours of live music, custom made graduation regalia, 20 diploma templates that you can choose from'),
('Premium pack', 1000, 'Photography and video, 3 course menu + 10 free drinks of choice, 3 hours of live music and surprise karaoke after party, custom made graduation regalia, 30 diploma templates that you can choose from, fireworks, limousine');


CREATE TABLE IF NOT EXISTS client_reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    image_path VARCHAR(255) NOT NULL,
    graduation_event VARCHAR(255) NOT NULL,
    university TEXT NOT NULL,
    rating INT NOT NULL
);

INSERT INTO client_reviews (image_path, graduation_event, university, rating) VALUES
('images/client1.jpg', 'UTCN graduation', 'Graduation at the Technical University of Cluj Napoca', 5),
('images/client2.jpg', 'UBB graduation', 'Graduation at the Babeș-Bolyai University', 5),
('images/client3.jpg', 'USAMV graduation', 'Graduation at the University of Agricultural Sciences and Veterinary Medicine of Cluj-Napoca', 5),
('images/client4.jpg', 'UMF graduation', 'Graduation at the Iuliu Hațieganu University of Medicine and Pharmacy', 5);
