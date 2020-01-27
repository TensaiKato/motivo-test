SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` text NOT NULL,
  `price` int(255) NOT NULL,
  `available_stock` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `modified` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


INSERT INTO `items` (`id`, `title`, `description`, `price`, `available_stock`, `status`, `modified`) VALUES
(1, 'Iphone XRR', 'Just the right amount of everything', 500, 10, 1, '2020-01-28 02:24:23'),
(2, 'Galaxy S8', 'Most complete smartphone', 380, 6, 1, '2020-01-27 21:30:13'),
(3, 'Macbook Pro', 'Explore the Mac world', 1200, 1, 5, '2020-01-27 21:31:13'),
(6, 'Test', 'aaaaa', 90000, 6, 0, '2020-01-28 02:30:30');


ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

