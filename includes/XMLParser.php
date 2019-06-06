<?php


        
$url = "https://query.wikidata.org/sparql?format=json&query=%23Largest%20cities%20with%20female%20mayor%0ASELECT%20DISTINCT%20%20%3FcityLabel%20%3Fpopulation%20%3FmayorLabel%20%0AWHERE%20%0A%7B%0A%09%3Fcity%20wdt%3AP31%2Fwdt%3AP279*%20wd%3AQ515%20.%20%20%23%20find%20instances%20of%20subclasses%20of%20city%0A%09%3Fcity%20p%3AP6%20%3Fstatement%20.%20%20%20%20%20%20%20%20%20%20%20%20%23%20with%20a%20P6%20(head%20of%20goverment)%20statement%0A%09%3Fstatement%20ps%3AP6%20%3Fmayor%20.%20%20%20%20%20%20%20%20%20%20%20%23%20...%20that%20has%20the%20value%20%3Fmayor%0A%09%3Fmayor%20wdt%3AP21%20wd%3AQ6581072%20.%20%20%20%20%20%20%20%23%20...%20where%20the%20%3Fmayor%20has%20P21%20(sex%20or%20gender)%20female%0A%09FILTER%20NOT%20EXISTS%20%7B%20%3Fstatement%20pq%3AP582%20%3Fx%20%7D%20%20%23%20...%20but%20the%20statement%20has%20no%20P582%20(end%20date)%20qualifier%0A%09%20%0A%09%23%20Now%20select%20the%20population%20value%20of%20the%20%3Fcity%0A%09%23%20(wdt%3A%20properties%20use%20only%20statements%20of%20%22preferred%22%20rank%20if%20any%2C%20usually%20meaning%20%22current%20population%22)%0A%09%3Fcity%20wdt%3AP1082%20%3Fpopulation%20.%0A%09%23%20Optionally%2C%20find%20English%20labels%20for%20city%20and%20mayor%3A%0A%09SERVICE%20wikibase%3Alabel%20%7B%0A%09%09bd%3AserviceParam%20wikibase%3Alanguage%20%22en%22%20.%0A%09%7D%0A%7D%0AORDER%20BY%20DESC(%3Fpopulation)%0ALIMIT%2019";


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

?>