<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>पनवेल वाहन विभाग</title>

    <link rel="shortcut icon" href="assets/images/image.png" style="width: 30px; height:auto">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="./CRUD/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./CRUD/datatable/dataTable.bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/admin.css">
	<style>

		.height10 {
			height: 10px;
		}

		.mtop10 {
			margin-top: 10px;
		}

		.modal-label {
			position: relative;
			top: 7px;
		}

		table, th, td {
			background-color: white;
		}

		.table-box {
			margin-top: -50px;
			background-color: #fff;
			border-radius: 5px;
			padding: 0px;
			border-width: 2px ;
		}

		.main-container .navcontainer .nav h4 a {
			color: #000000;
			text-decoration: none;
		}

		.tabs {
			height:45px;
			padding: 0 0 0 0;
			overflow:visible;
		}
		
		.tab {
			width:200px;
			height:45px;
			overflow:hidden;
			float:left;
			margin:0 -15px 0 0;
		}

		.tab-box {
			height: 50px;
			background: #088F8F;
			border-radius: 4px;
			border: 1px solid #ccc;
			margin: 0 10px 0;
			box-shadow: 0 0 2px #fff inset;
			position: relative;
		}

		.tab-box:before {
			content: '';
			position: absolute;
			top: 0;
			left: 0;
			right: 0;
			bottom: 0;
			background-color: #088F8F;
			transform: perspective(100px) rotateX(30deg);
			border-radius: 4px;
		}

		.tab-box span {
			top: 10px;
			font-weight: 800;
			margin-left: 25px;
			font-size: 15px;
			position: relative;
			z-index: 1; 
		}

		.tab.active {
			z-index:40;
			position:relative;
			padding-bottom:1px;
		}
		
		.tab.active .tab-box{
			color: #fff;
			background-color: #088F8F;
			box-shadow: 0 0 2px 0 #fff inset;
		}

		.content {
			z-index:1;
			padding:100px;
			border:2px solid #088F8F;
			background:#fff;
			position:relative;
		
		}

		.clear {
			clear:both;
		}

	</style>

</head>

<body>
	<header style="z-index: 0">
	<div class="logosec">
  	<img src="assets/images/image.png" class="nav-img larger-logo" alt="dashboard" style="width: 70px; margin-top: 5px ; height: 50px;">
  	<div class="logo" style="font-weight: bold;">पनवेल वाहन विभाग</div>
  	<img src="assets/images/menu.png" class="icn menuicn" id="menuicn" alt="menu-icon">
	</div>


	<!-- <div class="message">
    	<div class="circle"></div>
    	<img src="assets/images/notification.png" class="icn" alt="" id="notification"> -->
    	<div class="dp">
        	<img src="https://shorturl.at/vIMV0" class="dpicn" alt="dp">
    	</div>
	<!-- </div> -->
	</header>

	<div class="main-container">
    <div class="navcontainer">
        <nav class="nav">
            <div class="nav-upper-options">
                <div class="nav-option option1">
                    <img src="assets/images/dashboard.png" class="nav-img" alt="articles">
                    <h4><a href="admin.php">Dashboard</a></h4>
                </div>

                <!-- <div class="option2 nav-option">
                    <img src="assets/images/alert.png" class="nav-img" alt="articles">
                    <h4><a href="expiry.php">Expiry Alerts</a></h4>
                </div> -->

                <div class="nav-option option3">
                    <img src="assets/images/list.png" class="nav-img" alt="report">
                    <h4><a href="export.php">Export List</a></h4>
                </div>

                <div class="nav-option logout">
                    <img src="assets/images/logout.png" class="nav-img" alt="logout">
                    <h4><a href="logout.php">Logout</a></h4>
                </div>
            </div>
        </nav>
    </div>

		<div class="main">

			<div class="box-container">
			<div class="box box1">
    			<div class="text">
       				 <?php
        				include_once('./CRUD/connection.php');
        				$sql = "SELECT COUNT(id) AS count FROM members";
        				$result = $conn->query($sql);
       					 if ($result && $result->num_rows > 0) {
            				$row = $result->fetch_assoc();
            				$count = $row['count'];
       					 } else {
            				$count = 0;
        				 }
        			 ?>
        			<h2 class="topic-heading"><?php echo $count; ?></h2>
        			<h2 class="topic">Total Number<br>of Vehicles</h2>
    			</div>
    			<img src="assets/images/Expiry.png" alt="Views">
				</div>	



				<?php
				include_once('./CRUD/connection.php');

				function daysUntilExpiry($expiryDate) {
					$expiryTimestamp = strtotime($expiryDate);
					$currentTimestamp = strtotime('today');
					$diff = ($expiryTimestamp - $currentTimestamp) / (60 * 60 * 24); 
					return $diff;
				}

				$sql = "SELECT * FROM members";
				$query = $conn->query($sql);
				$count = 0;

				while ($row = $query->fetch_assoc()) {
					$daysDiff = daysUntilExpiry($row['fitness_due']);
					if ($daysDiff <= 30) {
						$count++;
					}
				}

				?>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading"><?php echo $count; ?></h2>
						<h2 class="topic">Fitness<br>Expiry Dates</h2>
					</div>
					<img src="assets/images/Fitness.png" alt="Views">
				</div>



				<?php
				include_once('./CRUD/connection.php');

				$sql = "SELECT * FROM members";
				$query = $conn->query($sql);
				$countPUC = 0;

				while ($row = $query->fetch_assoc()) {
					$daysDiffPUC = daysUntilExpiry($row['puc_due']);
					if ($daysDiffPUC <= 20) {
						$countPUC++;
					}
				}

				?>

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading"><?php echo $countPUC; ?></h2>
						<h2 class="topic">PUC<br>Expiry Dates</h2>
					</div>
					<img src="assets/images/PUC.png" alt="Views">
				</div>


				<?php
				include_once('./CRUD/connection.php');

				$sql = "SELECT * FROM members";
				$query = $conn->query($sql);
				$count = 0;

				while ($row = $query->fetch_assoc()) {
					$daysDiff = daysUntilExpiry($row['insurance_due']); 
					if ($daysDiff <= 30) {
						$count++;
					}
				}

				?>

				<div class="box box4">
					<div class="text">
						<h2 class="topic-heading"><?php echo $count; ?></h2>
						<h2 class="topic">Insurance<br>Expiry Dates</h2>
					</div>
					<img src="assets/images/insurance.png" alt="Views">
				</div>

				</div>


			<br><br><br>

			<div class="row">
				<?php
				if (isset($_SESSION['error'])) {
					echo '
					<div class="alert alert-danger text-center">
						<button class="close">&times;</button>
						' . $_SESSION['error'] . '
					</div>
					';
					unset($_SESSION['error']);
				}
				if (isset($_SESSION['success'])) {
					echo '
					<div class="alert alert-success text-center">
						<button class="close">&times;</button>
						' . $_SESSION['success'] . '
					</div>
					';
					unset($_SESSION['success']);
				}
				?>
			</div style="margin-bottom:-500px">

			<div class="tabs" style="z-index: 999">
				<div class="tab active" onclick="showContent('tab1')"><div class="tab-box"><span>Insurance Policy</span></div></div>
				<div class="tab" onclick="showContent('tab2')"><div class="tab-box"><span style="left: 5px">PUC Certificate</span></div></div>
				<div class="tab" onclick="showContent('tab3')"><div class="tab-box"><span style="right: 7px">Fitness Certificate</span></div></div>
				<div class="tab" onclick="showContent('tab4')"><div class="tab-box"><span style="left: 8px">Annual Service</span></div></div>
				<div class="tab" onclick="showContent('tab5')"><div class="tab-box"><span style="left: 20px">Free Service</span></div></div>
			</div>

			<div class="content" id="content-tab1">
			<div class="table-box">

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</a>
			</div><br>

			<div class="height10"></div>
					<div class="row">
					<div class="table-responsive">
						<table id="myTable" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Registration No.</th>
									<th>Vehicle CLass</th>
									<th>Body Type</th>
									<th>Insurance Due</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include_once('./CRUD/connection.php');

							function dateDiffInDays($insurance_due) {
								$currentTimestamp = strtotime('today'); 
								$expiryTimestamp = strtotime($insurance_due);
								$diff = ($expiryTimestamp - $currentTimestamp) / (60 * 60 * 24);
								return floor($diff);
							}

							$sql = "SELECT *, 
							CASE 
								 WHEN insurance_due < CURRENT_DATE THEN 'expired' 
								 WHEN DATEDIFF(insurance_due, CURRENT_DATE) <= 30 THEN 'expiring_soon' 
								 ELSE 'valid' 
							END AS insurance_status 
					 FROM members 
					 ORDER BY CASE 
								   WHEN insurance_due < CURRENT_DATE THEN 0 
								   ELSE 1 
							  END, 
							  insurance_due ASC; ";
							$query = $conn->query($sql);
							$rows = $query->fetch_all(MYSQLI_ASSOC); 
							foreach ($rows as $row) {
								$daysDiff = dateDiffInDays($row['insurance_due']);
								
								$style = "";
								if ($daysDiff <= 30) {
									$style = " style='color:#ff5349 ; font-weight:bold'";
								}

								echo "<tr>
									<td>" . $row['id'] . "</td>
									<td" . $style . ">" . $row['registration_no'] . "</td>
									<td" . $style . ">" . $row['vehicle_class'] . "</td>
									<td" . $style . ">" . $row['body_type'] . "</td>
									<td" . $style . ">" . $row['insurance_due'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye'></i>  View</a>
										<a href='#insurance_" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-share-alt'></span> Action</a>
									</td>
								</tr>";

								include('./CRUD/edit_delete_modal.php');
								include('./CRUD/update_insurance.php');
							}
							?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	</div>

	<div class="content" id="content-tab2" style="display: none;">
			<div class="table-box">

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</a>
			</div>
			

			<br><br>

			<div class="height10"></div>
					<div class="row">
					<div class="table-responsive">
						<table id="myTable1" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Registration No.</th>
									<th>Vehicle Class</th>
									<th>Body Type</th>
									<th>PUC Due</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include_once('./CRUD/connection.php');

							$sql = "SELECT * FROM members";
							$query = $conn->query($sql);
							$rows = $query->fetch_all(MYSQLI_ASSOC); 
							foreach ($rows as $row) {
								$daysDiff = dateDiffInDays($row['puc_due']);
								
								$style = "";
								if ($daysDiff <= 20) {
									$style = " style='color:#ff5349 ; font-weight:bold'";
								}

								echo "<tr>
									<td>" . $row['id'] . "</td>
									<td" . $style . ">" . $row['registration_no'] . "</td>
									<td" . $style . ">" . $row['vehicle_class'] . "</td>
									<td" . $style . ">" . $row['body_type'] . "</td>
									<td" . $style . ">" . $row['puc_due'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye'></i>  View</a>
										<a href='#puc_" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-share-alt'></span> Action</a>
									</td>
								</tr>";

								include('./CRUD/edit_delete_modal.php');
								include('./CRUD/update_insurance.php');
							}
							?>

							</tbody>
						</table>
					</div>
				</div>	
			</div>
	</div>

	<div class="content" id="content-tab3" style="display: none;">
			<div class="table-box">

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</a>
			</div>
			
			<br><br>

			<div class="height10"></div>
					<div class="row">
					<div class="table-responsive">
						<table id="myTable2" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Registration No.</th>
									<th>Vehicle Class</th>
									<th>Body Type</th>
									<th>Fitness Due</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include_once('./CRUD/connection.php');

							$sql = "SELECT * FROM members";
							$query = $conn->query($sql);
							$rows = $query->fetch_all(MYSQLI_ASSOC); 
							foreach ($rows as $row) {
								$daysDiff = dateDiffInDays($row['fitness_due']);
								
								$style = "";
								if ($daysDiff <= 45) {
									$style = " style='color:#ff5349 ; font-weight:bold'";
								}

								echo "<tr>
									<td>" . $row['id'] . "</td>
									<td" . $style . ">" . $row['registration_no'] . "</td>
									<td" . $style . ">" . $row['vehicle_class'] . "</td>
									<td" . $style . ">" . $row['body_type'] . "</td>
									<td" . $style . ">" . $row['fitness_due'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye'></i>  View</a>
										<a href='#fitness_" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-share-alt'></span> Action</a>
									</td>
								</tr>";

								include('./CRUD/edit_delete_modal.php');
								include('./CRUD/update_insurance.php');
							}
							?>
							</tbody>
						</table>
					</div>
				</div>	
			</div>
	</div>


	<div class="content" id="content-tab4" style="display: none;">
			<div class="table-box">

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</a>
			</div>
			

			<br><br>

			<div class="height10"></div>
					<div class="row">
					<div class="table-responsive">
						<table id="myTable3" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Registration No.</th>
									<th>Vehicle Class</th>
									<th>Body Type</th>
									<th>Annual Maintanence</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include_once('./CRUD/connection.php');

							$sql = "SELECT * FROM members";
							$query = $conn->query($sql);
							$rows = $query->fetch_all(MYSQLI_ASSOC); 
							foreach ($rows as $row) {
								$daysDiff = dateDiffInDays($row['registration_date']);
								
								$style = "";
								if ($daysDiff <= 30 && $daysDiff >= 0) {
									$style = " style='color:#ff5349 ; font-weight:bold'";
								}

								echo "<tr>
									<td>" . $row['id'] . "</td>
									<td" . $style . ">" . $row['registration_no'] . "</td>
									<td" . $style . ">" . $row['vehicle_class'] . "</td>
									<td" . $style . ">" . $row['body_type'] . "</td>
									<td" . $style . ">" . $row['registration_date'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye'></i>  View</a>
										<a href='#maintainence_" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-share-alt'></span> Action</a>
									</td>
								</tr>";

								include('./CRUD/edit_delete_modal.php');
								include('./CRUD/update_insurance.php');
							}
							?>
							</tbody>
			</table>
					</div>
				</div>	
			</div>
	</div>

	<div class="content" id="content-tab5" style="display: none;">
			<div class="table-box">

			<div class="row">
				<a href="#addnew" data-toggle="modal" class="btn btn-primary" style="background-color: #088F8F ; border-color: #088F8F"><span class="glyphicon glyphicon-plus"></span> Add Vehicle</a>
			</div>
			

			<br><br>

			<div class="height10"></div>
					<div class="row">
					<div class="table-responsive">
						<table id="myTable4" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>ID</th>
									<th>Registration No.</th>
									<th>Vehicle Class</th>
									<th>Body Type</th>
									<th>Free Service</th>
									<th>Edit/Delete</th>
								</tr>
							</thead>
							<tbody>
							<?php
							include_once('./CRUD/connection.php');

							$sql = "SELECT * FROM members";
							$query = $conn->query($sql);
							$rows = $query->fetch_all(MYSQLI_ASSOC); 
							foreach ($rows as $row) {
								$daysDiff = dateDiffInDays($row['registration_date']);
								
								$style = "";
								if ($daysDiff <= 20 && $daysDiff >= 0) {
									$style = " style='color:#ff5349 ; font-weight:bold'";
								}

								echo "<tr>
									<td>" . $row['id'] . "</td>
									<td" . $style . ">" . $row['registration_no'] . "</td>
									<td" . $style . ">" . $row['vehicle_class'] . "</td>
									<td" . $style . ">" . $row['body_type'] . "</td>
									<td" . $style . ">" . $row['registration_date'] . "</td>
									<td>
										<a href='#edit_" . $row['id'] . "' class='btn btn-success btn-sm' data-toggle='modal'><i class='fas fa-eye'></i>  View</a>
										<a href='#maintainence_" . $row['id'] . "' class='btn btn-primary btn-sm' data-toggle='modal'><span class='glyphicon glyphicon-share-alt'></span> Action</a>
									</td>
								</tr>";

								include('./CRUD/edit_delete_modal.php');
								include('./CRUD/update_insurance.php');
							}
							?>

							</tbody>
						</table>
					</div>
				</div>	
			</div>
	</div>
		
	</div>

	<?php include('./CRUD/add_modal.php') ?>				

	<script src="assets/js/admin.js"></script>
	<script src="./CRUD/jquery/jquery.min.js"></script>
	<script src="./CRUD/bootstrap/js/bootstrap.min.js"></script>
	<script src="./CRUD/datatable/jquery.dataTables.min.js"></script>
	<script src="./CRUD/datatable/dataTable.bootstrap.min.js"></script>
	<script>



		$(document).ready(function () {
			$('#myTable').DataTable();
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
		$(document).ready(function () {
			$('#myTable1').DataTable();
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
		$(document).ready(function () {
			$('#myTable2').DataTable();
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
		$(document).ready(function () {
			$('#myTable3').DataTable();
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
		$(document).ready(function () {
			$('#myTable4').DataTable();
			$(document).on('click', '.close', function () {
				$('.alert').hide();
			})
		});
		function confirmLogout() {
        return confirm("Are you sure you want to logout?");
    	}

		$('.tab').click(function(){
		$('.tab').removeClass('active');
		$(this).addClass('active');
		});

		function showContent(tabId) {
			document.querySelectorAll('.content').forEach(function (content) {
				content.style.display = 'none';
				if ($.fn.DataTable.isDataTable('#myTable','#myTable1','#myTable2',
				'#myTable3', '#myTable4', content)) {
					$('#myTable','#myTable1','#myTable2', '#myTable3', '#myTable4', content).DataTable().destroy();
				}
			});

			document.querySelectorAll('.tab').forEach(function (tab) {
				tab.classList.remove('active');
			});

			document.getElementById('content-' + tabId).style.display = 'block';
			document.querySelector('.tab[data-tab="' + tabId + '"]').classList.add('active');

			$('#myTable','#myTable1','#myTable2', '#myTable3', '#myTable4',
			 document.getElementById('content-' + tabId)).DataTable(); 
		}
		
		function saveSettings () { //This is a long task.
		validateForm();
		showSpinner();
		saveToDatabase();
		updateUI();
		sendAnalytics();
		}

		function saveSettings () {
		validateForm();
		showSpinner();
		updateUI();

		setTimeout(() => {
			saveToDatabase();
			sendAnalytics();
		}, 0);
		}

		function processData () {
		for (const item of largeDataArray) {
		}
		}
		saveSettings ();
		processData ()

	</script>
</body>

</html>