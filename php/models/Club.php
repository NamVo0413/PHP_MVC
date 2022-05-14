<?php

namespace app\models;
use app\database;
use app\helpers\StringHelper;
class Club
{
    public ?int $ClubID = null;
    public ?string $ClubName = null;
    public ?string $Shortname=null;
    public ?string $StadiumID = null;
    public ?int $CoachID = null;
    public function load($data){
        $this->ClubID=$data['ClubID'];
        $this->ClubName=$data['ClubName'];
        $this->Shortname=$data['Shortname'];
        $this->StadiumID=$data['StadiumID'];
        $this->CoachID=$data['CoachID'];
    }
    public function save_Create()
    {
        $errors = [];
        $db=database::$db;
        /*echo '<pre>';
        var_dump($db);
        echo '</pre>';
        exit;*/
        $db->createClub($this);
        return $errors;
    }
    public function save_Update()
    {
        $errors = [];
        $db=database::$db;
        if (empty($errors)) {
            if($this->ClubID){
                $db->updateClub($this);
            }
        }
        /*echo '<pre>';
        var_dump($db);
        echo '</pre>';
        exit;*/
        return $errors;
    }
}