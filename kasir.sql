/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 8.0.30 : Database - kasir
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`kasir` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `kasir`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(255) DEFAULT NULL,
  `customer_address` text,
  `customer_phone` varchar(255) DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `customer` */

insert  into `customer`(`customer_id`,`customer_name`,`customer_address`,`customer_phone`,`data_state`,`created_id`,`created_at`,`updated_at`) values 
(1,'Sayyid','Karanganyar,Indonesia','0816317831',0,1,'2024-02-16 00:33:30','2024-02-16 00:36:33');

/*Table structure for table `item` */

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `item_id` int NOT NULL AUTO_INCREMENT,
  `item_name` varchar(255) DEFAULT NULL,
  `item_code` varchar(255) DEFAULT NULL,
  `item_unit_cost` decimal(20,0) DEFAULT NULL,
  `item_unit_price` decimal(20,0) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `item` */

insert  into `item`(`item_id`,`item_name`,`item_code`,`item_unit_cost`,`item_unit_price`,`created_id`,`data_state`,`created_at`,`updated_at`) values 
(1,'Kopi Kapal Api','000001',1000,1500,1,0,'2024-02-14 22:50:07','2024-02-14 22:50:09'),
(2,'Larutan Penyegar Cap badak 50ml','000002',2000,5000,1,0,NULL,NULL),
(3,'Sepatu ','000003',50000,100000,1,0,NULL,'2024-02-15 15:11:30'),
(4,'1221','12',12,12,1,1,NULL,NULL),
(5,'1','1',1,1,1,1,NULL,NULL);

/*Table structure for table `item_stock` */

DROP TABLE IF EXISTS `item_stock`;

CREATE TABLE `item_stock` (
  `item_stock_id` int NOT NULL AUTO_INCREMENT,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `item_unit_cost` decimal(20,0) DEFAULT NULL,
  `item_unit_price` decimal(20,0) DEFAULT NULL,
  `item_stock_status` int DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_stock_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `item_stock` */

insert  into `item_stock`(`item_stock_id`,`item_id`,`quantity`,`item_unit_cost`,`item_unit_price`,`item_stock_status`,`created_id`,`data_state`,`created_at`,`updated_at`) values 
(1,1,50,NULL,NULL,1,1,0,NULL,NULL);

/*Table structure for table `item_stock_mutation` */

DROP TABLE IF EXISTS `item_stock_mutation`;

CREATE TABLE `item_stock_mutation` (
  `item_stock_mutation_id` int NOT NULL AUTO_INCREMENT,
  `transaction_no` varchar(255) DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `item_stock_mutation_date` date DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `data_state` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`item_stock_mutation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `item_stock_mutation` */

/*Table structure for table `purchase_invoice` */

DROP TABLE IF EXISTS `purchase_invoice`;

CREATE TABLE `purchase_invoice` (
  `purchase_invoice_id` int NOT NULL AUTO_INCREMENT,
  `supplier_id` int DEFAULT NULL,
  `purchase_invoice_no` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `purchase_invoice_date` datetime DEFAULT NULL,
  `purchase_invoice_amount` decimal(20,0) DEFAULT NULL,
  `purchase_invoice_payment` decimal(20,0) DEFAULT NULL,
  `purchase_invoice_change` decimal(20,0) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`purchase_invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `purchase_invoice` */

/*Table structure for table `purchase_invoice_item` */

DROP TABLE IF EXISTS `purchase_invoice_item`;

CREATE TABLE `purchase_invoice_item` (
  `purchase_invoice_item` int NOT NULL AUTO_INCREMENT,
  `purchase_invoice_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `item_unit_cost` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`purchase_invoice_item`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `purchase_invoice_item` */

/*Table structure for table `sales_invoice` */

DROP TABLE IF EXISTS `sales_invoice`;

CREATE TABLE `sales_invoice` (
  `sales_invoice_id` int NOT NULL AUTO_INCREMENT,
  `sales_invoice_no` varchar(255) DEFAULT NULL,
  `customer_id` int DEFAULT NULL,
  `sales_invoice_date` date DEFAULT NULL,
  `sales_invoice_amount` decimal(20,0) DEFAULT NULL,
  `sales_invoice_payment` decimal(20,0) DEFAULT NULL,
  `sales_invoice_change` decimal(20,0) DEFAULT NULL,
  `created_id` int DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sales_invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `sales_invoice` */

/*Table structure for table `sales_invoice_item` */

DROP TABLE IF EXISTS `sales_invoice_item`;

CREATE TABLE `sales_invoice_item` (
  `sales_invoice_item_id` int NOT NULL AUTO_INCREMENT,
  `sales_invoice_id` int DEFAULT NULL,
  `item_id` int DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `item_unit_price` decimal(20,0) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`sales_invoice_item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `sales_invoice_item` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `supplier_id` int NOT NULL AUTO_INCREMENT,
  `supplier_name` varchar(255) DEFAULT NULL,
  `supplier_address` text,
  `supplier_phone` varchar(255) DEFAULT NULL,
  `data_state` int DEFAULT '0',
  `created_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`supplier_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `supplier` */

insert  into `supplier`(`supplier_id`,`supplier_name`,`supplier_address`,`supplier_phone`,`data_state`,`created_id`,`created_at`,`updated_at`) values 
(1,'Pabrik Obat Herbal','jakarta,indonesia','086763536',0,1,'2024-02-15 16:01:29','2024-02-16 00:36:56'),
(2,'Sidomuncul','Jakarta,indonesia','0982137091',0,1,'2024-02-15 16:02:18','2024-02-16 00:36:48');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `level` enum('1','2','3') DEFAULT NULL,
  `data_state` int DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama`,`level`,`data_state`) values 
(1,'Admin','25d55ad283aa400af464c76d713c07ad','Admin','1',0),
(3,'Dokter','e10adc3949ba59abbe56e057f20f883e','Dokter','2',0),
(4,'Apoteker','827ccb0eea8a706c4c34a16891f84e7b','Apoteker','3',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
