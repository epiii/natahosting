-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 27, 2013 at 04:50 AM
-- Server version: 5.1.41
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `k3nata`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_aspekpenyebab`
--

CREATE TABLE IF NOT EXISTS `tb_aspekpenyebab` (
  `id_aspekpenyebab` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aspekpenyebab` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `id_katinvestigasi` int(11) NOT NULL,
  PRIMARY KEY (`id_aspekpenyebab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_aspekpenyebab`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_bagian`
--

CREATE TABLE IF NOT EXISTS `tb_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `tb_bagian`
--

INSERT INTO `tb_bagian` (`id_bagian`, `nama_bagian`, `keterangan`) VALUES
(1, 'personalia', ''),
(2, 'staf personalia DPB', ''),
(3, 'staf personalia tuga', ''),
(4, 'staf personalia', ''),
(5, 'administrasi SDM', ''),
(6, 'staf hubungan indust', ''),
(7, 'pengembangan SDM', ''),
(8, 'administrasi SDM', ''),
(9, 'akutansi umum', ''),
(10, 'akutansi biaya', ''),
(11, 'anlap manajemen', ''),
(12, 'evaluasi pencapaian ', ''),
(13, 'akutansi biaya', ''),
(14, 'akutansi', ''),
(15, 'anggaran', ''),
(16, 'penyusunan anggaran', ''),
(17, 'pengawasan anggaran', ''),
(18, 'pengendalian operasi', ''),
(19, 'penyusunan anggaran', ''),
(20, 'pengawasan anggaran', ''),
(21, 'audit administrasi', ''),
(22, 'audit operasional', ''),
(23, 'distribusi wilayah I', ''),
(24, 'distribusi wilayah b', ''),
(25, 'distribusi wilayah t', ''),
(26, 'distribusi wilayah I', ''),
(27, 'gudang gresik', ''),
(28, 'transportasi & pergu', ''),
(29, 'administrasi distrib', ''),
(30, 'hubungan masyarakat', ''),
(31, 'informasi & komunika', ''),
(32, 'protokol', ''),
(33, 'hubungan masyarakat', ''),
(34, 'hukum & sekretariat', ''),
(35, 'sekretariat', ''),
(36, 'perijinan, adm.perta', ''),
(37, 'p-janjian/kontrak, n', ''),
(38, 'sekretariat', ''),
(39, 'inspeksi teknik', ''),
(40, 'inspeksi teknik pabr', ''),
(41, 'inspeksi teknik pabr', ''),
(42, 'inspeksi teknik pabr', ''),
(43, 'inspeksi teknik pabr', ''),
(44, 'inspeksi teknik khus', ''),
(45, 'inspeksi teknik koro', ''),
(46, 'jasa teknik & konstr', ''),
(47, 'perancanaan & pengen', ''),
(48, 'pengawasan proyek', ''),
(49, 'pemasaran jasa tekni', ''),
(50, 'jasa teknik & konstr', ''),
(51, 'jasa teknik & konstr', ''),
(52, 'pengembangan jasteko', ''),
(53, 'staf jasa teknik & k', ''),
(54, 'perancangan & pengen', ''),
(55, 'kemitraan & bina lin', ''),
(56, 'operasional KBL', ''),
(57, 'adm & keuangan KBL', ''),
(58, 'keuangan', ''),
(59, 'pembendaharaan', ''),
(60, 'pajak & asuransi', ''),
(61, 'lingkungan & k3', ''),
(62, 'staff lingkungan', 'bagian pengurusan lingkungan '),
(75, '=lainnya=', 'tidak ada dalam daftar'),
(76, 'tesg', 'g');

-- --------------------------------------------------------

--
-- Table structure for table `tb_bagtubuh`
--

CREATE TABLE IF NOT EXISTS `tb_bagtubuh` (
  `id_bagtubuh` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagtubuh` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_bagtubuh`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_bagtubuh`
--

INSERT INTO `tb_bagtubuh` (`id_bagtubuh`, `nama_bagtubuh`, `keterangan`) VALUES
(1, 'back', 'punggung'),
(2, 'head', 'kepala'),
(3, 'hip', 'pinggul'),
(4, 'upper leg', 'kaki atas');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cidera`
--

CREATE TABLE IF NOT EXISTS `tb_cidera` (
  `id_cidera` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagtubuh` int(11) NOT NULL,
  `id_jcidera` int(11) NOT NULL,
  `kanan` int(11) NOT NULL,
  `kiri` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_cidera`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_cidera`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_department`
--

CREATE TABLE IF NOT EXISTS `tb_department` (
  `id_department` int(11) NOT NULL AUTO_INCREMENT,
  `nama_department` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=76 ;

--
-- Dumping data for table `tb_department`
--

INSERT INTO `tb_department` (`id_department`, `nama_department`, `keterangan`) VALUES
(1, 'dewan komesaris & st', ''),
(2, 'personalia', ''),
(3, 'akutansi', ''),
(4, 'anggran', ''),
(5, 'audit administrasi', ''),
(6, 'audit operasional', ''),
(7, 'distribusi wilayah I', ''),
(8, 'distribusi wilayah I', ''),
(9, 'hubungan masyarakat', ''),
(10, 'hukum & sekretariat', ''),
(11, 'inspeksi teknik', ''),
(12, 'jasa teknik & konstr', ''),
(13, 'kemitraan & bina lin', ''),
(14, 'keuangan', ''),
(15, 'lingkungan & k3', ''),
(16, 'manajemen resiko', ''),
(17, 'organisasi & prosedu', ''),
(18, 'pelayanan & komunika', ''),
(19, 'pelayanan umum', ''),
(20, 'pendidikan & pelatih', ''),
(21, 'pengadaan', ''),
(22, 'pengelolaan anak per', ''),
(23, 'pengelolaan pelabuha', ''),
(24, 'pengembangan usaha', ''),
(25, 'penj.produk non pupu', ''),
(26, 'pupuk retail wilayah', ''),
(27, 'penjualan pupuk korp', ''),
(28, 'pupuk retail wilayah', ''),
(29, 'perencanaan & adm.pe', ''),
(30, 'perencanaan & gudang', ''),
(31, 'perwakilan jakarta', ''),
(32, 'proses & pengelolaan', ''),
(33, 'rancang bangun', ''),
(34, 'riset pemuliaan & p.', ''),
(35, 'riset pupuk & produk', ''),
(36, 'teknologi & informas', ''),
(37, 'direktorat produksi', ''),
(38, 'direktorat SDM & umu', ''),
(39, 'direktorat teknik & ', ''),
(40, 'direktorat utama', ''),
(41, 'dit.komersil', ''),
(42, 'dp.distribusi wilyah', ''),
(43, 'dp.keamanan', ''),
(44, 'dp.pemeliharaan I', ''),
(45, 'dp.pemeliharan II', ''),
(46, 'dp.pemeliharaan III', ''),
(47, 'dp.peralatan & perme', ''),
(48, 'dp. prasarana pabrik', ''),
(49, 'dp. produksi II A', ''),
(50, 'dp. produksi II B', ''),
(51, 'dp. produksi I', ''),
(52, 'produksi III', ''),
(53, 'dpb. anak perusahaan', ''),
(54, 'k3pg', ''),
(55, 'komp rendal usaha', ''),
(56, 'komp administrasi ke', ''),
(57, 'komp audit intern', ''),
(58, 'komp pemasaran', ''),
(59, 'komp penjualan wilay', ''),
(60, 'komp wilayah II', ''),
(61, 'komp riset', ''),
(62, 'komp engineering', ''),
(63, 'komp pabrik I', ''),
(64, 'komp pabrik II', ''),
(65, 'komp pabrik III', ''),
(66, 'komp pengadaan', ''),
(67, 'komp pengembangan', 'department komponen  pengembangan'),
(68, 'komp pengembangan suara', 'department komponen  pengembangan suara'),
(69, 'komp teknologi', 'department komputer dan  teknologi'),
(70, 'proyek', 'department proyek'),
(71, 'yayasan petrokimia gresik', 'yayasan petrokimia gresik '),
(75, '=lainnya=', 'tidak ada dalam daftar');

-- --------------------------------------------------------

--
-- Table structure for table `tb_emisi`
--

CREATE TABLE IF NOT EXISTS `tb_emisi` (
  `id_emisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_samplingemisi` int(11) NOT NULL,
  `kadar` float NOT NULL,
  `bulan` int(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `author` enum('internal','eksternal') NOT NULL,
  `pabrik` enum('I','II A','II B','III') NOT NULL,
  PRIMARY KEY (`id_emisi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `tb_emisi`
--

INSERT INTO `tb_emisi` (`id_emisi`, `id_samplingemisi`, `kadar`, `bulan`, `tahun`, `tanggal`, `author`, `pabrik`) VALUES
(1, 1, 3.03, 3, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(2, 1, 41.94, 7, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(3, 1, 20.2, 11, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(4, 2, 2.49, 7, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(5, 2, 72.8, 11, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(6, 8, 180, 3, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(7, 9, 214, 7, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(8, 8, 2.5, 11, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(9, 9, 4.3, 3, 2012, '0000-00-00 00:00:00', 'internal', 'I'),
(10, 2, 99999, 11, 2007, '2013-06-24 08:03:59', 'internal', 'I'),
(11, 3, 212, 11, 2007, '2013-06-24 08:30:07', 'internal', 'I'),
(12, 9, 212, 11, 2007, '2013-06-24 08:31:11', 'internal', 'I'),
(14, 3, 6.91, 7, 2012, '2013-07-08 12:30:41', 'internal', 'I'),
(15, 10, 2.41, 3, 2012, '2013-07-08 12:35:43', 'internal', 'I'),
(16, 5, 1218, 3, 2012, '2013-07-08 12:37:18', 'internal', 'I'),
(17, 6, 2.41, 3, 2012, '2013-07-08 12:38:16', 'internal', 'I'),
(18, 7, 180, 3, 2012, '2013-07-08 12:38:40', 'internal', 'I'),
(19, 12, 2.9, 3, 2012, '2013-07-08 12:40:10', 'internal', 'I'),
(20, 13, 0.82, 3, 2012, '2013-07-08 12:40:29', 'internal', 'I'),
(21, 11, 41.5, 3, 2012, '2013-07-08 12:41:07', 'internal', 'I'),
(22, 4, 7.34, 7, 2012, '2013-07-08 12:42:25', 'internal', 'I'),
(23, 12, 17.7, 7, 2012, '2013-07-08 12:42:52', 'internal', 'I'),
(24, 11, 210, 7, 2012, '2013-07-08 12:43:08', 'internal', 'I'),
(25, 14, 43.1, 7, 2012, '2013-07-08 12:43:30', 'internal', 'I'),
(26, 15, 27.46, 7, 2012, '2013-07-08 12:43:44', 'internal', 'I'),
(27, 7, 214, 7, 2012, '2013-07-08 12:44:24', 'internal', 'I'),
(28, 3, 2.9, 11, 2012, '2013-07-08 12:45:07', 'internal', 'I'),
(29, 4, 1.9, 11, 2012, '2013-07-08 12:45:23', 'internal', 'I'),
(30, 12, 267, 11, 2012, '2013-07-08 12:45:55', 'internal', 'I'),
(31, 11, 58.4, 11, 2012, '2013-07-08 12:46:30', 'internal', 'I'),
(32, 7, 2.5, 11, 2012, '2013-07-08 12:48:10', 'internal', 'I'),
(33, 9, 0.5, 11, 2012, '2013-07-08 12:48:26', 'internal', 'I'),
(34, 15, 606, 11, 2012, '2013-07-08 12:49:48', 'internal', 'I'),
(35, 14, 209, 11, 2012, '2013-07-08 12:50:03', 'internal', 'I'),
(39, 2, 456, 3, 2003, '2013-07-19 02:39:47', 'internal', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `tb_foto`
--

CREATE TABLE IF NOT EXISTS `tb_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_foto`
--

INSERT INTO `tb_foto` (`id_foto`, `path`, `keterangan`, `id_kecelakaan`) VALUES
(1, 'img/data/foto1.jpg', 'denah kejadian', 4),
(2, 'img/data/foto2.jpg', 'foto depan mobil', 4),
(3, 'img/data/foto3.jpg', 'foto mobil samping', 4),
(4, 'img/data/foto4.jpg', 'foto korban ', 4),
(5, 'img/data/foto1.jpg', 'foto kecelakaan', 4),
(14, '', '', 0),
(13, '', '', 0),
(12, '', '', 0),
(11, 'Chrysanthemum.jpg', '', 0),
(15, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_gas`
--

CREATE TABLE IF NOT EXISTS `tb_gas` (
  `id_gas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_gas`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_gas`
--

INSERT INTO `tb_gas` (`id_gas`, `nama_gas`) VALUES
(1, 'SO2'),
(2, 'NO2'),
(3, 'NH3'),
(4, 'fluor'),
(5, 'partikulat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_hakakses`
--

CREATE TABLE IF NOT EXISTS `tb_hakakses` (
  `id_hakakses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_hakakses`),
  KEY `id_menu` (`id_menu`),
  KEY `id_level` (`id_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_hakakses`
--

INSERT INTO `tb_hakakses` (`id_hakakses`, `id_menu`, `id_level`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 1, 2),
(4, 11, 2),
(5, 1, 1),
(6, 5, 1),
(7, 12, 1),
(8, 28, 1),
(9, 14, 1),
(10, 5, 1),
(11, 12, 1),
(12, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_investigasi`
--

CREATE TABLE IF NOT EXISTS `tb_investigasi` (
  `id_investigasi` int(11) NOT NULL AUTO_INCREMENT,
  `hasil_investigasi` text NOT NULL,
  `id_katinvestigasi` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_investigasi`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_katinvestigasi` (`id_katinvestigasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `tb_investigasi`
--

INSERT INTO `tb_investigasi` (`id_investigasi`, `hasil_investigasi`, `id_katinvestigasi`, `id_kecelakaan`, `status`) VALUES
(33, 'ghg', 1, 5, 0),
(35, 'hg', 1, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE IF NOT EXISTS `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`, `keterangan`) VALUES
(1, 'Kepala HRD', 'kepala Human Resource Department'),
(2, 'GM Produksi', 'general manager Produksi'),
(8, 'GM LK3', 'general manager LK3 '),
(9, 'Staff gudang', 'karyawan staff gudang'),
(10, 'Pengawas Lapangan', 'pengawas produksi'),
(11, '=lainnya=', 'tidak ada dalam daftar'),
(12, 'bongkar muat pupuk', 'bongkar muat pupuk'),
(13, 'driver dump truck', 'driver dump truck'),
(14, 'baru', 'sekali'),
(15, 'y', 'y');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jcidera`
--

CREATE TABLE IF NOT EXISTS `tb_jcidera` (
  `id_jcidera` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jcidera` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jcidera`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `tb_jcidera`
--

INSERT INTO `tb_jcidera` (`id_jcidera`, `nama_jcidera`, `keterangan`) VALUES
(1, 'abrasions ', 'abrasi'),
(2, 'amputation', 'amputasi'),
(3, 'asphyxia', 'sesak nafas'),
(4, 'bruising', 'memar'),
(5, 'burns', 'luka bakar'),
(6, 'crush', 'remuk'),
(7, 'dislocation', 'dislokasi'),
(8, 'effects of chemicals', 'efek bahan kimia'),
(9, 'effects of exposure', 'efek paparan'),
(10, 'electric shock', 'tersengat arus listrik'),
(11, 'fracture', 'patah tulang'),
(12, 'foreign body', 'benda asing'),
(13, 'heat stress', 'stres panas'),
(14, 'illness', 'kesakitan'),
(15, 'internal injury', 'luka dalam'),
(17, 'loss of consciousnes', 'hilang kesadaran/pingsan'),
(18, 'nausea', 'mual'),
(19, 'puncture wound', 'luka tusuk'),
(20, 'open wound', 'luka terbuka'),
(21, 'sprain', 'keseleo'),
(22, 'strain', 'tegang otot'),
(23, 'others', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jkecel`
--

CREATE TABLE IF NOT EXISTS `tb_jkecel` (
  `id_jkecel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jkecel` varchar(50) NOT NULL,
  `ket_jkecel` text NOT NULL,
  PRIMARY KEY (`id_jkecel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_jkecel`
--

INSERT INTO `tb_jkecel` (`id_jkecel`, `nama_jkecel`, `ket_jkecel`) VALUES
(1, 'pekerja', 'kecelakaan yang berhubungan dengna pekerja'),
(2, 'lainnya', 'kecelakaan yang berhubungan dengan selain pekerja');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jkecelx`
--

CREATE TABLE IF NOT EXISTS `tb_jkecelx` (
  `id_jkecel` int(11) NOT NULL AUTO_INCREMENT,
  `jeniskecel` varchar(20) NOT NULL,
  `sub_jeniskecel` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jkecel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_jkecelx`
--

INSERT INTO `tb_jkecelx` (`id_jkecel`, `jeniskecel`, `sub_jeniskecel`, `keterangan`) VALUES
(1, 'kecelakaan kerja', 'LTI', 'kerusakan equipment'),
(2, 'kecelakaan kerja', 'LTI', 'kerusakan properti perusahaan'),
(3, 'kecelakaan kerja', 'LTI', 'kerusakan lingkungan '),
(5, 'kecelakaan kerja', 'LTI', 'gangguan produksi'),
(7, 'kecelakaan kerja', 'LTI', 'dampak pada masyarakat'),
(8, 'kecelakaan kerja', 'LTI', 'gangguan pada keamanan'),
(9, 'kecelakaan kerja', 'LTI', 'lain - lain'),
(10, 'kecelakaan kerja', 'RWI', 'kerusakan lingkungan '),
(12, 'kecelakaan kerja', 'RWI', 'gangguan produksi'),
(13, 'kecelakaan kerja', 'RWI', 'dampak pada masyarakat'),
(14, 'kecelakaan kerja', 'RWI', 'gangguan pada keamanan'),
(15, 'kecelakaan kerja', 'RWI', 'lain - lain'),
(16, 'kecelakaan kerja', 'MTI', 'kerusakan lingkungan '),
(18, 'kecelakaan kerja', 'MTI', 'gangguan produksi'),
(19, 'kecelakaan kerja', 'MTI', 'dampak pada masyarakat'),
(20, 'kecelakaan kerja', 'MTI', 'gangguan pada keamanan'),
(21, 'kecelakaan kerja', 'MTI', 'lain - lain'),
(22, 'kecelakaan kerja', 'FAI', 'kerusakan lingkungan '),
(24, 'kecelakaan kerja', 'FAI', 'gangguan produksi'),
(25, 'kecelakaan kerja', 'FAI', 'dampak pada masyarakat'),
(26, 'kecelakaan kerja', 'FAI', 'gangguan pada keamanan'),
(27, 'kecelakaan kerja', 'FAI', 'lain - lain'),
(28, 'penyakit akibat', '', ''),
(29, 'bukan kecelakaan', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jlampiran`
--

CREATE TABLE IF NOT EXISTS `tb_jlampiran` (
  `id_jlampiran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jlampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jlampiran`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_jlampiran`
--

INSERT INTO `tb_jlampiran` (`id_jlampiran`, `nama_jlampiran`) VALUES
(1, 'instruksi kerja / ijin kerja '),
(2, 'pernyataan saksi'),
(3, 'sketsa / gambar'),
(4, 'foto - foto'),
(5, 'catatan training'),
(6, 'catatan perbaikan'),
(7, 'prosedur / instruksi kerja'),
(8, 'surat ijin / keterangan'),
(9, 'catatan pemberitahuan pihak berwenang ');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kajiulang`
--

CREATE TABLE IF NOT EXISTS `tb_kajiulang` (
  `nm_kabagk3` varchar(50) NOT NULL,
  `nm_kadeplk3` varchar(50) NOT NULL,
  `nm_kakomp` varchar(50) NOT NULL,
  `nm_dproduksi` varchar(50) NOT NULL,
  `tgl_kabagk3` varchar(50) NOT NULL,
  `tgl_kadeplk3` varchar(50) NOT NULL,
  `tgl_kakomp` varchar(50) NOT NULL,
  `tgl_dproduksi` varchar(50) NOT NULL,
  `kom_kabagk3` varchar(50) NOT NULL,
  `kom_kadeplk3` varchar(50) NOT NULL,
  `kom_kakomp` varchar(50) NOT NULL,
  `kom_dproduksi` varchar(50) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_kecelakaan_2` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kajiulang`
--

INSERT INTO `tb_kajiulang` (`nm_kabagk3`, `nm_kadeplk3`, `nm_kakomp`, `nm_dproduksi`, `tgl_kabagk3`, `tgl_kadeplk3`, `tgl_kakomp`, `tgl_dproduksi`, `kom_kabagk3`, `kom_kadeplk3`, `kom_kakomp`, `kom_dproduksi`, `id_kecelakaan`) VALUES
('1', '1', '', '', '1', '1', '', '', '1', '1', '', '', 5),
('', '', '', '', '', '', '', '', '', '', '', '', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_katinvestigasi`
--

CREATE TABLE IF NOT EXISTS `tb_katinvestigasi` (
  `id_katinvestigasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katinvestigasi` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_katinvestigasi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_katinvestigasi`
--

INSERT INTO `tb_katinvestigasi` (`id_katinvestigasi`, `nama_katinvestigasi`, `keterangan`) VALUES
(1, 'people', 'faktor manusia'),
(2, 'equipment', 'faktor peralatan'),
(3, 'environtment', 'faktor lingkungan'),
(4, 'procedure', 'faktor prosedur'),
(5, 'organization', 'faktor organisasi');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecelakaan`
--

CREATE TABLE IF NOT EXISTS `tb_kecelakaan` (
  `id_kecelakaan` int(11) NOT NULL AUTO_INCREMENT,
  `no_ref` varchar(30) NOT NULL,
  `id_subjkecel` int(11) DEFAULT NULL,
  `id_subjkecel2` int(11) DEFAULT NULL,
  `tgl_kejadian` date NOT NULL,
  `tgl_lapor` date NOT NULL,
  `judul_kejadian` text NOT NULL,
  `tempat` text NOT NULL,
  `jam_kejadian` varchar(50) NOT NULL,
  `jam_lapor` varchar(50) NOT NULL,
  `pelapor` varchar(100) NOT NULL,
  `laporke` varchar(100) NOT NULL,
  `uraian` text NOT NULL,
  `kerugian` text NOT NULL,
  `nama_pjlokasi` varchar(50) NOT NULL,
  `saksi1` varchar(50) NOT NULL,
  `saksi2` varchar(50) NOT NULL,
  `jabatan_saksi1` varchar(50) NOT NULL,
  `jabatan_saksi2` varchar(50) NOT NULL,
  `kontak_saksi1` varchar(50) NOT NULL,
  `kontak_saksi2` varchar(50) NOT NULL,
  `ketua_timinv` varchar(50) NOT NULL,
  `tglmulai_timinv` varchar(50) NOT NULL,
  `tglakhir_timinv` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  `jabatan_pjlokasi` varchar(50) NOT NULL,
  `kontak_pjlokasi` varchar(50) NOT NULL,
  `jabatan_pelapor` varchar(50) NOT NULL,
  `jabatan_laporke` varchar(50) NOT NULL,
  PRIMARY KEY (`id_kecelakaan`),
  KEY `id_subjkecel` (`id_subjkecel`),
  KEY `id_subjkecel2` (`id_subjkecel2`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tb_kecelakaan`
--

INSERT INTO `tb_kecelakaan` (`id_kecelakaan`, `no_ref`, `id_subjkecel`, `id_subjkecel2`, `tgl_kejadian`, `tgl_lapor`, `judul_kejadian`, `tempat`, `jam_kejadian`, `jam_lapor`, `pelapor`, `laporke`, `uraian`, `kerugian`, `nama_pjlokasi`, `saksi1`, `saksi2`, `jabatan_saksi1`, `jabatan_saksi2`, `kontak_saksi1`, `kontak_saksi2`, `ketua_timinv`, `tglmulai_timinv`, `tglakhir_timinv`, `status`, `jabatan_pjlokasi`, `kontak_pjlokasi`, `jabatan_pelapor`, `jabatan_laporke`) VALUES
(1, 'KK-PKG 23.10.2012', NULL, NULL, '2012-10-23', '2012-10-23', 'pengemudi minibus menabrak pohon  di jalan pabrik I', 'jalan Tri Dharma - Timur Gerbang Bagian Transport', '16.50', '17.00', 'Muhammad Ya', 'Bagian K3', 'Pada hari Senin sekitar pukul 16.50, MY mengedarai Dumptruck dari arah pelabuhan menuju  400 untuk memarkir dumptruck dan bersiap untuk pulang . pada saat akan menikung , MY mendengar suara tabrakan dan memutuskan untuk menikung  pada tikungan yang kedua , tetapi tabrakan tidak dapat terhindarkan sehingga menyebabkan motor AAB terlindas ban depan dumptruck dan AAB terhampar ke samping jalan', 'cidera pada Bapak AAB masih dalam perawatan RS. Dr. Soetomo untuk dilakukan pemneriksaan lebih lanjut (mekanisme kejadian masih dalam investigasi)', '', '', '', '', '', '', '', '4', '4', '4', 0, '', '', '', ''),
(3, 'KK-PKG 19.12.2012', 4, NULL, '2012-12-13', '2012-12-13', 'Belt conveyor M0706A putus terbakar', 'pabrik III - UBB (Utaqra Barak Operator)', '(approx.)10.30-12.15', '12.30', 'hartyanto', 'bagian PMK', 'pada hari kamis tanggal 13 desember 2012 pukul 09.00 dilakukan pengelasan oleh pihak reakanan PT. Putra Baru Sentosa (PBS) pada bagian chute Inlet Conveyor sampai pukul 10.30\r\nsekitar pukul 12.15 pada saat operator akan menjalankan conveyor , terlihat asap di belt conveyor  M0706A putus', 'belt conveyor', '', '', '', '', '', '', '', 'hkjhjk', '', '', 0, '', '', '', ''),
(4, 'KK-PKG-001 22.10.2012', 1, 3, '2012-10-22', '2012-10-22', 'pengendara sepeda motor tertabrak dumptruck', 'jalan Pabrik II - Pelabuhan (tikungan menuju 400 - Gudang KCi)', '16.50', '17.00', 'Muhammad Yasin', 'Bagian K3', 'Pada hari Senin sekitar pukul 16.50, MY mengedarai Dumptruck dari arah pelabuhan menuju  400 untuk memarkir dumptruck dan bersiap untuk pulang . pada saat akan menikung , MY mendengar suara tabrakan dan memutuskan untuk menikung  pada tikungan yang kedua , tetapi tabrakan tidak dapat terhindarkan sehingga menyebabkan motor AAB terlindas ban depan dumptruck dan AAB terhampar ke samping jalan', 'cidera pada Bapak AAB masih dalam perawatan RS. Dr. Soetomo untuk dilakukan pemneriksaan lebih lanjut (mekanisme kejadian masih dalam investigasi)', '-', '-', '-', '-', '-', '-', '-', '4', '4', '4', 0, '-', '-', '-', '-'),
(5, '9', 1, 1, '0000-00-00', '0000-00-00', '9', '9', '9', '9', '9', '9', '9', '9', '99', '9', '9', '9', '9', '9', '9', '1', '1', '1', 0, '', '', '9', '9');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakanalat`
--

CREATE TABLE IF NOT EXISTS `tb_kerusakanalat` (
  `id_kerusakanalat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya` enum('1','2','3','4','5') NOT NULL,
  `mekanisme` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_kerusakanalat`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_kerusakanalat`
--

INSERT INTO `tb_kerusakanalat` (`id_kerusakanalat`, `nama_alat`, `deskripsi`, `biaya`, `mekanisme`, `id_kecelakaan`) VALUES
(1, 'fork lift', 'cat mengelupas karena bergesekan dengan tangan pegawai', '1', 'digores dengan sengaja oleh salah satu operator fork lift sehingga beret beret ', 4),
(2, '9', '9', '1', '9', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kerusakanling`
--

CREATE TABLE IF NOT EXISTS `tb_kerusakanling` (
  `id_kerusakanling` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecelakaan` int(11) NOT NULL,
  `id_tipedampak` enum('water-ground','water-surface','land-undisturbed','land-rehabilited','land-general','culture','heritage','air-quality','fauna','community','others') NOT NULL,
  `agen_pencemar` varchar(25) NOT NULL,
  `volume` int(11) NOT NULL,
  `area_terpapar` int(11) NOT NULL,
  `durasi_terpapar` int(11) NOT NULL,
  `durasi_dampak_papar` int(11) NOT NULL,
  `komen_tambahan` text NOT NULL,
  PRIMARY KEY (`id_kerusakanling`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_kecelakaan_2` (`id_kecelakaan`),
  KEY `id_kecelakaan_3` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_kerusakanling`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_lampiran`
--

CREATE TABLE IF NOT EXISTS `tb_lampiran` (
  `id_lampiran` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecelakaan` int(11) NOT NULL,
  `jsa` int(11) NOT NULL,
  `saksi` int(11) NOT NULL,
  `sketsa` int(11) NOT NULL,
  `foto` int(11) NOT NULL,
  `training` int(11) NOT NULL,
  `perbaikan` int(11) NOT NULL,
  `prosedur` int(11) NOT NULL,
  `keterampilan` int(11) NOT NULL,
  `pemberitahuan` int(11) NOT NULL,
  PRIMARY KEY (`id_lampiran`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_lampiran`
--

INSERT INTO `tb_lampiran` (`id_lampiran`, `id_kecelakaan`, `jsa`, `saksi`, `sketsa`, `foto`, `training`, `perbaikan`, `prosedur`, `keterampilan`, `pemberitahuan`) VALUES
(1, 5, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 4, 1, 1, 1, 1, 1, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_laporan`
--

CREATE TABLE IF NOT EXISTS `tb_laporan` (
  `id_kecelakaan` int(11) NOT NULL,
  `nm_korban` varchar(50) NOT NULL,
  `kom_korban` text NOT NULL,
  `tgl_korban` varchar(50) NOT NULL,
  `nm_atasan` varchar(50) NOT NULL,
  `kom_atasan` text NOT NULL,
  `tgl_atasan` varchar(50) NOT NULL,
  `nm_pjlokasi` varchar(50) NOT NULL,
  `kom_pjlokasi` text NOT NULL,
  `tgl_pjlokasi` varchar(50) NOT NULL,
  `nm_LK3` varchar(50) NOT NULL,
  `kom_LK3` text NOT NULL,
  `tgl_LK3` varchar(50) NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_kecelakaan_2` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_laporan`
--

INSERT INTO `tb_laporan` (`id_kecelakaan`, `nm_korban`, `kom_korban`, `tgl_korban`, `nm_atasan`, `kom_atasan`, `tgl_atasan`, `nm_pjlokasi`, `kom_pjlokasi`, `tgl_pjlokasi`, `nm_LK3`, `kom_LK3`, `tgl_LK3`) VALUES
(4, 'yuhu', 'waduh males ane jelasin panjang lebar pokoknya semoga cepat sembuh aja aja ', '2012-12-01', 'atasan ku', 'seng sregep kerjo ae yo rek masio onok kendala karo kecelkaaan kerjo semangat', '2012-12-01', 'nama pj lokasi', 'komentar pj lokasi', '2012-12-01', 'nama LK3', 'kometnar komentar LK', '2012-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `tb_level`
--

CREATE TABLE IF NOT EXISTS `tb_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_level`
--

INSERT INTO `tb_level` (`id_level`, `nama_level`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tb_menu`
--

CREATE TABLE IF NOT EXISTS `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `sub` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `tb_menu`
--

INSERT INTO `tb_menu` (`id_menu`, `nama_menu`, `link`, `sub`) VALUES
(1, 'home', '', 0),
(2, 'profil', '', 0),
(3, 'data master', '', 0),
(4, 'pekerja', 'x', 3),
(5, 'bagian', '', 0),
(6, 'jabatan', '', 0),
(7, 'department', '', 0),
(8, 'shift kerja', '', 0),
(9, 'status kerja', '', 0),
(10, 'jenis kecelakaan', '', 0),
(11, 'jenis cidera', '', 0),
(12, 'bagian tubuh', '', 0),
(13, 'tipe dampak ', '', 0),
(14, 'jenis produk', '', 0),
(15, 'jenis gas', 'mgas', 3),
(16, 'sample tempat', '', 0),
(17, 'sample emisi', '', 0),
(18, 'transaksi', '', 0),
(19, 'kecelakaan', '', 0),
(20, 'emisi', '', 0),
(21, 'safety performance', '', 0),
(22, 'laporan', '', 0),
(23, 'lap kecelakaan', '', 0),
(24, 'lap emisi', '', 0),
(25, 'lap safety performance', '', 0),
(26, 'setting', '', 0),
(27, 'menu', '', 0),
(28, 'level', 'mlevel', 26),
(29, 'hak akses', 'shakakses', 26),
(30, 'user', 'suser', 26),
(31, 'logout', '', 0),
(32, 'admin', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_orgterlibat`
--

CREATE TABLE IF NOT EXISTS `tb_orgterlibat` (
  `id_kecelakaan` int(11) NOT NULL,
  `aktivitas` text NOT NULL,
  `nama_orgterlibat` varchar(50) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `nama_shiftkerja` varchar(50) NOT NULL,
  `nama_bagian` varchar(50) NOT NULL,
  `nama_department` varchar(50) NOT NULL,
  `tgllahir` varchar(50) NOT NULL,
  `jkelamin` varchar(50) NOT NULL,
  `id_orgterlibat` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(10) NOT NULL,
  `nama_statuskerja` varchar(50) NOT NULL,
  PRIMARY KEY (`id_orgterlibat`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_orgterlibat`
--

INSERT INTO `tb_orgterlibat` (`id_kecelakaan`, `aktivitas`, `nama_orgterlibat`, `nama_jabatan`, `nama_shiftkerja`, `nama_bagian`, `nama_department`, `tgllahir`, `jkelamin`, `id_orgterlibat`, `NIK`, `nama_statuskerja`) VALUES
(4, 'pengangkutan pupuk curah dari pelabuhan menuju 400', 'Muhammad Yasin', 'driver dump truck', 'siang', '-', '-', '30 tahun', 'L', 1, '-', 'lain - lain'),
(4, 'pulang kerja dari pelabuhan menuju gerbang pabrik II', 'andri ahmad bachtiar', 'bongkar muat pupuk ', 'siang', '-', '-', '-', 'L', 2, '-', '-');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerja`
--

CREATE TABLE IF NOT EXISTS `tb_pekerja` (
  `id_pekerja` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(10) NOT NULL,
  `nama_pekerja` varchar(50) NOT NULL,
  `jkelamin` varchar(10) NOT NULL,
  `tgllahir` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(20) NOT NULL,
  `id_jabatan` int(11) DEFAULT NULL,
  `id_bagian` int(11) DEFAULT NULL,
  `id_department` int(11) DEFAULT NULL,
  `id_statuskerja` int(11) DEFAULT NULL,
  `id_shiftkerja` int(11) DEFAULT NULL,
  `tgl_masuk` date NOT NULL,
  `tgl_keluar` date NOT NULL,
  PRIMARY KEY (`id_pekerja`),
  KEY `id_shiftkerja` (`id_shiftkerja`),
  KEY `id_jabatan` (`id_jabatan`,`id_bagian`,`id_department`,`id_statuskerja`,`id_shiftkerja`),
  KEY `id_shiftkerja_2` (`id_shiftkerja`),
  KEY `id_bagian` (`id_bagian`),
  KEY `id_department` (`id_department`),
  KEY `id_statuskerja` (`id_statuskerja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tb_pekerja`
--

INSERT INTO `tb_pekerja` (`id_pekerja`, `NIK`, `nama_pekerja`, `jkelamin`, `tgllahir`, `alamat`, `kota`, `id_jabatan`, `id_bagian`, `id_department`, `id_statuskerja`, `id_shiftkerja`, `tgl_masuk`, `tgl_keluar`) VALUES
(1, 'T243173', 'Surasa Budi Laksana', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '2001-05-02', '2001-05-02'),
(2, 'T253297', 'Kartika Yudha Irianto', 'L', '', '', '', NULL, NULL, NULL, 3, NULL, '2013-05-10', '0000-00-00'),
(3, 'DK000018', 'Musthofa Ir', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(4, 'DK000020', 'Yulian Aldrin Pasha Drs., MA., Phd', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(5, 'DK000022', 'Taruna Dwidjaja Adi Drs., S.T., M.M', 'L', '', '', '', NULL, NULL, NULL, 2, NULL, '0000-00-00', '0000-00-00'),
(6, 'D201001', 'Hidayat Nyakman', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(7, 'T324683', 'Satriyo Nugroho, Ir. M.T', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(8, 'T242785', 'Moh.Syamsul Hudha, Drs.AK.,M.M', 'L', '', '', '', NULL, NULL, NULL, 2, NULL, '0000-00-00', '0000-00-00'),
(9, 'T221975', 'Yuharto', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(10, 'T242873', 'Mochammad Zubair', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(11, 'T284131', 'Sumedi', 'L', '', '', '', NULL, NULL, NULL, 3, NULL, '0000-00-00', '0000-00-00'),
(12, 'T515183', 'Honi Wahyu', 'L', '', '', '', NULL, NULL, NULL, 2, NULL, '0000-00-00', '0000-00-00'),
(13, 'T201220', 'Djuhari', 'L', '', '', '', NULL, NULL, NULL, 2, NULL, '0000-00-00', '0000-00-00'),
(14, 'T242369', 'Chirul Anam', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(15, 'T253406', 'Bambang Setyawan', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(16, 'T232259', 'Bambang Tri Mei P', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(17, 'T242607', 'Sugeng Hariadi', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(18, 'T354775', 'Sugiyarto', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(19, 'T232236', 'Mardijono', '', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(20, 'T242986', 'Budi Widodo', 'L', '', '', '', NULL, NULL, NULL, 1, NULL, '0000-00-00', '0000-00-00'),
(25, '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', 8, 61, 15, 1, 66, '2000-05-04', '0000-00-00'),
(26, 'io', 'ioio', 'L', '1', '1', '1', 12, 24, 41, 2, 65, '0000-00-00', '0000-00-00'),
(27, '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', 12, 26, 15, 2, 66, '2000-05-04', '0000-00-00'),
(28, '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', 12, 26, 15, 2, 64, '2000-05-04', '0000-00-00'),
(29, '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', 12, 26, 15, 2, 65, '2000-05-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemberitahuan`
--

CREATE TABLE IF NOT EXISTS `tb_pemberitahuan` (
  `instansi` text NOT NULL,
  `dilaporkanke` text NOT NULL,
  `komentar` text NOT NULL,
  `tgl` varchar(11) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemberitahuan`
--

INSERT INTO `tb_pemberitahuan` (`instansi`, `dilaporkanke`, `komentar`, `tgl`, `jam`, `id_kecelakaan`) VALUES
('PT ABC surabaya ', 'dirut PT ABC surabya', 'waduh parah men perusahaan lu petro ama gue ABC apa hubungannya ampek lu lapor2 sgala ke gue ', '2012-12-12', '15.00', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengkajiulang`
--

CREATE TABLE IF NOT EXISTS `tb_pengkajiulang` (
  `id_pengkajiulang` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengkajiulang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_pengkajiulang`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_penyebabdasar`
--

CREATE TABLE IF NOT EXISTS `tb_penyebabdasar` (
  `id_penyebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `id_subsebabdasar` int(11) NOT NULL,
  `penyebab` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_penyebabdasar`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_penyebabdasar`
--

INSERT INTO `tb_penyebabdasar` (`id_penyebabdasar`, `id_subsebabdasar`, `penyebab`, `id_kecelakaan`) VALUES
(1, 1, 'sjdfklsjd', 5),
(2, 2, 'hjkh', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_perawatan`
--

CREATE TABLE IF NOT EXISTS `tb_perawatan` (
  `id_perawatan` int(11) NOT NULL AUTO_INCREMENT,
  `pj_per` varchar(20) NOT NULL,
  `tgl_per` int(11) NOT NULL,
  `jam_per` varchar(20) NOT NULL,
  `tempat_per` varchar(30) NOT NULL,
  `contactper_per` varchar(20) NOT NULL,
  `contactno_per` varchar(20) NOT NULL,
  `hasil_per` enum('p1','p2','p3','p4','p5','p6') NOT NULL,
  `deskripsi_per` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_perawatan`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_kecelakaan_2` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_perawatan`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_perbaikan`
--

CREATE TABLE IF NOT EXISTS `tb_perbaikan` (
  `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_investigasi` int(11) NOT NULL,
  `tindakan` text NOT NULL,
  `nama_petugas` varchar(11) NOT NULL,
  `tgl_target` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_perbaikan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tb_perbaikan`
--

INSERT INTO `tb_perbaikan` (`id_perbaikan`, `id_investigasi`, `tindakan`, `nama_petugas`, `tgl_target`, `id_kecelakaan`) VALUES
(1, 9, 'mewajibkan setiap kontraktor yang tidak berada langsung dibawah PT. PKG tetapi melawati area kerja PT.PKG untukj mengikuti kegiatan Pengarahan K3 (safety induction)', 'T253297', '2012', 1),
(2, 17, 'memindahkan rambu rambu informasi kecepatan maksimal ke lokasi yang lebih mudah telihat ', '4', '2012', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE IF NOT EXISTS `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `nama_produk`) VALUES
(1, 'asam sulfat II'),
(2, 'ZA II'),
(3, 'PA'),
(4, 'CR'),
(5, 'AIF3');

-- --------------------------------------------------------

--
-- Table structure for table `tb_safetyp`
--

CREATE TABLE IF NOT EXISTS `tb_safetyp` (
  `id_safetyp` int(11) NOT NULL AUTO_INCREMENT,
  `jam_normal` int(11) NOT NULL,
  `jam_lembur` int(11) NOT NULL,
  `jam_absen` int(11) NOT NULL,
  `uac` int(11) NOT NULL,
  `near_miss` int(11) NOT NULL,
  `bulan` int(11) NOT NULL,
  `tahun` int(11) NOT NULL,
  `fatality` int(11) NOT NULL,
  `ldwc` int(11) NOT NULL,
  PRIMARY KEY (`id_safetyp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_safetyp`
--

INSERT INTO `tb_safetyp` (`id_safetyp`, `jam_normal`, `jam_lembur`, `jam_absen`, `uac`, `near_miss`, `bulan`, `tahun`, `fatality`, `ldwc`) VALUES
(1, 586392, 78186, 17264, 3, 20, 2, 2010, 2, 0),
(2, 602608, 62240, 20648, 0, 0, 3, 2012, 0, 0),
(3, 586464, 64224, 23720, 0, 0, 6, 2012, 0, 0),
(4, 613840, 60273, 34640, 0, 0, 5, 2012, 0, 0),
(5, 570000, 85355, 20655, 0, 0, 1, 2012, 0, 0),
(6, 577104, 69, 18608, 0, 0, 4, 2012, 0, 0),
(7, 608232, 59711, 24520, 0, 0, 7, 2012, 0, 0),
(8, 598344, 51658, 33232, 0, 0, 8, 2012, 0, 0),
(9, 571320, 66898, 15120, 0, 0, 9, 2012, 0, 0),
(10, 608512, 53408, 22216, 0, 0, 10, 2012, 0, 0),
(11, 582408, 51979, 40144, 0, 0, 11, 2012, 0, 0),
(12, 572704, 49954, 54360, 0, 0, 12, 2012, 0, 0),
(13, 2, 2, 2, 2, 2, 1, 1997, 2, 2),
(14, 88, 88, 88, 88, 88, 3, 2012, 88, 88),
(15, 1, 2, 3, 5, 6, 4, 2013, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tb_saksi`
--

CREATE TABLE IF NOT EXISTS `tb_saksi` (
  `id_saksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecelakaan` int(11) NOT NULL,
  `NIK` int(11) NOT NULL,
  PRIMARY KEY (`id_saksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_saksi`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_samplingemisi`
--

CREATE TABLE IF NOT EXISTS `tb_samplingemisi` (
  `id_samplingemisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_gas` int(11) NOT NULL,
  `id_tempatsampling` int(11) NOT NULL,
  `baku_mutu` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_samplingemisi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `tb_samplingemisi`
--

INSERT INTO `tb_samplingemisi` (`id_samplingemisi`, `id_gas`, `id_tempatsampling`, `baku_mutu`, `id_produk`) VALUES
(1, 1, 1, 1000, 1),
(2, 5, 2, 230, 1),
(3, 1, 2, 800, 1),
(4, 2, 2, 1000, 1),
(5, 5, 3, 230, 1),
(6, 1, 3, 800, 1),
(7, 3, 4, 250, 2),
(8, 5, 8, 250, 4),
(9, 3, 5, 250, 2),
(10, 2, 3, 1000, 1),
(11, 4, 6, 10, 3),
(12, 5, 7, 200, 1),
(13, 4, 8, 10, 4),
(14, 5, 9, 200, 5),
(15, 4, 9, 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `tb_sebabdasar`
--

CREATE TABLE IF NOT EXISTS `tb_sebabdasar` (
  `id_sebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sebabdasar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_sebabdasar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_sebabdasar`
--

INSERT INTO `tb_sebabdasar` (`id_sebabdasar`, `nm_sebabdasar`, `keterangan`) VALUES
(1, 'manusia', ''),
(2, 'peralatan', ''),
(3, 'sabotase', ''),
(4, 'lain', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_shiftkerja`
--

CREATE TABLE IF NOT EXISTS `tb_shiftkerja` (
  `id_shiftkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_shiftkerja` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_shiftkerja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=68 ;

--
-- Dumping data for table `tb_shiftkerja`
--

INSERT INTO `tb_shiftkerja` (`id_shiftkerja`, `nama_shiftkerja`, `keterangan`) VALUES
(63, 'siang', 'siang sekali '),
(64, 'pagi', 'shift pagi '),
(65, 'malam', 'shift malam'),
(66, '=lainnya=', 'tidak ada dalam daftar'),
(67, 'ok', 'kos');

-- --------------------------------------------------------

--
-- Table structure for table `tb_statuskerja`
--

CREATE TABLE IF NOT EXISTS `tb_statuskerja` (
  `id_statuskerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_statuskerja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_statuskerja`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_statuskerja`
--

INSERT INTO `tb_statuskerja` (`id_statuskerja`, `nama_statuskerja`) VALUES
(1, 'permanen'),
(2, 'harian'),
(3, 'kontrak'),
(4, '=lainnya=');

-- --------------------------------------------------------

--
-- Table structure for table `tb_subjkecel`
--

CREATE TABLE IF NOT EXISTS `tb_subjkecel` (
  `id_subjkecel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subjkecel` varchar(50) NOT NULL,
  `ket_subjkecel` text NOT NULL,
  `id_jkecel` int(11) NOT NULL,
  PRIMARY KEY (`id_subjkecel`),
  KEY `id_jkecel` (`id_jkecel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tb_subjkecel`
--

INSERT INTO `tb_subjkecel` (`id_subjkecel`, `nama_subjkecel`, `ket_subjkecel`, `id_jkecel`) VALUES
(1, 'kecelakaan', 'kecelakaan kerja ( cidera akibat kerja )', 1),
(2, 'non', 'bukan kecelakaan kerja (bukan cidera akibat kerja)', 1),
(3, 'penyakit', 'penyakit akibat kerja ( sakit akibat kerja )', 1),
(4, 'equipment', 'kerusakan equipment', 2),
(5, 'properti', 'kerusakan properti perusahaan', 2),
(6, 'lingkungan', 'kerusakan lingkungan', 2),
(7, 'produksi', 'gangguan produksi', 2),
(8, 'masyarakat', 'dmapak pada masyarakat', 2),
(9, 'keamanan', 'gangguan pada keamaanan', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subjkecel2`
--

CREATE TABLE IF NOT EXISTS `tb_subjkecel2` (
  `id_subjkecel2` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subjkecel2` varchar(50) NOT NULL,
  `ket_subjkecel2` text NOT NULL,
  `id_subjkecel` int(11) NOT NULL,
  PRIMARY KEY (`id_subjkecel2`),
  KEY `id_subjkecel` (`id_subjkecel`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `tb_subjkecel2`
--

INSERT INTO `tb_subjkecel2` (`id_subjkecel2`, `nama_subjkecel2`, `ket_subjkecel2`, `id_subjkecel`) VALUES
(1, 'LTI', 'Lost Time Incident (tidak mampu bekerja selama 2 hari )', 1),
(2, 'RWI', 'Restricted work Injury(bisa kembali bekerja dengan pembatasan akrivitas) ', 1),
(3, 'MTI', 'Medical Treatment Injury (perawatan cidera denga peralatan medis) ', 1),
(4, 'FAI', 'First Aid Injury (pewatan cidera dengan P3K)', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_subsebabdasar`
--

CREATE TABLE IF NOT EXISTS `tb_subsebabdasar` (
  `id_subsebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `nm_subsebabdasar` varchar(50) NOT NULL,
  `id_sebabdasar` int(11) NOT NULL,
  PRIMARY KEY (`id_subsebabdasar`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `tb_subsebabdasar`
--

INSERT INTO `tb_subsebabdasar` (`id_subsebabdasar`, `nm_subsebabdasar`, `id_sebabdasar`) VALUES
(1, 'procedure', 1),
(2, 'training', 1),
(3, 'quality control', 1),
(4, 'communication', 1),
(5, 'management system', 1),
(6, 'human engineering', 1),
(7, 'work direction', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_tempatsampling`
--

CREATE TABLE IF NOT EXISTS `tb_tempatsampling` (
  `keterangan` text NOT NULL,
  `id_tempatsampling` int(20) NOT NULL AUTO_INCREMENT,
  `nama_tempatsampling` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tempatsampling`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `tb_tempatsampling`
--

INSERT INTO `tb_tempatsampling` (`keterangan`, `id_tempatsampling`, `nama_tempatsampling`) VALUES
('D1303 room', 1, 'D1303'),
('B6201 room', 2, 'B6201 '),
('B6203 room', 3, 'B6203'),
('T5201 room', 4, 'T5201 '),
('T5601 room', 5, 'T5601 '),
('C2341 room', 6, 'C2341 '),
('C2202 room', 7, 'C2202 '),
('T4201 room', 8, 'T4201 '),
('D3132 room', 9, 'D3132 '),
('unit batu bara', 10, 'UBB');

-- --------------------------------------------------------

--
-- Table structure for table `tb_timinvestigasi`
--

CREATE TABLE IF NOT EXISTS `tb_timinvestigasi` (
  `nm_anggota1` varchar(50) NOT NULL,
  `nm_anggota2` varchar(50) NOT NULL,
  `nm_anggota3` varchar(50) NOT NULL,
  `nm_anggota4` varchar(50) NOT NULL,
  `per_anggota1` varchar(50) NOT NULL,
  `per_anggota2` varchar(50) NOT NULL,
  `per_anggota3` varchar(50) NOT NULL,
  `per_anggota4` varchar(50) NOT NULL,
  `jab_anggota1` varchar(50) NOT NULL,
  `jab_anggota2` varchar(50) NOT NULL,
  `jab_anggota3` varchar(50) NOT NULL,
  `jab_anggota4` varchar(50) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_timinvestigasi`
--

INSERT INTO `tb_timinvestigasi` (`nm_anggota1`, `nm_anggota2`, `nm_anggota3`, `nm_anggota4`, `per_anggota1`, `per_anggota2`, `per_anggota3`, `per_anggota4`, `jab_anggota1`, `jab_anggota2`, `jab_anggota3`, `jab_anggota4`, `id_kecelakaan`) VALUES
('1', '1', '', '', '1', '11', '', '', '1', '1', '', '', 5),
('5', '54', '54', '54', '4', '54', '54', '54', '54', '54', '54', '545', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tb_timinvestigasix`
--

CREATE TABLE IF NOT EXISTS `tb_timinvestigasix` (
  `id_timinvestigasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pekerja` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_timinvestigasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tb_timinvestigasix`
--


-- --------------------------------------------------------

--
-- Table structure for table `tb_tindakan`
--

CREATE TABLE IF NOT EXISTS `tb_tindakan` (
  `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,
  `penindak` varchar(11) NOT NULL,
  `tindakan` text NOT NULL,
  `tanggal_tindakan` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  `jam_tindakan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tindakan`),
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `tb_tindakan`
--

INSERT INTO `tb_tindakan` (`id_tindakan`, `penindak`, `tindakan`, `tanggal_tindakan`, `id_kecelakaan`, `jam_tindakan`) VALUES
(1, 'satpam', 'pengamanan lokasi', '2012-10-22', 4, '16.50'),
(2, 'ambulance', 'pengantaran korban AAB ke RS Dr. Soetomo Surabaya', '2012-10-22', 4, '17.05'),
(3, 'satpam', 'pengaturan lalu lintas jalan pelabuhan - {abrik II', '2', 4, '17.30'),
(4, '9', '9', '9', 5, '9'),
(5, '11', '11', '11', 5, '11'),
(6, '10', '10', '10', 5, '10');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tingkatresiko`
--

CREATE TABLE IF NOT EXISTS `tb_tingkatresiko` (
  `id_kecelakaan` int(11) NOT NULL,
  `konsekuensi_aktual` enum('catastrophic','major','moderate','minor','insignificant') NOT NULL,
  `konsekuensi_potensial` enum('catastrophic','major','moderate','minor','insignificant') NOT NULL,
  `kemungkinan` enum('almost certain','likely','possible','unlikely','rare') NOT NULL,
  `tingkat_resiko_aktual` enum('low','medium','high','extreme') NOT NULL,
  `tingkat_resiko_potensial` enum('low','medium','high','extreme') NOT NULL,
  `status` enum('awal','akhir') NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tingkatresiko`
--

INSERT INTO `tb_tingkatresiko` (`id_kecelakaan`, `konsekuensi_aktual`, `konsekuensi_potensial`, `kemungkinan`, `tingkat_resiko_aktual`, `tingkat_resiko_potensial`, `status`) VALUES
(4, 'catastrophic', 'catastrophic', 'almost certain', 'low', 'low', 'akhir'),
(5, '', '', '', '', '', 'akhir'),
(5, 'catastrophic', 'catastrophic', 'almost certain', 'low', 'medium', 'akhir'),
(4, '', '', '', '', '', 'akhir'),
(4, '', 'catastrophic', 'almost certain', 'low', 'low', 'akhir'),
(5, '', '', '', '', '', 'akhir'),
(5, '', '', '', '', '', 'akhir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tipedampak`
--

CREATE TABLE IF NOT EXISTS `tb_tipedampak` (
  `id_tipedampak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipedampak` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_tipedampak`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `tb_tipedampak`
--

INSERT INTO `tb_tipedampak` (`id_tipedampak`, `nama_tipedampak`, `keterangan`) VALUES
(1, 'water-ground', 'air - tanah'),
(2, 'water - surface', 'air permukaan'),
(3, 'flora', 'tumbuhan'),
(4, 'land-undisturbed', 'tanah tak terganggu'),
(5, 'land-rehabilitated', 'tanah-rehabilitasi'),
(6, 'land-general', 'tanah-umum'),
(7, 'culture', 'budaya'),
(8, 'heritage', 'warisan'),
(9, 'air quality/polution', 'kualitas udara/polusi'),
(10, 'fauna', 'hewan'),
(11, 'community/public', 'komunitas/masyarakat'),
(12, 'others', 'lainnya');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE IF NOT EXISTS `tb_users` (
  `username` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) COLLATE latin1_general_ci NOT NULL,
  `id_level` varchar(20) COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `foto` text COLLATE latin1_general_ci NOT NULL,
  PRIMARY KEY (`username`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `id_level`, `blokir`, `id_session`, `foto`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'Natasha', 'admin@detik.com', '08238923848', 'admin', 'N', '7o2hmo9tmgq747n416up7qeh90', 'Koala.jpg'),
('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'sinto@detik.com', '09945849545', 'user', 'N', 's1p2oq9auq6n5bhn5ov79bbjb0', 'kucing.jpg'),
('nata', '093d8a0793df4654fee95cc1215555b3', 'nata', '', '', 'admin', 'N', 'tafd39p4op486je0jlrqh90pu3', 'nata.png'),
('wiros', 'dcdd932ea3418387ef2f06644303389e', 'wiryo', 'wiryo@sableng', '98797', 'user', 'N', '25005d71e4f9a670ebf111888a0916b2', ''),
('', '9a281eea0823964dfb2915823c248417', 'u', 'iu', '', 'user', 'N', '', ''),
('jhj', '2510c39011c5be704182423e3a695e91', 'h', 'jhj', '', 'user', 'N', '', ''),
('R', 'e1e1d3d40573127e9ee0480caf1283d6', 'rrRR', 'R', '', 'user', 'N', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
