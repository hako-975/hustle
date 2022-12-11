-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2022 pada 14.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hustle`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_stock` int(11) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_description` text NOT NULL,
  `product_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_stock`, `product_price`, `product_description`, `product_img`) VALUES
(1, 'Lonely Cry', 11, 85000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos repellendus aut ea ullam necessitatibus distinctio qui soluta maiores. Vel nostrum qui iusto numquam distinctio exercitationem, repellendus alias eum ab dolorem.\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis facilis optio tempore impedit cumque praesentium aperiam suscipit ex dolorum?\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. A, quibusdam. Consectetur, placeat. Laborum tenetur voluptate alias, optio deserunt ullam ut recusandae aperiam, saepe rerum suscipit placeat accusamus provident nulla facere!\r\nLorem ipsum dolor sit amet consectetur, adipisicing elit. A, quibusdam. Consectetur, placeat. Laborum tenetur voluptate alias, optio deserunt ullam ut recusandae aperiam, saepe rerum suscipit placeat accusamus provident nulla facere!\r\n', '63949cf9d428e1-01.png'),
(2, 'Very Angry', 12, 85000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos repellendus aut ea ullam necessitatibus distinctio qui soluta maiores. Vel nostrum qui iusto numquam distinctio exercitationem, repellendus alias eum ab dolorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis facilis optio tempore impedit cumque praesentium aperiam suscipit ex dolorum?', '63949d096c6431-02.png'),
(3, 'Depression', 12, 85000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos repellendus aut ea ullam necessitatibus distinctio qui soluta maiores. Vel nostrum qui iusto numquam distinctio exercitationem, repellendus alias eum ab dolorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis facilis optio tempore impedit cumque praesentium aperiam suscipit ex dolorum?', '63949d1a6eed91-03.png'),
(4, 'Human Brain', 11, 85000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos repellendus aut ea ullam necessitatibus distinctio qui soluta maiores. Vel nostrum qui iusto numquam distinctio exercitationem, repellendus alias eum ab dolorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis facilis optio tempore impedit cumque praesentium aperiam suscipit ex dolorum?', '63949d30e1a561-04.png'),
(5, 'Overthinking', 10, 85000, 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quos repellendus aut ea ullam necessitatibus distinctio qui soluta maiores. Vel nostrum qui iusto numquam distinctio exercitationem, repellendus alias eum ab dolorem. Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit perferendis facilis optio tempore impedit cumque praesentium aperiam suscipit ex dolorum?', '63949d3e8000b1-05.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `receipt`
--

CREATE TABLE `receipt` (
  `no_receipt` varchar(50) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` varchar(10) NOT NULL,
  `total` int(11) NOT NULL,
  `note` text DEFAULT '-',
  `date_checkout` datetime NOT NULL,
  `status` enum('process','completed') DEFAULT 'process'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `receipt`
--

INSERT INTO `receipt` (`no_receipt`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `product_id`, `qty`, `size`, `total`, `note`, `date_checkout`, `status`) VALUES
('11122022/1/6395c3e5bb14f', 'Andri Firman Saputra', '+628587878768768', 'andrifirmansaputra1@gmail.com', 'grand akasia', 1, 1, 'S', 103000, '', '2022-12-11 06:49:57', 'completed'),
('11122022/4/6394d9adb1903', 'Andri Firman Saputra', '+6287808675313', 'andrifirmansaputra1@gmail.com', 'Jl. Pocis', 4, 1, 'S', 103000, '-', '2022-12-11 02:10:37', 'completed'),
('11122022/5/63958e5332003', 'Andri Firman Saputra', '+6287808675313', 'andrifirmansaputra1@gmail.com', 'Jl. Pocis', 5, 2, 'L', 188000, 'ukuran L', '2022-12-11 03:01:23', 'completed');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `full_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `full_name`) VALUES
(1, 'admin', '$2y$10$oWYI5ydieKD.1PZ4Ee3CPeOOt3ks10s3nv7OM0NFWyFN.8D6bEEB6', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indeks untuk tabel `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`no_receipt`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
