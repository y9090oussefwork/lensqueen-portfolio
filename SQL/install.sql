-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 07, 2022 at 12:23 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lensq`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `admin_access` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `username`, `email`, `password`, `image`, `phone`, `address`, `status`, `admin_access`, `last_login`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com', '$2y$10$.sO9kLAurqjCYnUatIQeDuwxOqPC7KWPKEIOy5rYf8sGMm0zkLdZm', '604f5841420501615812673.png', '019111111112', 'Dhaka Bangladesha', 1, NULL, '2022-08-07 04:34:51', 'PWqTLYJDrdPZ3TI8SFYsOQpWUxMLSuKlzAEc2sMgsJ9Sh9pV1DBpkWQQdx2u', '2020-11-03 03:41:33', '2022-08-06 22:34:51');

-- --------------------------------------------------------

--
-- Table structure for table `booking_requests`
--

CREATE TABLE `booking_requests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=reject, 2=approve',
  `booking_info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `configures`
--

CREATE TABLE `configures` (
  `id` int(11) UNSIGNED NOT NULL,
  `site_title` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `base_color` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time_zone` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency_symbol` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fraction_number` int(11) DEFAULT NULL,
  `paginate` int(11) DEFAULT NULL,
  `email_verification` tinyint(1) NOT NULL DEFAULT 0,
  `email_notification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_verification` tinyint(1) NOT NULL DEFAULT 0,
  `sms_notification` tinyint(1) NOT NULL DEFAULT 0,
  `sender_email` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sender_email_name` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_configuration` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `booking_info` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `push_notification` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `error_log` tinyint(1) NOT NULL,
  `strong_password` tinyint(1) NOT NULL,
  `registration` tinyint(1) NOT NULL,
  `maintenance` tinyint(1) NOT NULL,
  `is_active_cron_notification` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `configures`
--

INSERT INTO `configures` (`id`, `site_title`, `base_color`, `time_zone`, `currency`, `currency_symbol`, `theme`, `fraction_number`, `paginate`, `email_verification`, `email_notification`, `sms_verification`, `sms_notification`, `sender_email`, `sender_email_name`, `email_description`, `email_configuration`, `booking_info`, `push_notification`, `created_at`, `updated_at`, `error_log`, `strong_password`, `registration`, `maintenance`, `is_active_cron_notification`) VALUES
(1, 'LensQueen', '#d35400', 'Asia/Dhaka', 'BDT', '৳', 'minimal', 2, 10, 0, 0, 0, 0, 'support@domain.com', 'Lens Queen', '<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">\r\n<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">\r\n<meta name=\"viewport\" content=\"width=device-width\">\r\n<style type=\"text/css\">\r\n    @media only screen and (min-width: 620px) {\r\n        * [lang=x-wrapper] h1 {\r\n        }\r\n\r\n        * [lang=x-wrapper] h1 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        * [lang=x-wrapper] h2 {\r\n        }\r\n\r\n        * [lang=x-wrapper] h2 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        * [lang=x-wrapper] h3 {\r\n        }\r\n\r\n        * [lang=x-layout__inner] p,\r\n        * [lang=x-layout__inner] ol,\r\n        * [lang=x-layout__inner] ul {\r\n        }\r\n\r\n        * div [lang=x-size-8] {\r\n            font-size: 8px !important;\r\n            line-height: 14px !important\r\n        }\r\n\r\n        * div [lang=x-size-9] {\r\n            font-size: 9px !important;\r\n            line-height: 16px !important\r\n        }\r\n\r\n        * div [lang=x-size-10] {\r\n            font-size: 10px !important;\r\n            line-height: 18px !important\r\n        }\r\n\r\n        * div [lang=x-size-11] {\r\n            font-size: 11px !important;\r\n            line-height: 19px !important\r\n        }\r\n\r\n        * div [lang=x-size-12] {\r\n            font-size: 12px !important;\r\n            line-height: 19px !important\r\n        }\r\n\r\n        * div [lang=x-size-13] {\r\n            font-size: 13px !important;\r\n            line-height: 21px !important\r\n        }\r\n\r\n        * div [lang=x-size-14] {\r\n            font-size: 14px !important;\r\n            line-height: 21px !important\r\n        }\r\n\r\n        * div [lang=x-size-15] {\r\n            font-size: 15px !important;\r\n            line-height: 23px !important\r\n        }\r\n\r\n        * div [lang=x-size-16] {\r\n            font-size: 16px !important;\r\n            line-height: 24px !important\r\n        }\r\n\r\n        * div [lang=x-size-17] {\r\n            font-size: 17px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-18] {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-18] {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important\r\n        }\r\n\r\n        * div [lang=x-size-20] {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        * div [lang=x-size-22] {\r\n            font-size: 22px !important;\r\n            line-height: 31px !important\r\n        }\r\n\r\n        * div [lang=x-size-24] {\r\n            font-size: 24px !important;\r\n            line-height: 32px !important\r\n        }\r\n\r\n        * div [lang=x-size-26] {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        * div [lang=x-size-28] {\r\n            font-size: 28px !important;\r\n            line-height: 36px !important\r\n        }\r\n\r\n        * div [lang=x-size-30] {\r\n            font-size: 30px !important;\r\n            line-height: 38px !important\r\n        }\r\n\r\n        * div [lang=x-size-32] {\r\n            font-size: 32px !important;\r\n            line-height: 40px !important\r\n        }\r\n\r\n        * div [lang=x-size-34] {\r\n            font-size: 34px !important;\r\n            line-height: 43px !important\r\n        }\r\n\r\n        * div [lang=x-size-36] {\r\n            font-size: 36px !important;\r\n            line-height: 43px !important\r\n        }\r\n\r\n        * div [lang=x-size-40] {\r\n            font-size: 40px !important;\r\n            line-height: 47px !important\r\n        }\r\n\r\n        * div [lang=x-size-44] {\r\n            font-size: 44px !important;\r\n            line-height: 50px !important\r\n        }\r\n\r\n        * div [lang=x-size-48] {\r\n            font-size: 48px !important;\r\n            line-height: 54px !important\r\n        }\r\n\r\n        * div [lang=x-size-56] {\r\n            font-size: 56px !important;\r\n            line-height: 60px !important\r\n        }\r\n\r\n        * div [lang=x-size-64] {\r\n            font-size: 64px !important;\r\n            line-height: 63px !important\r\n        }\r\n    }\r\n</style>\r\n<style type=\"text/css\">\r\n    body {\r\n        margin: 0;\r\n        padding: 0;\r\n    }\r\n\r\n    table {\r\n        border-collapse: collapse;\r\n        table-layout: fixed;\r\n    }\r\n\r\n    * {\r\n        line-height: inherit;\r\n    }\r\n\r\n    [x-apple-data-detectors],\r\n    [href^=\"tel\"],\r\n    [href^=\"sms\"] {\r\n        color: inherit !important;\r\n        text-decoration: none !important;\r\n    }\r\n\r\n    .wrapper .footer__share-button a:hover,\r\n    .wrapper .footer__share-button a:focus {\r\n        color: #ffffff !important;\r\n    }\r\n\r\n    .btn a:hover,\r\n    .btn a:focus,\r\n    .footer__share-button a:hover,\r\n    .footer__share-button a:focus,\r\n    .email-footer__links a:hover,\r\n    .email-footer__links a:focus {\r\n        opacity: 0.8;\r\n    }\r\n\r\n    .preheader,\r\n    .header,\r\n    .layout,\r\n    .column {\r\n        transition: width 0.25s ease-in-out, max-width 0.25s ease-in-out;\r\n    }\r\n\r\n    .layout,\r\n    .header {\r\n        max-width: 400px !important;\r\n        -fallback-width: 95% !important;\r\n        width: calc(100% - 20px) !important;\r\n    }\r\n\r\n    div.preheader {\r\n        max-width: 360px !important;\r\n        -fallback-width: 90% !important;\r\n        width: calc(100% - 60px) !important;\r\n    }\r\n\r\n    .snippet,\r\n    .webversion {\r\n        Float: none !important;\r\n    }\r\n\r\n    .column {\r\n        max-width: 400px !important;\r\n        width: 100% !important;\r\n    }\r\n\r\n    .fixed-width.has-border {\r\n        max-width: 402px !important;\r\n    }\r\n\r\n    .fixed-width.has-border .layout__inner {\r\n        box-sizing: border-box;\r\n    }\r\n\r\n    .snippet,\r\n    .webversion {\r\n        width: 50% !important;\r\n    }\r\n\r\n    .ie .btn {\r\n        width: 100%;\r\n    }\r\n\r\n    .ie .column,\r\n    [owa] .column,\r\n    .ie .gutter,\r\n    [owa] .gutter {\r\n        display: table-cell;\r\n        float: none !important;\r\n        vertical-align: top;\r\n    }\r\n\r\n    .ie div.preheader,\r\n    [owa] div.preheader,\r\n    .ie .email-footer,\r\n    [owa] .email-footer {\r\n        max-width: 560px !important;\r\n        width: 560px !important;\r\n    }\r\n\r\n    .ie .snippet,\r\n    [owa] .snippet,\r\n    .ie .webversion,\r\n    [owa] .webversion {\r\n        width: 280px !important;\r\n    }\r\n\r\n    .ie .header,\r\n    [owa] .header,\r\n    .ie .layout,\r\n    [owa] .layout,\r\n    .ie .one-col .column,\r\n    [owa] .one-col .column {\r\n        max-width: 600px !important;\r\n        width: 600px !important;\r\n    }\r\n\r\n    .ie .fixed-width.has-border,\r\n    [owa] .fixed-width.has-border,\r\n    .ie .has-gutter.has-border,\r\n    [owa] .has-gutter.has-border {\r\n        max-width: 602px !important;\r\n        width: 602px !important;\r\n    }\r\n\r\n    .ie .two-col .column,\r\n    [owa] .two-col .column {\r\n        width: 300px !important;\r\n    }\r\n\r\n    .ie .three-col .column,\r\n    [owa] .three-col .column,\r\n    .ie .narrow,\r\n    [owa] .narrow {\r\n        width: 200px !important;\r\n    }\r\n\r\n    .ie .wide,\r\n    [owa] .wide {\r\n        width: 400px !important;\r\n    }\r\n\r\n    .ie .two-col.has-gutter .column,\r\n    [owa] .two-col.x_has-gutter .column {\r\n        width: 290px !important;\r\n    }\r\n\r\n    .ie .three-col.has-gutter .column,\r\n    [owa] .three-col.x_has-gutter .column,\r\n    .ie .has-gutter .narrow,\r\n    [owa] .has-gutter .narrow {\r\n        width: 188px !important;\r\n    }\r\n\r\n    .ie .has-gutter .wide,\r\n    [owa] .has-gutter .wide {\r\n        width: 394px !important;\r\n    }\r\n\r\n    .ie .two-col.has-gutter.has-border .column,\r\n    [owa] .two-col.x_has-gutter.x_has-border .column {\r\n        width: 292px !important;\r\n    }\r\n\r\n    .ie .three-col.has-gutter.has-border .column,\r\n    [owa] .three-col.x_has-gutter.x_has-border .column,\r\n    .ie .has-gutter.has-border .narrow,\r\n    [owa] .has-gutter.x_has-border .narrow {\r\n        width: 190px !important;\r\n    }\r\n\r\n    .ie .has-gutter.has-border .wide,\r\n    [owa] .has-gutter.x_has-border .wide {\r\n        width: 396px !important;\r\n    }\r\n\r\n    .ie .fixed-width .layout__inner {\r\n        border-left: 0 none white !important;\r\n        border-right: 0 none white !important;\r\n    }\r\n\r\n    .ie .layout__edges {\r\n        display: none;\r\n    }\r\n\r\n    .mso .layout__edges {\r\n        font-size: 0;\r\n    }\r\n\r\n    .layout-fixed-width,\r\n    .mso .layout-full-width {\r\n        background-color: #ffffff;\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n\r\n        .column,\r\n        .gutter {\r\n            display: table-cell;\r\n            Float: none !important;\r\n            vertical-align: top;\r\n        }\r\n\r\n        div.preheader,\r\n        .email-footer {\r\n            max-width: 560px !important;\r\n            width: 560px !important;\r\n        }\r\n\r\n        .snippet,\r\n        .webversion {\r\n            width: 280px !important;\r\n        }\r\n\r\n        .header,\r\n        .layout,\r\n        .one-col .column {\r\n            max-width: 600px !important;\r\n            width: 600px !important;\r\n        }\r\n\r\n        .fixed-width.has-border,\r\n        .fixed-width.ecxhas-border,\r\n        .has-gutter.has-border,\r\n        .has-gutter.ecxhas-border {\r\n            max-width: 602px !important;\r\n            width: 602px !important;\r\n        }\r\n\r\n        .two-col .column {\r\n            width: 300px !important;\r\n        }\r\n\r\n        .three-col .column,\r\n        .column.narrow {\r\n            width: 200px !important;\r\n        }\r\n\r\n        .column.wide {\r\n            width: 400px !important;\r\n        }\r\n\r\n        .two-col.has-gutter .column,\r\n        .two-col.ecxhas-gutter .column {\r\n            width: 290px !important;\r\n        }\r\n\r\n        .three-col.has-gutter .column,\r\n        .three-col.ecxhas-gutter .column,\r\n        .has-gutter .narrow {\r\n            width: 188px !important;\r\n        }\r\n\r\n        .has-gutter .wide {\r\n            width: 394px !important;\r\n        }\r\n\r\n        .two-col.has-gutter.has-border .column,\r\n        .two-col.ecxhas-gutter.ecxhas-border .column {\r\n            width: 292px !important;\r\n        }\r\n\r\n        .three-col.has-gutter.has-border .column,\r\n        .three-col.ecxhas-gutter.ecxhas-border .column,\r\n        .has-gutter.has-border .narrow,\r\n        .has-gutter.ecxhas-border .narrow {\r\n            width: 190px !important;\r\n        }\r\n\r\n        .has-gutter.has-border .wide,\r\n        .has-gutter.ecxhas-border .wide {\r\n            width: 396px !important;\r\n        }\r\n    }\r\n\r\n    @media only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min--moz-device-pixel-ratio: 2), only screen and (-o-min-device-pixel-ratio: 2/1), only screen and (min-device-pixel-ratio: 2), only screen and (min-resolution: 192dpi), only screen and (min-resolution: 2dppx) {\r\n        .fblike {\r\n            background-image: url(https://i3.createsend1.com/static/eb/customise/13-the-blueprint-3/images/fblike@2x.png) !important;\r\n        }\r\n\r\n        .tweet {\r\n            background-image: url(https://i4.createsend1.com/static/eb/customise/13-the-blueprint-3/images/tweet@2x.png) !important;\r\n        }\r\n\r\n        .linkedinshare {\r\n            background-image: url(https://i6.createsend1.com/static/eb/customise/13-the-blueprint-3/images/lishare@2x.png) !important;\r\n        }\r\n\r\n        .forwardtoafriend {\r\n            background-image: url(https://i5.createsend1.com/static/eb/customise/13-the-blueprint-3/images/forward@2x.png) !important;\r\n        }\r\n    }\r\n\r\n    @media (max-width: 321px) {\r\n        .fixed-width.has-border .layout__inner {\r\n            border-width: 1px 0 !important;\r\n        }\r\n\r\n        .layout,\r\n        .column {\r\n            min-width: 320px !important;\r\n            width: 320px !important;\r\n        }\r\n\r\n        .border {\r\n            display: none;\r\n        }\r\n    }\r\n\r\n    .mso div {\r\n        border: 0 none white !important;\r\n    }\r\n\r\n    .mso .w560 .divider {\r\n        margin-left: 260px !important;\r\n        margin-right: 260px !important;\r\n    }\r\n\r\n    .mso .w360 .divider {\r\n        margin-left: 160px !important;\r\n        margin-right: 160px !important;\r\n    }\r\n\r\n    .mso .w260 .divider {\r\n        margin-left: 110px !important;\r\n        margin-right: 110px !important;\r\n    }\r\n\r\n    .mso .w160 .divider {\r\n        margin-left: 60px !important;\r\n        margin-right: 60px !important;\r\n    }\r\n\r\n    .mso .w354 .divider {\r\n        margin-left: 157px !important;\r\n        margin-right: 157px !important;\r\n    }\r\n\r\n    .mso .w250 .divider {\r\n        margin-left: 105px !important;\r\n        margin-right: 105px !important;\r\n    }\r\n\r\n    .mso .w148 .divider {\r\n        margin-left: 54px !important;\r\n        margin-right: 54px !important;\r\n    }\r\n\r\n    .mso .font-avenir,\r\n    .mso .font-cabin,\r\n    .mso .font-open-sans,\r\n    .mso .font-ubuntu {\r\n        font-family: sans-serif !important;\r\n    }\r\n\r\n    .mso .font-bitter,\r\n    .mso .font-merriweather,\r\n    .mso .font-pt-serif {\r\n        font-family: Georgia, serif !important;\r\n    }\r\n\r\n    .mso .font-lato,\r\n    .mso .font-roboto {\r\n        font-family: Tahoma, sans-serif !important;\r\n    }\r\n\r\n    .mso .font-pt-sans {\r\n        font-family: \"Trebuchet MS\", sans-serif !important;\r\n    }\r\n\r\n    .mso .footer__share-button p {\r\n        margin: 0;\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n        .wrapper .size-8 {\r\n            font-size: 8px !important;\r\n            line-height: 14px !important;\r\n        }\r\n\r\n        .wrapper .size-9 {\r\n            font-size: 9px !important;\r\n            line-height: 16px !important;\r\n        }\r\n\r\n        .wrapper .size-10 {\r\n            font-size: 10px !important;\r\n            line-height: 18px !important;\r\n        }\r\n\r\n        .wrapper .size-11 {\r\n            font-size: 11px !important;\r\n            line-height: 19px !important;\r\n        }\r\n\r\n        .wrapper .size-12 {\r\n            font-size: 12px !important;\r\n            line-height: 19px !important;\r\n        }\r\n\r\n        .wrapper .size-13 {\r\n            font-size: 13px !important;\r\n            line-height: 21px !important;\r\n        }\r\n\r\n        .wrapper .size-14 {\r\n            font-size: 14px !important;\r\n            line-height: 21px !important;\r\n        }\r\n\r\n        .wrapper .size-15 {\r\n            font-size: 15px !important;\r\n            line-height: 23px !important;\r\n        }\r\n\r\n        .wrapper .size-16 {\r\n            font-size: 16px !important;\r\n            line-height: 24px !important;\r\n        }\r\n\r\n        .wrapper .size-17 {\r\n            font-size: 17px !important;\r\n            line-height: 26px !important;\r\n        }\r\n\r\n        .wrapper .size-18 {\r\n            font-size: 18px !important;\r\n            line-height: 26px !important;\r\n        }\r\n\r\n        .wrapper .size-20 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important;\r\n        }\r\n\r\n        .wrapper .size-22 {\r\n            font-size: 22px !important;\r\n            line-height: 31px !important;\r\n        }\r\n\r\n        .wrapper .size-24 {\r\n            font-size: 24px !important;\r\n            line-height: 32px !important;\r\n        }\r\n\r\n        .wrapper .size-26 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important;\r\n        }\r\n\r\n        .wrapper .size-28 {\r\n            font-size: 28px !important;\r\n            line-height: 36px !important;\r\n        }\r\n\r\n        .wrapper .size-30 {\r\n            font-size: 30px !important;\r\n            line-height: 38px !important;\r\n        }\r\n\r\n        .wrapper .size-32 {\r\n            font-size: 32px !important;\r\n            line-height: 40px !important;\r\n        }\r\n\r\n        .wrapper .size-34 {\r\n            font-size: 34px !important;\r\n            line-height: 43px !important;\r\n        }\r\n\r\n        .wrapper .size-36 {\r\n            font-size: 36px !important;\r\n            line-height: 43px !important;\r\n        }\r\n\r\n        .wrapper .size-40 {\r\n            font-size: 40px !important;\r\n            line-height: 47px !important;\r\n        }\r\n\r\n        .wrapper .size-44 {\r\n            font-size: 44px !important;\r\n            line-height: 50px !important;\r\n        }\r\n\r\n        .wrapper .size-48 {\r\n            font-size: 48px !important;\r\n            line-height: 54px !important;\r\n        }\r\n\r\n        .wrapper .size-56 {\r\n            font-size: 56px !important;\r\n            line-height: 60px !important;\r\n        }\r\n\r\n        .wrapper .size-64 {\r\n            font-size: 64px !important;\r\n            line-height: 63px !important;\r\n        }\r\n    }\r\n\r\n    .mso .size-8,\r\n    .ie .size-8 {\r\n        font-size: 8px !important;\r\n        line-height: 14px !important;\r\n    }\r\n\r\n    .mso .size-9,\r\n    .ie .size-9 {\r\n        font-size: 9px !important;\r\n        line-height: 16px !important;\r\n    }\r\n\r\n    .mso .size-10,\r\n    .ie .size-10 {\r\n        font-size: 10px !important;\r\n        line-height: 18px !important;\r\n    }\r\n\r\n    .mso .size-11,\r\n    .ie .size-11 {\r\n        font-size: 11px !important;\r\n        line-height: 19px !important;\r\n    }\r\n\r\n    .mso .size-12,\r\n    .ie .size-12 {\r\n        font-size: 12px !important;\r\n        line-height: 19px !important;\r\n    }\r\n\r\n    .mso .size-13,\r\n    .ie .size-13 {\r\n        font-size: 13px !important;\r\n        line-height: 21px !important;\r\n    }\r\n\r\n    .mso .size-14,\r\n    .ie .size-14 {\r\n        font-size: 14px !important;\r\n        line-height: 21px !important;\r\n    }\r\n\r\n    .mso .size-15,\r\n    .ie .size-15 {\r\n        font-size: 15px !important;\r\n        line-height: 23px !important;\r\n    }\r\n\r\n    .mso .size-16,\r\n    .ie .size-16 {\r\n        font-size: 16px !important;\r\n        line-height: 24px !important;\r\n    }\r\n\r\n    .mso .size-17,\r\n    .ie .size-17 {\r\n        font-size: 17px !important;\r\n        line-height: 26px !important;\r\n    }\r\n\r\n    .mso .size-18,\r\n    .ie .size-18 {\r\n        font-size: 18px !important;\r\n        line-height: 26px !important;\r\n    }\r\n\r\n    .mso .size-20,\r\n    .ie .size-20 {\r\n        font-size: 20px !important;\r\n        line-height: 28px !important;\r\n    }\r\n\r\n    .mso .size-22,\r\n    .ie .size-22 {\r\n        font-size: 22px !important;\r\n        line-height: 31px !important;\r\n    }\r\n\r\n    .mso .size-24,\r\n    .ie .size-24 {\r\n        font-size: 24px !important;\r\n        line-height: 32px !important;\r\n    }\r\n\r\n    .mso .size-26,\r\n    .ie .size-26 {\r\n        font-size: 26px !important;\r\n        line-height: 34px !important;\r\n    }\r\n\r\n    .mso .size-28,\r\n    .ie .size-28 {\r\n        font-size: 28px !important;\r\n        line-height: 36px !important;\r\n    }\r\n\r\n    .mso .size-30,\r\n    .ie .size-30 {\r\n        font-size: 30px !important;\r\n        line-height: 38px !important;\r\n    }\r\n\r\n    .mso .size-32,\r\n    .ie .size-32 {\r\n        font-size: 32px !important;\r\n        line-height: 40px !important;\r\n    }\r\n\r\n    .mso .size-34,\r\n    .ie .size-34 {\r\n        font-size: 34px !important;\r\n        line-height: 43px !important;\r\n    }\r\n\r\n    .mso .size-36,\r\n    .ie .size-36 {\r\n        font-size: 36px !important;\r\n        line-height: 43px !important;\r\n    }\r\n\r\n    .mso .size-40,\r\n    .ie .size-40 {\r\n        font-size: 40px !important;\r\n        line-height: 47px !important;\r\n    }\r\n\r\n    .mso .size-44,\r\n    .ie .size-44 {\r\n        font-size: 44px !important;\r\n        line-height: 50px !important;\r\n    }\r\n\r\n    .mso .size-48,\r\n    .ie .size-48 {\r\n        font-size: 48px !important;\r\n        line-height: 54px !important;\r\n    }\r\n\r\n    .mso .size-56,\r\n    .ie .size-56 {\r\n        font-size: 56px !important;\r\n        line-height: 60px !important;\r\n    }\r\n\r\n    .mso .size-64,\r\n    .ie .size-64 {\r\n        font-size: 64px !important;\r\n        line-height: 63px !important;\r\n    }\r\n\r\n    .footer__share-button p {\r\n        margin: 0;\r\n    }\r\n</style>\r\n\r\n<title></title>\r\n<!--[if !mso]><!-->\r\n<style type=\"text/css\">\r\n    @import url(https://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400);\r\n</style>\r\n<link href=\"https://fonts.googleapis.com/css?family=Bitter:400,700,400italic|Cabin:400,700,400italic,700italic|Open+Sans:400italic,700italic,700,400\" rel=\"stylesheet\" type=\"text/css\">\r\n<!--<![endif]-->\r\n<style type=\"text/css\">\r\n    body {\r\n        background-color: #f5f7fa\r\n    }\r\n\r\n    .mso h1 {\r\n    }\r\n\r\n    .mso h1 {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso h2 {\r\n    }\r\n\r\n    .mso h3 {\r\n    }\r\n\r\n    .mso .column,\r\n    .mso .column__background td {\r\n    }\r\n\r\n    .mso .column,\r\n    .mso .column__background td {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .btn a {\r\n    }\r\n\r\n    .mso .btn a {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .webversion,\r\n    .mso .snippet,\r\n    .mso .layout-email-footer td,\r\n    .mso .footer__share-button p {\r\n    }\r\n\r\n    .mso .webversion,\r\n    .mso .snippet,\r\n    .mso .layout-email-footer td,\r\n    .mso .footer__share-button p {\r\n        font-family: sans-serif !important\r\n    }\r\n\r\n    .mso .logo {\r\n    }\r\n\r\n    .mso .logo {\r\n        font-family: Tahoma, sans-serif !important\r\n    }\r\n\r\n    .logo a:hover,\r\n    .logo a:focus {\r\n        color: #859bb1 !important\r\n    }\r\n\r\n    .mso .layout-has-border {\r\n        border-top: 1px solid #b1c1d8;\r\n        border-bottom: 1px solid #b1c1d8\r\n    }\r\n\r\n    .mso .layout-has-bottom-border {\r\n        border-bottom: 1px solid #b1c1d8\r\n    }\r\n\r\n    .mso .border,\r\n    .ie .border {\r\n        background-color: #b1c1d8\r\n    }\r\n\r\n    @media only screen and (min-width: 620px) {\r\n        .wrapper h1 {\r\n        }\r\n\r\n        .wrapper h1 {\r\n            font-size: 26px !important;\r\n            line-height: 34px !important\r\n        }\r\n\r\n        .wrapper h2 {\r\n        }\r\n\r\n        .wrapper h2 {\r\n            font-size: 20px !important;\r\n            line-height: 28px !important\r\n        }\r\n\r\n        .wrapper h3 {\r\n        }\r\n\r\n        .column p,\r\n        .column ol,\r\n        .column ul {\r\n        }\r\n    }\r\n\r\n    .mso h1,\r\n    .ie h1 {\r\n    }\r\n\r\n    .mso h1,\r\n    .ie h1 {\r\n        font-size: 26px !important;\r\n        line-height: 34px !important\r\n    }\r\n\r\n    .mso h2,\r\n    .ie h2 {\r\n    }\r\n\r\n    .mso h2,\r\n    .ie h2 {\r\n        font-size: 20px !important;\r\n        line-height: 28px !important\r\n    }\r\n\r\n    .mso h3,\r\n    .ie h3 {\r\n    }\r\n\r\n    .mso .layout__inner p,\r\n    .ie .layout__inner p,\r\n    .mso .layout__inner ol,\r\n    .ie .layout__inner ol,\r\n    .mso .layout__inner ul,\r\n    .ie .layout__inner ul {\r\n    }\r\n</style>\r\n<meta name=\"robots\" content=\"noindex,nofollow\">\r\n\r\n<meta property=\"og:title\" content=\"Just One More Step\">\r\n\r\n<link href=\"https://css.createsend1.com/css/social.min.css?h=0ED47CE120160920\" media=\"screen,projection\" rel=\"stylesheet\" type=\"text/css\">\r\n\r\n\r\n<div class=\"wrapper\" style=\"min-width: 320px;background-color: #f5f7fa;\" lang=\"x-wrapper\">\r\n    <div class=\"preheader\" style=\"margin: 0 auto;max-width: 560px;min-width: 280px; width: 280px;\">\r\n        <div style=\"border-collapse: collapse;display: table;width: 100%;\">\r\n            <div class=\"snippet\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;padding: 10px 0 5px 0;color: #b9b9b9;\">\r\n            </div>\r\n            <div class=\"webversion\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;\">\r\n            </div>\r\n        </div>\r\n\r\n        <div class=\"layout one-col fixed-width\" style=\"margin: 0 auto;max-width: 600px;min-width: 320px; width: 320px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;\">\r\n            <div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #c4e5dc;\" lang=\"x-layout__inner\">\r\n                <div class=\"column\" style=\"text-align: left;color: #60666d;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;\">\r\n                    <div style=\"margin-left: 20px;margin-right: 20px;margin-top: 24px;margin-bottom: 24px;\">\r\n                        <h1 style=\"margin-top: 0;margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 36px;line-height: 43px;font-family: bitter,georgia,serif;text-align: center;\">\r\n                            </h1><h1 style=\"margin-top: 0;margin-bottom: 0;font-style: normal;font-weight: normal;color: #44a8c7;font-size: 36px;line-height: 43px;font-family: bitter,georgia,serif;text-align: center;\"></h1><h6 style=\"margin-top: 0px; margin-bottom: 0px; font-style: normal; font-weight: normal; color: rgb(68, 168, 199); font-size: 36px; line-height: 43px; font-family: bitter, georgia, serif; text-align: center;\"><img style=\"width: 30px;\" src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAACXBIWXMAAAsTAAALEwEAmpwYAAAF0WlUWHRYTUw6Y29tLmFkb2JlLnhtcAAAAAAAPD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDUgNzkuMTYzNDk5LCAyMDE4LzA4LzEzLTE2OjQwOjIyICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtbG5zOnhtcE1NPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvbW0vIiB4bWxuczpzdEV2dD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL3NUeXBlL1Jlc291cmNlRXZlbnQjIiB4bWxuczpkYz0iaHR0cDovL3B1cmwub3JnL2RjL2VsZW1lbnRzLzEuMS8iIHhtbG5zOnBob3Rvc2hvcD0iaHR0cDovL25zLmFkb2JlLmNvbS9waG90b3Nob3AvMS4wLyIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHhtcDpDcmVhdGVEYXRlPSIyMDIxLTAyLTA2VDE3OjU2OjM0KzA2OjAwIiB4bXA6TWV0YWRhdGFEYXRlPSIyMDIxLTAyLTA2VDE3OjU2OjM0KzA2OjAwIiB4bXA6TW9kaWZ5RGF0ZT0iMjAyMS0wMi0wNlQxNzo1NjozNCswNjowMCIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDowZTBlNWQ3My01NzYzLWI3NGItYWIzNC1iODM2MjViMTAzMzkiIHhtcE1NOkRvY3VtZW50SUQ9ImFkb2JlOmRvY2lkOnBob3Rvc2hvcDoxZTA2ZDM4Ny0xOGRkLWE2NDUtODdjYS1kMmYxZWI4NDdlMzMiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo5YmM4ZTg1NS1hODYzLTU5NDMtYTM1ZS02ZjcyMGY5OGRhMzQiIGRjOmZvcm1hdD0iaW1hZ2UvcG5nIiBwaG90b3Nob3A6Q29sb3JNb2RlPSIzIj4gPHhtcE1NOkhpc3Rvcnk+IDxyZGY6U2VxPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0iY3JlYXRlZCIgc3RFdnQ6aW5zdGFuY2VJRD0ieG1wLmlpZDo5YmM4ZTg1NS1hODYzLTU5NDMtYTM1ZS02ZjcyMGY5OGRhMzQiIHN0RXZ0OndoZW49IjIwMjEtMDItMDZUMTc6NTY6MzQrMDY6MDAiIHN0RXZ0OnNvZnR3YXJlQWdlbnQ9IkFkb2JlIFBob3Rvc2hvcCBDQyAyMDE5IChXaW5kb3dzKSIvPiA8cmRmOmxpIHN0RXZ0OmFjdGlvbj0ic2F2ZWQiIHN0RXZ0Omluc3RhbmNlSUQ9InhtcC5paWQ6MGUwZTVkNzMtNTc2My1iNzRiLWFiMzQtYjgzNjI1YjEwMzM5IiBzdEV2dDp3aGVuPSIyMDIxLTAyLTA2VDE3OjU2OjM0KzA2OjAwIiBzdEV2dDpzb2Z0d2FyZUFnZW50PSJBZG9iZSBQaG90b3Nob3AgQ0MgMjAxOSAoV2luZG93cykiIHN0RXZ0OmNoYW5nZWQ9Ii8iLz4gPC9yZGY6U2VxPiA8L3htcE1NOkhpc3Rvcnk+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+Gv+r3AAAAbJJREFUSMfF10uITmEcx/GP3aBELiVZuG0oC3bKwko2Ljs2zEopJQmJsrBiYzHvUMrChp0xrmWh7GY7Y+eShBQ28yqXzOvY/E+d3pj3ec4ZzqnfWfyf///3Pc+15yiKQhvSGjjjWYATGEGnTyM4hSXm+FmEZygG6CVWzhV0aRgWifqA1U2hq/AmA1rqM9amAE7iNu5iHHfwAN9qQEv9xMPwGg/vMZwtoVcbmNfVTfhVo/A17uNe5vxXlTWc1/+yZRZiNMPnK3QTk3cGZFf09B3e4xH2Rds29PpW+CZswNtKvJsK3hrGs+3l55GzvhKbqIzKk1zwuSh8lfCBHyP3SCV2GRf78gaCZ8LoWMb8XYiaL7PkDATfCpPpDHAvakabgA9iqMZWWYb9TcB7sbgGeA12NwGfxrwa4CEcbQKeivmayIC+iJqnTcAFVmBdBngL5g/ISQJPRg/OJEAvJfQ26+S6EYZ78OkP7dM4EDmdBL9uzln9uHL8bcQhDGNzJT6W6JUFLnUNO2Lul2N79LKX4dGFHy1cBL6L1/8Gz8DxFsDny0UxHJfyK/9YHRxGi78wbYF/A49jxm0k+zX1AAAAAElFTkSuQmCC\" data-filename=\"title-icon.png\"> Lens Queen<br></h6></div></div></div><div class=\"layout one-col fixed-width\" style=\"margin: 0 auto;max-width: 600px;min-width: 320px;overflow-wrap: break-word;word-wrap: break-word;word-break: break-word;\"><div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #ffffff;\" lang=\"x-layout__inner\"><div class=\"column\" style=\"text-align: left;color: #60666d;background: #edf1eb;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;width:320px;\"><div style=\"margin-left: 20px;margin-right: 20px;margin-top: 24px;\">\r\n                        </div>\r\n\r\n                        <div style=\"margin-left: 20px;margin-right: 20px;\">\r\n\r\n                            <p style=\"margin-top: 16px;margin-bottom: 0;\"><strong>Hello [[name]],</strong></p>\r\n                            <p style=\"margin-top: 20px;margin-bottom: 20px;\"><strong>[[message]]</strong></p>\r\n                            <p style=\"margin-top: 20px;margin-bottom: 20px;\"><br></p>\r\n                        </div>\r\n\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n            <div class=\"layout__inner\" style=\"border-collapse: collapse;display: table;width: 100%;background-color: #2c3262; margin-bottom: 20px\" lang=\"x-layout__inner\">\r\n                <div class=\"column\" style=\"text-align: left;color: #60666d;font-size: 14px;line-height: 21px;max-width:600px;min-width:320px;\">\r\n                    <div style=\"margin-top: 5px;margin-bottom: 5px;\">\r\n                        <p style=\"margin-top: 0;margin-bottom: 0;font-style: normal;font-weight: normal;color: #ffffff;font-size: 16px;line-height: 35px;font-family: bitter,georgia,serif;text-align: center;\">\r\n                            2022 ©  All Right Reserved\r\n                        </p>\r\n                    </div>\r\n                </div>\r\n            </div>\r\n\r\n        </div>\r\n\r\n\r\n        <div style=\"border-collapse: collapse;display: table;width: 100%;\">\r\n            <div class=\"snippet\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 140px; width: 140px;padding: 10px 0 5px 0;color: #b9b9b9;\">\r\n            </div>\r\n            <div class=\"webversion\" style=\"display: table-cell;Float: left;font-size: 12px;line-height: 19px;max-width: 280px;min-width: 139px; width: 139px;padding: 10px 0 5px 0;text-align: right;color: #b9b9b9;\">\r\n            </div>\r\n        </div>\r\n    </div>\r\n</div>', '{\"name\":\"smtp\",\"smtp_host\":\"smtp.mailtrap.io\",\"smtp_port\":\"465\",\"smtp_encryption\":\"ssl\",\"smtp_username\":\"support@domain.com\",\"smtp_password\":\"a81e905777eb3a\"}', '{\"Name\":{\"field_name\":\"Name\",\"field_level\":\"Name\",\"type\":\"text\",\"validation\":\"required\"},\"PhoneNumber\":{\"field_name\":\"PhoneNumber\",\"field_level\":\"Phone Number\",\"type\":\"text\",\"validation\":\"required\"},\"NIDNumber\":{\"field_name\":\"NIDNumber\",\"field_level\":\"NID Number\",\"type\":\"text\",\"validation\":\"nullable\"},\"Details\":{\"field_name\":\"Details\",\"field_level\":\"Details\",\"type\":\"textarea\",\"validation\":\"nullable\"},\"Image\":{\"field_name\":\"Image\",\"field_level\":\"Image\",\"type\":\"file\",\"validation\":\"nullable\"},\"Nid\":{\"field_name\":\"Nid\",\"field_level\":\"Nid\",\"type\":\"file\",\"validation\":\"required\"}}', 0, NULL, '2022-07-27 08:36:25', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `name`, `created_at`, `updated_at`) VALUES
(5, 'social', '2022-03-14 05:07:05', '2022-03-14 05:07:05'),
(6, 'social', '2022-03-14 05:07:32', '2022-03-14 05:07:32'),
(7, 'social', '2022-03-14 05:07:53', '2022-03-14 05:07:53'),
(8, 'blog', '2022-03-15 23:58:10', '2022-03-15 23:58:10'),
(9, 'blog', '2022-03-16 01:10:32', '2022-03-16 01:10:32'),
(10, 'blog', '2022-03-16 02:53:38', '2022-03-16 02:53:38'),
(11, 'blog', '2022-03-16 02:54:16', '2022-03-16 02:54:16'),
(12, 'blog', '2022-03-16 02:56:44', '2022-03-16 02:56:44'),
(13, 'blog', '2022-03-16 02:57:31', '2022-03-16 02:57:31'),
(15, 'why-chose-us', '2022-03-20 01:07:55', '2022-03-20 01:07:55'),
(16, 'why-chose-us', '2022-03-20 01:09:08', '2022-03-20 01:09:08'),
(17, 'why-chose-us', '2022-03-20 01:09:51', '2022-03-20 01:09:51'),
(18, 'why-chose-us', '2022-03-20 01:10:27', '2022-03-20 01:10:27'),
(19, 'why-chose-us', '2022-03-20 01:11:02', '2022-03-20 01:11:02'),
(20, 'why-chose-us', '2022-03-20 01:11:33', '2022-03-20 01:11:33'),
(21, 'testimonial', '2022-03-20 03:13:53', '2022-03-20 03:13:53'),
(22, 'testimonial', '2022-03-20 03:29:48', '2022-03-20 03:29:48'),
(23, 'testimonial', '2022-03-20 03:30:52', '2022-03-20 03:30:52'),
(24, 'statistics', '2022-03-20 22:56:56', '2022-03-20 22:56:56'),
(25, 'statistics', '2022-03-20 22:57:33', '2022-03-20 22:57:33'),
(26, 'statistics', '2022-03-20 22:57:55', '2022-03-20 22:57:55'),
(27, 'statistics', '2022-03-20 22:58:15', '2022-03-20 22:58:15'),
(28, 'statistics', '2022-03-20 22:58:38', '2022-03-20 22:58:38'),
(31, 'skills', '2022-03-21 03:59:23', '2022-03-21 03:59:23'),
(32, 'skills', '2022-03-21 03:59:47', '2022-03-21 03:59:47'),
(33, 'skills', '2022-03-21 04:00:18', '2022-03-21 04:00:18'),
(34, 'skills', '2022-03-21 04:00:27', '2022-03-21 04:00:27'),
(35, 'equipment', '2022-03-21 04:00:54', '2022-03-21 04:00:54'),
(36, 'equipment', '2022-03-21 04:01:02', '2022-03-21 04:01:02'),
(37, 'equipment', '2022-03-21 04:01:10', '2022-03-21 04:01:10'),
(38, 'equipment', '2022-03-21 04:01:18', '2022-03-21 04:01:18'),
(39, 'equipment', '2022-03-21 04:01:25', '2022-03-21 04:01:25'),
(40, 'equipment', '2022-03-21 04:01:33', '2022-03-21 04:01:33'),
(41, 'equipment', '2022-03-21 04:01:40', '2022-03-21 04:01:40'),
(42, 'equipment', '2022-03-21 04:01:47', '2022-03-21 04:01:47'),
(44, 'services', '2022-03-21 05:12:50', '2022-03-21 05:12:50'),
(45, 'services', '2022-03-21 05:13:51', '2022-03-21 05:13:51'),
(46, 'services', '2022-03-21 05:14:14', '2022-03-21 05:14:14'),
(47, 'services', '2022-03-21 05:15:59', '2022-03-21 05:15:59'),
(48, 'services', '2022-03-21 05:16:22', '2022-03-21 05:16:22'),
(49, 'services', '2022-03-21 05:16:40', '2022-03-21 05:16:40'),
(50, 'team', '2022-03-22 01:29:14', '2022-03-22 01:29:14'),
(51, 'team', '2022-03-22 01:30:09', '2022-03-22 01:30:09'),
(52, 'team', '2022-03-22 01:31:07', '2022-03-22 01:31:07');

-- --------------------------------------------------------

--
-- Table structure for table `content_details`
--

CREATE TABLE `content_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_details`
--

INSERT INTO `content_details` (`id`, `content_id`, `language_id`, `description`, `created_at`, `updated_at`) VALUES
(221, 5, 1, '{\"name\":\"Instagram\"}', '2022-03-14 05:07:05', '2022-03-14 05:07:05'),
(222, 6, 1, '{\"name\":\"Facebook\"}', '2022-03-14 05:07:32', '2022-03-14 05:07:32'),
(223, 7, 1, '{\"name\":\"Twitter\"}', '2022-03-14 05:07:53', '2022-03-14 05:11:20'),
(224, 8, 1, '{\"title\":\"What your friends think about you\",\"author\":\"Helal Uddin\",\"description\":\"<p>Vestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie. Etiam egetmattis dolor. Pellentesque porta doloreu pretium felis sagittis ac. Phasellus tortor nunc, porttitor viverra lobortis ac, tincidunt nec ligula. Suspendisse potenti. Aliquam quis sapien pellentesque dui accumsan ultrices non eget velit. Fusce eu aliquam lorem. Pellentesq vel tellus enim. Ut sapien elit, dignissim ut ornare<\\/p><p> vitae, viverra ut nisi. Morbi quis sagittis velit.sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.\\r\\n\\r\\nVestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie. Etiam egetmattis dolor. Pellentesque porta doloreu pretium felis sagittis ac. Phasellus tortor nunc, porttitor viverra lobortis ac, tincidunt nec ligula. Suspendisse potenti. Aliquam quis sapien pellentesque dui accumsan ultrices non eget velit. Fusce eu aliquam lorem. Pellentesq vel tellus enim. Ut sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.\\r\\n\\r\\n<\\/p>\"}', '2022-03-15 23:58:10', '2022-08-06 22:53:09'),
(225, 9, 1, '{\"title\":\"Behind the fotografia\",\"author\":\"Arman Alam\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi excepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt vitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, veniam commodi provident repellat dicta! Unde enim veniam voluptatibus. Ut officiis eligendi inventore quae corporis dignissimos sit, itaque asperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor autem quos labore cum sed reiciendis modi reprehenderit. Provident distinctio incidunt ipsum, quos error atque consectetur! Architecto quibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, ipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae sapiente in fugit non accusantium assumenda eligendi earum. Ullam voluptatibus ratione, enim in libero sint blanditiis mollitia excepturi cupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis nihil excepturi ea doloremque similique natus soluta deserunt eum itaque pariatur a placeat voluptatem, eligendi aliquid repellendus perspiciatis facilis possimus. Labore repudiandae, magni dolores deleniti temporibus nulla blanditiis accusamus,<br \\/>\"}', '2022-03-16 01:10:32', '2022-04-02 21:49:41'),
(226, 10, 1, '{\"title\":\"Welcome to Lens Queen\",\"author\":\"Shovan Kamal\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi \\r\\nexcepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt \\r\\nvitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, \\r\\nveniam commodi provident repellat dicta! Unde enim veniam voluptatibus. \\r\\nUt officiis eligendi inventore quae corporis dignissimos sit, itaque \\r\\nasperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor \\r\\nautem quos labore cum sed reiciendis modi reprehenderit. Provident \\r\\ndistinctio incidunt ipsum, quos error atque consectetur! Architecto \\r\\nquibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus\\r\\n animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, \\r\\nipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae \\r\\nsapiente in fugit non accusantium assumenda eligendi earum. Ullam \\r\\nvoluptatibus ratione, enim in libero sint blanditiis mollitia excepturi \\r\\ncupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis \\r\\nnihil excepturi ea doloremque similique natus soluta deserunt eum itaque\\r\\n pariatur a placeat voluptatem, eligendi aliquid repellendus \\r\\nperspiciatis facilis possimus. Labore repudiandae, magni dolores \\r\\ndeleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-03-16 02:53:38', '2022-07-26 00:36:24'),
(227, 11, 1, '{\"title\":\"Wanna know about motiongraphy?\",\"author\":\"Nayeem Mahmud\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi \\r\\nexcepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt \\r\\nvitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, \\r\\nveniam commodi provident repellat dicta! Unde enim veniam voluptatibus. \\r\\nUt officiis eligendi inventore quae corporis dignissimos sit, itaque \\r\\nasperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor \\r\\nautem quos labore cum sed reiciendis modi reprehenderit.<br \\/><br \\/>quae reiciendis recusandae \\r\\nsapiente in fugit non accusantium assumenda eligendi earum. Ullam \\r\\nvoluptatibus ratione, enim in libero sint blanditiis mollitia excepturi \\r\\ncupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis \\r\\nnihil excepturi ea doloremque similique natus soluta deserunt eum itaque\\r\\n pariatur a placeat voluptatem, eligendi aliquid repellendus \\r\\nperspiciatis facilis possimus. Labore repudiandae, magni dolores \\r\\ndeleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-03-16 02:54:16', '2022-04-02 21:50:07'),
(228, 12, 1, '{\"title\":\"Photography on quick mountain view\",\"author\":\"Anisul Islam\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi \\r\\nexcepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt \\r\\nvitae nulla voluptatum iure explicabo? quas fuga, veniam sunt ducimus dolorum dolor \\r\\nautem quos labore cum sed reiciendis modi reprehenderit. Provident \\r\\ndistinctio incidunt ipsum, quos error atque consectetur! Architecto \\r\\nquibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus\\r\\n animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, \\r\\nipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae \\r\\nsapiente in fugit non accusantium assumenda eligendi earum. Ullam \\r\\nvoluptatibus ratione, enim in libero sint blanditiis mollitia excepturi \\r\\ncupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis \\r\\nnihil excepturi ea doloremque similique natus soluta deserunt eum itaque\\r\\n pariatur a placeat voluptatem, eligendi aliquid repellendus \\r\\nperspiciatis facilis possimus. Labore repudiandae, magni dolores \\r\\ndeleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-03-16 02:56:44', '2022-07-26 00:37:27'),
(229, 13, 1, '{\"title\":\"Schedule of Lens Queen clicking point\",\"author\":\"Shahril Ahmed Siddiquie\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi \\r\\nexcepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt \\r\\nvitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, \\r\\nveniam commodi provident repellat dicta! Unde enim veniam voluptatibus. \\r\\nUt officiis eligendi inventore quae corporis. Provident \\r\\ndistinctio incidunt ipsum, quos error atque consectetur! Architecto \\r\\nquibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus\\r\\n animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, \\r\\nipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae \\r\\nsapiente in fugit non accusantium assumenda eligendi earum. Ullam \\r\\nvoluptatibus ratione, enim in libero sint blanditiis mollitia excepturi \\r\\ncupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis \\r\\nnihil excepturi ea doloremque similique natus soluta deserunt eum itaque\\r\\n pariatur a placeat voluptatem, eligendi aliquid repellendus \\r\\nperspiciatis facilis possimus. Labore repudiandae, magni dolores \\r\\ndeleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-03-16 02:57:31', '2022-07-26 00:38:19'),
(231, 15, 1, '{\"title\":\"Light Composure\",\"information\":\"The world without photography will be meaningless to us if there is no light.\"}', '2022-03-20 01:07:55', '2022-03-20 01:07:55'),
(232, 16, 1, '{\"title\":\"Professional Skills\",\"information\":\"The world without a photography will be meaningless to us if there is no light\"}', '2022-03-20 01:09:08', '2022-03-20 01:09:08'),
(233, 17, 1, '{\"title\":\"Perect Equipment\",\"information\":\"The world without a photography will be meaningless to us if there is no light\"}', '2022-03-20 01:09:51', '2022-03-20 02:55:51'),
(234, 18, 1, '{\"title\":\"Ultra Hd\",\"information\":\"The world without a photography will be meaningless to us if there is no light\"}', '2022-03-20 01:10:27', '2022-03-20 01:10:27'),
(235, 19, 1, '{\"title\":\"Unic Visiq\",\"information\":\"The world without a photography will be meaningless to us if there is no light\"}', '2022-03-20 01:11:02', '2022-03-20 02:56:20'),
(236, 20, 1, '{\"title\":\"Focusing Knowledges\",\"information\":\"The world without a photography will be meaningless to us if there is no light\"}', '2022-03-20 01:11:33', '2022-03-20 02:56:30'),
(237, 21, 1, '{\"name\":\"Travise William\",\"designation\":\"Photographer\",\"review\":\"5\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-03-20 03:13:53', '2022-04-05 03:25:27'),
(238, 22, 1, '{\"name\":\"Abbie Scott\",\"designation\":\"Designer\",\"review\":\"4\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-03-20 03:29:48', '2022-07-26 00:33:50'),
(239, 23, 1, '{\"name\":\"Mesut Ozil\",\"designation\":\"Manager\",\"review\":\"4\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-03-20 03:30:52', '2022-07-26 00:34:11'),
(240, 24, 1, '{\"title\":\"Finished Session\",\"number\":\"125\"}', '2022-03-20 22:56:56', '2022-04-05 03:24:00'),
(241, 25, 1, '{\"title\":\"Studio Sessions\",\"number\":\"45\"}', '2022-03-20 22:57:33', '2022-03-20 22:57:33'),
(242, 26, 1, '{\"title\":\"Happy Clients\",\"number\":\"250\"}', '2022-03-20 22:57:55', '2022-03-20 22:57:55'),
(243, 27, 1, '{\"title\":\"Awards Own\",\"number\":\"45\"}', '2022-03-20 22:58:15', '2022-03-20 22:58:15'),
(244, 28, 1, '{\"title\":\"Cups Of Coffee\",\"number\":\"472\"}', '2022-03-20 22:58:38', '2022-03-20 22:58:38'),
(247, 31, 1, '{\"name\":\"Portraits\",\"percentage\":\"87\"}', '2022-03-21 03:59:23', '2022-03-21 22:39:11'),
(248, 32, 1, '{\"name\":\"Life Style\",\"percentage\":\"45\"}', '2022-03-21 03:59:47', '2022-03-21 03:59:54'),
(249, 33, 1, '{\"name\":\"Fashion\",\"percentage\":\"75\"}', '2022-03-21 04:00:18', '2022-03-21 04:00:18'),
(250, 34, 1, '{\"name\":\"Studio\",\"percentage\":\"90\"}', '2022-03-21 04:00:27', '2022-03-21 04:00:27'),
(251, 35, 1, '{\"item\":\"Canon Eos 5D Mark IV 24-105mm\"}', '2022-03-21 04:00:54', '2022-03-21 04:00:54'),
(252, 36, 1, '{\"item\":\"Manfrotto Compact Tripod\"}', '2022-03-21 04:01:02', '2022-03-21 04:01:02'),
(253, 37, 1, '{\"item\":\"DJI Ronin MX 3-Axis Gimbal Stabilizer\"}', '2022-03-21 04:01:10', '2022-03-21 04:01:10'),
(254, 38, 1, '{\"item\":\"Canon EF100-400MM Lens\"}', '2022-03-21 04:01:18', '2022-03-21 04:01:18'),
(255, 39, 1, '{\"item\":\"Wondlan Wer01 Wireless Slider Time Lapse\"}', '2022-03-21 04:01:25', '2022-03-21 04:01:25'),
(256, 40, 1, '{\"item\":\"Nikon D5 24-70mm F2.8\"}', '2022-03-21 04:01:33', '2022-03-21 04:01:33'),
(257, 41, 1, '{\"item\":\"Nikon Af-S 24Mm F\\/1.4G Ed Lens\"}', '2022-03-21 04:01:40', '2022-03-21 04:01:40'),
(258, 42, 1, '{\"item\":\"Wondlan Sniper Sn 2.1 Wf Wireless Dslr Rig\"}', '2022-03-21 04:01:47', '2022-03-21 04:01:47'),
(260, 44, 1, '{\"name\":\"Fashion Photography\"}', '2022-03-21 05:12:50', '2022-03-21 05:12:50'),
(261, 45, 1, '{\"name\":\"Model Photography\"}', '2022-03-21 05:13:51', '2022-07-18 03:14:03'),
(262, 46, 1, '{\"name\":\"Couple Photography\"}', '2022-03-21 05:14:14', '2022-07-18 03:13:36'),
(263, 47, 1, '{\"name\":\"Wild Life Photography\"}', '2022-03-21 05:15:59', '2022-03-21 05:15:59'),
(264, 48, 1, '{\"name\":\"Wedding Photography\"}', '2022-03-21 05:16:22', '2022-07-18 03:11:44'),
(265, 49, 1, '{\"name\":\"River Photography\"}', '2022-03-21 05:16:40', '2022-07-18 03:12:01'),
(266, 50, 1, '{\"name\":\"Travis Scott\",\"designation\":\"CEO\",\"dribbble\":\"https:\\/\\/dribbble.com\\/\",\"behance\":\"\",\"instagram\":\"https:\\/\\/instagram.com\\/\",\"flikr\":\"https:\\/\\/www.flickr.com\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-03-22 01:29:14', '2022-04-12 03:47:20'),
(267, 51, 1, '{\"name\":\"Mesut Ozil\",\"designation\":\"Editor\",\"dribbble\":\"\",\"behance\":\"https:\\/\\/www.behance.net\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"flikr\":\"https:\\/\\/www.flickr.com\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-03-22 01:30:09', '2022-04-12 03:41:16'),
(268, 52, 1, '{\"name\":\"Jhon Doe\",\"designation\":\"Designer\",\"dribbble\":\"https:\\/\\/dribbble.com\\/\",\"behance\":\"https:\\/\\/www.behance.net\\/\",\"instagram\":\"https:\\/\\/www.instagram.com\\/\",\"flikr\":\"https:\\/\\/www.flickr.com\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-03-22 01:31:07', '2022-04-12 03:46:55'),
(277, 48, 2, '{\"name\":\"Fotograf\\u00eda de boda\"}', '2022-07-18 03:11:50', '2022-07-26 00:49:21'),
(278, 15, 2, '{\"title\":\"Light Composure spain\",\"information\":\"<p>Light Composure spain<br \\/><\\/p>\"}', '2022-07-23 09:40:45', '2022-07-23 09:40:45'),
(279, 16, 2, '{\"title\":\"Habilidades profesionales\",\"information\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz\"}', '2022-07-26 00:28:56', '2022-07-26 00:28:56'),
(280, 17, 2, '{\"title\":\"Equipo perfecto\",\"information\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz\"}', '2022-07-26 00:29:21', '2022-07-26 00:29:21'),
(281, 18, 2, '{\"title\":\"ultra alta definici\\u00f3n\",\"information\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz\"}', '2022-07-26 00:30:48', '2022-07-26 00:30:48'),
(282, 19, 2, '{\"title\":\"\\u00danica Visiq\",\"information\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz\"}', '2022-07-26 00:31:53', '2022-07-26 00:31:53'),
(283, 20, 2, '{\"title\":\"Conocimientos de enfoque\",\"information\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz\"}', '2022-07-26 00:32:17', '2022-07-26 00:32:17'),
(284, 21, 2, '{\"name\":\"Travise William\",\"designation\":\"Fot\\u00f3grafa\",\"review\":\"5\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-07-26 00:33:01', '2022-07-26 00:33:01'),
(285, 22, 2, '{\"name\":\"Abbie Scott\",\"designation\":\"Dise\\u00f1adora\",\"review\":\"4\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-07-26 00:33:42', '2022-07-26 00:33:42'),
(286, 23, 2, '{\"name\":\"Mesut Ozil\",\"designation\":\"Gerente\",\"review\":\"4\",\"description\":\"we see the importance ina good healthy relt here are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour randomised.\"}', '2022-07-26 00:34:34', '2022-07-26 00:34:34'),
(287, 8, 2, '{\"title\":\"Lo que tus amigos piensan de ti\",\"author\":\"Helal Uddin\",\"description\":\"<p>Vestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie. Etiam egetmattis dolor. Pellentesque porta doloreu pretium felis sagittis ac. Phasellus tortor nunc, porttitor viverra lobortis ac, tincidunt nec ligula. Suspendisse potenti. Aliquam quis sapien pellentesque dui accumsan ultrices non eget velit. Fusce eu aliquam lorem. Pellentesq vel tellus enim. Ut sapien elit, dignissim ut ornare vitae, viverra ut nisi. <\\/p><p><br \\/><\\/p><p>Morbi quis sagittis velit.sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.\\r\\n\\r\\nVestibulum sed lacinia diam. Morbi varius augue quis fringilla molestie. Etiam egetmattis dolor. Pellentesque porta doloreu pretium felis sagittis ac. Phasellus tortor nunc, porttitor viverra lobortis ac, tincidunt nec ligula. Suspendisse potenti. Aliquam quis sapien pellentesque dui accumsan ultrices non eget velit. Fusce eu aliquam lorem. Pellentesq vel tellus enim. Ut sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.sapien elit, dignissim ut ornare vitae, viverra ut nisi. Morbi quis sagittis velit.\\r\\n\\r\\n<\\/p>\"}', '2022-07-26 00:35:46', '2022-08-06 22:53:26'),
(288, 9, 2, '{\"title\":\"Detr\\u00e1s de la fotograf\\u00eda\",\"author\":\"Arman Alam\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi excepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt vitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, veniam commodi provident repellat dicta! Unde enim veniam voluptatibus. Ut officiis eligendi inventore quae corporis dignissimos sit, itaque asperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor autem quos labore cum sed reiciendis modi reprehenderit. Provident distinctio incidunt ipsum, quos error atque consectetur! Architecto quibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, ipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae sapiente in fugit non accusantium assumenda eligendi earum. Ullam voluptatibus ratione, enim in libero sint blanditiis mollitia excepturi cupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis nihil excepturi ea doloremque similique natus soluta deserunt eum itaque pariatur a placeat voluptatem, eligendi aliquid repellendus perspiciatis facilis possimus. Labore repudiandae, magni dolores deleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-07-26 00:36:09', '2022-07-26 00:36:09'),
(289, 10, 2, '{\"title\":\"Bienvenido a Lens Queen\",\"author\":\"Shovan Kamal\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi \\r\\nexcepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt \\r\\nvitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, \\r\\nveniam commodi provident repellat dicta! Unde enim veniam voluptatibus. \\r\\nUt officiis eligendi inventore quae corporis dignissimos sit, itaque \\r\\nasperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor \\r\\nautem quos labore cum sed reiciendis modi reprehenderit. Provident \\r\\ndistinctio incidunt ipsum, quos error atque consectetur! Architecto \\r\\nquibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus\\r\\n animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, \\r\\nipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae \\r\\nsapiente in fugit non accusantium assumenda eligendi earum. Ullam \\r\\nvoluptatibus ratione, enim in libero sint blanditiis mollitia excepturi \\r\\ncupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis \\r\\nnihil excepturi ea doloremque similique natus soluta deserunt eum itaque\\r\\n pariatur a placeat voluptatem, eligendi aliquid repellendus \\r\\nperspiciatis facilis possimus. Labore repudiandae, magni dolores \\r\\ndeleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-07-26 00:36:45', '2022-07-26 00:36:45'),
(290, 11, 2, '{\"title\":\"Quieres saber sobre la motionograf\\u00eda?\",\"author\":\"Nayeem Mahmud\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi excepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt vitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, veniam commodi provident repellat dicta! Unde enim veniam voluptatibus. Ut officiis eligendi inventore quae corporis dignissimos sit, itaque asperiores dolores, soluta quas fuga, veniam sunt ducimus dolorum dolor autem quos labore cum sed reiciendis modi reprehenderit.<br \\/><br \\/>quae reiciendis recusandae sapiente in fugit non accusantium assumenda eligendi earum. Ullam voluptatibus ratione, enim in libero sint blanditiis mollitia excepturi cupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis nihil excepturi ea doloremque similique natus soluta deserunt eum itaque pariatur a placeat voluptatem, eligendi aliquid repellendus perspiciatis facilis possimus. Labore repudiandae, magni dolores deleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-07-26 00:37:10', '2022-07-26 00:37:10'),
(291, 12, 2, '{\"title\":\"Fotograf\\u00eda en vista r\\u00e1pida de la monta\\u00f1a.\",\"author\":\"Anisul Islam\",\"description\":\"Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi excepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt vitae nulla voluptatum iure explicabo? quas fuga, veniam sunt ducimus dolorum dolor autem quos labore cum sed reiciendis modi reprehenderit. Provident distinctio incidunt ipsum, quos error atque consectetur! Architecto quibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, ipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae sapiente in fugit non accusantium assumenda eligendi earum. Ullam voluptatibus ratione, enim in libero sint blanditiis mollitia excepturi cupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis nihil excepturi ea doloremque similique natus soluta deserunt eum itaque pariatur a placeat voluptatem, eligendi aliquid repellendus perspiciatis facilis possimus. Labore repudiandae, magni dolores deleniti temporibus nulla blanditiis accusamus,\"}', '2022-07-26 00:37:54', '2022-07-26 00:37:54'),
(292, 13, 2, '{\"title\":\"Programaci\\u00f3n del punto de clic de Lens Queen\",\"author\":\"Shahril Ahmed Siddiquie\",\"description\":\"<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi excepturi quo voluptatibus voluptate nihil a vel, esse magnam quam sunt vitae nulla voluptatum iure explicabo? Doloremque ipsa id ducimus, veniam commodi provident repellat dicta! Unde enim veniam voluptatibus. Ut officiis eligendi inventore quae corporis. Provident distinctio incidunt ipsum, quos error atque consectetur! Architecto quibusdam, ab natus voluptatum, eligendi magnam, quisquam beatae ducimus animi sit quas earum atque ullam assumenda. Labore adipisci molestiae, ipsa veniam vel aperiam cupiditate,<br \\/><br \\/>quae reiciendis recusandae sapiente in fugit non accusantium assumenda eligendi earum. Ullam voluptatibus ratione, enim in libero sint blanditiis mollitia excepturi cupiditate laboriosam debitis? Animi sapiente aspernatur blanditiis nihil excepturi ea doloremque similique natus soluta deserunt eum itaque pariatur a placeat voluptatem, eligendi aliquid repellendus perspiciatis facilis possimus. Labore repudiandae, magni dolores deleniti temporibus nulla blanditiis accusamus,<br \\/><\\/p>\"}', '2022-07-26 00:38:35', '2022-07-26 00:38:35'),
(293, 24, 2, '{\"title\":\"Sesi\\u00f3n finalizada\",\"number\":\"125\"}', '2022-07-26 00:41:02', '2022-07-26 00:41:02'),
(294, 25, 2, '{\"title\":\"Sesiones de estudio\",\"number\":\"45\"}', '2022-07-26 00:41:17', '2022-07-26 00:41:17'),
(295, 26, 2, '{\"title\":\"Clientes Felices\",\"number\":\"250\"}', '2022-07-26 00:41:29', '2022-07-26 00:41:29'),
(296, 27, 2, '{\"title\":\"Premios propios\",\"number\":\"45\"}', '2022-07-26 00:41:40', '2022-07-26 00:41:40'),
(297, 28, 2, '{\"title\":\"Tazas de caf\\u00e9\",\"number\":\"472\"}', '2022-07-26 00:41:58', '2022-07-26 00:41:58'),
(298, 31, 2, '{\"name\":\"Retratos\",\"percentage\":\"87\"}', '2022-07-26 00:42:18', '2022-07-26 00:42:18'),
(299, 32, 2, '{\"name\":\"Estilo de vida\",\"percentage\":\"45\"}', '2022-07-26 00:42:33', '2022-07-26 00:42:33'),
(300, 33, 2, '{\"name\":\"Moda\",\"percentage\":\"75\"}', '2022-07-26 00:42:43', '2022-07-26 00:42:43'),
(301, 34, 2, '{\"name\":\"Estudio\",\"percentage\":\"90\"}', '2022-07-26 00:43:02', '2022-07-26 00:43:02'),
(302, 35, 2, '{\"item\":\"Canon Eos 5D Mark IV 24-105 mm\"}', '2022-07-26 00:46:50', '2022-07-26 00:46:50'),
(303, 36, 2, '{\"item\":\"Tr\\u00edpode compacto Manfrotto\"}', '2022-07-26 00:47:00', '2022-07-26 00:47:00'),
(304, 37, 2, '{\"item\":\"Estabilizador de card\\u00e1n de 3 ejes DJI Ronin MX\"}', '2022-07-26 00:47:10', '2022-07-26 00:47:10'),
(305, 38, 2, '{\"item\":\"Canon EF100-400MM Lens\"}', '2022-07-26 00:47:15', '2022-07-26 00:47:15'),
(306, 39, 2, '{\"item\":\"Lapso de tiempo del deslizador inal\\u00e1mbrico Wondlan Wer01\"}', '2022-07-26 00:47:24', '2022-07-26 00:47:24'),
(307, 40, 2, '{\"item\":\"Nikon D5 24-70 mm F2.8\"}', '2022-07-26 00:47:34', '2022-07-26 00:47:34'),
(308, 41, 2, '{\"item\":\"Lente Nikon Af-S 24Mm F\\/1.4G Ed\"}', '2022-07-26 00:48:07', '2022-07-26 00:48:07'),
(309, 42, 2, '{\"item\":\"Plataforma inal\\u00e1mbrica Dslr Wondlan Sniper Sn 2.1 Wf\"}', '2022-07-26 00:48:17', '2022-07-26 00:48:17'),
(310, 44, 2, '{\"name\":\"Fotograf\\u00eda de moda\"}', '2022-07-26 00:48:47', '2022-07-26 00:48:47'),
(311, 45, 2, '{\"name\":\"Fotograf\\u00eda de modelo\"}', '2022-07-26 00:48:54', '2022-07-26 00:48:54'),
(312, 46, 2, '{\"name\":\"Fotograf\\u00eda de pareja\"}', '2022-07-26 00:49:02', '2022-07-26 00:49:02'),
(313, 47, 2, '{\"name\":\"Fotograf\\u00eda de vida salvaje\"}', '2022-07-26 00:49:11', '2022-07-26 00:49:11'),
(314, 49, 2, '{\"name\":\"Fotograf\\u00eda de r\\u00edo\"}', '2022-07-26 00:50:14', '2022-07-26 00:50:14'),
(315, 50, 2, '{\"name\":\"Travis Scott\",\"designation\":\"CEO\",\"dribbble\":\"https:\\/\\/dribbble.com\\/\",\"behance\":\"\",\"instagram\":\"https:\\/\\/instagram.com\\/\",\"flikr\":\"https:\\/\\/www.flickr.com\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-07-26 00:50:59', '2022-07-26 00:50:59'),
(316, 51, 2, '{\"name\":\"Mesut Ozil\",\"designation\":\"Editor\",\"dribbble\":\"https:\\/\\/dribbble.com\\/\",\"behance\":\"\",\"instagram\":\"https:\\/\\/instagram.com\\/\",\"flikr\":\"\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-07-26 00:51:39', '2022-07-26 00:51:39'),
(317, 52, 2, '{\"name\":\"Travis Scott\",\"designation\":\"CEO\",\"dribbble\":\"\",\"behance\":\"\",\"instagram\":\"https:\\/\\/instagram.com\\/\",\"flikr\":\"https:\\/\\/www.flickr.com\\/\",\"facebook\":\"https:\\/\\/www.facebook.com\\/\"}', '2022-07-26 00:52:01', '2022-07-26 00:52:01'),
(318, 5, 2, '{\"name\":\"Instagram\"}', '2022-07-26 00:52:17', '2022-07-26 00:52:17'),
(319, 6, 2, '{\"name\":\"Facebook\"}', '2022-07-26 00:52:21', '2022-07-26 00:52:21'),
(320, 7, 2, '{\"name\":\"Twitter\"}', '2022-07-26 00:52:31', '2022-07-26 00:52:31');

-- --------------------------------------------------------

--
-- Table structure for table `content_media`
--

CREATE TABLE `content_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content_id` bigint(20) UNSIGNED DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `content_media`
--

INSERT INTO `content_media` (`id`, `content_id`, `description`, `created_at`, `updated_at`) VALUES
(5, 5, '{\"link\":\"https:\\/\\/www.instagram.com\",\"icon\":\"fab fa-instagram\"}', '2022-03-14 05:07:05', '2022-03-14 05:07:05'),
(6, 6, '{\"link\":\"https:\\/\\/www.facebook.com\",\"icon\":\"fab fa-facebook-f\"}', '2022-03-14 05:07:32', '2022-03-14 05:07:32'),
(7, 7, '{\"link\":\"https:\\/\\/www.twitter.com\",\"icon\":\"fab fa-twitter\"}', '2022-03-14 05:07:53', '2022-03-14 05:07:53'),
(8, 8, '{\"image\":\"62ef467aad0021659848314.png\"}', '2022-03-15 23:58:10', '2022-08-06 22:58:35'),
(9, 9, '{\"image\":\"62ef48495d2091659848777.png\"}', '2022-03-16 01:10:33', '2022-08-06 23:06:17'),
(10, 10, '{\"image\":\"62ef48c2c1a851659848898.png\"}', '2022-03-16 02:53:38', '2022-08-06 23:08:18'),
(11, 11, '{\"image\":\"62ef492da25be1659849005.png\"}', '2022-03-16 02:54:16', '2022-08-06 23:10:05'),
(12, 12, '{\"image\":\"62ef5bdf37adc1659853791.png\"}', '2022-03-16 02:56:44', '2022-08-07 00:29:51'),
(13, 13, '{\"image\":\"62ef5c2fe760b1659853871.png\"}', '2022-03-16 02:57:31', '2022-08-07 00:31:12'),
(14, 15, '{\"image\":\"62ef8ab9883f11659865785.png\"}', '2022-03-20 01:07:56', '2022-08-07 03:49:45'),
(15, 16, '{\"image\":\"62ef8acab5fd61659865802.png\"}', '2022-03-20 01:09:08', '2022-08-07 03:50:02'),
(16, 17, '{\"image\":\"62ef8d43529e01659866435.png\"}', '2022-03-20 01:09:51', '2022-08-07 04:00:35'),
(17, 18, '{\"image\":\"62ef8adf4b0021659865823.png\"}', '2022-03-20 01:10:27', '2022-08-07 03:50:23'),
(18, 19, '{\"image\":\"62ef8d2f8b8ab1659866415.png\"}', '2022-03-20 01:11:02', '2022-08-07 04:00:15'),
(19, 20, '{\"image\":\"62ef8ae44be0f1659865828.png\"}', '2022-03-20 01:11:33', '2022-08-07 03:50:28'),
(20, 21, '{\"image\":\"6236f4c52ecb81647768773.png\"}', '2022-03-20 03:13:53', '2022-03-20 03:32:53'),
(21, 22, '{\"image\":\"6236f40ccf90c1647768588.png\"}', '2022-03-20 03:29:48', '2022-03-20 03:29:48'),
(22, 23, '{\"image\":\"6236f44c95ff91647768652.png\"}', '2022-03-20 03:30:52', '2022-03-20 03:30:52'),
(23, 44, '{\"image\":\"62385db251aae1647861170.jpg\"}', '2022-03-21 05:12:50', '2022-03-21 05:12:50'),
(24, 45, '{\"image\":\"62385def7179b1647861231.jpg\"}', '2022-03-21 05:13:51', '2022-03-21 05:13:51'),
(25, 46, '{\"image\":\"62385e0651db31647861254.jpg\"}', '2022-03-21 05:14:14', '2022-03-21 05:14:14'),
(26, 47, '{\"image\":\"62385e6fab4cf1647861359.jpg\"}', '2022-03-21 05:15:59', '2022-03-21 05:15:59'),
(27, 48, '{\"image\":\"62387a876b1b01647868551.jpg\"}', '2022-03-21 05:16:22', '2022-03-21 07:15:51'),
(28, 49, '{\"image\":\"62385e98032e11647861400.jpg\"}', '2022-03-21 05:16:40', '2022-03-21 05:16:40'),
(29, 50, '{\"image\":\"62397acaae6a41647934154.jpg\"}', '2022-03-22 01:29:14', '2022-03-22 01:29:14'),
(30, 51, '{\"image\":\"62397b01c89aa1647934209.jpg\"}', '2022-03-22 01:30:09', '2022-03-22 01:30:09'),
(31, 52, '{\"image\":\"62397b3bd3fea1647934267.jpg\"}', '2022-03-22 01:31:07', '2022-03-22 01:31:07'),
(33, 54, '{\"image\":\"6239a66d8d9561647945325.jpg\"}', '2022-03-22 04:35:18', '2022-03-22 04:35:25'),
(34, 55, '{\"image\":\"6239a6ef73fcd1647945455.jpg\"}', '2022-03-22 04:37:35', '2022-03-22 04:37:35'),
(35, 56, '{\"image\":\"6239ac29560771647946793.jpg\"}', '2022-03-22 04:54:29', '2022-03-22 04:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

CREATE TABLE `email_templates` (
  `id` int(11) NOT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `template_key` varchar(120) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `template` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sms_body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail_status` tinyint(1) NOT NULL DEFAULT 0,
  `sms_status` tinyint(1) NOT NULL DEFAULT 0,
  `lang_code` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `language_id`, `template_key`, `email_from`, `name`, `subject`, `template`, `sms_body`, `short_keys`, `mail_status`, `sms_status`, `lang_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'PROFILE_UPDATE', 'support@domain.com', 'Profile has been updated', 'Profile has been updated', 'Your first name [[firstname]]\r\n\r\nlast name [[lastname]]\r\n\r\nemail [[email]]\r\n\r\nphone number [[phone]]\r\n', 'Your first name [[firstname]]\r\n\r\nlast name [[lastname]]\r\n\r\nemail [[email]]\r\n\r\nphone number [[phone]]\r\n', '{\"trx\":\"Transaction Number\",\"amount\":\"Request Amount By user\",\"charge\":\"Gateway Charge\",\"currency\":\"Site Currency\",\"rate\":\"Conversion Rate\",\"method_name\":\"Deposit Method Name\",\"method_currency\":\"Deposit Method Currency\",\"method_amount\":\"Deposit Method Amount After Conversion\"}', 1, 1, NULL, '2021-01-23 05:20:56', '2022-07-18 01:22:22'),
(2, 1, 'ADMIN_SUPPORT_REPLY', 'support@domain.com', 'Support Ticket Reply ', 'Support Ticket Reply', '<p>Ticket ID [[ticket_id]]\r\n</p><p><span><br /></span></p><p><span>Subject [[ticket_subject]]\r\n</span></p><p><span>-----Replied------</span></p><p><span>\r\n[[reply]]</span><br /></p>', 'Ticket ID [[ticket_id]]\r\n\r\n\r\n\r\nSubject [[ticket_subject]]\r\n\r\n-----Replied------\r\n\r\n[[reply]]', '{\"ticket_id\":\"Support Ticket ID\",\"ticket_subject\":\"Subject Of Support Ticket\",\"reply\":\"Reply from Staff\\/Admin\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(3, 1, 'PASSWORD_CHANGED', 'support@domain.com', 'PASSWORD CHANGED ', 'Your password changed ', 'Your password changed \r\n\r\nNew password [[password]]\r\n\r\n', 'Your password changed\r\n\r\nNew password [[password]]\r\n\r\n\r\nNews [[test]]', '{\"password\":\"password\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(6, 1, 'ORDER_CONFIRM', 'support@domain.com', 'Order Confirmed', 'Your Order Has Been Confirmed', 'Your Order has been confirmed\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nOrder At [[order_at]] \r\n\r\nService [[service]]\r\n\r\nStatus [[status]]\r\n\r\nPaid Amount [[paid_amount]] [[currency]]\r\n\r\nYour Current Balance [[remaining_balance]] [[currency]]\r\n\r\nTransaction: #[[transaction]]', 'Your Order has been confirmed\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nOrder At [[order_at]] \r\n\r\nService [[service]]\r\n\r\nStatus [[status]]\r\n\r\nPaid Amount [[paid_amount]] [[currency]]\r\n\r\nYour Current Balance [[remaining_balance]] [[currency]]\r\n\r\nTransaction: #[[transaction]]', '{\"order_id\":\"order ID\",\"order_at\":\"order At\",\"service\":\"Service\", \"status\":\"status\",\"paid_amount\":\"paid amount\",\"transaction\":\"transaction ID\",\"remaining_balance\":\"Remaining Balance\",\"currency\":\"currency\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(7, 1, 'ORDER_UPDATE', 'support@domain.com', 'Order Update', 'Your Order Has Been Updated', 'Your Order has been updated\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nStart Counter [[start_counter]] \r\n\r\nLink [[link]]\r\n\r\nRemains[[remains]]\r\n\r\norder status [[order_status]]\r\n', 'Your Order has been updated\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nStart Counter [[start_counter]] \r\n\r\nLink [[link]]\r\n\r\nRemains[[remains]]\r\n\r\norder status [[order_status]]\r\n', '{\"order_id\":\"order ID\",\"start_counter\":\"start counter\",\"link\":\"link\", \"remains\":\"remains\",\"order_status\":\"order status\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(8, 1, 'PAYMENT_COMPLETE', 'support@domain.com', 'Payment Completed', 'Your Payment Has Been Completed', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge[[charge]] [[currency]]\r\n\r\nTranaction [[transaction]]\r\n\r\nYour Main Balance [[remaining_balance]] [[currency]]\r\n\r\n', '{\"gateway_name\":\"gateway name\",\"amount\":\"amount\",\"charge\":\"charge\", \"currency\":\"currency\",\"transaction\":\"transaction\",\"remaining_balance\":\"remaining balance\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(9, 1, 'PASSWORD_RESET', 'support@domain.com', 'Reset Password Notification', 'Reset Password Notification', 'You are receiving this email because we received a password reset request for your account.[[message]]\r\n\r\n\r\nThis password reset link will expire in 60 minutes.\r\n\r\nIf you did not request a password reset, no further action is required.', 'You are receiving this email because we received a password reset request for your account. [[message]]', '{\"message\":\"message\"}', 1, 1, NULL, '2021-01-27 00:32:07', '2022-07-18 01:22:22'),
(10, 1, 'VERIFICATION_CODE', 'support@domain.com', 'Verification Code', 'Verify Your Email ', 'Your Email verification Code  [[code]]', 'Your SMS verification Code  [[code]]', '{\"code\":\"code\"}', 1, 1, NULL, '2021-01-27 00:32:07', '2022-07-18 01:22:22'),
(11, 1, 'TWO_STEP_ENABLED', 'support@domain.com', 'TWO STEP ENABLED', 'TWO STEP ENABLED', 'Your verification code is: [[code]]', 'Your verification code is: [[code]]', '{\"action\":\"Enabled Or Disable\",\"ip\":\"Device Ip\",\"browser\":\"browser and Operating System \",\"time\":\"Time\",\"code\":\"code\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(12, 1, 'TWO_STEP_DISABLED', 'support@domain.com', 'TWO STEP DISABLED', 'TWO STEP DISABLED', 'Google two factor verification is disabled', 'Google two factor verification is disabled', '{\"action\":\"Enabled Or Disable\",\"ip\":\"Device Ip\",\"browser\":\"browser and Operating System \",\"time\":\"Time\"}', 1, 1, NULL, '2021-01-23 05:24:42', '2022-07-18 01:22:22'),
(13, 1, 'PLAN_PURCHASE_PAYMENT_COMPLETE', 'support@domain.com', 'Plan Purchased and Payment Completed', 'Plan Purchased And Payment Has Been Completed', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge [[charge]] [[currency]]\r\n\r\nTransaction [[transaction]]\r\n\r\nPlan Name [[plan_name]]\r\n\r\n\r\n\r\n', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]]\r\n\r\nCharge [[charge]] [[currency]]\r\n\r\nTransaction [[transaction]]\r\n\r\nPlan Name [[plan_name]]\r\n\r\n', '{\"gateway_name\":\"gateway name\",\"amount\":\"amount\",\"charge\":\"charge\", \"currency\":\"currency\",\"transaction\":\"transaction\",\"plan_name\":\"plan name\"}', 1, 1, NULL, '2022-04-28 09:48:28', '2022-07-18 01:22:22'),
(14, 1, 'PRODUCT_PURCHASE_PAYMENT_COMPLETE', 'support@domain.com', 'Product Purchased and Payment Completed', 'Product Purchased And Payment Has Been Completed', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]] \r\n\r\nCharge [[charge]] [[currency]] \r\n\r\nTransaction [[transaction]] \r\n\r\nProduct Name [[product_name]]', '[[amount]] [[currency]] Payment Has Been successful via [[gateway_name]] \r\n\r\nCharge [[charge]] [[currency]] \r\n\r\nTransaction [[transaction]] \r\n\r\nProduct Name [[product_name]]', '{\"gateway_name\":\"gateway name\",\"amount\":\"amount\",\"charge\":\"charge\", \"currency\":\"currency\",\"transaction\":\"transaction\",\"product_name\":\"product name\"}', 1, 1, NULL, '2022-04-28 09:54:37', '2022-07-18 01:22:22'),
(15, 1, 'BOOKING_FORM_REQUEST_STATUS_CHANGED', 'support@domain.com', 'Your Booking form request status has been changed', 'Your Booking form request status has been changed', 'Your Booking form request for [[date]] has been [[status]]\r\n', 'Your Booking form request for [[date]] has been [[status]]\r\n', '{\"date:\"date\",\"status\":\"status\"}', 1, 1, NULL, '2022-04-28 11:24:18', '2022-07-18 01:22:22'),
(16, 2, 'ORDER_CONFIRM', 'support@domain.com', 'Order Confirmed', 'Your Order Has Been Confirmed', 'Your Order has been confirmed\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nOrder At [[order_at]] \r\n\r\nService [[service]]\r\n\r\nStatus [[status]]\r\n\r\nPaid Amount [[paid_amount]] [[currency]]\r\n\r\nYour Current Balance [[remaining_balance]] [[currency]]\r\n\r\nTransaction: #[[transaction]]', 'Your Order has been confirmed\r\n\r\n\r\nOrder Id [[order_id]] \r\n\r\nOrder At [[order_at]] \r\n\r\nService [[service]]\r\n\r\nStatus [[status]]\r\n\r\nPaid Amount [[paid_amount]] [[currency]]\r\n\r\nYour Current Balance [[remaining_balance]] [[currency]]\r\n\r\nTransaction: #[[transaction]]', '{\"order_id\":\"order ID\",\"order_at\":\"order At\",\"service\":\"Service\",\"status\":\"status\",\"paid_amount\":\"paid amount\",\"transaction\":\"transaction ID\",\"remaining_balance\":\"Remaining Balance\",\"currency\":\"currency\"}', 1, 1, 'ES', '2022-06-20 05:20:57', '2022-07-18 01:22:22');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `funds`
--

CREATE TABLE `funds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `gateway_id` bigint(20) UNSIGNED DEFAULT NULL,
  `plan_id` bigint(20) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `gateway_currency` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `rate` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `final_amount` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `btc_amount` decimal(18,8) DEFAULT NULL,
  `btc_wallet` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `try` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '1=> Complete, 2=> Pending, 3 => Cancel',
  `booking_info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `gateways`
--

CREATE TABLE `gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sort_by` int(11) DEFAULT 1,
  `currency` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: inactive, 1: active',
  `convention_rate` decimal(18,8) NOT NULL DEFAULT 1.00000000,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currencies` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra_parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `min_amount` decimal(18,8) NOT NULL,
  `max_amount` decimal(18,8) NOT NULL,
  `percentage_charge` decimal(8,4) NOT NULL DEFAULT 0.0000,
  `fixed_charge` decimal(18,8) NOT NULL DEFAULT 0.00000000,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gateways`
--

INSERT INTO `gateways` (`id`, `name`, `code`, `sort_by`, `currency`, `symbol`, `image`, `status`, `convention_rate`, `note`, `parameters`, `currencies`, `extra_parameters`, `min_amount`, `max_amount`, `percentage_charge`, `fixed_charge`, `created_at`, `updated_at`) VALUES
(1, 'Paypal', 'paypal', 14, 'USD', 'USD', '5f637b5622d23.jpg', 1, '0.01200000', '', '{\"cleint_id\":\"AUrvcotEVWZkksiGir6Ih4PyalQcguQgGN-7We5O1wBny3tg1w6srbQzi6GQEO8lP3yJVha2C6lyivK9\", \"secret\":\"EPx-YEgvjKDRFFu3FAsMue_iUMbMH6jHu408rHdn4iGrUCM8M12t7mX8hghUBAWwvWErBOa4Uppfp0Eh\"}', '{\"0\":{\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"GBP\":\"GBP\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"USD\":\"USD\"}}', NULL, '1.00000000', '10000.00000000', '1.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(2, 'Stripe ', 'stripe', 23, 'USD', 'USD', '5f645d432b9c0.jpg', 1, '1.00000000', '', '{\"secret_key\":\"sk_test_YOUR_STRIPE_SECRET_KEY\",\"publishable_key\":\"pk_test_YOUR_STRIPE_PUBLISHABLE_KEY\"}', '{\"0\":{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"SGD\":\"SGD\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(3, 'Skrill', 'skrill', 22, 'USD', 'USD', '5f637c7fcb9ef.jpg', 1, '1.00000000', '', '{\"pay_to_email\":\"mig33@gmail.com\",\"secret_key\":\"SECRETKEY\"}', '{\"0\":{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"MAD\":\"MAD\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"SAR\":\"SAR\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TND\":\"TND\",\"TRY\":\"TRY\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\",\"COP\":\"COP\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(4, 'Perfect Money', 'perfectmoney', 18, 'USD', 'USD', '5f64d522d8bea.jpg', 1, '1.00000000', '', '{\"passphrase\":\"112233445566\",\"payee_account\":\"U26203997\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(5, 'PayTM', 'paytm', 16, 'INR', 'INR', '5f637cbfb4d4c.jpg', 1, '1.00000000', '', '{\"MID\":\"uAOkSk48844590235401\",\"merchant_key\":\"pcB_oEk_R@kbm1c1\",\"WEBSITE\":\"DIYtestingweb\",\"INDUSTRY_TYPE_ID\":\"Retail\",\"CHANNEL_ID\":\"WEB\",\"transaction_url\":\"https:\\/\\/securegw.paytm.in\\/order\\/process\",\"transaction_status_url\":\"https:\\/\\/securegw.paytm.in\\/order\\/status\"}', '{\"0\":{\"AUD\":\"AUD\",\"ARS\":\"ARS\",\"BDT\":\"BDT\",\"BRL\":\"BRL\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"GEL\":\"GEL\",\"GHS\":\"GHS\",\"HKD\":\"HKD\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"MYR\":\"MYR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"NGN\":\"NGN\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SGD\":\"SGD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"THB\":\"THB\",\"TRY\":\"TRY\",\"UGX\":\"UGX\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"GBP\":\"GBP\",\"USD\":\"USD\",\"VND\":\"VND\",\"XOF\":\"XOF\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(6, 'Payeer', 'payeer', 13, 'RUB', 'USD', '5f64d52d09e13.jpg', 1, '1.00000000', '', '{\"merchant_id\":\"1560632740\",\"secret_key\":\"817b347f8c9315713fe68402a186c569673c624\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\",\"RUB\":\"RUB\"}}', '{\"status\":\"ipn\"}', '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-15 09:48:39'),
(7, 'PayStack', 'paystack', 15, 'NGN', 'NGN', '5f637d069177e.jpg', 1, '1.00000000', '', '{\"public_key\":\"pk_test_f922aa1a87101e3fd029e13024006862fdc0b8c7\",\"secret_key\":\"sk_test_b8d571f97c1b41d409ba339eb20b005377751dff\"}', '{\"0\":{\"USD\":\"USD\",\"NGN\":\"NGN\"}}', '{\"callback\":\"ipn\",\"webhook\":\"ipn\"}\r\n', '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(8, 'VoguePay', 'voguepay', 21, 'USD', 'USD', '5f637d53da3e7.jpg', 1, '1.00000000', '', '{\"merchant_id\":\"9753-0112994\"}', '{\"0\":{\"NGN\":\"NGN\",\"USD\":\"USD\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"ZAR\":\"ZAR\",\"JPY\":\"JPY\",\"INR\":\"INR\",\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"NZD\":\"NZD\",\"NOK\":\"NOK\",\"PLN\":\"PLN\"}}\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n\r\n', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(9, 'Flutterwave', 'flutterwave', 8, 'USD', 'USD', '5f637d6a0b22d.jpg', 1, '0.01200000', '', '{\"public_key\":\"FLWPUBK_TEST-YOUR_FLUTTERWAVE_PUBLIC_KEY-X\",\"secret_key\":\"FLWSECK_TEST-YOUR_FLUTTERWAVE_SECRET_KEY-X\",\"encryption_key\":\"FLWSECK_TEST_YOUR_ENCRYPTION_KEY\"}', '{\"0\":{\"KES\":\"KES\",\"GHS\":\"GHS\",\"NGN\":\"NGN\",\"USD\":\"USD\",\"GBP\":\"GBP\",\"EUR\":\"EUR\",\"UGX\":\"UGX\",\"TZS\":\"TZS\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(10, 'RazorPay', 'razorpay', 19, 'INR', 'INR', '5f637d80b68e0.jpg', 1, '1.00000000', '', '{\"key_id\":\"rzp_test_kiOtejPbRZU90E\",\"key_secret\":\"osRDebzEqbsE1kbyQJ4y0re7\"}', '{\"0\": {\"INR\": \"INR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(11, 'instamojo', 'instamojo', 9, 'INR', 'INR', '5f637da3c44d2.jpg', 1, '73.51000000', '', '{\"api_key\":\"test_2241633c3bc44a3de84a3b33969\",\"auth_token\":\"test_279f083f7bebefd35217feef22d\",\"salt\":\"19d38908eeff4f58b2ddda2c6d86ca25\"}', '{\"0\":{\"INR\":\"INR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(12, 'Mollie', 'mollie', 11, 'USD', 'USD', '5f637db537958.jpg', 1, '0.01200000', '', '{\"api_key\":\"test_cucfwKTWfft9s337qsVfn5CC4vNkrn\"}', '{\"0\":{\"AED\":\"AED\",\"AUD\":\"AUD\",\"BGN\":\"BGN\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"HRK\":\"HRK\",\"HUF\":\"HUF\",\"ILS\":\"ILS\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\",\"USD\":\"USD\",\"ZAR\":\"ZAR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(13, '2checkout', 'twocheckout', 24, 'USD', 'USD', '5f637e7eae68b.jpg', 1, '1.00000000', '', '{\"merchant_code\":\"250507228545\",\"secret_key\":\"=+0CNzfvTItqp*ygwiQE\"}', '{\"0\":{\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"DZD\":\"DZD\",\"ARS\":\"ARS\",\"AUD\":\"AUD\",\"AZN\":\"AZN\",\"BSD\":\"BSD\",\"BDT\":\"BDT\",\"BBD\":\"BBD\",\"BZD\":\"BZD\",\"BMD\":\"BMD\",\"BOB\":\"BOB\",\"BWP\":\"BWP\",\"BRL\":\"BRL\",\"GBP\":\"GBP\",\"BND\":\"BND\",\"BGN\":\"BGN\",\"CAD\":\"CAD\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"HRK\":\"HRK\",\"CZK\":\"CZK\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"XCD\":\"XCD\",\"EGP\":\"EGP\",\"EUR\":\"EUR\",\"FJD\":\"FJD\",\"GTQ\":\"GTQ\",\"HKD\":\"HKD\",\"HNL\":\"HNL\",\"HUF\":\"HUF\",\"INR\":\"INR\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"JMD\":\"JMD\",\"JPY\":\"JPY\",\"KZT\":\"KZT\",\"KES\":\"KES\",\"LAK\":\"LAK\",\"MMK\":\"MMK\",\"LBP\":\"LBP\",\"LRD\":\"LRD\",\"MOP\":\"MOP\",\"MYR\":\"MYR\",\"MVR\":\"MVR\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MXN\":\"MXN\",\"MAD\":\"MAD\",\"NPR\":\"NPR\",\"TWD\":\"TWD\",\"NZD\":\"NZD\",\"NIO\":\"NIO\",\"NOK\":\"NOK\",\"PKR\":\"PKR\",\"PGK\":\"PGK\",\"PEN\":\"PEN\",\"PHP\":\"PHP\",\"PLN\":\"PLN\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RUB\":\"RUB\",\"WST\":\"WST\",\"SAR\":\"SAR\",\"SCR\":\"SCR\",\"SGD\":\"SGD\",\"SBD\":\"SBD\",\"ZAR\":\"ZAR\",\"KRW\":\"KRW\",\"LKR\":\"LKR\",\"SEK\":\"SEK\",\"CHF\":\"CHF\",\"SYP\":\"SYP\",\"THB\":\"THB\",\"TOP\":\"TOP\",\"TTD\":\"TTD\",\"TRY\":\"TRY\",\"UAH\":\"UAH\",\"AED\":\"AED\",\"USD\":\"USD\",\"VUV\":\"VUV\",\"VND\":\"VND\",\"XOF\":\"XOF\",\"YER\":\"YER\"}}', '{\"approved_url\":\"ipn\"}', '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(14, 'Authorize.Net', 'authorizenet', 1, 'USD', 'USD', '5f637de6d9fef.jpg', 1, '0.01200000', '', '{\"login_id\":\"35s2ZJWTh2\",\"current_transaction_key\":\"3P425sHVwE8t2CzX\"}', '{\"0\":{\"AUD\":\"AUD\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"NOK\":\"NOK\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"SEK\":\"SEK\",\"USD\":\"USD\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(15, 'SecurionPay', 'securionpay', 20, 'USD', 'USD', '5f637e002d11b.jpg', 1, '1.00000000', '', '{\"public_key\":\"pk_test_YOUR_SECURIONPAY_PUBLIC_KEY\",\"secret_key\":\"sk_test_YOUR_SECURIONPAY_SECRET_KEY\"}', '{\"0\":{\"AFN\":\"AFN\", \"DZD\":\"DZD\", \"ARS\":\"ARS\", \"AUD\":\"AUD\", \"BHD\":\"BHD\", \"BDT\":\"BDT\", \"BYR\":\"BYR\", \"BAM\":\"BAM\", \"BWP\":\"BWP\", \"BRL\":\"BRL\", \"BND\":\"BND\", \"BGN\":\"BGN\", \"CAD\":\"CAD\", \"CLP\":\"CLP\", \"CNY\":\"CNY\", \"COP\":\"COP\", \"KMF\":\"KMF\", \"HRK\":\"HRK\", \"CZK\":\"CZK\", \"DKK\":\"DKK\", \"DJF\":\"DJF\", \"DOP\":\"DOP\", \"EGP\":\"EGP\", \"ETB\":\"ETB\", \"ERN\":\"ERN\", \"EUR\":\"EUR\", \"GEL\":\"GEL\", \"HKD\":\"HKD\", \"HUF\":\"HUF\", \"ISK\":\"ISK\", \"INR\":\"INR\", \"IDR\":\"IDR\", \"IRR\":\"IRR\", \"IQD\":\"IQD\", \"ILS\":\"ILS\", \"JMD\":\"JMD\", \"JPY\":\"JPY\", \"JOD\":\"JOD\", \"KZT\":\"KZT\", \"KES\":\"KES\", \"KWD\":\"KWD\", \"KGS\":\"KGS\", \"LVL\":\"LVL\", \"LBP\":\"LBP\", \"LTL\":\"LTL\", \"MOP\":\"MOP\", \"MKD\":\"MKD\", \"MGA\":\"MGA\", \"MWK\":\"MWK\", \"MYR\":\"MYR\", \"MUR\":\"MUR\", \"MXN\":\"MXN\", \"MDL\":\"MDL\", \"MAD\":\"MAD\", \"MZN\":\"MZN\", \"NAD\":\"NAD\", \"NPR\":\"NPR\", \"ANG\":\"ANG\", \"NZD\":\"NZD\", \"NOK\":\"NOK\", \"OMR\":\"OMR\", \"PKR\":\"PKR\", \"PEN\":\"PEN\", \"PHP\":\"PHP\", \"PLN\":\"PLN\", \"QAR\":\"QAR\", \"RON\":\"RON\", \"RUB\":\"RUB\", \"SAR\":\"SAR\", \"RSD\":\"RSD\", \"SGD\":\"SGD\", \"ZAR\":\"ZAR\", \"KRW\":\"KRW\", \"IKR\":\"IKR\", \"LKR\":\"LKR\", \"SEK\":\"SEK\", \"CHF\":\"CHF\", \"SYP\":\"SYP\", \"TWD\":\"TWD\", \"TZS\":\"TZS\", \"THB\":\"THB\", \"TND\":\"TND\", \"TRY\":\"TRY\", \"UAH\":\"UAH\", \"AED\":\"AED\", \"GBP\":\"GBP\", \"USD\":\"USD\", \"VEB\":\"VEB\", \"VEF\":\"VEF\", \"VND\":\"VND\", \"XOF\":\"XOF\", \"YER\":\"YER\", \"ZMK\":\"ZMK\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(16, 'PayUmoney', 'payumoney', 17, 'INR', 'INR', '5f6390dbaa6ff.jpg', 1, '0.87000000', '', '{\"merchant_key\":\"gtKFFx\",\"salt\":\"eCwWELxi\"}', '{\"0\":{\"INR\":\"INR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(17, 'Mercado Pago', 'mercadopago', 10, 'BRL', 'BRL', '5f645d1bc1f24.jpg', 1, '0.06300000', '', '{\"access_token\":\"TEST-705032440135962-041006-ad2e021853f22338fe1a4db9f64d1491-421886156\"}', '{\"0\":{\"ARS\":\"ARS\",\"BOB\":\"BOB\",\"BRL\":\"BRL\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"DOP\":\"DOP\",\"EUR\":\"EUR\",\"GTQ\":\"GTQ\",\"HNL\":\"HNL\",\"MXN\":\"MXN\",\"NIO\":\"NIO\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PYG\":\"PYG\",\"USD\":\"USD\",\"UYU\":\"UYU\",\"VEF\":\"VEF\",\"VES\":\"VES\"}}', NULL, '3715.12000000', '371500000.12000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(18, 'Coingate', 'coingate', 7, 'USD', 'USD', '5f659e5355859.jpg', 1, '1.00000000', '', '{\"api_key\":\"Ba1VgPx6d437xLXGKCBkmwVCEw5kHzRJ6thbGo-N\"}', '{\"0\":{\"USD\":\"USD\",\"EUR\":\"EUR\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(19, 'Coinbase Commerce', 'coinbasecommerce', 3, 'USD', 'USD', '5f6703145a5ca.jpg', 1, '1.00000000', '', '{\"api_key\":\"c71152b8-ab4e-4712-a421-c5c7ea5165a2\",\"secret\":\"a709d081-e693-46e0-8a34-61fd785b20b3\"}', '{\"0\":{\"AED\":\"AED\",\"AFN\":\"AFN\",\"ALL\":\"ALL\",\"AMD\":\"AMD\",\"ANG\":\"ANG\",\"AOA\":\"AOA\",\"ARS\":\"ARS\",\"AUD\":\"AUD\",\"AWG\":\"AWG\",\"AZN\":\"AZN\",\"BAM\":\"BAM\",\"BBD\":\"BBD\",\"BDT\":\"BDT\",\"BGN\":\"BGN\",\"BHD\":\"BHD\",\"BIF\":\"BIF\",\"BMD\":\"BMD\",\"BND\":\"BND\",\"BOB\":\"BOB\",\"BRL\":\"BRL\",\"BSD\":\"BSD\",\"BTN\":\"BTN\",\"BWP\":\"BWP\",\"BYN\":\"BYN\",\"BZD\":\"BZD\",\"CAD\":\"CAD\",\"CDF\":\"CDF\",\"CHF\":\"CHF\",\"CLF\":\"CLF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"COP\":\"COP\",\"CRC\":\"CRC\",\"CUC\":\"CUC\",\"CUP\":\"CUP\",\"CVE\":\"CVE\",\"CZK\":\"CZK\",\"DJF\":\"DJF\",\"DKK\":\"DKK\",\"DOP\":\"DOP\",\"DZD\":\"DZD\",\"EGP\":\"EGP\",\"ERN\":\"ERN\",\"ETB\":\"ETB\",\"EUR\":\"EUR\",\"FJD\":\"FJD\",\"FKP\":\"FKP\",\"GBP\":\"GBP\",\"GEL\":\"GEL\",\"GGP\":\"GGP\",\"GHS\":\"GHS\",\"GIP\":\"GIP\",\"GMD\":\"GMD\",\"GNF\":\"GNF\",\"GTQ\":\"GTQ\",\"GYD\":\"GYD\",\"HKD\":\"HKD\",\"HNL\":\"HNL\",\"HRK\":\"HRK\",\"HTG\":\"HTG\",\"HUF\":\"HUF\",\"IDR\":\"IDR\",\"ILS\":\"ILS\",\"IMP\":\"IMP\",\"INR\":\"INR\",\"IQD\":\"IQD\",\"IRR\":\"IRR\",\"ISK\":\"ISK\",\"JEP\":\"JEP\",\"JMD\":\"JMD\",\"JOD\":\"JOD\",\"JPY\":\"JPY\",\"KES\":\"KES\",\"KGS\":\"KGS\",\"KHR\":\"KHR\",\"KMF\":\"KMF\",\"KPW\":\"KPW\",\"KRW\":\"KRW\",\"KWD\":\"KWD\",\"KYD\":\"KYD\",\"KZT\":\"KZT\",\"LAK\":\"LAK\",\"LBP\":\"LBP\",\"LKR\":\"LKR\",\"LRD\":\"LRD\",\"LSL\":\"LSL\",\"LYD\":\"LYD\",\"MAD\":\"MAD\",\"MDL\":\"MDL\",\"MGA\":\"MGA\",\"MKD\":\"MKD\",\"MMK\":\"MMK\",\"MNT\":\"MNT\",\"MOP\":\"MOP\",\"MRO\":\"MRO\",\"MUR\":\"MUR\",\"MVR\":\"MVR\",\"MWK\":\"MWK\",\"MXN\":\"MXN\",\"MYR\":\"MYR\",\"MZN\":\"MZN\",\"NAD\":\"NAD\",\"NGN\":\"NGN\",\"NIO\":\"NIO\",\"NOK\":\"NOK\",\"NPR\":\"NPR\",\"NZD\":\"NZD\",\"OMR\":\"OMR\",\"PAB\":\"PAB\",\"PEN\":\"PEN\",\"PGK\":\"PGK\",\"PHP\":\"PHP\",\"PKR\":\"PKR\",\"PLN\":\"PLN\",\"PYG\":\"PYG\",\"QAR\":\"QAR\",\"RON\":\"RON\",\"RSD\":\"RSD\",\"RUB\":\"RUB\",\"RWF\":\"RWF\",\"SAR\":\"SAR\",\"SBD\":\"SBD\",\"SCR\":\"SCR\",\"SDG\":\"SDG\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"SHP\":\"SHP\",\"SLL\":\"SLL\",\"SOS\":\"SOS\",\"SRD\":\"SRD\",\"SSP\":\"SSP\",\"STD\":\"STD\",\"SVC\":\"SVC\",\"SYP\":\"SYP\",\"SZL\":\"SZL\",\"THB\":\"THB\",\"TJS\":\"TJS\",\"TMT\":\"TMT\",\"TND\":\"TND\",\"TOP\":\"TOP\",\"TRY\":\"TRY\",\"TTD\":\"TTD\",\"TWD\":\"TWD\",\"TZS\":\"TZS\",\"UAH\":\"UAH\",\"UGX\":\"UGX\",\"USD\":\"USD\",\"UYU\":\"UYU\",\"UZS\":\"UZS\",\"VEF\":\"VEF\",\"VND\":\"VND\",\"VUV\":\"VUV\",\"WST\":\"WST\",\"XAF\":\"XAF\",\"XAG\":\"XAG\",\"XAU\":\"XAU\",\"XCD\":\"XCD\",\"XDR\":\"XDR\",\"XOF\":\"XOF\",\"XPD\":\"XPD\",\"XPF\":\"XPF\",\"XPT\":\"XPT\",\"YER\":\"YER\",\"ZAR\":\"ZAR\",\"ZMW\":\"ZMW\",\"ZWL\":\"ZWL\"}}', '{\"webhook\":\"ipn\"}', '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(20, 'Monnify', 'monnify', 12, 'NGN', 'NGN', '5fbca5d05057f.jpg', 1, '4.52000000', '', '{\"api_key\":\"MK_TEST_LB5KJDYD65\",\"secret_key\":\"WM9B4GSW826XRCNABM3NF92K9957CVMU\", \"contract_code\":\"5566252118\"}', '{\"0\":{\"NGN\":\"NGN\"}}', NULL, '1.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(21, 'Block.io', 'blockio', 2, 'BTC', 'BTC', '5fe038332ad52.jpg', 1, '0.00004200', '', '{\"api_key\":\"1d97-a9af-6521-a330\",\"api_pin\":\"654abc654opp\"}', '{\"1\":{\"BTC\":\"BTC\",\"LTC\":\"LTC\",\"DOGE\":\"DOGE\"}}', '{\"cron\":\"ipn\"}', '10.10004200', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(22, 'CoinPayments', 'coinpayments', 6, 'BTC', 'BTC', '5ffd7d962985e1610448278.jpg', 1, '0.00000000', '', '{\"merchant_id\":\"93a1e014c4ad60a7980b4a7239673cb4\",\"private_key\":\"Cb6dee7af8Eb9E0D4123543E690dA3673294147A5Dc8e7a621B5d484a3803207\",\"public_key\":\"7638eebaf4061b7f7cdfceb14046318bbdabf7e2f64944773d6550bd59f70274\"}', '{\"0\":{\"USD\":\"USD\",\"AUD\":\"AUD\",\"BRL\":\"BRL\",\"CAD\":\"CAD\",\"CHF\":\"CHF\",\"CLP\":\"CLP\",\"CNY\":\"CNY\",\"DKK\":\"DKK\",\"EUR\":\"EUR\",\"GBP\":\"GBP\",\"HKD\":\"HKD\",\"INR\":\"INR\",\"ISK\":\"ISK\",\"JPY\":\"JPY\",\"KRW\":\"KRW\",\"NZD\":\"NZD\",\"PLN\":\"PLN\",\"RUB\":\"RUB\",\"SEK\":\"SEK\",\"SGD\":\"SGD\",\"THB\":\"THB\",\"TWD\":\"TWD\"},\"1\":{\"BTC\":\"Bitcoin\",\"BTC.LN\":\"Bitcoin (Lightning Network)\",\"LTC\":\"Litecoin\",\"CPS\":\"CPS Coin\",\"VLX\":\"Velas\",\"APL\":\"Apollo\",\"AYA\":\"Aryacoin\",\"BAD\":\"Badcoin\",\"BCD\":\"Bitcoin Diamond\",\"BCH\":\"Bitcoin Cash\",\"BCN\":\"Bytecoin\",\"BEAM\":\"BEAM\",\"BITB\":\"Bean Cash\",\"BLK\":\"BlackCoin\",\"BSV\":\"Bitcoin SV\",\"BTAD\":\"Bitcoin Adult\",\"BTG\":\"Bitcoin Gold\",\"BTT\":\"BitTorrent\",\"CLOAK\":\"CloakCoin\",\"CLUB\":\"ClubCoin\",\"CRW\":\"Crown\",\"CRYP\":\"CrypticCoin\",\"CRYT\":\"CryTrExCoin\",\"CURE\":\"CureCoin\",\"DASH\":\"DASH\",\"DCR\":\"Decred\",\"DEV\":\"DeviantCoin\",\"DGB\":\"DigiByte\",\"DOGE\":\"Dogecoin\",\"EBST\":\"eBoost\",\"EOS\":\"EOS\",\"ETC\":\"Ether Classic\",\"ETH\":\"Ethereum\",\"ETN\":\"Electroneum\",\"EUNO\":\"EUNO\",\"EXP\":\"EXP\",\"Expanse\":\"Expanse\",\"FLASH\":\"FLASH\",\"GAME\":\"GameCredits\",\"GLC\":\"Goldcoin\",\"GRS\":\"Groestlcoin\",\"KMD\":\"Komodo\",\"LOKI\":\"LOKI\",\"LSK\":\"LSK\",\"MAID\":\"MaidSafeCoin\",\"MUE\":\"MonetaryUnit\",\"NAV\":\"NAV Coin\",\"NEO\":\"NEO\",\"NMC\":\"Namecoin\",\"NVST\":\"NVO Token\",\"NXT\":\"NXT\",\"OMNI\":\"OMNI\",\"PINK\":\"PinkCoin\",\"PIVX\":\"PIVX\",\"POT\":\"PotCoin\",\"PPC\":\"Peercoin\",\"PROC\":\"ProCurrency\",\"PURA\":\"PURA\",\"QTUM\":\"QTUM\",\"RES\":\"Resistance\",\"RVN\":\"Ravencoin\",\"RVR\":\"RevolutionVR\",\"SBD\":\"Steem Dollars\",\"SMART\":\"SmartCash\",\"SOXAX\":\"SOXAX\",\"STEEM\":\"STEEM\",\"STRAT\":\"STRAT\",\"SYS\":\"Syscoin\",\"TPAY\":\"TokenPay\",\"TRIGGERS\":\"Triggers\",\"TRX\":\" TRON\",\"UBQ\":\"Ubiq\",\"UNIT\":\"UniversalCurrency\",\"USDT\":\"Tether USD (Omni Layer)\",\"VTC\":\"Vertcoin\",\"WAVES\":\"Waves\",\"XCP\":\"Counterparty\",\"XEM\":\"NEM\",\"XMR\":\"Monero\",\"XSN\":\"Stakenet\",\"XSR\":\"SucreCoin\",\"XVG\":\"VERGE\",\"XZC\":\"ZCoin\",\"ZEC\":\"ZCash\",\"ZEN\":\"Horizen\"}}', '{\"callback\":\"ipn\"}', '10.00000000', '99999.00000000', '1.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(23, 'Blockchain', 'blockchain', 4, 'BTC', 'BTC', '5fe439f477bb7.jpg', 1, '0.00000000', '', '{\"api_key\":\"8df2e5a0-3798-4b74-871d-973615b57e7b\",\"xpub_code\":\"xpub6CXLqfWXj1xgXe79nEQb3pv2E7TGD13pZgHceZKrQAxqXdrC2FaKuQhm5CYVGyNcHLhSdWau4eQvq3EDCyayvbKJvXa11MX9i2cHPugpt3G\"}', '{\"1\":{\"BTC\":\"BTC\"}}', NULL, '100.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19'),
(25, 'cashmaal', 'cashmaal', 5, 'PKR', 'PKR', 'cashmaal.jpg', 1, '0.85000000', '', '{\"web_id\": \"3748\",\"ipn_key\": \"546254628759524554647987\"}\r\n', '{\"0\":{\"PKR\":\"PKR\",\"USD\":\"USD\"}}', '{\"ipn_url\":\"ipn\"}', '100.00000000', '10000.00000000', '0.0000', '0.50000000', '2020-09-10 09:05:02', '2021-12-14 23:22:19');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_name` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `flag` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 0 = inactive',
  `rtl` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`id`, `name`, `short_name`, `flag`, `is_active`, `rtl`, `created_at`, `updated_at`) VALUES
(1, 'English', 'US', NULL, 1, 0, '2022-06-20 03:39:44', '2022-06-20 03:39:44'),
(2, 'Spanish', 'ES', NULL, 1, 0, '2022-06-20 03:40:06', '2022-06-20 03:40:06');

-- --------------------------------------------------------

--
-- Table structure for table `manage_galleries`
--

CREATE TABLE `manage_galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tag_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manage_galleries`
--

INSERT INTO `manage_galleries` (`id`, `tag_id`, `image`, `created_at`, `updated_at`) VALUES
(8, 2, '623c51d666dc21648120278.jpg', '2022-03-24 00:33:21', '2022-03-24 05:11:18'),
(9, 1, '623c523c14c0f1648120380.jpg', '2022-03-24 00:33:41', '2022-03-24 05:13:00'),
(10, 4, '623c51be6b6111648120254.jpg', '2022-03-24 00:33:53', '2022-03-24 05:10:54'),
(11, 3, '623c51b5686201648120245.jpg', '2022-03-24 00:34:23', '2022-03-24 05:10:45'),
(12, 4, '623c51ac2c87e1648120236.jpg', '2022-03-24 00:34:33', '2022-03-24 05:10:36'),
(13, 3, '623c519e7f3371648120222.jpg', '2022-03-24 00:34:52', '2022-03-24 05:10:22'),
(14, 1, '623c1115ad7bf1648103701.png', '2022-03-24 00:35:01', '2022-03-24 00:35:01'),
(15, 2, '623c518c528301648120204.jpg', '2022-03-24 00:35:28', '2022-03-24 05:10:04'),
(16, 3, '623c1142101841648103746.jpg', '2022-03-24 00:35:46', '2022-03-24 00:35:46'),
(17, 1, '623c5177bcddb1648120183.jpg', '2022-03-24 01:15:47', '2022-03-24 05:09:43');

-- --------------------------------------------------------

--
-- Table structure for table `manage_tags`
--

CREATE TABLE `manage_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(8, '2020_09_29_074810_create_jobs_table', 1),
(32, '2020_11_12_075639_create_transactions_table', 6),
(36, '2020_10_14_113046_create_admins_table', 9),
(42, '2020_11_24_064711_create_email_templates_table', 11),
(48, '2014_10_12_000000_create_users_table', 13),
(51, '2020_09_16_103709_create_controls_table', 15),
(59, '2021_01_03_061604_create_tickets_table', 17),
(60, '2021_01_03_061834_create_ticket_messages_table', 18),
(61, '2021_01_03_065607_create_ticket_attachments_table', 18),
(62, '2021_01_07_095019_create_funds_table', 19),
(66, '2021_01_21_050226_create_languages_table', 21),
(69, '2020_12_17_075238_create_sms_controls_table', 23),
(70, '2021_01_26_051716_create_site_notifications_table', 24),
(72, '2021_01_26_075451_create_notify_templates_table', 25),
(73, '2021_01_28_074544_create_contents_table', 26),
(74, '2021_01_28_074705_create_content_details_table', 26),
(75, '2021_01_28_074829_create_content_media_table', 26),
(76, '2021_01_28_074847_create_templates_table', 26),
(77, '2021_01_28_074905_create_template_media_table', 26),
(83, '2021_02_03_100945_create_subscribers_table', 27),
(86, '2021_01_21_101641_add_language_to_email_templates_table', 28),
(90, '2021_03_13_132414_create_payout_methods_table', 31),
(91, '2021_03_13_133534_create_payout_logs_table', 32),
(93, '2021_03_18_091710_create_referral_bonuses_table', 33),
(94, '2022_03_23_090405_create_manage_tags_table', 34),
(95, '2022_03_23_102216_create_manage_galleries_table', 35),
(96, '2022_03_27_093838_create_plans_table', 36),
(98, '2022_03_27_093950_create_plan_details_table', 37),
(99, '2022_04_02_060419_create_products_table', 38),
(104, '2022_04_02_060433_create_product_details_table', 39),
(105, '2022_04_13_044100_create_wishlists_table', 40),
(106, '2022_04_25_032247_create_purchased_products_table', 41),
(107, '2022_04_25_160503_create_booking_requests_table', 42),
(108, '2022_04_26_180711_create_reviews_table', 43);

-- --------------------------------------------------------

--
-- Table structure for table `notify_templates`
--

CREATE TABLE `notify_templates` (
  `id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `template_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_keys` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `notify_for` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1=> Admin, 0=> User',
  `lang_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notify_templates`
--

INSERT INTO `notify_templates` (`id`, `language_id`, `name`, `template_key`, `body`, `short_keys`, `status`, `notify_for`, `lang_code`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUPPORT TICKET CREATE', 'SUPPORT_TICKET_CREATE', '[[username]] create a ticket\nTicket : [[ticket_id]]\n\n', '{\"ticket_id\":\"Support Ticket ID\",\"username\":\"username\"}', 1, 1, NULL, '2021-12-17 10:01:53', '2021-12-17 10:01:53'),
(2, 1, 'SUPPORT TICKET REPLIED', 'SUPPORT_TICKET_REPLIED', '[[username]] replied  ticket\r\nTicket : [[ticket_id]]\r\n\r\n', '{\"ticket_id\":\"Support Ticket ID\",\"username\":\"username\"}', 1, 1, NULL, '2021-12-17 10:01:53', '2021-12-17 10:01:53'),
(3, 1, 'ADMIN REPLIED SUPPORT TICKET ', 'ADMIN_REPLIED_TICKET', 'Admin replied  \r\nTicket : [[ticket_id]]', '{\"ticket_id\":\"Support Ticket ID\"}', 1, 0, NULL, '2021-12-17 10:01:53', '2021-12-17 10:01:53'),
(4, 1, 'NEW USER ADDED', 'ADDED_USER', '[[username]] has been joined\r\n\r\n', '{\"username\":\"username\"}', 1, 1, NULL, '2021-12-17 10:01:53', '2021-12-17 10:01:53'),
(5, 1, 'PRODUCT REVIEW ADDED', 'PRODUCT_REVIEW_ADDED', '[[username]] give a review\r\nProduct : [[product_id]]\r\n', '{\"product_id\":\"Review Product ID\",\"username\":\"username\"}', 1, 1, NULL, NULL, NULL),
(6, 1, 'BOOKING FORM REQUEST ADDED', 'BOOKING_FORM_REQUEST_ADDED', '[[username]] send a booking form request for [[date]]\r\n', '{\"username\":\"username\", \"date\":\"date\"}', 1, 1, NULL, NULL, NULL),
(7, 1, 'BOOKING FORM FOR PLAN CREATED', 'BOOKING_FORM_FOR_PLAN_CREATED', '[[username]] filled up a booking form for [[plan_name]] plan', '{\"plan_name\":\"plan name\",\"username\":\"username\"}', 1, 0, NULL, NULL, NULL),
(8, 1, 'PAYMENT COMPLETE FOR PLAN NOTIFICATION TO ADMIN', 'PLAN_PURCHASE_PAYMENT_COMPLETE', '[[username]] purchase [[plan_name]] plan by [[amount]] [[currency]] via [[gateway]]\r\n', '{\"gateway\":\"gateway\",\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\",\"plan_name\":\"plan name\"}', 1, 1, NULL, NULL, NULL),
(9, 1, 'PAYMENT COMPLETE FOR PRODUCT NOTIFICATION TO ADMIN', 'PRODUCT_PURCHASE_PAYMENT_COMPLETE', '[[username]] purchase [[product_name]] by [[amount]] [[currency]] via [[gateway]]\n', '{\"gateway\":\"gateway\",\"amount\":\"amount\",\"currency\":\"currency\",\"username\":\"username\",\"product_name\":\"product name\"}', 1, 1, NULL, NULL, NULL),
(10, 1, 'BOOKING FORM REQUEST STATUS', 'BOOKING_FORM_REQUEST_STATUS_CHANGED', 'Your booking form request for [[date]] has been [[status]]', '{\"date:\"date\",\"status\":\"status\"}', 1, 0, NULL, '2022-04-28 10:38:00', '2022-04-29 22:04:01');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('user@gmail.com', '$2y$10$KR44JK466nyktDoxhreGrO.RM01qJXUa17zO7gGWevdJqyn.TjN1e', '2022-04-12 01:05:18'),
('ronnie@gmail.com', '$2y$10$m/7f7TDrVvgfqkiLcpfmXu6Jwfx7lvfmNwEEPsGax7eHWSWT3F.oC', '2022-06-20 07:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `plans`
--

CREATE TABLE `plans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plan_details`
--

CREATE TABLE `plan_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `plan_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thumb` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_details`
--

CREATE TABLE `product_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `short_details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star` int(11) NOT NULL,
  `feedback` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_notifications`
--

CREATE TABLE `site_notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `site_notificational_id` bigint(20) NOT NULL,
  `site_notificational_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_notifications`
--

INSERT INTO `site_notifications` (`id`, `site_notificational_id`, `site_notificational_type`, `description`, `created_at`, `updated_at`) VALUES
(2, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/tickets\\/view\\/5\",\"icon\":\"fas fa-ticket-alt text-white\",\"text\":\"DemoUser create a ticket\\r\\nTicket : 153532\\r\\n\\r\\n\"}', '2022-04-27 23:04:59', '2022-04-27 23:04:59'),
(4, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/tickets\\/view\\/6\",\"icon\":\"fas fa-ticket-alt text-white\",\"text\":\"DemoUser create a ticket\\r\\nTicket : 259360\\r\\n\\r\\n\"}', '2022-04-27 23:05:50', '2022-04-27 23:05:50'),
(6, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/tickets\\/view\\/7\",\"icon\":\"fas fa-ticket-alt text-white\",\"text\":\"DemoUser create a ticket\\r\\nTicket : 971610\\r\\n\\r\\n\"}', '2022-04-27 23:06:37', '2022-04-27 23:06:37'),
(8, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/product-review\\/42\",\"icon\":\"fas fa-comment-dots text-white\",\"text\":\"DemoUser give a review\\r\\nProduct : 42\\r\\n\"}', '2022-04-28 00:28:53', '2022-04-28 00:28:53'),
(10, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/product-review\\/42\",\"icon\":\"fas fa-comment-dots text-white\",\"text\":\"DemoUser give a review\\r\\nProduct : 42\\r\\n\"}', '2022-04-28 00:43:43', '2022-04-28 00:43:43'),
(12, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/product-review\\/42\",\"icon\":\"fas fa-comment-dots text-white\",\"text\":\"DemoUser give a review\\r\\nProduct : Sajek Snaps\\r\\n\"}', '2022-04-28 00:49:03', '2022-04-28 00:49:03'),
(14, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/product-review\\/42\",\"icon\":\"fas fa-comment-dots text-white\",\"text\":\"DemoUser give a review\\r\\nProduct : Sajek Snaps\\r\\n\"}', '2022-04-28 00:50:28', '2022-04-28 00:50:28'),
(16, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/show\\/booking\\/request\\/10\",\"icon\":\"fab fa-wpforms text-white\",\"text\":\"DemoUser send a booking form request\\r\\n\"}', '2022-04-28 01:15:11', '2022-04-28 01:15:11'),
(18, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser deposited 59 USD via Stripe \\r\\n\"}', '2022-04-28 01:38:54', '2022-04-28 01:38:54'),
(20, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/show\\/booking\\/form\\/VRZ2Z2NVHCNT\",\"icon\":\"fab fa-wpforms text-white\",\"text\":\"DemoUser filled up a booking form for [[plan_name]] plan\"}', '2022-04-28 01:41:05', '2022-04-28 01:41:05'),
(22, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser deposited 78 USD via Stripe \\r\\n\"}', '2022-04-28 01:49:38', '2022-04-28 01:49:38'),
(24, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/show\\/booking\\/form\\/4Z7QUN1Z5YR3\",\"icon\":\"fab fa-wpforms text-white\",\"text\":\"DemoUser filled up a booking form for PORTRAIT SEASSIOIN plan\"}', '2022-04-28 01:50:14', '2022-04-28 01:50:14'),
(26, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase LANDSCAPE SEASSIOIN plan by 39 USD via Stripe \\r\\n\"}', '2022-04-28 02:33:11', '2022-04-28 02:33:11'),
(28, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/show\\/booking\\/form\\/D3G4QJ7TDEK8\",\"icon\":\"fab fa-wpforms text-white\",\"text\":\"DemoUser filled up a booking form for LANDSCAPE SEASSIOIN plan\"}', '2022-04-28 02:33:54', '2022-04-28 02:33:54'),
(30, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Wedding Photography by 178 USD via Stripe \\r\\n\"}', '2022-04-28 02:42:05', '2022-04-28 02:42:05'),
(32, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Sundarban\'s Beauty by 94 USD via Stripe \\r\\n\"}', '2022-04-28 02:43:31', '2022-04-28 02:43:31'),
(34, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase PORTRAIT SEASSIOIN plan by 78 USD via Stripe \\r\\n\"}', '2022-04-28 03:52:50', '2022-04-28 03:52:50'),
(36, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Cox\'s View by 78 USD via Stripe \\r\\n\"}', '2022-04-28 04:04:26', '2022-04-28 04:04:26'),
(44, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Stylish Watch by 39 USD via Stripe \\r\\n\"}', '2022-04-28 05:32:47', '2022-04-28 05:32:47'),
(46, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Sundarban\'s Beauty by 94 USD via Stripe \\r\\n\"}', '2022-04-28 05:40:28', '2022-04-28 05:40:28'),
(48, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Cox\'s View by 78 USD via Stripe \\r\\n\"}', '2022-04-28 05:43:48', '2022-04-28 05:43:48'),
(50, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Wedding Photography by 178 USD via Stripe \\r\\n\"}', '2022-04-28 05:45:37', '2022-04-28 05:45:37'),
(52, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase Stylish Watch by 39 USD via Stripe \\r\\n\"}', '2022-04-28 05:47:25', '2022-04-28 05:47:25'),
(54, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase LIFESTYLE SEASSIOIN plan by 59 USD via Stripe \\r\\n\"}', '2022-04-28 05:49:42', '2022-04-28 05:49:42'),
(56, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase LANDSCAPE SEASSIOIN plan by 39 USD via Stripe \\r\\n\"}', '2022-04-28 05:53:51', '2022-04-28 05:53:51'),
(58, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"DemoUser purchase LANDSCAPE SEASSIOIN plan by 39 USD via Stripe \\r\\n\"}', '2022-04-28 05:55:21', '2022-04-28 05:55:21'),
(64, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/show\\/booking\\/request\\/11\",\"icon\":\"fab fa-wpforms text-white\",\"text\":\"DemoUser send a booking form request for 07\\/25\\/2022\\r\\n\"}', '2022-04-29 22:11:37', '2022-04-29 22:11:37'),
(66, 1, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser purchase PORTRAIT SEASSIOIN plan by 78 USD via Stripe \\r\\n\"}', '2022-06-06 22:01:26', '2022-06-06 22:01:26'),
(67, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/user\\/fundLog\\/4\",\"icon\":\"fa fa-money-bill-alt text-white\",\"text\":\"demouser purchase PORTRAIT SEASSIOIN plan by 78 USD via Stripe \\r\\n\"}', '2022-06-06 22:01:26', '2022-06-06 22:01:26'),
(69, 2, 'App\\Models\\Admin', '{\"link\":\"http:\\/\\/localhost\\/fotografia\\/admin\\/product-review\\/45\",\"icon\":\"fas fa-comment-dots text-white\",\"text\":\"demouser give a review\\r\\nProduct : Sundarban\'s Beauty\\r\\n\"}', '2022-06-14 21:02:27', '2022-06-14 21:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `sms_controls`
--

CREATE TABLE `sms_controls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `actionMethod` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `actionUrl` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headerData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paramData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `formData` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sms_controls`
--

INSERT INTO `sms_controls` (`id`, `actionMethod`, `actionUrl`, `headerData`, `paramData`, `formData`, `created_at`, `updated_at`) VALUES
(1, 'POST', 'https://rest.nexmo.com/sms/json', '{\"Content-Type\":\"application\\/x-www-form-urlencoded\"}', NULL, '{\"from\":\"Rownak\",\"text\":\"[[message]]\",\"to\":\"[[receiver]]\",\"api_key\":\"930cc608\",\"api_secret\":\"2pijsaMOUw5YKOK5\"}', '2020-12-13 01:45:29', '2021-01-24 04:37:45');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL DEFAULT 1,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`id`, `language_id`, `section_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'about-us', '{\"title\":\"About Us\",\"sub_title\":\"A photography agency creative photography shoots.\",\"short_description\":\"The world without photography will be meaningless to us if there is no light and color, which opens up our minds and expresses passion. My photos are inspired by light, color,creative perspective, techniques &amp; personalities.<br \\/><br \\/>The world without photography will be meaningless to us if there is no light and color, which opens up our minds.\"}', '2022-03-12 22:07:46', '2022-03-16 23:19:04'),
(2, 1, 'hero', '{\"title\":\"ibendu tunc duntez varius the Vestibulum viverra\",\"short_description\":\"El mundo sin fotograf\\u00eda no tendr\\u00eda sentido para nosotros si hubiera luz y color, que nos abra la mente y la exprese.\",\"button_name\":\"Book a photographer\"}', '2022-03-12 22:18:29', '2022-07-25 23:46:21'),
(3, 1, 'investment', '{\"title\":\"Wedding Event\",\"sub_title\":\"One night photography for Wedding Event\",\"short_details\":\"<p>Details of One night photography for Wedding Event, Details of One night photography for Wedding Event, Details of One night photography for Wedding Event, <\\/p>\"}', '2022-03-12 22:41:01', '2022-03-12 22:41:01'),
(4, 1, 'contact-us', '{\"heading\":\"Make a reservation\",\"sub_heading\":\"Lens Queen\",\"title\":\"Contact\",\"address\":\"523 Sylvan Ave, 5th Floor Mountain View, CA 94041USA\",\"email\":\"support@lensqueen.com\",\"phone\":\"991 15151 1455\",\"map_embed_link\":\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d278109.65576483664!2d-78.06820498078208!3d42.93054196119549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d3e302fad3d023%3A0x21d1a341056f60b5!2sStatue%20of%20Liberty!5e0!3m2!1sen!2sbd!4v1649747529301!5m2!1sen!2sbd\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\",\"footer_short_details\":\"The world without photography will be meaningless to us if there is no light and color, which opens up our minds and expresses passion. My photos are inspired by light, color, perspective.\"}', '2022-03-12 22:57:15', '2022-08-06 22:40:43'),
(5, 1, 'blog', '{\"title\":\"Blog\",\"sub_title\":\"Latest Blog\"}', '2022-03-15 23:43:26', '2022-07-25 23:48:29'),
(6, 1, 'why-chose-us', '{\"title\":\"Why Choose Us\"}', '2022-03-20 01:05:04', '2022-03-20 01:05:04'),
(8, 1, 'instagram', '{\"title\":\"INSTAGRAM\",\"sub_title\":\"Shots From Instagram\",\"button_name\":\"FOLLOW ME\"}', '2022-03-20 04:52:00', '2022-03-21 23:07:55'),
(9, 1, 'skills', '{\"title\":\"Skills\",\"sub_title\":\"My Skills\"}', '2022-03-21 03:58:29', '2022-03-21 03:58:29'),
(10, 1, 'equipment', '{\"title\":\"Equipment\",\"sub_title\":\"My Equipment\"}', '2022-03-21 03:58:52', '2022-03-21 03:58:52'),
(11, 1, 'services', '{\"title\":\"What We Do\",\"sub_title\":\"Services\"}', '2022-03-21 05:12:07', '2022-03-21 05:12:07'),
(12, 1, 'behind-the-scene', '{\"title\":\"Behind The Scenes\",\"sub_title\":\"Inspired by balance\",\"short_details\":\"I would like to give you a unique photography and video experience, built to serve you best and capture your special moments for you and your families creatively and beautifully\"}', '2022-03-21 23:49:35', '2022-03-23 22:47:31'),
(13, 1, 'team', '{\"title\":\"PEOPLE WHO MATTER\",\"sub_title\":\"Our Team\"}', '2022-03-22 01:26:15', '2022-07-25 23:51:12'),
(14, 1, 'gallery', '{\"title\":\"PORTFOLIO\",\"sub_title\":\"Gallery\"}', '2022-03-23 00:47:47', '2022-03-23 00:47:47'),
(17, 2, 'about-us', '{\"title\":\"Sobre nosotras\",\"sub_title\":\"Una agencia de fotograf\\u00eda creativa realiza sesiones de fotograf\\u00eda.\",\"short_description\":\"El mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz y color, que nos abre la mente y expresa la pasi\\u00f3n. Mis fotos est\\u00e1n inspiradas en la luz, el color, la perspectiva creativa, las t\\u00e9cnicas y las personalidades.\\r\\n\\r\\nEl mundo sin fotograf\\u00eda no tendr\\u00e1 sentido para nosotros si no hay luz y color, que nos abre la mente.\"}', '2022-07-23 09:14:40', '2022-07-23 09:14:40'),
(18, 2, 'hero', '{\"title\":\"bibendu tunc duntez varius el Vestibulum viverra\",\"short_description\":\"Spanish mundo sin fotograf\\u00eda no tendr\\u00eda sentido para nosotros si hubiera luz y color, que nos abra la mente y la exprese.\",\"button_name\":\"Reserva una fot\\u00f3grafa\"}', '2022-07-23 09:15:51', '2022-07-25 23:46:25'),
(23, 2, 'why-chose-us', '{\"title\":\"Por qu\\u00e9 elegirnos\"}', '2022-07-23 09:42:56', '2022-07-25 23:47:35'),
(24, 2, 'why-chose-us', '{\"title\":\"Es Why Choose Us\"}', '2022-07-23 09:43:43', '2022-07-23 09:43:43'),
(29, 2, 'testimonial', NULL, '2022-07-25 23:47:42', '2022-07-25 23:47:42'),
(30, 2, 'blog', '{\"title\":\"Blog\",\"sub_title\":\"Entrada en el blog\"}', '2022-07-25 23:48:41', '2022-07-25 23:48:41'),
(31, 2, 'skills', '{\"title\":\"Habilidades\",\"sub_title\":\"Mis habilidades\"}', '2022-07-25 23:49:05', '2022-07-25 23:49:05'),
(32, 2, 'equipment', '{\"title\":\"Equipo\",\"sub_title\":\"mi equipo\"}', '2022-07-25 23:49:27', '2022-07-25 23:49:27'),
(33, 2, 'services', '{\"title\":\"lo que hacemos\",\"sub_title\":\"Servicios\"}', '2022-07-25 23:50:15', '2022-07-25 23:50:15'),
(34, 2, 'behind-the-scene', '{\"title\":\"Entre bastidores\",\"sub_title\":\"Inspirado en el equilibrio\",\"short_details\":\"Me gustar\\u00eda brindarle una experiencia \\u00fanica de fotograf\\u00eda y video, dise\\u00f1ada para brindarle el mejor servicio y capturar sus momentos especiales para usted y su familia de manera creativa y hermosa.\"}', '2022-07-25 23:50:44', '2022-07-25 23:50:44'),
(35, 2, 'team', '{\"title\":\"PERSONAS QUE IMPORTAN\",\"sub_title\":\"Nuestro equipo\"}', '2022-07-25 23:51:08', '2022-07-25 23:51:08'),
(36, 2, 'gallery', '{\"title\":\"PORTAFOLIO\",\"sub_title\":\"Galer\\u00eda\"}', '2022-07-25 23:55:50', '2022-07-25 23:55:50'),
(37, 2, 'instagram', '{\"title\":\"INSTAGRAM\",\"sub_title\":\"Fotos de Instagram\",\"button_name\":\"S\\u00cdGUEME\"}', '2022-07-25 23:56:21', '2022-07-25 23:56:21'),
(38, 2, 'contact-us', '{\"heading\":\"Pr\\u00f3ximo evento\",\"sub_heading\":\"Lens Queen\",\"title\":\"Contacto\",\"address\":\"523 Sylvan Ave, 5.\\u00ba piso Mountain View, CA 94041 EE. UU.\",\"email\":\"support@fotografia.com\",\"phone\":\"991 15151 1455\",\"map_embed_link\":\"https:\\/\\/www.google.com\\/maps\\/embed?pb=!1m18!1m12!1m3!1d278109.65576483664!2d-78.06820498078208!3d42.93054196119549!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89d3e302fad3d023%3A0x21d1a341056f60b5!2sStatue%20of%20Liberty!5e0!3m2!1sen!2sbd!4v1649747529301!5m2!1sen!2sbd\\\" width=\\\"600\\\" height=\\\"450\\\" style=\\\"border:0;\\\" allowfullscreen=\\\"\\\" loading=\\\"lazy\\\" referrerpolicy=\\\"no-referrer-when-downgrade\",\"footer_short_details\":\"The world without photography will be meaningless to us if there is no light and color, which opens up our minds and expresses passion. My photos are inspired by light, color, perspective.\"}', '2022-07-25 23:58:24', '2022-07-25 23:58:24');

-- --------------------------------------------------------

--
-- Table structure for table `template_media`
--

CREATE TABLE `template_media` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `template_media`
--

INSERT INTO `template_media` (`id`, `section_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'about-us', '{\"image\":\"6232c4c8af15a1647494344.png\"}', '2022-03-12 22:14:59', '2022-03-16 23:19:04'),
(2, 'hero', '{\"image_top\":\"6236b3d3422de1647752147.png\",\"image_bottom\":\"6236b3d3727ae1647752147.png\"}', '2022-03-12 22:18:29', '2022-03-19 22:55:47'),
(3, 'testimonial', '{\"image\":\"6236f605a084b1647769093.png\"}', '2022-03-20 03:38:14', '2022-03-20 03:38:14'),
(4, 'instagram', '{\"image_one\":\"6237075013b2c1647773520.jpg\",\"image_two\":\"623707501a31f1647773520.jpg\",\"image_three\":\"62370750201201647773520.jpg\",\"image_four\":\"62370750245dd1647773520.jpg\",\"button_link\":\"https:\\/\\/www.instagram.com\\/\",\"button_icon\":\"fab fa-instagram\"}', '2022-03-20 04:52:00', '2022-03-22 22:47:28'),
(5, 'behind-the-scene', '{\"video\":\"video.mp4\"}', '2022-03-23 08:54:52', '2022-03-23 08:54:52'),
(7, 'login', '{\"image\":\"6253e6e38f3d31649665763.png\"}', '2022-04-11 02:16:17', '2022-04-11 02:29:23');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(91) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ticket` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0: Open, 1: Answered, 2: Replied, 3: Closed	',
  `last_reply` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_attachments`
--

CREATE TABLE `ticket_attachments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_message_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket_messages`
--

CREATE TABLE `ticket_messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` bigint(20) UNSIGNED DEFAULT NULL,
  `admin_id` bigint(20) UNSIGNED DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `amount` double(10,2) DEFAULT NULL,
  `charge` decimal(11,2) NOT NULL DEFAULT 0.00,
  `final_balance` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `trx_type` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance_type` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `trx_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lastname` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `referral_id` bigint(20) DEFAULT NULL,
  `language_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country_code` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_code` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` double(11,2) NOT NULL DEFAULT 0.00,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `two_fa_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_fa` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0: two-FA off, 1: two-FA on	',
  `two_fa_verify` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0: two-FA unverified, 1: two-FA verified	',
  `email_verification` tinyint(1) DEFAULT 1,
  `sms_verification` tinyint(1) DEFAULT 1,
  `verify_code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sent_at` datetime DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `booking_requests`
--
ALTER TABLE `booking_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `configures`
--
ALTER TABLE `configures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_name_index` (`name`);

--
-- Indexes for table `content_details`
--
ALTER TABLE `content_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_details_content_id_foreign` (`content_id`);

--
-- Indexes for table `content_media`
--
ALTER TABLE `content_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `content_media_content_id_foreign` (`content_id`);

--
-- Indexes for table `email_templates`
--
ALTER TABLE `email_templates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email_templates_language_id_foreign` (`language_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funds_user_id_foreign` (`user_id`),
  ADD KEY `funds_gateway_id_foreign` (`gateway_id`);

--
-- Indexes for table `gateways`
--
ALTER TABLE `gateways`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `gateways_code_unique` (`code`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_galleries`
--
ALTER TABLE `manage_galleries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `manage_galleries_tag_id_foreign` (`tag_id`);

--
-- Indexes for table `manage_tags`
--
ALTER TABLE `manage_tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `manage_tags_name_unique` (`name`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify_templates`
--
ALTER TABLE `notify_templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `plans`
--
ALTER TABLE `plans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan_details`
--
ALTER TABLE `plan_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plan_details_plan_id_foreign` (`plan_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_details`
--
ALTER TABLE `product_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_details_product_id_foreign` (`product_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_notifications`
--
ALTER TABLE `site_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_controls`
--
ALTER TABLE `sms_controls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `template_media`
--
ALTER TABLE `template_media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `template_media_section_name_index` (`section_name`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_user_id_foreign` (`user_id`);

--
-- Indexes for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_attachments_ticket_message_id_foreign` (`ticket_message_id`);

--
-- Indexes for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ticket_messages_ticket_id_foreign` (`ticket_id`),
  ADD KEY `ticket_messages_admin_id_foreign` (`admin_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking_requests`
--
ALTER TABLE `booking_requests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `configures`
--
ALTER TABLE `configures`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `content_details`
--
ALTER TABLE `content_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `content_media`
--
ALTER TABLE `content_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `email_templates`
--
ALTER TABLE `email_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `funds`
--
ALTER TABLE `funds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gateways`
--
ALTER TABLE `gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1001;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `manage_galleries`
--
ALTER TABLE `manage_galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `manage_tags`
--
ALTER TABLE `manage_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT for table `notify_templates`
--
ALTER TABLE `notify_templates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `plans`
--
ALTER TABLE `plans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_details`
--
ALTER TABLE `plan_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_details`
--
ALTER TABLE `product_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_notifications`
--
ALTER TABLE `site_notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `sms_controls`
--
ALTER TABLE `sms_controls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `template_media`
--
ALTER TABLE `template_media`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `funds`
--
ALTER TABLE `funds`
  ADD CONSTRAINT `funds_gateway_id_foreign` FOREIGN KEY (`gateway_id`) REFERENCES `gateways` (`id`),
  ADD CONSTRAINT `funds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `manage_galleries`
--
ALTER TABLE `manage_galleries`
  ADD CONSTRAINT `manage_galleries_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `manage_tags` (`id`);

--
-- Constraints for table `plan_details`
--
ALTER TABLE `plan_details`
  ADD CONSTRAINT `plan_details_plan_id_foreign` FOREIGN KEY (`plan_id`) REFERENCES `plans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_details`
--
ALTER TABLE `product_details`
  ADD CONSTRAINT `product_details_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `ticket_attachments`
--
ALTER TABLE `ticket_attachments`
  ADD CONSTRAINT `ticket_attachments_ticket_message_id_foreign` FOREIGN KEY (`ticket_message_id`) REFERENCES `ticket_messages` (`id`);

--
-- Constraints for table `ticket_messages`
--
ALTER TABLE `ticket_messages`
  ADD CONSTRAINT `ticket_messages_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `admins` (`id`),
  ADD CONSTRAINT `ticket_messages_ticket_id_foreign` FOREIGN KEY (`ticket_id`) REFERENCES `tickets` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
