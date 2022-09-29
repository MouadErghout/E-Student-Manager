<?php

include_once("Model.php");

class Note extends Model
{
    public $login, $code_elm_module,$designation, $note;


    public function saveNotes()
    {
        $req="update note set note=".$this->note." where login='".$this->login."' and code_elm_module='".$this->code_elm_module."'";
        echo $req;
        self::$pdo->exec($req);
    }
}