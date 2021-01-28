<?php

include('../../database_connection.php');

if(isset($_POST["model"]))
{
 $error = '';
 $success = '';
 $model = '';
 $registracija = '';
 $godina = '';


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
   ':godina' => $godina,
  );

  $query = "
  INSERT INTO vozilo 
  (model, registracija, godina) 
  VALUES (:model, :registracija, :godina)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Uspesno uneto vozilo';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>


