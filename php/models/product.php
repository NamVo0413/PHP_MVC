<?php

namespace app\models;

use app\database;
use app\helpers\StringHelper;

class product
{
    public ?int $PlayerID = null;
    public ?string $FullName = null;
    public ?string $ClubID = null;
    public ?string $DOB = null;
    public ?string $Position = null;
    public ?string $Nationality = null;
    public ?int $Number=null;

    public function load($data)
    {
        $this->PlayerID = $data['PlayerID'] ?? null;
        $this->FullName = $data['FullName'];
        $this->ClubID = $data['ClubID'];
        $this->DOB = $data['DOB'];
        $this->Position = $data['Position'];
        $this->Nationality=$data['Nationality'];
        $this->Number=$data['Number'];
    }

    /*public function save()
    {
        $errors = [];
        if (empty($errors)) {
            $db=database::$db;
            if($this->id){
                //$db->updateProduct($this);
            }
            else{
                //$db->createProducts($this);
            }
        }
        return $errors;
    }*/
}