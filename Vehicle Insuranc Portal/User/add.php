<?php
	session_start();
	include_once('connection.php');

	if(isset($_POST['add'])){
		$registration_no = $_POST['registration_no'];
		$vehicle_class = $_POST['vehicle_class'];
		$body_type = $_POST['body_type'];
		$manufacturer = $_POST['manufacturer'];
		$registration_date = $_POST['registration_date'];
		$fitness_due = $_POST['fitness_due'];
		$tax_validity = $_POST['tax_validity'];
		$insurance_due = $_POST['insurance_due'];
		$puc_due = $_POST['puc_due'];
		$sql = "INSERT INTO members (registration_no, vehicle_class, body_type, manufacturer, registration_date, fitness_due, tax_validity, insurance_due, puc_due) VALUES ('$registration_no', '$vehicle_class', '$body_type', '$manufacturer', '$registration_date', '$fitness_due', '$tax_validity', '$insurance_due', '$puc_due')";

		if($conn->query($sql)){
			$_SESSION['success'] = 'Vehicle added successfully';
		}
		
		else{
			$_SESSION['error'] = 'Something went wrong while adding';
		}
	}
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: index.php');
?>