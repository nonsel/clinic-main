<?php echo '<div id="editModal'.$row['id'].'" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" value="'.$row['id'].'" name="hidden_id" id="hidden_id"/>

                            <div class="form-group">
                                <label>Name:</label>
                                <input name="i_name" class="form-control input-sm" type="text" value="'.$row['name'].'" required=""/>
                            </div>
                            
                            <div class="form-group">
                                <label>Category Type:</label>
                                <select name="i_category" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select Category Type --</option>
                                    <option value="1" '.$sel_lens.'>Lens</option>
                                    <option value="2" '.$sel_frame.'>Frame</option>
                                    <option value="3" '.$sel_access.'>Accessories</option>
                                </select>
                            </div> 


                            <div class="form-group">
                                <label>Model Number:</label>
                                <input name="i_model_number" class="form-control input-sm" type="text" value="'.$row['model_number'].'" required=""/>
                            </div>


                            <div class="form-group">
                                <label>Frame Type:</label>
                                <input name="i_frame_type" class="form-control input-sm" type="text" value="'.$row['frame_type'].'" required=""/>
                            </div>


                            <div class="form-group">
                                <label>Lens Coating:</label>
                                <input name="i_lens_coating" class="form-control input-sm" type="text" value="'.$row['lens_coating'].'" required=""/>
                            </div>

                            <div class="form-group">
                                <label>SPH:</label>
                                <input name="i_sph" class="form-control input-sm" type="text" value="'.$row['sph'].'" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Add:</label>
                                <input name="i_add" class="form-control input-sm" type="text" value="'.$row['i_add'].'" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Category Type:</label>
                                <select name="i_supplier" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select Supplier --</option>';
                                    $qc = mysqli_query($con, "SELECT * FROM tblsupplier");
                                    while ($rowc = mysqli_fetch_array($qc)) {
                                        $selected = ($rowc['id'] == $row['supplier_id']) ? 'selected' : '';
                                        echo '<option value="' . $rowc['id'] . '" ' . $selected . '>' . $rowc['name'] . '</option>';
                                    }
                                    echo '</select>
                            </div> 

                            <div class="form-group">
                                <label>Price:</label>
                                <input name="i_price" class="form-control input-sm" type="text" value="'.$row['price'].'" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Quantity:</label>
                                <input name="i_qty" class="form-control input-sm" type="text" value="'.$row['qty'].'" required=""/>
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
