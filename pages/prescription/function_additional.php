<?php

include "../connection.php";

if(isset($_POST['get_prescription'])){



        $sql = "SELECT * FROM tblprescription WHERE id = ".$_POST['id']." LIMIT 1";
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

if( isset($_POST['delete']) ){

    $id = $_POST['id'];

    $sql = "UPDATE 
                tblprescription 
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


if(isset($_POST['update'])){

    $id = $_POST['id'];
    $patient_id = $_POST['patient_id'];

    $refraction_od_sph = $_POST['refraction_od_sph'];
    $refraction_od_cyl = $_POST['refraction_od_cyl'];
    $refraction_od_axis = $_POST['refraction_od_axis'];
    $refraction_od_add = $_POST['refraction_od_add'];
    $refraction_od_prism_base = $_POST['refraction_od_prism_base'];
    $refraction_od_pd = $_POST['refraction_od_pd'];

    $refraction_os_sph = $_POST['refraction_os_sph'];
    $refraction_os_cyl = $_POST['refraction_os_cyl'];
    $refraction_os_axis = $_POST['refraction_os_axis'];
    $refraction_os_add = $_POST['refraction_os_add'];
    $refraction_os_prism_base = $_POST['refraction_os_prism_base'];
    $refraction_os_pd = $_POST['refraction_os_pd'];

    $spectacle_od_sph = $_POST['spectacle_od_sph'];
    $spectacle_od_cyl = $_POST['spectacle_od_cyl'];
    $spectacle_od_axis = $_POST['spectacle_od_axis'];
    $spectacle_od_add = $_POST['spectacle_od_add'];
    $spectacle_od_prism_base = $_POST['spectacle_od_prism_base'];
    $spectacle_od_pd = $_POST['spectacle_od_pd'];

    $spectacle_os_sph = $_POST['spectacle_os_sph'];
    $spectacle_os_cyl = $_POST['spectacle_os_cyl'];
    $spectacle_os_axis = $_POST['spectacle_os_axis'];
    $spectacle_os_add = $_POST['spectacle_os_add'];
    $spectacle_os_prism_base = $_POST['spectacle_os_prism_base'];
    $spectacle_os_pd = $_POST['spectacle_os_pd'];

    $contact_lens_od_sph = $_POST['contact_lens_od_sph'];
    $contact_lens_od_cyl = $_POST['contact_lens_od_cyl'];
    $contact_lens_od_axis = $_POST['contact_lens_od_axis'];
    $contact_lens_od_add = $_POST['contact_lens_od_add'];
    $contact_lens_od_prism_base = $_POST['contact_lens_od_prism_base'];
    $contact_lens_od_pd = $_POST['contact_lens_od_pd'];

    $contact_lens_os_sph = $_POST['contact_lens_os_sph'];
    $contact_lens_os_cyl = $_POST['contact_lens_os_cyl'];
    $contact_lens_os_axis = $_POST['contact_lens_os_axis'];
    $contact_lens_os_add = $_POST['contact_lens_os_add'];
    $contact_lens_os_prism_base = $_POST['contact_lens_os_prism_base'];
    $contact_lens_os_pd = $_POST['contact_lens_os_pd'];

    $diagnosis = $_POST['diagnosis'];
    $frame_type = $_POST['frame_type'];


    $sql = "UPDATE 
                tblprescription 
            SET 
                patient_id='$patient_id',

                refraction_od_sph='$refraction_od_sph',
                refraction_od_cyl='$refraction_od_cyl',
                refraction_od_axis='$refraction_od_axis',
                refraction_od_add='$refraction_od_add',
                refraction_od_prism_base='$refraction_od_prism_base',
                refraction_od_pd='$refraction_od_pd',

                refraction_os_sph='$refraction_os_sph',
                refraction_os_cyl='$refraction_os_cyl',
                refraction_os_axis='$refraction_os_axis',
                refraction_os_add='$refraction_os_add',
                refraction_os_prism_base='$refraction_os_prism_base',
                refraction_os_pd='$refraction_os_pd',

                spectacle_od_sph='$spectacle_od_sph',
                spectacle_od_cyl='$spectacle_od_cyl',
                spectacle_od_axis='$spectacle_od_axis',
                spectacle_od_add='$spectacle_od_add',
                spectacle_od_prism_base='$spectacle_od_prism_base',
                spectacle_od_pd='$spectacle_od_pd',

                spectacle_os_sph='$spectacle_os_sph',
                spectacle_os_cyl='$spectacle_os_cyl',
                spectacle_os_axis='$spectacle_os_axis',
                spectacle_os_add='$spectacle_os_add',
                spectacle_os_prism_base='$spectacle_os_prism_base',
                spectacle_os_pd='$spectacle_os_pd',

                contact_lens_od_sph='$contact_lens_od_sph',
                contact_lens_od_cyl='$contact_lens_od_cyl',
                contact_lens_od_axis='$contact_lens_od_axis',
                contact_lens_od_add='$contact_lens_od_add',
                contact_lens_od_prism_base='$contact_lens_od_prism_base',
                contact_lens_od_pd='$contact_lens_od_pd',

                contact_lens_os_sph='$contact_lens_os_sph',
                contact_lens_os_cyl='$contact_lens_os_cyl',
                contact_lens_os_axis='$contact_lens_os_axis',
                contact_lens_os_add='$contact_lens_os_add',
                contact_lens_os_prism_base='$contact_lens_os_prism_base',
                contact_lens_os_pd='$contact_lens_os_pd',

                diagnosis='$diagnosis',
                frame_type='$frame_type'
            WHERE 
                id='$id'";

    if ($con->query($sql) === TRUE) {
      // echo "Record updated successfully";
    } else {
      echo "Error updating record: " . $con->error;
    }



}



?>