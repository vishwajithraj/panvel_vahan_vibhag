<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['update_fitness'])){
		$id = $_POST['id'];
		$registration_no = $_POST['registration_no'];
		$vehicle_class = $_POST['vehicle_class'];
		$body_type = $_POST['body_type'];
		$manufacturer = $_POST['manufacturer'];
		$registration_date = $_POST['registration_date'];
		$fitness_due = $_POST['fitness_due'];
		$tax_validity = $_POST['tax_validity'];
		$insurance_due = $_POST['insurance_due'];
		$puc_due = $_POST['puc_due'];

		$sql = "UPDATE members SET registration_no = '$registration_no', vehicle_class = '$vehicle_class', body_type = '$body_type', manufacturer = '$manufacturer', registration_date = '$registration_date', fitness_due = '$fitness_due', tax_validity = '$tax_validity', insurance_due = '$insurance_due', puc_due = '$puc_due' WHERE id = '$id'";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Vehicle updated successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong in updating member';
		}
	}
	else{
		$_SESSION['error'] = 'Select Vehicle to edit first';
	}

	header('location: admin.php');

?>