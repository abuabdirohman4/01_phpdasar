SHOW DATABASES;

CREATE DATABASE php_basic;

USE php_basic;

CREATE TABLE mahasiswa (
    id      INT PRIMARY KEY AUTO_INCREMENT,
    nama    VARCHAR(100),
    nrp     CHAR(10),
    email   VARCHAR(100),
    jurusan VARCHAR(100),
    gambar  VARCHAR(100)
);

SHOW TABLES;

DESCRIBE mahasiswa;

INSERT INTO mahasiswa VALUES (0, 'Abu Abdirohman', '1301164354', 'abuabdirohman4@gmail.com', 'Informatika', 'abuabdirohman.jpg');
INSERT INTO mahasiswa VALUES (NULL, 'Azati Hanani', '1301164123', 'hanani@gmail.com', 'Bisnis', 'profile-general.jpg');
INSERT INTO mahasiswa (nama, nrp, email, jurusan, gambar) VALUES ('Azati Hanani', '1301164123', 'hanani@gmail.com', 'Bisnis', 'hanan.jpeg');

SELECT * FROM mahasiswa;
SELECT nrp FROM mahasiswa;
SELECT nrp, nama FROM mahasiswa;
SELECT * FROM mahasiswa WHERE nrp = '1301164354';

UPDATE mahasiswa SET jurusan = 'Teknik Informatika' WHERE id = 2;

DELETE FROM mahasiswa WHERE id = 3;

DROP TABLE mahasiswa;

DROP DATABASE php_basic

-- PZN
-- CREATE TABLE mahasiswa (
--     id      INT,
--     nama    VARCHAR(100),
--     nrp     CHAR(9),
--     email   VARCHAR(100),
--     jurusan VARCHAR(100),
--     gambar  VARCHAR(100),
--     PRIMARY KEY (id)
-- );

-- INSERT INTO mahasiswa(id, nama, nrp, email, jurusan, gambar) 
-- VALUES  ('1', 'Abu Abdirohman', '1301164354', 'abuabdirohman4@gmail.com', 'Informatika', 'abuabdirohman.jpeg');

-- DELETE
-- FROM mahasiswa
-- WHERE id = '1';