-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 05:10 PM
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
-- Database: `project02`
--

-- --------------------------------------------------------

--
-- Table structure for table `applicants_table`
--

CREATE TABLE `applicants_table` (
  `id` int(11) NOT NULL,
  `applicantion_reference_number` varchar(11) NOT NULL,
  `Date_submitted` datetime NOT NULL DEFAULT current_timestamp(),
  `date_viewed` datetime NOT NULL DEFAULT current_timestamp(),
  `date_approved` datetime NOT NULL DEFAULT current_timestamp(),
  `disapproved_date` datetime NOT NULL DEFAULT current_timestamp(),
  `affiliation` varchar(25) NOT NULL,
  `school` varchar(100) NOT NULL,
  `email` varchar(40) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `house_number` varchar(25) NOT NULL,
  `Street` varchar(50) NOT NULL,
  `barangay` varchar(50) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Contact_number` varchar(20) NOT NULL,
  `valid_id` varchar(50) NOT NULL,
  `program` varchar(100) NOT NULL,
  `year_level` varchar(11) NOT NULL,
  `Essay` varchar(100) NOT NULL,
  `picture` varchar(100) NOT NULL,
  `Proof_of_Enrollment` varchar(100) NOT NULL,
  `School_ID` varchar(100) NOT NULL,
  `Report_Card` varchar(100) NOT NULL,
  `Barangay_Residency` varchar(100) NOT NULL,
  `Proof_of_Income` varchar(100) NOT NULL,
  `fileName` varchar(100) NOT NULL,
  `grade` varchar(11) NOT NULL,
  `isApproved` varchar(11) NOT NULL DEFAULT 'false',
  `scholar_type` varchar(25) NOT NULL,
  `assists_by` varchar(25) NOT NULL,
  `admin_full_name` varchar(25) NOT NULL,
  `get_allowance` varchar(25) NOT NULL DEFAULT 'false',
  `allowance_get_date` datetime NOT NULL DEFAULT current_timestamp(),
  `resubmit` varchar(25) NOT NULL DEFAULT 'false',
  `disapproved_message` longblob NOT NULL,
  `specific_disapproved_reason` varchar(400) NOT NULL,
  `valid_id_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `program_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `school_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `Essay_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `picture_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `Proof_of_Enrollment_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `School_ID_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `Report_Card_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `Barangay_Residency_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `Proof_of_Income_resubmit` varchar(11) NOT NULL DEFAULT 'false',
  `resubmit_message` varchar(1000) NOT NULL DEFAULT 'null'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `applicants_table`
--

INSERT INTO `applicants_table` (`id`, `applicantion_reference_number`, `Date_submitted`, `date_viewed`, `date_approved`, `disapproved_date`, `affiliation`, `school`, `email`, `full_name`, `house_number`, `Street`, `barangay`, `gender`, `Date_of_birth`, `Contact_number`, `valid_id`, `program`, `year_level`, `Essay`, `picture`, `Proof_of_Enrollment`, `School_ID`, `Report_Card`, `Barangay_Residency`, `Proof_of_Income`, `fileName`, `grade`, `isApproved`, `scholar_type`, `assists_by`, `admin_full_name`, `get_allowance`, `allowance_get_date`, `resubmit`, `disapproved_message`, `specific_disapproved_reason`, `valid_id_resubmit`, `program_resubmit`, `school_resubmit`, `Essay_resubmit`, `picture_resubmit`, `Proof_of_Enrollment_resubmit`, `School_ID_resubmit`, `Report_Card_resubmit`, `Barangay_Residency_resubmit`, `Proof_of_Income_resubmit`, `resubmit_message`) VALUES
(171, '23645b32ee', '2023-05-10 16:51:41', '2023-05-11 13:35:22', '2023-05-11 13:35:30', '2023-05-10 14:00:14', 'College', 'Polytechnic University of the Philippines', 'quiogueryanchristian@gmail.com', 'Ryan Christian Adan Quiogue ', '130', 'Willarey', 'Pinagbuhatan', 'Male', '2000-10-03', '09557331739', 'message_logo.png', 'BSCE', '', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'quiogueryanchristian@gmail.com', '90', 'true', 'New Applicant', 'qcptsumio@tip.edu.ph', 'Jeferson Andaya Borras', 'true', '2023-05-11 13:38:05', 'false', '', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'null'),
(174, '23645cc9d1', '2023-05-11 19:10:53', '2023-05-11 19:18:23', '2023-05-11 19:18:25', '2023-05-11 18:56:17', 'College', 'Technological Institute of the Philippines', 'analynbalog05@gmail.com', 'Analyn  Balog ', '1341', 'Augsburg', 'Rosario', 'Female', '2000-01-05', '09636283857', 'Certificate.png', 'BSCS', '', '', 'Certificate.png', 'GRADE.pdf', 'Certificate.png', 'Borras_Jeferson_FOR-OJT-DEPLOYMENT-SURVEY .pdf', 'Certificate.png', 'GRADE.pdf', 'analynbalog05@gmail.com', '', 'true', 'Renewal', 'qcptsumio@tip.edu.ph', 'Jeferson Andaya Borras', 'false', '2023-05-11 18:56:17', 'false', '', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'null'),
(180, '23645f1101', '2023-05-14 13:35:08', '2023-05-14 13:35:12', '2023-05-14 13:35:39', '2023-05-13 12:24:33', 'College', 'Technological Institute of the Philippines', 'angelborras05@gmail.com', 'Angel andaya Borras ', '26', 'Palosapis', 'Kalawaan', 'Female', '2001-01-14', '09453989955', 'message_logo.png', 'BSIT', '', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'angelborras05@gmail.com', '', 'true', 'New Applicant', 'jborras910@gmail.com', 'Jeferson andaya Borras', 'true', '2023-05-22 13:05:19', 'false', '', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', '<p>Please Resubmit the following documents&nbsp;</p><ul><li>School ID</li><li>Report Card</li></ul>'),
(184, '236460739a', '2023-05-14 13:43:05', '2023-05-14 13:44:41', '2023-05-14 13:37:30', '2023-05-14 13:44:51', 'College', 'Polytechnic University of the Philippines', 'rlyn4ndaya@gmail.com', 'Rlyn  Andaya ', '26', 'palosapis', 'San Joaquin', 'Male', '2001-09-10', '09192839121', 'message_logo.png', 'BSCS', '', '', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'message_logo.png', 'Borras_Jeferson_Resume.pdf', 'rlyn4ndaya@gmail.com', '', 'disapproved', 'Renewal', 'jborras910@gmail.com', 'Jeferson andaya Borras', 'false', '2023-05-14 13:37:30', 'false', 0x444953415050524f5645442054455354, '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', '<p>sadsad</p>'),
(198, '2364734ed5', '2023-05-28 20:53:41', '2023-05-28 20:54:30', '2023-05-28 20:53:41', '2023-05-28 20:54:43', 'College', 'Technological Institute of the Philippines', 'sisatmp+jepb8@gmail.com', 'Alessandra RECLOSADO Uson ', '10', 'Gloria', 'Pinagbuhatan', 'Female', '2000-12-03', '09050787623', '1914802_BORRAS_ID.jpg', 'BSIS', '4th Year', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'message_logo.png', 'Overall Cosultation March 2023 .pdf', 'sisatmp+jepb8@gmail.com', '', 'disapproved', 'New Applicant', 'jborras910@gmail.com', 'Jeferson andaya Borras', 'false', '2023-05-28 20:53:41', 'false', '', '-Not a Pasig resident for at least three (3) years <br>-Income of parents/guardians exceeds PHP20,000 <br>-Not currently enrolled<br>-Poor academic standing Failing to meet the minimum general average.', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'null'),
(199, '2364734fb3', '2023-05-28 20:57:23', '2023-05-28 20:57:29', '2023-05-28 20:57:23', '2023-05-28 20:57:42', 'College', 'Technological Institute of the Philippines', 'sumiocarlo@gmail.com', 'Carlo Peter Tenerife Sumio ', '12', 'kobkob', 'Bagong Katipunan', 'Male', '2000-12-12', '09664576287', 'Valid Id.jpg', 'BSCE', '5th Year', '', '1x1.png', 'Proof of Enrollment.pdf', 'School ID.jpg', 'Report Card.pdf', 'Barangay Residency.jpg', 'Proof of Income.pdf', 'sumiocarlo@gmail.com', '', 'disapproved', 'Renewal', 'jborras910@gmail.com', 'Jeferson andaya Borras', 'false', '2023-05-28 20:57:23', 'false', '', '-Having a grade of Failed, Incomplete, or Dropped. <br>-Competition with other applicants', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'null'),
(200, '23649bc746', '2023-06-28 13:38:14', '2023-06-28 13:38:14', '2023-06-28 13:38:14', '2023-06-28 13:38:14', 'College', 'Technological Institute of the Philippines', 'qjaborras01@tip.edu.ph', 'Jeff  Borras ', '26', 'Palosapis', 'Caniogan', '', '0000-00-00', '09602582150', 'Valid Id.jpg', 'BSIT', '4th Year', 'ESSAY.pdf', '1x1.png', 'Proof of Enrollment.pdf', 'School ID.jpg', 'Report Card.pdf', 'Barangay Residency.jpg', 'Proof of Income.pdf', 'qjaborras01@tip.edu.ph', '', 'false', 'New Applicant', 'jborras910@gmail.com', 'Jeferson andaya Borras', 'false', '2023-06-28 13:38:14', 'false', '', '', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'false', 'null');

-- --------------------------------------------------------

--
-- Table structure for table `faq_list`
--

CREATE TABLE `faq_list` (
  `id` int(11) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `faq_list`
--

INSERT INTO `faq_list` (`id`, `question`, `answer`) VALUES
(8, 'Paano mag pasa ng dokumento sa Iskolar?', 'Magpasa ng dokumento gamit ang Link na ito http://bit.ly/3ZaXyZm at piliin at ang kategoryo kung New Applicants o Renewal Applicants'),
(9, 'Kanino dapat nakapangalan ang Barangay Certificate?', '-Kailangan na sa mag-aaral nakapangalan ang Barangay Certificate. Sa ngayon na may restriction sa paglabas ng bata ay maaari namang ang magulang ang kumuha para sa mga anak. Kailangan din na nakalagay'),
(11, 'Ano ang mga maituturing na proof of income ng mga magulang?', '-Certificate of Employment na may kasamang compensation.\r\n-Kung hindi regular ang employment lalo na ngayong may pandemya ay maaaring magpasa ng Joint Affidavit ng mga magulang kung saan naka-declare '),
(12, 'Ano ang mga maituturing na proof of enrollment na pwedeng ipasa para sa application?', '-Enrollment letter mula sa school\r\n-Certification of enrollment mula sa school\r\n-Official Receipt noong nag-enroll\r\n-Certificate of early registration \r\n-Class assignment list\r\n-Kahit anong katibayan '),
(13, 'Bakit kasama ang Certificate of Voter Registration sa requirements?', '-Ang pagrehistro at pagboto ay kasama sa ating civic duty bilang Pilipino. Kaya naman kung ang scholar ay 18 anyos at pataas ay hinihikayat ang pagrerehistro para sa pagboto. \r\n-Minimum requirements para sa scholarship application ang proof of residence (barangay certification), grade (report card), at proof of enrollment, kaya naman pwedeng to follow lamang ang Certificate of Voter Registration para sa mga scholars na nasa voting age na. \r\n-Para naman sa mga wala pang 18 anyos ay hindi required ang pagpapasa ng Certificate of Voter Registration ng mga magulang.\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `middle_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `feedback` varchar(100) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `email`, `first_name`, `middle_name`, `last_name`, `feedback`, `date`) VALUES
(3, 'jborras910@gmail.com', 'jeferson', 'andaya', 'borras', 'Suggestions & Recommendations test', '2023-04-17 16:44:01'),
(4, 'jborras910@gmail.com', 'jeferson', 'andaya', 'borras', 'sadsdsa', '2023-04-17 16:51:54'),
(5, 'qjaborras01@tip.edu.ph', 'Jeferson', 'Andaya', 'Borras', 'asdsad', '2023-04-17 17:09:04'),
(6, 'jborras910@gmail.com', 'jeferson', 'andaya', 'borras', 'asdsadsa', '2023-04-17 17:09:49'),
(7, 'qjaborras01@tip.edu.ph', 'Jeferson', 'Andaya', 'Borras', 'rateresd', '2023-04-17 17:10:08'),
(8, 'jborras910@gmail.com', 'jeferson', '', 'borras', 'asdsadsadsadsa', '2023-04-18 02:21:35'),
(9, 'qjaborras01@tip.edu.ph', 'jeferson', '', 'borras', 'asdlsakdlsakdl;sad\r\nsadsadsdasdsad', '2023-04-18 11:38:07'),
(10, 'jborras910@gmail.com', 'jeferson', '', 'borras', 'test123', '2023-04-19 18:02:51'),
(11, 'angelborras05@gmail.com', 'Angel', 'andaya', 'Borras', 'DFFFFFFFFFFFFFFFFFS', '2023-04-19 20:27:33'),
(12, 'jborras910@gmail.com', 'jeferson', '', 'borras', 'sasadsad', '2023-04-23 01:35:06'),
(13, 'jborras910@gmail.com', 'Jeferson', 'Andaya', 'Borras', 'test123', '2023-05-02 01:16:08'),
(14, 'qcptsumio@tip.edu.ph', 'Carlo Peter', 'Tenerife', 'Sumio', 'asdas', '2023-05-07 19:14:38');

-- --------------------------------------------------------

--
-- Table structure for table `news_updates_table`
--

CREATE TABLE `news_updates_table` (
  `id` int(11) NOT NULL,
  `date` datetime DEFAULT current_timestamp(),
  `image` varchar(100) NOT NULL DEFAULT 'null',
  `title` varchar(100) NOT NULL DEFAULT 'null',
  `content` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_updates_table`
--

INSERT INTO `news_updates_table` (`id`, `date`, `image`, `title`, `content`) VALUES
(23, '2023-05-14 14:30:39', '63475488e39a21665619080311598739_437939225092457_5401847479996452300_n.jpg', 'ORIENTATION AND GENERAL ASSEMBLY', 0x2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c6835207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b20636f6c6f723a207267622833332c2033372c203431293b223e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e48616c6f7320352c3030302072656e6577616c207363686f6c61727320616e67206c756d61686f6b207361206b61756e612d756e6168616e6720666163652d746f2d66616365204f7269656e746174696f6e20616e642047656e6572616c20417373656d626c79206e672050617369672043697479205363686f6c6172732073696d756c61206e6f6f6e67206d61676b6170616e64656d79612e3c2f703e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e48696e6174692073612064616c6177616e672073657373696f6e732070617261206d6173206d6167696e67206d616e61676561626c6520616e672064616d69206e67207363686f6c617273206e612073756d61696c616c696d207361204f7269656e746174696f6e2061742047656e6572616c20417373656d626c79206e6761796f6e6720617261772c204f63746f6265722031312c20323032322ec2a03c2f703e3c70207374796c653d226d617267696e2d72696768743a203070783b206d617267696e2d6c6566743a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e54696e61746179616e67206161626f7420736120372c33373120616e67206b61627575616e672062696c616e67206e67207363686f6c617273206e6761796f6e6720415920323032322d323032332c206b617961206e616d616e20696c616e672062617463686573207061206e67204f7269656e746174696f6e2061742047656e6572616c20417373656d626c7920616e67206e616b6174616b64616e67206d6167616e6170206e6761796f6e6720627577616e2e3c2f703e3c2f68353e2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020),
(24, '2023-05-14 14:31:37', 'img3.png', 'PCS DONATION DRIVE', 0x3c703e2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c64697620636c6173733d2278646a32363672207831316935726e6d20786174323463722078316d683867307220783176766b627322207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b223e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e4b6179616e67206b6179612c2062617374612073616d61266e6273703b3c7370616e207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e3c2f7370616e3e73616d61213c2f6469763e3c2f6469763e3c64697620636c6173733d227831316935726e6d20786174323463722078316d683867307220783176766b62732078746c7679317322207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b223e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e48696e616d6f6e206d616e206e67207061677375626f6b2c207065726f2062756f20616e67206c6f6f62206861726170696e20616e756d616e67206461676f6b2e3c2f6469763e3c2f6469763e3c64697620636c6173733d227831316935726e6d20786174323463722078316d683867307220783176766b62732078746c7679317322207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b223e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e4e617269746f206e6120706f20616e6720726573756c7461206e67206174696e6720646f6e6174696f6e206472697665206e612067696e616e617020736120416e64612c20426f686f6c206e69746f6e67206e616b617261616e67206c696e67676f2070617261207361206d6761206e6173616c616e7461206e6720426167796f6e67204f64657474652e3c2f6469763e3c2f6469763e3c64697620636c6173733d227831316935726e6d20786174323463722078316d683867307220783176766b62732078746c7679317322207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b223e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e4d756c612073612062756d7562756f206e67206174696e672070726f6772616d612c206b616d6920706f2061792074616f73207075736f6e67206e61677061706173616c616d6174207361206d67612069736b6f6c6172206e61206e6167706161626f74206e67206b616e696c616e672074756c6f6e672e3c2f6469763e3c2f6469763e3c64697620636c6173733d227831316935726e6d20786174323463722078316d683867307220783176766b62732078746c7679317322207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20666f6e742d66616d696c793a204e756e69746f2c2073616e732d73657269663b223e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e4c6162616e2061742062616e676f6e2050696c6970696e6173213c2f6469763e3c646976206469723d226175746f22207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b223e3c6272207374796c653d226d617267696e3a203070783b2070616464696e673a203070783b207472616e736974696f6e3a20616c6c20302e387320656173652030733b207363726f6c6c2d6265686176696f723a20736d6f6f74683b20636f6c6f723a207267622833332c2033372c203431293b20666f6e742d73697a653a20323070783b223e3c2f6469763e3c2f6469763e2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020203c696672616d65206672616d65626f726465723d223022207372633d222f2f7777772e796f75747562652e636f6d2f656d6265642f5f476f534e61475f613667222077696474683d2236343022206865696768743d223336302220636c6173733d226e6f74652d766964656f2d636c6970223e3c2f696672616d653e3c2f703e),
(27, '2023-05-14 23:24:09', 'img4.png', 'sadsadsadsa', 0x3c703e6173667361647361643c2f703e),
(28, '2023-05-15 14:32:38', 'message_logo.png', 'TIPIANS', 0x20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c703e3c62723e3c2f703e2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020200d0a2020202020202020202020202020202020202020202020200d0a202020202020202020202020202020202020202020202020);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL DEFAULT 'null',
  `title` varchar(100) NOT NULL DEFAULT 'null',
  `content` longblob NOT NULL,
  `notActiveContent` longblob NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `image`, `title`, `content`, `notActiveContent`, `status`) VALUES
(1, 'Renewal_form', 'null', 'null', '', 0x2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c70207374796c653d22746578742d616c69676e3a206c6566743b223e3c62723e3c2f703e3c68323e536f72727920746865206170706c69636174696f6e20666f726d20666f722072656e6577616c206973206f766572c2a0c2a03c2f68323e3c68323e536f72727920746865206170706c69636174696f6e20666f726d20666f722072656e6577616c206973206f766572c2a0203c2f68323e3c68323e536f72727920746865206170706c69636174696f6e20666f726d20666f722072656e6577616c206973206f766572c2a0c2a03c2f68323e202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020, 'Notactive'),
(2, 'NewApplicants_form', 'null', 'null', '', 0x7465737474657374, 'active'),
(3, 'News_Page', 'null', 'null', 0x2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c6831207374796c653d22746578742d616c69676e3a2063656e7465723b20223e3c62723e3c2f68313e3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c62723e3c2f703e3c70207374796c653d22746578742d616c69676e3a2063656e7465723b223e3c62723e3c2f703e3c703e3c2f703e202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020, '', 'active'),
(4, 'Update_Page', 'null', 'null', 0x2020202020202020202020202020202020202020202020203c703e2020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c2f703e3c64697620636c6173733d227831316935726e6d20786174323463722078316d683867307220783176766b62732078646a3236367220783132366b39326122207374796c653d226d617267696e3a203070783b2077686974652d73706163653a207072652d777261703b206f766572666c6f772d777261703a20627265616b2d776f72643b20666f6e742d66616d696c793a2022207365676f653d22222075693d222220686973746f726963222c3d222220227365676f653d2222207569222c3d22222068656c7665746963612c3d222220617269616c2c3d22222073616e732d73657269663b3d222220636f6c6f723a3d22222072676228352c3d222220352c3d22222035293b3d222220666f6e742d73697a653a3d222220313570783b223d22223e3c646976206469723d226175746f22207374796c653d22666f6e742d66616d696c793a20696e68657269743b223e7465737431323361736473613c62723e3c2f6469763e3c2f6469763e20202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020202020203c62723e3c703e3c2f703e20202020202020202020202020202020, '', 'active'),
(5, 'Scholars_List', 'null', 'null', '', '', 'Notactive');

-- --------------------------------------------------------

--
-- Table structure for table `users_table`
--

CREATE TABLE `users_table` (
  `User_id` int(11) NOT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `Middle_Name` varchar(100) NOT NULL,
  `Suffix` varchar(5) NOT NULL,
  `house_number` varchar(11) NOT NULL,
  `Street` varchar(100) NOT NULL,
  `Unit` varchar(100) NOT NULL,
  `Building` varchar(50) NOT NULL,
  `Village` varchar(100) NOT NULL,
  `barangay` varchar(100) NOT NULL,
  `gender` varchar(11) NOT NULL,
  `Date_of_birth` varchar(25) NOT NULL,
  `Contact_number` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `user_type` varchar(40) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `Password` varchar(50) NOT NULL,
  `image` varchar(255) DEFAULT 'No-pic.webp',
  `verify_token` varchar(200) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no, 1=yes',
  `active_status` varchar(25) NOT NULL,
  `application_status` varchar(100) NOT NULL DEFAULT 'step_1',
  `Inbox` varchar(500) NOT NULL,
  `scholar_type` varchar(25) NOT NULL DEFAULT 'new'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_table`
--

INSERT INTO `users_table` (`User_id`, `first_name`, `last_name`, `Middle_Name`, `Suffix`, `house_number`, `Street`, `Unit`, `Building`, `Village`, `barangay`, `gender`, `Date_of_birth`, `Contact_number`, `Email`, `user_type`, `date_created`, `Password`, `image`, `verify_token`, `verify_status`, `active_status`, `application_status`, `Inbox`, `scholar_type`) VALUES
(37, 'Jeff', 'Borras', '', '', '26', 'Palosapis', '', '', '', 'Caniogan', '', '', '09602582150', 'qjaborras01@tip.edu.ph', 'Main_Admin', '0000-00-00 00:00:00', '11111111', '2x2.jpg', '487193f6f3f7f0a4bfebd383357a7a8f', 1, 'active', 'step_2', '', 'new'),
(185, 'Ryan Christian', 'Quiogue', 'Adan', '', '130', 'Willlarey', '', '', '', 'Pinagbuhatan', 'Male', '2000-10-11', '09075118001', 'qrcaquiogue@gmail.com', 'scholar', '2023-04-11 16:14:18', 'Test123#', 'asdsadsa.jpg', 'Done', 1, 'active', 'step_1', '', 'new'),
(187, 'Carlo Peter', 'Sumio', 'Tenerife', '', '0', '', '', '', '', '', '', '', '', 'qcptsumio@tip.edu.ph', 'scholar', '2023-04-15 13:05:22', 'TIP@qwerty19', 'IMG-1573.PNG', 'Done', 1, 'active', 'step_1', '', 'new'),
(190, 'jeferson', 'borras', 'andaya', '', '123', 'palosapis', '', '', '', 'Kalawaan', 'Male', '2001-09-10', '09234589452', 'jboarras910@gmail.com', 'scholar', '2023-04-15 22:44:09', 'jboarras910@gmail.comA', 'No-pic.webp', 'f25cb49c03bdd6a80fd09b370aa8fe65', 0, 'active', 'step_1', '', 'new'),
(191, 'Analyn', 'Balog', '', '', '1341', 'Augsburg', '', '', '', 'Rosario', 'Female', '2000-01-05', '09636283857', 'analynbalog05@gmail.com', 'scholar', '2023-04-16 00:10:15', 'Acapricorn_05B&', 'inbound6896438865021778114.jpg', 'Done', 1, 'active', 'step_4', '', 'renewal'),
(192, 'Angel', 'Borras', 'andaya', '', '26', 'Palosapis', '', '', '', 'Kalawaan', 'Female', '2001-01-14', '09453989955', 'angelborras05@gmail.com', 'scholar', '2023-04-19 20:26:34', 'Password123@', '1x1.jpeg', 'Done', 1, 'active', 'step_4', '', 'renewal'),
(193, 'Carlo Peter', 'Sumio', 'Tenerife', '', '12', 'kobkob', '', '', '', 'Bagong Katipunan', 'Male', '2000-12-12', '09664576287', 'sumiocarlo@gmail.com', 'scholar', '2023-04-19 21:31:51', 'Test123#', 'ry.jpg', 'Done', 1, 'active', 'failed', '', 'renewal'),
(194, 'Alessandra', 'Uson', 'RECLOSADO', '', '10', 'Gloria', '', '', '', 'Pinagbuhatan', 'Female', '2000-12-03', '09050787623', 'sisatmp+jepb8@gmail.com', 'scholar', '2023-04-20 14:02:34', 'Test123#', 'No-pic.webp', 'Done', 1, 'active', 'failed', '', 'new'),
(195, 'Ryan Christian', 'Quiogue', 'Adan', '', '130', 'Willarey', '', '', '', 'Pinagbuhatan', 'Male', '2000-10-03', '09557331739', 'quiogueryanchristian@gmail.com', 'scholar', '2023-04-20 16:47:55', 'Test123#', 'No-pic.webp', 'Done', 1, 'active', 'step_4', '', 'renewal'),
(197, 'jeferson', 'borras', 'andaya', '', '90', 'palosapis', '', '', '', 'Bagong Katipunan', 'Male', '1998-09-10', '09823456789', '2seokcollab@gmail.com', 'scholar', '2023-05-02 21:58:38', '2seokcollab@gmail.comA', 'No-pic.webp', '1153faeb154375718974d1355efa1704', 0, 'active', 'step_1', '', 'new'),
(198, 'Ryan Christian', 'Quiogue', 'Adan', '', '130', 'Willarey', '', '', '', 'Pinagbuhatan', 'Male', '2000-10-03', '09075118003', 'ryquiogue2000@gmail.com', 'scholar', '2023-05-03 09:53:00', 'Test123#', 'No-pic.webp', '174d6a1a00a09e7e7425fafffb467753', 0, 'active', 'step_1', '', 'new'),
(201, 'JEFERSON', 'BORRAS', 'ANDAYA', '', '12', 'aSAsaS', '121', 'SADSAJD', 'SADSAD', 'Sta. Rosa', 'Female', '2023-05-09', '09198237471', 'jborras9112340@gmail.com', 'scholar', '2023-05-09 14:59:00', 'jborras910@gmail.comA', 'No-pic.webp', 'ac7d36d6342bfebfa9285ce5c57b4203', 0, 'active', 'step_1', '', 'new'),
(203, 'Jeferson', 'Borras', '', '', '26', 'palosapis', '', '', '', 'San Joaquin', 'Male', '2001-09-10', '09881739212', 'rlyn4ndaya@gmail.com', 'scholar', '2023-05-10 12:13:09', 'Test123@', 'ID_PIC.jpg', 'Done', 1, 'active', 'failed', '', 'renewal'),
(204, 'Jeferson', 'Borras', 'andaya', '', '26', 'palosapis', '', '', '', 'Pineda', 'Male', '2001-09-10', '09123495812', 'jborras910@gmail.com', 'Evaluator', '2023-05-11 19:31:20', 'jborras910@gmail.comA', '1x1.png', 'f2c939d8a16dcb841c009dffc00ab1e1', 1, 'active', 'step_1', '', 'renewal'),
(205, 'Test', 'Test', 'Test', '', '130', 'Willarey', '130', 'Test', 'asdada', 'Pinagbuhatan', 'Male', '2000-10-03', '09065114003', 'n.i.tyaan.a.n.thar.aman187@gmail.com', 'scholar', '2023-05-13 13:44:50', 'Test1234#', '1-1.JPG', 'b6033efe2fdb78ecda358cbd605e097a', 1, 'active', 'step_1', '', 'renewal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applicants_table`
--
ALTER TABLE `applicants_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faq_list`
--
ALTER TABLE `faq_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_updates_table`
--
ALTER TABLE `news_updates_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`User_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicants_table`
--
ALTER TABLE `applicants_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=201;

--
-- AUTO_INCREMENT for table `faq_list`
--
ALTER TABLE `faq_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news_updates_table`
--
ALTER TABLE `news_updates_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users_table`
--
ALTER TABLE `users_table`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
