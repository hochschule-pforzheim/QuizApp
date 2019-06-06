<?php
  /* @var $frage Frage */
  /* @var $spiel Spiel */
//$antworten=Core::$view->$antworten;
$frage=Core::$view->Frage;
$spiel=Core::$view->Spiel;
$antworten=Core::$view->Antworten;

if($spiel->wait){
    $weiter="Auf Gegnerantwort warten";
}else{
    $weiter="zur Frage";
}
?>

 <div class="ui-grid-a" style="width: 100%">
      <div class="ui-block-a players"><?php
    if($spiel->Ersteller==Core::$user->m_oid){
        echo"<i>".$spiel->Host."</i>";
    }else{
         echo $spiel->Host;
    }
                
    ?></div>
    <div class="ui-block-b players"><?php
  if($spiel->Teilnehmer==Core::$user->m_oid){
        echo"<i>".$spiel->Gast."</i>";
    }else{
         echo $spiel->Gast;
    }
?></div>  
    <div class="ui-block-a points"><?=$spiel->punkteA?>(<?=$spiel->fragenA?>)</div>   
    <div class="ui-block-b points" ><?=$spiel->punkteB?>(<?=$spiel->fragenB?>)</div>  
    <div class="ui-block-a times"><?=$spiel->TPA?> TP</div>
    <div class="ui-block-b times"><?=$spiel->TPB?> TP</div>
  </div>
 















<form name="formstart" id="start" action="?task=play2&id=<?=$spiel->m_oid?>" data-ajax="false" method="post">
 <button type="submit" name="start" id="start" value="1" <?php if($spiel->wait)echo'disabled="disabled"';?>><?=$weiter?></button>
    
</form>
 <a href="?task=home" data-role="button"  class="ui-link ui-btn ui-icon-back ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all ">Zurück</a>