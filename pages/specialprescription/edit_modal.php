<div id="editModal" class="modal fade">
    <form id="form-edit" method="post">
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
                                <input name="id" class="form-control input-sm" type="hidden" value=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <label>PATIENT:</label>
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

                        <div class="form-group">
                            <div class="col-md-12">
                                <label>SUPLLIER:</label>
                                <select name="supplier_id" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select --</option>
                                    <?php
                                            $patient = mysqli_query($con,"SELECT * FROM tblsupplier");
                                            while($rowc = mysqli_fetch_array($patient)){
                                                echo '
                                                <option value="'.$rowc['id'].'">'.$rowc['name'].'</option>';
                                            }
                                    ?>   
                                </select>
                            </div>
                        </div> 

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Date:</label>
                                <input name="date" class="form-control input-sm" type="date" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Due Date:</label>
                                <input name="due_date" class="form-control input-sm" type="date" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD SPH:</label>
                                <input name="od_sph" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD CYL:</label>
                                <input name="od_cyl" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD AXIS:</label>
                                <input name="od_axis" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD ADD:</label>
                                <input name="od_add" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD PRISM/BASE:</label>
                                <input name="od_prism_base" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD PD:</label>
                                <input name="od_pd" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OD QUANITY:</label>
                                <input name="od_qty" class="form-control input-sm" type="number" value=""/>
                            </div>
                        </div>




                        <div class="col-md-12">
                            <div class="form-group">
                                <hr>
                            </div>
                        </div>
                        


                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS SPH:</label>
                                <input name="os_sph" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS CYL:</label>
                                <input name="os_cyl" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS AXIS:</label>
                                <input name="os_axis" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS ADD:</label>
                                <input name="os_add" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS PRISM/BASE:</label>
                                <input name="os_prism_base" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS PD:</label>
                                <input name="os_pd" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>OS QUANITY:</label>
                                <input name="os_qty" class="form-control input-sm" type="number" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>DBC:</label>
                                <input name="dbc" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>LFV:</label>
                                <input name="lfv" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>TINT:</label>
                                <input name="tint" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>LENS:</label>
                                <input name="lens" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>FRAME CODE:</label>
                                <input name="frame_code" class="form-control input-sm" type="text" value=""/>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Frame Type:</label>
                                <select name="frame_type" class="form-control input-sm select2" style="width:100%">
                                    <option disabled selected value="">-- Select --</option>
                                    <option value="1">Full Rim</option>
                                    <option value="2">Semi Rim</option>
                                    <option value="3">Rimless</option>
                                </select>
                            </div> 
                        </div> 

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Frame MATERIAL:</label>
                                <select name="frame_material" class="form-control input-sm select2" style="width:100%">
                                    <option disabled selected value="">-- Select --</option>
                                    <option value="1">Metal</option>
                                    <option value="2">Plastic</option>
                                </select>
                            </div> 
                        </div> 


                       <div class="col-md-12">
                            <div class="form-group">
                                <label>DESCRIPTION:</label>
                                <textarea name="description" class="form-control input-sm"></textarea>
                            </div>
                        </div>

                       <div class="col-md-12">
                            <div class="form-group">
                                <label>REMARKS:</label>
                                <textarea name="remarks" class="form-control input-sm"></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>STATUS</label>
                                <select name="status" class="form-control input-sm select2" style="width:100%" required="">
                                    <option disabled selected value="">-- Select --</option>
                                    <option value="1">Claimed</option>
                                    <option value="2">Unclaimed</option>
                                </select>
                            </div> 
                        </div> 

                        <div class="col-md-12">
                            <div class="form-group">
                                <label>CLAIMED DATE:</label>
                                <input name="claimed_date" class="form-control input-sm" type="date" value=""/>
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
</div>'
