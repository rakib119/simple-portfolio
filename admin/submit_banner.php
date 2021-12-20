<?php
require_once "inc/functions.inc.php";
require_once "inc/connection.inc.php";

if (isset($_POST['submit_banner'])) {

    $flag = 0;
    // photo
    if ($_FILES['banner_photo']['error'] > 0) {
        $_SESSION['banner_photo_error'] = "Please correct image";
        $flag = 1;
    }

    // intro
    if (!$_POST['intro']) {
        $_SESSION['intro_error'] = "Please enter intro";
        $flag = 1;
    } else {
        $intro = get_safe_value($_POST['intro']);
        $_SESSION['old_intro'] = $intro;
    }
    // message
    if (!$_POST['message']) {
        $_SESSION['message_error'] = "Please enter message";
        $flag = 1;
    } else {
        $message = get_safe_value($_POST['message']);
        $_SESSION['old_message'] = $message;
    }

    if ($flag == 0) {
        //file uploading
        $file_name = $_FILES['banner_photo']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_path =  $_FILES['banner_photo']['tmp_name'];
        $new_path = "../img/banner/" . $new_file_name;
        move_uploaded_file($temp_path, $new_path);

        unset($_SESSION['old_intro']);
        unset($_SESSION['old_message']);
        $column_name = "intro,message,banner_photo";
        $values = "'$intro','$message','$new_file_name'";
        $insert = insert_query("banner", $column_name, $values);
        if ($insert) {
            $_SESSION['success'] = "banner added successfully";
            header('location: banner.php');
        }
    } else {
        header('location: manage_banner.php');
    }
}
if (isset($_POST['edit_banner'])) {

    $id = $_SESSION['edit_banner_id'];
    unset($_SESSION['edit_banner_id']);
    $flag = 0;
    // intro
    if (!$_POST['intro']) {
        $_SESSION['intro_error'] = "Please enter intro";
        $flag = 1;
    }
    // banner details
    if (!$_POST['message']) {
        $_SESSION['message_error'] = "Please enter message";
        $flag = 1;
    }
    if ($flag == 0) {

        if ($_FILES['banner_photo']['name']) {
            $temp_path =  $_FILES['banner_photo']['tmp_name'];
            update_file("banner", $id, "img/banner", $temp_path, "banner_photo");
        }

        $intro = get_safe_value($_POST['intro']);
        $message = get_safe_value($_POST['message']);
        $values = "intro = '$intro',message = '$message'";
        $update = update_data("banner", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: banner.php');
        } else {
            header("location: manage_banner.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_banner.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];

    //delete specifique row
    if ($task == "delete") {
        $banner = mysqli_fetch_assoc(select_all("banner", "WHERE id='$id'"));
        $file_name = $banner['banner_photo'];
        $delete = delete_row("banner", "id='$id'", $file_name, "banner");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: banner.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("banner", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: banner.php');
        }
    }
}
