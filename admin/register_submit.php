<?php
require_once("inc/connection.inc.php");
require_once("inc/functions.inc.php");
if (isset($_POST['submit'])) {
    $name = name_format($_POST['name']);
    $email = email_format($_POST['email']);
    $password = get_safe_value($_POST['password']);
    $confirm_password = get_safe_value($_POST['confirm_password']);
    $error_flag = 0;

    if (!$name) {
        $error_flag = 1;
        $_SESSION['name_error'] = "Please enter your name";
    } else {
        $_SESSION['old_name'] =  $name;
    }

    if (!$email) {
        $error_flag = 1;
        $_SESSION['email_error'] = "Please enter your email";
    } else {
        $cheak = mysqli_num_rows(mysqli_query(db_connect(), "SELECT email FROM admin_user WHERE email='$email'"));
        if ($cheak > 0) {
            $error_flag = 1;
            $_SESSION['email_error'] = "Email already exist..";
        } else {
            $_SESSION['old_email'] =  $email;
        }
    }

    if (!$password) {
        $error_flag = 1;
        $_SESSION['password_error'] = "Please enter a password";
    }

    if (!$confirm_password) {
        $error_flag = 1;
        $_SESSION['confirm_password_error'] = "Please Re-type your password";
    } else {
        if ($password != $confirm_password) {
            $error_flag = 1;
            $_SESSION['confirm_password_error'] = "Password and confirm password are not matched";
        } else {
            $password = password_format($_POST['password']);
        }
    }

    if (!isset($_POST['gender'])) {
        $error_flag = 1;
        $_SESSION['gender_error'] = "Please enter your gender";
    } else {
        $_SESSION['old_gender'] =  $_POST['gender'];
    }


    if ($error_flag == 1) {
        header("location: register.php");
    } else {

        $gender = get_safe_value($_POST['gender']);
        $create_at = date("Y-m-d H:i:s");
        $column_name = "name,email,password,gender,create_at";
        $values = "'$name','$email','$password','$gender','$create_at'";
        $sql = insert_query("admin_user", $column_name, $values);
        if ($sql) {
            $_SESSION['success'] = "Registration Successful";
            header('location: user_list.php');
        } else {
            $_SESSION['reg_error'] = "Faild to Register";
            header("location: register.php");
        }
    }
}


if (isset($_GET['id']) && $_GET['task']) {
    $id = $_GET["id"];
    $task = $_GET["task"];

    if ($task == "delete") {
        $delete = delete_row("admin_user", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: user_list.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("admin_user", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: user_list.php');
        }
    }
}
