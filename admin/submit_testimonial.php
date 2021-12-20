<?php
require_once "inc/functions.inc.php";

if (isset($_POST['submit_testimonial'])) {

    $flag = 0;
    //  name
    if (!$_POST['name']) {
        $_SESSION['name_error'] = "Please enter skill name";
        $flag = 1;
    } else {
        $name = get_safe_value($_POST['name']);
        $_SESSION['old_name'] = $name;
    }
    // designation
    if (!$_POST['designation']) {
        $_SESSION['designation_error'] = "Please enter designation";
        $flag = 1;
    } else {
        $designation = get_safe_value($_POST['designation']);
        $_SESSION['old_designation'] = $designation;
    }
    // comment
    if (!$_POST['comment']) {
        $_SESSION['comment_error'] = "Please enter your comment";
        $flag = 1;
    } else {
        $comment = get_safe_value($_POST['comment']);
    }
    if ($flag == 0) {
        unset($_SESSION['old_name']);
        unset($_SESSION['old_designation']);
        $column_name = "name,designation,comment";
        $values = "'$name','$designation','$comment'";
        if (insert_query("testimonial", $column_name, $values)) {
            $_SESSION['success'] = "Testimonial Added Successfully";
            header('location: testimonial.php');
        }
    } else {
        header('location: manage_testimonial.php');
    }
}
if (isset($_POST['edit_testimonial'])) {
    $id = $_SESSION['edit_testimonial_id'];
    unset($_SESSION['edit_testimonial_id']);
    $flag = 0;
    //  name
    if (!$_POST['name']) {
        $_SESSION['name_error'] = "Please enter skill name";
        $flag = 1;
    } else {
        $name = get_safe_value($_POST['name']);
    }
    // designation
    if (!$_POST['designation']) {
        $_SESSION['designation_error'] = "Please enter designation";
        $flag = 1;
    } else {
        $designation = get_safe_value($_POST['designation']);
    }
    // comment
    if (!$_POST['comment']) {
        $_SESSION['comment_error'] = "Please enter your comment";
        $flag = 1;
    } else {
        $comment = get_safe_value($_POST['comment']);
    }
    if ($flag == 0) {

        $name = get_safe_value($_POST['name']);
        $designation = get_safe_value($_POST['designation']);
        $comment = get_safe_value($_POST['comment']);
        $value = "name='$name',designation='$designation',comment='$comment'";
        $condition = "id='$id'";
        $update = update_data("testimonial", "$value", "$condition");
        if ($update) {
            $_SESSION['success'] = "Testimonial  successfully updated";
            header('location: testimonial.php');
        } else {
            header("location: manage_testimonial.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_testimonial.php?id=$id&&task=edit");
    }
}




if (isset($_GET['id']) && $_GET['task']) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //Delete row
    if ($task == "delete") {
        $delete = delete_row("testimonial", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: testimonial.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("testimonial", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: testimonial.php');
        }
    }
}
