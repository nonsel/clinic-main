<!-- Edit Inventory Modal -->
<div id="editModal<?php echo $row['id']; ?>" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-lg" style="width: 700px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Inventory</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $edit_query = mysqli_query($con, "SELECT * FROM tblinventory WHERE id = " . intval($row['id']));
                    $edit_row = mysqli_fetch_array($edit_query);
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="hidden" name="hidden_id" value="<?php echo $edit_row['id']; ?>" />
                            <div class="form-group">
                                <label>Product Name:</label>
                                <input name="txt_product_name" class="form-control input-sm" type="text" value="<?php echo htmlspecialchars($edit_row['product_name']); ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Price:</label>
                                <input name="txt_price" class="form-control input-sm" type="text" value="<?php echo htmlspecialchars($edit_row['price']); ?>" required/>
                            </div>
                            <div class="form-group">
                                <label>Supplier:</label>
                                <select name="txt_supplier_id" class="form-control input-sm" required>
                                    <?php
                                    $supplier_query = mysqli_query($con, "SELECT id, name FROM tblsupplier");
                                    while ($supplier_row = mysqli_fetch_array($supplier_query)) {
                                        $selected = ($supplier_row['id'] == $edit_row['supplier_id']) ? 'selected' : '';
                                        echo '<option value="' . $supplier_row['id'] . '" ' . $selected . '>' . htmlspecialchars($supplier_row['name']) . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Stock Quantity:</label>
                                <input name="txt_stock_quantity" class="form-control input-sm" type="number" min="0" value="<?php echo htmlspecialchars($edit_row['stock_quantity']); ?>" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_save" value="Save Changes"/>
                </div>
            </div>
        </div>
    </form>
</div>
