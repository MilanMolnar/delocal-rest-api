CREATE TABLE IF NOT EXISTS `Contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
)
ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19;