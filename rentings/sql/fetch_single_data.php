 <?php


include('../../database_connection.php');
include('../../model/rentings.php');

if(isset($_POST["idvozilo"]))
{
 $idvozilo = $_POST["idvozilo"];
 $idklijent = $_POST["iduser"];

 $query = "SELECT rent.idvozilo as idvozilo, rent.idklijent as idklijent, vozilo.model as vozilo, 
 klijent.ime as klijent, datumod, datumdo, 
 CASE rent.vraceno WHEN 1 THEN "."'Da' "." ELSE "."'Ne' "."END as 'vraceno' 
 FROM rent JOIN vozilo ON vozilo.idvozilo = rent.idvozilo JOIN klijent ON klijent.idklijent = rent.idklijent 
 WHERE rent.idvozilo = '$idvozilo' and rent.idklijent ='$idklijent'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $renting = new Rentings();
 $renting->setIdvozilo($row['idvozilo']);
 $renting->setUserId($row['idklijent']);
 $renting->setRented($row['datumod']);
 $renting->setReturningDate($row['datumdo']);
 $renting->setReturned($row['vraceno']);
 
 echo json_encode($renting);
}

?>