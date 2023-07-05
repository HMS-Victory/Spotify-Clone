<?php 

	ob_start();
	if(!isset($_SESSION)){ 
        session_start(); 
    } 

	$timexone=date_default_timezone_set("America/Anchorage");

	$con=mysqli_connect("localhost", "root", "", "spotifyclone");
	if(mysqli_connect_errno()){
		echo "Failed to connect:"+mysqli_connect_errno();
	}

?>