<?php  

if (isset($_POST['upload'])) {
    include "connection_220057.php";

    $folder = 'uploads/doctors/';
    if (move_uploaded_file($_FILES['new_photo']['tmp_name'], $folder . $_FILES['new_photo']['name'])) {
        
        $photo = $_FILES['new_photo']['name'];
        $query="UPDATE doctor_220057 SET doctor_photo_220057='$photo' WHERE doctor_id_220057='$_POST[doctor_id]'";

        $upload = mysqli_query($db_connection,$query);

        if ($upload) {
            if ($_POST['doctor_photo'] !== 'default.png') unlink($folder . $_POST['doctor_photo']);
                echo "<script> alert('Change photo succesed !'); window.location.replace('doctorRead_220057.php');</script>";
        }    
            else{
                echo "<script>alert('Change photo failed ! ');window.locaion.replace('doctor_photo_220057.php?id=$_POST[doctor_id]');</script>";
            }
            
        }
        else echo " <script>alert('upload photo failed !');window.location.replace('doctor_photo_220057.php?id=$_POST[doctor_id]');</script>";
        
}
?>