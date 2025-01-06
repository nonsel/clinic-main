<?php
include "../connection.php";
require '../../vendor/autoload.php';


$id = $_GET['id'] ?? '';

$sql = "SELECT 
			tsp.*,
			(SELECT CONCAT(firstname,' ',lastname) FROM tblpatient p WHERE p.id = tsp.patient_id) as full_name,
			(SELECT name FROM tblsupplier s WHERE s.id = tsp.supplier_id) as supplier_name
		FROM 
			tblspecialprescription  tsp
		WHERE 
			tsp.id = '$id' 
		LIMIT 1";
$result = $con->query($sql);

$data = [];

while($row = $result->fetch_array(MYSQLI_ASSOC)){
    $temp = [];
    foreach ($row as $key => $value) {
      $temp[$key] = $value !== null ? htmlentities($value) : '';
    }
    $data[] = $temp;
}


if(count($data)<1){
	echo "No Data Found!";
	exit();
}
$full_name="";
$table = "<style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>";
$table .= "<table style='width:100%'>";

foreach ($data as $key => $value) {
	$full_name = $value['full_name'];
	$table .= "<tr>";
		$table .= "<td>Patient:</td>";
		$table .= "<td colspan='5'>".$value['full_name']."</td>";
	$table .= "</tr>";
	$table .= "<tr>";
		$table .= "<td>Supplier:</td>";
		$table .= "<td colspan='5'>".$value['supplier_name']."</td>";
	$table .= "</tr>";
	$table .= "<tr>";
		$table .= "<td>Date:</td>";
		$table .= "<td colspan='5'>".$value['date']."</td>";
	$table .= "</tr>";
	$table .= "<tr>";
		$table .= "<td>Due Date:</td>";
		$table .= "<td colspan='5'>".$value['due_date']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td colspan='6'><hr></td>";
	$table .= "</tr>";

	// **************************************************************** OD
	$table .= "<tr>";
		$table .= "<td>OD SPH:</td>";
		$table .= "<td>".$value['od_sph']."</td>";

		$table .= "<td>OD CYL:</td>";
		$table .= "<td>".$value['od_cyl']."</td>";

		$table .= "<td>OD AXIS:</td>";
		$table .= "<td>".$value['od_axis']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>OD ADD:</td>";
		$table .= "<td>".$value['od_add']."</td>";

		$table .= "<td>OD PRISM/BASE::</td>";
		$table .= "<td>".$value['od_prism_base']."</td>";

		$table .= "<td>OD PD:</td>";
		$table .= "<td>".$value['od_pd']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>OD QUANITY:</td>";
		$table .= "<td colspan='6'>".$value['od_quantity']."</td>";
	$table .= "</tr>";


	$table .= "<tr>";
		$table .= "<td colspan='6'><hr></td>";
	$table .= "</tr>";


	// **************************************************************** OS
	$table .= "<tr>";
		$table .= "<td>OS SPH:</td>";
		$table .= "<td>".$value['os_sph']."</td>";

		$table .= "<td>OS CYL:</td>";
		$table .= "<td>".$value['os_cyl']."</td>";

		$table .= "<td>OS AXIS:</td>";
		$table .= "<td>".$value['os_axis']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>OS ADD:</td>";
		$table .= "<td>".$value['os_add']."</td>";

		$table .= "<td>OS PRISM/BASE::</td>";
		$table .= "<td>".$value['os_prism_base']."</td>";

		$table .= "<td>OS PD:</td>";
		$table .= "<td>".$value['os_pd']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>OS QUANITY:</td>";
		$table .= "<td colspan='6'>".$value['os_quantity']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td colspan='6'><hr></td>";
	$table .= "</tr>";



	$table .= "<tr>";
		$table .= "<td>DBC:</td>";
		$table .= "<td colspan='5'>".$value['dbc']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>LFV:</td>";
		$table .= "<td colspan='5'>".$value['lfv']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>TINT:</td>";
		$table .= "<td colspan='5'>".$value['tint']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>LENS:</td>";
		$table .= "<td colspan='5'>".$value['lens']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>FRAME CODE:</td>";
		$table .= "<td colspan='5'>".$value['frame_code']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>FRAME TYPE:</td>";
		$table .= "<td colspan='5'>".$value['frame_type']."</td>";
	$table .= "</tr>";


	$frame_material = ($value['frame_material']==1) ? "METAL" : "PLASTIC" ;
	$table .= "<tr>";
		$table .= "<td>FRAME MATERIAL:</td>";
		$table .= "<td colspan='5'>".$frame_material."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>DESCRIPTION:</td>";
		$table .= "<td colspan='5'>".$value['description']."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>REMARKS:</td>";
		$table .= "<td colspan='5'>".$value['remarks']."</td>";
	$table .= "</tr>";

	$status = ($value['status']==1) ? "CLAIMED" : "UNCLAIMED" ;
	$table .= "<tr>";
		$table .= "<td>STATUS:</td>";
		$table .= "<td colspan='5'>".$status."</td>";
	$table .= "</tr>";

	$table .= "<tr>";
		$table .= "<td>CLAIMED DATE:</td>";
		$table .= "<td colspan='5'>".$value['claimed_date']."</td>";
	$table .= "</tr>";

}
$table .= "</table>";
// echo $table;

// exit();


// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();
$dompdf->loadHtml($table);

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
// $dompdf->stream();
$dompdf->stream($full_name." - Special Prescription", array("Attachment" => false));


?>