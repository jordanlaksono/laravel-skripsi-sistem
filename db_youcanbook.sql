/*
Navicat MySQL Data Transfer

Source Server         : SERVER_LARAGON
Source Server Version : 50724
Source Host           : 127.0.0.1:3306
Source Database       : db_youcanbook

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2021-09-17 09:08:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for events
-- ----------------------------
DROP TABLE IF EXISTS `events`;
CREATE TABLE `events` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` char(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` char(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allDay` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fc_kdbooking` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_booking_start` time DEFAULT NULL,
  `fc_booking_end` time DEFAULT NULL,
  `fd_date_book` date DEFAULT NULL,
  `fc_kdjam` char(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kdusers_dosen` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_link_google_meet` text COLLATE utf8mb4_unicode_ci,
  `fc_approve` char(1) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of events
-- ----------------------------
INSERT INTO `events` VALUES ('1', 'Konsultasi', '2021-04-19 08:00:00', '2021-04-19 09:00:00', null, '2021-04-20 07:08:52', null, '00000001', '08:00:00', '09:00:00', '2021-04-19', 'B', '0004', '0005', 'www.google.com', 'B');
INSERT INTO `events` VALUES ('2', 'Skripsi', '2021-04-20 14:00:00', '2021-04-20 15:00:00', null, '2021-04-20 07:18:49', null, '00000002', '14:00:00', '15:00:00', '2021-04-20', 'B', '0004', '0005', 'www.google.com', 'B');
INSERT INTO `events` VALUES ('3', 'Konsul Bab 1', '2021-04-21 14:00:00', '2021-04-21 16:00:00', null, '2021-04-20 07:40:26', null, '00000003', '14:00:00', '16:00:00', '2021-04-21', 'B', '0004', '0005', 'www.google.com', 'B');
INSERT INTO `events` VALUES ('4', 'Konsultasi Pemahaman', '2021-04-21 16:00:00', '2021-04-21 17:00:00', null, '2021-04-20 08:00:54', null, '00000004', '16:00:00', '17:00:00', '2021-04-21', 'A', '0004', '0001', 'liquid', 'Y');
INSERT INTO `events` VALUES ('5', 'Konsultasi', '2021-04-22 08:00:00', '2021-04-22 10:00:00', null, '2021-04-22 15:04:28', null, '00000005', '08:00:00', '10:00:00', '2021-04-22', 'B', '0004', '0005', 'www.google.com', 'Y');
INSERT INTO `events` VALUES ('6', 'pengujian', '2021-08-30 11:00:00', '2021-08-30 12:00:00', null, '2021-08-30 05:00:38', null, '00000006', '11:00:00', '12:00:00', '2021-08-30', 'A', '0004', '0008', 'www.google.com', 'B');
INSERT INTO `events` VALUES ('9', 'test', '2021-08-31 11:00:00', '2021-08-31 12:00:00', null, '2021-08-31 04:21:27', null, '00000008', '11:00:00', '12:00:00', '2021-08-31', 'A', '0009', '0008', 'www.google.com', 'B');
INSERT INTO `events` VALUES ('10', 'test', '2021-08-31 13:00:00', '2021-08-31 14:00:00', null, '2021-08-31 04:22:31', null, '00000009', '13:00:00', '14:00:00', '2021-08-31', 'A', '0009', '0008', 'www.google.com', 'B');

-- ----------------------------
-- Table structure for events_temp
-- ----------------------------
DROP TABLE IF EXISTS `events_temp`;
CREATE TABLE `events_temp` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start` char(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `end` char(225) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `allDay` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `fc_kdbooking` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kddetbooking` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_booking_start` time DEFAULT NULL,
  `fc_booking_end` time DEFAULT NULL,
  `fd_date_book` date DEFAULT NULL,
  `fc_kdjam` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kdusers_dosen` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_kdbooking_temp` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of events_temp
-- ----------------------------
INSERT INTO `events_temp` VALUES ('9', null, '2021-08-31 11:00:00', '2021-08-31 12:00:00', null, '2021-08-31 04:21:27', null, '00000008', null, '11:00:00', '12:00:00', '2021-08-31', 'A', '0008', '0009', '00000001');
INSERT INTO `events_temp` VALUES ('10', null, '2021-08-31 13:00:00', '2021-08-31 14:00:00', null, '2021-08-31 04:22:31', null, '00000009', null, '13:00:00', '14:00:00', '2021-08-31', 'A', '0008', '0009', '00000002');

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2021_03_25_060242_create_mahasiswa_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for td_availability
-- ----------------------------
DROP TABLE IF EXISTS `td_availability`;
CREATE TABLE `td_availability` (
  `fn_availability` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kddays` char(15) DEFAULT NULL,
  `fc_kdjam` char(15) DEFAULT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`fn_availability`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of td_availability
-- ----------------------------
INSERT INTO `td_availability` VALUES ('1', '02', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('18', '01', 'A', '0005', '0');
INSERT INTO `td_availability` VALUES ('19', '03', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('20', '04', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('21', '05', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('22', '06', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('23', '07', 'A', '0005', '1');
INSERT INTO `td_availability` VALUES ('24', '01', 'B', '0005', '0');
INSERT INTO `td_availability` VALUES ('25', '02', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('26', '03', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('27', '04', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('28', '05', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('29', '06', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('30', '07', 'B', '0005', '1');
INSERT INTO `td_availability` VALUES ('31', '01', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('32', '02', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('33', '03', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('34', '04', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('35', '05', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('36', '06', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('37', '07', 'A', '0001', '1');
INSERT INTO `td_availability` VALUES ('38', '01', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('39', '02', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('40', '03', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('41', '04', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('42', '05', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('43', '06', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('44', '07', 'A', '0008', '1');
INSERT INTO `td_availability` VALUES ('45', '01', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('46', '02', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('47', '03', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('48', '04', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('49', '05', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('50', '06', 'B', '0008', '1');
INSERT INTO `td_availability` VALUES ('51', '07', 'B', '0008', '1');

-- ----------------------------
-- Table structure for td_duration
-- ----------------------------
DROP TABLE IF EXISTS `td_duration`;
CREATE TABLE `td_duration` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `fn_id_jam` int(11) DEFAULT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fv_keterangan` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of td_duration
-- ----------------------------
INSERT INTO `td_duration` VALUES ('1', '1', '0005', 'In');
INSERT INTO `td_duration` VALUES ('2', '2', '0005', 'In');
INSERT INTO `td_duration` VALUES ('3', '3', '0005', 'In');
INSERT INTO `td_duration` VALUES ('4', '4', '0005', 'Break');
INSERT INTO `td_duration` VALUES ('5', '5', '0005', 'Break');
INSERT INTO `td_duration` VALUES ('6', '6', '0005', 'In');
INSERT INTO `td_duration` VALUES ('7', '7', '0005', 'In');
INSERT INTO `td_duration` VALUES ('8', '8', '0005', 'In');
INSERT INTO `td_duration` VALUES ('9', '9', '0005', 'In');
INSERT INTO `td_duration` VALUES ('10', '10', '0005', 'In');
INSERT INTO `td_duration` VALUES ('11', '11', '0005', 'Break');
INSERT INTO `td_duration` VALUES ('12', '12', '0005', 'In');
INSERT INTO `td_duration` VALUES ('13', '13', '0005', 'In');
INSERT INTO `td_duration` VALUES ('14', '1', '0001', 'In');
INSERT INTO `td_duration` VALUES ('15', '2', '0001', 'In');
INSERT INTO `td_duration` VALUES ('16', '3', '0001', 'In');
INSERT INTO `td_duration` VALUES ('17', '4', '0001', 'In');
INSERT INTO `td_duration` VALUES ('18', '5', '0001', 'In');
INSERT INTO `td_duration` VALUES ('19', '6', '0001', 'In');
INSERT INTO `td_duration` VALUES ('20', '7', '0001', 'In');
INSERT INTO `td_duration` VALUES ('21', '8', '0001', 'In');
INSERT INTO `td_duration` VALUES ('22', '9', '0001', 'In');
INSERT INTO `td_duration` VALUES ('23', '1', '0007', 'In');
INSERT INTO `td_duration` VALUES ('24', '2', '0007', 'In');
INSERT INTO `td_duration` VALUES ('25', '3', '0007', 'In');
INSERT INTO `td_duration` VALUES ('26', '4', '0007', 'In');
INSERT INTO `td_duration` VALUES ('27', '5', '0007', 'In');
INSERT INTO `td_duration` VALUES ('28', '6', '0007', 'In');
INSERT INTO `td_duration` VALUES ('29', '7', '0007', 'In');
INSERT INTO `td_duration` VALUES ('30', '8', '0007', 'In');
INSERT INTO `td_duration` VALUES ('31', '9', '0007', 'In');
INSERT INTO `td_duration` VALUES ('32', '10', '0007', 'In');
INSERT INTO `td_duration` VALUES ('33', '11', '0007', 'In');
INSERT INTO `td_duration` VALUES ('34', '12', '0007', 'In');
INSERT INTO `td_duration` VALUES ('35', '13', '0007', 'In');
INSERT INTO `td_duration` VALUES ('36', '1', '0008', 'In');
INSERT INTO `td_duration` VALUES ('37', '2', '0008', 'In');
INSERT INTO `td_duration` VALUES ('38', '3', '0008', 'In');
INSERT INTO `td_duration` VALUES ('39', '4', '0008', 'In');
INSERT INTO `td_duration` VALUES ('40', '5', '0008', 'In');
INSERT INTO `td_duration` VALUES ('41', '6', '0008', 'In');
INSERT INTO `td_duration` VALUES ('42', '7', '0008', 'In');
INSERT INTO `td_duration` VALUES ('43', '8', '0008', 'In');
INSERT INTO `td_duration` VALUES ('44', '9', '0008', 'In');
INSERT INTO `td_duration` VALUES ('45', '10', '0008', 'In');
INSERT INTO `td_duration` VALUES ('46', '11', '0008', 'In');
INSERT INTO `td_duration` VALUES ('47', '12', '0008', 'In');
INSERT INTO `td_duration` VALUES ('48', '13', '0008', 'In');

-- ----------------------------
-- Table structure for tm_booking
-- ----------------------------
DROP TABLE IF EXISTS `tm_booking`;
CREATE TABLE `tm_booking` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers` char(30) DEFAULT NULL,
  `fc_kdbooking` char(30) DEFAULT NULL,
  `fc_title_booking` varchar(100) DEFAULT NULL,
  `fc_booking_link` char(100) DEFAULT NULL,
  `fv_logo` text,
  `fc_sts` char(1) DEFAULT NULL,
  `fv_ket` text,
  `fv_password` text,
  `fd_date` date DEFAULT NULL,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_booking
-- ----------------------------
INSERT INTO `tm_booking` VALUES ('5', '0001', '00000003', 'elecomp', 'bookingelecomp', 'elecomp.jpg', '1', 'Booking jadwal', '', '2021-04-03');
INSERT INTO `tm_booking` VALUES ('6', '0001', '00000004', 'Tugas', 'TugasNegara', 'Tugas.jpg', '1', null, null, '2021-04-03');
INSERT INTO `tm_booking` VALUES ('7', '0001', '00000005', 'Belajar', 'Belajar', null, null, null, null, '2021-04-12');
INSERT INTO `tm_booking` VALUES ('8', '0001', '00000006', 'Tugas', 'Tugas', null, '1', null, null, '2021-04-12');

-- ----------------------------
-- Table structure for tm_days
-- ----------------------------
DROP TABLE IF EXISTS `tm_days`;
CREATE TABLE `tm_days` (
  `fc_kddays` char(15) NOT NULL,
  `fv_days` varchar(255) DEFAULT NULL,
  `fc_sts_aktif` char(1) DEFAULT NULL,
  PRIMARY KEY (`fc_kddays`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_days
-- ----------------------------
INSERT INTO `tm_days` VALUES ('01', 'Sunday', '1');
INSERT INTO `tm_days` VALUES ('02', 'Monday', '1');
INSERT INTO `tm_days` VALUES ('03', 'Tuesday', '1');
INSERT INTO `tm_days` VALUES ('04', 'Wednesday', '1');
INSERT INTO `tm_days` VALUES ('05', 'Thursday', '1');
INSERT INTO `tm_days` VALUES ('06', 'Friday', '1');
INSERT INTO `tm_days` VALUES ('07', 'Saturday', '1');

-- ----------------------------
-- Table structure for tm_jam_dosen
-- ----------------------------
DROP TABLE IF EXISTS `tm_jam_dosen`;
CREATE TABLE `tm_jam_dosen` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdjam` char(20) DEFAULT NULL,
  `ft_jam_start` time DEFAULT NULL,
  `fc_duration` char(30) DEFAULT NULL,
  `fv_ket` text,
  `fc_sts` char(1) DEFAULT NULL,
  `fn_menit` int(11) DEFAULT NULL,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_jam_dosen
-- ----------------------------
INSERT INTO `tm_jam_dosen` VALUES ('1', 'A', '08:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('2', 'A', '09:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('3', 'A', '10:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('4', 'A', '11:00:00', '1 Jam', 'Break', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('5', 'A', '12:00:00', '1 Jam', 'Break', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('6', 'A', '13:00:00', '1 Jam', 'Break', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('7', 'A', '14:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('8', 'A', '15:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('9', 'A', '16:00:00', '1 Jam', 'In', '1', '60');
INSERT INTO `tm_jam_dosen` VALUES ('10', 'B', '08:00:00', '2 Jam', 'In', '1', '120');
INSERT INTO `tm_jam_dosen` VALUES ('11', 'B', '10:00:00', '2 Jam', 'In', '1', '120');
INSERT INTO `tm_jam_dosen` VALUES ('12', 'B', '12:00:00', '2 Jam', 'In', '1', '120');
INSERT INTO `tm_jam_dosen` VALUES ('13', 'B', '14:00:00', '2 Jam', 'In', '1', '120');

-- ----------------------------
-- Table structure for tm_level
-- ----------------------------
DROP TABLE IF EXISTS `tm_level`;
CREATE TABLE `tm_level` (
  `fc_kdlevel` char(15) NOT NULL,
  `fv_level` char(30) DEFAULT NULL,
  PRIMARY KEY (`fc_kdlevel`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_level
-- ----------------------------
INSERT INTO `tm_level` VALUES ('1', 'Admin');
INSERT INTO `tm_level` VALUES ('2', 'Mahasiswa');
INSERT INTO `tm_level` VALUES ('3', 'Dosen');

-- ----------------------------
-- Table structure for tm_question
-- ----------------------------
DROP TABLE IF EXISTS `tm_question`;
CREATE TABLE `tm_question` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_type` char(30) DEFAULT NULL,
  `fv_label` varchar(255) DEFAULT NULL,
  `fv_shorthand_code` varchar(255) DEFAULT NULL,
  `fc_required` char(1) DEFAULT NULL,
  `fv_name` char(30) DEFAULT '0',
  `fc_kdbooking` char(30) DEFAULT NULL,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of tm_question
-- ----------------------------
INSERT INTO `tm_question` VALUES ('1', 'SIMPLE', 'Nama', 'Nama', '1', null, null);
INSERT INTO `tm_question` VALUES ('2', 'SIMPLE', 'Jurusan', 'Jurusan', '0', null, null);
INSERT INTO `tm_question` VALUES ('3', 'SIMPLE', 'Email', 'Email', '0', null, null);
INSERT INTO `tm_question` VALUES ('14', 'SIMPLE', 'Link', 'Link', '0', '0', null);
INSERT INTO `tm_question` VALUES ('15', 'PARAGRAPH', 'Urgensi', 'Urgensi', '0', '0', null);

-- ----------------------------
-- Table structure for t_after_booking
-- ----------------------------
DROP TABLE IF EXISTS `t_after_booking`;
CREATE TABLE `t_after_booking` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdbooking` char(30) DEFAULT NULL,
  `fv_isi` text,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_after_booking
-- ----------------------------
INSERT INTO `t_after_booking` VALUES ('1', '00000003', 'Thanks , You\'ll receive a notification confirming the meeting details shortly.');
INSERT INTO `t_after_booking` VALUES ('2', '00000004', 'Thanks , You\'ll receive a notification confirming the meeting details shortly.rrr');
INSERT INTO `t_after_booking` VALUES ('3', '00000005', 'Thanks , You will receive a notification confirming the meeting details shortly.');
INSERT INTO `t_after_booking` VALUES ('4', '00000006', 'Thanks , You will receive a notification confirming the meeting details shortly.');

-- ----------------------------
-- Table structure for t_check_p0
-- ----------------------------
DROP TABLE IF EXISTS `t_check_p0`;
CREATE TABLE `t_check_p0` (
  `id` int(11) NOT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fn_jumlah_approve_bab` mediumint(6) DEFAULT NULL,
  `fn_jumlah_bimbingan` mediumint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_check_p0
-- ----------------------------

-- ----------------------------
-- Table structure for t_check_p1
-- ----------------------------
DROP TABLE IF EXISTS `t_check_p1`;
CREATE TABLE `t_check_p1` (
  `id` int(11) NOT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fn_jumlah_approve_bab` mediumint(6) DEFAULT NULL,
  `fn_jumlah_bimbingan` mediumint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_check_p1
-- ----------------------------

-- ----------------------------
-- Table structure for t_check_p2
-- ----------------------------
DROP TABLE IF EXISTS `t_check_p2`;
CREATE TABLE `t_check_p2` (
  `id` int(11) NOT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fn_jumlah_approve_bab` mediumint(6) DEFAULT NULL,
  `fn_jumlah_bimbingan` mediumint(6) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_check_p2
-- ----------------------------

-- ----------------------------
-- Table structure for t_confirm_booking
-- ----------------------------
DROP TABLE IF EXISTS `t_confirm_booking`;
CREATE TABLE `t_confirm_booking` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kddetbooking` char(30) DEFAULT NULL,
  `fc_kdbooking` char(30) DEFAULT NULL,
  `fc_kdusers` char(20) DEFAULT NULL,
  `fv_urgensi` varchar(225) DEFAULT NULL,
  `fd_date` date DEFAULT NULL,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_confirm_booking
-- ----------------------------
INSERT INTO `t_confirm_booking` VALUES ('2', '000006', '00000003', '0004', 'perlu konsultasi', '2021-04-05');
INSERT INTO `t_confirm_booking` VALUES ('3', '000008', '00000003', '0004', 'konsultasi tugas akhir', '2021-04-05');
INSERT INTO `t_confirm_booking` VALUES ('4', '000006', '00000003', '0004', 'makan', '2021-04-05');
INSERT INTO `t_confirm_booking` VALUES ('5', '000011', '00000004', '0004', 'Konsultasi', '2021-04-13');
INSERT INTO `t_confirm_booking` VALUES ('6', '000013', '00000004', '0004', 'Coba', '2021-04-13');
INSERT INTO `t_confirm_booking` VALUES ('7', null, null, '0004', 'Konsul', '2021-04-13');
INSERT INTO `t_confirm_booking` VALUES ('8', null, null, '0004', 'Konsul', '2021-04-13');

-- ----------------------------
-- Table structure for t_informasi_pembimbing
-- ----------------------------
DROP TABLE IF EXISTS `t_informasi_pembimbing`;
CREATE TABLE `t_informasi_pembimbing` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_informasi_pembimbing
-- ----------------------------
INSERT INTO `t_informasi_pembimbing` VALUES ('2', '0009', '0008');
INSERT INTO `t_informasi_pembimbing` VALUES ('3', '0010', '0008');

-- ----------------------------
-- Table structure for t_log
-- ----------------------------
DROP TABLE IF EXISTS `t_log`;
CREATE TABLE `t_log` (
  `fn_id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fd_date_kegiatan` date DEFAULT NULL,
  `ft_jam_mulai` time DEFAULT NULL,
  `ft_jam_selesai` time DEFAULT NULL,
  `fv_lokasi` varchar(100) DEFAULT NULL,
  `fv_uraian` text,
  PRIMARY KEY (`fn_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_log
-- ----------------------------
INSERT INTO `t_log` VALUES ('1', '0008', '0010', '2021-08-31', '12:48:00', '14:48:00', 'kelas a', 'penjelasan');
INSERT INTO `t_log` VALUES ('2', '0008', '0009', '2021-09-01', '14:49:00', '16:49:00', 'kelas b', 'kelas');
INSERT INTO `t_log` VALUES ('3', '0008', '0009', '2021-09-01', '14:49:00', '16:49:00', 'kelas b', 'kelas');
INSERT INTO `t_log` VALUES ('4', '0008', '0010', '2021-09-15', '13:18:00', '15:19:00', 'kelas a', 'konsultasi');
INSERT INTO `t_log` VALUES ('5', '0008', '0010', '2021-09-15', '15:22:00', '13:24:00', 'kelas a', 'konsultasi');

-- ----------------------------
-- Table structure for t_log_skripsi
-- ----------------------------
DROP TABLE IF EXISTS `t_log_skripsi`;
CREATE TABLE `t_log_skripsi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `log` text,
  `status_log` text,
  `date_log` date DEFAULT NULL,
  `time_log` time DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_log_skripsi
-- ----------------------------
INSERT INTO `t_log_skripsi` VALUES ('17', '0010', 'Pengajuan Dokumen P0', 'Diproses', '2021-09-14', '02:47:29');
INSERT INTO `t_log_skripsi` VALUES ('18', '0010', 'Validasi P0', 'Divalidasi', '2021-09-14', '05:56:51');
INSERT INTO `t_log_skripsi` VALUES ('19', '0010', 'Pengajuan Dokumen P1', 'Diproses', '2021-09-14', '06:18:15');
INSERT INTO `t_log_skripsi` VALUES ('20', '0010', 'Validasi P0', 'Divalidasi', '2021-09-14', '06:20:04');
INSERT INTO `t_log_skripsi` VALUES ('21', '0010', 'Pengajuan Dokumen P2', 'Diproses', '2021-09-14', '06:23:16');
INSERT INTO `t_log_skripsi` VALUES ('22', '0010', 'Validasi P0', 'Divalidasi', '2021-09-14', '06:24:21');

-- ----------------------------
-- Table structure for t_p0
-- ----------------------------
DROP TABLE IF EXISTS `t_p0`;
CREATE TABLE `t_p0` (
  `fnid` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fc_doc_p0` text,
  `fc_sts_p0` char(1) DEFAULT NULL,
  `fc_doc_p1` text,
  `fc_sts_p1` char(1) DEFAULT NULL,
  `fc_doc_p2` text,
  `fc_sts_p2` char(1) DEFAULT NULL,
  PRIMARY KEY (`fnid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_p0
-- ----------------------------
INSERT INTO `t_p0` VALUES ('5', '0008', '0010', '1631587648.pdf', 'Y', '1631600295.pdf', 'Y', '1631600596.pdf', 'Y');

-- ----------------------------
-- Table structure for t_p1
-- ----------------------------
DROP TABLE IF EXISTS `t_p1`;
CREATE TABLE `t_p1` (
  `fnid_p1` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fc_doc_bab1` text,
  `fc_approve_bab1` char(1) DEFAULT NULL,
  `fc_doc_bab2` text,
  `fc_approve_bab2` char(1) DEFAULT NULL,
  `fc_doc_bab3` text,
  `fc_approve_bab3` char(1) DEFAULT NULL,
  `fc_doc_bab4` text,
  `fc_approve_bab4` char(1) DEFAULT NULL,
  `fc_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`fnid_p1`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_p1
-- ----------------------------

-- ----------------------------
-- Table structure for t_p2
-- ----------------------------
DROP TABLE IF EXISTS `t_p2`;
CREATE TABLE `t_p2` (
  `fnid_p2` int(11) NOT NULL AUTO_INCREMENT,
  `fc_kdusers_dosen` char(30) DEFAULT NULL,
  `fc_kdusers_mahasiswa` char(30) DEFAULT NULL,
  `fc_doc_bab1` text,
  `fc_approve_bab1` char(1) DEFAULT NULL,
  `fc_doc_bab2` text,
  `fc_approve_bab2` char(1) DEFAULT NULL,
  `fc_doc_bab3` text,
  `fc_approve_bab3` char(1) DEFAULT NULL,
  `fc_doc_bab4` text,
  `fc_approve_bab4` char(1) DEFAULT NULL,
  `fc_doc_bab5` text,
  `fc_approve_bab5` char(1) DEFAULT NULL,
  `fc_doc_bab6` text,
  `fc_approve_bab6` char(1) DEFAULT NULL,
  `fc_sts` char(1) DEFAULT NULL,
  PRIMARY KEY (`fnid_p2`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_p2
-- ----------------------------

-- ----------------------------
-- Table structure for t_status
-- ----------------------------
DROP TABLE IF EXISTS `t_status`;
CREATE TABLE `t_status` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `fc_param` char(20) DEFAULT NULL,
  `fc_kode` char(3) DEFAULT NULL,
  `fc_isi` char(200) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of t_status
-- ----------------------------
INSERT INTO `t_status` VALUES ('1', 'DURATION', '01', 'A');
INSERT INTO `t_status` VALUES ('2', 'CONFIRMATION', '01', 'Thanks , You\'ll receive a notification confirming the meeting details shortly.');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fc_kdusers` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` char(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nim` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jurusan` char(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `judul_skripsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fc_isi` char(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '0001', 'admin', 'admin@gmail.com', null, '$2y$10$Nlr7AQzzjXTobvLz45w7MOVDmL7p1HnDJVOq.SzQQb3oC92Gu80NG', null, '2021-03-26 02:23:49', '2021-03-26 02:23:49', '3', null, null, null, 'A', null);
INSERT INTO `users` VALUES ('2', '0002', 'andi', 'andi@gmail.com', '2021-03-22 15:38:07', '$2y$10$Nlr7AQzzjXTobvLz45w7MOVDmL7p1HnDJVOq.SzQQb3oC92Gu80NG', '', '2021-03-26 02:23:49', '2021-03-26 02:23:49', '1', null, null, null, 'A', null);
INSERT INTO `users` VALUES ('3', '0003', 'budi', 'budi@gmail.com', '2021-03-29 15:38:37', '$2y$10$Nlr7AQzzjXTobvLz45w7MOVDmL7p1HnDJVOq.SzQQb3oC92Gu80NG', '', '2021-03-26 02:23:49', '2021-03-26 02:23:49', '3', null, null, null, 'A', null);
INSERT INTO `users` VALUES ('4', '0004', 'Jordan', 'edwinfrontman@gmail.com', null, '$2y$10$hTdjk1Of.PMAJYhzPtDnVOJQd/TBRsL0iDH6Tor6ToZMjbyQRqnj.', null, null, null, '2', '18899977766', 'SI', 'SPK', 'A', null);
INSERT INTO `users` VALUES ('5', '0005', 'Jordan', 'jordanlaksono@gmail.com', null, '$2y$10$JuauFjjGn8UU6BHW7yzWCODFcP7.QEDxvjp2DnAYtot..vBrmX7gK', null, null, null, '3', null, 'periklanan', null, 'B', null);
INSERT INTO `users` VALUES ('6', '0006', 'Yordan', 'yordan@gmail.com', null, '$2y$10$sLW1pJjjJZm0DQbAvJ9mKO1WoTqu3JD7IjD8tLLOogXIowSmPeJdG', null, null, null, '2', null, 'Sistem informasi', 'SPK', 'A', null);
INSERT INTO `users` VALUES ('9', '0007', 'Ahmad', 'ahmad@gmail.com', null, '$2y$10$ur4D46b4HIezaZ..0M6HseSON7ypGtfCPLWYrbDq6rTfU5huO3Ivq', null, null, null, '3', null, 'Sistem informasi', null, 'A', null);
INSERT INTO `users` VALUES ('10', '0008', 'rahmad', 'rahmad@gmail.com', null, '$2y$10$FAEVSpgExbkIrFsbByIFKeCTLSwf4wDEJV9XAuFt/2kf4sI7mDrtK', null, null, null, '3', null, 'Sistem informasi', null, 'A', null);
INSERT INTO `users` VALUES ('12', '0009', 'Kami-sama', 'kami@gmail.com', null, '$2y$10$HEbXi2teuJADpCkl50IEBeF16Wnw2WlpQWOM5AZa.jXwkFlaRDKZm', null, null, null, '2', '5667788', 'Sistem informasi', 'Pemrograman visual', 'A', '0009.jpg');
INSERT INTO `users` VALUES ('13', '0010', 'Jordan Leonardo', 'jordan@gmail.com', null, '$2y$10$jJFFPHIkzC5ZPHpdK/1tYeHiwT5jJ81KovIjqLt35vfuLX7BdhtlS', null, null, null, '2', '45566778', 'Sistem informasi', 'Pemrograman visual untuk perancangan sistem', 'A', '0010.jpg');
