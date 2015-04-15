/*
* Datepicker
*/
  $(function() {
    $( ".datepicker" ).datepicker({ dateFormat: 'mm-dd-yy' });
  });

/*
* Logged in Widget
*/
var flag = false;
function onLoad(){
    document.getElementById("showHide").innerHTML = "Show";
    document.getElementById("showHide").style.cursor = "pointer";
}

function clicked(){  
    if(!flag){
        document.getElementById("statusList").style.display = "inline";
        //document.getElementById("status").style.float = "right";
        document.getElementById("showHide").innerHTML = "Hide";
        //document.getElementById("status2").style.margin = "100px";

        flag = true;
    }
    else{
        document.getElementById("statusList").style.display = "none";
        document.getElementById("showHide").innerHTML = "Show";
        //document.getElementById("status2").style.margin = "-100px";
        flag = false;
    }
}

/*
* CENSUS PAGE
*/
function goBack() {
   window.history.back();
}

/*
* TERMINATION PAGE
*/ 

$(document).ready(function() {
    $('#example').dataTable( {
        "language": {
            "lengthMenu": "Display _MENU_ records per page",
            "zeroRecords": "Nothing found - sorry",
            "info": "Showing page _PAGE_ of _PAGES_",
            "infoEmpty": "No records available",
            "infoFiltered": "(filtered from _MAX_ total records)"
        }
    });
    
   $("#termination").change(function() {
        if($(this).prop("checked")) {
            document.getElementById("termination_box").style.display = "block";
        }
       else {  document.getElementById("termination_box").style.display = "none";
       }
   });
});
    
    function textCounter( field, countfield, maxlimit ) {
        if ( field.value.length > maxlimit ) {
            field.value = field.value.substring( 0, maxlimit );
            field.blur();
            field.focus();
            return false;
        } 
        else {
            countfield.value = maxlimit - field.value.length;
        }
    }