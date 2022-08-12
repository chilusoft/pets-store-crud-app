<?php

    include_once('configs/db.php');

    // create a db connection

    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        // echo "Connected successfully";

        $pet_name = $_POST["pet_name"];
        $pet_type = $_POST["pet_type"];
        $pet_color = $_POST["pet_color"];


        // insert the record into the database
        $sql = "INSERT INTO pets (pet_name, pet_type, pet_color) VALUES ('$pet_name', '$pet_type', '$pet_color')";

        if ($conn->query($sql) === TRUE) {
            // echo "New record created successfully";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

