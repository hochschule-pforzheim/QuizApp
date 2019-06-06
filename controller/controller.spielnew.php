<?php
Core::checkAccessLevel(1);
$spiel=new Spiel;
$result=0;
if(count($_POST)>0){
   $kat1=filter_input(INPUT_POST,"Kategorie1");
   $kat2=filter_input(INPUT_POST,"Kategorie2");
   $id=filter_input(INPUT_POST,"id");
   if ($kat1==$kat2 || is_null($kat1) || is_null($kat2)){
   
       Core::redirect("spielerstellen",array("id"=>$id,"message"=>"Bitte <b>zwei</b> unterschiedliche Kategorien auswählen"));
       exit;
   }
   // Variablen festlegen
   $spiel->Ersteller=Core::$user->m_oid;
   $spiel->Teilnehmer=$id;
   $spiel->status0=0;
   $spiel->punkteA=0;
   $spiel->punkteB=0;
   $spiel->fragenA=0;
   $spiel->fragenB=0;
   $spiel->katA1=$kat1;
   $spiel->katA2=$kat2;
   $result=$spiel->create();
   if($result>0){
       
      // $listeA1=Spiel::Zufallszahlen(3, $gesamt);
       $fragenkat1=$spiel->erstelleFragen($spiel->katA1);
       $fragenkat2=$spiel->erstelleFragen($spiel->katA2);
       $nummer=0;
       foreach ( $fragenkat1 as $item){
           $nummer++;
           $runde=new Runde;
           $runde->Nummer=$nummer;
           $runde->to_Frage=$item;
           $runde->to_Spiel=$spiel->m_oid;
           $runde->to_User=$spiel->Ersteller;
           $runde->resultat=0;
           $runde->create();
           $runde->to_User=$spiel->Teilnehmer;
           $runde->resultat=0;
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
       
       
         Core::redirect("home",array("message"=>"Das Spiel wurde angelegt"));         
     }else{
        Core::addError("Der Datensatz konnte nicht angelegt werden");
        Core::$view->path["view1"]="views/view.error.php"; 
     }
     
    
}else{
     Core::addError("Ungültiger Seitenaufruf");
     Core::$view->path["view1"]="views/view.error.php"; 
}





  
