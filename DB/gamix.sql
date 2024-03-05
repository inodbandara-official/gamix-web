-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 07:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamix`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `CategoryName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Gaming Consoles'),
(2, 'Gaming Accessories'),
(3, 'Gaming Laptops');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Quantity` int(11) NOT NULL,
  `OrderStatus` varchar(50) NOT NULL,
  `OrderDate` date NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `PaymentMethod` varchar(50) NOT NULL,
  `DeliveryAddress` varchar(255) NOT NULL,
  `DeliveryDate` date NOT NULL,
  `PaymentStatus` varchar(50) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `SellerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`OrderID`, `Price`, `Quantity`, `OrderStatus`, `OrderDate`, `PhoneNumber`, `PaymentMethod`, `DeliveryAddress`, `DeliveryDate`, `PaymentStatus`, `UserID`, `SellerID`) VALUES
(1, 499.99, 1, 'Delivered', '2023-05-15', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-20', 'Paid', 2, 1),
(2, 1499.99, 1, 'Delivered', '2023-05-20', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-25', 'Paid', 2, 2),
(3, 49.99, 1, 'Delivered', '2023-05-25', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-05-30', 'Paid', 2, 2),
(4, 99.99, 1, 'Delivered', '2023-05-30', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-05', 'Paid', 2, 2),
(5, 499.99, 1, 'Delivered', '2023-06-05', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-10', 'Paid', 2, 1),
(6, 1499.99, 1, 'Delivered', '2023-06-10', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-15', 'Paid', 2, 2),
(7, 49.99, 1, 'Delivered', '2023-06-15', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-20', 'Paid', 2, 2),
(8, 99.99, 1, 'Delivered', '2023-06-20', '071 1234567', 'Cash on Delivery', 'Kandy', '2023-06-25', 'Paid', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` bigint(20) UNSIGNED NOT NULL,
  `SellerID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'UNPAID',
  `next_payment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `SellerID`, `OrderID`, `amount`, `status`, `next_payment_date`) VALUES
(1, 1, 1, '499.99', 'UNPAID', '2024-03-31');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Cod` tinyint(1) DEFAULT NULL,
  `ProductCondition` varchar(50) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `ReorderLevel` int(11) NOT NULL,
  `WarrentyPeriod` varchar(50) DEFAULT NULL,
  `WarrentyPolicy` varchar(255) DEFAULT NULL,
  `Weight` float DEFAULT NULL,
  `SalePrice` float NOT NULL,
  `RegularPrice` float NOT NULL,
  `Length` float DEFAULT NULL,
  `Width` float DEFAULT NULL,
  `Height` float DEFAULT NULL,
  `ShortDesc` varchar(100) DEFAULT NULL,
  `LongDesc` varchar(255) DEFAULT NULL,
  `Tag` varchar(255) DEFAULT NULL,
  `ImgPath` varchar(255) DEFAULT NULL,
  `SellerID` int(11) DEFAULT NULL,
  `CategoryID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `Name`, `Type`, `Cod`, `ProductCondition`, `Quantity`, `Status`, `ReorderLevel`, `WarrentyPeriod`, `WarrentyPolicy`, `Weight`, `SalePrice`, `RegularPrice`, `Length`, `Width`, `Height`, `ShortDesc`, `LongDesc`, `Tag`, `ImgPath`, `SellerID`, `CategoryID`) VALUES
(1, 'PlayStation 5', 'Console', 1, 'New', 30, 'Available', 5, '1 Year', 'Standard Warranty', 5, 499.99, 599.99, 16, 8, 4, 'Next-gen gaming console', 'Experience immersive gaming with the latest PlayStation', 'Gaming, Console', '/assets/images/ps5.jpg', 1, 1),
(2, 'Gaming Laptop - ROG Strix', 'Laptop', 1, 'New', 20, 'Available', 3, '2 Years', 'Extended Warranty available', 2.5, 1499.99, 1799.99, 15, 10, 1, 'High-performance gaming laptop', 'ROG Strix series for ultimate gaming experience', 'Gaming, Laptop', '/assets/images/rog-laptop.jpg', 2, 3),
(3, 'Gaming Mouse - G Pro X', 'Accessory', 1, 'New', 50, 'Available', 10, '6 Months', 'No Warranty for wear and tear', 0.2, 49.99, 69.99, NULL, NULL, NULL, 'Pro gaming mouse for precision', 'Designed for professional gamers for accuracy and speed', 'Gaming, Accessories', '/assets/images/g-pro-x-mouse.jpg', 2, 2),
(4, 'Gaming Keyboard - G Pro X', 'Accessory', 1, 'New', 40, 'Available', 8, '6 Months', 'No Warranty for wear and tear', 0.5, 99.99, 129.99, NULL, NULL, NULL, 'Pro gaming keyboard for speed', 'Designed for professional gamers for speed and comfort', 'Gaming, Accessories', '/assets/images/g-pro-x-keyboard.jpg', 2, 2),
(5, 'Xbox Series X', 'Console', 1, 'New', 25, 'Available', 5, '1 Year', 'Standard Warranty', 5, 499.99, 599.99, 16, 8, 4, 'Next-gen gaming console', 'Experience immersive gaming with the latest Xbox', 'Gaming, Console', '/assets/images/xbox-series-x.jpg', 1, 1),
(6, 'Gaming Laptop - Predator Helios', 'Laptop', 1, 'New', 15, 'Available', 3, '2 Years', 'Extended Warranty available', 2.5, 1499.99, 1799.99, 15, 10, 1, 'High-performance gaming laptop', 'Predator Helios series for ultimate gaming experience', 'Gaming, Laptop', '/assets/images/predator-laptop.jpg', 2, 3),
(7, 'Gaming Mouse - G Pro', 'Accessory', 1, 'New', 60, 'Available', 10, '6 Months', 'No Warranty for wear and tear', 0.2, 49.99, 69.99, NULL, NULL, NULL, 'Pro gaming mouse for precision', 'Designed for professional gamers for accuracy and speed', 'Gaming, Accessories', '/assets/images/g-pro-mouse.jpg', 2, 2),
(8, 'Gaming Keyboard - G Pro', 'Accessory', 1, 'New', 50, 'Available', 8, '6 Months', 'No Warranty for wear and tear', 0.5, 99.99, 129.99, NULL, NULL, NULL, 'Pro gaming keyboard for speed', 'Designed for professional gamers for speed and comfort', 'Gaming, Accessories', '/assets/images/g-pro-keyboard.jpg', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `ProductID` int(11) NOT NULL,
  `OrderID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`ProductID`, `OrderID`) VALUES
(1, 1),
(2, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(4, 7),
(5, 8),
(6, 8),
(7, 8),
(8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `productwishlist`
--

CREATE TABLE `productwishlist` (
  `ProductID` int(11) NOT NULL,
  `WishlistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productwishlist`
--

INSERT INTO `productwishlist` (`ProductID`, `WishlistID`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3),
(7, 4),
(8, 4);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `ReviewDesc` varchar(255) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ProductID` int(11) DEFAULT NULL,
  `OrderID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `ReviewDesc`, `UserID`, `ProductID`, `OrderID`) VALUES
(1, 'Great product', 2, 1, 1),
(2, 'Excellent laptop', 2, 2, 2),
(3, 'Good mouse', 2, 3, 3),
(4, 'Nice keyboard', 2, 4, 4),
(5, 'Great product', 2, 5, 5),
(6, 'Excellent laptop', 2, 6, 6),
(7, 'Good mouse', 2, 7, 7),
(8, 'Nice keyboard', 2, 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `SellerID` int(11) NOT NULL,
  `ShopName` varchar(100) NOT NULL,
  `ShopAddress` varchar(255) NOT NULL,
  `SellerEmail` varchar(100) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller`
--

INSERT INTO `seller` (`SellerID`, `ShopName`, `ShopAddress`, `SellerEmail`, `PhoneNumber`, `password`) VALUES
(1, 'ABC Shop', 'Kandy', 'abc@gmail.com', '071 1234567', '123456'),
(2, 'XYZ Shop', 'Colombo', 'xyz@gmail.com', '070 1294567', ''),
(3, 'PQR Shop', 'Galle', 'pqr@gmail.com', '075 1234567', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(11) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `PhoneNumber` varchar(20) DEFAULT NULL,
  `Address` varchar(255) DEFAULT NULL,
  `IsAdmin` tinyint(1) DEFAULT NULL,
  `RegisterDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `Password`, `PhoneNumber`, `Address`, `IsAdmin`, `RegisterDate`) VALUES
(1, 'John', 'Doe', 'johndoe@gmail.com', '123456', '070 1234567', 'Colombo', 1, '2022-12-01'),
(2, 'Jane', 'Doe', 'jane123@gmail.com', '123456', '071 3462891', 'Galle', 0, '2023-01-05'),
(3, 'John', 'Smith', 'smith345@gmail.com', '123456', '072 1234567', 'Kandy', 0, '2023-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `WishlistID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`WishlistID`, `UserID`) VALUES
(1, 2),
(3, 2),
(5, 2),
(7, 2),
(2, 3),
(4, 3),
(6, 3),
(8, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `SellerID` (`SellerID`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `SellerID` (`SellerID`),
  ADD KEY `CategoryID` (`CategoryID`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`ProductID`,`OrderID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `productwishlist`
--
ALTER TABLE `productwishlist`
  ADD PRIMARY KEY (`ProductID`,`WishlistID`),
  ADD KEY `WishlistID` (`WishlistID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `OrderID` (`OrderID`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`SellerID`),
  ADD UNIQUE KEY `SellerEmail` (`SellerEmail`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`WishlistID`),
  ADD KEY `UserID` (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`),
  ADD CONSTRAINT `payments_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`SellerID`) REFERENCES `seller` (`SellerID`),
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `productorder_ibfk_2` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `productwishlist`
--
ALTER TABLE `productwishlist`
  ADD CONSTRAINT `productwishlist_ibfk_1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `productwishlist_ibfk_2` FOREIGN KEY (`WishlistID`) REFERENCES `wishlist` (`WishlistID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `review_ibfk_3` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
