<?php

$url = "https://query.wikidata.org/#SELECT%20%3Fanimal%20%3FanimalLabel%20%3Ftaxonname%20%3Ffood%20%3FfoodLabel%20%3Fhabitat%20%3FhabitatLabel%20%3Fedemic%20%3FedemicLabel%20%7B%0A%20%20%3Fanimal%20wdt%3AP31%20wd%3AQ16521%20.%0A%20%20%3Fanimal%20wdt%3AP225%20%3Ftaxonname%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP1034%20%3Ffood%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP2974%20%3Fhabitat%3B%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP183%20%3Fedemic%3B%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Fanimal%20%0ALimit%20100";

$string = file_get_contents($url);
$json_result = json_decode($string, true);
$results = $json_result['results'];
$bindingsarray = $results['bindings'];
for ($i = 1; $i <= count($bindingsarray); $i++) {
   
   
$bindings = $results['bindings'][$i] ; 
$animalLabel = $bindings['animalLabel'];
$animalname = $animalLabel['value'];

$bindings = $results['bindings'][$i] ; 
$taxonname = $bindings['taxonname'];
$taxon = $taxonname['value'];

$bindings = $results['bindings'][$i] ; 
$habitatLabel = $bindings['habitatLabel'];
$habitat = $habitatLabel['value'];

$bindings = $results['bindings'][$i] ; 
$foodLabel = $bindings['foodLabel'];
$food = $foodLabel['value'];

$bindings = $results['bindings'][$i] ; 
$edemicLabel = $bindings['edemicLabel'];
$edemic = $edemicLabel['value'];


$meinefrage ="Wie heißt die Überart von $animalname?";
$meinekat =0;
$meineAntwort =$taxon;
$falscheAntwort ="";
$falscheAntwortlabel ='animalLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Was fressen $animalname?";
$meinekat =0;
$meineAntwort =$food;
$falscheAntwort ="";
$falscheAntwortlabel ='foodLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wo leben $animalname?";
$meinekat =0;
$meineAntwort =$edemic;
$falscheAntwort ="";
$falscheAntwortlabel ='edemicLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wo fühlen sich $animalname am wohlsten?";
$meinekat =0;
$meineAntwort =$habitat;
$falscheAntwort ="";
$falscheAntwortlabel ='habitatLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Welches Tier lebt in $edemic?";
$meinekat =0;
$meineAntwort =$animalname;
$falscheAntwort ="";
$falscheAntwortlabel ='animalname';
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
 while ($erstA ==$meineAntwort);
 
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $zweitA = $bindings[$falscheAntwortlabel];
 $zweitA =$zweitA ['value'];
  } 
 while (($erstA ==$zweitA)AND ($zweitA==$meineAntwort));
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $drittA = $bindings[$falscheAntwortlabel];
 $drittA=$drittA['value'];
} while (($drittA ==$zweitA)AND ($drittA==$meineAntwort)AND($drittA ==$erstA));
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
