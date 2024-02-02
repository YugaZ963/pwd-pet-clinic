<?php 
    session_start();

    if (!isset($_SESSION['login'])) {
        echo "<script>alert('please login first'); window.location.replace('form_login_220057.php') ; </script>";
    }
    include "connection_220057.php";

    if(isset($_SESSION['login'])) {
        $userid = $_SESSION['user_id'];
        $sql = "SELECT user_id_220057, username_220057, fullname_220057, usertype_220057, user_photo_220057 FROM user_220057 WHERE user_id_220057 = '$userid'";
        $result = mysqli_query($db_connection, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>

<html>
    <head>
    <title>Pet Clinic</title>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com"> -->
<!-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin> -->
<!-- <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet"> -->
    <style>

        body a {
        text-decoration: none;
        }

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

            h1 {
            margin: 0; /* Hapus margin default dari h1 */
            font-size: 40px;
            color: #121212;
            }

            .header a {
                margin-left: 900px;
                color: white;
            }

            .account {
            position: absolute;
            top: 110px;
            right: -100%;
            height: 300px;
            width: 35rem;
            padding: 0 1.5rem;
            background-color: gray;
            color: #121212;
            transition: 0.3s;
            z-index: 3;
            }

            .account.active {
            right: 0;
            }

            /* .account .account-item {
            margin: 2rem 0;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 1px dashed #666;
            position: relative;
            } */

            .account img {
            height: 6rem;
            border-radius: 50%;
            }

            .account a {
                text-decoration: none; 
                color: #121212;
                margin-left: -30px;
                margin-top: 15px;
            }

            .account ul li {
                list-style: none;
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
                height: 30px
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

            #navbar-2 {
                margin-left: 14px;
                margin-top: 150px;
            }
            
            #navbar-2 img{
                margin-left: 50px;
            }

            #navbar-2 ul li{
                list-style: none;
            }

            #navbar-2 a{
                text-decoration: none; 
                color: #121212;
            }

            .content {
                margin-top: 105px;
                /* padding-top: 30px; */
                position: relative; 
                height: 10vh;
            }

            .content img{
                float: right; 
            }
            .content h1{
                font-family: tahoma; 
            }

            .title-content  {
                font-size: 25px;
                font-family: tahoma;
                font-weight: 600;
                position: absolute;
                top: 200px;
                left: 150px;
                font-family: 'Kaushan-script', cursive;
            }

            .title-content .paragraf-1 p{
                font-size: 25px;
            }

    </style>
    </head>
    <body>
        <!-- Header Bar -->
        <header class="header">
        <div class="logo">
        <img src="img/logo-petclinic.png" alt="logo" height="100" width="100">
        </div>
        <h1>Pet Clinic</h1>
        <a id="account-button" href="">Account</a>

        <div class="account">
            <div class="account-item">
            <?php if(isset($_SESSION['login'])) { ?>
            <h2>Welcome <?=$_SESSION['fullname']?>, your login as <?=$_SESSION['user_type']?></h2>
            <img src="uploads/users/<?=$_SESSION['user_photo'];?>" height="100" width="100">
            <ul>
            <li><a href="user_photo_220057.php?id=<?=$_SESSION['user_id'];?>">Change Photo</a></li>
            <li><a href="change_password_220057.php">Change Password</a></li>
            <li><a href="logout_220057.php">Logout</a></li>
            
            <?php } else { ?>
                <li><a href="form_login_220057.php">Login</a></li>
            <?php } ?>
            </ul>
            </div>
        </div>

        </header>

        

        <!-- Navigation Bar -->
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
            <div class="title-content">
            <p class="paragraf-1"><blockquote>Tingkatkan Kesehatan dan Kebahagiaan Peliharaan Anda di Pet Clinic</blockquote></p>
            <p class="paragraf-2"><blockquote>- Tempat Terbaik untuk Perawatan Hewan Terpercaya !</blockquote></p>
            </div>
            <img src="img/content-img.png" alt="content">
        </div>
    
    <!-- My Javascript -->
    <script src="js/script.js"></script>
    </body>
</html>