<?php
include '../db.php';

$db = new Database();
$db = $db->connect();
$id = $_POST['id'];

$delete = "DELETE FROM url_short WHERE id=$id;";
$db->query($delete);

header("location: http://localhost/url/home.php");

?>
