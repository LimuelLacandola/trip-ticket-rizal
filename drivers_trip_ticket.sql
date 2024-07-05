-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2024 at 05:04 AM
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
-- Database: `drivers_trip_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `approved_by`
--

CREATE TABLE `approved_by` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approved_by`
--

INSERT INTO `approved_by` (`id`, `name`) VALUES
(1, 'MARICEL J. MAGLALANG');

-- --------------------------------------------------------

--
-- Table structure for table `designation`
--

CREATE TABLE `designation` (
  `id` int(10) NOT NULL,
  `designation` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `designation`
--

INSERT INTO `designation` (`id`, `designation`) VALUES
(1, 'Head, Admin, PRO NCR Central'),
(2, 'Manager, PRO NCR Central'),
(3, 'OIC, Head MSD, PRO NCR');

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `id` int(10) NOT NULL,
  `assigned_driver` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`id`, `assigned_driver`) VALUES
(1, 'JOSELITO R. GONZALES'),
(2, 'RODEL BAKINGKITO'),
(3, 'ROBERT D. BERNABE'),
(4, 'OWNEL C. SANCHEZ'),
(5, 'FLORECIO M. ALATAN'),
(6, 'RONWALDO R. CURA'),
(7, 'EDILON C. ESTELLA');

-- --------------------------------------------------------

--
-- Table structure for table `prepared_by`
--

CREATE TABLE `prepared_by` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prepared_by`
--

INSERT INTO `prepared_by` (`id`, `name`) VALUES
(1, 'MARINO B. BANAL');

-- --------------------------------------------------------

--
-- Table structure for table `recommending_approval`
--

CREATE TABLE `recommending_approval` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recommending_approval`
--

INSERT INTO `recommending_approval` (`id`, `name`) VALUES
(1, 'ATTY. RECTO M. PANTI');

-- --------------------------------------------------------

--
-- Table structure for table `riv`
--

CREATE TABLE `riv` (
  `id` int(10) NOT NULL,
  `control_no` varchar(255) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `item_description` varchar(255) NOT NULL,
  `quantity` int(10) NOT NULL,
  `estimated_unit_cost` int(100) NOT NULL,
  `estimated_total_cost` int(100) NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `riv`
--

INSERT INTO `riv` (`id`, `control_no`, `unit`, `item_description`, `quantity`, `estimated_unit_cost`, `estimated_total_cost`, `date`) VALUES
(57, '2024_001', 'CARTRIDGE', 'adas', 0, 0, 0, '2024-07-03'),
(58, '2024_002', 'CARTRIDGE', 'sd', 0, 0, 0, '2024-07-03'),
(59, '2024_003', 'CARTRIDGE', 'ITEM 1', 10, 10, 100, '2024-07-04'),
(60, '2024_003', 'CARTRIDGE', 'ITEM 2', 1010, 1231, 1243310, '2024-07-04');

-- --------------------------------------------------------

--
-- Table structure for table `trip_ticket`
--

CREATE TABLE `trip_ticket` (
  `trip_ticket_number` varchar(255) NOT NULL,
  `ticketdate` varchar(255) NOT NULL,
  `driver` varchar(255) NOT NULL,
  `authorized_passenger` varchar(255) DEFAULT NULL,
  `requesting_official` varchar(255) NOT NULL,
  `obs_no` varchar(255) DEFAULT NULL,
  `period_covered` varchar(255) NOT NULL,
  `destination` varchar(255) NOT NULL,
  `purpose` varchar(255) NOT NULL,
  `vehicle` varchar(255) NOT NULL,
  `departure_time` varchar(255) NOT NULL,
  `milage` varchar(255) NOT NULL,
  `pr_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `trip_ticket`
--

INSERT INTO `trip_ticket` (`trip_ticket_number`, `ticketdate`, `driver`, `authorized_passenger`, `requesting_official`, `obs_no`, `period_covered`, `destination`, `purpose`, `vehicle`, `departure_time`, `milage`, `pr_no`) VALUES
('NCRC 07-04-24 0001', '2024-07-04', 'JOSELITO R. GONZALES', 'JOSELITO GONZALES', 'JOSE SIDFRY M. PANGANIBAN, HEAD', 'NCRC 07-04-24 0005', '2024-07-05', 'METRO MANILA / RIZAL PROVINCE', 'JOSELITO GONZALES', 'Toyota Innova SLD 659', '10:39 AM', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `unit`) VALUES
(1, 'CARTRIDGE'),
(2, 'PCS'),
(3, 'UNIT');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(10) NOT NULL,
  `vehicles` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `vehicles`) VALUES
(2, 'Toyota Innova SLD 670'),
(3, 'Toyota Innova SLD 659'),
(4, 'Mitsubishi L300 YOM 715'),
(5, 'Toyota Hiace Commuter Van Z1D 432'),
(6, 'Toyota Hiace Commuter Van Z1D 287'),
(7, 'Toyota Hiace Commuter Van Z1K 111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approved_by`
--
ALTER TABLE `approved_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `designation`
--
ALTER TABLE `designation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prepared_by`
--
ALTER TABLE `prepared_by`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recommending_approval`
--
ALTER TABLE `recommending_approval`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riv`
--
ALTER TABLE `riv`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trip_ticket`
--
ALTER TABLE `trip_ticket`
  ADD PRIMARY KEY (`trip_ticket_number`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approved_by`
--
ALTER TABLE `approved_by`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `designation`
--
ALTER TABLE `designation`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `prepared_by`
--
ALTER TABLE `prepared_by`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `recommending_approval`
--
ALTER TABLE `recommending_approval`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `riv`
--
ALTER TABLE `riv`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
