<?php
Core::$view->path["view1"]="views/view.login.php";
if(count($_POST)>0){
 //Core::$user=new User();
  Core::$user->login(filter_input(INPUT_POST,"username"), filter_input(INPUT_POST, "passwort"));  
 if(!Core::$user->m_oid>0){
     Core::addError("Sie konnten sich nicht anmelden");
     Core::$view->path["view1"]="views/view.login.php";
 }else{
    Core::redirect("home");
 }
}


  
