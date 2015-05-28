DROP TABLE IF EXISTS `main_menu`;
CREATE TABLE IF NOT EXISTS `main_menu` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `link` text CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `parentid` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `ms_product`
--

INSERT INTO `main_menu` (`id`, `title`, `link`, `parentid`) VALUES
(1, 'Home', 'http://abhijitpal.in', 0),
(2, 'Products', 'http://abhijitpal.in', 0),
(3, 'About', 'http://abhijitpal.in', 0),
(4, 'Contact', 'http://abhijitpal.in', 0),
(5, 'Product 1', 'http://abhijitpal.in', 2),
(6, 'Product 2', 'http://abhijitpal.in', 2),
(7, 'Sub Product1', 'http://abhijitpal.in', 5),
(8, 'Sub Product2', 'http://abhijitpal.in', 5),
(9, 'Sub Product3', 'http://abhijitpal.in', 5),
(10, 'Sub Product4', 'http://abhijitpal.in', 6),
(11, 'Sub Product5', 'http://abhijitpal.in', 6),
(12, 'Sub Sub Product1', 'http://abhijitpal.in', 9),
(13, 'Sub Sub Product2', 'http://abhijitpal.in', 9)
