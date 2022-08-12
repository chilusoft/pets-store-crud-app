<?php

    include_once('configs/db.php');
    // receive the data from the form


    $pet_id = $_POST["pet_id"];


    // connect to the database
    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);


    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }else{

        // delete the record from the database
        $sql = "DELETE FROM pets WHERE id = $pet_id";
        $result = $conn->query($sql);
        if ($result === TRUE) {
            // echo "Record deleted successfully";
            header("Location: index.php");
        } else {
            echo "Error deleting record: " . $conn->error;
        }

    }

