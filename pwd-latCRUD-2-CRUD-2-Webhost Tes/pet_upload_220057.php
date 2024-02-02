<?php  

if (isset($_POST['upload'])) {
    include "connection_220057.php";

    $folder = 'uploads/pets/';
    if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
        
        $photo = $_FILES['new_photo']['name'];
        $query="UPDATE pet_220057 SET pet_photo_220057='$photo' WHERE pet_id_220057='$_POST[pet_id]'";

        $upload = mysqli_query($db_connection,$query);

        if ($upload) {
            if ($_POST['pet_photo'] !== 'default.png') unlink($folder . $_POST['pet_photo']);
                echo "<script> alert('Change photo succesed !'); window.location.replace('petRead_220057.php');</script>";
        }    
            else{
                echo "<script>alert('Change photo failed ! ');window.locaion.replace('pet_photo_220057.php?id=$_POST[pet_id]');</script>";
            }
            
        }
        else echo " <script>alert('upload photo failed !');window.location.replace('pet_photo_220057.php?id=$_POST[pet_id]');</script>";
        
}
?>