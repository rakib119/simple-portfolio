-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2021 at 12:11 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_user`
--

CREATE TABLE `admin_user` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_user`
--

INSERT INTO `admin_user` (`id`, `name`, `email`, `mobile`, `password`, `gender`, `role`, `status`, `create_at`) VALUES
(31, 'Abir Hasan', 'abir@gmail.com', '', '700c8b805a3e2a265b01c77614cd8b21', 'male', '', 1, '2021-09-17 08:04:10'),
(32, 'Rakib Hasan', 'rakibh01739@gmail.com', '', '700c8b805a3e2a265b01c77614cd8b21', 'male', '', 1, '2021-09-17 10:45:13');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `intro` varchar(70) NOT NULL,
  `message` varchar(400) NOT NULL,
  `banner_photo` varchar(150) NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `intro`, `message`, `banner_photo`, `status`) VALUES
(4, 'Hey, I am Rakib.', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form', '2021-09-15_06-56-491940497945.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `name` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `message` text NOT NULL,
  `status` varchar(7) NOT NULL DEFAULT 'unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `message`, `status`) VALUES
(1, 'Rakib Hasan', 'rakibh01739@gmail.com', 'I need a eCommerce website.', 'read'),
(2, 'Rakib Hasan', 'rakibh01739@gmail.com', '', 'read'),
(3, 'Tgr', 'rakib15-10119@diu.edu.bd', '', 'read'),
(4, 'H', 'rakibh01739@gmail.com', 'hkj;j', 'read'),
(5, 'Vgujt', 'rakibh01739@gmail.com', '', 'read'),
(6, 'Vgujt', 'rakibh01739@gmail.com', '', 'read');

-- --------------------------------------------------------

--
-- Table structure for table `experiance`
--

CREATE TABLE `experiance` (
  `id` int(11) NOT NULL,
  `company_name` varchar(150) NOT NULL,
  `designation` varchar(150) NOT NULL,
  `duration` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experiance`
--

INSERT INTO `experiance` (`id`, `company_name`, `designation`, `duration`, `description`, `status`) VALUES
(1, 'Daffodil International University', 'Student', '2017-2021', 'From Daffodil International University I\'m doing Bsc in commnb m,puter science engineering.', 1),
(4, 'Creative IT', 'Student of Php', '2021', 'Facebook, Inc., is an American multinational technology company based in Menlo Park, California. It was founded in 2004 as TheFacebook by Mark Zuckerberg, Eduardo Saverin, Andrew McCollum, Dustin Moskovitz, and Chris Hughes, roommates and students at Harvard College', 1),
(12, 'Next topper', 'learner', '2021', 'here i am learning javaScript', 1);

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `id` int(11) NOT NULL,
  `field_name` varchar(50) NOT NULL,
  `value` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`id`, `field_name`, `value`, `status`) VALUES
(1, 'author', 'Rakib Hasan', 1),
(3, 'experience', '5', 1),
(5, 'mobile_number', '01769116608', 1),
(6, 'email', 'rakibh01739@gmail.com', 1),
(11, 'cv', 'CV of Md Rakib Hasan Mondal.pdf', 1);

-- --------------------------------------------------------

--
-- Table structure for table `latest_news`
--

CREATE TABLE `latest_news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `news_photo` varchar(150) NOT NULL,
  `news_details` text NOT NULL,
  `date` datetime NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `latest_news`
--

INSERT INTO `latest_news` (`id`, `title`, `news_photo`, `news_details`, `date`, `status`) VALUES
(13, 'web development', '2021-09-15_16-59-437655467709.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget augue ac ipsum sodales tempor. Nulla malesuada metus turpis, nec scelerisque lorem scelerisque ut. Sed ac tellus a augue laoreet fermentum. In et urna non orci ultricies ultrices in ac justo. Ut lorem nulla, ullamcorper sed ligula vitae, pharetra dignissim dolor. Sed commodo ornare felis. Nullam feugiat nec nisi nec pulvinar.\r\n\r\nPhasellus fermentum at sem ac ultrices. Nulla vel nisl facilisis, gravida eros eu, tincidunt ex. Donec quis nibh nec diam egestas suscipit. Nam vulputate volutpat pellentesque. Vestibulum quis nisl lectus. Mauris nec fringilla eros, pretium dignissim urna. Curabitur elementum luctus augue, in congue nisl finibus in. Nulla risus magna, lacinia sit amet elementum a, convallis eget sem. Proin justo nulla, molestie ac hendrerit mattis, sollicitudin at massa. Integer lacus turpis, dignissim a purus eu, laoreet rutrum ipsum. Maecenas pretium varius erat, ut malesuada turpis sollicitudin sed. Curabitur eu volutpat tortor. Mauris fermentum neque euismod orci vestibulum lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nSed ornare felis ac sem ultricies scelerisque. Nunc tempor velit ac libero finibus malesuada. Donec efficitur elit in sem gravida commodo. Cras interdum dui quam, vel luctus tellus porttitor id. Duis congue venenatis lacus sodales venenatis. In dictum eu nibh et mollis. Etiam erat urna, varius id nunc eget, faucibus accumsan purus. Donec porta congue est, et eleifend arcu malesuada quis. Suspendisse aliquam tellus a vulputate finibus. Aenean a feugiat libero. Fusce lorem risus, tristique in luctus accumsan, tempus sed purus. Mauris vestibulum quis libero elementum maximus. Praesent suscipit faucibus mattis. Nunc ut diam ac erat sodales facilisis quis quis ante. Curabitur at pellentesque est, in tristique lacus.\r\n\r\nInteger quis pulvinar tellus. Nam mattis, ipsum eu eleifend sagittis, ipsum magna vulputate dolor, nec eleifend metus ligula eu ipsum. Integer eleifend semper porta. Nam cursus odio sed ante rhoncus ultrices. Ut viverra euismod libero sed placerat. Vestibulum eu massa ipsum. Donec leo tortor, accumsan non aliquam cursus, iaculis eget tortor. Cras pharetra erat non placerat molestie. Cras congue mollis justo. Morbi feugiat feugiat lectus sed semper. Duis egestas justo nunc, eu condimentum est convallis eu. Etiam non auctor arcu, pellentesque gravida eros. Curabitur posuere sem et enim laoreet auctor. Nulla nec lectus non massa sodales bibendum sit amet in tortor. Suspendisse potenti. Etiam et molestie nibh, at rhoncus libero.\r\n\r\nSed aliquam magna nec blandit posuere. Etiam dolor dolor, feugiat eu massa ac, venenatis pulvinar justo. Donec feugiat non sem in hendrerit. Aliquam mollis vehicula enim, eget efficitur augue. Duis a molestie urna. Morbi quam ante, cursus eu tellus quis, malesuada dapibus purus. Quisque facilisis urna libero, et eleifend magna vehicula sed. Cras a cursus elit. Nulla facilisi. Nulla tempus risus a est gravida vehicula. Sed consequat dolor quam, accumsan viverra neque eleifend id. Morbi sed ornare nibh. Vivamus sodales nunc semper tortor sodales consectetur. Nunc et rhoncus massa.', '2021-09-15 16:59:43', 1),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget augue ac ipsum sodales tempor', '2021-09-20_08-45-54610186537.jpg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin eget augue ac ipsum sodales tempor. Nulla malesuada metus turpis, nec scelerisque lorem scelerisque ut. Sed ac tellus a augue laoreet fermentum. In et urna non orci ultricies ultrices in ac justo. Ut lorem nulla, ullamcorper sed ligula vitae, pharetra dignissim dolor. Sed commodo ornare felis. Nullam feugiat nec nisi nec pulvinar.\r\n\r\nPhasellus fermentum at sem ac ultrices. Nulla vel nisl facilisis, gravida eros eu, tincidunt ex. Donec quis nibh nec diam egestas suscipit. Nam vulputate volutpat pellentesque. Vestibulum quis nisl lectus. Mauris nec fringilla eros, pretium dignissim urna. Curabitur elementum luctus augue, in congue nisl finibus in. Nulla risus magna, lacinia sit amet elementum a, convallis eget sem. Proin justo nulla, molestie ac hendrerit mattis, sollicitudin at massa. Integer lacus turpis, dignissim a purus eu, laoreet rutrum ipsum. Maecenas pretium varius erat, ut malesuada turpis sollicitudin sed. Curabitur eu volutpat tortor. Mauris fermentum neque euismod orci vestibulum lobortis. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae;\r\n\r\nSed ornare felis ac sem ultricies scelerisque. Nunc tempor velit ac libero finibus malesuada. Donec efficitur elit in sem gravida commodo. Cras interdum dui quam, vel luctus tellus porttitor id. Duis congue venenatis lacus sodales venenatis. In dictum eu nibh et mollis. Etiam erat urna, varius id nunc eget, faucibus accumsan purus. Donec porta congue est, et eleifend arcu malesuada quis. Suspendisse aliquam tellus a vulputate finibus. Aenean a feugiat libero. Fusce lorem risus, tristique in luctus accumsan, tempus sed purus. Mauris vestibulum quis libero elementum maximus. Praesent suscipit faucibus mattis. Nunc ut diam ac erat sodales facilisis quis quis ante. Curabitur at pellentesque est, in tristique lacus.\r\n\r\nInteger quis pulvinar tellus. Nam mattis, ipsum eu eleifend sagittis, ipsum magna vulputate dolor, nec eleifend metus ligula eu ipsum. Integer eleifend semper porta. Nam cursus odio sed ante rhoncus ultrices. Ut viverra euismod libero sed placerat. Vestibulum eu massa ipsum. Donec leo tortor, accumsan non aliquam cursus, iaculis eget tortor. Cras pharetra erat non placerat molestie. Cras congue mollis justo. Morbi feugiat feugiat lectus sed semper. Duis egestas justo nunc, eu condimentum est convallis eu. Etiam non auctor arcu, pellentesque gravida eros. Curabitur posuere sem et enim laoreet auctor. Nulla nec lectus non massa sodales bibendum sit amet in tortor. Suspendisse potenti. Etiam et molestie nibh, at rhoncus libero.\r\n\r\nSed aliquam magna nec blandit posuere. Etiam dolor dolor, feugiat eu massa ac, venenatis pulvinar justo. Donec feugiat non sem in hendrerit. Aliquam mollis vehicula enim, eget efficitur augue. Duis a molestie urna. Morbi quam ante, cursus eu tellus quis, malesuada dapibus purus. Quisque facilisis urna libero, et eleifend magna vehicula sed. Cras a cursus elit. Nulla facilisi. Nulla tempus risus a est gravida vehicula. Sed consequat dolor quam, accumsan viverra neque eleifend id. Morbi sed ornare nibh. Vivamus sodales nunc semper tortor sodales consectetur. Nunc et rhoncus massa.', '2021-09-20 08:45:54', 1);

-- --------------------------------------------------------

--
-- Table structure for table `partners`
--

CREATE TABLE `partners` (
  `id` int(11) NOT NULL,
  `partner_name` varchar(50) NOT NULL,
  `partner_image` varchar(80) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `partners`
--

INSERT INTO `partners` (`id`, `partner_name`, `partner_image`, `status`) VALUES
(1, 'herrywood co', '2021-09-13_11-48-453064107375.', 1),
(2, 'Fastline', '2021-09-01_09-33-284885101301.png', 1),
(3, 'Golden', '2021-09-01_09-33-455167032444.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `project_name` varchar(50) NOT NULL,
  `project_type` varchar(50) NOT NULL,
  `clients` varchar(70) NOT NULL,
  `authors` varchar(70) NOT NULL,
  `budget` varchar(10) NOT NULL,
  `starting_date` date NOT NULL,
  `completation_date` date NOT NULL,
  `project_image` varchar(70) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `project_name`, `project_type`, `clients`, `authors`, `budget`, `starting_date`, `completation_date`, `project_image`, `status`) VALUES
(5, 'Ensuring fair price for the farmers', 'Multi vendor Ecommerce', 'Project internship commeete', 'Rakib hasan', '50000 tk', '2020-09-10', '2021-09-11', '2021-09-15_07-05-406592234775.jpg', 1),
(6, 'One page Dynamic Portfolio', 'personal', 'Creative It', 'Rakib Hasan', '10000tk', '2021-08-01', '2021-09-20', '2021-09-15_07-07-497982608238.jpg', 1),
(7, 'ToDo List', 'CRUD', 'Creative It', 'Rakib Hasan', '3000 tk', '2021-07-01', '2021-07-30', '2021-09-15_07-08-562413760195.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(30) NOT NULL,
  `parcentage` int(3) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill_name`, `parcentage`, `status`) VALUES
(2, 'HTML', 91, 1),
(5, 'CSS', 64, 1),
(7, 'Php', 43, 1),
(10, 'rakib\'s', 59, 1);

-- --------------------------------------------------------

--
-- Table structure for table `skill_details`
--

CREATE TABLE `skill_details` (
  `id` int(11) NOT NULL,
  `skill_name` varchar(50) NOT NULL,
  `icon` varchar(70) NOT NULL,
  `skill_description` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skill_details`
--

INSERT INTO `skill_details` (`id`, `skill_name`, `icon`, `skill_description`, `status`) VALUES
(1, 'HTML', 'logo-HTML5', 'The HyperText Markup Language, or HTML is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets and scripting languages such as JavaScript.', 1),
(2, 'CSS3', 'logo-css3', 'CSS3 is used with HTML to create and format content structure. It is responsible for colours, font properties, text alignments, background images, graphics, tables, etc. It provides the positioning of various elements with the values being fixed, absolute, and relative.3', 1),
(7, 'PHP', 'code-slash-outline', 'PHP is a general-purpose scripting language geared towards web development. It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `profile_link` varchar(255) NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`id`, `icon`, `profile_link`, `status`) VALUES
(2, 'logo-facebook', 'https://web.facebook.com/rakib.hasan.313924', 1),
(3, 'logo-linkedin', 'https://www.linkedin.com/in/rakib-hasan-a0b6291a3/', 1),
(4, 'logo-instagram', 'https://www.instagram.com/rakib_hasan_98/', 1),
(5, 'logo-twitter', '#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriber`
--

CREATE TABLE `subscriber` (
  `id` int(11) NOT NULL,
  `email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscriber`
--

INSERT INTO `subscriber` (`id`, `email`) VALUES
(3, 'rakibh01739@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `designation`, `comment`, `status`) VALUES
(3, 'Satya Nadella', 'CEO of Microsoft Corporation', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt quos itaque odit id', 1),
(8, 'Sundar Pichai', 'Google/CEO', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, veniam expedita obcaecati exercitat', 1),
(9, 'Satya Nadella', 'CEO of Microsoft', 'Satyanarayana Nadella is an Indian-born American business executive. He is the executive chairman and CEO of Microsoft, succeeding Steve Ballmer in 2014 as CEO and John W. Thompson in 2021 as', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_user`
--
ALTER TABLE `admin_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiance`
--
ALTER TABLE `experiance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `field_name` (`field_name`);

--
-- Indexes for table `latest_news`
--
ALTER TABLE `latest_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners`
--
ALTER TABLE `partners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skill_details`
--
ALTER TABLE `skill_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_user`
--
ALTER TABLE `admin_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `experiance`
--
ALTER TABLE `experiance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `latest_news`
--
ALTER TABLE `latest_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `partners`
--
ALTER TABLE `partners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `skill_details`
--
ALTER TABLE `skill_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
