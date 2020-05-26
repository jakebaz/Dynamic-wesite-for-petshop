/*myAdmin previews*/


/*Create Tables*/
CREATE TABLE IF NOT EXISTS admin_user
(
	admin_uname VARCHAR(20) NOT NULL PRIMARY KEY,
	admin_pass VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS user_account
(
	username VARCHAR(20) NOT NULL PRIMARY KEY,
	password VARCHAR(50) NOT NULL,
	email VARCHAR(30) NOT NULL,
	date_created DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS user_details
(
	username VARCHAR(20) NOT NULL REFERENCES user_account(username),
	first_name VARCHAR(20) NOT NULL,
	surname VARCHAR(20) NOT NULL,
	email VARCHAR(30) NOT NULL REFERENCES user_account(email),
	house_name_no VARCHAR(20) NULL,
	street VARCHAR(28) NULL,
	town VARCHAR(58) NULL,
	county VARCHAR(26) NULL,
	postcode VARCHAR(8) NULL,
	card_no VARCHAR(16) NULL,
	exp_date VARCHAR(5) NULL,
	name_on_card VARCHAR(40) NULL,
	PRIMARY KEY(username, email)
);

CREATE TABLE IF NOT EXISTS animal_type
(
	animal_name VARCHAR(15) NOT NULL,
	category VARCHAR(15) NOT NULL,
	animal_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
	
);

CREATE TABLE IF NOT EXISTS pet
(
	pet_name VARCHAR(15) NOT NULL,
	username VARCHAR(15) NOT NULL REFERENCES user(username),
	animal_type VARCHAR(15) NOT NULL REFERENCES animal_type(category),
	primary key(pet_name, username, animal_type)
);

CREATE TABLE IF NOT EXISTS product
(
	prod_name VARCHAR(20) NOT NULL,
	prod_brand VARCHAR(10) NOT NULL,
	prod_category VARCHAR(10) NOT NULL,
	stock INT NOT NULL,
	product_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY
);

CREATE TABLE IF NOT EXISTS pl_order
(
	order_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(20) NOT NULL REFERENCES user(username),
	alt_house_name_no VARCHAR(20) NULL,
	alt_street VARCHAR(15) NULL,
	alt_town VARCHAR(58) NULL,
	alt_county VARCHAR(26) NULL,
	alt_postcode VARCHAR(8) NULL,
	status VARCHAR(10) NULL
);

/*Insert sample data*/
INSERT INTO admin_user
	VALUES('admin', 'AdMinsTraTor_PWORD!64789');

INSERT INTO user_account (username, password, email)
	VALUES('jsmith88', 'js88317', 'jsmith@gmail.com');

INSERT INTO user_account (username, password, email)
	VALUES('Vsilla97', 'vsecret', 'vicky@hotmail.com');

INSERT INTO user_account (username, password, email)
	VALUES('DaVeyyBoii', 'dMan124830', 'davidporter@gmail.com');

INSERT INTO	user_account (username, password, email)
	VALUES('JKYbzn16', 'password', 'jakebazin@gmail.com');

INSERT INTO user_details
	VALUES('jsmith88','John', 'Smith', 'jsmith@gmail.com', '14', 'Malibu Rd', 'Stanley', 'County Durham', 'DH37YT', NULL, NULL, NULL);

INSERT INTO user_details
	VALUES('Vsilla97', 'Victora', 'Jones','vicky@hotmail.com', '54', 'Burnsley Street', 'Newcastle Upon Tyne', 'Tyne and Wear', 'NE57UU', NULL, NULL, NULL);

INSERT INTO user_details
	VALUES('DaVeyyBoii','David', 'Porter', 'davidporter@gmail.com', '2', 'Sainsbury Street', 'Sunderland', 'Tyne and Wear', 'SR54EA', NULL, NULL, NULL);

INSERT INTO user_details	
	VALUES('JKYbzn16', 'Jake', 'Bazin', 'jakebazin@gmail.com', '13', 'Station Rd', 'Houghton Le Spring', 'Tyne and Wear', 'DH45AH', NULL, NULL, NULL);

INSERT INTO animal_type
	VALUES('Dog', 'Mammal', 1001);

INSERT INTO animal_type 
	VALUES('Cat', 'Mammal', 1002);

INSERT INTO animal_type 
	VALUES('Rabbit', 'Small mammal', 1003);

INSERT INTO animal_type 
	VALUES('Hamster', 'Rodent', 1004);

INSERT INTO animal_type 
	VALUES('Goldfish', 'Fish', 1005);

INSERT INTO animal_type
	VALUES('Guinea pig', 'Rodent', 1006);

INSERT INTO animal_type
	VALUES('Gerbil', 'Rodent', 1007);

INSERT INTO animal_type 
	VALUES('Rat', 'Rodent', 1008);

INSERT INTO animal_type 
	VALUES('Ferret', 'Carnivora', 1009);

INSERT INTO animal_type 
	VALUES('Tourtoise', 'Reptile', 1010);

INSERT INTO animal_type 
	VALUES('Snake', 'Reptile', 1011);

INSERT INTO pet
	VALUES('Sooty', 'JKYbzn16', 'Cat');

INSERT INTO pet
	VALUES('Scooby', 'Vsilla97', 'Dog');

INSERT INTO pet
	VALUES('Albert', 'JKYbzn16', 'Rabbit');		

INSERT INTO pet
	VALUES('Leila', 'JKYbzn16', 'Rabbit');

INSERT INTO pet
	VALUES('Aggy', 'DaVeyyBoii', 'Hamster');

	