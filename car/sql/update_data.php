<?php

include('../../database_connection.php');

if(isset($_POST["model"]))
{
 $error = '';
 $success = '';
 $model = '';
 $registracija = '';
 $godina = '';
 $id = $_POST["id"];
 if(empty($_POST["model"]))
 {
  $error .= '<p>Niste uneli model</p>';
 }
 else
 {
  $model = $_POST["model"];
 }
 if(empty($_POST["registracija"]))
 {
  $error .= '<p>Niste uneli registraciju</p>';
 }
 else
 {
  $registracija = $_POST["registracija"];
 }
 if(empty($_POST["godina"]))
 {
  $error .= '<p>Niste uneli godinu</p>';
 }
 else
 {
  $godina = $_POST["godina"];
 }

 if($error == '')
 {
  $data = array(
   ':model'   => $model,
   ':registracija'  => $registracija,
   ':godina'   => $godina,
   ':id'   => $_POST["id"]
  );

  $query = "
  UPDATE vozilo 
  SET model = :model,
  registracija = :registracija,
  godina = :godina
  WHERE idvozilo = :id
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Vozilo uspesno azurirano';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>
