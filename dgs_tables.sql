# database tables

CREATE TABLE user (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(120),
	passwd VARCHAR(120),
	email VARCHAR(120) NOT NULL,
	oncourse INT,
	checkintime DATETIME,
	session VARCHAR(60),
	token VARCHAR(60),
	lastlogin DATETIME,
	PRIMARY KEY(id)
	);

CREATE TABLE course (
	id INT NOT NULL AUTO_INCREMENT,
	name VARCHAR(120) NOT NULL,
	streetaddress VARCHAR(360),
	postcode VARCHAR(10),
	city VARCHAR(100),
	country VARCHAR(100),
	rating VARCHAR(2),
	lat FLOAT(10,6),
	lng FLOAT(10,6),
	createtime DATETIME,
	PRIMARY KEY(id)
	);

CREATE TABLE hole (
	id INT NOT NULL AUTO_INCREMENT,
	course_id INT NOT NULL,
	sort INT NOT NULL,
	par INT,
	name VARCHAR(100),
	distance INT,
	createtime DATETIME,
	create_user_id INT,
	updatetime DATETIME,
	update_user_id INT,
	PRIMARY KEY(id)
	);

CREATE TABLE scoresheet (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT NOT NULL,
	course_id INT,
	status INT(1),
	createtime DATETIME,
	updatetime DATETIME,
	completetime DATETIME,
	comment VARCHAR(100),
	PRIMARY KEY(id)
	);

CREATE TABLE score (
	id INT NOT NULL AUTO_INCREMENT,
	scoresheet_id INT NOT NULL,
	hole_id INT NOT NULL,
	score INT,
	coord_lat INT,
	coord_long INT,
	createtime DATETIME,
	PRIMARY KEY(id)
	);

CREATE TABLE message (
	id INT NOT NULL AUTO_INCREMENT,
	user_id INT,
	location_id INT,
	content VARCHAR(200),
	type INT NOT NULL,
	link_id INT,
	createtime DATETIME,
	PRIMARY KEY(id)
);
