<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form method="post" enctype="multipart/form-data">
              <div class="modal-dialog modal-sm" style="width:600px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Products Form</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">
                            <div class="col-md-12">

                                <div class="form-group">
                                    <label>Name:</label>
                                    <input name="a_name" class="form-control input-sm" type="text" required=""/>
                                </div>
                                <div class="form-group">
                                    <label>Category Type:</label>
                                    <select name="a_category" class="form-control input-sm select2" style="width:100%" required="">
                                        <option disabled selected value="">-- Select Category Type --</option>
                                        <option value="1">Lens</option>
                                        <option value="2">Frame</option>
                                        <option value="3">Accessories</option>
                                    </select>
                                </div>  
                                <div class="form-group">
                                    <label>Model Number:</label>
                                    <input name="a_model_number" class="form-control input-sm" type="text" required=""/>
                                </div>
                                
<!--                                 <div class="form-group">
                                    <label>Frame Brand:</label>
                                    <input name="a_frame_brand" class="form-control input-sm" type="text" required=""/>
                                </div> -->
                                
                                <div class="form-group">
                                    <label>Frame Type:</label>
                                    <input name="a_frame_type" class="form-control input-sm" type="text" required=""/>
                                </div>

<!--                                 <div class="form-group">
                                    <label>Lens Type:</label>
                                    <input name="a_lens_type" class="form-control input-sm" type="text" required=""/>
                                </div> -->

                                <div class="form-group">
                                    <label>Lens Coating:</label>
                                    <input name="a_lens_coating" class="form-control input-sm" type="text" required=""/>
                                </div>

                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_sph" class="form-control input-sm" type="text" required=""/>
                                </div>

                                <div class="form-group">
                                    <label>Add:</label>
                                    <input name="a_add" class="form-control input-sm" type="text" required=""/>
                                </div>
                             
                                
                                <div class="form-group">
                                    <label>Supplier:</label>
                                    <select name="a_supplier" class="form-control input-sm select2" style="width:100%" required="">
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
                                    <label>Price:</label>
                                    <input name="a_price" class="form-control input-sm" type="number" required=""/>
                                </div>

                                <div class="form-group">
                                    <label>Quantity:</label>
                                    <input name="a_qty" class="form-control input-sm" type="number" required=""/>
                                </div>
                                  
                            </div>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add" value="Add Products Offer"/>
                    </div>
                </div>
              </div>
              </form>
            </div>

<script type="text/javascript">
    $(document).ready(function() {
 
        var timeOut = null; // this used for hold few seconds to made ajax request
 
        var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here
 
        //when button is clicked
        $('#username').keyup(function(e){
 
            // when press the following key we need not to make any ajax request, you can customize it with your own way
            switch(e.keyCode)
            {
                //case 8:   //backspace
                case 9:     //tab
                case 13:    //enter
                case 16:    //shift
                case 17:    //ctrl
                case 18:    //alt
                case 19:    //pause/break
                case 20:    //caps lock
                case 27:    //escape
                case 33:    //page up
                case 34:    //page down
                case 35:    //end
                case 36:    //home
                case 37:    //left arrow
                case 38:    //up arrow
                case 39:    //right arrow
                case 40:    //down arrow
                case 45:    //insert
                //case 46:  //delete
                    return;
            }
            if (timeOut != null)
                clearTimeout(timeOut);
            timeOut = setTimeout(is_available, 500);  // delay delay ajax request for 1000 milliseconds
            $('#user_msg').html(loading_html); // adding the loading text or image
        });
  });
function is_available(){
    //get the username
    var username = $('#username').val();
 
    //make the ajax request to check is username available or not
    $.post("check_username.php", { username: username },
    function(result)
    {
        console.log(result);
        if(result != 0)
        {
            $('#user_msg').html('Not Available');
            document.getElementById("btn_add").disabled = true;
        }
        else
        {
            $('#user_msg').html('<span style="color:#006600;">Available</span>');
            document.getElementById("btn_add").disabled = false;
        }
    });
 
}
</script>
