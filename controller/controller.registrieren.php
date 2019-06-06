<?php
$result=0;
if(count($_POST)>0){
    $newUser=new User;
    $result=0;
   $newUser->strictMapping=false; // Wertet nur Felder aus, die auch im Formular vorhanden sind
   if($newUser->loadFormData()){ // Lädt die Formulardaten und Prüft die Validierung
       $newUser->gruppe=1;
       if(filter_input(INPUT_POST, "passwort2")==$newUser->passwort){
           $pruefung=[];
           $pruefung=User::query("SELECT * FROM User WHERE nickname = ? OR kennung=?",array($newUser->nickname,$newUser->kennung));
           if(count($pruefung)>0){
               Core::addError("Die Kenung und/oder der Nickname exisitiert bereits");
           }else{
                $newUser->passwort=md5( $newUser->passwort);
                $result=$newUser->create(); // gibt Im Idealfall eingegebene ID zurück, sonst 0/false
           }
        
       
       }else{
           Core::addError("Die Passwörter haben nicht übereingestimmt");
       }
   }else{
        Core::addError("Sie konnten nicht angelegt werden");
        Core::$view->path["view1"]="views/view.error.php"; 
   }
     if($result>0){
         Core::redirect("login",array("errorMsg"=>"Viel Spaß beim Wingduell. Sie können sich jetzt anmelden"));         
     }else{
        Core::addError("Sie konnten nicht angelegt werden");
        Core::$view->path["view1"]="views/view.error.php"; 
     }
     
    
}else{
    $avatars=Avatar::findAll();
    Core::$view->avatars=$avatars;
     Core::$view->path["view1"]="views/view.registrieren.php"; 
}





  
