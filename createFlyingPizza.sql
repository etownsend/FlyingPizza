DROP DATABASE IF EXISTS flyingPizza;
CREATE DATABASE flyingPizza;
USE flyingPizza;

CREATE TABLE Location
(
	locationID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userID BIGINT(18) NOT NULL,
	locationName varchar(64) NOT NULL,
	address varchar(64),
	gpsCoord varchar(64) NOT NULL
);

CREATE TABLE User
(
	userID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username varchar(64) NOT NULL UNIQUE KEY,
	password varchar(100) NOT NULL,
	email varchar(64) NOT NULL,
	join_date datetime NOT NULL,
	fname varchar(64) NOT NULL,
	lname varchar(64) NOT NULL,
	description varchar(64) NOT NULL
);

CREATE TABLE Ticket
(
	ticketID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	locationName varchar(64) NOT NULL,
	userID BIGINT(18) NOT NULL
);

CREATE TABLE Flight
(
	flightID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ticketID BIGINT(18) NOT NULL,
	aircraftID BIGINT(18) NOT NULL,
	departTime datetime NOT NULL,
	deliveryTime datetime,
	returnTime datetime
);

CREATE TABLE Aircraft
(
	aircraftID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	model varchar(64) NOT NULL,
	nickname varchar(64)
);


CREATE TABLE Maintenance
(
	maintenanceID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	aircraftID BIGINT(18) NOT NULL,
	userID BIGINT(18) NOT NULL,
	description varchar(64),
	cost decimal(10,2),
	date datetime NOT NULL
);

CREATE TABLE OrderedItem
(
	orderedItemID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	ticketID BIGINT(18) NOT NULL,
	itemID BIGINT(18) NOT NULL,
	registerCost decimal(10,2) NOT NULL,
	userID BIGINT(18)
);

CREATE TABLE Item
(
	itemID BIGINT(18) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	price decimal(10,2) NOT NULL,
	itemName varchar(64) NOT NULL,
	description varchar(64)
);
