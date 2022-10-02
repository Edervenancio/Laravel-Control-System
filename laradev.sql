DROP DATABASE IF EXISTS laradev;
CREATE DATABASE IF NOT EXISTS laradev;
USE laradev; 

CREATE TABLE properties (
id 			 INT NOT NULL AUTO_INCREMENT,
title 		 VARCHAR(255),
name_url     VARCHAR(255),
descriptions TEXT,
rental_price DECIMAL(10,2), 
sale_price   DECIMAL(10,2),

PRIMARY KEY (id)
);
