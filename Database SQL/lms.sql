-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2018 at 04:01 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_id`, `name`) VALUES
(1, 10, 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `department_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`department_id`, `name`) VALUES
(3, 'Software'),
(4, 'Hardware'),
(5, 'Information Science'),
(6, 'Myanmar'),
(7, 'English'),
(10, 'Computational Math'),
(11, 'Research And Development'),
(12, 'Application'),
(14, 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `major`
--

CREATE TABLE `major` (
  `major_id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `major`
--

INSERT INTO `major` (`major_id`, `name`, `year_id`) VALUES
(1, 'CS', 4),
(3, 'CT', 4),
(4, 'CS', 9),
(5, 'CT', 9),
(6, 'CS', 10),
(7, 'CT', 10),
(9, 'CST', 8),
(11, 'CS', 11);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `description` varchar(500) NOT NULL,
  `ans1` varchar(200) NOT NULL,
  `ans2` varchar(200) NOT NULL,
  `ans3` varchar(200) NOT NULL,
  `ans4` varchar(200) NOT NULL,
  `correct_ans` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `tutorial_id`, `description`, `ans1`, `ans2`, `ans3`, `ans4`, `correct_ans`) VALUES
(1, 3, 'PHP stand for.....?', 'Hypertext Preprocessor', 'Hyper Preprocessor', 'Hyper Personal', 'Hyper Home Page', 'Hypertext Preprocessor'),
(2, 3, 'HTML stand for........?', 'Hyper Markup Language', 'Hypertest Markup Language', 'Hypertext Markup Language', 'Hypertext Market Language', 'Hypertext Markup Language'),
(3, 4, 'ERP stand for.....?', 'Enterprise Resource Price', 'Enterprise Resource Planning', 'Entity Relation Plan', 'Entity Resource Planning', 'Enterprise Resource Planning'),
(4, 4, 'QR code stand for.....?', 'Quick Response code', 'Quite Response code', 'Quiet Response code', 'Quality Resource code', 'Quick Response code'),
(5, 5, 'AI stands for ....?', 'Artifical Intelligent', 'Artifical Index', 'Artifical Internal', 'Above all', 'Artifical Intelligent'),
(6, 5, 'AI is one of the newest ........ ?', 'science', 'sciences', 'technology', 'language', 'sciences'),
(7, 6, 'What is a.......?', 'A', 'B', 'C', 'D', 'A'),
(8, 6, 'What is B......?', 'C', 'B', 'D', 'A', 'B'),
(9, 6, 'What is C......?', 'D', 'B', 'A', 'C', 'C'),
(10, 7, 'PHP stand for.....?', 'Yes', 'Hypertest Markup Language', 'Not given', 'Hyper Home Page', 'Hyper Home Page'),
(11, 7, 'HTML stand for........?', 'Yes', 'Hypertest Markup Language', 'Quiet Response code', 'Hypertext Markup Language', 'Hypertext Markup Language'),
(12, 8, 'PHP stand for.....?', 'Hypertext Preprocessor', 'Hypertest Markup Language', 'Hyper Personal', 'Above all', 'Hypertext Preprocessor'),
(13, 8, 'HTML stand for........?', 'Hyper Markup Language', 'Enterprise Resource Planning', 'Hyper Personal', 'Entity Resource Planning', 'Hyper Markup Language'),
(14, 8, 'ERP stand for.....?', 'Enterprise Resource Price', 'Hyper Preprocessor', 'Quiet Response code', 'Quality Resource code', 'Enterprise Resource Price'),
(16, 9, 'What is A ........?', 'B', 'A', 'C', 'D', 'A'),
(17, 9, 'What is D ...?', 'A', 'C', 'B', 'D', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `result_id` int(11) NOT NULL,
  `tutorial_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `total_question` int(11) NOT NULL,
  `total_mark` int(100) NOT NULL,
  `result_date` date NOT NULL,
  `remark` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`result_id`, `tutorial_id`, `student_id`, `total_question`, `total_mark`, `result_date`, `remark`) VALUES
(1, 3, 1, 2, 1, '2018-08-17', 'Present'),
(3, 4, 3, 2, 1, '2018-08-17', 'Present'),
(6, 5, 3, 2, 0, '2018-08-19', 'Absent'),
(13, 6, 3, 3, 2, '2018-08-21', 'Present'),
(14, 7, 1, 2, 1, '2018-08-22', 'Present'),
(15, 8, 1, 3, 3, '2018-12-07', 'Present'),
(16, 9, 1, 3, 3, '2018-12-21', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `semester` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `teacher_id`, `section_id`, `subject_id`, `semester`) VALUES
(1, 1, 4, 17, 'first'),
(3, 2, 5, 12, 'second'),
(4, 3, 5, 17, 'first'),
(5, 2, 4, 12, 'first'),
(6, 5, 5, 12, 'first');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` int(11) NOT NULL,
  `section` varchar(50) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `section`, `year_id`) VALUES
(1, 'A', 8),
(2, 'A', 9),
(3, 'B', 10),
(4, 'A', 4),
(5, 'B', 4),
(6, 'B', 8),
(7, 'C', 8),
(8, 'A', 10),
(9, 'C', 10),
(10, 'D', 10),
(11, 'B', 9),
(12, 'C', 9),
(13, 'A', 11);

-- --------------------------------------------------------

--
-- Table structure for table `slide_photo`
--

CREATE TABLE `slide_photo` (
  `id` int(11) NOT NULL,
  `photo_url` varchar(500) NOT NULL,
  `upload_date` date NOT NULL,
  `caption` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slide_photo`
--

INSERT INTO `slide_photo` (`id`, `photo_url`, `upload_date`, `caption`) VALUES
(1, 'http://localhost/LMS/admin/slide_upload/IMG_20141124_230641.jpg', '2018-08-12', 'UCSMGY 1'),
(2, 'http://localhost/LMS/admin/slide_upload/IMG_20150809_183820.JPG', '2018-08-12', 'UCSMGY 2'),
(3, 'http://localhost/LMS/admin/slide_upload/IMG_20151003_150013.JPG', '2018-08-12', 'UCSMGY 3'),
(4, 'http://localhost/LMS/admin/slide_upload/IMG_20150917_163858.jpg', '2018-08-12', 'UCSMGY 4'),
(5, 'http://localhost/LMS/admin/slide_upload/IMG_20150309_112933.jpg', '2018-08-16', 'UCSMGY 7');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `roll_no` varchar(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `user_id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `major_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `name`, `roll_no`, `phone`, `email`, `address`, `gender`, `user_id`, `year_id`, `section_id`, `major_id`) VALUES
(1, 'Ye Lin Phyo', '9', '09253680662', 'yelinphyocu@gmail.com', 'Magway', 'Male', 7, 4, 4, 1),
(3, 'Win Lwin Oo', '40', '09778633987', 'winlwinoocu@gmail.com', 'Magway', 'Male', 9, 4, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `year_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subject_id`, `code`, `year_id`) VALUES
(1, 'CST-101', 8),
(2, 'CST-102', 8),
(5, 'CST-103', 8),
(6, 'CST-104', 8),
(7, 'English', 8),
(8, 'Mathematics', 8),
(9, 'Physics', 8),
(10, 'Myanmar', 8),
(12, 'CS-401', 4),
(13, 'CS-402', 4),
(14, 'CS-403', 4),
(15, 'CS-404', 4),
(16, 'CS-405', 4),
(17, 'CS-406', 4),
(18, 'English', 4);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `user_id`, `department_id`, `name`, `phone`, `email`, `address`, `gender`) VALUES
(1, 1, 3, 'Dr. Tin Htar Nwe', '09777885051', 'tinhtarnwe@gmail.com', 'UCSMGY, Magway', 'Female'),
(2, 11, 12, 'Daw Hla Hla Myint', '09259131003', 'hlahla@gmail.com', 'Gwaycho , Magway', 'Female'),
(3, 12, 12, 'Daw Moe Moe Hlaing', '0997001234', 'momo@gmail.com', 'Magway', 'Female'),
(5, 19, 3, 'Ma Ma', '09667688', 'mama@gmail.com', 'Magway', 'Female');

-- --------------------------------------------------------

--
-- Table structure for table `tutorial`
--

CREATE TABLE `tutorial` (
  `tutorial_id` int(11) NOT NULL,
  `tutorial_name` varchar(500) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `allow_time` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tutorial`
--

INSERT INTO `tutorial` (`tutorial_id`, `tutorial_name`, `schedule_id`, `start_date`, `end_date`, `allow_time`) VALUES
(3, 'tutorial 1', 1, '2018-08-16', '2018-08-17', '30'),
(4, 'tutorial 1', 3, '2018-08-17', '2018-08-18', '30'),
(5, 'tutorial 1', 4, '2018-08-17', '2018-08-18', '10'),
(6, 'Tutorial 2', 3, '2018-08-20', '2018-08-25', '2'),
(7, 'AI', 1, '2018-08-22', '2018-08-23', '10'),
(8, 'tutorial 3', 1, '2018-12-07', '2018-12-09', '1'),
(9, 'tutorial 1', 5, '2018-12-23', '2018-12-31', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`, `role`, `date`) VALUES
(1, 'DTHN09777885051', 'SY5RSzh3', 'teacher', '2018/08/02'),
(7, 'YLP09253680662', 'ylp@lms', 'student', '2018/08/05'),
(9, 'WLO09778633987', 'wlo@lms', 'student', '2018/08/05'),
(10, 'lmsadmin@lms.open', '107413Lms', 'admin', '2018/08/12'),
(11, 'DHHM09259131003', 'N8ctKD7o', 'teacher', '2018/08/13'),
(12, 'DMMH0997001234', 'Fp#d2F6c', 'teacher', '2018/08/17'),
(13, 'M443434', 'u0t30k1v', 'teacher', '2018/08/21'),
(14, '13123', 'OmO1tMT#', 'teacher', '2018/08/21'),
(15, '1254545', 'lGM21e92', 'teacher', '2018/08/21'),
(16, '5345434', 'qUwqugtT', 'teacher', '2018/08/21'),
(17, '343', '5&JHH2Xr', 'teacher', '2018/08/21'),
(18, '09665455678', 'YU?$GiUF', 'teacher', '2018/12/16'),
(19, 'MM09667688', 'xEgb58a8', 'teacher', '2018/12/16'),
(20, '095656778', '2kJOBv63', 'student', '2018/12/16');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `year_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`year_id`, `name`) VALUES
(4, 'Fourth Year'),
(8, 'First Year'),
(9, 'Third Year'),
(10, 'Second Year'),
(11, 'Master');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `major`
--
ALTER TABLE `major`
  ADD PRIMARY KEY (`major_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `tutorial_id` (`tutorial_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`result_id`),
  ADD KEY `tutorial_id` (`tutorial_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `class_id` (`section_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `year_id` (`year_id`);

--
-- Indexes for table `slide_photo`
--
ALTER TABLE `slide_photo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `year_id` (`year_id`),
  ADD KEY `class_id` (`section_id`),
  ADD KEY `major_id` (`major_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subject_id`),
  ADD KEY `major_id` (`year_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `department_id_2` (`department_id`);

--
-- Indexes for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD PRIMARY KEY (`tutorial_id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
  ADD PRIMARY KEY (`year_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `major`
--
ALTER TABLE `major`
  MODIFY `major_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `result_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `slide_photo`
--
ALTER TABLE `slide_photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tutorial`
--
ALTER TABLE `tutorial`
  MODIFY `tutorial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
  MODIFY `year_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `major`
--
ALTER TABLE `major`
  ADD CONSTRAINT `major_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `question_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`tutorial_id`) REFERENCES `tutorial` (`tutorial_id`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`),
  ADD CONSTRAINT `schedule_ibfk_4` FOREIGN KEY (`subject_id`) REFERENCES `subject` (`subject_id`),
  ADD CONSTRAINT `schedule_ibfk_5` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`);

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`),
  ADD CONSTRAINT `student_ibfk_3` FOREIGN KEY (`major_id`) REFERENCES `major` (`major_id`),
  ADD CONSTRAINT `student_ibfk_5` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `student_ibfk_6` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`);

--
-- Constraints for table `subject`
--
ALTER TABLE `subject`
  ADD CONSTRAINT `subject_ibfk_1` FOREIGN KEY (`year_id`) REFERENCES `year` (`year_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `department` (`department_id`),
  ADD CONSTRAINT `teacher_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `tutorial`
--
ALTER TABLE `tutorial`
  ADD CONSTRAINT `tutorial_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
