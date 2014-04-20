<p>Welcome to Be Beautiful Salon! Please choose a stylist for more information!</p>
<?php
$fields_1= array("username" => "User Name",
                 "password" => "Password");
?>
<aside>
        <h2>Login here!</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <?php
            if(isset($message_1))
            {
                echo "<p class='errors'>$message_1</p>\n";
            }
            foreach($fields_1 as $field => $value)
            {
                if(preg_match("/pass/i",$field))
                    $type = "password";
                else
                    $type = "text";
                echo "<div id='field'>
                        <label for='$field'>$value</label>
                        <input id='$field' name='$field'
                            type='$type' value='".@$$field."'
                            size='20' maxlength='50' /></div>\n";
            }
        ?>
        <input type="submit" name="Button"
               style='margin-left: 45%; margin-bottom: .5em'
               value="Log in" />
        </form>
    </aside>

<?php

        
?>
