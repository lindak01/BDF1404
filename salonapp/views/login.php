<?php
session_start();
switch (@$_POST['Button']){
    case "Log in":
        include('db.php');
        $connect = mysqli_connect($host,$user,$password,$database)
        or die ("Couldn't connect to server.");
        
        $sql = "SELECT username FROM stylist
                WHERE username= '$_POST[username]'";
        $result = mysqli_query($connect, $sql)
                or die ("Query died: username");
        $num = mysqli_num_rows($result);
        if ($num >0)
        {
            $sql = "SELECT username FROM stylist
                    WHERE username= '$_POST[username]'
                    AND password=md5 ('$_POST[password]')";
            $result2 = mysqli_query($connect, $sql)
                    or die("Query died: password");
            $num2 = mysqli_num_rows($result2);
        if ($num2 > 0)
        {
            $_SESSION['auth']="yes";
            $_SESSION['logname'] = $_POST['username'];
            $sql = "INSERT INTO Login (loginName,loginTime)
                    VALUES ('$_SESSION[logname]',NOW())";
            $result =  mysqli_query($connect,$sql)
                        or die("Query died: insert");
            header("Location: views/details.php");
                
        }
        else{
            $message_1="The User Name, '$_POST[username]' exists, but the password does not match. Please try again.";
            $username=strip_tags(trim($_POST['username']));
            include('body.inc');
        }
    }
    else{
        $message_1 = "The User Name you entered does not exist. Please try again.";
        include('body.inc');
    }
    break;
    
    default:
            include('body.inc');
}
?>
