<?php
Core::checkAccessLevel(1);
$spiel=new Spiel;
$id= filter_input(INPUT_GET, "id");
$spiel->loadDBData($id);
if($spiel->Teilnehmer!=Core::$user->m_oid){
    Core::addError("Hacker");
    Core::$view->path["view1"]="views/view.error.php"; 
}else{
    $accept= filter_input(INPUT_GET, "accept");
    if($accept!="false"){
      Core::$view->id=$id;
      if(count($_POST)>0){ // Verarbeitung
        //Core::redirect("home",["message"=>"Verarbeitung"]); 
         $kat1=filter_input(INPUT_POST,"Kategorie1");
         $kat2=filter_input(INPUT_POST,"Kategorie2");
         $id=filter_input(INPUT_POST,"id");
         if($kat1==$kat2 || is_null($kat1) || is_null($kat2)){
              core::redirect("spielerstellen",array("id"=>$id,"message"=>"Bitte <b>zwei</b> unterschiedliche Kategorien auswählen"));
         }
         // Variablen festlegen
        // $spiel->Ersteller=Core::$user->m_oid;
         //$spiel->Teilnehmer=$id;
         
          $fragenkat1=$spiel->erstelleFragen( $kat1);
       $fragenkat2=$spiel->erstelleFragen( $kat2);
       $nummer=6;
       foreach ( $fragenkat1 as $item){
           $nummer++;
           $runde=new Runde;
           $runde->Nummer=$nummer;
           $runde->to_Frage=$item;
           $runde->to_Spiel=$spiel->m_oid;
           $runde->resultat=0;
           $runde->to_User=$spiel->Ersteller;
           $runde->create();
           $runde->resultat=0;
           $runde->to_User=$spiel->Teilnehmer;
           $runde->create();
       }
        foreach ( $fragenkat2 as $item){
           $nummer++;
           $runde=new Runde;
           $runde->Nummer=$nummer;
           $runde->to_Frage=$item;
           $runde->to_Spiel=$spiel->m_oid;
           $runde->to_User=$spiel->Ersteller;
           $runde->resultat=0;
           $runde->create();
           $runde->to_User=$spiel->Teilnehmer;
           $runde->create();
       }                              
         $spiel->status0=1;
         $spiel->m_oid=$id;
         $spiel->katB1=$kat1;
         $spiel->katB2=$kat2;
         $spiel->update();
         
         
         
         
         
         //$spiel->punkteA=0;
         //$spiel->punkteB=0;  
           core::redirect("home",array("message"=>"Jetzt geht's los"));
      }else{ // Formular
          $Ersteller= new User;
          $Ersteller->loadDBData($spiel->Ersteller);
          Core::$view->Ersteller=$Ersteller;
          $SQL="SELECT * FROM KategorieT WHERE codes<>".$spiel->katA1." AND codes<>".$spiel->katA2;
          Core::$view->kategorien=KategorieT::findAll($SQL);
          Core::$view->path["view1"]="views/view.katteilnehmer.php"; 
          
      }
        
        
        
        
    } else {
     Spiel::delete($id);
     Core::redirect("home",["message"=>"Einladung abgelehnt"]);
    }
}


  
