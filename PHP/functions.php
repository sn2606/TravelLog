<?php
    function dbConnect() {
        global $conn;
        $dbServer = "localhost";
        $username = "root";
        $password = "";
        $dbName = "travellog";
        $conn = new mysqli($dbServer, $username, $password, $dbName);

        if($conn->connect_error){
            die("Error: ".$conn->connect_error);
        }
        // echo '<h1 style="color: green;">Connected to DB!</h1>';
    }

    function redirect_to($location){
        header('Location:'.$location);
    }
