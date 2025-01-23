USE graduation;

-- counts how many products in each shop
CREATE VIEW products_count_per_shop AS
SELECT shop_id, COUNT(*) AS product_count
FROM products
GROUP BY shop_id;

