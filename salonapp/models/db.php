<?php
class db{
    public function __construct(){
        try {
            $dsn ="mysql:dbname=BDF1404;host=localhost";
            $dbuser ="root";
            $dbpw ="root";
            
            $this->db = new PDO($dsn, $dbuser, $dbpw);
        } catch (PDOException $error) {
            var_dump($error);
        }
    }
}
?>