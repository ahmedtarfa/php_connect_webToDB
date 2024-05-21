CREATE TABLE login(
  email varchar(50) PRIMARY KEY,
  phone VARCHAR(20),
  password INT
);

CREATE TABLE Users (
    user_id INT NOT NULL AUTO_INCREMENT,
    PRIMARY KEY (user_id),
    first_name VARCHAR(20),
    last_name VARCHAR(20),
    dob DATE,
    password_hash VARCHAR(255),
    email varchar(50),
    phone VARCHAR(20),
    about varchar(200),
    FOREIGN KEY (email) REFERENCES login(email)
);

CREATE TABLE Page (
    page_id INT PRIMARY KEY,
    name VARCHAR(20),
    DateOfCreation TIMESTAMP,
    created_by INT ,
    company_email varchar(50),
    total_likes INT ,
    FOREIGN KEY (created_by) REFERENCES Users(user_id)
);


CREATE TABLE Post (
    post_id INT PRIMARY KEY,
    title varchar(20),
    created_by INT ,
    date_of_creation TIMESTAMP,
    likes INT,
    page_id INT,
    FOREIGN KEY (created_by) REFERENCES Users(user_id),
    FOREIGN KEY (page_id) REFERENCES Page(page_id)
    
);

CREATE TABLE Friend (
    friend_id INT PRIMARY KEY,
    user1_id  INT,
    user2_id  INT,
    time TIMESTAMP,
    FOREIGN KEY (user1_id) REFERENCES Users(user_id),
    FOREIGN KEY (user2_id) REFERENCES Users(user_id)
);

CREATE TABLE User_Post_Relationship (
    user_id INT,
    post_id INT,
    time_of_sharing_creation TIMESTAMP,
    shared_created BOOLEAN,
    PRIMARY KEY (user_id,post_id),
    FOREIGN KEY (user_id) REFERENCES Users(user_id),
    FOREIGN KEY (post_id) REFERENCES Post(post_id)
);

CREATE TABLE Chat (
    chat_id INT PRIMARY KEY,
    message VARCHAR(255),
    user1_id  INT,
    user2_id  INT,
    time TIMESTAMP,
    FOREIGN KEY (user1_id) REFERENCES Users(user_id),
    FOREIGN KEY (user2_id) REFERENCES Users(user_id)
);



=======================================================================================================================
insert:


INSERT INTO login (email,phone,password)
VALUES ('SA@facebook.com','01240578132','123456'), 
('SN@facebook.com','01541657652','545445'),
('MA@facebook.com','0152465655','5343541'), 
('KW@facebook.com','011424251555','45212440'),
('NA@facebook.com','01541412412','4112425');


INSERT INTO users (user_id, first_name, last_name, dob, password_hash, email, phone, about) 
VALUES (1, 'Sarah', 'Ahmed', '2001-05-13', '123456', 'SA@facebook.com', 01240578132,NULL), 
(2, 'Shimaa', 'Nader', '1995-07-21', '545445', 'SN@facebook.com', 01541657652,NULL),
(3, 'Mohamed', 'Attia', '2001-08-16', '5343541', 'MA@facebook.com', 0152465655,NULL), 
(4, 'Kareem', 'Walid', '2003-07-22', '45212440', 'KW@facebook.com', 011424251555, NULL),
(5, 'Nadeen', 'Amr', '2003-05-09', '4112425', 'NA@facebook.com', 01541412412, NULL);


INSERT INTO page (page_id, name, DateOfCreation, created_by, company_email, total_likes) 
VALUES (1, 'Sarah Ahmed', '2023-05-18 09:38:22', 1, NULL, 100), 
(2, 'Shimaa Nader', '2023-05-24 09:38:22', 2, NULL, 1000),
(3, 'Mohamed Attia', '2023-05-19 10:46:15', 3, NULL, 123), 
(4, 'Kareem Walid', '2023-05-18 09:38:22', 4, NULL, 26),
(5, 'Nadeen Amr', '2023-05-18 09:38:22', 5, NULL, 22);

INSERT INTO post (post_id, title, created_by, date_of_creation, likes,page_id) 
VALUES (1, 'graduated', 5, '2023-07-12 06:34:28', 100,5), 
(2, 'work at M company', 2, '2023-05-09 04:43:28', 22,2),
(3, 'engaged', 1, '2023-04-12 06:26:37', 160,1), 
(4, 'break up', 1, '2023-04-13 08:26:37', 200,1);

INSERT INTO User_Post_Relationship (user_id, post_id, time_of_sharing_creation,shared_created) 
VALUES (5, 1, '2023-07-12 06:34:28', 1), (2, 2, '2023-05-09 04:43:28', 1),
(1, 3, '2023-04-12 06:26:37', 0), (1, 4, '2023-04-13 08:26:37', 0);


INSERT INTO chat (chat_id,message,user1_id,user2_id,time) 
VALUES (1,'tommorow!', 1, 2, '2023-05-17 06:07:50'), 
(2,'would you like to come?', 3, 4, '2023-04-12 08:10:50'), 
(3,'???', 4, 5, '2023-06-16 10:10:20');

INSERT INTO friend (friend_id,user1_id,user2_id,time) 
VALUES (1, 4, 3, '2023-05-19 11:14:24'), 
(2, 1, 2, '2023-05-19 11:14:24'), 
(3, 2, 5, '2023-05-19 11:14:24');


=======================================================================================================================
join:




SELECT * FROM login INNER JOIN users ON login.email = users.email LIMIT 0, 25;


SELECT * FROM users INNER JOIN page ON users.user_id = page.created_by;
SELECT * FROM users INNER JOIN post ON users.user_id = post.created_by LIMIT 0, 25;
SELECT * FROM users INNER JOIN friend ON (users.user_id = friend.user1_id AND users.user_id = friend.user2_id) ;

SELECT * FROM users INNER JOIN chat ON (users.user_id = chat.user1_id AND users.user_id = chat.user2_id) ;

SELECT users.user_id, post.post_id FROM users INNER JOIN user_post_relationship ON users.user_id = user_post_relationship.user_id INNER JOIN post ON post.post_id = user_post_relationship.post_id;

