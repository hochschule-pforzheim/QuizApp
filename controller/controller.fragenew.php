<?php
Core::checkAccessLevel(2);
$frage=new Frage;
$result=0;
if(count($_POST)>0){
   $frage->strictMapping=false; // Wertet nur Felder aus, die auch im Formular vorhanden sind
   if($frage->loadFormData()){ // Lädt die Formulardaten und Prüft die Validierung
        $result=$frage->create(); // gibt Im Idealfall eingegebene ID zurück, sonst 0/false
   }
     if($result>0){
         Core::redirect("fragenlist",array("message"=>"Die Frage wurde angelegt"));         
     }else{
        Core::addError("Der Datensatz konnte nicht angelegt werden");
        Core::$view->path["view1"]="views/view.error.php"; 
     }
     
    
}else{
     Core::addError("Ungültiger Seitenaufruf");
     Core::$view->path["view1"]="views/view.error.php"; 
}





  
