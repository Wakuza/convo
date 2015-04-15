<?php 
    $title = "Convo Portal | Announcements";

    include("core/init.php");
    include("includes/overall/header.php");
    admin_protect();

    if(isset($_POST["submit"])) {
        $content = mysql_real_escape_string($_POST["content"]);    
        mysql_query("UPDATE announcements SET home_page='$content' WHERE announcementID=1");
    }
?>

<script type="text/javascript">
tinymce.init({
    selector: "textarea",
    theme: "modern",
    plugins: [
        "advlist autolink lists link image charmap print preview hr anchor pagebreak",
        "searchreplace visualblocks visualchars code fullscreen",
        "insertdatetime nonbreaking save table contextmenu directionality",
        "template paste textcolor colorpicker textpattern"
    ],
    toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
    toolbar2: "print preview media | forecolor backcolor",
    image_advtab: true,
});
</script>

<h1 class="headerPages">Editing Announcements</h1>
<h2 class="current_announcement">Current:</h2>
<?php
    $queryAnnouncements = "SELECT home_page FROM announcements";
    $result = mysqli_query($link, $queryAnnouncements);
    $num_rows = mysqli_affected_rows($link);
    if($result && $num_rows > 0) {
        while($row = mysqli_fetch_assoc($result)){
            echo $row["home_page"];
        }
    }
?>
<form method="post" action="announcements.php">
    <textarea name="content" style="width:100%"></textarea>
    
    <input type="submit" name="submit" value="Submit">
</form>

<?php
    include("includes/overall/footer.php"); 
?>