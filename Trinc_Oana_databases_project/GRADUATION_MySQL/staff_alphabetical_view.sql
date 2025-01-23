USE graduation;

CREATE VIEW staff_alphabetical_order_view AS
SELECT distinct *
FROM team
ORDER BY name ASC;
