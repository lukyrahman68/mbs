-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Sep 2018 pada 11.57
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mbs`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `email` varchar(500) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_image` varchar(100) NOT NULL,
  `nama` varchar(500) NOT NULL,
  `alamat` varchar(500) NOT NULL,
  `telp` varchar(20) NOT NULL,
  `createby` varchar(100) NOT NULL,
  `datecreate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`email`, `password`, `id_image`, `nama`, `alamat`, `telp`, `createby`, `datecreate`) VALUES
('nestyadamayanti@gamil.com', '12345', '15', 'Nestya', 'Seoul, Korea Selatan', '097098754567', '5', '2018-08-07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `id_admin` varchar(50) NOT NULL,
  `id_media` varchar(50) NOT NULL,
  `id_sub` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `ket` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id`, `id_admin`, `id_media`, `id_sub`, `nama`, `ket`) VALUES
(2, '5', '9', '2', 'Honeywell : HCC-6605PVI', '<p>&bull; Ultra high resolution: 600 TVL<br />\r\n&bull; Min. illumination: 0 Lux (IR ON)<br />\r\n&bull; 2 IR LED array lights; 30 &ndash; 40m IR range<br />\r\n&bull; Manual zoom &ndash; f=2.8 &ndash; 10mm DC lens<br />\r\n&bull; Honeywell BMB&trade; technology<br />\r\n&bull; AES, BLC, White Balance, Digit'),
(3, '5', '10', '6', 'Honeywell : VISTA-128BPT SERIES', '<p>Standard features (VISTA-128BPT and VISTA-128BPTSIA):</p>\r\n\r\n<ul>\r\n	<li>Provides nine style-B hardwired zones</li>\r\n	<li>Supports up to 119 additional zones using a built-in polling (V-Plex&reg;,multiplex) loop interface</li>\r\n	<li>Supports up to 127 wireless zones using up to two 5800 series wir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dealer`
--

CREATE TABLE `dealer` (
  `id` int(11) NOT NULL,
  `nm_kantor` varchar(100) NOT NULL,
  `domisili` varchar(200) NOT NULL,
  `tlp_kantor` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ref` varchar(100) NOT NULL,
  `minat` varchar(100) NOT NULL,
  `pic` varchar(100) NOT NULL,
  `phone_pic` varchar(100) NOT NULL,
  `email_pic` varchar(200) NOT NULL,
  `vendor` varchar(100) NOT NULL,
  `barang` varchar(100) NOT NULL,
  `brand` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama`) VALUES
(1, 'CCTV'),
(2, 'Intrusion Alarm'),
(3, 'Access Control'),
(7, 'Fire Alarm'),
(8, 'PAVA'),
(9, 'Video Door Phone');

-- --------------------------------------------------------

--
-- Struktur dari tabel `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `media`
--

INSERT INTO `media` (`id`, `gambar`) VALUES
(2, 'hospital.jpg'),
(4, 'music-studio-12.jpg'),
(5, 'office.jpg'),
(6, '1499799-l.jpg'),
(7, 'school.jpg'),
(8, 'analog1.PNG'),
(9, 'analog2.png'),
(10, 'vista128bpt_pr.jpg'),
(11, '1.jpg'),
(12, '1.jpg'),
(13, '1.jpg'),
(14, '1.jpg'),
(15, '1.jpg'),
(16, 'logombs.png'),
(17, 'banner5.jpg'),
(18, 'banner2.jpg'),
(19, 'pakuwon.png'),
(20, 'Cws.png'),
(21, 'sinar.png'),
(22, 'pasar.png'),
(23, 'royal.PNG'),
(24, '331733781.jpg'),
(25, 'TP.PNG'),
(26, '2c41ce24-1a6a-43a2-9633-8f51815d572b_169.jpeg'),
(27, 'access_control_fallback.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `msg`
--

CREATE TABLE `msg` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tlpn` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sbj` varchar(100) NOT NULL,
  `pesan` varchar(300) NOT NULL,
  `time` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `msg`
--

INSERT INTO `msg` (`id`, `nama`, `tlpn`, `email`, `sbj`, `pesan`, `time`, `status`) VALUES
(1, 'asd', 'dasd', 'lukyrahman68@gmail.com', 'asd', 'ads', '0000-00-00 00:00:00', 1),
(2, 'Luky', '0875478244', 'lukyrahman68@gmail.com', 'Tanya ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ut sapiente autem ratione itaque fugit minus quisquam labore provident eligendi velit! Maxime, rem molestiae. Aliquid corrupti minus in possimus doloribus fugit?', '0000-00-00 00:00:00', 1),
(3, 'rendy', '087542', 'rendy@gmail.com', 'itu', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Laudantium, nobis! Similique alias quis, provident nostrum eligendi iste deleniti animi a. Vel vitae nobis consectetur distinctio omnis asperiores dolores blanditiis qui.', '2018-09-02 06:19:00', 1),
(5, 'aaaa', 'aaaaa', 'tes@gmail.com', 'aaaaaaaaaaaaaa', 'sssssssssssssssssssssssssssssssss', '2018-09-02 18:23:33', 1),
(6, 'asd', 'ads', 'asdasd@asdasd', 'asdasd', 'asdasd', '2018-09-02 18:30:30', 0),
(7, 'Nestya', '08663534390', 'nestyadamayanti@gmail.com', 'FingerPrint', 'zxdfcvhbjnlm,erdtyguoijpk;lelfkwjgdcfxzv bnmx,cf.reifgsdyuvxhbnmc,sdfgthryjukujyhtrgr', '2018-09-03 08:51:31', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `post`
--

CREATE TABLE `post` (
  `idpost` int(11) NOT NULL,
  `id_site` varchar(10) NOT NULL,
  `id_postkat` varchar(10) NOT NULL,
  `id_media` varchar(10) NOT NULL,
  `judul` text NOT NULL,
  `isi` text NOT NULL,
  `createby` varchar(500) NOT NULL,
  `datecreate` date NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post`
--

INSERT INTO `post` (`idpost`, `id_site`, `id_postkat`, `id_media`, `judul`, `isi`, `createby`, `datecreate`, `status`) VALUES
(6, '3', '11', '', 'Alamat', '<p>Jalan Dharmahusada Utara No.22 Surabaya 60285, Indonesia&nbsp;</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(7, '3', '10', '', 'Telephon', '<p>Telp: (031)&nbsp;591-4700<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(031) 593-9337<br />\r\nFax: (031) 596-3451&nbsp;</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(8, '3', '12', '', 'Email', '<p>Email:&nbsp;<a href=\"mailto:marketing@mbscctv.com\">marketing@mbscctv.com</a></p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(9, '1', '16', '', 'Corporate Values', '<p><strong>S</strong>ervice Excellent</p>\r\n\r\n<p><strong>E</strong>fficient</p>\r\n\r\n<p><strong>C</strong>ustomer Satisfaction</p>\r\n\r\n<p><strong>U</strong>seful</p>\r\n\r\n<p><strong>R</strong>eal sirit for excellence</p>\r\n\r\n<p><strong>I</strong>ntegrity</p>\r\n\r\n<p><strong>T</strong>rust and Respect</p>\r\n\r\n<p><strong>Y</strong>ielding right</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(10, '1', '1', '', 'PT Media Bersama Sukses', '<p>Kami adalah perusahaan yang bergerak di bidang security technology system. Kami telah berkarya sejak tahun 1998 dan kini telah berkembang pesat dan berpengalaman dalam pemasangan instalasi dan maintenance. Kami telah merintis dan memantapkan usaha sebagai provider dan distributor produk teknologi keamanan yang berkualitas antara lain CCTV, Access Control, Finger Print, Fire System, Time Attendance, Public Address &amp; Voice Alarm.&nbsp;<br />\r\n<br />\r\nBermodalkan kepercayaan yang telah diberikan, PT. Media Bersama Sukses merambah berbagai penjuru di Nusantara dan menangani instalasi di berbagai perusahaan besar. Salah satu mitra usaha kami dari Amerika yaitu&nbsp;<strong>Honeywell&nbsp;</strong>memberikan penghargaan kepada kami atas kontribusi dan performa yang sangat baik. Hal ini menjadi tolak ukur bahwa kami adalah badan usaha yang berpengalaman dan terpercaya.</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(11, '5', '18', '2', 'Solusi Keamanan Untuk Rumah Sakit', '<p><strong>VIDEO SURVEILLANCE</strong></p>\r\n\r\n<p>CCTV berguna untuk menjadi bukti apabila ada tinfakan kekerasan, pencuarian, perampokan dan hal-hal yang tidak diinginkan. CCTV juga membantu mengawasi pasien yang dalam kesulitan juga pengunjung yang datang berkunjung. CCTV dapat direkam dan diawasi via internet kemudian diakses dengan gadget. CCTV juga akan terhubung dengan security control.</p>\r\n\r\n<p><img alt=\"\" src=\"https://5.imimg.com/data5/RH/WK/MY-53916792/honeywell-cctv-camera-system-500x500.jpg\" style=\"height:200px; width:200px\" />&nbsp;<img alt=\"\" src=\"https://bizimages.withfloats.com/tile/574e7fac9ec6680770343daa.jpg\" style=\"height:153px; width:250px\" /></p>\r\n\r\n<hr />\r\n<p><strong>PUBLIC ADDRESS,&nbsp;VOICE ALARM &amp; FIRE SYSTEM</strong></p>\r\n\r\n<p>Fire system berguna untuk mendeteksi kebakaran sejak dini. Evakuasi di Rumah Sakit akan lebih sulit dilakukan karena banyak pasien sakit didalamnya. Perlu sistem yang merspon dengan cepat dan evektif untuk mempercepat waktu evakuasi. Oleh karena itu Fire Alarm perlu dihubungkan dengan Public Address &amp; Voice Alarm. Publik Address pada kondisi normal digunakan untuk memberi pengumuman, panggilan atau menyetel musik. Public Address yang terkoneksi dengan Voice Alarm akan secara otomatis memberi arahan vakuasi pada pintu terdekat.</p>\r\n\r\n<p><img alt=\"\" src=\"https://3.imimg.com/data3/NQ/DA/MY-10087183/projection-system-500x500.jpg\" style=\"height:207px; width:250px\" /><img alt=\"\" src=\"https://www.esser-systems.com/productimages////loudspeaker-with-en-54-24-certificate_pic_productfamily_800_800_00144549_0.png\" style=\"height:153px; width:200px\" /><img alt=\"\" src=\"https://5.imimg.com/data5/NP/XI/MY-28031717/fire-alarm-500x500.png\" style=\"height:150px; width:200px\" /></p>\r\n\r\n<hr />\r\n<p><strong>ACCESS CONTROL</strong></p>\r\n\r\n<p>RFID (Radio Frequency Identification) juga dapat diterapkan di rumah sakit. pasien dan bayi dapat diberi tag khusus yang diaman ketika mereka keluar dari rumah sakit akan memicu alarm pemberitahuanke security control room. setelah itu petugas dapat melacak keberadaan mereka karena tersambig dengan peta gps. RFID juga dapat membantu efisiensi waktu seperti operasi atau menangani pasien gawat darurat di Unit Gawat Darurat dengan membantu penelusuran letak alat medis tertentu.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.intertec.com.tr/images/images/brands/8im-systems-550b5157198c0f.png\" style=\"height:140px; width:200px\" /></p>\r\n\r\n<p>Selain itu, penting untuk memasang access control pada ruangan seperti ruang bayi, ruang rekam medis, ruang administrasi dan sebagainya agar orang asing tidak dapat sembarangan mengakses tempat tersebut. selain melindungi harta yang terlihat, ruamh sakit juga harus melindungi nama baik sebagai harta yang tidak terlihat (intangible asset) untuk kontinuitas jangka panjang.</p>\r\n\r\n<p><img alt=\"\" src=\"https://3.imimg.com/data3/MF/IU/MY-2466863/honeywell-access-control-system-250x250.jpg\" style=\"height:188px; width:250px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(12, '5', '18', '7', 'Solusi Keamanan Untuk Sekolah', '<p><strong>ACCESS CONTROL&nbsp;</strong></p>\r\n\r\n<p>Teknologi kini sangat memungkinkan murid dapat secara otomatis melakukan absensi hanya dengan masuk ke area sekolah dengan sustem RFID (Radio Frequency Identification). Setiap murid akan dilengkapi kartu di dalam tasnya dan membaca data melalui gelombang radio. atau dengan alternatif access control yang memakai kartu yang dipasang di depan pintu kelas. Untuk ruang guru dan administrasibisa menggunakan access control yang sama. semua akses akan terhubung dengan security control room</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.whitewolfsecurity.ca/images/honeywell_logo.gif\" style=\"height:193px; width:253px\" /></p>\r\n\r\n<hr />\r\n<p><strong>VIDEO SURVEILLANCE</strong></p>\r\n\r\n<p>CCTV sekolah dapat diakses melewati internet lewat mobile phone, laptop ataupun tablet. CCTV di sekolah tidak hanya memiliki fungsi mengawasi berjalannya kegiatan belajar mengajar. tetapi juga menjadi bukti apabila ada tindakan kekerasan, penculikan, perampokan atau kejadian yang tidak diinginkan. CCTV juga membantu mengawasi siapa saja pengunjung yang datang berkunjung atau siapa saja yang menjemput murid-murid. CCTV juga akan terhubung dengan&nbsp; security control alarm.</p>\r\n\r\n<p><img alt=\"\" src=\"http://blog.mitrabuanasekurindo.com/wp-content/uploads/2016/04/cctv.jpg\" style=\"height:127px; width:300px\" /></p>\r\n\r\n<hr />\r\n<p><strong>PUBLIC ADDRESS, VOICE ALARM &amp; FIRE SYSTEM</strong></p>\r\n\r\n<p>Fire system beguna untuk mendeteksi kebakaran sejak dini. keselamatan para murid, guru dan karyawan haruslah menjadi prioritas pihak sekolah karena berhubungan dengan nama baik. oleh karena itu Fire allarm perlu dihubungkan dengan public address dan voice alarm . public address apada kondisi normal digunakan untuk memberi pengumuman, pagggilam dan radio sekolah. Pada kondisi darurat seperti kebakaran, public address yang terkoneksi dengan voice alarm akan secara otomatis memberi arahan evakuasi pada pintu terdekat.</p>\r\n\r\n<p><img alt=\"\" src=\"https://3.imimg.com/data3/LN/IT/MY-8592105/honeywell-p-a-system-250x250.jpg\" style=\"height:166px; width:249px\" />&nbsp;<img alt=\"\" src=\"https://www.esser-systems.com/productimages/standard-loudspeaker///ceiling-speakers-3_pic_productfamily_800_800_00145374_0.png\" style=\"height:153px; width:200px\" />&nbsp;<img alt=\"\" src=\"http://lyncosecurity.com/files/2016/08/VISTA_TURBO_FIRE_hi.jpg?w=316&amp;a=t\" style=\"height:217px; width:275px\" /></p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(13, '5', '18', '5', 'Solusi Keamanan UntuK Dedung', '<p><strong>VIDEO SURVEILLANCE</strong></p>\r\n\r\n<p>Mobil yang parkir akan menerima karcis sebagai bukti untuk pengunjung dan system akan mencatat&nbsp; pukul berapa masuk dan&nbsp;mencatat plat nomor mobil. Mobil disorot oleh CCTV outdor yang terkoneksi ke security control room (pusat pengawasan)</p>\r\n\r\n<p><img alt=\"\" src=\"https://buildingcontrols.honeywell.com/system/products/alternate_images/000/000/135/default/cameras.jpg?1386793002\" style=\"height:150px; width:250px\" /></p>\r\n\r\n<hr />\r\n<p><strong>ACCESS CONTROL</strong></p>\r\n\r\n<p>Visitor Management System di lobi dimulai dari san KTP/ SIM pengunjung. kemudia mengambil foto pengunnjung dan diproses oleh system apakah pengunjung pernah berkunjung atau masuk dalam daftar pengunjung yang patut diawasi/ blacklist. Setelah memastikan pengunjung tidak ter-blacklist, pengunjung diberi kartu akses.</p>\r\n\r\n<p><img alt=\"\" src=\"http://vortecautomation.com/vortec/Entrance%20Automation/Visitor%20Management/honeywell-access-systems-lobbyworks-kiosk%20-%20Copy.jpg\" style=\"height:200px; width:200px\" /></p>\r\n\r\n<p>Dengan kartu akses tersebut pengunjung baru bisa mengakses flap barrier dan naik elevator. Kemanapun pengunjung ergi di dalam gedung dapat terlacak masuk ke area yang dituju atau tidak dan pada jam berapa oengunjung masuk dan keluar.</p>\r\n\r\n<p>Access control pada pintu-pintu kantor tidak hanya membatasi akses masuk pengunjung dan karyawan, dapat juga membantu absensi karyawan. acces control diatur secara otomatis mengunci pada jam-jam tertentu. CCTV indoor dan acces vcontrol dapat dipantau melaui intermet juga mengawasi kinerja karyawan dengan mudah dan praktis. Juga tentu terkoneksi ke security control room melalui LAN (Local Area Network).</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.purch.com/w/1000/aHR0cHM6Ly93d3cuYnVzaW5lc3MuY29tL2ltYWdlcy9yZXYvc2Nybi9sYXJnZS81NzY4OS1ob25leXdlbGwtbWFuYWdlZC1hY2Nlc3MtY29udHJvbDQuanBn\" style=\"height:139px; width:250px\" /></p>\r\n\r\n<hr />\r\n<p><strong>FIRE SYSTEM, PUBLIC ADDRESS &amp; VOICE ALARM</strong></p>\r\n\r\n<p>Fire system berguna untuk mendeteksi kabakaran sejak dini. Di gedung perkantoran bertingkat, evakuasi akan sulit dilakukan apabila tidak dibantu dengan sistem yang responnya cepat dan terintegrasi. juga banyak dokumen penting dan harta penting dikantor yang harus dijaga. oleh karena itu fire alarm perlu dihubungkan dengan public address &amp; voice alarm. public address pada kondisi darurat seperti kebakaran, public address yang terkoneksi dengan voice alarm akan segera otomatis memberi arahan evakuasi pada pintu terdekat.</p>\r\n\r\n<p><img alt=\"\" src=\"http://www.vdidistribution.com/wp-content/uploads/2016/10/BannerItem5.png\" style=\"height:193px; width:300px\" /></p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(14, '6', '', '', 'coba', '<p>coba post 1</p>\r\n', '', '2018-08-10', 'Diterbitkan'),
(16, '2', '5', '16', 'PT MEDIA BERSAMA SUKSES', '<p>PT Media Bersama Sukses adalah perusahaan yang bergerak di bidang security technology system. Kami telah berkarya sejak tahun 1998 dan kini telah berkembang pesat dan berpengalaman dalam pemasangan instalasi dan maintenance.&nbsp;</p>\r\n\r\n<ul>\r\n	<li>&nbsp;Product Supply</li>\r\n	<li>&nbsp;System Design</li>\r\n	<li>&nbsp;System Integration Consulting</li>\r\n	<li>&nbsp;After-Sales Service</li>\r\n	<li>&nbsp;Product Training</li>\r\n	<li>&nbsp;Demo &amp; Backup Unit</li>\r\n</ul>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(17, '5', '13', '', 'We Provide All Security Solution', '<p>Kami adalah perusahaan yang berfokus pada bidang Security &amp; Fire Solution System. Bisnis ini tidak hanya tentang menjual produk tetapi juga membina hubungan yang baik dan kepercayaan pada anda. Dapat membantu memberikan solusi keamanan dan membantu melindungi harta serta diri anda adalah suatu kehormatan bagi kami.&nbsp;</p>\r\n\r\n<p>Pernahkah terlintas dipikiran anda bagaimana jika permasalahan terkait security &amp; fire system terabaikan? Kehilangan harta pribadi adalah akibat umum dari permasalahan tersebut. Tetapi pernahkah terpikirkan tentang akibat lebih jauh yang dapat ditimbulkan? seperti&nbsp; kehilangan buah hati, kerusakan yang terlambat dicegah, kontinuitas bisnis terancam, manajemen yang tidak efektif, respon terlambat, evakuasi kacau, kehilangan harta perusahaan hingga menurunnya kepuasan customer.</p>\r\n\r\n<p>Kami, PT MEDIA BERSAMA SUKSES dapat memberikan solusi terbaik untuk mencegah terjadinya hal tersebut</p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(18, '2', '4', '', 'Security & Fire Solution', '<p>Kami adalah perusahaan yang berfokus pada bidang Security &amp; Fire Solution System. Dapat membantu memberikan solusi keamanan dan membantu melindungi harta serta diri anda adalah suatu kehormatan bagi kami.&nbsp;</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(19, '2', '4', '', 'Access & Visitor Management', '<p>membantu menyimpan data pengunjung secara otomatis dan&nbsp;memastikan setiap perorangan yang berada di dalam gedung dikenali oleh sistem dan memiliki ijin untuk masuk ke area-area yang ditetukan.&nbsp;</p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(23, '2', '8', '17', 'Provide Your Security Solution', '<p>Helping provide all of security solution for your business</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(24, '2', '4', '', 'Dealer Scheme', '<p>Kami mengajak semua partner untuk menyediakan semua kebutuhan terkait teknologi keamanan sistem sebagai wujud dari motto kami dalam menjalin hubungan baik dengan semua customer</p>\r\n', '5', '2018-09-01', 'Diterbitkan'),
(25, '3', '17', '', 'Enquiries', '<p>apakah anda punya pertanyaan umum tentang kami ? atau pertanyaan spesifik tentang produk, solusi yang kami tawarkan atau tentang bisnis kami ?</p>\r\n\r\n<p>Jika ada, anda dapat mengajukannya dengan mengisi form dibawah ini&nbsp;</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(26, '2', '8', '18', 'Provide Security Equipments', '<p>We&#39;re In The Business To Help You Get The Best Security Equipment</p>\r\n', '5', '2018-08-27', 'Diterbitkan'),
(27, '2', '19', '19', 'logo pakuwon', '', '5', '2018-08-30', 'Diterbitkan'),
(28, '2', '19', '20', 'logo ciputra', '', '5', '2018-08-30', 'Diterbitkan'),
(29, '2', '19', '21', 'logo sinar galaxy', '', '5', '2018-08-30', 'Diterbitkan'),
(30, '2', '19', '22', 'logo pasar atom', '', '5', '2018-08-30', 'Diterbitkan'),
(31, '2', '19', '23', 'logo royal plaza', '', '5', '2018-08-30', 'Diterbitkan'),
(32, '2', '19', '24', 'logo PTC', '', '5', '2018-08-30', 'Diterbitkan'),
(33, '2', '19', '25', 'Logo Tunjungan Plaza', '', '5', '2018-08-30', 'Diterbitkan'),
(34, '4', '', '26', 'CCTV Untuk Keamanan Pembukaan Asian Games', '<p>Kesuksesan Pembukaan&nbsp; Asian Games pada tanggal 18 Agustus 2018 lalu telah banyak menerima pujian dari berbagai negara. Kesuksesan acara pembukaan ajang olah raga terbesar se asia yang diselenggarakan di Gelora Bung Karno Jakarta tidak terlepas dari sistem keamanannya yang semakin diperketat oleh 8000 personil gabungan TNI dan Polri yang selalu sigap dalam memberikan pengamanan sepanjang acara . selain itu pengamanan juga didukung oleh 300 lebih CCTV yang berteknologi canggih dengan kemampuan pendeteksi wajah dipasang di beberapa titik GBK. CCTV dengan kemampuan pendeteksi wajah tersebut dapat membantu Polri untuk melacak wajah,nama,alamat dan data pribadi pelaku kejahatan.&nbsp;</p>\r\n\r\n<p><img alt=\"\" src=\"https://pbs.twimg.com/media/Dk6qhaVVsAANXH-.jpg\" style=\"height:371px; width:600px\" /><br />\r\npic : CNN Indonesia</p>\r\n\r\n<p>Kapolri Jenndral Tito Karnavian mengatakan bahwa pihaknya menggunakan sistem keamanan digital untuk pengamanan GBK sebagai upaya untuk meninimalisir kerusakan dan tindakan kejahatan selama Asian Games berlangsung.&nbsp;</p>\r\n\r\n<p>&quot;Kami telah memasang 300 lebih cctv dengan kemampuan pendeteksi wajah khusus untuk GBK, sehingga saat terekam bisa melacak nama, alamat rumah dan data pribadinya langsung,&quot; ujar Tito.</p>\r\n\r\n<hr />\r\n<p>Sumber : jakarta.tribunnews.com</p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(35, '4', '', '27', 'Teknologi RFID Untuk Kemudahan Aktivitas', '<p><em>Radio Frequency Identification </em>atau lebih dikenal dengan(RFID) adalah sistem identifikasi tanpa kabel yang memungkinkan pengambilan data melalui geloombang elektromagnetik. RFID menggunakan sistem identifikasi dengan gelombang radio. Untuk itu minimal dibutuhkan dua buah perangkat, yaitu yang disebut TAG dan READER. Saat pemindaian data, READER membaca sinyal&nbsp;yang diberikan oleh RFID TAG. Penerapan akses kontrol berteknologi RFID yang ditanam pada kartu, dewasa ini memiliki tren tersendiri. Terbukti dengan banyaknya penggunaan baik di instansi pendidikan dan perhotelan menjadikan tenologi ini diminati oleh semua pihak karena kemudahannya dalam pengoperasian dan perawatan.</p>\r\n\r\n<p><img alt=\"\" src=\"https://www.digitaledge.org/wp-content/uploads/2017/01/access_control_fallback.jpg\" style=\"height:334px; width:600px\" /></p>\r\n', '5', '2018-08-30', 'Diterbitkan'),
(36, '2', '26', '', 'Update Price List', '<p>Kami akan selalu sharing mengenai&nbsp;price list dan update harga</p>\r\n\r\n<p>&nbsp;</p>\r\n', '5', '2018-09-01', 'Diterbitkan'),
(37, '2', '26', '', 'Update Stock', '<p>Kami akan memberitahukan tentang update stock produk</p>\r\n', '5', '2018-09-01', 'Diterbitkan'),
(38, '2', '26', '', 'Product Demo ', '<p>Kami akan memberikan product demo and training sesuai kebutuhan anda</p>\r\n', '5', '2018-09-01', 'Diterbitkan'),
(39, '2', '26', '', 'Best Price', '<p>Anda akan menerima harga terbaik dan diskon hingga 50% setiap pembelian</p>\r\n', '5', '2018-09-01', 'Diterbitkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_kategori`
--

CREATE TABLE `post_kategori` (
  `id` int(11) NOT NULL,
  `id_site` varchar(10) NOT NULL,
  `kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `post_kategori`
--

INSERT INTO `post_kategori` (`id`, `id_site`, `kategori`) VALUES
(1, '1', 'Tentang'),
(2, '1', 'visi,misi,value'),
(3, '1', 'brand'),
(4, '2', 'business'),
(5, '2', 'services'),
(6, '2', 'news'),
(7, '2', 'customer'),
(8, '2', 'carousel'),
(9, '2', 'textline'),
(10, '3', 'phone'),
(11, '3', 'alamat'),
(12, '3', 'email'),
(13, '5', 'overall'),
(14, '1', 'Visi'),
(15, '1', 'Misi'),
(16, '1', 'Value'),
(17, '3', 'enquiries'),
(18, '5', 'solution'),
(19, '2', 'customer'),
(20, '0', 'Manajemen'),
(21, '0', 'Digital Marketing'),
(22, '0', 'Marketing Sales'),
(23, '0', 'Operasional'),
(24, '0', 'Accounting'),
(25, '0', 'Purchasing'),
(26, '2', 'dealer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profile`
--

CREATE TABLE `profile` (
  `id` varchar(10) NOT NULL,
  `id_media` varchar(50) NOT NULL,
  `nama_perusahaan` varchar(50) NOT NULL,
  `deskripsii` text NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tlpn` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `motto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profile`
--

INSERT INTO `profile` (`id`, `id_media`, `nama_perusahaan`, `deskripsii`, `alamat`, `tlpn`, `email`, `nama_pemilik`, `motto`) VALUES
('profile', '5', 'MBS', '<p>perusahaan <strong>CCTV</strong></p>\r\n\r\n<p>Bergerak dibidang Permancingan</p>\r\n\r\n<blockquote>CCTV,&nbsp; TV dll</blockquote>\r\n', 'jalan darmahusada no 2', '08745782', 'mbs@gmail.com', 'Luky Rahman', 'Maju boleh mundur jangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `site` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `site`
--

INSERT INTO `site` (`id`, `site`) VALUES
(0, 'Karir'),
(1, 'About'),
(2, 'Home'),
(3, 'Contact'),
(4, 'News'),
(5, 'Solution');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id` int(11) NOT NULL,
  `idkat` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_kategori`
--

INSERT INTO `sub_kategori` (`id`, `idkat`, `nama`) VALUES
(1, '1', 'Camera Analog HD'),
(2, '1', 'Camera Analog'),
(3, '1', 'Camera IP'),
(4, '1', 'DVR'),
(5, '1', 'NVR'),
(6, '2', 'Main Contoller'),
(7, '2', 'Detector / Sensor'),
(10, '2', 'Accessories'),
(11, '3', 'Panel Contoller'),
(12, '3', 'Standalone'),
(13, '3', 'Accessories'),
(14, '3', 'Gate'),
(15, '7', 'Semi Addressable'),
(16, '7', 'Full Addressable'),
(17, '7', 'Conventional'),
(18, '8', 'Main Unit'),
(19, '8', 'Speaker'),
(20, '8', 'Power Amplifier'),
(21, '8', 'Accessories'),
(22, '9', 'IP'),
(23, '9', 'Analog');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sub_sub_kategori`
--

CREATE TABLE `sub_sub_kategori` (
  `id` int(11) NOT NULL,
  `idsubkat` varchar(100) NOT NULL,
  `sub_sub_kategori` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sub_sub_kategori`
--

INSERT INTO `sub_sub_kategori` (`id`, `idsubkat`, `sub_sub_kategori`) VALUES
(4, '', 'Dome'),
(6, '1', 'Dome'),
(7, '1', 'Bullet'),
(8, '1', 'PTZ'),
(9, '6', 'Panel'),
(10, '6', 'Keypad'),
(11, '7', 'PIR Motion Sensor'),
(12, '7', 'Seismic / Vibration'),
(13, '7', 'Panic Button'),
(14, '7', 'Kick Bar'),
(15, '7', 'Money Clip'),
(16, '10', 'Audio / Visual'),
(17, '13', 'Software'),
(18, '13', 'Extender Module'),
(19, '14', 'Tripod'),
(20, '14', 'Flap Barrier'),
(21, '14', 'Swing Barrier'),
(22, '14', 'Full-Height Turnstille'),
(23, '11', 'Door'),
(24, '11', 'Lift'),
(25, '11', 'Reader'),
(26, '12', 'Reader'),
(27, '22', 'Guard Phone'),
(28, '22', 'Lobby Phone'),
(29, '22', 'VDP Unit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pswd` varchar(50) NOT NULL,
  `tlpn` varchar(50) NOT NULL,
  `company` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `alamatC` varchar(50) NOT NULL,
  `tgl_daftar` date NOT NULL,
  `role` varchar(50) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `jk`, `alamat`, `email`, `pswd`, `tlpn`, `company`, `jabatan`, `alamatC`, `tgl_daftar`, `role`, `photo`) VALUES
(4, 'Luky Rahman', 'laki-laki', 'Jalan Jakarta, Perak Timur, Kota Surabaya, Jawa Ti', 'lukyrahman68@gmail.com', '12345', '087745788898', 'PT Semua Bisa', 'Owner', 'Jalan Jakarta, Perak Utara, Kota Surabaya, Jawa Ti', '2018-07-27', 'Pelanggan', '1.jpg'),
(5, 'Nestya Arum Damayanti', 'Perempuan', 'jl sepanjang', 'nestyadamayanti@gmail.com', '12345', '0875442', 'MBS Company', 'Programer', 'Jalan apa', '2018-07-28', 'Administrator', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dealer`
--
ALTER TABLE `dealer`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`idpost`);

--
-- Indeks untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sub_sub_kategori`
--
ALTER TABLE `sub_sub_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dealer`
--
ALTER TABLE `dealer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `post`
--
ALTER TABLE `post`
  MODIFY `idpost` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `post_kategori`
--
ALTER TABLE `post_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `sub_sub_kategori`
--
ALTER TABLE `sub_sub_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
