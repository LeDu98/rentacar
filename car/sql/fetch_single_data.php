<?php

include('../../database_connection.php');
include('../../model/car.php');

if(isset($_POST["id"]))
{
 $id = $_POST["id"];
 $query = "SELECT model, registracija, godina FROM vozilo WHERE idvozilo = $id";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $vozilo = new Car();
 $vozilo->setModel($row['model']);
 $vozilo->setRegistracija($row['registracija']);
 $vozilo->setGodina($row['godina']);

 echo json_encode($vozilo);
}

?>
