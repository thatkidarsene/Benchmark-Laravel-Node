CREATE DATABASE IF NOT EXISTS testdb;
USE testdb;

CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(100),
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DELIMITER $$

DROP PROCEDURE IF EXISTS seed_users$$

CREATE PROCEDURE seed_users()
BEGIN
  DECLARE i INT DEFAULT 0;
  WHILE i < 100000 DO
    INSERT INTO users (name, email) VALUES (
      CONCAT('User', i),
      CONCAT('user', i, '@example.com')
    );
    SET i = i + 1;
  END WHILE;
END$$

DELIMITER ;

CALL seed_users();
