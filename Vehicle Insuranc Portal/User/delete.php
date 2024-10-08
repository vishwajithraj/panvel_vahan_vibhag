<?php
	session_start();
	include_once('connection.php');

	if(isset($_GET['id'])){
		$sql = "DELETE FROM members WHERE id = '".$_GET['id']."'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Vehicle deleted successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in deleting Vehicle';
		}
	}
	else{
		$_SESSION['error'] = 'Select Vehicle to delete first';
	}

	header('location: index.php');
?>