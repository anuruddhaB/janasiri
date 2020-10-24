-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2020 at 08:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmt_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bankdetails`
--

CREATE TABLE `bankdetails` (
  `id` int(11) NOT NULL,
  `BankName` varchar(255) DEFAULT NULL,
  `accNo` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bankdetails`
--

INSERT INTO `bankdetails` (`id`, `BankName`, `accNo`, `date`, `status`) VALUES
(1, 'Sampath Bank', 2147483647, '2020-01-12', 1),
(2, 'Commercial Bank', 2147483647, '2020-01-12', 1),
(3, 'Hatton National Bank', 2147483647, '2020-01-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `carrenting`
--

CREATE TABLE `carrenting` (
  `id` int(11) NOT NULL,
  `vinid` varchar(11) NOT NULL,
  `resid` int(11) DEFAULT NULL,
  `hours` double DEFAULT NULL,
  `timeout` time DEFAULT NULL,
  `timein` time DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carrenting`
--

INSERT INTO `carrenting` (`id`, `vinid`, `resid`, `hours`, `timeout`, `timein`, `date`, `status`) VALUES
(3, 'WPGG2125', 2, 4, '838:59:59', '838:59:59', '2019-12-18', 1),
(4, 'WPGG2125', 3, 4, '838:59:59', '838:59:59', '2019-12-18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerlogin`
--

CREATE TABLE `customerlogin` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` int(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customerlogin`
--

INSERT INTO `customerlogin` (`id`, `fname`, `lname`, `address`, `contact`, `email`, `username`, `password`, `date`, `status`) VALUES
(1, 'Anuruddha', 'Bandara', '100/4', 777252549, 'anuruddha.b.batagalla@gmail.com', 'lexi2', 'd41d8cd98f00b204e9800998ecf8427e', '2020-09-02', 1),
(2, 'Anuruddha', 'Bandara', '100/4,Batagalla,Thalathuoya', 777252549, 'anuruddha.b.batagalla@gmail.com', '', 'd41d8cd98f00b204e9800998ecf8427e', '2020-09-02', 1),
(3, 'Jayani', 'Wasunda', '100/4,Batagalla,Thalathuoya,', 777252549, 'anuruddha.b.batagalla@gmail.com', 'jayaniWasunda', '202cb962ac59075b964b07152d234b70', '2020-09-02', 1),
(4, 'Anuruddha', 'Bandara', '100/7,Batagalla,Thalathuoya', 777252549, 'anuruddha.b.batagalla@gmail.com', 'lexi', '25d55ad283aa400af464c76d713c07ad', '2020-09-26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeepayment`
--

CREATE TABLE `employeepayment` (
  `id` int(11) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `food` double DEFAULT NULL,
  `medical` double DEFAULT NULL,
  `transport` double(255,0) DEFAULT NULL,
  `deduction` double(255,0) DEFAULT NULL,
  `absAmount` double DEFAULT NULL,
  `totalPaid` double DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeepayment`
--

INSERT INTO `employeepayment` (`id`, `empid`, `food`, `medical`, `transport`, `deduction`, `absAmount`, `totalPaid`, `date`, `status`) VALUES
(1, 1, 1000, 1000, 1000, 29000, 5000, 35000, '2019-1-1', 1),
(2, 1, 1000, 1000, 1000, 30000, 5000, 28000, '2019-12-17', 1),
(3, 2, 1000, 1000, 1000, 3500, 8000, 31500, '2019-12-17', 1),
(4, 5, 1000, 1000, 1000, 0, 1000, 32000, '2019-12-17', 1),
(5, 4, 1000, 1000, 1000, 0, 1000, 32000, '2019-12-17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeeregistration`
--

CREATE TABLE `employeeregistration` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `dob` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `nic` int(11) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `contact` int(11) DEFAULT NULL,
  `bankName` varchar(255) DEFAULT NULL,
  `accountNo` int(11) DEFAULT NULL,
  `jobRole` varchar(255) DEFAULT NULL,
  `Salary` double(10,2) DEFAULT NULL,
  `status` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeeregistration`
--

INSERT INTO `employeeregistration` (`id`, `fname`, `lname`, `dob`, `gender`, `nic`, `address`, `contact`, `bankName`, `accountNo`, `jobRole`, `Salary`, `status`) VALUES
(1, 'Anurddha', 'Bandara', '10/10/1994', 'Male', 942843259, '4/100,Batagalla,Thalathuoya', 717252549, 'Commercial Bank', 2147483647, '', 0.00, 1),
(2, 'Saumyalanka', 'Bambaradeniya', '08/04/1998', 'Female', 985990360, '65,Daskara,Muruthagahamula', 716563149, 'Sampath Bank', 2147483647, 'Supervisor', 40000.00, 1),
(3, 'Jayani', 'Wasunda', '27/01/1998', 'Female', 942843257, 'Kandy,Kandy,Kandy', 777252549, 'Sampath Bank', 152848259, 'Assistance', 20000.00, 3),
(4, 'Udara', 'hapugoda', '10/11/1995', 'Male', 2147483647, '4/100,Kandy,Ampitiya', 777252549, 'Sampath Bank', 2147483647, 'Assistance', 30000.00, 1),
(5, 'Anuradha', 'Jayarathna', '27/03/1973', 'Male', 732548782, '1/100,Batagalla,Thalathuoya', 78252548, 'Sampath Bank', 2147483647, 'Mechanic', 30000.00, 1),
(6, 'Thilanka', 'Sandaruwani', '1998-02-08', 'Female', 982546782, '4/100,Batagalla,Thalathuoya', 716563149, 'Sampath Bank', 2147483647, 'Assistance', 30000.00, 1),
(7, 'Sanduni', 'Nawanjana', '1998-04-09', 'Female', 2147483647, '4/127,Bammanna,Giriulla', 786563149, 'Sampath Bank', 2147483647, 'Supervisor', 40000.00, 1),
(8, 'Lexi', 'Neena', '10/10/1995', 'Female', 952843259, '4/100,Batagalla,Thalathuoya', 777252549, '1', 2147483647, '1', 1.00, 1),
(9, 'Anuruddha', 'Bandara', '10/10/1994', 'Male', 986513213, '100/4,Batagalla,Thalathuoya,Kandy', 777252549, '1', 2147483647, '1', 1.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employeesalaryadvance`
--

CREATE TABLE `employeesalaryadvance` (
  `id` int(11) NOT NULL,
  `empid` int(11) DEFAULT NULL,
  `advanceAmount` double(200,0) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employeesalaryadvance`
--

INSERT INTO `employeesalaryadvance` (`id`, `empid`, `advanceAmount`, `date`, `status`) VALUES
(1, 1, 1000, '2019-11-25', 3),
(2, 2, 5000, '2019-11-25', 3),
(3, 3, 5000, '2019-11-25', 3),
(4, 1, 7500, '2019-12-12', 3),
(5, 1, 8000, '2019-12-12', 1),
(6, 2, 3500, '2019-12-12', 1),
(7, 1, 2500, '2019-12-12', 1),
(8, 1, 1000, '2019-12-12', 1),
(9, 1, 5000, '2019-12-12', 1),
(10, 1, 1000, '2019-12-12', 1),
(11, 1, 5000, '2019-12-12', 1),
(12, 1, 7500, '2020-01-04', 1),
(13, 1, 5000, '2020-01-07', 1),
(14, 1, 5000, '2020-02-15', 1),
(15, 1, 5200, '2020-04-04', 1),
(16, 2, 5000, '2020-06-10', 1),
(17, 1, 5000, '2020-07-28', 1);

-- --------------------------------------------------------

--
-- Table structure for table `itemstock`
--

CREATE TABLE `itemstock` (
  `id` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jobrole`
--

CREATE TABLE `jobrole` (
  `id` int(11) NOT NULL,
  `jobrole` varchar(255) DEFAULT NULL,
  `basicSalary` double(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobrole`
--

INSERT INTO `jobrole` (`id`, `jobrole`, `basicSalary`, `date`, `status`) VALUES
(1, 'Manager', 75000.00, '2020-01-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicesection`
--

CREATE TABLE `servicesection` (
  `id` int(11) NOT NULL,
  `serviceSection` varchar(255) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicesection`
--

INSERT INTO `servicesection` (`id`, `serviceSection`, `date`, `status`) VALUES
(1, 'Servicing', '2020-04-08', 1),
(2, 'Painting', '2020-04-08', 1),
(3, 'Repairing', '2020-04-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicetimeslot`
--

CREATE TABLE `servicetimeslot` (
  `id` int(11) NOT NULL,
  `timeSlot` varchar(10) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetimeslot`
--

INSERT INTO `servicetimeslot` (`id`, `timeSlot`, `status`) VALUES
(1, '9.00AM', 1),
(2, '11.30AM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `servicetype`
--

CREATE TABLE `servicetype` (
  `id` int(11) NOT NULL,
  `serviceName` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `secid` int(11) NOT NULL,
  `date` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `servicetype`
--

INSERT INTO `servicetype` (`id`, `serviceName`, `description`, `secid`, `date`, `status`) VALUES
(1, 'Other', 'Other', 1, '2020-09-29 13:22:59', 2),
(2, 'Tinkering', '', 2, '2020-10-21 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shipmentrecord`
--

CREATE TABLE `shipmentrecord` (
  `id` int(11) NOT NULL,
  `from` varchar(255) DEFAULT NULL,
  `person` int(11) DEFAULT NULL,
  `containerid` varchar(255) NOT NULL,
  `shippedDate` varchar(50) DEFAULT NULL,
  `releasedDate` varchar(50) DEFAULT NULL,
  `payment` varchar(255) DEFAULT NULL,
  `date` varchar(50) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shipmentrecord`
--

INSERT INTO `shipmentrecord` (`id`, `from`, `person`, `containerid`, `shippedDate`, `releasedDate`, `payment`, `date`, `status`) VALUES
(1, 'Japan-Tokoyo', 1, 'ECN145VF', '2019-07-11', '2019-11-26', '75000', '2019-12-27', 3);

-- --------------------------------------------------------

--
-- Table structure for table `shippingperson`
--

CREATE TABLE `shippingperson` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `contactNo` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shippingperson`
--

INSERT INTO `shippingperson` (`id`, `name`, `contactNo`, `date`, `status`) VALUES
(1, 'Anuruddha Bandara', 777252549, '2019-12-08', 1),
(2, 'Jayani Wasunda', 717252549, '2019-12-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `status`) VALUES
(1, 'Active'),
(5, 'Checkd Out'),
(6, 'Checked In'),
(2, 'Deactive'),
(4, 'Deleted'),
(3, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `stockcustomorder`
--

CREATE TABLE `stockcustomorder` (
  `id` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `cusName` varchar(255) DEFAULT NULL,
  `cusNo` int(11) DEFAULT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `advPay` double DEFAULT NULL,
  `totPay` double DEFAULT NULL,
  `balance` double DEFAULT NULL,
  `descrip` varchar(500) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockcustomorder`
--

INSERT INTO `stockcustomorder` (`id`, `date`, `cusName`, `cusNo`, `vendor`, `model`, `year`, `name`, `condition`, `advPay`, `totPay`, `balance`, `descrip`, `status`) VALUES
(1, '2020-01-10', 'Anuruddha', 777252549, 'Toyota', 'Allion', '2018', 'Engine-valve', 'Brand New', 75000, 100000, 25000, 'Urgent', 1),
(2, '2020-01-10', 'Jayani', 776143566, 'Toyota', 'Premio', '2015', 'Air Valve', 'Brand New', 100000, 165000, 65000, 'In 2 Weeks', 1),
(3, '2020-01-11', 'Thilanka', 716365149, 'Nissan', 'March', '2015', 'Gearbox', 'Brand New', 25000, 225000, 200000, 'Urgent', 1),
(4, '2020-06-10', 'Anuruddha', 777252549, 'Toyota', 'Allion', '2005', 'Gear Box', 'New', 5000, 0, 0, 'Urgent', 6);

-- --------------------------------------------------------

--
-- Table structure for table `stockcustomorderlog`
--

CREATE TABLE `stockcustomorderlog` (
  `id` int(11) NOT NULL,
  `orderid` int(11) DEFAULT NULL,
  `arriveDate` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockcustomorderlog`
--

INSERT INTO `stockcustomorderlog` (`id`, `orderid`, `arriveDate`, `date`, `status`) VALUES
(3, 4, '0000-00-00', '2020-06-10', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockdetails`
--

CREATE TABLE `stockdetails` (
  `id` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `vendor` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `year` varchar(255) DEFAULT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockdetails`
--

INSERT INTO `stockdetails` (`id`, `itemCode`, `name`, `vendor`, `type`, `model`, `year`, `date`, `status`) VALUES
(1, 'ENG1265', 'ENGINE', 1, 1, 'ALLION', '2018', '2019-12-28', 2),
(2, 'GER1245', 'Gearbox', 1, 1, 'Premio', '2011', '2019-12-30', 2),
(3, 'SUS0056', 'Suspension', 1, 1, 'Camery', '2016', '2020-01-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockinventory`
--

CREATE TABLE `stockinventory` (
  `id` int(11) NOT NULL,
  `itemCode` varchar(255) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `unitPrice` double(10,2) DEFAULT NULL,
  `sellPrice` double(10,2) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockinventory`
--

INSERT INTO `stockinventory` (`id`, `itemCode`, `qty`, `unitPrice`, `sellPrice`, `status`) VALUES
(2, 'ENG1265', 22, 175000.00, 250000.00, 2),
(3, 'GER1245', 7, 145000.00, 225000.00, 2),
(4, 'SUS0056', 5, 56000.00, 870000.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `stockrefilllog`
--

CREATE TABLE `stockrefilllog` (
  `id` int(11) NOT NULL,
  `itemCode` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `unitPrice` double(10,2) DEFAULT NULL,
  `sellPrice` double(10,2) DEFAULT NULL,
  `contId` int(255) NOT NULL,
  `date` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stockrefilllog`
--

INSERT INTO `stockrefilllog` (`id`, `itemCode`, `qty`, `unitPrice`, `sellPrice`, `contId`, `date`, `status`) VALUES
(3, 'ENG1265', 5, 175000.00, 225000.00, 1, '2019-12-28', 1),
(4, 'ENG1265', 7, 185000.00, 215000.00, 1, '2019-12-28', 1),
(5, 'ENG1265', 10, 175000.00, 250000.00, 1, '2019-12-29', 1),
(6, 'GER1245', 7, 145000.00, 225000.00, 1, '2019-12-30', 1),
(7, 'SUS0056', 5, 56000.00, 870000.00, 1, '2020-01-07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `userreservation`
--

CREATE TABLE `userreservation` (
  `id` varchar(255) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `servicetypeid` int(11) DEFAULT NULL,
  `timeslotid` int(11) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `reservationdate` date DEFAULT NULL,
  `reservationtime` time(6) DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `vehicleModel` varchar(100) DEFAULT NULL,
  `vehicleYear` varchar(100) DEFAULT NULL,
  `replaceNote` varchar(250) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `resdate` varchar(50) NOT NULL,
  `sectionid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userreservation`
--

INSERT INTO `userreservation` (`id`, `userid`, `servicetypeid`, `timeslotid`, `message`, `reservationdate`, `reservationtime`, `status`, `vehicleModel`, `vehicleYear`, `replaceNote`, `note`, `resdate`, `sectionid`) VALUES
('RES1468263020', 4, 1, 1, 'Change Brake Lights', '2020-10-21', '05:46:57.000000', 1, 'Toyota Aqua', '2016', '\nAnuruddha Bandara\nAnuruddha Bandara\nKiss my ass', '\nAnuruddha Bandara\nAnuruddha Bandara\nKISS MY ASS', '2020-10-21', 1),
('RES1479754984', 4, 1, 1, '', '2020-10-21', '08:12:41.000000', 1, 'Toyota Aqua', '2019', 'No Changes\nNeed to paint', 'No Changes\nTinkering', '2020-10-21', 2),
('RES484316131', 4, 1, 1, 'Servicing', '2020-10-24', '11:01:27.000000', 1, 'Toyota Camery', '2015', '\nNeeds to changes some valves-repairing section', '\nServicing section work is done.', '2020-10-24', 1),
('RES594231517', 4, 1, 1, 'scasc', '2020-10-16', '08:39:28.000000', 1, 'Toyota Allio', '2015', '', '', '2020-10-23', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehicledetails`
--

CREATE TABLE `vehicledetails` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `companyName` varchar(255) DEFAULT NULL,
  `engine` varchar(255) DEFAULT NULL,
  `chasis` varchar(255) DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `mileage` varchar(255) DEFAULT NULL,
  `purchaseDate` varchar(10) DEFAULT NULL,
  `condition` varchar(255) DEFAULT NULL,
  `purpose` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicledetails`
--

INSERT INTO `vehicledetails` (`id`, `type`, `companyName`, `engine`, `chasis`, `vin`, `mileage`, `purchaseDate`, `condition`, `purpose`, `status`, `date`) VALUES
(1, 'sedan', 'Nissan', '8040089780CEN', '87524359YTD', 'CPCAE3538', '16', '05/12/2019', 'Brand New', 'Rent', 1, '2019-12-06'),
(2, 'HatchBack', 'Toyota', '987654321', '12893147', 'WPGG2125', '25000', '12/10/2018', 'Used', 'Yard Use', 1, '2019-12-06'),
(3, 'Tow truck', 'Toyota', '123456789', '9876543210', 'WPLP2589', '16', '16/12/2019', 'Brand New', 'Towing', 1, '2019-12-17'),
(4, 'HatchBack', 'Nissan', '1258963', '12365478', 'CPACE3456', '0', '2020-01-01', 'Brand New', 'Rent', 1, '2020-01-12');

-- --------------------------------------------------------

--
-- Table structure for table `vehiclerentlog`
--

CREATE TABLE `vehiclerentlog` (
  `id` int(11) NOT NULL,
  `vehicleId` int(11) DEFAULT NULL,
  `reservationId` int(11) DEFAULT NULL,
  `timeOut` time DEFAULT NULL,
  `timeIn` time DEFAULT NULL,
  `date` date DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclerentlog`
--

INSERT INTO `vehiclerentlog` (`id`, `vehicleId`, `reservationId`, `timeOut`, `timeIn`, `date`, `status`) VALUES
(1, 1, 1256, '15:53:48', '19:53:57', '2020-01-07', 6),
(2, 2, 1257, '15:53:48', '19:53:57', '2020-01-07', 5),
(3, 3, 1258, '15:53:48', '19:53:57', '2020-01-07', 5);

-- --------------------------------------------------------

--
-- Table structure for table `vehicletype`
--

CREATE TABLE `vehicletype` (
  `id` int(11) NOT NULL,
  `type` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehicletype`
--

INSERT INTO `vehicletype` (`id`, `type`, `status`) VALUES
(1, 'Sedan', 1),
(2, 'SUV', 1),
(3, 'ASFCASD', 1);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclevendor`
--

CREATE TABLE `vehiclevendor` (
  `id` int(11) NOT NULL,
  `vendor` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vehiclevendor`
--

INSERT INTO `vehiclevendor` (`id`, `vendor`, `status`) VALUES
(1, 'Toyota', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bankdetails`
--
ALTER TABLE `bankdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carrenting`
--
ALTER TABLE `carrenting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customerlogin`
--
ALTER TABLE `customerlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeepayment`
--
ALTER TABLE `employeepayment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empid_pay` (`empid`),
  ADD KEY `fk_empid_stat` (`status`);

--
-- Indexes for table `employeeregistration`
--
ALTER TABLE `employeeregistration`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status` (`status`),
  ADD KEY `nic` (`nic`);

--
-- Indexes for table `employeesalaryadvance`
--
ALTER TABLE `employeesalaryadvance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_empid` (`empid`);

--
-- Indexes for table `itemstock`
--
ALTER TABLE `itemstock`
  ADD PRIMARY KEY (`id`,`itemCode`);

--
-- Indexes for table `jobrole`
--
ALTER TABLE `jobrole`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicesection`
--
ALTER TABLE `servicesection`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicetimeslot`
--
ALTER TABLE `servicetimeslot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `servicetype`
--
ALTER TABLE `servicetype`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_secid` (`secid`);

--
-- Indexes for table `shipmentrecord`
--
ALTER TABLE `shipmentrecord`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_shipPerson` (`person`),
  ADD KEY `fk_shipStat` (`status`),
  ADD KEY `id` (`id`),
  ADD KEY `containerid` (`containerid`);

--
-- Indexes for table `shippingperson`
--
ALTER TABLE `shippingperson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `status` (`status`);

--
-- Indexes for table `stockcustomorder`
--
ALTER TABLE `stockcustomorder`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_stats` (`status`);

--
-- Indexes for table `stockcustomorderlog`
--
ALTER TABLE `stockcustomorderlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orderid` (`orderid`),
  ADD KEY `fk_oderstat` (`status`);

--
-- Indexes for table `stockdetails`
--
ALTER TABLE `stockdetails`
  ADD PRIMARY KEY (`id`,`itemCode`),
  ADD KEY `fk_vendor` (`vendor`),
  ADD KEY `fk_type` (`type`),
  ADD KEY `itemCode` (`itemCode`);

--
-- Indexes for table `stockinventory`
--
ALTER TABLE `stockinventory`
  ADD PRIMARY KEY (`id`,`itemCode`),
  ADD KEY `fk_itemCode` (`itemCode`);

--
-- Indexes for table `stockrefilllog`
--
ALTER TABLE `stockrefilllog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_contid` (`contId`);

--
-- Indexes for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `timeid` (`timeslotid`),
  ADD KEY `userid` (`userid`),
  ADD KEY `serviceid` (`servicetypeid`);

--
-- Indexes for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vin` (`vin`);

--
-- Indexes for table `vehiclerentlog`
--
ALTER TABLE `vehiclerentlog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vehid` (`vehicleId`),
  ADD KEY `fk_stat` (`status`);

--
-- Indexes for table `vehicletype`
--
ALTER TABLE `vehicletype`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehiclevendor`
--
ALTER TABLE `vehiclevendor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bankdetails`
--
ALTER TABLE `bankdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `carrenting`
--
ALTER TABLE `carrenting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customerlogin`
--
ALTER TABLE `customerlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `employeepayment`
--
ALTER TABLE `employeepayment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `employeeregistration`
--
ALTER TABLE `employeeregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `employeesalaryadvance`
--
ALTER TABLE `employeesalaryadvance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `jobrole`
--
ALTER TABLE `jobrole`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shipmentrecord`
--
ALTER TABLE `shipmentrecord`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stockcustomorder`
--
ALTER TABLE `stockcustomorder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stockcustomorderlog`
--
ALTER TABLE `stockcustomorderlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `stockinventory`
--
ALTER TABLE `stockinventory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `stockrefilllog`
--
ALTER TABLE `stockrefilllog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `vehicledetails`
--
ALTER TABLE `vehicledetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `vehicletype`
--
ALTER TABLE `vehicletype`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehiclevendor`
--
ALTER TABLE `vehiclevendor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `employeepayment`
--
ALTER TABLE `employeepayment`
  ADD CONSTRAINT `fk_empid_pay` FOREIGN KEY (`empid`) REFERENCES `employeeregistration` (`id`),
  ADD CONSTRAINT `fk_empid_stat` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `employeeregistration`
--
ALTER TABLE `employeeregistration`
  ADD CONSTRAINT `fk_status` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `employeesalaryadvance`
--
ALTER TABLE `employeesalaryadvance`
  ADD CONSTRAINT `fk_empid` FOREIGN KEY (`empid`) REFERENCES `employeeregistration` (`id`);

--
-- Constraints for table `servicetype`
--
ALTER TABLE `servicetype`
  ADD CONSTRAINT `fk_secid` FOREIGN KEY (`secid`) REFERENCES `servicesection` (`id`);

--
-- Constraints for table `shipmentrecord`
--
ALTER TABLE `shipmentrecord`
  ADD CONSTRAINT `fk_shipPerson` FOREIGN KEY (`person`) REFERENCES `shippingperson` (`id`),
  ADD CONSTRAINT `fk_shipStat` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `stockcustomorder`
--
ALTER TABLE `stockcustomorder`
  ADD CONSTRAINT `fk_stats` FOREIGN KEY (`status`) REFERENCES `status` (`id`);

--
-- Constraints for table `stockcustomorderlog`
--
ALTER TABLE `stockcustomorderlog`
  ADD CONSTRAINT `fk_oderstat` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_orderid` FOREIGN KEY (`orderid`) REFERENCES `stockcustomorder` (`id`);

--
-- Constraints for table `stockdetails`
--
ALTER TABLE `stockdetails`
  ADD CONSTRAINT `fk_type` FOREIGN KEY (`type`) REFERENCES `vehicletype` (`id`),
  ADD CONSTRAINT `fk_vendor` FOREIGN KEY (`vendor`) REFERENCES `vehiclevendor` (`id`);

--
-- Constraints for table `stockinventory`
--
ALTER TABLE `stockinventory`
  ADD CONSTRAINT `fk_itemCode` FOREIGN KEY (`itemCode`) REFERENCES `stockdetails` (`itemCode`);

--
-- Constraints for table `stockrefilllog`
--
ALTER TABLE `stockrefilllog`
  ADD CONSTRAINT `fk_contid` FOREIGN KEY (`contId`) REFERENCES `shipmentrecord` (`id`);

--
-- Constraints for table `userreservation`
--
ALTER TABLE `userreservation`
  ADD CONSTRAINT `serviceid` FOREIGN KEY (`servicetypeid`) REFERENCES `servicetype` (`id`),
  ADD CONSTRAINT `timeid` FOREIGN KEY (`timeslotid`) REFERENCES `servicetimeslot` (`id`),
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `customerlogin` (`id`);

--
-- Constraints for table `vehiclerentlog`
--
ALTER TABLE `vehiclerentlog`
  ADD CONSTRAINT `fk_stat` FOREIGN KEY (`status`) REFERENCES `status` (`id`),
  ADD CONSTRAINT `fk_vehid` FOREIGN KEY (`vehicleId`) REFERENCES `vehicledetails` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
