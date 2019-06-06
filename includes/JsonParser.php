<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$url = "https://query.wikidata.org/sparql?format=json&query=SELECT%20DISTINCT%20%3Fcity%20%3FcityLabel%20%3Fpopulation%20%3Fcountry%20%3FcountryLabel%20%3Floc%20WHERE%20%7B%0A%09%7B%0A%09%09SELECT%20(MAX(%3Fpopulation)%20AS%20%3Fpopulation)%20%3Fcountry%20WHERE%20%7B%0A%09%09%09%3Fcity%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ515%20.%0A%09%09%09%3Fcity%20wdt%3AP1082%20%3Fpopulation%20.%0A%09%09%09%3Fcity%20wdt%3AP17%20%3Fcountry%20.%0A%09%09%7D%0A%09%09GROUP%20BY%20%3Fcountry%0A%09%09ORDER%20BY%20DESC(%3Fpopulation)%0A%09%7D%0A%09%3Fcity%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ515%20.%0A%09%3Fcity%20wdt%3AP1082%20%3Fpopulation%20.%0A%09%3Fcity%20wdt%3AP17%20%3Fcountry%20.%0A%09%3Fcity%20wdt%3AP625%20%3Floc%20.%0A%09SERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%0A%09%7D%0A%7D";


$string = file_get_contents($url);
$json_result = json_decode($string, true);

$results = $json_result['results'];
$bindings = $results['bindings'][0] ; 
$citylabel = $bindings['cityLabel'];
$cityname = $citylabel['value'];

$population = $bindings['population'];
$Menge = $population['value'];

$mayorlabel = $bindings['mayorLabel'];
$mayor = $mayorlabel['value'];