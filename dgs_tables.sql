# database tables

CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(120),
	passwd VARCHAR(120),
	email VARCHAR(120) NOT NULL,
	session VARCHAR(120),
	lastlogin DATETIME,
	PRIMARY KEY(id)
	);

CREATE TABLE course (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(120) NOT NULL,
	address VARCHAR(360),
	createtime DATETIME,
	PRIMARY KEY(id)
	);

CREATE TABLE lane (
	id INT NOT NULL AUTO_INCREMENT,
	course_id INT NOT NULL,
	sort INT NOT NULL,
	par INT,
	name VARCHAR(100),
	distance INT,
	PRIMARY KEY(id)
	);

CREATE TABLE scoresheet (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	course_id INT,
	createdate DATETIME,
	comment VARCHAR(100),
	PRIMARY KEY(id)
	);

CREATE TABLE score (
	id INT NOT NULL AUTO_INCREMENT,
	scoresheet_id INT NOT NULL,
	lane_id INT NOT NULL,
	score INT,
	coord_lat INT,
	coord_long INT,
	createtime DATETIME
	PRIMARY KEY(id)
	);
