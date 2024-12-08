<div id="addModal" class="modal fade">
    <form method="post">
        <div class="modal-dialog modal-lg" style="width:600px !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Add Patient</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Firstname:</label>
                                <input name="firstname" class="form-control input-sm" type="text"
                                    placeholder="Enter firstname" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Middlename:</label>
                                <input name="middlename" class="form-control input-sm" type="text"
                                    placeholder="Enter middlename" />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Lastname:</label>
                                <input name="lastname" class="form-control input-sm" type="text"
                                    placeholder="Enter lastname" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Suffix:</label>
                                <input name="suffix" class="form-control input-sm" type="text"
                                    placeholder="Enter suffix"/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Phone No:</label>
                                <input name="phoneno" class="form-control input-sm" type="text"
                                    placeholder="Enter phone number" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date of Birth:</label>
                                <input name="date_of_birth" class="form-control input-sm" type="date"
                                    placeholder="Enter date of birth" required />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>PWD Citizen no.:</label>
                                <input name="pwd_citizen_no" class="form-control input-sm" type="text"
                                    placeholder="Enter PWD Citizen No."/>
                            </div>
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label>Senior Citizen no.:</label>
                                <input name="senior_citizen_no" class="form-control input-sm" type="text"
                                    placeholder="Enter Senior Citizen No."/>
                            </div>
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label>Home Address:</label>
                                <input name="home_address" class="form-control input-sm" type="text"
                                    placeholder="Enter Home Address" required />
                            </div>
                        </div>
                       <div class="col-md-12">
                            <div class="form-group">
                                <label>Medical History</label>
                                <textarea name="medical_history" class="form-control input-sm" type="text"
                                    placeholder="Enter Medical History" required></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="button" class="btn btn-default btn-sm" data-dismiss="modal" value="Cancel" />
                    <input type="submit" class="btn btn-primary btn-sm" name="btn_add" id="btn_add"
                        value="Add Patient" />
                </div>
            </div>
        </div>
    </form>
</div>
<script type="text/javascript">
    $(document).ready(function () {

        var timeOut = null; // this used for hold few seconds to made ajax request

        var loading_html = '<img src="../../img/ajax-loader.gif" style="height: 20px; width: 20px;"/>'; // just an loading image or we can put any texts here

        //when button is clicked
        $('#username').keyup(function (e) {

            // when press the following key we need not to make any ajax request, you can customize it with your own way
            switch (e.keyCode) {
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
    function is_available() {
        //get the username
        var username = $('#username').val();

        //make the ajax request to check is username available or not
        $.post("check_username.php", { username: username },
            function (result) {
                console.log(result);
                if (result != 0) {
                    $('#user_msg').html('Not Available');
                    document.getElementById("btn_add").disabled = true;
                }
                else {
                    $('#user_msg').html('<span style="color:#006600;">Available</span>');
                    document.getElementById("btn_add").disabled = false;
                }
            });

    }
</script>