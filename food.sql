-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 04:10 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `admin_addres` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_addres`) VALUES
(4, 'Nur Baity', 'bety', '202cb962ac59075b964b07152d234b70', '+62111112345', 'bety@gmail.com', 'Samping Umri');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Pizza'),
(2, 'Burger'),
(3, 'Nasi Goreng'),
(7, 'Ramen');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `deskripsi_menu` text NOT NULL,
  `gambar_menu` varchar(100) NOT NULL,
  `status_menu` tinyint(4) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `id_kategori`, `nama_menu`, `harga_menu`, `deskripsi_menu`, `gambar_menu`, `status_menu`, `date_created`) VALUES
(12, 7, 'Ramyeon Pedas', 35, '<p>Ramyeon atau Ramyun merupakan hidangan mi kuah ala Korea. Walaupun hidangan ini juga terkenal di Jepang, umumnya ramen Korea bercita rasa agak pedas.Dan jangan lupakan bahwa di pekanbaru di Jl. Merpati Sakti sudah ada kedai khusus ramyeon loh, jadi kamu tidak usah khawatir lagi jika tiba-tiba kamu ingin memakan ramyeon. Untuk harganya tenang saja kami memberikan harga yang pas banget di dompet kamu.<br />\r\n<br />\r\n&nbsp;</p>\r\n', 'menu1688577155.jpg', 1, '2023-07-05 17:12:35'),
(13, 3, 'Nasi Goreng Ayam', 120000, '<p>nasi goreng adalah menu favorit ketika sedang sarapan</p>\r\n', 'menu1688577356.jpg', 1, '2023-07-05 17:15:56'),
(14, 2, 'Burger Ayam', 300000, '<p>Chicken burger merupakan salah satu menu favorit di restoran cepat saji terkenal seperti McDonald&rsquo;s dan KFC. Burger dengan isian daging ayam ini mudah kamu buat sendiri di rumah etsss tapi lebih enaknya kalau tinggal beli saja di Food Nr tidak harus menyiapkan bahan-bahannya lagi apalagi mengerluarkan bnyak tenaga nah terutama bagi kaum rebahan dan suka mageran kaya yang lagi baca<br />\r\n<br />\r\n&nbsp;</p>\r\n', 'menu1688577649.jpeg', 1, '2023-07-05 17:20:49');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_menu`
--
ALTER TABLE `tb_menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_menu`
--
ALTER TABLE `tb_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
