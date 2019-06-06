<?php require("includes/system.main.php");

$view=filter_input(INPUT_GET,"view");
$multi=explode("||",$view);
foreach($multi as $v){
  Core::$view->render($v);
}
    ?>


 
  <?php if(core::$debugMode==1){
 


  
  if(Core::$debugConsole==1 && count(core::$debug)>0){
  ?>
      <script language="javascript">
    <?php foreach(core::$debug as $debugitem){
        ?>      
    console.log(<?=json_encode($debugitem);?>);
          
    <?php } ?></script>
 <?php
  }
 }
    
