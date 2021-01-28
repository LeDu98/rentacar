<?php

class Borrowings implements JsonSerializable
{
    private $carId;
    private $userId;
    private $borrowed;
    private $returningDate;
    private $returned;

    public function __construct()
    {
    }

    public function jsonSerialize() {
        return array(
            'car' => $this->carId,
            'user' => $this->userId,
            'borrowed' => $this->borrowed,
            'returningDate' => $this->returningDate,
            'returned' => $this->returned,
       );
    } 

    public function getIdvozilo()
    {
        return $this->idvozilo;
    }

    public function setIdvozilo($idvozilo)
    {
        $this->carId = $idvozilo;
    }

    public function getUserId(){
        return $this->userId;
    }

    public function setUserId($userId){
        $this->userId = $userId;
    }

    public function getBorrowed(){
        return $this->borrowed;
    }

    public function setBorrowed($borrowed){
        $this->borrowed = $borrowed;
    }

    public function getReturningDate(){
        return $this->returningDate;
    }

    public function setReturningDate($returningDate){
        $this->returningDate = $returningDate;
    }

    public function getReturned(){
        return $this->returned;
    }

    public function setReturned($returned){
        $this->returned = $returned;
    }

}
