# ProjectKi
Team:Super Saiyans 

Team Members:Ritta Gladchuk, Kyle Smith 

Project Description:Repo for CS320 project which is a webpage which allows the user to generate bills of materials (BOM) and purchase orders (PO) from
databases of parts and suppliers as well as save projects for future use and reference.

Status:The project is in implementation stage. We have started implementing the back end database functionalities. 

Required:

xampp installation for database implementation, xampp comes with phpmyadmin, which is also required. 
Xampp can be downloaded for installation here:
https://www.apachefriends.org/download.html

This project uses Semantic UI, which determines the styling of the page, this isn't necessary for funtionality but the page will look different based on whether or not this is installed.

The database tables that need to be created should be called: projecttables, parts, suppliers. This can be done inside of the phpMyAdmin console using the following commands:
CREATE DATABASE kiDB;
CREATE TABLE IF NOT EXISTS parts (
  id int(5) NOT NULL AUTO_INCREMENT,
  part_number varchar(255) NOT NULL,
  description varchar(255) NOT NULL,
  manufacturer varchar(255) NOT NULL,
  supplier varchar(255) NOT NULL,
  price decimal(8,2) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

USE kiDB;
CREATE TABLE IF NOT EXISTS suppliers (
  id int(5) NOT NULL AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  abbreviation varchar(255) NOT NULL,
  account varchar(255) NOT NULL,
  contact varchar(255) NOT NULL,
  address varchar(255) NOT NULL,
  phone varchar(255) NOT NULL,
  PRIMARY KEY (id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

CREATE DATABASE eng-projects;
CREATE TABLE IF NOT EXISTS projecttable (
 id int(5) NOT NULL AUTO_INCREMENT,
 projectID varchar(255) NOT NULL,
 projectName varchar(255) NOT NULL,
 date date NOT NULL,
 jobNumber varchar(255) NOT NULL,
 customerName varchar(255) NOT NULL,
 bomDescription text NOT NULL,
 PRIMARY KEY(id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;



The login for the database connection used inside the source files is as follows:
User:root
Password:secret

This can be set on database side. If user wishes to use a different password, this can also be changed within the source files whenever a connection is made.

Once xampp is set up, and MySQL and Apache are running, the following command needs to be executed inside the suppliers and inside the parts folders to connect to the database:
nodemon app.js

After initiating both database apps, the website should be usable at localhost in the browser.
