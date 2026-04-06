USE myapp;

INSERT INTO users (username, email, password_hash, role) VALUES 
('student1', 'student1@example.com', 'password', 'student'),
('teacher1', 'teacher1@example.com', 'password', 'teacher'),
('admin1', 'admin@example.com', 'password', 'admin');

INSERT INTO profiles (user_id, first_name, last_name, major, phone, gender) VALUES 
(1, 'John', 'Doe', 'Computer Science', '123-456-7890', 'Male'),
(2, 'Jane', 'Smith', 'Information Technology', '098-765-4321', 'Female');

INSERT INTO admin_profiles (user_id, admin_level, department) VALUES 
(3, 'SuperAdmin', 'Registrar Office');

INSERT INTO courses (course_code, course_name, credits) VALUES 
('CS101', 'Introduction to Computer Science', 3),
('IT201', 'Web Development', 4);

INSERT INTO enrollments (user_id, course_id, semester) VALUES 
(1, 1, 'Fall 2026'),
(1, 2, 'Fall 2026');

INSERT INTO attendance (user_id, course_id, session_date, status) VALUES 
(1, 1, '2026-04-01', 'present'),
(1, 1, '2026-04-03', 'absent');

INSERT INTO grades (user_id, course_id, grade_value) VALUES 
(1, 1, 95.50),
(1, 2, 82.00);
