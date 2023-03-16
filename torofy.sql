/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `shop_id` int NOT NULL,
  `expiry_date` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shop_id` (`shop_id`),
  CONSTRAINT `products_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `shops` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `open_time` time DEFAULT NULL,
  `close_time` time DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `owner_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `owner_id` (`owner_id`),
  CONSTRAINT `shops_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'NULL',
  `profile` varchar(255) DEFAULT 'NULL',
  `address` text,
  `is_admin` tinyint(1) DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `gender` varchar(255) DEFAULT 'M',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `shop_id`, `expiry_date`) VALUES
(9, 'Classic Chese Pizza', 'Customer Choice', 12000, 5, 'product_images/1678877999Classic_Cheese_Pizza.jpg', '', '', '2023-03-15 10:59:59', '2023-03-15 10:59:59', 5, '2023-03-16');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `shop_id`, `expiry_date`) VALUES
(10, 'Computer Table', 'Portable Choice', 250000, 2, 'product_images/1678878066computer_table.jpg', '', '', '2023-03-15 11:01:06', '2023-03-15 11:01:06', 9, '2023-04-15');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `shop_id`, `expiry_date`) VALUES
(11, 'Megic Key Board', 'RGB and Rainrow Color', 350000, 3, 'product_images/1678878139Gaming_Keyboards.jpg', '', '', '2023-03-15 11:02:19', '2023-03-15 11:02:19', 7, '2023-03-31');
INSERT INTO `products` (`id`, `name`, `description`, `price`, `quantity`, `image1`, `image2`, `image3`, `created_at`, `updated_at`, `shop_id`, `expiry_date`) VALUES
(12, 'Data Cable', 'Type C', 9000, 3, 'product_images/1678878237dc.jpg', '', '', '2023-03-15 11:03:57', '2023-03-15 11:03:57', 6, '2023-04-04');

INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `owner_id`) VALUES
(5, 'JJ Pizza', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium', '08:00:00', '19:00:00', 'shop_logos/1678672901pizza.webp', '2023-03-13 02:01:41', '2023-03-13 02:01:41', 12);
INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `owner_id`) VALUES
(6, 'INIT Phone Accessories', 'I must explain to you how all this mistaken idea of denouncing pleasure and praising', '09:00:00', '17:00:00', 'shop_logos/1678673062phone.jpg', '2023-03-13 02:04:22', '2023-03-13 02:04:22', 16);
INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `owner_id`) VALUES
(7, 'Kyaw Computer Accessories', ' Nor again is there anyone who loves or pursues or desires to obtain pain of itsel', '09:00:00', '18:00:00', 'shop_logos/1678699008computer.avif', '2023-03-13 02:17:46', '2023-03-13 09:16:48', 32);
INSERT INTO `shops` (`id`, `name`, `description`, `open_time`, `close_time`, `logo`, `created_at`, `updated_at`, `owner_id`) VALUES
(9, 'Micro Bean', 'China Supplier', '09:00:00', '17:00:00', 'shop_logos/1678686419mb.jpg', '2023-03-13 05:46:59', '2023-03-13 05:46:59', 34),
(11, 'Erica Maldonado', 'Nulla aut vel offici', '09:02:00', '00:26:00', '', '2023-03-13 13:55:41', '2023-03-13 13:55:41', 22);

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `profile`, `address`, `is_admin`, `created_at`, `updated_at`, `gender`) VALUES
(12, 'Rafael Aguilar', 'pylyhari@outlook.com', '32b15d0a8f292e8f7d237cb6366c3a34', '+1 (613) 428-6257', '', 'Eaque sed quaerat vo', 0, '2023-03-08 11:20:57', '2023-03-08 11:20:57', 'M');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `profile`, `address`, `is_admin`, `created_at`, `updated_at`, `gender`) VALUES
(14, 'Htet Thu', 'htet@gmail.com', '93a83a5e24a02fe0f7fd13d25cc2ecd4', '+1 (985) 307-1659', 'profile_images/1678697922Htet_thu.jpg', 'Aut cum non ut rerum', 1, '2023-03-08 11:25:40', '2023-03-13 08:58:42', 'M');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `profile`, `address`, `is_admin`, `created_at`, `updated_at`, `gender`) VALUES
(16, 'Aiko Valencia', 'vahuludep@outlook.com', 'f10378de33fad6c7a8dc4ecf632d18c1', '+1 (266) 412-7215', '', 'Soluta rerum facilis', 0, '2023-03-09 04:31:31', '2023-03-09 04:31:31', 'M');
INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `profile`, `address`, `is_admin`, `created_at`, `updated_at`, `gender`) VALUES
(17, 'Aiko Valencia', 'vahuludep@outlook.com', 'f10378de33fad6c7a8dc4ecf632d18c1', '+1 (266) 412-7215', '', 'Soluta rerum facilis', 0, '2023-03-09 04:31:31', '2023-03-09 04:31:31', 'M'),
(22, 'zue zue', 'zuezue@outlook.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '+1 (266) 412-7215', '', 'Soluta rerum facilis', 0, '2023-03-09 04:31:31', '2023-03-11 09:27:55', 'F'),
(27, 'Kimberley England', 'jj@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '+1 (267) 278-7912', '', 'Voluptate error rati', 0, '2023-03-11 12:12:41', '2023-03-12 08:23:18', 'M'),
(28, 'Jeremy Gross', 'rykagemis@outlook.com', '145fb21ed7d5ff84cfeda90502fc3f2a', '+1 (887) 723-8423', '', 'Iure repudiandae mol', 0, '2023-03-11 12:37:00', '2023-03-11 12:37:00', 'F'),
(31, 'Jolene Hobbs', 'bynor@outlook.com', 'c626cfa37befbfa95efd265408b771d5', '+1 (543) 801-6447', '', 'Minim neque libero v', 0, '2023-03-11 12:43:13', '2023-03-11 12:43:13', 'M'),
(32, 'kyaw', 'kyaw@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '', 'profile_images/1678699109Screenshot_2022-08-21_005429.png', '', 0, '2023-03-12 09:47:11', '2023-03-13 09:18:29', 'M'),
(34, 'Si thu', 'sithu@gmail.com', 'f5bb0c8de146c67b44babbf4e6584cc0', '09756200249', 'profile_images/1678697990289484403_484628103432606_837546026809724759_n.jpg', 'Hlaing', 0, '2023-03-13 05:45:01', '2023-03-13 08:59:50', 'M');


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;