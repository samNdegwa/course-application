<?php
CREATE TABLE applicants(
	applicant_id int(30) NOT NULL,
	stud_id int(20) NOT NULL,
	course_id int(30) NOT NULL,
	date_applied varchar(100) NOT NULL,
	status int(1) NOT NULL,
	comment varchar(500),
	PRIMARY KEY (applicant_id), 
	FOREIGN KEY (stud_id) REFERENCES students (stud_id),
	FOREIGN KEY (course_id) REFERENCES courses (course_id)  

	);
?>