USE graduation;

CREATE TABLE products (
    product_id INT AUTO_INCREMENT PRIMARY KEY,
    shop_id INT,
    product_name VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT,
    FOREIGN KEY (shop_id) REFERENCES shop(shop_id)
);

-- products for shop1
INSERT INTO products (shop_id, product_name, price, description)
VALUES
    (1, 'Blue', 20.99, 'Blue grad regalia'),
    (1, 'Burgundy', 20.99, 'Burgundy grad regalia'),
    (1, 'Red', 20.99, 'Red grad regalia'),
    (1, 'Yellow', 20.99, 'Yellow grad regalia'),
    (1, 'Green', 20.99, 'Green grad regalia');

-- products for shop2
INSERT INTO products (shop_id, product_name, price, description)
VALUES
    (2, 'Standard', 5.99, 'Standard template'),
    (2, 'Marble', 6.99, 'Marble template'),
    (2, 'Glitter', 6.99, 'Glitter template'),
    (2, 'Confetti', 6.99, 'Confetti template'),
    (2, 'Custom', 8.99, 'Custom template');
    
-- products for shop3
INSERT INTO products (shop_id, product_name, price, description)
VALUES
    (3, '5+15', 20.99, '5 photos + 15 min video'),
    (3, '10+15', 25.99, '10 photos + 15 min video'),
    (3, '15+20', 35.99, '15 photos + 20 min video'),
    (3, '30+30', 50.99, '30 photos + 30 min video'),
    (3, '50+60', 100.99, '50 photos + 60 min video');
    
-- products for shop4
INSERT INTO products (shop_id, product_name, price, description)
VALUES
    (4, 'Vegan', 40.99, 'Vegan menu'),
    (4, 'Basic', 40.99, 'Basic menu'),
    (4, 'Vegetarian', 40.99, 'Vegetarian menu'),
    (4, 'GlutenFree', 40.99, 'Gluten free menu'),
    (4, 'LactoseFree', 40.99, 'Lactose free menu');
    
-- products for shop5
INSERT INTO products (shop_id, product_name, price, description)
VALUES
    (5, 'Hugo', 4.99, 'Hugo cocktail'),
    (5, 'Timisoreana', 3.99, 'Timisoreana beer'),
    (5, 'Wine', 4.99, 'Red/White/Rose wine selection'),
    (5, 'Prossecco', 5.99, 'Champagne'),
    (5, 'Kamikaze', 1.99, 'Shots'),
    (5, 'Dorna', 1.99, 'Water'),
    (5, 'Pepsi', 2.99, 'Juice'),
    (5, 'Merlins', 3.99, 'Lemonade');

