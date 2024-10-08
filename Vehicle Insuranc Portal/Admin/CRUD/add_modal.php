<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false"  aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Add a New User</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="add.php">
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Registration No.</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="registration_no" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Vehicle Class</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="vehicle_class" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Body Type</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="body_type" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Manufacturer</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="manufacturer" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Registration Date</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="registration_date" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Fitness Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="fitness_due" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Tax Validity</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="tax_validity" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">Insurance Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="insurance_due" required>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">PUC Due</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="puc_due" required>
					</div>
				</div>

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="add" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</a>
			</form>
            </div>

        </div>
    </div>
</div>