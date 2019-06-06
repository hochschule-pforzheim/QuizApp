<?php
/* @var $frage Frage */
$frage=Core::$view->frage;
$kategorien=Core::$view->kategorien;
?>
<form id="form_artikel" method="post" action="?task=fragedetail" data-ajax="false">
    <div class="ui-field-contain">
        <label for="m_oid">Id:</label><input  name="m_oid" id="m_oid" readonly="readonly" placeholder="id" value="<?=$frage->m_oid?>" />
            <label for="beschreibung">Fragentext:</label><textarea  name="beschreibung" id="beschreibung" placeholder="Fragentext" ><?=$frage->beschreibung?></textarea>
    </div>
    <div class="ui-field-contain">
          <?=Help::htmlRadioGroup($kategorien,array("type"=>"button", "label"=>"Kategorie","name"=>"Kategorie","default"=>$frage->Kategorie))?>
              <label for="c_ts">erstellt:</label><input  name="c_ts" id="c_ts" readonly="readonly"  value="<?=Help::toDateTime($frage->c_ts)?>" />
              <label for="m_ts">geändert:</label><input  name="m_ts" id="m_ts"  readonly="readonly"  value="<?=Help::toDateTime($frage->m_ts)?>" />
            <label for="update">speichern:</label><button type="submit" name="update" id="update" value="1" >speichern</button>
    </div>
</form>

