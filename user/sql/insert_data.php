<?php

//insert_data.php

include('../../database_connection.php');

if(isset($_POST["firstName"]))
{
 $error = '';
 $success = '';
 $ime = '';
 $prezime = '';


 if(empty($_POST["firstName"]))
 {
  $error .= '<p>Niste uneli ime</p>';
 }
 else
 {
  $ime = $_POST["firstName"];
 }


 if(empty($_POST["lastName"]))
 {
  $error .= '<p>Niste uneli prezime</p>';
 }
 else
 {
  $prezime = $_POST["lastName"];
 }



 if($error == '')
 {
  $data = array(
   ':ime'   => $ime,
   ':prezime'  => $prezime,
  );

  $query = "
  INSERT INTO klijent 
  (ime, prezime) 
  VALUES (:ime, :prezime)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Klijent je uspesno dodat';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>