<?php

class Car implements JsonSerializable
{
    private $idvozilo;
    private $model;
    private $author;
    private $godina;

    public function __construct()
    {
    }

    public function jsonSerialize() {
        return array(
            'model' => $this->model,
            'registracija' => $this->registracija,
            'godina' => $this->godina,
       );
    }
    

    public function getIdvozilo()
    {
        return $this->idvozilo;
    }

    public function setIdvozilo($idvozilo)
    {
        $this->idvozilo = $idvozilo;
    }

    public function getModel(){
        return $this->model;
    }

    public function setModel($model){
        $this->model = $model;
    }

    public function getRegistracija(){
        return $this->registracija;
    }

    public function setRegistracija($registracija){
        $this->registracija = $registracija;
    }

    public function getGodina(){
        return $this->godina;
    }

    public function setGodina($godina){
        $this->godina = $godina;
    }

}
