-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2022 at 12:27 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `studentlink`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `details` text NOT NULL,
  `img` text NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `college_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `prefix` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`college_id`, `name`, `prefix`) VALUES
(1, 'Metropolitan College', 'MET'),
(2, 'College of Engineering', 'COE');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` varchar(20) NOT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `course_name` varchar(100) DEFAULT NULL,
  `course_details` varchar(300) DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `college_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `instructor_id`, `course_name`, `course_details`, `department_id`, `college_id`) VALUES
('430', 1, 'Design and Analysis of Algorithms', 'Learn Algorithms and their design and analysis as to their efficiency', 1, 0),
('cs520', 2, '602', 'asd', 1, 2),
('cs521', 3, '602', 'asd', 1, 0),
('EACN 332C', 5, 'Analog Communication', 'Learn about signals, their modulation techniques and noise', 1, 2),
('EAES 332C', 43, 'Analog Electronics', 'Learn about the components required to build an analog circuit', 1, 2),
('EAWP 532C', 35, 'Antenna and Wave Propagation', 'Learn Antenna theory and behaviour of waves', 1, 0),
('EBEE 330C', 17, 'Basic Electrical Engineering', 'Learn about the components of a AC or DC circuit', 1, 0),
('ECAS 130C', 10, 'Circuit Analysis And Synthesis', 'Learn fundamentals of circuit theory', 1, 0),
('ECAS 230C', 10, 'Circuit Analysis And Synthesis', 'Learn fundamentals of circuit theory', 1, 0),
('ECNW 532C', 39, 'Computer Networks', 'Learn about Computer Networks', 1, 0),
('ECSY 532C', 45, 'Control Systems', 'Introduction to Control Systems', 1, 0),
('EDCN 532C', 46, 'Digital Communication', 'Learn about Digital Signals and their modulation techniques', 1, 0),
('EDES 232C', 14, 'Digital Electronics', 'Introduction to components and logical design of a Electronic Circuit', 1, 0),
('EDLE 232C', 5, 'Digital Electronics', 'Learn concepts of Digital Electronics', 1, 0),
('EDSP 632C', 43, 'Digital Signal Processing', 'Learn basic concepts of processing a digital signal', 1, 0),
('EEDC 132C', 17, 'Electronic Devices And Circuits', 'Learn basic concepts of electronics like diode, transistor, oscillator, op amp etc.', 1, 0),
('EEDC 232C', 17, 'Electronic Devices And Circuits', 'Learn basic concepts of electronics like diode, transistor, oscillator, op amp etc.', 1, 0),
('EEFW 330C', 36, 'Electromagnetic Fields and Waves', 'Learn about Electrostatics, Magnetostatics and application of waves', 1, 0),
('EEMI 432C', 35, 'Electronics Measurement and Instrumentation', 'Learn about Instruments needed for measurements', 1, 0),
('EESD 732C', 17, 'Embedded System Design', 'Learn to design an embedded system', 1, 0),
('EGPJ 604P', 35, 'Group Project', 'Group Project', 1, 0),
('EGPJ 706P', 34, 'Group Project', 'Group Project', 1, 0),
('EICT 430C', 17, 'Integrated Circuits Technology', 'Learn how to synthesize an integrated circuit', 1, 0),
('EICT 432C', 35, 'Microwave Engineering', 'Learn about micro waves', 1, 0),
('Elective 1', 10, 'Elective 1', 'Elective 1', 1, 0),
('Elective 2', 17, 'Elective 2', 'Elective 2', 1, 0),
('Elective 3', 10, 'Elective 3', 'Elective 3', 1, 0),
('Elective 4', 17, 'Elective 4', 'Elective 4', 1, 0),
('Elective 5', 35, 'Elective 5', 'Elective 5', 1, 0),
('EMIP 332C', 10, 'Microprocessors', 'Learn Microprocessor Interfacing and Programming', 1, 0),
('EMIP 432C', 10, 'Microprocessor Interface and Programming', 'Learn Microprocessor Interfacing and Programming', 1, 0),
('EOCN 632C', 5, 'Optical Communication', 'Learn about opticla communication', 1, 0),
('EPOC 432C', 5, 'Principles Of Communication', 'Learn how communication systems work', 1, 0),
('EPOP 503P', 5, 'Project Oriented Practices', 'Group Project', 1, 0),
('EPRJ 802P', 5, 'Individual Project', 'Individual Project', 1, 0),
('ESAS 430C', 34, 'Discrete Time Signals and Systems', 'Learn about Signals and Systems and their discrete time fourier series and transforms and Z-tranforms', 1, 0),
('EVSD 632C', 36, 'VLSI System Design', 'Learn to design a functioning VLSI system', 1, 0),
('EWCN 732C', 5, 'Wireless Communication', 'Learn basic concepts of wireless communication', 1, 0),
('IAIN 532C', 21, 'Artificial Intelligence', 'Learn how to use Artificial Intelligence in computers', 1, 0),
('ICNW 532C', 19, 'Computer Networks', 'Learn how computer network works', 1, 0),
('ICOA 230C', 12, 'Computer Organization And Architecture', 'Learn fundamentals of Computer Organization And Architecture', 1, 0),
('ICOD 632C', 15, 'Compiler Designing', 'Learn how to build a compiler for a language', 1, 0),
('ICOG 532C', 22, 'Computer Graphics', 'Learn how Computer Graphics work', 1, 0),
('IDBM 432C', 3, 'Database Management System', 'Learn Database Management System design and concepts', 1, 0),
('IDIM 230C', 8, 'Discrete Mathematics', 'Learn concepts of Discrete Mathematics', 1, 0),
('IDMS 230C', 8, 'Discrete Mathematics', 'Learn logic calculus and appropriate techniques of proofs', 1, 0),
('IDMW 632C', 24, 'Data Mining', 'Learn about concepts of Data Mining', 1, 0),
('IDSA 232C', 11, 'Data Structures And Algorithms', 'Learn Data Structures and Algorithms', 1, 0),
('IDST 232C', 11, 'Data Structures', 'Learn about the basic data structures needed to build complex programs', 1, 0),
('IE1 7', 1, 'Elective 1', 'Learn about chosen Elective 1', 1, 0),
('IE1 8', 30, 'Elective 1', 'Learn about chosen Elective 1', 1, 0),
('IE2 7', 28, 'Elective 2', 'Learn about chosen Elective 2', 1, 0),
('IE2 8', 2, 'Elective 2', 'Learn about chosen Elective 2', 1, 0),
('IIVP 632C', 26, 'Image and Voice Processing', 'Learn how Computer processes images and voice', 1, 0),
('IMP 7', 29, 'Mini Project', 'Project Evaluation', 1, 0),
('IMP 8', 20, 'Mini Project', 'Project Evaluation', 1, 0),
('INLP 630E', 27, 'Natural Language Processing', 'Learn how is natural language processed', 1, 0),
('IOOM 332C', 6, 'Object Oriented Methodologies', 'Learn OOM concepts with Java', 1, 0),
('IOOT 630E', 25, 'Optimization Technologies', 'Learn about Optimization Techniques and how to apply them', 1, 0),
('IOPS 332C', 7, 'Operating Systems', 'Learn Operating System concepts', 1, 0),
('IOSY 332C', 7, 'Operating System', 'Learn the inner workings behind an Operating System', 1, 0),
('IPPL 422C', 2, 'Principles of programming languages', 'Learn syntax and semantics of programming languages', 1, 0),
('ISWE 532C', 20, 'Software Engineering', 'Learn how to build quality softwares', 1, 0),
('ITC 132C', 14, 'Engineering Physics', 'Learn basic electrical concepts and classical and quantum mechanics', 1, 0),
('ITC 232C', 16, 'Introduction To Computers', 'Learn basic concepts of a computer system', 1, 0),
('ITOC 330C', 8, 'Theory Of Computation', 'Learn about Theory Of Computation and Automata', 1, 0),
('ITP 132C', 15, 'Introduction To Programming', 'Learn how to program in a language like C', 1, 0),
('ITP 232C', 15, 'Introduction To Programming', 'Learn how to program in a language like C', 1, 0),
('MMAM 420F', 44, 'Marketing Management', 'Learn how to program in a language like C', 1, 0),
('MMEC 520F', 44, 'Managerial Economics', 'Learn about Economics involved in management', 1, 0),
('MPOE 530C', 23, 'Principles Of Economics', 'Learn about basic Principles of Economics', 1, 0),
('MPOM 230C', 44, 'Principles of Management', 'Get acquainted with the basic principles of management', 1, 0),
('SMAT 130C', 18, 'Mathematics-1', 'Learn about Ordinary Differential Equations, Sequences and Series, A brief introduction to Multivariable Calculus', 1, 0),
('SMAT 230C', 18, 'Mathematics-1', 'Learn about Ordinary Differential Equations, Sequences and Series, A brief introduction to Multivariable Calculus', 1, 0),
('SMAT 232C', 13, 'Mathematics-2', 'Learn about Linear Algebra and Interpolation Techniques', 1, 0),
('SMAT 330C', 9, 'Mathematics-3', 'Learn Complex Analysis and Transformations', 1, 0),
('SPAS 230C', 4, 'Probability And Statistics', 'Learn fundamentals of Probability And Statistics', 1, 0),
('SPAS 430C', 4, 'Probability And Statistics', 'Learn fundamentals of Probability And Statistics', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_allotted`
--

CREATE TABLE `course_allotted` (
  `id` int(11) NOT NULL,
  `semester` varchar(60) DEFAULT NULL,
  `year` int(10) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_allotted`
--

INSERT INTO `course_allotted` (`id`, `semester`, `year`, `student_id`, `course_id`) VALUES
(1, 'Spring', 2022, 2, 'DAA 430C'),
(2, 'Spring', 2022, 2, 'IPPL 422C'),
(3, 'Spring', 2022, 2, 'IPPL 430C'),
(4, 'Spring', 2022, 2, 'IDBM 432C'),
(5, 'Spring', 2022, 2, 'SPAS 430C'),
(6, 'Spring', 2022, 2, 'EPOC 432C'),
(7, 'Spring', 2022, 2, 'IOOM 332C'),
(8, 'Spring', 2022, 2, 'IOPS 332C'),
(9, 'Spring', 2022, 2, 'ITOC 330C'),
(10, 'Spring', 2022, 2, 'SMAT 330C'),
(11, 'Spring', 2022, 2, 'EMIP 332C'),
(12, 'Spring', 2022, 2, 'IDSA 232C'),
(13, 'Spring', 2022, 2, 'ICOA 230C'),
(14, 'Spring', 2022, 2, 'IDIM 230C'),
(15, 'Spring', 2022, 2, 'SMAT 232C'),
(16, 'Spring', 2022, 2, 'EDLE 232C'),
(17, 'Spring', 2022, 2, 'ITP 132C'),
(18, 'Spring', 2022, 2, 'ITC 132C'),
(19, 'Spring', 2022, 2, 'EEDC 132C'),
(20, 'Spring', 2022, 2, 'SMAT 130C'),
(21, 'Spring', 2022, 2, 'ECAS 130C'),
(22, 'Spring', 2022, 2, 'ICNW 532C'),
(23, 'Spring', 2022, 2, 'ISWE 532C'),
(24, 'Spring', 2022, 2, 'IAIN 532C'),
(25, 'Spring', 2022, 2, 'ICOG 532C'),
(26, 'Spring', 2022, 2, 'MPOE 532C'),
(27, 'Spring', 2022, 2, 'ICOD 632C'),
(28, 'Spring', 2022, 2, 'IDMW 632C'),
(29, 'Spring', 2022, 2, 'IOOT 630E'),
(30, 'Spring', 2022, 2, 'IIVP 632C'),
(31, 'Spring', 2022, 2, 'INLP 630E'),
(32, 'Spring', 2022, 2, 'IE1'),
(33, 'Spring', 2022, 2, 'IE2'),
(34, 'Spring', 2022, 2, 'IMP'),
(35, 'Spring', 2022, 2, 'IE1'),
(36, 'Spring', 2022, 2, 'IE2'),
(37, 'Spring', 2022, 2, 'IMP'),
(38, 'Spring', 2022, 2, 'IIPG 132C'),
(39, 'Spring', 2022, 2, 'SEGP 132C'),
(40, 'Spring', 2022, 2, 'EEDC 132C'),
(41, 'Spring', 2022, 2, 'SCDE 130C'),
(42, 'Spring', 2022, 2, 'ECAS 130C'),
(43, 'Spring', 2022, 2, 'ITC 132C'),
(44, 'Spring', 2022, 2, 'EDES 232C'),
(45, 'Spring', 2022, 2, 'IDMS 230C'),
(46, 'Spring', 2022, 2, 'IDST 232C'),
(47, 'Spring', 2022, 2, 'SPAS 230C'),
(48, 'Spring', 2022, 2, 'ICOA 230C'),
(49, 'Spring', 2022, 2, 'MPOM 230C'),
(50, 'Spring', 2022, 2, 'IOSY 332C'),
(51, 'Spring', 2022, 2, 'EAES 332C'),
(52, 'Spring', 2022, 2, 'EACN 332C'),
(53, 'Spring', 2022, 2, 'EEFW 330C'),
(54, 'Spring', 2022, 2, 'EBEE 332C'),
(55, 'Spring', 2022, 2, 'MMAM 420F'),
(56, 'Spring', 2022, 2, 'ESAS 430C'),
(57, 'Spring', 2022, 2, 'EMIP 432C'),
(58, 'Spring', 2022, 2, 'EEMI 432C'),
(59, 'Spring', 2022, 2, 'EICT 430C'),
(60, 'Spring', 2022, 2, 'EMWE 432C'),
(61, 'Spring', 2022, 2, 'EDCN 532C'),
(62, 'Spring', 2022, 2, 'ECSY 532C'),
(63, 'Spring', 2022, 2, 'ECNW 532C'),
(64, 'Spring', 2022, 2, 'EAWP 532C'),
(65, 'Spring', 2022, 2, 'MMEC 520F'),
(66, 'Spring', 2022, 2, 'EPOP 503P'),
(67, 'Spring', 2022, 2, 'EOCN 632C'),
(68, 'Spring', 2022, 2, 'EVSD 632C'),
(69, 'Spring', 2022, 2, 'EDSP 632C'),
(70, 'Spring', 2022, 2, 'Elective 1'),
(71, 'Spring', 2022, 2, 'Elective 2'),
(72, 'Spring', 2022, 2, 'EGPJ 604P'),
(73, 'Spring', 2022, 2, 'EESD 732C'),
(74, 'Spring', 2022, 2, 'EWCN 732C'),
(75, 'Spring', 2022, 2, 'Elective 3'),
(76, 'Spring', 2022, 2, 'Elective 4'),
(77, 'Spring', 2022, 2, 'Elective 5'),
(78, 'Spring', 2022, 2, 'EGPJ 706P'),
(79, 'Spring', 2022, 2, 'EPRJ 802P');

-- --------------------------------------------------------

--
-- Table structure for table `course_offered`
--

CREATE TABLE `course_offered` (
  `id` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` varchar(50) NOT NULL,
  `course_id` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course_offered`
--

INSERT INTO `course_offered` (`id`, `year`, `semester`, `course_id`) VALUES
(1, 2022, 'Spring', '430'),
(2, 2022, 'Spring', 'cs520'),
(3, 2022, 'Spring', 'EACN 332C'),
(4, 2022, 'Spring', 'EAES 332C'),
(5, 2022, 'Spring', 'EAWP 532C'),
(6, 2022, 'Spring', 'EBEE 330C'),
(7, 2022, 'Spring', 'ECAS 130C'),
(8, 2022, 'Spring', 'ECAS 230C'),
(9, 2022, 'Spring', 'ECNW 532C'),
(10, 2022, 'Spring', 'ECSY 532C'),
(11, 2022, 'Spring', 'EDCN 532C'),
(12, 2022, 'Spring', 'EDES 232C'),
(13, 2022, 'Spring', 'EDLE 232C'),
(14, 2022, 'Spring', 'EDSP 632C'),
(15, 2022, 'Spring', 'EEDC 132C'),
(16, 2022, 'Spring', 'EEDC 232C'),
(17, 2022, 'Spring', 'EEFW 330C'),
(18, 2022, 'Spring', 'EEMI 432C'),
(19, 2022, 'Spring', 'EESD 732C'),
(20, 2022, 'Spring', 'EGPJ 604P'),
(21, 2022, 'Spring', 'EGPJ 706P'),
(22, 2022, 'Spring', 'EICT 430C'),
(23, 2022, 'Spring', 'EICT 432C'),
(24, 2022, 'Spring', 'Elective 1'),
(25, 2022, 'Spring', 'Elective 2'),
(26, 2022, 'Spring', 'Elective 3'),
(27, 2022, 'Spring', 'Elective 4'),
(28, 2022, 'Spring', 'Elective 5'),
(29, 2022, 'Spring', 'EMIP 332C'),
(30, 2022, 'Spring', 'EMIP 432C'),
(31, 2022, 'Spring', 'EOCN 632C'),
(32, 2022, 'Spring', 'EPOC 432C'),
(33, 2022, 'Spring', 'EPOP 503P'),
(34, 2022, 'Spring', 'EPRJ 802P'),
(35, 2022, 'Spring', 'ESAS 430C'),
(36, 2022, 'Spring', 'EVSD 632C'),
(37, 2022, 'Spring', 'EWCN 732C'),
(38, 2022, 'Spring', 'IAIN 532C'),
(39, 2022, 'Spring', 'ICNW 532C'),
(40, 2022, 'Spring', 'ICOA 230C'),
(41, 2022, 'Spring', 'ICOD 632C'),
(42, 2022, 'Spring', 'ICOG 532C'),
(43, 2022, 'Spring', 'IDBM 432C'),
(44, 2022, 'Spring', 'IDIM 230C'),
(45, 2022, 'Spring', 'IDMS 230C'),
(46, 2022, 'Spring', 'IDMW 632C'),
(47, 2022, 'Spring', 'IDSA 232C'),
(48, 2022, 'Spring', 'IDST 232C'),
(49, 2022, 'Spring', 'IE1 7'),
(50, 2022, 'Spring', 'IE1 8'),
(51, 2022, 'Spring', 'IE2 7'),
(52, 2022, 'Spring', 'IE2 8'),
(53, 2022, 'Spring', 'IIVP 632C'),
(54, 2022, 'Spring', 'IMP 7'),
(55, 2022, 'Spring', 'IMP 8'),
(56, 2022, 'Spring', 'INLP 630E'),
(57, 2022, 'Spring', 'IOOM 332C'),
(58, 2022, 'Spring', 'IOOT 630E'),
(59, 2022, 'Spring', 'IOPS 332C'),
(60, 2022, 'Spring', 'IOSY 332C'),
(61, 2022, 'Spring', 'IPPL 422C'),
(62, 2022, 'Spring', 'ISWE 532C'),
(63, 2022, 'Spring', 'ITC 132C'),
(64, 2022, 'Spring', 'ITC 232C'),
(65, 2022, 'Spring', 'ITOC 330C'),
(66, 2022, 'Spring', 'ITP 132C'),
(67, 2022, 'Spring', 'ITP 232C'),
(68, 2022, 'Spring', 'MMAM 420F'),
(69, 2022, 'Spring', 'MMEC 520F'),
(70, 2022, 'Spring', 'MPOE 530C'),
(71, 2022, 'Spring', 'MPOM 230C'),
(72, 2022, 'Spring', 'SMAT 130C'),
(73, 2022, 'Spring', 'SMAT 230C'),
(74, 2022, 'Spring', 'SMAT 232C'),
(75, 2022, 'Spring', 'SMAT 330C'),
(76, 2022, 'Spring', 'SPAS 230C'),
(77, 2022, 'Spring', 'SPAS 430C');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `college_id` int(11) NOT NULL,
  `manager_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`, `college_id`, `manager_id`) VALUES
(1, 'CS', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `instructor_id` int(11) DEFAULT NULL,
  `instructor_name` varchar(60) DEFAULT NULL,
  `contact_email` varchar(30) DEFAULT NULL,
  `profile_link` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`instructor_id`, `instructor_name`, `contact_email`, `profile_link`) VALUES
(1, 'Amit Dhar', 'amit@iiita.ac.in', 'http://profile.iiita.ac.in/amitdhar'),
(2, 'Jagpreet Singh', 'jagp@iiita.ac.in', 'http://profile.iiita.ac.in/jagpreets'),
(3, 'Amrita Chaturvedi', 'amrita@iiita.ac.in', 'http://profile.iiita.ac.in/amrita'),
(4, 'Sumit Kumar Upadhyay', 'upsumit@iiita.ac.in', 'http://profile.iiita.ac.in/upsumit'),
(5, 'Niteesh Purohit', 'np@iiita.ac.in', 'http://profile.iiita.ac.in/np|suneel|somakb'),
(6, 'Ranjana Vyas', 'ranjana@iiita.ac.in', 'http://profile.iiita.ac.in/ranana'),
(7, 'Bibhas Ghoshal', 'bibhas.ghoshal@iiita.ac.in', 'http://profile.iiita.ac.in/bibhas.ghoshal'),
(8, 'Somenath Biswas', 'sb@iiita.ac.in', 'http://profile.iiita.ac.in/sb'),
(9, 'Abdullah Bin Abu Baker', 'abdullah@iiita.ac.in', 'http://profile.iiita.ac.in/abdullah'),
(10, 'Prasanna Kumar Misra', 'prasanna@iiita.ac.in', 'http://profile.iiita.ac.in/prasanna'),
(11, 'Sonali Agarwal', 'sonali@iiita.ac.in', 'http://profile.iiita.ac.in/sonali'),
(12, 'Satish Kumar Singh', 'sk.singh@iiita.ac.in', 'http://profile.iiita.ac.in/sk.singh'),
(13, 'Akhilesh Tiwari', 'atiwari@iiita.ac.in', 'http://profile.iiita.ac.in/atiwari'),
(14, 'Pramod Kumar', 'pkumar@iiita.ac.in', 'http://profile.iiita.ac.in/pkumar'),
(15, 'Venkatesan S', 'venkat@iiita.ac.in', 'http://profile.iiita.ac.in/venkat'),
(16, 'Mithilesh Mishra', 'mithilesh@iiita.ac.in', 'http://profile.iiita.ac.in/mithilesh'),
(17, 'Sitangshu Bhattacharya', 'sitangshu@iiita.ac.in', 'http://profile.iiita.ac.in/sitangshu'),
(18, 'Ramji Lal', 'ramji@iiita.ac.in', 'http://profile.iiita.ac.in/ramji'),
(19, 'Shekhar Verma', 'sverma@iiita.ac.in', 'http://profile.iiita.ac.in/sverma'),
(20, 'Sudip Sanyal', 'ssanyal@iiita.ac.in', 'http://profile.iiita.ac.in/ssanyal'),
(21, 'Rahul Kala', 'rkala@iiita.ac.in', 'http://profile.iiita.ac.in/rkala'),
(22, 'Pavan Chakraborty', 'pavan@iiita.ac.in', 'http://profile.iiita.ac.in/pavan'),
(23, 'Shailendra Kumar', 'shailendrak@iiita.ac.in', 'http://profile.iiita.ac.in/shailendrak'),
(24, 'Manish Kumar', 'manish@iiita.ac.in', 'http://profile.iiita.ac.in/manish'),
(25, 'Vrijendra Singh', 'vrij@iiita.ac.in', 'http://profile.iiita.ac.in/vrij'),
(26, 'U. S. Tiwary', 'ust@iiita.ac.in', 'http://profile.iiita.ac.in/ust'),
(27, 'Ratna Sanyal', 'rsanyal@iiita.ac.in', 'http://profile.iiita.ac.in/rsanyal'),
(28, 'Sanjeev B. S.', 'sanjeev@iiita.ac.in', 'https://iws44.iiita.ac.in/bss/website'),
(29, 'O. P. Vyas', 'opvyas@iiita.ac.in', 'http://profile.iiita.ac.in/opvyas'),
(30, 'Rahul Kala', 'rkala@iiita.ac.in', 'http://profile.iiita.ac.in/rkala'),
(31, 'Sunny Sharma', 'sunnys@iiita.ac.in', 'http://profile.iiita.ac.in/venkat'),
(32, 'Dr. K. P. Singh', 'kpsingh@iiita.ac.in', 'http://profile.iiita.ac.in/kpsingh'),
(33, 'Dr. Manish Goswami', 'manishgoswami@iiita.ac.in', 'http://profile.iiita.ac.in/manishgoswami'),
(34, 'Ms. Pooja Jain', 'poojajain@iiita.ac.in', 'http://profile.iiita.ac.in/poojajain'),
(35, 'Dr.Somak-Bhattacharyya', 'somakb@iiita.ac.in', 'http://profile.iiita.ac.in/somakb'),
(36, 'Dr. Rajat Kumar Singh', 'rajatsingh@iiita.ac.in', 'http://profile.iiita.ac.in/rajatsingh'),
(37, 'Dr. Vrijendra Singh', 'vrij@iiita.ac.in', 'http://profile.iiita.ac.in/vrij'),
(38, 'Dr. Anupam', 'anupam@iiita.ac.in', 'http://profile.iiita.ac.in/anupam'),
(39, 'Dr. Vijay K. Chaurasiya', 'vijayk@iiita.ac.in', 'http://profile.iiita.ac.in/vijayk'),
(40, 'Prof. G. C. Nandi', 'gcnandi@iiita.ac.in', 'http://profile.iiita.ac.in/gcnandi'),
(41, 'Dr. Ranjit Singh', '	ranjitsingh@iiita.ac.in', 'http://profile.iiita.ac.in/ranjitsingh'),
(42, 'Dr. Shirshu Varma', 'shirshu@iiita.ac.in', 'http://profile.iiita.ac.in/shirshu'),
(43, 'Dr. Rekha Verma', 'r.verma@iiita.ac.in', 'http://profile.iiita.ac.in/r.verma'),
(44, 'Dr. Vijayshri Tewari', 'vijayshri@iiita.ac.in', 'http://profile.iiita.ac.in/vijayshri'),
(45, 'Dr. Arun Kant Singh', 'aks@iiita.ac.in', 'http://profile.iiita.ac.in/aks'),
(46, 'Dr. Abhishek Vaish', 'abhishek@iiita.ac.in', 'http://profile.iiita.ac.in/abhishek');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `access_level` varchar(20) NOT NULL,
  `icon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `quick_links`
--

CREATE TABLE `quick_links` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(60) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `father_name` varchar(60) DEFAULT NULL,
  `mother_name` varchar(60) DEFAULT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  `address_1` varchar(60) DEFAULT NULL,
  `address_2` varchar(60) DEFAULT NULL,
  `city` varchar(60) DEFAULT NULL,
  `state` varchar(15) DEFAULT NULL,
  `zip` int(10) NOT NULL,
  `department_id` int(11) DEFAULT NULL,
  `role` varchar(20) NOT NULL,
  `programme` varchar(20) DEFAULT NULL,
  `batch` varchar(10) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `password` varchar(128) NOT NULL,
  `regdate` varchar(60) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `sex`, `date_of_birth`, `father_name`, `mother_name`, `contact_number`, `address_1`, `address_2`, `city`, `state`, `zip`, `department_id`, `role`, `programme`, `batch`, `semester`, `password`, `regdate`) VALUES
(1, 'Admin', 'User', 'admin', 'bharat@bu.edu', NULL, '2022-02-22', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2134, NULL, 'admin', NULL, NULL, NULL, '1619d7adc23f4f633f11014d2f22b7d8', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`college_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `course_allotted`
--
ALTER TABLE `course_allotted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_offered`
--
ALTER TABLE `course_offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
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
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `college`
--
ALTER TABLE `college`
  MODIFY `college_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `course_allotted`
--
ALTER TABLE `course_allotted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `course_offered`
--
ALTER TABLE `course_offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(60) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
