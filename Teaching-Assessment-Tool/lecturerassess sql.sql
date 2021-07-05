-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 07:03 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lecturerassess`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `answer_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`answer_id`, `question_id`, `answer`, `rating`) VALUES
(1, 1, 'Strongly Agree', 5),
(2, 1, 'Agree', 4),
(3, 1, 'Neither agree or disagree', 3),
(4, 1, 'Disagree', 2),
(5, 1, 'Strongly disagree', 1),
(6, 2, 'Strongly Agree', 5),
(7, 2, 'Agree', 4),
(8, 2, 'Neither agree or disagree', 3),
(9, 2, 'Disagree', 2),
(10, 2, 'Strongly disagree', 1),
(11, 3, 'Strongly Agree', 5),
(12, 3, 'Agree', 4),
(13, 3, 'Neither agree or disagree', 3),
(14, 3, 'Disagree', 2),
(15, 3, 'Strongly disagree', 1),
(16, 4, 'Strongly Agree', 5),
(17, 4, 'Agree', 4),
(18, 4, 'Neither agree or disagree', 3),
(19, 4, 'Disagree', 2),
(20, 4, 'Strongly disagree', 1),
(21, 5, 'Strongly Agree', 5),
(22, 5, 'Agree', 4),
(23, 5, 'Neither agree or disagree', 3),
(24, 5, 'Disagree', 2),
(25, 5, 'Strongly disagree', 1),
(26, 6, 'Strongly Agree', 5),
(27, 6, 'Agree', 4),
(28, 6, 'Neither agree or disagree', 3),
(29, 6, 'Disagree', 2),
(30, 6, 'Strongly disagree', 1),
(31, 7, 'Strongly Agree', 5),
(32, 7, 'Agree', 4),
(33, 7, 'Neither agree or disagree', 3),
(34, 7, 'Disagree', 2),
(35, 7, 'Strongly disagree', 1),
(36, 8, 'Strongly Agree', 5),
(37, 8, 'Agree', 4),
(38, 8, 'Neither agree or disagree', 3),
(39, 8, 'Disagree', 2),
(40, 8, 'Strongly disagree', 1),
(41, 9, 'Strongly Agree', 5),
(42, 9, 'Agree', 4),
(43, 9, 'Neither agree or disagree', 3),
(44, 9, 'Disagree', 2),
(45, 9, 'Strongly disagree', 1),
(46, 10, 'Strongly Agree', 5),
(47, 10, 'Agree', 4),
(48, 10, 'Neither agree or disagree', 3),
(49, 10, 'Disagree', 2),
(50, 10, 'Strongly disagree', 1),
(51, 11, 'Strongly Agree', 5),
(52, 11, 'Agree', 4),
(53, 11, 'Neither agree or disagree', 3),
(54, 11, 'Disagree', 2),
(55, 11, 'Strongly disagree', 1),
(56, 12, 'Strongly Agree', 5),
(57, 12, 'Agree', 4),
(58, 12, 'Neither agree or disagree', 3),
(59, 12, 'Disagree', 2),
(60, 12, 'Strongly disagree', 1),
(61, 13, 'Strongly Agree', 5),
(62, 13, 'Agree', 4),
(63, 13, 'Neither agree or disagree', 3),
(64, 13, 'Disagree', 2),
(65, 13, 'Strongly disagree', 1),
(66, 14, 'Strongly Agree', 5),
(67, 14, 'Agree', 4),
(68, 14, 'Neither agree or disagree', 3),
(69, 14, 'Disagree', 2),
(70, 14, 'Strongly disagree', 1),
(71, 15, 'Strongly Agree', 5),
(72, 15, 'Agree', 4),
(73, 15, 'Neither agree or disagree', 3),
(74, 15, 'Disagree', 2),
(75, 15, 'Strongly disagree', 1),
(76, 16, 'Strongly Agree', 5),
(77, 16, 'Agree', 4),
(78, 16, 'Neither agree or disagree', 3),
(79, 16, 'Disagree', 2),
(80, 16, 'Strongly disagree', 1),
(81, 17, 'Strongly Agree', 5),
(82, 17, 'Agree', 4),
(83, 17, 'Neither agree or disagree', 3),
(84, 17, 'Disagree', 2),
(85, 17, 'Strongly disagree', 1),
(86, 18, 'Strongly Agree', 5),
(87, 18, 'Agree', 4),
(88, 18, 'Neither agree or disagree', 3),
(89, 18, 'Disagree', 2),
(90, 18, 'Strongly disagree', 1),
(91, 19, 'Strongly Agree', 5),
(92, 19, 'Agree', 4),
(93, 19, 'Neither agree or disagree', 3),
(94, 19, 'Disagree', 2),
(95, 19, 'Strongly disagree', 1),
(96, 20, 'Strongly Agree', 5),
(97, 20, 'Agree', 4),
(98, 20, 'Neither agree or disagree', 3),
(99, 20, 'Disagree', 2),
(100, 20, 'Strongly disagree', 1),
(101, 21, 'Strongly Agree', 5),
(102, 21, 'Agree', 4),
(103, 21, 'Neither agree or disagree', 3),
(104, 21, 'Disagree', 2),
(105, 21, 'Strongly disagree', 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `questions` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `section_id`, `questions`) VALUES
(1, 1, '1. The instructor encouraged student participation in class.'),
(2, 1, '2.The instructor was organized, well prepared, and used class time efficiently.'),
(3, 1, '3.The instructors teaching methods were effective.'),
(4, 1, '4.The instructor returned assignments and exams in a timely manner.'),
(5, 1, '5.The instructor communicated clearly and was easy to understand.'),
(6, 1, '6.The instructor used class time effectively.'),
(7, 1, '7.The instructor stimulated my interest in the subject matter.'),
(8, 2, '1.The assigned readings helped me understand the course material'),
(9, 2, '2.The tests/assessments accurately assess what I have learned in this course.'),
(10, 2, '3.The course that have been taught followed the syllabus.'),
(11, 2, '4.The lectures, readings, and assignments complemented each other.'),
(12, 2, '5.The course workload and requirements were appropriate for the course level.'),
(13, 2, '6.The instructional materials (i.e., books, readings, handouts, study guides, lab manuals, multimedia, software) increased my knowledge and skills in the subject matter.'),
(14, 2, '7.Exams and assignments were reflective of the course content.'),
(15, 3, '1.The instructor effectively explained and illustrated course concepts.'),
(16, 3, '2.The instructor’s feedback to me was helpful and constructive'),
(17, 3, '3.I was able to access the instructor outside of scheduled class time for additional help.'),
(18, 3, '4.The instructor cared about the students, their progress, and successful course completion.'),
(19, 3, '5.The instructor treated students with respect.'),
(20, 3, '6.The instructor’s feedback to me was helpful and improved my understanding of the material.'),
(21, 3, '7.The instructor created a welcoming and inclusive learning environment. I could get help if I needed it.');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `name` varchar(128) DEFAULT NULL,
  `matricNo` varchar(128) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`auto_id`, `name`, `matricNo`, `username`, `password`) VALUES
(2, 'Erna', '203522', 'erna11', '$2y$10$BeyDhpyEcqPPexdTPxf4Z.8mwXSmDBVivu1jjQR/.plnWfAU1d1Ii');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_ID` int(10) NOT NULL,
  `subjectName` varchar(255) NOT NULL,
  `subjectCode` varchar(255) DEFAULT NULL,
  `lectName` varchar(255) DEFAULT NULL,
  `dateAssess` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`question_id`,`answer_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`,`section_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
