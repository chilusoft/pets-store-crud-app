<div>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</div>

<?php

    include_once('configs/db.php');


    $conn = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else{
        // echo "Connected successfully";


        // pull all the records from the database

        $sql = "SELECT * FROM pets";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<ul>";
                echo "<li> Name: " . $row["pet_name"]. " - Type: " . $row["pet_type"]. " - Color: " . $row["pet_color"]. "</li>";
                echo "</ul>";
            }
        } else {
            echo "0 results";
        }



    }


?>

<div>


</div>
<div>
        <h1>Buy Pet</h1>

<form action="buy_pet.php" method="post">
            <select name="pet_id" id="">

<option value="">Select a pet</option>
<?php
    $sql = "SELECT * FROM pets";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row["id"] . "'>" . $row["pet_name"] . "</option>";
        }
    } else {
        echo "0 results";
    }
?>

</select>
<button>buy bet</button>
    </form>
        

</div>


<div class="row">
        <div class="col-lg-6">
        <h1>Add pet</h1>

            <form action="add_pet.php" method="post">
                <div class="form-group">
                    <label for="pet_name">Pet Name</label>
                    <input type="text" class="form-control" id="pet_name" name="pet_name" placeholder="Enter pet name">
                </div>
                <div class="form-group">
                    <label for="pet_type">Pet Type</label>
                    <input type="text" class="form-control" id="pet_type" name="pet_type" placeholder="Enter pet type">
                </div>
                <div class="form-group">
                    <label for="pet_color">Pet Color</label>
                    <input type="text" class="form-control" id="pet_color" name="pet_color" placeholder="Enter pet color">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
</div>


<div class="row">
        <div class="col-lg-6">
        <h1>Add pet</h1>
        </div>
</div>