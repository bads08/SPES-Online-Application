-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 02:27 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spesdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `ann_id` int(250) NOT NULL,
  `title` varchar(250) NOT NULL,
  `announce` longtext NOT NULL,
  `date_created` date NOT NULL,
  `ann_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`ann_id`, `title`, `announce`, `date_created`, `ann_status`) VALUES
(1, 'Releasing of Salary', 'Releasing of salary is on Monday May 25, 2022. Please bring your complete requirements', '2022-05-19', '1');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(250) NOT NULL,
  `application_id` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `middlename` varchar(250) NOT NULL,
  `gsis` varchar(250) NOT NULL,
  `gsis_relationship` varchar(250) NOT NULL,
  `birthday` date NOT NULL,
  `place_of_birth` varchar(250) NOT NULL,
  `citizenship` varchar(250) NOT NULL,
  `contact` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `social_account` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL,
  `sex` varchar(250) NOT NULL,
  `applicant_type` varchar(250) NOT NULL,
  `status_parents` varchar(250) NOT NULL,
  `present_add` varchar(250) NOT NULL,
  `permanent_add` varchar(250) NOT NULL,
  `fathers_name` varchar(250) NOT NULL,
  `fathers_occupation` varchar(250) NOT NULL,
  `mothers_name` varchar(250) NOT NULL,
  `mothers_occupation` varchar(250) NOT NULL,
  `elementary` varchar(250) NOT NULL,
  `elementary_earned` varchar(250) NOT NULL,
  `elementary_level` varchar(250) NOT NULL,
  `elementary_attend` varchar(250) NOT NULL,
  `secondary` varchar(250) NOT NULL,
  `secondary_earned` varchar(250) NOT NULL,
  `secondary_level` varchar(250) NOT NULL,
  `secondary_attend` varchar(250) NOT NULL,
  `tertiary` varchar(250) NOT NULL,
  `tertiary_earned` varchar(250) NOT NULL,
  `tertiary_level` varchar(250) NOT NULL,
  `tertiary_attend` varchar(250) NOT NULL,
  `tech_voc` varchar(250) NOT NULL,
  `tech_voc_earned` varchar(250) NOT NULL,
  `tech_voc_level` varchar(250) NOT NULL,
  `tech_voc_ettend` date NOT NULL,
  `skills` varchar(250) NOT NULL,
  `1avail` varchar(250) NOT NULL,
  `2avail` varchar(250) NOT NULL,
  `3avail` varchar(250) NOT NULL,
  `4avail` varchar(250) NOT NULL,
  `date_created` date NOT NULL,
  `student_id` int(250) NOT NULL,
  `application_status` varchar(250) NOT NULL,
  `date_approved` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `application_id`, `surname`, `firstname`, `middlename`, `gsis`, `gsis_relationship`, `birthday`, `place_of_birth`, `citizenship`, `contact`, `email`, `social_account`, `status`, `sex`, `applicant_type`, `status_parents`, `present_add`, `permanent_add`, `fathers_name`, `fathers_occupation`, `mothers_name`, `mothers_occupation`, `elementary`, `elementary_earned`, `elementary_level`, `elementary_attend`, `secondary`, `secondary_earned`, `secondary_level`, `secondary_attend`, `tertiary`, `tertiary_earned`, `tertiary_level`, `tertiary_attend`, `tech_voc`, `tech_voc_earned`, `tech_voc_level`, `tech_voc_ettend`, `skills`, `1avail`, `2avail`, `3avail`, `4avail`, `date_created`, `student_id`, `application_status`, `date_approved`) VALUES
(1, '202758', 'Sanchez', 'emily', 'g', 's', 's', '2022-05-19', 's', 's', '09533417098', 'sasada@gmail.com', 's', 'Single', 'Male', 'Student', 'Living together', 's', 's', 's', 's', 's', 's', 's', 's', 's', '2022-05-19', 's', 's', 's', '2022-05-19', 's', 's', 's', '2022-05-19', 's', 's', 's', '2022-05-19', 'd', '1st Availment / g / 2020-2021 / g', ' / s / 1996-1997 / s', ' / s / 1996-1997 / s', ' / s / 1996-1997 / s', '2022-05-19', 2, 'Pending', '2022-05-19'),
(2, '675346', 'sample', 'sample', 'sample', 'd', 'd', '2022-05-19', 'd', 'd', '09473674672', 'macalanganbadrodin@gmail.com', 'd', 'Single', 'Male', 'Student', 'Living together', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', 'd', '2022-05-19', 'd', 'd', 'd', '2022-05-19', 'd', 'd', 'd', '2022-05-19', 'd', 'd', 'd', '2022-05-19', 'sfsfs sfsfsf sfsfsfsf sfsfsfsf', '1st Availment / dsfsfsfsfsfs / 2020-2021 / sfsfsfafsfsfsfsf', ' /  / 1996-1997 / ', ' /  / 1996-1997 / ', ' /  / 1996-1997 / ', '2022-05-19', 1, 'Pending', '2022-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `application_documents`
--

CREATE TABLE `application_documents` (
  `id` int(250) NOT NULL,
  `application_id` varchar(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `type` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_documents`
--

INSERT INTO `application_documents` (`id`, `application_id`, `student_id`, `name`, `filename`, `type`, `status`) VALUES
(1, '202758', 2, 'Birth Certificate', 'uploads/202758-arranging-Nagle-Final-Outline.pdf', 'birth', 'verifying'),
(2, '202758', 2, 'Cert. of Indigence', 'uploads/202758-arranging-Nagle-Final-Outline.pdf', 'itr', 'verifying'),
(3, '202758', 2, 'Grades/Cert. of OSY', 'uploads/202758-arranging-Nagle-Final-Outline.pdf', 'grade', 'verifying'),
(4, '675346', 1, 'Birth Certificate', 'uploads/675346-arranging-Nagle-Final-Outline.pdf', 'birth', 'verifying'),
(5, '675346', 1, 'Cert. of Indigence', 'uploads/675346-arranging-Nagle-Final-Outline.pdf', 'itr', 'verifying'),
(6, '675346', 1, 'Grades/Cert. of OSY', 'uploads/675346-arranging-Nagle-Final-Outline.pdf', 'grade', 'verifying');

-- --------------------------------------------------------

--
-- Table structure for table `application_image`
--

CREATE TABLE `application_image` (
  `id` int(250) NOT NULL,
  `application_id` varchar(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `filename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_image`
--

INSERT INTO `application_image` (`id`, `application_id`, `student_id`, `name`, `filename`) VALUES
(1, '202758', 2, '2x2 ID Picture', 'uploads/202758localhost_spes_register (1).png'),
(2, '675346', 1, '2x2 ID Picture', 'uploads/675346localhost_spes_register (1).png');

-- --------------------------------------------------------

--
-- Table structure for table `application_limit`
--

CREATE TABLE `application_limit` (
  `limit_id` int(250) NOT NULL,
  `limit_name` varchar(250) NOT NULL,
  `limit_no` int(250) NOT NULL,
  `limit_date` date NOT NULL,
  `limit_status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `application_limit`
--

INSERT INTO `application_limit` (`limit_id`, `limit_name`, `limit_no`, `limit_date`, `limit_status`) VALUES
(1, 'sample', 0, '2022-05-05', 'closed');

-- --------------------------------------------------------

--
-- Table structure for table `application_settings`
--

CREATE TABLE `application_settings` (
  `settings_id` int(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `application_student_grade`
--

CREATE TABLE `application_student_grade` (
  `id` int(11) NOT NULL,
  `application_id` varchar(250) NOT NULL,
  `student_id` int(250) NOT NULL,
  `filename` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salary_id` int(250) NOT NULL,
  `salary_name` varchar(250) NOT NULL,
  `date_created` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`salary_id`, `salary_name`, `date_created`) VALUES
(1, 'sample', '2022-05-19');

-- --------------------------------------------------------

--
-- Table structure for table `salary_beneficiary`
--

CREATE TABLE `salary_beneficiary` (
  `salary_beneficiary_id` int(250) NOT NULL,
  `control_no` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `amount` int(250) NOT NULL,
  `salary_id` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `salary_beneficiary`
--

INSERT INTO `salary_beneficiary` (`salary_beneficiary_id`, `control_no`, `name`, `amount`, `salary_id`) VALUES
(1, '423424', '2', 2500, 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(250) NOT NULL,
  `control_no` int(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `mname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `sex` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `contact_no` varchar(250) NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `control_no`, `username`, `password`, `fname`, `mname`, `lname`, `sex`, `email`, `contact_no`, `status`) VALUES
(1, 129260, 'sample', '1234', 'sample', 'sample', 'sample', 'Male', 'macalanganbadrodin@gmail.com', '09473674672', 'Applied'),
(2, 305335, 'emily', '12345', 'emily', 'g', 'Sanchez', 'Female', 'sasada@gmail.com', '09533417098', 'Applied');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(250) NOT NULL,
  `fname` varchar(250) NOT NULL,
  `lname` varchar(250) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `user_type` int(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `username`, `password`, `user_type`) VALUES
(4, 'Juan', 'Delacruz', 'admin', 'admin', 1),
(21, 'badrodin', 'macalangan', 'admin08', '1234', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `type_id` int(250) NOT NULL,
  `type_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`type_id`, `type_name`) VALUES
(1, 'admin'),
(2, 'staff'),
(3, 'super administrator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`ann_id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_documents`
--
ALTER TABLE `application_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_image`
--
ALTER TABLE `application_image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application_limit`
--
ALTER TABLE `application_limit`
  ADD PRIMARY KEY (`limit_id`);

--
-- Indexes for table `application_settings`
--
ALTER TABLE `application_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `application_student_grade`
--
ALTER TABLE `application_student_grade`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salary_id`);

--
-- Indexes for table `salary_beneficiary`
--
ALTER TABLE `salary_beneficiary`
  ADD PRIMARY KEY (`salary_beneficiary_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`type_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `ann_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_documents`
--
ALTER TABLE `application_documents`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `application_image`
--
ALTER TABLE `application_image`
  MODIFY `id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `application_limit`
--
ALTER TABLE `application_limit`
  MODIFY `limit_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `application_settings`
--
ALTER TABLE `application_settings`
  MODIFY `settings_id` int(250) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application_student_grade`
--
ALTER TABLE `application_student_grade`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salary_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `salary_beneficiary`
--
ALTER TABLE `salary_beneficiary`
  MODIFY `salary_beneficiary_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `type_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
