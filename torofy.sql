/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `customers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `township_id` INT NULL,
  `district_id` INT NULL,
  `state_id` INT NULL,
  `profile` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `status` tinyint DEFAULT NULL,
  `is_active` tinyint DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `orders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_number` varchar(20) NOT NULL,
  `order_detail` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `delivery_fee` decimal(10,0) NOT NULL,
  `amount` INT NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shop_id` int NOT NULL,
  `payment` int NOT NULL,
  `customer_id` int NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(`customer_id`) REFERENCES `customers` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `shop_sliders` (
  `id` int NOT NULL AUTO_INCREMENT,
  `image` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shop_id` int NOT NULL,
  `owner_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `shop_sliders_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    shop_id INT NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (shop_id) REFERENCES shops(id)
);

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `shop_id` int NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int DEFAULT NULL,
  `is_stock` boolean DEFAULT 0,
  `category_id` int NOT NULL,
  `expiry_date` date DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  FOREIGN KEY(`category_id`) REFERENCES `categories` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `discounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `discount_type` varchar(255) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `product_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `discounts_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text,
  `profile` varchar(255) DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE `shops` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `owner_id` int NOT NULL,
  `standard` longtext,
  `public` longtext,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE states (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE districts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    state_id INT,
    FOREIGN KEY (state_id) REFERENCES states(id) ON DELETE CASCADE
);

CREATE TABLE townships (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    district_id INT,
    FOREIGN KEY (district_id) REFERENCES districts(id) ON DELETE CASCADE
);

CREATE TABLE `shippings`(
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `fee` int NOT NULL,
  `township_id` int NOT NULL,
  `district_id` int NOT NULL,
  `state_id` int NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  FOREIGN KEY(`township_id`) REFERENCES `townships` (`id`),
  FOREIGN KEY(`district_id`) REFERENCES `districts` (`id`),
  FOREIGN KEY(`state_id`) REFERENCES `states` (`id`)
);

CREATE TABLE `customer_messages`(
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `customers_id` int NOT NULL,
  FOREIGN KEY(`customers_id`) REFERENCES `customers` (`id`)
);

INSERT INTO `customers` (`id`, `name`, `email`, `password`, `address`, `profile`, `created_at`, `updated_at`, `phone`, `status`) VALUES
(1, 'hanwinmaun', 'ma@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '                                                                                                                                       hfdhfdhfalhfdjhfa;jf                                                                                                                                    ', 'form_images/1680128609', '2023-03-20 07:35:54', '2023-03-29 22:23:29', '09761545726', 1);
INSERT INTO `customers` (`id`, `name`, `email`, `password`, `address`, `profile`, `created_at`, `updated_at`, `phone`, `status`) VALUES
(3, 'hfjoeifahof', 'asdf@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', '                                        gsdfgfdsgfdg                                              ', 'form_images/1680128598', '2023-03-27 21:50:10', '2023-03-29 22:23:18', '09761545726', 0);






INSERT INTO `products` (`id`, `name`, `shop_id`, `description`, `price`, `quantity`, `expiry_date`, `image_one`, `image_two`, `image_three`, `created_at`, `updated_at`) VALUES
(1, 'safd', 2, 'asdf', 3, 4, NULL, 'form_images/1679267517', 'form_images/1679267517', 'form_images/1679267517', '2023-03-19 23:11:57', '2023-03-19 23:11:57');


INSERT INTO `shop_sliders` (`id`, `image`, `created_at`, `updated_at`, `shop_id`) VALUES
(12, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2);
INSERT INTO `shop_sliders` (`id`, `image`, `created_at`, `updated_at`, `shop_id`) VALUES
(13, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2);
INSERT INTO `shop_sliders` (`id`, `image`, `created_at`, `updated_at`, `shop_id`) VALUES
(14, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2);
INSERT INTO `shop_sliders` (`id`, `image`, `created_at`, `updated_at`, `shop_id`) VALUES
(15, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(16, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(17, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(18, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(19, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(20, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(22, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(23, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(24, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(25, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(26, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(27, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(28, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(29, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(30, 'form_images/1680053287Array', '2023-03-29 01:28:07', '2023-03-29 01:28:07', 2),
(31, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(32, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(33, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(35, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(36, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(37, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(38, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(39, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(40, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(41, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(42, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(43, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(44, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(45, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(46, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(47, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(48, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(49, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(50, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3),
(51, 'form_images/1680128532Array', '2023-03-29 22:22:12', '2023-03-29 22:22:12', 3);

INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `partner_id`, `standard`, `public`) VALUES
(2, 'fdfhafkldhfad', '                                                                    ardggr reg arg                      ', '09:33:00', '16:32:00', 'form_images/1679955545', '2023-03-16 03:51:57', '2023-03-27 22:19:05', 3, '                                                                  ', '                                                                ');
INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `partner_id`, `standard`, `public`) VALUES
(3, 'modfai', '                                                                    afg                       ', '23:23:00', '15:24:00', 'form_images/1679955530', '2023-03-17 02:31:01', '2023-03-27 22:18:50', 3, '                                 ', '                                ');


INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `profile`, `is_admin`, `created_at`, `updated_at`, `phone`) VALUES
(1, 'han', 'han@gmail.com', 'bae5e3208a3c700e3db642b6631e95b9', 'addreas', NULL, 1, NULL, NULL, NULL);
INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `profile`, `is_admin`, `created_at`, `updated_at`, `phone`) VALUES
(3, 'hanwinmaung', 'win@gmail.com', '1bbd886460827015e5d605ed44252251', '                           ', 'form_images/1678921000', 0, '2023-03-09 02:45:59', '2023-03-15 22:56:40', '09957054088');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `profile`, `is_admin`, `created_at`, `updated_at`, `phone`) VALUES
(8, 'kyukyu', 'kyu@gmail.com', 'bae5e3208a3c700e3db642b6631e95b9', '                           ', 'form_images/1678758426', 0, '2023-03-14 01:47:06', '2023-03-14 01:47:06', '09795923289');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `address`, `profile`, `is_admin`, `created_at`, `updated_at`, `phone`) VALUES
(9, 'asas', 'ha@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '                           ', 'form_images/1678921047', 0, '2023-03-14 04:52:05', '2023-03-15 22:57:27', '09750570432'),
(11, 'HAB', 'tun@gmail.com', 'bae5e3208a3c700e3db642b6631e95b9', '             kfjjfsdjfdsjfdkfoefafldkfjaljfsdlfjd              ', 'form_images/1679297495Screenshot_(1).png', NULL, '2023-03-20 07:31:35', '2023-03-20 07:31:35', '09761545726');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
