-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 03, 2024 at 01:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `password` varchar(25) NOT NULL,
  `kode_admin` varchar(12) NOT NULL,
  `no_tlp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `nama_admin`, `password`, `kode_admin`, `no_tlp`) VALUES
(1, 'Malvin', '1', 'admin1', '2634558'),
(2, 'Lyni', '2', 'admin2', '3759760');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `cover` varchar(255) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `jumlah_halaman` int(11) NOT NULL,
  `buku_deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`cover`, `id_buku`, `kategori`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `jumlah_halaman`, `buku_deskripsi`) VALUES
('66d2796a229d8.png', '01', 'sains', 'Bird Park: The Science Life', 'Dr. Emily Harper', 'Greenleaf Press', '2022-03-15', 320, ''),
('66d27f3643e7c.png', '02', 'novel', 'Trees for a Greener Future ', 'Prof. Jonathan Green', 'EcoBiz Publications', '2021-09-10', 275, ''),
('66d2800f22d2c.png', '03', 'filsafat', 'Muted Poster: Design Insights', 'Mia Thompson', 'Design Wisdom Press', '2023-08-10', 210, '\"Muted Poster: Design Insights\" delves into the philosophy and aesthetics behind minimalist poster design. This book explores the principles of simplicity and subtlety in visual communication, offering insights into how muted colors and minimalistic design can convey powerful messages. Ideal for designers and art enthusiasts, it provides a thought-provoking look at how less can be more in the world of graphic design.'),
('66d280d5281d2.png', '04', 'bisnis', 'Clothes Autumn: Art of Fashion', 'Alex Carter', 'Fashion Insights Publishing', '2024-05-20', 111, ''),
('66d2836860d5c.png', '05', 'novel', 'Memories of the Blade : Destined', 'Richard Lawson', 'Richard Lawson', '2022-11-12', 340, '\"Memories of the Sword\" is a gripping historical novel that delves into the life of a legendary warrior and the impact of their sword on a tumultuous era. The story weaves a rich tapestry of history, adventure, and personal struggle, as the protagonist uncovers secrets and battles for justice. A compelling read for fans of historical fiction and epic tales.'),
('66d284271121b.png', '06', 'informatika', 'Classic Blue: Tech Digital Design', 'Julia Marks', 'Tech Design Publications', '2024-02-22', 270, 'Classic Blue\" explores the fundamentals and evolution of color theory in digital design. This book provides insights into how the color blue has been used in various digital applications, its psychological impact, and its role in modern technology. Ideal for designers, developers, and tech enthusiasts interested in the intersection of color and digital media.'),
('66d2849c33f68.png', '07', 'novel', 'Christmas Has Come : December', 'Emily Stone', 'Holiday Reads Publishing', '2023-12-01', 290, ''),
('66d28cc88476b.png', '08', 'filsafat', 'Modern Abstract Art Posters', 'Daniel Brooks', 'Art Theory Press', '2023-07-10', 210, '&quot;Modern Abstract Art Posters&quot; delves into the philosophical and artistic concepts behind contemporary abstract poster design. This book explores the evolution of abstract art in poster form, analyzing key design principles, color theory, and the impact of minimalism on modern aesthetics. Ideal for art students, designers, and enthusiasts interested in the intersection of philosophy and visual design.'),
('66d28d6aa1955.png', '09', 'novel', 'Pouring Dreams: Life Harder', 'Sarah Johnson', 'Horizon Books', '2012-06-15', 310, ''),
('66d28ddc51aef.png', '10', 'novel', 'Lord of the Kings: Kingdom Tales', 'Arthur Blackwood', 'Epic Tales Publishing', '2024-08-31', 452, '');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_buku`
--

CREATE TABLE `kategori_buku` (
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kategori_buku`
--

INSERT INTO `kategori_buku` (`kategori`) VALUES
('bisnis'),
('filsafat'),
('informatika'),
('novel'),
('sains');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `nisn` int(11) NOT NULL,
  `kode_member` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(20) NOT NULL,
  `kelas` varchar(5) NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `tgl_pendaftaran` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`nisn`, `kode_member`, `nama`, `password`, `jenis_kelamin`, `kelas`, `jurusan`, `no_tlp`, `tgl_pendaftaran`) VALUES
(1, '1', '1', '$2y$10$FOxMlZS/r//0dyZLKynspOxe634Nv/b69ZIbPR6LnO1gQd6gSebYu', 'Male', 'XI', 'Information System Network and Applications', '1', '2024-09-02'),
(333, '04', 'dynax', '$2y$10$0ct7dEXVCNc8p67ih9DgtumBormMStM8BZaE8MwiEv6SgQa9bEafi', 'Female', 'XI', 'Machining Technology', '5428572', '2024-09-03'),
(555, '02', 'lyni', '$2y$10$pczCVyyGBL.GYp47LrAwduRo..gfgGLemmI2FvISVJKjlKLznmfly', 'Male', 'X', 'Information System Network and Applications', '01319', '2024-09-03'),
(999, '03', 'naomi', '$2y$10$MaGqrM/2JZMk8LNJ5wKHZe2.PyYDj0CRnsco173VfmL7FR1OB/m/G', 'Secret', 'X', 'Electrical Power Installation Engineering', '25392869', '2024-09-03');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `nisn`, `id_admin`, `tgl_peminjaman`, `tgl_pengembalian`) VALUES
(78, '01', 555, 1, '2024-09-03', '2024-09-10'),
(79, '03', 1, 2, '2024-09-12', '2024-09-19');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` varchar(20) NOT NULL,
  `nisn` int(11) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `buku_kembali` date NOT NULL,
  `keterlambatan` enum('YA','TIDAK') NOT NULL,
  `denda` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`id_pengembalian`, `id_peminjaman`, `id_buku`, `nisn`, `id_admin`, `buku_kembali`, `keterlambatan`, `denda`) VALUES
(60, 76, '02', 1, 1, '2024-11-08', 'YA', -100),
(61, 77, '02', 999, 1, '2024-09-27', 'YA', 10000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_admin` (`kode_admin`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD KEY `kategori` (`kategori`);

--
-- Indexes for table `kategori_buku`
--
ALTER TABLE `kategori_buku`
  ADD PRIMARY KEY (`kategori`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`nisn`),
  ADD UNIQUE KEY `kode_member` (`kode_member`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`),
  ADD KEY `id_peminjaman` (`id_peminjaman`),
  ADD KEY `id_buku` (`id_buku`),
  ADD KEY `nisn` (`nisn`),
  ADD KEY `id_admin` (`id_admin`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `kategori_buku` (`kategori`);

--
-- Constraints for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Constraints for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`id_buku`) REFERENCES `buku` (`id_buku`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`nisn`) REFERENCES `member` (`nisn`),
  ADD CONSTRAINT `pengembalian_ibfk_4` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
