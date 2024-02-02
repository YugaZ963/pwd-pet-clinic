<?php
    //echo $_POST['pet_name_220063'] . "<br>";
    //echo $_POST['pet_type_220063'] . "<br>";
    //echo $_POST['pet_gender_220063'] . "<br>";
    //echo $_POST['pet_age_220063'] . "<br>";
    //echo $_POST['pet_owner_220063'] . "<br>";
    //echo $_POST['pet_address_220063'] . "<br>";
    //echo $_POST['pet_phone_220063'] . "<br>";

if (isset($_GET['id'])) { // check variable GET from URL
    try{
        include "connection_220057.php"; //call conncection php mysql

    //sql query DELETE FROM WHERE 
    $query = "DELETE FROM doctor_220057 WHERE doctor_id_220057 = '$_GET[id]'";

    // run query
     $delete= mysqli_query($db_connection, $query);

     if($delete) { // check if query TRUE/succes
        // echo "<p>Pet delete successfully !</p>"; // versi html
        echo "<script> alert ('doctor deleted successfully !'); </script>"; // versi javascript
     }  else {
        //echo "<p>pet delete failed !</p>"; //versi html
        echo "<script> alert ('doctor deleted failed!'); </script>"; // versi javascript
     }
    }catch(Exception $e){
        // Menangkap dan menangani pengecualian
        echo "<script> alert('Doctor delete failed!'); window.location.replace('doctorRead_220057.php');</script>"; // JavaScript version
    }

    }   
?>
<!-- <p><a href="read_pet_220057.php">BACK TO PETS LIST</p> -->
<script>window.location.replace("doctorRead_220057.php"); </script>