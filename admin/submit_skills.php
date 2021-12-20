<?php
require_once "inc/functions.inc.php";

if (isset($_POST['submit_skills'])) {

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
    if (!$_POST['parcentage']) {
        $_SESSION['parcentage_error'] = "Please enter a ion icon code";
        $flag = 1;
    } else {
        $parcentage = get_safe_value($_POST['parcentage']);
        $_SESSION['old_parcentage'] = $parcentage;
    }
    if ($flag == 0) {
        unset($_SESSION['old_skill_name']);
        unset($_SESSION['old_parcentage']);
        $column_name = "skill_name,parcentage";
        $values = "'$skill_name','$parcentage'";
        if (insert_query("skills", $column_name, $values)) {
            $_SESSION['success'] = "Skills Added Successfully";
            header('location: skills.php');
        }
    } else {
        header('location: manage_skills.php');
    }
}

if (isset($_POST['edit_skills'])) {
    $id = $_SESSION['edit_skill_id'];
    unset($_SESSION['edit_skill_id']);
    $flag = 0;
    //  name
    // skill name
    if (!$_POST['skill_name']) {
        $_SESSION['skill_name_error'] = "Please enter skill name";
        $flag = 1;
    }
    // parcentage
    if (!$_POST['parcentage']) {
        $_SESSION['parcentage_error'] = "Please enter a ion icon code";
        $flag = 1;
    }
    if ($flag == 0) {

        $skill_name = get_safe_value($_POST['skill_name']);
        $parcentage = get_safe_value($_POST['parcentage']);
        $value = "skill_name='$skill_name',parcentage='$parcentage'";
        $condition = "id='$id'";
        $update = update_data("skills", "$value", "$condition");
        if ($update) {
            $_SESSION['success'] = "Skill successfully updated";
            header('location: skills.php');
        } else {
            header("location: manage_skills.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_skills.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //Delete row
    if ($task == "delete") {
        $delete = delete_row("skills", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: skills.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("skills", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: skills.php');
        }
    }
}
