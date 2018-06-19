# Internals portal
A mini-web application that deploys an internals portal using PHP, JavaScript, CSS, SQL on the wamp server.

## Features :

### Home page: index.html
  1) Admin login -> (auth.php + script.js)
  2) Teacher login -> (tauth.php + tscript.js)
  3) Student login -> (sauth.php + sscript.js)

### Admin privileges:
  1) Can add or remove subjects - subject.php
  2) Can add or remove teachers - teacher.php
  3) Can add or remove students and assign mentors - student.php
  4) Can assign teachers to subjects or as class-in-charge for classes - assign1.php, assign2.php
  5) Can lock the assesment period or unlock it - lock.php
  6) Trigger calculation of internals by locking the last assesment period - calc.php
  
### Teacher privileges:
  1) Can enter marks for students of a class - mark1.php, marks2.php
  2) Update particular student records - upstud.php
  3) View subject records for the classes that they handle - classrec.php
  4) View the class records all the subjects of the class that they are in charge of - incharge.php
  5) View the subject records for the students that they mentor - mentor.php
  
### Student privileges:
 1) View subject records of theirs - view.php
 
### Cascading style sheet : style.css

## Database structure:

### Table Student
  || Regno  int(12) ||
  Name   varchar(30) ||
  DOB    date ||
  Sem    int(11) ||
  Sec    char(1) ||
  mentor int(11) || 
  
### Table Teacher
  || TID      int(11) ||
  Name     varchar(30) ||
  Password varchar(20) ||

### Table Subject
  || Code  varchar(6) ||
  Name  varchar(30) ||
  Sem   int(11) || 

### Table ClassInCharge
  || Sem   int(11) ||
  Sec   char(1) ||
  TID   int(11) ||
  
### Table Assign
  || TID     int(11) ||
  Subject varchar(6) ||
  Sec     char(1) ||

### Table "SubjectCode" - for every subject
  || Regno int(12)
  UT1   float ||
  UT2   float ||
  UT3   float ||
  IM    int(11) ||
  

#### -> All the php, js, html files are stored in Code.
#### -> All the images that have been used are in the base directory.
#### -> The SS folder contains sample screenshots.
