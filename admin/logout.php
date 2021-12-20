<?php
session_start();
require_once "inc/connection.inc.php";
if (!isset($_SESSION["ADMIN_LOGIN"])) {
    header('location: login.php');
}
session_unset();
header('location: login.php');
