<?php
require_once("inc/functions.inc.php");
$flag = 0;

if (!$_POST['email']) {
    $flag = 1;
    $_SESSION['email_error'] = "Please enter your email";
}
if (!$_POST['password']) {
    $flag = 1;
    $_SESSION['password_error'] = "Please enter your Password";
}

if ($flag != 1) {
    $email = email_format($_POST['email']);
    $password = password_format($_POST['password']);
    $sql = mysqli_query(db_conn(), "SELECT * FROM admin_user WHERE email='$email' AND password='$password'");
    $row = mysqli_num_rows($sql);
    if ($row == 1) {
        $login_info = mysqli_fetch_assoc($sql);

        $_SESSION["ADMIN_LOGIN"] = 'YES';
        $_SESSION["ADMIN_ID"] = $login_info['id'];
        $_SESSION["ADMIN_NAME"] = $login_info['name'];
        $_SESSION['success'] = "login successfull";
        header('location: index.php');
    } else {
        $_SESSION['login_error'] = "Please enter correct login details";
        header('location: login.php');
    }
} else {
    header('location: login.php');
}
