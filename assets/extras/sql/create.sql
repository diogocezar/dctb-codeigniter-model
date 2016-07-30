CREATE TABLE user_type (
	id INTEGER NOT NULL AUTO_INCREMENT,
	name VARCHAR(150) NOT NULL,
	description VARCHAR(300) NULL,
	date_update TIMESTAMP DEFAULT 0,
	date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	removed INT NOT NULL DEFAULT 0,
	PRIMARY KEY (id)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE user (
	id INTEGER NOT NULL AUTO_INCREMENT,
	id_user_type INT NOT NULL,
	name VARCHAR(150) NOT NULL,
	email VARCHAR(150) NOT NULL,
	password VARCHAR(150) NOT NULL,
	picture VARCHAR(300) NULL,
	guid VARCHAR (50),
	id_user_modified INT,
	date_update TIMESTAMP DEFAULT 0,
	date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	removed INT NOT NULL DEFAULT 0,
	PRIMARY KEY (id),
	CONSTRAINT FOREIGN KEY (id_user_type) REFERENCES user_type (id),
	CONSTRAINT FOREIGN KEY (id_user_modified) REFERENCES user (id)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

ALTER TABLE user_type ADD id_user_modified INT NULL AFTER description;
ALTER TABLE user_type ADD FOREIGN KEY (id_user_modified) REFERENCES user(id);

CREATE TABLE news (
    id int(11) NOT NULL AUTO_INCREMENT,
    title varchar(128) NOT NULL,
    slug varchar(128) NOT NULL,
    text text NOT NULL,
	id_user_modified INT,
	date_update TIMESTAMP DEFAULT 0,
	date_create TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	removed INT NOT NULL DEFAULT 0,
    PRIMARY KEY (id),
    KEY slug (slug),
    CONSTRAINT FOREIGN KEY (id_user_modified) REFERENCES user (id)
)DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;