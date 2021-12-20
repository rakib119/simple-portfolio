<?php
require_once "inc/functions.inc.php";
require_once "inc/connection.inc.php";

if (isset($_POST['submit_partners'])) {
    
    $flag = 0;
    // photo
    if ($_FILES['partner_image']['error'] > 0) {
        $_SESSION['partner_image_error'] = "Please correct image";
        $flag = 1;
    }

    // partner_name
    if (!$_POST['partner_name']) {
        $_SESSION['partner_name_error'] = "Please enter partner_name";
        $flag = 1;
    } else {
        $partner_name = get_safe_value($_POST['partner_name']);
        $_SESSION['old_partner_name'] = $partner_name;
    }
    if ($flag == 0) {
        //file uploading
        $file_name = $_FILES['partner_image']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_path =  $_FILES['partner_image']['tmp_name'];
        $new_path = "../img/partners/" . $new_file_name;
        move_uploaded_file($temp_path, $new_path);

        unset($_SESSION['old_partner_name']);
        $column_name = "partner_name,partner_image";
        $values = "'$partner_name','$new_file_name'";
        $insert = insert_query("partners", $column_name, $values);
        if ($insert) {
            $_SESSION['success'] = "partners added successfully";
            header('location: partners.php');
        }
    } else {
        header('location: manage_partners.php');
    }
}
if (isset($_POST['edit_partners'])) {
    pr($_POST);
    die();
    $id = $_SESSION['edit_partners_id'];
    unset($_SESSION['edit_partners_id']);
    $flag = 0;
    // partner_name
    if (!$_POST['partner_name']) {
        $_SESSION['partner_name_error'] = "Please enter partner_name";
        $flag = 1;
    }

    if ($flag == 0) {

        $partner_name = get_safe_value($_POST['partner_name']);
        $message = get_safe_value($_POST['message']);
        //file uploading
        $file_name = $_FILES['partner_image']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_path =  $_FILES['partner_image']['tmp_name'];
        $new_path = "../img/partners/" . $new_file_name;
        move_uploaded_file($temp_path, $new_path);

        $values = "partner_name = '$partner_name',partner_image = '$new_file_name'";
        $update = update_data("partners", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: partners.php');
        } else {
            header("location: manage_partners.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_partners.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    $partners = mysqli_fetch_assoc(select_all("partners", "WHERE id='$id'"));
    $file_name = $partners['partner_image'];
    //delete specifique row
    if ($task == "delete") {
        $delete = delete_row("partners", "id='$id'", $file_name, "partners");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: partners.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("partners", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: partners.php');
        }
    }
}
