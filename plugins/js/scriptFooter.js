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

    $("#employeeName").change(function() {
        var empID = $("#employeeName").val().split("|")[0];
        var pos = $("#employeeName").val().split("|")[1];
        var payrollStatus = $("#employeeName").val().split("|")[2];
        var department = $("#employeeName").val().split("|")[3];
        var convo_location = $("#employeeName").val().split("|")[4];
        var emp_status = $("#employeeName").val().split("|")[5];
        var firstname = $("#employeeName").val().split("|")[6];
        var lastname = $("#employeeName").val().split("|")[7];
        var supervisor = $("#employeeName").val().split("|")[8];
        var admin_privileges = $("#employeeName").val().split("|")[9];
        var manager_privileges = $("#employeeName").val().split("|")[10];
        var street_address = $("#employeeName").val().split("|")[11];
        var city = $("#employeeName").val().split("|")[12];
        var res_state = $("#employeeName").val().split("|")[13];
        var zipCode = $("#employeeName").val().split("|")[14];

        // Employee Information
        //if("select[name='employeeName'] option:selected"){
        $("input[name='employeeID']").val(empID);
        $("select[name='change_position_name']").val(pos);
        $("input[name='current_position_name']").val(pos);
        $("input[name='current_payroll_status']").val(payrollStatus);
        $("select[name='change_payroll_status']").val(payrollStatus);
        $("input[name='current_department']").val(department);
        $("select[name='department']").val(department);
        $("input[name='current_convo_location']").val(convo_location);
        $("select[name='convo_location']").val(convo_location);
        $("input[name='current_emp_status']").val(emp_status);
        $("select[name='emp_status']").val(emp_status);
        $("input[name='current_supervisor']").val(supervisor);
        $("select[name='supervisor']").val(supervisor); 
        $("input[name='current_admin_privileges']").val(admin_privileges);
        if($("input[name='current_admin_privileges']").val() == "1") {
        $("select[name='admin_privileges']").val("Admin");  
        }
        else {
        $("select[name='admin_privileges']").val("Non_admin"); 
        }


        $("input[name='current_manager_privileges']").val(manager_privileges);
        //$("select[name='manager_privileges']").val(manager_privileges);

        if($("input[name='current_manager_privileges']").val() == "1") {
        $("select[name='manager_privileges']").val("Manager");  
        }
        else {
        $("select[name='manager_privileges']").val("Non_manager"); 
        }


        // Personal Information
        $("input[name='current_firstname']").val(firstname);
        $("input[name='firstname']").val(firstname);
        $("input[name='current_lastname']").val(lastname);
        $("input[name='lastname']").val(lastname);
        $("input[name='current_street_address']").val(street_address);
        $("input[name='street_address']").val(street_address);
        $("input[name='current_city']").val(city);
        $("input[name='city']").val(city);
        $("input[name='current_res_state']").val(res_state);
        $("select[name='res_state']").val(res_state);
        $("input[name='current_zipCode']").val(zipCode);
        $("input[name='zipCode']").val(zipCode);
    });