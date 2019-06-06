/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

// After having run `npm install wikidata-sdk`
const wdk = require('wikidata-sdk');
const authorQid = 'Q535';
const sparql = `
SELECT ?work ?date WHERE {
  ?work wdt:P50 wd:${authorQid} .
  OPTIONAL {
    ?work wdt:P577 ?date .
  }
}
`;
const url = wdk.sparqlQuery(sparql);

// request the generated URL with your favorite HTTP request library
request({ method: 'GET', url });

 



var xmlhttp = new XMLHttpRequest();

xmlhttp.onreadystatechange = function() {

  if (this.readyState == 4 && this.status == 200) {

    var myObj = JSON.parse(this.responseText);

    document.getElementById("demo").innerHTML = myObj.results.bindings[1].itemLabel.value;

  }

};

xmlhttp.open("GET", "https://query.wikidata.org/sparql?format=json&query=%23Katzen%0ASELECT%20%3Fitem%20%3FitemLabel%20%0AWHERE%20%0A%7B%0A%20%20%3Fitem%20wdt%3AP31%20wd%3AQ146.%0A%20%20SERVICE%20wikibase%3Alabel%20%7B%20bd%3AserviceParam%20wikibase%3Alanguage%20%22%5BAUTO_LANGUAGE%5D%2Cen%22.%20%7D%0A%7D%0ALIMIT%205", true);

xmlhttp.send();


 