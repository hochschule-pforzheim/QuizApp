<?php
Core::checkAccessLevel(2);
Core::$view->path["view1"]="views/view.fragenliste.php";
Core::$view->path["view2"]="views/view.fragenew.php";
$fragen=Frage::findAll();

$kategorien=KategorieT::findAll();






Core::$view->fragen=$fragen;
Core::$view->kategorien=$kategorien;





  
