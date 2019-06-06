<?php
Core::checkAccessLevel(1);
$antwort=new Antwort;
$result=0;
if(count($_POST)>0){
   $antwort->strictMapping=false; // Wertet nur Felder aus, die auch im Formular vorhanden sind
   if($antwort->loadFormData()){ // Lädt die Formulardaten und Prüft die Validierung
        $result=$antwort->create(); // gibt Im Idealfall eingegebene ID zurück, sonst 0/false
   }
     if($result>0){
         Core::redirect("fragedetail",array("id"=>$antwort->to_Frage, "message"=>"Die Antwort wurde angelegt"));         
     }else{
        Core::addError("Der Datensatz konnte nicht angelegt werden");
        Core::$view->path["view1"]="views/view.error.php"; 
     }
     
    
}else{
     Core::addError("Ungültiger Seitenaufruf");
     Core::$view->path["view1"]="views/view.error.php"; 
}





  
