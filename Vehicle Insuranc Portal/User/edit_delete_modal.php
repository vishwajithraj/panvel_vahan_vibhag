<div class="modal fade" id="edit_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Edit Vehicle User</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
				<input type="hidden" class="form-control" name="id" value="<?php echo $row['id']; ?>">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Registration No.</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="registration_no" value="<?php echo $row['registration_no']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Vehicle Class</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="vehicle_class" value="<?php echo $row['vehicle_class']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Body Type</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="body_type" value="<?php echo $row['body_type']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Manufacturer</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="manufacturer" value="<?php echo $row['manufacturer']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Registration Date</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="registration_date" value="<?php echo $row['registration_date']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Fitness Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fitness_due" value="<?php echo $row['fitness_due']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tax Validity</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tax_validity" value="<?php echo $row['tax_validity']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Insurance Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="insurance_due" value="<?php echo $row['insurance_due']; ?>">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">PUC Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="puc_due" value="<?php echo $row['puc_due']; ?>">
					</div>
				</div>
            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
			</form>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="delete_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Delete Vehicle</h4></center>
            </div>
            <div class="modal-body">	
            	<p class="text-center">Are you sure you want to Delete</p>
				<h2 class="text-center"><?php echo $row['registration_no']?></h2>
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Yes</a>
            </div>

        </div>
    </div>
</div>