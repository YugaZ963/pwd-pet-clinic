<?php 
    session_start();
    if(!isset($_SESSION['login'])) {
	    echo "<script>alert('Please Login First !');window.location.replace('form_login_220057.php');</script>";
}

if ($_SESSION['user_type'] != 'manager') {
	echo "<script>alert('Access Forbidden'); window.location.replace('index.php') ; </script>";
}
?>
<!doctype html>
<html>
<head>
	<title>Form Change User	Photo</title>
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
			<div class="user-photo">
			<h1>Pet Clinic Yuga</h1><hr>
	<h3>Change User Photo</h3>
	<?php
		// call connection php mysql
		include "connection_220057.php";
		
		// make query SELECT FROM WHERE
		$query = "SELECT * FROM user_220057 WHERE user_id_220057='$_SESSION[user_id]'";
		
		// run query
		$user = mysqli_query($db_connection,$query);
		
		// extract data from query result
		$data = mysqli_fetch_assoc($user);
	?>
	<!-- ecntype wajib digunakan jika pada form terdapat upload file -->
	<form action="user_upload_220057.php" method="post" enctype="multipart/form-data">
	<table>
	<tr>
		<td></td>
		<td><img src="uploads/users/<?= $data['user_photo_220057']; ?>" width="100" height="100"></td>
	</tr>
	<tr>
		<td>New Photo</td>
		<td>: <input type="file" name="new_photo" required /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>&nbsp;
			<input type="submit" name="upload" value="UPLOAD" />
			<input type="hidden" name="user_photo_220057" value="<?=$data['user_photo_220057']?>" />
			<input type="hidden" name="user_id_220057" value="<?=$data['user_id_220057']?>" />
		</td>
	</tr>
	</table>
	</form>
	<!-- <p><a href="index.php">CANCEL</a></p> -->
	<?php
		// Mendapatkan URL saat ini
		$currentUrl = $_SERVER['REQUEST_URI'];

		// Mencari dan mengganti nilai parameter 'id' dengan nilai apa pun
		$newUrl = preg_replace('/(\?|&)id=[^&]*/', '', $currentUrl);

		// Mengganti URL tanpa memuat ulang halaman
		echo "<script>history.pushState({}, null, '$newUrl');</script>";
	?>
			</div>


		</div>
	
</body>
</html>