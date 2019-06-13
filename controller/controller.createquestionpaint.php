<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 * count($bindingsarray)
 */




$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fpainting%20%3FpaintingLabel%20%3FpaintingDescription%20%3Fcreator%20%3FcreatorLabel%20%3Fcollection%20%3FcollectionLabel%20%3Forigin%20%3ForiginLabel%20%3Fheigth%20%3Fweight%20WHERE%20%7B%0A%20%20%20%20%3Fpainting%20wdt%3AP31%20wd%3AQ3305213%20.%0A%20%20%0A%20%20%20%20%20%20%20%20%3Fpainting%20%20wdt%3AP170%20%3Fcreator%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP135%20%3Fgenre%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP495%20%3Forigin%3B%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP2048%20%3Fheigth%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP2049%20%3Fweight%20%3B%20%20%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP195%20%3Fcollection%20.%0A%20%20%20%20%20%20%20%3Fcreator%20rdfs%3Alabel%20%3FcreatorLabel%20.%0A%20%20%20%20FILTER%20CONTAINS(%3FcreatorLabel%2C%20%22$Maler%22%20)%20%20%20%20%20%20%20%20%20%20%0A%0A%20%20%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20%7D%0A%7D%0ALimit%20100";


$string = file_get_contents($url);
$json_result = json_decode($string, true);



$results = $json_result['results'];
$bindingsarray = $results['bindings'];

for ($i = 0; $i < 10; $i++) {
    
 do { 
    
$bindings = $results['bindings'][$i] ; 
$humanlabel = $bindings['humanLabel'];
$humanname = $humanlabel['value'];
 $i++;
 $bindings2 = $results['bindings'][$i] ; 
$humanlabel2 = $bindings2['humanLabel'];
$humanname2 = $humanlabel2['value'];
$firstletter = substr($humanname,0,1);
 } 
 while ($humanname ==$humanname2 OR $firstletter == "Q");   
  $i--;  
$bindings = $results['bindings'][$i] ; 
$humanlabel = $bindings['humanLabel'];
$humanname = $humanlabel['value'];

$bindings = $results['bindings'][$i] ; 
$countryshiplabel = $bindings['countryshipLabel'];
$countryshipname = $countryshiplabel['value'];

$bindings = $results['bindings'][$i] ; 
$birthplace = $bindings['birthplaceLabel'];
$birthplacename = $birthplace['value'];

$bindings = $results['bindings'][$i] ; 
$birthdatelabel = $bindings['birthdateLabel'];
$birthdate = $birthdatelabel['value'];


$humannamealt = $humanname;
$meinefrage ="Welche Nationalität gehört $humanname an?";
$meinekat =9;
$meineAntwort =$countryshipname;
$falscheAntwort ="";
$falscheAntwortlabel ='countryshipLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wann ist $humanname geboren?";
$meinekat =9;
$meineAntwort =$birthdate;
$falscheAntwort ="";
$falscheAntwortlabel ='birthdateLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wo ist $humanname geboren?";
$meinekat =9;
$meineAntwort =$birthplacename;
$falscheAntwort ="";
$falscheAntwortlabel ='birthplaceLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

}




function createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray) {

$frage=new Frage;
$frage->beschreibung = $meinefrage;
$frage->Kategorie = $meinekat;
$frage->antwortzeit = 10;
$frage->create(); // gibt Im Idealfall eingegebene ID zurück, sonst 0/false


$antwort=new Antwort;
$antwort->Antworttext=$meineAntwort;
$antwort->korrekt=1;
$antwort->to_Frage = $frage->m_oid;  
$antwort->create();

do { 
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $erstA = $bindings[$falscheAntwortlabel];
 $erstA=$erstA['value'];
 $firstletter = substr($erstA,0,1);   
 } 
 while (($erstA ==$meineAntwort) OR ($erstA =="") OR $firstletter == "Q");
 
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $zweitA = $bindings[$falscheAntwortlabel];
 $zweitA =$zweitA ['value'];
  $firstletter = substr($zweitA,0,1);
  } 
 while (($erstA ==$zweitA) OR ($zweitA==$meineAntwort) OR ($zweitA =="") OR $firstletter == "Q");
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $drittA = $bindings[$falscheAntwortlabel];
 $drittA=$drittA['value'];
  $firstletter = substr($drittA,0,1);

} while (($drittA ==$zweitA) OR ($drittA==$meineAntwort)OR($drittA ==$erstA) OR ($drittA =="") OR $firstletter == "Q");

$falscheAntwort =[
    0 => $erstA,
     1 =>$zweitA,
     2 =>$drittA];


for ($i = 0; $i < 3; $i++) { 
 
    
    
  
//do {    
//     $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
//    $citylabel = $bindings[$falscheAntwortlabel];
//    $wrongcityname = $citylabel['value'];    
//    
//} while ($meineAntwort == $wrongcityname);
    
   

$antwort->Antworttext=$falscheAntwort[$i];
$antwort->korrekt=0;
$antwort->to_Frage = $frage->m_oid;  
$antwort->create();
} 

};

