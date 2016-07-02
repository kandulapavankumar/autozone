-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2016 at 09:17 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autozone`
--

-- --------------------------------------------------------

--
-- Table structure for table `listings`
--

CREATE TABLE IF NOT EXISTS `listings` (
  `listing_id` int(11) NOT NULL AUTO_INCREMENT,
  `listing_to_user` int(11) DEFAULT NULL,
  `belongs_to_vehicle_type` int(11) NOT NULL,
  `year` year(4) DEFAULT NULL,
  `make` varchar(255) DEFAULT NULL,
  `model` varchar(255) DEFAULT NULL,
  `description` text,
  `price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`listing_id`),
  KEY `seller_user_id` (`listing_to_user`),
  KEY `belongs_to_vehicle_type` (`belongs_to_vehicle_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `listings`
--

INSERT INTO `listings` (`listing_id`, `listing_to_user`, `belongs_to_vehicle_type`, `year`, `make`, `model`, `description`, `price`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 2015, 'YAMAHA', '2015 YAMAHA XVS1300A V-Star', 'The Speedster Slash-down Motorcycle Exhaust has a full length heat shield and clean lines making Cobra one of the most  stylish and best looking motorcycle exhaust available. The Cobra Speedster Slash-down Motorcycle Exhaust is developed and has been tested to increase the power of your motorcycle and to maintain the overall ride. The Cobra Speedster Slash-Down gives off a great sound and style that you would expect from Cobra.', '640.00', '2016-07-02 18:44:32', '2016-07-02 18:44:32'),
(2, 2, 2, 2015, 'Chevrolet', 'Chevrolet Silverado 1500', 'Great MPG: 23 MPG Hwy! Just lowered by $851** OPTIONAL EQUIPMENT INCLUDES: Engine: 5.3L EcoTec3 V8 w/Flex Fuel - Includes Auxiliary External Transmission Oil Cooler, 720 CCA/80 Amp-hr Maintenance Free HD Battery', '26156.00', '2016-07-02 18:51:20', '2016-07-02 18:51:20'),
(3, 2, 3, 2015, 'NISSAN', 'Versa Note SV Hatchback 4D', 'Includes Manual Recline Height Adjustment and Fore/Aft Movement, Manual Adjustable Front Head Restraints and Fixed Rear Head Restraints', '11299.00', '2016-07-02 18:57:34', '2016-07-02 18:57:34'),
(4, 2, 4, 2014, 'Forest River', 'Wildwood', 'Used 6 times. I have since purchased a home in the area, so this must go. It has tinted sliding glass doors to keep the heat out, and provide privacy. I have also extended the back, to accommodate a diamond plate tool box for outside storage.', '32000.00', '2016-07-02 19:01:15', '2016-07-02 19:01:15');

-- --------------------------------------------------------

--
-- Table structure for table `listing_metadata`
--

CREATE TABLE IF NOT EXISTS `listing_metadata` (
  `listing_metadata_id` int(11) NOT NULL AUTO_INCREMENT,
  `belongs_to_listing` int(11) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `transmission` varchar(100) DEFAULT NULL,
  `body_type` varchar(100) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`listing_metadata_id`),
  KEY `meta_listing_idx` (`belongs_to_listing`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `listing_metadata`
--

INSERT INTO `listing_metadata` (`listing_metadata_id`, `belongs_to_listing`, `color`, `transmission`, `body_type`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, 'black', 'automatic', 'Triple chromed, 2-1/2" full-length heat shields', 'Features Cobra PowerPort, and engineering advancement that provides a performance increase similar to the 2-into-1 systems', '2016-07-02 18:49:34', '2016-07-02 18:49:34'),
(2, 2, 'Summit White', '6-Speed Automatic', 'V8', '7-pin and 4-pin connectors, 720 CCA/80 Amp-hr Maintenance Free HD Battery', '2016-07-02 18:52:18', '2016-07-02 18:52:18'),
(3, 3, 'red', 'Variable', '4-Cyl 1.6 Liter', '2 Seatback Storage Pockets', '2016-07-02 18:58:25', '2016-07-02 18:58:25'),
(4, 4, 'white', 'Automatic', 'Park Model', 'The front bedroom offers a queen bed with nightstands on either side of the bed, a front wall wardrobe with shelves, and a dresser. There is also a private entrance from the bedroom to outside. Rear Entertainment; Front Bedroom', '2016-07-02 19:02:27', '2016-07-02 19:02:27');

-- --------------------------------------------------------

--
-- Table structure for table `listing_photos`
--

CREATE TABLE IF NOT EXISTS `listing_photos` (
  `listing_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `belongs_to_listing` int(11) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`listing_photo_id`),
  KEY `belongs_to_listing` (`belongs_to_listing`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `listing_photos`
--

INSERT INTO `listing_photos` (`listing_photo_id`, `belongs_to_listing`, `url`, `created_at`, `updated_at`) VALUES
(1, 1, 'bike1.png', '2016-06-30 08:49:39', '2016-07-02 18:48:25'),
(2, 1, 'bike2.png', '2016-06-30 08:49:39', '2016-07-02 18:48:32'),
(3, 2, 'truck1.jpg', '2016-06-30 08:52:40', '2016-07-02 18:55:24'),
(4, 2, 'truck2.png', '2016-06-30 08:52:40', '2016-07-02 18:55:31'),
(5, 3, 'car1.jpg', '2016-07-02 18:59:11', '2016-07-02 18:59:11'),
(6, 3, 'car2.jpg', '2016-07-02 18:59:11', '2016-07-02 18:59:11'),
(7, 4, 'rv1.jpg', '2016-07-02 19:03:56', '2016-07-02 19:03:56'),
(8, 4, 'rv2.jpg', '2016-07-02 19:03:56', '2016-07-02 19:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `seller_reviews`
--

CREATE TABLE IF NOT EXISTS `seller_reviews` (
  `seller_review_id` int(11) NOT NULL AUTO_INCREMENT,
  `belongs_to_user` int(11) NOT NULL,
  `commented_by_user` int(11) NOT NULL,
  `rating` decimal(2,1) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`seller_review_id`),
  KEY `belongs_to_user` (`belongs_to_user`),
  KEY `commented_by_user` (`commented_by_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `seller_reviews`
--

INSERT INTO `seller_reviews` (`seller_review_id`, `belongs_to_user`, `commented_by_user`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '4.5', 'Good', '2016-06-30 10:41:23', '2016-06-30 10:56:00'),
(2, 2, 1, '5.0', 'Excellent', '2016-06-30 10:41:23', '2016-06-30 10:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(128) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `first_name` varchar(45) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `display_name` varchar(45) NOT NULL,
  `role` enum('Buyer','Seller') DEFAULT 'Buyer',
  `seller_type` enum('None','Dealer','Broker','Private Party') CHARACTER SET armscii8 NOT NULL DEFAULT 'None',
  `address1` varchar(100) DEFAULT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip` int(11) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `website` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='users - adminto store all the users detailsUser to brand relationship is maintained in user_roles table' AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `username`, `first_name`, `last_name`, `display_name`, `role`, `seller_type`, `address1`, `address2`, `city`, `state`, `country`, `zip`, `phone`, `website`, `created_at`, `updated_at`) VALUES
(1, 'buyer@test.com', '$2y$10$GaNdilo7AQOJhFfx5mUw1.j3EuzC.6r.TgmFyAijTHiU6QE.G3UOu', 'buyer', 'Buyer', 'Buyer', '', 'Buyer', 'None', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2016-06-29 04:00:00', '2016-06-29 04:00:00'),
(2, 'seller@test.com', '$2y$10$GaNdilo7AQOJhFfx5mUw1.j3EuzC.6r.TgmFyAijTHiU6QE.G3UOu', 'seller', 'seller', 'seller', '', 'Seller', 'Dealer', NULL, NULL, NULL, NULL, NULL, NULL, '', '', '2016-06-29 04:00:00', '2016-06-30 08:58:49');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_types`
--

CREATE TABLE IF NOT EXISTS `vehicle_types` (
  `vehicle_id` int(11) NOT NULL AUTO_INCREMENT,
  `vehicle_name` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`vehicle_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `vehicle_types`
--

INSERT INTO `vehicle_types` (`vehicle_id`, `vehicle_name`, `created_at`, `updated_at`) VALUES
(1, 'Motorcycle', '2016-06-30 07:22:18', '2016-06-30 07:22:18'),
(2, 'Truck', '2016-06-30 07:22:49', '2016-06-30 07:22:49'),
(3, 'Car', '2016-06-30 07:22:49', '2016-06-30 07:22:49'),
(4, 'RV', '2016-06-30 07:22:59', '2016-06-30 07:22:59');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `listings`
--
ALTER TABLE `listings`
  ADD CONSTRAINT `listings_ibfk_1` FOREIGN KEY (`listing_to_user`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `listings_ibfk_2` FOREIGN KEY (`belongs_to_vehicle_type`) REFERENCES `vehicle_types` (`vehicle_id`);

--
-- Constraints for table `listing_metadata`
--
ALTER TABLE `listing_metadata`
  ADD CONSTRAINT `listing_metadata_ibfk_1` FOREIGN KEY (`belongs_to_listing`) REFERENCES `listings` (`listing_id`);

--
-- Constraints for table `listing_photos`
--
ALTER TABLE `listing_photos`
  ADD CONSTRAINT `listing_photos_ibfk_1` FOREIGN KEY (`belongs_to_listing`) REFERENCES `listings` (`listing_id`);

--
-- Constraints for table `seller_reviews`
--
ALTER TABLE `seller_reviews`
  ADD CONSTRAINT `seller_reviews_ibfk_1` FOREIGN KEY (`belongs_to_user`) REFERENCES `users` (`user_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
