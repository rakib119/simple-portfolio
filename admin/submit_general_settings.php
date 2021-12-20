<?php
require_once "inc/functions.inc.php";

if (isset($_POST['submit_general_settings'])) {
    // echo "wrong place";
    // die();
    $flag = 0;
    // Files
    if (isset($_FILES)) {
        // photo
        if ($_FILES['cv']['name'] == "") {
            $_SESSION['cv_error'] = "Please select your cv";
            $flag = 1;
        } else {
            $file_name = $_FILES['cv']['name'];
            $extension = extension($file_name);
            if ($extension != "pdf") {
                $_SESSION['cv_error'] = "Please upload pdf formate";
                $flag = 1;
            }
        }
        if ($flag == 0) {
            $temp_path = $_FILES['cv']['tmp_name'];
            $path = "../cv/$file_name";
            move_uploaded_file($temp_path, $path);
            $value = "value='$file_name'";
            $condition = "field_name='cv'";
            if (update_data("general_settings", $value, $condition)) {
                $_SESSION['success'] = "CV Successfully Uploaded";
                header('location: general_settings.php');
            }
        } else {
            header("location: manage_general_settings.php?field='cv'");
        }
    } else {
        //  field_name
        if (!$_POST['field_name']) {
            $_SESSION['field_name_error'] = "Please enter field_name";
            $flag = 1;
        } else {
            $field_name = get_safe_value($_POST['field_name']);
            $_SESSION['old_field_name'] = $field_name;
        }
        // value
        if (!$_POST['value']) {
            $_SESSION['value_error'] = "Please enter value";
            $flag = 1;
        } else {
            $value = get_safe_value($_POST['value']);
            $_SESSION['old_value'] = $value;
        }

        if ($flag == 0) {
            unset($_SESSION['old_field_name']);
            unset($_SESSION['old_value']);
            $column_field_name = "field_name,value";
            $values = "'$field_name','$value'";
            if (insert_query("general_settings", $column_field_name, $values)) {
                $_SESSION['success'] = "General settings Added Successfully";
                header('location: general_settings.php');
            }
        } else {
            header('location: manage_general_settings.php');
        }
    }
}
if (isset($_POST['edit_general_settings'])) {

    $id = $_SESSION['edit_general_settings_id'];
    unset($_SESSION['edit_general_settings_id']);
    $flag = 0;

    if (isset($_FILES['cv']['name'])) {
        // file
        if ($_FILES['cv']['name'] == "") {
            $_SESSION['cv_error'] = "Please upload your cv";
            $flag = 1;
        } else {
            $file_name = $_FILES['cv']['name'];
            $extension = extension($file_name);
            if ($extension == "pdf") {
                echo "ok";
            } else {
                $_SESSION['cv_error'] = "Please upload pdf formate";
                $flag = 1;
            }
        }
        if ($flag == 0) {
            $temp_path = $_FILES['cv']['tmp_name'];
            $upload = update_file("general_settings", $id, "cv", $temp_path, "value");

            if ($upload) {
                $_SESSION['success'] = "CV updated Successfully";
                header("location: general_settings.php");
                exit;
            } else {
                header("location: manage_general_settings.php?field='cv'");
            }
        }
    }
    // value
    if (!$_POST['value']) {
        $_SESSION['value_error'] = "Please enter value";
        $flag = 1;
    } else {
        $value = get_safe_value($_POST['value']);
    }
    if ($flag == 0) {
        $value = get_safe_value($_POST['value']);
        $value = "value='$value'";
        $condition = "id='$id'";
        $update = update_data("general_settings", "$value", "$condition");
        if ($update) {
            $_SESSION['success'] = "General settings  successfully updated";
            header('location: general_settings.php');
        } else {
            header("location: manage_general_settings.php?id=$id&task=edit");
        }
    } else {
        header("location: manage_general_settings.php?id=$id&task=edit");
    }
}




if (isset($_GET['id']) && $_GET['task']) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //Delete row
    if ($task == "delete") {
        $delete = delete_row("general_settings", "id='$id'");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: general_settings.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("general_settings", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: general_settings.php');
        }
    }
}
