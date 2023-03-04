

CREATE TABLE users(
   id INT AUTO_INCREMENT,
   firstname VARCHAR(50)  NOT NULL,
   lastname VARCHAR(50)  NOT NULL,
   pseudo VARCHAR(50)  NOT NULL,
   password VARCHAR(255)  NOT NULL,
   email VARCHAR(150)  NOT NULL,
   birthday DATE NOT NULL,
   created_at DATETIME,
   updated_at DATETIME,
   deleted_at DATETIME,
   admin BOOLEAN NOT NULL,
   profil_img_name TINYINT,
   id_categories INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_categories) REFERENCES categories(id)
);

CREATE TABLE publications(
   id INT AUTO_INCREMENT,
   title VARCHAR(100)  NOT NULL,
   description VARCHAR(300) ,
   deleted_at DATETIME,
   created_at DATETIME,
   image_name VARCHAR(100) ,
   marker_longitude DECIMAL(9,7)  ,
   marker_latitude DECIMAL(9,7)  ,
   validated_at DATETIME,
   town VARCHAR(100)  NOT NULL,
   report BOOLEAN NOT NULL,
   likes SMALLINT,
   id_categories INT,
   id_users INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_categories) REFERENCES categories(id),
   FOREIGN KEY(id_users) REFERENCES users(id)
);

CREATE TABLE comments(
   id INT AUTO_INCREMENT,
   description VARCHAR(500)  NOT NULL,
   validated_at DATETIME,
   created_at DATETIME,
   deleted_at DATETIME,
   report TINYINT NOT NULL,
   id_users INT NOT NULL,
   id_publications INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_users) REFERENCES users(id),
   FOREIGN KEY(id_publications) REFERENCES publications(id)
);

CREATE TABLE favorites(
   id INT AUTO_INCREMENT,
   id_publications INT NOT NULL,
   id_users INT NOT NULL,
   PRIMARY KEY(id),
   FOREIGN KEY(id_publications) REFERENCES publications(id),
   FOREIGN KEY(id_users) REFERENCES users(id)
);
CREATE TABLE categories(
   id INT AUTO_INCREMENT,
   name VARCHAR(50) ,
   PRIMARY KEY(id)
);