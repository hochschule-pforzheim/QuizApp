<?php
$liste=Core::$view->antworten;
?>
<a href="?task=fragenlist"  data-role="button"  class="ui-link ui-btn ui-icon-back ui-btn-icon-notext ui-btn-inline ui-shadow ui-corner-all ">Zurück zu  den Fragen</a><br/>
<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive">
  <thead>
    <tr>
      <th data-priority="1">ID</th>
      <th data-priority="persist">Antwort</th>
      <th data-priority="2">Bewertung</th>
      <th data-priority="2">geändert</th>
    </tr>
  </thead>
  <tbody>
  <?php
/* @var $item Frage */
  foreach($liste as $item){
     
   ?>
<tr>
      <td><?=$item->m_oid?></td>
      <td><a href="?task=antwortdetail&id=<?=$item->m_oid?>"><?=$item->Antworttext?></a></td>
      <td><?=Help::boolText($item->korrekt)?></td>
    
      <td><?=Help::toDateTime($item->m_ts)?></td>
     
</tr>
<?php }
?>
  </tbody>
</table>

