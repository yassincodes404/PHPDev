<?php
require_once 'bootstrap.php';
session_destroy();
redirect_to('login.php');
?>
