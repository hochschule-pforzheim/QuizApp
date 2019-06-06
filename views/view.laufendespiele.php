<?php
$liste=Core::$view->laufendeSpiele;
?>
<style>
    .result > div:nth-child(3n+0) {
        margin-right: 4px;
        
    }
      .result > div:nth-child(12n+1) {
        clear:both;
    }
</style>



<h5>Laufende Spiele</h5>

<table id="laufend" data-role="table" data-mode="columntoggle:none" class="ui-responsive">
  <thead>
    <tr>
     
      <th data-priority="persist">Paarung</th>
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
      
        <td><?php
           if($item->userid_1==Core::$user->m_oid){
               if($item->fragenA<=$item->fragenB){$turn=" <img style='margin-top: 0px' src='includes/images/statuspending.png'/>";}else{$turn="";}
               echo"<b>".$item->nickname.$turn."</b><br>".$item->nick2;
               $avatar=$item->avatar2;
           }else{
                if($item->fragenB<=$item->fragenA){$turn=" <img style='margin-top: 0px' src='includes/images/statuspending.png'/>";}else{$turn="";}
                   echo $item->nickname."<br>"."<b>".$item->nick2.$turn."</b>";
                    $avatar=$item->avatar1;
           }
           ?></td><td><?php
           if($item->userid_2==Core::$user->m_oid){
               echo"<b>".$item->punkteA."</b><br>".$item->punkteB;;
           }else{
                 echo $item->punkteA."<br><b>".$item->punkteB."</b>";
           }
           ?></td>
       
     
        <td class="result" style="padding-right:0px;"><?=$item->standingA.$item->standingB?></td>
          <td style="padding:0"><a style="text-decoration: none;"  href="?task=play2&id=<?=$item->m_oid?>"  data-ajax="false"  >
                  <img style="border-radius: 2em;margin:0;padding-top: 1px;padding-left:0px;margin:0;text-decoration: none" src="includes/images/<?=$avatar?>" alt="avatar" width="36" height="36"/></a>
      </td>
     
        
     
</tr>
<?php }
?>
  </tbody>
</table>
