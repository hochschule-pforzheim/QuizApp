<?php
$kategorieliste=Core::$view->kategorieliste;

?>

<form id="fragencreate" method="post" action="?task=fragenersteller" data-ajax="false">
	<div class="ui-field-contain">
       
 		 <?php Help::htmlRadioGroup($kategorieliste,array("type"=>"buttonmini", "label"=>"Kategorie","name"=>"Kategorie1"))?>
            <br>
              <button type="submit" name="create" id="create" value="1">Erstellen</button>
        </div>
</form>
