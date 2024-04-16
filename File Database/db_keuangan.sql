-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 28 Jan 2024 pada 09.52
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_keuangan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(5) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `url` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `twitter` text NOT NULL,
  `instagram` text NOT NULL,
  `google` text NOT NULL,
  `youtube` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `meta_deskripsi` varchar(250) NOT NULL,
  `meta_keyword` varchar(250) NOT NULL,
  `favicon` varchar(50) NOT NULL,
  `maps` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `twitter`, `instagram`, `google`, `youtube`, `alamat`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `maps`) VALUES
(1, 'Website KTTH Jorong Simpang Tolang', 'karangtarunasptol@gmail.com', 'https://www.karangtarunasptol.com', 'https://www.facebook.com/', 'https://twitter.com/', 'https://instagram.com/', 'https://plus.google.com/', 'https://youtube.com/', 'Jorong Simpang Tolang Lama. Kecamatan Ranah Batahan, Kabupaten Ranah Batahan.', '082285209105', 'Website ini menyediakan tentang informasi seputar Organisasi Pemuda Pemudi KTTH Jorong Simpang Tolang Lama.', 'Organisasi, Karang Taruna, Remaja, Desa, Transparansi Keuangan', 'kth.png', 'https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3989.3358607198243!2d100.35483479999999!3d-0.8910373999999999!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b8aa1a4e0441%3A0x3f81ebb48d31a38b!2sTunggul+Hitam%2C+Padang+Utara%2C+Kota+Padang%2C+Sumatera+Barat+25173!5e0!3m2!1sid!2sid!4v1408275531365');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keuangan`
--

CREATE TABLE `keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `status` enum('masuk','keluar') NOT NULL,
  `tgl` date NOT NULL,
  `tujuan` text NOT NULL,
  `jumlah` text NOT NULL,
  `gambar_struk` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keuangan`
--

INSERT INTO `keuangan` (`id_keuangan`, `username`, `status`, `tgl`, `tujuan`, `jumlah`, `gambar_struk`) VALUES
(6, 'admin', 'keluar', '2018-05-24', 'Beli Cat', '56000', ''),
(10, 'admin', 'masuk', '2022-08-01', 'CEIN', '250000', ''),
(11, 'admin', 'masuk', '2022-08-03', 'RIZKY ANGGINA', '250000', ''),
(12, 'admin', 'masuk', '2022-08-15', 'BUDI WARMAN', '150000', ''),
(15, 'admin', 'keluar', '2022-08-17', 'Dana untuk 17 Agustus', '1000000', 'agen_2.jpg'),
(17, 'admin', 'masuk', '2022-08-09', 'TURNAMEN HARI KE 1', '900000', ''),
(18, 'admin', 'masuk', '2022-08-11', 'TURNAMEN HARI KE 3', '1530000', ''),
(19, 'admin', 'masuk', '2022-08-14', 'TURNAMEN HARI KE 6 (NPARKIR, KARCIS, PENDAFTARAN)', '1770000', ''),
(20, 'admin', 'masuk', '2022-08-12', 'TURNAMEN HARI KE 4 HUT RI', '1685000', 'struk.jpg'),
(21, 'admin', 'masuk', '2022-08-03', 'Dana untuk Bola ', '750000', ''),
(24, 'admin', 'masuk', '2022-08-22', 'Dana untuk Bola tes', '10', 'nagari.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modul`
--

CREATE TABLE `modul` (
  `id_modul` int(5) NOT NULL,
  `nama_modul` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `link` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `publish` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y',
  `aktif` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'Y'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `modul`
--

INSERT INTO `modul` (`id_modul`, `nama_modul`, `level`, `link`, `publish`, `aktif`) VALUES
(1, 'Home', 'admin', 'Administrator/Home', 'Y', 'Y'),
(2, 'Identitas Website', 'admin', 'Administrator/identitaswebsite', 'Y', 'Y'),
(3, 'Profil Organisasi', 'admin', 'Administrator/sejarah', 'Y', 'Y'),
(4, 'Dashboard', 'user', 'Administrator/home', 'Y', 'Y'),
(5, 'Kegiatan Organisasi', 'admin', 'Administrator/kegiatan', 'Y', 'Y'),
(6, 'Kelola Keuangan', 'admin', 'Administrator/manajemenkeuangan', 'Y', 'Y'),
(7, 'Manajemen User', 'admin', 'Administrator/manajemenuser', 'Y', 'Y'),
(8, 'Manajemen Modul', 'admin', 'Administrator/manajemenmodul', 'Y', 'Y'),
(9, 'Keuangan Organisasi', 'user', 'Administrator/keuangan', 'Y', 'Y'),
(86, 'Aset Organisasi', 'admin', 'Administrator/aset', 'Y', 'Y'),
(87, 'Aset Organisas', 'user', 'Administrator/asetuser', 'Y', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_aset`
--

CREATE TABLE `tb_aset` (
  `id_aset` int(11) NOT NULL,
  `nm_aset` text COLLATE utf8_unicode_ci NOT NULL,
  `jml_aset` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `keterangan` varchar(128) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tb_aset`
--

INSERT INTO `tb_aset` (`id_aset`, `nm_aset`, `jml_aset`, `harga_beli`, `harga_jual`, `keterangan`) VALUES
(1, 'Meja', 12, 50000, 0, 'Bagus'),
(3, 'Bola', 8, 1050000, 0, 'Bagus'),
(4, 'Printer', 1, 850000, 0, 'Bagus');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_berita`
--

CREATE TABLE `tb_berita` (
  `id_berita` int(11) NOT NULL,
  `id_kegiatan` int(11) NOT NULL,
  `judul_berita` varchar(125) NOT NULL,
  `isi_berita` text NOT NULL,
  `gambar_berita` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_berita`
--

INSERT INTO `tb_berita` (`id_berita`, `id_kegiatan`, `judul_berita`, `isi_berita`, `gambar_berita`) VALUES
(2, 1, 'O2SN123', 'Pada senin', 'baralek.jpeg'),
(3, 1, 'Kejuarann Internasional Sepak Bola', 'membangkaan sekali', 'baralek.jpeg'),
(4, 3, 'TURNAMEN CUP MINI 1', 'Minggu, 14 Agustus 2022 Telah resmi dibuka Turnamen Cup Mini I Tahun 2022 yang diselenggarakan di Jorong Simpang Tolang, Kab. Pasaman Barat. Dengan maksud dan tujuan ikut serta dalam memeriahkan Hari Ulang Tahun Kemerdekaan Republik Indonesia yang Ke-77. Turnamen di laksanakan Antar se-kecamatan Ranah Bataran, Koto Balingka, Madina.', 'pembukaan.png'),
(8, 0, 'TIM Sepak Bola  Jorong Simpang Tolang Raih Juara 1 Ajang Turnamen Cup Mini I Tahun 2022', 'Rabu, 17 Agustus 2022 bertepatan dengan hari kemerdekaan Republik Indonesia, Pemuda pemudi jorong Simpang Tolang berhasil meraih juara 1 dalam ajang turnamen Turnamen Cup Mini I. Hal ini merupakan hal yang sangat membanggakan dan merupakan prestasi yaang perlu di eprtahankan untuk kedepanya sehingga skill yang di punya tetap terus diasah.', 'juara.png'),
(9, 4, 'Meriahkan HUT RI KE 77', 'Kamis, 18 Agustus 2022 Dalam Rangka memeriahkan HUT RI Pemuda-pemudi Simpang Tolang adakan kegiatan bersih-bersih Masjid.', 'puasa1.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kegiatan`
--

CREATE TABLE `tb_kegiatan` (
  `id_kegiatan` int(11) NOT NULL,
  `kategori_kegiatan` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kegiatan`
--

INSERT INTO `tb_kegiatan` (`id_kegiatan`, `kategori_kegiatan`) VALUES
(0, 'Prestasi'),
(2, 'Penghargaan\r\n'),
(3, 'Olahraga'),
(4, 'Keagamaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_sejarah`
--

CREATE TABLE `tb_sejarah` (
  `id_sejarah` int(11) NOT NULL,
  `judul_sejarah` varchar(50) NOT NULL,
  `isi_sejarah` text NOT NULL,
  `gambar_sejarah` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_sejarah`
--

INSERT INTO `tb_sejarah` (`id_sejarah`, `judul_sejarah`, `isi_sejarah`, `gambar_sejarah`) VALUES
(1, 'SEJARAH KTTH SIMPANG TOLANG', 'Organisasi pemuda pemudi di Jorong Simpang Tolang sebenarnya sudah ada sejak tahun 2003. Namun Organisasi ini berkembang dan maju serta  berjalan lancar pada 4 tahun terakhir 2022. Pekembangan organisasi ini tidak bisa dipungkiri dari kemajuan teknologi yang semakin canggih. Sehingga banyak manusia yang semakin cerdas dengan menggunakan teknologi. Kemajuan dari Organisasi ini adalah berkat partisispasi pemuda pemudi yang meningkat.  ', 'nagari.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_struktur`
--

CREATE TABLE `tb_struktur` (
  `id_struktur` int(11) NOT NULL,
  `username` varchar(120) NOT NULL,
  `jabatan` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_struktur`
--

INSERT INTO `tb_struktur` (`id_struktur`, `username`, `jabatan`) VALUES
(1, 'ahmadadzan', 'Ketua'),
(2, 'una', 'Sekretaris'),
(3, 'tess', 'Anggota'),
(4, 'Sapiah', 'Anggota'),
(5, 'admin', 'Anggota'),
(6, 'jaliluddin', 'SEKSI AGAMA'),
(7, 'gusmanely', 'SEKRETARIS'),
(8, 'misan', 'BENDAHARA'),
(9, 'andika putra', 'WAKIL KETUA PEMUDA'),
(10, 'hafizah', 'Anggota'),
(11, 'nenihafsah', 'Anggota'),
(12, 'khoirunnas', 'KETUA PEMUDA'),
(13, 'wildafebriani', 'Anggota'),
(14, 'romadialdo', 'Anggota'),
(15, 'anggunlubis', 'Anggota'),
(16, 'pintariza', 'Anggota'),
(17, 'ihdanikmah', 'Anggota'),
(20, 'resiaulia', 'Anggota'),
(21, 'dedinta', 'Anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_visimisi`
--

CREATE TABLE `tb_visimisi` (
  `id_visimisi` int(11) NOT NULL,
  `isi_visi` text NOT NULL,
  `isi_misi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_visimisi`
--

INSERT INTO `tb_visimisi` (`id_visimisi`, `isi_visi`, `isi_misi`) VALUES
(1, 'Terwujudnya Desa Simpang Tolang yang Aman, Tentram, dan Sejahtera dengan kehidupan masyarakat yang Beriman, Berakhlak Mulia dan Berkebudayaan.', 'Terwujudnya pemuda-pemudi yang bertakwa kepada Tuhan Yang Maha Esa penuh perhatian dan peka terhadap masalah dengan daya tahan fisik dan mental yang kuat dan teguh dalam pendiriannya serta mampu berkreasi dan berkarya dilingkungan masysarakat.'),
(4, ' Mewujudkan generasi muda yang berilmu pengetahuan, kreatif, mandiri, tangguh, beriman, berkualitas dan bertanggung jawab.', 'Membangun dan meningkatkan Ekonomi Produktif.'),
(5, 'Mempererat tali persaudaraan antar pemuda untuk meningkatkan partisipasi pemuda dalam kegiatan-kegiatan yang bermanfaat di masyarakat guna meningkatkan peran organisasi kepemudaan.', 'Kepedulian terhadap lingkungan sosial masyarakat.'),
(6, ' ', 'Menggalang kemitraan dengan berbagai pihak yang berkompeten dalam masalah pemuda dan sosial kemasyarakatan.'),
(7, ' ', 'Terwujudnya kesejahteraan sosial yang semakin meningkat bagi warga Desa Simpang Tolang pada umumnya dan khususnya generasi muda yang memungkinkan pelaksanaan fungsi sosialnya sebagai manusia pembangunan yang mampu mengatasi masalah sosial dilingkungannnya.'),
(8, ' ', 'Melestarikan kesenian daerah serta pembangunan minat untuk berolahraga.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `nama_lengkap` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `no_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `jk` varchar(125) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `level` varchar(20) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'user',
  `blokir` enum('Y','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL DEFAULT 'N',
  `id_session` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`username`, `password`, `nama_lengkap`, `email`, `no_telp`, `jk`, `alamat`, `foto`, `level`, `blokir`, `id_session`) VALUES
('admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'UMMU HABIBAH', 'habibahummu181@gmail.com', '82285209077', 'Perempuan', 'Simpang Tolang', 'ummu.jpg', 'admin', 'N', 'q173s8hs1jl04st35169ccl8o7'),
('dedinta', '2990f1eec75791ade1ba3d8c8c17c20b4e832f00', 'DEDINTA', 'dedin@gmail.com', '083169169498', 'Laki-laki', 'Simpang Tolang', 'blank6.png', 'user', 'N', '1712d5db4a3bcec1ee527fee41951a65-20220815224858'),
('gusmanely', 'f47ffd2208457773a8aa3d8eef3784306713badd', 'GUSMANELY', 'gusmanely@gmail.com', '081267283308', 'Prempuan', 'Simpang Tolang', 'blank5.png', 'user', 'N', 'c5ad5425c84b413ae297b0ba6dc89630-20220815204353'),
('misan', 'a0adb87fed7e82ae29a4f55b05d549f5ce3a33a9', 'MISAN', 'misan@gmail.com', '085264253287', 'Laki-laki', 'Simpang Tolang', 'blank2.png', 'admin', 'N', '63e49da02ba5ffdb731e6c77df85bf43-20220815204706'),
('jaliluddin', 'a7d2abb1004b28885e7fcb5fca0b5266628214c8', 'JALILUDDIN', 'jaliluddin@gmail.com', '081291418227', 'Laki-laki', 'Simpang Tolang', 'blank4.png', 'user', 'N', '4376cc1996b4f65b55c61e4303623a06-20220815205118'),
('andika putra', 'ed707f833673d415aef303411d5bfc9edba113aa', 'ANDIKA PUTRA', 'andikaputra@gmail.com', '081392477849', 'Laki-laki', 'Simpang Tolang', 'blank1.png', 'user', 'N', '05943ebe246f7ef9b26c3dab65f5601a-20220815204052'),
('khoirunnas', '17a979b55d59a03840eec03ce6eca2620608033f', 'KHOIRUNNAS', 'khoirunnas@gmail.com', '083179071033', 'Laki-laki', 'Simpang Tolang', 'blank3.png', 'admin', 'N', '23591c0a4db64e64db5218d593218951-20220815203338'),
('adriyansah', '83b621ca1ac1f7df26124821387af790d0f22e4f', 'ADRIYANSAH', 'adriyansah@gmail.com', '085271222803', 'Laki-laki', 'Simpang Tolang', 'blank10.png', 'user', 'N', '4bc05eb376f9fe12a490d6fd376f2957-20220815225100'),
('wandana', '47d8e1c6a8a68a5961eda5e3da725cb1d859eba1', 'M. REZKI WANDANA', 'wandana@gmail.com', '082283026737', 'Laki-laki', 'Simpang Tolang', 'blank1.png', 'user', 'N', 'cc407189ffe567a51db9e63a96563a68-20220815225344'),
('anggunlubis', '08efba41726bde21d1e7e9bdc783f78cfeaa44ac', 'ANGGUN NIARI LUBIS', 'anggunniarilubis@gmail.com', '083181514030', 'Prempuan', 'Simpang Tolang', 'blank9.png', 'user', 'N', '259794f9eb620b9849a9b24cdda1dd94-20220815225559'),
('hafizah', '114496d3b714c6a3da515e50d849cc11fafbab29', 'HAFIZAH', 'nurhusna@gmail.com', '085314043646', 'Prempuan', 'Simpang Tolang', 'blank8.png', 'user', 'N', 'e54265f44905dc698134786f1fabf7d4-20220815225752'),
('wildafebriani', 'b2d663f4e3dc431e1fcd5972864e8dbfd28e6c63', 'WILDA FEBRIANI', 'wilda@gmail.com', '082268866093', 'Prempuan', 'Simpang Tolang', 'wilda.jpg', 'user', 'N', '6ef8d5e8b4bca06fa69eb4960b63f3fc-20220815225906'),
('nenihafsah', 'd4be353c8286ebfe6d3562bd13fd33afe692eeb5', 'NENI HAFSAH', 'nenihafsah@gmail.com', '082283947605', 'Prempuan', 'Simpang Tolang', 'neni.jpg', 'user', 'N', 'db401f049c48c761a0c6f87afe4785b6-20220815230050'),
('romadialdo', 'a6b6ea31c49a8e944efe9ecbc072a26903a1461a', 'ROMA DIALDO', 'roma@gmail.com', '082285915345', 'Laki-laki', 'Simpang Tolang', 'blank7.png', 'user', 'N', 'ca5699096acc751a0473fc542aa718b5-20220815230337'),
('ahmadhabibi', '3eac329c208657f1d240cf5a24f32c084d8c2557', 'AHMAD HABIBI', 'ahmadhabibi@gmail.com', '82251729074', 'Laki-laki', 'Simpang Tolang', 'habibi.jpg', 'user', 'N', '17e9ec39694ea487c5dbb6d836929441-20220815230517'),
('pintariza', 'c35376cdc6a4a2e6b8ecbc0c8d2cdf011dc99a63', 'PINTA RIZA', 'pintariza11@gmail.com', '085274615352', 'Prempuan', 'Simpang Tolang', 'pinta.jpg', 'user', 'N', 'f7e9c7d559a22ee673c4e1a0d2a669b4-20220817213522'),
('ihdanikmah', 'c33d05182ed0bba01c3d2dfc75ae562dfdc609e4', 'IHDA NIKMAH', 'ihdanikmah@gmail.com', '098765432112', 'Prempuan', 'Simpang Tolang', 'ihda.jpg', 'user', 'N', 'f4afed3bfba96d09a1c3d926ff47fbaa-20220817222053'),
('resiaulia', '8927052126f110c7be6786baffd1dd5e1b8497c9', 'RESI AULIA', 'resiaulia@gmail.com', '082284735448', 'Prempuan', 'Simpang Tolang', 'resi.jpg', 'user', 'N', '4cd8c0ef498eda91e6fb29bd044a8439-20220817233830');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users_modul`
--

CREATE TABLE `users_modul` (
  `id_umod` int(11) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `id_modul` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users_modul`
--

INSERT INTO `users_modul` (`id_umod`, `id_session`, `id_modul`) VALUES
(1, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 70),
(2, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 65),
(3, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 63),
(4, 'f76ad5ee772ac196cbc09824e24859ee', 70),
(5, 'f76ad5ee772ac196cbc09824e24859ee', 65),
(6, 'f76ad5ee772ac196cbc09824e24859ee', 63),
(7, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 18),
(8, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 66),
(9, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 33),
(10, '3460d81e02faa3559f9e02c9a766fcbd-20170124215625', 18),
(11, 'ed1d859c50262701d92e5cbf39652792-20170120090507', 41),
(12, '6bec9c852847242e384a4d5ac0962ba0-20170406140423', 18),
(13, 'fa7688658d8b38aae731826ea1daebb5-20170521103501', 18),
(14, 'cfcd208495d565ef66e7dff9f98764da-20180421112213', 18);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id_modul`);

--
-- Indeks untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  ADD PRIMARY KEY (`id_aset`);

--
-- Indeks untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indeks untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indeks untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  ADD PRIMARY KEY (`id_sejarah`);

--
-- Indeks untuk tabel `tb_struktur`
--
ALTER TABLE `tb_struktur`
  ADD PRIMARY KEY (`id_struktur`);

--
-- Indeks untuk tabel `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  ADD PRIMARY KEY (`id_visimisi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `users_modul`
--
ALTER TABLE `users_modul`
  ADD PRIMARY KEY (`id_umod`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `keuangan`
--
ALTER TABLE `keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `modul`
--
ALTER TABLE `modul`
  MODIFY `id_modul` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `tb_aset`
--
ALTER TABLE `tb_aset`
  MODIFY `id_aset` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_berita`
--
ALTER TABLE `tb_berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tb_kegiatan`
--
ALTER TABLE `tb_kegiatan`
  MODIFY `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_sejarah`
--
ALTER TABLE `tb_sejarah`
  MODIFY `id_sejarah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_struktur`
--
ALTER TABLE `tb_struktur`
  MODIFY `id_struktur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_visimisi`
--
ALTER TABLE `tb_visimisi`
  MODIFY `id_visimisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `users_modul`
--
ALTER TABLE `users_modul`
  MODIFY `id_umod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
