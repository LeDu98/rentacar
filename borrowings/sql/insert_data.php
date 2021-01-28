<?php


include('../../database_connection.php');

if(isset($_POST["idvozilo"]))
{
 $error = '';
 $success = '';
 $idvozilo = '';
 $idklijent = '';
 $datumod = '';
 $datumdo = '';
 $vraceno = '';

 if(empty($_POST["idvozilo"]))
 {
  $error .= '<p>Niste uneli ID vozila</p>';
 }
 else
 {
  $idvozilo = $_POST["idvozilo"];
 }


 if(empty($_POST["userId"]))
 {
  $error .= '<p>Niste uneli ID klijenta</p>';
 }
 else
 {
  $idklijent = $_POST["userId"];
 }


 if(empty($_POST["borrowed"]))
 {
  $error .= '<p>Niste uneli datum iznajmljivanja</p>';
 }
 else
 {
  $datumod = $_POST["borrowed"];
 }

 if(empty($_POST["returningDate"]))
 {
  $error .= '<p>Niste uneli datum razduzivanja</p>';
 }
 else
 {
  $datumdo = $_POST["returningDate"];
 }
 if(empty($_POST["returned"]))
 {
  $error .= '<p>Niste uneli čekirali da li je vozilo vraceno</p>';
 }
 else
 {
     if($_POST["returned"] == "yes"){
         $vraceno = 1;
     }
     else{
        $vraceno = 0;
     }
 }


 if($error == '')
 {
  $data = array(
   ':idvozilo'   => $idvozilo,
   ':idklijent'  => $idklijent,
   ':datumod' => $datumod,
   ':datumdo' => $datumdo,
   ':vraceno' => $vraceno
  );

  $query = "
  INSERT INTO rent
  VALUES (:idvozilo, :idklijent, :datumod, :datumdo, :vraceno)
  ";
  $statement = $connect->prepare($query);
  $statement->execute($data);
  $success = 'Uspešno uneti podaci o iznajmljivanju';
 }
 $output = array(
  'success'  => $success,
  'error'   => $error
 );
 echo json_encode($output);
}

?>