<?php

class Help{
    
  
    
    /**
     * Wandelt Kommazahl ins kaufmännische Format um
     * 
     * Üblicherweis zur Ausgabe in der View
     * @param float $value zu konvertierende Zahl
     * @return String im kaufmännischen Format z.B. 1.234,25 €
     * 
     */
    public static function currency($value)
    {
        return number_format($value,2,",",".")." €";
    }
       /**
     * Wandelt  kaufmännische Format in Kommazahl  mit . für MySQL um
     * 
     * Üblicherweis zur Ausgabe in der View
     * @param String $value Zahl (kaufmännisches Format
     * @return float im MySQL-tauglichen Format 1.234,25 € => 1234.25
     * 
     */
    public static function currencyMySQL($value)
    {
        $temp= str_replace(".","",$value); //entfernt den Tausenderpunkt
        $temp= str_replace(",",".",$temp);
        $temp= filter_var($temp, FILTER_SANITIZE_NUMBER_FLOAT,FILTER_FLAG_ALLOW_FRACTION); // konvertiert in Zahl und entfernt ungültige Zeichen, auch €-Zeichen
        return  $temp; // ersetzt deutsches Komma mit Punkt
      }
    
    
     /**
     * Formatiert einen Boolean Wert mit individuellem Text
     * @param Boolean $value Wert der gerendert werden soll
     * @param String $true optional Anzeige für Wahr
     * @param String $false optional Anzeige für Falsch 
     * @return String im Format z.B. 21.12.2018 
     */
    public static function boolText($value,$true="richtig",$false="falsch"){
        if($value){
            return $true;
        }else{
            return $false;
        }
    }
    
    
    
    
    /**
     * Formatiert einen Timestamp in deutsches Datum 
      * 
      * In PHP bekommt man mittels time() den Zeitstempel der aktuellen Systemzeit
      * Formell handelt es sich bei einem Timestamp um einen Long-Wert
     * @param long $ts Timestamp
     * @return String im Format z.B. 21.12.2018 
     */
    public static function toDate($ts){
        return date('d.m.Y',$ts);    
    }
     public static function toDateShort($ts){
        return date('d.m',$ts);    
    }
      /**
     * Formatiert einen Timestamp in deutsches Datum samt Uhrzeit
      * 
      * In PHP bekommt man mittels time() den Zeitstempel der aktuellen Systemzeit
      * Formell handelt es sich bei einem Timestamp um einen Long-Wert
     * @param long $ts Timestamp
     * @return String im Format z.B. 21.12.2018 20:15:37
     */
    public static function toDateTime($ts){
        return date('d.m.Y H:i:s',$ts);    
    }
   
    
     /**
     * Erzeugt eine mit dynamischen Daten gefüllte HTML-Klappbox/Menü (<select>)
      * 
      * Es ist dafür eine Liste(Array) mit Objekten einer Tabelle nötig(z.B: $help->sql_queryList), die über ein entsprechendes model bereitgestellt werden muss.
      * Das Ganze ist  für eine Janus-Enumeration automatisch voreingerstellt, kann aber über Parameter konfiguriert werden. 
      * Standardmäßig wird ein Menü mit dem Namen SELECT erzeugt
      * @param Objectarray $obj Objektarray der Datenbanktabelle/Abfrage
      * @param array $arr folgende Arrayfelder sind zulässig:
      * $name="select";
      * $key="rno";
      * $text="myval";
      * $default="";
      * $class="";
 *
     * @return String HTML-Ausgabe, samt Daten
     */	
	public static function htmlSelect($obj,$arr= [])    {
        $name="select";
        $key="rno";
        $text="myval";
        $default="";
        $class="";
        if(isset($arr['name'])){$name=$arr['name'];}
        if(isset($arr['default'])){$default=$arr['default'];}
        if(isset($arr['key'])){$key=$arr['key'];}
        if(isset($arr['text'])){$text=$arr['text'];}
        if(isset($arr['class'])){$class=$arr['class'];}
        if(isset($arr['label'])){             
        $label=$arr['label'];
        ?> <label for="<?=$name?>"><?=$label?>:</label><?php
        }
        ?><select name="<?=$name?>" id="<?=$name?>" class="<?=$class?>">
         <?php
        foreach($obj as $item){
        ?>
  <option value="<?=$item->$key?>"
    <?php
  if($default!=""){
      if($item->$key==$default){
          echo ' selected="selected"';          
      }
  }
  ?>><?=$item->$text?></option>
      <?php } ?>
</select>
        <?php        
    }
	
      /**
     * Erzeugt eine mit dynamischen Daten gefüllte HTML-Klappbox/Menü samt Bild(<select>)
      * 
      * Es ist dafür eine Liste(Array) mit Objekten einer Tabelle nötig(z.B: $help->sql_queryList), die über ein entsprechendes model bereitgestellt werden muss.
      * Das Ganze ist  für eine Janus-Enumeration automatisch voreingerstellt, kann aber über Parameter konfiguriert werden. 
      * Standardmäßig wird ein Menü mit dem Namen SELECT erzeugt
      * @param Objectarray $obj Objektarray der Datenbanktabelle/Abfrage
      * @param array $arr folgende Arrayfelder sind zulässig:
      * $name="select";
      * $key="rno";
      * $text="myval";
      * $default="";
      * $class="";
 *
     * @return String HTML-Ausgabe, samt Daten
     */	
	public static function htmlImageSelect($obj,$arr= [])    {
        $name="select";
        $key="rno";
        $text="myval";
        $default="";
        $class="";
        if(isset($arr['name'])){$name=$arr['name'];}
        if(isset($arr['default'])){$default=$arr['default'];}
        if(isset($arr['key'])){$key=$arr['key'];}
        if(isset($arr['text'])){$text=$arr['text'];}
        if(isset($arr['class'])){$class=$arr['class'];}
        if(isset($arr['label'])){             
        $label=$arr['label'];
        ?> <label for="<?=$name?>"><?=$label?>:</label><?php
        }
        ?><select name="<?=$name?>" id="<?=$name?>" class="<?=$class?>">
         <?php
        foreach($obj as $item){
        ?>
  <option data-image="includes/images/<?=$item->$text?>" value="<?=$item->$key?>"
    <?php
  if($default!=""){
      if($item->$key==$default){
          echo ' selected="selected"';          
      }
  }
  ?>><?=$item->$text?></option>
      <?php } ?>
</select>
        <?php        
    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
  /**
 * Sort a multi-domensional array of objects by key value
 * Usage: usort($array, arrSortObjsByKey('VALUE_TO_SORT_BY'));
 * Expects an array of objects. 
 *
 * @param String    $key  The name of the parameter to sort by
 * @param String 	$order the sort order
 * @return A function to compare using usort
 */ 
public static function  arrSortObjsByKey($key, $order = 'DESC') {
	return function($a, $b) use ($key, $order) {
		// Swap order if necessary
		if ($order == 'DESC') {
 	   		list($a, $b) = array($b, $a);
 		} 
 		// Check data type
 		if (is_numeric($a->$key)) {
 			return $a->$key - $b->$key; // compare numeric
 		} else {
 			return strnatcasecmp($a->$key, $b->$key); // compare string
 		}
	};
} 
    
  /**
     * Erzeugt eine mit dynamischen Daten gefüllte HTML-Radioboxgruppe (<select>)
      * 
      * Es ist dafür eine Liste(Array) mit Objekten einer Tabelle nötig(z.B: $help->sql_queryList), die über ein entsprechendes model bereitgestellt werden muss.
      * Das Ganze ist  für eine Janus-Enumeration automatisch voreingerstellt, kann aber über Parameter konfiguriert werden. 
      * Standardmäßig wird ein Menü mit dem Namen <b>radio</b> erzeugt
      * @param Objectarray $obj Objektarray der Datenbanktabelle/Abfrage
      * @param array $arr folgende Arrayfelder sind zulässig:
      *  $name="radio";
      *  $label="radio";
      *  $key="codes";
      *  $text="myval";
      *  $default="";
      *  $class="";
      *  $type="button"; // button, buttonmini, radio, radiomini
     * @return String HTML-Ausgabe, samt Daten
     */	  
    
    
 
   public static function htmlRadioGroup( $obj, $arr= [] ){
        $name="radio";
        $label="radio";
        $key="codes";
        $text="myval";
        $default="";
        $class="";
        $type="button"; // button, buttonmini, radio, radiomini
        if(isset($arr['name'])){$name=$arr['name'];}
        if(isset($arr['default'])){$default=$arr['default'];}
        if(isset($arr['key'])){$key=$arr['key'];}
        if(isset($arr['text'])){$text=$arr['text'];}
        if(isset($arr['class'])){$class=$arr['class'];}
        if(isset($arr['label'])){$label=$arr['label'];}
        if(isset($arr['type'])){$type=$arr['type'];}
       
        ?>

 <fieldset id="<?=$name?>fieldset" class="ui-grid-a" data-role="controlgroup" <?php        
           switch($type){
               case "button":
                   echo' data-type="horizontal"';
                   break;
               case "buttonmini":
                     echo' data-type="horizontal" data-mini="true"';
                   break;
               case "radio":
                   break;
               case "radiomini":
                    echo' data-mini="true"';
                   break;
               default:
                 echo' data-type="horizontal"';   
           }                    
          ?> >                  
       <legend><?=$label?></legend>
         <?php
         $i=0;
      
        foreach($obj as $radio){
        $i++ ;?>
        <input type="radio" name="<?=$name?>" id="<?=$name.$i?>" class="<?=$class?>" value="<?=$radio->$key?>" <?php  if($default!=""){
        if($radio->$key == $default){echo ' checked="checked"';}}
      ?>>
        <label  for="<?=$name.$i?>"><?=$radio->$text?></label>
       
        <?php  
     
    } ?>
    </fieldset>
    <?php
   }       
    
   public static function htmlImageRadioGroup( $obj, $arr= [] ){
        $name="radio";
        $label="radio";
        $key="codes";
        $text="myval";
        $default="";
        $class="";
        $type="button"; // button, buttonmini, radio, radiomini
        if(isset($arr['name'])){$name=$arr['name'];}
        if(isset($arr['default'])){$default=$arr['default'];}
        if(isset($arr['key'])){$key=$arr['key'];}
        if(isset($arr['text'])){$text=$arr['text'];}
        if(isset($arr['class'])){$class=$arr['class'];}
        if(isset($arr['label'])){$label=$arr['label'];}
        if(isset($arr['type'])){$type=$arr['type'];}
       
        ?>

 <fieldset id="<?=$name?>fieldset" class="ui-grid-a" data-role="controlgroup" <?php        
           switch($type){
               case "button":
                   echo' data-type="horizontal"';
                   break;
               case "buttonmini":
                     echo' data-type="horizontal" data-mini="true"';
                   break;
               case "radio":
                   break;
               case "radiomini":
                    echo' data-mini="true"';
                   break;
               default:
                 echo' data-type="horizontal"';   
           }                    
          ?> >                  
       <legend><?=$label?></legend>
         <?php
         $i=0;
      
        foreach($obj as $radio){
        $i++ ;?>
        <input type="radio" name="<?=$name?>" id="<?=$name.$i?>" class="<?=$class?>" value="<?=$radio->$key?>" <?php  if($default!=""){
        if($radio->$key == $default){echo ' checked="checked"';}}
      ?>>
        <label class="imageradio" style="background-image:url(includes/images/<?=$radio->myval?>);"  for="<?=$name.$i?>"></label>
       
        <?php  
     
    } ?>
    </fieldset>
    <?php
   }       
   
   
public static function questioncreator($url, $labels, $meineKat,$fragestellung) {
    
    

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
$firstletter = substr($primarykeyvalue,0,0);
 } 
 while (($primarykeyvalue ==$primarykeyvalue2) OR ($firstletter == "Q"));  
 
  $i--; 
  
$meinekat =$meineKat;
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
Help::createsmyquestion($meinefrage, $meinekat, $meineAntwort, $falscheAntwortlabel,$results,$bindingsarray);
}
  
}

}
public static function createsmyquestion($meinefrage, $meinekat, $meineAntwort,$falscheAntwortlabel,$results,$bindingsarray) {
    
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
$firstletter = substr($erstA,0,0); 
 } 
 while (($erstA ==$meineAntwort) OR ($erstA =="")OR ($firstletter == "Q"));
 
 do {

 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $zweitA = $bindings[$falscheAntwortlabel];
 $zweitA =$zweitA ['value'];
 $firstletter = substr($zweitA,0,0);
  } 
 while (($erstA ==$zweitA)OR ($zweitA==$meineAntwort)OR ($zweitA =="")OR ($firstletter == "Q"));
 
 do {

 $bindings = $results['bindings'][rand(0, count($bindingsarray))] ; 
 $drittA = $bindings[$falscheAntwortlabel];
 $drittA=$drittA['value'];
 $firstletter = substr($drittA,0,0);
} 
while (($drittA ==$zweitA)OR ($drittA==$meineAntwort)OR($drittA ==$erstA) OR ($drittA =="")OR ($firstletter == "Q"));


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
}   
   
   
   
}
