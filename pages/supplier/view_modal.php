<div id="viewModal" class="modal fade">
  <div class="modal-dialog modal-lg" style="width: 700px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">View Supplier</h4>
        </div>
        <div class="modal-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label>Supplier Name:</label>
                    <input name="v_name" class="form-control input-sm" type="text" value="" disabled= />
                </div>
                <div class="form-group">
                    <label>Contact Number:</label>
                    <input name="v_contact_number" class="form-control input-sm" type="text" value="" disabled/>
                </div>
                <div class="form-group">
                    <label>Address</label>
                    <textarea name="v_address" class="form-control input-sm" disabled></textarea>
                </div>
            </div>
        </div>
        </div>
        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
            <input type="button" class="btn btn-danger btn-sm" id="btn_delete" value="Delete"/>
        </div>
    </div>
  </div>
</div>
