<?php
include "../connection.php";

if(isset($_POST['create'])){

	$patient_id = $_POST['patient_id'];
	$supplier_id = $_POST['supplier_id'];
	$date = $_POST['date'];
	$due_date = $_POST['due_date'];

	$od_sph = $_POST['od_sph'];
	$od_cyl = $_POST['od_cyl'];
	$od_axis = $_POST['od_axis'];
	$od_add = $_POST['od_add'];
	$od_prism_base = $_POST['od_prism_base'];
	$od_pd = $_POST['od_pd'];
	$od_qty = $_POST['od_qty'];

    $os_sph = $_POST['os_sph'];
    $os_cyl = $_POST['os_cyl'];
    $os_axis = $_POST['os_axis'];
    $os_add = $_POST['os_add'];
    $os_prism_base = $_POST['os_prism_base'];
    $os_pd = $_POST['os_pd'];
    $os_qty = $_POST['os_qty'];

	$dbc = $_POST['dbc'];
	$lfv = $_POST['lfv'];
	$tint = $_POST['tint'];
	$lens = $_POST['lens'];
	$frame_code = $_POST['frame_code'];
	$frame_type = $_POST['frame_type'];
	$frame_material = $_POST['frame_material'];
	$description = $_POST['description'];
	$remarks = $_POST['remarks'];
	$status = $_POST['status'];
	$claimed_date = $_POST['claimed_date'];
	$date_created = date("Y-m-d");



    $sql = "INSERT INTO 
                    tblspecialprescription 
                            (
                                patient_id,
                                supplier_id,
                                `date`,
                                due_date,

                                od_sph,
                                od_cyl,
                                od_axis,
                                od_add,
                                od_prism_base,
                                od_pd,
                                od_quantity,

                                os_sph,
                                os_cyl,
                                os_axis,
                                os_add,
                                os_prism_base,
                                os_pd,
                                os_quantity,

                                dbc,
                                lfv,
                                tint,
                                lens,
                                frame_code,
                                frame_type,
                                frame_material,
                                description,
                                remarks,
                                status,
                                claimed_date,
                                date_created
                            ) 

                    values (
                            '$patient_id',
                            '$supplier_id',
                            '$date',
                            '$due_date',

                            '$od_sph',
                            '$od_cyl',
                            '$od_axis',
                            '$od_add',
                            '$od_prism_base',
                            '$od_pd',
                            '$od_qty',

                            '$os_sph',
                            '$os_cyl',
                            '$os_axis',
                            '$os_add',
                            '$os_prism_base',
                            '$os_pd',
                            '$os_qty',

                            '$dbc',
                            '$lfv',
                            '$tint',
                            '$lens',
                            '$frame_code',
                            '$frame_type',
                            '$frame_material',
                            '$description',
                            '$remarks',
                            '$status',
                            '$claimed_date',
                            '$date_created'
                        )"; 

		if ($con->query($sql) === TRUE) {
	      // echo "Record create successfully";
	    } else {
	      echo "Error create record: " . $con->error;
	    }

        // $action = 'Added Special Prescription ID: '.$res['last_inset_id'];
        // $iquery = mysqli_query($con,"INSERT INTO tbllogs (user,logdate,action) values ('".$_SESSION['userid']."', NOW(), '".$action."')");

}

if( isset($_POST['delete']) ){

    $id = $_POST['id'];

    $sql = "UPDATE 
                tblspecialprescription 
            SET 
                is_delete=1
            WHERE 
                id='$id'";

    if ($con->query($sql) === TRUE) {
      // echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }

}


if( isset($_POST['get_prescription']) ){

	$sql = "SELECT *, od_quantity as od_qty, os_quantity as os_qty FROM tblspecialprescription WHERE id = ".$_POST['id']." LIMIT 1";
    $result = $con->query($sql);

    $data = [];

    while($row = $result->fetch_array(MYSQLI_ASSOC)){
        $temp = [];
        foreach ($row as $key => $value) {
          $temp[$key] = $value !== null ? htmlentities($value) : '';
        }
        $data[] = $temp;
    }

    echo json_encode($data);

}

if( isset($_POST['update']) ){


	$id = $_POST['id'];
	$patient_id = $_POST['patient_id'];
	$supplier_id = $_POST['supplier_id'];
	$date = $_POST['date'];
	$due_date = $_POST['due_date'];

	$od_sph = $_POST['od_sph'];
	$od_cyl = $_POST['od_cyl'];
	$od_axis = $_POST['od_axis'];
	$od_add = $_POST['od_add'];
	$od_prism_base = $_POST['od_prism_base'];
	$od_pd = $_POST['od_pd'];
	$od_qty = $_POST['od_qty'];

    $os_sph = $_POST['os_sph'];
    $os_cyl = $_POST['os_cyl'];
    $os_axis = $_POST['os_axis'];
    $os_add = $_POST['os_add'];
    $os_prism_base = $_POST['os_prism_base'];
    $os_pd = $_POST['os_pd'];
    $os_qty = $_POST['os_qty'];

	$dbc = $_POST['dbc'];
	$lfv = $_POST['lfv'];
	$tint = $_POST['tint'];
	$lens = $_POST['lens'];
	$frame_code = $_POST['frame_code'];
	$frame_type = $_POST['frame_type'];
	$frame_material = $_POST['frame_material'];
	$description = $_POST['description'];
	$remarks = $_POST['remarks'];
	$status = $_POST['status'];
	$claimed_date = $_POST['claimed_date'];
	$date_created = date("Y-m-d");



    $sql = "UPDATE  
                tblspecialprescription 
            SET
                patient_id='$patient_id',
                supplier_id='$supplier_id',
                `date`='$date',
                due_date='$due_date',

                od_sph='$od_sph',
                od_cyl='$od_cyl',
                od_axis='$od_axis',
                od_add='$od_add',
                od_prism_base='$od_prism_base',
                od_pd='$od_pd',
                od_quantity='$od_qty',

                os_sph='$os_sph',
                os_cyl='$os_cyl',
                os_axis='$os_axis',
                os_add='$os_add',
                os_prism_base='$os_prism_base',
                os_pd='$os_pd',
                os_quantity='$os_qty',

                dbc='$dbc',
                lfv='$lfv',
                tint='$tint',
                lens='$lens',
                frame_code='$frame_code',
                frame_type='$frame_type',
                frame_material='$frame_material',
                description='$description',
                remarks='$remarks',
                status='$status',
                claimed_date='$claimed_date'
            WHERE
            	id='$id'
                "; 

		if ($con->query($sql) === TRUE) {
	      echo "Record create successfully";
	    } else {
	      echo "Error create record: " . $con->error;
	    }

}


?>