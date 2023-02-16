-- INSERT INTO users VALUES(NULL,'user','Camilo','Villamil','camilovill','camilo@gmail.com','12345678',null,CURTIME(),CURTIME(),NULL); 
-- INSERT INTO users VALUES(NULL,'user','Carlos','Restrepo','carlos','carlos@gmail.com','12345678',null,CURTIME(),CURTIME(),NULL); 
-- INSERT INTO users VALUES(NULL,'user','Lorena','Lopez','lorena','lorena@gmail.com','12345678',null,CURTIME(),CURTIME(),NULL); 
-- INSERT INTO users VALUES(NULL,'user','Marian','Garzon','mariana','mariana@gmail.com','12345678',null,CURTIME(),CURTIME(),NULL); 




CREATE TABLE IF NOT EXISTS users(
    id int(255) auto_increment not null,
    role varchar(20),
    name varchar(100),
    surname varchar(200),
    nick varchar(100),
    email varchar(255),
    password varchar(255),
    image varchar(255),
    created_at datetime,
    updated_at datetime,
    remember_token varchar(255),
    CONSTRAINT pk_users PRIMARY KEY(id)

) ENGINE=InnoDb;




CREATE TABLE IF NOT EXISTS images(
    id   int(255) auto_increment not null,
    user_id int(255),
    image_path varchar(255),
    description text,
    created_at datetime,
    update_at datetime,
    CONSTRAINT pk_images PRIMARY KEY(id),
    CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id) 
)ENGINE=InnoDb
INSERT INTO images VALUES(NULL,1,'descripcion 1', CURTIME(),CURTIME(),'test.jpg');
INSERT INTO images VALUES(NULL,1,'descripcion 1', CURTIME(),CURTIME(),'familia.jpg');
INSERT INTO images VALUES(NULL,4,'descripcion 1', CURTIME(),CURTIME(),'playa.jpg');
INSERT INTO images VALUES(NULL,2,'descripcion 1', CURTIME(),CURTIME(),'bosque.jpg');




CREATE TABLE IF NOT EXISTS comments(
    id   int(255) auto_increment not null,
    user_id int(255),
    image_id int(255),
    content text,
    created_at datetime,
    update_at datetime,
    CONSTRAINT pk_comments PRIMARY KEY(id),
    CONSTRAINT fk_comments_user FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE =InnoDb


INSERT INTO comments VALUES(NULL,1,4,'Bacano 1',CURTIME(),CURTIME());
INSERT INTO comments VALUES(NULL,2,1,'Bacano 2',CURTIME(),CURTIME());
INSERT INTO comments VALUES(NULL,4,1,'Bacano 3' ,CURTIME(),CURTIME());
INSERT INTO comments VALUES(NULL,3,4,'Bacano 4',CURTIME(),CURTIME());

CREATE TABLE IF NOT EXISTS likes(
    id   int(255) auto_increment not null,
    user_id int(255),
    image_id int(255),
    created_at datetime,
    update_at datetime,
    CONSTRAINT pk_likes PRIMARY KEY(id),
    CONSTRAINT fk_likes_user FOREIGN KEY(user_id) REFERENCES users(id),
    CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)

)ENGINE =InnoDb


INSERT INTO likes VALUES(NULL,1,4,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,3,4,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,3,3,CURTIME(),CURTIME());
INSERT INTO likes VALUES(NULL,3,1,CURTIME(),CURTIME());

