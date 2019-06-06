<?php
Core::checkAccessLevel(1);
Core::$view->path["view2"]="views/view.spielersearch.php";

$fragen=Frage::findAll();

$kategorien=KategorieT::findAll();

if(filter_input(INPUT_GET,"id")){  // Zum Kategorien wählen Formular
    Core::$view->path["view2"]="views/view.katersteller.php";
    $id=filter_input(INPUT_GET,"id");
   $Teilnehmer=new User;
   $Teilnehmer->loadDBData( $id);
    Core::$view->kategorien=$kategorien;
    Core::$view->Teilnehmer=$Teilnehmer;
}else{
      Core::$view->path["view1"]="views/view.spielerbekannt.php";
Core::$view->bekannteSpieler=Core::$user->knownOpponents();
}




if(count($_POST)>0){
    $search= "%".filter_input(INPUT_POST,"username")."%";
    $spielerliste=User::query("SELECT User.*, (count(Spiel.m_oid)+ count(Spiel2.m_oid)) as spiele  FROM User left JOIN Spiel ON (User.m_oid=Spiel.Ersteller)LEFT JOIN Spiel AS Spiel2 ON (User.m_oid=Spiel2.Teilnehmer)  WHERE (Kennung LIKE ? OR nickname LIKE ?) AND User.m_oid<>? GROUP BY User.m_oid",array($search,$search,Core::$user->m_oid));
}


Core::$view->bekannteSpieler=Core::$user->knownOpponents();
Core::$view->spieler=$spielerliste;

if(is_array($spielerliste)>0){
    Core::$view->path["view3"]="views/view.spielerstellen.php";
}

//Core::$view->kategorien=$kategorien;





  
