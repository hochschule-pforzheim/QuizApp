<?php

Core::$view->path["view1"]="views/view.home.php";
if(isset(Core::$user->m_oid)){
    Core::loadJavascript("views/js/refresh.js");
  //$liste=Spiel::Zufallszahlen(3, 3);
    Core::$view->eigeneEinladungen=Spiel::eigeneEinladungen();
    Core::$view->fremdeEinladungen=Spiel::fremdeEinladungen();
    
    $liste=Spiel::laufendeSpiele();
    $archiv=Spiel::beendeteSpiele();
    /* @var $spiel Spiel */
    $spielliste=array();
    foreach($liste as $spiel){
       $spielobject= new Spiel();
       $spielobject->import($spiel);
       $spielobject->renderSpielstand();
       $spielobject->getLiveInfo();
       array_push($spielliste,$spielobject);
    }
    
    
    Core::$view->laufendeSpiele=$spielliste;
    Core::$view->beendeteSpiele=$archiv;
    Core::$view->path["view1"]="views/view.spielliste.php";
    Core::$view->path["view2"]="views/view.spieleinladungen.php";
    Core::$view->path["view3"]="views/view.laufendespiele.php"; 
    Core::$view->path["view4"]="views/view.beendetespiele.php"; 
    
    
     
}


  
