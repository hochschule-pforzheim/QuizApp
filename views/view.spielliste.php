<?php
$liste=Core::$view->eigeneEinladungen;
?>
<h5>Deine Anfragen</h5> 






<table id="eigen" data-role="table"  data-mode="columntoggle:none" class="ui-responsive">
  <thead>
    <tr>
     
      <th data-priority="persist">Spieler</th>
        <th data-priority="persist"></th>
      <th style="text-align: right" data-priority="persist">Rating</th>
      <th data-priority="3" style="text-align: right">erstellt</th>
    
    </tr>
  </thead>
  <tbody>
  <?php
/* @var $item User */
  foreach($liste as $item){
     
   ?>
<tr>
      <td style="padding-right:0;padding-bottom:0px;"><img style="border-radius: 2em;margin:0;padding-top: 1px;" src="includes/images/<?=$item->avatar?>" alt="avatar" width="38" height="38"/></td>
      <td><?=$item->nickname?></td>
      <td style="text-align: right"><?=$item->rating?></td>
     
      <td style="text-align: right"><small><?=Help::toDateTime($item->erstellDatum)?></small></td>
     
</tr>
<?php }
?>
  </tbody>
</table>
