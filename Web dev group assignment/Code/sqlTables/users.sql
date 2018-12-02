CREATE TABLE users
(
	FirstName VARCHAR(20) NOT NULL,
	LastName VARCHAR(25) NOT NULL,
	Email VARCHAR(30) NOT NULL UNIQUE,
	DOB VARCHAR(10) NOT NULL,
	Gender VARCHAR(6) NOT NULL,
	Address1 VARCHAR(50) NOT NULL,
	Address2 VARCHAR(50) NOT NULL,
	City VARCHAR(6) NOT NULL,
	ZipCode VARCHAR(8) NOT NULL,
	Password VARCHAR(60) NOT NULL,
	UploadedImage VARCHAR(30) NOT NULL
);
