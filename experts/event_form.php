

<form name="event" method="POST" action="<?php $_SERVER['PHP_SELF']; ?>?month=<?php echo $month;?>&day=<?php echo $day;?>&year=<?php echo $year;?>&v=true&add=true">
    <table width="400px">
        <tr>
            <td width="150px">Title:</td>
            <td><input type="text" name="txtTitle"></td>
        </tr>
        <tr>
            <td width="150px">Location:</td>
            <td><input type="text" name="txtLocation"></td>
        </tr>
        <tr>
            <td width="150px">Start Date:</td>
            <td><input type="text" name="txtStartDate" class="datepicker" value="<?php echo $month . "/" . $day . "/" . $year;?>"></td>
        </tr>
        <tr>
            <td width="150px">End Date:</td>
            <td><input type="text" name="txtEndDate" class="datepicker"></td>
        </tr>
        <tr>
            <td width="150px">Start Time:</td>
            <td><input type="text" name="txtStartTime"></td>
        </tr>
        <tr>
            <td width="150px">End Time:</td>
            <td><input type="text" name="txtEndTime"></td>
        </tr>
        <tr>
            <td width="150px">Detail:</td>
            <td width="250px;"><textarea name="txtDetail"></textarea></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" id="addevent" name="addevent" value="Add"></td>
        </tr>
    </table>
</form>

