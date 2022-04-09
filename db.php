<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $db;

	function __construct() {
		$this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->db="url";
	}
    public function connect(){
        $conn = new mysqli($this->servername, $this->username, $this->password, $this->db);
        if($conn){
            //echo 'db done!';
            return $conn;
        } else{
            echo 'error';
        }
    }
}
?>