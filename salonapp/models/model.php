<?php
include 'db.php';

$connect = mysqli_connect($host,$user,$password,$database)
        or die ("Couldn't connect to server.");
        
    $query = "SELECT * FROM stylist";
    $result = mysqli_query($connect, $query)
                or die ("Couldn't execute query.");
                
    while($row = mysqli_fetch_assoc($result))
        {
            extract($row);
            echo "<a href='views/details.php'><p id='stylists'>$fname $lname</p></a>";
            echo "</br>";
        }
        
            
    
?>