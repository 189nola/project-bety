<?php
error_reporting(0);
include 'koneksi.php';

$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin WHERE admin_id  ");
$a = mysqli_fetch_object($kontak);

$menu = mysqli_query($conn, "SELECT * FROM tb_menu WHERE id_menu = '" . $_GET['ip'] . "' ");
$p = mysqli_fetch_object($menu);

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>𝑸𝒖𝒂𝒓𝒕𝒆𝒓 𝑳𝒊𝒇𝒆 𝑪𝒓𝒊𝒔𝒊𝒔</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
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


    <!-- content detail -->
    <div class="section">
        <div class="container">
            <h3>Detail Produk</h3>
            <div class="box">

                <div class="col-2">
                    <img src="menu/<?php echo $p->gambar_menu ?>" width="100%">
                </div>
                <div class="col-2">

                    <h3>
                        <?php echo $p->nama_menu ?>
                    </h3>
                    <p>
                        Deskripsi : <br>
                        <?php echo $p->deskripsi_menu ?>

                    </p>

                </div>

            </div>
        </div>
    </div>

    <!--footer-->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p>
                <?php echo $a->admin_addres ?>
            </p>

            <h4>Email</h4>
            <p>
                <?php echo $a->admin_email ?>
            </p>

            <h4>Telepon</h4>
            <p>
                <?php echo $a->admin_telp ?>
            </p>

            <small>Copyright &copy; 2023 - Dhion Nardi.</small>
        </div>
    </div>

</body>

</html>