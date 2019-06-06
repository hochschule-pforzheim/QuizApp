<?php
/* @var $antwort Antwort */

$antwort=Core::$view->antwort;
?>
<form id="form_antwort" method="post" action="?task=antwortdetail" data-ajax="false">
    <div class="ui-field-contain">
             <label for="beschreibung">Antwort:</label><textarea  name="Antworttext" id="beschreibung" placeholder="Antwort" ><?=$antwort->Antworttext?></textarea>
       
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
          Help::htmlRadioGroup($radio,array("type"=>"radiomini", "label"=>"Korrekt","name"=>"korrekt","default"=>$antwort->korrekt))?>
         
          <input type="hidden" name="m_oid" value="<?=$antwort->m_oid?>"/>
          <input type="hidden" name="to_Frage" value="<?=$antwort->to_Frage?>"/>
          <label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >speichern</button>   
     </div>
                
             
     
</form>
<br/>
<a href="?task=fragedetail&id=<?=$antwort->to_Frage?>" data-role="button"  class="ui-link ui-btn ui-icon-back ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all ">Zurück zu  den Fragen</a><br/>
