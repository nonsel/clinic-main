<?php echo '<div id="editModal' . $row['id'] . '" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-lg" style="width: 700px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Manage Supplier</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <input type="hidden" value="' . $row['id'] . '" name="hidden_id" id="hidden_id"/>
                <div class="form-group">
                    <label>Supplier Name:</label>
                    <input name="txt_name" class="form-control input-sm" type="text" value="' . htmlspecialchars($row['name']) . '" required/>
                </div>
                <div class="form-group">
                    <label>Contact Number:</label>
                    <input name="txt_contact_number" class="form-control input-sm" type="text" value="' . htmlspecialchars($row['contact_number']) . '" required/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="txt_address" class="form-control input-sm">' . htmlspecialchars($row['address']) . '</textarea>
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
</div>';?>
