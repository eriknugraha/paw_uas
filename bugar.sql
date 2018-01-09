-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2017 at 05:16 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bugar`
--

-- --------------------------------------------------------

--
-- Table structure for table `kunjungan`
--

CREATE TABLE IF NOT EXISTS `kunjungan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kunjungan` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kunjungan`
--

INSERT INTO `kunjungan` (`id`, `nama_kunjungan`) VALUES
(1, 'fitnes'),
(2, 'yoga'),
(3, 'senam');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE IF NOT EXISTS `level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `level` int(11) NOT NULL,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `level`, `keterangan`) VALUES
(1, 1, 'kasir'),
(2, 2, 'dokter'),
(3, 3, 'admin'),
(4, 4, 'absensi');

-- --------------------------------------------------------

--
-- Table structure for table `operator`
--

CREATE TABLE IF NOT EXISTS `operator` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `photo` varchar(20) NOT NULL,
  `level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `operator`
--

INSERT INTO `operator` (`id`, `username`, `password`, `photo`, `level`) VALUES
(1, 'tika', 'tika', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE IF NOT EXISTS `paket` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `paket` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`id`, `paket`) VALUES
(1, 'gold'),
(2, 'silver');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `foto` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`foto`) VALUES
('b2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbyr`
--

CREATE TABLE IF NOT EXISTS `tbyr` (
  `no_kwitansi` varchar(20) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `jns_bayar` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`no_kwitansi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbyr`
--

INSERT INTO `tbyr` (`no_kwitansi`, `tgl_bayar`, `id_member`, `nama_member`, `total_bayar`, `jns_bayar`, `keterangan`) VALUES
('KW-142717707', '2017-07-27', '17000011', 'kz', 0, 'kunjungan', ''),
('KW-172617758', '2017-07-26', '17000002', 'aisyah', 0, 'pemeriksaan', ''),
('KW-432617666', '2017-07-26', '17000011', 'k', 0, 'baru', '');

-- --------------------------------------------------------

--
-- Table structure for table `tdetailbyr`
--

CREATE TABLE IF NOT EXISTS `tdetailbyr` (
  `no_kwitansi` varchar(20) NOT NULL,
  `id_layanan` int(11) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `harga_satuan` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `hargaxjml` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdetailbyr`
--

INSERT INTO `tdetailbyr` (`no_kwitansi`, `id_layanan`, `nama_layanan`, `harga_satuan`, `jml`, `hargaxjml`) VALUES
('KW-432617666', 38, 'Step Test', 25000, 1, 25000),
('KW-432617666', 38, 'Step Test', 25000, 1, 25000),
('KW-432617666', 37, 'HandGrip', 5000, 1, 5000),
('KW-172617758', 5, 'Konsultasi S1', 20000, 10, 200000),
('KW-142717707', 2, 'pemeriksaan fisik', 20000, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `tdetailpaket`
--

CREATE TABLE IF NOT EXISTS `tdetailpaket` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `id_paket` int(12) NOT NULL,
  `id_layanan` int(12) NOT NULL,
  `nama_layanan` varchar(20) NOT NULL,
  `harga` int(12) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tdetailpaket`
--

INSERT INTO `tdetailpaket` (`id`, `id_paket`, `id_layanan`, `nama_layanan`, `harga`) VALUES
(1, 1, 38, 'Step Test', 25000),
(2, 1, 38, 'Step Test', 25000),
(3, 1, 37, 'HandGrip', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `tdokter`
--

CREATE TABLE IF NOT EXISTS `tdokter` (
  `id_dokter` varchar(20) NOT NULL,
  `kodeUser` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sex` enum('P','L') NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `photo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_dokter`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tdokter`
--

INSERT INTO `tdokter` (`id_dokter`, `kodeUser`, `nama`, `tempat_lahir`, `tgl_lahir`, `sex`, `alamat`, `tlp`, `nip`, `username`, `password`, `akses`, `photo`) VALUES
('DK-011817735', 'US-011817437', 'aas', 'bandung', '1996-01-08', 'P', 'kiaracondong', '083829940799', '1234', 'dokter', 'd22af4180eee4bd95072', '2', 'chibi-muslim-lucu.jpg'),
('DK-070117998', '', 'dr. Edward E. Tambunan, Sp.KO', 'bandung', '1966-01-01', 'L', 'bandung', '0897876656', '19660121212', 'z', 'fbade9e36a3f36d3d676', '3', ''),
('DK-101717170', 'US-0714173', 'akai', 'bandung', '1996-07-10', 'P', 'kiaracondong', '08989898', '1147050156', 'akai', 'ca6372098aa874ba6ab7', '3', '10954873_705986766173313_4028052096019925667_n.jpg'),
('DK-120117384', '', 'qw', 'qw', '2017-07-04', 'P', 'qw', '2', '1', 'qw', 'qw', '3', ''),
('DK-300217595', '', 'dr. Ijan A., Sp.KO', 'bandung', '1964-04-20', 'L', 'Jl. Merak 13 Bandung', '08188445566', '1324654987', '00', 'bb61aa15205a75f5ea2a', '3', '84cc0bf21fd3ab846661b1428c5c8e29.jpg'),
('DK-302017500', 'US-0908164', 'qaa', 'qaa', '1996-08-08', 'L', 'q', '1', '1', 'q', 'q', '3', ''),
('DK-321717338', 'US-0714173', 'dr. Pinky Regina', 'gg', '1970-01-01', 'P', 'Bandung', '08122222', '1970000001', 'a', 'efb79b1f1d4f96540d80', '3', '7.png'),
('DK-330117535', '', 'm', 'm', '2017-07-05', 'P', 'm', '456', 'm', 'm', 'm', '3', ''),
('DK-521817096', 'US-521817497', 'dededede', 'dede', '2017-07-01', 'P', 'dede', '7890', '1234', 'dede', 'b4be1c568a6dc02dcaf2', '2', '3.jpg'),
('DK-521817944', 'US-521817943', 'tika', 'tangerang', '1997-07-03', 'P', 'bandung', '08987676', '999999', 'suster', '4b225a628fd71a7c996f', '2', 'TELEKOMUNIKAS.jpg'),
('DK-551817601', 'US-551817762', 'wawanwan', 'tangerang', '1996-07-05', 'P', 'tangerang', '1234', '12345', 'wawan', '0a000f688d85de79e3761dec6816b2a5', '2', '3.jpg'),
('DK-580117109', 'US-0908164', 'siti', 'siti', '2017-07-01', 'P', 's', '0987', '123', 's', 's', '3', ''),
('DK-580117842', '', 'dr. Sylvia Indriani', 'bandung', '1974-01-01', 'P', 'bandung', '081221212', '1974010101010', 'sylvia', '37743f4a0c36e5778ccc', '3', '');

--
-- Triggers `tdokter`
--
DROP TRIGGER IF EXISTS `a`;
DELIMITER //
CREATE TRIGGER `a` BEFORE INSERT ON `tdokter`
 FOR EACH ROW BEGIN
    insert into user_man(kodeUser,nama,sex,alamat,
 tlp,tgl_lahir,username,password,photo,akses)
 values (NEW .kodeUser,NEW .nama,NEW .sex,NEW .alamat,
 NEW .tlp,NEW .tgl_lahir,NEW .username,NEW .password,NEW .photo,
 NEW .akses);
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `b`;
DELIMITER //
CREATE TRIGGER `b` BEFORE UPDATE ON `tdokter`
 FOR EACH ROW BEGIN
    update user_man set nama=NEW .nama,sex=NEW .sex,alamat=NEW . alamat,tlp=NEW .tlp,tgl_lahir=NEW .tgl_lahir,username=NEW .username,password=NEW .password,akses=NEW .akses, photo=NEW .photo where
    kodeUser=NEW .kodeUser;
    END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `c`;
DELIMITER //
CREATE TRIGGER `c` BEFORE DELETE ON `tdokter`
 FOR EACH ROW BEGIN
	delete from user_man where kodeUser=OLD .kodeUser;
    END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tfitness`
--

CREATE TABLE IF NOT EXISTS `tfitness` (
  `tgl_kunjugan` date NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` varchar(20) NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `sex` enum('P','L') NOT NULL,
  `umur` int(11) NOT NULL,
  `jam_kunjungan` varchar(10) NOT NULL,
  `hari` varchar(20) NOT NULL,
  `bln` varchar(20) NOT NULL,
  `tujuan` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `tfitness`
--

INSERT INTO `tfitness` (`tgl_kunjugan`, `id`, `id_member`, `nama_member`, `sex`, `umur`, `jam_kunjungan`, `hari`, `bln`, `tujuan`, `status`) VALUES
('2017-07-26', 19, '17000001', 'alay', 'L', 10, '23:18', 'Wed', 'Juli', 'yoga', 'Member'),
('2017-07-26', 20, '17000011', 'k', 'P', 9, '23:19', 'Wed', 'Juli', 'yoga', 'non-member');

-- --------------------------------------------------------

--
-- Table structure for table `tlayanan`
--

CREATE TABLE IF NOT EXISTS `tlayanan` (
  `id_layanan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_layanan` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL,
  `paket` varchar(20) NOT NULL,
  PRIMARY KEY (`id_layanan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `tlayanan`
--

INSERT INTO `tlayanan` (`id_layanan`, `nama_layanan`, `harga`, `paket`) VALUES
(1, 'karcis kunjungan', 5000, ''),
(2, 'pemeriksaan fisik', 20000, ''),
(3, 'Konsultasi Dokter Spesialis', 20000, ''),
(4, 'Konsultasi Dokter Umum', 20000, ''),
(5, 'Konsultasi S1', 20000, ''),
(6, 'Konsultasi S2', 50000, ''),
(7, 'Konsultasi S3', 50000, ''),
(8, 'EKG', 15000, ''),
(9, 'Spirometri', 20000, ''),
(10, 'Exercise dengan Tes Lapangan', 20000, ''),
(11, 'Exercise dengan Tes Bangku', 25000, ''),
(12, 'Exercise dengan Ergocycle', 60000, ''),
(13, 'Exercise dengan Treadmill', 200000, ''),
(14, 'Tes Conconi', 60000, ''),
(15, 'Analisis Gas Pernapasan', 100000, ''),
(16, 'Tes Kekuatan Otot', 5000, ''),
(17, 'Tes Kelentukan Sendi', 5000, ''),
(18, 'Tes Daya Tahan Otot', 5000, ''),
(19, 'Daya Ledak Otot', 5000, ''),
(20, 'Tes Kecepatan Reaksi', 11000, ''),
(21, 'Tes Koordinasi', 11000, ''),
(22, 'Tes Kelincahan', 11000, ''),
(23, 'BMI', 5000, ''),
(24, 'Skinfold Calliper', 10000, ''),
(25, 'Antropometri', 15500, ''),
(26, 'Fat Analyzer', 25000, ''),
(27, 'Bodpod/Total Body Fat', 50000, ''),
(28, 'Tes Keropos Tulang', 15000, ''),
(29, 'Fisioterapi', 20000, ''),
(30, 'fitness_member', 100000, ''),
(31, 'Fitness per Kunjungan / Aerobik', 15000, ''),
(32, 'Penelitian Magang', 50000, ''),
(33, 'Konsultasi Gratis', 0, ''),
(34, 'Kunjungan OR Basket', 100000, ''),
(36, 'Back-leg Dynamometer', 5000, ''),
(37, 'HandGrip', 5000, ''),
(38, 'Step Test', 25000, '');

-- --------------------------------------------------------

--
-- Table structure for table `tmedis`
--

CREATE TABLE IF NOT EXISTS `tmedis` (
  `Tgl_RM` date NOT NULL,
  `id_member` varchar(20) NOT NULL,
  `umur` int(20) NOT NULL,
  `sex` enum('P','L') NOT NULL,
  `ppe` enum('Y','N') NOT NULL,
  `fsk` enum('Y','N') NOT NULL,
  `ekg` enum('Y','N') NOT NULL,
  `krt_ekg` varchar(50) NOT NULL,
  `konsul_gizi` enum('Y','N') NOT NULL,
  `rice` enum('Y','N') NOT NULL,
  `konsul_umum` enum('Y','N') NOT NULL,
  `bb` decimal(5,2) NOT NULL,
  `tb` decimal(5,2) NOT NULL,
  `imt` decimal(5,2) NOT NULL,
  `krt_imt` varchar(20) NOT NULL,
  `lingktbh` decimal(5,2) NOT NULL,
  `krt_lingktbh` varchar(20) NOT NULL,
  `nadi` decimal(5,2) NOT NULL,
  `krt_nadi` varchar(20) NOT NULL,
  `tek_drh` varchar(20) NOT NULL,
  `krt_tekdrh` varchar(20) NOT NULL,
  `skinfold` decimal(5,2) NOT NULL,
  `krt_skinfold` varchar(20) NOT NULL,
  `fat` decimal(5,2) NOT NULL,
  `krt_fat` varchar(20) NOT NULL,
  `ot_kanan` decimal(5,2) NOT NULL,
  `ot_kiri` decimal(5,2) NOT NULL,
  `krt_ka_ki` varchar(20) NOT NULL,
  `ot_leg` decimal(5,2) NOT NULL,
  `krt_ot_leg` varchar(20) NOT NULL,
  `ot_back` decimal(5,2) NOT NULL,
  `krt_ot_back` varchar(20) NOT NULL,
  `flex` decimal(5,2) NOT NULL,
  `krt_flex` varchar(20) NOT NULL,
  `daya_ldk` decimal(5,2) NOT NULL,
  `krt_daya_ldk` varchar(20) NOT NULL,
  `bangku` decimal(5,2) NOT NULL,
  `krt_bangku` varchar(20) NOT NULL,
  `sepeda` decimal(5,2) NOT NULL,
  `krt_sepeda` varchar(20) NOT NULL,
  `treadmill` decimal(5,2) NOT NULL,
  `krt_treadmill` varchar(20) NOT NULL,
  `rockport` decimal(5,2) NOT NULL,
  `krt_rockport` varchar(20) NOT NULL,
  `densito` decimal(5,2) NOT NULL,
  `krt_densito` varchar(20) NOT NULL,
  `spiro` decimal(5,2) NOT NULL,
  `krt_spiro` varchar(20) NOT NULL,
  `nadi_istirahat` decimal(5,2) NOT NULL,
  `k_nadi_istirahat` varchar(20) NOT NULL,
  `pemeriksa` varchar(50) NOT NULL,
  `kode` varchar(20) NOT NULL,
  `kesimpulan` text NOT NULL,
  PRIMARY KEY (`kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmedis`
--

INSERT INTO `tmedis` (`Tgl_RM`, `id_member`, `umur`, `sex`, `ppe`, `fsk`, `ekg`, `krt_ekg`, `konsul_gizi`, `rice`, `konsul_umum`, `bb`, `tb`, `imt`, `krt_imt`, `lingktbh`, `krt_lingktbh`, `nadi`, `krt_nadi`, `tek_drh`, `krt_tekdrh`, `skinfold`, `krt_skinfold`, `fat`, `krt_fat`, `ot_kanan`, `ot_kiri`, `krt_ka_ki`, `ot_leg`, `krt_ot_leg`, `ot_back`, `krt_ot_back`, `flex`, `krt_flex`, `daya_ldk`, `krt_daya_ldk`, `bangku`, `krt_bangku`, `sepeda`, `krt_sepeda`, `treadmill`, `krt_treadmill`, `rockport`, `krt_rockport`, `densito`, `krt_densito`, `spiro`, `krt_spiro`, `nadi_istirahat`, `k_nadi_istirahat`, `pemeriksa`, `kode`, `kesimpulan`) VALUES
('2017-07-15', 'MRB-7404', 0, 'P', 'Y', '', '', 'dalam batas normal', '', '', '', 7.00, 7.00, 7.00, 'Overweight', 7.00, 'normal', 7.00, 'Normal', '7', 'Prehypertensi', 77.00, 'baik', 7.00, 'baik sekali', 7.00, 7.00, 'Kurang Sekali', 7.00, 'baik sekali', 7.00, 'baik', 7.00, 'baik', 7.00, 'baik', 6.00, 'Normal', 6.00, 'Normal', 6.00, 'baik sekali', 6.00, 'baik', 6.00, 'baik', 6.00, 'baik sekali', 0.00, '', 'z', 'RM-1507171 ', 'aaa'),
('2017-07-18', 'MRB-7404', 0, 'P', '', '', '', 'dalam batas normal', '', 'Y', '', 10.00, 12.00, 2.00, 'Overweight', 12.00, 'normal', 12.00, 'Baik', '12', 'Normal', 12.00, 'baik', 12.00, 'baik', 999.99, 12.00, 'Cukup', 12.00, 'baik', 12.00, 'baik', 12.00, 'Cukup', 12.00, 'Cukup', 12.00, 'baik sekali', 121.00, 'baik sekali', 12.00, 'Cukup', 12.00, 'Cukup', 12.00, 'baik sekali', 12.00, 'Cukup', 12.00, 'Baik', 'akai', 'RM-1807172 ', '12 '),
('2017-07-18', 'ERC-9686', 0, 'P', 'Y', '', '', 'dalam batas normal', '', '', 'Y', 12.00, 12.00, 12.00, 'Overweight', 12.00, 'beresiko penyakit', 12.00, 'Baik Sekali', '12', 'Prehypertensi', 5.00, 'baik', 5.00, 'baik', 5.00, 5.00, 'baik sekali', 5.00, 'baik', 5.00, 'Cukup', 5.00, 'Cukup', 5.00, 'Cukup', 5.00, '', 5.00, 'Normal', 5.00, 'baik', 1.00, 'baik', 1.00, 'baik', 1.00, 'baik sekali', 11.00, 'Baik', 'dr.', 'RM-1807173 ', 'baik');

-- --------------------------------------------------------

--
-- Table structure for table `tmember`
--

CREATE TABLE IF NOT EXISTS `tmember` (
  `id_member` varchar(20) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `nama_member` varchar(50) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `sex` enum('L','P') NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `tlp` varchar(20) NOT NULL,
  `kunjungan_1` date NOT NULL,
  `last_registered` date NOT NULL,
  `status` text NOT NULL,
  `photo` varchar(150) NOT NULL,
  PRIMARY KEY (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tmember`
--

INSERT INTO `tmember` (`id_member`, `tgl_daftar`, `nama_member`, `tempat_lahir`, `tgl_lahir`, `sex`, `pekerjaan`, `alamat`, `tlp`, `kunjungan_1`, `last_registered`, `status`, `photo`) VALUES
('17000001', '2017-07-26', 'alay', 'alay', '2007-07-03', 'P', 'alay', 'alay', '1234', '2017-07-26', '2017-08-25', 'member', 'Romi R.jpg'),
('17000002', '2017-07-26', 'aisyah', 'b', '2007-07-18', 'L', 'b', 'b', '345', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000003', '2017-07-26', 'cc', 'c', '2007-07-18', 'L', 'c', 'c', '3', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000004', '2017-07-26', 'deden', 'd', '2007-07-11', 'P', 'd', 'd', '3', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000005', '2017-07-26', 'ee', 'e', '2008-07-10', 'P', 'e', 'e', '3', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000006', '2017-07-26', 'ff', 'f', '2007-07-13', 'P', 'f', 'f', '34', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000007', '2017-07-26', 'gg', 'g', '2007-07-06', 'P', 'g', 'g', '4', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000008', '2017-07-26', 'ha', 'h', '2007-07-11', 'L', 'h', 'h', '4', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000009', '2017-07-26', 'ia', 'i', '2007-07-11', 'L', 'i', 'i', '6', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000010', '2017-07-26', 'jn', 'j', '2008-07-09', 'L', 'j', 'j', '6', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000011', '2017-07-26', 'kz', 'k', '2008-07-09', 'P', 'k', 'k', '2', '2017-07-26', '0000-00-00', 'non-member', ''),
('17000012', '2017-07-26', 'udin', 'udin', '1996-07-26', 'P', 'udin', 'udin', '4', '2017-07-26', '2017-08-25', 'member', 'Romi R.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_man`
--

CREATE TABLE IF NOT EXISTS `user_man` (
  `id_user` int(5) NOT NULL AUTO_INCREMENT,
  `kodeUser` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `tlp` varchar(150) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `photo` varchar(150) NOT NULL,
  `akses` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70 ;

--
-- Dumping data for table `user_man`
--

INSERT INTO `user_man` (`id_user`, `kodeUser`, `nama`, `sex`, `alamat`, `tlp`, `tgl_lahir`, `username`, `password`, `photo`, `akses`) VALUES
(17, 'US-4616179', 'aass', '2', 'bbbbbbbbbb', '09876', '1996-08-08', 'aa', '4124bc0a9335c27f086f24ba207a4912', 'default.png', 2),
(18, 'US-3419174', 'siti', 'P', 'siti', '0987', '1996-08-08', 'siti', 'siti', 'page1-img7.jpg', 2),
(20, 'US-0720171', 'u', 'P', 'u', '987', '1996-08-08', 'u', 'u', '1cdc8e3367dff0e8cd515894467ed9b7.png', 1),
(21, 'US-0908164', 'siti', 'P', 's', '0987', '2017-07-01', 's', 's', 'kucing.jpg', 3),
(40, 'US-2710173', 'sam', 'P', '567', '567', '1996-08-08', 'sam', 'sam', 'bg2.JPG', 1),
(51, 'US-0412177', 'sar', 'P', 'sar', '234', '2017-07-11', 'sar', 'sar', 'kucing.jpg', 1),
(52, 'US-2612176', 'asmanah', 'P', 'asmanah', '3', '2017-07-11', 'as', '', 'bg.jpg', 1),
(54, 'US-3312179', 'salma nur halisa', '3', 'ama', '23', '2017-07-03', 'ama', '81d25b1666751432378de84250437bff', 'bg.jpg', 3),
(55, 'US-4512172', 'absensi', '4', 'Bandung', '088765544', '1993-07-04', 'absensi', '986bf02c97e4738cff389ec0b3d784bc', 'uup.jpg', 4),
(58, 'US-3814171', 'sartika', 'L', 'sartika', '2345', '2007-07-03', 'sartikap', 'cc2192137dcd1592d6f8d45eb5fb5e70', 'kucing.jpg', 2),
(59, 'US-3417177', 'upah', 'P', 'sukabumi', '0896766544', '1996-07-17', 'upah', '57b0ebec657ec568bc4ab09cdb4f4096', '', 1),
(63, 'US-2318172', 'admin', 'L', 'bandung', '08987876', '1996-07-11', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'sunset.jpg', 3),
(64, 'US-5418171', 'Kasir', 'P', 'bandung', '089876588', '1998-07-18', 'kasir', 'c7911af3adbd12a035b289556d96470a', '', 1),
(65, 'US-0118174', 'aas', 'P', 'kiaracondong', '083829940799', '1996-01-08', 'dokter', 'd22af4180eee4bd95072', 'chibi-muslim-lucu.jpg', 2),
(66, 'US-5718171', 'romi rosmawati', '1', 'kiaracondong', '0898887677', '1994-07-10', 'omi', 'a1e74e713ea360c66f5d04aa9e0df20d', 'original.png', 1),
(67, 'US-5218179', 'tika', 'P', 'bandung', '08987676', '1997-07-03', 'suster', '4b225a628fd71a7c996f', 'TELEKOMUNIKAS.jpg', 2),
(68, 'US-5218174', 'dede', 'P', 'dede', '7890', '2017-07-01', 'dede', 'b4be1c568a6dc02dcaf2', '3.jpg', 2),
(69, 'US-5518177', 'wawan', 'P', 'tangerang', '1234', '1996-07-05', 'wawan', '0a000f688d85de79e3761dec6816b2a5', '3.jpg', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
