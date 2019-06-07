<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fcity%20%3FcityLabel%20%3Fpopulation%20%3Fcountry%20%3FcountryLabel%20%3Floc%20WHERE%20%7B%0A%09%7B%0A%09%09SELECT%20(MAX(%3Fpopulation)%20AS%20%3Fpopulation)%20%3Fcountry%20WHERE%20%7B%0A%09%09%09%3Fcity%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ515%20.%0A%09%09%09%3Fcity%20wdt%3AP1082%20%3Fpopulation%20.%0A%09%09%09%3Fcity%20wdt%3AP17%20%3Fcountry%20.%0A%09%09%7D%0A%09%09GROUP%20BY%20%3Fcountry%0A%09%09ORDER%20BY%20DESC(%3Fpopulation)%0A%09%7D%0A%09%3Fcity%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ515%20.%0A%09%3Fcity%20wdt%3AP1082%20%3Fpopulation%20.%0A%09%3Fcity%20wdt%3AP17%20%3Fcountry%20.%0A%09%3Fcity%20wdt%3AP625%20%3Floc%20.%0A%09SERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%09%7D%0A%7D%0AORDER%20BY%20DESC%20(%3Fpopulation)";


$string = file_get_contents($url);
$json_result = json_decode($string, true);



$results = $json_result['results'];
$bindingsarray = $results['bindings'];

for ($i = 0; $i < 1; $i++) {
    
$bindings = $results['bindings'][$i] ; 
$citylabel = $bindings['cityLabel'];
$cityname = $citylabel['value'];





$population = $bindings['population'];
$Menge = $population['value'];

$countrylable = $bindings['countryLabel'];
$country = $countrylable['value'];
echo ($country);
echo ($Menge); 
echo ($cityname);  
}



$frage=new Frage;

$frage->beschreibung = "Was ist die Hauptstadt von $country ?";
$frage->Kategorie = 8;
$frage->antwortzeit = 10;

        


$frage->create(); // gibt Im Idealfall eingegebene ID zurück, sonst 0/false


$antwort=new Antwort;

$antwort->Antworttext=$cityname;
$antwort->korrekt=1;
$antwort->to_Frage = $frage->m_oid;  
$antwort->create();




for ($i = 0; $i < 3; $i++) {
 
 
   while ($cityname = $wrongcityname):
    $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
    $citylabel = $bindings['cityLabel'];
    $wrongcityname = $citylabel['value']; 
    endwhile; 
    

$antwort->Antworttext=$wrongcityname;
$antwort->korrekt=0;
$antwort->to_Frage = $frage->m_oid;  
$antwort->create();

};

