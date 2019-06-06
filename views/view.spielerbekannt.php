<?php
$liste=Core::$view->bekannteSpieler;
?>
<p><small>letzte Gegner</small></p>
<table data-role="table" id="laufend" data-mode="column-toggle: none" class="ui-responsive">
  <thead>
    <tr>
     
      <th data-priority="persist">Spieler</th>
      <th data-priority="2">Rating</th>
       <th data-priority="2">Eigene Partien</th>
      <th data-priority="2">Einladen</th>
    </tr>
  </thead>
  <tbody>
  <?php
/* @var $item User */
  foreach($liste as $item){
     
   ?>
<tr>
     
      <td><?=$item->nickname?></td>
      <td><?=$item->rating?></td>
      <td><?=$item->Partien?></td>
    
       <td><a href="?task=spielerstellen&id=<?=$item->m_oid?>" data-role="button" data-mini="true" class="ui-link ui-btn ui-icon-plus ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all ">einladen</a></td>
     
</tr>
<?php }
?>
  </tbody>
</table>
