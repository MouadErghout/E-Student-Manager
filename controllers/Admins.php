<?php

function NotesCreat($login,$niveau)
{
    switch ($niveau) {
        case 'GINF1':
            $EleModul=['GINF111'=>'Analyse numérique','GINF112'=>'Statistiques','GINF113'=>'Optimisation',
            'GINF121'=>'Traitement du signal','GINF122'=>'Probalités',
            'GINF131'=>'Electronique analogique','GINF132'=>'Electronique numerique',
            'GINF141'=>'Structure de données / Langage C*','GINF142'=>'Programmation Web PHP',
            'GINF151'=>'Bases de données relationnelles','GINF152'=>'Concepts fondamentaux des réseaux',
            'GINF161'=>'Méthodologie de PP','GINF162'=>'Développement personnel','GINF163'=>'Anglais1 & Espagnol1',
            'GINF211'=>'POO en C++','GINF212'=>'Programmation web avec PHP 5',
            'GINF221'=>'Méthodes de modélisation de BD','GINF222'=>'Manipulation et développement des BDR','GINF223'=>'Programmation PLSQL',
            'GINF231'=>'Recherche Opérationnelle','GINF232'=>'Théorie des Graphes',
            'GINF241'=>'Protocoles; et adressage des réseaux','GINF242'=>'Technologies des réseaux','GINF243'=>'TP réseaux(Cisco)',
            'GINF251'=>'Micro-architectures des processeurs','GINF252'=>'Système dexploitation Linux','GINF253'=>'TP assembleur',
            'GINF261'=>'Gestion des entreprises 1','GINF262'=>'Comptabilité','GINF263'=>'Economie 1'
            ];
            break;
        case 'GINF2':
            $EleModul=['GINF311'=>'Programmation Orientée Objet:Java','GINF312'=>'XML&Application',
                'GINF321'=>'Assurance contrôle qualité(ISO 9001)','GINF322'=>'Cycle de Vie Logiciel et Méthodes agiles','GINF323'=>'Maîtrise et optimisation des processus',
                'GINF331'=>'Modélisation orienté objet UML','GINF132'=>'Interaction Homme Machine',
                'GINF341'=>'Optimisation et Qualité de Base de données','GINF342'=>'Administration et Sécurité des Bases de données','GINF343'=>'Base de données NoSQL',
                'GINF351'=>'Administration systèmes','GINF352'=>'Programmation systèmes',
                'GINF361'=>'Espagnol2, Allemand','GINF362'=>'Anglais professionnel','GINF363'=>'Techniques de Comminucation',
                'GINF411'=>'Introduction à J2EE','GINF412'=>'Programmation C#',
                'GINF421'=>'Gestion des données complexes','GINF422'=>'Gestion des données distribuées','GINF423'=>'Cloud Computing& Infogérance',
                'GINF431'=>'Traitement dImage','GINF432'=>'Vision numérique','GINF433'=>'Processus Stochastique',
                'GINF441'=>'Programmation Déclarative','GINF442'=>'Technique Algorithmique Avancée',
                'GINF451'=>'Sécurité des systèmes','GINF452'=>'Cryptographie',
                'GINF461'=>'Economie&Comtabilité2','GINF462'=>'Projets Collectifs & Stages','GINF463'=>'Management de Projet'
            ];
            break;
        case 'GSTR1':
            $EleModul=['GSTR111'=>'Analyse numérique','GSTR112'=>'Statistiques','GINF113'=>'Optimisation',
                'GSTR121'=>'Traitement du signal','GSTR122'=>'TP Signal',
                'GSTR131'=>'Electronique analogique','GSTR132'=>'Electronique numerique',
                'GSTR141'=>'Ondes électromagnétiques dans la matière','GSTR142'=>'Lignes de transmission',
                'GSTR151'=>'Automatique liniéaire','GSTR152'=>'Concepts fondamentaux des réseaux',
                'GSTR161'=>'Méthodologie de PP','GSTR162'=>'Développement personnel','GSTR163'=>'Anglais1 & Espagnol1',
                'GSTR211'=>'Micro-architectures des processeurs ASM','GSTR212'=>'Système dexploitation Linux','GSTR213'=>'TP Electronique',
                'GSTR221'=>'POO(Java)','GSTR222'=>'Bases de Données & UML',
                'GSTR231'=>'Recherche Opérationnelle','GSTR232'=>'Théorie des Graphes',
                'GSTR241'=>'Protocoles; et adressage des réseaux','GSTR242'=>'Technologies des réseaux','GSTR243'=>'TP réseaux(Cisco)',
                'GSTR251'=>'Commmutation analogiques','GSTR252'=>'Théorie de lInformation et codage',
                'GSTR261'=>'Gestion des entreprises 1','GSTR262'=>'Comptabilité','GSTR263'=>'Economie 1'
            ];
            break;
        case 'GINF3':
            echo "GINF3";
            break;
        default:
            echo "";
    }

    foreach ($EleModul as $code_elm_module => $designation)
    {
        $N= new Note();
        $N->login=$login;
        $N->code_elm_module=$code_elm_module;
        $N->designation=$designation;
        $N->note=0;
        $N->save();
    }
}

function MoyCreat($login,$code_fil,$niveau)
{
    $M= new Moyenne();
    $M->login=$login;
    $M->code_fil=$code_fil;
    $M->niveau=$niveau;
    $M->moyenne=0;
    $M->save();
}

class Admins extends Controller
{
    public function __construct()
    {
        parent::__construct('Utilisateur');
        parent::__construct('Eleve');
        parent::__construct('Responsable_filiere');
        parent::__construct('Note');
        parent::__construct('Moyenne');

    }

    public function index()
    {
        parent::view("index");
    }

    public function Egestion()
    {
        parent::view('levels');
    }

    public function Rgestion()
    {
        parent::view("Responsable_filiere",Responsable_filiere::All());
    }

    public function Eshow($login)
    {
        $this->view("Eshow", Eleve::find($login));
        $this->view("Nshow", Note::All($login));
        $this->view("Mshow", Moyenne::find($login));
    }

    public function Rshow($login)
    {
        $this->view("Rshow",Responsable_filiere::find($login));
    }

    public function Udestroy($login)
    {
        $U=Utilisateur::find($login);
        $U->delete();
    }
    public function Ndestroy($login)
    {
        $notes=Note::All($login);
        foreach ($notes as $note)
        {
            $N=new note();
            $N->id=$note->id;
            $N->login=$note->login;
            $N->code_elm_module=$note->code_elm_module;
            $N->designation=$note->designation;
            $N->note=$note->note;
            $N->delete();
        }
    }
    public function Mdestroy($login)
    {
        $M=Moyenne::find($login);
        $M->delete();
    }

    public function Rdestroy($login)
    {
        $R=Responsable_filiere::find($login);
        $R->delete();
        $this->Udestroy($login);

        $this->redirect("../../Admins/Rgestion");
    }

    public function Edestroy($login)
    {
        $this->Mdestroy($login);
        $this->Ndestroy($login);
        $E=Eleve::find($login);
        $E->delete();
        $this->Udestroy($login);
        $this->redirect("../../Admins/Egestion");
    }



    public function Ustore($request)
    {
        $U=new Utilisateur();
        $U->login=$request->login;
        $U->password=$request->password;
        $U->email=$request->email;
        $U->type=$request->type;
        $U->save();
    }

    public function Estore($request)
    {
        $this->Ustore($request);

        $E=new Eleve();
        $E->code=$request->code;
        $E->nom=$request->nom;
        $E->prenom=$request->prenom;
        $E->niveau=$request->niveau;
        $E->code_fil=$request->code_fil;
        $E->login=$request->login;
        $E->save();

        NotesCreat($request->login,$request->niveau);
        MoyCreat($request->login,$request->code_fil,$request->niveau);

        $this->redirect("../Admins/Egestion");
    }

    public function Rstore($request)
    {
        $this->Ustore($request);
        $R=new Responsable_filiere();
        $R->nom=$request->nom;
        $R->prenom=$request->prenom;
        $R->departement=$request->departement;
        $R->login=$request->login;
        $R->code_fil=$request->code_fil;
        $R->save();

        $this->redirect("../Admins/Rgestion");
    }

    public function Eedit($login)
    {
        parent::view("Eform",Eleve::find($login));
    }

    public function Redit($login)
    {
        parent::view("Rform",Responsable_filiere::find($login));
    }

    public function Nedit($login)
    {
        parent::view("Nform",Note::All($login));
    }

    public function Nupdate($login,$request)
    {
        foreach ($request as $code_elm_module => $note)
        {
            $N= new Note();
            $N->login=$login;
            $N->code_elm_module=$code_elm_module;
            $N->note=$note;
            $N->saveNotes();
        }
        $this->redirect("../Eshow/$N->login");
    }

    public function Eupdate($login,$request)
    {
        $E=Eleve::find($login);
        if($E!=false) {
            $E->code = $request->code;
            $E->nom = $request->nom;
            $E->prenom = $request->prenom;
            $E->niveau = $request->niveau;
            var_dump($request);
            $E->save();
            $this->redirect("../../Admins/Egestion");
        }else{
            echo "user not found";
        }
    }

    public function Rupdate($login,$request)
    {
        $R=Responsable_filiere::find($login);
        if($R!=false) {
            $R->nom = $request->nom;
            $R->prenom = $request->prenom;
            $R->departement = $request->departement;
            $R->save();
            $this->redirect("../../Admins/Rgestion");
        }
    }

    public function Ecreate()
    {
        parent::view("Eform");
    }

    public function Rcreate()
    {
        parent::view("Rform");
    }

    public function levels()
    {
        parent::view('levels');
    }

    public function Niveau($niveau)
    {
        $_SERVER[$niveau]=Responsable_filiere::MoyNiv($niveau);
        $this->view("Eleve", Eleve::All($niveau));
    }
}