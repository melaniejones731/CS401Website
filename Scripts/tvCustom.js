$(document).ready(function(){
    $("#datestart").change(function() {
        var startDt= document.getElementById("datestart").value;
        var endDt=document.getElementById("dateend").value;
        if( (new Date(startDt).getTime() > new Date(endDt).getTime())){
            alert("Oops! Your start date is after your end date - check your dates before clicking search.");
        }
      });

      $("#dateend").change(function() {
        var startDt= document.getElementById("datestart").value;
        var endDt=document.getElementById("dateend").value;
        if( (new Date(startDt).getTime() > new Date(endDt).getTime())){
            alert("Oops! Your start date is after your end date - check your dates before clicking search.");
        }
      });
  
});