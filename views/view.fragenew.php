<?php
/* @var $frage Frage */

$kategorien=Core::$view->kategorien;
?>
<form id="form_frageneu" method="post" action="?task=fragenew" data-ajax="false">
    <div class="ui-field-contain">
             <label for="beschreibung">Fragentext:</label><textarea  name="beschreibung" id="beschreibung" placeholder="Fragentext" ><?=$frage->beschreibung?></textarea>
             <label for="Preis">Kategorie:</label><?=Help::htmlSelect($kategorien,array("name"=>"Kategorie"))?>
             
            <label for="update">speichern:</label><button type="submit" name="new" id="new" value="1" >anlegen</button>
    </div>
</form>

