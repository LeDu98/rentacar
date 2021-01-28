<?php

include('../../database_connection.php');
$query = '';
$output = array();
$query .= "SELECT rent.idvozilo as idvozilo, rent.idklijent as idklijent, vozilo.model as vozilo, klijent.ime as klijent, datumod, datumdo, vraceno 
FROM rent JOIN vozilo ON vozilo.idvozilo = rent.idvozilo JOIN klijent ON klijent.idklijent = rent.idklijent ";


if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$_POST['order']['0']['column'].' '.$_POST['order']['0']['dir'].' ';
}

if($_POST["length"] != -1)
{
 $query .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}


$statement = $connect->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["vozilo"];
 $sub_array[] = $row["klijent"];
 $sub_array[] = $row["datumod"];
 $sub_array[] = $row["datumdo"];
 if($row["vraceno"] == "1"){
    $sub_array[] = "Da";
 }else{
    $sub_array[] = "Ne";
 }
 $sub_array[] = '<button type="button" name="view" idvozilo="'.$row["idvozilo"].'" idklijent="'.$row["idklijent"].'" class="btn btn-primary btn-xs view">Pregled</button>';
 $sub_array[] = '<button type="button" name="delete" idvozilo="'.$row["idvozilo"].'" idklijent="'.$row["idklijent"].'" class="btn btn-danger btn-xs delete">Obrisi</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT vozilo.model as vozilo, klijent.ime as klijent, datumod, datumdo, vraceno 
 FROM rent JOIN vozilo ON vozilo.idvozilo = rent.idvozilo JOIN klijent ON klijent.idklijent = rent.idklijent ");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  $filtered_rows,
 "recordsFiltered" => get_total_all_records($connect),
 "data"    => $data
);
echo json_encode($output);
?>