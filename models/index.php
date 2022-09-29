<?php

include_once "Responsable_filiere.php";

/*$P=new Responsable_filiere();
$P->id=6;
$P->nom="AHMADI";
$P->prenom="Jalal";
$P->specialite="informatique";*/
//$P->save();

/*$P=Responsable_filiere::find(6);
$P->nom="UAE";
$P->prenom="Tetouan";
$P->save();
$res=Responsable_filiere::All();
foreach($res as $E)
    echo $E->id." ".$E->nom." ".$E->prenom." ".$E->specialite."<br>";*/

var_dump(Responsable_filiere::find(2));




