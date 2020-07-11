-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2019 at 01:56 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spl`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountlogin`
--

CREATE TABLE `accountlogin` (
  `id` int(255) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accountlogin`
--

INSERT INTO `accountlogin` (`id`, `username`, `email`, `password`, `type`) VALUES
(1, 'admin', 'admin@spl.com', 'admin', 'admin'),
(2, 'manager', 'manager@spl.com', 'manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `customerdata`
--

CREATE TABLE `customerdata` (
  `id` int(255) NOT NULL,
  `dealerid` int(255) NOT NULL,
  `dealername` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `type` varchar(255) NOT NULL,
  `arrivingdate` varchar(255) NOT NULL,
  `arrivingday` int(255) NOT NULL,
  `arrivingmonth` varchar(255) NOT NULL,
  `arrivingyear` int(255) NOT NULL,
  `flag` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerdata`
--

INSERT INTO `customerdata` (`id`, `dealerid`, `dealername`, `name`, `phone`, `city`, `address`, `email`, `type`, `arrivingdate`, `arrivingday`, `arrivingmonth`, `arrivingyear`, `flag`) VALUES
(1, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(2, 7, 'adil', 'Adil Islam', '03238839155', 'Lahore', '55_D Model Town', 'adil.butt7861@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(3, 7, 'adil', 'Adil', '03238839155', 'Lahore', '55_D Model Town', 'adilbutt0@outlook.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(4, 7, 'adil', 'Adil Butt', '03238839155', 'Lahore', '55-D Model Town', 'adilbutt0@outlook.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(5, 7, 'adil', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(6, 7, 'adil', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(7, 7, 'adil', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(8, 7, 'adil', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(9, 7, 'adil', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(10, 7, 'adil', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(11, 7, 'adil', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Gardens Lahore,', 'shahzebasif97@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(12, 7, 'adil', 'Shahzeb', '03334497527', 'Lahore', '93D Tariq Garden, Lahore', 'shahzebasif97@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(13, 5, 'umar', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(14, 5, 'umar', 'Adil Islam', '03238839155', 'Lahore', '55_D Model Town', 'adil.butt7861@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(15, 5, 'umar', 'Adil', '03238839155', 'Lahore', '55_D Model Town', 'adilbutt0@outlook.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(16, 5, 'umar', 'Adil Butt', '03238839155', 'Lahore', '55-D Model Town', '', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(17, 5, 'umar', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(18, 5, 'umar', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(19, 5, 'umar', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(20, 5, 'umar', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(21, 5, 'umar', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(22, 5, 'umar', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(23, 5, 'umar', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Gardens Lahore,', 'shahzebasif97@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(24, 5, 'umar', 'Shahzeb', '03334497527', 'Lahore', '93D Tariq Garden, Lahore', 'shahzebasif97@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(25, 6, 'shahzeb', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(26, 6, 'shahzeb', 'Adil Islam', '03238839155', 'Lahore', '55_D Model Town', 'adil.butt7861@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(27, 6, 'shahzeb', 'Adil', '03238839155', 'Lahore', '55_D Model Town', 'adilbutt0@outlook.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(28, 6, 'shahzeb', 'Adil Butt', '03238839155', 'Lahore', '55-D Model Town', 'adilbutt0@outlook.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(29, 6, 'shahzeb', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(30, 6, 'shahzeb', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Garden', 'shahzebasif96@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(31, 6, 'shahzeb', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(32, 6, 'shahzeb', 'Muhammad Umar', '03204830069', 'Lahore', 'Tajpura, Lahore', 'muhammadumar19981@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(33, 6, 'shahzeb', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(34, 6, 'shahzeb', 'Umar', '03204830069', 'Lahore', 'Tajpura. Lahore', 'muhammadumar19982@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(35, 6, 'shahzeb', 'Shahzeb Asif', '03334497527', 'Lahore', 'Tariq Gardens Lahore,', 'shahzebasif97@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(36, 6, 'shahzeb', 'Shahzeb', '03334497527', 'Lahore', '93D Tariq Garden, Lahore', 'shahzebasif97@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(37, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'service', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(38, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 11, 'Jul', 2019, 'true'),
(39, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 15, 'Jul', 2019, 'false'),
(41, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 16, 'Jul', 2019, 'false'),
(42, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 16, 'Jul', 2019, 'false'),
(43, 7, 'adil', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '16/Jul/2019', 16, 'Jul', 2019, 'false'),
(44, 8, 'hamza', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'sale', '17/Jul/2019', 17, 'Jul', 2019, 'true'),
(45, 8, 'hamza', 'Adil Islam Butt', '03238839155', 'Lahore', '55D Model Town', 'adil.butt7861@gmail.com', 'service', '17/Jul/2019', 17, 'Jul', 2019, 'true');

-- --------------------------------------------------------

--
-- Table structure for table `dealeraccount`
--

CREATE TABLE `dealeraccount` (
  `id` int(255) NOT NULL,
  `firstname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `lastname` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `phone` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `cnic` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dealeraccount`
--

INSERT INTO `dealeraccount` (`id`, `firstname`, `lastname`, `phone`, `cnic`, `city`, `area`, `username`, `email`, `password`) VALUES
(5, 'Muhammad', 'Umar', '923204830069', '3520218873765', 'Lahore', 'Tajpura', 'umar', 'muhammadumar19981@gmail.com', 'umar'),
(6, 'Shahzeb', 'Asif', '923334497527', '3520261522029', 'Rawalpindi', 'Tariq_Garden', 'shahzeb', 'shahzebasif96@gmail.com', 'shahzeb'),
(7, 'Adil', 'Islam Butt', '923238839155', '3520255382889', 'Lahore', 'Model_Town', 'adil', 'adil.butt7861@gmail.com', 'adil'),
(8, 'Muhammad', 'Hamza', '+923001234567', '3520211234567', 'Rawalpindi', 'Model_Town', 'hamza', 'hamza@mail.com', 'hamza'),
(9, 'Muhammad', 'Ali', '923231234567', '3520255382881', 'Multan', 'ABC_Town', 'ali', 'ali@mail.com', 'ali12345');

-- --------------------------------------------------------

--
-- Table structure for table `saleform`
--

CREATE TABLE `saleform` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleform`
--

INSERT INTO `saleform` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`) VALUES
(1, 'How frequently do you purchase from us?', 'Every Month', 'Every 5 - 6 Months', 'Every 1 - 2 Years', 'Every 5 - 6 Years', 'Not At All'),
(2, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', 'Very Likely', 'Somewhat likely', 'Neutral', 'Somewhat Unlikely', 'Very Unlikely'),
(3, 'How likely are you to continue doing business with us?', 'Very Likely', 'Somewhat Likely', 'Neutral', 'Somewhat Unlikely', 'Very Unlikely'),
(4, 'Are you satisfy the price of the product?', 'Strongly Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Strongly Dissatisfied'),
(5, 'Is the staff is cooperative?', 'Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'),
(6, 'Is the Organization operates in a socially responsible manner?', 'Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'),
(7, 'Are you satisfied with the culture of the company?', 'Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'),
(8, 'Are you satisfy with the behaviour of our dealer?', 'Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'),
(9, 'How would you rate your\r\noverall satisfaction with us?', 'Strongly Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Strongly Dissatisfied'),
(10, 'Do you want to come again to buy a new Product?', 'Yes, Definitely', 'Yes', 'Maybe', 'No', 'Not At All');

-- --------------------------------------------------------

--
-- Table structure for table `saleresponse`
--

CREATE TABLE `saleresponse` (
  `id` int(255) NOT NULL,
  `customerid` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `saleresponse`
--

INSERT INTO `saleresponse` (`id`, `customerid`, `question`, `answer`) VALUES
(58, 25, 'How frequently do you purchase from us?', '50'),
(59, 25, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '75'),
(60, 25, 'How likely are you to continue doing business with us?', '75'),
(61, 25, 'Are you satisfy the price of the product?', '50'),
(62, 25, 'Is the staff is cooperative?', '75'),
(63, 25, 'Is the Organization operates in a socially responsible manner?', '75'),
(64, 25, 'Are you satisfied with the culture of the company?', '75'),
(65, 25, 'Are you satisfy with the behaviour of our dealer?', '75'),
(66, 25, 'How would you rate your\r\noverall satisfaction with us?', '75'),
(67, 25, 'Do you want to come again to buy a new Product?', '50'),
(68, 13, 'How frequently do you purchase from us?', '50'),
(69, 13, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '25'),
(70, 13, 'How likely are you to continue doing business with us?', '50'),
(71, 13, 'Are you satisfy the price of the product?', '50'),
(72, 13, 'Is the staff is cooperative?', '50'),
(73, 13, 'Is the Organization operates in a socially responsible manner?', '50'),
(74, 13, 'Are you satisfied with the culture of the company?', '50'),
(75, 13, 'Are you satisfy with the behaviour of our dealer?', '50'),
(76, 13, 'How would you rate your\r\noverall satisfaction with us?', '50'),
(77, 13, 'Do you want to come again to buy a new Product?', '75'),
(78, 1, 'How frequently do you purchase from us?', '25'),
(79, 1, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '25'),
(80, 1, 'How likely are you to continue doing business with us?', '50'),
(81, 1, 'Are you satisfy the price of the product?', '50'),
(82, 1, 'Is the staff is cooperative?', '25'),
(83, 1, 'Is the Organization operates in a socially responsible manner?', '50'),
(84, 1, 'Are you satisfied with the culture of the company?', '25'),
(85, 1, 'Are you satisfy with the behaviour of our dealer?', '25'),
(86, 1, 'How would you rate your\r\noverall satisfaction with us?', '25'),
(87, 1, 'Do you want to come again to buy a new Product?', '50'),
(88, 38, 'How frequently do you purchase from us?', '75'),
(89, 38, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '75'),
(90, 38, 'How likely are you to continue doing business with us?', '75'),
(91, 38, 'Are you satisfy the price of the product?', '75'),
(92, 38, 'Is the staff is cooperative?', '75'),
(93, 38, 'Is the Organization operates in a socially responsible manner?', '75'),
(94, 38, 'Are you satisfied with the culture of the company?', '75'),
(95, 38, 'Are you satisfy with the behaviour of our dealer?', '75'),
(96, 38, 'How would you rate your\r\noverall satisfaction with us?', '75'),
(97, 38, 'Do you want to come again to buy a new Product?', '75'),
(98, 29, 'How frequently do you purchase from us?', '75'),
(99, 29, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '75'),
(100, 29, 'How likely are you to continue doing business with us?', '75'),
(101, 29, 'Are you satisfy the price of the product?', '75'),
(102, 29, 'Is the staff is cooperative?', '75'),
(103, 29, 'Is the Organization operates in a socially responsible manner?', '75'),
(104, 29, 'Are you satisfied with the culture of the company?', '75'),
(105, 29, 'Are you satisfy with the behaviour of our dealer?', '75'),
(106, 29, 'How would you rate your\r\noverall satisfaction with us?', '75'),
(107, 29, 'Do you want to come again to buy a new Product?', '75'),
(108, 44, 'How frequently do you purchase from us?', '100'),
(109, 44, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', '100'),
(110, 44, 'How likely are you to continue doing business with us?', '100'),
(111, 44, 'Are you satisfy the price of the product?', '100'),
(112, 44, 'Is the staff is cooperative?', '100'),
(113, 44, 'Is the Organization operates in a socially responsible manner?', '100'),
(114, 44, 'Are you satisfied with the culture of the company?', '100'),
(115, 44, 'Are you satisfy with the behaviour of our dealer?', '100'),
(116, 44, 'How would you rate your\r\noverall satisfaction with us?', '100'),
(117, 44, 'Do you want to come again to buy a new Product?', '100');

-- --------------------------------------------------------

--
-- Table structure for table `serviceform`
--

CREATE TABLE `serviceform` (
  `id` int(255) NOT NULL,
  `question` varchar(255) NOT NULL,
  `option1` varchar(255) NOT NULL,
  `option2` varchar(255) NOT NULL,
  `option3` varchar(255) NOT NULL,
  `option4` varchar(255) NOT NULL,
  `option5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceform`
--

INSERT INTO `serviceform` (`id`, `question`, `option1`, `option2`, `option3`, `option4`, `option5`) VALUES
(1, 'How frequently do you service from us?', 'Everytime', 'Sometime', 'Every Month', 'Every Years', 'Not At All'),
(2, 'How likely is it that you\r\nwould recommend us to a\r\nfriend/colleague?', 'Very Likely', 'Somewhat likely', 'Neutral', 'Somewhat Unlikely', 'Very Unlikely'),
(3, 'How likely are you to continue doing business with us?', 'Very Likely', 'Somewhat likely', 'Neutral', 'Somewhat Unlikely', 'Very Unlikely'),
(4, 'How satisfied are you overall\r\nwith our customer support?', 'Strongly Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Strongly Dissatisfied'),
(5, 'How satisfied were you\r\nwith how the support staff\r\nresolved your most recent\r\nproblem?', 'Very Satisfied', 'Somewhat Satisfied', 'Neutral', 'Somewhat Dissatisfied', 'Very Dissatisfied'),
(6, 'Is the Organization operates in a socially responsible manner?', 'Strongly Agree', 'Agree', 'Neutral', 'Strongly Disagree', 'Disagree'),
(7, 'Are you satisfied with the culture of the company?', 'Strongly Agree', 'Agree', 'Neutral', 'Disagree', 'Strongly Disagree'),
(8, 'Are you satisfy with the behaviour of our dealer?', 'Strongly Agree', 'Agree', 'Neutral', 'Strongly Disagree', 'Disagree'),
(9, 'How would you rate your\r\noverall satisfaction with us?', 'Strongly Satisfied', 'Satisfied', 'Neutral', 'Dissatisfied', 'Strongly Dissatisfied'),
(10, 'Do you want to come again for service?', 'Yes, Definitely', 'Yes', 'Maybe', 'No', 'Not At All');

-- --------------------------------------------------------

--
-- Table structure for table `serviceresponse`
--

CREATE TABLE `serviceresponse` (
  `id` int(255) NOT NULL,
  `customerid` int(255) NOT NULL,
  `answer1` varchar(255) NOT NULL,
  `answer2` varchar(255) NOT NULL,
  `answer3` varchar(255) NOT NULL,
  `answer4` varchar(255) NOT NULL,
  `answer5` varchar(255) NOT NULL,
  `answer6` varchar(255) NOT NULL,
  `answer7` varchar(255) NOT NULL,
  `answer8` varchar(255) NOT NULL,
  `answer9` varchar(255) NOT NULL,
  `answer10` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serviceresponse`
--

INSERT INTO `serviceresponse` (`id`, `customerid`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `answer6`, `answer7`, `answer8`, `answer9`, `answer10`) VALUES
(18, 16, '50', '75', '50', '75', '75', '75', '75', '75', '75', '50'),
(19, 2, '75', '75', '75', '50', '75', '75', '75', '75', '75', '75'),
(20, 14, '25', '25', '25', '25', '25', '25', '25', '25', '25', '25'),
(22, 37, '75', '75', '75', '75', '75', '75', '75', '75', '75', '75'),
(24, 26, '75', '75', '75', '75', '75', '75', '75', '75', '75', '75'),
(25, 45, '100', '100', '100', '100', '100', '100', '100', '100', '100', '100');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountlogin`
--
ALTER TABLE `accountlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dealerid` (`dealerid`),
  ADD KEY `dealername` (`dealername`);

--
-- Indexes for table `dealeraccount`
--
ALTER TABLE `dealeraccount`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `cnic` (`cnic`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `saleform`
--
ALTER TABLE `saleform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saleresponse`
--
ALTER TABLE `saleresponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- Indexes for table `serviceform`
--
ALTER TABLE `serviceform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `serviceresponse`
--
ALTER TABLE `serviceresponse`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customerid` (`customerid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountlogin`
--
ALTER TABLE `accountlogin`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customerdata`
--
ALTER TABLE `customerdata`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `dealeraccount`
--
ALTER TABLE `dealeraccount`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `saleform`
--
ALTER TABLE `saleform`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `saleresponse`
--
ALTER TABLE `saleresponse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `serviceform`
--
ALTER TABLE `serviceform`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `serviceresponse`
--
ALTER TABLE `serviceresponse`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerdata`
--
ALTER TABLE `customerdata`
  ADD CONSTRAINT `customerdata_ibfk_1` FOREIGN KEY (`dealerid`) REFERENCES `dealeraccount` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customerdata_ibfk_2` FOREIGN KEY (`dealername`) REFERENCES `dealeraccount` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `saleresponse`
--
ALTER TABLE `saleresponse`
  ADD CONSTRAINT `saleresponse_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customerdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `serviceresponse`
--
ALTER TABLE `serviceresponse`
  ADD CONSTRAINT `serviceresponse_ibfk_1` FOREIGN KEY (`customerid`) REFERENCES `customerdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
