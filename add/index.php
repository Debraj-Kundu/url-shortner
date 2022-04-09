<?php
include '../db.php';

$db = new Database();
$db = $db->connect();

$pattern = "/^(https?:\/\/)/";

$url = $_POST['long_url'];
if (preg_match($pattern, $url)){
    $select = "SELECT long_url FROM url_short WHERE long_url='".$url."'";
    $select = $db->query($select);
    if($select->fetch_row() < 1){
        $query = "INSERT INTO url_short (long_url) VALUES('".$url."');";
        if($db->query($query)){
            header("location: http://localhost/url/home.php");
        }
    }
    else{
        echo '<script type="text/javascript">
            alert("URL ALREADY SHORTNED");
        </script>';
        header("refresh:0.1; URL=http://localhost/url/home.php");
    }
} else{
    echo '<script type="text/javascript">
        alert("INVALID URL");
    </script>';
    header("refresh:0.1; URL=http://localhost/url/home.php");
}
?>
