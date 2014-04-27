<?php
$labels = array("fname" => "First Name",
                "lname" => "Last Name",
                "username" => "User Name",
                "password" => "Password");
?>
<form action="addStylist.php" method="post">
    <?php
        echo "<h3>Stylist Information</h3>";
        foreach($labels as $field => $label)
        {
            echo "<div class='field'>
                    <label for='$field'>$label</label>
                    <input type='text' name='$field' id='$field' size='65' maxlength='65' value='".@$$field."' /></div>\n";
        }
    ?>
    <input type='submit' value='Add Stylist' />
    <input type='submit' name='newbutton' value='Cancel' />
</form>