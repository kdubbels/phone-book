

-- $servername = "localhost";
-- $username = "kristofer";
-- $password = "revolver";
-- $dbname = "phone_book";

--
-- Table structure for table `people`
--

DROP TABLE IF EXISTS `people`;
CREATE TABLE `people` (
  `id` int(30) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `phone` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Table data for table `people`
--

INSERT INTO `people` VALUES (1,'bruce','wayne','555-555-5555'),(2,'clark','kent','555-555-5555'),(3,'diana','price','555-555-5555');

--

