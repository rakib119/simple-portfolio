<?php
require_once "admin/inc/functions.inc.php";
if (isset($_POST['submit'])) {
    $name = name_format($_POST['name']);
    $email = email_format($_POST['email']);
    $message = get_safe_value($_POST['message']);
    if ($name = "" || $email = "" || $message = "") {
        $_SESSION['error'] = "All field are required to send the message";
        header('location: index.php');
    } else {
        $column_name = "name,email,message";
        $values = "'$name','$email','$message'";
        $insert = insert_query("contact_us", $column_name, $values);
        if ($insert) {
            $_SESSION['success'] = "Message send Successfully";
            header('location: index.php');
        }
    }
}
if (isset($_POST['subscribe'])) {

    pr($_POST);
    if (!$_POST['email']) {
        $_SESSION['error'] = "Enter your email";
        header('location: index.php');
    } else {
        echo  $email = email_format($_POST['email']);
        $column_name = "email";
        $values = "'$email'";
        $insert = insert_query("subscriber", $column_name, $values);
        if ($insert) {
            $_SESSION['success'] = "Message send Successfully";
            header('location: index.php');
        }
    }
}
