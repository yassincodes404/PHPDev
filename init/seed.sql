USE myapp;

INSERT INTO users (username, email, password_hash, role) VALUES 
('admin', 'admin@agora.ai', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 'admin'),
('student1', 'student1@example.com', '5e884898da28047151d0e56f8dc6292773603d0d6aabbdd62a11ef721d1542d8', 'student');

INSERT INTO profiles (user_id, first_name, last_name, major, phone, gender, bio) VALUES 
(1, 'System', 'Admin', 'Admin', '000-000-0000', 'Other', 'Platform Administrator'),
(2, 'Jane', 'Smith', 'Computer Science', '123-456-7890', 'Female', 'Computer Science Student');

INSERT INTO chat_sessions (user_id, title) VALUES 
(2, 'Calculus Exam Prep'),
(2, 'Machine Learning Basics');

INSERT INTO chat_messages (session_id, sender_type, content, reasoning_steps) VALUES 
(1, 'user', 'Can you explain the chain rule?', 0),
(1, 'ai', 'The chain rule is a formula to compute the derivative of a composite function. If y = f(g(x)), then dy/dx = f\'(g(x)) * g\'(x).', 2),
(2, 'user', 'What is gradient descent?', 0),
(2, 'ai', 'Gradient descent is an optimization algorithm used to minimize some function by iteratively moving in the direction of steepest descent.', 3);

INSERT INTO notes (user_id, title, content) VALUES 
(2, 'Linear Algebra Summary', 'Eigenvalues and Eigenvectors are important for understanding transformations.'),
(2, 'Biology Terms', 'Mitochondria is the powerhouse of the cell.');

INSERT INTO flashcard_decks (user_id, title, description) VALUES 
(2, 'Math Fundamentals', 'Basic concepts of Calculus and Linear Algebra');

INSERT INTO flashcards (deck_id, front_content, back_content) VALUES 
(1, 'What is the derivative of x^2?', '2x'),
(1, 'What is 1 + 1?', '2');
