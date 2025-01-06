<!-- View Modal -->
<div class="modal fade" id="viewModal<?php echo $row['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="viewModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="viewModalLabel">Patient Details</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Firstname:</label>
                    <p><?php echo $row['firstname']; ?></p>
                </div>
                <div class="form-group">
                    <label>Lastname:</label>
                    <p><?php echo $row['lastname']; ?></p>
                </div>
                <div class="form-group">
                    <label>Middlename:</label>
                    <p><?php echo $row['middlename']; ?></p>
                </div>
                <div class="form-group">
                    <label>Phone Number:</label>
                    <p><?php echo $row['phoneno']; ?></p>
                </div>
                <div class="form-group">
                    <label>Suffix:</label>
                    <p><?php echo $row['suffix']; ?></p>
                </div>
                <div class="form-group">
                    <label>Phone No:</label>
                    <p><?php echo $row['phoneno']; ?></p>
                </div>
                <div class="form-group">
                    <label>Date of Birth: </label>
                    <p><?php echo $row['date_of_birth']; ?></p>
                </div>
                <div class="form-group">
                    <label>PWD Citizen No.:</label>
                    <p><?php echo $row['pwd_citizen_no']; ?></p>
                </div>
                <div class="form-group">
                    <label>Senior Citizen No.:</label>
                    <p><?php echo $row['senior_citizen_no']; ?></p>
                </div>
                <div class="form-group">
                    <label>Home Address.:</label>
                    <p><?php echo $row['home_address']; ?></p>
                </div>
                <div class="form-group">
                    <label>Medical History.:</label>
                    <p><?php echo $row['medical_history']; ?></p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-delete-from-view" id="<?php echo $row['id']; ?>">
                    <i class="fa fa-trash" aria-hidden="true"></i> Delete
                </button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
