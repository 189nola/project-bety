<?php
session_start();
include 'koneksi.php';
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
    <title>Food</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->

    <header style="background-color: #f0a2d9;">
        <div class="container">
            <h1><a href="dashboard.php">Food Nr</a></h1>
            <ul>
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="profil.php">Profil</a></li>
                <li><a href="daftarmenu.php">Daftar Menu</a></li>
                <li><a href="menu.php">Menu</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </header>
    <!--content-->

    <div class="section">
        <div class="container">
            <h3>Tambah Menu</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori" class="input-control" required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                if(isset($_POST['submit'])){
                    $nama = ucwords($_POST['nama']);
                    $insert = mysqli_query($conn, "INSERT INTO tb_kategori VALUES (null, '".$nama."') ");
                    
                    if($insert){
                        echo '<script>alert(" Tambah Menu Berhasil")</script>';
                        echo '<script>window.location="daftarmenu.php"</script>';
                    }else{
                        echo 'Gagal'.mysqli_error($conn);
                    }
                }
                ?>
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