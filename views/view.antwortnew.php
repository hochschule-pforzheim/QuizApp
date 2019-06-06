<?php
/* @var $frage Frage */
$frage=Core::$view->frage;

?>
<form id="form_antwortenneu" method="post" action="?task=antwortnew" data-ajax="false">
    <div class="ui-field-contain">
         
    
                <label for="beschreibung">Antwort:</label><textarea  name="Antworttext" id="beschreibung" placeholder="Antwort" ></textarea>
       
     </div> 
    
     <div class="ui-field-contain">
      <?php
          $radio=array();
          $radioitem=new stdClass();
          $radioitem->codes="0";
          $radioitem->myval="falsch";
          array_push($radio,$radioitem);
          $radioitem=new stdClass();
          $radioitem->codes="1";
          $radioitem->myval="richtig";
          array_push($radio,$radioitem);
          Help::htmlRadioGroup($radio,array("type"=>"button", "label"=>"Korrekt","name"=>"korrekt","default"=>"0"))?>
          <input type="hidden" name="to_Frage" value="<?=$frage->m_oid?>"/>
          <label for="update">speichern:</label><button type="submit" name="new" id="new" value="1" >anlegen</button>   
     </div>
                
             
     
</form>

