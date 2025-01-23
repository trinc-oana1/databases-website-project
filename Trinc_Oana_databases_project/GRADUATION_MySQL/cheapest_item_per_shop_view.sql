USE graduation;

-- cheapest item of each shop
CREATE VIEW cheapest_item_per_shop AS
SELECT p.shop_id, p.product_name, p.price
FROM products p
JOIN (
    SELECT shop_id, MIN(price) AS min_price
    FROM products
    GROUP BY shop_id
) AS min_prices
ON p.shop_id = min_prices.shop_id AND p.price = min_prices.min_price;
