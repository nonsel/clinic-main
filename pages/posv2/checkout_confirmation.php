<div id="checkoutModal" class="modal fade">
<form method="post">
  <div class="modal-dialog modal-sm" style="width:300px !important;">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Confirmation for Checkout</h4>
        </div>
        <div class="modal-body">
             <input type="hidden" value="'<?php $row['id'] ?>'" name="hidden_id" id="hidden_id"/>
             <p>Are you sure you want to check out this record?</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Customer Name:</label>
                        <input name="txt_customer" class="form-control input-sm" type="text" placeholder="Ex.: Juan Dela Cruz" id="txt_customer">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Total:</label>
                        <input name="txt_total" class="form-control input-sm" type="text" placeholder="Total" id="txt_total" readonly>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Cash:</label>
                        <input name="txt_cash" class="form-control input-sm" type="text" id="txt_cash">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label>Total Change:</label>
                        <input name="txt_change" class="form-control input-sm" type="text"  id="txt_change" readonly>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal-footer">
            <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
            <input type="submit" class="btn btn-warning btn-sm" name="btn_checkout" value="Check-Out"/>
        </div>
    </div>
  </div>
</form>
</div>

<script>
    function calculateChange() {
        var total = parseFloat($('#txt_total').val());
        var cash = parseFloat($('#txt_cash').val());

        if (!isNaN(total) && !isNaN(cash)) {
            var change = cash - total;
            $('#txt_change').val(change.toFixed(2));
        }
    }

    // You can also trigger the calculateChange function on input change events
    $('#txt_total, #txt_cash').on('input', calculateChange);
</script>