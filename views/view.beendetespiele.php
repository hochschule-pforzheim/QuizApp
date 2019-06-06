<?php
$liste=Core::$view->beendeteSpiele;
?>


<h5>Kürzlich beendet</h5>

<table id="beendet" data-role="table" data-mode="columntoggle:none" class="ui-responsive">
  <thead>
    <tr>
     
        <th data-priority="persist">Gegner</th>
    
        
      
       <th data-priority="persist"></th>
        <th data-priority="persist"></th>
      <th data-priority="persist"></th>
          <th data-priority="persist"></th>
    <th data-priority="persist"></th>
        <th data-priority="persist"></th>
   
    </tr>
  </thead>
  <tbody>
  <?php
/* @var $item Spiel */
  foreach($liste as $item){
     
   ?>
<tr>
    <?php   if($item->userid_1!=Core::$user->m_oid){ $avatar=$item->avatar1;}else{$avatar=$item->avatar2;} ?>
       <td style="padding-right:0;padding-bottom:0px;"><img style="border-radius: 2em;margin:0;padding-top: 1px;" src="includes/images/<?=$avatar?>" alt="avatar" width="38" height="38"/></td>
        <td><?php
           if($item->userid_1!=Core::$user->m_oid){
               echo $item->nickname;
               $p1=$item->punkteA;
               $p2="<b>".$item->punkteB."</b>";
           }else{
               echo $item->nick2;
                $p1="<b>".$item->punkteA."</b>";
               $p2=$item->punkteB;
               } ?>
          </td>
          <td><?=$p2?>-<?=$p1?></td>
     
        <td class="result"><?=$item->standingA.$item->standingB?></td>
        <td><?=Help::toDateShort($item->m_ts)?></td>
        <td><?=$item->ergebnis?></td>
        <td width="30px" ><a href="?task=archivdetail&id=<?=$item->m_oid?>" class="ui-link ui-btn ui-icon-search ui-btn-icon-notext ui-shadow ui-corner-all ui-mini" data-ajax="false"     > </a></td>
        
</tr>
<?php }
?>
  </tbody>
</table>
