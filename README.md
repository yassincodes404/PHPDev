# Student Management System

A secure PHP web application for student authentication and profile management, built with a Dockerized Apache/MySQL stack. Features user registration, login, and profile viewing with session-based authentication.

## 🚀 Features

- **User Authentication**: Secure login and registration system with password hashing
- **Student Profiles**: View student information including name, username, and major
- **Session Management**: Secure session handling with automatic logout
- **Dockerized**: Ready-to-go environment with PHP 8.3 and MySQL 8.0
- **Database Auto-Setup**: Automatic table creation on first run

## 🛠️ Tech Stack

- **Backend**: PHP 8.3 (Apache)
- **Database**: MySQL 8.0
- **Frontend**: HTML5 with basic CSS styling
- **Security**: Password hashing with bcrypt, prepared statements

## 🏁 Getting Started

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed on your machine.

### Installation & Launch

1.  **Navigate to the project folder**:
    ```bash
    cd PHPDev
    ```

2.  **Spin up the containers**:
    ```bash
    docker compose up --build -d
    ```

3.  **Access the application**:
    Open your browser and navigate to [http://localhost:8080](http://localhost:8080).

4.  **Database Management** (Optional):
    You can also access **phpMyAdmin** at [http://localhost:8081](http://localhost:8081) for direct database control.

## 📁 Project Structure

- `src/index.php`: Login page and authentication logic
- `src/register.php`: User registration form
- `src/profile.php`: Student profile display
- `src/logout.php`: Session destruction and logout
- `src/db.php`: Database connection and table initialization
- `Dockerfile`: Custom PHP image with MySQL extensions
- `docker-compose.yml`: Multi-service container orchestration

## 📝 Database Schema

The application automatically creates a `students` table in the `myapp` database:

```sql
CREATE TABLE students (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    name VARCHAR(100) NOT NULL,
    major VARCHAR(100) NOT NULL
);
```
