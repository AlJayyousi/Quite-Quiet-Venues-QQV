-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2020 at 11:35 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qqp`
--

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `Com_id` int(6) NOT NULL,
  `Com_name` text NOT NULL,
  `Com_logo` varchar(200) NOT NULL,
  `Com_Country` text NOT NULL,
  `Com_CITY` text NOT NULL,
  `com_location` varchar(1000) NOT NULL,
  `com_description` varchar(1000) NOT NULL,
  `com_opening_time` time NOT NULL,
  `com_closing_time` time NOT NULL,
  `Company_phone` varchar(30) NOT NULL,
  `Register_Date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`Com_id`, `Com_name`, `Com_logo`, `Com_Country`, `Com_CITY`, `com_location`, `com_description`, `com_opening_time`, `com_closing_time`, `Company_phone`, `Register_Date`) VALUES
(30, 'Victoria', 'Victoria.jpg', 'Albania', 'Durres', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3383.9546105940567!2d35.872484915008336!3d31.98924588121701!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca03259585cfd%3A0xb5c1a2152bd2a777!2sJayyousi%204%20Computer!5e0!3m2!1sen!2sjo!4v1577365569476!5m2!1sen!2sjo', 'Nice and quite venue', '10:00:00', '23:00:00', '064903426', '2019-12-25 22:00:00'),
(49, 'Bi Gate', 'biGaate.jpg', 'Andorra', 'Canillo', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24925094.34580464!2d0.3436940525463788!3d40.30652756985841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760515e0a338dd%3A0x110a4458edd0667c!2sThe%20White%20Company!5e0!3m2!1sen!2sjo!4v1579588993055!5m2!1sen!2sjo', 'Since 1999', '00:00:00', '22:00:00', '033555878', '2020-01-21 07:18:06'),
(52, 'St Paul', 'STpaul.jpg', 'London', 'Manchester', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24925094.34580464!2d0.3436940525463788!3d40.30652756985841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760515e0a338dd%3A0x110a4458edd0667c!2sThe%20White%20Company!5e0!3m2!1sen!2sjo!4v1579588993055!5m2!1sen!2sjo', '20 years experience  ', '09:00:00', '22:00:00', '06498484', '2020-01-21 07:28:32'),
(53, 'Bonhi', 'Bonhil.jpg', 'London', 'Manchester ', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24925094.34580464!2d0.3436940525463788!3d40.30652756985841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760515e0a338dd%3A0x110a4458edd0667c!2sThe%20White%20Company!5e0!3m2!1sen!2sjo!4v1579588993055!5m2!1sen!2sjo', '', '00:00:00', '19:00:00', '06745454', '2020-01-21 07:31:08'),
(54, 'Inspiration', 'mqdwqd.jpg', 'Greece', 'Peloponnese', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d24925094.34580464!2d0.3436940525463788!3d40.30652756985841!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48760515e0a338dd%3A0x110a4458edd0667c!2sThe%20White%20Company!5e0!3m2!1sen!2sjo!4v1579588993055!5m2!1sen!2sjo', 'The Power of inspiration', '07:00:00', '21:30:00', '058477754', '2020-01-23 07:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `com_admins`
--

CREATE TABLE `com_admins` (
  `Com_Admin_ID` int(11) NOT NULL,
  `Com_Admin_Name` text NOT NULL,
  `Com_Admin_Email` varchar(50) NOT NULL,
  `Com_Admin_phone` varchar(20) NOT NULL,
  `Com_Admin_password` varchar(16) NOT NULL,
  `Com_Admin_Image` varchar(200) NOT NULL,
  `Com_Admin_master` tinyint(1) NOT NULL,
  `Company_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `com_admins`
--

INSERT INTO `com_admins` (`Com_Admin_ID`, `Com_Admin_Name`, `Com_Admin_Email`, `Com_Admin_phone`, `Com_Admin_password`, `Com_Admin_Image`, `Com_Admin_master`, `Company_ID`) VALUES
(16, 'Mohammad Jayyousi', 'j@jA', '049864153', '12345678', 'photo.jpeg', 1, 30),
(39, 'BELL ADISON', 'j@jB', '049864153', '12345678', '4HXS54YJQBEINK3PP7DPZP62EQ.jpg', 1, 49),
(42, 'Carlos Jems', 'j@jE', '049864153', '12345678', '628-07072231en_Masterfile.jpg', 1, 52),
(43, 'Barrett Brenton', 'j@jF', '049864153', '12345678', 'boy-businessman-close-up-eyes.jpg', 1, 53),
(44, 'Maria Rodriguez', 'j@jG', '049864153', '12345678', 'team_1.jpg', 1, 54);

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Mobile` varchar(30) NOT NULL,
  `Message_Body` text NOT NULL,
  `MessageDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `M_Subject` text NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`ID`, `Name`, `Email`, `Mobile`, `Message_Body`, `MessageDate`, `M_Subject`, `company_id`) VALUES
(4, 'Mohammad ', 'Jayyousi_012@hotmail.com', '0790762885', 'Please Add Company in India', '2020-01-19 06:22:32', 'Help', 0),
(15, 'Jason', 'jason_20@hotmail.com', '079564454', 'Thanks it was very good meeting room ', '2020-01-19 08:00:48', 'Thanks', 30);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` text NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_password` varchar(16) NOT NULL,
  `customer_mobile` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_password`, `customer_mobile`) VALUES
(1, 'ssssssss', '44444444444', 'dwini@dwindiw.co', '4444444'),
(2, 'ssssssss', '44444444444', 'dwini@dwindiw.co', '465465'),
(3, 'Mohammad', '123456789', 'm@m.m', '0790762885'),
(4, 'MOhammad', 'm@ma', '1', '0790762885s'),
(5, 'Mohammad Jayyousi', 'm@m', 'm', '0790762885'),
(6, 'Jafer', 'mowd@gomoemo', 'm', 'swqmom'),
(7, 'mom', 'momom', 'momom', 'momom'),
(8, 'mom', 'momom', 's', 'momom'),
(9, 'mom', 'momom', '', 'momom'),
(10, 'mmo', 'momom', 'momom', 'momom'),
(11, 's', 's', 's', 's'),
(12, 'Jafer', 'Jayyousi_2012@hotmail.com', '1234', '0790762885'),
(13, 'Mohammad Jayyousi', 'momom', '1', 'momom'),
(14, 'Jafer', 'mowd@gomoemo', '123456', '0790762885'),
(15, 'Jafer', 'mowd@gomoemo', '', '0790762885'),
(17, 'Jafer', 'j@hotmail.com', '1', '0790762885'),
(18, 'Ali Hisham', 'ali@gmail.com', '123', '0790004466'),
(19, 'Jafer', 'jafer7@hotmail.com', '12345678', '079072887854'),
(20, 'jafer', 'ja@gmail.com', '12345678', '0795555555'),
(27, 's', 's', 's', ''),
(28, 's', 's', 's', '0790762885'),
(29, 'a', 'A', 's', 'a'),
(30, 's', 's', 'aa', 's'),
(31, 'd', 's', 'd', 'f'),
(32, 's', 'jafer7@hotmail.com', 's', 's'),
(33, 's', 's#kp', 's', 's'),
(34, 's', 's@kok', 'momo', 'mo'),
(35, 's', 'so', 'momo', 'mo'),
(36, 'm', 'm', 'm', 'm'),
(37, 'm', 'ms', 'm', 'm'),
(38, 'mo', 'mo', 'mo', 'mo'),
(39, 's', 's@mom', 's', 's'),
(40, 'Mohammad Jayyousi', 'Jayy_20202@hotmail.com', '12345678', '0790762885');

-- --------------------------------------------------------

--
-- Table structure for table `customers_request`
--

CREATE TABLE `customers_request` (
  `request_id` int(11) NOT NULL,
  `Company_ID` int(6) NOT NULL,
  `Room_Table_id` int(7) NOT NULL,
  `Book_date` varchar(10) NOT NULL,
  `Start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `customer_id` int(6) NOT NULL,
  `Total_amount` int(5) NOT NULL,
  `Notes` text NOT NULL,
  `Name` text NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Mobile` varchar(50) NOT NULL,
  `RT_Name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers_request`
--

INSERT INTO `customers_request` (`request_id`, `Company_ID`, `Room_Table_id`, `Book_date`, `Start_time`, `end_time`, `customer_id`, `Total_amount`, `Notes`, `Name`, `Email`, `Mobile`, `RT_Name`) VALUES
(59, 30, 16, '2020-01-19', '10:00:00', '11:00:00', 5, 45, 'momom', 'mom', 'momo', 'momom', 'Room  : m'),
(60, 30, 16, '2020-01-19', '08:00:00', '09:00:00', 17, 65, 'fffffffffff<br>------<br>I NEED Coffee Break <br> Pens And Paper <br> ', 'Mohammad', 'm@m', 'momom', 'Room  : m'),
(61, 30, 17, '2020-01-19', '10:00:00', '11:00:00', 18, 1600, 'I Need  Green Pens<br>------<br>I NEED Pens And Paper <br> VIP Parking <br> Coffee Break <br> ', 'ALI', 'ali@hotmail.com', '0790000046', 'Room  : Business-1'),
(62, 30, 17, '2020-01-21', '10:00:00', '12:00:00', 19, 2850, 'gvgbjb<br>------<br>I NEED Coffee Break <br> Pens And Note Books <br> VIP Parking <br> ', 'Mohammad', 'm@m', '0790000', 'Room  : Business-1'),
(63, 30, 17, '2020-01-22', '11:00:00', '12:00:00', 20, 1650, 'i NEED BLUE PEN<br>------<br>I NEED Coffee Break <br> Pens And Note Books <br> VIP Parking <br> ', 'jAFER ', 'JOJ@GMAIL.COM', '0798888888', 'Room  : Business-1'),
(64, 30, 20, '2020-01-21', '10:00:00', '11:00:00', 20, 393, 'FVGV<br>------<br>I NEED Coffee Break <br> Pens And Note Books <br> ', 'Mohammad', 'CRC', 'RFCF', 'Room  : White'),
(67, 30, 18, '2020-01-23', '10:00:00', '11:00:00', 40, 30, '<br>------<br>I NEED Water bottles <br> Pens And Note Books <br> VIP Parking <br> Coffee Break <br> ', 'Jayyousi Company', 'm@mmm', '0780005484', 'Table : Star');

-- --------------------------------------------------------

--
-- Table structure for table `rooms_and_tables`
--

CREATE TABLE `rooms_and_tables` (
  `id` int(11) NOT NULL,
  `is_Room` tinyint(1) NOT NULL,
  `name` text NOT NULL,
  `cost` int(3) NOT NULL,
  `size` int(3) NOT NULL,
  `image` varchar(250) NOT NULL,
  `company_id` int(11) NOT NULL,
  `Description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms_and_tables`
--

INSERT INTO `rooms_and_tables` (`id`, `is_Room`, `name`, `cost`, `size`, `image`, `company_id`, `Description`) VALUES
(17, 1, 'Room  : MOTIVATION', 1200, 50, 'R40.jpg', 30, '  '),
(18, 0, 'Table : Star', 20, 1, 'oneee.jpg', 30, ' '),
(20, 1, 'Room  : White', 333, 10, 'ten1.jpg', 30, ''),
(21, 0, 'Table : SIMPLE', 15, 2, 'ttt.jpg', 54, ' '),
(22, 1, 'Room  : POSITIVE', 500, 21, '21.jpg', 49, '  '),
(23, 0, 'Table  : Golden', 25, 1, 'oneeoe.jpg', 49, ''),
(24, 1, 'Room  :   VIP', 450, 15, 'R15.jpg', 52, '  '),
(25, 0, 'Table :Anti Distraction', 40, 4, 'four1.jpg', 52, '         '),
(26, 1, 'Room  :  Storming', 77, 10, 'R8.jpg', 53, ' '),
(27, 1, 'Room  : Thinking', 800, 35, 'threth5.jpg', 54, ''),
(28, 0, 'Table :    Motivation', 50, 3, 'thr.jpg', 53, '  ');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(50) NOT NULL,
  `service_cost` float NOT NULL,
  `company_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`, `service_cost`, `company_id`) VALUES
(13, 'Coffee Break', 4.5, 30),
(15, 'Pens And Note Books', 2, 30),
(16, 'VIP Parking ', 3, 30),
(17, 'WIFI', 0, 30),
(18, 'Water bottles', 0.5, 30),
(19, 'Coffee Break', 4.5, 49),
(20, 'Coffee Break', 4.5, 52),
(21, 'Coffee Break', 4.5, 53),
(22, 'Coffee Break', 4.5, 54),
(23, 'Pens And Note Books', 2, 52),
(24, 'Pens And Note Books', 2, 53),
(25, 'Pens And Note Books', 2, 50),
(26, 'Pens And Note Books', 2, 54),
(27, 'WIFI', 0, 52),
(28, 'WIFI', 0, 53),
(29, 'WIFI', 0, 54),
(30, 'WIFI', 0, 49);

-- --------------------------------------------------------

--
-- Table structure for table `web_admin`
--

CREATE TABLE `web_admin` (
  `web_admin_id` int(3) NOT NULL,
  `web_admin_name` text CHARACTER SET utf8mb4 NOT NULL,
  `web_admin_email` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `web_admin_password` varchar(16) CHARACTER SET utf8mb4 NOT NULL,
  `web_admin_image` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `admin_master` tinyint(1) NOT NULL,
  `web_admin_mobile` varchar(30) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_admin`
--

INSERT INTO `web_admin` (`web_admin_id`, `web_admin_name`, `web_admin_email`, `web_admin_password`, `web_admin_image`, `admin_master`, `web_admin_mobile`) VALUES
(52, 'Mohammad AL Jayyousi', 'j@j', '12345678', 'photo.jpeg', 1, '0790762885');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`Com_id`);

--
-- Indexes for table `com_admins`
--
ALTER TABLE `com_admins`
  ADD PRIMARY KEY (`Com_Admin_ID`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customers_request`
--
ALTER TABLE `customers_request`
  ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `rooms_and_tables`
--
ALTER TABLE `rooms_and_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `web_admin`
--
ALTER TABLE `web_admin`
  ADD PRIMARY KEY (`web_admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `Com_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `com_admins`
--
ALTER TABLE `com_admins`
  MODIFY `Com_Admin_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `customers_request`
--
ALTER TABLE `customers_request`
  MODIFY `request_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `rooms_and_tables`
--
ALTER TABLE `rooms_and_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `web_admin`
--
ALTER TABLE `web_admin`
  MODIFY `web_admin_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
