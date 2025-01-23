USE graduation;
-- catalog of products available in the shop along with their prices and descriptions
CREATE VIEW product_catalog_view AS
SELECT product_name, price, description
FROM products;
