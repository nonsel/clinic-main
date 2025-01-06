<div class="modal fade" id="quantityModal" tabindex="-1" role="dialog" aria-labelledby="quantityModalLabel" aria-hidden="true">
    <form method="post">
        <div class="modal-dialog modal-sm" style="width: 300px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Item</h4>
                </div>
                <div class="modal-body">
                    <?php
                    $user = mysqli_query($con, "SELECT * from tbluser where id = '" . $_SESSION['userid'] . "'");
                    while ($row = mysqli_fetch_array($user)) {
                        echo '<input type="hidden" value="' . $row['id'] . '" name="hidden_id" id="hidden_id"/>';
                    }
                    ?>
                    <input type="hidden" name="hidden_productid" id="hidden_productid" value="">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Quantity:</label>
                                <input name="txt_quantity" class="form-control input-sm" type="text" placeholder="Quantity" id="txt_quantity">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel">
                    <input type="button" class="btn btn-primary btn-sm" id="addToCart" value="Add Item">
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
   $(document).on("click", ".book-now-button", function () {
    var productId = $(this).data("product-id");
    var userId = $(this).data("user-id");

    // Set the product ID and user ID in the hidden input fields within the modal
    $("#hidden_productid").val(productId);
    $("#hidden_id").val(userId);

    // Additional code to populate the modal with product information if needed
    var productPrice = $(this).data("product-price");
    var productDescription = $(this).data("product-description");
    var productImage = $(this).data("product-image");

    // Populate the modal with the extracted data if needed
    $("#quantityModalLabel").text("Add " + productDescription + " to Cart");
    $("#txt_quantity").val(1); // Set an initial quantity of 1
});

</script>
