<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo '<script>window.location="login.php"</script>';
}

$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '" . $_SESSION['id'] . "'  ");
$d = mysqli_fetch_object($query)

    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="admin.css">
</head>

<body>

    <!--header-->

    <header style="background-color: #rgb;">
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
            
            <h3>Profil</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control"
                        value="<?php echo $d->admin_name?>" required>
                    <input type="text" name="user" placeholder="Username" class="input-control"
                        value="<?php echo $d->username ?>" required>
                    <input type="text" name="hp" placeholder="No Hp" class="input-control"
                        value="<?php echo $d->admin_telp ?>" required>
                    <input type="text" name="email" placeholder="Email" class="input-control"
                        value="<?php echo $d->admin_email?>" required>
                    <input type="text" name="alamat" placeholder="Alamat" class="input-control"
                        value="<?php echo $d->admin_addres?>" required>
                    <input type="submit" name="submit" value="Ubah Profil" class="btn"
                        style="background-color: #f0a2d9;">
                </form>

                <?php

                if (isset($_POST['submit'])) {

                    $nama = ucwords($_POST['nama']);
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $email = $_POST['email'];
                    $alamat = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET admin_name = '" . $nama . "', username = '" . $user . "', admin_telp = '" . $hp . "', admin_email = '" . $email . "', 
                    admin_addres = '" . $alamat . "' WHERE admin_id = '" . $d->admin_id . "'  ");

                    if ($update) {
                        echo '<script>alert("Ubah data Berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    } else {
                        echo '<script>alert("Ubah data Gagal")</script>' . mysqli_error($conn);
                        echo '<script>window.location="profil.php"</script>';
                    }
                }

                ?>

            </div>

            <!--footer-->

            <footer>
        <div class="container">
            <center><p>&copy; <?php echo date("Y"); ?> Food. Hak Cipta Dilindungi</p><center>
        </div>
    </footer>


</body>

</html>