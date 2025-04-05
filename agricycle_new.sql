-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2025 at 07:13 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agricycle`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`) VALUES
(1, 'lubdha@gmail.com', '$2y$10$86LLRkYCe1rjeAMev1IxSeUiw7NuEvQLE1RK5FmUQsK2JUDqutvVG');

-- --------------------------------------------------------

--
-- Table structure for table `bank_policies`
--

CREATE TABLE `bank_policies` (
  `id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `pdf_path` varchar(255) DEFAULT NULL,
  `bank_link` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bank_policies`
--

INSERT INTO `bank_policies` (`id`, `agent_id`, `name`, `pdf_path`, `bank_link`, `created_at`) VALUES
(1, 1, 'Kisan Credit Card ', 'uploads/policies/policy_67f00b3246d1f6.96161559.pdf', 'https://www.myscheme.gov.in/schemes/kcc', '2025-04-04 16:39:14'),
(2, 1, 'Maan Dhan Yojana', 'uploads/policies/policy_67f00f6c2a9b47.70683931.pdf', 'https://maandhan.in/', '2025-04-04 16:57:16');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`id`, `email`, `password`, `name`, `phone`, `company`) VALUES
(1, 'akanksha@gmail.com', '$2y$10$2hnDGSvzAb1usooSWcGtKuurtzJLeOes3lvw6uMKjY0hzlqAt/pTi', 'Akansha Saraf', '8976545678', 'Deepak Fertilizers');

-- --------------------------------------------------------

--
-- Table structure for table `community_comments`
--

CREATE TABLE `community_comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `community_posts`
--

CREATE TABLE `community_posts` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `community_posts`
--

INSERT INTO `community_posts` (`id`, `farmer_id`, `title`, `content`, `created_at`) VALUES
(1, 2, 'Help for best manure', 'need the best manure for spreading  in my farm.', '2025-04-04 08:38:58'),
(2, 2, 'help', 'for choosing the best manure', '2025-04-04 08:40:15');

-- --------------------------------------------------------

--
-- Table structure for table `farmers`
--

CREATE TABLE `farmers` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `farmers`
--

INSERT INTO `farmers` (`id`, `email`, `password`, `name`, `phone`, `location`) VALUES
(1, 'chinmaya@gmail.com', '$2y$10$luoik5.cCxSht7dCoO2GZeC0YRfmOCqGzN51FH6UtPY14cSQkdR2a', 'Chinmaya Kolhe', '9087678905', 'Akurdi Pune');

-- --------------------------------------------------------

--
-- Table structure for table `insurance_agents`
--

CREATE TABLE `insurance_agents` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `agency` varchar(100) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `insurance_agents`
--

INSERT INTO `insurance_agents` (`id`, `email`, `password`, `name`, `agency`, `phone`) VALUES
(1, 'vaishnavi@gmail.com', '$2y$10$3cakXwO00a3U2q.1KAGFVuMKMtHNkotNi8p8GJBklxz2TDPV4.lRW', 'Vaishnavi Kale', 'Bank of Baroda', '9876543210');

-- --------------------------------------------------------

--
-- Table structure for table `marketplace_items`
--

CREATE TABLE `marketplace_items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `contact_info` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `marketplace_items`
--

INSERT INTO `marketplace_items` (`id`, `user_id`, `item_name`, `description`, `price`, `quantity`, `contact_info`, `created_at`) VALUES
(3, 2, 'Animal Manure', 'animal manure available', 400.00, 4, 'abc@gmail.com', '2025-04-04 08:08:39'),
(4, 10, 'Fruits ', 'kiwi and dragon fruit', 100.00, 2, '8787878787', '2025-04-04 13:47:29');

-- --------------------------------------------------------

--
-- Table structure for table `pickup_requests`
--

CREATE TABLE `pickup_requests` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `waste_type` varchar(50) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` enum('Pending','Scheduled','Completed') DEFAULT 'Pending',
  `request_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pickup_requests`
--

INSERT INTO `pickup_requests` (`id`, `farmer_id`, `waste_type`, `quantity`, `status`, `request_date`) VALUES
(3, 2, 'Animal Manure', 4, 'Pending', '2025-04-04 08:20:41'),
(4, 10, 'Fruit & Vegetable Waste', 6, 'Pending', '2025-04-04 13:42:16');

-- --------------------------------------------------------

--
-- Table structure for table `policy_requests`
--

CREATE TABLE `policy_requests` (
  `id` int(11) NOT NULL,
  `farmer_id` int(11) NOT NULL,
  `policy_id` int(11) NOT NULL,
  `agent_id` int(11) NOT NULL,
  `status` enum('Pending','Approved','Rejected') DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `policy_requests`
--

INSERT INTO `policy_requests` (`id`, `farmer_id`, `policy_id`, `agent_id`, `status`, `created_at`) VALUES
(1, 1, 1, 1, 'Pending', '2025-04-04 17:26:27'),
(2, 1, 1, 1, 'Pending', '2025-04-04 17:37:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('farmer','buyer','admin','insurance_agent') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`) VALUES
(1, 'Chinmaya Bhushan Kolhe', 'chinmayakolhe2005@gmail.com', '$2y$10$R7ccbIuHUut3pqpCOJ9.xu89mSrMQl73jG6E0qPWUoy1lDLt/qaGK', 'buyer', '2025-04-03 16:49:02'),
(2, 'Suresh Bharambe', 'sureshbharambe@gmail.com', '$2y$10$QmP2/XPBXmTFu2/n7hPQ9egclYCy.k9g0iUj9EAX0Bvueo1ut27pS', 'farmer', '2025-04-03 16:57:59'),
(3, 'admin', 'admin@agricycle.com', '0192023a7bbd73250516f069df18b500', 'admin', '2025-04-04 02:19:27'),
(6, 'Rudra Kolhe', 'rudra@gmail.com', '$2y$10$Wi3neiWRFXOkzvra0FuJc.cAeZiXlq/NjlgQFBvFL6LmEClVFP0CS', 'insurance_agent', '2025-04-04 06:57:52'),
(9, 'Krishna Bharambe', 'krishna@gmail.com', '$2y$10$4PjDUHU6CoebUrsDF6NBHu6QOYKD9NZLbbXqcda/RTVQxaLZu2gP6', 'farmer', '2025-04-04 08:23:00'),
(10, 'Lubdha Chaudhari', 'lubdha@gmail.com', '$2y$10$0cs5oyzlM79LIqoXjXk03.CuyDsqn1w6vY/3Z0wTffOJUTfrhlYYm', 'farmer', '2025-04-04 13:35:15');

-- --------------------------------------------------------

--
-- Table structure for table `waste_listings`
--

CREATE TABLE `waste_listings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `waste_type` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `pickup_available` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `waste_listings`
--

INSERT INTO `waste_listings` (`id`, `user_id`, `waste_type`, `quantity`, `pickup_available`, `created_at`) VALUES
(1, 2, 'Fruit & Vegetable Waste', 10, 1, '2025-04-04 07:33:12'),
(2, 10, 'Fruit & Vegetable Waste', 6, 1, '2025-04-04 13:41:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `bank_policies`
--
ALTER TABLE `bank_policies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `community_comments`
--
ALTER TABLE `community_comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_id` (`post_id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `farmers`
--
ALTER TABLE `farmers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `insurance_agents`
--
ALTER TABLE `insurance_agents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `marketplace_items`
--
ALTER TABLE `marketplace_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`);

--
-- Indexes for table `policy_requests`
--
ALTER TABLE `policy_requests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `farmer_id` (`farmer_id`),
  ADD KEY `policy_id` (`policy_id`),
  ADD KEY `agent_id` (`agent_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `waste_listings`
--
ALTER TABLE `waste_listings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bank_policies`
--
ALTER TABLE `bank_policies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `community_comments`
--
ALTER TABLE `community_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `community_posts`
--
ALTER TABLE `community_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmers`
--
ALTER TABLE `farmers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `insurance_agents`
--
ALTER TABLE `insurance_agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `marketplace_items`
--
ALTER TABLE `marketplace_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `policy_requests`
--
ALTER TABLE `policy_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `waste_listings`
--
ALTER TABLE `waste_listings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `community_comments`
--
ALTER TABLE `community_comments`
  ADD CONSTRAINT `community_comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `community_posts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `community_comments_ibfk_2` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `community_posts`
--
ALTER TABLE `community_posts`
  ADD CONSTRAINT `community_posts_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `marketplace_items`
--
ALTER TABLE `marketplace_items`
  ADD CONSTRAINT `marketplace_items_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `pickup_requests`
--
ALTER TABLE `pickup_requests`
  ADD CONSTRAINT `pickup_requests_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `policy_requests`
--
ALTER TABLE `policy_requests`
  ADD CONSTRAINT `policy_requests_ibfk_1` FOREIGN KEY (`farmer_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `policy_requests_ibfk_2` FOREIGN KEY (`policy_id`) REFERENCES `bank_policies` (`id`),
  ADD CONSTRAINT `policy_requests_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `waste_listings`
--
ALTER TABLE `waste_listings`
  ADD CONSTRAINT `waste_listings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
