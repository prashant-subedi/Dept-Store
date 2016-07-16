

#DROP ALL TABLES IF THEY EXIST ALREADY.
DROP DATABASE IF EXISTS dept_store;
CREATE DATABASE dept_store;
use dept_store;



CREATE TABLE Users(username VARCHAR(30),
	password VARCHAR(32) NOT NULL,
	level SMALLINT,
	PRIMARY KEY(username));

#A user created at the time the database is being created
INSERT INTO Users(username,password,level) Values("prashant",
"af948f0b6334c5d6e822c9bc8cf24034",
10
);

CREATE TABLE Manufacturer(
	manufacturer_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	manufacturer_name VARCHAR(30)
);

CREATE TABLE  ProductLocation(
	location_id SMALLINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	sector VARCHAR(30),
	floor VARCHAR(30)
);

CREATE TABLE ProductType(
	product_type_id INTEGER UNSIGNED PRIMARY KEY,
	product_category VARCHAR(30),
	product_price INTEGER,
	manufacturer_id INTEGER UNSIGNED,
	location_id SMALLINT UNSIGNED,
	FOREIGN KEY(manufacturer_id) REFERENCES Manufacturer(manufacturer_id)
	ON DELETE SET NULL,
	FOREIGN KEY (location_id) REFERENCES ProductLocation(location_id)
	ON DELETE SET NULL
);


CREATE TABLE Product(
	 product_id BIGINT UNSIGNED PRIMARY KEY  AUTO_INCREMENT,
	 product_type_id INTEGER UNSIGNED NOT NULL,
  	 product_stauts BOOLEAN,
   	 FOREIGN KEY(product_type_id) REFERENCES ProductType(product_type_id)
  	 ON DELETE CASCADE
);

CREATE TABLE Inventory (
	 product_type_id INTEGER UNSIGNED PRIMARY KEY,
	 price INTEGER UNSIGNED,
	 sold_count INTEGER,
	 instock INTEGER,
	 last_updated DATE,
	 FOREIGN KEY (product_type_id) REFERENCES  ProductType(product_type_id)
	 ON DELETE CASCADE
);

CREATE TABLE Dealer(
	dealer_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	dealer_email VARCHAR(40),
	dealer_firstname VARCHAR(10),
	deler_lastname VARCHAR(10)
);

CREATE TABLE dealerPhone(
	dealer_id INTEGER UNSIGNED,
	phone_no VARCHAR(15),
	FOREIGN KEY (dealer_id) REFERENCES Dealer(dealer_id)
	ON DELETE CASCADE
);

CREATE TABLE RelSupplies(
	dealer_id INTEGER UNSIGNED,
	product_type_id INTEGER UNSIGNED,
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
	employee_id INTEGER UNSIGNED PRIMARY KEY,
	employee_first_name VARCHAR(15),
	employee_last_name VARCHAR(15),
	date_of_join DATE,
	employee_street_address VARCHAR(30),
	employee_city_address VARCHAR(30),
	employee_card_type VARCHAR(10),
	employee_card_no VARCHAR(40),
	employee_account VARCHAR(20),
	employee_salary INTEGER UNSIGNED,
	bank_id SMALLINT UNSIGNED,
	FOREIGN KEY(bank_id) REFERENCES Bank(bank_id)
); 

CREATE TABLE empPhone(
	employee_id INTEGER UNSIGNED,
	phone_no VARCHAR(15),
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id) 
	ON DELETE CASCADE
);

CREATE TABLE RelManages(
	employee_id INTEGER UNSIGNED,
	manager_id INTEGER UNSIGNED,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id),
	FOREIGN KEY(manager_id) REFERENCES Employee(employee_id)
);

CREATE TABLE Vacation(
	employee_id INTEGER UNSIGNED,
	date_start DATE, 
	date_end DATE,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
);

CREATE TABLE  Customer(
	customer_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	customer_first_name VARCHAR(15),
	customer_last_name VARCHAR(15),
	customer_city_address VARCHAR(30),
	customer_street_address VARCHAR(30),
	customer_email VARCHAR(30),
	customer_due_amount INTEGER,
	customer_payment_date DATE
);


CREATE TABLE customerPhone(
	customer_id INTEGER UNSIGNED,
	phone_no VARCHAR(15),
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE CASCADE
);

CREATE TABLE Sales(
	sales_id INTEGER UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	sales_date DATE,
	sales_time TIMESTAMP,
	sales_cost INTEGER,
	customer_id INTEGER UNSIGNED,
	employee_id INTEGER UNSIGNED,#SET RESTRICTION IN BACK END..NOT NULL
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE SET NULL,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
	ON DELETE SET NULL
);


CREATE TABLE RelProdSales(
	product_id BIGINT UNSIGNED PRIMARY KEY,
	sales_id INTEGER UNSIGNED,
	FOREIGN KEY(product_id) REFERENCES Product(product_id)
	ON DELETE CASCADE, 
	FOREIGN KEY(sales_id) REFERENCES Sales(sales_id)
	ON DELETE CASCADE
);

#Who ever does the sales, is the delivery person
CREATE TABLE  Delivery(
	sales_id INTEGER UNSIGNED,
	customer_id INTEGER UNSIGNED,
	delivary_location VARCHAR(100),
	FOREIGN KEY(customer_id) REFERENCES Customer(customer_id) 
	ON DELETE CASCADE
);

CREATE TABLE InHouseDuty(
	employee_id  INTEGER UNSIGNED PRIMARY KEY,
	location_id SMALLINT UNSIGNED,
	date_start DATE, 
	date_end DATE,
	FOREIGN KEY(location_id) REFERENCES ProductLocation(location_id)
	ON DELETE CASCADE,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
	ON DELETE CASCADE
);

CREATE TABLE DeliveryDuty(
	employee_id INTEGER UNSIGNED PRIMARY KEY,
	date_start DATE,
	date_end DATE,
	avialable BOOLEAN,
	FOREIGN KEY(employee_id) REFERENCES Employee(employee_id)
	ON DELETE CASCADE

);
CREATE TABLE RelReturns(
	sales_id INTEGER UNSIGNED,
	product_id BIGINT UNSIGNED,
	return_cause VARCHAR(100),
	FOREIGN KEY(product_id) REFERENCES Product(product_id)
	ON DELETE CASCADE, 
	FOREIGN KEY(sales_id) REFERENCES Sales(sales_id)
	ON DELETE CASCADE
);

#THESE ARE GENERATED DAILYs
CREATE TABLE DailyIncome(
	income_date DATE,
	daily_expenditure INTEGER,
	daily_income INTEGER,
	net_profit INTEGER
);
CREATE TABLE MonthlyIncome(
	month DATE,#SET DAY AS 00
	net_profit INTEGER
);