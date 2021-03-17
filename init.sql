CREATE DATABASE registration;

  use registration;
  
CREATE TABLE students (
  id INT(4) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  firstname CHAR(30) NOT NULL, 
  lastname CHAR(30) NOT NULL,
  email VARCHAR(40) NOT NULL,
  date TIMESTAMP
);

CREATE TABLE courses (
  id INT(4) UNSIGNED,
  name CHAR(100) NOT NULL,
  startTime TIME NOT NULL,
  endTime TIME NOT NULL
);

CREATE TABLE registeredCourses (
  courseID INT(4) NOT NULL,
  studentID INT(4) NOT NULL
);