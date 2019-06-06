<?php
Core::checkAccessLevel(1);
Core::$view->path["view1"]="views/view.antwortdetail.php";


$antwort=new Antwort();


if(count($_POST)>0){
    $antwort->strictMapping=true;
    if($antwort->loadFormData()){
        $result=$antwort->update();
         if($result){
         Core::redirect("fragedetail",array("id"=>$antwort->to_Frage, "message"=>"Die Antwort wurde aktualisiert"));         
     }else{
        Core::addError("Der Datensatz konnte nicht gespeichert werden");
        Core::$view->path["view1"]="views/view.error.php"; 
     }
        
        
        
        $antwort->loadDBData($antwort->m_oid); // Damit auch die alten Daten geladen werden
    }else{
        Core::addError("Die Daten waren nicht valide und wurden nicht gespeichert");
    }
    
}else{
    $antwort->loadDBData($_GET['id']);
}





Core::$view->antwort=$antwort;




  
