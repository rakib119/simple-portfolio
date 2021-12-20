<?php
require_once "inc/functions.inc.php";
require_once "inc/connection.inc.php";

if (isset($_POST['submit_latest_news'])) {
    // pr($_FILES);
    $flag = 0;
    // photo
    if ($_FILES['news_photo']['error'] > 0) {
        $_SESSION['news_photo_error'] = "Please correct image";
        $flag = 1;
    }

    // title
    if (!$_POST['title']) {
        $_SESSION['title_error'] = "Please enter title";
        $flag = 1;
    } else {
        $title = get_safe_value($_POST['title']);
        $_SESSION['old_title'] = $title;
    }
    // news_details
    if (!$_POST['news_details']) {
        $_SESSION['news_details_error'] = "Please enter news_details";
        $flag = 1;
    } else {
        $news_details = get_safe_value($_POST['news_details']);
        $_SESSION['old_news_details'] = $news_details;
    }
    if ($flag == 0) {

        $file_name = $_FILES['news_photo']['name'];
        $new_file_name = generate_file_name($file_name);
        $temp_path =  $_FILES['news_photo']['tmp_name'];
        $new_path = "../img/news/" . $new_file_name;
        $date = date("Y-m-d H:i:s");
        move_uploaded_file($temp_path, $new_path);

        unset($_SESSION['old_title']);
        unset($_SESSION['old_news_details']);

        if (isset($_POST['submit_latest_news'])) {
            $column_name = "title,news_details,news_photo,date";
            $values = "'$title','$news_details','$new_file_name','$date'";
            if (insert_query("latest_news", $column_name, $values)) {
                $_SESSION['success'] = "latest_news added successfully";
                header('location: latest_news.php');
            }
        }
    } else {
        header('location: manage_latest_news.php');
    }
}
if (isset($_POST['edit_latest_news'])) {

    $id = $_SESSION['edit_latest_news_id'];
    unset($_SESSION['edit_latest_news_id']);
    $flag = 0;
    // title
    if (!$_POST['title']) {
        $_SESSION['title_error'] = "Please enter title";
        $flag = 1;
    }
    // news details
    if (!$_POST['news_details']) {
        $_SESSION['news_details_error'] = "Please enter news_details";
        $flag = 1;
    }

    if ($flag == 0) {
        if ($_FILES['news_photo']['name']) {
            // $new_file_name = $_FILES['news_photo']['name'];
            $temp_path = $_FILES['news_photo']['tmp_name'];
            update_file( "latest_news",$id,"img/news/",$temp_path,"news_photo");
        }

        //file uploading
        $title = get_safe_value($_POST['title']);
        $news_details = get_safe_value($_POST['news_details']);
        $values = "title = '$title',news_details = '$news_details'";
        $update = update_data("latest_news", "$values", "id='$id'", "news", $upload_file_name);
        if ($update) {
            $_SESSION['success'] = "Update successfully";
            header('location: latest_news.php');
        } else {
            header("location: manage_latest_news.php?id=$id&&task=edit");
        }
    } else {
        header("location: manage_latest_news.php?id=$id&&task=edit");
    }
}

if (isset($_GET['id']) && isset($_GET['task'])) {
    $id = $_GET["id"];
    $task = $_GET["task"];
    $latest_news = mysqli_fetch_assoc(select_all("latest_news", "WHERE id='$id'"));
    $file_name = $latest_news['news_photo'];
    //delete specifique row
    if ($task == "delete") {
        $delete = delete_row("latest_news", "id='$id'", $file_name, "news");
        if ($delete) {
            $_SESSION['success'] = "One row deleted successfully";
            header('location: latest_news.php');
        }
    }
    //update status
    if ($task == "update_status") {
        $update_status = update_status("latest_news", "$id");
        if ($update_status) {
            $_SESSION['success'] = "Status successfully updated";
            header('location: latest_news.php');
        }
    }
}
