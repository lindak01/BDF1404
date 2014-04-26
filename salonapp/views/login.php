<?php
session_start();
$cxn = mysqli_connect($host,$user,$password,$database)
        or die("Couldn't connect to server.");
        
    $sql = "SELECT username FROM stylist WHERE username='$_POST[fusername]'";
    $result = mysqli_query($cxn,$sql)
        or die("Query died: fusername");
    $num = mysqli_num_rows($result);
    if($num > 0) {
        $sql = "SELECT username FROM stylist WHERE username='$_POST[fusername]'
                AND password=md5('$_POST[fpassword]')";
        $result2 = mysqli_query($cxn,$sql)
                or die("Query died: fpassword");
        $num2 = mysqli_num_rows($result2);
        if($num2 > 0) {
            $_SESSION['auth']="yes";
            $_SESSION['logname'] = $_POST['fusername'];
            $sql = "INSERT INTO Login (loginName, loginTime)
                    VALUES ('$_SESSION[logname]',NOW())";
            $result = mysqli_query($cxn, $sql)
                    or die("Query died: insert");
    }
        else{
            $message_1="The Login Name, '$_POST[fusername]' exists, but the password is incorrect.";
            $fusername=strip_tags(trim($_POST['fusername']));
            include 'loginform.inc';
    }
    }
    else{
        $message_1="The User Name you entered does not exist. Pleast try again.";
        include 'loginform.inc';
    } 

?>