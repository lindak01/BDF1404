<?php
$fields_1 = array("fusername" => "User Name",
                  "fpassword" => "Password");
$fields_2 = array("loginName" => "User Name",
                  "password"  => "Password",
                  "email"     => "Email",
                  "firstName" => "First Name",
                  "lastName"  => "Last Name",
                  "street"    => "Street",
                  "city"      => "City",
                  "state"     => "State",
                  "zip"       => "Zip",
                  "phone"     => "Phone");
include 'function12.inc';
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <fieldset><legend>Login Form</legend>
<?php
if(isset($message_1))
{
    echo "<p class='errors'>$message_1</p>\n";
}
foreach($fields_1 as $field => $value){
    if(preg_match("/pass/i",$field))
        $type = "password";
    else
        $type = "text";
    echo "<div id='field'>
                <label for='$field'>$value</label>
                    <input id='$field' name='$field' type='$type' value='".@$$field."' size='20' maxlength='50 /></div>\n";                   
}
?>
<input type="submit" name="Button" style='margin-left: 45%; margin-bottom: .5em' value="Log in" />
    </fieldset>
    </form>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <fieldset><legend>Registration Form</legend>
    
<?php
    if(issest($message_2)){
        echo "<p class='errors'>$message_2</p>\n";
    }
    foreach($fields_2 as $field => $value){
        if($field == "state"){
            echo "<div id='field'>
                    <label for='$field'>$value</label>
                    <select name='state' id='state'>";
                    $stateName = getStateName();
                    $stateCode = getStateCode();
                    for($n=1;$n<=50;$n++){
                        $state=$stateName[$n];
                        $scode=$stateCode[$n];
                        echo "<option value='$scode)'";
                        if(isset($_POST['state'])){
                            if($_POST['state'] == $scode){
                                echo " selected='selected'";
                            }
                        }
                        else{
                            if($n < 2)
                            {
                                echo " selected='selected'";
                            }
                        }
                        echo ">$state\n</option>";
                    }
                    echo "</select></div>";
        }
        else{
            if(preg_match("/pass/i",$field))
                $type = "password";
            else
                $type = "text";
            echo "<div id='field'>
                    <label for='$field'>$value</label>
                    <input id='$field' name='$field' type='$type' value'".@$$field."'size='40' maxlength='65' /></div>\n";
        }
    }
?>
        <input type="submit" name="Button" style='margin-left: 45%; margin-bottom: .5em' value="Register" />
    </fieldset>
</form>