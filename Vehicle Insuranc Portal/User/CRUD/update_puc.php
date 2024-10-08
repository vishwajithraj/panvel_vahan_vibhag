<div class="modal fade" id="puc_<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <center><h4 class="modal-title" id="myModalLabel">Update PUC Status</h4></center>
            </div>
            <div class="modal-body">
			<div class="container-fluid">
			<form method="POST" action="edit.php">
         
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label class="control-label modal-label">PUC Status</label>
                    </div>
                    <div class="col-sm-10">
                    <label class="radio-inline" style="margin-top: 20px; margin-right: 10px;">
                        <input type="radio" name="insurance_status" value="Renewed" onclick="toggleFields()"> Renewed
                    </label>
                    <label class="radio-inline" style="margin-top: 20px; margin-right: 10px;">
                        <input type="radio" name="insurance_status" value="NotRenewed" onclick="toggleFields()"> Not Renewed
                    </label>
                    </div>
                </div>

				<div class="row form-group">
					<div class="col-sm-2">
						<label class="control-label modal-label">New Expiry Date</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="insurance_due" value="<?php echo $row['insurance_due']; ?>">
					</div>
				</div>

            </div> 
			</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
                <button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-check"></span> Update</a>
			</form>
            </div>

        </div>
    </div>
</div>
<script>
    function toggleFields() {
        var renewedRadio = document.querySelector('input[name="insurance_status"][value="Renewed"]');
        var newExpiryDateField = document.getElementById('newExpiryDateField');

        if (renewedRadio.checked) {
            newExpiryDateField.style.display = "block";
        } else {
            newExpiryDateField.style.display = "none";
        }
    }
</script>
