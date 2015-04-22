/*
* EMPLOYEE PAGE
*/

// The admins and manager choose either three radio buttons: Actie, Leave, or Terminated
$('.active_terminate').change(function(){
    if($(this).val() == "active"){
        var oTable = $('#example').dataTable();                     
        oTable.fnFilter( 'Active' );
    }
    else if($(this).val() == "terminated"){
        var oTable = $('#example').dataTable();                     
        oTable.fnFilter( 'Terminated' );
    }
    else if($(this).val() == "leave"){
       var oTable = $('#example').dataTable();                     
        oTable.fnFilter( 'Leave' ); 
    }
}); 

/*
* TERMINATION PAGE
*/

    $(document).ready(function() {
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