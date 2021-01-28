<?php

//fetch.php

include('../../database_connection.php');
$query = '';
$output = array();
$query .= "SELECT * FROM klijent ";


if(isset($_POST["search"]["value"]))
{
    $query .= 'WHERE ime LIKE "%'.$_POST["search"]["value"].'%" OR prezime LIKE "%'.$_POST["search"]["value"].'%" ';
}else{
}


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
 $sub_array[] = $row["idklijent"];
 $sub_array[] = $row["ime"];
 $sub_array[] = $row["prezime"];
 $sub_array[] = '<button type="button" name="view" id="'.$row["idklijent"].'" class="btn btn-primary btn-xs view">Pregled</button>';
 $sub_array[] = '<button type="button" name="update" id="'.$row["idklijent"].'" class="btn btn-warning btn-xs update">Azuriraj</button>';
 $sub_array[] = '<button type="button" name="delete" id="'.$row["idklijent"].'" class="btn btn-danger btn-xs delete">Obrisi</button>';
 $data[] = $sub_array;
}

function get_total_all_records($connect)
{
 $statement = $connect->prepare("SELECT * FROM klijent");
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
