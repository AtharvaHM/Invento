SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

-- Table structure for table `category`
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `media`
CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) unsigned NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Table structure for table `products`
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` varchar(50) DEFAULT NULL,
  `buy_price` decimal(25,2) DEFAULT NULL,
  `sell_price` decimal(25,2) NOT NULL,
  `category_id` int(11) unsigned NOT NULL,
  `media_id` int(11) DEFAULT '0',
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `sales`
CREATE TABLE IF NOT EXISTS `sales` (
  `id` int(11) unsigned NOT NULL,
  `product_id` int(11) unsigned NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(25,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Table structure for table `users`
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) unsigned NOT NULL,
  `name` varchar(60) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_level` int(11) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.jpg',
  `status` int(1) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table `users`
INSERT INTO `users` (`id`, `name`, `username`, `password`, `user_level`, `image`, `status`, `last_login`) VALUES
(1, ' Admin User', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 1, 'no_image.jpg', 1, ''),
(2, 'Special User', 'special', 'ba36b97a41e7faf742ab09bf88405ac04f99599a', 2, 'no_image.jpg', 1, ''),
(3, 'Default User', 'user', '12dea96fec20593566ab75692c9949596833adc9', 3, 'no_image.jpg', 1, '');

-- Table structure for table `user_groups`
CREATE TABLE IF NOT EXISTS `user_groups` (
  `id` int(11) NOT NULL,
  `group_name` varchar(150) NOT NULL,
  `group_level` int(11) NOT NULL,
  `group_status` int(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table `user_groups`
INSERT INTO `user_groups` (`id`, `group_name`, `group_level`, `group_status`) VALUES
  (1, 'Admin', 1, 1),
  (2, 'Special', 2, 1),
  (3, 'User', 3, 1);


-- Indexes for dumped tables

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

-- Indexes for table `media`
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

-- Indexes for table `products`
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `media_id` (`media_id`);

-- Indexes for table `sales`
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

-- Indexes for table `users`
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_level` (`user_level`);

-- Indexes for table `user_groups`
ALTER TABLE `user_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `group_level` (`group_level`);


-- AUTO_INCREMENT for dumped tables

-- AUTO_INCREMENT for table `category`
ALTER TABLE `category`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `media`
ALTER TABLE `media`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `products`
ALTER TABLE `products`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `sales`
ALTER TABLE `sales`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;

-- AUTO_INCREMENT for table `users`
ALTER TABLE `users`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;

-- AUTO_INCREMENT for table `user_groups`
ALTER TABLE `user_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;


-- Constraints for dumped tables

-- Constraints for table `products`
ALTER TABLE `products`
  ADD CONSTRAINT `FK_products` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Constraints for table `sales`
ALTER TABLE `sales`
  ADD CONSTRAINT `SK` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

-- Constraints for table `users`
ALTER TABLE `users`
  ADD CONSTRAINT `FK_user` FOREIGN KEY (`user_level`) REFERENCES `user_groups` (`group_level`) ON DELETE CASCADE ON UPDATE CASCADE;