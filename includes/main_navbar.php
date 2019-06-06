<div id="menupanel" data-role="panel" data-display="overlay">
    <a href="?task=home" data-role="button" data-icon="home" data-theme="a" data-ajax="false" >Home</a>
    <?php if(Core::$user->gruppe==2){ ?>
    <a href="?task=fragenlist" data-role="button" data-icon="home" data-theme="a" data-ajax="false" >Fragen</a>
    <?php } ?>
    <?php if(Core::$user->gruppe>=1){ ?>
    <a href="?task=spielerstellen" data-role="button" data-icon="plus" data-theme="a" data-ajax="false" >Spiel erstellen</a>
         <a href="?task=fragenersteller" data-role="button" data-icon="upload" data-theme="b" data-ajax="false" >Fragen erstellen</a>
    <?php } ?>
      <?php if($_SESSION['uid']==""){?> <a href="?task=login" data-role="button" data-icon="user"  data-ajax="false">login</a><?php }?>
   <?php if($_SESSION['uid']!=""){?><a href="?task=logout" data-role="button" data-icon="sign-out"  data-ajax="false">logout</a><?php }?>
    
    
    
</div>
