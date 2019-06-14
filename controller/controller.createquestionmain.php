<?php


$kategorie=new KategorieT();
$kategorieliste=$kategorie->findAll();

Core::$view->kategorieliste=$kategorieliste;

Core::$view->path["view2"]="views/view.autofragenerstellen.php";
Core::$title="Neue Fragen";


if(count($_POST)>0){
    
    if(filter_input(INPUT_POST,"Kategorie1")=="") {
         Core::$view->path["view1"]="views/view.error.php";
    }else{    
        $kat1=filter_input(INPUT_POST, "Kategorie1");        

        Core::redirect("autofrage",["katid"=>$kat1]);
        
      }
      
}else{
    
    Core::$view->path["view2"]="views/view.autofragenerstellen.php";

}
