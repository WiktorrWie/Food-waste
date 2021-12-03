CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    email VARCHAR(50),
    hashedpassword VARCHAR(250),
    date_created DATE

);
DROP TABLE profiles;


CREATE TABLE profiles (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    first_name VARCHAR(50), 
    last_name VARCHAR(50),
    review_score FLOAT,
    profile_picture VARCHAR(100)
);

CREATE TABLE posts (
    id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
    userid INT,
    date_added DATE,
    title VARCHAR(50),
    description VARCHAR(255),
    picture VARCHAR(100),
    active BOOLEAN, 
    buyerID INT
);

DELIMITER //
CREATE PROCEDURE addUser (
    in emailvar VARCHAR(50),
    in hashedpassvar VARCHAR(250),
    in firstnamevar VARCHAR(50),
    in lastnamevar VARCHAR(50)
)
BEGIN 
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
    ROLLBACK;
    END;
START TRANSACTION;

    IF NOT EXISTS 
    (SELECT email FROM users WHERE email = emailvar)
  THEN
        INSERT INTO users (email, hashedPassword, date_created) VALUES (emailvar, hashedpassvar, CURRENT_DATE);
        INSERT INTO profiles (id, first_name, last_name) VALUES (@@identity, firstnamevar, lastnamevar);
    COMMIT;
    END IF;

END//
DELIMITER ;


    CALL addUSer("mathiashlund@gmail.com", "18u12d98uhj8f7y34f734f834f8374f8i", "Mathias", "Lund");

DELIMITER //

CREATE PROCEDURE addPost (
    in useridvar INT,
    in titlevar VARCHAR(50),
    in descriptionvar VARCHAR(255),
    in picturevar VARCHAR(100),
    in cityvar VARCHAR(50)
)
BEGIN 
    DECLARE EXIT HANDLER FOR SQLEXCEPTION, SQLWARNING
    BEGIN
    ROLLBACK;
    END;
START TRANSACTION;


        INSERT INTO posts (userid, date_added, title, description, picture, active, city) 
        VALUES (useridvar, CURRENT_DATE, titlevar, descriptionvar, picturevar, 1, cityvar);

    COMMIT;

END//
DELIMITER ;
DROP PROCEDURE addPost;
CALL addPost (1, "Spaghet", "Long spaghetti boys", "google.com/spaghet", "Aarhus");

ALTER TABLE posts
ADD COLUMN city VARCHAR(50)
;