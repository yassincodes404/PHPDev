<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function redirect_to(string $path): void
{
    header("Location: $path");
    exit();
}

function require_auth(): void
{
    if (!isset($_SESSION['user_id'])) {
        redirect_to('login.php');
    }
}

function redirect_if_auth(string $path = 'dashboard.php'): void
{
    if (isset($_SESSION['user_id'])) {
        redirect_to($path);
    }
}

function page_start(): void
{
    include '../html/header.html';
}

function page_end(): void
{
    include '../html/footer.html';
}
