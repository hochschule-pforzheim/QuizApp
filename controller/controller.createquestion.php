<?php

$kat=filter_input(INPUT_GET,"katid");

// Abfragen, welche Kategorie ausgewÃ¤hlt wurde und dementsprechend die richtige SQL-Abfrage aufrufen


if($kat=="7")
    {
// Kategorie Sport  
    $url ="https://query.wikidata.org/sparql?format=json&query=%0A%23Liga%0ASELECT%20distinct%20%3Ffootballleague%20%3FfootballleagueLabel%20%3Fcountry%20%3FcountryLabel%20%3FleaguelevelbelowLabel%20%3FnumberofparticipantsLabel%20%3FseasonstartLabel%20where%20%7B%0A%20%20%3Ffootballleague%20wdt%3AP31%20wd%3AQ15991303%20.%0A%20%20%20%0A%20%20%20%3Ffootballleague%20wdt%3AP17%20%3Fcountry%3B%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP2500%20%3Fleaguelevelbelow%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP1132%20%3Fnumberofparticipants%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP4794%20%3Fseasonstart.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Ffootballleague%20rdfs%3Alabel%20%3FfootballleagueLabel%20.%0A%20%20%20%20FILTER%20((CONTAINS(%3FfootballleagueLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FfootballleagueLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FfootballleagueLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FfootballleagueLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FfootballleagueLabel%2C%20%22o%22%20)))%0A%20%20%20%20%20%20%20%20%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Ffootballleague%0A%0ALimit%20100";
    $labels =array(
    "countryLabel",
    "leaguelevelbelowLabel",
    "seasonstartLabel",
    "numberofparticipantsLabel");


$fragestellung =[
    0 => "Zu welchem Land gehört die Liga: XXXXX?",    
    1 =>"Welche Liga ist der Liga: XXXXX untergeordnet?",
    2 =>"Wann beginnt die XXXXX?",
    3 =>"Wie viele Teilnehemer hat die Liga: XXXXX?"
    ];
    
      
      
      Help::questioncreator($url,$labels,7,$fragestellung);
      
    $url ="https://query.wikidata.org/sparql?format=json&query=%0A%23Sportsteam%0ASELECT%20distinct%20%3Fsportsteam%20%3FsportsteamLabel%20%3FcountryLabel%20%3FhomevenueLabel%20%3FleagueLabel%20%3FheadcoachLabel%20%3FcaptainLabel%20where%20%7B%0A%20%20%3Fsportsteam%20wdt%3AP31%20wd%3AQ15944511.%0A%20%20%0A%20%20%3Fsportsteam%20wdt%3AP17%20%3Fcountry%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP115%20%3Fhomevenue%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP118%20%3Fleague%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP286%20%3Fheadcoach.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%3Fsportsteam%20rdfs%3Alabel%20%3FsportsteamLabel%20.%0A%09%20%20%20%20FILTER%20((CONTAINS(%3FsportsteamLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FsportsteamLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FsportsteamLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FsportsteamLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FsportsteamLabel%2C%20%22o%22%20)))%0A%0A%20%20%20%20%20%20%20%20%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3FsportsteamLabel%0A%0ALimit%20100" ;
    
    $labels =array(
    "countryLabel",
    "homevenueLabel",
    "leagueLabel",
    "headcoachLabel");
      
      
    $fragestellung =[
        0 => "In welchem Land spielt XXXXX?",    
        1 =>"Wie heißt das Heimstadion von XXXXX?",
        2 =>"In welcher Liga spielt XXXXX?",
        3 =>"Wer ist der Trainer von XXXXX?"
        ];
      
      
      
      Help::questioncreator($url,$labels,7,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
    
}elseif ($kat=="8"){
    
    
    
    //FlÃ¼sse
  
    $url = "https://query.wikidata.org/sparql?format=json&query=%23L%C3%A4ngste%20Fl%C3%BCsse%20jedes%20Kontinents%0A%23added%20before%202016-10%0A%0ASELECT%20%3Friver%20%3FriverLabel%20%3Fcontinent%20%3FcontinentLabel%20%3Flength%0AWHERE%0A%7B%0A%20%20%7B%0A%20%20%20%20SELECT%20%3Fcontinent%20(MAX(%3Flength)%20AS%20%3Flength)%0A%20%20%20%20WHERE%0A%20%20%20%20%7B%0A%20%20%20%20%20%20%3Friver%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ355304%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP2043%20%3Flength%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP30%20%3Fcontinent.%0A%20%20%20%20%7D%0A%20%20%20%20GROUP%20BY%20%3Fcontinent%0A%20%20%7D%0A%20%20%3Friver%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ355304%3B%0A%20%20%20%20%20%20%20%20%20wdt%3AP2043%20%3Flength%3B%0A%20%20%20%20%20%20%20%20%20wdt%3AP30%20%3Fcontinent.%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22.%20%7D%0A%7D%0AORDER%20BY%20%3FcontinentLabel";
    
$labels =array(
    "length",
    "continentLabel");

$fragestellung =[
    0 =>"Wie lang ist der Fluss XXXXX?",    
    1 =>"Auf welchem Kontinent liegt der Fluss XXXXX?",
    ];
    Help::questioncreator($url,$labels,8,$fragestellung);
    
    
    
    
    
    //StÃ¤dte

$url = 'https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fcountry%20%3FcountryLabel%20%3Fcapital%20%3FcapitalLabel%20%3Fcountrypopulation%20%3Flanguage%20%3FlanguageLabel%20%3Fcurrency%20%24currencyLabel%20%3Fhighestpoint%20%3FhighestpointLabel%20%3Flowestpoint%20%3FlowestpointLabel%20%3Fheadofgoverment%20%3FheadofgovermentLabel%20%3Fformofgoverment%20%3FformofgovermentLabel%20%3FHDI%20%3Fscoollesschild%20%3Funemployment%0AWHERE%0A%7B%0A%20%20%3Fcountry%20wdt%3AP31%20wd%3AQ3624078%20.%0A%20%20%23not%20a%20former%20country%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ3024240%7D%0A%20%20%23and%20no%20an%20ancient%20civilisation%20(needed%20to%20exclude%20ancient%20Egypt)%0A%20%20FILTER%20NOT%20EXISTS%20%7B%3Fcountry%20wdt%3AP31%20wd%3AQ28171280%7D%0A%3Fcountry%20wdt%3AP36%20%3Fcapital%3B%0Awdt%3AP1082%20%3Fcountrypopulation%20%3B%0Awdt%3AP37%20%3Flanguage%20%3B%0Awdt%3AP38%20%3Fcurrency%3B%0Awdt%3AP610%20%3Fhighestpoint%3B%0Awdt%3AP1589%20%3Flowestpoint%3B%0Awdt%3AP6%20%3Fheadofgoverment%3B%0Awdt%3AP122%20%3Fformofgoverment%3B%0A%23wdt%3AP1081%20%3FHDI%3B%0Awdt%3AP2573%20%3Fscoollesschild%3B%20%20%20%20%20%20%20%20%20%0Awdt%3AP1198%20%3Funemployment.%0A%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%7D%0A%7D%0A%20%0AORDER%20BY%20%3FcountryLabel%0ALIMIT%20500000';

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
    0 =>"Was ist die Hauptstadt von XXXXX?",    
    1 =>"Wie viele Einwohner hat XXXXX?",
    2 =>"Welche Sprache spricht man in XXXXX?",
    3 =>"Welche Waehrung hat XXXXX?",
    4 =>"Wie heisst der höchste Punkt in XXXXX? Tipp: Meistens ist das ein Berg ;)",
    5 =>"Wie heisst der niedrigste Punkt in XXXXX? Tipp: Meistens sind das Seen und Flüsse ;)",
    6 =>"Bildung ist wichtig, aber nicht jedes Kind geht in die Schule! Wie viele Kinder gehen in XXXXX nicht in die Schule?",
    7 =>"Wer ist Staatoberhaupt von XXXXX?"
    ];

    Help::questioncreator($url,$labels,8,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
    
}elseif ($kat=="9"){
// Kategorie Kunst und Kultur
        //Musiker
      
      $url = "https://query.wikidata.org/sparql?format=json&query=%23Musician%0A%0Aselect%20distinct%20%3Fname%20%3FnameLabel%20%3FnameDescription%20%3FStadt%20%3FStadtLabel%20%3Fbirth(YEAR(%3Fbirth)%20as%20%3Fdate)%20where%20%7B%0A%20%20%20%20%3Fname%20wdt%3AP106%2Fwdt%3AP279*%20wd%3AQ639669%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP19%20%3FStadt%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP569%20%3Fbirth%20.%0A%20%20%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%2Cde%22%20%7D%0A%7D%0ALimit%2050";
      
      $labels =array(
        "StadtLabel",
        "date",
        );
      
    $fragestellung =[
            0 => "Was ist der Geburtsort des Musikers XXXXX?",    
            1 =>"Wann wurde der Musiker XXXXX geboren?",
            ];
      
    Help::questioncreator($url,$labels,9,$fragestellung); 
    
    
    
    
    //Schauspieler
    
         $url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20%3Fhuman%20%3FhumanLabel%20%3Fbirthdate%20%3FbirthdateLabel%20(YEAR(%3Fbirthdate)%20as%20%3Fdate)%20%3Fgender%20%3FgenderLabel%20%3Ffilmography%20%3FfilmographyLabel%20%3Fcountryship%20%3FcountryshipLabel%20%3Fbirthplace%20%3FbirthplaceLabel%0AWHERE%20%7B%0A%0A%20%20%0A%20%20%3Fhuman%20wdt%3AP31%20wd%3AQ5%20%3B%20%0A%20%20%20%20%20%20%20%20%20wdt%3AP106%20wd%3AQ33999.%0A%0A%20%20%0A%3Fhuman%20wdt%3AP1283%20%3Ffilmography%20%3B%20%0Awdt%3AP21%20%3Fgender%20%3B%0Awdt%3AP27%20%3Fcountryship%20%3B%0Awdt%3AP19%20%3Fbirthplace%20%3B%0Awdt%3AP569%20%3Fbirthdate%20.%0A%20%20%0AFILTER((%3Fbirthdate%20%3E%3D%20%221950-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20%26%26%20(%3Fbirthdate%20%3C%3D%20%222018-12-31T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime))%0A%20%20%20%20%20%20%20%0A%0A%0ASERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20%7D%0A%20%20%7D%0A%20%20%0AORDER%20BY%20%3Fhuman%0ALIMIT%201000";

$labels =array(
    "countryshipLabel",
    "date",
    "birthplaceLabel");

$fragestellung =[
    0 => "Welcher Nationalität gehört der Schauspieler XXXXX an?",    
    1 =>"Wann ist der Schauspieler XXXXX geboren?",
    2 =>"Wo ist der Schauspieler XXXXX geboren?"
    ];
      
      Help::questioncreator($url,$labels,9,$fragestellung);
    
      
      //Essen
        $url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20distinct%20%3Ffood%20%3FfoodLabel%20%3Forigin%20%3ForiginLabel%0Awhere%7B%0A%0A%0A%20%20%3Ffood%20wdt%3AP31%20wd%3AQ746549%20.%0A%20%20%0A%0A%20%20%3Ffood%20wdt%3AP495%20%3Forigin.%0A%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%3Ffood%20rdfs%3Alabel%20%3FfoodLabel%20.%0A%20%20%20%20FILTER%20((CONTAINS(%3FfoodLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22b%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22c%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22d%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22f%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22g%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22h%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22j%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22k%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22l%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22m%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22n%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22o%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22p%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22s%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22t%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22v%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22w%22%20))%7C%7C(CONTAINS(%3FfoodLabel%2C%20%22z%22%20))%20)%20%20%20%20%20%20%20%20%20%0A%0ASERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%2Cen%22%20%7D%0A%20%20%7D%0A%20%20%0AORDER%20BY%20%3FfoodLabel%0ALIMIT%20500";

    $labels =array(
        "originLabel"
        );

    $fragestellung =[
            0 => "Aus welchem Land stammt das Gericht XXXXX ursrpünglich?",
            ];
    Help::questioncreator($url,$labels,9,$fragestellung);

    
        
        //Gemälde
    $url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fpainting%20%3FpaintingLabel%20%3FpaintingDescription%20%3Fcreator%20%3FcreatorLabel%20%3Fcollection%20%3FcollectionLabel%20%3Forigin%20%3ForiginLabel%20%3Fheigth%20%3Fweight%20WHERE%20%7B%0A%20%20%20%20%3Fpainting%20wdt%3AP31%20wd%3AQ3305213%20.%0A%20%20%0A%20%20%20%20%20%20%20%20%3Fpainting%20%20wdt%3AP170%20%3Fcreator%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP135%20%3Fgenre%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP495%20%3Forigin%3B%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP2048%20%3Fheigth%20%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP2049%20%3Fweight%20%3B%20%20%20%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP195%20%3Fcollection%20.%0A%20%20%20%20%20%20%20%3Fcreator%20rdfs%3Alabel%20%3FcreatorLabel%20.%0A%20%20%20%20FILTER%20((CONTAINS(%3FcreatorLabel%2C%20%22della%22))%20%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22Dal%22%20))%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22Monet%22%20))%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22Cassat%22%20))%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22Gogh%22%20))%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22recht%22%20))%7C%7C%20(CONTAINS(%3FcreatorLabel%2C%22da%22%20)))%20%20%20%20%20%20%20%20%20%20%0A%0A%20%20%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20%7D%0A%7D%0ALimit%20100";

    $labels =array(
        "creatorLabel",
        "collectionLabel",
        "originLabel",
        "weight"
        );

    $fragestellung =[
            0 => "Von wem stammt das Gemälde XXXXX?",    
            1 =>"Wo wird das Gemälde XXXXX ausgestellt?",
            2 =>"Wo wurde das Gemälde XXXXX gemalt?",
            3 =>"Wie breit ist das Gemälde XXXXX?",
            ];
    Help::questioncreator($url,$labels,9,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
        
    
}elseif ($kat=="10"){
// Kategorie Bio
    
Core::addError("Für diese Kategorie können keine Fragen generiert werden.");

}elseif ($kat=="11"){
// Kategorie Architektur
    
    
    
    
        //Türme

     $url = "https://query.wikidata.org/sparql?format=json&query=%23tower%0ASELECT%20distinct%20%3Ftower%20%3FtowerLabel%20%3FheightLabel%20%3FcountryLabel%20%0AWHERE%20%7B%0A%0A%20%20%7B%0A%09%09SELECT%20%3Fcountry%20(MAX(%3Fheight)%20AS%20%3Fheight)%20%20WHERE%20%7B%0A%09%09%09%20%20%3Ftower%20wdt%3AP31%20wd%3AQ12518%20.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Ftower%20wdt%3AP2048%20%3Fheight%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP17%20%3Fcountry%3B%0A%09%09%7D%0A%09%09GROUP%20BY%20%3Fcountry%0A%09%09ORDER%20BY%20DESC(%3Fheight)%7D%0A%0A%20%20%3Ftower%20wdt%3AP31%20wd%3AQ12518.%0A%20%20%3Ftower%20wdt%3AP2048%20%3Fheight%3B%0A%20%20%20%20%20%20%20%20%20%20wdt%3AP17%20%3Fcountry.%0A%0A%20%20%20%20%20%20%20%3Ftower%20rdfs%3Alabel%20%3FtowerLabel%20.%0A%20%20%20%20FILTER%20((CONTAINS(%3FtowerLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FtowerLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FtowerLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FtowerLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FtowerLabel%2C%20%22o%22%20)))%0A%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Ftower%20%0ALimit%20100";
      
      $labels =array(
        "countryLabel",
        "heightLabel",
        );
    $fragestellung =[
            0 => "Wo liegt der Turm XXXXX?",    
            1 =>"Wie hoch ist der Turm XXXXX?",
            ];
    
Help::questioncreator($url,$labels,11,$fragestellung);
    
      //Sehenswürdigkeiten
$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20distinct%20%3Ftouristattraction%20%3FtouristattractionLabel%20%3Fcountry%20%3FcountryLabel%20%3FnamedafterLabel%20%3FarchitectLabel%20%3FarchitectureLabel%20where%7B%0A%20%20%3Ftouristattraction%20wdt%3AP31%20wd%3AQ570116.%0A%20%20%20%20%20%20%20%0A%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%3Ftouristattraction%20wdt%3AP17%20%3Fcountry%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP138%20%3Fnamedafter%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP84%20%3Farchitect%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP149%20%3Farchitecture.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Ftouristattraction%20rdfs%3Alabel%20%3FtouristattractionLabel%20.%0A%20%20%20%20FILTER%20((CONTAINS(%3FtouristattractionLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22b%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22c%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22d%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22f%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22g%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22h%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22j%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22k%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22l%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22m%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22n%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22o%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22p%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22s%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22t%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22v%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22w%22%20))%7C%7C(CONTAINS(%3FtouristattractionLabel%2C%20%22z%22%20))%20)%20%20%20%20%20%20%20%20%20%0A%20%20%0A%20%20%20%20%20%20%20%20%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Ftouristattraction%0ALimit%20100";

$labels =array(
        "countryLabel",
        "namedafterLabel",
        "architectLabel",
        "architectureLabel"
        );

$fragestellung =[
            0 => "Wo liegt die Touristenattaktion: XXXXX?",    
            1 =>"Nach was oder Wem wurde XXXXX benannt?",
            2 =>"Wer war der Architect von XXXXX?",
            3 =>"In welchen Architekturstil passt XXXXX?",
            ];
Help::questioncreator($url,$labels,11,$fragestellung); 
    Core::addError("Die Fragen wurden angelegt.");
    
}elseif ($kat=="13"){
// Kategorie Wirtschaft
$url ="https://query.wikidata.org/sparql?format=json&query=%23Partei%0ASELECT%20distinct%20%3Fpolitical_party%20%3Fpolitical_partyLabel%20%3FcountryLabel%20%3Fheadquarters_locationLabel%20%3Fmember_countLabel%20%3FchairpersonLabel%20where%20%7B%0A%20%20%3Fpolitical_party%20wdt%3AP31%20wd%3AQ7278%20.%0A%20%20%20%0A%20%20%20%20%3Fpolitical_party%20wdt%3AP17%20%3Fcountry%20%3B%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP159%20%3Fheadquarters_location%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP2124%20%3Fmember_count%20.%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20OPTIONAL%20%7B%20%3Fpolitical_party%20wdt%3AP488%20%3Fchairperson%20.%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Fchairperson%20rdfs%3Alabel%20%3FchairpersonLabel%20filter%20(lang(%3FchairpersonLabel)%20%3D%20%22en%22).%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Fpolitical_party%20rdfs%3Alabel%20%3Fpolitical_partyLabel%20.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20FILTER%20((CONTAINS(%3Fpolitical_partyLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22o%22%20)))%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%0A%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Fpolitical_party%0A%0ALimit%20100" ;
    $labels =array(
    "countryLabel",
    "headquarters_locationLabel",
    "member_countLabel",
    "chairpersonLabel" ,   
    );
$fragestellung =[
    0 => "Zu welchem Land gehört die Partei XXXXX?",    
    1 =>"Wo befindet sich der Hauptsitz der Partei XXXXX?",
    2=>"Wie viele Mitglieder hat die Partei XXXXX?",
    3=>"Wer ist der Vorsitzende der Partei XXXXX?",
    ];
    Help::questioncreator($url,$labels,15,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
}elseif ($kat=="14"){
// Kategorie Wissenschaft
    
    $urls =array(
    "https://query.wikidata.org/sparql?format=json&query=%0A%23Literaturnobelpreis%0A%0ASELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fwhen%20(YEAR(%3Fwhen)%20as%20%3Fdate)%20%3Fstadt%20%3FstadtLabel%20%3Fbirth%20(YEAR(%3Fbirth)%20as%20%3Fbirthdate)%0AWHERE%20%7B%0A%20%20%0A%20%20%3Fitem%20p%3AP166%20%3FawardStat%20.%20%23%20%E2%80%A6%20with%20an%20awarded(P166)%20statement%0A%20%20%3FawardStat%20ps%3AP166%20wd%3AQ37922%20.%20%23%20%E2%80%A6%20that%20has%20the%20value%20Nobel%20Prize%20in%20iterature%20(Q37922)%0A%20%20%3FawardStat%20pq%3AP585%20%3Fwhen%20%3B%20%23%20when%20did%20he%20receive%20the%20Nobel%20prize%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP19%20%3Fstadt%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP569%20%3Fbirth%20.%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0AFILTER%20(%3Fwhen%20%3E%3D%20%221980-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20.%0A%0A%0A%0A%20%20%0ASERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%20%7D%0A%0A%7D%0A%0AORDER%20by%20%3Fwhen",
    "https://query.wikidata.org/sparql?format=json&query=%0A%23Nobelpreis%20in%20Chemie%0A%0ASELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fwhen%20(YEAR(%3Fwhen)%20as%20%3Fdate)%20%3Fstadt%20%3FstadtLabel%20%3Fbirth%20(YEAR(%3Fbirth)%20as%20%3Fbirthdate)%0AWHERE%20%7B%0A%20%20%0A%20%20%3Fitem%20p%3AP166%20%3FawardStat%20.%20%23%20%E2%80%A6%20with%20an%20awarded(P166)%20statement%0A%20%20%3FawardStat%20ps%3AP166%20wd%3AQ44585%20.%20%23%20%E2%80%A6%20that%20has%20the%20value%20Nobel%20Prize%20in%20Chemistry%20(Q44585)%0A%20%20%3FawardStat%20pq%3AP585%20%3Fwhen%20%3B%20%23%20when%20did%20he%20receive%20the%20Nobel%20prize%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP19%20%3Fstadt%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP569%20%3Fbirth%20.%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0AFILTER%20(%3Fwhen%20%3E%3D%20%221980-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20.%0A%0A%0A%20%20%0ASERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%20%7D%0A%0A%7D%0A%0AORDER%20by%20%3Fwhen",
    "https://query.wikidata.org/sparql?format=json&query=%23Nobelpreis%20in%20Physik%0A%0ASELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fwhen%20(YEAR(%3Fwhen)%20as%20%3Fdate)%20%3Fstadt%20%3FstadtLabel%20%3Fbirth%20(YEAR(%3Fbirth)%20as%20%3Fbirthdate)%0AWHERE%20%7B%0A%20%20%0A%20%20%3Fitem%20p%3AP166%20%3FawardStat%20.%20%23%20%E2%80%A6%20with%20an%20awarded(P166)%20statement%0A%20%20%3FawardStat%20ps%3AP166%20wd%3AQ38104%20.%20%23%20%E2%80%A6%20that%20has%20the%20value%20Nobel%20Prize%20in%20Physics%20(Q38104)%0A%20%20%3FawardStat%20pq%3AP585%20%3Fwhen%20%3B%20%23%20when%20did%20he%20receive%20the%20Nobel%20prize%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP19%20%3Fstadt%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP569%20%3Fbirth%20.%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0AFILTER%20(%3Fwhen%20%3E%3D%20%221980-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20.%0A%0A%0A%20%20%0ASERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%20%7D%0A%0A%7D%0A%0AORDER%20by%20%3Fwhen",
    "https://query.wikidata.org/sparql?format=json&query=%23Nobelpreis%20in%20Physiologie%20oder%20Medizin%20%0A%0ASELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fwhen%20(YEAR(%3Fwhen)%20as%20%3Fdate)%20%3Fstadt%20%3FstadtLabel%20%3Fbirth%20(YEAR(%3Fbirth)%20as%20%3Fbirthdate)%0AWHERE%20%7B%0A%20%20%0A%20%20%3Fitem%20p%3AP166%20%3FawardStat%20.%20%23%20%E2%80%A6%20with%20an%20awarded(P166)%20statement%0A%20%20%3FawardStat%20ps%3AP166%20wd%3AQ80061%20.%20%23%20%E2%80%A6%20that%20has%20the%20value%20Nobel%20Prize%20in%20Physiologie%20or%20Medicine%20(Q80061)%0A%20%20%3FawardStat%20pq%3AP585%20%3Fwhen%20%3B%20%23%20when%20did%20he%20receive%20the%20Nobel%20prize%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP19%20%3Fstadt%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP569%20%3Fbirth%20.%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0AFILTER%20(%3Fwhen%20%3E%3D%20%221980-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20.%0A%0A%0A%20%20%0ASERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%20%7D%0A%0A%7D%0A%0AORDER%20by%20%3Fwhen",
    "https://query.wikidata.org/sparql?format=json&query=%0A%23Friedensnobelpreis%0A%0ASELECT%20DISTINCT%20%3Fitem%20%3FitemLabel%20%3Fwhen%20(YEAR(%3Fwhen)%20as%20%3Fdate)%20%3Fstadt%20%3FstadtLabel%20%3Fbirth%20(YEAR(%3Fbirth)%20as%20%3Fbirthdate)%0AWHERE%20%7B%0A%20%20%0A%20%20%3Fitem%20p%3AP166%20%3FawardStat%20.%20%23%20%25E2%2580%25A6%20with%20an%20awarded(P166)%20statement%0A%20%20%3FawardStat%20ps%3AP166%20wd%3AQ35637%20.%20%23%20%25E2%2580%25A6%20that%20has%20the%20value%20Nobel%20Peace%20Prize%20(Q35637)%0A%20%20%3FawardStat%20pq%3AP585%20%3Fwhen%20%3B%20%23%20when%20did%20he%20receive%20the%20Nobel%20prize%0A%20%20%0A%20%20OPTIONAL%7B%20%3Fitem%20wdt%3AP19%20%3Fstadt%20%3B%20%0A%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%0A%20%3Fitem%20wdt%3AP569%20%3Fbirth%20.%20%0A%20%20%20%20%20%20%20%20%20%20%0A%20%20FILTER%20(%3Fwhen%20%3E%3D%20%221980-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)%20.%0A%20%20%0A%20%20%0A%20%20%0ASERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%20%7D%0A%0A%7D%0A%0AORDER%20by%20%3Fwhen"
        );
    
    $preise =array(
    "Literaturnobelpreis",
    "Chemienobelpreis",
    "Physiknobelpreis",
    "Physiologienobelpreis",
    "Friedensnobelpreis",
);


    
        $labels =array(
        "date",
        "stadtLabel",
        "birthdate"
        );
$p= 0;
 
foreach ($urls as $url){
    
        $fragestellung =[
            0 => "Wann hat XXXXX den $preise[$p] bekommen?",    
            1 =>"Wo wurde der Nobelpreisträger XXXXX geboren?",
            2 =>"Wann ist der Nobelpreisträger XXXXX geboren?",
            ];
    
  Help::questioncreator($url,$labels,14,$fragestellung);  
    $p++;
   
};
     Core::addError("Die Fragen wurden angelegt.");
  
}elseif ($kat=="15"){
// Kategorie Politik
    $url ="https://query.wikidata.org/sparql?format=json&query=%23Partei%0ASELECT%20distinct%20%3Fpolitical_party%20%3Fpolitical_partyLabel%20%3FcountryLabel%20%3Fheadquarters_locationLabel%20%3Fmember_countLabel%20%3FchairpersonLabel%20where%20%7B%0A%20%20%3Fpolitical_party%20wdt%3AP31%20wd%3AQ7278%20.%0A%20%20%20%0A%20%20%20%20%3Fpolitical_party%20wdt%3AP17%20%3Fcountry%20%3B%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP159%20%3Fheadquarters_location%3B%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20wdt%3AP2124%20%3Fmember_count%20.%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20OPTIONAL%20%7B%20%3Fpolitical_party%20wdt%3AP488%20%3Fchairperson%20.%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Fchairperson%20rdfs%3Alabel%20%3FchairpersonLabel%20filter%20(lang(%3FchairpersonLabel)%20%3D%20%22en%22).%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%7D%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%3Fpolitical_party%20rdfs%3Alabel%20%3Fpolitical_partyLabel%20.%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20FILTER%20((CONTAINS(%3Fpolitical_partyLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3Fpolitical_partyLabel%2C%20%22o%22%20)))%0A%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%20%0A%20%0A%20%20%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%0A%20%20%20%20bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%0A%20%20%7D%0A%7D%20ORDER%20BY%20%3Fpolitical_party%0A%0ALimit%20100" ;
    $labels =array(
    "countryLabel",
    "headquarters_locationLabel",
    "member_countLabel",
    "chairpersonLabel" ,   
    );
$fragestellung =[
    0 => "Zu welchem Land gehört die Partei XXXXX?",    
    1 =>"Wo befindet sich der Hauptsitz der Partei XXXXX?",
    2=>"Wie viele Mitglieder hat die Partei XXXXX?",
    3=>"Wer ist der Vorsitzende der Partei XXXXX?",
    ];
    Help::questioncreator($url,$labels,15,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
    
}elseif ($kat=="16"){
// Kategorie Astronomie
          $url = "https://query.wikidata.org/sparql?format=json&query=%23%20Planeten%0A%0A%23%20distance%20%3D%20Entfernung%20zu%20Erde%0A%0A%23%20period%20%3D%20siderische%20Periode%20(ZEit%20f%C3%BCr%201%20Umlauf%20auf%20Bahn%0A%0ASELECT%20%3Fobjekt%20%3FobjektLabel%20%3Fplanet%20%3FplanetLabel%20%3Fmass%20%3Fdistance%20%3Fperiod%20%20%7B%0A%0A%3Fobjekt%20wdt%3AP31%20wd%3AQ17444909%20%3B%0A%0A%20%20%20%20%20%20%20%20wdt%3AP5869%20%3Fplanet%20.%0A%0A%20%20%3Fplanet%20wdt%3AP2067%20%3Fmass%20%3B%0A%0A%20%20%20%20%20%20%20%20wdt%3AP2583%20%3Fdistance%20%3B%0A%0A%20%20%20%20%20%20%20%20wdt%3AP2146%20%3Fperiod%20.%0A%09%0A%0A%0A%0ASERVICE%20wikibase%3Alabel%20%7B%0A%0Abd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%0A%0A%7D%0A%0A%7D%0A%0AOrder%20BY%20%3Fobjekt%0A%0ALimit%2050";
              
$labels =array(
    "mass",
    "distance",
    "period",
    );

$fragestellung =[
    0 => "Was ist die Masse (in kg) des Planeten XXXXX?",    
    1 =>"Wie weit ist der Planet (in km) XXXXX von der Erde entfernt?",
    2=>"Wie lange ist eine sideriche Periode(in Tagen) bei XXXXX?",
    ];
    Help::questioncreator($url,$labels,16,$fragestellung);
    Core::addError("Die Fragen wurden angelegt.");
    
}elseif ($kat=="17"){
// Kategorie Literatur
    $url = "https://query.wikidata.org/sparql?format=json&query=%23%20B%C3%BCcher%0A%0ASELECT%20%3Fbook%20%3FbookLabel%20%3FauthorLabel%20%20%20(YEAR(%3FpublicationDate)%20as%20%3Fdate)%20%23%3Fgenre_label%20%3Fseries_label%0AWHERE%0A%7B%0A%09%3Fbook%20wdt%3AP31%20wd%3AQ571%20.%0A%09%3Fbook%20wdt%3AP50%20%3Fauthor%20%3B%0A%09%0A%09OPTIONAL%20%7B%0A%09%09%3Fbook%20wdt%3AP577%20%3FpublicationDate%20.%0A%09%7D%0A%20%20%3Fbook%20rdfs%3Alabel%20%3FbookLabel%20.%0AFILTER((CONTAINS(%3FbookLabel%2C%20%22a%22%20))%7C%7C(CONTAINS(%3FbookLabel%2C%20%22e%22%20))%7C%7C(CONTAINS(%3FbookLabel%2C%20%22i%22%20))%7C%7C(CONTAINS(%3FbookLabel%2C%20%22u%22%20))%7C%7C(CONTAINS(%3FbookLabel%2C%20%22o%22%20)))%09%0AFILTER(((%3FpublicationDate%20%3E%3D%20%222000-01-01T00%3A00%3A00Z%22%5E%5Exsd%3AdateTime)))%09%0A%09SERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22de%22%20.%0A%09%7D%0A%7D%0A%23GROUP%20BY%20%3FbookLabel%0ALimit%201000";
      
$labels =array(
    "authorLabel",
    "date",
    );

$fragestellung =[
    0 => "Wer ist Autor des Buches XXXXX?",    
    1 =>"Wann ist das Buch XXXXX erschienen?",  
    ];
      Help::questioncreator($url,$labels,17,$fragestellung);
      Core::addError("Die Fragen wurden angelegt.");
}


