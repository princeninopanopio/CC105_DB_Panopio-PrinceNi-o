CREATE DATABASE appointment_system;
USE appointment_system;

CREATE TABLE departments (
    department_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    description TEXT
);

CREATE TABLE faculty (
    faculty_id INT AUTO_INCREMENT PRIMARY KEY,
    department_id INT,
    full_name VARCHAR(100),
    email VARCHAR(100),
    phone VARCHAR(20),
    FOREIGN KEY (department_id) REFERENCES departments(department_id)
);

CREATE TABLE students (
    student_id INT AUTO_INCREMENT PRIMARY KEY,
    student_number VARCHAR(20),
    full_name VARCHAR(100),
    email VARCHAR(100),
    course VARCHAR(100)
);

CREATE TABLE schedules (
    schedule_id INT AUTO_INCREMENT PRIMARY KEY,
    faculty_id INT,
    available_date DATE,
    start_time TIME,
    end_time TIME,
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id)
);

CREATE TABLE appointments (
    appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    faculty_id INT,
    department_id INT,
    schedule_id INT,
    status VARCHAR(20) DEFAULT 'Pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (student_id) REFERENCES students(student_id),
    FOREIGN KEY (faculty_id) REFERENCES faculty(faculty_id),
    FOREIGN KEY (department_id) REFERENCES departments(department_id),
    FOREIGN KEY (schedule_id) REFERENCES schedules(schedule_id)
);

INSERT INTO departments VALUES (1,'Computer Science','CS Dept');
INSERT INTO faculty VALUES (1,1,'Dr. John Smith','john@school.edu','09123456789');
INSERT INTO students VALUES (1,'2023-001','Alice Cruz','alice@school.edu','BSCS');
