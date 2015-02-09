/*
Navicat MySQL Data Transfer

Source Server         : lumba2
Source Server Version : 50616
Source Host           : 127.0.0.1:3306
Source Database       : k3nata

Target Server Type    : MYSQL
Target Server Version : 50616
File Encoding         : 65001

Date: 2015-02-09 18:33:31
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_aspekpenyebab
-- ----------------------------
DROP TABLE IF EXISTS `tb_aspekpenyebab`;
CREATE TABLE `tb_aspekpenyebab` (
  `id_aspekpenyebab` int(11) NOT NULL AUTO_INCREMENT,
  `nama_aspekpenyebab` varchar(25) NOT NULL,
  `keterangan` text NOT NULL,
  `id_katinvestigasi` int(11) NOT NULL,
  PRIMARY KEY (`id_aspekpenyebab`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_aspekpenyebab
-- ----------------------------

-- ----------------------------
-- Table structure for tb_bagian
-- ----------------------------
DROP TABLE IF EXISTS `tb_bagian`;
CREATE TABLE `tb_bagian` (
  `id_bagian` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagian` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_bagian`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_bagian
-- ----------------------------
INSERT INTO `tb_bagian` VALUES ('1', 'personalia', '');
INSERT INTO `tb_bagian` VALUES ('2', 'staf personalia DPB', '');
INSERT INTO `tb_bagian` VALUES ('3', 'staf personalia tuga', '');
INSERT INTO `tb_bagian` VALUES ('4', 'staf personalia', '');
INSERT INTO `tb_bagian` VALUES ('5', 'administrasi SDM', '');
INSERT INTO `tb_bagian` VALUES ('6', 'staf hubungan indust', '');
INSERT INTO `tb_bagian` VALUES ('7', 'pengembangan SDM', '');
INSERT INTO `tb_bagian` VALUES ('8', 'administrasi SDM', '');
INSERT INTO `tb_bagian` VALUES ('9', 'akutansi umum', '');
INSERT INTO `tb_bagian` VALUES ('10', 'akutansi biaya', '');
INSERT INTO `tb_bagian` VALUES ('11', 'anlap manajemen', '');
INSERT INTO `tb_bagian` VALUES ('12', 'evaluasi pencapaian ', '');
INSERT INTO `tb_bagian` VALUES ('13', 'akutansi biaya', '');
INSERT INTO `tb_bagian` VALUES ('14', 'akutansi', '');
INSERT INTO `tb_bagian` VALUES ('15', 'anggaran', '');
INSERT INTO `tb_bagian` VALUES ('16', 'penyusunan anggaran', '');
INSERT INTO `tb_bagian` VALUES ('17', 'pengawasan anggaran', '');
INSERT INTO `tb_bagian` VALUES ('18', 'pengendalian operasi', '');
INSERT INTO `tb_bagian` VALUES ('19', 'penyusunan anggaran', '');
INSERT INTO `tb_bagian` VALUES ('20', 'pengawasan anggaran', '');
INSERT INTO `tb_bagian` VALUES ('21', 'audit administrasi', '');
INSERT INTO `tb_bagian` VALUES ('22', 'audit operasional', '');
INSERT INTO `tb_bagian` VALUES ('23', 'distribusi wilayah I', '');
INSERT INTO `tb_bagian` VALUES ('24', 'distribusi wilayah b', '');
INSERT INTO `tb_bagian` VALUES ('25', 'distribusi wilayah t', '');
INSERT INTO `tb_bagian` VALUES ('26', 'distribusi wilayah I', '');
INSERT INTO `tb_bagian` VALUES ('27', 'gudang gresik', '');
INSERT INTO `tb_bagian` VALUES ('28', 'transportasi & pergu', '');
INSERT INTO `tb_bagian` VALUES ('29', 'administrasi distrib', '');
INSERT INTO `tb_bagian` VALUES ('30', 'hubungan masyarakat', '');
INSERT INTO `tb_bagian` VALUES ('31', 'informasi & komunika', '');
INSERT INTO `tb_bagian` VALUES ('32', 'protokol', '');
INSERT INTO `tb_bagian` VALUES ('33', 'hubungan masyarakat', '');
INSERT INTO `tb_bagian` VALUES ('34', 'hukum & sekretariat', '');
INSERT INTO `tb_bagian` VALUES ('35', 'sekretariat', '');
INSERT INTO `tb_bagian` VALUES ('36', 'perijinan, adm.perta', '');
INSERT INTO `tb_bagian` VALUES ('37', 'p-janjian/kontrak, n', '');
INSERT INTO `tb_bagian` VALUES ('38', 'sekretariat', '');
INSERT INTO `tb_bagian` VALUES ('39', 'inspeksi teknik', '');
INSERT INTO `tb_bagian` VALUES ('40', 'inspeksi teknik pabr', '');
INSERT INTO `tb_bagian` VALUES ('41', 'inspeksi teknik pabr', '');
INSERT INTO `tb_bagian` VALUES ('42', 'inspeksi teknik pabr', '');
INSERT INTO `tb_bagian` VALUES ('43', 'inspeksi teknik pabr', '');
INSERT INTO `tb_bagian` VALUES ('44', 'inspeksi teknik khus', '');
INSERT INTO `tb_bagian` VALUES ('45', 'inspeksi teknik koro', '');
INSERT INTO `tb_bagian` VALUES ('46', 'jasa teknik & konstr', '');
INSERT INTO `tb_bagian` VALUES ('47', 'perancanaan & pengen', '');
INSERT INTO `tb_bagian` VALUES ('48', 'pengawasan proyek', '');
INSERT INTO `tb_bagian` VALUES ('49', 'pemasaran jasa tekni', '');
INSERT INTO `tb_bagian` VALUES ('50', 'jasa teknik & konstr', '');
INSERT INTO `tb_bagian` VALUES ('51', 'jasa teknik & konstr', '');
INSERT INTO `tb_bagian` VALUES ('52', 'pengembangan jasteko', '');
INSERT INTO `tb_bagian` VALUES ('53', 'staf jasa teknik & k', '');
INSERT INTO `tb_bagian` VALUES ('54', 'perancangan & pengen', '');
INSERT INTO `tb_bagian` VALUES ('55', 'kemitraan & bina lin', '');
INSERT INTO `tb_bagian` VALUES ('56', 'operasional KBL', '');
INSERT INTO `tb_bagian` VALUES ('57', 'adm & keuangan KBL', '');
INSERT INTO `tb_bagian` VALUES ('58', 'keuangan', '');
INSERT INTO `tb_bagian` VALUES ('59', 'pembendaharaan', '');
INSERT INTO `tb_bagian` VALUES ('60', 'pajak & asuransi', '');
INSERT INTO `tb_bagian` VALUES ('61', 'lingkungan & k3', '');
INSERT INTO `tb_bagian` VALUES ('62', 'staff lingkungan', 'bagian pengurusan lingkungan ');
INSERT INTO `tb_bagian` VALUES ('75', '=lainnya=', 'tidak ada dalam daftar');

-- ----------------------------
-- Table structure for tb_bagtubuh
-- ----------------------------
DROP TABLE IF EXISTS `tb_bagtubuh`;
CREATE TABLE `tb_bagtubuh` (
  `id_bagtubuh` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bagtubuh` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_bagtubuh`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_bagtubuh
-- ----------------------------
INSERT INTO `tb_bagtubuh` VALUES ('1', 'back', 'punggung');
INSERT INTO `tb_bagtubuh` VALUES ('2', 'head', 'kepala');
INSERT INTO `tb_bagtubuh` VALUES ('3', 'hip', 'pinggul');
INSERT INTO `tb_bagtubuh` VALUES ('4', 'upper leg', 'kaki atas');

-- ----------------------------
-- Table structure for tb_cidera
-- ----------------------------
DROP TABLE IF EXISTS `tb_cidera`;
CREATE TABLE `tb_cidera` (
  `id_cidera` int(11) NOT NULL AUTO_INCREMENT,
  `id_bagtubuh` int(11) NOT NULL,
  `id_jcidera` int(11) NOT NULL,
  `kanan` int(11) NOT NULL,
  `kiri` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_cidera`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_cidera_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_cidera
-- ----------------------------

-- ----------------------------
-- Table structure for tb_department
-- ----------------------------
DROP TABLE IF EXISTS `tb_department`;
CREATE TABLE `tb_department` (
  `id_department` int(11) NOT NULL AUTO_INCREMENT,
  `nama_department` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_department`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_department
-- ----------------------------
INSERT INTO `tb_department` VALUES ('1', 'dewan komesaris & st', '');
INSERT INTO `tb_department` VALUES ('2', 'personalia', '');
INSERT INTO `tb_department` VALUES ('3', 'akutansi', '');
INSERT INTO `tb_department` VALUES ('4', 'anggran', '');
INSERT INTO `tb_department` VALUES ('5', 'audit administrasi', '');
INSERT INTO `tb_department` VALUES ('6', 'audit operasional', '');
INSERT INTO `tb_department` VALUES ('7', 'distribusi wilayah I', '');
INSERT INTO `tb_department` VALUES ('8', 'distribusi wilayah I', '');
INSERT INTO `tb_department` VALUES ('9', 'hubungan masyarakat', '');
INSERT INTO `tb_department` VALUES ('10', 'hukum & sekretariat', '');
INSERT INTO `tb_department` VALUES ('11', 'inspeksi teknik', '');
INSERT INTO `tb_department` VALUES ('12', 'jasa teknik & konstr', '');
INSERT INTO `tb_department` VALUES ('13', 'kemitraan & bina lin', '');
INSERT INTO `tb_department` VALUES ('14', 'keuangan', '');
INSERT INTO `tb_department` VALUES ('15', 'lingkungan & k3', '');
INSERT INTO `tb_department` VALUES ('16', 'manajemen resiko', '');
INSERT INTO `tb_department` VALUES ('17', 'organisasi & prosedu', '');
INSERT INTO `tb_department` VALUES ('18', 'pelayanan & komunika', '');
INSERT INTO `tb_department` VALUES ('19', 'pelayanan umum', '');
INSERT INTO `tb_department` VALUES ('20', 'pendidikan & pelatih', '');
INSERT INTO `tb_department` VALUES ('21', 'pengadaan', '');
INSERT INTO `tb_department` VALUES ('22', 'pengelolaan anak per', '');
INSERT INTO `tb_department` VALUES ('23', 'pengelolaan pelabuha', '');
INSERT INTO `tb_department` VALUES ('24', 'pengembangan usaha', '');
INSERT INTO `tb_department` VALUES ('25', 'penj.produk non pupu', '');
INSERT INTO `tb_department` VALUES ('26', 'pupuk retail wilayah', '');
INSERT INTO `tb_department` VALUES ('27', 'penjualan pupuk korp', '');
INSERT INTO `tb_department` VALUES ('28', 'pupuk retail wilayah', '');
INSERT INTO `tb_department` VALUES ('29', 'perencanaan & adm.pe', '');
INSERT INTO `tb_department` VALUES ('30', 'perencanaan & gudang', '');
INSERT INTO `tb_department` VALUES ('31', 'perwakilan jakarta', '');
INSERT INTO `tb_department` VALUES ('32', 'proses & pengelolaan', '');
INSERT INTO `tb_department` VALUES ('33', 'rancang bangun', '');
INSERT INTO `tb_department` VALUES ('34', 'riset pemuliaan & p.', '');
INSERT INTO `tb_department` VALUES ('35', 'riset pupuk & produk', '');
INSERT INTO `tb_department` VALUES ('36', 'teknologi & informas', '');
INSERT INTO `tb_department` VALUES ('37', 'direktorat produksi', '');
INSERT INTO `tb_department` VALUES ('38', 'direktorat SDM & umu', '');
INSERT INTO `tb_department` VALUES ('39', 'direktorat teknik & ', '');
INSERT INTO `tb_department` VALUES ('40', 'direktorat utama', '');
INSERT INTO `tb_department` VALUES ('41', 'dit.komersil', '');
INSERT INTO `tb_department` VALUES ('42', 'dp.distribusi wilyah', '');
INSERT INTO `tb_department` VALUES ('43', 'dp.keamanan', '');
INSERT INTO `tb_department` VALUES ('44', 'dp.pemeliharaan I', '');
INSERT INTO `tb_department` VALUES ('45', 'dp.pemeliharan II', '');
INSERT INTO `tb_department` VALUES ('46', 'dp.pemeliharaan III', '');
INSERT INTO `tb_department` VALUES ('47', 'dp.peralatan & perme', '');
INSERT INTO `tb_department` VALUES ('48', 'dp. prasarana pabrik', '');
INSERT INTO `tb_department` VALUES ('49', 'dp. produksi II A', '');
INSERT INTO `tb_department` VALUES ('50', 'dp. produksi II B', '');
INSERT INTO `tb_department` VALUES ('51', 'dp. produksi I', '');
INSERT INTO `tb_department` VALUES ('52', 'produksi III', '');
INSERT INTO `tb_department` VALUES ('53', 'dpb. anak perusahaan', '');
INSERT INTO `tb_department` VALUES ('54', 'k3pg', '');
INSERT INTO `tb_department` VALUES ('55', 'komp rendal usaha', '');
INSERT INTO `tb_department` VALUES ('56', 'komp administrasi ke', '');
INSERT INTO `tb_department` VALUES ('57', 'komp audit intern', '');
INSERT INTO `tb_department` VALUES ('58', 'komp pemasaran', '');
INSERT INTO `tb_department` VALUES ('59', 'komp penjualan wilay', '');
INSERT INTO `tb_department` VALUES ('60', 'komp wilayah II', '');
INSERT INTO `tb_department` VALUES ('61', 'komp riset', '');
INSERT INTO `tb_department` VALUES ('62', 'komp engineering', '');
INSERT INTO `tb_department` VALUES ('63', 'komp pabrik I', '');
INSERT INTO `tb_department` VALUES ('64', 'komp pabrik II', '');
INSERT INTO `tb_department` VALUES ('65', 'komp pabrik III', '');
INSERT INTO `tb_department` VALUES ('66', 'komp pengadaan', '');
INSERT INTO `tb_department` VALUES ('67', 'komp pengembangan', 'department komponen  pengembangan');
INSERT INTO `tb_department` VALUES ('68', 'komp pengembangan suara', 'department komponen  pengembangan suara');
INSERT INTO `tb_department` VALUES ('69', 'komp teknologi', 'department komputer dan  teknologi');
INSERT INTO `tb_department` VALUES ('70', 'proyek', 'department proyek');
INSERT INTO `tb_department` VALUES ('71', 'yayasan petrokimia gresik', 'yayasan petrokimia gresik ');
INSERT INTO `tb_department` VALUES ('75', '=lainnya=', 'tidak ada dalam daftar');

-- ----------------------------
-- Table structure for tb_emisi
-- ----------------------------
DROP TABLE IF EXISTS `tb_emisi`;
CREATE TABLE `tb_emisi` (
  `id_emisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_samplingemisi` int(11) NOT NULL,
  `kadar` float NOT NULL,
  `bulan` int(20) NOT NULL,
  `tahun` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  PRIMARY KEY (`id_emisi`)
) ENGINE=MyISAM AUTO_INCREMENT=40 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_emisi
-- ----------------------------
INSERT INTO `tb_emisi` VALUES ('1', '1', '3.03', '3', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('2', '1', '41.94', '7', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('3', '1', '20.2', '11', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('4', '2', '2.49', '7', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('5', '2', '72.8', '11', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('6', '8', '180', '3', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('7', '9', '214', '7', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('8', '8', '2.5', '11', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('9', '9', '4.3', '3', '2012', '0000-00-00 00:00:00');
INSERT INTO `tb_emisi` VALUES ('10', '2', '99999', '11', '2007', '2013-06-24 08:03:59');
INSERT INTO `tb_emisi` VALUES ('11', '3', '212', '11', '2007', '2013-06-24 08:30:07');
INSERT INTO `tb_emisi` VALUES ('12', '9', '212', '11', '2007', '2013-06-24 08:31:11');
INSERT INTO `tb_emisi` VALUES ('14', '3', '6.91', '7', '2012', '2013-07-08 12:30:41');
INSERT INTO `tb_emisi` VALUES ('15', '10', '2.41', '3', '2012', '2013-07-08 12:35:43');
INSERT INTO `tb_emisi` VALUES ('16', '5', '1218', '3', '2012', '2013-07-08 12:37:18');
INSERT INTO `tb_emisi` VALUES ('17', '6', '2.41', '3', '2012', '2013-07-08 12:38:16');
INSERT INTO `tb_emisi` VALUES ('18', '7', '180', '3', '2012', '2013-07-08 12:38:40');
INSERT INTO `tb_emisi` VALUES ('19', '12', '2.9', '3', '2012', '2013-07-08 12:40:10');
INSERT INTO `tb_emisi` VALUES ('20', '13', '0.82', '3', '2012', '2013-07-08 12:40:29');
INSERT INTO `tb_emisi` VALUES ('21', '11', '41.5', '3', '2012', '2013-07-08 12:41:07');
INSERT INTO `tb_emisi` VALUES ('22', '4', '7.34', '7', '2012', '2013-07-08 12:42:25');
INSERT INTO `tb_emisi` VALUES ('23', '12', '17.7', '7', '2012', '2013-07-08 12:42:52');
INSERT INTO `tb_emisi` VALUES ('24', '11', '210', '7', '2012', '2013-07-08 12:43:08');
INSERT INTO `tb_emisi` VALUES ('25', '14', '43.1', '7', '2012', '2013-07-08 12:43:30');
INSERT INTO `tb_emisi` VALUES ('26', '15', '27.46', '7', '2012', '2013-07-08 12:43:44');
INSERT INTO `tb_emisi` VALUES ('27', '7', '214', '7', '2012', '2013-07-08 12:44:24');
INSERT INTO `tb_emisi` VALUES ('28', '3', '2.9', '11', '2012', '2013-07-08 12:45:07');
INSERT INTO `tb_emisi` VALUES ('29', '4', '1.9', '11', '2012', '2013-07-08 12:45:23');
INSERT INTO `tb_emisi` VALUES ('30', '12', '267', '11', '2012', '2013-07-08 12:45:55');
INSERT INTO `tb_emisi` VALUES ('31', '11', '58.4', '11', '2012', '2013-07-08 12:46:30');
INSERT INTO `tb_emisi` VALUES ('32', '7', '2.5', '11', '2012', '2013-07-08 12:48:10');
INSERT INTO `tb_emisi` VALUES ('33', '9', '0.5', '11', '2012', '2013-07-08 12:48:26');
INSERT INTO `tb_emisi` VALUES ('34', '15', '606', '11', '2012', '2013-07-08 12:49:48');
INSERT INTO `tb_emisi` VALUES ('35', '14', '209', '11', '2012', '2013-07-08 12:50:03');
INSERT INTO `tb_emisi` VALUES ('39', '2', '456', '3', '2003', '2013-07-19 02:39:47');

-- ----------------------------
-- Table structure for tb_foto
-- ----------------------------
DROP TABLE IF EXISTS `tb_foto`;
CREATE TABLE `tb_foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `path` text NOT NULL,
  `keterangan` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_foto
-- ----------------------------
INSERT INTO `tb_foto` VALUES ('1', 'img/data/foto1.jpg', 'denah kejadian', '4');
INSERT INTO `tb_foto` VALUES ('2', 'img/data/foto2.jpg', 'foto depan mobil', '4');
INSERT INTO `tb_foto` VALUES ('3', 'img/data/foto3.jpg', 'foto mobil samping', '4');
INSERT INTO `tb_foto` VALUES ('4', 'img/data/foto4.jpg', 'foto korban ', '4');
INSERT INTO `tb_foto` VALUES ('5', 'img/data/foto1.jpg', 'foto kecelakaan', '4');

-- ----------------------------
-- Table structure for tb_gas
-- ----------------------------
DROP TABLE IF EXISTS `tb_gas`;
CREATE TABLE `tb_gas` (
  `id_gas` int(11) NOT NULL AUTO_INCREMENT,
  `nama_gas` varchar(20) NOT NULL,
  PRIMARY KEY (`id_gas`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_gas
-- ----------------------------
INSERT INTO `tb_gas` VALUES ('1', 'SO2');
INSERT INTO `tb_gas` VALUES ('2', 'NO2');
INSERT INTO `tb_gas` VALUES ('3', 'NH3');
INSERT INTO `tb_gas` VALUES ('4', 'fluor');
INSERT INTO `tb_gas` VALUES ('5', 'partikulat');

-- ----------------------------
-- Table structure for tb_hakakses
-- ----------------------------
DROP TABLE IF EXISTS `tb_hakakses`;
CREATE TABLE `tb_hakakses` (
  `id_hakakses` int(11) NOT NULL AUTO_INCREMENT,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  PRIMARY KEY (`id_hakakses`),
  KEY `id_menu` (`id_menu`),
  KEY `id_level` (`id_level`),
  CONSTRAINT `tb_hakakses_ibfk_1` FOREIGN KEY (`id_menu`) REFERENCES `tb_menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_hakakses_ibfk_2` FOREIGN KEY (`id_level`) REFERENCES `tb_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_hakakses
-- ----------------------------
INSERT INTO `tb_hakakses` VALUES ('1', '1', '1');
INSERT INTO `tb_hakakses` VALUES ('2', '2', '1');
INSERT INTO `tb_hakakses` VALUES ('3', '1', '2');
INSERT INTO `tb_hakakses` VALUES ('4', '11', '2');
INSERT INTO `tb_hakakses` VALUES ('5', '1', '1');
INSERT INTO `tb_hakakses` VALUES ('6', '5', '1');
INSERT INTO `tb_hakakses` VALUES ('7', '12', '1');
INSERT INTO `tb_hakakses` VALUES ('8', '28', '1');
INSERT INTO `tb_hakakses` VALUES ('9', '14', '1');
INSERT INTO `tb_hakakses` VALUES ('10', '5', '1');
INSERT INTO `tb_hakakses` VALUES ('11', '12', '1');
INSERT INTO `tb_hakakses` VALUES ('12', '5', '1');

-- ----------------------------
-- Table structure for tb_investigasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_investigasi`;
CREATE TABLE `tb_investigasi` (
  `id_investigasi` int(11) NOT NULL AUTO_INCREMENT,
  `hasil_investigasi` text NOT NULL,
  `id_katinvestigasi` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_investigasi`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_investigasi
-- ----------------------------
INSERT INTO `tb_investigasi` VALUES ('1', 'usia pekerja  52 tahun', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('2', 'tanggal lahir pekerja 15 oktober 1960', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('3', 'meiliki sim A yang valid dan masih berlaku (salinan terlampir)', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('4', 'memiliki KIB dar pihak PJA yang valid dan masih berlaku (salinan terlampir)', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('5', 'pekerja tidak dalam pengobatan dan pengaruh obat apa pun ', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('6', 'pekerja tidur 7 jam malam sebelumnya', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('7', 'pekerja telah bekerja selama 2 hari sebelumnya', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('8', 'pekerja menggunakan seat belt saat kejadian tabrakan', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('9', 'pekerja belum pernah mendapatkan pengarahan K3 baik dari pihak PJA ataupun Rekayasa Industri', '1', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('10', 'mobil yang dikendarau  berjenis minibus toyota avanza tahun 2012 warna abu abu metalik', '2', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('11', 'mobil dalam keadaan normal sebelum dikendarai ', '2', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('12', 'masa berlaku uji laik pakai PT. petrokimia gresik s/d 27 oktober 2012', '2', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('13', 'kerusakan pada bagian depan mobil(foto terlampir)', '2', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('14', 'kondisi cuacxa cerah tidk berawan', '3', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('15', 'jalan sedikit bergelombang', '3', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('16', 'jalan yang dilewati cukup luas karena truk sengaja memberi jalan kepada pekerja untuk menyalip dari sebelah kiri ', '3', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('17', 'rambu rambu informasi kecepatan maksimal di jalan tridarma kurang terlihat', '3', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('18', 'terdapat batu (concrete) pembataas jalan yang cukup besar dan berada agak ke tengah badan jalan', '3', '1', '1');
INSERT INTO `tb_investigasi` VALUES ('19', 'batu terindikasi merupakan wheel choke yang digunakan driver truk yang sedang melakukan perbaikan di p[inggir jalan tetpi tidak dikembalikan ke tempatnya ketika kegiatan perbaikan telah selesai', '3', '1', '1');
INSERT INTO `tb_investigasi` VALUES ('20', 'ok', '2', '1', '1');
INSERT INTO `tb_investigasi` VALUES ('21', 'ok', '2', '1', '1');
INSERT INTO `tb_investigasi` VALUES ('22', 'hjkhjh', '3', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('23', 'ok', '2', '1', '1');
INSERT INTO `tb_investigasi` VALUES ('24', 'yes', '5', '1', '0');
INSERT INTO `tb_investigasi` VALUES ('25', 'no', '5', '1', '0');

-- ----------------------------
-- Table structure for tb_jabatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_jabatan`;
CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jabatan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jabatan`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jabatan
-- ----------------------------
INSERT INTO `tb_jabatan` VALUES ('1', 'Kepala HRD', 'kepala Human Resource Department');
INSERT INTO `tb_jabatan` VALUES ('2', 'GM Produksi', 'general manager Produksi');
INSERT INTO `tb_jabatan` VALUES ('8', 'GM LK3', 'general manager LK3 ');
INSERT INTO `tb_jabatan` VALUES ('9', 'Staff gudang', 'karyawan staff gudang');
INSERT INTO `tb_jabatan` VALUES ('10', 'Pengawas Lapangan', 'pengawas produksi');
INSERT INTO `tb_jabatan` VALUES ('11', '=lainnya=', 'tidak ada dalam daftar');
INSERT INTO `tb_jabatan` VALUES ('12', 'bongkar muat pupuk', 'bongkar muat pupuk');
INSERT INTO `tb_jabatan` VALUES ('13', 'driver dump truck', 'driver dump truck');
INSERT INTO `tb_jabatan` VALUES ('14', 'baru', 'sekali');
INSERT INTO `tb_jabatan` VALUES ('15', 'y', 'y');

-- ----------------------------
-- Table structure for tb_jcidera
-- ----------------------------
DROP TABLE IF EXISTS `tb_jcidera`;
CREATE TABLE `tb_jcidera` (
  `id_jcidera` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jcidera` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jcidera`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jcidera
-- ----------------------------
INSERT INTO `tb_jcidera` VALUES ('1', 'abrasions ', 'abrasi');
INSERT INTO `tb_jcidera` VALUES ('2', 'amputation', 'amputasi');
INSERT INTO `tb_jcidera` VALUES ('3', 'asphyxia', 'sesak nafas');
INSERT INTO `tb_jcidera` VALUES ('4', 'bruising', 'memar');
INSERT INTO `tb_jcidera` VALUES ('5', 'burns', 'luka bakar');
INSERT INTO `tb_jcidera` VALUES ('6', 'crush', 'remuk');
INSERT INTO `tb_jcidera` VALUES ('7', 'dislocation', 'dislokasi');
INSERT INTO `tb_jcidera` VALUES ('8', 'effects of chemicals', 'efek bahan kimia');
INSERT INTO `tb_jcidera` VALUES ('9', 'effects of exposure', 'efek paparan');
INSERT INTO `tb_jcidera` VALUES ('10', 'electric shock', 'tersengat arus listrik');
INSERT INTO `tb_jcidera` VALUES ('11', 'fracture', 'patah tulang');
INSERT INTO `tb_jcidera` VALUES ('12', 'foreign body', 'benda asing');
INSERT INTO `tb_jcidera` VALUES ('13', 'heat stress', 'stres panas');
INSERT INTO `tb_jcidera` VALUES ('14', 'illness', 'kesakitan');
INSERT INTO `tb_jcidera` VALUES ('15', 'internal injury', 'luka dalam');
INSERT INTO `tb_jcidera` VALUES ('17', 'loss of consciousnes', 'hilang kesadaran/pingsan');
INSERT INTO `tb_jcidera` VALUES ('18', 'nausea', 'mual');
INSERT INTO `tb_jcidera` VALUES ('19', 'puncture wound', 'luka tusuk');
INSERT INTO `tb_jcidera` VALUES ('20', 'open wound', 'luka terbuka');
INSERT INTO `tb_jcidera` VALUES ('21', 'sprain', 'keseleo');
INSERT INTO `tb_jcidera` VALUES ('22', 'strain', 'tegang otot');
INSERT INTO `tb_jcidera` VALUES ('23', 'others', 'lainnya');

-- ----------------------------
-- Table structure for tb_jkecel
-- ----------------------------
DROP TABLE IF EXISTS `tb_jkecel`;
CREATE TABLE `tb_jkecel` (
  `id_jkecel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jkecel` varchar(50) NOT NULL,
  `ket_jkecel` text NOT NULL,
  PRIMARY KEY (`id_jkecel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jkecel
-- ----------------------------
INSERT INTO `tb_jkecel` VALUES ('1', 'pekerja', 'kecelakaan yang berhubungan dengna pekerja');
INSERT INTO `tb_jkecel` VALUES ('2', 'lainnya', 'kecelakaan yang berhubungan dengan selain pekerja');

-- ----------------------------
-- Table structure for tb_jkecelx
-- ----------------------------
DROP TABLE IF EXISTS `tb_jkecelx`;
CREATE TABLE `tb_jkecelx` (
  `id_jkecel` int(11) NOT NULL AUTO_INCREMENT,
  `jeniskecel` varchar(20) NOT NULL,
  `sub_jeniskecel` text NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_jkecel`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jkecelx
-- ----------------------------
INSERT INTO `tb_jkecelx` VALUES ('1', 'kecelakaan kerja', 'LTI', 'kerusakan equipment');
INSERT INTO `tb_jkecelx` VALUES ('2', 'kecelakaan kerja', 'LTI', 'kerusakan properti perusahaan');
INSERT INTO `tb_jkecelx` VALUES ('3', 'kecelakaan kerja', 'LTI', 'kerusakan lingkungan ');
INSERT INTO `tb_jkecelx` VALUES ('5', 'kecelakaan kerja', 'LTI', 'gangguan produksi');
INSERT INTO `tb_jkecelx` VALUES ('7', 'kecelakaan kerja', 'LTI', 'dampak pada masyarakat');
INSERT INTO `tb_jkecelx` VALUES ('8', 'kecelakaan kerja', 'LTI', 'gangguan pada keamanan');
INSERT INTO `tb_jkecelx` VALUES ('9', 'kecelakaan kerja', 'LTI', 'lain - lain');
INSERT INTO `tb_jkecelx` VALUES ('10', 'kecelakaan kerja', 'RWI', 'kerusakan lingkungan ');
INSERT INTO `tb_jkecelx` VALUES ('12', 'kecelakaan kerja', 'RWI', 'gangguan produksi');
INSERT INTO `tb_jkecelx` VALUES ('13', 'kecelakaan kerja', 'RWI', 'dampak pada masyarakat');
INSERT INTO `tb_jkecelx` VALUES ('14', 'kecelakaan kerja', 'RWI', 'gangguan pada keamanan');
INSERT INTO `tb_jkecelx` VALUES ('15', 'kecelakaan kerja', 'RWI', 'lain - lain');
INSERT INTO `tb_jkecelx` VALUES ('16', 'kecelakaan kerja', 'MTI', 'kerusakan lingkungan ');
INSERT INTO `tb_jkecelx` VALUES ('18', 'kecelakaan kerja', 'MTI', 'gangguan produksi');
INSERT INTO `tb_jkecelx` VALUES ('19', 'kecelakaan kerja', 'MTI', 'dampak pada masyarakat');
INSERT INTO `tb_jkecelx` VALUES ('20', 'kecelakaan kerja', 'MTI', 'gangguan pada keamanan');
INSERT INTO `tb_jkecelx` VALUES ('21', 'kecelakaan kerja', 'MTI', 'lain - lain');
INSERT INTO `tb_jkecelx` VALUES ('22', 'kecelakaan kerja', 'FAI', 'kerusakan lingkungan ');
INSERT INTO `tb_jkecelx` VALUES ('24', 'kecelakaan kerja', 'FAI', 'gangguan produksi');
INSERT INTO `tb_jkecelx` VALUES ('25', 'kecelakaan kerja', 'FAI', 'dampak pada masyarakat');
INSERT INTO `tb_jkecelx` VALUES ('26', 'kecelakaan kerja', 'FAI', 'gangguan pada keamanan');
INSERT INTO `tb_jkecelx` VALUES ('27', 'kecelakaan kerja', 'FAI', 'lain - lain');
INSERT INTO `tb_jkecelx` VALUES ('28', 'penyakit akibat', '', '');
INSERT INTO `tb_jkecelx` VALUES ('29', 'bukan kecelakaan', '', '');

-- ----------------------------
-- Table structure for tb_jlampiran
-- ----------------------------
DROP TABLE IF EXISTS `tb_jlampiran`;
CREATE TABLE `tb_jlampiran` (
  `id_jlampiran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_jlampiran` varchar(100) NOT NULL,
  PRIMARY KEY (`id_jlampiran`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_jlampiran
-- ----------------------------
INSERT INTO `tb_jlampiran` VALUES ('1', 'instruksi kerja / ijin kerja ');
INSERT INTO `tb_jlampiran` VALUES ('2', 'pernyataan saksi');
INSERT INTO `tb_jlampiran` VALUES ('3', 'sketsa / gambar');
INSERT INTO `tb_jlampiran` VALUES ('4', 'foto - foto');
INSERT INTO `tb_jlampiran` VALUES ('5', 'catatan training');
INSERT INTO `tb_jlampiran` VALUES ('6', 'catatan perbaikan');
INSERT INTO `tb_jlampiran` VALUES ('7', 'prosedur / instruksi kerja');
INSERT INTO `tb_jlampiran` VALUES ('8', 'surat ijin / keterangan');
INSERT INTO `tb_jlampiran` VALUES ('9', 'catatan pemberitahuan pihak berwenang ');

-- ----------------------------
-- Table structure for tb_kajiulang
-- ----------------------------
DROP TABLE IF EXISTS `tb_kajiulang`;
CREATE TABLE `tb_kajiulang` (
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

-- ----------------------------
-- Records of tb_kajiulang
-- ----------------------------

-- ----------------------------
-- Table structure for tb_katinvestigasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_katinvestigasi`;
CREATE TABLE `tb_katinvestigasi` (
  `id_katinvestigasi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_katinvestigasi` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_katinvestigasi`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_katinvestigasi
-- ----------------------------
INSERT INTO `tb_katinvestigasi` VALUES ('3', 'environtment', 'faktor lingkungan');
INSERT INTO `tb_katinvestigasi` VALUES ('4', 'procedure', 'faktor prosedur');
INSERT INTO `tb_katinvestigasi` VALUES ('5', 'organization', 'faktor organisasi');
INSERT INTO `tb_katinvestigasi` VALUES ('1', 'people', 'faktor manusia');
INSERT INTO `tb_katinvestigasi` VALUES ('2', 'equipment', 'faktor peralatan');

-- ----------------------------
-- Table structure for tb_kecelakaan
-- ----------------------------
DROP TABLE IF EXISTS `tb_kecelakaan`;
CREATE TABLE `tb_kecelakaan` (
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
  KEY `id_subjkecel2` (`id_subjkecel2`),
  CONSTRAINT `tb_kecelakaan_ibfk_1` FOREIGN KEY (`id_subjkecel`) REFERENCES `tb_subjkecel` (`id_subjkecel`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_kecelakaan_ibfk_2` FOREIGN KEY (`id_subjkecel2`) REFERENCES `tb_subjkecel2` (`id_subjkecel2`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kecelakaan
-- ----------------------------
INSERT INTO `tb_kecelakaan` VALUES ('1', 'KK-PKG 23.10.2012', '1', '2', '2012-10-23', '2012-10-23', 'pengemudi minibus menabrak pohon  di jalan pabrik I', 'jalan Tri Dharma - Timur Gerbang Bagian Transport', '16.50', '17.00', 'Muhammad Ya', 'Bagian K3', 'Pada hari Senin sekitar pukul 16.50, MY mengedarai Dumptruck dari arah pelabuhan menuju  400 untuk memarkir dumptruck dan bersiap untuk pulang . pada saat akan menikung , MY mendengar suara tabrakan dan memutuskan untuk menikung  pada tikungan yang kedua , tetapi tabrakan tidak dapat terhindarkan sehingga menyebabkan motor AAB terlindas ban depan dumptruck dan AAB terhampar ke samping jalan', 'cidera pada Bapak AAB masih dalam perawatan RS. Dr. Soetomo untuk dilakukan pemneriksaan lebih lanjut (mekanisme kejadian masih dalam investigasi)', 'pj lokasi', 'saksi 1', 'saksi 2', 'jab saksi 1', 'jab saksi 2', 'kontak saksi 1', 'kontak saksi 2', 'ketua tim investigasi', 'tgl mulai', 'tgl akhir', '0', 'jab pj', 'kontak pj', 'jab pelapor', 'jb yg dilapori');
INSERT INTO `tb_kecelakaan` VALUES ('3', 'KK-PKG 19.12.2012', null, null, '2012-12-13', '2012-12-13', 'Belt conveyor M0706A putus terbakar', 'pabrik III - UBB (Utaqra Barak Operator)', '(approx.)10.30-12.15', '12.30', 'hartyanto', 'bagian PMK', 'pada hari kamis tanggal 13 desember 2012 pukul 09.00 dilakukan pengelasan oleh pihak reakanan PT. Putra Baru Sentosa (PBS) pada bagian chute Inlet Conveyor sampai pukul 10.30\r\nsekitar pukul 12.15 pada saat operator akan menjalankan conveyor , terlihat asap di belt conveyor  M0706A putus', 'belt conveyor', '', '', '', '', '', '', '', '', '', '', '0', '', '', '', '');
INSERT INTO `tb_kecelakaan` VALUES ('4', 'KK-PKG-001 22.10.2012', null, null, '2012-10-22', '2012-10-22', 'pengendara sepeda motor tertabrak dumptruck', 'jalan Pabrik II - Pelabuhan (tikungan menuju 400 - Gudang KCi)', '16.50', '17.00', 'Muhammad Yasin', 'Bagian K3', 'Pada hari Senin sekitar pukul 16.50, MY mengedarai Dumptruck dari arah pelabuhan menuju  400 untuk memarkir dumptruck dan bersiap untuk pulang . pada saat akan menikung , MY mendengar suara tabrakan dan memutuskan untuk menikung  pada tikungan yang kedua , tetapi tabrakan tidak dapat terhindarkan sehingga menyebabkan motor AAB terlindas ban depan dumptruck dan AAB terhampar ke samping jalan', 'cidera pada Bapak AAB masih dalam perawatan RS. Dr. Soetomo untuk dilakukan pemneriksaan lebih lanjut (mekanisme kejadian masih dalam investigasi)', '-', '-', '-', '-', '-', '-', '-', '', '', '', '0', '-', '-', '', '');

-- ----------------------------
-- Table structure for tb_kerusakanalat
-- ----------------------------
DROP TABLE IF EXISTS `tb_kerusakanalat`;
CREATE TABLE `tb_kerusakanalat` (
  `id_kerusakanalat` int(11) NOT NULL AUTO_INCREMENT,
  `nama_alat` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `biaya` enum('1','2','3','4','5') NOT NULL,
  `mekanisme` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_kerusakanalat`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_kerusakanalat_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kerusakanalat
-- ----------------------------

-- ----------------------------
-- Table structure for tb_kerusakanling
-- ----------------------------
DROP TABLE IF EXISTS `tb_kerusakanling`;
CREATE TABLE `tb_kerusakanling` (
  `id_kerusakanling` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecelakaan` int(11) NOT NULL,
  `id_tipedampak` enum('water-ground','water-surface','flora','land-undisturbed','land-rehabilited','land-general','culture','heritage','air-quality','fauna','community','others') NOT NULL,
  `agen_pencemar` varchar(25) NOT NULL,
  `volume` int(11) NOT NULL,
  `area_terpapar` int(11) NOT NULL,
  `durasi_terpapar` int(11) NOT NULL,
  `durasi_dampak_papar` int(11) NOT NULL,
  `komen_tambahan` text NOT NULL,
  PRIMARY KEY (`id_kerusakanling`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  KEY `id_kecelakaan_2` (`id_kecelakaan`),
  KEY `id_kecelakaan_3` (`id_kecelakaan`),
  CONSTRAINT `tb_kerusakanling_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_kerusakanling
-- ----------------------------
INSERT INTO `tb_kerusakanling` VALUES ('1', '4', 'fauna', '444', '33', '55', '66', '77', 'oke');

-- ----------------------------
-- Table structure for tb_lampiran
-- ----------------------------
DROP TABLE IF EXISTS `tb_lampiran`;
CREATE TABLE `tb_lampiran` (
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
  PRIMARY KEY (`id_lampiran`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_lampiran
-- ----------------------------
INSERT INTO `tb_lampiran` VALUES ('1', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('2', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('3', '1', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('4', '0', '1', '1', '1', '1', '1', '1', '1', '1', '1');
INSERT INTO `tb_lampiran` VALUES ('5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('6', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('7', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('8', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('9', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('10', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('11', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('12', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('13', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('14', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('15', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('16', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('17', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('18', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('19', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');
INSERT INTO `tb_lampiran` VALUES ('20', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for tb_laporan
-- ----------------------------
DROP TABLE IF EXISTS `tb_laporan`;
CREATE TABLE `tb_laporan` (
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
  KEY `id_kecelakaan_2` (`id_kecelakaan`),
  CONSTRAINT `tb_laporan_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_laporan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_level
-- ----------------------------
DROP TABLE IF EXISTS `tb_level`;
CREATE TABLE `tb_level` (
  `id_level` int(11) NOT NULL AUTO_INCREMENT,
  `nama_level` varchar(50) NOT NULL,
  PRIMARY KEY (`id_level`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_level
-- ----------------------------
INSERT INTO `tb_level` VALUES ('1', 'admin');
INSERT INTO `tb_level` VALUES ('2', 'user');

-- ----------------------------
-- Table structure for tb_menu
-- ----------------------------
DROP TABLE IF EXISTS `tb_menu`;
CREATE TABLE `tb_menu` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `sub` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_menu
-- ----------------------------
INSERT INTO `tb_menu` VALUES ('1', 'home', '', '0');
INSERT INTO `tb_menu` VALUES ('2', 'profil', '', '0');
INSERT INTO `tb_menu` VALUES ('3', 'data master', '', '0');
INSERT INTO `tb_menu` VALUES ('4', 'pekerja', 'x', '3');
INSERT INTO `tb_menu` VALUES ('5', 'bagian', '', '0');
INSERT INTO `tb_menu` VALUES ('6', 'jabatan', '', '0');
INSERT INTO `tb_menu` VALUES ('7', 'department', '', '0');
INSERT INTO `tb_menu` VALUES ('8', 'shift kerja', '', '0');
INSERT INTO `tb_menu` VALUES ('9', 'status kerja', '', '0');
INSERT INTO `tb_menu` VALUES ('10', 'jenis kecelakaan', '', '0');
INSERT INTO `tb_menu` VALUES ('11', 'jenis cidera', '', '0');
INSERT INTO `tb_menu` VALUES ('12', 'bagian tubuh', '', '0');
INSERT INTO `tb_menu` VALUES ('13', 'tipe dampak ', '', '0');
INSERT INTO `tb_menu` VALUES ('14', 'jenis produk', '', '0');
INSERT INTO `tb_menu` VALUES ('15', 'jenis gas', 'mgas', '3');
INSERT INTO `tb_menu` VALUES ('16', 'sample tempat', '', '0');
INSERT INTO `tb_menu` VALUES ('17', 'sample emisi', '', '0');
INSERT INTO `tb_menu` VALUES ('18', 'transaksi', '', '0');
INSERT INTO `tb_menu` VALUES ('19', 'kecelakaan', '', '0');
INSERT INTO `tb_menu` VALUES ('20', 'emisi', '', '0');
INSERT INTO `tb_menu` VALUES ('21', 'safety performance', '', '0');
INSERT INTO `tb_menu` VALUES ('22', 'laporan', '', '0');
INSERT INTO `tb_menu` VALUES ('23', 'lap kecelakaan', '', '0');
INSERT INTO `tb_menu` VALUES ('24', 'lap emisi', '', '0');
INSERT INTO `tb_menu` VALUES ('25', 'lap safety performance', '', '0');
INSERT INTO `tb_menu` VALUES ('26', 'setting', '', '0');
INSERT INTO `tb_menu` VALUES ('27', 'menu', '', '0');
INSERT INTO `tb_menu` VALUES ('28', 'level', 'mlevel', '26');
INSERT INTO `tb_menu` VALUES ('29', 'hak akses', 'shakakses', '26');
INSERT INTO `tb_menu` VALUES ('30', 'user', 'suser', '26');
INSERT INTO `tb_menu` VALUES ('31', 'logout', '', '0');
INSERT INTO `tb_menu` VALUES ('32', 'admin', '', '0');

-- ----------------------------
-- Table structure for tb_orgterlibat
-- ----------------------------
DROP TABLE IF EXISTS `tb_orgterlibat`;
CREATE TABLE `tb_orgterlibat` (
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
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_orgterlibat_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_orgterlibat
-- ----------------------------
INSERT INTO `tb_orgterlibat` VALUES ('4', 'pengangkutan pupuk curah dari pelabuhan menuju 400', 'Muhammad Yasin', 'driver dump truck', 'siang', '-', '-', '30 tahun', 'L', '1', '-', 'lain - lain');
INSERT INTO `tb_orgterlibat` VALUES ('4', 'pulang kerja dari pelabuhan menuju gerbang pabrik II', 'andri ahmad bachtiar', 'bongkar muat pupuk ', 'siang', '-', '-', '-', 'L', '2', '-', '-');

-- ----------------------------
-- Table structure for tb_pekerja
-- ----------------------------
DROP TABLE IF EXISTS `tb_pekerja`;
CREATE TABLE `tb_pekerja` (
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
  KEY `id_statuskerja` (`id_statuskerja`),
  CONSTRAINT `tb_pekerja_ibfk_11` FOREIGN KEY (`id_shiftkerja`) REFERENCES `tb_shiftkerja` (`id_shiftkerja`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_pekerja_ibfk_16` FOREIGN KEY (`id_jabatan`) REFERENCES `tb_jabatan` (`id_jabatan`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_pekerja_ibfk_17` FOREIGN KEY (`id_bagian`) REFERENCES `tb_bagian` (`id_bagian`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_pekerja_ibfk_18` FOREIGN KEY (`id_department`) REFERENCES `tb_department` (`id_department`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `tb_pekerja_ibfk_19` FOREIGN KEY (`id_statuskerja`) REFERENCES `tb_statuskerja` (`id_statuskerja`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pekerja
-- ----------------------------
INSERT INTO `tb_pekerja` VALUES ('1', 'T243173', 'Surasa Budi Laksana', 'L', '', '', '', null, null, null, '1', null, '2001-05-02', '2001-05-02');
INSERT INTO `tb_pekerja` VALUES ('2', 'T253297', 'Kartika Yudha Irianto', 'L', '', '', '', null, null, null, '3', null, '2013-05-10', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('3', 'DK000018', 'Musthofa Ir', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('4', 'DK000020', 'Yulian Aldrin Pasha Drs., MA., Phd', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('5', 'DK000022', 'Taruna Dwidjaja Adi Drs., S.T., M.M', 'L', '', '', '', null, null, null, '2', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('6', 'D201001', 'Hidayat Nyakman', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('7', 'T324683', 'Satriyo Nugroho, Ir. M.T', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('8', 'T242785', 'Moh.Syamsul Hudha, Drs.AK.,M.M', 'L', '', '', '', null, null, null, '2', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('9', 'T221975', 'Yuharto', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('10', 'T242873', 'Mochammad Zubair', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('11', 'T284131', 'Sumedi', 'L', '', '', '', null, null, null, '3', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('12', 'T515183', 'Honi Wahyu', 'L', '', '', '', null, null, null, '2', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('13', 'T201220', 'Djuhari', 'L', '', '', '', null, null, null, '2', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('14', 'T242369', 'Chirul Anam', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('15', 'T253406', 'Bambang Setyawan', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('16', 'T232259', 'Bambang Tri Mei P', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('17', 'T242607', 'Sugeng Hariadi', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('18', 'T354775', 'Sugiyarto', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('19', 'T232236', 'Mardijono', '', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('20', 'T242986', 'Budi Widodo', 'L', '', '', '', null, null, null, '1', null, '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('25', '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', '8', '61', '15', '1', '66', '2000-05-04', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('26', 'io', 'ioio', 'L', '1', '1', '1', '12', '24', '41', '2', '65', '0000-00-00', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('27', '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', '12', '26', '15', '2', '66', '2000-05-04', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('28', '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', '12', '26', '15', '2', '64', '2000-05-04', '0000-00-00');
INSERT INTO `tb_pekerja` VALUES ('29', '', 'Nanang TS', 'L', '1950-05-06', 'jalan di gresik', 'gresik', '12', '26', '15', '2', '65', '2000-05-04', '0000-00-00');

-- ----------------------------
-- Table structure for tb_pemberitahuan
-- ----------------------------
DROP TABLE IF EXISTS `tb_pemberitahuan`;
CREATE TABLE `tb_pemberitahuan` (
  `instansi` text NOT NULL,
  `dilaporkanke` text NOT NULL,
  `komentar` text NOT NULL,
  `tgl` varchar(11) NOT NULL,
  `jam` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_pemberitahuan_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pemberitahuan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_pengkajiulang
-- ----------------------------
DROP TABLE IF EXISTS `tb_pengkajiulang`;
CREATE TABLE `tb_pengkajiulang` (
  `id_pengkajiulang` int(11) NOT NULL AUTO_INCREMENT,
  `NIK` varchar(11) NOT NULL,
  `komentar` text NOT NULL,
  `tanggal` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_pengkajiulang`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_pengkajiulang
-- ----------------------------

-- ----------------------------
-- Table structure for tb_penyebabdasar
-- ----------------------------
DROP TABLE IF EXISTS `tb_penyebabdasar`;
CREATE TABLE `tb_penyebabdasar` (
  `id_penyebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `id_subsebabdasar` int(11) NOT NULL,
  `penyebab` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_penyebabdasar`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_penyebabdasar
-- ----------------------------
INSERT INTO `tb_penyebabdasar` VALUES ('1', '1', '0', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('2', '1', 'oio', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('3', '3', 'zdhajksh', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('4', '1', 'oio', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('5', '3', 'zdhajksh', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('6', '2', 'dfjskldj skdjfk', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('7', '2', 'okekokeokeok', '1');
INSERT INTO `tb_penyebabdasar` VALUES ('8', '0', '', '1');

-- ----------------------------
-- Table structure for tb_perawatan
-- ----------------------------
DROP TABLE IF EXISTS `tb_perawatan`;
CREATE TABLE `tb_perawatan` (
  `id_perawatan` int(11) NOT NULL AUTO_INCREMENT,
  `penanggungjawab` varchar(20) NOT NULL,
  `tanggal` int(11) NOT NULL,
  `waktu` varchar(20) NOT NULL,
  `nama_tempat_pengobatan` varchar(30) NOT NULL,
  `contact_person` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `hasil_perawatan` text NOT NULL,
  `deskripsi` text NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_perawatan`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_perawatan_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_perawatan
-- ----------------------------

-- ----------------------------
-- Table structure for tb_perbaikan
-- ----------------------------
DROP TABLE IF EXISTS `tb_perbaikan`;
CREATE TABLE `tb_perbaikan` (
  `id_perbaikan` int(11) NOT NULL AUTO_INCREMENT,
  `id_investigasi` int(11) NOT NULL,
  `tindakan` text NOT NULL,
  `nama_petugas` varchar(11) NOT NULL,
  `tgl_target` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_perbaikan`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_perbaikan
-- ----------------------------
INSERT INTO `tb_perbaikan` VALUES ('1', '9', 'mewajibkan setiap kontraktor yang tidak berada langsung dibawah PT. PKG tetapi melawati area kerja PT.PKG untukj mengikuti kegiatan Pengarahan K3 (safety induction)', 'T253297', '2012', '1');
INSERT INTO `tb_perbaikan` VALUES ('2', '17', 'memindahkan rambu rambu informasi kecepatan maksimal ke lokasi yang lebih mudah telihat ', '4', '2012', '1');

-- ----------------------------
-- Table structure for tb_produk
-- ----------------------------
DROP TABLE IF EXISTS `tb_produk`;
CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_produk
-- ----------------------------
INSERT INTO `tb_produk` VALUES ('1', 'asam sulfat II');
INSERT INTO `tb_produk` VALUES ('2', 'ZA II');
INSERT INTO `tb_produk` VALUES ('3', 'PA');
INSERT INTO `tb_produk` VALUES ('4', 'CR');
INSERT INTO `tb_produk` VALUES ('5', 'AIF3');

-- ----------------------------
-- Table structure for tb_safetyp
-- ----------------------------
DROP TABLE IF EXISTS `tb_safetyp`;
CREATE TABLE `tb_safetyp` (
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
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_safetyp
-- ----------------------------
INSERT INTO `tb_safetyp` VALUES ('1', '586392', '78186', '17264', '3', '20', '2', '2010', '2', '0');
INSERT INTO `tb_safetyp` VALUES ('2', '602608', '62240', '20648', '0', '0', '3', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('3', '586464', '64224', '23720', '0', '0', '6', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('4', '613840', '60273', '34640', '0', '0', '5', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('5', '570000', '85355', '20655', '0', '0', '1', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('6', '577104', '69', '18608', '0', '0', '4', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('7', '608232', '59711', '24520', '0', '0', '7', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('8', '598344', '51658', '33232', '0', '0', '8', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('9', '571320', '66898', '15120', '0', '0', '9', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('10', '608512', '53408', '22216', '0', '0', '10', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('11', '582408', '51979', '40144', '0', '0', '11', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('12', '572704', '49954', '54360', '0', '0', '12', '2012', '0', '0');
INSERT INTO `tb_safetyp` VALUES ('13', '2', '2', '2', '2', '2', '1', '1997', '2', '2');
INSERT INTO `tb_safetyp` VALUES ('14', '88', '88', '88', '88', '88', '3', '2012', '88', '88');
INSERT INTO `tb_safetyp` VALUES ('15', '1', '2', '3', '5', '6', '4', '2013', '4', '7');
INSERT INTO `tb_safetyp` VALUES ('16', '66', '11', '11', '5', '4', '2', '2013', '7', '2');

-- ----------------------------
-- Table structure for tb_saksi
-- ----------------------------
DROP TABLE IF EXISTS `tb_saksi`;
CREATE TABLE `tb_saksi` (
  `id_saksi` int(11) NOT NULL AUTO_INCREMENT,
  `id_kecelakaan` int(11) NOT NULL,
  `NIK` int(11) NOT NULL,
  PRIMARY KEY (`id_saksi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_saksi
-- ----------------------------

-- ----------------------------
-- Table structure for tb_samplingemisi
-- ----------------------------
DROP TABLE IF EXISTS `tb_samplingemisi`;
CREATE TABLE `tb_samplingemisi` (
  `id_samplingemisi` int(11) NOT NULL AUTO_INCREMENT,
  `id_gas` int(11) NOT NULL,
  `id_tempatsampling` int(11) NOT NULL,
  `baku_mutu` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  PRIMARY KEY (`id_samplingemisi`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_samplingemisi
-- ----------------------------
INSERT INTO `tb_samplingemisi` VALUES ('1', '1', '1', '1000', '1');
INSERT INTO `tb_samplingemisi` VALUES ('2', '5', '2', '230', '1');
INSERT INTO `tb_samplingemisi` VALUES ('3', '1', '2', '800', '1');
INSERT INTO `tb_samplingemisi` VALUES ('4', '2', '2', '1000', '1');
INSERT INTO `tb_samplingemisi` VALUES ('5', '5', '3', '230', '1');
INSERT INTO `tb_samplingemisi` VALUES ('6', '1', '3', '800', '1');
INSERT INTO `tb_samplingemisi` VALUES ('7', '3', '4', '250', '2');
INSERT INTO `tb_samplingemisi` VALUES ('8', '5', '8', '250', '4');
INSERT INTO `tb_samplingemisi` VALUES ('9', '3', '5', '250', '2');
INSERT INTO `tb_samplingemisi` VALUES ('10', '2', '3', '1000', '1');
INSERT INTO `tb_samplingemisi` VALUES ('11', '4', '6', '10', '3');
INSERT INTO `tb_samplingemisi` VALUES ('12', '5', '7', '200', '1');
INSERT INTO `tb_samplingemisi` VALUES ('13', '4', '8', '10', '4');
INSERT INTO `tb_samplingemisi` VALUES ('14', '5', '9', '200', '5');
INSERT INTO `tb_samplingemisi` VALUES ('15', '4', '9', '10', '5');

-- ----------------------------
-- Table structure for tb_sebabdasar
-- ----------------------------
DROP TABLE IF EXISTS `tb_sebabdasar`;
CREATE TABLE `tb_sebabdasar` (
  `id_sebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `nm_sebabdasar` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_sebabdasar`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_sebabdasar
-- ----------------------------
INSERT INTO `tb_sebabdasar` VALUES ('1', 'manusia', '');
INSERT INTO `tb_sebabdasar` VALUES ('2', 'peralatan', '');
INSERT INTO `tb_sebabdasar` VALUES ('3', 'sabotase', '');
INSERT INTO `tb_sebabdasar` VALUES ('4', 'lain', '');

-- ----------------------------
-- Table structure for tb_shiftkerja
-- ----------------------------
DROP TABLE IF EXISTS `tb_shiftkerja`;
CREATE TABLE `tb_shiftkerja` (
  `id_shiftkerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_shiftkerja` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_shiftkerja`)
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_shiftkerja
-- ----------------------------
INSERT INTO `tb_shiftkerja` VALUES ('63', 'siang', 'siang sekali ');
INSERT INTO `tb_shiftkerja` VALUES ('64', 'pagi', 'shift pagi ');
INSERT INTO `tb_shiftkerja` VALUES ('65', 'malam', 'shift malam');
INSERT INTO `tb_shiftkerja` VALUES ('66', '=lainnya=', 'tidak ada dalam daftar');
INSERT INTO `tb_shiftkerja` VALUES ('67', 'ok', 'kos');

-- ----------------------------
-- Table structure for tb_statuskerja
-- ----------------------------
DROP TABLE IF EXISTS `tb_statuskerja`;
CREATE TABLE `tb_statuskerja` (
  `id_statuskerja` int(11) NOT NULL AUTO_INCREMENT,
  `nama_statuskerja` varchar(20) NOT NULL,
  PRIMARY KEY (`id_statuskerja`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_statuskerja
-- ----------------------------
INSERT INTO `tb_statuskerja` VALUES ('1', 'permanen');
INSERT INTO `tb_statuskerja` VALUES ('2', 'harian');
INSERT INTO `tb_statuskerja` VALUES ('3', 'kontrak');
INSERT INTO `tb_statuskerja` VALUES ('4', '=lainnya=');

-- ----------------------------
-- Table structure for tb_subjkecel
-- ----------------------------
DROP TABLE IF EXISTS `tb_subjkecel`;
CREATE TABLE `tb_subjkecel` (
  `id_subjkecel` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subjkecel` varchar(50) NOT NULL,
  `ket_subjkecel` text NOT NULL,
  `id_jkecel` int(11) NOT NULL,
  PRIMARY KEY (`id_subjkecel`),
  KEY `id_jkecel` (`id_jkecel`),
  CONSTRAINT `tb_subjkecel_ibfk_1` FOREIGN KEY (`id_jkecel`) REFERENCES `tb_jkecel` (`id_jkecel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_subjkecel
-- ----------------------------
INSERT INTO `tb_subjkecel` VALUES ('1', 'kecelakaan', 'kecelakaan kerja ( cidera akibat kerja )', '1');
INSERT INTO `tb_subjkecel` VALUES ('2', 'non', 'bukan kecelakaan kerja (bukan cidera akibat kerja)', '1');
INSERT INTO `tb_subjkecel` VALUES ('3', 'penyakit', 'penyakit akibat kerja ( sakit akibat kerja )', '1');
INSERT INTO `tb_subjkecel` VALUES ('4', 'equipment', 'kerusakan equipment', '2');
INSERT INTO `tb_subjkecel` VALUES ('5', 'properti', 'kerusakan properti perusahaan', '2');
INSERT INTO `tb_subjkecel` VALUES ('6', 'lingkungan', 'kerusakan lingkungan', '2');
INSERT INTO `tb_subjkecel` VALUES ('7', 'produksi', 'gangguan produksi', '2');
INSERT INTO `tb_subjkecel` VALUES ('8', 'masyarakat', 'dmapak pada masyarakat', '2');
INSERT INTO `tb_subjkecel` VALUES ('9', 'keamanan', 'gangguan pada keamaanan', '2');

-- ----------------------------
-- Table structure for tb_subjkecel2
-- ----------------------------
DROP TABLE IF EXISTS `tb_subjkecel2`;
CREATE TABLE `tb_subjkecel2` (
  `id_subjkecel2` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subjkecel2` varchar(50) NOT NULL,
  `ket_subjkecel2` text NOT NULL,
  `id_subjkecel` int(11) NOT NULL,
  PRIMARY KEY (`id_subjkecel2`),
  KEY `id_subjkecel` (`id_subjkecel`),
  CONSTRAINT `tb_subjkecel2_ibfk_1` FOREIGN KEY (`id_subjkecel`) REFERENCES `tb_subjkecel` (`id_subjkecel`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_subjkecel2
-- ----------------------------
INSERT INTO `tb_subjkecel2` VALUES ('1', 'LTI', 'Lost Time Incident (tidak mampu bekerja selama 2 hari )', '1');
INSERT INTO `tb_subjkecel2` VALUES ('2', 'RWI', 'Restricted work Injury(bisa kembali bekerja dengan pembatasan akrivitas) ', '1');
INSERT INTO `tb_subjkecel2` VALUES ('3', 'MTI', 'Medical Treatment Injury (perawatan cidera denga peralatan medis) ', '1');
INSERT INTO `tb_subjkecel2` VALUES ('4', 'FAI', 'First Aid Injury (pewatan cidera dengan P3K)', '1');

-- ----------------------------
-- Table structure for tb_subsebabdasar
-- ----------------------------
DROP TABLE IF EXISTS `tb_subsebabdasar`;
CREATE TABLE `tb_subsebabdasar` (
  `id_subsebabdasar` int(11) NOT NULL AUTO_INCREMENT,
  `nm_subsebabdasar` varchar(50) NOT NULL,
  `id_sebabdasar` int(11) NOT NULL,
  PRIMARY KEY (`id_subsebabdasar`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_subsebabdasar
-- ----------------------------
INSERT INTO `tb_subsebabdasar` VALUES ('1', 'procedure', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('2', 'training', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('3', 'quality control', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('4', 'communication', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('5', 'management system', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('6', 'human engineering', '1');
INSERT INTO `tb_subsebabdasar` VALUES ('7', 'work direction', '1');

-- ----------------------------
-- Table structure for tb_tempatsampling
-- ----------------------------
DROP TABLE IF EXISTS `tb_tempatsampling`;
CREATE TABLE `tb_tempatsampling` (
  `keterangan` text NOT NULL,
  `id_tempatsampling` int(20) NOT NULL AUTO_INCREMENT,
  `nama_tempatsampling` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tempatsampling`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tempatsampling
-- ----------------------------
INSERT INTO `tb_tempatsampling` VALUES ('D1303 room', '1', 'D1303');
INSERT INTO `tb_tempatsampling` VALUES ('B6201 room', '2', 'B6201 ');
INSERT INTO `tb_tempatsampling` VALUES ('B6203 room', '3', 'B6203');
INSERT INTO `tb_tempatsampling` VALUES ('T5201 room', '4', 'T5201 ');
INSERT INTO `tb_tempatsampling` VALUES ('T5601 room', '5', 'T5601 ');
INSERT INTO `tb_tempatsampling` VALUES ('C2341 room', '6', 'C2341 ');
INSERT INTO `tb_tempatsampling` VALUES ('C2202 room', '7', 'C2202 ');
INSERT INTO `tb_tempatsampling` VALUES ('T4201 room', '8', 'T4201 ');
INSERT INTO `tb_tempatsampling` VALUES ('D3132 room', '9', 'D3132 ');
INSERT INTO `tb_tempatsampling` VALUES ('unit batu bara', '10', 'UBB');

-- ----------------------------
-- Table structure for tb_timinvestigasi
-- ----------------------------
DROP TABLE IF EXISTS `tb_timinvestigasi`;
CREATE TABLE `tb_timinvestigasi` (
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

-- ----------------------------
-- Records of tb_timinvestigasi
-- ----------------------------
INSERT INTO `tb_timinvestigasi` VALUES ('2', '3', '4', '5', '2', '3', '4', '5', '2', '3', '4', '5', '0');
INSERT INTO `tb_timinvestigasi` VALUES ('2', '3', '4', '5', '2', '3', '4', '5', '2', '3', '4', '5', '1');
INSERT INTO `tb_timinvestigasi` VALUES ('2', '3', '4', '5', '2', '3', '4', '5', '2', '3', '4', '5', '1');

-- ----------------------------
-- Table structure for tb_timinvestigasix
-- ----------------------------
DROP TABLE IF EXISTS `tb_timinvestigasix`;
CREATE TABLE `tb_timinvestigasix` (
  `id_timinvestigasi` int(11) NOT NULL AUTO_INCREMENT,
  `id_pekerja` int(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  PRIMARY KEY (`id_timinvestigasi`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_timinvestigasix
-- ----------------------------

-- ----------------------------
-- Table structure for tb_tindakan
-- ----------------------------
DROP TABLE IF EXISTS `tb_tindakan`;
CREATE TABLE `tb_tindakan` (
  `id_tindakan` int(11) NOT NULL AUTO_INCREMENT,
  `penindak` varchar(11) NOT NULL,
  `tindakan` text NOT NULL,
  `tanggal_tindakan` varchar(11) NOT NULL,
  `id_kecelakaan` int(11) NOT NULL,
  `jam_tindakan` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tindakan`),
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_tindakan_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tindakan
-- ----------------------------
INSERT INTO `tb_tindakan` VALUES ('1', 'satpam', 'pengamanan lokasi', '2012-10-22', '4', '16.50');
INSERT INTO `tb_tindakan` VALUES ('2', 'ambulance', 'pengantaran korban AAB ke RS Dr. Soetomo Surabaya', '2012-10-22', '4', '17.05');
INSERT INTO `tb_tindakan` VALUES ('3', 'satpam', 'pengaturan lalu lintas jalan pelabuhan - {abrik II', '2', '4', '17.30');

-- ----------------------------
-- Table structure for tb_tingkatresiko
-- ----------------------------
DROP TABLE IF EXISTS `tb_tingkatresiko`;
CREATE TABLE `tb_tingkatresiko` (
  `id_kecelakaan` int(11) NOT NULL,
  `konsekuensi_aktual` enum('catastrophic','major','moderate','minor','insignificant') NOT NULL,
  `konsekuensi_potensial` enum('catastrophic','major','moderate','minor','insignificant') NOT NULL,
  `kemungkinan` enum('almost certain','likely','possible','unlikely','rare') NOT NULL,
  `tingkat_resiko_aktual` enum('low','medium','high','extreme') NOT NULL,
  `tingkat_resiko_potensial` enum('low','medium','high','extreme') NOT NULL,
  `status` enum('awal','akhir') NOT NULL,
  KEY `id_kecelakaan` (`id_kecelakaan`),
  CONSTRAINT `tb_tingkatresiko_ibfk_1` FOREIGN KEY (`id_kecelakaan`) REFERENCES `tb_kecelakaan` (`id_kecelakaan`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tingkatresiko
-- ----------------------------

-- ----------------------------
-- Table structure for tb_tipedampak
-- ----------------------------
DROP TABLE IF EXISTS `tb_tipedampak`;
CREATE TABLE `tb_tipedampak` (
  `id_tipedampak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_tipedampak` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  PRIMARY KEY (`id_tipedampak`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tb_tipedampak
-- ----------------------------
INSERT INTO `tb_tipedampak` VALUES ('1', 'water-ground', 'air - tanah');
INSERT INTO `tb_tipedampak` VALUES ('2', 'water - surface', 'air permukaan');
INSERT INTO `tb_tipedampak` VALUES ('3', 'flora', 'tumbuhan');
INSERT INTO `tb_tipedampak` VALUES ('4', 'land-undisturbed', 'tanah tak terganggu');
INSERT INTO `tb_tipedampak` VALUES ('5', 'land-rehabilitated', 'tanah-rehabilitasi');
INSERT INTO `tb_tipedampak` VALUES ('6', 'land-general', 'tanah-umum');
INSERT INTO `tb_tipedampak` VALUES ('7', 'culture', 'budaya');
INSERT INTO `tb_tipedampak` VALUES ('8', 'heritage', 'warisan');
INSERT INTO `tb_tipedampak` VALUES ('9', 'air quality/polution', 'kualitas udara/polusi');
INSERT INTO `tb_tipedampak` VALUES ('10', 'fauna', 'hewan');
INSERT INTO `tb_tipedampak` VALUES ('11', 'community/public', 'komunitas/masyarakat');
INSERT INTO `tb_tipedampak` VALUES ('12', 'others', 'lainnya');

-- ----------------------------
-- Table structure for tb_users
-- ----------------------------
DROP TABLE IF EXISTS `tb_users`;
CREATE TABLE `tb_users` (
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

-- ----------------------------
-- Records of tb_users
-- ----------------------------
INSERT INTO `tb_users` VALUES ('admin', '21232f297a57a5a743894a0e4a801fc3', 'Natasha', 'admin@detik.com', '08238923848', 'admin', 'N', 'nh092d2gb4snbdj70pjmtfnfd3', 'Koala.jpg');
INSERT INTO `tb_users` VALUES ('user', 'ee11cbb19052e40b07aac0ca060c23ee', 'user', 'sinto@detik.com', '09945849545', 'user', 'N', 'nd3cn4jd7s5lp6gib01r50cka4', 'kucing.jpg');
INSERT INTO `tb_users` VALUES ('nata', '093d8a0793df4654fee95cc1215555b3', 'nata', '', '', 'admin', 'N', 'tafd39p4op486je0jlrqh90pu3', 'nata.png');
INSERT INTO `tb_users` VALUES ('wiros', 'dcdd932ea3418387ef2f06644303389e', 'wiryo', 'wiryo@sableng', '98797', 'user', 'N', '25005d71e4f9a670ebf111888a0916b2', '');
INSERT INTO `tb_users` VALUES ('', '9a281eea0823964dfb2915823c248417', 'u', 'iu', '', 'user', 'N', '', '');
INSERT INTO `tb_users` VALUES ('jhj', '2510c39011c5be704182423e3a695e91', 'h', 'jhj', '', 'user', 'N', '', '');
INSERT INTO `tb_users` VALUES ('R', 'e1e1d3d40573127e9ee0480caf1283d6', 'rrRR', 'R', '', 'user', 'N', '', '');
