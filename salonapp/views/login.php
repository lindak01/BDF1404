<?php
session_start();
switch (@$_POST['Button']){
case "Log in":
    
$connect = mysqli_connect($host,$user,$password,$database)
        or die("Couldn't connect to server.");
        
    $query = "SELECT username FROM stylist WHERE username='$_POST[fusername]'";
    $result = mysqli_query($connect,$query)
        or die("Query died: fusername");
    $num = mysqli_num_rows($result);
    if($num > 0) {
        $query = "SELECT username FROM stylist WHERE username='$_POST[fusername]'
                AND password=md5('$_POST[fpassword]')";
        $result2 = mysqli_query($connect,$query)
                or die("Query died: fpassword");
        $num2 = mysqli_num_rows($result2);
        if($num2 > 0) {
            $_SESSION['auth']="yes";
            $_SESSION['logname'] = $_POST['fusername'];
            $query = "INSERT INTO Login (loginName, loginTime)
                    VALUES ('$_SESSION[logname]',NOW())";
            $result = mysqli_query($connect, $query)
                    or die("Query died: insert");
            header("Location: SecretPage.php");
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
break;

case "Register":
    foreach($_POST as $field => $value){
        if(empty($value)){
            $blanks[] = $field;
        }else{
            $good_data[$field] = strip_tags(trim($value));
        }
    }
    if(isset($blanks)){
        $message_2 = "The following fields are blank. Please enter the required information: ";
        foreach($blanks as $value){
            $message_2 .="$value, ";
        }
        extract($good_data);
        include 'loginform.inc';
        exit();
    }
    
    foreach($_POST as $field => $value){
        if(!empty($value)){
            if(preg_match("/name/i",$field) and
              !preg_match("/user/i",$field) and
              !preg_match("/log/i",$field)){
                if (!preg_match("/^[A-Za-z' -]{1,50}$/".$value)){
                    $errors[] = "$value is not a valid name. ";
                }
            }
            if(preg_match("/street/i",$field) or
               preg_match("/addr/i",$field) or
               preg_match("/city/i",$field)){
                if (!preg_match("/^[A-Za-z0-9.,' -]{1,50}$/",$value)){
                    $errors[] = "$value is not a valid address or city.";
                }
            }
            if(preg_match("/state/i",$field)){
                if(!preg_match("/^[A-Z] [A-Z]$/",$value)){
                    $errors[] = "$value is not a valid state code.";
                }
            }
            if(preg_match("/email/i",$field)){
                if(!preg_match("/^.+\\..+$/",$value)){
                    $errors[] = "$value is not a valid email address.";
                }
            }
            if(preg_match("/zip/i",$field)){
                if(!preg_match("/^[0-9]{5}(\-[0-9]{4})?$/",$value)){
                    $errors[] = "$value is not a valid zip code.";
                }
            }
            if(preg_match("/phone/i",$field)){
                if(!preg_match("/^[0-9] (xX -]{7,20}$/",$value)){
                    $errors[] = "$valueis not a valid phone number.";
                }
            }
        }
    }
    
    foreach($_POST as $field => $value){
        $$field = strip_tags(trim($value));
    }
    if(@is_array($errors)){
        $message_2 = "";
        foreach($errors as $value){
            $message_2 .= $value."Please try again <br />";
        }
        include 'loginform.inc';
        exit();
    }
    
    $connect = mysqli_connect($host,$user,$password,$database)
            or die("Couldn't connect to server.");
    $query = "SELECT loginName FROM members WHERE loginName='$loginName'";
    $result = mysqli_query($connect,$query)
        or die("Query died: loginName.");
    $num = mysqli_num_rows($result);
    if($num > 0){
        $message_2 = "$loginName already exists. Please created another user name.";
        include 'loginform.inc';
        exit();
    }
    else {
        $query = "INSERT INTO members (loginName,createDate,password,firstName,lastName,street,city,state,zip,phone,email)
                  VALUES('$loginName',NOW(),md5('$password'),'$firstName','$lastName','$street','$city','$state','$zip','$phone','$email')";
        mysqli_query($connect,$query);
        $_SESSION['auth']="yes";
        $_SESSION['logname'] = $loginName;
        
        $emess = "You have successfully registered with Be Beautiful Salon. ";
        $emess .= "Your new user name and password are: ";
        $emess .= "\n\n\t$loginName\n\t";
        $emess .= "$password\n\n";
        $subj = "Be Beautiful Registration";
       # $mailsend=mail("$email","$subj","$emess");
        header("Location: SecretPage.php");
    }
    break;

    default:
        include 'loginform.inc';
}

?>