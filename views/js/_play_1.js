var timeleft = 500;
var downloadTimer = setInterval(function(){
  document.getElementById("progressBar").value = 500-(500 - --timeleft);

  //if(timeleft == 7) $("#progressBar").css("background-color","#ffffff");
  
  
  if(timeleft <= 0){
    clearInterval(downloadTimer);
    $("#reply").submit();}
},20);
 
 
 
 $(".ui-radio").on("click",function(){
     
     $("#reply").submit();
     console.log("replied");
      
    
     
 });