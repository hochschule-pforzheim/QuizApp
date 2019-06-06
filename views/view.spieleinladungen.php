<?php
$liste=Core::$view->fremdeEinladungen;
?>
<h5>Eingeladen zu</h5>

<table id="eingeladen" data-role="table" data-mode="columntoggle:none" class="ui-responsive">
  <thead>
    <tr>
      <th data-priority="persist">von</th>
      <th data-priority="persist"></th>
      <th data-priority="2">Rating</th>
      <th data-priority="3">wann</th>
      <th data-priority="4">Spielen Löschen</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
/* @var $item User */
  foreach($liste as $item){
     
   ?>
<tr>
    <td style="padding-right:0;padding-bottom:0px;"><img style="border-radius: 2em;margin:0;padding-top: 1px;" src="includes/images/<?=$item->avatar?>" alt="avatar" width="38" height="38"/></td>
      <td> <?=$item->nickname?></td>
      <td><?=$item->rating?></td>
      <!-- <td><a href="?task=spielerstellen&id=<?=$item->m_oid?>&nick=<?=$item->nickname?>" data-role="button">einladen</a></td> -->
      <td><?=date("d.m.",$item->erstellDatum)?></td>
      <td> <div data-role="controlgroup" data-type="horizontal"><a href="?task=accept&id=<?=$item->id?>&accept=true" data-role="button" data-mini="true" data-iconpos="notext" class="ui-link ui-btn ui-icon-play-circle ui-btn-icon-notext ui-shadow ui-corner-all ui-mini">spielen</a><a data-role="button" data-mini="true" data-iconpos="notext" class="ui-link ui-btn ui-icon-trash-o ui-btn-icon-notext ui-shadow ui-corner-all ui-mini" href="?task=accept&id=<?=$item->id?>&accept=false">ablehnen</a></div></td>
        
     
</tr>
<?php }
?>
  </tbody>
</table>
