-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 25, 2023 at 10:09 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `emergency_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `date`) VALUES
(1, 'Admin', 'admin@gmail.com', '6de4659459c90eb26d7fc4e7f307055f', '2023-10-25 19:23:08');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `id` int NOT NULL,
  `hospital` varchar(200) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `description` varchar(4000) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`id`, `hospital`, `fullname`, `phone`, `description`, `date`) VALUES
(1, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Adefuwa Ponmile', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 19:34:05'),
(2, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Oluwaniyi Victoria', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:04:27'),
(3, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Akintunde Segun', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:05:34'),
(4, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Olorunjuwon Bamidele', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:05:48'),
(5, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Taiye Taiwo', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:05:56'),
(6, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Olotu Damilola', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:05'),
(7, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Akinyemi Paul', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:17'),
(8, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Aduragbemi taiwo', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:27'),
(9, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Kemi Otedola', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:39'),
(10, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Festus Ogbomo', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:49'),
(11, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Paul Dickson', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:06:56'),
(12, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Efe Obiebi', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:07:02'),
(13, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Ayeni Opeoluwa', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:07:21'),
(14, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Makinde Elizabeth', '09091458969', 'This is an urgent medical emergency alert. We require immediate medical assistance for the above-named patient, who is currently experiencing a critical medical situation. The patient\'s condition is deteriorating rapidly, and we are in need of your immediate attention and expertise', '2023-10-25 20:07:37');

-- --------------------------------------------------------

--
-- Table structure for table `hospitals`
--

CREATE TABLE `hospitals` (
  `id` int NOT NULL,
  `hospitalname` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `doctors` int NOT NULL,
  `nurses` int NOT NULL,
  `rooms` int NOT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `longitude` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `latitude` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hospitals`
--

INSERT INTO `hospitals` (`id`, `hospitalname`, `description`, `doctors`, `nurses`, `rooms`, `address`, `longitude`, `latitude`, `status`, `date_modified`) VALUES
(1, 'Etta Atlantic Memorial Hospital', 'Etta-Atlantic Memorial Hospital Lekki Lagos was established with the goal of providing an international level of health care for all Nigerians.  Etta-Atlantic Memorial Hospital was established by physicians with training in the US, they have teamed up with bright and dedicated Nigerian physicians and other allied health professionals to provide excellent care based on standards set by the World Health Organization (WHO).', 3, 12, 50, '22 Abioro Street, Ikate\nLekki, Lagos State\nNigeria', '1.343344', '0.984884', 'yes', '2023-10-25 19:58:53'),
(5, 'University of Benin Teaching Hospital', 'The University of Benin Teaching Hospital was taken over by the Federal Government on April 1st, 1975 as the fifth teaching hospital coming after Ibadan Teaching Hospital and Lagos Teaching Hospital.\n\nThe Institution has been decisively responding to challenges as they arise, to the extent that the UBTH could boastfully say that it has effectively discharged its Mandate.\n\nFor over forty years now, the Tertiary Referral Hospital, widely acknowledged as a Centre of Excellence, has remarkably and effectively served as the last port of call for expert management of diverse and varied disease conditions in Edo, Delta, part of Kogi and Ondo state which largely form its catchment area and sometimes further away.', 5, 34, 12, 'P.M.B 1111 Ugbowo Lagos Road,Benin City, Nigeria', '101.9095556', '3.4343534', 'active', '2023-10-25 19:59:03'),
(6, 'UDUTH SOKOTO', '\n\nWelcome to Usmanu Danfodiyo University Teaching Hospital, Sokoto Nigeria where your health and comfort during your hospital stay are our top priority. Our physicians and staff are here to make sure you receive the best care and your personal needs are met.\n\nUsmanu Danfodiyo University Teaching Hospital is the only academic center in Sokoto, Kebbi and Zamfara States and some parts of neighboring Niger and Benin Republics, meaning we bring special expertise and experience to our patients. You will benefit from the team approach and may find in addition to your personal doctor, a group of highly skilled health professionals working to provide you care. We hope this additional attention contributes to your well-being and peace of mind\n', 6, 31, 23, 'Arba Nadama Road, Sokoto ', '3.23752', '6.53531', 'active', '2023-10-25 19:59:20'),
(7, 'Regions Stroke and Neuroscience Hospital, Mgbirichi, Imo State', 'Regions Stroke and Neuroscience Hospital was conceived out of the necessity to provide high-quality care in Neurosciences in Nigeria. Our experts who have all obtained advanced specialist training in the United States and United Kingdom, offer the most complete and comprehensive care for patients with neurological disorders, such as stroke, epilepsy, Parkinson’s disease, memory disorders, Alzheimer’s, headaches, tremors, neuropathy, muscle weakness, back pain, brain tumors, aneurysm etc; utilizing the most advanced technology and innovative treatment options, similar to what they offer their patients in western countries. We have partnered with several hospitals, doctors, communities and organizations to deliver the best possible care to Nigerian patients.', 9, 43, 9, 'Km 17, Owerri-PortHarcourt Express Road, Mgbirichi Ohaji, Imo State', '3.42519', '6.46531', 'active', '2023-10-25 19:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int NOT NULL,
  `site_name` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `site_address` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `site_phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `site_address`, `site_phone`) VALUES
(1, 'EC - Medical & Hospital', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `passw` varchar(200) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `longitude` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `latitude` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `datejoined` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `date_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `phone`, `passw`, `address`, `longitude`, `latitude`, `datejoined`, `date_modified`) VALUES
(1, 'Adewale', 'adewaleakinyemi@gmail.com', '0994094949', '', 'Lagos - Nigeria', '1.343344', '0.984884', '03-10-2023 07:13:19pm', '2023-10-25 14:50:04'),
(3, 'Akintunde', 'oluwaponmile@gmail.com', '99948444444', '6de4659459c90eb26d7fc4e7f307055f', 'Lagos - Nigeria', '3.42517', '6.46529', '03-10-2023 07:13:19pm', '2023-10-25 14:50:27'),
(4, 'Oluwaponmile', 'festusadekunle@gmail.com', '09873890987898', 'a8b5e2efd115a97f6f36ccaae98c8892', 'Lagos - Nigeria', '3.42517', '6.46529', '03-10-2023 07:15:18pm', '2023-10-25 14:50:39'),
(5, 'Funmi', 'bunmisegun@gmail.com', '04094994848', 'ea7120740464ce78c305436d1f150b4d', 'Lagos - Nigeria', '3.42517', '6.46529', '03-10-2023 07:17:08pm', '2023-10-25 14:50:51'),
(8, 'Segun', 'adesina@gmail.com', '88387377393', 'b4be76257fbb4ba94418c9e5227b1d65', 'Lagos - Nigeria', '3.42517', '6.46529', '04-10-2023 09:16:40am', '2023-10-25 14:51:02'),
(9, 'Adewale', 'akintunde@gmail.com', '949848484', 'bcc95c2d9c99b6eb053cc99aaef00092', 'Lagos - Nigeria', '3.42517', '6.46529', '04-10-2023 09:28:14am', '2023-10-25 14:51:10'),
(10, 'Ojeyinka', 'oluwasegun@gmail.com', '93938833333', '6de4659459c90eb26d7fc4e7f307055f', 'Lagos - Nigeria', '3.42517', '6.46529', '04-10-2023 09:40:44am', '2023-10-25 14:51:17'),
(11, 'Taiwo', 'taiwoadewale@gmail.com', '93938833333', '6de4659459c90eb26d7fc4e7f307055f', 'Lagos - Nigeria', '3.42517', '6.46529', '04-10-2023 03:55:26pm', '2023-10-25 14:51:27'),
(12, 'wayvy', 'admin@gmail.com', '09091458969', '93bcef9596e6cc0789dbdfd1c473f6ca', 'Lagos - Nigeria', '3.3903', '6.4474', '25-10-2023 03:56:04pm', '2023-10-25 13:56:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospitals`
--
ALTER TABLE `hospitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hospitals`
--
ALTER TABLE `hospitals`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
