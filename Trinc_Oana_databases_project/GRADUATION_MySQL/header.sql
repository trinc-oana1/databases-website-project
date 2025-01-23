USE graduation;

CREATE TABLE IF NOT EXISTS header_menu_links (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    link VARCHAR(255) NOT NULL
);

INSERT INTO header_menu_links (title, link) VALUES
('Home', 'home.php'),
('About', 'about.php'),
('Our Work', 'portfolio.php'),
('Packages & Clients', 'pricing.php'),
('Contact', 'contact.php'),
('Shopping Cart', 'cart.php'),
('Wishlist', 'wishlist.php'),
('Services', 'shop.php'),
('Logout', 'logout.php');

