<?php
require_once "inc/functions.inc.php";
require_once "inc/connection.inc.php";

if (isset($_POST['submit_experiance'])) {

    $flag = 0;
    // compant name
    if (!$_POST['company_name']) {
        $_SESSION['company_name_error'] = "Please enter company name";
        $flag = 1;
    } else {
        $company_name = get_safe_value($_POST['company_name']);
        $_SESSION['old_company_name'] = $company_name;
    }
    // designation
    if (!$_POST['designation']) {
        $_SESSION['designation_error'] = "Please enter designation";
        $flag = 1;
    } else {
        $designation = get_safe_value($_POST['designation']);
        $_SESSION['old_designation'] = $designation;
    }
    // duration
    if (!$_POST['duration']) {
        $_SESSION['duration_error'] = "Please enter duration";
        $flag = 1;
    } else {
        $duration = get_safe_value($_POST['duration']);
        $_SESSION['old_duration'] = $duration;
    }
    // description
    if (!$_POST['description']) {
        $_SESSION['description_error'] = "Please enter Drcription";
        $flag = 1;
    } else {
        $description = get_safe_value($_POST['description']);
        $_SESSION['old_description'] = $description;
    }
    if ($flag == 0) {
        unset($_SESSION['old_company_name']);
        unset($_SESSION['old_designation']);
        unset($_SESSION['old_description']);
        unset($_SESSION['old_duration']);

        if (isset($_POST['submit_experiance'])) {
            $column_name = "company_name,designation,duration,description";
            $values = "'$company_name','$designation','$duration','$description'";
            if (insert_query("experiance", $column_name, $values)) {
                $_SESSION['success'] = "Experiance added successfully";
                header('location: experiance.php');
            }
        }
    } else {
        header('location: manage_experiance.php');
    }
}
if (isset($_POST['edit_experiance'])) {

    $id = $_SESSION['edit_experiance_id'];
    unset($_SESSION['edit_experiance_id']);
    $flag = 0;
    // compant name
    if (!$_POST['company_name']) {
        $_SESSION['company_name_error'] = "Please enter company name";
        $flag = 1;
    }
    // designation
    if (!$_POST['designation']) {
        $_SESSION['designation_error'] = "Please enter designation";
        $flag = 1;
    }
    // duration
    if (!$_POST['duration']) {
        $_SESSION['duration_error'] = "Please enter duration";
        $flag = 1;
    }
    // description
    if (!$_POST['description']) {
        $_SESSION['description_error'] = "Please enter Drcription";
        $flag = 1;
    }
    if ($flag == 0) {

        $company_name = get_safe_value($_POST['company_name']);
        $designation = get_safe_value($_POST['designation']);
        $duration = get_safe_value($_POST['duration']);
        $description = get_safe_value($_POST['description']);
        $values = "company_name = '$company_name',designation = '$designation',duration = '$duration',description = '$description'";
        $update = update_data("experiance", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: experiance.php');
        } else {
            header("location: manage_experiance.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_experiance.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];

    //delete specifique row
    if ($task == "delete") {
        $delete = delete_row("experiance", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: experiance.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("experiance", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: experiance.php');
        }
    }
}
