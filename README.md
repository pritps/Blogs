# Blogs
Site of Bloggers

CREATE TABLE blogger (
id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(50) NOT NULL,
password VARCHAR(50) NOT NULL,
email VARCHAR(50),
bio VARCHAR(2048),
portrait VARCHAR(50),
UNIQUE(username)
);

CREATE TABLE blog_post (id INT(10) NOT NULL AUTO_INCREMENT,
blogger_id INT(10) NOT NULL,
title VARCHAR(255) NOT NULL,
blog_content TEXT NOT NULL,
excerpt VARCHAR(2048),
created_date DATE NULL);
