<?php echo '<div id="editModal' . $row['id'] . '" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:600px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Edit Patient</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="' . $row['id'] . '" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Firstname <span style="color:red;">*</span></label>
                    <input name="txt_edit_firstname" class="form-control input-sm" type="text" value="' . $row['firstname'] . '" required/>
                </div>
                <div class="form-group">
                    <label>Middlename</label>
                    <input name="txt_edit_middlename" class="form-control input-sm" type="text" value="' . $row['middlename'] . '"/>
                </div>
                <div class="form-group">
                    <label>Lastname <span style="color:red;">*</span></label>
                    <input name="txt_edit_lastname" class="form-control input-sm" type="text" value="' . $row['lastname'] . '" required/>
                </div>
                <div class="form-group">
                    <label>Suffix</label>
                    <input name="txt_edit_suffix" class="form-control input-sm" type="text" value="' . $row['suffix'] . '"/>
                </div>
                <div class="form-group">
                    <label>Phone No <span style="color:red;">*</span></label>
                    <input name="txt_edit_phoneno" class="form-control input-sm" type="text" value="' . $row['phoneno'] . '" required/>
                </div>
                <div class="form-group">
                    <label>Date of Birth <span style="color:red;">*</span></label>
                    <input name="txt_edit_date_of_birth" class="form-control input-sm" type="date" value="' . $row['date_of_birth'] . '" required/>
                </div>
                <div class="form-group">
                    <label>PWD Citizen No.</label>
                    <input name="txt_edit_pwd_citizen_no" class="form-control input-sm" type="text" value="' . $row['pwd_citizen_no'] . '"/>
                </div>
                <div class="form-group">
                    <label>Senior Citizen No.</label>
                    <input name="txt_edit_senior_citizen_no" class="form-control input-sm" type="text" value="' . $row['senior_citizen_no'] . '"/>
                </div>
                <div class="form-group">
                    <label>Home Address <span style="color:red;">*</span></label>
                    <input name="txt_edit_home_address" class="form-control input-sm" type="text" value="' . $row['home_address'] . '" required/>
                </div>
                <div class="form-group">
                    <label>Medical History</label>
                    <input name="txt_edit_medical_history" class="form-control input-sm" type="text" value="' . $row['medical_history'] . '"/>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save"/>
        </div>
    </div>
  </div>
</form>
</div>'; ?>