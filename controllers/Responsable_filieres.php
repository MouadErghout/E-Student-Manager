<?php
include_once "Controller.php";

class Responsable_filieres extends Controller
{
    public function __construct()
    {
        parent::__construct('Responsable_filiere');
        parent::__construct('Eleve');
        parent::__construct('Note');
        parent::__construct('Moyenne');

    }

    public function index()
    {
        if(isset($_SESSION['Responsable_filieres']))
        {
            $this->view("index",Responsable_filiere::find($_SESSION['Responsable_filieres']));
        }else $this->view("index");
    }

    public function show($login)
    {
        include_once ROOT.'models/Eleve.php';
       $this->view("show",Eleve::find($login));
       $this->view("Nshow", Note::All($login));
       $this->view("Mshow", Moyenne::find($login));
    }

    public function destroy($id)
    {
        $P=Responsable_filiere::find($id);
        $P->delete();
        $this->redirect("../../Responsable_filieres");
    }

    public function store($request)
    {
        $P=new Responsable_filiere();
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->specialite=$request->specialite;
        $P->save();
        $this->redirect("../Responsable_filieres");
    }

    public function edit($id)
    {
        parent::view("form",Responsable_filiere::find($id));
    }

    public function update($id,$request)
    {
        $P=Responsable_filiere::find($id);
        $P->nom=$request->nom;
        $P->prenom=$request->prenom;
        $P->specialite=$request->specialite;
        $P->save();
        $this->redirect("../../Responsable_filieres");
    }

    public function create()
    {
        parent::view("form");
    }

    public function Niveau($niveau)
    {
        $_SERVER[$niveau]=Responsable_filiere::MoyNiv($niveau);
        $this->view("Eleve", Eleve::All($niveau));
    }
}