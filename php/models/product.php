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
        $this->PlayerID = $data['PlayerID'];
        $this->FullName = $data['FullName'];
        $this->ClubID = $data['ClubID'];
        $this->DOB = $data['DOB'];
        $this->Position = $data['Position'];
        $this->Nationality=$data['Nationality'];
        $this->Number=$data['Number'];
    }

    public function save_Update()
    {
        $errors = [];
        $db=database::$db;
        if (empty($errors)) {
            if($this->PlayerID){
                $db->updateProduct($this);
            }
        }
        /*echo '<pre>';
        var_dump($db);
        echo '</pre>';
        exit;*/
        return $errors;
    }
    public function save_Create()
    {
        $errors = [];
        $db=database::$db;
        /*echo '<pre>';
        var_dump($db);
        echo '</pre>';
        exit;*/
        $db->createProducts($this);
        return $errors;
    }
}