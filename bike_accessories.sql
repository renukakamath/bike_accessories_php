/*
SQLyog Community v13.1.6 (64 bit)
MySQL - 5.7.9 : Database - bike_accessories
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bike_accessories` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bike_accessories`;

/*Table structure for table `brand` */

DROP TABLE IF EXISTS `brand`;

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `brand` */

insert  into `brand`(`brand_id`,`brand`) values 
(2,'Puma'),
(3,'Adidas'),
(4,'Nike'),
(5,'UCB'),
(6,'Levis'),
(7,'Vans');

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category`) values 
(3,'Eyes'),
(2,'mobile'),
(4,'games');

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`login_id`,`firstname`,`lastname`,`place`,`phone`,`email`,`gender`) values 
(1,2,'sadad','san kar','kochi','06238526459','sankarb.b00@gmail.com','male');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`login_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `login` */

insert  into `login`(`login_id`,`username`,`password`,`usertype`) values 
(1,'admin','admin','admin'),
(2,'user','user','customer'),
(3,'staff','staff','customer'),
(4,'st ','st','staff');

/*Table structure for table `orderchild` */

DROP TABLE IF EXISTS `orderchild`;

CREATE TABLE `orderchild` (
  `ochild_id` int(11) NOT NULL AUTO_INCREMENT,
  `omaster_id` int(11) DEFAULT NULL,
  `product_id` varchar(100) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ochild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `orderchild` */

insert  into `orderchild`(`ochild_id`,`omaster_id`,`product_id`,`amount`,`quantity`) values 
(1,1,'7','1000','2'),
(2,2,'7','500','1'),
(12,9,'9','2400','4'),
(11,8,'7','500','1'),
(13,10,'9','1200','2'),
(14,10,'8','1000','2');

/*Table structure for table `ordermaster` */

DROP TABLE IF EXISTS `ordermaster`;

CREATE TABLE `ordermaster` (
  `omaster_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `total` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`omaster_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `ordermaster` */

insert  into `ordermaster`(`omaster_id`,`customer_id`,`total`,`date`,`status`) values 
(1,1,'1000','2022-11-07','paid'),
(2,1,'500','2022-11-07','paid'),
(8,1,'500','2022-11-08','paid'),
(9,1,'2400','2022-11-08','paid'),
(10,1,'2200','2022-11-10','pending');

/*Table structure for table `payment` */

DROP TABLE IF EXISTS `payment`;

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `omaster_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `payment` */

insert  into `payment`(`payment_id`,`omaster_id`,`amount`,`date`) values 
(1,1,'','2022-11-07'),
(2,1,'500','2022-11-07'),
(3,1,'500','2022-11-07'),
(4,1,'500','2022-11-07'),
(5,1,'500','2022-11-07'),
(6,2,'500','2022-11-07'),
(7,8,'500','2022-11-08'),
(8,9,'600','2022-11-08');

/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `subcategory_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product` varchar(200) DEFAULT NULL,
  `image` varchar(1000) DEFAULT NULL,
  `rate` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

insert  into `product`(`product_id`,`subcategory_id`,`brand_id`,`product`,`image`,`rate`,`quantity`) values 
(7,1,2,'wwww','uploads/images_63688fffe4e3c.jfif','500','300'),
(8,3,3,'w','uploads/images_636a32fd3e9d4.jpg','500','2'),
(9,9,6,'d','uploads/images_636a332b54335.jfif','600','10000'),
(10,3,4,'f','uploads/images_636a334b6c752.jpg','500','100');

/*Table structure for table `purchasechild` */

DROP TABLE IF EXISTS `purchasechild`;

CREATE TABLE `purchasechild` (
  `pchild_id` int(11) NOT NULL AUTO_INCREMENT,
  `pmaster_id` int(11) DEFAULT NULL,
  `vproduct_id` int(11) DEFAULT NULL,
  `amount` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pchild_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `purchasechild` */

insert  into `purchasechild`(`pchild_id`,`pmaster_id`,`vproduct_id`,`amount`,`quantity`) values 
(1,1,12,'500','100'),
(2,2,12,'500','100'),
(3,3,12,'500','100'),
(4,4,12,'500','1'),
(5,5,12,'500','1');

/*Table structure for table `purchasemaster` */

DROP TABLE IF EXISTS `purchasemaster`;

CREATE TABLE `purchasemaster` (
  `pmaster_id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `total` varchar(200) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`pmaster_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `purchasemaster` */

insert  into `purchasemaster`(`pmaster_id`,`staff_id`,`total`,`date`,`status`) values 
(1,2,'50000','2022-11-07','paid'),
(2,2,'50000','2022-11-07','paid'),
(3,2,'50000','2022-11-07','paid'),
(4,2,'500','2022-11-08','pending'),
(5,2,'500','2022-11-08','paid');

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT,
  `login_id` int(11) DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `designation` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`staff_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`staff_id`,`login_id`,`firstname`,`lastname`,`place`,`phone`,`email`,`designation`) values 
(2,4,'sankar ','s ','Ernakulam ','6238526459  ','sankarb.b00@gmail.com  ','Manager');

/*Table structure for table `subcategory` */

DROP TABLE IF EXISTS `subcategory`;

CREATE TABLE `subcategory` (
  `subcategory_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `subcategory` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`subcategory_id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

/*Data for the table `subcategory` */

insert  into `subcategory`(`subcategory_id`,`category_id`,`subcategory`) values 
(1,2,'nokiaaa'),
(3,2,'eyebrow'),
(4,3,'shadow'),
(5,3,'glow'),
(6,4,'gta 5'),
(8,4,'sandias'),
(9,4,'vicicity'),
(10,2,'samsung');

/*Table structure for table `vendor` */

DROP TABLE IF EXISTS `vendor`;

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL AUTO_INCREMENT,
  `vname` varchar(100) DEFAULT NULL,
  `place` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`vendor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `vendor` */

insert  into `vendor`(`vendor_id`,`vname`,`place`,`phone`,`email`) values 
(3,'vendor','ernakulam','1234567890','user@gmail.com');

/*Table structure for table `vendor_product` */

DROP TABLE IF EXISTS `vendor_product`;

CREATE TABLE `vendor_product` (
  `vproduct_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) DEFAULT NULL,
  `vendor_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`vproduct_id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `vendor_product` */

insert  into `vendor_product`(`vproduct_id`,`product_id`,`vendor_id`) values 
(1,0,2),
(2,0,2),
(3,0,2),
(4,0,2),
(5,0,2),
(6,1,2),
(7,2,2),
(8,3,2),
(9,4,2),
(10,5,2),
(11,6,2),
(12,7,2),
(13,8,3),
(14,9,3),
(15,10,3);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
