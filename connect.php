<?php
Class DbConnection{
    function getdbconnect(){
        $servername = "localhost:3309";
        $username = "root";
        $password = "";
        $dbname = "loc_srasystem";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }
        catch(PDOException $e)
        {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}
?>