<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fcountry%20%3FcountryLabel%20%3Fcapital%20%3FcapitalLabel%20%3Fcountrypopulation%20%3Flanguage%20%3FlanguageLabel%20%3Fcurrency%20%24currencyLabel%20%3Fhighestpoint%20%3FhighestpointLabel%20%3Flowestpoint%20%3FlowestpointLabel%20%3Fheadofgoverment%20%3FheadofgovermentLabel%20%3Fformofgoverment%20%3FformofgovermentLabel%20%3FHDI%20%3Fscoollesschild%20%3Funemployment%0AWHERE%0A%7B%0A%20%20%3Fcountry%20wdt%3AP31%20wd%3AQ3624078%20.%0A%20%20%23not%20a%20former%20country%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ3024240%7D%0A%20%20%23and%20no%20an%20ancient%20civilisation%20(needed%20to%20exclude%20ancient%20Egypt)%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ28171280%7D%0A%3Fcountry%20wdt%3AP36%20%3Fcapital%3B%0Awdt%3AP1082%20%3Fcountrypopulation%20%3B%0Awdt%3AP37%20%3Flanguage%20%3B%0Awdt%3AP38%20%3Fcurrency%3B%0Awdt%3AP610%20%3Fhighestpoint%3B%0Awdt%3AP1589%20%3Flowestpoint%3B%0Awdt%3AP6%20%3Fheadofgoverment%3B%0Awdt%3AP122%20%3Fformofgoverment%3B%0A%23wdt%3AP1081%20%3FHDI%3B%0Awdt%3AP2573%20%3Fscoollesschild%3B%20%20%20%20%20%20%20%20%20%0Awdt%3AP1198%20%3Funemployment.%0A%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%7D%0A%7D%0A%20%0AORDER%20BY%20%3FcountryLabel%0ALIMIT%20500000";

$labels =array(
    "capitalLabel",
    "countrypopulation",
    "languageLabel",
    "currencyLabel",
    "highestpointLabel",
    "lowestpointLabel",
    "scoollesschild",
    "headofgovermentLabel");


$fragestellung =[
    0 => "Was ist die Hauptstadt von XXXXX?",    
    1 =>"Wie viele Einwohner hat XXXXX?",
    2 =>"Welche Sprache spricht man in XXXXX?",
    3 =>"Welche Waehrung hat XXXXX?",
    4 =>"Wie heißt der höchste Punkt in XXXXX? Tipp: Meistens ist das ein Berg ;)",
    5 =>"Wie heißt der niedrigste Punkt in XXXXX? Tipp: Meistens sind das Seen und Flüsse ;)",
    6 =>"Bildung ist wichtig, aber nicht jedes Kind geht in die Schule! Wie viele Kinder gehen in XXXXX nicht in die Schule?",
    7 =>"Wer ist Staatoberhaupt von XXXXX?"
    ];



$url = "https://query.wikidata.org/sparql?format=json&query=%23Schauspieler%0A%0ASELECT%20%3Fhuman%20%3FhumanLabel%20%3Fbirthdate%20%3FbirthdateLabel%20%3Fgender%20%3FgenderLabel%20%3Ffilmography%20%3FfilmographyLabel%20%3Fcountryship%20%3FcountryshipLabel%20%3Fbirthplace%20%3FbirthplaceLabel%0AWHERE%20%7B%0A%0A%20%20%0A%20%20%3Fhuman%20wdt%3AP31%20wd%3AQ5%20%3B%20%0A%20%20%20%20%20%20%20%20%20wdt%3AP106%20wd%3AQ33999.%0A%0A%20%20%0A%3Fhuman%20wdt%3AP1283%20%3Ffilmography%20%3B%20%0Awdt%3AP21%20%3Fgender%20%3B%0Awdt%3AP27%20%3Fcountryship%20%3B%0Awdt%3AP19%20%3Fbirthplace%20%3B%0Awdt%3AP569%20%3Fbirthdate%20%3B%0AFILTER((%3Fbirthdate%20%3E%3D%20%221950-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20%26%26%20(%3Fbirthdate%20%3C%3D%20%222018-12-31T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime))%0A%20%20%20%20%20%20%20%0A%0A%0ASERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20%7D%0A%20%20%7D%0A%20%20%0AORDER%20BY%20%3Fhuman%0ALIMIT%201000%0A";

$labels =array(
    "countryshipLabel",
    "birthplaceLabel",
    "birthdateLabel");

$fragestellung =[
    0 => "Welche Nationalität gehört XXXXX an?",    
    1 =>"Wann ist XXXXX geboren?",
    2 =>"Wo ist XXXXX geboren?"
    ];


questioncreator($url,$labels,8,$fragestellung);

function questioncreator($url, $labels, $meineKat,$fragestellung) {
    
    

$string = file_get_contents($url);
$json_result = json_decode($string, true);
$results = $json_result['results'];
$bindingsarray = $results['bindings'];
$header = $json_result['head'];
$vars = $header['vars'];
$primarykey = $vars[1];


for ($i = 0; $i < 10; $i++) {
    
 do { 
    
$bindings = $results['bindings'][$i] ; 
$primarykeylabel = $bindings[$primarykey];
$primarykeyvalue = $primarykeylabel['value'];
 $i++;
 $bindings2 = $results['bindings'][$i] ; 
$primarykeylabel2 = $bindings2[$primarykey];
$primarykeyvalue2 = $primarykeylabel2['value'];
 } 
 while ($primarykeyvalue ==$primarykeyvalue2);  
 
  $i--; 
  
$meinekat =8;
$primarykeyvalueold = $primarykeyvalue;
$j = 0;

Foreach ($fragestellung as $quest){
$pos = strpos($quest,"XXXXX");

$frage = substr($quest,0,$pos);
$fragenende = substr($quest,$pos+5); 
$questions[$j] = "$frage $primarykeyvalue$fragenende";
$j++;
};

 
$k = 0;
foreach ($labels as &$value) {
      
$label = $bindings[$value];
$wert = $label['value'];
$meinefrage = $questions[$k];
$falscheAntwortlabel =$value;

$meineAntwort =$wert;
 $k++;
createmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwortlabel,$results,$bindingsarray);
}
  
}

}
function createmyquestion($meinefrage, $meinekat, $meineAntwort,$falscheAntwortlabel,$results,$bindingsarray) {
    
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
} 
while (($drittA ==$zweitA)OR ($drittA==$meineAntwort)OR($drittA ==$erstA) OR ($drittA ==""));


$falscheAntwort =[
    0 => $erstA,
     1 =>$zweitA,
     2 =>$drittA];

for ($i = 0; $i < 3; $i++) {     
   
$antwort->Antworttext=$falscheAntwort[$i];
$antwort->korrekt=0;
$antwort->to_Frage = $frage->m_oid;  
$antwort->create();
} 
};


