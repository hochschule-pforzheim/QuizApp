<?php
Core::checkAccessLevel(2);
Core::$view->path["view1"]="views/view.fragedetail.php";
Core::$view->path["view2"]="views/view.antwortliste.php";

$frage=new Frage;


if(count($_POST)>0){
    
    if($frage->loadFormData()){
        $frage->update();
        $frage->loadDBData($frage->m_oid); // Damit auch die alten Daten geladen werden
    }else{
        Core::addError("Die Daten waren nicht valide und wurden nicht gespeichert");
    }
    
}else{
    $frage->loadDBData($_GET['id']);
}


$antworten=Antwort::findAll("SELECT * FROM Antwort WHERE to_Frage=".$frage->m_oid);
if(count($antworten)<4){ // View nur anzeigen bis 4 Fragen vorhanden sind
    Core::$view->path["view3"]="views/view.antwortnew.php";
}

$kategorien=KategorieT::findAll();

Core::$view->frage=$frage;
Core::$view->kategorien=$kategorien;
Core::$view->antworten=$antworten;




  
