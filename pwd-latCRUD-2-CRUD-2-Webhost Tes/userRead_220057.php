<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }

    if ($_SESSION['user_type'] != 'manager') {
        echo "<script>alert('Access Forbidden'); window.location.replace('index.php') ; </script>";
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
        <h1>Users List</h1>
        <p><a href="user_220057.php">Add New user</a></p>
        <table border="0">
            <tr>
                <th>No</th>
                <th>Username</th>
                <!-- <th>Password</th> -->
                <th>User Type</th>
                <th>Fullname</th>
                <th>Photo</th>
                <th colspan="3">Action</th>
            </tr>
            <?php
            include "connection_220057.php" ; // panggil koneksi
            $query = "SELECT * FROM user_220057"; // tampilkan data di dalam database
            $users = mysqli_query($db_connection, $query); // eksekusi query

            $i = 1 ; // memberikan nomor
            foreach ($users as $data) : // looping untuk menampilkan data dalam database
            ?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $data['username_220057']; ?></td>
                <!-- <td><?php echo $data['password_220057']; ?></td> -->
                <td><?php echo $data['usertype_220057']; ?></td>
                <td><?php echo $data['fullname_220057']; ?></td>
                <td align="center">
                <img src="uploads/users/<?=$data['user_photo_220057']; ?>" width="50" height="50"><br>
                <a href="user_photo_220057.php?id=<?=$data['user_id_220057']?>">Change Photo</a>
                </td>
                <td><a href="userEdit_220057.php?id=<?=$data['user_id_220057']?>">Edit User</a></td>
                <td><a href="delete_user_220057.php?id=<?=$data['user_id_220057']?>">Delete User</a></td>
                <td><a href="reset_password_220057.php?id=<?=$data['user_id_220057'];?>&type=<?=$data['usertype_220057'];?>" onclick ="return confirm('are you sure reset password ??')">Reset Password</a></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <!-- <a href="index.php">Back to Home</a> -->
        </div>
        
    </body>
</html>