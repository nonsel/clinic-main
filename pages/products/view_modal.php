<?php echo '<div id="viewModal'.$row['id'].'" class="modal fade">
    <form method="post" enctype="multipart/form-data">
        <div class="modal-dialog modal-sm" style="width:300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">View Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>
                            <div class="form-group">
                                <label>Name:</label>
                                <input name="txt_edit_name" class="form-control input-sm" type="text" value="'.$row['name'].'" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input name="txt_edit_price" class="form-control input-sm" type="text" value="'.$row['price'].'" readonly/>
                            </div>
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input name="txt_edit_quantity" class="form-control input-sm" type="text" value="'.$row['qty'].'" readonly/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Close"/>
                </div>
            </div>
        </div>
    </form>
</div>';?>
