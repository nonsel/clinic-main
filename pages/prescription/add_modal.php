<!-- ========================= MODAL ======================= -->
            <div id="addModal" class="modal fade">
            <form method="post">
              <div class="modal-dialog modal-sm" style="width:700px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Add Prescription</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rx ID:</label>
                                    <input name="a_rx_id" class="form-control input-sm" type="text" disabled="" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Patient:</label>
                                    <select name="a_patient" class="form-control input-sm select2" style="width:100%" required="">
                                        <option disabled selected value="">-- Select --</option>
                                        <?php
                                                $patient = mysqli_query($con,"SELECT * FROM tblpatient");
                                                while($rowc = mysqli_fetch_array($patient)){
                                                    echo '
                                                    <option value="'.$rowc['id'].'">'.$rowc['firstname'].' '.$rowc['lastname'].'</option>';
                                                }
                                        ?>   
                                    </select>
                                </div>
                            </div> 

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Date:</label>
                                    <input name="a_date" class="form-control input-sm" type="text" value="<?= date("Y-m-d") ?>" disabled="" />
                                </div>
                            </div>

                            <!--****************************** OD RIGHT ******************************!-->
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="form-group">
                                    <label><h3>REFRACTION OD (Right)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_refraction_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_refraction_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_refraction_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_refraction_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_refraction_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_refraction_od_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <!--****************************** OS LEFT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>REFRACTION OS (LEFT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_refraction_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_refraction_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_refraction_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_refraction_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_refraction_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_refraction_os_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <!--****************************** SPECTACLE PRESCRIPTION RIGHT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>SPECTACLE PRESCRIPTION (RIGHT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_spectacle_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_spectacle_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_spectacle_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_spectacle_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_spectacle_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_spectacle_od_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <!--****************************** SPECTACLE PRESCRIPTION LEFT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>SPECTACLE PRESCRIPTION (LEFT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_spectacle_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_spectacle_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_spectacle_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_spectacle_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_spectacle_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_spectacle_os_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <!--****************************** CONTACT LENS RIGHT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>CONTACT LENS (RIGHT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_contact_lens_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_contact_lens_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_contact_lens_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_contact_lens_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_contact_lens_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_contact_lens_od_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <!--****************************** CONTACT LENS LEFT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>CONTACT LENS (LEFT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="a_contact_lens_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="a_contact_lens_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="a_contact_lens_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="a_contact_lens_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="a_contact_lens_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="a_contact_lens_os_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DIAGNOSIS:</label>
                                    <textarea name="a_diagnosis" class="form-control input-sm"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Frame Type:</label>
                                    <select name="a_frame_type" class="form-control input-sm select2" style="width:100%" required="">
                                        <option disabled selected value="">-- Select --</option>
                                        <option value="1">Full Rim</option>
                                        <option value="2">Semi Rim</option>
                                        <option value="3">Rimless</option>
                                    </select>
                                </div> 
                            </div> 


                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel"/>
                        <input type="submit" class="btn btn-success btn-sm" name="btn_add" id="btn_add" value="Create"/>
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