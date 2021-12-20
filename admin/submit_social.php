<?php
require_once "inc/functions.inc.php";
require_once "inc/connection.inc.php";

if (isset($_POST['submit_social'])) {
    $flag = 0;

    // icon
    if (!$_POST['icon']) {
        $_SESSION['icon_error'] = "Please enter icon";
        $flag = 1;
    } else {
        $icon = get_safe_value($_POST['icon']);
        $_SESSION['old_icon'] = $icon;
    }
    // profile_link
    if (!$_POST['profile_link']) {
        $_SESSION['profile_link_error'] = "Please enter profile_link";
        $flag = 1;
    } else {
        $profile_link = get_safe_value($_POST['profile_link']);
        $_SESSION['old_profile_link'] = $profile_link;
    }

    if ($flag == 0) {

        unset($_SESSION['old_icon']);
        unset($_SESSION['old_profile_link']);

        $column_name = "icon,profile_link";
        $values = "'$icon','$profile_link'";
        $insert = insert_query("social", $column_name, $values);
        if ($insert) {
            $_SESSION['success'] = "social added successfully";
            header('location: social.php');
        }
    } else {
        header('location: manage_social.php');
    }
}
if (isset($_POST['edit_social'])) {

    $id = $_SESSION['edit_social_id'];
    unset($_SESSION['edit_social_id']);
    $flag = 0;
    // icon
    if (!$_POST['icon']) {
        $_SESSION['icon_error'] = "Please enter icon";
        $flag = 1;
    }
    // profile_link
    if (!$_POST['profile_link']) {
        $_SESSION['profile_link_error'] = "Please enter profile_link";
        $flag = 1;
    }

    if ($flag == 0) {

        $icon = get_safe_value($_POST['icon']);
        $profile_link = get_safe_value($_POST['profile_link']);

        $values = "icon = '$icon',profile_link = '$profile_link'";
        $update = update_data("social", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: social.php');
        } else {
            header("location: manage_social.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_social.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];

    //delete specifique row
    if ($task == "delete") {
        $delete = delete_row("social", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: social.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("social", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: social.php');
        }
    }
}
