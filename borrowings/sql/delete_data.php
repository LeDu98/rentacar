<?php

include('../../database_connection.php');

if(isset($_POST["idvozilo"]))
{
    $idvozilo = $_POST["idvozilo"];
    $idklijent = $_POST["iduser"];
    $query = "
    DELETE FROM rent 
    WHERE idvozilo = $idvozilo and idklijent = $idklijent";
    $statement = $connect->prepare($query);
    $statement->execute();
}
 
?>