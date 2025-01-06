<div id="editModal" class="modal fade">
    <form id="form-edit" method="post">
        <div class="modal-dialog modal-sm" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Edit Product</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">

                            <input type="hidden" value="" name="id"/>

                            <div class="form-group">
                                <label>Name:</label>
                                <input name="name" class="form-control input-sm" type="text" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Code:</label>
                                <input name="code" class="form-control input-sm" type="text" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Category Type:</label>
                                <select name="cat_id" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select Category Type --</option>
                                    <option value="1" selected="">Lens</option>
                                    <option value="2">Frame</option>
                                </select>
                            </div>  


                            <!-- LENS CATEGORY -->
                            <div class="form-group div-lens">
                                <label>Lens Type:</label>
                                <input name="lens_type" class="form-control input-sm" type="text" required=""/>
                            </div>
                            
                            <div class="form-group div-lens">
                                <label>Lens Coating:</label>
                                <input name="lens_coating" class="form-control input-sm" type="text" required=""/>
                            </div>

                            <div class="form-group div-lens">
                                <label>Prescription:</label>
                                <input name="prescription" class="form-control input-sm" type="text" required=""/>
                            </div>



                            <style type="text/css">
                                .div-frame{
                                    display: none;
                                }
                            </style>

                            <!-- FRAME CATEGORY -->
                            <div class="form-group div-frame">
                                <label>Date Ordered:</label>
                                <input name="date_ordered" class="form-control input-sm" type="date"/>
                            </div>
                            
                            <div class="form-group div-frame">
                                <label>Frame Brand:</label>
                                <input name="frame_brand" class="form-control input-sm" type="text"/>
                            </div>

                            <div class="form-group div-frame">
                                <label>Frame Type:</label>
                                <input name="frame_type" class="form-control input-sm" type="text"/>
                            </div>



                            
                            <div class="form-group">
                                <label>Supplier:</label>
                                <select name="supplier_id" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select Supplier --</option>
                                    <?php
                                        $qc = mysqli_query($con,"SELECT * FROM tblsupplier");
                                        while($rowc = mysqli_fetch_array($qc)){
                                            echo '
                                            <option value="'.$rowc['id'].'">'.$rowc['name'].'</option>
                                            ';
                                        }
                                    ?>   
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Quantity:</label>
                                <input name="qty" class="form-control input-sm" type="number" required=""/>
                            </div>

                            <div class="form-group">
                                <label>Price:</label>
                                <input name="price" class="form-control input-sm" type="number" required=""/>
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
</div>
<script type="text/javascript">

    $(document).ready(function(){

        $("#editModal [name=cat_id]").change(function(){

            let val = $(this).val();
            if(val==2){
                //FRAME
                $("#editModal .div-lens").css("display","none");
                $("#editModal .div-frame").css("display","block");

                $("#editModal .div-lens").find("input").prop("required",false);
                $("#editModal .div-frame").find("input").prop("required",true);

            }else{
                //LENS
                $("#editModal .div-lens").css("display","block");
                $("#editModal .div-frame").css("display","none");

                $("#editModal .div-lens").find("input").prop("required",true);
                $("#editModal .div-frame").find("input").prop("required",false);
            }


        });

    });
</script>