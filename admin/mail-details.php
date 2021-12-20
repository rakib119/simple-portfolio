<?php
require_once("inc/functions.inc.php");
$id = $_GET['id'];
$update = mysqli_query(db_connect(), "UPDATE contact_us SET status='read' WHERE id= $id");
?>

<?php
header('location: mailbox.php');
?>    