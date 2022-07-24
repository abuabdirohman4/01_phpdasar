SHOW TABLES;

CREATE TABLE user (
    id          INT PRIMARY KEY AUTO_INCREMENT,
    username    VARCHAR(100),
    password    VARCHAR(255)
);

DROP TABLE user;

SELECT * FROM user;

DELETE FROM user;

INSERT INTO user VALUES (NULL, 'abuabdirohman', '123');