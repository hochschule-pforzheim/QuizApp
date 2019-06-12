<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fcountry%20%3FcountryLabel%20%3Fcapital%20%3FcapitalLabel%20%3Fcountrypopulation%20%3Flanguage%20%3FlanguageLabel%20%3Fcurrency%20%24currencyLabel%20%3Fhighestpoint%20%3FhighestpointLabel%20%3Flowestpoint%20%3FlowestpointLabel%20%3Fheadofgoverment%20%3FheadofgovermentLabel%20%3Fformofgoverment%20%3FformofgovermentLabel%20%3FHDI%20%3Fscoollesschild%20%3Funemployment%0AWHERE%0A%7B%0A%20%20%3Fcountry%20wdt%3AP31%20wd%3AQ3624078%20.%0A%20%20%23not%20a%20former%20country%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ3024240%7D%0A%20%20%23and%20no%20an%20ancient%20civilisation%20(needed%20to%20exclude%20ancient%20Egypt)%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ28171280%7D%0A%3Fcountry%20wdt%3AP36%20%3Fcapital%3B%0Awdt%3AP1082%20%3Fcountrypopulation%20%3B%0Awdt%3AP37%20%3Flanguage%20%3B%0Awdt%3AP38%20%3Fcurrency%3B%0Awdt%3AP610%20%3Fhighestpoint%3B%0Awdt%3AP1589%20%3Flowestpoint%3B%0Awdt%3AP6%20%3Fheadofgoverment%3B%0Awdt%3AP122%20%3Fformofgoverment%3B%0A%23wdt%3AP1081%20%3FHDI%3B%0Awdt%3AP2573%20%3Fscoollesschild%3B%20%20%20%20%20%20%20%20%20%0Awdt%3AP1198%20%3Funemployment.%0A%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%7D%0A%7D%0A%20%0AORDER%20BY%20%3FcountryLabel%0ALIMIT%20500000";


$string = file_get_contents($url);
$json_result = json_decode($string, true);



$results = $json_result['results'];
$bindingsarray = $results['bindings'];

for ($i = 0; $i < count($bindingsarray); $i++) {
    
 do { 
    
$bindings = $results['bindings'][$i] ; 
$countrylabel = $bindings['countryLabel'];
$countryname = $countrylabel['value'];
 $i++;
 $bindings2 = $results['bindings'][$i] ; 
$countrylabel2 = $bindings2['countryLabel'];
$countryname2 = $countrylabel2['value'];

 } 
 while ($countryname ==$countryname2);   
  $i--;  
$bindings = $results['bindings'][$i] ; 
$countrylabel = $bindings['countryLabel'];
$countryname = $countrylabel['value'];

$bindings = $results['bindings'][$i] ; 
$capitallabel = $bindings['capitalLabel'];
$capitalname = $capitallabel['value'];

$bindings = $results['bindings'][$i] ; 
$countrypopulation = $bindings['countrypopulation'];
$pop = $countrypopulation['value'];

$bindings = $results['bindings'][$i] ; 
$citylabel = $bindings['cityLabel'];
$cityname = $citylabel['value'];

$bindings = $results['bindings'][$i] ; 
$languagelabel = $bindings['languageLabel'];
$languagename = $languagelabel['value'];

$bindings = $results['bindings'][$i] ; 
$currencylabel = $bindings['currencyLabel'];
$currencyname = $currencylabel['value'];

$bindings = $results['bindings'][$i] ; 
$highestpointLabel = $bindings['highestpointLabel'];
$highestpointname = $highestpointLabel['value'];

$bindings = $results['bindings'][$i] ; 
$lowestpointLabel = $bindings['lowestpointLabel'];
$lowestpointname = $lowestpointLabel['value'];

$bindings = $results['bindings'][$i] ; 
$headofgovermentLabel = $bindings['headofgovermentLabel'];
$headofgovermentname = $headofgovermentLabel['value'];

$bindings = $results['bindings'][$i] ; 
$scoollesschild = $bindings['scoollesschild'];
$childs = $scoollesschild['value'];


$countrynamealt = $countryname;
$meinefrage ="Was ist die Hauptstadt von $countryname?";
$meinekat =8;
$meineAntwort =$capitalname;
$falscheAntwort ="";
$falscheAntwortlabel ='capitalLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wer ist Staatoberhaupt von $countryname?";
$meinekat =8;
$meineAntwort =$headofgovermentname;
$falscheAntwort ="";
$falscheAntwortlabel ='headofgovermentLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wie viele Einwohner hat $countryname?";
$meinekat =8;
$meineAntwort =$pop;
$falscheAntwort ="";
$falscheAntwortlabel ='countrypopulation';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Welche Sprache spricht man in $countryname?";
$meinekat =8;
$meineAntwort =$languagename;
$falscheAntwort ="";
$falscheAntwortlabel ='languageLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Welche Waehrung hat $countryname?";
$meinekat =8;
$meineAntwort =$currencyname;
$falscheAntwort ="";
$falscheAntwortlabel ='currencyLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wie heißt der höchste Punkt in $countryname? Tipp: Meistens ist das ein Berg ;)";
$meinekat =8;
$meineAntwort =$highestpointname;
$falscheAntwort ="";
$falscheAntwortlabel ='highestpointLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Wie heißt der niedrigste Punkt in $countryname? Tipp: Meistens sind das Seen und Flüsse ;)";
$meinekat =8;
$meineAntwort =$lowestpointname;
$falscheAntwort ="";
$falscheAntwortlabel ='lowestpointLabel';
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwort,$falscheAntwortlabel,$results,$bindingsarray);

$meinefrage ="Bildung ist wichtig, aber nicht jedes Kind geht in die Schule! Wie viele Kinder gehen in $countryname nicht in die Schule?";
$meinekat =8;
$meineAntwort =$childs;
$falscheAntwort ="";
$falscheAntwortlabel ='scoollesschild';
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
 while (($erstA ==$zweitA)OR ($zweitA==$meineAntwort)OR ($zweitA ==""));
 
 do {
 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $drittA = $bindings[$falscheAntwortlabel];
 $drittA=$drittA['value'];

} while (($drittA ==$zweitA)OR ($drittA==$meineAntwort)OR($drittA ==$erstA) OR ($drittA ==""));

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

