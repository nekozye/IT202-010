INSERT INTO Shoot_UP_Items (id, name, description, stock, cost, image) VALUES
(-1, "Bomb", "Additional Bomb to use for next round.", 9999999, 5, "")
ON DUPLICATE KEY UPDATE modified = CURRENT_TIMESTAMP()