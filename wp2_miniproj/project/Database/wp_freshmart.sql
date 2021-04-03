-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 07:59 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wp_freshmart`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbackdata`
--

CREATE TABLE `feedbackdata` (
  `fname` text NOT NULL,
  `email` text NOT NULL,
  `purpose` text NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedbackdata`
--

INSERT INTO `feedbackdata` (`fname`, `email`, `purpose`, `message`) VALUES
('Joey', 'joey23@gmail.com', 'Friend', 'Hello there'),
('Ross', 'ross342@gmail.com', 'Advertisement', 'Good service. Keep it up'),
('Monica', 'mongeller@hotmail.in', 'Friend', 'Service is great and very user friendly'),
('Janice', 'janice654@gmail.com', 'Search Engine', 'Freshmart is my favourite online grocery mart'),
('Aiswarya', 'aiswarya,k@somaiya.edu', 'Advertisement', 'Good work'),
('Ammy', 'ammy32@yahoo.com', 'Friend', 'I loved the service and the process'),
('John', 'deepak.hpcl@gmail.com', 'Friend', 'Hello'),
('Carey', 'alexcarey@rediffmail.com', 'Advertisement', 'Great Service! Loved it.'),
('Heckles', 'mrheckels@gmail.com', 'Advertisement', 'I like the service.'),
('Anika', 'anika61@gmail.com', 'Search Engine', 'The service is user-friendly. Keep up the good work!');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `username` text NOT NULL,
  `name` text NOT NULL,
  `category` text NOT NULL,
  `seller` text NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `username`, `name`, `category`, `seller`, `quantity`, `price`) VALUES
(1, 'sukh', 'Milk', 'Diary', 'Amul', 2, '30'),
(2, 'Max', 'Tomatoes', 'Veggies', 'Farm Fresh', 1, '50'),
(3, 'vaishu1', 'Saffola Oil', 'og', 'Shreeji ', 1, '100'),
(4, 'sukhu', 'Amul Butter', 'db', 'Amul', 1, '235'),
(7, 'sukhu', 'Capsicum', 'fv', 'Reliance Fresh', 1, '40'),
(11, 'sukhu', 'Aashirvaad atta', 'og', 'Dmart', 5, '200'),
(14, 'sukhu', 'Warana Milk', 'db', 'Shree Sai', 1, '40'),
(19, 'sukhu', 'Garlic', 'fv', 'Reliance Fresh', 1, '200'),
(20, 'sukhu', 'Spinach', 'fv', 'Farm Hut', 1, '50');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `price` int(10) NOT NULL,
  `seller` text NOT NULL,
  `category` text NOT NULL,
  `img` text NOT NULL,
  `quantity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `seller`, `category`, `img`, `quantity`) VALUES
(1, 'Amul Milk', 30, 'Rose Dairy', 'db', 'milk_amul.jpg', '1 Litre'),
(2, 'Tomato', 50, 'Farm fresh', 'fv', 'tomato.jpg', '1 Kg'),
(3, 'Saffola Oil', 100, 'Shreeji ', 'og', 'saff.jpg', '1 Litre pack'),
(4, 'Amul Butter', 235, 'Amul', 'db', 'amul_butter.png', '1'),
(7, 'Capsicum', 40, 'Reliance Fresh', 'fv', 'capsicum1.jpg', '1 Kg'),
(8, 'Tomato', 40, 'Grofers', 'fv', 'tomato3.jpg', '1 Kg'),
(9, 'Fortune Oil', 100, 'Dmart', 'og', 'fortune_oil.jpg', '1 Litre pack'),
(10, 'Gemini Oil', 90, 'Big Bazaar', 'og', 'gemini_oil.jpg', '1 Litre pack'),
(11, 'Aashirvaad atta', 200, 'Dmart', 'og', 'aashir_aata.png', '5 Kg'),
(12, 'Kohinoor Rice', 100, 'Shreeji', 'og', 'kohinoor.jpg', '2 Kg'),
(13, 'Chilli Powder', 50, 'Reliance Fresh', 'og', 'chillipowder.jpg', '1 pack'),
(14, 'Warana Milk', 40, 'Shree Sai', 'db', 'warana_milk.jpg', '1 Litre'),
(15, 'Amul Milk', 38, 'Krishna Dairy', 'db', 'amul2.jpg', '1 Litre'),
(16, 'Amul Ghee', 150, 'Krishna Dairy', 'db', 'amul_ghee.jpg', '1 '),
(17, 'Wibs Bread', 22, 'Shree Sai', 'db', 'bread.jpg', '1'),
(18, 'Onion', 70, 'Farm Fresh', 'fv', 'onion.jpg', '1 Kg'),
(19, 'Garlic', 200, 'Reliance Fresh', 'fv', 'garlic.jpg', '1 Kg'),
(20, 'Spinach', 50, 'Farm Hut', 'fv', 'spinach.jpg', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `username`, `password`, `email`, `address`) VALUES
(3, 'Aiswarya Suresh', '$2y$10$W1tyTKdajzUmvAS1zdt/Qu8T3/9FoV5y9Fz.p53Tpx9h.bLG1HIbS', 'aishwarya51100@gmail.com', 'Dubai, UAE'),
(6, 'Akhilesh Suresh', '$2y$10$jhLEAdjHqpWD9vRJVohFweXKqCguViOhZADsg7d9M4OeJ1FS5JfQ.', 'akhi@blog.com', 'Canberra, Australia'),
(7, 'Nina Dobrev', '$2y$10$6.uiEEkdIg/ScFvEoUpjJ..9vW.zdCjnrJ5MBNVfwptcbaW6LXuWS', 'nina@blog.com', 'LA, California'),
(9, 'Dave Franco', '$2y$10$APa3eCgfqBvxiAoOKcllWec.j7y1BmiuG/ddcV536P2JGBOSoLm6i', 'davef@gmail.com', 'London, England'),
(12, 'sukhada@11', '$2y$10$LF04A/xT4YPGq84GEr0Ai.FUc308Uq4fMfM76KqRI4ocZ6UQwhOHy', 'vaishali.v@somaiya.edu', 'Pandurang Ithape Marg'),
(13, 'sukhada123', '$2y$10$d4GWr1ZaDKZOXM3AfNd1EuVIhCC6GPsbzjfxLuCOuYCfXCzH0Py4O', 'aiswarya.k@somaiya.edu', 'Pandurang Ithape Marg'),
(14, 'vaishali1', '$2y$10$dz3zAHHn3G2HQ.WmUYjqqO2gY3paAMWydMCJE2AMH0dou1d2Ojcju', 'me.v@somaiya.edu', 'Pandurang Ithape Margj'),
(15, 'sukh', '$2y$10$osMLHxda/LjZMWWzPuY4QeIJj9iG/N8Fhmzn1ShqINo6DJb0VUR8K', 'sukh.vv@som.edu', 'Pandurang Ithape Marg'),
(16, 'sukhu', '$2y$10$.8dJOhcXJdldlRRTO0wnjOz8rtluW9t1cL6HSFDSPoPtpcHnwNakW', 'sukhada998@gmail.com', 'Pandurang Ithape Marg'),
(18, 'sukhada1', '$2y$10$94NfIEkxlxyR8DWDz7I3kuIyNkh60JoEUV46ZWxbZkiK/S6aG8Dbq', 'sukhada9987@gmail.com', 'Pandurang Ithape Marg,Nerul'),
(20, 'sukhada_v1', '$2y$10$ln4a9la0mWD9jtjr9Niv2ewzk0TWL2sNnXq7mR6ov.t7iF63UKX3G', 'sukhada.v@somaiya.edu', 'A-2/23, Sai Siddhi, Seawoods');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbackdata`
--
ALTER TABLE `feedbackdata`
  ADD UNIQUE KEY `email` (`email`) USING HASH;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
