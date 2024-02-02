<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
?>

<html>
    <head>
    <title>Pet Clinic</title>
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

            .header .logo-txt a:hover {
                background-color: #5976b8;
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
                transition: 0.3s ease;
            }

            .navbar a:hover {
                background-color: azure;
                color: black;
                border-radius: 4px;
                padding: 2px;
            }
            
            .content {
                margin-top: 130px;
                /* padding-top: 30px; */
                /* position: relative;  */
                height: 10vh;
            }

            .content a{
                color: black;
                transition: 0.3s ease;
            }

            .content a:hover {
                background-color: #5976b8;
                border-radius: 4px;
                padding: 2px;
            }
            .content table {
            font-family: tahoma;
            background-color: #efefef;
            justify-content: center;
            align-items: center;
            border-collapse: collapse;
            width: 100%;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            /* Menambahkan shadow dengan warna dan ukuran tertentu */
        }

        .content th {
            font-family: tahoma;
            background-color: #CFC5BC;
            justify-content: center;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .content td {
            justify-content: center;
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

            .title-content{
                position: absolute;
                top: 400px
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
        <h1>Pet List</h1>
        <p><a href="pet_220057.php">Add New Pet</a></p>
        <table border="0">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Type</th>
                <th>Gender</th>
                <th>Age (Month)</th>
                <th>Photo</th>
                <th>Food</th>
                <th>Owner</th>
                <th>Address</th>
                <th>Phone</th>
                <th colspan="2">Action</th>
            </tr>
            <?php
            include "connection_220057.php" ; // panggil koneksi
            $query = "SELECT * FROM pet_220057"; // tampilkan data di dalam database
            $pets = mysqli_query($db_connection, $query); // eksekusi query

            $i = 1 ; // memberikan nomor
            foreach ($pets as $data) : // looping untuk menampilkan data dalam database
            ?>
            <tr>
                <td align="center"><?php echo $i++; ?></td>
                <td align="center"><a href="medicals_220057.php?pet_id=<?=$data['pet_id_220057']?>"><?php echo $data['pet_name_220057']; ?></a></td>
                <td align="center"><?php echo $data['pet_type_220057']; ?></td>
                <td align="center"><?php echo $data['pet_gender_220057']; ?></td>
                <td align="center"><?php echo $data['pet_age_220057']; ?></td>
                <td align="center">
                    <img src="uploads/pets/<?= $data['pet_photo_220057']; ?>" width="50" height="50" alt=""><br>
                    <a href="pet_photo_220057.php?id=<?=$data['pet_id_220057']?>">Change</a>
                </td>
                <td align="center"><?php echo $data['pet_food_220057']; ?></td>
                <td align="center"><?php echo $data['pet_owner_220057']; ?></td>
                <td align="center"><?php echo $data['pet_address_220057']; ?></td>
                <td align="center"><?php echo $data['pet_phone_220057']; ?></td>
                <td align="center"><a href="petEdit.php?id=<?=$data['pet_id_220057']?>">Edit</a></td>
                <td align="center"><a href="delete_pet_220057.php?id=<?=$data['pet_id_220057']?>">Delete</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <!-- <a href="index.php">Back to Home</a> -->
        </div>
        
    </body>
</html>