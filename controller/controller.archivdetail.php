<?php
 Core::checkAccessLevel(1);
$spiel=new Spiel;
$runde=new Runde;
$id= filter_input(INPUT_GET, "id");
$spiel->loadDBData($id);
$spiel->getLiveInfo();
/* Schritt 1 sicherstellen, dass die Id des Spiels wirklich zum User passt */

if( ($spiel->Teilnehmer!=Core::$user->m_oid && $spiel->Ersteller!=Core::$user->m_oid) || $spiel->status0!=2){
    Core::addError("Hacker");
 //   Core::redirect("error",["errorMsg"=>"Hacker"]);
    
}



$ersteller=new User;
$teilnehmer=new User;
$ersteller->loadDBData($spiel->Ersteller);
$teilnehmer->loadDBData($spiel->Teilnehmer);
 $kategorien=db::query("SELECT * from KategorieT WHERE codes=? or codes=? OR codes=? OR codes=?",[$spiel->katA1,$spiel->katA2, $spiel->katB1, $spiel->katB2]);         
                  Core::$view->kategorien=$kategorien;


Core::$view->path["view1"]="views/view.spielende.php"; 
Core::$view->Spiel=$spiel;
Core::$view->teilnehmer=$teilnehmer;
Core::$view->ersteller=$ersteller;


