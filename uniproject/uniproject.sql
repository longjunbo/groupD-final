-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 26, 2018 at 09:31 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uniproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_id` int(11) NOT NULL,
  `admin_mail` varchar(50) NOT NULL,
  `admin_password` varchar(20) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_contactno` int(20) NOT NULL,
  `admin_address` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `admin_mail`, `admin_password`, `admin_name`, `admin_contactno`, `admin_address`) VALUES
(1, 'hamza9034@gmail.com', '123abc', 'Hamza Mairaj', 356215, 'Malir'),
(3, 'sameer_ab@yahoo.com', '123', 'Abdur Raheem ', 21554, 'Gulshan-e- Iqbal');

-- --------------------------------------------------------

--
-- Table structure for table `joinus`
--

CREATE TABLE `joinus` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `full_name` varchar(32) NOT NULL,
  `Address` varchar(32) NOT NULL,
  `contact_num` int(11) NOT NULL,
  `company_name` varchar(32) NOT NULL,
  `subject` varchar(32) NOT NULL,
  `message` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `joinus`
--

INSERT INTO `joinus` (`id`, `username`, `password`, `email`, `full_name`, `Address`, `contact_num`, `company_name`, `subject`, `message`) VALUES
(1, 'sameer', 'khan', 'rahem@hotmail.com', 'laskjdnaljn', 'asndkjlan', 123123, 'jansdkjn', 'jnaskjdn', 'kasjdnkjn'),
(2, 'sameer', 'akmsdnk', 'raheem-pak@hotmail.com', 'alskmdklm', 'ashdabsdaj', 2147483647, 'alsnmdkl', 'lansdl', 'ladsmnfkl'),
(3, 'zuhair', 'khan', 'raheem-pak@hotmail.com', 'zuhair khan', 'ajlsndkjanmgklm', 2147483647, 'ajsdbn', 'kjnasd', 'ladsmnfklkjanlkdsmfalmf'),
(4, 'hamza', '123', 'hamzaansari70@yahoo.com', 'Hamza ansari', 'Raza residency', 2147483647, 'NBP', 'AEWi', 'skjks'),
(5, '', 'aBDULLAH', 'hamzaansari70@yahoo.com', 'ab', 'Malir', 90078601, 'NBP', 'AEWi', 'skjks'),
(6, 'Danyal', '123', 'daniyalbiharu@gmail.com', 'khan', 'lafljj', 535345545, 'hascomb', 'kch nh', 'nope');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`) VALUES
(1, 'sameer', 'khan'),
(2, 'zuhair', 'khan');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE `super_admin` (
  `s_id` int(10) NOT NULL,
  `s_name` varchar(20) NOT NULL,
  `s_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `joinus`
--
ALTER TABLE `joinus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `super_admin`
--
ALTER TABLE `super_admin`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `joinus`
--
ALTER TABLE `joinus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `super_admin`
--
ALTER TABLE `super_admin`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
