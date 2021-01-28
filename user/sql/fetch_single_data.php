<?php

//fetch_single_data.php

include('../../database_connection.php');
include('../../model/user.php');

if(isset($_POST["id"]))
{
 $id = $_POST["id"];
 $query = "SELECT ime, prezime FROM klijent WHERE idklijent = $id";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $user = new User();
 $user->setFirstName($row['ime']);
 $user->setLastName($row['prezime']);

 echo json_encode($user);
}

?>
