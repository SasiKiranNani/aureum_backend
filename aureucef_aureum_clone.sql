-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 05, 2026 at 01:18 PM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aureucef_aureum_clone`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_fees`
--

CREATE TABLE `admin_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awards`
--

CREATE TABLE `awards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `awards`
--

INSERT INTO `awards` (`id`, `category_id`, `name`, `code`, `amount`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'AI', 'idhfivhbdi diufh', 2.00, 1, '2026-01-29 12:18:03', '2026-01-29 12:18:03'),
(2, 2, 'cs', 'rtr', 5.00, 1, '2026-01-29 12:18:17', '2026-01-29 12:18:17');

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE `badges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `min_score` decimal(8,2) NOT NULL,
  `max_score` decimal(8,2) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bank_accounts`
--

CREATE TABLE `bank_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `holder_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Deposit',
  `routing_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `swift_bic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `date`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Global Design Minds to Converge at 2025 Design Expo Conference', 'blog/01KG74SA4KYAE4SGDXGKZ0KNEZ.webp', '2026-02-04', '<p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">The 2025 Design Expo Conference is set to become the epicenter of global design innovation, as top creatives, technologists, and thought leaders gather to explore the future of design across industries. Scheduled for October 1–5, 2025 in San Francisco, the event promises to showcase cutting-edge design practices, technological integrations, and visionary ideas that are shaping the next generation of user experience, product development, and visual storytelling.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Bringing together architects, UX/UI designers, product innovators, AI enthusiasts, and creative directors from over 50 countries, the conference serves as a collaborative platform to exchange knowledge, trends, and tools transforming the design ecosystem. Key themes for this year include AI-driven creativity, sustainability in design, spatial computing, and inclusive design methodologies.</p><h5 style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;letter-spacing:normal;line-height:28.8px;margin:0px 0px 10px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;padding:0px;\">Highlights of the 2025 Design Expo include:</strong></h5><ul style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;list-style:disc;margin-bottom:1rem;margin-right:0px;margin-top:0px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Keynote addresses by global design icons and industry disruptors</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Hands-on workshops covering tools like Figma, Adobe Firefly, Midjourney, and more</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Panel discussions on the ethical impact of generative AI in design</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Startup design showcases and prototype exhibitions</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Networking zones connecting talent with top design-led companies</p></li></ul><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">In addition to in-person attendance, the event will feature a hybrid format with virtual access to all keynotes and live panels, allowing participants from around the world to engage and collaborate.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Whether you\'re a seasoned professional or a rising designer, the 2025 Design Expo Conference is the ultimate opportunity to stay ahead of the curve and shape what’s next in the world of design.</p>', 1, '2026-01-30 04:17:10', '2026-01-30 04:17:10'),
(2, 'Tony Blair Advocates for AI Integration in UK Healthcare and Education', 'blog/01KG74SSS2FK6HD2BY9QMZ2W3R.webp', '2026-02-06', NULL, 1, '2026-01-30 04:17:26', '2026-01-30 04:17:26');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel-cache-livewire-rate-limiter:8ed3e63bab2236ca78978bf4c16209c4261ef2f8', 'i:1;', 1770177597),
('laravel-cache-livewire-rate-limiter:8ed3e63bab2236ca78978bf4c16209c4261ef2f8:timer', 'i:1770177597;', 1770177597),
('laravel-cache-livewire-rate-limiter:9d06ceeaa1ab6ea79043fb2b329f95e2b02b441b', 'i:1;', 1770084825),
('laravel-cache-livewire-rate-limiter:9d06ceeaa1ab6ea79043fb2b329f95e2b02b441b:timer', 'i:1770084825;', 1770084825),
('laravel-cache-spatie.permission.cache', 'a:3:{s:5:\"alias\";a:4:{s:1:\"a\";s:2:\"id\";s:1:\"b\";s:4:\"name\";s:1:\"c\";s:10:\"guard_name\";s:1:\"r\";s:5:\"roles\";}s:11:\"permissions\";a:314:{i:0;a:4:{s:1:\"a\";i:1;s:1:\"b\";s:9:\"view_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:1;a:4:{s:1:\"a\";i:2;s:1:\"b\";s:13:\"view_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:2;a:4:{s:1:\"a\";i:3;s:1:\"b\";s:11:\"create_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:3;a:4:{s:1:\"a\";i:4;s:1:\"b\";s:11:\"update_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:4;a:4:{s:1:\"a\";i:5;s:1:\"b\";s:12:\"restore_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:5;a:4:{s:1:\"a\";i:6;s:1:\"b\";s:16:\"restore_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:6;a:4:{s:1:\"a\";i:7;s:1:\"b\";s:14:\"replicate_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:7;a:4:{s:1:\"a\";i:8;s:1:\"b\";s:12:\"reorder_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:8;a:4:{s:1:\"a\";i:9;s:1:\"b\";s:11:\"delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:9;a:4:{s:1:\"a\";i:10;s:1:\"b\";s:15:\"delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:10;a:4:{s:1:\"a\";i:11;s:1:\"b\";s:17:\"force_delete_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:11;a:4:{s:1:\"a\";i:12;s:1:\"b\";s:21:\"force_delete_any_role\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:12;a:4:{s:1:\"a\";i:13;s:1:\"b\";s:15:\"view_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:13;a:4:{s:1:\"a\";i:14;s:1:\"b\";s:19:\"view_any_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:14;a:4:{s:1:\"a\";i:15;s:1:\"b\";s:17:\"create_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:15;a:4:{s:1:\"a\";i:16;s:1:\"b\";s:17:\"update_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:16;a:4:{s:1:\"a\";i:17;s:1:\"b\";s:18:\"restore_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:17;a:4:{s:1:\"a\";i:18;s:1:\"b\";s:22:\"restore_any_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:18;a:4:{s:1:\"a\";i:19;s:1:\"b\";s:20:\"replicate_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:19;a:4:{s:1:\"a\";i:20;s:1:\"b\";s:18:\"reorder_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:20;a:4:{s:1:\"a\";i:21;s:1:\"b\";s:17:\"delete_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:21;a:4:{s:1:\"a\";i:22;s:1:\"b\";s:21:\"delete_any_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:22;a:4:{s:1:\"a\";i:23;s:1:\"b\";s:23:\"force_delete_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:23;a:4:{s:1:\"a\";i:24;s:1:\"b\";s:27:\"force_delete_any_admin::fee\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:24;a:4:{s:1:\"a\";i:25;s:1:\"b\";s:10:\"view_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:25;a:4:{s:1:\"a\";i:26;s:1:\"b\";s:14:\"view_any_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:26;a:4:{s:1:\"a\";i:27;s:1:\"b\";s:12:\"create_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:27;a:4:{s:1:\"a\";i:28;s:1:\"b\";s:12:\"update_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:28;a:4:{s:1:\"a\";i:29;s:1:\"b\";s:13:\"restore_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:29;a:4:{s:1:\"a\";i:30;s:1:\"b\";s:17:\"restore_any_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:30;a:4:{s:1:\"a\";i:31;s:1:\"b\";s:15:\"replicate_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:31;a:4:{s:1:\"a\";i:32;s:1:\"b\";s:13:\"reorder_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:32;a:4:{s:1:\"a\";i:33;s:1:\"b\";s:12:\"delete_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:33;a:4:{s:1:\"a\";i:34;s:1:\"b\";s:16:\"delete_any_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:34;a:4:{s:1:\"a\";i:35;s:1:\"b\";s:18:\"force_delete_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:35;a:4:{s:1:\"a\";i:36;s:1:\"b\";s:22:\"force_delete_any_award\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:36;a:4:{s:1:\"a\";i:37;s:1:\"b\";s:10:\"view_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:37;a:4:{s:1:\"a\";i:38;s:1:\"b\";s:14:\"view_any_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:38;a:4:{s:1:\"a\";i:39;s:1:\"b\";s:12:\"create_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:39;a:4:{s:1:\"a\";i:40;s:1:\"b\";s:12:\"update_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:40;a:4:{s:1:\"a\";i:41;s:1:\"b\";s:13:\"restore_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:41;a:4:{s:1:\"a\";i:42;s:1:\"b\";s:17:\"restore_any_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:42;a:4:{s:1:\"a\";i:43;s:1:\"b\";s:15:\"replicate_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:43;a:4:{s:1:\"a\";i:44;s:1:\"b\";s:13:\"reorder_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:44;a:4:{s:1:\"a\";i:45;s:1:\"b\";s:12:\"delete_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:45;a:4:{s:1:\"a\";i:46;s:1:\"b\";s:16:\"delete_any_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:46;a:4:{s:1:\"a\";i:47;s:1:\"b\";s:18:\"force_delete_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:47;a:4:{s:1:\"a\";i:48;s:1:\"b\";s:22:\"force_delete_any_badge\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:48;a:4:{s:1:\"a\";i:49;s:1:\"b\";s:13:\"view_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:49;a:4:{s:1:\"a\";i:50;s:1:\"b\";s:17:\"view_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:50;a:4:{s:1:\"a\";i:51;s:1:\"b\";s:15:\"create_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:51;a:4:{s:1:\"a\";i:52;s:1:\"b\";s:15:\"update_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:52;a:4:{s:1:\"a\";i:53;s:1:\"b\";s:16:\"restore_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:53;a:4:{s:1:\"a\";i:54;s:1:\"b\";s:20:\"restore_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:54;a:4:{s:1:\"a\";i:55;s:1:\"b\";s:18:\"replicate_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:55;a:4:{s:1:\"a\";i:56;s:1:\"b\";s:16:\"reorder_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:56;a:4:{s:1:\"a\";i:57;s:1:\"b\";s:15:\"delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:57;a:4:{s:1:\"a\";i:58;s:1:\"b\";s:19:\"delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:58;a:4:{s:1:\"a\";i:59;s:1:\"b\";s:21:\"force_delete_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:59;a:4:{s:1:\"a\";i:60;s:1:\"b\";s:25:\"force_delete_any_category\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:60;a:4:{s:1:\"a\";i:61;s:1:\"b\";s:13:\"view_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:61;a:4:{s:1:\"a\";i:62;s:1:\"b\";s:17:\"view_any_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:62;a:4:{s:1:\"a\";i:63;s:1:\"b\";s:15:\"create_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:63;a:4:{s:1:\"a\";i:64;s:1:\"b\";s:15:\"update_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:64;a:4:{s:1:\"a\";i:65;s:1:\"b\";s:16:\"restore_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:65;a:4:{s:1:\"a\";i:66;s:1:\"b\";s:20:\"restore_any_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:66;a:4:{s:1:\"a\";i:67;s:1:\"b\";s:18:\"replicate_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:67;a:4:{s:1:\"a\";i:68;s:1:\"b\";s:16:\"reorder_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:68;a:4:{s:1:\"a\";i:69;s:1:\"b\";s:15:\"delete_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:69;a:4:{s:1:\"a\";i:70;s:1:\"b\";s:19:\"delete_any_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:70;a:4:{s:1:\"a\";i:71;s:1:\"b\";s:21:\"force_delete_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:71;a:4:{s:1:\"a\";i:72;s:1:\"b\";s:25:\"force_delete_any_discount\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:72;a:4:{s:1:\"a\";i:73;s:1:\"b\";s:8:\"view_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:73;a:4:{s:1:\"a\";i:74;s:1:\"b\";s:12:\"view_any_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:74;a:4:{s:1:\"a\";i:75;s:1:\"b\";s:10:\"create_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:75;a:4:{s:1:\"a\";i:76;s:1:\"b\";s:10:\"update_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:76;a:4:{s:1:\"a\";i:77;s:1:\"b\";s:11:\"restore_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:77;a:4:{s:1:\"a\";i:78;s:1:\"b\";s:15:\"restore_any_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:78;a:4:{s:1:\"a\";i:79;s:1:\"b\";s:13:\"replicate_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:79;a:4:{s:1:\"a\";i:80;s:1:\"b\";s:11:\"reorder_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:80;a:4:{s:1:\"a\";i:81;s:1:\"b\";s:10:\"delete_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:81;a:4:{s:1:\"a\";i:82;s:1:\"b\";s:14:\"delete_any_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:82;a:4:{s:1:\"a\";i:83;s:1:\"b\";s:16:\"force_delete_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:83;a:4:{s:1:\"a\";i:84;s:1:\"b\";s:20:\"force_delete_any_faq\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:84;a:4:{s:1:\"a\";i:85;s:1:\"b\";s:21:\"view_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:85;a:4:{s:1:\"a\";i:86;s:1:\"b\";s:25:\"view_any_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:86;a:4:{s:1:\"a\";i:87;s:1:\"b\";s:23:\"create_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:87;a:4:{s:1:\"a\";i:88;s:1:\"b\";s:23:\"update_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:88;a:4:{s:1:\"a\";i:89;s:1:\"b\";s:24:\"restore_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:89;a:4:{s:1:\"a\";i:90;s:1:\"b\";s:28:\"restore_any_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:90;a:4:{s:1:\"a\";i:91;s:1:\"b\";s:26:\"replicate_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:91;a:4:{s:1:\"a\";i:92;s:1:\"b\";s:24:\"reorder_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:92;a:4:{s:1:\"a\";i:93;s:1:\"b\";s:23:\"delete_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:93;a:4:{s:1:\"a\";i:94;s:1:\"b\";s:27:\"delete_any_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:94;a:4:{s:1:\"a\";i:95;s:1:\"b\";s:29:\"force_delete_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:95;a:4:{s:1:\"a\";i:96;s:1:\"b\";s:33:\"force_delete_any_media::publisher\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:96;a:4:{s:1:\"a\";i:97;s:1:\"b\";s:15:\"view_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:97;a:4:{s:1:\"a\";i:98;s:1:\"b\";s:19:\"view_any_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:98;a:4:{s:1:\"a\";i:99;s:1:\"b\";s:17:\"create_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:99;a:4:{s:1:\"a\";i:100;s:1:\"b\";s:17:\"update_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:100;a:4:{s:1:\"a\";i:101;s:1:\"b\";s:18:\"restore_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:101;a:4:{s:1:\"a\";i:102;s:1:\"b\";s:22:\"restore_any_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:102;a:4:{s:1:\"a\";i:103;s:1:\"b\";s:20:\"replicate_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:103;a:4:{s:1:\"a\";i:104;s:1:\"b\";s:18:\"reorder_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:104;a:4:{s:1:\"a\";i:105;s:1:\"b\";s:17:\"delete_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:105;a:4:{s:1:\"a\";i:106;s:1:\"b\";s:21:\"delete_any_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:106;a:4:{s:1:\"a\";i:107;s:1:\"b\";s:23:\"force_delete_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:107;a:4:{s:1:\"a\";i:108;s:1:\"b\";s:27:\"force_delete_any_nomination\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:108;a:4:{s:1:\"a\";i:109;s:1:\"b\";s:22:\"view_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:109;a:4:{s:1:\"a\";i:110;s:1:\"b\";s:26:\"view_any_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:110;a:4:{s:1:\"a\";i:111;s:1:\"b\";s:24:\"create_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:111;a:4:{s:1:\"a\";i:112;s:1:\"b\";s:24:\"update_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:112;a:4:{s:1:\"a\";i:113;s:1:\"b\";s:25:\"restore_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:113;a:4:{s:1:\"a\";i:114;s:1:\"b\";s:29:\"restore_any_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:114;a:4:{s:1:\"a\";i:115;s:1:\"b\";s:27:\"replicate_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:115;a:4:{s:1:\"a\";i:116;s:1:\"b\";s:25:\"reorder_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:116;a:4:{s:1:\"a\";i:117;s:1:\"b\";s:24:\"delete_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:117;a:4:{s:1:\"a\";i:118;s:1:\"b\";s:28:\"delete_any_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:118;a:4:{s:1:\"a\";i:119;s:1:\"b\";s:30:\"force_delete_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:119;a:4:{s:1:\"a\";i:120;s:1:\"b\";s:34:\"force_delete_any_nominee::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:120;a:4:{s:1:\"a\";i:121;s:1:\"b\";s:12:\"view_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:121;a:4:{s:1:\"a\";i:122;s:1:\"b\";s:16:\"view_any_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:122;a:4:{s:1:\"a\";i:123;s:1:\"b\";s:14:\"create_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:123;a:4:{s:1:\"a\";i:124;s:1:\"b\";s:14:\"update_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:124;a:4:{s:1:\"a\";i:125;s:1:\"b\";s:15:\"restore_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:125;a:4:{s:1:\"a\";i:126;s:1:\"b\";s:19:\"restore_any_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:126;a:4:{s:1:\"a\";i:127;s:1:\"b\";s:17:\"replicate_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:127;a:4:{s:1:\"a\";i:128;s:1:\"b\";s:15:\"reorder_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:128;a:4:{s:1:\"a\";i:129;s:1:\"b\";s:14:\"delete_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:129;a:4:{s:1:\"a\";i:130;s:1:\"b\";s:18:\"delete_any_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:130;a:4:{s:1:\"a\";i:131;s:1:\"b\";s:20:\"force_delete_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:131;a:4:{s:1:\"a\";i:132;s:1:\"b\";s:24:\"force_delete_any_payment\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:132;a:4:{s:1:\"a\";i:133;s:1:\"b\";s:21:\"view_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:133;a:4:{s:1:\"a\";i:134;s:1:\"b\";s:25:\"view_any_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:134;a:4:{s:1:\"a\";i:135;s:1:\"b\";s:23:\"create_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:135;a:4:{s:1:\"a\";i:136;s:1:\"b\";s:23:\"update_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:136;a:4:{s:1:\"a\";i:137;s:1:\"b\";s:24:\"restore_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:137;a:4:{s:1:\"a\";i:138;s:1:\"b\";s:28:\"restore_any_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:138;a:4:{s:1:\"a\";i:139;s:1:\"b\";s:26:\"replicate_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:139;a:4:{s:1:\"a\";i:140;s:1:\"b\";s:24:\"reorder_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:140;a:4:{s:1:\"a\";i:141;s:1:\"b\";s:23:\"delete_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:141;a:4:{s:1:\"a\";i:142;s:1:\"b\";s:27:\"delete_any_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:142;a:4:{s:1:\"a\";i:143;s:1:\"b\";s:29:\"force_delete_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:143;a:4:{s:1:\"a\";i:144;s:1:\"b\";s:33:\"force_delete_any_payment::gateway\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:144;a:4:{s:1:\"a\";i:145;s:1:\"b\";s:15:\"view_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:145;a:4:{s:1:\"a\";i:146;s:1:\"b\";s:19:\"view_any_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:146;a:4:{s:1:\"a\";i:147;s:1:\"b\";s:17:\"create_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:147;a:4:{s:1:\"a\";i:148;s:1:\"b\";s:17:\"update_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:148;a:4:{s:1:\"a\";i:149;s:1:\"b\";s:18:\"restore_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:149;a:4:{s:1:\"a\";i:150;s:1:\"b\";s:22:\"restore_any_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:150;a:4:{s:1:\"a\";i:151;s:1:\"b\";s:20:\"replicate_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:151;a:4:{s:1:\"a\";i:152;s:1:\"b\";s:18:\"reorder_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:152;a:4:{s:1:\"a\";i:153;s:1:\"b\";s:17:\"delete_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:153;a:4:{s:1:\"a\";i:154;s:1:\"b\";s:21:\"delete_any_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:154;a:4:{s:1:\"a\";i:155;s:1:\"b\";s:23:\"force_delete_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:155;a:4:{s:1:\"a\";i:156;s:1:\"b\";s:27:\"force_delete_any_permission\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:156;a:4:{s:1:\"a\";i:157;s:1:\"b\";s:11:\"view_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:157;a:4:{s:1:\"a\";i:158;s:1:\"b\";s:15:\"view_any_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:158;a:4:{s:1:\"a\";i:159;s:1:\"b\";s:13:\"create_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:159;a:4:{s:1:\"a\";i:160;s:1:\"b\";s:13:\"update_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:160;a:4:{s:1:\"a\";i:161;s:1:\"b\";s:14:\"restore_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:161;a:4:{s:1:\"a\";i:162;s:1:\"b\";s:18:\"restore_any_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:162;a:4:{s:1:\"a\";i:163;s:1:\"b\";s:16:\"replicate_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:163;a:4:{s:1:\"a\";i:164;s:1:\"b\";s:14:\"reorder_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:164;a:4:{s:1:\"a\";i:165;s:1:\"b\";s:13:\"delete_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:165;a:4:{s:1:\"a\";i:166;s:1:\"b\";s:17:\"delete_any_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:166;a:4:{s:1:\"a\";i:167;s:1:\"b\";s:19:\"force_delete_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:167;a:4:{s:1:\"a\";i:168;s:1:\"b\";s:23:\"force_delete_any_season\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:168;a:4:{s:1:\"a\";i:169;s:1:\"b\";s:9:\"view_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:169;a:4:{s:1:\"a\";i:170;s:1:\"b\";s:13:\"view_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:170;a:4:{s:1:\"a\";i:171;s:1:\"b\";s:11:\"create_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:171;a:4:{s:1:\"a\";i:172;s:1:\"b\";s:11:\"update_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:172;a:4:{s:1:\"a\";i:173;s:1:\"b\";s:12:\"restore_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:173;a:4:{s:1:\"a\";i:174;s:1:\"b\";s:16:\"restore_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:174;a:4:{s:1:\"a\";i:175;s:1:\"b\";s:14:\"replicate_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:175;a:4:{s:1:\"a\";i:176;s:1:\"b\";s:12:\"reorder_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:176;a:4:{s:1:\"a\";i:177;s:1:\"b\";s:11:\"delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:177;a:4:{s:1:\"a\";i:178;s:1:\"b\";s:15:\"delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:178;a:4:{s:1:\"a\";i:179;s:1:\"b\";s:17:\"force_delete_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:179;a:4:{s:1:\"a\";i:180;s:1:\"b\";s:21:\"force_delete_any_user\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:180;a:4:{s:1:\"a\";i:181;s:1:\"b\";s:9:\"view_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:181;a:4:{s:1:\"a\";i:182;s:1:\"b\";s:13:\"view_any_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:182;a:4:{s:1:\"a\";i:183;s:1:\"b\";s:11:\"create_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:183;a:4:{s:1:\"a\";i:184;s:1:\"b\";s:11:\"update_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:184;a:4:{s:1:\"a\";i:185;s:1:\"b\";s:12:\"restore_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:185;a:4:{s:1:\"a\";i:186;s:1:\"b\";s:16:\"restore_any_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:186;a:4:{s:1:\"a\";i:187;s:1:\"b\";s:14:\"replicate_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:187;a:4:{s:1:\"a\";i:188;s:1:\"b\";s:12:\"reorder_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:188;a:4:{s:1:\"a\";i:189;s:1:\"b\";s:11:\"delete_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:189;a:4:{s:1:\"a\";i:190;s:1:\"b\";s:15:\"delete_any_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:190;a:4:{s:1:\"a\";i:191;s:1:\"b\";s:17:\"force_delete_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:191;a:4:{s:1:\"a\";i:192;s:1:\"b\";s:21:\"force_delete_any_blog\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:192;a:4:{s:1:\"a\";i:193;s:1:\"b\";s:26:\"view_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:193;a:4:{s:1:\"a\";i:194;s:1:\"b\";s:30:\"view_any_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:194;a:4:{s:1:\"a\";i:195;s:1:\"b\";s:28:\"create_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:195;a:4:{s:1:\"a\";i:196;s:1:\"b\";s:28:\"update_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:196;a:4:{s:1:\"a\";i:197;s:1:\"b\";s:29:\"restore_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:197;a:4:{s:1:\"a\";i:198;s:1:\"b\";s:33:\"restore_any_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:198;a:4:{s:1:\"a\";i:199;s:1:\"b\";s:31:\"replicate_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:199;a:4:{s:1:\"a\";i:200;s:1:\"b\";s:29:\"reorder_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:200;a:4:{s:1:\"a\";i:201;s:1:\"b\";s:28:\"delete_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:201;a:4:{s:1:\"a\";i:202;s:1:\"b\";s:32:\"delete_any_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:202;a:4:{s:1:\"a\";i:203;s:1:\"b\";s:34:\"force_delete_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:203;a:4:{s:1:\"a\";i:204;s:1:\"b\";s:38:\"force_delete_any_evaluation::criterion\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:204;a:4:{s:1:\"a\";i:205;s:1:\"b\";s:13:\"view_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:205;a:4:{s:1:\"a\";i:206;s:1:\"b\";s:17:\"view_any_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:206;a:4:{s:1:\"a\";i:207;s:1:\"b\";s:15:\"create_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:207;a:4:{s:1:\"a\";i:208;s:1:\"b\";s:15:\"update_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:208;a:4:{s:1:\"a\";i:209;s:1:\"b\";s:16:\"restore_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:209;a:4:{s:1:\"a\";i:210;s:1:\"b\";s:20:\"restore_any_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:210;a:4:{s:1:\"a\";i:211;s:1:\"b\";s:18:\"replicate_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:211;a:4:{s:1:\"a\";i:212;s:1:\"b\";s:16:\"reorder_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:212;a:4:{s:1:\"a\";i:213;s:1:\"b\";s:15:\"delete_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:213;a:4:{s:1:\"a\";i:214;s:1:\"b\";s:19:\"delete_any_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:214;a:4:{s:1:\"a\";i:215;s:1:\"b\";s:21:\"force_delete_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:215;a:4:{s:1:\"a\";i:216;s:1:\"b\";s:25:\"force_delete_any_newsroom\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:216;a:4:{s:1:\"a\";i:217;s:1:\"b\";s:11:\"view_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:217;a:4:{s:1:\"a\";i:218;s:1:\"b\";s:15:\"view_any_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:218;a:4:{s:1:\"a\";i:219;s:1:\"b\";s:13:\"create_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:219;a:4:{s:1:\"a\";i:220;s:1:\"b\";s:13:\"update_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:220;a:4:{s:1:\"a\";i:221;s:1:\"b\";s:14:\"restore_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:221;a:4:{s:1:\"a\";i:222;s:1:\"b\";s:18:\"restore_any_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:222;a:4:{s:1:\"a\";i:223;s:1:\"b\";s:16:\"replicate_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:223;a:4:{s:1:\"a\";i:224;s:1:\"b\";s:14:\"reorder_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:224;a:4:{s:1:\"a\";i:225;s:1:\"b\";s:13:\"delete_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:225;a:4:{s:1:\"a\";i:226;s:1:\"b\";s:17:\"delete_any_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:226;a:4:{s:1:\"a\";i:227;s:1:\"b\";s:19:\"force_delete_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:227;a:4:{s:1:\"a\";i:228;s:1:\"b\";s:23:\"force_delete_any_scroll\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:228;a:4:{s:1:\"a\";i:229;s:1:\"b\";s:10:\"view_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:229;a:4:{s:1:\"a\";i:230;s:1:\"b\";s:14:\"view_any_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:230;a:4:{s:1:\"a\";i:231;s:1:\"b\";s:12:\"create_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:231;a:4:{s:1:\"a\";i:232;s:1:\"b\";s:12:\"update_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:232;a:4:{s:1:\"a\";i:233;s:1:\"b\";s:13:\"restore_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:233;a:4:{s:1:\"a\";i:234;s:1:\"b\";s:17:\"restore_any_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:234;a:4:{s:1:\"a\";i:235;s:1:\"b\";s:15:\"replicate_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:235;a:4:{s:1:\"a\";i:236;s:1:\"b\";s:13:\"reorder_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:236;a:4:{s:1:\"a\";i:237;s:1:\"b\";s:12:\"delete_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:237;a:4:{s:1:\"a\";i:238;s:1:\"b\";s:16:\"delete_any_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:238;a:4:{s:1:\"a\";i:239;s:1:\"b\";s:18:\"force_delete_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:239;a:4:{s:1:\"a\";i:240;s:1:\"b\";s:22:\"force_delete_any_event\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:240;a:4:{s:1:\"a\";i:241;s:1:\"b\";s:19:\"view_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:241;a:4:{s:1:\"a\";i:242;s:1:\"b\";s:23:\"view_any_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:242;a:4:{s:1:\"a\";i:243;s:1:\"b\";s:21:\"create_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:243;a:4:{s:1:\"a\";i:244;s:1:\"b\";s:21:\"update_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:244;a:4:{s:1:\"a\";i:245;s:1:\"b\";s:22:\"restore_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:245;a:4:{s:1:\"a\";i:246;s:1:\"b\";s:26:\"restore_any_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:246;a:4:{s:1:\"a\";i:247;s:1:\"b\";s:24:\"replicate_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:247;a:4:{s:1:\"a\";i:248;s:1:\"b\";s:22:\"reorder_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:248;a:4:{s:1:\"a\";i:249;s:1:\"b\";s:21:\"delete_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:249;a:4:{s:1:\"a\";i:250;s:1:\"b\";s:25:\"delete_any_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:250;a:4:{s:1:\"a\";i:251;s:1:\"b\";s:27:\"force_delete_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:251;a:4:{s:1:\"a\";i:252;s:1:\"b\";s:31:\"force_delete_any_event::booking\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:252;a:4:{s:1:\"a\";i:253;s:1:\"b\";s:29:\"view_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:253;a:4:{s:1:\"a\";i:254;s:1:\"b\";s:33:\"view_any_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:254;a:4:{s:1:\"a\";i:255;s:1:\"b\";s:31:\"create_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:255;a:4:{s:1:\"a\";i:256;s:1:\"b\";s:31:\"update_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:256;a:4:{s:1:\"a\";i:257;s:1:\"b\";s:32:\"restore_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:257;a:4:{s:1:\"a\";i:258;s:1:\"b\";s:36:\"restore_any_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:258;a:4:{s:1:\"a\";i:259;s:1:\"b\";s:34:\"replicate_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:259;a:4:{s:1:\"a\";i:260;s:1:\"b\";s:32:\"reorder_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:260;a:4:{s:1:\"a\";i:261;s:1:\"b\";s:31:\"delete_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:261;a:4:{s:1:\"a\";i:262;s:1:\"b\";s:35:\"delete_any_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:262;a:4:{s:1:\"a\";i:263;s:1:\"b\";s:37:\"force_delete_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:263;a:4:{s:1:\"a\";i:264;s:1:\"b\";s:41:\"force_delete_any_itr::nomination::invoice\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:264;a:4:{s:1:\"a\";i:265;s:1:\"b\";s:11:\"view_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:265;a:4:{s:1:\"a\";i:266;s:1:\"b\";s:15:\"view_any_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:266;a:4:{s:1:\"a\";i:267;s:1:\"b\";s:13:\"create_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:267;a:4:{s:1:\"a\";i:268;s:1:\"b\";s:13:\"update_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:268;a:4:{s:1:\"a\";i:269;s:1:\"b\";s:14:\"restore_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:269;a:4:{s:1:\"a\";i:270;s:1:\"b\";s:18:\"restore_any_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:270;a:4:{s:1:\"a\";i:271;s:1:\"b\";s:16:\"replicate_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:271;a:4:{s:1:\"a\";i:272;s:1:\"b\";s:14:\"reorder_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:272;a:4:{s:1:\"a\";i:273;s:1:\"b\";s:13:\"delete_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:273;a:4:{s:1:\"a\";i:274;s:1:\"b\";s:17:\"delete_any_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:274;a:4:{s:1:\"a\";i:275;s:1:\"b\";s:19:\"force_delete_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:275;a:4:{s:1:\"a\";i:276;s:1:\"b\";s:23:\"force_delete_any_update\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:276;a:4:{s:1:\"a\";i:277;s:1:\"b\";s:20:\"widget_StatsOverview\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:277;a:4:{s:1:\"a\";i:278;s:1:\"b\";s:27:\"widget_DashboardNominations\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:278;a:4:{s:1:\"a\";i:279;s:1:\"b\";s:30:\"view_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:279;a:4:{s:1:\"a\";i:280;s:1:\"b\";s:34:\"view_any_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:280;a:4:{s:1:\"a\";i:281;s:1:\"b\";s:32:\"create_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:281;a:4:{s:1:\"a\";i:282;s:1:\"b\";s:32:\"update_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:282;a:4:{s:1:\"a\";i:283;s:1:\"b\";s:33:\"restore_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:283;a:4:{s:1:\"a\";i:284;s:1:\"b\";s:37:\"restore_any_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:284;a:4:{s:1:\"a\";i:285;s:1:\"b\";s:35:\"replicate_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:285;a:4:{s:1:\"a\";i:286;s:1:\"b\";s:33:\"reorder_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:286;a:4:{s:1:\"a\";i:287;s:1:\"b\";s:32:\"delete_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:287;a:4:{s:1:\"a\";i:288;s:1:\"b\";s:36:\"delete_any_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:288;a:4:{s:1:\"a\";i:289;s:1:\"b\";s:38:\"force_delete_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:289;a:4:{s:1:\"a\";i:290;s:1:\"b\";s:42:\"force_delete_any_category::judge::question\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:290;a:4:{s:1:\"a\";i:291;s:1:\"b\";s:17:\"view_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:291;a:4:{s:1:\"a\";i:292;s:1:\"b\";s:21:\"view_any_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:292;a:4:{s:1:\"a\";i:293;s:1:\"b\";s:19:\"create_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:293;a:4:{s:1:\"a\";i:294;s:1:\"b\";s:19:\"update_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:294;a:4:{s:1:\"a\";i:295;s:1:\"b\";s:20:\"restore_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:295;a:4:{s:1:\"a\";i:296;s:1:\"b\";s:24:\"restore_any_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:296;a:4:{s:1:\"a\";i:297;s:1:\"b\";s:22:\"replicate_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:297;a:4:{s:1:\"a\";i:298;s:1:\"b\";s:20:\"reorder_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:298;a:4:{s:1:\"a\";i:299;s:1:\"b\";s:19:\"delete_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:299;a:4:{s:1:\"a\";i:300;s:1:\"b\";s:23:\"delete_any_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:300;a:4:{s:1:\"a\";i:301;s:1:\"b\";s:25:\"force_delete_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:301;a:4:{s:1:\"a\";i:302;s:1:\"b\";s:29:\"force_delete_any_collaborator\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:302;a:4:{s:1:\"a\";i:303;s:1:\"b\";s:23:\"view_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:303;a:4:{s:1:\"a\";i:304;s:1:\"b\";s:27:\"view_any_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:304;a:4:{s:1:\"a\";i:305;s:1:\"b\";s:25:\"create_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:305;a:4:{s:1:\"a\";i:306;s:1:\"b\";s:25:\"update_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:306;a:4:{s:1:\"a\";i:307;s:1:\"b\";s:26:\"restore_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:307;a:4:{s:1:\"a\";i:308;s:1:\"b\";s:30:\"restore_any_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:308;a:4:{s:1:\"a\";i:309;s:1:\"b\";s:28:\"replicate_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:309;a:4:{s:1:\"a\";i:310;s:1:\"b\";s:26:\"reorder_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:310;a:4:{s:1:\"a\";i:311;s:1:\"b\";s:25:\"delete_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:311;a:4:{s:1:\"a\";i:312;s:1:\"b\";s:29:\"delete_any_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:312;a:4:{s:1:\"a\";i:313;s:1:\"b\";s:31:\"force_delete_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}i:313;a:4:{s:1:\"a\";i:314;s:1:\"b\";s:35:\"force_delete_any_judge::application\";s:1:\"c\";s:3:\"web\";s:1:\"r\";a:1:{i:0;i:1;}}}s:5:\"roles\";a:1:{i:0;a:3:{s:1:\"a\";i:1;s:1:\"b\";s:11:\"super_admin\";s:1:\"c\";s:3:\"web\";}}}', 1770263938);

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `short_description` text COLLATE utf8mb4_unicode_ci,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `image`, `short_description`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Artificial Intelligence', 'categories/01KG5DPY0FATFC1GK84EWAF6Z4.jpg', 'kdfnbvinvidfi', '<p>uhdfiuvndiufnv dfkvniunfd</p>', 1, '2026-01-29 12:14:41', '2026-01-29 12:14:41'),
(2, 'cyber security', 'categories/01KG5DQZKKFG6JH9R754B6BKAV.jpg', 'oidhfgivuhniuvbru diufhviurehf9 ', '<p>odhbfviubhdiufhv9</p>', 1, '2026-01-29 12:15:15', '2026-01-29 12:15:15');

-- --------------------------------------------------------

--
-- Table structure for table `category_judge_questions`
--

CREATE TABLE `category_judge_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `question_text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `collaborators`
--

CREATE TABLE `collaborators` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` decimal(10,2) NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_judges`
--

CREATE TABLE `dummy_judges` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judge_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dummy_winners`
--

CREATE TABLE `dummy_winners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `award_id` bigint(20) UNSIGNED NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `badge_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `evaluation_criteria`
--

CREATE TABLE `evaluation_criteria` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phase` int(11) NOT NULL,
  `grade_letter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `min_score` decimal(5,2) DEFAULT NULL,
  `max_score` decimal(5,2) DEFAULT NULL,
  `is_rejection` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `evaluation_criteria`
--

INSERT INTO `evaluation_criteria` (`id`, `phase`, `grade_letter`, `label`, `description`, `min_score`, `max_score`, `is_rejection`, `created_at`, `updated_at`) VALUES
(1, 1, 'A', 'Category Fit', 'Strong alignment with category definitions.', NULL, NULL, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(2, 1, 'B', 'Scope Alignment', 'Good alignment with scope.', NULL, NULL, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(3, 1, 'C', 'Misalignment', 'Does not fit category or scope. Not award-eligible.', NULL, NULL, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(4, 2, 'A', 'Foundational', 'Creates new capability or standard.', 90.00, 100.00, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(5, 2, 'B', 'Substantial', 'Significant Advancement.', 80.00, 89.99, 0, '2026-01-28 20:11:51', '2026-02-03 22:29:16'),
(6, 2, 'C', 'Incremental', 'Improvement of Existing work.', 70.00, 79.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(7, 2, 'D', 'Routine', 'Routine professional Output. Not award-eligible.', 60.00, 69.99, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(8, 3, 'A', 'Indispensable', 'Could not exist without Nominee.', 90.00, 100.00, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(9, 3, 'B', 'Primary', 'Nominee drove the outcome.', 80.00, 89.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(10, 3, 'C', 'Shared', 'Credit is distributed.', 70.00, 79.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(11, 3, 'D', 'Marginal', 'Limited / advisory Input. Ineligible for top recognition.', 60.00, 69.99, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(12, 4, 'A', 'Transformational', 'Changed Practice or outcomes meaningfully.', 90.00, 100.00, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(13, 4, 'B', 'Material', 'Clear, Measurable Benefits.', 80.00, 89.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(14, 4, 'C', 'Localized', 'Limited but real effect.', 70.00, 79.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(15, 4, 'D', 'Unrealized', 'Intent without evidence. Rejection.', 60.00, 69.99, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(16, 5, 'A', 'Externally Validated', 'Independent, Verifiable Proof.', 90.00, 100.00, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(17, 5, 'B', 'Documented', 'Strong Internal Records.', 80.00, 89.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(18, 5, 'C', 'Partially Substantiated', 'Some Evidence Gaps.', 70.00, 79.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(19, 5, 'D', 'Unsubstantiated', 'Claims without Proofs. Rejection.', 60.00, 69.99, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(20, 6, 'A', 'Enduring', 'Likely relevant 5-10 Years.', 90.00, 100.00, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(21, 6, 'B', 'Sustained', 'Multi – Year Relevance.', 80.00, 89.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(22, 6, 'C', 'Time Bond', 'Short Term Value.', 70.00, 79.99, 0, '2026-01-28 20:11:51', '2026-01-28 20:11:51'),
(23, 6, 'D', 'Transient', 'Trend- Based. Rejection.', 60.00, 69.99, 1, '2026-01-28 20:11:51', '2026-01-28 20:11:51');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `thumbnail_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_date` date NOT NULL,
  `booking_start_date` date NOT NULL,
  `booking_deadline_date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `ticket_price` decimal(10,2) NOT NULL DEFAULT '0.00',
  `images` json DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `event_bookings`
--

CREATE TABLE `event_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `event_id` bigint(20) UNSIGNED NOT NULL,
  `ticket_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_gateway` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_payment_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_details` json DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `judge_applications`
--

CREATE TABLE `judge_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `present_designation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `years_of_experience` int(11) NOT NULL,
  `working_company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bio` text COLLATE utf8mb4_unicode_ci,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `profile_pic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `documents` json DEFAULT NULL,
  `document_urls` json DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `answers` json DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `judge_application_answers`
--

CREATE TABLE `judge_application_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judge_application_id` bigint(20) UNSIGNED NOT NULL,
  `category_judge_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(5, '2026_01_11_160000_create_categories_table', 1),
(6, '2026_01_11_164846_create_badges_table', 1),
(7, '2026_01_11_170358_create_admin_fees_table', 1),
(8, '2026_01_11_180700_create_seasons_table', 1),
(9, '2026_01_11_182623_create_quick_cred_fees_table', 1),
(10, '2026_01_11_184001_create_nominee_questions_table', 1),
(11, '2026_01_11_184500_update_seasons_table_status', 1),
(13, '2026_01_11_190041_create_discounts_table', 1),
(14, '2026_01_11_192149_create_payment_gateways_table', 1),
(15, '2026_01_11_195001_create_awards_table', 1),
(16, '2026_01_11_195902_remove_redundant_fields_from_payment_gateways_table', 1),
(17, '2026_01_11_203037_create_faqs_table', 1),
(18, '2026_01_11_215214_add_original_password_to_users_table', 1),
(19, '2026_01_25_182010_drop_quick_cred_fees_table', 1),
(20, '2026_01_26_162845_create_nominations_table', 1),
(21, '2026_01_26_162848_create_nomination_answers_table', 1),
(22, '2026_01_26_162852_create_nomination_evidence_table', 1),
(23, '2026_01_26_182511_add_code_to_discounts_table', 1),
(24, '2026_01_26_212025_add_payment_gateway_id_to_nominations_table', 1),
(25, '2026_01_27_000000_create_payments_table', 1),
(26, '2026_01_27_164300_add_discount_id_to_nominations_table', 1),
(27, '2026_01_09_122427_create_permission_tables', 2),
(28, '2026_01_29_070637_add_judge_and_status_to_nominations_table', 3),
(29, '2026_01_29_070644_create_evaluation_criteria_table', 3),
(30, '2026_01_29_070645_create_nomination_evaluations_table', 3),
(31, '2026_01_29_192549_create_scrolls_table', 4),
(32, '2026_01_30_062854_create_newsrooms_table', 5),
(33, '2026_01_30_064900_add_is_active_to_newsrooms_table', 5),
(34, '2026_01_30_064918_add_is_active_to_newsrooms_table', 5),
(35, '2026_01_30_070449_create_blogs_table', 5),
(36, '2026_01_31_122251_create_updates_table', 6),
(37, '2026_01_31_140815_add_invoice_fields_to_seasons_table', 7),
(38, '2026_01_31_154831_add_invoice_numbers_to_nominations_table', 7),
(39, '2026_01_31_162444_add_invoice_paths_to_nominations_table', 7),
(40, '2026_01_31_165248_add_paid_at_to_nominations_table', 7),
(41, '2026_02_01_132456_create_events_table', 8),
(42, '2026_02_01_164456_create_event_bookings_table', 8),
(43, '2026_02_02_181345_create_collaborators_table', 9),
(44, '2026_02_02_184056_create_category_judge_questions_table', 9),
(45, '2026_02_02_184058_create_judge_applications_table', 9),
(46, '2026_02_02_184915_create_judge_application_answers_table', 9),
(47, '2026_02_03_171142_create_bank_accounts_table', 10),
(48, '2026_02_03_173942_create_dummy_judges_table', 10),
(49, '2026_02_03_173949_create_dummy_winners_table', 10),
(50, '2026_02_03_210305_add_manual_payment_invoice_to_event_bookings_table', 10),
(51, '2026_02_03_220026_add_manual_payment_fields_to_nominations_table', 11),
(52, '2026_02_04_042351_change_scores_to_decimal_in_evaluation_criteria', 12),
(53, '2026_02_04_094500_change_phase_scores_to_decimal_in_nomination_evaluations', 12);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(3, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 3);

-- --------------------------------------------------------

--
-- Table structure for table `newsrooms`
--

CREATE TABLE `newsrooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsrooms`
--

INSERT INTO `newsrooms` (`id`, `title`, `image`, `date`, `description`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 'Global Design Minds to Converge at 2025 Design Expo Conference', 'newsroom/01KG74H81AFT86EVAFRWK146TM.webp', '2026-01-31', '<p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">The 2025 Design Expo Conference is set to become the epicenter of global design innovation, as top creatives, technologists, and thought leaders gather to explore the future of design across industries. Scheduled for October 1–5, 2025 in San Francisco, the event promises to showcase cutting-edge design practices, technological integrations, and visionary ideas that are shaping the next generation of user experience, product development, and visual storytelling.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Bringing together architects, UX/UI designers, product innovators, AI enthusiasts, and creative directors from over 50 countries, the conference serves as a collaborative platform to exchange knowledge, trends, and tools transforming the design ecosystem. Key themes for this year include AI-driven creativity, sustainability in design, spatial computing, and inclusive design methodologies.</p><h5 style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;letter-spacing:normal;line-height:28.8px;margin:0px 0px 10px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;padding:0px;\">Highlights of the 2025 Design Expo include:</strong></h5><ul style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;list-style:none;margin-bottom:1rem;margin-right:0px;margin-top:0px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Keynote addresses by global design icons and industry disruptors</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Hands-on workshops covering tools like Figma, Adobe Firefly, Midjourney, and more</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Panel discussions on the ethical impact of generative AI in design</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Startup design showcases and prototype exhibitions</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Networking zones connecting talent with top design-led companies</p></li></ul><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">In addition to in-person attendance, the event will feature a hybrid format with virtual access to all keynotes and live panels, allowing participants from around the world to engage and collaborate.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Whether you\'re a seasoned professional or a rising designer, the 2025 Design Expo Conference is the ultimate opportunity to stay ahead of the curve and shape what’s next in the world of design.</p>', '2026-01-30 04:12:46', '2026-01-30 04:12:46', 1);
INSERT INTO `newsrooms` (`id`, `title`, `image`, `date`, `description`, `created_at`, `updated_at`, `is_active`) VALUES
(2, 'Tony Blair Advocates for AI Integration in UK Healthcare and Education', 'newsroom/01KG74JKYWKFJFG85MEJJKJ6E4.webp', '2026-02-02', '<p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">The 2025 Design Expo Conference is set to become the epicenter of global design innovation, as top creatives, technologists, and thought leaders gather to explore the future of design across industries. Scheduled for October 1–5, 2025 in San Francisco, the event promises to showcase cutting-edge design practices, technological integrations, and visionary ideas that are shaping the next generation of user experience, product development, and visual storytelling.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Bringing together architects, UX/UI designers, product innovators, AI enthusiasts, and creative directors from over 50 countries, the conference serves as a collaborative platform to exchange knowledge, trends, and tools transforming the design ecosystem. Key themes for this year include AI-driven creativity, sustainability in design, spatial computing, and inclusive design methodologies.</p><h5 style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:18px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;letter-spacing:normal;line-height:28.8px;margin:0px 0px 10px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><strong style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px;padding:0px;\">Highlights of the 2025 Design Expo include:</strong></h5><ul style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;list-style:disc;margin-bottom:1rem;margin-right:0px;margin-top:0px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\"><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Keynote addresses by global design icons and industry disruptors</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Hands-on workshops covering tools like Figma, Adobe Firefly, Midjourney, and more</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Panel discussions on the ethical impact of generative AI in design</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Startup design showcases and prototype exhibitions</p></li><li style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-radius:0px;border-style:solid;border-width:0px;box-sizing:border-box;display:block;line-height:1.6em;margin-bottom:5px;margin-right:0px;margin-top:5px;padding:0px 0px 0px 30px;position:relative;\"><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;border-style:solid;border-width:0px;box-sizing:border-box;margin:0px 0px 20px;padding:0px;\">Networking zones connecting talent with top design-led companies</p></li></ul><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">In addition to in-person attendance, the event will feature a hybrid format with virtual access to all keynotes and live panels, allowing participants from around the world to engage and collaborate.</p><p style=\"--bg-color-even:#E8E8E8;--bg-color-odd:#F4F4F4;--bg-dark-1-rgb:16, 20, 53;--bg-dark-1:#101435;--bg-dark-2:#1A1E42;--bg-dark-3:#1e1e1e;--bg-gradient-1:0deg, rgba(118, 77, 240, .1) 0%, rgba(68, 36, 144, .2) 100%;--bg-grey:#eeeeee;--bg-light:#F8F9FA;--body-font-color-dark:rgba(255, 255, 255, .75);--body-font-color:rgba(0, 0, 0, .6);--body-font-size:16px;--body-font-weight:500;--body-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--border-color:#bbbbbb;--border-default:solid 1px rgba(30, 30, 30, 1);--btn-color:#fff;--btn-font-family:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--btn-font-size:12px;--btn-font-weight:800;--btn-hover-bg:#101435;--btn-letter-spacing:2px;--btn-padding:4px 20px;--btn-rounded:6px;--btn-text-decoration:none;--btn-text-transform:uppercase;--container-max-width:1240px;--gradient-text:0deg, #888888 0%, #ffffff 75%;--h1-font-size:60px;--h1-font-weight:bold;--h1-letter-spacing:-0.02em;--h1-line-height:1.25em;--h1-margin-bottom:20px;--h2-font-size:48px;--h2-font-weight:bold;--h2-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--h2-letter-spacing:-0.015em;--h2-line-height:1.2em;--h2-margin-bottom:25px;--h3-font-size:26px;--h3-font-weight:bold;--h3-letter-spacing:0;--h3-line-height:1.5em;--h3-margin-bottom:10px;--h4-font-size:20px;--h4-font-weight:bold;--h4-letter-spacing:0;--h4-line-height:1.6em;--h4-margin-bottom:10px;--h5-font-size:18px;--h5-font-weight:bold;--h5-letter-spacing:0;--h5-line-height:1.6em;--h5-margin-bottom:10px;--h6-font-size:16px;--h6-font-weight:bold;--h6-letter-spacing:0;--h6-line-height:1.6em;--h6-margin-bottom:10px;--heading-font-color:#000000;--heading-font-weight:bold;--heading-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--heading-text-transform:none;--logo-footer-width:150px;--logo-width:120px;--mainmenu-font-size:15px;--mainmenu-font-weight:700;--mainmenu-font:&quot;Manrope&quot;, Helvetica, Arial, sans-serif;--mainmenu-letter-spacing:0;--mainmenu-text-transform:none;--rounded-1:10px;--swiper-theme-color:#442490;-webkit-text-stroke-width:0px;border-style:solid;border-width:0px;box-sizing:border-box;font-family:Manrope, Helvetica, Arial, sans-serif;font-size:16px;font-style:normal;font-variant-caps:normal;font-variant-ligatures:normal;font-weight:500;letter-spacing:normal;margin:0px 0px 20px;orphans:2;padding:0px;text-align:start;text-decoration-color:initial;text-decoration-style:initial;text-decoration-thickness:initial;text-indent:0px;text-transform:none;white-space:normal;widows:2;word-spacing:0px;\">Whether you\'re a seasoned professional or a rising designer, the 2025 Design Expo Conference is the ultimate opportunity to stay ahead of the curve and shape what’s next in the world of design.</p>', '2026-01-30 04:13:31', '2026-01-30 04:13:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nominations`
--

CREATE TABLE `nominations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `season_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `award_id` bigint(20) UNSIGNED NOT NULL,
  `nominee_type` enum('individual','organization','startup','research_group') COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedin_url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `workforce_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `headshot` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contribution_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `timeframe` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `eligibility_justification` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sensitive_data` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `controversies` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no',
  `industry_influence` enum('yes','no') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yes',
  `declaration_accurate` tinyint(1) NOT NULL DEFAULT '0',
  `declaration_privacy` tinyint(1) NOT NULL DEFAULT '0',
  `payment_status` enum('pending','completed','failed','refunded') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_paid` decimal(10,2) DEFAULT NULL,
  `admin_fee` decimal(10,2) NOT NULL DEFAULT '35.00',
  `discount_applied` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_gateway_id` bigint(20) UNSIGNED DEFAULT NULL,
  `manual_invoice` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `manual_transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itr_invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itr_invoice_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `judge_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `final_score` decimal(5,2) DEFAULT NULL,
  `final_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominations`
--

INSERT INTO `nominations` (`id`, `application_id`, `user_id`, `season_id`, `category_id`, `award_id`, `nominee_type`, `full_name`, `organization`, `email`, `phone`, `country`, `industry`, `address`, `linkedin_url`, `workforce_size`, `headshot`, `contribution_title`, `timeframe`, `eligibility_justification`, `sensitive_data`, `controversies`, `industry_influence`, `declaration_accurate`, `declaration_privacy`, `payment_status`, `payment_method`, `amount_paid`, `admin_fee`, `discount_applied`, `payment_gateway_id`, `manual_invoice`, `manual_transaction_id`, `invoice_no`, `itr_invoice_no`, `invoice_path`, `itr_invoice_path`, `paid_at`, `created_at`, `updated_at`, `discount_id`, `judge_id`, `status`, `final_score`, `final_grade`) VALUES
(1, 'AUR-2026-00001', 3, 1, 1, 1, 'individual', 'Penubaku Sasi Kiran', 'Sunseaz Technologies Pvt Ltd', 'penubakusasikiran@gmail.com', '09493851281', 'India', 'Pvt LTD', 'Nk towers,\r\nmadhapur', 'https://aureum.clone.aureumawards.com/nomination', '11-50', 'nominations/headshots/8RkVeB5K4lTXV6kfLqUTrFVgyE6qBVLhwIwaGqvb.jpg', 'Softwate Developer', 'https://aureum.clone.aureumawards.com/nomination https://aureum.clone.aureumawards.com/nomination https://aureum.clone.aureumawards.com/nomination', 'eligibility criteria https://aureum.clone.aureumawards.com/nomination https://aureum.clone.aureumawards.com/nomination', 'no', 'no', 'yes', 1, 1, 'completed', 'razorpay', 37.00, 35.00, 0.00, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2026-01-29 12:23:03', '2026-01-31 04:49:04', NULL, 2, 'rejected', 0.00, 'D');

-- --------------------------------------------------------

--
-- Table structure for table `nomination_answers`
--

CREATE TABLE `nomination_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomination_id` bigint(20) UNSIGNED NOT NULL,
  `nominee_question_id` bigint(20) UNSIGNED NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomination_answers`
--

INSERT INTO `nomination_answers` (`id`, `nomination_id`, `nominee_question_id`, `answer`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 'https://aureum.clone.aureumawards.com/nomination https://aureum.clone.aureumawards.com/nomination https://aureum.clone.aureumawards.com/nomination', '2026-01-29 12:33:45', '2026-01-29 12:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `nomination_evaluations`
--

CREATE TABLE `nomination_evaluations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomination_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `phase_1_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_2_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_2_score` decimal(5,2) DEFAULT NULL,
  `phase_3_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_3_score` decimal(5,2) DEFAULT NULL,
  `phase_4_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_4_score` decimal(5,2) DEFAULT NULL,
  `phase_5_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_5_score` decimal(5,2) DEFAULT NULL,
  `phase_6_grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phase_6_score` decimal(5,2) DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomination_evaluations`
--

INSERT INTO `nomination_evaluations` (`id`, `nomination_id`, `user_id`, `phase_1_grade`, `phase_2_grade`, `phase_2_score`, `phase_3_grade`, `phase_3_score`, `phase_4_grade`, `phase_4_score`, `phase_5_grade`, `phase_5_score`, `phase_6_grade`, `phase_6_score`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'C', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'ndflnvdo dfjvoidj', '2026-01-31 04:49:04', '2026-01-31 04:49:04');

-- --------------------------------------------------------

--
-- Table structure for table `nomination_evidence`
--

CREATE TABLE `nomination_evidence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomination_id` bigint(20) UNSIGNED NOT NULL,
  `type` enum('file','link') COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_size` int(11) DEFAULT NULL,
  `file_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference_url` text COLLATE utf8mb4_unicode_ci,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nomination_evidence`
--

INSERT INTO `nomination_evidence` (`id`, `nomination_id`, `type`, `file_path`, `file_name`, `file_size`, `file_type`, `reference_url`, `description`, `created_at`, `updated_at`) VALUES
(1, 1, 'file', 'nominations/evidence/gLShJv29AGRzoA2ttxY7iBBBNTcI794Ked1Tx0ab.png', 'localhost_8000_nomination.png', 47848, 'image/png', NULL, NULL, '2026-01-29 12:23:03', '2026-01-29 12:23:03'),
(2, 1, 'file', 'nominations/evidence/akCpV9u6aw0js2CmU4DZVcg4tY9otOVvYJDDKDvK.pdf', 'nomination-AUR-2026-00003 (6).pdf', 6040, 'application/pdf', NULL, NULL, '2026-01-29 12:23:03', '2026-01-29 12:23:03'),
(3, 1, 'file', 'nominations/evidence/9mrcRMMBfzmEZqOVJRTiabd2AUkYdpTBQAGbt12A.pdf', 'nomination-AUR-2026-00003.pdf', 7440, 'application/pdf', NULL, NULL, '2026-01-29 12:23:03', '2026-01-29 12:23:03'),
(4, 1, 'file', 'nominations/evidence/fuGuQql1qvP3CdxierrSrUg96NnxKmHy9NJ8Piev.docx', 'Payment page with razorpay and paypal.docx', 46746, 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', NULL, NULL, '2026-01-29 12:23:03', '2026-01-29 12:23:03'),
(5, 1, 'file', 'nominations/evidence/ypUL87oAelvVD2TKXTbCanzkX4JssMCGMCgPaYBE.pdf', 'Penubaku Sasi Kiran Resume 2.pdf', 208883, 'application/pdf', NULL, NULL, '2026-01-29 12:23:03', '2026-01-29 12:23:03'),
(11, 1, 'link', NULL, NULL, NULL, NULL, 'https://aureum.clone.aureumawards.com/nomination', NULL, '2026-01-29 12:33:45', '2026-01-29 12:33:45'),
(12, 1, 'link', NULL, NULL, NULL, NULL, 'https://aureum.clone.aureumawards.com/nomination', NULL, '2026-01-29 12:33:45', '2026-01-29 12:33:45'),
(13, 1, 'link', NULL, NULL, NULL, NULL, 'https://aureum.clone.aureumawards.com/nomination', NULL, '2026-01-29 12:33:45', '2026-01-29 12:33:45'),
(14, 1, 'link', NULL, NULL, NULL, NULL, 'https://aureum.clone.aureumawards.com/nomination', NULL, '2026-01-29 12:33:45', '2026-01-29 12:33:45'),
(15, 1, 'link', NULL, NULL, NULL, NULL, 'https://aureum.clone.aureumawards.com/nomination', NULL, '2026-01-29 12:33:45', '2026-01-29 12:33:45');

-- --------------------------------------------------------

--
-- Table structure for table `nominee_questions`
--

CREATE TABLE `nominee_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nominee_questions`
--

INSERT INTO `nominee_questions` (`id`, `category_id`, `question`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'iuhftigrrrrrrrr ribgiri ?', 1, '2026-01-29 12:18:32', '2026-01-29 12:18:32');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_gateway_id` bigint(20) UNSIGNED NOT NULL,
  `nomination_id` bigint(20) UNSIGNED DEFAULT NULL,
  `amount_usd` decimal(15,2) NOT NULL,
  `amount_inr` decimal(15,2) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payer_details` json DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_id`, `payment_gateway_id`, `nomination_id`, `amount_usd`, `amount_inr`, `status`, `payer_details`, `created_at`, `updated_at`) VALUES
(1, 'pay_S9mpYOcn4vh2l9', 1, 1, 37.00, 3404.28, 'completed', '{\"id\": \"pay_S9mpYOcn4vh2l9\", \"fee\": 7186, \"tax\": 1096, \"vpa\": null, \"bank\": null, \"card\": {\"id\": \"card_S9mpYOcn4vh2l9\", \"emi\": false, \"name\": \"\", \"type\": \"debit\", \"last4\": \"1007\", \"entity\": \"card\", \"issuer\": \"DCBL\", \"network\": \"Visa\", \"sub_type\": \"consumer\", \"international\": false}, \"email\": \"penubakusasikiran@gmail.com\", \"notes\": {\"nomination_id\": \"1\"}, \"amount\": 3700, \"entity\": \"payment\", \"method\": \"card\", \"status\": \"captured\", \"wallet\": null, \"card_id\": \"card_S9mpYOcn4vh2l9\", \"contact\": \"+919493851281\", \"captured\": true, \"currency\": \"USD\", \"order_id\": \"order_S9mpEcBCT8ZAHF\", \"created_at\": 1769709850, \"error_code\": null, \"error_step\": null, \"invoice_id\": null, \"base_amount\": 304482, \"description\": \"Nomination Fee\", \"error_reason\": null, \"error_source\": null, \"acquirer_data\": {\"auth_code\": null}, \"base_currency\": \"INR\", \"international\": false, \"refund_status\": null, \"authentication\": {\"version\": \"\", \"authentication_channel\": \"browser\"}, \"amount_captured\": 335551, \"amount_refunded\": 0, \"error_description\": null}', '2026-01-29 12:34:34', '2026-01-29 12:34:34');

-- --------------------------------------------------------

--
-- Table structure for table `payment_gateways`
--

CREATE TABLE `payment_gateways` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'sandbox',
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'USD',
  `secret` text COLLATE utf8mb4_unicode_ci,
  `key` text COLLATE utf8mb4_unicode_ci,
  `webhook_id` text COLLATE utf8mb4_unicode_ci,
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `has_invoice` tinyint(1) NOT NULL DEFAULT '1',
  `has_itr_invoice` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_gateways`
--

INSERT INTO `payment_gateways` (`id`, `name`, `is_active`, `mode`, `currency`, `secret`, `key`, `webhook_id`, `discount`, `has_invoice`, `has_itr_invoice`, `created_at`, `updated_at`) VALUES
(1, 'razorpay', 1, 'sandbox', 'USD', 'X6aL56uN3Cc9340mTH6zn4aF', 'rzp_test_S0YYS5pqdKlhG9', NULL, 0.00, 1, 1, '2026-01-29 12:19:47', '2026-01-29 14:20:28'),
(2, 'paypal', 1, 'sandbox', 'USD', 'EBu9fCX5rZikDhO_7F3Zz-W95A1umPj0cMYQ9ZzRJwWaxNq-ymS3U4VLpSPvGgq5q08m-y_0TvIVFRn1', 'Ae5fRD9UcEOQ9jXCJvOMUJnB3jPiyH8s4uVB_y2-8YJ8acz-4s4vtAEtkuWwfZtjvZY2AIjJvurYSmRk', NULL, 0.00, 1, 1, '2026-01-29 14:10:49', '2026-01-29 14:20:29'),
(3, 'wiretransfer/ach', 1, 'production', 'USD', NULL, NULL, NULL, 0.00, 1, 1, '2026-01-29 14:11:15', '2026-01-29 14:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'view_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(2, 'view_any_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(3, 'create_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(4, 'update_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(5, 'restore_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(6, 'restore_any_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(7, 'replicate_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(8, 'reorder_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(9, 'delete_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(10, 'delete_any_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(11, 'force_delete_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(12, 'force_delete_any_role', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(13, 'view_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(14, 'view_any_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(15, 'create_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(16, 'update_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(17, 'restore_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(18, 'restore_any_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(19, 'replicate_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(20, 'reorder_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(21, 'delete_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(22, 'delete_any_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(23, 'force_delete_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(24, 'force_delete_any_admin::fee', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(25, 'view_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(26, 'view_any_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(27, 'create_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(28, 'update_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(29, 'restore_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(30, 'restore_any_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(31, 'replicate_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(32, 'reorder_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(33, 'delete_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(34, 'delete_any_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(35, 'force_delete_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(36, 'force_delete_any_award', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(37, 'view_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(38, 'view_any_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(39, 'create_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(40, 'update_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(41, 'restore_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(42, 'restore_any_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(43, 'replicate_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(44, 'reorder_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(45, 'delete_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(46, 'delete_any_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(47, 'force_delete_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(48, 'force_delete_any_badge', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(49, 'view_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(50, 'view_any_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(51, 'create_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(52, 'update_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(53, 'restore_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(54, 'restore_any_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(55, 'replicate_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(56, 'reorder_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(57, 'delete_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(58, 'delete_any_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(59, 'force_delete_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(60, 'force_delete_any_category', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(61, 'view_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(62, 'view_any_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(63, 'create_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(64, 'update_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(65, 'restore_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(66, 'restore_any_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(67, 'replicate_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(68, 'reorder_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(69, 'delete_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(70, 'delete_any_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(71, 'force_delete_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(72, 'force_delete_any_discount', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(73, 'view_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(74, 'view_any_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(75, 'create_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(76, 'update_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(77, 'restore_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(78, 'restore_any_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(79, 'replicate_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(80, 'reorder_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(81, 'delete_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(82, 'delete_any_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(83, 'force_delete_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(84, 'force_delete_any_faq', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(85, 'view_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(86, 'view_any_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(87, 'create_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(88, 'update_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(89, 'restore_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(90, 'restore_any_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(91, 'replicate_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(92, 'reorder_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(93, 'delete_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(94, 'delete_any_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(95, 'force_delete_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(96, 'force_delete_any_media::publisher', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(97, 'view_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(98, 'view_any_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(99, 'create_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(100, 'update_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(101, 'restore_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(102, 'restore_any_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(103, 'replicate_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(104, 'reorder_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(105, 'delete_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(106, 'delete_any_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(107, 'force_delete_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(108, 'force_delete_any_nomination', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(109, 'view_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(110, 'view_any_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(111, 'create_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(112, 'update_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(113, 'restore_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(114, 'restore_any_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(115, 'replicate_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(116, 'reorder_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(117, 'delete_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(118, 'delete_any_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(119, 'force_delete_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(120, 'force_delete_any_nominee::question', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(121, 'view_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(122, 'view_any_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(123, 'create_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(124, 'update_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(125, 'restore_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(126, 'restore_any_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(127, 'replicate_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(128, 'reorder_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(129, 'delete_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(130, 'delete_any_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(131, 'force_delete_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(132, 'force_delete_any_payment', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(133, 'view_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(134, 'view_any_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(135, 'create_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(136, 'update_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(137, 'restore_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(138, 'restore_any_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(139, 'replicate_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(140, 'reorder_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(141, 'delete_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(142, 'delete_any_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(143, 'force_delete_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(144, 'force_delete_any_payment::gateway', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(145, 'view_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(146, 'view_any_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(147, 'create_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(148, 'update_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(149, 'restore_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(150, 'restore_any_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(151, 'replicate_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(152, 'reorder_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(153, 'delete_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(154, 'delete_any_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(155, 'force_delete_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(156, 'force_delete_any_permission', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(157, 'view_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(158, 'view_any_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(159, 'create_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(160, 'update_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(161, 'restore_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(162, 'restore_any_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(163, 'replicate_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(164, 'reorder_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(165, 'delete_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(166, 'delete_any_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(167, 'force_delete_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(168, 'force_delete_any_season', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(169, 'view_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(170, 'view_any_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(171, 'create_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(172, 'update_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(173, 'restore_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(174, 'restore_any_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(175, 'replicate_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(176, 'reorder_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(177, 'delete_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(178, 'delete_any_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(179, 'force_delete_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(180, 'force_delete_any_user', 'web', '2026-01-28 03:47:30', '2026-01-28 03:47:30'),
(181, 'view_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(182, 'view_any_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(183, 'create_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(184, 'update_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(185, 'restore_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(186, 'restore_any_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(187, 'replicate_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(188, 'reorder_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(189, 'delete_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(190, 'delete_any_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(191, 'force_delete_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(192, 'force_delete_any_blog', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(193, 'view_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(194, 'view_any_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(195, 'create_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(196, 'update_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(197, 'restore_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(198, 'restore_any_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(199, 'replicate_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(200, 'reorder_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(201, 'delete_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(202, 'delete_any_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(203, 'force_delete_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(204, 'force_delete_any_evaluation::criterion', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(205, 'view_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(206, 'view_any_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(207, 'create_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(208, 'update_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(209, 'restore_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(210, 'restore_any_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(211, 'replicate_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(212, 'reorder_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(213, 'delete_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(214, 'delete_any_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(215, 'force_delete_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(216, 'force_delete_any_newsroom', 'web', '2026-01-31 04:34:43', '2026-01-31 04:34:43'),
(217, 'view_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(218, 'view_any_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(219, 'create_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(220, 'update_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(221, 'restore_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(222, 'restore_any_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(223, 'replicate_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(224, 'reorder_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(225, 'delete_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(226, 'delete_any_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(227, 'force_delete_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(228, 'force_delete_any_scroll', 'web', '2026-01-31 04:34:44', '2026-01-31 04:34:44'),
(229, 'view_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(230, 'view_any_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(231, 'create_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(232, 'update_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(233, 'restore_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(234, 'restore_any_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(235, 'replicate_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(236, 'reorder_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(237, 'delete_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(238, 'delete_any_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(239, 'force_delete_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(240, 'force_delete_any_event', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(241, 'view_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(242, 'view_any_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(243, 'create_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(244, 'update_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(245, 'restore_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(246, 'restore_any_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(247, 'replicate_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(248, 'reorder_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(249, 'delete_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(250, 'delete_any_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(251, 'force_delete_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(252, 'force_delete_any_event::booking', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(253, 'view_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(254, 'view_any_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(255, 'create_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(256, 'update_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(257, 'restore_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(258, 'restore_any_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(259, 'replicate_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(260, 'reorder_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(261, 'delete_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(262, 'delete_any_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(263, 'force_delete_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(264, 'force_delete_any_itr::nomination::invoice', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(265, 'view_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(266, 'view_any_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(267, 'create_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(268, 'update_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(269, 'restore_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(270, 'restore_any_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(271, 'replicate_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(272, 'reorder_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(273, 'delete_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(274, 'delete_any_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(275, 'force_delete_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(276, 'force_delete_any_update', 'web', '2026-02-01 13:45:14', '2026-02-01 13:45:14'),
(277, 'widget_StatsOverview', 'web', '2026-02-01 13:45:58', '2026-02-01 13:45:58'),
(278, 'widget_DashboardNominations', 'web', '2026-02-01 13:45:58', '2026-02-01 13:45:58'),
(279, 'view_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(280, 'view_any_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(281, 'create_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(282, 'update_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(283, 'restore_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(284, 'restore_any_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(285, 'replicate_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(286, 'reorder_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(287, 'delete_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(288, 'delete_any_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(289, 'force_delete_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(290, 'force_delete_any_category::judge::question', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(291, 'view_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(292, 'view_any_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(293, 'create_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(294, 'update_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(295, 'restore_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(296, 'restore_any_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(297, 'replicate_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(298, 'reorder_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(299, 'delete_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(300, 'delete_any_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(301, 'force_delete_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(302, 'force_delete_any_collaborator', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(303, 'view_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(304, 'view_any_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(305, 'create_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(306, 'update_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(307, 'restore_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(308, 'restore_any_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(309, 'replicate_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(310, 'reorder_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(311, 'delete_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(312, 'delete_any_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(313, 'force_delete_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31'),
(314, 'force_delete_any_judge::application', 'web', '2026-02-02 20:37:31', '2026-02-02 20:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'super_admin', 'web', '2026-01-28 03:47:13', '2026-01-28 03:47:13'),
(2, 'user', 'web', '2026-01-28 03:49:27', '2026-01-28 03:49:27'),
(3, 'judge', 'web', '2026-01-28 03:49:39', '2026-01-28 03:49:39');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1),
(67, 1),
(68, 1),
(69, 1),
(70, 1),
(71, 1),
(72, 1),
(73, 1),
(74, 1),
(75, 1),
(76, 1),
(77, 1),
(78, 1),
(79, 1),
(80, 1),
(81, 1),
(82, 1),
(83, 1),
(84, 1),
(85, 1),
(86, 1),
(87, 1),
(88, 1),
(89, 1),
(90, 1),
(91, 1),
(92, 1),
(93, 1),
(94, 1),
(95, 1),
(96, 1),
(97, 1),
(98, 1),
(99, 1),
(100, 1),
(101, 1),
(102, 1),
(103, 1),
(104, 1),
(105, 1),
(106, 1),
(107, 1),
(108, 1),
(109, 1),
(110, 1),
(111, 1),
(112, 1),
(113, 1),
(114, 1),
(115, 1),
(116, 1),
(117, 1),
(118, 1),
(119, 1),
(120, 1),
(121, 1),
(122, 1),
(123, 1),
(124, 1),
(125, 1),
(126, 1),
(127, 1),
(128, 1),
(129, 1),
(130, 1),
(131, 1),
(132, 1),
(133, 1),
(134, 1),
(135, 1),
(136, 1),
(137, 1),
(138, 1),
(139, 1),
(140, 1),
(141, 1),
(142, 1),
(143, 1),
(144, 1),
(145, 1),
(146, 1),
(147, 1),
(148, 1),
(149, 1),
(150, 1),
(151, 1),
(152, 1),
(153, 1),
(154, 1),
(155, 1),
(156, 1),
(157, 1),
(158, 1),
(159, 1),
(160, 1),
(161, 1),
(162, 1),
(163, 1),
(164, 1),
(165, 1),
(166, 1),
(167, 1),
(168, 1),
(169, 1),
(170, 1),
(171, 1),
(172, 1),
(173, 1),
(174, 1),
(175, 1),
(176, 1),
(177, 1),
(178, 1),
(179, 1),
(180, 1),
(181, 1),
(182, 1),
(183, 1),
(184, 1),
(185, 1),
(186, 1),
(187, 1),
(188, 1),
(189, 1),
(190, 1),
(191, 1),
(192, 1),
(193, 1),
(194, 1),
(195, 1),
(196, 1),
(197, 1),
(198, 1),
(199, 1),
(200, 1),
(201, 1),
(202, 1),
(203, 1),
(204, 1),
(205, 1),
(206, 1),
(207, 1),
(208, 1),
(209, 1),
(210, 1),
(211, 1),
(212, 1),
(213, 1),
(214, 1),
(215, 1),
(216, 1),
(217, 1),
(218, 1),
(219, 1),
(220, 1),
(221, 1),
(222, 1),
(223, 1),
(224, 1),
(225, 1),
(226, 1),
(227, 1),
(228, 1),
(229, 1),
(230, 1),
(231, 1),
(232, 1),
(233, 1),
(234, 1),
(235, 1),
(236, 1),
(237, 1),
(238, 1),
(239, 1),
(240, 1),
(241, 1),
(242, 1),
(243, 1),
(244, 1),
(245, 1),
(246, 1),
(247, 1),
(248, 1),
(249, 1),
(250, 1),
(251, 1),
(252, 1),
(253, 1),
(254, 1),
(255, 1),
(256, 1),
(257, 1),
(258, 1),
(259, 1),
(260, 1),
(261, 1),
(262, 1),
(263, 1),
(264, 1),
(265, 1),
(266, 1),
(267, 1),
(268, 1),
(269, 1),
(270, 1),
(271, 1),
(272, 1),
(273, 1),
(274, 1),
(275, 1),
(276, 1),
(277, 1),
(278, 1),
(279, 1),
(280, 1),
(281, 1),
(282, 1),
(283, 1),
(284, 1),
(285, 1),
(286, 1),
(287, 1),
(288, 1),
(289, 1),
(290, 1),
(291, 1),
(292, 1),
(293, 1),
(294, 1),
(295, 1),
(296, 1),
(297, 1),
(298, 1),
(299, 1),
(300, 1),
(301, 1),
(302, 1),
(303, 1),
(304, 1),
(305, 1),
(306, 1),
(307, 1),
(308, 1),
(309, 1),
(310, 1),
(311, 1),
(312, 1),
(313, 1),
(314, 1);

-- --------------------------------------------------------

--
-- Table structure for table `scrolls`
--

CREATE TABLE `scrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seasons`
--

CREATE TABLE `seasons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_date` date NOT NULL,
  `closing_date` date NOT NULL,
  `application_deadline_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `application_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `itr_invoice_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seasons`
--

INSERT INTO `seasons` (`id`, `name`, `opening_date`, `closing_date`, `application_deadline_date`, `is_active`, `application_id`, `invoice_no`, `itr_invoice_no`, `created_at`, `updated_at`) VALUES
(1, 'Season 1', '2026-01-29', '2026-02-07', '2026-02-06', 1, NULL, NULL, NULL, '2026-01-29 12:10:53', '2026-01-29 12:11:53');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('43njNZNvtwdJZpS8T9aqXBbKdKSouFQXOZAQbMAg', NULL, '64.227.32.66', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSUFOWWRoM005U1hobEI4UlZpdEFQa1NFRUdNR0tFdTJuNUJubnlBUSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjM6Imh0dHA6Ly9jbG9uZS5hdXJldW1hd2FyZHMuY29tLz9yZXN0X3JvdXRlPSUyRndwJTJGdjIlMkZ1c2VycyUyRiI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770227304),
('5ezmxGZ6KB4xVFNYzEjAMSryLdCNnCnHFmhG6Pi1', NULL, '185.177.72.13', 'curl/8.7.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiVlpTekJXVWpncDhSSlluNVNudVVwQ1ozUmVNY2x2WDk0ZXdNTWZQSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly93d3cuY2xvbmUuYXVyZXVtYXdhcmRzLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770234390),
('5nnQfjruD7ZWptRZ9ZSYt2tAS88BmhxULauz6kVH', NULL, '84.32.65.179', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieEpDU2JwRDM2SHZtakZpSW94RzhVZG9oYjJwSUVGdURnaVZhOXhDNSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9ob3ctdG8tbm9taW5hdGUiO3M6NToicm91dGUiO3M6MTU6Imhvdy10by1ub21pbmF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770252015),
('60LUnh37Iy4WMCo6qNIVScSD2LiXn3LMpSk9sRMF', NULL, '159.223.219.107', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/142.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibGp6UjdEMnpPNHIwcjFkVWFGdjB3WGRtMDJKeUNEa2M4WHgxQ2JQTiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly93d3cuY2xvbmUuYXVyZXVtYXdhcmRzLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770209386),
('c85lVqipQWUkMVJiVroNyRbBhUBz6b4SnIjLrQSN', NULL, '142.147.187.212', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiOUJyd2NoUWhaQ2JJSTdLVldaMFNvUWxEcGFIaFFPTHlMZGNEbk9OTSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzk6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9hYm91dC11cyI7czo1OiJyb3V0ZSI7czo4OiJhYm91dC11cyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770262593),
('EKJOQFKSnUlwB03THhiB1vJhXur2EZ7BGCZI5n5S', NULL, '146.190.63.248', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoielU2Z1J1QjQ5Zzk5c2hHOEJPM00wdGgwd3lnNkoxRklJV0NiVTBnaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmNsb25lLmF1cmV1bWF3YXJkcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770227261),
('fCgSdMQ5wsqvR49yt6buOVe6vbsrTD2l4wuo7WpC', NULL, '64.23.175.252', 'Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRGZaSzZzdnNld0tXMnMwblhHNlRtMWw2dHlwUkVrdEhnZmx4WFc2QiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9jbG9uZS5hdXJldW1hd2FyZHMuY29tIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1770251898),
('FjOP1gTtXdR2IJFbySwMNe8GCFxYkjklS5FJnPcI', NULL, '146.190.63.248', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiSHNtcFdnZXBGR2J2azdENlZCMzVJb1dwMWVIbG5OenJwVzJZSm0wdiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njg6Imh0dHBzOi8vd3d3LmNsb25lLmF1cmV1bWF3YXJkcy5jb20vP3Jlc3Rfcm91dGU9JTJGd3AlMkZ2MiUyRnVzZXJzJTJGIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1770227293),
('Gj8pMzlK3Jg8NlOZ7I35KE1gFp50HyrOJ82hnjB2', NULL, '106.200.24.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNHpXaXZOcEFHcnJIZWNNbVh6bHNvRVRoeURuaG5ic293WklFTHBJQSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9qdWRnZS9sb2dpbiI7czo1OiJyb3V0ZSI7czoyNToiZmlsYW1lbnQuanVkZ2UuYXV0aC5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770230012),
('hC49HtvevTWj1aui6SvvP1rtaXlFV7IW38N3MKOS', NULL, '164.90.208.56', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoicFRqelZ2elZxVFNzNERaZmpPT0hXZmhSNGIxNmw0REhVUnhxbzJXVCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NjQ6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS8/cmVzdF9yb3V0ZT0lMkZ3cCUyRnYyJTJGdXNlcnMlMkYiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770227296),
('hDAgAMEDC1qzDWqgW70mjwZq9EJld2IF4gPs1H1E', NULL, '45.41.133.109', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiRTdraU8xaTZKM25SWmlSSzJRemR0eThnMWptWkdhWTdPWW9wNmhNYSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS93aHktZW50ZXIiO3M6NToicm91dGUiO3M6OToid2h5LWVudGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770249218),
('JdnVT5Ya0ofgtLg0NS3XPuYUAJmB5E4YBCDPsjXA', NULL, '164.90.208.56', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiMXRtc3dadFZPQW9wUVdOWXNpa0lWeWZVNGgzN2F0UWZqUENOVG1tNyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770227261),
('jqe7sPIciJiZylhWl7rQ6ZfMwgkRJNV8HuWr53am', NULL, '3.18.186.238', 'air.ai/scanning Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) Chrome/126.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZDl4S0Q3bk03RmZsV2pCSUM3Q0szTUlXdFlxUW5GTkJoYzk0ajZBOSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9jbG9uZS5hdXJldW1hd2FyZHMuY29tIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1770226992),
('K6g5B1oWZBr6miV5lIUy7dVQ0UTrBeiWFjEIz32N', NULL, '185.177.72.13', 'curl/8.7.1', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiYzNLNEQwM0wzbG9TSmtIVmhBTVBMQ2dyUkkwelR3VjViTGZjR29yaCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly93d3cuY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9ibG9nIjtzOjU6InJvdXRlIjtzOjQ6ImJsb2ciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1770234451),
('l0Ozkd467UaIE95MgMQ0vkRRl9jpm68I9QAqIcXa', NULL, '106.200.24.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoic0Izamx5QU0zSE5ybWZ5eEJnWTloNEg3SGxqMTMwd3liclpLakR3SiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDI6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9qdWRnZS9sb2dpbiI7czo1OiJyb3V0ZSI7czoyNToiZmlsYW1lbnQuanVkZ2UuYXV0aC5sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770239561),
('NIthe3xZbg7Yaaj2EHneh88hyXS6bYQ3xZHbvhqW', NULL, '106.200.24.14', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoieE5IZ3VGYzBDOFFpU3kyVXpJQUxOQXgwZnFnRXdSTFl0bjdpRHZhViI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJuZXciO2E6MDp7fXM6Mzoib2xkIjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDE6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9jYXRlZ29yaWVzIjtzOjU6InJvdXRlIjtzOjEwOiJjYXRlZ29yaWVzIjt9fQ==', 1770239568),
('QcS2PETnHq7oNBnOOfGAvmIi9Mia3Cvdd0v1R9gb', NULL, '174.242.66.16', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEtWOXM5R1dTUG0wa0dQQjhEQWhJU094UjRjWWpkRHBYNEJjUUhCSSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9ob3ctdG8tbm9taW5hdGUiO3M6NToicm91dGUiO3M6MTU6Imhvdy10by1ub21pbmF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770196546),
('qiIXQxxK0MddEyMoitFPr7bsUQjHXcxVbuUg7cSv', NULL, '14.96.142.251', 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZWJUOHFKV0pPaTVQWmk5c0dBTkN2QUk2MjhOdkFMNVBGc2hRT21aaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS93aHktZW50ZXIiO3M6NToicm91dGUiO3M6OToid2h5LWVudGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770201135),
('TiEyA0HQRQxDdIYq2PNxAjel0AlZYnspRNFRHBAR', NULL, '167.160.63.52', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR0pnMWxldzVOVE95MWp3RGlCQ3RNNENtOG9lY2FmSDRoRzNlSk5QZSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDY6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS9ob3ctdG8tbm9taW5hdGUiO3M6NToicm91dGUiO3M6MTU6Imhvdy10by1ub21pbmF0ZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770196548),
('U6m3ziaro17FNpZgy1Q0UVA1R9XQIzZeDSkAsk5L', NULL, '64.227.32.66', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWE5qNWYwc1RNU1Jubkw2elM1bGcwU282UFVkVTlQcW1xRlhjRjY1aCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9jbG9uZS5hdXJldW1hd2FyZHMuY29tIjtzOjU6InJvdXRlIjtzOjQ6ImhvbWUiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1770227270),
('VHlpYsrJLkSClbo01ufwONJTis1gGkJRIXdBhofT', NULL, '122.177.246.230', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/144.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiQ2oyd1A1UDFTbVZYSE16TUpBWm9wb1Y5TDhkb1JvVnhNblQ3T1pjaSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770262421),
('wZ9JqsqAWPIvJVvrSGLtcxlp9FKwJf4LKAAJkYof', NULL, '104.13.214.221', 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/605.1.15 (KHTML, like Gecko) Version/18.0 Safari/605.1.15', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoibjNvTkJpRUlCQmNiSlNRdDF1QVVHWjR0NlcxeTJjRjA2ZjZHTkhtNCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6NDA6Imh0dHBzOi8vY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS93aHktZW50ZXIiO3M6NToicm91dGUiO3M6OToid2h5LWVudGVyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770249216),
('xCM30P7RezlVQd2R6HQnoseH0hVjHX7xNN80Tanp', NULL, '142.93.0.66', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiN2xYSEJhUHo3d2VNVmtKM1BZZnZOUGd2dDJrTDl2NE1oREt6R2djWiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Njc6Imh0dHA6Ly93d3cuY2xvbmUuYXVyZXVtYXdhcmRzLmNvbS8/cmVzdF9yb3V0ZT0lMkZ3cCUyRnYyJTJGdXNlcnMlMkYiO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770227303),
('Zb9AR0D2muGxUjb0aG4Z4nXCkjRX8DZu6VbHbi82', NULL, '159.223.219.107', 'Mozilla/5.0 (X11; Linux x86_64; rv:142.0) Gecko/20100101 Firefox/142.0', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiT0dEUEVyRDB1dXFBOUIyTTRXTlZXWFppMVFaWlNWQ1VRUEFWZ0tuUCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzQ6Imh0dHBzOi8vd3d3LmNsb25lLmF1cmV1bWF3YXJkcy5jb20iO3M6NToicm91dGUiO3M6NDoiaG9tZSI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1770209387),
('ZmXQsH69OO0ca1C6n80fl7Ib1MkDTFgciSH6SKJU', NULL, '142.93.0.66', 'Mozilla/5.0 (l9scan/2.0.332323e20383e2135323e2236313; +https://leakix.net)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiWmg3bjFKajB1dmFjQUduRHBobkVvYnZBZjZkVGptSnMxQVlKenRhMyI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly93d3cuY2xvbmUuYXVyZXVtYXdhcmRzLmNvbSI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1770227269);

-- --------------------------------------------------------

--
-- Table structure for table `updates`
--

CREATE TABLE `updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `original_password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `original_password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$FnVPj2xUXUlsHAmVMiTmVuFzwL5IDmO5/iGeHulqiUeGXWqZ9qT.6', NULL, NULL, '2026-01-28 03:48:55', '2026-01-28 03:48:55'),
(2, 'User', 'user@gmail.com', NULL, '$2y$12$DstLTlC3e3zhsD.edpLRb.h.6TujS67vPijXEK.UOjIhilQ7YrVFy', '123456789', NULL, '2026-01-29 05:02:30', '2026-01-29 05:02:30'),
(3, 'Sasi Kiran', 'penubakusasikiran@gmail.com', NULL, '$2y$12$DstLTlC3e3zhsD.edpLRb.h.6TujS67vPijXEK.UOjIhilQ7YrVFy', '123456789', NULL, '2026-01-29 12:08:45', '2026-01-29 12:08:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_fees`
--
ALTER TABLE `admin_fees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awards`
--
ALTER TABLE `awards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `awards_code_unique` (`code`),
  ADD KEY `awards_category_id_foreign` (`category_id`);

--
-- Indexes for table `badges`
--
ALTER TABLE `badges`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_judge_questions`
--
ALTER TABLE `category_judge_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_judge_questions_category_id_foreign` (`category_id`);

--
-- Indexes for table `collaborators`
--
ALTER TABLE `collaborators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `discounts_code_unique` (`code`),
  ADD KEY `discounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `dummy_judges`
--
ALTER TABLE `dummy_judges`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dummy_judges_category_id_foreign` (`category_id`);

--
-- Indexes for table `dummy_winners`
--
ALTER TABLE `dummy_winners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dummy_winners_category_id_foreign` (`category_id`),
  ADD KEY `dummy_winners_award_id_foreign` (`award_id`),
  ADD KEY `dummy_winners_badge_id_foreign` (`badge_id`);

--
-- Indexes for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `event_bookings_booking_id_unique` (`booking_id`),
  ADD UNIQUE KEY `event_bookings_ticket_number_unique` (`ticket_number`),
  ADD KEY `event_bookings_user_id_foreign` (`user_id`),
  ADD KEY `event_bookings_event_id_foreign` (`event_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `judge_applications`
--
ALTER TABLE `judge_applications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_applications_category_id_foreign` (`category_id`);

--
-- Indexes for table `judge_application_answers`
--
ALTER TABLE `judge_application_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `judge_application_answers_judge_application_id_foreign` (`judge_application_id`),
  ADD KEY `judge_application_answers_category_judge_question_id_foreign` (`category_judge_question_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `newsrooms`
--
ALTER TABLE `newsrooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nominations`
--
ALTER TABLE `nominations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nominations_application_id_unique` (`application_id`),
  ADD KEY `nominations_user_id_foreign` (`user_id`),
  ADD KEY `nominations_season_id_foreign` (`season_id`),
  ADD KEY `nominations_category_id_foreign` (`category_id`),
  ADD KEY `nominations_award_id_foreign` (`award_id`),
  ADD KEY `nominations_payment_gateway_id_foreign` (`payment_gateway_id`),
  ADD KEY `nominations_discount_id_foreign` (`discount_id`),
  ADD KEY `nominations_judge_id_foreign` (`judge_id`);

--
-- Indexes for table `nomination_answers`
--
ALTER TABLE `nomination_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomination_answers_nomination_id_foreign` (`nomination_id`),
  ADD KEY `nomination_answers_nominee_question_id_foreign` (`nominee_question_id`);

--
-- Indexes for table `nomination_evaluations`
--
ALTER TABLE `nomination_evaluations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomination_evaluations_nomination_id_foreign` (`nomination_id`),
  ADD KEY `nomination_evaluations_user_id_foreign` (`user_id`);

--
-- Indexes for table `nomination_evidence`
--
ALTER TABLE `nomination_evidence`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nomination_evidence_nomination_id_foreign` (`nomination_id`);

--
-- Indexes for table `nominee_questions`
--
ALTER TABLE `nominee_questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nominee_questions_category_id_foreign` (`category_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_transaction_id_unique` (`transaction_id`),
  ADD KEY `payments_payment_gateway_id_foreign` (`payment_gateway_id`),
  ADD KEY `payments_nomination_id_foreign` (`nomination_id`);

--
-- Indexes for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `scrolls`
--
ALTER TABLE `scrolls`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `updates`
--
ALTER TABLE `updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_fees`
--
ALTER TABLE `admin_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awards`
--
ALTER TABLE `awards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `badges`
--
ALTER TABLE `badges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank_accounts`
--
ALTER TABLE `bank_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category_judge_questions`
--
ALTER TABLE `category_judge_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collaborators`
--
ALTER TABLE `collaborators`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dummy_judges`
--
ALTER TABLE `dummy_judges`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dummy_winners`
--
ALTER TABLE `dummy_winners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evaluation_criteria`
--
ALTER TABLE `evaluation_criteria`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event_bookings`
--
ALTER TABLE `event_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judge_applications`
--
ALTER TABLE `judge_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `judge_application_answers`
--
ALTER TABLE `judge_application_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `newsrooms`
--
ALTER TABLE `newsrooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nominations`
--
ALTER TABLE `nominations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nomination_answers`
--
ALTER TABLE `nomination_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nomination_evaluations`
--
ALTER TABLE `nomination_evaluations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nomination_evidence`
--
ALTER TABLE `nomination_evidence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nominee_questions`
--
ALTER TABLE `nominee_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `payment_gateways`
--
ALTER TABLE `payment_gateways`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=315;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `scrolls`
--
ALTER TABLE `scrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seasons`
--
ALTER TABLE `seasons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `updates`
--
ALTER TABLE `updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `awards`
--
ALTER TABLE `awards`
  ADD CONSTRAINT `awards_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `category_judge_questions`
--
ALTER TABLE `category_judge_questions`
  ADD CONSTRAINT `category_judge_questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `discounts`
--
ALTER TABLE `discounts`
  ADD CONSTRAINT `discounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dummy_judges`
--
ALTER TABLE `dummy_judges`
  ADD CONSTRAINT `dummy_judges_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dummy_winners`
--
ALTER TABLE `dummy_winners`
  ADD CONSTRAINT `dummy_winners_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dummy_winners_badge_id_foreign` FOREIGN KEY (`badge_id`) REFERENCES `badges` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `dummy_winners_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `event_bookings`
--
ALTER TABLE `event_bookings`
  ADD CONSTRAINT `event_bookings_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `event_bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `judge_applications`
--
ALTER TABLE `judge_applications`
  ADD CONSTRAINT `judge_applications_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `judge_application_answers`
--
ALTER TABLE `judge_application_answers`
  ADD CONSTRAINT `judge_application_answers_category_judge_question_id_foreign` FOREIGN KEY (`category_judge_question_id`) REFERENCES `category_judge_questions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `judge_application_answers_judge_application_id_foreign` FOREIGN KEY (`judge_application_id`) REFERENCES `judge_applications` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nominations`
--
ALTER TABLE `nominations`
  ADD CONSTRAINT `nominations_award_id_foreign` FOREIGN KEY (`award_id`) REFERENCES `awards` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nominations_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nominations_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discounts` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `nominations_judge_id_foreign` FOREIGN KEY (`judge_id`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `nominations_payment_gateway_id_foreign` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateways` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `nominations_season_id_foreign` FOREIGN KEY (`season_id`) REFERENCES `seasons` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nominations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `nomination_answers`
--
ALTER TABLE `nomination_answers`
  ADD CONSTRAINT `nomination_answers_nomination_id_foreign` FOREIGN KEY (`nomination_id`) REFERENCES `nominations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nomination_answers_nominee_question_id_foreign` FOREIGN KEY (`nominee_question_id`) REFERENCES `nominee_questions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nomination_evaluations`
--
ALTER TABLE `nomination_evaluations`
  ADD CONSTRAINT `nomination_evaluations_nomination_id_foreign` FOREIGN KEY (`nomination_id`) REFERENCES `nominations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nomination_evaluations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nomination_evidence`
--
ALTER TABLE `nomination_evidence`
  ADD CONSTRAINT `nomination_evidence_nomination_id_foreign` FOREIGN KEY (`nomination_id`) REFERENCES `nominations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nominee_questions`
--
ALTER TABLE `nominee_questions`
  ADD CONSTRAINT `nominee_questions_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_nomination_id_foreign` FOREIGN KEY (`nomination_id`) REFERENCES `nominations` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payments_payment_gateway_id_foreign` FOREIGN KEY (`payment_gateway_id`) REFERENCES `payment_gateways` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
