-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2017 at 02:15 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `enrollment_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicant`
--

CREATE TABLE `tblapplicant` (
  `appid` int(10) NOT NULL,
  `shs_id` varchar(30) NOT NULL,
  `lrn_no` varchar(30) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `bday` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  `school_type` varchar(50) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `gcontact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapplicant`
--

INSERT INTO `tblapplicant` (`appid`, `shs_id`, `lrn_no`, `lname`, `fname`, `mname`, `gender`, `bday`, `age`, `street`, `city`, `province`, `contact`, `school`, `school_type`, `guardian`, `gcontact`, `date`, `status`) VALUES
(31, '1601001', '', 'mercado', 'mark jay', 'lospe', 'male', '01/26/1995', 21, 'olivarez', 'tagaytay', 'cavite', '09161237710', 'FPFELIX MNHS', 'Public', 'susana', '09161231100', '10/25/2016', 1),
(32, '1601002', '', 'loveria', 'arvic', 'abe', 'male', '03/01/2000', 16, 'olivarez', 'tagaytay', 'cavite', '09161237710', 'HS', 'Private', 'ae', '09161231100', '10/25/2016', 1),
(33, '1601003', '', 'sena', 'hannah jayne', 'mojica', 'female', '12/27/1998', 17, 'indang', 'naic', 'cavite', '09161237710', 'WESTERN HS', 'Private', 'minerva', '09161237710', '10/25/2016', 1),
(34, '1601004', '', 'mongoc', 'jomar', 'elegado', 'male', '02/08/1999', 17, 'crossing', 'mendez', 'cavite', '09161237710', 'HS', 'Public', 'ELEONOR MANALO BUENO', '09161231100', '10/25/2016', 1),
(35, '1601005', '', 'dilag', 'aila veronica', 'dilag', 'female', '01/29/1996', 20, 'olivarez', 'tagaytay', 'cavite', '00000000000', 'HS', 'Public', 'jenny', '09161237710', '10/25/2016', 1),
(36, '1601006', '', 'dimapilis', 'jecel', 'dilag', 'female', '01/06/1998', 18, 'LIGAYA DRIVE', 'tagaytay', 'cavite', '09161237710', 'PATUTO HS', 'Public', 'lilibet', '09161237710', '10/25/2016', 1),
(37, '1601007', '', 'ooo', 'ooooo', 'oooo', 'male', '12/27/1999', 16, 'oo', 'oooo', 'ooooo', '09161237710', 'oooo', 'Private', 'ooooo', '09161231100', '10/25/2016', 1),
(38, '1601008', '', 'lolo', 'lolo', 'lolo', 'male', '05/11/1998', 18, 'lolo', 'lolo', 'lolo', '09161237710', 'HS', 'Private', 'lola', '09161237710', '10/25/2016', 1),
(39, '', '', 'kkk', 'kkkk', 'kkkk', 'female', '03/10/1998', 18, 'kkk', 'kkkk', 'kkkk', '09161237710', 'kkkk', 'Private', 'kkk', '09161231100', '10/25/2016', 1),
(40, '1601009', '', 'andnsadn', 'knkk', 'kbkbk', 'female', '02/08/1990', 26, 'fewggrrg', 'fgfege', 'egergreg', '09082143444', 'rgdfgdg', 'Public', 'gdfgdf', '08797867856', '10/25/2016', 1),
(41, '1601010', '', 'hm', 'hm', 'hm', 'female', '10/10/1998', 18, 'Mendez', 'Cavite', 'Cavite', '09077777777', 'MCS', 'Public', 'HL', '09088888888', '10/25/2016', 1),
(42, '', '999911111111', 'gh', 'khkh', 'bjvj', 'female', '07/13/1994', 22, 'lklk', 'lklk', 'klkl', '08988888888', 'lklk', 'Public', 'lklkl', '08786666666', '10/25/2016', 1),
(43, '1601012', '123456789012', 'sidocon', 'ramon', 'jr', 'male', '01/31/2000', 16, 'looban', 'mendez', 'cavite', '09161237710', 'mendez HS', 'Public', 'jr ramon', '09161231100', '10/26/2016', 1),
(44, '1601011', '864667494111', 'hsbjjsj', 'bsuisss', 'Bsjsjsbhj', 'female', '10/26/1995', 21, 'olivarez', 'tagaytay', 'cavite', '08663437555', 'vhsjszbsbnJ', 'Public', 'vhsjwwwj hsus hsksbs', '96464448864', '10/26/2016', 1),
(45, '', '808080807979', 'lalalaa', 'lilili', 'lololo', 'female', '03/07/1990', 26, 'nana', 'nninin', 'nononon', '09286868657', 'mamama', 'Public', 'wawawawa', '09008978686', '10/27/2016', 1),
(46, '', '000000000000', 'bolival', 'jeisel', 'cailing', 'female', '06/14/1994', 22, 'olivarez', 'tagaytay', 'cavite', '00000000000', 'HS', 'Public', 'bolival', '88888888888', '10/27/2016', 1),
(47, '', '988672410872', 'jolina', 'jay', 'digong', 'male', '05/05/1996', 20, 'jsjdgjsgd', 'jjgj', 'bjgjgu', '09090898979', 'jigugujvj', 'Private', 'dhshdkhkdask', '09080707978', '10/27/2016', 1),
(48, '1601013', '253668888508', 'Dilag', 'Aila Veronica', 'Censon', 'female', '06/13/1997', 19, 'Kaytitinga 2', 'Alfonso', 'Cavite', '09485217142', 'KNHS', 'Public', 'Danilo', '09090909099', '10/27/2016', 1),
(49, '1601014', '135436457684', 'ffdhjy', 'hnfgj', 'ssxsa', 'male', '09/24/1996', 20, 'cxbgfbgf', 'dgdfyhtj', 'bnhjk', '68786757867', 'fdvgfhg', 'Public', 'tyhuthte', '12342453657', '10/27/2016', 1),
(50, '1601015', '204765434565', 'Roms', 'Cha', 'Panaligan', 'female', '05/13/1994', 22, 'Mendez', 'Cavite', 'Cavite', '09271818181', 'SAS', 'Private', 'Shirley Roms', '09128775678', '10/27/2016', 1),
(51, '1601016', '374638462387', 'garcia', 'heizel', 'mojica', 'female', '10/27/2000', 16, 'xdsc', 'zcxzczx', 'xcxzczxc', '89123921312', 'tcnhs', 'Public', 'sharon erolin', '98559457934', '10/27/2016', 1),
(52, '1601017', '112121333243', 'bla', 'kkk', 'kkk', 'female', '10/29/1994', 22, 'jjj', 'jjjj', 'jjjj', '00000000000', 'jjj', 'Private', 'jjjj', '00000000000', '11/12/2016', 1),
(53, '', '996900000000', 'q', 'q', 's', 'male', '03/07/1996', 20, 'g', 'd', 'd', '00000000000', 'd', 'Public', 'd', '88888888888', '01/06/2017', 0),
(54, '', '121222222222333', 'ssssss', 'ssssss', 'sssssssss', 'female', '01/04/2016', 1, 'ssssssssssssssssss', 'sssssssssssss', 'sssssssss', '11111111111', 'dddd', 'Public', 'ddd', '22222222222', '01/17/2017', 0),
(55, '1601018', '098765432123', 'mercado', 'mark jay', 'lospe', 'male', '02/08/1995', 21, 'olivarez', 'tagaytay', 'cavite', '09161111111', 'Felix High School', 'Public', 'susana mercado', '09161111111', '01/17/2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicant_info`
--

CREATE TABLE `tblapplicant_info` (
  `id` int(10) NOT NULL,
  `appid` varchar(50) NOT NULL,
  `shs_id` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicant_schedule`
--

CREATE TABLE `tblapplicant_schedule` (
  `schedule_id` int(10) NOT NULL,
  `appid` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `status` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapplicant_schedule`
--

INSERT INTO `tblapplicant_schedule` (`schedule_id`, `appid`, `date`, `time`, `status`) VALUES
(320, '52', '11/14/2016', '8:00 am', 1),
(321, '54', '01/18/2017', '8:10 am', 1),
(322, '', '01/18/2017', '8:00 am', 0),
(323, '', '01/18/2017', '8:40 am', 0),
(324, '55', '01/18/2017', '9:10 am', 1),
(325, '', '01/18/2017', '10:00 am', 0),
(326, '', '01/18/2017', '10:10 am', 0),
(327, '', '01/18/2017', '1:20 pm', 0),
(328, '', '01/18/2017', '2:20 pm', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblapplicant_validate`
--

CREATE TABLE `tblapplicant_validate` (
  `val_appid` int(20) NOT NULL,
  `appid` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `grade` varchar(20) NOT NULL,
  `strandcode` varchar(20) NOT NULL,
  `strand` varchar(100) NOT NULL,
  `remarks` varchar(50) NOT NULL,
  `date_val` varchar(50) NOT NULL,
  `yr` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblapplicant_validate`
--

INSERT INTO `tblapplicant_validate` (`val_appid`, `appid`, `lname`, `fname`, `mname`, `grade`, `strandcode`, `strand`, `remarks`, `date_val`, `yr`) VALUES
(51, '31', 'mercado', 'mark jay', 'lospe', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(52, '36', 'dimapilis', 'jecel', 'dilag', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(53, '32', 'loveria', 'arvic', 'abe', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(54, '33', 'sena', 'hannah jayne', 'mojica', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(55, '34', 'mongoc', 'jomar', 'elegado', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(56, '35', 'dilag', 'aila veronica', 'dilag', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(57, '37', 'ooo', 'ooooo', 'oooo', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/25/2016', '2016'),
(58, '38', 'lolo', 'lolo', 'lolo', 'Grade 11', 'HE', 'Home Economics', 'Validated', '10/25/2016', '2016'),
(59, '39', 'kkk', 'kkkk', 'kkkk', 'Grade 11', 'STEM', 'Sciences_Technolog_ Engineering and Mathematics', 'Validated', '10/25/2016', '2016'),
(60, '40', 'andnsadn', 'knkk', 'kbkbk', 'Grade 11', 'HUMSS', 'Humanities and Social Sciences', 'Validated', '10/25/2016', '2016'),
(61, '41', 'hm', 'hm', 'hm', 'Grade 11', 'HE', 'Home Economics', 'Validated', '10/26/2016', '2016'),
(62, '44', 'hsbjjsj', 'bsuisss', 'Bsjsjsbhj', 'Grade 11', 'ABM', 'Accountancy, Business and Management', 'Validated', '10/26/2016', '2016'),
(63, '43', 'sidocon', 'ramon', 'jr', 'Grade 11', 'HE', 'Home Economics', 'Validated', '10/26/2016', '2016'),
(64, '45', 'lalalaa', 'lilili', 'lololo', 'Grade 11', 'HUMSS', 'Humanities and Social Sciences', 'Validated', '10/27/2016', '2016'),
(65, '42', 'gh', 'khkh', 'bjvj', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/27/2016', '2016'),
(66, '46', 'bolival', 'jeisel', 'cailing', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/27/2016', '2016'),
(67, '48', 'Dilag', 'Aila Veronica', 'Censon', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/27/2016', '2016'),
(68, '49', 'ffdhjy', 'hnfgj', 'ssxsa', 'Grade 11', 'HE', 'Home Economics', 'Validated', '10/27/2016', '2016'),
(69, '47', 'jolina', 'jay', 'digong', 'Grade 11', 'STEM', 'Sciences_Technolog_ Engineering and Mathematics', 'Validated', '10/27/2016', '2016'),
(70, '50', 'Roms', 'Cha', 'Panaligan', 'Grade 11', 'STEM', 'Sciences_Technolog_ Engineering and Mathematics', 'Validated', '10/27/2016', '2016'),
(71, '51', 'garcia', 'heizel', 'mojica', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '10/27/2016', '2016'),
(72, '52', 'bla', 'kkk', 'kkk', 'Grade 11', 'HE', 'Home Economics', 'Validated', '01/17/2017', '2017'),
(73, '55', 'mercado', 'mark jay', 'lospe', 'Grade 11', 'ICT', 'Information and Communications Technology', 'Validated', '01/18/2017', '2017');

-- --------------------------------------------------------

--
-- Table structure for table `tblassignatory`
--

CREATE TABLE `tblassignatory` (
  `id` int(10) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `position` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblassignatory`
--

INSERT INTO `tblassignatory` (`id`, `fname`, `mname`, `lname`, `position`) VALUES
(3, 'Bueno', 'M', 'Arman', 'Guidance Councilor');

-- --------------------------------------------------------

--
-- Table structure for table `tblstrand`
--

CREATE TABLE `tblstrand` (
  `strand_id` int(10) NOT NULL,
  `strandcode` varchar(50) NOT NULL,
  `stranddesc` varchar(50) NOT NULL,
  `duration` int(10) NOT NULL,
  `stranddept` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstrand`
--

INSERT INTO `tblstrand` (`strand_id`, `strandcode`, `stranddesc`, `duration`, `stranddept`) VALUES
(1, 'HE', 'Home Economics', 2, 'HRM'),
(2, 'ICT', 'Information and Communications Technology', 2, 'CSIT'),
(4, 'ABM', 'Accountancy, Business and Management', 2, 'Business Administration'),
(5, 'STEM', 'Sciences_Technolog_ Engineering and Mathematics', 2, 'Education'),
(6, 'HUMSS', 'Humanities and Social Sciences', 2, 'Education'),
(7, 'GA', 'General Academic', 2, 'School of Arts and Sciences');

-- --------------------------------------------------------

--
-- Table structure for table `tblstrand_major`
--

CREATE TABLE `tblstrand_major` (
  `major_id` int(10) NOT NULL,
  `strandcode` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstrand_major`
--

INSERT INTO `tblstrand_major` (`major_id`, `strandcode`, `major`) VALUES
(1, 'GA', 'General Phils'),
(2, 'HE', 'Tour Guiding Services'),
(3, 'HE', 'Bread and Pastry Production'),
(4, 'HE', 'Food and Beverage Services'),
(5, 'ICT', 'Computer Programming'),
(6, 'ICT', 'Animation');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_advised`
--

CREATE TABLE `tblstudent_advised` (
  `advise_id` int(10) NOT NULL,
  `shs_id` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `yr_start` varchar(50) NOT NULL,
  `yr_end` varchar(50) NOT NULL,
  `date_advised` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent_advised`
--

INSERT INTO `tblstudent_advised` (`advise_id`, `shs_id`, `lname`, `fname`, `mname`, `strand`, `major`, `section`, `grade`, `semester`, `yr_start`, `yr_end`, `date_advised`) VALUES
(44, '1601001', 'mercado', 'mark jay', 'lospe', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(45, '1601002', 'loveria', 'arvic', 'abe', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(46, '1601003', 'sena', 'hannah jayne', 'mojica', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(47, '1601004', 'mongoc', 'jomar', 'elegado', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(48, '1601005', 'dilag', 'aila veronica', 'dilag', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(49, '1601006', 'dimapilis', 'jecel', 'dilag', 'ICT', 'Animation', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(50, '1601007', 'ooo', 'ooooo', 'oooo', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/25/2016'),
(51, '1601010', 'hm', 'hm', 'hm', 'HE', 'Tour Guiding Services', '1', 'Grade 11', 'First', '2016', '2017', '10/26/2016'),
(52, '1601009', 'andnsadn', 'knkk', 'kbkbk', 'HUMSS', 'null', '1', 'Grade 11', 'First', '2016', '2017', '10/26/2016'),
(53, '1601012', 'sidocon', 'ramon', 'jr', 'HE', 'Tour Guiding Services', '1', 'Grade 11', 'First', '2016', '2017', '10/27/2016'),
(54, '1601013', 'Dilag', 'Aila Veronica', 'Censon', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/27/2016'),
(55, '1601015', 'Roms', 'Cha', 'Panaligan', 'STEM', 'null', '1', 'Grade 11', 'First', '2016', '2017', '10/27/2016'),
(56, '1601016', 'garcia', 'heizel', 'mojica', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/27/2016'),
(57, '1601001', 'mercado', 'mark jay', 'lospe', 'ICT', 'Computer Programming', '1', 'Grade 11', 'Second', '2016', '2017', '10/27/2016'),
(58, '1601017', 'bla', 'kkk', 'kkk', 'HE', 'Tour Guiding Services', '1', 'Grade 11', 'First', '2017', '2018', '01/17/2017'),
(59, '1601018', 'mercado', 'mark jay', 'lospe', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2017', '2018', '01/18/2017');

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_enrolled`
--

CREATE TABLE `tblstudent_enrolled` (
  `enrolled_id` int(10) NOT NULL,
  `advise_id` varchar(50) NOT NULL,
  `shs_id` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `student_type` varchar(50) NOT NULL,
  `reg_status` varchar(50) NOT NULL,
  `strand` varchar(50) NOT NULL,
  `major` varchar(50) NOT NULL,
  `section` varchar(20) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `semester` varchar(30) NOT NULL,
  `yr_start` varchar(50) NOT NULL,
  `yr_end` varchar(50) NOT NULL,
  `date_enrolled` varchar(50) NOT NULL,
  `stats` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent_enrolled`
--

INSERT INTO `tblstudent_enrolled` (`enrolled_id`, `advise_id`, `shs_id`, `lname`, `fname`, `mname`, `student_type`, `reg_status`, `strand`, `major`, `section`, `grade`, `semester`, `yr_start`, `yr_end`, `date_enrolled`, `stats`) VALUES
(32, '44', '1601001', 'mercado', 'mark jay', 'lospe', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(33, '45', '1601002', 'loveria', 'arvic', 'abe', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(34, '46', '1601003', 'sena', 'hannah jayne', 'mojica', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(35, '47', '1601004', 'mongoc', 'jomar', 'elegado', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(36, '48', '1601005', 'dilag', 'aila veronica', 'dilag', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(37, '49', '1601006', 'dimapilis', 'jecel', 'dilag', 'NEW', 'REGULAR', 'ICT', 'Animation', '1', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(38, '50', '1601007', 'ooo', 'ooooo', 'oooo', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/25/2016', 1),
(39, '51', '1601010', 'hm', 'hm', 'hm', 'NEW', 'REGULAR', 'HE', 'Tour Guiding Services', '1', 'Grade 11', 'First', '2016', '2017', '10/26/2016', 1),
(40, '52', '1601009', 'andnsadn', 'knkk', 'kbkbk', 'NEW', 'REGULAR', 'HUMSS', 'null', '1', 'Grade 11', 'First', '2016', '2017', '10/26/2016', 1),
(41, '54', '1601013', 'Dilag', 'Aila Veronica', 'Censon', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/27/2016', 1),
(42, '56', '1601016', 'garcia', 'heizel', 'mojica', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/27/2016', 1),
(43, '56', '1601016', 'garcia', 'heizel', 'mojica', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '2', 'Grade 11', 'First', '2016', '2017', '10/27/2016', 1),
(44, '59', '1601018', 'mercado', 'mark jay', 'lospe', 'NEW', 'REGULAR', 'ICT', 'Computer Programming', '1', 'Grade 11', 'First', '2017', '2018', '01/18/2017', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_info`
--

CREATE TABLE `tblstudent_info` (
  `appid` int(10) NOT NULL,
  `req_stats` varchar(50) NOT NULL,
  `shs_id` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `bday` varchar(30) NOT NULL,
  `age` int(10) NOT NULL,
  `street` varchar(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `province` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL,
  `school` varchar(100) NOT NULL,
  `guardian` varchar(50) NOT NULL,
  `gcontact` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent_register`
--

CREATE TABLE `tblstudent_register` (
  `regid` int(20) NOT NULL,
  `shs_id` int(30) NOT NULL,
  `appid` varchar(30) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `date` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudent_register`
--

INSERT INTO `tblstudent_register` (`regid`, `shs_id`, `appid`, `lname`, `fname`, `mname`, `date`) VALUES
(37, 1601001, '31', 'mercado', 'mark jay', 'lospe', '10/25/2016'),
(38, 1601002, '32', 'loveria', 'arvic', 'abe', '10/25/2016'),
(39, 1601003, '33', 'sena', 'hannah jayne', 'mojica', '10/25/2016'),
(40, 1601004, '34', 'mongoc', 'jomar', 'elegado', '10/25/2016'),
(41, 1601005, '35', 'dilag', 'aila veronica', 'dilag', '10/25/2016'),
(42, 1601006, '36', 'dimapilis', 'jecel', 'dilag', '10/25/2016'),
(43, 1601007, '37', 'ooo', 'ooooo', 'oooo', '10/25/2016'),
(44, 1601008, '38', 'lolo', 'lolo', 'lolo', '10/25/2016'),
(45, 1601009, '40', 'andnsadn', 'knkk', 'kbkbk', '10/25/2016'),
(46, 1601010, '41', 'hm', 'hm', 'hm', '10/26/2016'),
(47, 1601011, '44', 'hsbjjsj', 'bsuisss', 'Bsjsjsbhj', '10/26/2016'),
(48, 1601012, '43', 'sidocon', 'ramon', 'jr', '10/26/2016'),
(49, 1601013, '48', 'Dilag', 'Aila Veronica', 'Censon', '10/27/2016'),
(50, 1601014, '49', 'ffdhjy', 'hnfgj', 'ssxsa', '10/27/2016'),
(51, 1601015, '50', 'Roms', 'Cha', 'Panaligan', '10/27/2016'),
(52, 1601016, '51', 'garcia', 'heizel', 'mojica', '10/27/2016'),
(53, 1601017, '52', 'bla', 'kkk', 'kkk', '01/17/2017'),
(54, 1601018, '55', 'mercado', 'mark jay', 'lospe', '01/18/2017');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject`
--

CREATE TABLE `tblsubject` (
  `sub_id` int(10) NOT NULL,
  `subdesc` longtext NOT NULL,
  `subhours` varchar(10) NOT NULL,
  `strandcode` varchar(50) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `grade` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject`
--

INSERT INTO `tblsubject` (`sub_id`, `subdesc`, `subhours`, `strandcode`, `semester`, `grade`) VALUES
(1, 'GA 2', '80', 'GA', 'First', 'Grade 11'),
(2, 'Oral Communication', '80', 'STEM', 'First', 'Grade 11'),
(3, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 'STEM', 'First', 'Grade 11'),
(4, 'General Mathematics', '80', 'STEM', 'First', 'Grade 11'),
(5, 'Physical Education and Health 1', '80', 'STEM', 'First', 'Grade 11'),
(6, 'Values Education 1', '80', 'STEM', 'First', 'Grade 11'),
(7, 'English for Academic and Professional Purposes', '80', 'STEM', 'First', 'Grade 11'),
(8, 'Pagsusulat sa Filipino sa Piling Larawan Akademiko', '80', 'STEM', 'First', 'Grade 11'),
(9, 'General Biology', '80', 'STEM', 'First', 'Grade 11'),
(10, 'Pre-Calculus', '80', 'STEM', 'First', 'Grade 11'),
(11, 'Reading and Writing', '80', 'STEM', 'Second', 'Grade 11'),
(12, 'Pagbasa at Pagsusuri ng Ibat-ibang TekstoTungkol sa Pananaliksik', '80', 'STEM', 'Second', 'Grade 11'),
(13, 'Statistics and Probability', '80', 'STEM', 'Second', 'Grade 11'),
(14, 'Earth Science', '80', 'STEM', 'Second', 'Grade 11'),
(15, 'Physical Education and Health 2', '80', 'STEM', 'Second', 'Grade 11'),
(16, 'Values Education 2', '80', 'STEM', 'Second', 'Grade 11'),
(17, 'Empowerment Technology(E-Tracks) ICT for Professional Tracks', '80', 'STEM', 'Second', 'Grade 11'),
(18, 'Research in Daily Life', '80', 'STEM', 'Second', 'Grade 11'),
(19, 'Basic Calculus', '80', 'STEM', 'Second', 'Grade 11'),
(20, 'General Chemistry 1', '80', 'STEM', 'Second', 'Grade 11'),
(21, 'Introduction to the Philosophy of the Human Person', '80', 'STEM', 'First', 'Grade 12'),
(22, 'Contemporary Philippine Arts from the Regions', '80', 'STEM', 'First', 'Grade 12'),
(23, 'Media and Information Leteracy', '80', 'STEM', 'First', 'Grade 12'),
(24, 'Personal Development', '80', 'STEM', 'First', 'Grade 12'),
(25, 'Disaster Readiness and Risk Reduction', '80', 'STEM', 'First', 'Grade 12'),
(26, 'Physical Education and Health 3', '80', 'STEM', 'First', 'Grade 12'),
(27, 'Values Education 3', '80', 'STEM', 'First', 'Grade 12'),
(28, 'Research in Daily Life 2', '80', 'STEM', 'First', 'Grade 12'),
(29, 'General Physics 1', '80', 'STEM', 'First', 'Grade 12'),
(30, 'General Chemistry 2', '80', 'STEM', 'First', 'Grade 12'),
(31, 'Physical Science', '80', 'STEM', 'Second', 'Grade 12'),
(32, '2First Century Literature from the Philippines and the World', '80', 'STEM', 'Second', 'Grade 12'),
(33, 'Physical Education and Health 3', '80', 'STEM', 'Second', 'Grade 12'),
(34, 'Values Education 4', '80', 'STEM', 'Second', 'Grade 12'),
(35, 'Entrepreneurship', '80', 'STEM', 'Second', 'Grade 12'),
(36, 'Research Project', '80', 'STEM', 'Second', 'Grade 12'),
(37, 'General Physics 2', '80', 'STEM', 'Second', 'Grade 12'),
(38, 'General Biology 2', '80', 'STEM', 'Second', 'Grade 12'),
(39, 'Research/Capstone Project', '80', 'STEM', 'Second', 'Grade 12'),
(40, 'Oral Communication in Context', '80', 'HUMSS', 'First', 'Grade 11'),
(41, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 'HUMSS', 'First', 'Grade 12'),
(42, 'General Mathematics', '80', 'HUMSS', 'First', 'Grade 11'),
(43, 'Understanding Cultures Society and Politics', '80', 'HUMSS', 'First', 'Grade 11'),
(44, 'Physical Education and Health 1', '80', 'HUMSS', 'First', 'Grade 11'),
(45, 'Values Education 1', '80', 'HUMSS', 'First', 'Grade 11'),
(46, 'English for Academic and Professional Purposes', '80', 'HUMSS', 'First', 'Grade 11'),
(47, 'Filipino sa Piling Larangan', '80', 'HUMSS', 'First', 'Grade 11'),
(48, 'Discipline and Ideas in the Social Science', '80', 'HUMSS', 'First', 'Grade 11'),
(49, 'Reading and Writing Skills', '80', 'HUMSS', 'Second', 'Grade 11'),
(50, '2First Century Literature from the Philippines and the World', '80', 'HUMSS', 'Second', 'Grade 11'),
(51, 'Statistics and Probability', '80', 'HUMSS', 'Second', 'Grade 11'),
(52, 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pananaliksik', '80', 'HUMSS', 'Second', 'Grade 11'),
(53, 'Earth and Life Science', '80', 'HUMSS', 'Second', 'Grade 11'),
(54, 'Physical Education ad Health 2', '80', 'HUMSS', 'Second', 'Grade 11'),
(55, 'Values Education 2', '80', 'HUMSS', 'Second', 'Grade 11'),
(56, 'Empowerment Technologies (E-Tracks) ICT for Professional Tracks', '80', 'HUMSS', 'Second', 'Grade 11'),
(57, 'Research in Daily Life 1', '80', 'HUMSS', 'Second', 'Grade 11'),
(58, 'Introduction to World Religion and Belief System', '80', 'HUMSS', 'Second', 'Grade 11'),
(59, 'Contemporary Philippine Arts from the Regions', '80', 'HUMSS', 'First', 'Grade 12'),
(60, 'Media and Information Literacy', '80', 'HUMSS', 'First', 'Grade 12'),
(61, 'Introduction to the Philosophy of Human Person', '80', 'HUMSS', 'First', 'Grade 12'),
(62, 'Understanding Cultures Society and Politics', '80', 'HUMSS', 'First', 'Grade 12'),
(63, 'Physical Education and Health 3', '80', 'HUMSS', 'First', 'Grade 12'),
(64, 'Values Education 3', '80', 'HUMSS', 'First', 'Grade 12'),
(65, 'Research in daily Life 2', '80', 'HUMSS', 'First', 'Grade 12'),
(66, 'Philippine Politics and Governance', '80', 'HUMSS', 'First', 'Grade 12'),
(67, 'Creative Non-fiction: The Literacy Essay', '80', 'HUMSS', 'First', 'Grade 12'),
(68, 'Personal Development', '80', 'HUMSS', 'Second', 'Grade 12'),
(69, 'Physical Science', '80', 'HUMSS', 'Second', 'Grade 12'),
(70, 'Physical Education and Health 4', '80', 'HUMSS', 'Second', 'Grade 12'),
(71, 'Values Education 4', '80', 'HUMSS', 'Second', 'Grade 12'),
(72, 'Entrepreneurship', '80', 'HUMSS', 'Second', 'Grade 12'),
(73, 'Research Project', '80', 'HUMSS', 'Second', 'Grade 12'),
(74, 'Trends, Network and Critical Thinking in the 2First Century Culture', '80', 'HUMSS', 'Second', 'Grade 12'),
(75, 'Community Engagement Solidarity and Citizenship', '80', 'HUMSS', 'Second', 'Grade 12'),
(76, 'Culminating Activity', '80', 'HUMSS', 'Second', 'Grade 12'),
(77, 'Oral Communication in Context', '80', 'ICT', 'First', 'Grade 11'),
(78, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 'ICT', 'First', 'Grade 11'),
(79, 'General Mathematics', '80', 'ICT', 'First', 'Grade 11'),
(80, 'Physical Education and Health 1', '80', 'ICT', 'First', 'Grade 11'),
(81, 'Values Education 1', '80', 'ICT', 'First', 'Grade 11'),
(82, 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 'ICT', 'First', 'Grade 11'),
(83, 'English for Academic and Professional Purposes', '80', 'ICT', 'First', 'Grade 11'),
(84, 'Pagsusulat sa Filipino sa Piling Larangan', '80', 'ICT', 'First', 'Grade 11'),
(85, 'Computer Programming/Animation', '80', 'ICT', 'First', 'Grade 11'),
(86, 'Reading and Writing Skills', '80', 'ICT', 'Second', 'Grade 11'),
(87, 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pananaliksik', '80', 'ICT', 'Second', 'Grade 11'),
(88, '2First Century Literature from the Philippines and the World', '80', 'ICT', 'Second', 'Grade 11'),
(89, 'Statistics and Probability', '80', 'ICT', 'Second', 'Grade 11'),
(90, 'Understanding Cultures Society and Politics', '80', 'ICT', 'Second', 'Grade 11'),
(91, 'Physical Education and Health 2', '80', 'ICT', 'Second', 'Grade 11'),
(92, 'Values Education 2', '80', 'ICT', 'Second', 'Grade 11'),
(93, 'Practical REsearch 2', '80', 'ICT', 'Second', 'Grade 11'),
(94, 'Computer Programming/Animation', '80', 'ICT', 'Second', 'Grade 11'),
(95, 'Earth and Life Science', '80', 'ICT', 'First', 'Grade 12'),
(96, 'Introduction to the Philosophy of Human Person', '80', 'ICT', 'Second', 'Grade 12'),
(97, 'Understanding Cultures Society and Politic', '80', 'ICT', 'First', 'Grade 12'),
(98, 'Physical Education and Health 3', '80', 'ICT', 'First', 'Grade 12'),
(99, 'Values Education 3', '80', 'ICT', 'First', 'Grade 12'),
(100, 'Practical Research 2', '80', 'ICT', 'First', 'Grade 12'),
(101, 'Physical Science', '80', 'ICT', 'Second', 'Grade 12'),
(102, 'Inquiries, Investigation and Immersion', '80', 'ICT', 'Second', 'Grade 12'),
(103, 'Disaster Readiness and Risk Reduction', '80', 'ICT', 'Second', 'Grade 12'),
(104, 'Physical Education and Health 4', '80', 'ICT', 'Second', 'Grade 12'),
(105, 'Values Education 3', '80', 'ICT', 'Second', 'Grade 12'),
(106, 'Entrepreneurship', '80', 'ICT', 'Second', 'Grade 12'),
(107, 'Work Immersion', '80', 'ICT', 'Second', 'Grade 12'),
(108, 'Research', '80', 'ICT', 'Second', 'Grade 12'),
(109, 'Culminating Activity', '80', 'ICT', 'Second', 'Grade 12'),
(110, 'Oral Communication in Context', '80', 'HE', 'First', 'Grade 11'),
(111, 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 'HE', 'First', 'Grade 11'),
(112, 'General Mathematics', '80', 'HE', 'First', 'Grade 11'),
(113, 'Personal Development', '80', 'HE', 'First', 'Grade 11'),
(114, 'Physical Education and Health 1', '80', 'HE', 'First', 'Grade 11'),
(115, 'Values Education 1', '80', 'HE', 'First', 'Grade 11'),
(116, 'English for Academic and Professional Purposes', '80', 'HE', 'First', 'Grade 11'),
(117, 'Pagsusulat sa Filipino sa Piling Larawan', '80', 'HE', 'First', 'Grade 11'),
(118, 'Bread and Pastry Production / Tour Guiding Services', '80', 'HE', 'First', 'Grade 11'),
(119, 'Reading and Writing Skills', '80', 'HE', 'Second', 'Grade 11'),
(120, '2First Century Literature from the Philippines and the World', '80', 'HE', 'Second', 'Grade 11'),
(121, 'Statistics and Probability', '80', 'HE', 'Second', 'Grade 11'),
(122, 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pnanaliksik', '80', 'HE', 'Second', 'Grade 11'),
(123, 'Earth and Life Science', '80', 'HE', 'Second', 'Grade 11'),
(124, 'Physical Education and Health 2', '80', 'HE', 'Second', 'Grade 11'),
(125, 'Values Education 2', '80', 'HE', 'Second', 'Grade 11'),
(126, 'Empowerment Technologies (E-Tracks) ICT for Professional Tracks', '80', 'HE', 'Second', 'Grade 11'),
(127, 'Practical Research 1', '80', 'HE', 'Second', 'Grade 11'),
(128, 'Bread and Pastry Production / Tour Guiding Services', '80', 'HE', 'Second', 'Grade 11'),
(129, '2First Century Literature from the Philippines and World', '80', 'HE', 'First', 'Grade 12'),
(130, 'Media and Information Literacy', '80', 'HE', 'First', 'Grade 12'),
(131, 'Understanding Cultures Society and Politics', '80', 'HE', 'First', 'Grade 12'),
(132, 'Physical Education and Health 3', '80', 'HE', 'First', 'Grade 12'),
(133, 'Values Education 3', '80', 'HE', 'First', 'Grade 12'),
(134, 'Practical Research 2', '80', 'HE', 'First', 'Grade 12'),
(135, 'Bread and Pastry Production / Tour Guiding Services', '80', 'HE', 'First', 'Grade 12'),
(136, 'Personal Development', '80', 'HE', 'Second', 'Grade 12'),
(137, 'Physical Science', '80', 'HE', 'Second', 'Grade 12'),
(138, 'Physical Education and Health 4', '80', 'HE', 'Second', 'Grade 12'),
(139, 'Values Education 4', '80', 'HE', 'Second', 'Grade 12'),
(140, 'Entrepreneurship', '80', 'HE', 'Second', 'Grade 12'),
(141, 'Research Project', '80', 'HE', 'Second', 'Grade 12'),
(142, 'Culminating Activity', '80', 'HE', 'Second', 'Grade 12'),
(143, 'Bread and Pastry Production / Tour Guiding Services', '80', 'HE', 'Second', 'Grade 12'),
(144, 'General Academic I', '80', 'GA', 'First', 'Grade 11'),
(145, 'hhh', '80', 'GA', 'Second', 'Grade 11');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubject_enrolled`
--

CREATE TABLE `tblsubject_enrolled` (
  `id` int(10) NOT NULL,
  `advise_id` int(10) NOT NULL,
  `shs_id` varchar(30) NOT NULL,
  `subdesc` longtext NOT NULL,
  `hours` varchar(50) NOT NULL,
  `grades` int(20) DEFAULT NULL,
  `csection` varchar(50) NOT NULL,
  `fac_id` int(10) NOT NULL,
  `remarks` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubject_enrolled`
--

INSERT INTO `tblsubject_enrolled` (`id`, `advise_id`, `shs_id`, `subdesc`, `hours`, `grades`, `csection`, `fac_id`, `remarks`) VALUES
(431, 44, '1601001', 'Oral Communication in Context', '80', 88, '1', 7, 'passed'),
(432, 44, '1601001', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 88, '1', 7, 'passed'),
(433, 44, '1601001', 'General Mathematics', '80', 74, '1', 10, 'failed'),
(434, 44, '1601001', 'Physical Education and Health 1', '80', 88, '1', 15, 'passed'),
(435, 44, '1601001', 'Values Education 1', '80', 74, '1', 14, 'failed'),
(436, 44, '1601001', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 88, '1', 14, 'passed'),
(437, 44, '1601001', 'English for Academic and Professional Purposes', '80', 86, '1', 14, 'passed'),
(438, 44, '1601001', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 33, '1', 10, 'failed'),
(439, 44, '1601001', 'Computer Programming/Animation', '80', 77, '1', 11, 'passed'),
(440, 45, '1601002', 'Oral Communication in Context', '80', 87, '1', 7, 'passed'),
(441, 45, '1601002', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 77, '1', 7, 'passed'),
(442, 45, '1601002', 'General Mathematics', '80', 88, '1', 10, 'passed'),
(443, 45, '1601002', 'Physical Education and Health 1', '80', 78, '1', 15, 'passed'),
(444, 45, '1601002', 'Values Education 1', '80', 77, '1', 14, 'passed'),
(445, 45, '1601002', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 88, '1', 14, 'passed'),
(446, 45, '1601002', 'English for Academic and Professional Purposes', '80', 86, '1', 14, 'passed'),
(447, 45, '1601002', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 77, '1', 10, 'passed'),
(448, 45, '1601002', 'Computer Programming/Animation', '80', 80, '1', 11, 'passed'),
(449, 46, '1601003', 'Oral Communication in Context', '80', 89, '1', 7, 'passed'),
(450, 46, '1601003', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 88, '1', 7, 'passed'),
(451, 46, '1601003', 'General Mathematics', '80', 98, '1', 10, 'passed'),
(452, 46, '1601003', 'Physical Education and Health 1', '80', 77, '1', 15, 'passed'),
(453, 46, '1601003', 'Values Education 1', '80', 77, '1', 14, 'passed'),
(454, 46, '1601003', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 88, '1', 14, 'passed'),
(455, 46, '1601003', 'English for Academic and Professional Purposes', '80', 86, '1', 14, 'passed'),
(456, 46, '1601003', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 99, '1', 10, 'passed'),
(457, 46, '1601003', 'Computer Programming/Animation', '80', 90, '1', 11, 'passed'),
(458, 47, '1601004', 'Oral Communication in Context', '80', 77, '1', 7, 'passed'),
(459, 47, '1601004', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 99, '1', 7, 'passed'),
(460, 47, '1601004', 'General Mathematics', '80', 78, '1', 10, 'passed'),
(461, 47, '1601004', 'Physical Education and Health 1', '80', 88, '1', 15, 'passed'),
(462, 47, '1601004', 'Values Education 1', '80', 77, '1', 14, 'passed'),
(463, 47, '1601004', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 88, '1', 14, 'passed'),
(464, 47, '1601004', 'English for Academic and Professional Purposes', '80', 86, '1', 14, 'passed'),
(465, 47, '1601004', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 87, '1', 10, 'passed'),
(466, 47, '1601004', 'Computer Programming/Animation', '80', 80, '1', 11, 'passed'),
(467, 48, '1601005', 'Oral Communication in Context', '80', 73, '1', 7, 'failed'),
(468, 48, '1601005', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 73, '1', 7, 'failed'),
(469, 48, '1601005', 'General Mathematics', '80', 88, '1', 10, 'passed'),
(470, 48, '1601005', 'Physical Education and Health 1', '80', 87, '1', 15, 'passed'),
(471, 48, '1601005', 'Values Education 1', '80', 77, '1', 14, 'passed'),
(472, 48, '1601005', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 98, '1', 14, 'passed'),
(473, 48, '1601005', 'English for Academic and Professional Purposes', '80', 86, '1', 14, 'passed'),
(474, 48, '1601005', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 85, '1', 10, 'passed'),
(475, 48, '1601005', 'Computer Programming/Animation', '80', 90, '1', 11, 'passed'),
(476, 49, '1601006', 'Oral Communication in Context', '80', 0, '1', 0, ''),
(477, 49, '1601006', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(478, 49, '1601006', 'General Mathematics', '80', 85, '1', 16, 'passed'),
(479, 49, '1601006', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(480, 49, '1601006', 'Values Education 1', '80', 0, '1', 0, ''),
(481, 49, '1601006', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 0, '1', 0, ''),
(482, 49, '1601006', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(483, 49, '1601006', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 0, '1', 11, ''),
(484, 49, '1601006', 'Computer Programming/Animation', '80', 0, '1', 0, ''),
(485, 50, '1601007', 'Oral Communication in Context', '80', 87, '2', 16, 'passed'),
(486, 50, '1601007', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 77, '2', 16, 'passed'),
(487, 50, '1601007', 'General Mathematics', '80', 89, '2', 12, 'passed'),
(488, 50, '1601007', 'Physical Education and Health 1', '80', 0, '2', 16, ''),
(489, 50, '1601007', 'Values Education 1', '80', 0, '2', 0, ''),
(490, 50, '1601007', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 0, '2', 16, ''),
(491, 50, '1601007', 'English for Academic and Professional Purposes', '80', 0, '2', 0, ''),
(492, 50, '1601007', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 0, '2', 0, ''),
(493, 50, '1601007', 'Computer Programming/Animation', '80', 0, '2', 0, ''),
(494, 51, '1601010', 'Oral Communication in Context', '80', 0, '1', 0, ''),
(495, 51, '1601010', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(496, 51, '1601010', 'General Mathematics', '80', 0, '1', 0, ''),
(497, 51, '1601010', 'Personal Development', '80', 0, '1', 0, ''),
(498, 51, '1601010', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(499, 51, '1601010', 'Values Education 1', '80', 0, '1', 0, ''),
(500, 51, '1601010', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(501, 51, '1601010', 'Pagsusulat sa Filipino sa Piling Larawan', '80', 0, '1', 0, ''),
(502, 51, '1601010', 'Bread and Pastry Production / Tour Guiding Services', '80', 0, '1', 0, ''),
(503, 52, '1601009', 'Oral Communication in Context', '80', 34, '1', 7, 'failed'),
(504, 52, '1601009', 'General Mathematics', '80', 90, '1', 12, 'passed'),
(505, 52, '1601009', 'Understanding Cultures Society and Politics', '80', 88, '1', 17, 'passed'),
(506, 52, '1601009', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(507, 52, '1601009', 'Values Education 1', '80', 0, '1', 0, ''),
(508, 52, '1601009', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(509, 52, '1601009', 'Filipino sa Piling Larangan', '80', 0, '1', 0, ''),
(510, 52, '1601009', 'Discipline and Ideas in the Social Science', '80', 0, '1', 0, ''),
(511, 53, '1601012', 'Oral Communication in Context', '80', 0, '1', 0, ''),
(512, 53, '1601012', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(513, 53, '1601012', 'General Mathematics', '80', 0, '1', 0, ''),
(514, 53, '1601012', 'Personal Development', '80', 0, '1', 0, ''),
(515, 53, '1601012', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(516, 53, '1601012', 'Values Education 1', '80', 0, '1', 0, ''),
(517, 53, '1601012', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(518, 53, '1601012', 'Pagsusulat sa Filipino sa Piling Larawan', '80', 0, '1', 0, ''),
(519, 53, '1601012', 'Bread and Pastry Production / Tour Guiding Services', '80', 0, '1', 0, ''),
(520, 54, '1601013', 'Oral Communication in Context', '80', 75, '2', 16, 'passed'),
(521, 54, '1601013', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 66, '2', 16, 'failed'),
(522, 54, '1601013', 'General Mathematics', '80', 0, '2', 12, ''),
(523, 54, '1601013', 'Physical Education and Health 1', '80', 0, '2', 16, ''),
(524, 54, '1601013', 'Values Education 1', '80', 0, '2', 0, ''),
(525, 54, '1601013', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 0, '2', 16, ''),
(526, 54, '1601013', 'English for Academic and Professional Purposes', '80', 0, '2', 0, ''),
(527, 54, '1601013', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 0, '2', 0, ''),
(528, 54, '1601013', 'Computer Programming/Animation', '80', 0, '2', 0, ''),
(529, 55, '1601015', 'Oral Communication', '80', 0, '1', 0, ''),
(530, 55, '1601015', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(531, 55, '1601015', 'General Mathematics', '80', 0, '1', 0, ''),
(532, 55, '1601015', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(533, 55, '1601015', 'Values Education 1', '80', 0, '1', 0, ''),
(534, 55, '1601015', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(535, 55, '1601015', 'Pagsusulat sa Filipino sa Piling Larawan Akademiko', '80', 0, '1', 0, ''),
(536, 55, '1601015', 'General Biology', '80', 0, '1', 0, ''),
(537, 55, '1601015', 'Pre-Calculus', '80', 0, '1', 0, ''),
(538, 56, '1601016', 'Oral Communication in Context', '80', 0, '2', 0, ''),
(539, 56, '1601016', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '2', 0, ''),
(540, 56, '1601016', 'General Mathematics', '80', 0, '2', 0, ''),
(541, 56, '1601016', 'Physical Education and Health 1', '80', 0, '2', 0, ''),
(542, 56, '1601016', 'Values Education 1', '80', 0, '2', 0, ''),
(543, 56, '1601016', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 0, '2', 0, ''),
(544, 56, '1601016', 'English for Academic and Professional Purposes', '80', 0, '2', 0, ''),
(545, 56, '1601016', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 0, '2', 0, ''),
(546, 56, '1601016', 'Computer Programming/Animation', '80', 0, '2', 0, ''),
(547, 57, '1601001', 'Reading and Writing Skills', '80', 0, '1', 0, ''),
(548, 57, '1601001', 'Pagbasa at Pagsusuri ng Ibat-ibang Teksto Tungo sa Pananaliksik', '80', 0, '1', 0, ''),
(549, 57, '1601001', '2First Century Literature from the Philippines and the World', '80', 0, '1', 0, ''),
(550, 57, '1601001', 'Statistics and Probability', '80', 0, '1', 0, ''),
(551, 57, '1601001', 'Understanding Cultures Society and Politics', '80', 0, '1', 0, ''),
(552, 57, '1601001', 'Physical Education and Health 2', '80', 0, '1', 0, ''),
(553, 57, '1601001', 'Values Education 2', '80', 0, '1', 0, ''),
(554, 57, '1601001', 'Practical REsearch 2', '80', 0, '1', 0, ''),
(555, 57, '1601001', 'Computer Programming/Animation', '80', 0, '1', 0, ''),
(556, 58, '1601017', 'Oral Communication in Context', '80', 0, '1', 0, ''),
(557, 58, '1601017', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(558, 58, '1601017', 'General Mathematics', '80', 0, '1', 0, ''),
(559, 58, '1601017', 'Personal Development', '80', 0, '1', 0, ''),
(560, 58, '1601017', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(561, 58, '1601017', 'Values Education 1', '80', 0, '1', 0, ''),
(562, 58, '1601017', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(563, 58, '1601017', 'Pagsusulat sa Filipino sa Piling Larawan', '80', 0, '1', 0, ''),
(564, 58, '1601017', 'Bread and Pastry Production / Tour Guiding Services', '80', 0, '1', 0, ''),
(565, 59, '1601018', 'Oral Communication in Context', '80', 0, '1', 0, ''),
(566, 59, '1601018', 'Komunikasyon at Pananaliksik sa Wika at Kulturang Filipino', '80', 0, '1', 0, ''),
(567, 59, '1601018', 'General Mathematics', '80', 0, '1', 0, ''),
(568, 59, '1601018', 'Physical Education and Health 1', '80', 0, '1', 0, ''),
(569, 59, '1601018', 'Values Education 1', '80', 0, '1', 0, ''),
(570, 59, '1601018', 'Empowerment Technology (E-Tracks) ICT for Professional Tracks', '80', 0, '1', 0, ''),
(571, 59, '1601018', 'English for Academic and Professional Purposes', '80', 0, '1', 0, ''),
(572, 59, '1601018', 'Pagsusulat sa Filipino sa Piling Larangan', '80', 0, '1', 0, ''),
(573, 59, '1601018', 'Computer Programming/Animation', '80', 0, '1', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE `users_tbl` (
  `u_id` int(10) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(30) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_tbl`
--

INSERT INTO `users_tbl` (`u_id`, `fname`, `lname`, `username`, `password`, `type`) VALUES
(3, 'Heizel', 'Garcia', 'registrar', '1234', 'Registrar'),
(4, 'Mercado', 'Mercado', 'admin', 'admin', 'Admin'),
(6, 'mark jay', 'Mercado', 'coordinator', '1234', 'Coordinator'),
(7, 'Markjay', 'Mercado', 'mercado', '1234', 'Faculty'),
(10, 'Mongoc', 'Jomar', 'mongoc', '1234', 'Faculty'),
(11, 'Dilag', 'Aila Veronica', 'aila', '1234', 'Faculty'),
(12, 'Dimapilis', 'Jecel', 'jecel', '1234', 'Faculty'),
(13, 'Bueno', 'Arman', 'arman', '1234', 'Faculty'),
(14, 'Guanezo', 'Leo', 'leo', '1234', 'Faculty'),
(15, 'Isla', 'Jandelle', 'isla', '1234', 'Faculty'),
(16, 'hannah', 'sena', 'hannah', '1234', 'Faculty'),
(17, 'Sharon', 'Erolin', 'sharon', '1234', 'Faculty'),
(18, 'Bueno', 'Arman', 'guidance', '1234', 'Guidance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblapplicant`
--
ALTER TABLE `tblapplicant`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `tblapplicant_info`
--
ALTER TABLE `tblapplicant_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblapplicant_schedule`
--
ALTER TABLE `tblapplicant_schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tblapplicant_validate`
--
ALTER TABLE `tblapplicant_validate`
  ADD PRIMARY KEY (`val_appid`);

--
-- Indexes for table `tblassignatory`
--
ALTER TABLE `tblassignatory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstrand`
--
ALTER TABLE `tblstrand`
  ADD PRIMARY KEY (`strand_id`);

--
-- Indexes for table `tblstrand_major`
--
ALTER TABLE `tblstrand_major`
  ADD PRIMARY KEY (`major_id`);

--
-- Indexes for table `tblstudent_advised`
--
ALTER TABLE `tblstudent_advised`
  ADD PRIMARY KEY (`advise_id`);

--
-- Indexes for table `tblstudent_enrolled`
--
ALTER TABLE `tblstudent_enrolled`
  ADD PRIMARY KEY (`enrolled_id`);

--
-- Indexes for table `tblstudent_info`
--
ALTER TABLE `tblstudent_info`
  ADD PRIMARY KEY (`appid`);

--
-- Indexes for table `tblstudent_register`
--
ALTER TABLE `tblstudent_register`
  ADD PRIMARY KEY (`regid`);

--
-- Indexes for table `tblsubject`
--
ALTER TABLE `tblsubject`
  ADD PRIMARY KEY (`sub_id`);

--
-- Indexes for table `tblsubject_enrolled`
--
ALTER TABLE `tblsubject_enrolled`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_tbl`
--
ALTER TABLE `users_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblapplicant`
--
ALTER TABLE `tblapplicant`
  MODIFY `appid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tblapplicant_info`
--
ALTER TABLE `tblapplicant_info`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblapplicant_schedule`
--
ALTER TABLE `tblapplicant_schedule`
  MODIFY `schedule_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=329;
--
-- AUTO_INCREMENT for table `tblapplicant_validate`
--
ALTER TABLE `tblapplicant_validate`
  MODIFY `val_appid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `tblassignatory`
--
ALTER TABLE `tblassignatory`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tblstrand`
--
ALTER TABLE `tblstrand`
  MODIFY `strand_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblstrand_major`
--
ALTER TABLE `tblstrand_major`
  MODIFY `major_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblstudent_advised`
--
ALTER TABLE `tblstudent_advised`
  MODIFY `advise_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;
--
-- AUTO_INCREMENT for table `tblstudent_enrolled`
--
ALTER TABLE `tblstudent_enrolled`
  MODIFY `enrolled_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tblstudent_info`
--
ALTER TABLE `tblstudent_info`
  MODIFY `appid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tblstudent_register`
--
ALTER TABLE `tblstudent_register`
  MODIFY `regid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `tblsubject`
--
ALTER TABLE `tblsubject`
  MODIFY `sub_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;
--
-- AUTO_INCREMENT for table `tblsubject_enrolled`
--
ALTER TABLE `tblsubject_enrolled`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=574;
--
-- AUTO_INCREMENT for table `users_tbl`
--
ALTER TABLE `users_tbl`
  MODIFY `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
