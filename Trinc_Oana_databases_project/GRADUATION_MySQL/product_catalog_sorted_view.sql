USE graduation;
-- catalog of products with prices from the smallest to largest
CREATE VIEW product_catalog_sorted_view AS
SELECT product_name, price, description
FROM products
ORDER BY price ASC;
