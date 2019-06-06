<?php
$avatars=Core::$view->avatars;
?>
<form id="loginForm" method="post" action="?task=registrieren" data-ajax="false">
	<div class="ui-field-contain">
            <input id="vorname" placeholder="Vorname" name="vorname" />
            <input id="nachname" placeholder="Nachname" name="nachname" />
		<input id="kennung" placeholder="Kennung/Mail" name="kennung" />
                <input id="nickname" placeholder="Nickname" name="nickname" />
		<input id="passwort" placeholder="Kennwort" name="passwort" type="password" />
                <input id="passwort2" placeholder="Kennwort wiederholen" name="passwort2" type="password" />
		 <?php  Help::htmlImageRadioGroup($avatars,array( "label"=>"Avatar","name"=>"avatar", "key"=>"myval"))?>
       <button type="submit" name="login" id="login" value="1">anmelden</button>
	</div>
</form>




