<?php
  /* @var $frage Frage */
  /* @var $runde Runde */
  /* @var $spiel Spiel */
//$antworten=Core::$view->$antworten;
$frage=Core::$view->Frage;
$runde=Core::$view->runde;
$spiel=Core::$view->Spiel;
$antworten=Core::$view->Antworten;

  /* @var $frage Frage */
/* @var $item Antwort */

?>

<style>
    progress{
          background-image:
  -webkit-linear-gradient(left, forestgreen,yellow, firebrick);
    }
 progress:not([value]) {

}
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
     -moz-appearance: none;
          appearance: none;
  
  /* Get rid of default border in Firefox. */
  border: none;
  
  /* Dimensions */
  width: 100%;
  max-width: 266px;
  height: 20px;
}
progress[value] {
  width: 100%;
  max-width: 266px;
  height: 20px;
}
progress[value] {
  /* Reset the default appearance */
  -webkit-appearance: none;
   appearance: none;

  width: 100%;
  max-width: 266px;
  height: 20px;
}
@-webkit-keyframes animate-stripes {
   100% { background-position: -100px 0px; }
}

@keyframes animate-stripes {
   100% { background-position: -100px 0px; }
}




progress[value]::-webkit-progress-bar {
  /* background-color:  #eee; */
  background-image:
  -webkit-linear-gradient(left, forestgreen,yellow, firebrick);
  border-radius: 2px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.25) inset;
   
}

progress[value]::-webkit-progress-value {
    background-color: #22aadd; 
   background-image:
	   -webkit-linear-gradient(-45deg, 
	                           transparent 33%, rgba(0, 0, 0, .2) 33%, 
	                           rgba(0,0, 0, .2) 66%, transparent 66%),
	   -webkit-linear-gradient(top, 
	                           rgba(255, 255, 255, .25), 
	                           rgba(0, 0, 0, .25));
	 

    border-radius: 2px; 
   /*  background-size: 35px 20px, 100% 100%, 100% 100%;*/
    -webkit-animation: animate-stripes 5s linear infinite;
        animation: animate-stripes 5s linear infinite;
}

progress[value]::-webkit-progress-value::before {
  content: '80%';
  position: absolute;
  right: 0;
  top: -125%;
}
progress[value]::-webkit-progress-value::after {
  content: '';
  width: 6px;
  height: 6px;
  position: absolute;
  border-radius: 100%;
  right: 7px;
  top: 7px;
  background-color: white;
}



progress[value]::-moz-progress-bar { 
 

    
    background-image:
    -moz-linear-gradient(
      135deg, 
      transparent 33%, 
      rgba(0, 0, 0, 0.2) 33%, 
      rgba(0, 0, 0, 0.2) 66%, 
      transparent 66% 
    ),
    -moz-linear-gradient(
      top, 
      rgba(255, 255, 255, 0.25), 
      rgba(0, 0, 0, 0.25)
    ),
    -moz-linear-gradient(
      left, 
     #ffcc00, 
      orange    
    );

  border-radius: 2px; 
  background-size: 35px 20px, 100% 100%, 100% 100%; 
}


#reply .ui-radio label{
    width: 128px;
    height: 75px;
    text-align: center;
    vertical-align: middle;
     display: table-cell;
     border-radius: inherit;
    padding: 2px;
    margin: 3px;
      font-size: 0.75em;
}
#reply .ui-radio:nth-child(odd) { clear: both; }
#category{
       background: url("includes/images/<?=$frage->myval?>.png");
    background-position: center;
    width: 240px;
    height: 240px;
    background-size: 60%;
    background-repeat:no-repeat;
    backgound-color: white;
    
    text-align: center;
    color: black;
    border: black solid thin;
    font-weight: bold;
    font-size: 1.5em;
    
}
 #category p {
      margin-top: 0.5em;
     margin-bottom: 1.3em;

 }

    </style>
  


    <div id="category">
        <p >Runde <?=$runde->Nummer?></p>
        <p>&nbsp;</p>
         <p>&nbsp; </p>
        <p ><?=$frage->myval?></p>
        
    </div>
   
    <?php
   
  echo "<h2>".$frage->beschreibung." ?</h2>";
  ?>
   
<form name="reply" id="reply" action="?task=play2&id=<?=$spiel->m_oid;?>" method="post" data-ajax="false">
   
<input name="runde" id="runde" type="hidden" value="<?=$runde->m_oid;?>"/>
<?php
  help::htmlRadioGroup($antworten,["name"=>"antwort","label"=>"","key"=>"m_oid","text"=>"Antworttext", "class"=>"quizantwort"]);
  
?><progress value="500" max="500" id="progressBar" ></progress>
  
</form>

