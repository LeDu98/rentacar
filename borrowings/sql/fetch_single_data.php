 <?php


include('../../database_connection.php');
include('../../model/borrowings.php');

if(isset($_POST["idvozilo"]))
{
 $idvozilo = $_POST["idvozilo"];
 $idklijent = $_POST["iduser"];

 $query = "SELECT rent.idvozilo as idvozilo, rent.idklijent as idklijent, vozilo.model as vozilo, 
 klijent.ime as klijent, datumod, datumdo, 
 CASE rent.vraceno WHEN 1 THEN "."'Da' "." ELSE "."'Ne' "."END as 'vraceno' 
 FROM rent JOIN vozilo ON vozilo.idvozilo = rent.idvozilo JOIN users ON klijent.idklijent = rent.idklijent 
 WHERE rent.idvozilo = '$idvozilo' and rent.idklijent ='$idklijent'";

 $statement = $connect->prepare($query);
 $statement->execute();
 $row = $statement->fetch(PDO::FETCH_ASSOC);
 $borrowing = new Borrowings();
 $borrowing->setIdvozilo($row['idvozilo']);
 $borrowing->setUserId($row['idklijent']);
 $borrowing->setBorrowed($row['datumod']);
 $borrowing->setReturningDate($row['datumdo']);
 $borrowing->setReturned($row['vraceno']);
 
 echo json_encode($borrowing);
}

?>