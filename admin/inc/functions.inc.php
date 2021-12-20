<?php
session_start();
// require_once "connection.inc.php";
function db_connect()
{
    return $con = mysqli_connect("localhost", "root", "", "portfolio");
}

function site_path()
{
    define('ROOTPATH', dirname(dirname(__DIR__)) . "/");
    return ROOTPATH;
}


// insert query
function insert_query($table_name, $column_name, $values, $condition = "")
{
    //    echo $query ="INSERT into $table_name ($column_name) VALUES($values)";
    $insert = mysqli_query(db_connect(), "INSERT into $table_name ($column_name) VALUES($values) $condition");
    return $insert;
}

// SELECT query
function select_all($table_name, $conditions = "")
{
    $select_query = mysqli_query(db_connect(), "SELECT * FROM $table_name $conditions");
    return $select_query;
}

// SELECT row
function select_row($table_name, $condition)
{
    $select_query = mysqli_query(db_connect(), "SELECT * FROM $table_name WHERE $condition");
    return $select_query;
}
//single value
function single_value($field_name)
{
    $single_value = mysqli_fetch_assoc(select_all("general_settings", "WHERE field_name='$field_name'"));
    return $single_value['value'];
}
// delete row      
function delete_row($table_name, $condition, $file_name = '', $folder = '')
{
    $res = 1;
    if ($file_name != '' && $folder != '') {
        $res = unlink(site_path() . "img/$folder" . "/$file_name");
    }
    if ($res == 1) {
        $select_query = mysqli_query(db_connect(), "DELETE FROM $table_name WHERE $condition");
        return $select_query;
    }
}


// update status
function update_status($table_name, $id)
{
    $fetch_status = mysqli_fetch_assoc(select_all($table_name, "WHERE id ='$id'"));
    $old_status = $fetch_status['status'];
    if ($old_status == 1) {
        $update_status = 0;
    } else {
        $update_status = 1;
    }
    $update_status_querry = mysqli_query(db_connect(), "UPDATE $table_name SET status='$update_status' WHERE id='$id'");
    return $update_status_querry;
}

// update data
function update_data($table_name, $value, $condition)
{
    $update = mysqli_query(db_connect(), "UPDATE $table_name SET $value where $condition");
    return $update;
}

// update file 

function update_file($table_name, $file_id, $path, $temp_path, $column_name)
{
    //fetch old file name
    $old_file_name = mysqli_fetch_assoc(select_row("$table_name", "id=$file_id"))["$column_name"];
    // delete old file
    $path = site_path() . "$path/$old_file_name";
    unlink($path);
    //upload new file
    $upload_status = move_uploaded_file($temp_path, $path);
    return $upload_status;
}

function pr($str)
{
    echo "<pre>";
    print_r($str);
    echo "</pre>";
}
function get_safe_value($str)
{
    if ($str != '') {
        $str = trim($str);
        $str = htmlspecialchars($str);
        return mysqli_real_escape_string(db_connect(), $str);
    }
}
function name_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = strtolower($str);
        $str = ucwords($str);
        return mysqli_real_escape_string(db_connect(), $str);
    }
}
function email_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = strtolower($str);
        return mysqli_real_escape_string(db_connect(), $str);
    }
}
function message_format($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $str = ucfirst($str);
        return mysqli_real_escape_string(db_connect(), $str);
    }
}


// phone number Validation

function valid_phone_number($str)
{
    if ($str != '') {
        $str = get_safe_value($str);
        $numaric = is_numeric($str);
        $len = strlen($str);
        $pos_0 = strpos($str, "0");
        $pos_1 = strpos($str, "1");
        $pos_2_3 = strpos($str, "3");
        $pos_2_4 = strpos($str, "4");
        $pos_2_5 = strpos($str, "5");
        $pos_2_6 = strpos($str, "6");
        $pos_2_7 = strpos($str, "7");
        $pos_2_8 = strpos($str, "8");
        $pos_2_9 = strpos($str, "9");
        if ($numaric == true && $len == 11 && $pos_0 == 0 && $pos_1 == 1) {
            if (
                $pos_2_3 == 2 || $pos_2_4 == 2 || $pos_2_5 == 2 || $pos_2_6 == 2 ||
                $pos_2_7 == 2 || $pos_2_8 == 2 || $pos_2_9 == 2
            ) {
                return mysqli_real_escape_string(db_connect(), $str);
            } else {
                $str = "";
                return mysqli_real_escape_string(db_connect(), $str);
            }
        } else {
            $str = "";
            return mysqli_real_escape_string(db_connect(), $str);
        }
    }
}
//password formate
function password_format($str)
{
    if ($str != "") {
        $str = get_safe_value($str);
        $str = sha1($str);
        $str = md5($str);
        return mysqli_real_escape_string(db_connect(), $str);
    }
}
// cheak login or not
function is_login()
{
    if (!isset($_SESSION["ADMIN_LOGIN"]) && !$_SESSION["ADMIN_LOGIN"] == 'YES') {
        header("location: login.php");
    }
}
//file extension
function extension($file_name)
{
    $after_explode = explode(".", $file_name);
    $extension = end($after_explode);
    return $extension;
}
// genarate unique file name 
function generate_file_name($file_name)
{
    $extension = extension($file_name);
    $new_file_name = date("Y-m-d_H-i-s") . rand(111111111, 9999999999) . "." . $extension;
    return $new_file_name;
}
