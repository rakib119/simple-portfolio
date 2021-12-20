<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_skill_details'])) {

    $flag = 0;
    // skill name
    if (!$_POST['skill_name']) {
        $_SESSION['skill_name_error'] = "Please enter skill name";
        $flag = 1;
    } else {
        $skill_name = get_safe_value($_POST['skill_name']);
        $_SESSION['old_skill_name'] = $skill_name;
    }
    // parcentage
    if (!$_POST['icon']) {
        $_SESSION['icon_error'] = "Please enter a ion icon code";
        $flag = 1;
    } else {
        $icon = get_safe_value($_POST['icon']);
        $_SESSION['old_icon'] = $parcentage;
    }
    // Skill decription
    if (!$_POST['skill_description']) {
        $_SESSION['skill_description_error'] = "Please enter descriptions";
        $flag = 1;
    } else {
        $skill_description = get_safe_value($_POST['skill_description']);
    }
    if ($flag == 0) {
        unset($_SESSION['old_skill_name']);
        unset($_SESSION['old_icon']);
        $column_name = "skill_name,icon,skill_description";
        $values = "'$skill_name','$icon','$skill_description'";
        if (insert_query("skill_details", $column_name, $values)) {
            $_SESSION['success'] = "Skills Added Successfully";
            header('location: skill_details.php');
        }
    } else {
        header('location: manage_skill_details.php');
    }
}
if (isset($_POST['edit_skill_details'])) {

    $id = $_SESSION['edit_skill_details_id'];
    unset($_SESSION['edit_skill_details_id']);
    $flag = 0;
    if (!$_POST['skill_name']) {
        $_SESSION['skill_name_error'] = "Please enter skill name";
        $flag = 1;
    }
    // parcentage
    if (!$_POST['icon']) {
        $_SESSION['icon_error'] = "Please enter a ion icon code";
        $flag = 1;
    }
    // Skill decription
    if (!$_POST['skill_description']) {
        $_SESSION['skill_description_error'] = "Please enter descriptions";
        $flag = 1;
    }
    if ($flag == 0) {

        $skill_name = get_safe_value($_POST['skill_name']);
        $icon = get_safe_value($_POST['icon']);
        $skill_description = get_safe_value($_POST['skill_description']);
        $values = "skill_name = '$skill_name',icon = '$icon',skill_description = '$skill_description'";
        $update = update_data("skill_details", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: skill_details.php');
        } else {
            header("location: manage_skill_details.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_skill_details.php?id=$id&&task=edit");
    }
}
if (isset($_GET['id']) && $_GET['task']) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete row
    if ($task == "delete") {
        $delete = delete_row("skill_details", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: skill_details.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("skill_details", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: skill_details.php');
        }
    }
}
