<?php
session_start();
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food </title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
</head>


<body>

    <!--header-->

    <header style="background-color: #rgb;">
        <div class="container">
        <div class="logo">
            <h1><a href="dashboard.php">Food Nr</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="daftarmenu.php">Daftar Menu</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="logout.php">Logout</a></li>
                <li><a href="tampilan-menu.php">Tampilan Menu</a></li>

            </ul>
        </div>
    </header>

    <!--content-->

    <div class="section" style=" color: #black;">
        <div class="container">
            
                <br
                <h3> <nav>
            <div  class=""> <br 
                <h4 >Selamat Datang di Halaman Admin! Silakan masuk dan mulailah mengelola dan mengatur berbagai fitur dan data yang tersedia
                    <?php echo $_SESSION['a_global']->admin_name ?> 
                </h4>
                <h3> <nav> <br
            <div class="main_image">
                <img src="image/main_img.png" align="right">
            </div>
            
            </div>
        </div>
    </div>

    <!--footer-->

    <footer>
        <div class="container">
            <center><p>&copy; <?php echo date("Y"); ?> Food. Hak Cipta Dilindungi</p><center>
        </div>
    </footer>

</body>

</html>