CREATE DATABASE surveyDB;
USE surveyDB;

CREATE TABLE answersheet (
	id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
	Q1 INT(1),
	Q2 INT(1),
	Q3 VARCHAR(30),


	
	date TIMESTAMP
);

