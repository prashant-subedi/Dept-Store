

#DROP ALL TABLES IF THEY EXIST ALREADY.
DROP DATABASE IF EXISTS dept_store;
CREATE DATABASE dept_store;
use dept_store;



CREATE TABLE Users(username VARCHAR(30),
	password VARCHAR(32) NOT NULL,
	level INT(11),
	PRIMARY KEY(username));

#A user created at the time the database is being created
INSERT INTO Users(username,password,level) Values("subash",
"b4caefa3d450d0e36e183160d17aba24",
10
);
CREATE TABLE Manufacturer(
	manufacturer_id INT(11) UNSIGNED PRIMARY KEY,
	manufacturer_name VARCHAR(30)
);

CREATE TABLE  ProductLocation(
	location_id INT(11) UNSIGNED PRIMARY KEY,
	sector VARCHAR(30),
	PFloor VARCHAR(30)
);

CREATE TABLE ProductType(
	product_type_id INT(11) UNSIGNED PRIMARY KEY,
	product_category VARCHAR(30),
	product_price INT(11) UNSIGNED,
	manufacturer_id INT(11) UNSIGNED,
	location_id INT(11) UNSIGNED,
	FOREIGN KEY(manufacturer_id) REFERENCES Manufacturer(manufacturer_id)
	ON DELETE SET NULL,
	FOREIGN KEY (location_id) REFERENCES ProductLocation(location_id)
	ON DELETE SET NULL
);


CREATE TABLE Product(
	 product_id INT(11) UNSIGNED PRIMARY KEY NOT NULL,
	 product_type_id INT(11) UNSIGNED,
	 product_name VARCHAR(30),
  	 product_status BOOLEAN,
   	 FOREIGN KEY(product_type_id) REFERENCES ProductType(product_type_id) ON DELETE CASCADE
);

CREATE TABLE Inventory (
	 product_type_id INT(11) UNSIGNED PRIMARY KEY,
	 price INT(11) UNSIGNED,
	 sold_count INT(11),
	 instock INT(11),
	 last_updated DATE,
	 FOREIGN KEY (product_type_id) REFERENCES  ProductType(product_type_id)
	 ON DELETE CASCADE
);
#show in
CREATE TABLE Dealer(
	dealer_id INT(11) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	dealer_email VARCHAR(40),
	dealer_firstname VARCHAR(10),
	deler_lastname VARCHAR(10) 
);
#show in html
CREATE TABLE dealerPhone(
	dealer_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	phone_no VARCHAR(15),
	FOREIGN KEY (dealer_id) REFERENCES Dealer(dealer_id)
	ON DELETE CASCADE
);

CREATE TABLE RelSupplies(
	dealer_id INT(11) UNSIGNED,
	product_type_id INT(11) UNSIGNED,
	FOREIGN KEY(dealer_id) REFERENCES Dealer(dealer_id)
	ON DELETE CASCADE,
	FOREIGN KEY(product_type_id) REFERENCES Inventory(product_type_id)
	ON DELETE CASCADE
);
CREATE TABLE Bank(
	bank_id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	bank_name VARCHAR(40)
);



CREATE TABLE Employee(
	employee_id INT(11) UNSIGNED PRIMARY KEY NOT NULL AUTO_INCREMENT,
	employee_first_name VARCHAR(15),
	employee_last_name VARCHAR(15),
	date_of_join DATE,
	employee_street_address VARCHAR(30),
	employee_city_address VARCHAR(30),
	employee_account VARCHAR(20),
	employee_salary INTEGER UNSIGNED,
	employee_card_type VARCHAR(10),
	employee_card_no VARCHAR(40),
	bank_id SMALLINT UNSIGNED,
	FOREIGN KEY(bank_id) REFERENCES Bank(bank_id)

); 

CREATE TABLE empPhone(
	employee_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	phone_no VARCHAR(15),
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id) 
	ON DELETE CASCADE
);

CREATE TABLE RelManages(
	employee_id INT(11) UNSIGNED,
	manager_id INT(11) UNSIGNED,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id),
	FOREIGN KEY(manager_id) REFERENCES Employee(employee_id)
);

CREATE TABLE Vacation(
	employee_id INT(11) UNSIGNED,
	date_start DATE, 
	date_end DATE,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
);

CREATE TABLE  Customer(
	customer_id INT(11) UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	customer_first_name VARCHAR(15),
	customer_last_name VARCHAR(15),
	customer_city_address VARCHAR(30),
	customer_street_address VARCHAR(30),
	customer_email VARCHAR(30),
	customer_due_amount INT(11),
	customer_payment_date DATE
);


CREATE TABLE customerPhone(
	customer_id INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	phone_no VARCHAR(15),
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE CASCADE
);

CREATE TABLE Sales(
	sales_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	sales_time TIMESTAMP,
	sales_cost INTEGER,
	customer_id INTEGER UNSIGNED,
	username  VARCHAR(30),#SET RESTRICTION IN BACK END NOT NULL
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE SET NULL,
	FOREIGN KEY(username) REFERENCES Users(username)
	ON DELETE SET NULL
);

CREATE TABLE RelProdSales(
	product_id INT(11) UNSIGNED PRIMARY KEY,
	sales_id INT(11) UNSIGNED,
	FOREIGN KEY(product_id) REFERENCES Product(product_id)
	ON DELETE CASCADE, 
	FOREIGN KEY(sales_id) REFERENCES Sales(sales_id)
	ON DELETE CASCADE
);

#Who ever does the sales, is the delivery person
CREATE TABLE  DELIVERY(
	sales_id INT(11) UNSIGNED,
	customer_id INT(11) UNSIGNED,
	delivary_location VARCHAR(100),
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE CASCADE
);

CREATE TABLE InHouseDuty(
	employee_id  INTEGER UNSIGNED PRIMARY KEY,
	date_start DATE,
	date_end DATE,
	floor SMALLINT UNSIGNED,
	sector SMALLINT UNSIGNED,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
	ON DELETE CASCADE
);

CREATE TABLE DeliveryDuty(
	employee_id INT(11) UNSIGNED PRIMARY KEY,
	date_start DATE,
	date_end DATE,
	avialable BOOLEAN,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
	ON DELETE CASCADE

);
CREATE TABLE RelReturns(
	sales_id INT(11) UNSIGNED,
	product_id INT(11) UNSIGNED,
	return_cause VARCHAR(100),
	FOREIGN KEY(product_id) REFERENCES Product(product_id)
	ON DELETE CASCADE, 
	FOREIGN KEY(sales_id) REFERENCES Sales(sales_id)
	ON DELETE CASCADE
);

#THESE ARE GENERATED DAILYs
CREATE TABLE DailyIncome(
	income_date DATE,
	daily_expenditure INT(11),
	daily_income INT(11),
	net_profit INT(11)
);
CREATE TABLE MonthlyIncome(
	month DATE,#SET DAY AS 00
	net_profit INT(11)
);
CREATE TABLE CurrentTransaction(
	product_id INT(11) UNSIGNED PRIMARY KEY,
	sales_id INT(11) UNSIGNED,
	FOREIGN KEY(product_id) REFERENCES Product(product_id),
	FOREIGN KEY(sales_id) REFERENCES Sales(sales_id)
);
