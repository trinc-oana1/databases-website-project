USE graduation;

CREATE TABLE IF NOT EXISTS team (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    role VARCHAR(100) NOT NULL,
    profile_picture VARCHAR(255),
    facebook_url VARCHAR(255),
    instagram_url VARCHAR(255)
);
INSERT INTO team (name, role, profile_picture, facebook_url, instagram_url) VALUES
('Trinc Oana', 'Graduation Planner', 'images/team1.jpg', 'https://www.facebook.com/oanaaa.369', 'https://www.instagram.com/oanatrinc/'),
('Emily Burghelea', 'Photographer & Videographer', 'images/team2.jpg', 'https://www.facebook.com/emily.burghelea', 'https://www.instagram.com/emilyburghelea/'),
('Erika Isac', 'Singer', 'images/team3.jpg', 'https://www.facebook.com/gabrielaerika.isac', 'https://www.instagram.com/erikaaaisac/'),
('Catalin Scarlatescu', 'Chef', 'images/team4.jpg', 'https://www.facebook.com/catalin.scarlatescu.7', 'https://www.instagram.com/chef_catalin_scarlatescu/');

CREATE TABLE IF NOT EXISTS description (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_name VARCHAR(100) NOT NULL,
    description TEXT,
    contact_page_url VARCHAR(255)
);
INSERT INTO description (service_name, description, contact_page_url) VALUES
('YourGraduation', 'The graduation day is one of the most important events from the life of a student. Us, the YOURGRADUATION team are looking forward to making this day a dream.', 'contact.php');
