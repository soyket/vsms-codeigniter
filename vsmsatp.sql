-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2017 at 10:57 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vsmsatp`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `c_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `cf_name` varchar(100) NOT NULL,
  `cl_name` varchar(100) NOT NULL,
  `c_email` varchar(100) NOT NULL,
  `c_mobile` varchar(100) NOT NULL,
  `nid` varchar(100) DEFAULT NULL,
  `w_start` date NOT NULL,
  `w_end` date NOT NULL,
  `payment_type` varchar(100) NOT NULL,
  `invoice_id` varchar(100) DEFAULT NULL,
  `c_address` varchar(400) DEFAULT NULL,
  `c_pass` varchar(30) NOT NULL,
  `extra` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`c_id`, `vehicle_id`, `cf_name`, `cl_name`, `c_email`, `c_mobile`, `nid`, `w_start`, `w_end`, `payment_type`, `invoice_id`, `c_address`, `c_pass`, `extra`) VALUES
(3, 7, 'Soykot', 'gasd', 'asdas@asdfasdf.co', '5556416556', NULL, '2016-12-29', '2017-01-25', 'Cash', NULL, NULL, '1234', NULL),
(13, 12, 'Foujia', 'Akter', 'asdasd@asdas.com', '23', NULL, '2016-12-29', '0022-02-02', 'Cash', NULL, NULL, '1234', NULL),
(14, 8, 'Soyket', 'Chowdhury', 'dranger2011@gmail.com', '3133388055', NULL, '2016-12-29', '2016-11-30', 'Cash', NULL, NULL, '1234', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `manufacturer_name` varchar(255) NOT NULL,
  `manufacturer_logo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `manufacturer_name`, `manufacturer_logo`) VALUES
(16, 'Alfa Romeo', ''),
(18, 'BMW', ''),
(19, 'Bugatti', ''),
(20, 'Aston Martin', ''),
(21, 'Audi', '');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_name` varchar(255) NOT NULL,
  `model_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `manufacturer_id`, `model_name`, `model_description`) VALUES
(9, 16, 'Giulia', 'An emotional, hot-blooded Italian car like the Giulia is sure get pulses racing in the usual entry-luxury crowd. A 280-hp 2.0-liter turbo four with an eight-speed automatic and rear-wheel drive are standard; all-wheel drive is optional. Leather seats, a dual exhaust, and a sporty flat-bottomed steering wheel with integrated push-button start also come standard. A 6.5-inch or optional 8.8-inch touchscreen provide connectivity; high-tech features like adaptive cruise control are also available.'),
(10, 19, 'Bugatti Veyron', 'The Bugatti Veyron EB 16.4 is a mid-engined sports car, designed and developed in Germany by the Volkswagen Group and manufactured in Molsheim, France, by Bugatti Automobiles S.A.S.\r\n\r\nThe original version has a top speed of 407 km/h (253 mph).[4][5] It was named Car of the Decade and best car award (2000–2009) by the BBC television programme Top Gear. The standard Bugatti Veyron also won Top Gear''s Best Car Driven All Year award in 2005.\r\n\r\nThe Super Sport version of the Veyron is recognised by Guinness World Records as the fastest street-legal production car in the world, with a top speed of 431.072 km/h (268 mph),[6] and the roadster Veyron Grand Sport Vitesse version is the fastest roadster in the world, reaching an averaged top speed of 408.84 km/h (254.04 mph) in a test on 6 April 2013.[7][8]\r\n\r\nThe Veyron''s chief designer was Hartmut Warkuss, and the exterior was designed by Jozef Kabaň of Volkswagen, with much of the engineering work being conducted under the guidance of engineering chief Wolfgang Schreiber.\r\n\r\nSeveral special variants have been produced. In December 2010, Bugatti began offering prospective buyers the ability to customise exterior and interior colours by using the Veyron 16.4 Configurator application on the marque''s official website. The Bugatti Veyron was discontinued in late 2014.[9][10]'),
(11, 16, 'fgjhbjk', 'yuguihjihi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `su` int(11) DEFAULT '0',
  `type` varchar(15) NOT NULL,
  `position` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `birthday` date NOT NULL,
  `mobile` varchar(15) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `su`, `type`, `position`, `email`, `password`, `first_name`, `last_name`, `gender`, `birthday`, `mobile`, `address`) VALUES
(6, 1, 'admin', 'Super Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 'Soykot', 'Chowdhury', 'male', '2016-12-27', '15245645646', 'asdfsdafasd'),
(7, 1, 'employee', 'Employee Super', 'employee@employee.com', 'fa5473530e4d1a5a1e1eb53d2fedb10c', 'EMPLOYEE', 'EDISON', 'male', '2015-11-30', '2323', 'qwsdasd');

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `vehicle_id` int(11) NOT NULL,
  `manufacturer_id` int(11) NOT NULL,
  `model_id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `buying_price` double NOT NULL,
  `selling_price` double DEFAULT NULL,
  `mileage` int(11) NOT NULL,
  `color` varchar(15) NOT NULL,
  `add_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sold_date` datetime DEFAULT NULL,
  `status` varchar(40) NOT NULL DEFAULT 'available',
  `registration_year` int(4) NOT NULL,
  `insurance_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `gear` varchar(15) NOT NULL,
  `doors` int(11) NOT NULL,
  `seats` int(11) NOT NULL,
  `tank` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `engine_no` int(11) NOT NULL,
  `chesis_no` int(11) NOT NULL,
  `featured` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`vehicle_id`, `manufacturer_id`, `model_id`, `category`, `buying_price`, `selling_price`, `mileage`, `color`, `add_date`, `sold_date`, `status`, `registration_year`, `insurance_id`, `user_id`, `gear`, `doors`, `seats`, `tank`, `image`, `engine_no`, `chesis_no`, `featured`) VALUES
(2, 16, 9, 'Subcompact', 12000100, NULL, 55, 'red', '2016-12-27 12:00:00', NULL, 'available', 2010, 2147483647, 1, 'auto', 6, 2147483647, 25, '77303.jpg', 2147483647, 21231231, 1),
(5, 18, 9, 'Subcompact', 10000200, NULL, 25, 'black', '2016-12-27 12:00:00', NULL, 'available', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, 1),
(7, 19, 10, 'Subcompact', 11000100, 12000100, 25, 'black', '2016-12-27 12:00:00', '2016-12-29 00:00:00', 'sold', 2010, 4545656, 1, 'auto', 87489796, 4, 25, 'bughatti.jpg', 2147483647, 21231231, NULL),
(8, 20, 9, 'Compact', 10000100, 1000, 556, 'Yellow', '2016-12-28 12:00:00', '2016-12-29 00:00:00', 'sold', 2012, 2147483647, 1, 'auto', 4, 4, 25, 'yellow-lamborghini-gallardo-Wallpaper.jpg', 2147483647, 2147483647, NULL),
(12, 16, 9, 'Subcompact', 2000000, 20000000, 3, 'Black', '2016-12-28 12:00:00', '2016-12-29 00:00:00', 'sold', 2001, 121212, 1, 'auto', 2, 3, 34, '7538.jpg', 23232, 232323, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`c_id`),
  ADD UNIQUE KEY `v_id_2` (`vehicle_id`),
  ADD UNIQUE KEY `c_id` (`c_id`),
  ADD UNIQUE KEY `invoice_id` (`invoice_id`),
  ADD KEY `v_id` (`vehicle_id`),
  ADD KEY `c_id_2` (`c_id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`vehicle_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `vehicle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`vehicle_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
