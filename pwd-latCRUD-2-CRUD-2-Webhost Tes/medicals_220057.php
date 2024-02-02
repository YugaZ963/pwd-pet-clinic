<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Pet Clinic Yuga</title>
        <link rel="stylesheet" href="css/style.css">
        <style>
            .header {
            display: flex;
            position: fixed;
            left: 0;
            top: 0;
            height: 45px;
            width: 100%;
            background-color: #5976b8;
            color: #333;
            padding: 10px;
            display: flex;
            align-items: center;
            right: 0;
            z-index: 9999;
            }
            

            .logo {
            margin-right: -5px; /* Atur margin agar logo dan judul tidak saling menumpuk */
            }

            .logo img {
            max-width: 100%;
            height: auto;
            }

            .header .logo-txt a{
            margin: 0; /* Hapus margin default dari h1 */
            font-size: 40px;
            text-decoration: none;
            color: #121212;
            }

            .header a {
                margin-left: 900px;
            }

            
            .navbar {
                position: fixed;
                top: 60px;
                left: 0;
                width: 100%;
                background: #121212;
                display: flex;
                align-items: center;
                /* justify-content: space-between; */
                padding: 10px 0px;
                color: white;
                height: 30px;
                z-index: 9999;
            }
            
            .navbar h3 {
                font-size: 25px;
                margin-left: 25px;
                
            }
            .navbar ul {
                display: flex;
                gap: 1rem;
            }

            .navbar ul li {
                list-style: none;
            }

            .navbar a {
                text-decoration: none; 
                color: white;
                margin-right: 10px;
                justify-content: space-between;
                margin-left: 200px;
            }

            .content {
                margin-top: 130px;
                /* padding-top: 30px; */
                /* position: relative;  */
                height: 10vh;
            }

            .content table{
                font-family: tahoma; 
                background-color: #efefef;
                justify-content: center;
                align-items: center;
                border-collapse: collapse;
                width: 100%;
            }

            .content th{
                font-family: tahoma; 
                background-color: #CFC5BC;
                justify-content: center;
            }
            .content td{
                justify-content: center;
            }
        </style>
    </head>
    <body>
    <header class="header">
        <div class="logo">
        <img src="img/logo-petclinic.png" alt="logo" height="100" width="100">
        </div>
        <h1 class="logo-txt"><a href="index.php">Pet Clinic</a></h1>
        <!-- <a id="account-button" href="">Account</a> -->

        </header>

        <div>
            <nav class="navbar">
                <h3>Home</h3>
                <a href="petRead_220057.php">Pet List</a></li>
                <a href="doctorRead_220057.php">Doctor List</a></li>
                <?php if ($_SESSION['user_type'] == "manager") : ?>
                <a href="userRead_220057.php">User List</a></li>
                <a href="report.php"> Monthly Report </a></li>
                <?php endif; ?>
                
            </nav>
        </div>
        
        <div class="content">
        <h1>Medical Records</h1><hr>

        <?php 
        include "connection_220057.php";
        $queryPet = "SELECT * FROM pet_220057 WHERE pet_id_220057 = '$_GET[pet_id]'";

        // run query
        $pet = mysqli_query($db_connection,$queryPet);

        // extract data from query result
        $data1 = mysqli_fetch_assoc($pet);
        // query 1 tabel
        // $queryMed = "SELECT * FROM medicals_220057 WHERE pet_id_220057 = '$_GET[pet_id]'";

        // query 2 tabel
        $queryMed = "SELECT * FROM medicals_220057 AS m, doctor_220057 AS d WHERE pet_id_220057 = '$_GET[pet_id]' AND m.doctor_id_220057 = d.doctor_id_220057";
        $medicals = mysqli_query($db_connection,$queryMed);

        ?>

        <table>
            <tr>
                <td>Pet ID/Name</td>
                <td>: <?=$data1['pet_id_220057']?>/<?=$data1['pet_name_220057']?> </td>
            </tr>
            <tr>
                <td>Pet Type/Gender/Age</td>
                <td>: <?=$data1['pet_type_220057']?>/ <?=$data1['pet_gender_220057']?> / <?=$data1['pet_age_220057']?> </td>
            </tr>
            <tr>
                <td>Owner</td>
                <td>: <?=$data1['pet_owner_220057']?> / <?=$data1['pet_address_220057']?> / <?=$data1['pet_phone_220057']?> </td>
            </tr>
        </table>
        <p><a href="add_medical_220057.php?pet_id=<?=$data1['pet_id_220057']?>">Add New Record</a></p>
        <table border="1">
            <tr>
                <th>No</th>
                <th>Date</th>
                <th>Doctor</th>
                <th>Symptom</th>
                <th>Diagnose</th>
                <th>Treatment</th>
                <th>Cost (Rp)</th>
            </tr>
            <!-- akan looping jika data tidak kosong -->

            <?php 
                if (mysqli_num_rows($medicals) > 0) {
                    $i=1;
                    foreach($medicals as $data2) : 
                
            ?>
            <tr>
                <td><?=$i++ ?></td>
                <td><?= date('D, d M Y H:i:s' ,strtotime($data2['mr_date_220057']));?></td>
                <td><?=$data2['doctor_name_220057']?></td>
                <td><?=$data2['symptom_220057']?></td>
                <td><?=$data2['diagnose_220057']?></td>
                <td><?=$data2['treatment_220057']?></td>
                <td><?=$data2['cost_220057']?></td>
            </tr>
            <?php endforeach; 
            } else {?>
            <tr><td colspan="7" align="center">No Record !!</td></tr>
            <?php } ?>
        </table>
        <!-- <p><a href="petRead_220057.php">Back to Pet List</a></p> -->
        </div>
        
    </body>
</html>