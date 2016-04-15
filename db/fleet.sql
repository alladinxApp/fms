/*
SQLyog Ultimate v8.55 
MySQL - 5.1.41 : Database - fleet
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`fleet` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `fleet`;

/*Table structure for table `assigneeequipment` */

DROP TABLE IF EXISTS `assigneeequipment`;

CREATE TABLE `assigneeequipment` (
  `id` varchar(20) NOT NULL,
  `assigneeID` varchar(20) DEFAULT NULL,
  `equipmentID` varchar(20) DEFAULT NULL,
  `assignedStart` datetime DEFAULT NULL,
  `assignedEnd` datetime DEFAULT NULL,
  `isCurrent` int(11) DEFAULT '1',
  `remarks` longtext,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `assigneeequipment` */

insert  into `assigneeequipment`(`id`,`assigneeID`,`equipmentID`,`assignedStart`,`assignedEnd`,`isCurrent`,`remarks`) values ('AE00000001','ASS00000008','EQ00000004','2015-09-01 00:00:00',NULL,1,NULL),('AE00000002','ASS00000009','EQ00000008','2015-09-20 09:01:37','2015-09-20 10:44:26',0,NULL),('AE00000003','ASS00000008','EQ00000008','2015-09-20 10:44:26',NULL,1,NULL),('AE00000005','ASS00000008','EQ00000005','2015-09-20 12:19:55','2015-09-20 12:20:07',0,NULL),('AE00000006','ASS00000009','EQ00000005','2015-09-20 12:20:07',NULL,1,NULL);

/*Table structure for table `assigneemapper` */

DROP TABLE IF EXISTS `assigneemapper`;

CREATE TABLE `assigneemapper` (
  `id` varchar(20) NOT NULL,
  `userID` varchar(20) DEFAULT NULL,
  `assigneeID` varchar(20) DEFAULT NULL,
  `companyID` varchar(20) DEFAULT NULL,
  `type` varchar(20) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `assigneemapper` */

insert  into `assigneemapper`(`id`,`userID`,`assigneeID`,`companyID`,`type`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`) values ('UA00000001','alladinx','ASS00000008',NULL,'user_assignee','alladinx','2015-08-24 05:58:14',NULL,NULL),('AC00000001','','ASS00000008','COM0001','assignee_company','alladinx','2015-09-20 10:55:16',NULL,NULL),('AC00000003',NULL,'ASS00000008','COM0002','assignee_company','alladinx','2015-09-20 11:05:26',NULL,NULL),('AC00000004',NULL,'ASS00000008','COM0003','assignee_company','alladinx','2015-09-20 11:17:57',NULL,NULL),('AC00000005',NULL,'ASS00000009','COM0003','assignee_company','alladinx','2015-09-20 11:18:10',NULL,NULL);

/*Table structure for table `assigneemaster` */

DROP TABLE IF EXISTS `assigneemaster`;

CREATE TABLE `assigneemaster` (
  `assigneeID` varchar(20) NOT NULL,
  `companyID` varchar(20) NOT NULL,
  `locationID` varchar(20) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `contactNo1` varchar(20) DEFAULT NULL,
  `contactNo2` varchar(20) DEFAULT NULL,
  `address` text,
  `costCenter` varchar(100) DEFAULT NULL,
  `immediateHead` varchar(100) DEFAULT NULL,
  `emailAddress` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `attachment` text,
  `licenseNo` varchar(50) DEFAULT NULL,
  `licenseRegistrationDate` datetime DEFAULT NULL,
  `expirationDate` datetime DEFAULT NULL,
  `licenseAddress` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`assigneeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `assigneemaster` */

insert  into `assigneemaster`(`assigneeID`,`companyID`,`locationID`,`firstname`,`lastname`,`gender`,`age`,`contactNo1`,`contactNo2`,`address`,`costCenter`,`immediateHead`,`emailAddress`,`department`,`attachment`,`licenseNo`,`licenseRegistrationDate`,`expirationDate`,`licenseAddress`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('ASS00000009','COM0001','LOC0001','b','b','M',30,'123','123','b','b','alladinx','rpcastanares@fastgroup.biz','D0001','cflogo.gif','123',NULL,'2016-08-31 00:00:00','b','alladinx','2015-08-24 07:57:02',NULL,NULL,1),('ASS00000008','COM0001','LOC0001','A','A','M',22,'123456789','987654321','a','a','noel rodriguez','rpcastanares@fastgroup.biz','D0002','gaskull_t-shirt.png','a','2014-07-24 00:00:00','2015-07-24 00:00:00','a','alladinx','2015-07-03 09:08:14','alladinx','2015-10-15 02:44:56',1),('ASS00000010','COM0001','LOC0001','D','D','M',25,'123','123','d','d','d','d@d.com','D0001','Kurosaki_Ichigo_by_Maggical1.jpg','d','2016-04-07 00:00:00','2017-04-06 00:00:00','d','alladinx','2016-04-07 10:14:01','alladinx','2016-04-07 10:22:12',1);

/*Table structure for table `categorymaster` */

DROP TABLE IF EXISTS `categorymaster`;

CREATE TABLE `categorymaster` (
  `categoryID` varchar(20) NOT NULL,
  `categoryName` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`categoryID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `categorymaster` */

insert  into `categorymaster`(`categoryID`,`categoryName`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('CAT001','PICKUP','','2015-06-29 03:16:50','','2015-06-29 03:27:57',1),('CAT002','SEDAN','','2015-06-29 03:17:01',NULL,NULL,1),('CAT003','VAN','','2015-06-29 03:17:08',NULL,NULL,1),('CAT004','BUS','','2015-06-29 03:17:18',NULL,NULL,1),('CAT005','SUV','','2015-06-29 03:17:28',NULL,NULL,1);

/*Table structure for table `companymaster` */

DROP TABLE IF EXISTS `companymaster`;

CREATE TABLE `companymaster` (
  `companyID` varchar(20) NOT NULL,
  `companyName` text,
  `companyAddress` text,
  `companyContactNo` varchar(50) DEFAULT NULL,
  `companyLogo` text,
  `signature` text,
  `daysOfNotification` int(11) DEFAULT NULL,
  `insuranceAppliedDate` datetime DEFAULT NULL,
  `insuranceExpirationDate` datetime DEFAULT NULL,
  `insuranceReminderInDays` int(11) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varbinary(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`companyID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `companymaster` */

insert  into `companymaster`(`companyID`,`companyName`,`companyAddress`,`companyContactNo`,`companyLogo`,`signature`,`daysOfNotification`,`insuranceAppliedDate`,`insuranceExpirationDate`,`insuranceReminderInDays`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('COM0001','a1','a1','a1','spop.jpg','cflogo.gif',11,'2015-07-02 00:00:00','2015-07-11 00:00:00',11,'','2015-07-01 07:16:31','','2015-07-02 06:33:59',1),('COM0002','b1','b1','b1','gaskull.jpg','gaskull_t-shirt.png',10,'0000-00-00 00:00:00','0000-00-00 00:00:00',20,'alladinx','2015-08-28 07:45:07',NULL,NULL,1),('COM0003','c1','c1','c1','black_t-shirt.gif','cf.jpg',10,'0000-00-00 00:00:00','0000-00-00 00:00:00',20,'alladinx','2015-08-28 07:47:24',NULL,NULL,1);

/*Table structure for table `configuration` */

DROP TABLE IF EXISTS `configuration`;

CREATE TABLE `configuration` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(20) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `value` longtext,
  `remarks` longtext,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `configuration` */

insert  into `configuration`(`id`,`type`,`code`,`description`,`value`,`remarks`,`status`) values (1,'user_pic_path','upp','USER PICTURE PATH','files/userpics/','Path of Users Pictures',1),(2,'company_pic_path','cpp','COMPANY PICTURE PATH','files/companypics/','Path of Company Pictures',1),(3,'equipment_pic_path','epp','EQUIPMENT PICTURE PATH','files/equipmentpics/','Path of Equipment Pictures',1),(4,'company_log','cl','COMPANY LOGO PATH','files/companypics/logo/','Path of Company Logos',1),(5,'company_signature','cs','COMPANY SIGNATURE PATH','files/companypics/signature/','Path of Company Signatures',1),(6,'assignee_attachment','aa','ASSIGNEE ATTACHMENT PATH','files/assigneeattachment/','Path of Assignee Attachments',1),(7,'po_attachment','pa','PURCHASE ORDER ATTACHMENT PATH','files/poattachments/','Path of Purchase Order Attachments',1),(8,'base_path','baseurl','ROOT FOLDER PATH','http://localhost:81/fms/','Root folder of the application',1);

/*Table structure for table `controlnomaster` */

DROP TABLE IF EXISTS `controlnomaster`;

CREATE TABLE `controlnomaster` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `code` varchar(20) DEFAULT NULL,
  `lastDigit` int(20) DEFAULT NULL,
  `noOfDigit` int(2) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `controlnomaster` */

insert  into `controlnomaster`(`id`,`description`,`type`,`code`,`lastDigit`,`noOfDigit`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values (1,'CATEGORY','category','CAT',5,3,'','2015-06-29 02:53:37','alladinx','2015-10-01 04:48:19',1),(2,'COMPANY','company','COM',3,4,'','2015-06-29 02:54:16','alladinx','2015-10-01 04:48:29',1),(3,'CUSTOMER','customer','CUS',0,8,'','2015-06-29 02:55:03','','2015-06-29 03:13:16',1),(4,'EMPLOYEE','employee','EMP',0,8,'','2015-06-29 02:59:15',NULL,NULL,1),(5,'EQUIPMENT','equipment','EQ',8,8,'','2015-06-29 03:11:51','alladinx','2015-07-03 09:01:18',1),(6,'MAKE','make','MAK',11,3,'','2015-06-29 03:12:12',NULL,NULL,1),(7,'PARTS','parts','PAR',6,8,'','2015-06-29 03:12:38','alladinx','2015-07-09 03:30:56',1),(8,'MODEL','model','MOD',10,6,'','2015-06-29 03:13:56','','2015-07-01 03:23:56',1),(9,'LOCATION','location','LOC',2,4,'','2015-06-29 03:14:16','','2015-06-30 07:27:47',1),(10,'WORK ORDER','work_order','WO',18,8,'','2015-06-29 03:14:34','alladinx','2015-09-03 06:31:48',1),(11,'PO RECEIVING','po_receiving','PO',1,8,'','2015-06-29 03:14:59','alladinx','2015-09-03 06:31:56',1),(12,'MENUS','menu','M',35,4,'','2015-06-29 03:15:22',NULL,NULL,1),(13,'REMINDERS','reminder','REM',0,8,'','2015-06-29 03:15:42','alladinx','2015-09-04 04:07:28',1),(14,'SUPPLIER','supplier','SUP',2,8,'','2015-06-29 03:16:07',NULL,NULL,1),(15,'ASSIGNEE','assignee','ASS',10,8,'','2015-06-29 03:16:32',NULL,NULL,1),(16,'SERVICE TYPE','service_type','ST',9,3,'','2015-06-29 03:17:00',NULL,NULL,1),(18,'ASSIGNEE EQUIPMENT','assignee_equipment','AE',13,8,'alladinx','2015-09-20 08:40:41','alladinx','2015-09-20 08:45:48',1),(19,'USER ASSIGNEE','user_assignee','UA',5,8,'alladinx','2015-09-20 10:57:20','alladinx','2015-09-20 11:01:35',1),(20,'ASSIGNEE COMPANY','assignee_company','AC',5,8,'alladinx','2015-09-20 11:01:26',NULL,NULL,1),(21,'INVOICING','invoicing','INV',4,8,'alladinx','2015-10-01 04:49:52',NULL,NULL,1),(22,'DEPARTMENT','department','D',5,4,'alladinx','2016-04-07 09:32:52','alladinx','2016-04-07 09:33:11',1),(23,'YEAR','year','Y',27,4,'alladinx','2016-04-14 05:27:10',NULL,NULL,1);

/*Table structure for table `customermaster` */

DROP TABLE IF EXISTS `customermaster`;

CREATE TABLE `customermaster` (
  `customerID` varchar(20) NOT NULL,
  `customerName` varchar(100) DEFAULT NULL,
  `customerEmailAddress` varchar(100) DEFAULT NULL,
  `customerAddress` varchar(100) DEFAULT NULL,
  `customerContactNo` varchar(50) DEFAULT NULL,
  `departmentName` varchar(100) DEFAULT NULL,
  `departmentAddress` varchar(100) DEFAULT NULL,
  `departmentEmailAddress` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`customerID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `customermaster` */

/*Table structure for table `departmentmaster` */

DROP TABLE IF EXISTS `departmentmaster`;

CREATE TABLE `departmentmaster` (
  `departmentID` varchar(20) NOT NULL,
  `departmentName` varchar(100) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`departmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `departmentmaster` */

insert  into `departmentmaster`(`departmentID`,`departmentName`,`createdDate`,`createdBy`,`modifiedDate`,`modifiedBy`,`status`) values ('D0001','IT - INFORMATION TECHNOLOGY','2016-04-07 10:10:36','alladinx',NULL,NULL,1),('D0002','FINANCE','2016-04-07 10:18:40','alladinx',NULL,NULL,1),('D0003','SALES','2016-04-13 04:03:29','alladinx',NULL,NULL,1),('D0004','MARKETING','2016-04-13 04:03:35','alladinx',NULL,NULL,1),('D0005','HR','2016-04-13 04:04:13','alladinx',NULL,NULL,1);

/*Table structure for table `equipmentmaster` */

DROP TABLE IF EXISTS `equipmentmaster`;

CREATE TABLE `equipmentmaster` (
  `equipmentID` varchar(20) NOT NULL,
  `photo` text NOT NULL,
  `assigneeID` varchar(20) NOT NULL,
  `customerID` varchar(20) NOT NULL,
  `companyID` varchar(20) NOT NULL,
  `categoryID` varchar(20) NOT NULL,
  `makeID` varchar(20) NOT NULL,
  `locationID` varchar(20) NOT NULL,
  `modelID` varchar(20) NOT NULL,
  `color` varchar(20) DEFAULT NULL,
  `mileageStart` int(11) DEFAULT NULL,
  `mileageEnd` int(11) DEFAULT NULL,
  `gasolineAllocationInLiters` int(11) DEFAULT NULL,
  `insuranceAppliedDate` datetime DEFAULT NULL,
  `insuranceReminderInDays` int(11) DEFAULT NULL,
  `purchaseDate` datetime DEFAULT NULL,
  `conductionSticker` varchar(20) DEFAULT NULL,
  `year` varchar(5) DEFAULT NULL,
  `plateNo` varchar(20) DEFAULT NULL,
  `engineNo` varchar(20) DEFAULT NULL,
  `chassisNo` varchar(20) DEFAULT NULL,
  `serialNo` varchar(20) DEFAULT NULL,
  `gasolineAllocationInCash` decimal(12,2) DEFAULT NULL,
  `insuranceExpirationDate` datetime DEFAULT NULL,
  `acquisitionCost` decimal(12,2) DEFAULT NULL,
  `insuranceCost` decimal(12,2) DEFAULT NULL,
  `registrationCost` decimal(12,2) DEFAULT NULL,
  `depresitionValue` decimal(12,2) DEFAULT NULL,
  `registrationDate` datetime DEFAULT NULL,
  `registrationExpiryDate` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`equipmentID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `equipmentmaster` */

insert  into `equipmentmaster`(`equipmentID`,`photo`,`assigneeID`,`customerID`,`companyID`,`categoryID`,`makeID`,`locationID`,`modelID`,`color`,`mileageStart`,`mileageEnd`,`gasolineAllocationInLiters`,`insuranceAppliedDate`,`insuranceReminderInDays`,`purchaseDate`,`conductionSticker`,`year`,`plateNo`,`engineNo`,`chassisNo`,`serialNo`,`gasolineAllocationInCash`,`insuranceExpirationDate`,`acquisitionCost`,`insuranceCost`,`registrationCost`,`depresitionValue`,`registrationDate`,`registrationExpiryDate`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('EQ00000004','spop.jpg','ASS00000008','','COM0001','CAT002','MAK001','LOC0001','MOD000001','BLACK',1,10,10,'2015-07-03 00:00:00',10,'2015-07-03 00:00:00','12345678','Y0026','123456','123456789','123456789','123456789','100.00','2015-07-03 00:00:00','100.00','100.00','100.00','100.00','2015-10-01 00:00:00','2016-10-01 00:00:00','alladinx','2015-07-03 09:18:00','alladinx','2016-04-14 08:50:11',1),('EQ00000005','gaskull_t-shirt.png','ASS00000009','','COM0001','CAT002','MAK002','LOC0001','MOD000010','BLACK',10,120,120,'2015-08-24 00:00:00',30,'2015-08-24 00:00:00','12345','Y0026','PL1254','123','123','123','5.00','2015-08-25 00:00:00','0.00','5.00','5.00','250.00','0000-00-00 00:00:00','2015-10-01 00:00:00','alladinx','2015-08-24 07:59:46','alladinx','2016-04-14 08:50:34',1),('EQ00000008','t-shirt3.jpg','ASS00000008','','COM0003','CAT002','MAK005','LOC0002','MOD000006','RED',500,550,120,'2015-09-01 00:00:00',10,'2015-08-01 00:00:00','25315','Y0026','25315','123456789','123456789','123456789','5000.00','2016-09-01 00:00:00','10000.00','5000.00','5000.00','500000.00','0000-00-00 00:00:00','0000-00-00 00:00:00','alladinx','2015-09-20 09:01:37','alladinx','2016-04-14 08:51:22',1);

/*Table structure for table `locationmaster` */

DROP TABLE IF EXISTS `locationmaster`;

CREATE TABLE `locationmaster` (
  `locationID` varchar(20) NOT NULL,
  `locationName` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`locationID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `locationmaster` */

insert  into `locationmaster`(`locationID`,`locationName`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('LOC0001','CEBU CITY','','2015-06-30 07:28:32','','2015-06-30 07:33:44',1),('LOC0002','MANILA','','2015-06-30 07:33:56','','2015-07-01 06:03:20',1);

/*Table structure for table `makemaster` */

DROP TABLE IF EXISTS `makemaster`;

CREATE TABLE `makemaster` (
  `makeID` varchar(20) NOT NULL,
  `makeName` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`makeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `makemaster` */

insert  into `makemaster`(`makeID`,`makeName`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('MAK002','HYUNDAI','alladinx','2015-06-29 04:17:31','alladinx','2015-06-29 04:27:00',1),('MAK001','HONDA','alladinx','2015-06-29 04:17:23','alladinx','2015-07-01 06:11:45',1),('MAK003','MITSUBISHI','alladinx','2015-06-29 04:17:43',NULL,NULL,1),('MAK004','SUZUKI','alladinx','2015-06-29 04:17:57',NULL,NULL,1),('MAK005','TOYOTA','alladinx','2015-06-29 04:18:08',NULL,NULL,1),('MAK006','KIA','alladinx','2015-06-29 04:18:17',NULL,NULL,1),('MAK007','AUDI','alladinx','2015-06-29 04:18:25',NULL,NULL,1),('MAK008','SUBARU','alladinx','2015-06-29 04:18:51',NULL,NULL,1),('MAK009','FORD','alladinx','2015-06-29 04:18:59',NULL,NULL,1),('MAK010','WAGOON','alladinx','2015-06-29 04:19:25',NULL,NULL,1),('MAK011','NISSAN','alladinx','2016-04-13 03:55:30',NULL,NULL,1);

/*Table structure for table `menumaster` */

DROP TABLE IF EXISTS `menumaster`;

CREATE TABLE `menumaster` (
  `menuID` varchar(20) NOT NULL,
  `menuName` varchar(100) DEFAULT NULL,
  `menuController` varchar(100) DEFAULT NULL,
  `isMenuMaintenance` int(11) DEFAULT NULL,
  `isMenuTransactions` int(11) DEFAULT NULL,
  `isMenuReport` int(11) DEFAULT NULL,
  `sortNo` int(11) DEFAULT NULL,
  `glyphicon` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`menuID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `menumaster` */

insert  into `menumaster`(`menuID`,`menuName`,`menuController`,`isMenuMaintenance`,`isMenuTransactions`,`isMenuReport`,`sortNo`,`glyphicon`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('M0001','Category','category',1,0,0,1,'fa fa-cart-plus','','2015-06-29 05:58:58','','2015-06-29 08:04:16',1),('M0002','Company','company',1,0,0,4,'fa fa-flag-checkered','','2015-06-29 06:05:33','','2015-06-29 08:11:50',1),('M0003','Make','make',1,0,0,2,'fa fa-car','','2015-06-29 06:06:09','','2015-06-29 08:12:16',1),('M0004','Control No','controlno',1,0,0,11,'fa fa-cog','','2015-06-29 06:06:45','','2015-06-29 08:26:18',1),('M0005','Location','location',1,0,0,5,'fa fa-flag-o','','2015-06-29 06:07:03','','2015-06-29 08:12:59',1),('M0006','Menu','menu',1,0,0,12,'fa fa-th-list','','2015-06-29 06:07:20','','2015-06-29 08:13:30',1),('M0007','Parts','parts',1,0,0,9,'fa fa-motorcycle','','2015-06-29 06:07:37','alladinx','2015-09-20 12:39:13',1),('M0008','Equipment','equipment',1,0,0,6,'fa fa-bus','','2015-06-29 06:07:59','','2015-06-29 08:14:53',1),('M0009','Equipment Model','model',1,0,0,3,'fa fa-ambulance','','2015-06-29 06:08:54','','2015-06-29 04:57:46',1),('M0010','Reminders','reminder',0,0,0,1,'fa fa-calendar','','2015-06-29 06:09:31','','2015-06-29 10:44:16',1),('M0011','Work Order','workorder',0,1,0,1,'fa fa-barcode','','2015-06-29 06:09:50','','2015-06-29 08:16:02',1),('M0012','PO Receiving','poreceiving',0,1,0,2,'fa fa-calendar-o','','2015-06-29 06:10:20','','2015-06-29 08:16:41',1),('M0013','Supplier','supplier',1,0,0,8,'fa fa-user','','2015-06-29 06:10:37','','2015-06-30 07:08:24',1),('M0014','Assignee','assignee',1,0,0,7,'fa fa-user','','2015-06-29 06:10:55','','2015-06-30 07:08:13',1),('M0015','Service Type','servicetype',1,0,0,10,'fa fa-wrench','','2015-06-29 06:11:15','','2015-06-29 08:24:59',1),('M0016','Invoicing','invoicing',0,1,0,3,'fa fa-shopping-cart','','2015-06-29 06:11:41','','2015-06-29 08:18:21',1),('M0019','No Work Order for 30','noworkorderfor30',0,0,1,3,'fa fa-calendar','','2015-06-29 06:13:50','alladinx','2016-04-07 10:45:57',0),('M0020','Work Order Report','workorderreport',0,0,1,4,'fa fa-calendar','','2015-06-29 06:14:18','alladinx','2016-04-07 10:46:05',0),('M0021','Upload Mileage','uploadmileage',0,1,0,4,'fa fa-arrow-up','','2015-06-29 06:14:57','','2015-06-29 08:24:10',1),('M0022','Users','user',1,0,0,13,'fa fa-users','','2015-06-29 06:15:21','','2015-06-29 08:24:22',1),('M0025','Configuration','configuration',1,0,0,14,'fa fa-wrench','alladinx','2015-10-05 01:56:55','alladinx','2015-10-05 01:58:01',1),('M0026','Equipment Registration','equipmentregistration_report',0,0,1,5,'fa fa-calendar','alladinx','2015-10-05 02:52:49','alladinx','2015-10-08 05:11:25',1),('M0027','Assignee License Registration','assigneelicenseregistration_report',0,0,1,6,'fa fa-calendar','alladinx','2015-10-08 05:12:34','alladinx','2015-10-08 05:32:25',1),('M0028','TBA Cost per Supplier','tba_cost_per_supplier',0,0,1,7,'fa fa-calendar','alladinx','2016-04-07 08:07:00','alladinx','2016-04-07 08:07:22',1),('M0029','Repair Cost per Department','repair_cost_per_department',0,0,1,8,'fa fa-calendar','alladinx','2016-04-07 08:08:06','alladinx','2016-04-07 10:35:24',1),('M0030','Repair Cost per Make','repair_cost_per_make',0,0,1,9,'fa fa-calendar','alladinx','2016-04-07 08:08:44','alladinx','2016-04-07 08:09:32',1),('M0031','Repair Cost per Supplier','repair_cost_per_supplier',0,0,1,10,'fa fa-calendar','alladinx','2016-04-07 08:09:13',NULL,NULL,1),('M0032','Equipment Master List','equipment_master_list',0,0,1,11,'fa fa-calendar','alladinx','2016-04-07 08:14:07','alladinx','2016-04-07 09:10:27',1),('M0033','Repair History','repair_history',0,0,1,12,'fa fa-calendar','alladinx','2016-04-07 08:14:28',NULL,NULL,1),('M0034','Department','department',1,0,0,15,'fa fa-calendar','alladinx','2016-04-07 09:41:43',NULL,NULL,1),('M0035','Year','year',1,0,0,16,'fa fa-calendar','alladinx','2016-04-14 05:13:59',NULL,NULL,1);

/*Table structure for table `modelmaster` */

DROP TABLE IF EXISTS `modelmaster`;

CREATE TABLE `modelmaster` (
  `modelID` varchar(20) NOT NULL,
  `description` text,
  `variant` varchar(50) DEFAULT NULL,
  `variantDescription` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`modelID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `modelmaster` */

insert  into `modelmaster`(`modelID`,`description`,`variant`,`variantDescription`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('MOD000001','CIVIC 4DRS 1.8','CIVIC 4DRS 1.8','CIVIC 4DRS 1.8','alladinx','2015-07-03 08:49:11','alladinx','2016-04-13 03:58:31',1),('MOD000002','CRV 2DRS 4X2','CRV 2DRS 4X2','CRV 2DRS 4X2','alladinx','2015-07-03 08:49:28','alladinx','2016-04-13 03:58:56',1),('MOD000003','CRV 2DRS 2.0','CRV 2DRS 2.0','CRV 2DRS 2.0','alladinx','2015-07-03 08:49:42','alladinx','2016-04-13 03:59:09',1),('MOD000004','XTRAIL','XTRAIL','XTRAIL','alladinx','2016-04-13 03:59:30',NULL,NULL,1),('MOD000005','PATROL SUPER SAFARI 3.0','PATROL SUPER SAFARI 3.0','PATROL SUPER SAFARI 3.0','alladinx','2016-04-13 03:59:41',NULL,NULL,1),('MOD000006','COROLLA ALTIS','COROLLA ALTIS','COROLLA ALTIS','alladinx','2016-04-13 03:59:54',NULL,NULL,1),('MOD000007','VIOS 1.3 J','VIOS 1.3 J','VIOS 1.3 J','alladinx','2016-04-13 04:00:09',NULL,NULL,1),('MOD000008','VIOS 1.5 G','VIOS 1.5 G','VIOS 1.5 G','alladinx','2016-04-13 04:00:21',NULL,NULL,1),('MOD000009','GETS','GETS','GETS','alladinx','2016-04-13 04:00:32','alladinx','2016-04-13 04:01:57',1),('MOD000010','ACCENT','ACCENT','ACCENT','alladinx','2016-04-13 04:00:47','alladinx','2016-04-13 04:01:33',1);

/*Table structure for table `partsmaster` */

DROP TABLE IF EXISTS `partsmaster`;

CREATE TABLE `partsmaster` (
  `partsID` varchar(20) NOT NULL,
  `stockCode` varchar(50) DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `model` varchar(100) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `stockOnHand` int(11) DEFAULT NULL,
  `lowStockQty` int(11) DEFAULT NULL,
  `price` decimal(12,2) DEFAULT NULL,
  `retailPrice` decimal(12,2) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`partsID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `partsmaster` */

insert  into `partsmaster`(`partsID`,`stockCode`,`brand`,`model`,`description`,`stockOnHand`,`lowStockQty`,`price`,`retailPrice`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('PAR00000001','SC01','PARTS1','PARTS1','TIRES',100,10,'150.00','120.00','alladinx','2015-07-09 03:31:31','alladinx','2015-10-15 07:06:47',1),('PAR00000002','SC02','PARTS2','PARTS2','BATTERIES',100,10,'250.00','200.00','alladinx','2015-07-09 03:32:04','alladinx','2015-10-15 07:09:30',1),('PAR00000003','SC03','PARTS3','PARTS3','WIPERS',100,10,'0.00','0.00','alladinx','2015-10-15 07:07:34',NULL,NULL,1),('PAR00000004','SC04','PARTS4','PARTS4','MATS',100,10,'0.00','0.00','alladinx','2015-10-15 07:07:56',NULL,NULL,1),('PAR00000005','SC05','PARTS5','PARTS5','TINT',100,10,'0.00','0.00','alladinx','2015-10-15 07:08:46',NULL,NULL,1),('PAR00000006','SC06','PARTS6','PARTS6','MISCELLANEOUS',100,10,'0.00','0.00','alladinx','2015-10-15 07:09:15',NULL,NULL,1);

/*Table structure for table `poreceiving` */

DROP TABLE IF EXISTS `poreceiving`;

CREATE TABLE `poreceiving` (
  `poReferenceNo` varchar(20) NOT NULL,
  `woReferenceNo` varchar(20) NOT NULL,
  `poTransactionDate` datetime DEFAULT NULL,
  `labor` decimal(12,2) DEFAULT NULL,
  `miscellaneous` decimal(12,2) DEFAULT NULL,
  `parts` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `tax` decimal(12,2) DEFAULT NULL,
  `Amount` decimal(12,2) DEFAULT NULL,
  `attachment` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '0',
  PRIMARY KEY (`poReferenceNo`,`woReferenceNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `poreceiving` */

insert  into `poreceiving`(`poReferenceNo`,`woReferenceNo`,`poTransactionDate`,`labor`,`miscellaneous`,`parts`,`discount`,`tax`,`Amount`,`attachment`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('PO00000001','WO00000011','2016-03-02 01:51:42','100.00','200.00','300.00','50.00','10.00','560.00','cf.jpg','alladinx','2016-03-02 01:51:42','alladinx','2016-03-02 01:53:28',1);

/*Table structure for table `remindermaster` */

DROP TABLE IF EXISTS `remindermaster`;

CREATE TABLE `remindermaster` (
  `reminderID` varchar(20) NOT NULL,
  `title` text,
  `description` text,
  `location` text,
  `category` varchar(100) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `dueDate` datetime DEFAULT NULL,
  `reminderFromDt` datetime DEFAULT NULL,
  `reminderToDt` datetime DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`reminderID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `remindermaster` */

/*Table structure for table `servicetypemaster` */

DROP TABLE IF EXISTS `servicetypemaster`;

CREATE TABLE `servicetypemaster` (
  `serviceTypeID` varchar(20) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`serviceTypeID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `servicetypemaster` */

insert  into `servicetypemaster`(`serviceTypeID`,`description`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('ST002','PMS','alladinx','2015-07-01 07:40:31','','2015-07-01 07:43:50',1),('ST003','AC','alladinx','2016-04-13 03:47:50',NULL,NULL,1),('ST004','ELEC','alladinx','2016-04-13 03:48:09',NULL,NULL,1),('ST005','MECH','alladinx','2016-04-13 03:48:21',NULL,NULL,1),('ST006','BODY','alladinx','2016-04-13 03:48:32',NULL,NULL,1),('ST007','DETAILING','alladinx','2016-04-13 03:48:45',NULL,NULL,1),('ST008','RP','alladinx','2016-04-13 03:48:51',NULL,NULL,1),('ST009','OTHERS','alladinx','2016-04-13 03:48:57',NULL,NULL,1);

/*Table structure for table `suppliermaster` */

DROP TABLE IF EXISTS `suppliermaster`;

CREATE TABLE `suppliermaster` (
  `supplierID` varchar(20) NOT NULL,
  `supplierName` varchar(100) DEFAULT NULL,
  `supplierAddress` text,
  `supplierContactNo` varchar(50) DEFAULT NULL,
  `supplierEmailAddress` varchar(50) DEFAULT NULL,
  `contactPerson` varchar(100) DEFAULT NULL,
  `TIN` varchar(20) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`supplierID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `suppliermaster` */

insert  into `suppliermaster`(`supplierID`,`supplierName`,`supplierAddress`,`supplierContactNo`,`supplierEmailAddress`,`contactPerson`,`TIN`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('SUP00000002','AS','A','A','A','A','A','alladinx','2015-07-08 04:02:06','alladinx','2015-07-08 04:56:17',1);

/*Table structure for table `usermaster` */

DROP TABLE IF EXISTS `usermaster`;

CREATE TABLE `usermaster` (
  `userID` varchar(20) NOT NULL,
  `userPass` text,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `userType` varchar(20) DEFAULT NULL,
  `accessLevel` varchar(20) DEFAULT NULL,
  `userPic` text,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`userID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usermaster` */

insert  into `usermaster`(`userID`,`userPass`,`firstname`,`lastname`,`userType`,`accessLevel`,`userPic`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('alladinx','1bc338feb61fddd765cfb74e0c1979c0','REY','CAST','1','1','cf.jpg','','2015-06-29 07:25:54','alladinx','2015-09-10 02:15:19',1),('noelsr','9be7b246d18e8ac9578e39f5680738c3','NOEL','RODRIGUEZ','1','1','spop.png','alladinx','2015-07-09 03:33:55',NULL,NULL,1),('reycast','89df3b0191b57e37d382336e445c2dd9','REYCAST','REYCAST','2','3','spop.png','','2015-06-30 07:14:09','','2015-07-01 07:19:04',1);

/*Table structure for table `usermenu` */

DROP TABLE IF EXISTS `usermenu`;

CREATE TABLE `usermenu` (
  `userID` varchar(20) NOT NULL,
  `menuID` varchar(20) NOT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  PRIMARY KEY (`userID`,`menuID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `usermenu` */

insert  into `usermenu`(`userID`,`menuID`,`createdBy`,`createdDate`) values ('alladinx','M0001','alladinx','2015-07-08 08:00:38'),('alladinx','M0002','alladinx','2015-07-08 08:11:58'),('alladinx','M0003','alladinx','2015-07-08 08:12:05'),('alladinx','M0004','alladinx','2015-07-08 08:12:13'),('alladinx','M0005','alladinx','2015-07-08 08:12:17'),('alladinx','M0006','alladinx','2015-07-08 08:12:21'),('alladinx','M0007','alladinx','2015-07-08 08:12:24'),('alladinx','M0008','alladinx','2015-07-08 08:12:28'),('alladinx','M0009','alladinx','2015-07-08 08:12:33'),('alladinx','M0010','alladinx','2015-07-08 08:12:37'),('alladinx','M0011','alladinx','2015-07-08 08:35:20'),('alladinx','M0012','alladinx','2015-07-08 08:12:54'),('alladinx','M0013','alladinx','2015-07-08 08:12:57'),('alladinx','M0014','alladinx','2015-07-08 08:13:00'),('alladinx','M0015','alladinx','2015-07-08 08:13:03'),('alladinx','M0016','alladinx','2015-07-08 08:13:06'),('alladinx','M0017','alladinx','2015-07-08 08:13:10'),('alladinx','M0018','alladinx','2015-07-08 08:13:13'),('alladinx','M0019','alladinx','2015-07-08 08:13:16'),('alladinx','M0020','alladinx','2015-07-08 08:13:21'),('alladinx','M0021','alladinx','2015-07-08 08:13:25'),('alladinx','M0022','alladinx','2015-07-08 08:13:28'),('alladinx','M0025','alladinx','2015-10-05 03:08:41'),('alladinx','M0026','alladinx','2015-10-05 03:08:44'),('alladinx','M0027','alladinx','2015-10-08 05:16:38'),('alladinx','M0028','alladinx','2016-04-07 08:15:00'),('alladinx','M0029','alladinx','2016-04-07 08:15:04'),('alladinx','M0030','alladinx','2016-04-07 08:15:06'),('alladinx','M0031','alladinx','2016-04-07 08:15:09'),('alladinx','M0032','alladinx','2016-04-07 08:15:12'),('alladinx','M0033','alladinx','2016-04-07 08:15:15'),('noelsr','M0001','alladinx','2016-04-07 08:16:13'),('noelsr','M0002','alladinx','2016-04-07 08:16:16'),('noelsr','M0003','alladinx','2016-04-07 08:16:21'),('noelsr','M0004','alladinx','2016-04-07 08:16:23'),('noelsr','M0005','alladinx','2016-04-07 08:16:25'),('noelsr','M0006','alladinx','2016-04-07 08:16:27'),('noelsr','M0007','alladinx','2016-04-07 08:16:29'),('noelsr','M0008','alladinx','2016-04-07 08:16:31'),('noelsr','M0009','alladinx','2016-04-07 08:16:33'),('noelsr','M0010','alladinx','2016-04-07 08:16:35'),('noelsr','M0011','alladinx','2016-04-07 08:16:37'),('noelsr','M0012','alladinx','2016-04-07 08:16:39'),('noelsr','M0013','alladinx','2016-04-07 08:16:41'),('noelsr','M0014','alladinx','2016-04-07 08:16:43'),('noelsr','M0015','alladinx','2016-04-07 08:16:45'),('noelsr','M0016','alladinx','2016-04-07 08:16:47'),('noelsr','M0019','alladinx','2016-04-07 08:16:51'),('noelsr','M0020','alladinx','2016-04-07 08:16:53'),('noelsr','M0021','alladinx','2016-04-07 08:16:55'),('noelsr','M0022','alladinx','2016-04-07 08:16:56'),('noelsr','M0025','alladinx','2016-04-07 08:16:58'),('noelsr','M0026','alladinx','2016-04-07 08:17:00'),('noelsr','M0027','alladinx','2016-04-07 08:17:02'),('noelsr','M0028','alladinx','2016-04-07 08:17:04'),('noelsr','M0029','alladinx','2016-04-07 08:17:06'),('noelsr','M0030','alladinx','2016-04-07 08:17:08'),('noelsr','M0031','alladinx','2016-04-07 08:17:10'),('noelsr','M0032','alladinx','2016-04-07 08:17:13'),('noelsr','M0033','alladinx','2016-04-07 08:17:15'),('alladinx','M0034','alladinx','2016-04-07 09:41:57'),('noelsr','M0034','alladinx','2016-04-07 09:42:24'),('alladinx','M0035','alladinx','2016-04-14 05:14:19'),('noelsr','M0035','alladinx','2016-04-14 05:14:31'),('reycast','M0019','alladinx','2016-04-14 05:15:07'),('reycast','M0035','alladinx','2016-04-14 05:17:10');

/*Table structure for table `workorderdetail` */

DROP TABLE IF EXISTS `workorderdetail`;

CREATE TABLE `workorderdetail` (
  `woReferenceNo` varchar(20) NOT NULL,
  `partsID` varchar(20) NOT NULL,
  `partsName` varchar(100) DEFAULT NULL,
  `partsPrice` decimal(10,2) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `seqNo` int(2) NOT NULL DEFAULT '1',
  PRIMARY KEY (`woReferenceNo`,`partsID`,`seqNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `workorderdetail` */

insert  into `workorderdetail`(`woReferenceNo`,`partsID`,`partsName`,`partsPrice`,`qty`,`seqNo`) values ('WO00000010','PAR00000002','asd','250.00',2,1),('WO00000014','PAR00000001',NULL,'150.00',4,1),('WO00000014','PAR00000002',NULL,'400.00',1,2),('WO00000014','PAR00000005',NULL,'200.00',1,3),('WO00000015','PAR00000002',NULL,'100.00',2,1),('WO00000015','PAR00000004',NULL,'100.00',3,2),('WO00000017','PAR00000001',NULL,'255.00',4,1),('WO00000018','PAR00000002',NULL,'750.00',1,1),('WO00000018','PAR00000005',NULL,'250.00',4,2);

/*Table structure for table `workordermaster` */

DROP TABLE IF EXISTS `workordermaster`;

CREATE TABLE `workordermaster` (
  `woReferenceNo` varchar(20) NOT NULL,
  `woTransactionDate` datetime DEFAULT NULL,
  `invoiceReferenceNo` varchar(20) DEFAULT NULL,
  `invoiceDate` datetime DEFAULT NULL,
  `serviceTypeID` varchar(20) DEFAULT NULL,
  `equipmentID` varchar(20) DEFAULT NULL,
  `meter` int(11) DEFAULT NULL,
  `startDate` datetime DEFAULT NULL,
  `completionDate` datetime DEFAULT NULL,
  `remarks` longtext,
  `approverRemarks` longtext,
  `supplierID` varchar(20) DEFAULT NULL,
  `labor` decimal(12,2) DEFAULT NULL,
  `miscellaneous` decimal(12,2) DEFAULT NULL,
  `parts` decimal(12,2) DEFAULT NULL,
  `discount` decimal(12,2) DEFAULT NULL,
  `tax` decimal(12,2) DEFAULT NULL,
  `subTotal` decimal(12,2) DEFAULT NULL,
  `totalCost` decimal(12,2) DEFAULT NULL,
  `invoiceAmount` decimal(12,2) DEFAULT NULL,
  `varianceAmount` decimal(12,2) DEFAULT NULL,
  `variance` decimal(12,2) DEFAULT NULL,
  `isWarranty` int(11) DEFAULT NULL,
  `isBackJob` int(11) DEFAULT NULL,
  `approvedDate` datetime DEFAULT NULL,
  `billedDate` datetime DEFAULT NULL,
  `url` varchar(50) DEFAULT NULL,
  `isSent` int(11) DEFAULT '0',
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  PRIMARY KEY (`woReferenceNo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `workordermaster` */

insert  into `workordermaster`(`woReferenceNo`,`woTransactionDate`,`invoiceReferenceNo`,`invoiceDate`,`serviceTypeID`,`equipmentID`,`meter`,`startDate`,`completionDate`,`remarks`,`approverRemarks`,`supplierID`,`labor`,`miscellaneous`,`parts`,`discount`,`tax`,`subTotal`,`totalCost`,`invoiceAmount`,`varianceAmount`,`variance`,`isWarranty`,`isBackJob`,`approvedDate`,`billedDate`,`url`,`isSent`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('WO00000006','2015-09-17 08:35:48',NULL,NULL,'ST002','EQ00000004',4443,'2015-09-18 00:00:00','2015-09-25 00:00:00','testing','proceed','SUP00000002','100.00','200.00','550.00','55.00','95.40','795.00','890.40',NULL,NULL,NULL,0,0,'2015-09-17 08:37:15','2015-10-02 12:05:32','201509170909nt0qJtvQ1X',1,'alladinx','2015-09-17 08:35:48','alladinx','2015-10-12 02:52:47',4),('WO00000010','2015-09-25 09:13:59','INV00000001','2015-12-04 07:15:49','ST002','EQ00000005',2323,'2015-09-25 00:00:00','2015-12-04 00:00:00','asdfasdf','testt','SUP00000002','100.00','200.00','0.00','0.00','36.00','300.00','336.00','10.00','10.00','100.00',0,0,'2015-09-25 02:00:06','2015-10-18 03:23:55','201509251241OzQSxTMbaI',1,'alladinx','2015-09-25 09:13:59','alladinx','2015-12-04 07:15:49',6),('WO00000011','2016-03-02 06:26:08',NULL,NULL,'ST002','EQ00000004',10,NULL,NULL,'asdf','adfsdf',NULL,'0.00','0.00','0.00','0.00','0.00','0.00','0.00',NULL,NULL,NULL,1,0,'2016-03-02 01:56:45',NULL,'201603020626gDSnnFk2Fy',0,'alladinx','2016-03-02 06:26:08','alladinx','2016-03-02 06:26:46',2),('WO00000014','2016-03-18 06:28:04','INV00000001','2016-03-18 07:28:15','ST002','EQ00000004',212,'2016-03-18 00:00:00','2016-03-18 00:00:00','test','test2','SUP00000002','200.00','150.00','1200.00','100.00','186.00','1450.00','1636.00','20000000.00','3000000.00','0.12',0,0,'2016-03-18 07:18:55','2016-03-18 07:28:15','201603180718RbAY6mxkmN',0,'alladinx','2016-03-18 06:28:04','alladinx','2016-03-18 07:28:15',6),('WO00000017','2016-04-07 07:04:39','INV00000003','2016-04-07 04:29:36','ST002','EQ00000005',12345,'2016-04-07 00:00:00','2016-04-08 00:00:00','jhbuh',NULL,'SUP00000002','350.00','250.00','1020.00','150.00','176.40','1470.00','1646.40','1450.00','196.40','11.93',0,0,NULL,'2016-04-07 04:29:36','201604070705iGUtPQyXv2',0,'alladinx','2016-04-07 07:04:39','alladinx','2016-04-07 04:29:36',5),('WO00000018','2016-04-07 04:33:58','INV00000004','2016-04-07 04:37:54','ST003','EQ00000004',1756,'2016-04-07 00:00:00','2016-04-08 00:00:00','adsg','asdf','SUP00000002','250.00','150.00','1750.00','100.00','246.00','2050.00','2296.00','2200.00','96.00','4.18',0,0,'2016-04-07 04:36:27','2016-04-07 04:37:54','201604071634rNlglgjIqs',0,'alladinx','2016-04-07 04:33:58','alladinx','2016-04-07 04:37:54',6);

/*Table structure for table `yearmaster` */

DROP TABLE IF EXISTS `yearmaster`;

CREATE TABLE `yearmaster` (
  `yearID` varchar(20) NOT NULL,
  `description` varchar(5) DEFAULT NULL,
  `createdBy` varchar(20) DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` varchar(20) DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  `status` int(1) DEFAULT '1',
  PRIMARY KEY (`yearID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*Data for the table `yearmaster` */

insert  into `yearmaster`(`yearID`,`description`,`createdBy`,`createdDate`,`modifiedBy`,`modifiedDate`,`status`) values ('Y0001','1990','alladinx','2016-04-14 05:27:39',NULL,NULL,1),('Y0002','1991','alladinx','2016-04-14 05:27:58',NULL,NULL,1),('Y0003','1992','alladinx','2016-04-14 05:28:04',NULL,NULL,1),('Y0004','1993','alladinx','2016-04-14 05:28:10',NULL,NULL,1),('Y0005','1994','alladinx','2016-04-14 05:28:17',NULL,NULL,1),('Y0006','1995','alladinx','2016-04-14 05:28:23',NULL,NULL,1),('Y0007','1996','alladinx','2016-04-14 05:28:29',NULL,NULL,1),('Y0008','1997','alladinx','2016-04-14 05:28:37',NULL,NULL,1),('Y0009','1998','alladinx','2016-04-14 05:28:43',NULL,NULL,1),('Y0010','1999','alladinx','2016-04-14 05:28:49',NULL,NULL,1),('Y0011','2000','alladinx','2016-04-14 05:28:55',NULL,NULL,1),('Y0012','2001','alladinx','2016-04-14 05:29:01',NULL,NULL,1),('Y0013','2002','alladinx','2016-04-14 05:29:06',NULL,NULL,1),('Y0014','2003','alladinx','2016-04-14 05:29:12',NULL,NULL,1),('Y0015','2004','alladinx','2016-04-14 05:29:18',NULL,NULL,1),('Y0016','2005','alladinx','2016-04-14 05:29:24',NULL,NULL,1),('Y0017','2006','alladinx','2016-04-14 05:29:29',NULL,NULL,1),('Y0018','2007','alladinx','2016-04-14 05:29:35',NULL,NULL,1),('Y0019','2008','alladinx','2016-04-14 05:30:20',NULL,NULL,1),('Y0020','2009','alladinx','2016-04-14 05:30:28',NULL,NULL,1),('Y0021','2010','alladinx','2016-04-14 05:30:35',NULL,NULL,1),('Y0022','2011','alladinx','2016-04-14 05:30:40',NULL,NULL,1),('Y0023','2012','alladinx','2016-04-14 05:30:46',NULL,NULL,1),('Y0024','2013','alladinx','2016-04-14 05:30:51',NULL,NULL,1),('Y0025','2014','alladinx','2016-04-14 05:30:56',NULL,NULL,1),('Y0026','2015','alladinx','2016-04-14 05:36:52',NULL,NULL,1),('Y0027','2016','alladinx','2016-04-14 05:36:59','alladinx','2016-04-14 05:39:07',1);

/*Table structure for table `v_assigneecompanymapper` */

DROP TABLE IF EXISTS `v_assigneecompanymapper`;

/*!50001 DROP VIEW IF EXISTS `v_assigneecompanymapper` */;
/*!50001 DROP TABLE IF EXISTS `v_assigneecompanymapper` */;

/*!50001 CREATE TABLE  `v_assigneecompanymapper`(
 `id` varchar(20) ,
 `assigneeID` varchar(20) ,
 `assigneeName` varchar(201) ,
 `companyID` varchar(20) ,
 `companyName` text ,
 `companyLogo` text ,
 `type` varchar(20) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime 
)*/;

/*Table structure for table `v_assigneeequipment` */

DROP TABLE IF EXISTS `v_assigneeequipment`;

/*!50001 DROP VIEW IF EXISTS `v_assigneeequipment` */;
/*!50001 DROP TABLE IF EXISTS `v_assigneeequipment` */;

/*!50001 CREATE TABLE  `v_assigneeequipment`(
 `id` varchar(20) ,
 `assigneeID` varchar(20) ,
 `assigneeName` varchar(201) ,
 `companyName` text ,
 `department` varchar(20) ,
 `alocationName` varchar(100) ,
 `astatus` int(11) ,
 `astatusDesc` varchar(8) ,
 `equipmentID` varchar(20) ,
 `plateNo` varchar(20) ,
 `makeName` varchar(100) ,
 `modelName` text ,
 `year` varchar(5) ,
 `elocationName` varchar(100) ,
 `estatus` int(11) ,
 `estatusDesc` varchar(9) ,
 `assignedStart` datetime ,
 `assignedEnd` datetime ,
 `isCurrent` int(11) ,
 `isCurrentDesc` varchar(3) ,
 `remarks` longtext 
)*/;

/*Table structure for table `v_assigneemaster` */

DROP TABLE IF EXISTS `v_assigneemaster`;

/*!50001 DROP VIEW IF EXISTS `v_assigneemaster` */;
/*!50001 DROP TABLE IF EXISTS `v_assigneemaster` */;

/*!50001 CREATE TABLE  `v_assigneemaster`(
 `assigneeID` varchar(20) ,
 `companyID` varchar(20) ,
 `companyName` text ,
 `locationID` varchar(20) ,
 `locationName` varchar(100) ,
 `firstname` varchar(100) ,
 `lastname` varchar(100) ,
 `assigneeName` varchar(201) ,
 `gender` varchar(10) ,
 `age` int(11) ,
 `contactNo1` varchar(20) ,
 `contactNo2` varchar(20) ,
 `address` text ,
 `costCenter` varchar(100) ,
 `immediateHead` varchar(100) ,
 `emailAddress` varchar(50) ,
 `department` varchar(20) ,
 `departmentName` varchar(100) ,
 `attachment` text ,
 `licenseNo` varchar(50) ,
 `licenseRegistrationDate` datetime ,
 `expirationDate` datetime ,
 `licenseAddress` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `v_categorymaster` */

DROP TABLE IF EXISTS `v_categorymaster`;

/*!50001 DROP VIEW IF EXISTS `v_categorymaster` */;
/*!50001 DROP TABLE IF EXISTS `v_categorymaster` */;

/*!50001 CREATE TABLE  `v_categorymaster`(
 `categoryID` varchar(20) ,
 `categoryName` varchar(100) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_companymaster` */

DROP TABLE IF EXISTS `v_companymaster`;

/*!50001 DROP VIEW IF EXISTS `v_companymaster` */;
/*!50001 DROP TABLE IF EXISTS `v_companymaster` */;

/*!50001 CREATE TABLE  `v_companymaster`(
 `companyID` varchar(20) ,
 `companyName` text ,
 `companyAddress` text ,
 `companyContactNo` varchar(50) ,
 `companyLogo` text ,
 `signature` text ,
 `daysOfNotification` int(11) ,
 `insuranceAppliedDate` datetime ,
 `insuranceExpirationDate` datetime ,
 `insuranceReminderInDays` int(11) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varbinary(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_configuration` */

DROP TABLE IF EXISTS `v_configuration`;

/*!50001 DROP VIEW IF EXISTS `v_configuration` */;
/*!50001 DROP TABLE IF EXISTS `v_configuration` */;

/*!50001 CREATE TABLE  `v_configuration`(
 `id` int(11) ,
 `type` varchar(20) ,
 `code` varchar(20) ,
 `description` varchar(100) ,
 `value` longtext ,
 `remarks` longtext ,
 `status` int(11) 
)*/;

/*Table structure for table `v_controlnomaster` */

DROP TABLE IF EXISTS `v_controlnomaster`;

/*!50001 DROP VIEW IF EXISTS `v_controlnomaster` */;
/*!50001 DROP TABLE IF EXISTS `v_controlnomaster` */;

/*!50001 CREATE TABLE  `v_controlnomaster`(
 `id` int(11) ,
 `description` varchar(100) ,
 `type` varchar(100) ,
 `code` varchar(20) ,
 `lastDigit` int(20) ,
 `noOfDigit` int(2) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `statusDesc` varchar(8) 
)*/;

/*Table structure for table `v_departmentmaster` */

DROP TABLE IF EXISTS `v_departmentmaster`;

/*!50001 DROP VIEW IF EXISTS `v_departmentmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_departmentmaster` */;

/*!50001 CREATE TABLE  `v_departmentmaster`(
 `departmentID` varchar(20) ,
 `departmentName` varchar(100) ,
 `createdDate` datetime ,
 `createdBy` varchar(20) ,
 `modifiedDate` datetime ,
 `modifiedBy` varchar(20) ,
 `status` int(1) 
)*/;

/*Table structure for table `v_equipmentmaster` */

DROP TABLE IF EXISTS `v_equipmentmaster`;

/*!50001 DROP VIEW IF EXISTS `v_equipmentmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_equipmentmaster` */;

/*!50001 CREATE TABLE  `v_equipmentmaster`(
 `equipmentID` varchar(20) ,
 `photo` text ,
 `assigneeID` varchar(20) ,
 `assigneeName` varchar(201) ,
 `companyID` varchar(20) ,
 `companyName` text ,
 `department` varchar(100) ,
 `categoryID` varchar(20) ,
 `categoryName` varchar(100) ,
 `makeID` varchar(20) ,
 `makeName` varchar(100) ,
 `locationID` varchar(20) ,
 `locationName` varchar(100) ,
 `modelID` varchar(20) ,
 `modelName` text ,
 `color` varchar(20) ,
 `mileageStart` int(11) ,
 `mileageEnd` int(11) ,
 `purchaseDate` datetime ,
 `conductionSticker` varchar(20) ,
 `year` varchar(5) ,
 `yearDesc` varchar(5) ,
 `plateNo` varchar(20) ,
 `engineNo` varchar(20) ,
 `chassisNo` varchar(20) ,
 `serialNo` varchar(20) ,
 `gasolineAllocationInLiters` int(11) ,
 `gasolineAllocationInCash` decimal(12,2) ,
 `insuranceAppliedDate` datetime ,
 `insuranceExpirationDate` datetime ,
 `insuranceReminderInDays` int(11) ,
 `registrationDate` datetime ,
 `registrationExpiryDate` datetime ,
 `acquisitionCost` decimal(12,2) ,
 `insuranceCost` decimal(12,2) ,
 `registrationCost` decimal(12,2) ,
 `depresitionValue` decimal(12,2) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `statusDesc` varchar(9) 
)*/;

/*Table structure for table `v_equipmentrepaireddetail` */

DROP TABLE IF EXISTS `v_equipmentrepaireddetail`;

/*!50001 DROP VIEW IF EXISTS `v_equipmentrepaireddetail` */;
/*!50001 DROP TABLE IF EXISTS `v_equipmentrepaireddetail` */;

/*!50001 CREATE TABLE  `v_equipmentrepaireddetail`(
 `woReferenceNo` varchar(20) ,
 `woTransactionDate` datetime ,
 `serviceTypeID` varchar(20) ,
 `serviceType` varchar(100) ,
 `equipmentID` varchar(20) ,
 `plateNo` varchar(20) ,
 `companyID` varchar(20) ,
 `assignee` varchar(201) ,
 `immediateHead` varchar(100) ,
 `immediateEmailAddr` varchar(50) ,
 `meter` int(11) ,
 `startDate` datetime ,
 `completionDate` datetime ,
 `remarks` longtext ,
 `approverRemarks` longtext ,
 `labor` decimal(12,2) ,
 `miscellaneous` decimal(12,2) ,
 `parts` decimal(12,2) ,
 `discount` decimal(12,2) ,
 `subTotal` decimal(12,2) ,
 `tax` decimal(12,2) ,
 `totalCost` decimal(12,2) ,
 `isWarranty` int(11) ,
 `isWarrantyDesc` varchar(3) ,
 `isBackJob` int(11) ,
 `isBackJobDesc` varchar(3) ,
 `approvedDate` datetime ,
 `billedDate` datetime ,
 `url` varchar(50) ,
 `isSent` int(11) ,
 `createdByName` varchar(101) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `statusDesc` varchar(12) 
)*/;

/*Table structure for table `v_equipmentrepairedmaster` */

DROP TABLE IF EXISTS `v_equipmentrepairedmaster`;

/*!50001 DROP VIEW IF EXISTS `v_equipmentrepairedmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_equipmentrepairedmaster` */;

/*!50001 CREATE TABLE  `v_equipmentrepairedmaster`(
 `companyID` varchar(20) ,
 `companyName` text ,
 `noOfTransactions` bigint(21) 
)*/;

/*Table structure for table `v_locationmaster` */

DROP TABLE IF EXISTS `v_locationmaster`;

/*!50001 DROP VIEW IF EXISTS `v_locationmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_locationmaster` */;

/*!50001 CREATE TABLE  `v_locationmaster`(
 `locationID` varchar(20) ,
 `locationName` varchar(100) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_makemaster` */

DROP TABLE IF EXISTS `v_makemaster`;

/*!50001 DROP VIEW IF EXISTS `v_makemaster` */;
/*!50001 DROP TABLE IF EXISTS `v_makemaster` */;

/*!50001 CREATE TABLE  `v_makemaster`(
 `makeID` varchar(20) ,
 `makeName` varchar(100) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_menumaster` */

DROP TABLE IF EXISTS `v_menumaster`;

/*!50001 DROP VIEW IF EXISTS `v_menumaster` */;
/*!50001 DROP TABLE IF EXISTS `v_menumaster` */;

/*!50001 CREATE TABLE  `v_menumaster`(
 `menuID` varchar(20) ,
 `menuName` varchar(100) ,
 `menuController` varchar(100) ,
 `isMenuMaintenance` int(11) ,
 `isMenuMaintenanceDesc` varchar(3) ,
 `isMenuTransactions` int(11) ,
 `isMenuTransactionsDesc` varchar(3) ,
 `isMenuReport` int(11) ,
 `isMenuReportDesc` varchar(3) ,
 `sortNo` int(11) ,
 `glyphicon` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_modelmaster` */

DROP TABLE IF EXISTS `v_modelmaster`;

/*!50001 DROP VIEW IF EXISTS `v_modelmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_modelmaster` */;

/*!50001 CREATE TABLE  `v_modelmaster`(
 `modelID` varchar(20) ,
 `description` text ,
 `variant` varchar(50) ,
 `variantDescription` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_partsmaster` */

DROP TABLE IF EXISTS `v_partsmaster`;

/*!50001 DROP VIEW IF EXISTS `v_partsmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_partsmaster` */;

/*!50001 CREATE TABLE  `v_partsmaster`(
 `partsID` varchar(20) ,
 `stockCode` varchar(50) ,
 `brand` varchar(100) ,
 `model` varchar(100) ,
 `description` varchar(100) ,
 `stockOnHand` int(11) ,
 `lowStockQty` int(11) ,
 `price` decimal(12,2) ,
 `retailPrice` decimal(12,2) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_poreceiving` */

DROP TABLE IF EXISTS `v_poreceiving`;

/*!50001 DROP VIEW IF EXISTS `v_poreceiving` */;
/*!50001 DROP TABLE IF EXISTS `v_poreceiving` */;

/*!50001 CREATE TABLE  `v_poreceiving`(
 `poReferenceNo` varchar(20) ,
 `woReferenceNo` varchar(20) ,
 `poTransactionDate` datetime ,
 `labor` decimal(12,2) ,
 `miscellaneous` decimal(12,2) ,
 `parts` decimal(12,2) ,
 `discount` decimal(12,2) ,
 `tax` decimal(12,2) ,
 `Amount` decimal(12,2) ,
 `attachment` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(1) ,
 `statusDesc` varchar(6) 
)*/;

/*Table structure for table `v_remindermaster` */

DROP TABLE IF EXISTS `v_remindermaster`;

/*!50001 DROP VIEW IF EXISTS `v_remindermaster` */;
/*!50001 DROP TABLE IF EXISTS `v_remindermaster` */;

/*!50001 CREATE TABLE  `v_remindermaster`(
 `reminderID` varchar(20) ,
 `title` text ,
 `description` text ,
 `location` text ,
 `category` varchar(100) ,
 `startDate` datetime ,
 `dueDate` datetime ,
 `reminderFromDt` datetime ,
 `reminderToDt` datetime ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `userPic` text 
)*/;

/*Table structure for table `v_servicetypemaster` */

DROP TABLE IF EXISTS `v_servicetypemaster`;

/*!50001 DROP VIEW IF EXISTS `v_servicetypemaster` */;
/*!50001 DROP TABLE IF EXISTS `v_servicetypemaster` */;

/*!50001 CREATE TABLE  `v_servicetypemaster`(
 `serviceTypeID` varchar(20) ,
 `description` varchar(100) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_suppliermaster` */

DROP TABLE IF EXISTS `v_suppliermaster`;

/*!50001 DROP VIEW IF EXISTS `v_suppliermaster` */;
/*!50001 DROP TABLE IF EXISTS `v_suppliermaster` */;

/*!50001 CREATE TABLE  `v_suppliermaster`(
 `supplierID` varchar(20) ,
 `supplierName` varchar(100) ,
 `supplierAddress` text ,
 `supplierContactNo` varchar(50) ,
 `supplierEmailAddress` varchar(50) ,
 `contactPerson` varchar(100) ,
 `TIN` varchar(20) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_userassigneemapper` */

DROP TABLE IF EXISTS `v_userassigneemapper`;

/*!50001 DROP VIEW IF EXISTS `v_userassigneemapper` */;
/*!50001 DROP TABLE IF EXISTS `v_userassigneemapper` */;

/*!50001 CREATE TABLE  `v_userassigneemapper`(
 `userID` varchar(20) ,
 `userName` varchar(101) ,
 `assigneeID` varchar(20) ,
 `assigneeName` varchar(201) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime 
)*/;

/*Table structure for table `v_usermaster` */

DROP TABLE IF EXISTS `v_usermaster`;

/*!50001 DROP VIEW IF EXISTS `v_usermaster` */;
/*!50001 DROP TABLE IF EXISTS `v_usermaster` */;

/*!50001 CREATE TABLE  `v_usermaster`(
 `userID` varchar(20) ,
 `userPass` text ,
 `firstname` varchar(50) ,
 `lastname` varchar(50) ,
 `userName` varchar(101) ,
 `userType` varchar(20) ,
 `userTypeDesc` varchar(5) ,
 `accessLevel` varchar(20) ,
 `accessLevelDesc` varchar(11) ,
 `userPic` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) 
)*/;

/*Table structure for table `v_usermenu` */

DROP TABLE IF EXISTS `v_usermenu`;

/*!50001 DROP VIEW IF EXISTS `v_usermenu` */;
/*!50001 DROP TABLE IF EXISTS `v_usermenu` */;

/*!50001 CREATE TABLE  `v_usermenu`(
 `userID` varchar(20) ,
 `userName` varchar(101) ,
 `menuID` varchar(20) ,
 `menuName` varchar(100) ,
 `menuController` varchar(100) ,
 `isMenuMaintenance` int(11) ,
 `isMenuMaintenanceDesc` varchar(3) ,
 `isMenuTransactions` int(11) ,
 `isMenuTransactionsDesc` varchar(3) ,
 `isMenuReport` int(11) ,
 `isMenuReportDesc` varchar(3) ,
 `sortNo` int(11) ,
 `glyphicon` text ,
 `createdBy` varchar(20) ,
 `createdDate` datetime 
)*/;

/*Table structure for table `v_workorderdetail` */

DROP TABLE IF EXISTS `v_workorderdetail`;

/*!50001 DROP VIEW IF EXISTS `v_workorderdetail` */;
/*!50001 DROP TABLE IF EXISTS `v_workorderdetail` */;

/*!50001 CREATE TABLE  `v_workorderdetail`(
 `woReferenceNo` varchar(20) ,
 `partsID` varchar(20) ,
 `partsName` varchar(100) ,
 `partsPrice` decimal(10,2) ,
 `qty` int(11) ,
 `total` decimal(20,2) ,
 `seqNo` int(2) 
)*/;

/*Table structure for table `v_workordermaster` */

DROP TABLE IF EXISTS `v_workordermaster`;

/*!50001 DROP VIEW IF EXISTS `v_workordermaster` */;
/*!50001 DROP TABLE IF EXISTS `v_workordermaster` */;

/*!50001 CREATE TABLE  `v_workordermaster`(
 `woReferenceNo` varchar(20) ,
 `woTransactionDate` datetime ,
 `invoiceReferenceNo` varchar(20) ,
 `invoiceDate` datetime ,
 `serviceTypeID` varchar(20) ,
 `serviceType` varchar(100) ,
 `equipmentID` varchar(20) ,
 `plateNo` varchar(20) ,
 `companyID` varchar(20) ,
 `yearID` varchar(5) ,
 `makeID` varchar(20) ,
 `modelID` varchar(20) ,
 `assignee` varchar(201) ,
 `immediateHead` varchar(100) ,
 `immediateEmailAddr` varchar(50) ,
 `department` varchar(20) ,
 `departmentName` varchar(100) ,
 `meter` int(11) ,
 `startDate` datetime ,
 `completionDate` datetime ,
 `remarks` longtext ,
 `approverRemarks` longtext ,
 `supplierID` varchar(20) ,
 `supplierName` varchar(100) ,
 `labor` decimal(12,2) ,
 `miscellaneous` decimal(12,2) ,
 `parts` decimal(12,2) ,
 `discount` decimal(12,2) ,
 `subTotal` decimal(12,2) ,
 `tax` decimal(12,2) ,
 `totalCost` decimal(12,2) ,
 `invoiceAmount` decimal(12,2) ,
 `varianceAmount` decimal(12,2) ,
 `variance` decimal(12,2) ,
 `isWarranty` int(11) ,
 `isWarrantyDesc` varchar(3) ,
 `isBackJob` int(11) ,
 `isBackJobDesc` varchar(3) ,
 `approvedDate` datetime ,
 `billedDate` datetime ,
 `url` varchar(50) ,
 `isSent` int(11) ,
 `createdByName` varchar(101) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(11) ,
 `statusDesc` varchar(12) 
)*/;

/*Table structure for table `v_yearmaster` */

DROP TABLE IF EXISTS `v_yearmaster`;

/*!50001 DROP VIEW IF EXISTS `v_yearmaster` */;
/*!50001 DROP TABLE IF EXISTS `v_yearmaster` */;

/*!50001 CREATE TABLE  `v_yearmaster`(
 `yearID` varchar(20) ,
 `description` varchar(5) ,
 `createdBy` varchar(20) ,
 `createdDate` datetime ,
 `modifiedBy` varchar(20) ,
 `modifiedDate` datetime ,
 `status` int(1) 
)*/;

/*View structure for view v_assigneecompanymapper */

/*!50001 DROP TABLE IF EXISTS `v_assigneecompanymapper` */;
/*!50001 DROP VIEW IF EXISTS `v_assigneecompanymapper` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_assigneecompanymapper` AS (select `assigneemapper`.`id` AS `id`,`assigneemapper`.`assigneeID` AS `assigneeID`,`v_assigneemaster`.`assigneeName` AS `assigneeName`,`assigneemapper`.`companyID` AS `companyID`,`v_companymaster`.`companyName` AS `companyName`,`v_companymaster`.`companyLogo` AS `companyLogo`,`assigneemapper`.`type` AS `type`,`assigneemapper`.`createdBy` AS `createdBy`,`assigneemapper`.`createdDate` AS `createdDate`,`assigneemapper`.`modifiedBy` AS `modifiedBy`,`assigneemapper`.`modifiedDate` AS `modifiedDate` from ((`assigneemapper` join `v_assigneemaster` on((`v_assigneemaster`.`assigneeID` = `assigneemapper`.`assigneeID`))) join `v_companymaster` on((`v_companymaster`.`companyID` = `assigneemapper`.`companyID`))) where (`assigneemapper`.`type` = _latin1'assignee_company')) */;

/*View structure for view v_assigneeequipment */

/*!50001 DROP TABLE IF EXISTS `v_assigneeequipment` */;
/*!50001 DROP VIEW IF EXISTS `v_assigneeequipment` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_assigneeequipment` AS (select `assigneeequipment`.`id` AS `id`,`assigneeequipment`.`assigneeID` AS `assigneeID`,`v_assigneemaster`.`assigneeName` AS `assigneeName`,`v_assigneemaster`.`companyName` AS `companyName`,`v_assigneemaster`.`department` AS `department`,`v_assigneemaster`.`locationName` AS `alocationName`,`v_assigneemaster`.`status` AS `astatus`,`v_assigneemaster`.`statusDesc` AS `astatusDesc`,`assigneeequipment`.`equipmentID` AS `equipmentID`,`v_equipmentmaster`.`plateNo` AS `plateNo`,`v_equipmentmaster`.`makeName` AS `makeName`,`v_equipmentmaster`.`modelName` AS `modelName`,`v_equipmentmaster`.`year` AS `year`,`v_equipmentmaster`.`locationName` AS `elocationName`,`v_equipmentmaster`.`status` AS `estatus`,`v_equipmentmaster`.`statusDesc` AS `estatusDesc`,`assigneeequipment`.`assignedStart` AS `assignedStart`,`assigneeequipment`.`assignedEnd` AS `assignedEnd`,`assigneeequipment`.`isCurrent` AS `isCurrent`,(case when (`assigneeequipment`.`isCurrent` = '0') then 'NO' when (`assigneeequipment`.`isCurrent` = '1') then 'YES' end) AS `isCurrentDesc`,`assigneeequipment`.`remarks` AS `remarks` from ((`assigneeequipment` join `v_assigneemaster` on((`v_assigneemaster`.`assigneeID` = `assigneeequipment`.`assigneeID`))) join `v_equipmentmaster` on((`v_equipmentmaster`.`equipmentID` = `assigneeequipment`.`equipmentID`)))) */;

/*View structure for view v_assigneemaster */

/*!50001 DROP TABLE IF EXISTS `v_assigneemaster` */;
/*!50001 DROP VIEW IF EXISTS `v_assigneemaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_assigneemaster` AS (select `assigneemaster`.`assigneeID` AS `assigneeID`,`assigneemaster`.`companyID` AS `companyID`,`companymaster`.`companyName` AS `companyName`,`assigneemaster`.`locationID` AS `locationID`,`locationmaster`.`locationName` AS `locationName`,`assigneemaster`.`firstname` AS `firstname`,`assigneemaster`.`lastname` AS `lastname`,concat(`assigneemaster`.`firstname`,_latin1' ',`assigneemaster`.`lastname`) AS `assigneeName`,`assigneemaster`.`gender` AS `gender`,`assigneemaster`.`age` AS `age`,`assigneemaster`.`contactNo1` AS `contactNo1`,`assigneemaster`.`contactNo2` AS `contactNo2`,`assigneemaster`.`address` AS `address`,`assigneemaster`.`costCenter` AS `costCenter`,`assigneemaster`.`immediateHead` AS `immediateHead`,`assigneemaster`.`emailAddress` AS `emailAddress`,`departmentmaster`.`departmentID` AS `department`,`departmentmaster`.`departmentName` AS `departmentName`,`assigneemaster`.`attachment` AS `attachment`,`assigneemaster`.`licenseNo` AS `licenseNo`,`assigneemaster`.`licenseRegistrationDate` AS `licenseRegistrationDate`,`assigneemaster`.`expirationDate` AS `expirationDate`,`assigneemaster`.`licenseAddress` AS `licenseAddress`,`assigneemaster`.`createdBy` AS `createdBy`,`assigneemaster`.`createdDate` AS `createdDate`,`assigneemaster`.`modifiedBy` AS `modifiedBy`,`assigneemaster`.`modifiedDate` AS `modifiedDate`,`assigneemaster`.`status` AS `status`,(case when (`assigneemaster`.`status` = '0') then 'INACTIVE' when (`assigneemaster`.`status` = '1') then 'ACTIVE' end) AS `statusDesc` from (((`assigneemaster` join `companymaster` on((`companymaster`.`companyID` = `assigneemaster`.`companyID`))) join `locationmaster` on((`locationmaster`.`locationID` = `assigneemaster`.`locationID`))) join `departmentmaster` on((`departmentmaster`.`departmentID` = `assigneemaster`.`department`)))) */;

/*View structure for view v_categorymaster */

/*!50001 DROP TABLE IF EXISTS `v_categorymaster` */;
/*!50001 DROP VIEW IF EXISTS `v_categorymaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categorymaster` AS (select `categorymaster`.`categoryID` AS `categoryID`,`categorymaster`.`categoryName` AS `categoryName`,`categorymaster`.`createdBy` AS `createdBy`,`categorymaster`.`createdDate` AS `createdDate`,`categorymaster`.`modifiedBy` AS `modifiedBy`,`categorymaster`.`modifiedDate` AS `modifiedDate`,`categorymaster`.`status` AS `status` from `categorymaster`) */;

/*View structure for view v_companymaster */

/*!50001 DROP TABLE IF EXISTS `v_companymaster` */;
/*!50001 DROP VIEW IF EXISTS `v_companymaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_companymaster` AS (select `companymaster`.`companyID` AS `companyID`,`companymaster`.`companyName` AS `companyName`,`companymaster`.`companyAddress` AS `companyAddress`,`companymaster`.`companyContactNo` AS `companyContactNo`,`companymaster`.`companyLogo` AS `companyLogo`,`companymaster`.`signature` AS `signature`,`companymaster`.`daysOfNotification` AS `daysOfNotification`,`companymaster`.`insuranceAppliedDate` AS `insuranceAppliedDate`,`companymaster`.`insuranceExpirationDate` AS `insuranceExpirationDate`,`companymaster`.`insuranceReminderInDays` AS `insuranceReminderInDays`,`companymaster`.`createdBy` AS `createdBy`,`companymaster`.`createdDate` AS `createdDate`,`companymaster`.`modifiedBy` AS `modifiedBy`,`companymaster`.`modifiedDate` AS `modifiedDate`,`companymaster`.`status` AS `status` from `companymaster`) */;

/*View structure for view v_configuration */

/*!50001 DROP TABLE IF EXISTS `v_configuration` */;
/*!50001 DROP VIEW IF EXISTS `v_configuration` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_configuration` AS (select `configuration`.`id` AS `id`,`configuration`.`type` AS `type`,`configuration`.`code` AS `code`,`configuration`.`description` AS `description`,`configuration`.`value` AS `value`,`configuration`.`remarks` AS `remarks`,`configuration`.`status` AS `status` from `configuration`) */;

/*View structure for view v_controlnomaster */

/*!50001 DROP TABLE IF EXISTS `v_controlnomaster` */;
/*!50001 DROP VIEW IF EXISTS `v_controlnomaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_controlnomaster` AS (select `controlnomaster`.`id` AS `id`,`controlnomaster`.`description` AS `description`,`controlnomaster`.`type` AS `type`,`controlnomaster`.`code` AS `code`,`controlnomaster`.`lastDigit` AS `lastDigit`,`controlnomaster`.`noOfDigit` AS `noOfDigit`,`controlnomaster`.`createdBy` AS `createdBy`,`controlnomaster`.`createdDate` AS `createdDate`,`controlnomaster`.`modifiedBy` AS `modifiedBy`,`controlnomaster`.`modifiedDate` AS `modifiedDate`,`controlnomaster`.`status` AS `status`,(case when (`controlnomaster`.`status` = _utf8'1') then _utf8'ACTIVE' else _utf8'INACTIVE' end) AS `statusDesc` from `controlnomaster`) */;

/*View structure for view v_departmentmaster */

/*!50001 DROP TABLE IF EXISTS `v_departmentmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_departmentmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_departmentmaster` AS (select `departmentmaster`.`departmentID` AS `departmentID`,`departmentmaster`.`departmentName` AS `departmentName`,`departmentmaster`.`createdDate` AS `createdDate`,`departmentmaster`.`createdBy` AS `createdBy`,`departmentmaster`.`modifiedDate` AS `modifiedDate`,`departmentmaster`.`modifiedBy` AS `modifiedBy`,`departmentmaster`.`status` AS `status` from `departmentmaster`) */;

/*View structure for view v_equipmentmaster */

/*!50001 DROP TABLE IF EXISTS `v_equipmentmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_equipmentmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_equipmentmaster` AS (select `equipmentmaster`.`equipmentID` AS `equipmentID`,`equipmentmaster`.`photo` AS `photo`,`equipmentmaster`.`assigneeID` AS `assigneeID`,concat(`assigneemaster`.`firstname`,_latin1' ',`assigneemaster`.`lastname`) AS `assigneeName`,`equipmentmaster`.`companyID` AS `companyID`,`companymaster`.`companyName` AS `companyName`,`assigneemaster`.`department` AS `department`,`equipmentmaster`.`categoryID` AS `categoryID`,`categorymaster`.`categoryName` AS `categoryName`,`equipmentmaster`.`makeID` AS `makeID`,`makemaster`.`makeName` AS `makeName`,`equipmentmaster`.`locationID` AS `locationID`,`locationmaster`.`locationName` AS `locationName`,`equipmentmaster`.`modelID` AS `modelID`,`modelmaster`.`description` AS `modelName`,`equipmentmaster`.`color` AS `color`,`equipmentmaster`.`mileageStart` AS `mileageStart`,`equipmentmaster`.`mileageEnd` AS `mileageEnd`,`equipmentmaster`.`purchaseDate` AS `purchaseDate`,`equipmentmaster`.`conductionSticker` AS `conductionSticker`,`equipmentmaster`.`year` AS `year`,`yearmaster`.`description` AS `yearDesc`,`equipmentmaster`.`plateNo` AS `plateNo`,`equipmentmaster`.`engineNo` AS `engineNo`,`equipmentmaster`.`chassisNo` AS `chassisNo`,`equipmentmaster`.`serialNo` AS `serialNo`,`equipmentmaster`.`gasolineAllocationInLiters` AS `gasolineAllocationInLiters`,`equipmentmaster`.`gasolineAllocationInCash` AS `gasolineAllocationInCash`,`equipmentmaster`.`insuranceAppliedDate` AS `insuranceAppliedDate`,`equipmentmaster`.`insuranceExpirationDate` AS `insuranceExpirationDate`,`equipmentmaster`.`insuranceReminderInDays` AS `insuranceReminderInDays`,`equipmentmaster`.`registrationDate` AS `registrationDate`,`equipmentmaster`.`registrationExpiryDate` AS `registrationExpiryDate`,`equipmentmaster`.`acquisitionCost` AS `acquisitionCost`,`equipmentmaster`.`insuranceCost` AS `insuranceCost`,`equipmentmaster`.`registrationCost` AS `registrationCost`,`equipmentmaster`.`depresitionValue` AS `depresitionValue`,`equipmentmaster`.`createdBy` AS `createdBy`,`equipmentmaster`.`createdDate` AS `createdDate`,`equipmentmaster`.`modifiedBy` AS `modifiedBy`,`equipmentmaster`.`modifiedDate` AS `modifiedDate`,`equipmentmaster`.`status` AS `status`,(case when (`equipmentmaster`.`status` = '0') then 'SCRAP' when (`equipmentmaster`.`status` = '1') then 'ACTIVE' when (`equipmentmaster`.`status` = '2') then 'SOLD' when (`equipmentmaster`.`status` = '3') then 'MOTORPOOL' end) AS `statusDesc` from (((((((`equipmentmaster` join `assigneemaster` on((`assigneemaster`.`assigneeID` = `equipmentmaster`.`assigneeID`))) join `companymaster` on((`companymaster`.`companyID` = `equipmentmaster`.`companyID`))) join `categorymaster` on((`categorymaster`.`categoryID` = `equipmentmaster`.`categoryID`))) join `yearmaster` on((`yearmaster`.`yearID` = `equipmentmaster`.`year`))) join `makemaster` on((`makemaster`.`makeID` = `equipmentmaster`.`makeID`))) join `locationmaster` on((`locationmaster`.`locationID` = `equipmentmaster`.`locationID`))) join `modelmaster` on((`modelmaster`.`modelID` = `equipmentmaster`.`modelID`)))) */;

/*View structure for view v_equipmentrepaireddetail */

/*!50001 DROP TABLE IF EXISTS `v_equipmentrepaireddetail` */;
/*!50001 DROP VIEW IF EXISTS `v_equipmentrepaireddetail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_equipmentrepaireddetail` AS (select `v_workordermaster`.`woReferenceNo` AS `woReferenceNo`,`v_workordermaster`.`woTransactionDate` AS `woTransactionDate`,`v_workordermaster`.`serviceTypeID` AS `serviceTypeID`,`v_workordermaster`.`serviceType` AS `serviceType`,`v_workordermaster`.`equipmentID` AS `equipmentID`,`v_workordermaster`.`plateNo` AS `plateNo`,`v_workordermaster`.`companyID` AS `companyID`,`v_workordermaster`.`assignee` AS `assignee`,`v_workordermaster`.`immediateHead` AS `immediateHead`,`v_workordermaster`.`immediateEmailAddr` AS `immediateEmailAddr`,`v_workordermaster`.`meter` AS `meter`,`v_workordermaster`.`startDate` AS `startDate`,`v_workordermaster`.`completionDate` AS `completionDate`,`v_workordermaster`.`remarks` AS `remarks`,`v_workordermaster`.`approverRemarks` AS `approverRemarks`,`v_workordermaster`.`labor` AS `labor`,`v_workordermaster`.`miscellaneous` AS `miscellaneous`,`v_workordermaster`.`parts` AS `parts`,`v_workordermaster`.`discount` AS `discount`,`v_workordermaster`.`subTotal` AS `subTotal`,`v_workordermaster`.`tax` AS `tax`,`v_workordermaster`.`totalCost` AS `totalCost`,`v_workordermaster`.`isWarranty` AS `isWarranty`,`v_workordermaster`.`isWarrantyDesc` AS `isWarrantyDesc`,`v_workordermaster`.`isBackJob` AS `isBackJob`,`v_workordermaster`.`isBackJobDesc` AS `isBackJobDesc`,`v_workordermaster`.`approvedDate` AS `approvedDate`,`v_workordermaster`.`billedDate` AS `billedDate`,`v_workordermaster`.`url` AS `url`,`v_workordermaster`.`isSent` AS `isSent`,`v_workordermaster`.`createdByName` AS `createdByName`,`v_workordermaster`.`createdBy` AS `createdBy`,`v_workordermaster`.`createdDate` AS `createdDate`,`v_workordermaster`.`modifiedBy` AS `modifiedBy`,`v_workordermaster`.`modifiedDate` AS `modifiedDate`,`v_workordermaster`.`status` AS `status`,`v_workordermaster`.`statusDesc` AS `statusDesc` from `v_workordermaster` where (`v_workordermaster`.`status` = '4')) */;

/*View structure for view v_equipmentrepairedmaster */

/*!50001 DROP TABLE IF EXISTS `v_equipmentrepairedmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_equipmentrepairedmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_equipmentrepairedmaster` AS (select `v_companymaster`.`companyID` AS `companyID`,`v_companymaster`.`companyName` AS `companyName`,(select count(0) AS `COUNT(*)` from `v_workordermaster` where ((`v_workordermaster`.`status` = '4') and (`v_workordermaster`.`companyID` = `v_companymaster`.`companyID`))) AS `noOfTransactions` from `v_companymaster`) */;

/*View structure for view v_locationmaster */

/*!50001 DROP TABLE IF EXISTS `v_locationmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_locationmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_locationmaster` AS (select `locationmaster`.`locationID` AS `locationID`,`locationmaster`.`locationName` AS `locationName`,`locationmaster`.`createdBy` AS `createdBy`,`locationmaster`.`createdDate` AS `createdDate`,`locationmaster`.`modifiedBy` AS `modifiedBy`,`locationmaster`.`modifiedDate` AS `modifiedDate`,`locationmaster`.`status` AS `status` from `locationmaster`) */;

/*View structure for view v_makemaster */

/*!50001 DROP TABLE IF EXISTS `v_makemaster` */;
/*!50001 DROP VIEW IF EXISTS `v_makemaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_makemaster` AS (select `makemaster`.`makeID` AS `makeID`,`makemaster`.`makeName` AS `makeName`,`makemaster`.`createdBy` AS `createdBy`,`makemaster`.`createdDate` AS `createdDate`,`makemaster`.`modifiedBy` AS `modifiedBy`,`makemaster`.`modifiedDate` AS `modifiedDate`,`makemaster`.`status` AS `status` from `makemaster`) */;

/*View structure for view v_menumaster */

/*!50001 DROP TABLE IF EXISTS `v_menumaster` */;
/*!50001 DROP VIEW IF EXISTS `v_menumaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_menumaster` AS (select `menumaster`.`menuID` AS `menuID`,`menumaster`.`menuName` AS `menuName`,`menumaster`.`menuController` AS `menuController`,`menumaster`.`isMenuMaintenance` AS `isMenuMaintenance`,(case when (`menumaster`.`isMenuMaintenance` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuMaintenanceDesc`,`menumaster`.`isMenuTransactions` AS `isMenuTransactions`,(case when (`menumaster`.`isMenuTransactions` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuTransactionsDesc`,`menumaster`.`isMenuReport` AS `isMenuReport`,(case when (`menumaster`.`isMenuReport` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuReportDesc`,`menumaster`.`sortNo` AS `sortNo`,`menumaster`.`glyphicon` AS `glyphicon`,`menumaster`.`createdBy` AS `createdBy`,`menumaster`.`createdDate` AS `createdDate`,`menumaster`.`modifiedBy` AS `modifiedBy`,`menumaster`.`modifiedDate` AS `modifiedDate`,`menumaster`.`status` AS `status` from `menumaster`) */;

/*View structure for view v_modelmaster */

/*!50001 DROP TABLE IF EXISTS `v_modelmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_modelmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_modelmaster` AS (select `modelmaster`.`modelID` AS `modelID`,`modelmaster`.`description` AS `description`,`modelmaster`.`variant` AS `variant`,`modelmaster`.`variantDescription` AS `variantDescription`,`modelmaster`.`createdBy` AS `createdBy`,`modelmaster`.`createdDate` AS `createdDate`,`modelmaster`.`modifiedBy` AS `modifiedBy`,`modelmaster`.`modifiedDate` AS `modifiedDate`,`modelmaster`.`status` AS `status` from `modelmaster`) */;

/*View structure for view v_partsmaster */

/*!50001 DROP TABLE IF EXISTS `v_partsmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_partsmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_partsmaster` AS (select `partsmaster`.`partsID` AS `partsID`,`partsmaster`.`stockCode` AS `stockCode`,`partsmaster`.`brand` AS `brand`,`partsmaster`.`model` AS `model`,`partsmaster`.`description` AS `description`,`partsmaster`.`stockOnHand` AS `stockOnHand`,`partsmaster`.`lowStockQty` AS `lowStockQty`,`partsmaster`.`price` AS `price`,`partsmaster`.`retailPrice` AS `retailPrice`,`partsmaster`.`createdBy` AS `createdBy`,`partsmaster`.`createdDate` AS `createdDate`,`partsmaster`.`modifiedBy` AS `modifiedBy`,`partsmaster`.`modifiedDate` AS `modifiedDate`,`partsmaster`.`status` AS `status` from `partsmaster`) */;

/*View structure for view v_poreceiving */

/*!50001 DROP TABLE IF EXISTS `v_poreceiving` */;
/*!50001 DROP VIEW IF EXISTS `v_poreceiving` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_poreceiving` AS (select `poreceiving`.`poReferenceNo` AS `poReferenceNo`,`poreceiving`.`woReferenceNo` AS `woReferenceNo`,`poreceiving`.`poTransactionDate` AS `poTransactionDate`,`poreceiving`.`labor` AS `labor`,`poreceiving`.`miscellaneous` AS `miscellaneous`,`poreceiving`.`parts` AS `parts`,`poreceiving`.`discount` AS `discount`,`poreceiving`.`tax` AS `tax`,`poreceiving`.`Amount` AS `Amount`,`poreceiving`.`attachment` AS `attachment`,`poreceiving`.`createdBy` AS `createdBy`,`poreceiving`.`createdDate` AS `createdDate`,`poreceiving`.`modifiedBy` AS `modifiedBy`,`poreceiving`.`modifiedDate` AS `modifiedDate`,`poreceiving`.`status` AS `status`,(case when (`poreceiving`.`status` = _utf8'0') then _utf8'OPEN' when (`poreceiving`.`status` = _utf8'1') then _utf8'CLOSED' end) AS `statusDesc` from `poreceiving`) */;

/*View structure for view v_remindermaster */

/*!50001 DROP TABLE IF EXISTS `v_remindermaster` */;
/*!50001 DROP VIEW IF EXISTS `v_remindermaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_remindermaster` AS (select `remindermaster`.`reminderID` AS `reminderID`,`remindermaster`.`title` AS `title`,`remindermaster`.`description` AS `description`,`remindermaster`.`location` AS `location`,`remindermaster`.`category` AS `category`,`remindermaster`.`startDate` AS `startDate`,`remindermaster`.`dueDate` AS `dueDate`,`remindermaster`.`reminderFromDt` AS `reminderFromDt`,`remindermaster`.`reminderToDt` AS `reminderToDt`,`remindermaster`.`createdBy` AS `createdBy`,`remindermaster`.`createdDate` AS `createdDate`,`remindermaster`.`modifiedBy` AS `modifiedBy`,`remindermaster`.`modifiedDate` AS `modifiedDate`,`remindermaster`.`status` AS `status`,`usermaster`.`userPic` AS `userPic` from (`remindermaster` join `usermaster` on((`usermaster`.`userID` = `remindermaster`.`createdBy`)))) */;

/*View structure for view v_servicetypemaster */

/*!50001 DROP TABLE IF EXISTS `v_servicetypemaster` */;
/*!50001 DROP VIEW IF EXISTS `v_servicetypemaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_servicetypemaster` AS (select `servicetypemaster`.`serviceTypeID` AS `serviceTypeID`,`servicetypemaster`.`description` AS `description`,`servicetypemaster`.`createdBy` AS `createdBy`,`servicetypemaster`.`createdDate` AS `createdDate`,`servicetypemaster`.`modifiedBy` AS `modifiedBy`,`servicetypemaster`.`modifiedDate` AS `modifiedDate`,`servicetypemaster`.`status` AS `status` from `servicetypemaster`) */;

/*View structure for view v_suppliermaster */

/*!50001 DROP TABLE IF EXISTS `v_suppliermaster` */;
/*!50001 DROP VIEW IF EXISTS `v_suppliermaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_suppliermaster` AS (select `suppliermaster`.`supplierID` AS `supplierID`,`suppliermaster`.`supplierName` AS `supplierName`,`suppliermaster`.`supplierAddress` AS `supplierAddress`,`suppliermaster`.`supplierContactNo` AS `supplierContactNo`,`suppliermaster`.`supplierEmailAddress` AS `supplierEmailAddress`,`suppliermaster`.`contactPerson` AS `contactPerson`,`suppliermaster`.`TIN` AS `TIN`,`suppliermaster`.`createdBy` AS `createdBy`,`suppliermaster`.`createdDate` AS `createdDate`,`suppliermaster`.`modifiedBy` AS `modifiedBy`,`suppliermaster`.`modifiedDate` AS `modifiedDate`,`suppliermaster`.`status` AS `status` from `suppliermaster`) */;

/*View structure for view v_userassigneemapper */

/*!50001 DROP TABLE IF EXISTS `v_userassigneemapper` */;
/*!50001 DROP VIEW IF EXISTS `v_userassigneemapper` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_userassigneemapper` AS (select `assigneemapper`.`userID` AS `userID`,`v_usermaster`.`userName` AS `userName`,`assigneemapper`.`assigneeID` AS `assigneeID`,`v_assigneemaster`.`assigneeName` AS `assigneeName`,`assigneemapper`.`createdBy` AS `createdBy`,`assigneemapper`.`createdDate` AS `createdDate`,`assigneemapper`.`modifiedBy` AS `modifiedBy`,`assigneemapper`.`modifiedDate` AS `modifiedDate` from ((`assigneemapper` join `v_usermaster` on((`v_usermaster`.`userID` = `assigneemapper`.`userID`))) join `v_assigneemaster` on((`v_assigneemaster`.`assigneeID` = `assigneemapper`.`assigneeID`))) where (`assigneemapper`.`type` = _latin1'user_assignee')) */;

/*View structure for view v_usermaster */

/*!50001 DROP TABLE IF EXISTS `v_usermaster` */;
/*!50001 DROP VIEW IF EXISTS `v_usermaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usermaster` AS (select `usermaster`.`userID` AS `userID`,`usermaster`.`userPass` AS `userPass`,`usermaster`.`firstname` AS `firstname`,`usermaster`.`lastname` AS `lastname`,concat(`usermaster`.`firstname`,_latin1' ',`usermaster`.`lastname`) AS `userName`,`usermaster`.`userType` AS `userType`,(case when (`usermaster`.`userType` = _latin1'1') then _utf8'ADMIN' else _utf8'USER' end) AS `userTypeDesc`,`usermaster`.`accessLevel` AS `accessLevel`,(case when (`usermaster`.`accessLevel` = _latin1'1') then _utf8'SUPER ADMIN' when (`usermaster`.`accessLevel` = _latin1'2') then _utf8'USER ADMIN' else _utf8'USER' end) AS `accessLevelDesc`,`usermaster`.`userPic` AS `userPic`,`usermaster`.`createdBy` AS `createdBy`,`usermaster`.`createdDate` AS `createdDate`,`usermaster`.`modifiedBy` AS `modifiedBy`,`usermaster`.`modifiedDate` AS `modifiedDate`,`usermaster`.`status` AS `status` from `usermaster`) */;

/*View structure for view v_usermenu */

/*!50001 DROP TABLE IF EXISTS `v_usermenu` */;
/*!50001 DROP VIEW IF EXISTS `v_usermenu` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_usermenu` AS (select `usermenu`.`userID` AS `userID`,concat(`usermaster`.`firstname`,_latin1' ',`usermaster`.`lastname`) AS `userName`,`usermenu`.`menuID` AS `menuID`,`menumaster`.`menuName` AS `menuName`,`menumaster`.`menuController` AS `menuController`,`menumaster`.`isMenuMaintenance` AS `isMenuMaintenance`,(case when (`menumaster`.`isMenuMaintenance` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuMaintenanceDesc`,`menumaster`.`isMenuTransactions` AS `isMenuTransactions`,(case when (`menumaster`.`isMenuTransactions` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuTransactionsDesc`,`menumaster`.`isMenuReport` AS `isMenuReport`,(case when (`menumaster`.`isMenuReport` = 1) then _utf8'YES' else _utf8'NO' end) AS `isMenuReportDesc`,`menumaster`.`sortNo` AS `sortNo`,`menumaster`.`glyphicon` AS `glyphicon`,`usermenu`.`createdBy` AS `createdBy`,`usermenu`.`createdDate` AS `createdDate` from ((`usermenu` join `usermaster` on((`usermaster`.`userID` = `usermenu`.`userID`))) join `menumaster` on((`menumaster`.`menuID` = `menumaster`.`menuID`))) where ((`menumaster`.`status` = _utf8'1') and (`menumaster`.`menuID` = `usermenu`.`menuID`))) */;

/*View structure for view v_workorderdetail */

/*!50001 DROP TABLE IF EXISTS `v_workorderdetail` */;
/*!50001 DROP VIEW IF EXISTS `v_workorderdetail` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_workorderdetail` AS (select `workorderdetail`.`woReferenceNo` AS `woReferenceNo`,`workorderdetail`.`partsID` AS `partsID`,`partsmaster`.`description` AS `partsName`,`workorderdetail`.`partsPrice` AS `partsPrice`,`workorderdetail`.`qty` AS `qty`,(`workorderdetail`.`partsPrice` * `workorderdetail`.`qty`) AS `total`,`workorderdetail`.`seqNo` AS `seqNo` from (`workorderdetail` join `partsmaster` on((`partsmaster`.`partsID` = `workorderdetail`.`partsID`)))) */;

/*View structure for view v_workordermaster */

/*!50001 DROP TABLE IF EXISTS `v_workordermaster` */;
/*!50001 DROP VIEW IF EXISTS `v_workordermaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_workordermaster` AS (select `workordermaster`.`woReferenceNo` AS `woReferenceNo`,`workordermaster`.`woTransactionDate` AS `woTransactionDate`,`workordermaster`.`invoiceReferenceNo` AS `invoiceReferenceNo`,`workordermaster`.`invoiceDate` AS `invoiceDate`,`workordermaster`.`serviceTypeID` AS `serviceTypeID`,`servicetypemaster`.`description` AS `serviceType`,`workordermaster`.`equipmentID` AS `equipmentID`,`equipmentmaster`.`plateNo` AS `plateNo`,`equipmentmaster`.`companyID` AS `companyID`,`equipmentmaster`.`year` AS `yearID`,`equipmentmaster`.`makeID` AS `makeID`,`equipmentmaster`.`modelID` AS `modelID`,`v_assigneemaster`.`assigneeName` AS `assignee`,`v_assigneemaster`.`immediateHead` AS `immediateHead`,`v_assigneemaster`.`emailAddress` AS `immediateEmailAddr`,`v_assigneemaster`.`department` AS `department`,`v_assigneemaster`.`departmentName` AS `departmentName`,`workordermaster`.`meter` AS `meter`,`workordermaster`.`startDate` AS `startDate`,`workordermaster`.`completionDate` AS `completionDate`,`workordermaster`.`remarks` AS `remarks`,`workordermaster`.`approverRemarks` AS `approverRemarks`,`workordermaster`.`supplierID` AS `supplierID`,(select `v_suppliermaster`.`supplierName` AS `supplierName` from `v_suppliermaster` where (`v_suppliermaster`.`supplierID` = `workordermaster`.`supplierID`)) AS `supplierName`,`workordermaster`.`labor` AS `labor`,`workordermaster`.`miscellaneous` AS `miscellaneous`,`workordermaster`.`parts` AS `parts`,`workordermaster`.`discount` AS `discount`,`workordermaster`.`subTotal` AS `subTotal`,`workordermaster`.`tax` AS `tax`,`workordermaster`.`totalCost` AS `totalCost`,`workordermaster`.`invoiceAmount` AS `invoiceAmount`,`workordermaster`.`varianceAmount` AS `varianceAmount`,`workordermaster`.`variance` AS `variance`,`workordermaster`.`isWarranty` AS `isWarranty`,(case when (`workordermaster`.`isWarranty` = 0) then 'NO' when (`workordermaster`.`isWarranty` = 1) then 'YES' end) AS `isWarrantyDesc`,`workordermaster`.`isBackJob` AS `isBackJob`,(case when (`workordermaster`.`isBackJob` = 0) then 'NO' when (`workordermaster`.`isBackJob` = 1) then 'YES' end) AS `isBackJobDesc`,`workordermaster`.`approvedDate` AS `approvedDate`,`workordermaster`.`billedDate` AS `billedDate`,`workordermaster`.`url` AS `url`,`workordermaster`.`isSent` AS `isSent`,`v_usermaster`.`userName` AS `createdByName`,`workordermaster`.`createdBy` AS `createdBy`,`workordermaster`.`createdDate` AS `createdDate`,`workordermaster`.`modifiedBy` AS `modifiedBy`,`workordermaster`.`modifiedDate` AS `modifiedDate`,`workordermaster`.`status` AS `status`,(case when (`workordermaster`.`status` = 0) then _utf8'OPEN' when (`workordermaster`.`status` = 1) then _utf8'FOR APPROVAL' when (`workordermaster`.`status` = 2) then _utf8'APPROVED' when (`workordermaster`.`status` = 3) then _utf8'ON REPAIR' when (`workordermaster`.`status` = 4) then _utf8'FOR BILLING' when (`workordermaster`.`status` = 5) then _utf8'BILLED' when (`workordermaster`.`status` = 6) then _utf8'CLOSED' when (`workordermaster`.`status` = 7) then _utf8'DISAPPROVED' when (`workordermaster`.`status` = 8) then _utf8'CANCELED' end) AS `statusDesc` from ((((`workordermaster` join `servicetypemaster` on((`servicetypemaster`.`serviceTypeID` = `workordermaster`.`serviceTypeID`))) join `equipmentmaster` on((`equipmentmaster`.`equipmentID` = `workordermaster`.`equipmentID`))) join `v_assigneemaster` on((`v_assigneemaster`.`assigneeID` = `equipmentmaster`.`assigneeID`))) join `v_usermaster` on((`v_usermaster`.`userID` = `workordermaster`.`createdBy`)))) */;

/*View structure for view v_yearmaster */

/*!50001 DROP TABLE IF EXISTS `v_yearmaster` */;
/*!50001 DROP VIEW IF EXISTS `v_yearmaster` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_yearmaster` AS (select `yearmaster`.`yearID` AS `yearID`,`yearmaster`.`description` AS `description`,`yearmaster`.`createdBy` AS `createdBy`,`yearmaster`.`createdDate` AS `createdDate`,`yearmaster`.`modifiedBy` AS `modifiedBy`,`yearmaster`.`modifiedDate` AS `modifiedDate`,`yearmaster`.`status` AS `status` from `yearmaster`) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
