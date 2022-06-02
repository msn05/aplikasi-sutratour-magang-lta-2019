-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Sep 2019 pada 11.42
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sutratour`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akses`
--

CREATE TABLE `akses` (
  `id_akses` int(11) NOT NULL,
  `nama_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akses`
--

INSERT INTO `akses` (`id_akses`, `nama_akses`) VALUES
(1, 'admin'),
(2, 'marketing'),
(3, 'pimpinan'),
(4, 'jamaah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `aktivasi_jamaah`
--

CREATE TABLE `aktivasi_jamaah` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `token` varchar(128) NOT NULL,
  `batas_waktu` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `aktivasi_jamaah`
--

INSERT INTO `aktivasi_jamaah` (`id`, `email`, `token`, `batas_waktu`) VALUES
(10, 's', 'nnmAYQOEHnZhoqvlXTT3i6Diw+ePhvotJZrfkTRV/NE=', 1567325285),
(11, 'u', 'A/KnxzK/3hrnKO4ebyYHQoPSVdmPr1Q+uTkccBxsyUM=', 1567356445);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_artikel`
--

CREATE TABLE `data_artikel` (
  `id_artikel` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `isi` text NOT NULL,
  `gambarnya` text NOT NULL,
  `tgl_postnya` datetime NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_artikel`
--

INSERT INTO `data_artikel` (`id_artikel`, `judul`, `isi`, `gambarnya`, `tgl_postnya`, `id_user`, `status`) VALUES
(6, 'Antara Istilah &quot;Mati Lampu&quot; dan Kebebalan Massal', '<h2 style=\"font-style:italic\">Minggu, (4/8), lalu menjadi salah satu hari yang cukup mengagetkan bagi masyarakat Indonesia. Terkhusus warga Jakarta, Bogor, Depok, Tangerang, dan Bekasi (Jabodetabek), Jawa Barat, dan Banten. Kita semua tahu, biang keroknya adalah pemadaman listrik secara massal di daerah-daerah apes tersebut.</h2>\r\n\r\n<h2 style=\"font-style:italic\">Penyebab mati listrik massal tersebut masih dikaji oleh para berwenang, dan bukan urusan saya.</h2>\r\n\r\n<h2 style=\"font-style:italic\">Tapi, dari kejadian di akhir pekan kemarin tersebut saya justru menemukan hal yang menarik setelah tagar #<a href=\"https://www.kompasiana.com/tag/matilampu\">matilampu</a> sempat menjadi <em>trending topic</em> dunia di Twitter pada hari yang sama. Sampai sini, tidak ada yang mengherankan.</h2>\r\n   ', '20190831030000.jpg', '2019-08-31 03:00:00', 'B-123452', 2),
(8, 'Doa Memohon Menjadi Haji Mabrur', '<h2 style=\"font-style:italic\"><kbd>adi, tidak ada yang mengherankan dari tagar #matilampu yang mendunia. Toh, netizen kita memang rajin membicarakan hal yang remeh-temeh. Sebut saja tagar #uninstalljokowi atau #tangkapprabowo yang juga sempat mendunia ketika demam Pilpres melanda beberapa waktu belakangan.</kbd></h2>\r\n\r\n<h2 style=\"font-style:italic\"><kbd>Yang menarik dari mendunianya tagar #matilampu adalah penggunaan istilah &quot;mati lampu&quot; itu sendiri. Saya pribadi cukup alergi mendengar pilihan kalimat &quot;mati lampu&quot; ketika terjadi suatu pemadaman listrik. Tidak hanya pada tagar, tapi orang-orang terdekat saya pun banyak yang menggunakan istilah &quot;mati lampu&quot;.</kbd></h2>\r\n\r\n<h2 style=\"font-style:italic\"><kbd>Alasannya sederhana saja. Yang mati kan bukan hanya lampu. Kulkas, setrika listrik, televisi, radio, pendingin udara, dan alat elektronik lainnya juga turut mati, bukan? Kenapa hanya &quot;lampu&quot; yang menjadi kambing-hitam?</kbd></h2>\r\n', '20190821144853.jpg', '2019-08-21 15:07:15', 'B-123452', 2),
(10, 'Antara Istilah ', '<h2><var>Minggu, (4/8), lalu menjadi salah satu hari yang cukup mengagetkan bagi masyarakat Indonesia. Terkhusus warga Jakarta, Bogor, Depok, Tangerang, dan Bekasi (Jabodetabek), Jawa Barat, dan Banten. Kita semua tahu, biang keroknya adalah pemadaman listrik secara massal di daerah-daerah apes tersebut.</var></h2>\r\n\r\n<h2><var>Penyebab mati listrik massal tersebut masih dikaji oleh para berwenang, dan bukan urusan saya.</var></h2>\r\n\r\n<h2><var>Tapi, dari kejadian di akhir pekan kemarin tersebut saya justru menemukan hal yang menarik setelah tagar #<a href=\"https://www.kompasiana.com/tag/matilampu\">matilampu</a> sempat menjadi <em>trending topic</em> dunia di Twitter pada hari yang sama. Sampai sini, tidak ada yang mengherankan.</var></h2>\r\n\r\n<h2> </h2>\r\n\r\n<h2> </h2>\r\n\r\n<h2><var>Kejadian yang sangat menggegerkan tersebut memang layak diperbincangkan hingga menjadi <em>trending topic</em> dunia. Terlebih, mengingat jumlah penduduk Jabodetabek, Jawa Barat, dan Banten merupakan yang terpadat di Indonesia.</var></h2>\r\n\r\n<h2> </h2>\r\n\r\n<h2> </h2>\r\n\r\n<h2><var>Jadi, tidak ada yang mengherankan dari tagar #matilampu yang mendunia. Toh, netizen kita memang rajin membicarakan hal yang remeh-temeh. Sebut saja tagar #uninstalljokowi atau #tangkapprabowo yang juga sempat mendunia ketika demam Pilpres melanda beberapa waktu belakangan.</var></h2>\r\n\r\n<h2><var>Yang menarik dari mendunianya tagar #matilampu adalah penggunaan istilah \"mati lampu\" itu sendiri. Saya pribadi cukup alergi mendengar pilihan kalimat \"mati lampu\" ketika terjadi suatu pemadaman listrik. Tidak hanya pada tagar, tapi orang-orang terdekat saya pun banyak yang menggunakan istilah \"mati lampu\".</var></h2>\r\n\r\n<h2><var>Alasannya sederhana saja. Yang mati kan bukan hanya lampu. Kulkas, setrika listrik, televisi, radio, pendingin udara, dan alat elektronik lainnya juga turut mati, bukan? Kenapa hanya \"lampu\" yang menjadi kambing-hitam?</var></h2>\r\n\r\n<h2><var>Istilah \"mati lampu\" seharusnya ditujukan jika hanya lampu saja yang mati atau padam. Sementara, pemadaman listrik, seperti yang terjadi kemarin, imbasnya bukan hanya lampu, tapi lebih luas lagi.</var></h2>\r\n\r\n<h2><var>Alih-alih menggunakan istilah \"mati listrik\", atau \"pemadaman listrik\" yang lebih relevan, masyarakat kita tetap memilih dan mempertahankan \"mati lampu\". Bahkan istilah tersebut hingga mencapai seluruh penjuru dunia.</var></h2>\r\n           ', '20190831032512.jpg', '2019-08-31 03:25:12', 'B-123452', 2),
(11, 'susah galo nahh kau', '<p><span style=\"font-size: 14px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400;\"><font face=\"Comic Sans MS\" style=\"\" color=\"#ce0000\">Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer la.</font></span><br></p>  ', '20190831030445.jpg', '2019-08-31 03:04:45', 'B-123452', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_layanan`
--

CREATE TABLE `data_layanan` (
  `id` int(11) NOT NULL,
  `kode_layana` varchar(20) NOT NULL,
  `nama_layanan` varchar(50) NOT NULL,
  `berlaku_dari` date NOT NULL,
  `transportasi_udaranya` int(11) NOT NULL,
  `transportasi_daratnya` int(11) NOT NULL,
  `tempat_menginapnya` varchar(150) NOT NULL,
  `lama_perjalanan` varchar(30) NOT NULL,
  `biaya` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_layanan`
--

INSERT INTO `data_layanan` (`id`, `kode_layana`, `nama_layanan`, `berlaku_dari`, `transportasi_udaranya`, `transportasi_daratnya`, `tempat_menginapnya`, `lama_perjalanan`, `biaya`) VALUES
(1, 'BR528062019001', 'UMROH PLUS', '2019-05-29', 1, 2, 'Mekkah Al Munawarah, MAddinah', '10 hari', '223'),
(2, 'BR528062019002', 'UMROH REGULER', '2019-06-06', 3, 3, 'Mekkah Al Munawarah', '20 hari', '23000000'),
(4, 'BR528062019004', 'HAJI REGULER', '2019-06-06', 3, 3, 'Mekkah Al Munawarah', '20 hari', '23000000'),
(5, 'BR526072019005', 'HAJI PLUS', '2019-07-26', 2, 2, 'KOLONG JEMBATAN', 'SELAMONYO', '6124715');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_promo`
--

CREATE TABLE `data_promo` (
  `id_promo` int(11) NOT NULL,
  `nama_promo` text NOT NULL,
  `kode_promo` varchar(15) NOT NULL,
  `tgl_post_promo` date NOT NULL,
  `batas_promo` date NOT NULL,
  `status_promo` enum('1','2') NOT NULL,
  `id_user` varchar(11) NOT NULL,
  `id_promo_layanan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_promo`
--

INSERT INTO `data_promo` (`id_promo`, `nama_promo`, `kode_promo`, `tgl_post_promo`, `batas_promo`, `status_promo`, `id_user`, `id_promo_layanan`) VALUES
(32, 'Izinkan semua pengguna untuk mengakses markah in', 'KL-338', '2019-07-20', '2019-07-05', '1', 'B-123451', 4),
(33, 'big sale', 'KL-389', '2019-07-25', '2020-06-11', '1', 'B-123452', 2),
(34, 'Izinkan semua pengguna untuk mengakses markah in', 'KL-399', '2019-07-20', '2019-07-05', '1', 'B-123452', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_jamaah`
--

CREATE TABLE `dokumen_jamaah` (
  `id_dokumen_jamaah` varchar(20) NOT NULL,
  `foto_kk` varchar(50) NOT NULL,
  `foto_ktp` varchar(50) NOT NULL,
  `status_dokumen` int(11) NOT NULL,
  `fotonya` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dokumen_jamaah`
--

INSERT INTO `dokumen_jamaah` (`id_dokumen_jamaah`, `foto_kk`, `foto_ktp`, `status_dokumen`, `fotonya`) VALUES
('20109201991', 'satrio20190901150805.jpg', 'satrio201909011508051.jpg', 2, 'LIWA_DAN_ROYA.png'),
('20109201992', 'Ujang_Saputra201909012347251.jpg', 'Ujang_Saputra201909012347252.jpg', 1, 'Ujang_Saputra20190901234725.jpg'),
('3108201990', 'satrio201908310132001.jpg', 'satrio201908310132002.jpg', 2, 'satrio20190831013200.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto_aktivitas`
--

CREATE TABLE `foto_aktivitas` (
  `id` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `filenya` text NOT NULL,
  `id_user` varchar(10) NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `jenis_kegiatan` int(11) NOT NULL,
  `status_foto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `foto_aktivitas`
--

INSERT INTO `foto_aktivitas` (`id`, `keterangan`, `filenya`, `id_user`, `tgl_post`, `jenis_kegiatan`, `status_foto`) VALUES
(11, 'Menuju padang arafah', '20190730005309.jpg', 'B-123452', '2019-07-29 17:54:12', 1, 1),
(12, 'makan bersama jamaah', '20190730005329.jpg', 'B-123452', '2019-07-29 17:54:08', 2, 1),
(15, 'sadadasda', '20190822000443.jpg', 'B-123452', '2019-08-21 17:04:47', 2, 1),
(16, 'asdasdasd', '20190822000613.png', 'B-123452', '2019-08-21 17:06:17', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `histori_data_promo`
--

CREATE TABLE `histori_data_promo` (
  `id_hdp` int(11) NOT NULL,
  `id_data_promo` int(11) NOT NULL,
  `tgl_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user_nyo` varchar(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `histori_data_promo`
--

INSERT INTO `histori_data_promo` (`id_hdp`, `id_data_promo`, `tgl_update`, `id_user_nyo`, `keterangan`) VALUES
(1, 3, '2019-06-21 17:19:45', '123456', 'Users Mengubah Statusnya'),
(2, 3, '2019-06-23 13:59:34', '123456', 'Users Mengubah Statusnya'),
(3, 3, '2019-06-23 14:01:01', '123456', 'Users Mengubah Statusnya'),
(4, 3, '2019-06-23 14:05:38', '123456', 'Users Mengubah Data Promo'),
(5, 3, '2019-06-23 14:11:01', '123456', 'Users Mengubah Data Promo'),
(6, 13, '2019-06-28 02:56:24', '123456', 'Users Mengubah Data Promo'),
(7, 13, '2019-06-28 02:56:40', '123456', 'Users Mengubah Data Promo'),
(8, 14, '2019-06-28 04:47:01', '123456', 'Users Mengubah Data Promo'),
(9, 27, '2019-06-28 12:58:22', '123456', 'Users Mengubah Data Promo'),
(10, 33, '2019-07-25 07:02:01', 'B-123452', 'Users Mengubah Data Promo'),
(11, 34, '2019-07-27 16:53:13', 'B-123452', 'Users Mengubah Data Promo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan_pegawai`
--

CREATE TABLE `jabatan_pegawai` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jabatan_pegawai`
--

INSERT INTO `jabatan_pegawai` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'Divisi Teknologi'),
(2, 'Marketting'),
(3, 'pimpinan'),
(4, 'Jamaah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_keberangkatan`
--

CREATE TABLE `jadwal_keberangkatan` (
  `id_data_layanan` int(11) NOT NULL,
  `kode_jadwal_keberangkatan` int(15) NOT NULL,
  `tgl_post` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_user` varchar(11) NOT NULL,
  `bulan_keberangkatan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_keberangkatan`
--

INSERT INTO `jadwal_keberangkatan` (`id_data_layanan`, `kode_jadwal_keberangkatan`, `tgl_post`, `id_user`, `bulan_keberangkatan`) VALUES
(1, 3, '2019-08-31 01:18:47', 'B-123452', '2019-08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah_daftar`
--

CREATE TABLE `jamaah_daftar` (
  `id_daftar` varchar(20) NOT NULL,
  `no_passport` varchar(15) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `no_kk` varchar(16) NOT NULL,
  `nama_jamaah` varchar(30) NOT NULL,
  `jenis_kelamin` int(2) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `pekerjaan` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `no_telephone` varchar(14) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `pemilihan_bulan_kbr` varchar(20) DEFAULT NULL,
  `nama_mahram` varchar(40) DEFAULT NULL,
  `tgl_dikeluarkannP` date NOT NULL,
  `hubungan_mahram` int(11) NOT NULL,
  `masa_berlakuP` varchar(30) NOT NULL,
  `status_keberangkatanJ` varchar(40) NOT NULL,
  `tempat_dikeluarkanP` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jamaah_daftar`
--

INSERT INTO `jamaah_daftar` (`id_daftar`, `no_passport`, `no_ktp`, `no_kk`, `nama_jamaah`, `jenis_kelamin`, `tgl_lahir`, `pekerjaan`, `alamat`, `no_telephone`, `tgl_daftar`, `pemilihan_bulan_kbr`, `nama_mahram`, `tgl_dikeluarkannP`, `hubungan_mahram`, `masa_berlakuP`, `status_keberangkatanJ`, `tempat_dikeluarkanP`) VALUES
('20109201991', 'V-838383872', '1234567890123410', '1234567890123410', 'satrio', 2, '2019-09-12', 2, 'jalan jalan', '085764554610', '2019-09-01', '3', 'andri tani', '2019-09-09', 3, '10/10/2019 - 11/01/2019', 'Sudah Pernah Terjadwalkan Berangkat', ''),
('20109201992', 'KL-0909', '1671100509970100', '1671100509970100', 'Ujang Saputra', 1, '2019-08-28', 2, 'Jalan jalan bae', '085764551000', '2019-09-01', '3', 'Fitriani', '2019-09-04', 3, '09/01/2019 - 09/01/2019', 'Sudah Pernah Terjadwalkan Berangkat', 'Palembang'),
('3108201990', '838383838722', '1671100509970023', '1671100509970023', 'satrio', 1, '2019-08-15', 2, 'sdadsadasdsa', '085764554695', '2019-08-31', '3', 'sasaasa', '2019-09-09', 3, '08/31/2019 - 08/31/2019', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keberangkatan_jamaah`
--

CREATE TABLE `keberangkatan_jamaah` (
  `id_keberangkatan` varchar(20) NOT NULL,
  `id_jamaah_vik` varchar(30) NOT NULL,
  `tgl_keberangkatan` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_admin_input` varchar(20) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keberangkatan_jamaah`
--

INSERT INTO `keberangkatan_jamaah` (`id_keberangkatan`, `id_jamaah_vik`, `tgl_keberangkatan`, `keterangan`, `id_admin_input`, `id`) VALUES
('DKJ501092019001', '3108201990', '2019-09-02', 'Sudah Lengkap Dan Siap Berangkat', 'B-123452', 72),
('DKJ501092019001', '20109201991', '2019-09-02', 'Sudah Lengkap Dan Siap Berangkat', 'B-123452', 74),
('DKJ501092019001', '20109201992', '2019-09-02', 'Sudah Lengkap Dan Siap Berangkat', 'B-123452', 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `jabatan` int(11) NOT NULL,
  `no_telp` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `foto`, `alamat`, `jabatan`, `no_telp`) VALUES
('120389', 'default.jpg', 'sasasas', 2, '09876543211234'),
('B-123451', 'default.jpg', 'adadadaddd', 2, '32112345678900'),
('B-123452', 'B-12345220190724080926.jpg', 'dada', 1, '09876543211234'),
('B-123454', 'default.jpg', 'jalan opi mall palembang', 3, '09876543211234');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_detail`
--

CREATE TABLE `pembayaran_detail` (
  `tanggal_pembayaran` datetime NOT NULL,
  `id_usernya` varchar(11) DEFAULT NULL,
  `id_jamaah_daftar` varchar(20) NOT NULL,
  `paket_yang_dipilih` int(11) NOT NULL,
  `jumlah_yang_dibayarkan` int(15) NOT NULL,
  `sisa_pembayaran` int(25) NOT NULL,
  `kode_pembayaran` varchar(15) NOT NULL,
  `total` int(20) NOT NULL,
  `status_pembayaran` int(11) NOT NULL,
  `statusnya` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_detail`
--

INSERT INTO `pembayaran_detail` (`tanggal_pembayaran`, `id_usernya`, `id_jamaah_daftar`, `paket_yang_dipilih`, `jumlah_yang_dibayarkan`, `sisa_pembayaran`, `kode_pembayaran`, `total`, `status_pembayaran`, `statusnya`) VALUES
('2019-09-11 02:56:25', 'B-123452', '3108201990', 1, 223, 0, '501092019001', 223, 2, 1),
('2019-09-01 15:08:53', 'B-123452', '20109201991', 1, 223, 0, '501092019002', 223, 2, 1),
('2019-09-01 23:48:19', 'B-123452', '20109201992', 1, 223, 0, '501092019003', 223, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran_paket_jamaah`
--

CREATE TABLE `pembayaran_paket_jamaah` (
  `idnya` int(11) NOT NULL,
  `kode_pembayarannya` varchar(15) NOT NULL,
  `tgl_pembayaran` datetime NOT NULL,
  `jumlah_uangnya` int(40) NOT NULL,
  `sisa` int(30) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pembayaran_paket_jamaah`
--

INSERT INTO `pembayaran_paket_jamaah` (`idnya`, `kode_pembayarannya`, `tgl_pembayaran`, `jumlah_uangnya`, `sisa`, `keterangan`) VALUES
(74, '531082019001', '2019-08-31 01:32:00', 0, 0, 'biaya awal layanan'),
(85, '531082019001', '2019-09-01 01:41:36', 223, 0, 'lunas'),
(89, '501092019002', '2019-09-01 01:49:29', 223, 0, 'jjkgkjhkjgk'),
(90, '501092019003', '2019-09-01 02:56:25', 223, 0, 'lunas bayarnyo'),
(91, '501092019002', '2019-09-01 15:08:05', 0, 0, 'biaya awal layanan'),
(92, '501092019002', '2019-09-01 15:08:53', 223, 0, 'lunas'),
(93, '501092019003', '2019-09-01 23:47:25', 0, 0, 'biaya awal layanan'),
(94, '501092019003', '2019-09-01 23:48:19', 223, 0, 'lunas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi_darat`
--

CREATE TABLE `transportasi_darat` (
  `id_td` int(11) NOT NULL,
  `nama_tdnya` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportasi_darat`
--

INSERT INTO `transportasi_darat` (`id_td`, `nama_tdnya`) VALUES
(1, 'Agra Icon'),
(2, 'Alegra'),
(3, 'AO Transport'),
(4, 'Ardian Transport'),
(5, 'BEE Bus'),
(6, 'Primajasa Citymiles');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transportasi_udara`
--

CREATE TABLE `transportasi_udara` (
  `id_tu` int(11) NOT NULL,
  `nama_tunya` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transportasi_udara`
--

INSERT INTO `transportasi_udara` (`id_tu`, `nama_tunya`) VALUES
(1, 'Garuda Airland 800'),
(2, 'Garuda Airland 787'),
(3, 'CitiLink'),
(4, 'Lion R');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nomoridentitas` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(256) NOT NULL,
  `akses` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `login_akun` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `aktiv_dak` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nomoridentitas`, `email`, `password`, `akses`, `nama`, `login_akun`, `aktiv_dak`) VALUES
('120389', 'm@gmail.com', '$2y$10$xJt4zlyiGjQO4amm6ktcp..wB0rT51jySfVjuNf0QdbPL.IlNIYv6', 2, 'Ujang Susanto', '2019-09-06 04:54:31', 1),
('20109201991', 'sa@gmail.com', '$2y$10$qvV.W120QAV7yZV/auw48O1ovIkYoU/WbuiS/7XvwVilqhYEEkoaC', 4, 'satrio', '2019-09-06 04:54:31', 0),
('20109201992', 'ujangsaputra@gmail.com', '$2y$10$LecFxsvKhMFWsWT8r0YE0OlSmsdMnSZtOgnMe7mXB70wrangTUf.y', 4, 'Ujang Saputra', '2019-09-06 04:54:31', 0),
('3108201990', 'm.satrion05091997@gmail.com', '$2y$10$V8iYYIvtH6mqABLbk/C6J.duG7L9WARg/A81UWmkWssO9bDWMr3iy', 4, 'satrio', '2019-09-06 04:54:31', 1),
('B-123452', 'adada@gmail.com', '$2y$10$n1DVBsZheMO5RTUMbfWrQO4iUWzMSEzbH9xCr1DBFoLgCcTzozhpa', 1, 'Dimas', '2019-09-06 04:54:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id` int(11) NOT NULL,
  `nomorregistrasi` varchar(18) NOT NULL,
  `nama_perusahaan` varchar(100) NOT NULL,
  `footer` text NOT NULL,
  `alamat` text NOT NULL,
  `kontak` text NOT NULL,
  `visi_misi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `website`
--

INSERT INTO `website` (`id`, `nomorregistrasi`, `nama_perusahaan`, `footer`, `alamat`, `kontak`, `visi_misi`, `foto`) VALUES
(1, '98797', 'SUTRA TOUR HIDAYAH PALEMBANG', '@ 2019 PalComTech LTA SUTRA TOUR HIDAYAH PALEMBANG', 'jalan.Opi Mall Komplek Opi Palembang     ', '0812-2122-212', '<div style=\"margin-left: 25px;\"><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">1.&nbsp; &nbsp; Visi</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">Setiap perusahaan yang berdiri tentu mempunyai visi dan misi untuk mencapai tujuan didirikan perusahaan. Begitu pula dengan PT Sutra Tour Travel, adapun visi tersebut adalah “Menjadi perusahaan travel penyedia jasa pemberangkatan umroh dan haji yang terpercaya”&nbsp;&nbsp;</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">2.&nbsp; &nbsp; Misi</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">Misi PT Sutra Tour Travel adalah</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">a.&nbsp; &nbsp; Melayani dengan sepenuh hati.</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">b.&nbsp; &nbsp;Memberangkatkan jemaah haji secara tepat waktu dan .</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">c.&nbsp; &nbsp; Memberikan pelayanan yang baik sehingga memberikan kenyamanan bagi seluruh jemaah maupun calon jemaah</font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\"><br></font></p><p class=\"MsoListParagraph\" style=\"margin: 0cm 0cm 0.0001pt 44px; text-indent: -14.2pt; line-height: 200%;\"><font face=\"Comic Sans MS\">d.&nbsp; &nbsp;Memenuhi semua harapan yang diharapkan oleh para jemaah.</font></p></div>   ', '9879720190828233812.png');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akses`
--
ALTER TABLE `akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indeks untuk tabel `aktivasi_jamaah`
--
ALTER TABLE `aktivasi_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_artikel`
--
ALTER TABLE `data_artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indeks untuk tabel `data_layanan`
--
ALTER TABLE `data_layanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `data_promo`
--
ALTER TABLE `data_promo`
  ADD PRIMARY KEY (`id_promo`);

--
-- Indeks untuk tabel `dokumen_jamaah`
--
ALTER TABLE `dokumen_jamaah`
  ADD PRIMARY KEY (`id_dokumen_jamaah`);

--
-- Indeks untuk tabel `foto_aktivitas`
--
ALTER TABLE `foto_aktivitas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `histori_data_promo`
--
ALTER TABLE `histori_data_promo`
  ADD PRIMARY KEY (`id_hdp`);

--
-- Indeks untuk tabel `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indeks untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  ADD PRIMARY KEY (`kode_jadwal_keberangkatan`);

--
-- Indeks untuk tabel `jamaah_daftar`
--
ALTER TABLE `jamaah_daftar`
  ADD PRIMARY KEY (`id_daftar`);

--
-- Indeks untuk tabel `keberangkatan_jamaah`
--
ALTER TABLE `keberangkatan_jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indeks untuk tabel `pembayaran_detail`
--
ALTER TABLE `pembayaran_detail`
  ADD PRIMARY KEY (`kode_pembayaran`);

--
-- Indeks untuk tabel `pembayaran_paket_jamaah`
--
ALTER TABLE `pembayaran_paket_jamaah`
  ADD PRIMARY KEY (`idnya`);

--
-- Indeks untuk tabel `transportasi_darat`
--
ALTER TABLE `transportasi_darat`
  ADD PRIMARY KEY (`id_td`);

--
-- Indeks untuk tabel `transportasi_udara`
--
ALTER TABLE `transportasi_udara`
  ADD PRIMARY KEY (`id_tu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`nomoridentitas`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akses`
--
ALTER TABLE `akses`
  MODIFY `id_akses` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `aktivasi_jamaah`
--
ALTER TABLE `aktivasi_jamaah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_artikel`
--
ALTER TABLE `data_artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `data_layanan`
--
ALTER TABLE `data_layanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `data_promo`
--
ALTER TABLE `data_promo`
  MODIFY `id_promo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `foto_aktivitas`
--
ALTER TABLE `foto_aktivitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `histori_data_promo`
--
ALTER TABLE `histori_data_promo`
  MODIFY `id_hdp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `jabatan_pegawai`
--
ALTER TABLE `jabatan_pegawai`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `jadwal_keberangkatan`
--
ALTER TABLE `jadwal_keberangkatan`
  MODIFY `kode_jadwal_keberangkatan` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `keberangkatan_jamaah`
--
ALTER TABLE `keberangkatan_jamaah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT untuk tabel `pembayaran_paket_jamaah`
--
ALTER TABLE `pembayaran_paket_jamaah`
  MODIFY `idnya` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT untuk tabel `transportasi_darat`
--
ALTER TABLE `transportasi_darat`
  MODIFY `id_td` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `transportasi_udara`
--
ALTER TABLE `transportasi_udara`
  MODIFY `id_tu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
