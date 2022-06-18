-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 12:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tiketbis`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `kd_admin` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`kd_admin`, `nama`, `jekel`, `telp`, `username`, `password`, `foto`) VALUES
('AD001', 'Surono', 'Laki-laki', '08213123', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jadwal`
--

CREATE TABLE `tb_jadwal` (
  `kd_jadwal` varchar(15) NOT NULL,
  `jadwal` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jadwal`
--

INSERT INTO `tb_jadwal` (`kd_jadwal`, `jadwal`) VALUES
('KJ001', '09:00:00'),
('KJ002', '13:00:00'),
('KJ003', '20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keberangkatan`
--

CREATE TABLE `tb_keberangkatan` (
  `kd_keberangkatan` varchar(15) NOT NULL,
  `tgl_berangkat` date NOT NULL,
  `kd_jadwal` varchar(15) NOT NULL,
  `kd_tujuan` varchar(15) NOT NULL,
  `kd_mobil` varchar(15) NOT NULL,
  `kd_sopir` varchar(15) NOT NULL,
  `jenis` enum('Ekonomis','Vip') NOT NULL,
  `harga` double NOT NULL,
  `jml_kursi` int(15) NOT NULL,
  `sisa` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_keberangkatan`
--

INSERT INTO `tb_keberangkatan` (`kd_keberangkatan`, `tgl_berangkat`, `kd_jadwal`, `kd_tujuan`, `kd_mobil`, `kd_sopir`, `jenis`, `harga`, `jml_kursi`, `sisa`) VALUES
('KBR517', '2020-07-13', 'KJ002', 'KT003', 'KM004', 'KS001', 'Vip', 300000, 40, 40),
('KBR558', '2020-07-13', 'KJ001', 'KT001', 'KM001', 'KS002', 'Ekonomis', 200000, 40, 14),
('KBR665', '2020-07-13', 'KJ002', 'KT001', 'KM003', 'KS001', 'Vip', 300000, 40, 1),
('KBR684', '2020-07-14', 'KJ001', 'KT002', 'KM003', 'KS003', 'Ekonomis', 200000, 40, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_konfirmasi`
--

CREATE TABLE `tb_konfirmasi` (
  `kd_konfirm` varchar(15) NOT NULL,
  `kd_pesan` varchar(15) NOT NULL,
  `rekening` varchar(25) NOT NULL,
  `bukti_transaksi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_konfirmasi`
--

INSERT INTO `tb_konfirmasi` (`kd_konfirm`, `kd_pesan`, `rekening`, `bukti_transaksi`) VALUES
('KD-K9804890', 'KD-P80083', '768768768768', 'Capture1d.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kursi`
--

CREATE TABLE `tb_kursi` (
  `kd_kursi` varchar(15) NOT NULL,
  `no_kursi` varchar(15) NOT NULL,
  `kd_mobil` varchar(15) NOT NULL,
  `jenis` enum('Ekonomis','Vip') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kursi`
--

INSERT INTO `tb_kursi` (`kd_kursi`, `no_kursi`, `kd_mobil`, `jenis`) VALUES
('KK450', '1', 'KM003', 'Ekonomis'),
('KK484', '1', 'KM004', 'Vip'),
('KK988', '1', 'KM002', 'Ekonomis'),
('KS001', '1', 'KM001', 'Ekonomis'),
('KS002', '2', 'KM001', 'Ekonomis'),
('KS003', '3', 'KM001', 'Ekonomis'),
('KS004', '4', 'KM001', 'Ekonomis'),
('KS005', '5', 'KM001', 'Ekonomis'),
('KS006', '6', 'KM001', 'Ekonomis'),
('KS007', '7', 'KM001', 'Ekonomis'),
('KS008', '8', 'KM001', 'Ekonomis'),
('KS009', '9', 'KM001', 'Ekonomis'),
('KS010', '10', 'KM001', 'Ekonomis'),
('KS011', '11', 'KM001', 'Ekonomis'),
('KS012', '12', 'KM001', 'Ekonomis'),
('KS013', '13', 'KM001', 'Ekonomis'),
('KS014', '14', 'KM001', 'Ekonomis'),
('KS015', '15', 'KM001', 'Ekonomis'),
('KS016', '16', 'KM001', 'Ekonomis'),
('KS017', '17', 'KM001', 'Ekonomis'),
('KS018', '18', 'KM001', 'Ekonomis'),
('KS019', '19', 'KM001', 'Ekonomis'),
('KS020', '20', 'KM001', 'Ekonomis'),
('KS021', '21', 'KM001', 'Ekonomis'),
('KS022', '22', 'KM001', 'Ekonomis'),
('KS023', '23', 'KM001', 'Ekonomis'),
('KS024', '24', 'KM001', 'Ekonomis'),
('KS025', '25', 'KM001', 'Ekonomis'),
('KS026', '26', 'KM001', 'Ekonomis'),
('KS027', '27', 'KM001', 'Ekonomis'),
('KS028', '28', 'KM001', 'Ekonomis'),
('KS029', '29', 'KM001', 'Ekonomis'),
('KS030', '30', 'KM001', 'Ekonomis'),
('KS031', '31', 'KM001', 'Ekonomis'),
('KS032', '32', 'KM001', 'Ekonomis'),
('KS033', '33', 'KM001', 'Ekonomis'),
('KS034', '34', 'KM001', 'Ekonomis'),
('KS035', '35', 'KM001', 'Ekonomis'),
('KS036', '36', 'KM001', 'Ekonomis'),
('KS037', '37', 'KM001', 'Ekonomis'),
('KS038', '38', 'KM001', 'Ekonomis'),
('KS039', '39', 'KM001', 'Ekonomis'),
('KS040', '40', 'KM001', 'Ekonomis');

-- --------------------------------------------------------

--
-- Table structure for table `tb_member`
--

CREATE TABLE `tb_member` (
  `kd_member` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `telp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `aktif` enum('Ya','Tidak') NOT NULL,
  `tgl_daftar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_member`
--

INSERT INTO `tb_member` (`kd_member`, `nama`, `jekel`, `telp`, `email`, `password`, `aktif`, `tgl_daftar`) VALUES
('KK471499', 'wisnu', 'Laki-laki', '12345', 'wisnu12345', 'db0469b1b146031372b4e15865217d28', 'Ya', '2022-06-17 15:39:31'),
('KK815567', 'Wisnu', 'Laki-laki', '0896213', 'wisnu', '67340a8acc49d521d7fdd25db913bf9d', 'Ya', '2022-06-16 17:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_mobil`
--

CREATE TABLE `tb_mobil` (
  `kd_mobil` varchar(15) NOT NULL,
  `merk` varchar(35) NOT NULL,
  `foto` text NOT NULL,
  `flat_nmr` varchar(9) NOT NULL,
  `th` year(4) NOT NULL,
  `fasilitas` text NOT NULL,
  `jenis` enum('Ekonomis','Vip') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_mobil`
--

INSERT INTO `tb_mobil` (`kd_mobil`, `merk`, `foto`, `flat_nmr`, `th`, `fasilitas`, `jenis`) VALUES
('KM001', 'Mercedes-Benz OH 1526', 'bus1.jpg', 'BA1212CV', 2010, '-', 'Ekonomis'),
('KM002', 'Mercedes-Benz OH 1526', 'bus2.jpg', 'BA1214CV', 2010, '-', 'Ekonomis'),
('KM003', 'Mercedes-Benz OH 1526', 'bus3.jpg', 'BA5512CV', 2011, '-', 'Ekonomis'),
('KM004', 'Mercedes-Benz OH 1526', 'bus4.jpg', 'BA1261CV', 2013, 'AC,WC,LCD', 'Vip');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesan`
--

CREATE TABLE `tb_pesan` (
  `kd_pesan` varchar(15) NOT NULL,
  `kd_member` varchar(15) NOT NULL,
  `status` enum('Pending','Pengecekan','Lunas','Cancel') NOT NULL,
  `batas_waktu` datetime DEFAULT NULL,
  `kode` int(3) NOT NULL,
  `jenis` enum('Ekonomis','Vip') NOT NULL,
  `jml_kursi` int(15) NOT NULL,
  `total` double NOT NULL,
  `kd_keberangkatan` varchar(15) NOT NULL,
  `tgl_pesan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pesan`
--

INSERT INTO `tb_pesan` (`kd_pesan`, `kd_member`, `status`, `batas_waktu`, `kode`, `jenis`, `jml_kursi`, `total`, `kd_keberangkatan`, `tgl_pesan`) VALUES
('KD-P80083', 'KK356708', 'Lunas', NULL, 390, 'Ekonomis', 2, 400000, 'KBR558', '2020-07-12 18:57:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sopir`
--

CREATE TABLE `tb_sopir` (
  `kd_sopir` varchar(15) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jekel` enum('Laki-laki','Perempuan') NOT NULL,
  `telp` varchar(13) NOT NULL,
  `alamat` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_sopir`
--

INSERT INTO `tb_sopir` (`kd_sopir`, `nama`, `jekel`, `telp`, `alamat`, `foto`) VALUES
('KS001', 'Junaidi', 'Laki-laki', '08213123122', 'Padang', 'default.png'),
('KS002', 'Johan', 'Laki-laki', '0821321312', 'Padang', 'default.png'),
('KS003', 'Riko', 'Laki-laki', '08213123122', 'Muaro Bungo', 'default.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tiket`
--

CREATE TABLE `tb_tiket` (
  `kd_tiket` varchar(15) NOT NULL,
  `kd_pesan` varchar(15) NOT NULL,
  `kd_keberangkatan` varchar(15) NOT NULL,
  `nm_penumpang` varchar(35) NOT NULL,
  `title` enum('Tuan','Nyonya','Nona') NOT NULL,
  `alm` text NOT NULL,
  `telp` varchar(13) NOT NULL,
  `kd_kursi` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tiket`
--

INSERT INTO `tb_tiket` (`kd_tiket`, `kd_pesan`, `kd_keberangkatan`, `nm_penumpang`, `title`, `alm`, `telp`, `kd_kursi`) VALUES
('KD-T362780', 'KD-P80083', 'KBR558', 'sadasd', 'Tuan', 'sdfsdfsd', '435345', 'KS003'),
('KD-T980481', 'KD-P80083', 'KBR558', 'rwerwe', 'Tuan', 'sdasd', '43534534', 'KS002'),
('TK001', 'PS001', 'KBR558', 'Nori', 'Tuan', 'Padang', '081231232', 'KS001');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tujuan`
--

CREATE TABLE `tb_tujuan` (
  `kd_tujuan` varchar(15) NOT NULL,
  `dari` varchar(50) NOT NULL,
  `tujuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tujuan`
--

INSERT INTO `tb_tujuan` (`kd_tujuan`, `dari`, `tujuan`) VALUES
('KT001', 'Padang', 'Jakarta'),
('KT002', 'Padang', 'Jambi'),
('KT003', 'Padang', 'Medan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`kd_admin`);

--
-- Indexes for table `tb_jadwal`
--
ALTER TABLE `tb_jadwal`
  ADD PRIMARY KEY (`kd_jadwal`);

--
-- Indexes for table `tb_keberangkatan`
--
ALTER TABLE `tb_keberangkatan`
  ADD PRIMARY KEY (`kd_keberangkatan`);

--
-- Indexes for table `tb_konfirmasi`
--
ALTER TABLE `tb_konfirmasi`
  ADD PRIMARY KEY (`kd_konfirm`);

--
-- Indexes for table `tb_kursi`
--
ALTER TABLE `tb_kursi`
  ADD PRIMARY KEY (`kd_kursi`);

--
-- Indexes for table `tb_member`
--
ALTER TABLE `tb_member`
  ADD PRIMARY KEY (`kd_member`);

--
-- Indexes for table `tb_mobil`
--
ALTER TABLE `tb_mobil`
  ADD PRIMARY KEY (`kd_mobil`);

--
-- Indexes for table `tb_pesan`
--
ALTER TABLE `tb_pesan`
  ADD PRIMARY KEY (`kd_pesan`);

--
-- Indexes for table `tb_sopir`
--
ALTER TABLE `tb_sopir`
  ADD PRIMARY KEY (`kd_sopir`);

--
-- Indexes for table `tb_tiket`
--
ALTER TABLE `tb_tiket`
  ADD PRIMARY KEY (`kd_tiket`);

--
-- Indexes for table `tb_tujuan`
--
ALTER TABLE `tb_tujuan`
  ADD PRIMARY KEY (`kd_tujuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
