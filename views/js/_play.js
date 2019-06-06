
var timeleft = 500;
var downloadTimer = setInterval(function(){
  document.getElementById("progressBar").value = (500 - --timeleft);

  //if(timeleft == 7) $("#progressBar").css("background-color","#ffffff");
  
  
  if(timeleft <= 0){
    clearInterval(downloadTimer);
     $('#antwort1').val("-1");
     $('#antwort1').prop("checked", true);
   $("#reply").submit();
}
},20);
 
 
 
 $(".ui-radio").on("click",function(){
    
    // $("#reply").submit();
   
      
    
     
 });
  $("input[type=radio]").on("change",function(){
     
     $("#reply").submit();
     
      
    
     
 });