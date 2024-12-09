<div id="editModal" class="modal fade">
    <form id="form-edit" method="post">
              <div class="modal-dialog modal-sm" style="width:700px !important;">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title">Edit Prescription</h4>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Rx ID:</label>
                                    <input name="id" class="form-control input-sm" type="text" readonly/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Patient:</label>
                                    <select name="patient_id" class="form-control input-sm select2" style="width:100%" required="">
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
                                    <input name="prescription_date" class="form-control input-sm" type="text" value="<?= date("Y-m-d") ?>" disabled="" />
                                </div>
                            </div>

                            <!--****************************** OD RIGHT ******************************!-->
                            <div class="col-md-12" style="margin-top: 30px;">
                                <div class="form-group">
                                    <label><h3>OD (Right)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="refraction_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="refraction_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="refraction_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="refraction_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="refraction_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="refraction_od_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <!--****************************** OS LEFT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>OS (LEFT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="refraction_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="refraction_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="refraction_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="refraction_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="refraction_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="refraction_os_pd" class="form-control input-sm" type="text" value=""/>
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
                                    <input name="spectacle_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="spectacle_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="spectacle_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="spectacle_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="spectacle_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="spectacle_od_pd" class="form-control input-sm" type="text" value=""/>
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
                                    <input name="spectacle_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="spectacle_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="spectacle_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="spectacle_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="spectacle_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="spectacle_os_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <!--****************************** CONTACT LENS RIGHT ******************************!-->

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label><h3>CONTACT LENS (LEFT)</h3></label>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>SPH:</label>
                                    <input name="contact_lens_od_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="contact_lens_od_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="contact_lens_od_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="contact_lens_od_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="contact_lens_od_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="contact_lens_od_pd" class="form-control input-sm" type="text" value=""/>
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
                                    <input name="contact_lens_os_sph" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>CYL:</label>
                                    <input name="contact_lens_os_cyl" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>AXIS:</label>
                                    <input name="contact_lens_os_axis" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>ADD:</label>
                                    <input name="contact_lens_os_add" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PRISM/BASE:</label>
                                    <input name="contact_lens_os_prism_base" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>PD:</label>
                                    <input name="contact_lens_os_pd" class="form-control input-sm" type="text" value=""/>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>DIAGNOSIS:</label>
                                    <textarea name="diagnosis" class="form-control input-sm"></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Frame Type:</label>
                                    <select name="frame_type" class="form-control input-sm select2" style="width:100%" required="">
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
                        <input type="submit" class="btn btn-success btn-sm" name="btn_add" id="btn_add" value="Update"/>
                    </div>
                </div>
              </div>
    </form>
</div>