<?php

include_once "Controller.php";

class Eleves extends Controller
{
    public function __construct()
    {
        parent::__construct('Eleve');
        parent::__construct('Note');
        parent::__construct('Moyenne');

    }

    public function index()
    {
        if(isset($_SESSION['Eleves']))
        {
            $this->view("index",Eleve::find($_SESSION['Eleves']));
            $this->view("show", Note::All($_SESSION['Eleves']));
            $this->view("Mshow", Moyenne::find($_SESSION['Eleves']));

        }else $this->view("index");

    }


}
