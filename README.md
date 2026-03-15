# PHP Cloud - Modern Database Manager

A sleek, premium PHP application built with a Dockerized Apache/MySQL stack. This project features a glassmorphism UI, real-time database connectivity status, and a simple interface for managing user data.

## 🚀 Features

- **Modern UI**: Dark-themed glassmorphism design using the Inter font.
- **Micro-interactions**: Smooth transitions and hover effects.
- **Dockerized**: Ready-to-go environment with PHP 8.3 and MySQL 8.0.
- **PDO-based**: Secure database interactions using PHP Data Objects.

## 🛠️ Tech Stack

- **Backend**: PHP 8.3 (Apache)
- **Database**: MySQL 8.0
- **Frontend**: Vanilla CSS / Semantic HTML5

## 🏁 Getting Started

### Prerequisites

- [Docker Desktop](https://www.docker.com/products/docker-desktop/) installed on your machine.

### Installation & Launch

1.  **Clone the repository** (or navigate to the project folder):
    ```bash
    cd PHPDev
    ```

2.  **Spin up the containers**:
    ```bash
    docker compose up --build -d
    ```

3.  **Access the application**:
    Open your browser and navigate to [http://localhost:8080](http://localhost:8080).

4.  **Database Management**:
    You can also access **phpMyAdmin** at [http://localhost:8081](http://localhost:8081) for direct database control.

## 📁 Project Structure

- `src/index.php`: The main application logic and UI.
- `Dockerfile`: Custom PHP image with required MySQL extensions.
- `docker-compose.yml`: Services orchestration.
- `.gitignore`: Configured to keep your repository clean of logs and temporary data.

## 📝 Database Schema

The app expects a `USERS` table in the `myapp` database:

```sql
CREATE TABLE USERS (
    id INT PRIMARY KEY,
    name VARCHAR(50)
);
```
