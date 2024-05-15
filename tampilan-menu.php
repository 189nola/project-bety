<?php
    include'koneksi.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_addres FROM tb_admin WHERE admin_id ");
    $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sneakers</title>
    <link rel="stylesheet" href="admin.css">
    <link rel="icon" href="image/logo.png">
</head>

<body>

    <!--header-->

    <header>
        <div class="container">
            <h1><a href="index.html">Zull.Sneakers</a></h1>
            <ul>
                <li><a href="index.html">Beranda</a></li>
                <li><a href="login.php">Admin</a></li>
            </ul>
        </div>
    </header>

    <!-- new product -->
<div class="section">
    <div class="container">
        <h3>Product</h3>
        <div class="box">
            <?php
            
            $menu = mysqli_query($conn, "SELECT * FROM tb_menu WHERE status_menu = 1 ORDER BY id_kategori DESC LIMIT 8 ");
            if(mysqli_num_rows($menu) > 0 ){
                while($p = mysqli_fetch_array($menu)){
            
            ?>
            <a href="detail-menu.php?ip=<?php echo $p['id_menu'] ?>" >
                    <div class="col-4">
                        <img src="menu/<?php echo $p['gambar_menu'] ?>" width="100%" >
                        <p class="nama"  ><?php echo substr($p['nama_menu'], 0, 20) ?></p>
                    </div>
                    </a>
            <?php }}else{ ?>
                <p>Produk Tidak Ada</p>
            <?php } ?>
        </div>
    </div>
</div>

  <!--footer-->
  <section class="footer" style="background-color:#0d3b66 ;">
        <div class="footer-box">
            <h2>𝐙𝐮𝐥𝐟𝐫𝐚𝐧 𝐒𝐚𝐩𝐮𝐭𝐫𝐚, 𝟏𝟓-𝟎𝟓-𝟐𝟎𝟐𝟑</h2>
        </div>
    </section>

</body>

</html>