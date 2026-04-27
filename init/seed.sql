USE myapp;

INSERT INTO users (username, email, password_hash, role) VALUES 
('admin', 'admin@agora.ai', 'admin', 'admin'),
('student1', 'student1@example.com', 'password', 'student');

INSERT INTO profiles (user_id, first_name, last_name, bio) VALUES 
(1, 'System', 'Admin', 'Platform Administrator'),
(2, 'Jane', 'Smith', 'Computer Science Student');

INSERT INTO chat_sessions (user_id, title) VALUES 
(2, 'Calculus Exam Prep'),
(2, 'Machine Learning Basics');

INSERT INTO chat_messages (session_id, sender_type, content, reasoning_steps) VALUES 
(1, 'user', 'Can you explain the chain rule?', 0),
(1, 'ai', 'The chain rule is a formula to compute the derivative of a composite function. If y = f(g(x)), then dy/dx = f\'(g(x)) * g\'(x).', 2),
(2, 'user', 'What is gradient descent?', 0),
(2, 'ai', 'Gradient descent is an optimization algorithm used to minimize some function by iteratively moving in the direction of steepest descent.', 3);

INSERT INTO calendar_events (user_id, title, description, start_time, end_time, event_type) VALUES 
(2, 'Calculus Final Exam', 'Comprehensive exam on limits and derivatives', '2026-05-15 09:00:00', '2026-05-15 12:00:00', 'exam'),
(2, 'Study Group', 'Review session for Machine Learning', '2026-05-10 14:00:00', '2026-05-10 16:00:00', 'study');

INSERT INTO documents (user_id, filename, filepath, file_type, file_size) VALUES 
(2, 'calculus_notes.pdf', '/uploads/2/calculus_notes.pdf', 'application/pdf', 1048576),
(2, 'ml_slides.pptx', '/uploads/2/ml_slides.pptx', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', 2048000);

INSERT INTO focus_sessions (user_id, duration_minutes, efficiency_score, session_date) VALUES 
(2, 60, 85, '2026-04-20'),
(2, 45, 90, '2026-04-22');

INSERT INTO notes (user_id, title, content) VALUES 
(2, 'Linear Algebra Summary', 'Eigenvalues and Eigenvectors are important for understanding transformations.'),
(2, 'Biology Terms', 'Mitochondria is the powerhouse of the cell.');

INSERT INTO subscriptions (user_id, plan_name, status, next_billing_date) VALUES 
(2, 'Pro', 'active', '2026-05-20');

INSERT INTO invoices (user_id, invoice_number, amount, status, issue_date) VALUES 
(2, 'inv-001', 9.99, 'paid', '2026-04-20');
