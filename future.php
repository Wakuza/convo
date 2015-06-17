<!-- EDIT PHP -->
<span class="spanHeader">Department: </span>
            <?php
                echo "<select id='department' name='department'><option value=''>Select a Department</option>";
                while($row = mysql_fetch_assoc($resultDepartment)) {
                    echo "<option value = '" . $row['department_name'] . "'>" . $row['department_name'] . "</option>";   
                }
                echo "</select>";?>
        <input type='text' name='current_department' class="input-medium"  style='background:#E9E9E9;' readonly>            <br/><br/>
        
        
        <span class="spanHeader">Admin Privilege:</span>
            <select value="admin_privileges" name="admin_privileges" class="input-medium">
                <option value="">Select a privillege</option>
                <option value = "Admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Admin"){echo "selected='selected'";} ?>>Yes</option>
                <option value = "Non_admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Non_admin"){echo "selected='selected'";} ?>>No</option>
            </select> <input type='text' class="input-small" name='current_admin_privileges' style='background:#E9E9E9;' readonly><em> <strong>1:</strong> admin privileges and <strong>0:</strong> no admin privileges</em><br/><em class="note">Permission to add, edit, and terminate employees.</em><br/><br/>
                    
            <span class="spanHeader">Manager Privilege:</span>
            <select value="manager_privileges" name="manager_privileges" class="input-medium">
                <option value="">Select a privillege</option>
                <option value = "Manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Manager"){echo "selected='selected'";} ?>>Yes</option>
                <option value = "Non_manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Non_manager"){echo "selected='selected'";} ?>>No</option>
            </select> <input type='text' class="input-small" name='current_manager_privileges' style='background:#E9E9E9;' readonly><em> <strong>1:</strong> manager privileges and <strong>0:</strong> no manager privileges</em><br/><em class="note">Permission to view direct reports' information and materials that are restricted to managers.</em>

<!-- HIRE PHP -->

        if(empty($_POST["admin_privileges"])){
            $errorAdminPrivileges = "<span class='hireErrors'>Please select a privilege</span>";   
        }
        if(empty($_POST["manager_privileges"])){
            $errorManagerPrivileges = "<span class='hireErrors'>Please select a privilege</span>";   
        }
        <!-- Department -->
        <span class="spanHeader">Department: </span>
            <?php
                echo "<select id='department_name' name='department_name'><option value=''>Select a Department</option>";
                while($row = mysql_fetch_assoc($resultDepartment)) {
                    echo "<option value = '" . $row['department_name'] . "'";
                    if(isset($_POST["submit"]) && $_POST["department_name"] == $row['department_name']){
                        echo "selected='selected'";
                    }
                    echo ">" . $row['department_name'] . "</option>";   
                }
                echo "</select>";
                echo $errorDepartment; 
            ?>
        <br/><br/>

        if($admin_privileges == "Admin"){
                $admin_privileges = "1";   
            }
            else{
                $admin_privileges = "0";   
            }
            
            if($manager_privileges == "Manager"){
                $manager_privileges = "1";   
            }
            
            else{
                $manager_privileges = "0";
            }

 <!-- Admin Privileges -->
        <span class="spanHeader">Admin Privilege:</span>
        <select value="admin_privileges" name="admin_privileges">
            <option value="">Select a privillege</option>
            <option value = "Admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Admin"){echo "selected='selected'";} ?>>Yes</option>
            <option value = "Non_admin" <?php if(isset($_POST["submit"]) && $_POST["admin_privileges"] == "Non_admin"){echo "selected='selected'";} ?> selected>No</option>
        </select><?php echo $errorAdminPrivileges; ?><br/><em class="note">Permission to add, edit, and terminate employees.</em><br/><br/>
               
        <!-- Manager Privileges -->
        <span class="spanHeader">Manager Privilege:</span>
        <select value="manager_privileges" name="manager_privileges">
            <option value="">Select a privillege</option>
            <option value = "Manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Manager"){echo "selected='selected'";} ?>>Yes</option>
            <option value = "Non_manager" <?php if(isset($_POST["submit"]) && $_POST["manager_privileges"] == "Non_manager"){echo "selected='selected'";} ?> selected>No</option>
        </select><?php echo $errorManagerPrivileges; ?><br/><em class="note">Permission to view direct reports' information and materials that are restricted to managers.</em><br/>

<!-- SCRIPT and SCRIPTFOOTER JS -->
    var department = $("#employeeName").val().split("|")[3];
    $("input[name='current_department']").val(department);
    $("select[name='department']").val(department);


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

