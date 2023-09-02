-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2021 at 11:38 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `herbarium_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblplant_details`
--

CREATE TABLE `tblplant_details` (
  `id` int(11) NOT NULL,
  `family_name` varchar(50) NOT NULL,
  `plant_name` varchar(50) NOT NULL,
  `herbarium_img` varchar(100) NOT NULL,
  `original_img` varchar(100) NOT NULL,
  `common_name` varchar(50) NOT NULL,
  `local_name` varchar(50) NOT NULL,
  `locality` varchar(50) NOT NULL,
  `altitude` varchar(50) NOT NULL,
  `habit` varchar(500) NOT NULL,
  `descr` varchar(500) NOT NULL,
  `uses` varchar(500) NOT NULL,
  `upload_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblplant_details`
--

INSERT INTO `tblplant_details` (`id`, `family_name`, `plant_name`, `herbarium_img`, `original_img`, `common_name`, `local_name`, `locality`, `altitude`, `habit`, `descr`, `uses`, `upload_date`) VALUES
(1, 'Anonaceae', 'Artabotrys Odoratissimus', 'herb_image/Artrabotrus.png', 'original_image/Artrabotrus_original.jpg', 'Manorangini', 'Species', 'Coimbatore', '1100 Ft', 'It is commonly cultivated as an ornamental in the tropics.', 'Climbs with hooks, leaves entire acute, Inflorescene terminal peduncle modified to form the hook.', 'Good', '0000-00-00 00:00:00'),
(2, 'Anonaceae', 'Annona Squamosa', 'herb_image/Anona Squamosa.png', 'original_image/Annona_squamosa sugar apple.jpg', 'Sugar Apple', 'Custard Apple', 'Coimbatore', '1500 Ft', 'Throughout India.', 'Flowers Solitary. Leaf Opposed, Sepals 3, Petals 3-6 valvate in 2.', 'The bark of custard apple tree can be used to stop diarrhea in children and adults. In addition, the plant is effective to treat diabetes.\r\nIts fruit is used to make a hair tonic in some parts of India.', '2021-04-25 12:21:16'),
(3, 'Anonaceae', 'Saccopetalum Tomentosum Hook', 'herb_image/Saccapetalum.png', 'original_image/saccopetalum tomentosum_original.jpg', 'Hoom', 'Umbh', 'Suruli Falls', '7900 Ft', 'A tall tree with dark blackish-brown, deep, longitudinally fissured bark.', 'Leaves lomenlose; Flower in small terminal cymes', 'The wood is used for rafters.\r\nBerries are edible.', '2021-04-25 12:29:38'),
(4, 'Papilionaceae', 'Mucuna Hirsuta', 'herb_image/mucana_hirsuta.png', 'original_image/mucuna_hirsuta org.jpg', 'Monkey Tamarind', 'Bengal velvet bean', 'Nelliam Pathy', '1500 Ft', 'Climber', 'Cimbets, Hairy, Flowers auxilary', 'Mucuna Pruriens for brain power It has been found that Mucuna Pruriens could actually enhance one\'s cognitive...', '2021-04-25 12:50:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblplant_details`
--
ALTER TABLE `tblplant_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblplant_details`
--
ALTER TABLE `tblplant_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
