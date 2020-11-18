-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 08:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `id` int(11) NOT NULL,
  `owner_name` varchar(255) NOT NULL,
  `owner_gender` varchar(255) NOT NULL,
  `owner_image` varchar(255) NOT NULL,
  `owner_email` varchar(255) NOT NULL,
  `owner_joined` varchar(255) NOT NULL,
  `owner_username` varchar(255) NOT NULL,
  `owner_password` varchar(255) NOT NULL,
  `owner_token` varchar(255) NOT NULL,
  `owner_otp` varchar(255) NOT NULL,
  `owner_two_step` varchar(255) NOT NULL,
  `owner_action` varchar(255) NOT NULL DEFAULT 'unblock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`id`, `owner_name`, `owner_gender`, `owner_image`, `owner_email`, `owner_joined`, `owner_username`, `owner_password`, `owner_token`, `owner_otp`, `owner_two_step`, `owner_action`) VALUES
(50, 'Rayhan Ahmed', 'male', '5f99139da814a.png', 'rayhanbd7075@gmail.com', '2020-09-23 09:26:09', 'saymon', '1900cdb2cb85012819721160d01f19f4', 'cb5654c557d332ca2026168b9bcdcfc9', '473334', 'off', 'unblock'),
(54, 'Emon', 'male', '5fa91d28efec6.jpg', 'rayhanbd7075@gmail.com', '2020-11-09 15:42:48', 'emon', '1900cdb2cb85012819721160d01f19f4', '2e39142440f2e8a31cc33af0b4880ff5', '144869', 'off', 'unblock');

-- --------------------------------------------------------

--
-- Table structure for table `owner_notification`
--

CREATE TABLE `owner_notification` (
  `id` int(11) NOT NULL,
  `n_title` varchar(255) NOT NULL,
  `n_desc` text NOT NULL,
  `n_time` varchar(255) NOT NULL,
  `n_type` varchar(255) NOT NULL,
  `n_seen` varchar(255) NOT NULL,
  `n_image` varchar(255) NOT NULL,
  `n_from` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sgst_word`
--

CREATE TABLE `sgst_word` (
  `id` int(11) NOT NULL,
  `main_sgst` varchar(255) NOT NULL,
  `related_sgst` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sgst_word`
--

INSERT INTO `sgst_word` (`id`, `main_sgst`, `related_sgst`) VALUES
(111, 'আলু', 'Alu alo allu Alu aalu Aallu allu'),
(112, 'পিয়াজ', 'piyag pyag ppyag piaj pyg pg'),
(113, 'তিব্বত বল সাবান', 'boll shaban tibbet tibet gulla kamal shaban saban'),
(114, 'কামাল সাবান', 'kamal gulla boll ball shaban saban'),
(115, 'তিব্বত ৫৭০ সাবান', 'tibbet 570 lal shaban saban ৫৭০'),
(116, 'হুইল সাবান', 'wheel shobuj unileaber shaban saban huil hweel'),
(117, '২০০ মার্কস  দুধ', '200 marks dud milk powder'),
(118, '৭৫ মার্কস  দুধ', 'marks 75 marks dud milk powder'),
(119, '৫০০ মার্কস  দুধ', 'marks 500 marks dud milk powder'),
(120, 'কার্ড', 'takar tekar minute mb  card kard'),
(121, 'ময়দা', 'moyda myda mayda mida mada'),
(122, 'আটা', 'ata aatta aata atta guri'),
(123, 'ডার্বি', 'darbi darvi Darve darvee'),
(124, 'পার্টনার', 'partner patner Patnar patnear'),
(125, 'আকিজ', 'akij akig ekig aakig aakij'),
(126, '৫০ তাজা চা', '50 taza taja ttaza taga tagga cha ca'),
(127, '১০০ তাজা চা', '100 taza taja taga ttaza tagga cha ca'),
(128, '২০০ তাজা চা', '200 taza atja taga taaza tagga cha ca taja'),
(129, '৪০০ তাজা চা', '400 taza taja taga tagga tajja tazza cha ca'),
(130, '৫০ সিলন চা', '50 silon cilon shilon chilon selon celon calon salon'),
(131, '১০০ সিলন চা', '100 silon cilon shilon chilon selon celon calon salon'),
(132, '২০০ সিলন চা', '200 silon cilon shilon chilon selon celon calon salon'),
(133, '৫০০ সিলন চা', '500 silon cilon shilon chilon selon celon calon salon'),
(134, '২০০ আমা দুধ', '200 ama amma ema aama dud milk powder'),
(135, '২০০ পিওর দুধ', '200 pior fior peor feor peaor pioar piya dud milk powder'),
(136, 'রসুন', 'roshun rosun rroushun rashun rasun raun rawn'),
(137, 'টাইগার ড্রিংক', 'tiger tigger drink cool drink'),
(138, 'স্পিড ড্রিংক', 'speed drink speed cool drink spped'),
(139, 'মজো ড্রিংক', 'mojo moju mogo mogu drink cold drink'),
(148, 'টাইগার মরিচ (৫০)', 'tiger 50 tigger tijer ttiger moric moris maris maric marich marish'),
(149, 'টাইগার মরিচ (১০০)', 'tigerr 100 tigger tijer ttiger moric moris maris maric marich marish'),
(150, 'টাইগার মরিচ (২০০)', 'tigerr 200 tigger tijer ttiger moric moris maris maric marich marish'),
(151, 'টাইগার মরিচ (৫০০)', 'tiger 500 tigger tijer ttiger moric moris maris maric marich marish'),
(152, 'টাইগার ধনিয়া (৫০)', 'tiger bakor  50 tigger tijer ttiger donia dhonia doniya dhoniya diniya daniya doinna dula bakor'),
(153, 'টাইগার ধনিয়া (১০০)', 'tiger bakor  100 tigger tijer ttiger donia dhonia doniya dhoniya diniya daniya doinna dula bakor'),
(154, 'টাইগার ধনিয়া (২০০)', 'tiger bakor 200 tigger tijer ttiger donia dhonia doniya dhoniya diniya daniya doinna dula bakor'),
(155, 'টাইগার ধনিয়া (৫০০)', 'tiger bakor  500 tigger tijer ttiger donia dhonia doniya dhoniya diniya daniya doinna dula bakor'),
(156, 'টাইগার হলুদ (৫০)', 'tiger 50 tigger tijer ttiger holud olud holudd hholud haloud halud'),
(157, 'টাইগার হলুদ (১০০)', 'tiger 100 tigger tijer ttiger holud olud holudd hholud haloud halud'),
(158, 'টাইগার হলুদ (২০০)', 'tiger 200 tigger tijer ttiger holud olud holudd hholud haloud halud'),
(159, 'টাইগার হলুদ (৫০০)', 'tiger 500 tigger tijer ttiger holud olud holudd hholud haloud halud'),
(160, 'টাইগার পাঁচপোড়ন (৫০)', 'tiger 50 tigger tijer ttiger pachpuron paspuron pashpuron pachpuron pachporon pasporon pacporon pacpuron'),
(161, 'টাইগার পাঁচপোড়ন (১০০)', 'tiger 100 tigger tijer ttiger pachpuron paspuron pashpuron pachpuron pachporon pasporon pacporon pacpuron'),
(162, 'টাইগার পাঁচপোড়ন (২০০)', 'tiger 200 tigger tijer ttiger pachpuron paspuron pashpuron pachpuron pachporon pasporon pacporon pacpuron'),
(201, 'কোক', 'cock cock coka cola kook cook kook kok kuk cuck drink'),
(202, 'স্প্রাইট', 'sprite sprit spite speed max cola coca cola drink'),
(203, 'ফান্টা', 'fanta Fanta panta funta fonta ffanta coca coal drink'),
(204, 'আদা', 'ada Ada adda aada'),
(205, 'কয়েল', 'koyel coyel koil coil coel koel jom gom elephent black fighter'),
(206, '২৫ আমা দুধ', '25 ama amma ema aama dud milk powder'),
(245, 'ghsghsg', 'amm');

-- --------------------------------------------------------

--
-- Table structure for table `store_settings`
--

CREATE TABLE `store_settings` (
  `id` int(11) NOT NULL,
  `setting_name` varchar(255) NOT NULL,
  `setting_password` varchar(255) NOT NULL,
  `setting_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `store_settings`
--

INSERT INTO `store_settings` (`id`, `setting_name`, `setting_password`, `setting_status`) VALUES
(1, 'store_code', '123456', 'off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_gender` varchar(50) NOT NULL,
  `user_address` varchar(255) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_token` varchar(255) NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `user_joined` varchar(255) NOT NULL,
  `user_due_limit` varchar(255) NOT NULL,
  `user_due_limit_date` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_otp` varchar(255) NOT NULL,
  `user_action` varchar(255) NOT NULL DEFAULT 'unblock',
  `user_last_pay` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `user_phone`, `user_gender`, `user_address`, `user_username`, `user_password`, `user_token`, `user_image`, `user_joined`, `user_due_limit`, `user_due_limit_date`, `user_email`, `user_otp`, `user_action`, `user_last_pay`) VALUES
(588, 'Amran', '79878978755', 'female', 'Puran Gaw', 'amrna', '1900cdb2cb85012819721160d01f19f4', 'c2f544015d56ed1888f0532f8a242bfb', '5fab8ee66c732.jpg', '2020-11-11 00:12:38', '', '', '', '', 'unblock', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_due`
--

CREATE TABLE `users_due` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `sold_date` varchar(255) NOT NULL,
  `sold_by` varchar(255) NOT NULL,
  `due_user_id` varchar(255) NOT NULL,
  `due_status` varchar(255) NOT NULL,
  `due_note` text NOT NULL,
  `due_paid_list` varchar(255) NOT NULL,
  `due_month_name` varchar(255) NOT NULL,
  `todays_collection` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_due`
--

INSERT INTO `users_due` (`id`, `product_name`, `product_price`, `sold_date`, `sold_by`, `due_user_id`, `due_status`, `due_note`, `due_paid_list`, `due_month_name`, `todays_collection`) VALUES
(1192, '২ কেজি আটা ', '60', '2020-11-11 03:23:10', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-11'),
(1193, 'Total due', '60', '2020-11-11 03:23:32', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-11'),
(1194, 'Pay amount', '50', '2020-11-11 03:23:32', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-11'),
(1195, 'Due amount', '10', '2020-11-11 03:23:32', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-11'),
(1196, 'sdgdsg', '120', '2020-11-11 03:32:06', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-11'),
(1197, 'dsgdsg', '150', '2020-11-11 03:32:07', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-11'),
(1198, 'Total due', '280', '2020-11-11 03:32:18', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-11'),
(1199, 'Pay amount', '280', '2020-11-11 03:32:18', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-11'),
(1200, 'Due amount', '0', '2020-11-11 03:32:18', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-11'),
(1201, '১ কেজি আলু ,২ কেজি আটা ,৫ কেজি পিয়াজ , ২০০ আমা দুধ , ২০০ মার্কস  দুধ ', '450', '2020-11-12 01:39:58', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-12'),
(1202, 'Total due', '450', '2020-11-12 01:40:09', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-12'),
(1203, 'Pay amount', '400', '2020-11-12 01:40:09', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-12'),
(1204, 'Due amount', '50', '2020-11-12 01:40:09', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-12'),
(1205, 'Total due', '50', '2020-11-14 03:43:01', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-14'),
(1206, 'Pay amount', '20', '2020-11-14 03:43:01', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-14'),
(1207, 'Due amount', '30', '2020-11-14 03:43:01', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-14'),
(1208, 'Total due', '30', '2020-11-14 03:47:10', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-14'),
(1209, 'Pay amount', '30', '2020-11-14 03:47:10', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-14'),
(1210, 'Due amount', '0', '2020-11-14 03:47:10', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-14'),
(1211, 'vv', '120', '2020-11-16 02:28:40', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-16'),
(1212, 'zxvzxv', '150', '2020-11-16 02:28:42', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-16'),
(1213, 'Total due', '270', '2020-11-16 02:28:47', 'Ex_saymon', '588', 'paid', '', 'spe_total', '11-2020', '2020-11-16'),
(1214, 'Pay amount', '250', '2020-11-16 02:28:47', 'Ex_saymon', '588', 'paid', '', 'spe_pay', '11-2020', '2020-11-16'),
(1215, 'Due amount', '20', '2020-11-16 02:28:47', 'Ex_saymon', '588', 'paid', '', 'spe_due', '11-2020', '2020-11-16'),
(1216, 'টাইগার হলুদ (১০০) ', '40', '2020-11-16 02:35:43', 'Ex_saymon', '588', 'paid', '', '', '11-2020', '2020-11-16'),
(1217, 'Total due', '60', '2020-11-18 00:10:46', 'Ex_saymon', '588', 'total_due', '', 'spe_total', '11-2020', '2020-11-18'),
(1218, 'Pay amount', '50', '2020-11-18 00:10:46', 'Ex_saymon', '588', 'pay_amount', '', 'spe_pay', '11-2020', '2020-11-18'),
(1219, 'Due amount', '10', '2020-11-18 00:10:46', 'Ex_saymon', '588', 'due', '', 'spe_due', '11-2020', '2020-11-18'),
(1220, '১ কেজি আলু ,২ কেজি আটা ', '450', '2020-11-18 00:12:28', 'Ex_saymon', '588', 'due', '', '', '11-2020', '2020-11-18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `owner_notification`
--
ALTER TABLE `owner_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sgst_word`
--
ALTER TABLE `sgst_word`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store_settings`
--
ALTER TABLE `store_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_due`
--
ALTER TABLE `users_due`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `owner`
--
ALTER TABLE `owner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `owner_notification`
--
ALTER TABLE `owner_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1928;

--
-- AUTO_INCREMENT for table `sgst_word`
--
ALTER TABLE `sgst_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `store_settings`
--
ALTER TABLE `store_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=589;

--
-- AUTO_INCREMENT for table `users_due`
--
ALTER TABLE `users_due`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1222;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
