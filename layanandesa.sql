-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2021 at 04:13 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `1layanandesa`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_dusun`
--

CREATE TABLE `tb_dusun` (
  `id_dusun` int(11) NOT NULL,
  `nama_dusun` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jabatan`
--

CREATE TABLE `tb_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jabatan`
--

INSERT INTO `tb_jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Kepala Desa'),
(2, 'Sekretaris Desa'),
(3, 'Seksi Pemerintahan'),
(4, 'Seksi Pemas Desa'),
(5, 'Seksi Kensos'),
(6, 'Kaur PEP'),
(7, 'Kaur Keuangan'),
(8, 'Kaur Umum');

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenissurat`
--

CREATE TABLE `tb_jenissurat` (
  `id_jenis` int(11) NOT NULL,
  `nama_surat` varchar(35) NOT NULL,
  `nomor_kode` varchar(9) NOT NULL,
  `jenis` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_jenissurat`
--

INSERT INTO `tb_jenissurat` (`id_jenis`, `nama_surat`, `nomor_kode`, `jenis`) VALUES
(1, 'Surat Keterangan', '470', 'Administrasi'),
(2, 'Surat Keterangan Tidak Mampu', '470', 'Administrasi'),
(3, 'Surat Keterangan Usaha', '517', 'Administrasi'),
(4, 'Surat Keterangan kelahiran', 'F-2.01', 'Formulir'),
(5, 'Formulir KTP', 'F-1.21', 'Formulir'),
(6, 'Surat Pengantar', '475', 'Administrasi'),
(7, 'Formulir KK', 'F-1.15', 'Formulir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kabupaten`
--

CREATE TABLE `tb_kabupaten` (
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `kabupaten` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kabupaten`
--

INSERT INTO `tb_kabupaten` (`id_kabupaten`, `id_provinsi`, `kabupaten`) VALUES
(1, 1, 'Bondowoso'),
(2, 1, 'Jember'),
(3, 1, 'Banyuwangi'),
(4, 1, 'Situbondo'),
(5, 1, 'Pasuruan'),
(6, 1, 'Pacitan'),
(7, 1, 'Ponorogo'),
(8, 1, 'Trenggalek'),
(9, 1, 'Tulungagung'),
(10, 1, 'Blitar'),
(11, 1, 'Kediri'),
(12, 1, 'Malang'),
(13, 1, 'Lumajang'),
(14, 1, 'Gresik'),
(15, 1, 'Probolinggo'),
(16, 1, 'Sumenep'),
(17, 1, 'Sidoarjo'),
(18, 1, 'Mojokerto'),
(19, 1, 'Jombang'),
(20, 1, 'Nganjuk');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `kecamatan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `id_kabupaten`, `kecamatan`) VALUES
(1, 1, 'Sukosari'),
(2, 1, 'Sumber Wringin'),
(3, 1, 'Tapen'),
(4, 1, 'Cermee'),
(5, 1, 'Sempol'),
(6, 1, 'Binakal'),
(7, 1, 'Bondowoso'),
(8, 1, 'Botolinggo'),
(9, 1, 'Curahdami'),
(10, 1, 'Grujugan'),
(11, 1, 'Klabang'),
(12, 1, 'Maesan'),
(13, 1, 'Pakem'),
(14, 1, 'Prajekan'),
(15, 1, 'Pujer'),
(16, 1, 'Tamankrocok'),
(17, 1, 'Tamanan'),
(18, 1, 'Tegalampel'),
(19, 1, 'Tenggarang'),
(20, 1, 'Wonosari'),
(21, 2, 'Kencong'),
(22, 2, 'Ledokombo'),
(23, 2, 'Mayang'),
(24, 2, 'Mumbulsari'),
(25, 2, 'Pakusari'),
(26, 2, 'Panti'),
(27, 2, 'Patrang'),
(28, 2, 'Puger'),
(29, 2, 'Rambipuji'),
(30, 2, 'Ajung'),
(31, 2, 'Ambulu'),
(32, 2, 'Arjasa'),
(33, 2, 'Balung'),
(34, 2, 'Bangsalsari'),
(35, 2, 'Gumuk Mas'),
(36, 2, 'Jelbuk'),
(37, 2, 'Jenggawah'),
(38, 2, 'Jombang'),
(39, 2, 'Kalisat'),
(40, 2, 'Kaliwates'),
(41, 3, 'Bangorejo'),
(42, 3, 'Banyuwangi'),
(43, 3, 'Cluring'),
(44, 3, 'Gambiran'),
(45, 3, 'Genteng'),
(46, 3, 'Giri'),
(47, 3, 'Glagah'),
(48, 3, 'Glenmore'),
(49, 3, 'Kabat '),
(50, 3, 'Kalibaru'),
(51, 3, 'Kalipuro'),
(52, 3, 'Licin'),
(53, 3, 'Muncar'),
(54, 3, 'Pesanggaran'),
(55, 3, 'Purwoharjo'),
(56, 3, 'Rogojampi'),
(57, 3, 'Sempu'),
(58, 3, 'Siliragung'),
(59, 3, 'Singojuruh'),
(60, 3, 'Songgon'),
(61, 4, 'Arjasa'),
(62, 4, 'Asembagus'),
(63, 4, 'Banyuglugur'),
(64, 4, 'Banyuputih'),
(65, 4, 'Besuki'),
(66, 4, 'Bungatan'),
(67, 4, 'Jangkar'),
(68, 4, 'Jatibanteng'),
(69, 4, 'Kapongan'),
(70, 4, 'Kendit'),
(71, 4, 'Mangaran'),
(72, 4, 'Mlandingan'),
(73, 4, 'Panarukan'),
(74, 4, 'Panji'),
(75, 4, 'Situbondo'),
(76, 4, 'Suboh'),
(77, 4, 'Sumbermalang'),
(81, 5, 'Bangil'),
(82, 5, 'Beji'),
(83, 5, 'Gempol'),
(84, 5, 'Sukorejo'),
(85, 5, 'Gondang Wetan'),
(86, 5, 'Grati'),
(87, 5, 'Kejayan'),
(88, 5, 'Kraton'),
(89, 5, 'Lekok'),
(90, 5, 'Lumbang'),
(91, 5, 'Nguling'),
(92, 5, 'Pandaan'),
(93, 5, 'Pasrepan'),
(94, 5, 'Pohjentrek'),
(95, 5, 'Prigen'),
(96, 5, 'Purwodadi'),
(97, 5, 'Purwosari'),
(98, 5, 'Puspo'),
(99, 5, 'Rejoso'),
(100, 5, 'Rembang'),
(101, 6, 'Arjosari'),
(102, 6, 'Bandar'),
(103, 6, 'Donorojo'),
(104, 6, 'Kebon Agung'),
(105, 6, 'Nawangan'),
(106, 6, 'Ngadirojo'),
(107, 6, 'Pacitan'),
(108, 6, 'Pringkuku'),
(109, 6, 'Punung'),
(110, 6, 'Sudimoro'),
(111, 6, 'Tegalombo'),
(112, 6, 'Tulakan'),
(113, 7, 'Babadan'),
(114, 7, 'Badegan'),
(115, 7, 'Balong'),
(116, 7, 'Bungkal'),
(117, 7, 'Jambon'),
(118, 7, 'Jenangan'),
(119, 7, 'Jetis'),
(120, 7, 'Kauman'),
(121, 7, 'Mlarak'),
(122, 7, 'Ngebel'),
(123, 7, 'Ngerayun'),
(124, 7, 'Ponorogo'),
(125, 7, 'Pudak'),
(126, 7, 'Pulung'),
(127, 7, 'Sambit'),
(128, 7, 'Sampung'),
(129, 7, 'Sawoo'),
(130, 7, 'Siman'),
(131, 7, 'Slahung'),
(132, 7, 'Sooko'),
(133, 8, 'Bendungan'),
(134, 8, 'Dongko'),
(135, 8, 'Durenan'),
(136, 8, 'Gandusari'),
(137, 8, 'Kampak'),
(138, 8, 'Karangan'),
(139, 8, 'Munjungan'),
(140, 8, 'Panggul'),
(141, 8, 'Pogalan'),
(142, 8, 'Pule'),
(143, 8, 'Suruh'),
(144, 8, 'Trenggalek'),
(145, 8, 'Tugu'),
(146, 8, 'Watulimo'),
(147, 9, 'Bandung'),
(148, 9, 'Besuki'),
(149, 9, 'Boyolangu'),
(150, 9, 'Campur Darat'),
(151, 9, 'Gondang'),
(152, 9, 'Kalidawir'),
(153, 9, 'Karang Rejo'),
(154, 9, 'Kauman'),
(155, 9, 'Kedung Waru'),
(156, 9, 'Ngantru'),
(157, 9, 'Ngunut'),
(158, 9, 'Pagerwojo'),
(159, 9, 'Pakel'),
(160, 9, 'Pucanglaban'),
(161, 9, 'Rejotangan'),
(162, 9, 'Sendang'),
(163, 9, 'Sumbergempol'),
(164, 9, 'Tanggung Gunung'),
(165, 9, 'Tulungagung'),
(166, 10, 'Bakung'),
(167, 10, 'Binangun'),
(168, 10, 'Doko'),
(169, 10, 'Gandusari'),
(170, 10, 'Garum'),
(171, 10, 'Kademangan'),
(172, 10, 'Kanigoro'),
(173, 10, 'Kesamben'),
(174, 10, 'Nglegok'),
(175, 10, 'Panggungrejo'),
(176, 10, 'Ponggok'),
(177, 10, 'Sanan Kulon'),
(178, 10, 'Selopuro'),
(179, 10, 'Selorejo'),
(180, 10, 'Srengat'),
(181, 10, 'Sutojayan'),
(182, 10, 'Talun'),
(183, 10, 'Udanawu'),
(184, 10, 'Wates'),
(185, 10, 'Wlingi'),
(186, 11, 'Badas'),
(187, 11, 'Banyakan'),
(188, 11, 'Gampengrejo'),
(189, 11, 'Grogol'),
(190, 11, 'Kandangan'),
(191, 11, 'Kandat'),
(192, 11, 'Kayen Kidul'),
(193, 11, 'Kepung'),
(194, 11, 'Kras'),
(195, 11, 'Kunjang'),
(196, 11, 'Mojo'),
(197, 11, 'Ngadiluwih'),
(198, 11, 'Ngancar'),
(199, 11, 'Ngasem'),
(200, 11, 'Pagu'),
(201, 11, 'Papar'),
(202, 11, 'Pare'),
(203, 11, 'Plemahan'),
(204, 11, 'Plosoklaten'),
(205, 11, 'Puncu'),
(206, 12, 'Ampelgading'),
(207, 12, 'Bantur'),
(208, 12, 'Bululawang'),
(209, 12, 'Dampit'),
(210, 12, 'Dau'),
(211, 12, 'Donomulyo'),
(212, 12, 'Gedangan'),
(213, 12, 'Gondanglegi'),
(214, 12, 'Jabung'),
(215, 12, 'Kalipare'),
(216, 12, 'Karangploso'),
(217, 12, 'Kasembon'),
(218, 12, 'Kepanjen'),
(219, 12, 'Kromengan'),
(220, 12, 'Lawang'),
(221, 12, 'Ngajum'),
(222, 12, 'Ngantang'),
(223, 12, 'Pagak'),
(224, 12, 'Pagelaran'),
(225, 12, 'Pakis'),
(226, 13, 'Ranuyoso'),
(227, 13, 'Klakah'),
(228, 13, 'Kedungjajang'),
(229, 13, 'Randuagung'),
(230, 13, 'Jatiroto'),
(231, 13, 'Rowokangkung'),
(232, 13, 'Yosowilangun'),
(233, 13, 'Tekung'),
(234, 13, 'Kunir'),
(235, 13, 'Tempeh'),
(236, 13, 'Sumbersuko'),
(237, 13, 'Lumajang'),
(238, 13, 'Sukodono'),
(239, 13, 'Padang'),
(240, 13, 'Gucialit'),
(241, 13, 'Senduro'),
(242, 13, 'Pasrujambe'),
(243, 13, 'Candipuro'),
(244, 13, 'Pasirian'),
(245, 13, 'Pronojiwo'),
(246, 14, 'Balong Panggang'),
(247, 14, 'Benjeng'),
(248, 14, 'Bungah'),
(249, 14, 'Cerme'),
(250, 14, 'Driyorejo'),
(251, 14, 'Duduk Sampeyan'),
(252, 14, 'Dukun'),
(253, 14, 'Gresik'),
(254, 14, 'Kebomas'),
(255, 14, 'Kedamean'),
(256, 14, 'Manyar'),
(257, 14, 'Menganti'),
(258, 14, 'Panceng'),
(259, 14, 'Sangkapura'),
(260, 14, 'Sidayu'),
(261, 14, 'Tambak'),
(262, 14, 'Ujung Pangkah'),
(263, 14, 'Wringin Anom'),
(264, 15, 'Bantaran'),
(265, 15, 'Banyu Anyar'),
(266, 15, 'Besuk'),
(267, 15, 'Dringu'),
(268, 15, 'Gading'),
(269, 15, 'Gending'),
(270, 15, 'Kota Anyar'),
(271, 15, 'Kraksaan'),
(272, 15, 'Krejengan'),
(273, 15, 'Krucil'),
(274, 15, 'Kuripan'),
(275, 15, 'Leces'),
(276, 15, 'Lumbang'),
(277, 15, 'Maron'),
(278, 15, 'Paiton'),
(279, 15, 'Pajarakan'),
(280, 15, 'Pakuniran'),
(281, 15, 'Sukapura'),
(282, 15, 'Sumber'),
(283, 15, 'Sumberasih'),
(284, 16, 'Ambunten'),
(285, 16, 'Arjasa'),
(286, 16, 'Batang Batang'),
(287, 16, 'Batuan'),
(288, 16, 'Batuputih'),
(289, 16, 'Bluto'),
(290, 16, 'Dasuk'),
(291, 16, 'Dungkek'),
(292, 16, 'Ganding'),
(293, 16, 'Gapura'),
(294, 16, 'Gayam'),
(295, 16, 'Gili Genteng'),
(296, 16, 'Guluk Guluk'),
(297, 16, 'Kalianget'),
(298, 16, 'Kangayan'),
(299, 16, 'Kota Sumenep'),
(300, 16, 'Lenteng'),
(301, 16, 'Manding'),
(302, 16, 'Masalembu'),
(303, 16, 'Nonggunong'),
(304, 17, 'Balongbendo'),
(305, 17, 'Buduran'),
(306, 17, 'Candi'),
(307, 17, 'Gedangan'),
(308, 17, 'Jabon'),
(309, 17, 'Krembung'),
(310, 17, 'Krian'),
(311, 17, 'Porong'),
(312, 17, 'Prambon'),
(313, 17, 'Sedati'),
(314, 17, 'Sidoarjo'),
(315, 17, 'Sukodono'),
(316, 17, 'Taman'),
(317, 17, 'Tanggulangin'),
(318, 17, 'Tarik'),
(319, 17, 'Wonoayu'),
(320, 17, 'Tulangan'),
(321, 17, 'Waru'),
(322, 18, 'Bangsal'),
(323, 18, 'Dawar Blandong'),
(324, 18, 'Dlanggu'),
(325, 18, 'Gedeg'),
(326, 18, 'Gondang'),
(327, 18, 'Jatirejo'),
(328, 18, 'Jetis'),
(329, 18, 'Kemlagi'),
(330, 18, 'Kutorejo'),
(331, 18, 'Mojoanyar'),
(332, 18, 'Mojosari'),
(333, 18, 'Ngoro'),
(334, 18, 'Pacet'),
(335, 18, 'Pungging'),
(336, 18, 'Puri'),
(337, 18, 'Sooko'),
(338, 18, 'Trawas'),
(339, 18, 'Trowulan'),
(340, 19, 'Bandar Kedung Mulyo'),
(341, 19, 'Bareng'),
(342, 19, 'Diwek'),
(343, 19, 'Gudo'),
(344, 19, 'Jogoroto'),
(345, 19, 'Jombang'),
(346, 19, 'Kabuh'),
(347, 19, 'Kesamben'),
(348, 19, 'Kudu'),
(349, 19, 'Megaluh'),
(350, 19, 'Mojoagung'),
(351, 19, 'Mojowarno'),
(352, 19, 'Ngoro'),
(353, 19, 'Ngusikan'),
(354, 19, 'Perak'),
(355, 19, 'Peterongan'),
(356, 19, 'Plandaan'),
(357, 19, 'Ploso'),
(358, 19, 'Sumobito'),
(359, 19, 'Tembelang'),
(360, 20, 'Bagor'),
(361, 20, 'Baron'),
(362, 20, 'Berbek'),
(363, 20, 'Gondang'),
(364, 20, 'Jatikalen'),
(365, 20, 'Kertosono'),
(366, 20, 'Lengkong'),
(367, 20, 'Loceret'),
(368, 20, 'Nganjuk'),
(369, 20, 'Ngetos'),
(370, 20, 'Ngluyu'),
(371, 20, 'Ngronggot'),
(372, 20, 'Pace'),
(373, 20, 'Patianrowo'),
(374, 20, 'Prambon'),
(375, 20, 'Rejoso'),
(376, 20, 'Sawahan'),
(377, 20, 'Sukomoro'),
(378, 20, 'Tanjunganom'),
(379, 20, 'Wilangan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelahiran`
--

CREATE TABLE `tb_kelahiran` (
  `id_kelahiran` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `hari_lahir` varchar(10) NOT NULL,
  `pukul` varchar(9) NOT NULL,
  `lokasi_lahir` enum('RS/RB','Puskesmas','Polindes','Rumah','Lainnya') NOT NULL,
  `kelahiran_ke` int(2) NOT NULL,
  `penolong_kelahiran` enum('Dokter','Bidan/Perawat','Dukun','Lainnya') NOT NULL,
  `jenis_kelahiran` enum('Tunggal','Kembar 2','Kembar 3','Kembar 4','Lainnya') NOT NULL,
  `berat_bayi` varchar(9) NOT NULL,
  `panjang_bayi` varchar(9) NOT NULL,
  `tgl_laporan` date NOT NULL,
  `nik_ayah` varchar(16) NOT NULL,
  `nik_ibu` varchar(16) NOT NULL,
  `nik_saksi1` varchar(16) NOT NULL,
  `nik_saksi2` varchar(16) NOT NULL,
  `nik_pelapor` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_layanan`
--

CREATE TABLE `tb_layanan` (
  `id_pelayanan` int(11) NOT NULL,
  `no_surat` int(11) NOT NULL,
  `id_jenissurat` int(11) NOT NULL,
  `id_penduduk` varchar(16) NOT NULL,
  `keperluan` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tgl_pelayanan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_mutasi_keluar`
--

CREATE TABLE `tb_mutasi_keluar` (
  `id_mutasi_keluar` int(16) NOT NULL,
  `nik_penduduk` varchar(16) NOT NULL,
  `id_kecamatan` int(11) NOT NULL,
  `id_kabupaten` int(11) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  `pindah_ke` varchar(50) NOT NULL,
  `alasan_pindah` varchar(50) NOT NULL,
  `pengikut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pekerjaan`
--

CREATE TABLE `tb_pekerjaan` (
  `id_pekerjaan` int(11) NOT NULL,
  `nama_pekerjaan` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pekerjaan`
--

INSERT INTO `tb_pekerjaan` (`id_pekerjaan`, `nama_pekerjaan`) VALUES
(1, 'Belum/Tidak Bekerja'),
(2, 'Mengurus Rumah Tangga'),
(3, 'Pelajar/Mahasiswa'),
(4, 'Pendiunan'),
(5, 'Pegawai Negeri Sipil'),
(6, 'Tentara Nasional Indonesia'),
(7, 'Kepolisian RI'),
(8, 'Perdagangan'),
(9, 'Petani/Pekebun'),
(10, 'Peternak'),
(11, 'Nelayan/Perikanan'),
(12, 'Industri'),
(13, 'Konstruksi'),
(14, 'Transportasi'),
(15, 'Karyawan Swasta'),
(16, 'Karyawan BUMN'),
(17, 'Karyawan BUMD'),
(18, 'Karyawan Honorer'),
(19, 'Buruh Harian Lepas'),
(20, 'Buruh Tani/Perkebunan'),
(21, 'Buruh Nelayan/Perikanan'),
(22, 'Buruh Peternakan'),
(23, 'Pembantu Rumah Tangga'),
(24, 'Tukang Cukur'),
(25, 'Tukang Listrik'),
(26, 'Tukang Batu'),
(27, 'Tukang Kayu'),
(28, 'Tukang Sol Sepatu'),
(29, 'Tukang Las/Pandai Besi'),
(30, 'Tukang Jahit'),
(31, 'Penata Rambut'),
(32, 'Penata Rias'),
(33, 'Penata Busana'),
(34, 'Mekanik'),
(35, 'Tukang Gigi'),
(36, 'Seniman'),
(37, 'Tabib'),
(38, 'Paraji'),
(39, 'Perancang Busana'),
(40, 'Penterjemah'),
(41, 'Imam Masjid'),
(42, 'Pendeta'),
(43, 'Pastur'),
(44, 'Wartawan'),
(45, 'Ustadz/Muballigh'),
(46, 'Juru Masak'),
(47, 'Promotor Acara'),
(48, 'Anggota DPR-RI'),
(49, 'Anggota DPD'),
(50, 'Anggota BPK'),
(51, 'Presiden'),
(52, 'Wakil Presiden'),
(53, 'Anggota Mahakamah'),
(54, 'Konstitusi'),
(55, 'Anggota Kabinet/Kementrian'),
(56, 'Duta Besar'),
(57, 'Gubernur'),
(58, 'Wakil Gubernur'),
(59, 'Bupati'),
(60, 'Wakil Bupati'),
(61, 'Walikota'),
(62, 'Wakil Walikota'),
(63, 'Anggota DPRD Provinsi'),
(64, 'Anggota DPRD Kabupaten/Kota'),
(65, 'Dosen'),
(66, 'Guru'),
(67, 'Pilot'),
(68, 'Pengacara'),
(69, 'Notaris'),
(70, 'Arsitek'),
(71, 'Akuntan'),
(72, 'Konsultan'),
(73, 'Dokter'),
(74, 'Bidan'),
(75, 'Perawat'),
(76, 'Apoteker'),
(77, 'Psikiater/Psikolog'),
(78, 'Penyia Televisi'),
(79, 'Penyiar Radio'),
(80, 'Pelaut'),
(81, 'Peneliti'),
(82, 'Sopir'),
(83, 'Pialang'),
(84, 'Paranormal'),
(85, 'Pedagang'),
(86, 'Perangkat Desa'),
(87, 'Kepala Desa'),
(88, 'Biarawati'),
(89, 'Wiraswasta'),
(90, 'Lainnya'),
(91, 'Peternak');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendidikan`
--

CREATE TABLE `tb_pendidikan` (
  `id_pendidikan` int(11) NOT NULL,
  `pendidikan` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendidikan`
--

INSERT INTO `tb_pendidikan` (`id_pendidikan`, `pendidikan`) VALUES
(1, 'Tidak/Belum Sekolah'),
(2, 'Tidak Tamat SD/Sederajat'),
(3, 'Tamat SD/Sederajat'),
(4, 'SLTP/Sederajat'),
(5, 'SLTA/Sederajat'),
(6, 'Diploma I/II'),
(7, 'Akademi/Diploma III/S. Muda'),
(8, 'Diploma IV/Strata I'),
(9, 'Strata II'),
(10, 'Strata III');

-- --------------------------------------------------------

--
-- Table structure for table `tb_penduduk`
--

CREATE TABLE `tb_penduduk` (
  `nik` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `alamat` varchar(35) NOT NULL,
  `kode_dusun` int(4) NOT NULL,
  `kode_rt` int(4) NOT NULL,
  `kode_rw` int(4) NOT NULL,
  `jk` enum('Laki-Laki','Perempuan') NOT NULL,
  `tpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `goldar` varchar(5) NOT NULL,
  `agama` varchar(10) NOT NULL,
  `pendidikan` varchar(10) NOT NULL,
  `pekerjaan` int(9) NOT NULL,
  `stat_kawin` enum('Belum Menikah','Menikah','Cerai','') NOT NULL,
  `stat_hub_kel` enum('Anak','Istri','Kepala Keluarga') NOT NULL,
  `no_passpor` int(11) NOT NULL,
  `tgl_akhir_passpor` date NOT NULL,
  `ayah` varchar(35) NOT NULL,
  `ibu` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengikut_keluar`
--

CREATE TABLE `tb_pengikut_keluar` (
  `id_pengikut` int(11) NOT NULL,
  `id_mutasi` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_perangkat`
--

CREATE TABLE `tb_perangkat` (
  `id_perangkat` int(11) NOT NULL,
  `id_penduduk` varchar(16) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `tgl_sk` date NOT NULL,
  `no_sk` varchar(30) NOT NULL,
  `tgl_berhenti` date NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_provinsi`
--

CREATE TABLE `tb_provinsi` (
  `id_provinsi` int(11) NOT NULL,
  `provinsi` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_provinsi`
--

INSERT INTO `tb_provinsi` (`id_provinsi`, `provinsi`) VALUES
(1, 'Jawa Timur'),
(2, 'Aceh'),
(3, 'Bali'),
(4, 'Banten'),
(5, 'Bengkulu'),
(6, 'Gorontalo'),
(7, 'Jakarta'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Kalimantan Barat'),
(12, 'Kalimantan Tengah'),
(13, 'Kalimantan Timur'),
(14, 'Kalimantan Utara'),
(15, 'Kepulauan Bangka Belitung'),
(16, 'Kepulauan Riau'),
(17, 'Lampung '),
(18, 'Maluku'),
(19, 'Maluku Utara'),
(20, 'Nusa Tenggara Barat'),
(21, 'Nusa Tenggara Timur'),
(22, 'Papua'),
(23, 'Papua Barat'),
(24, 'Riau'),
(25, 'Sulawesi Barat'),
(26, 'Sulawesi Selatan'),
(27, 'Sulawesi Tengah'),
(28, 'Sulawesi Tenggara'),
(29, 'Sulawesi Utara'),
(30, 'Sumatera Barat'),
(31, 'Sumatera Selatan');

-- --------------------------------------------------------

--
-- Table structure for table `tb_rt`
--

CREATE TABLE `tb_rt` (
  `id_rt` int(11) NOT NULL,
  `id_rw` int(11) NOT NULL,
  `no_rt` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_rw`
--

CREATE TABLE `tb_rw` (
  `id_rw` int(11) NOT NULL,
  `id_dusun` int(11) NOT NULL,
  `no_rw` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  ADD PRIMARY KEY (`id_dusun`);

--
-- Indexes for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tb_jenissurat`
--
ALTER TABLE `tb_jenissurat`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  ADD PRIMARY KEY (`id_kabupaten`);

--
-- Indexes for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`);

--
-- Indexes for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  ADD PRIMARY KEY (`id_kelahiran`);

--
-- Indexes for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  ADD PRIMARY KEY (`id_pelayanan`);

--
-- Indexes for table `tb_mutasi_keluar`
--
ALTER TABLE `tb_mutasi_keluar`
  ADD PRIMARY KEY (`id_mutasi_keluar`);

--
-- Indexes for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  ADD PRIMARY KEY (`id_pekerjaan`);

--
-- Indexes for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  ADD PRIMARY KEY (`id_pendidikan`);

--
-- Indexes for table `tb_penduduk`
--
ALTER TABLE `tb_penduduk`
  ADD PRIMARY KEY (`nik`);

--
-- Indexes for table `tb_pengikut_keluar`
--
ALTER TABLE `tb_pengikut_keluar`
  ADD PRIMARY KEY (`id_pengikut`);

--
-- Indexes for table `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  ADD PRIMARY KEY (`id_perangkat`);

--
-- Indexes for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  ADD PRIMARY KEY (`id_provinsi`);

--
-- Indexes for table `tb_rt`
--
ALTER TABLE `tb_rt`
  ADD PRIMARY KEY (`id_rt`);

--
-- Indexes for table `tb_rw`
--
ALTER TABLE `tb_rw`
  ADD PRIMARY KEY (`id_rw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_dusun`
--
ALTER TABLE `tb_dusun`
  MODIFY `id_dusun` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_jabatan`
--
ALTER TABLE `tb_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_jenissurat`
--
ALTER TABLE `tb_jenissurat`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_kabupaten`
--
ALTER TABLE `tb_kabupaten`
  MODIFY `id_kabupaten` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=380;

--
-- AUTO_INCREMENT for table `tb_kelahiran`
--
ALTER TABLE `tb_kelahiran`
  MODIFY `id_kelahiran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_layanan`
--
ALTER TABLE `tb_layanan`
  MODIFY `id_pelayanan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_mutasi_keluar`
--
ALTER TABLE `tb_mutasi_keluar`
  MODIFY `id_mutasi_keluar` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pekerjaan`
--
ALTER TABLE `tb_pekerjaan`
  MODIFY `id_pekerjaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `tb_pendidikan`
--
ALTER TABLE `tb_pendidikan`
  MODIFY `id_pendidikan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_pengikut_keluar`
--
ALTER TABLE `tb_pengikut_keluar`
  MODIFY `id_pengikut` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_perangkat`
--
ALTER TABLE `tb_perangkat`
  MODIFY `id_perangkat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_provinsi`
--
ALTER TABLE `tb_provinsi`
  MODIFY `id_provinsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_rt`
--
ALTER TABLE `tb_rt`
  MODIFY `id_rt` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_rw`
--
ALTER TABLE `tb_rw`
  MODIFY `id_rw` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
