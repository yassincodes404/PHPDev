CREATE DATABASE IF NOT EXISTS myapp;
USE myapp;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    password_hash VARCHAR(255) NOT NULL,
    role ENUM('student', 'teacher', 'admin') DEFAULT 'student',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    major VARCHAR(100),
    phone VARCHAR(20),
    gender ENUM('Male', 'Female'),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE admin_profiles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    admin_level VARCHAR(50),
    department VARCHAR(100),
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE courses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    course_code VARCHAR(20) NOT NULL UNIQUE,
    course_name VARCHAR(100) NOT NULL,
    credits INT NOT NULL
);

CREATE TABLE enrollments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    semester VARCHAR(20) NOT NULL,
    enrolled_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE attendance (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    session_date DATE NOT NULL,
    status ENUM('present', 'absent', 'late', 'excused') DEFAULT 'present',
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

CREATE TABLE grades (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    course_id INT NOT NULL,
    grade_value DECIMAL(5,2) NOT NULL,
    grade_letter VARCHAR(2),
    awarded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (course_id) REFERENCES courses(id) ON DELETE CASCADE
);

DELIMITER //

CREATE TRIGGER hash_password_before_insert
BEFORE INSERT ON users
FOR EACH ROW
BEGIN
    SET NEW.password_hash = SHA2(NEW.password_hash, 256);
END //

CREATE TRIGGER assign_grade_letter_before_insert
BEFORE INSERT ON grades
FOR EACH ROW
BEGIN
    IF NEW.grade_value >= 90 THEN SET NEW.grade_letter = 'A';
    ELSEIF NEW.grade_value >= 80 THEN SET NEW.grade_letter = 'B';
    ELSEIF NEW.grade_value >= 70 THEN SET NEW.grade_letter = 'C';
    ELSEIF NEW.grade_value >= 60 THEN SET NEW.grade_letter = 'D';
    ELSE SET NEW.grade_letter = 'F';
    END IF;
END //

CREATE TRIGGER assign_grade_letter_before_update
BEFORE UPDATE ON grades
FOR EACH ROW
BEGIN
    IF NEW.grade_value >= 90 THEN SET NEW.grade_letter = 'A';
    ELSEIF NEW.grade_value >= 80 THEN SET NEW.grade_letter = 'B';
    ELSEIF NEW.grade_value >= 70 THEN SET NEW.grade_letter = 'C';
    ELSEIF NEW.grade_value >= 60 THEN SET NEW.grade_letter = 'D';
    ELSE SET NEW.grade_letter = 'F';
    END IF;
END //

CREATE PROCEDURE EnrollStudentInCourse(IN p_user_id INT, IN p_course_code VARCHAR(20), IN p_semester VARCHAR(20))
BEGIN
    DECLARE v_course_id INT;
    SELECT id INTO v_course_id FROM courses WHERE course_code = p_course_code;
    
    IF v_course_id IS NOT NULL THEN
        INSERT INTO enrollments (user_id, course_id, semester) VALUES (p_user_id, v_course_id, p_semester);
    END IF;
END //

CREATE PROCEDURE GetStudentGPA(IN p_user_id INT)
BEGIN
    SELECT AVG(grade_value) AS gpa FROM grades WHERE user_id = p_user_id;
END //

DELIMITER ;
