<?php
	include '../db.php';

	$db = new Database();
	$db = $db->connect();

	if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = "SELECT long_url FROM url_short WHERE id = '".$id."' LIMIT 1";
        $query = $db->query($query);
        $url = $query->fetch_row();
        header('location: ' . $url[0]);
    } else{
        echo ':(';
    }
    
?>