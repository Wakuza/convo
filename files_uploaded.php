<?php
    $title = "Convo Portal | Open Enrollment";
    include("core/init.php");
    admin_protect();
    include("includes/overall/header.php");

    // Bytes Conversion Function
    function formatBytes($size, $precision = 2) {
        $base = log($size, 1024);
        $suffixes = array('', 'KB', 'MB', 'GB', 'TB');   

        return round(pow(1024, $base - floor($base)), $precision) . " " . $suffixes[floor($base)];
    }

?>

<h1 class="headerPages">Files Uploaded to Portal</h1>

<h2>Files</h2>

<div class="file_upload">

    <table class="table table-bordered table-hover" id="tab_logic">
        <thead>
            <tr>
                <th>File</th>
                <th>Date</th>
                <th>Size</th>
            </tr>
        </thead>
        <tbody>
<?php

    function newest($a, $b) { 
        return (filemtime($a) > filemtime($b)) ? -1 : 1; 
    } 

    $dir = glob('upload_oe/*'); // put all files in an array 
    uasort($dir, "newest"); // sort the array by calling newest() 

    foreach($dir as $file) { 
        echo "<tr><td width='30%'><a href='" . $file . "' target='_blank'>" . basename($file) . "</a></td><td width='35%'>" . date("F d, Y H:i:s", filemtime($file)) . "</td><td width='30%'>" .  formatBytes(filesize($file), 1) . "</td></tr>"; ; 
    } 

/*
    $handle = opendir('upload_oe/');
    if ($handle) {
        while (false !== ($entry = readdir($handle))) {
            if ($entry != "." && $entry != "..") {
                echo "<tr><td width='30%'><a href='upload_oe/" . $entry . "'>" . $entry . "</a></td><td width='35%'>" . date("F d, Y H:i:s", filemtime("upload_oe/" . $entry)) . "</td><td width='30%'>" .  formatBytes(filesize('upload_oe/' . $entry), 1) . "</td></tr>";
            }
        }
        closedir($handle);
    }
    */
?>
        </tbody>
    </table>
</div>

<?php
    include("includes/overall/footer.php"); 
?>