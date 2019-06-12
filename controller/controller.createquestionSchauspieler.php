<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "https://query.wikidata.org/sparql?format=json&query=%23Schauspieler%0A%0ASELECT%20%3Fhuman%20%3FhumanLabel%20%3Fbirthdate%20%3FbirthdateLabel%20%3Fgender%20%3FgenderLabel%20%3Ffilmography%20%3FfilmographyLabel%20%3Fcountryship%20%3FcountryshipLabel%20%3Fbirthplace%20%3FbirthplaceLabel%0AWHERE%20%7B%0A%0A%20%20%0A%20%20%3Fhuman%20wdt%3AP31%20wd%3AQ5%20%3B%20%0A%20%20%20%20%20%20%20%20%20wdt%3AP106%20wd%3AQ33999.%0A%0A%20%20%0A%3Fhuman%20wdt%3AP1283%20%3Ffilmography%20%3B%20%0Awdt%3AP21%20%3Fgender%20%3B%0Awdt%3AP27%20%3Fcountryship%20%3B%0Awdt%3AP19%20%3Fbirthplace%20%3B%0Awdt%3AP569%20%3Fbirthdate%20%3B%0AFILTER((%3Fbirthdate%20%3E%3D%20%221950-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20%26%26%20(%3Fbirthdate%20%3C%3D%20%222018-12-31T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime))%0A%20%20%20%20%20%20%20%0A%0A%0ASERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20%7D%0A%20%20%7D%0A%20%20%0AORDER%20BY%20%3Fhuman%0ALIMIT%201000%0A";


$string = file_get_contents($url);
$json_result = json_decode($string, true);



$results = $json_result['results'];
$bindingsarray = $results['bindings'];

for ($i = 0; $i < count($bindingsarray); $i++) {
    
 do { 
    
$bindings = $results['bindings'][$i] ; 
$humanlabel = $bindings['humanLabel'];
$humanname = $humanlabel['value'];
 $i++;
 $bindings2 = $results['bindings'][$i] ; 
$humanlabel2 = $bindings2['humanLabel'];
$humanname2 = $humanlabel2['value'];

 } 
 while ($humanname ==$humanname2);   
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
$meinekat =8;
$meineAntwort =$countryshipname;
$falscheAntwort ="";
$falscheAntwortlabel ='countryshipLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wann ist $humanname geboren?";
$meinekat =8;
$meineAntwort =$birthdate;
$falscheAntwort ="";
$falscheAntwortlabel ='birthdateLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wo ist $humanname geboren?";
$meinekat =8;
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
 } 
 while (($erstA ==$meineAntwort) OR ($erstA ==""));
 
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $zweitA = $bindings[$falscheAntwortlabel];
 $zweitA =$zweitA ['value'];
  } 
 while (($erstA ==$zweitA) OR ($zweitA==$meineAntwort) OR ($zweitA ==""));
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $drittA = $bindings[$falscheAntwortlabel];
 $drittA=$drittA['value'];

} while (($drittA ==$zweitA) OR ($drittA==$meineAntwort)OR($drittA ==$erstA) OR ($drittA ==""));

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

