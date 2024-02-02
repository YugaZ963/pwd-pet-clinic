<?php

// echo $_POST['nama'] . "<br>";
// echo $_POST['type'] . "<br>";
// echo $_POST['gender'] . "<br>";
// echo $_POST['age'] . "<br>";
// echo $_POST['owner'] . "<br>";
// echo $_POST['adress'] . "<br>";
// echo $_POST['phone'] . "<br>";

if (isset($_POST)) { // check data dari form
    include "connection_220057.php"; // panggil connection.php mysql

    $query = "INSERT INTO doctor_220057 (doctor_name_220057, doctor_gender_220057, doctor_address_220057, doctor_phone_220057 ) VALUES ('$_POST[doctor_name_220057]', '$_POST[doctor_gender_220057]' , '$_POST[doctor_address_220057]', '$_POST[doctor_phone_220057]')" ;

    // run query
    $create = mysqli_query($db_connection, $query);

    if ($create) {
        // echo "<p>Pet added successfully !!</p>" ; // versi html
        echo "<script>alert('Doctor added successfully'); </script>"; // versi JS
    } else {
        // echo "<p>Pet add failed !!<p>" ; // versi html
        echo "<script>alert('Doctor add failed'); </script>" ; // versi JS
    }


}
?>

<!-- <p><a href="read.php">Back to Pet List</a><p> -->
<script>window.location.replace("doctorRead_220057.php")</script> 
<!-- pindah lokasi -->