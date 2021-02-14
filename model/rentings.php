<?php

class Rentings implements JsonSerializable
{
    private $carId;
    private $userId;
    private $rented;
    private $returningDate;
    private $returned;

    public function __construct()
    {
    }

    public function jsonSerialize() {
        return array(
            'car' => $this->carId,
            'user' => $this->userId,
            'rented' => $this->rented,
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

    public function getRented(){
        return $this->rented;
    }

    public function setRented($rented){
        $this->rented = $rented;
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
