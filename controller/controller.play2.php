<?php
Core::checkAccessLevel(1);
$spiel=new Spiel;
$runde=new Runde;
$id= filter_input(INPUT_GET, "id");
$spiel->loadDBData($id);
$spiel->getLiveInfo();
/* Schritt 1 sicherstellen, dass die Id des Spiels wirklich zum User passt */

if($spiel->Teilnehmer!=Core::$user->m_oid && $spiel->Ersteller!=Core::$user->m_oid){
    Core::addError("Hacker");
    Core::$view->path["view1"]="views/view.error.php"; 
}


/* Schritt 2 Prüfen, ob Frage beantwortet wurde */
   if(filter_input(INPUT_POST,"runde")){ // Frage verarbeiten
       
  if(filter_input(INPUT_POST, "antwort")){ // Antwort verarbeiten
      $Frage=$spiel->aktuelleFrage();
      $jetzt=time();
      $jetzt= microtime(true);
      $runde=new Runde();
      $runde->loadDBData($Frage->RundenID);
      $dauer= round(($jetzt-$runde->m_ts_exakt),2);
      
      if($dauer>($spiel->antwortzeit+2)|| filter_input(INPUT_POST, "antwort")==-"1"){ // Frage als falsch speichern
          $runde->resultat=2;
          $runde->Punkte=0;
          $runde->update();
         $runde->TP=0;
          $antwortID=0;
          $Ergebnis="zu spät";
          $antwort=new Antwort();
       //  $antwort->loadDBData($antwortID);
         $antwortKorrekt=$Frage->korrekteAnwort();
      }else{
         $antwortID=filter_input(INPUT_POST, "antwort");
         $antwort=new Antwort();
         $antwort->loadDBData($antwortID);
         $antwortKorrekt=$Frage->korrekteAnwort();
         if($antwort->to_Frage!=$Frage->m_oid){ // Kann eigentlich nicht passieren außer bei bewusster Manipulation
               Core::redirect("error",["errorMsg"=>"Hacker2"]);           
         }
         
         if ($antwort->korrekt==1){
             $runde->Punkte=1;
             $runde->Zeit=$dauer;
            
             
             $runde->TP=round(((1-($dauer/$Frage->antwortzeit))*10),2);
             if($runde->TP<0){$runde->TP=0;};
             $runde->resultat=2;
             $runde->to_Antwort=$antwortID;
             $runde->update();  
              $Ergebnis="richtig";
         }else{
             $runde->Punkte=0;
             $runde->resultat=2;
             $runde->to_Antwort=$antwortID;
             $runde->update();
             $runde->TP=0;
             $Ergebnis="falsch";
         }        
      
         
         }    
         Core::$view->path["view1"]="views/view.play_antwort.php"; 
           if($runde->Nummer%$spiel->roundLength==0){
               Core::$view->path["view2"]="views/view.spielstand.php"; 
           }
           $spiel->getLiveInfo();
          $aktiveSerieA=intval($spiel->fragenA/$spiel->roundLength);
          $aktiveSerieB=intval($spiel->fragenB/$spiel->roundLength);
          $spiel->wait=false;
          
          if($aktiveSerieA*$spiel->roundLength==12 && $aktiveSerieB*$spiel->roundLength==12){ // Spielende
                //  Core::redirect("spielende",["id"=>$spiel->m_oid,"Ergebnis"=>$Ergebnis,"runde"=>$rundenID]);
                  $spiel->rating();
                  $spiel->status0=2;
                  $spiel->update("UPDATE Spiel SET status0=?, Gewinner=?, ratingPointsA=?, ratingPointsB=?, punkteA=?, punkteB=?, zeitA=?, zeitB=? WHERE m_oid=?" ,[]);
                  Core::$view->path["view2"]="views/view.spielende.php"; 
                  $ersteller=new User;
                  $teilnehmer=new User;
                  $ersteller->loadDBData($spiel->Ersteller);
                  $ersteller->rating=$ersteller->rating+$spiel->ratingPointsA;
                  $teilnehmer->loadDBData($spiel->Teilnehmer);
                  $teilnehmer->rating=$teilnehmer->rating+$spiel->ratingPointsB;
                  $ersteller->update();
                  $teilnehmer->update();
                 
                  if($spiel->Gewinner==0){
                      $ergebnisText="unentschieden";
                  }elseif($spiel->Gewinner==Core::$user->m_oid){
                      
                      $ergebnisText="Du hast gewonnnen";
                  }else{
                      
                      $ergebnisText="Du hast verloren";
                  }
                  Core::$view->teilnehmer=$teilnehmer;
                  Core::$view->ersteller=$ersteller;
                  Core::$view->ergebnisText=$ergebnisText;
                  $kategorien=db::query("SELECT * from KategorieT WHERE codes=? or codes=? OR codes=? OR codes=?",[$spiel->katA1,$spiel->katA2, $spiel->katB1, $spiel->katB2]);         
                  Core::$view->kategorien=$kategorien;
           }
          
          if ($spiel->Ersteller==Core::$user->m_oid){
              if($aktiveSerieA>$aktiveSerieB){ $spiel->wait=true;}
            
          }else{
               if($aktiveSerieB>$aktiveSerieA){ $spiel->wait=true;}
               
          }
              
  }
       
  
}else{ // Fragendialog;
    
         $aktiveSerieA=intval($spiel->fragenA/$spiel->roundLength);
          $aktiveSerieB=intval($spiel->fragenB/$spiel->roundLength);
          $spiel->wait=false;
          if ($spiel->Ersteller==Core::$user->m_oid){
              if($aktiveSerieA>$aktiveSerieB){ $spiel->wait=true;}
          }else{
               if($aktiveSerieB>$aktiveSerieA){ $spiel->wait=true;}
          }
    
        if($spiel->wait==false){
    
        $Frage= $spiel->nextFrage(); //nächste Frage (Runde) für aktiven Spieler      
        $antworten=$Frage->showAntworten();
        shuffle($antworten);
        $runde=new Runde();
        $runde->loadDBData($Frage->RundenID);       
        $runde->resultat=1;
        $runde->Punkte=0;
        $runde->m_ts_exakt= microtime(true);
        $runde->update();
        Core::$view->Frage=$Frage;
        Core::$view->runde=$runde;
        Core::$view->Antworten=$antworten;
        Core::$view->Spiel=$spiel;
        Core::$view->path["view1"]="views/view.play.php"; 
        Core::loadJavascript("views/js/_play.js");
     }else{
         $spiel->getLiveInfo();
         Core::$view->path["view1"]="views/view.spielstand.php"; 
     }
    
    
    
}







Core::$view->runde=$runde;
     Core::$view->eigeneAntwort=$antwort;
      Core::$view->korrekteAntwort=$antwortKorrekt;
      Core::$view->Ergebnis=$Ergebnis;
Core::$view->Spiel=$spiel;
 // Core::$view->path["view2"]="views/view.spielstand.php"; 
