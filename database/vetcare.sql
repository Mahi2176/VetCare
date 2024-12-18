-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2024 at 04:54 PM
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
-- Database: `vetcare`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(255) NOT NULL,
  `appointment_time` datetime DEFAULT NULL,
  `doctorname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `name`, `number`, `appointment_time`, `doctorname`) VALUES
(1, 'Mahesh', '9483124567', '2024-04-16 16:12:00', 'Dr.Batra'),
(2, 'Mahesh', '9483124567', '2024-04-16 16:18:00', 'Dr.Batra'),
(3, 'Patya', '2344556677', '2024-04-20 01:52:00', 'Dr.Putra'),
(8, 'Pranav', '8100234455', '2024-04-20 00:55:00', 'Dr.Batra'),
(9, 'Pranav', '8100234455', '2024-04-22 01:18:00', 'Dr.Batra'),
(10, 'Pranav', '8100234455', '2024-04-30 04:32:00', 'Dr.Batra');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_list`
--

CREATE TABLE `appointment_list` (
  `id` int(30) NOT NULL,
  `code` varchar(100) NOT NULL,
  `schedule` date NOT NULL,
  `owner_name` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `address` text NOT NULL,
  `category_id` int(30) NOT NULL,
  `breed` text NOT NULL,
  `age` varchar(50) NOT NULL,
  `service_ids` text DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_list`
--

INSERT INTO `appointment_list` (`id`, `code`, `schedule`, `owner_name`, `contact`, `email`, `address`, `category_id`, `breed`, `age`, `service_ids`, `status`, `date_created`, `date_updated`) VALUES
(1, 'OVAS-2022010001', '2022-01-04', 'John D Smith', '0912345789', 'jsmith@sample.com', 'Here City', 1, 'German Shepherd', '5 mos. old', '3,1', 0, '2022-01-04 15:55:21', NULL),
(2, 'OVAS-2022010002', '2022-01-05', 'Claire Blake', '09123456897', 'cblake@sample.com', 'There City', 1, 'Pug', '6 mos. old', '3,1', 0, '2022-01-04 15:56:55', NULL),
(3, 'OVAS-2022010003', '2022-01-05', 'Mark Cooper', '094567894152', 'mcooper@gmail.com', 'Here', 2, 'Persian Cat', '1 yr. old', '5,3', 1, '2022-01-04 15:58:23', '2024-04-06 00:06:26'),
(4, 'OVAS-2022010004', '2022-01-05', 'Samantha Miller', '0995564887', 'smiller@sample.com', 'Sample Address', 2, 'Maine Coon', '7 mos.', '5,1', 1, '2022-01-04 15:59:51', '2024-04-05 10:02:33'),
(6, 'OVAS-2022010006', '2022-01-06', 'Jane Park', '09888754466', 'jpark@gmail.com', 'Sample address', 2, 'Ragdoll', '8 mos', '5,1', 1, '2022-01-04 16:27:54', '2022-01-04 17:17:55'),
(8, 'OVAS-2024040001', '2024-04-06', 'mahesh', '9988776655', 'tmahesh210501@gmail.com', 'sankeshwar', 1, 'Gavathi', '2', '2', 2, '2024-04-05 10:05:12', '2024-04-05 10:06:16'),
(9, 'OVAS-2024040002', '2024-04-06', 'Rupesh', '9988776655', 'rupeshbagave@gmail.com', 'patane', 1, 'Gavathi', '3', '2', 1, '2024-04-05 10:17:15', '2024-04-05 10:18:12'),
(10, 'OVAS-2024040003', '2024-04-06', 'rohit', '9988776655', 'rupeshbagave@gmail.com', 'sidnal', 4, 'Gavathi', '1', '3', 1, '2024-04-05 17:07:55', '2024-04-05 17:08:43'),
(11, 'OVAS-2024040004', '2024-04-24', 'tushar', '56789044', 'tutturkar@gmail.com', 'khanapur', 5, 'Gavathi', '2', '3', 1, '2024-04-05 22:33:21', '2024-04-05 22:35:41');

-- --------------------------------------------------------

--
-- Table structure for table `appointment_requests`
--

CREATE TABLE `appointment_requests` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `appointment_date` date DEFAULT NULL,
  `status` enum('pending','accepted','rejected') DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointment_requests`
--

INSERT INTO `appointment_requests` (`id`, `username`, `doctor_id`, `appointment_date`, `status`) VALUES
(1, NULL, 1234, '2024-04-23', ''),
(2, NULL, 1234, '2024-04-23', 'pending'),
(3, '0', NULL, '2024-04-23', 'pending'),
(4, '0', NULL, '2024-04-23', 'pending'),
(5, '0', NULL, '2024-04-23', 'pending'),
(6, '1234', NULL, '2024-04-10', 'pending'),
(7, '1234', NULL, '2024-04-10', 'pending'),
(8, '1234', NULL, '2024-04-02', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `callbacks`
--

CREATE TABLE `callbacks` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `callbacks`
--

INSERT INTO `callbacks` (`id`, `full_name`, `email`, `phone_number`, `message`) VALUES
(1, 'Rupesh Jayawant Bagave', 'bagaverupesh29@gmail.com', '09689879491', 'hhhhhh');

-- --------------------------------------------------------

--
-- Table structure for table `category_list`
--

CREATE TABLE `category_list` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `delete_flag` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 = Active, 1 = Delete',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_list`
--

INSERT INTO `category_list` (`id`, `name`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, 'Dogs', 0, '2022-01-04 10:31:11', NULL),
(2, 'Cats', 0, '2022-01-04 10:31:38', NULL),
(3, 'Hamsters', 0, '2022-01-04 10:32:02', NULL),
(4, 'Rabbits', 0, '2022-01-04 10:32:13', NULL),
(5, 'Birds', 0, '2022-01-04 10:32:47', NULL),
(6, 'test', 1, '2022-01-04 10:33:02', NULL),
(7, 'Patya', 1, '2024-04-05 10:02:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `docname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `vetlicense` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `docname`, `email`, `password`, `address`, `vetlicense`, `create_datetime`) VALUES
(1, 'Mahesh', 'mahi@gmail,,com', '81dc9bdb52d04dc20036dbd8313ed055', 'Sankeshwar', 'DOC1234', '2024-04-05 21:20:18');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` int(11) NOT NULL,
  `doctorname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `specialization` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `doctorname`, `email`, `password`, `specialization`) VALUES
(1, 'DR.Batra', 'Batra@gmail.com', '1234', 'Vaccination'),
(2, 'DR.Putra', 'Putra@gmail.com', '1234', 'Grooming'),
(3, 'Dr.Sutra', 'sutra@gmail.com', '1234', 'Grooming');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `uploaded_on`, `status`) VALUES
(1, 'dog-112.png', '2024-04-06 20:31:35', 1),
(2, 'dog-112.png', '2024-04-06 20:53:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `message_list`
--

CREATE TABLE `message_list` (
  `id` int(30) NOT NULL,
  `fullname` text NOT NULL,
  `contact` text NOT NULL,
  `email` text NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message_list`
--

INSERT INTO `message_list` (`id`, `fullname`, `contact`, `email`, `message`, `status`, `date_created`) VALUES
(1, 'test', '09123456897', 'jsmith@sample.com', 'test', 1, '2022-01-04 17:26:19'),
(2, 'mahesh', '9988776655', 'vernekarpranav777@gmail.com', 'i want a vaccination', 1, '2024-04-05 22:34:29');

-- --------------------------------------------------------

--
-- Table structure for table `service_list`
--

CREATE TABLE `service_list` (
  `id` int(30) NOT NULL,
  `category_ids` text NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `fee` float NOT NULL DEFAULT 0,
  `delete_flag` tinyint(4) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_list`
--

INSERT INTO `service_list` (`id`, `category_ids`, `name`, `description`, `fee`, `delete_flag`, `date_created`, `date_updated`) VALUES
(1, '2,1', 'Immunization', '<p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris quis quam tellus. Nam elit lectus, lobortis vitae eros a, condimentum pretium eros. Sed mauris nulla, aliquam vel hendrerit ac, aliquam quis mi. In non purus ac metus luctus aliquam. Praesent porta turpis eget molestie pellentesque. In fringilla est vitae sem imperdiet eleifend. Praesent lacinia arcu elit, quis venenatis nisl sollicitudin nec. Pellentesque tempor est nec porta mattis. In hendrerit eleifend felis, quis fermentum dolor eleifend quis. Maecenas dolor magna, luctus id blandit sit amet, bibendum id lacus.</p><p style=\"margin-right: 0px; margin-bottom: 15px; margin-left: 0px; padding: 0px;\">Nunc pellentesque nibh vel sapien lobortis tempus. In pretium nulla felis, cursus bibendum augue pretium at. Integer eget dignissim libero. Praesent laoreet, purus eu vehicula hendrerit, felis leo lobortis mi, at aliquet nisl est a dolor. Duis eleifend pharetra augue ut finibus. Curabitur id lorem lobortis, tempus mauris quis, fermentum nunc. Vestibulum eu euismod diam, fermentum vulputate elit. Aenean eu odio tincidunt, semper nulla eget, pretium eros. In ullamcorper fringilla faucibus. Curabitur aliquam leo ex, in cursus arcu commodo eu. Vivamus in nulla id massa efficitur rhoncus. Ut sagittis arcu ipsum, at posuere eros pretium nec. Nam neque mauris, molestie eu euismod a, vulputate at diam. Nullam mattis purus tortor, rutrum fringilla lorem eleifend nec. Vestibulum vitae purus sit amet leo imperdiet tristique at ac orci.</p>', 1500, 0, '2022-01-04 10:59:49', '2022-01-04 11:09:22'),
(2, '2,1', 'Vaccination', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Curabitur facilisis consequat lacinia. Curabitur luctus nunc ac libero mattis, id bibendum mauris pretium. Donec vulputate ac velit ac laoreet. Aliquam cursus feugiat turpis, id posuere nisl ornare sit amet. Duis pharetra quam vel risus semper vestibulum. Aliquam lacinia sit amet dolor a viverra. Ut sit amet turpis laoreet, euismod dui at, accumsan lacus. Fusce est nunc, consectetur ac neque at, commodo faucibus ipsum. Nullam rutrum dapibus pulvinar. Mauris eget magna id nisl consequat mollis vitae id purus. Cras eros tellus, fringilla et dictum quis, vulputate id erat. Aliquam erat volutpat.</span><br></p>', 1700, 0, '2022-01-04 11:14:24', NULL),
(3, '5,2,1,3,4', 'Check-up', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Ut fringilla velit quis condimentum mattis. Sed egestas ligula imperdiet orci elementum, eu aliquet sem cursus. Vestibulum maximus ex ut mi lobortis ultricies. Ut id congue ipsum. Donec porttitor a nunc a egestas. Ut non urna eget erat vestibulum eleifend. Phasellus blandit dui non neque cursus, id viverra turpis aliquet. Sed tempor nisl a ipsum porta, eget iaculis sem venenatis. Sed ac dolor sagittis, interdum leo ut, sagittis risus. Etiam suscipit, orci eget hendrerit malesuada, nisl mauris semper dolor, non accumsan nisl nibh ac augue. Integer vel lectus quis quam suscipit pharetra quis in lectus. Nulla bibendum ex sed accumsan laoreet. Cras et elit vitae sapien faucibus luctus. Morbi leo nibh, viverra vitae elit ac, luctus elementum urna.</span><br></p>', 500, 0, '2022-01-04 11:15:09', NULL),
(4, '1,3,4', 'Anti-Rabies', '<p><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" font-size:=\"\" 14px;=\"\" text-align:=\"\" justify;\"=\"\">Ut fringilla velit quis condimentum mattis. Sed egestas ligula imperdiet orci elementum, eu aliquet sem cursus. Vestibulum maximus ex ut mi lobortis ultricies. Ut id congue ipsum. Donec porttitor a nunc a egestas. Ut non urna eget erat vestibulum eleifend. Phasellus blandit dui non neque cursus, id viverra turpis aliquet. Sed tempor nisl a ipsum porta, eget iaculis sem venenatis. Sed ac dolor sagittis, interdum leo ut, sagittis risus. Etiam suscipit, orci eget hendrerit malesuada, nisl mauris semper dolor, non accumsan nisl nibh ac augue. Integer vel lectus quis quam suscipit pharetra quis in lectus. Nulla bibendum ex sed accumsan laoreet. Cras et elit vitae sapien faucibus luctus. Morbi leo nibh, viverra vitae elit ac, luctus elementum urna.</span><br></p>', 500, 0, '2022-01-04 11:16:24', '2024-04-05 22:36:54'),
(5, '2', 'Anti-Rabies', '<p>Ut fringilla velit quis condimentum mattis. Sed egestas ligula imperdiet orci elementum, eu aliquet sem cursus. Vestibulum maximus ex ut mi lobortis ultricies. Ut id congue ipsum. Donec porttitor a nunc a egestas. Ut non urna eget erat vestibulum eleifend. Phasellus blandit dui non neque cursus, id viverra turpis aliquet. Sed tempor nisl a ipsum porta, eget iaculis sem venenatis. Sed ac dolor sagittis, interdum leo ut, sagittis risus. Etiam suscipit, orci eget hendrerit malesuada, nisl mauris semper dolor, non accumsan nisl nibh ac augue. Integer vel lectus quis quam suscipit pharetra quis in lectus. Nulla bibendum ex sed accumsan laoreet. Cras et elit vitae sapien faucibus luctus. Morbi leo nibh, viverra vitae elit ac, luctus elementum urna.<br></p>', 250, 0, '2022-01-04 11:16:38', '2022-01-04 11:17:08'),
(6, '4', 'deleted', '<p>test</p>', 123, 1, '2022-01-04 11:17:34', '2022-01-04 11:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Online Veterinary Appointment System - PHP'),
(6, 'short_name', 'OVAS - PHP'),
(11, 'logo', 'uploads/logo-1641262650.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover-1641262651.png'),
(15, 'content', 'Array'),
(16, 'email', 'info@vetclinic.com'),
(17, 'contact', '09854698789 / 78945632'),
(18, 'from_time', '11:00'),
(19, 'to_time', '21:30'),
(20, 'address', 'XYZ Street, There City, Here, 2306'),
(23, 'max_appointment', '30'),
(24, 'clinic_schedule', '9:00 AM - 5:00 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'mahesh', 'mahi@gmail,,com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-04-05 20:19:40'),
(2, 'demo', 'vernekarpranav777@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-04-06 04:07:31'),
(3, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-04-09 08:53:48'),
(4, 'Pranav', 'vernekar777@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2024-04-19 21:07:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `appointment_date` date NOT NULL,
  `pettype` varchar(255) NOT NULL,
  `problemdescription` text NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL,
  `doctorname` varchar(255) DEFAULT NULL,
  `service` enum('vaccination','checkup','grooming','gentlecare','psychotherapy') NOT NULL,
  `appointment_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `address`, `appointment_date`, `pettype`, `problemdescription`, `file_name`, `status`, `doctorname`, `service`, `appointment_time`) VALUES
(1, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'rejected', NULL, 'vaccination', NULL),
(2, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'accepted', NULL, 'vaccination', NULL),
(3, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', NULL, 'vaccination', NULL),
(4, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', NULL, 'vaccination', NULL),
(5, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', NULL, 'vaccination', NULL),
(6, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', '', 'vaccination', NULL),
(7, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', '', 'vaccination', NULL),
(8, 'Rupesh Bagawe', 'rupeshbagave@gmail.com', 'Patne, Chandhgadh', '2024-04-11', 'Gavathi Kutra', 'Kesa Lay Ale Ahe Ho ', 'dog-112.png', 'pending', '', 'vaccination', NULL),
(10, 'Mahesh', 'tmahesh210501@gmail.com', 'Sankeshwar', '2024-04-11', 'Pilla', 'Thandi', '8601514.png', 'accepted', 'DR.Batra', 'vaccination', NULL),
(15, 'Pranav', 'vernekar777@gmail.com', 'Karvar', '2024-04-17', 'dog', 'Normal Checkup', '350150_veterinary treatment taken by cow_ _xl-1024-v1-0.png', 'accepted', 'DR.Batra', 'vaccination', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `callbacks`
--
ALTER TABLE `callbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_list`
--
ALTER TABLE `category_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message_list`
--
ALTER TABLE `message_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service_list`
--
ALTER TABLE `service_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `appointment_list`
--
ALTER TABLE `appointment_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `appointment_requests`
--
ALTER TABLE `appointment_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `callbacks`
--
ALTER TABLE `callbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_list`
--
ALTER TABLE `category_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `message_list`
--
ALTER TABLE `message_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `service_list`
--
ALTER TABLE `service_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_list`
--
ALTER TABLE `appointment_list`
  ADD CONSTRAINT `appointment_list_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category_list` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
