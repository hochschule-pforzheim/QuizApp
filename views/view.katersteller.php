<?php
/* @var $Teilnehmer User */
$kategorien=Core::$view->kategorien;
$Teilnehmer=Core::$view->Teilnehmer;
?>

<form id="spielcreate" method="post" action="?task=spielnew" data-ajax="false">
	<div class="ui-field-contain">
            <div><img style="border-radius: 2em;margin:0;padding-top: 1px;" src="includes/images/<?=$Teilnehmer->avatar?>" alt="avatar" width="38" height="38"/> <?=$Teilnehmer->nickname.'('.$Teilnehmer->rating.')'?></div>

            <input type="hidden" id="id"  name="id" value="<?=$Teilnehmer->m_oid?>" />
		 <?php Help::htmlRadioGroup($kategorien,array("type"=>"buttonmini", "label"=>"Kategorie 1","name"=>"Kategorie1"))?>
		 <?php Help::htmlRadioGroup($kategorien,array("type"=>"buttonmini", "label"=>"Kategorie 2","name"=>"Kategorie2"))?>
            <br>
              <button type="submit" name="create" id="create" value="1">Herausfordern</button>
        </div>
</form>




