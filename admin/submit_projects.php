<?php
require_once "inc/functions.inc.php";
if (isset($_POST['submit_projects'])) {
    $flag = 0;
    // pr($_FILES);
    // die();
    // Project Name
    if (!$_POST['project_name']) {
        $_SESSION['project_name_error'] = "Please enter Project Name";
        $flag = 1;
    } else {
        $project_name = get_safe_value($_POST['project_name']);
        $_SESSION['old_project_name'] = $project_name;
    }
    // project_type
    if (!$_POST['project_type']) {
        $_SESSION['project_type_error'] = "Please enter project_type";
        $flag = 1;
    } else {
        $project_type = get_safe_value($_POST['project_type']);
        $_SESSION['old_project_type'] = $project_type;
    }
    // clients
    if (!$_POST['clients']) {
        $_SESSION['clients_error'] = "Please enter clients name";
        $flag = 1;
    } else {
        $clients = get_safe_value($_POST['clients']);
        $_SESSION['old_clients'] = $clients;
    }

    // authors
    if (!$_POST['authors']) {
        $_SESSION['authors_error'] = "Please enter authors name";
        $flag = 1;
    } else {
        $authors = get_safe_value($_POST['authors']);
        $_SESSION['old_authors'] = $authors;
    }
    // budget
    if (!$_POST['budget']) {
        $_SESSION['budget_error'] = "Please enter project budget";
        $flag = 1;
    } else {
        $budget = get_safe_value($_POST['budget']);
        $_SESSION['old_budget'] = $budget;
    }
    // starting_date
    if (!$_POST['starting_date']) {
        $_SESSION['starting_date_error'] = "Please enter project starting_date";
        $flag = 1;
    } else {
        $starting_date = get_safe_value($_POST['starting_date']);
        $_SESSION['old_starting_date'] = $starting_date;
    }
    // completation_date
    if (!$_POST['completation_date']) {
        $_SESSION['completation_date_error'] = "Please enter project completation_date";
        $flag = 1;
    } else {
        $completation_date = get_safe_value($_POST['completation_date']);
        $_SESSION['old_completation_date'] = $completation_date;
    }
    // project_image
    if ($_FILES['project_image']['error'] > 0) {
        $_SESSION['project_image_error'] = "Please select a image";
        $flag = 1;
    } else {
        $project_image = $_FILES['project_image'];
        $_SESSION['old_project_image'] = $project_image;
    }
    if ($flag == 0) {
        //file uploading
        $file_name = $_FILES['project_image']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_path =  $_FILES['project_image']['tmp_name'];
        $new_path = "../img/projects/" . $new_file_name;
        move_uploaded_file($temp_path, $new_path);

        unset($_SESSION['old_project_name']);
        unset($_SESSION['old_project_type']);
        unset($_SESSION['old_clients']);
        unset($_SESSION['old_authors']);
        unset($_SESSION['old_budget']);
        unset($_SESSION['old_starting_date']);
        unset($_SESSION['old_completation_date']);
        unset($_SESSION['old_project_image']);
        $column_name = "project_name,project_type,clients,authors,budget,starting_date,completation_date,project_image";
        $values = "'$project_name','$project_type','$clients','$authors','$budget','$starting_date','$completation_date','$new_file_name'";
        if (insert_query("projects", $column_name, $values)) {
            $_SESSION['success'] = "Skills Added Successfully";
            header('location: projects.php');
        }
    } else {
        header('location: manage_projects.php');
    }
}
//Edit sections 

if (isset($_POST['edit_projects'])) {
    $id = $_SESSION['edit_projects_id'];
    unset($_SESSION['edit_projects_id']);
    $flag = 0;
    if (!$_POST['project_name'] || !$_POST['project_type'] || !$_POST['clients'] || !$_POST['authors'] || !$_POST['budget'] || !$_POST['starting_date'] || !$_POST['completation_date']) {
        $flag = 1;
    }

    if ($flag == 0) {
        // image replace
        if ($_FILES['project_image']['name']) {
            $temp_path =  $_FILES['project_image']['tmp_name'];
            update_file("projects", $id, "img/projects", $temp_path, "project_image");
        }

        $project_name = get_safe_value($_POST['project_name']);
        $project_type = get_safe_value($_POST['project_type']);
        $clients = get_safe_value($_POST['clients']);
        $authors = get_safe_value($_POST['authors']);
        $budget = get_safe_value($_POST['budget']);
        $starting_date = get_safe_value($_POST['starting_date']);
        $completation_date = get_safe_value($_POST['completation_date']);
        // update part
        $values = "project_name = '$project_name',project_type = '$project_type',clients = '$clients',authors = '$authors',budget = '$budget',starting_date = '$starting_date',completation_date = '$completation_date'";
        $update = update_data("projects", "$values", "id='$id'");
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: projects.php');
        } else {
            header("location: manage_projects.php?id=$id&task=edit");
        }
    } else {
        header("location: manage_projects.php?id=$id&task=edit");
    }
}
if (isset($_GET['id']) && $_GET['task']) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    //delete row
    $projects = mysqli_fetch_assoc(select_all("projects", "WHERE id='$id'"));
    $file_name = $projects['project_image'];
    if ($task == "delete") {
        $delete = delete_row("projects", "id='$id'", $file_name, "projects");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: projects.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("projects", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: projects.php');
        }
    }
}
