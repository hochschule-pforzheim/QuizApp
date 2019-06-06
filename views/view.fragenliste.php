<?php
$liste=Core::$view->fragen;
?>
<table data-role="table" id="movie-table" data-mode="reflow" class="ui-responsive">
  <thead>
    <tr>
      <th data-priority="1">ID</th>
      <th data-priority="persist">Artikel</th>
      <th data-priority="2">Kategorie</th>
      <th data-priority="3"><abbr title="Rotten Tomato Rating">Antworten</abbr></th>
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
      <td><a href="?task=fragedetail&id=<?=$item->m_oid?>"><?=$item->beschreibung?></a></td>
      <td><?=$item->myval?></td>
       <td><?=$item->antworten?></td>
      <td><?=Help::toDate($item->m_ts)?></td>
     
</tr>
<?php }
?>
  </tbody>
</table>
