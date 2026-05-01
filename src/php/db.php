<?php
$host = 'db';
$user = 'user';
$pass = 'password';
$dbname = 'myapp';
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}