/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - ablecrm
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tblacc_account_history` */

DROP TABLE IF EXISTS `tblacc_account_history`;

CREATE TABLE `tblacc_account_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `debit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(15,2) NOT NULL DEFAULT 0.00,
  `description` text DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `rel_type` varchar(45) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `customer` int(11) DEFAULT NULL,
  `reconcile` int(11) NOT NULL DEFAULT 0,
  `split` int(11) NOT NULL DEFAULT 0,
  `item` int(11) DEFAULT NULL,
  `paid` int(1) NOT NULL DEFAULT 0,
  `date` date DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_account_history` */

/*Table structure for table `tblacc_account_type_details` */

DROP TABLE IF EXISTS `tblacc_account_type_details`;

CREATE TABLE `tblacc_account_type_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account_type_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `note` text DEFAULT NULL,
  `statement_of_cash_flows` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=200 DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_account_type_details` */

/*Table structure for table `tblacc_accounts` */

DROP TABLE IF EXISTS `tblacc_accounts`;

CREATE TABLE `tblacc_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `key_name` varchar(255) DEFAULT NULL,
  `number` varchar(45) DEFAULT NULL,
  `parent_account` int(11) DEFAULT NULL,
  `account_type_id` int(11) NOT NULL,
  `account_detail_type_id` int(11) NOT NULL,
  `balance` decimal(15,2) DEFAULT NULL,
  `balance_as_of` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `default_account` int(11) NOT NULL DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=89 DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_accounts` */

insert  into `tblacc_accounts`(`id`,`name`,`key_name`,`number`,`parent_account`,`account_type_id`,`account_detail_type_id`,`balance`,`balance_as_of`,`description`,`default_account`,`active`) values 
(1,'','acc_accounts_receivable',NULL,NULL,1,1,NULL,NULL,NULL,1,1),
(2,'','acc_accrued_holiday_payable',NULL,NULL,9,61,NULL,NULL,NULL,1,1),
(3,'','acc_accrued_liabilities',NULL,NULL,8,44,NULL,NULL,NULL,1,1),
(4,'','acc_accrued_non_current_liabilities',NULL,NULL,9,62,NULL,NULL,NULL,1,1),
(5,'','acc_accumulated_depreciation_on_property_plant_and_equipment',NULL,NULL,4,22,NULL,NULL,NULL,1,1),
(6,'','acc_allowance_for_bad_debts',NULL,NULL,2,2,NULL,NULL,NULL,1,1),
(7,'','acc_amortisation_expense',NULL,NULL,14,106,NULL,NULL,NULL,1,1),
(8,'','acc_assets_held_for_sale',NULL,NULL,5,32,NULL,NULL,NULL,1,1),
(9,'','acc_available_for_sale_assets_short_term',NULL,NULL,2,3,NULL,NULL,NULL,1,1),
(10,'','acc_bad_debts',NULL,NULL,14,108,NULL,NULL,NULL,1,1),
(11,'','acc_bank_charges',NULL,NULL,14,109,NULL,NULL,NULL,1,1),
(12,'','acc_billable_expense_income',NULL,NULL,11,89,NULL,NULL,NULL,1,1),
(13,'','acc_cash_and_cash_equivalents',NULL,NULL,3,15,NULL,NULL,NULL,1,1),
(14,'','acc_change_in_inventory_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(15,'','acc_commissions_and_fees',NULL,NULL,14,111,NULL,NULL,NULL,1,1),
(16,'','acc_cost_of_sales',NULL,NULL,13,104,NULL,NULL,NULL,1,1),
(17,'','acc_deferred_tax_assets',NULL,NULL,5,33,NULL,NULL,NULL,1,1),
(18,'','acc_direct_labour_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(19,'','acc_discounts_given_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(20,'','acc_dividend_disbursed',NULL,NULL,10,69,NULL,NULL,NULL,1,1),
(21,'','acc_dividend_income',NULL,NULL,12,92,NULL,NULL,NULL,1,1),
(22,'','acc_dividends_payable',NULL,NULL,8,48,NULL,NULL,NULL,1,1),
(23,'','acc_dues_and_subscriptions',NULL,NULL,14,113,NULL,NULL,NULL,1,1),
(24,'','acc_equipment_rental',NULL,NULL,14,114,NULL,NULL,NULL,1,1),
(25,'','acc_equity_in_earnings_of_subsidiaries',NULL,NULL,10,70,NULL,NULL,NULL,1,1),
(26,'','acc_freight_and_delivery_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(27,'','acc_goodwill',NULL,NULL,5,34,NULL,NULL,NULL,1,1),
(28,'','acc_income_tax_expense',NULL,NULL,14,116,NULL,NULL,NULL,1,1),
(29,'','acc_income_tax_payable',NULL,NULL,8,50,NULL,NULL,NULL,1,1),
(30,'','acc_insurance_disability',NULL,NULL,14,117,NULL,NULL,NULL,1,1),
(31,'','acc_insurance_general',NULL,NULL,14,117,NULL,NULL,NULL,1,1),
(32,'','acc_insurance_liability',NULL,NULL,14,117,NULL,NULL,NULL,1,1),
(33,'','acc_intangibles',NULL,NULL,5,35,NULL,NULL,NULL,1,1),
(34,'','acc_interest_expense',NULL,NULL,14,118,NULL,NULL,NULL,1,1),
(35,'','acc_interest_income',NULL,NULL,12,93,NULL,NULL,NULL,1,1),
(36,'','acc_inventory',NULL,NULL,2,5,NULL,NULL,NULL,1,1),
(37,'','acc_inventory_asset',NULL,NULL,2,5,NULL,NULL,NULL,1,1),
(38,'','acc_legal_and_professional_fees',NULL,NULL,14,119,NULL,NULL,NULL,1,1),
(39,'','acc_liabilities_related_to_assets_held_for_sale',NULL,NULL,9,63,NULL,NULL,NULL,1,1),
(40,'','acc_long_term_debt',NULL,NULL,9,64,NULL,NULL,NULL,1,1),
(41,'','acc_long_term_investments',NULL,NULL,5,38,NULL,NULL,NULL,1,1),
(42,'','acc_loss_on_discontinued_operations_net_of_tax',NULL,NULL,14,120,NULL,NULL,NULL,1,1),
(43,'','acc_loss_on_disposal_of_assets',NULL,NULL,12,94,NULL,NULL,NULL,1,1),
(44,'','acc_management_compensation',NULL,NULL,14,121,NULL,NULL,NULL,1,1),
(45,'','acc_materials_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(46,'','acc_meals_and_entertainment',NULL,NULL,14,122,NULL,NULL,NULL,1,1),
(47,'','acc_office_expenses',NULL,NULL,14,123,NULL,NULL,NULL,1,1),
(48,'','acc_other_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(49,'','acc_other_comprehensive_income',NULL,NULL,10,73,NULL,NULL,NULL,1,1),
(50,'','acc_other_general_and_administrative_expenses',NULL,NULL,14,123,NULL,NULL,NULL,1,1),
(51,'','acc_other_operating_income_expenses',NULL,NULL,12,97,NULL,NULL,NULL,1,1),
(52,'','acc_other_selling_expenses',NULL,NULL,14,125,NULL,NULL,NULL,1,1),
(53,'','acc_other_type_of_expenses_advertising_expenses',NULL,NULL,14,105,NULL,NULL,NULL,1,1),
(54,'','acc_overhead_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(55,'','acc_payroll_clearing',NULL,NULL,8,55,NULL,NULL,NULL,1,1),
(56,'','acc_payroll_expenses',NULL,NULL,14,126,NULL,NULL,NULL,1,1),
(57,'','acc_payroll_liabilities',NULL,NULL,8,56,NULL,NULL,NULL,1,1),
(58,'','acc_prepaid_expenses',NULL,NULL,2,11,NULL,NULL,NULL,1,1),
(59,'','acc_property_plant_and_equipment',NULL,NULL,4,26,NULL,NULL,NULL,1,1),
(60,'','acc_purchases',NULL,NULL,14,130,NULL,NULL,NULL,1,1),
(61,'','acc_reconciliation_discrepancies',NULL,NULL,15,139,NULL,NULL,NULL,1,1),
(62,'','acc_rent_or_lease_payments',NULL,NULL,14,127,NULL,NULL,NULL,1,1),
(63,'','acc_repair_and_maintenance',NULL,NULL,14,128,NULL,NULL,NULL,1,1),
(64,'','acc_retained_earnings',NULL,NULL,10,80,NULL,NULL,NULL,1,1),
(65,'','acc_revenue_general',NULL,NULL,11,86,NULL,NULL,NULL,1,1),
(66,'','acc_sales',NULL,NULL,11,89,NULL,NULL,NULL,1,1),
(67,'','acc_sales_retail',NULL,NULL,11,87,NULL,NULL,NULL,1,1),
(68,'','acc_sales_wholesale',NULL,NULL,11,88,NULL,NULL,NULL,1,1),
(69,'','acc_sales_of_product_income',NULL,NULL,11,89,NULL,NULL,NULL,1,1),
(70,'','acc_share_capital',NULL,NULL,10,81,NULL,NULL,NULL,1,1),
(71,'','acc_shipping_and_delivery_expense',NULL,NULL,14,129,NULL,NULL,NULL,1,1),
(72,'','acc_short_term_debit',NULL,NULL,8,54,NULL,NULL,NULL,1,1),
(73,'','acc_stationery_and_printing',NULL,NULL,14,123,NULL,NULL,NULL,1,1),
(74,'','acc_subcontractors_cos',NULL,NULL,13,100,NULL,NULL,NULL,1,1),
(75,'','acc_supplies',NULL,NULL,14,130,NULL,NULL,NULL,1,1),
(76,'','acc_travel_expenses_general_and_admin_expenses',NULL,NULL,14,132,NULL,NULL,NULL,1,1),
(77,'','acc_travel_expenses_selling_expense',NULL,NULL,14,133,NULL,NULL,NULL,1,1),
(78,'','acc_unapplied_cash_payment_income',NULL,NULL,11,91,NULL,NULL,NULL,1,1),
(79,'','acc_uncategorised_asset',NULL,NULL,2,10,NULL,NULL,NULL,1,1),
(80,'','acc_uncategorised_expense',NULL,NULL,14,124,NULL,NULL,NULL,1,1),
(81,'','acc_uncategorised_income',NULL,NULL,11,89,NULL,NULL,NULL,1,1),
(82,'','acc_undeposited_funds',NULL,NULL,2,13,NULL,NULL,NULL,1,1),
(83,'','acc_unrealised_loss_on_securities_net_of_tax',NULL,NULL,12,99,NULL,NULL,NULL,1,1),
(84,'','acc_utilities',NULL,NULL,14,135,NULL,NULL,NULL,1,1),
(85,'','acc_wage_expenses',NULL,NULL,14,126,NULL,NULL,NULL,1,1),
(86,'','acc_credit_card',NULL,NULL,7,43,NULL,NULL,NULL,1,1),
(87,'','acc_accounts_payable',NULL,NULL,6,42,NULL,NULL,NULL,1,1),
(88,'Banco Popular',NULL,NULL,0,1,1,0.00,'0000-00-00','<p>Account Receivable account</p>',0,1);

/*Table structure for table `tblacc_banking_rule_details` */

DROP TABLE IF EXISTS `tblacc_banking_rule_details`;

CREATE TABLE `tblacc_banking_rule_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rule_id` int(11) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `subtype` varchar(45) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `subtype_amount` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_banking_rule_details` */

/*Table structure for table `tblacc_banking_rules` */

DROP TABLE IF EXISTS `tblacc_banking_rules`;

CREATE TABLE `tblacc_banking_rules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `transaction` varchar(45) DEFAULT NULL,
  `following` varchar(45) DEFAULT NULL,
  `then` varchar(45) DEFAULT NULL,
  `payment_account` int(11) DEFAULT NULL,
  `deposit_to` int(11) DEFAULT NULL,
  `auto_add` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_banking_rules` */

/*Table structure for table `tblacc_expense_category_mappings` */

DROP TABLE IF EXISTS `tblacc_expense_category_mappings`;

CREATE TABLE `tblacc_expense_category_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `payment_account` int(11) NOT NULL DEFAULT 0,
  `deposit_to` int(11) NOT NULL DEFAULT 0,
  `preferred_payment_method` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_expense_category_mappings` */

/*Table structure for table `tblacc_item_automatics` */

DROP TABLE IF EXISTS `tblacc_item_automatics`;

CREATE TABLE `tblacc_item_automatics` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `inventory_asset_account` int(11) NOT NULL DEFAULT 0,
  `income_account` int(11) NOT NULL DEFAULT 0,
  `expense_account` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_item_automatics` */

/*Table structure for table `tblacc_journal_entries` */

DROP TABLE IF EXISTS `tblacc_journal_entries`;

CREATE TABLE `tblacc_journal_entries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `number` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `journal_date` date DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `datecreated` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_journal_entries` */

/*Table structure for table `tblacc_payment_mode_mappings` */

DROP TABLE IF EXISTS `tblacc_payment_mode_mappings`;

CREATE TABLE `tblacc_payment_mode_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_mode_id` int(11) NOT NULL,
  `payment_account` int(11) NOT NULL DEFAULT 0,
  `deposit_to` int(11) NOT NULL DEFAULT 0,
  `expense_payment_account` int(11) NOT NULL DEFAULT 0,
  `expense_deposit_to` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_payment_mode_mappings` */

/*Table structure for table `tblacc_reconciles` */

DROP TABLE IF EXISTS `tblacc_reconciles`;

CREATE TABLE `tblacc_reconciles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` int(11) NOT NULL,
  `beginning_balance` decimal(15,2) NOT NULL,
  `ending_balance` decimal(15,2) NOT NULL,
  `ending_date` date NOT NULL,
  `expense_date` date DEFAULT NULL,
  `service_charge` decimal(15,2) DEFAULT NULL,
  `expense_account` int(11) DEFAULT NULL,
  `income_date` date DEFAULT NULL,
  `interest_earned` decimal(15,2) DEFAULT NULL,
  `income_account` int(11) DEFAULT NULL,
  `finish` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_reconciles` */

insert  into `tblacc_reconciles`(`id`,`account`,`beginning_balance`,`ending_balance`,`ending_date`,`expense_date`,`service_charge`,`expense_account`,`income_date`,`interest_earned`,`income_account`,`finish`) values 
(1,88,0.00,0.00,'2022-12-06','0000-00-00',0.00,61,'0000-00-00',0.00,61,0);

/*Table structure for table `tblacc_tax_mappings` */

DROP TABLE IF EXISTS `tblacc_tax_mappings`;

CREATE TABLE `tblacc_tax_mappings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tax_id` int(11) NOT NULL,
  `payment_account` int(11) NOT NULL DEFAULT 0,
  `deposit_to` int(11) NOT NULL DEFAULT 0,
  `expense_payment_account` int(11) NOT NULL DEFAULT 0,
  `expense_deposit_to` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_tax_mappings` */

/*Table structure for table `tblacc_transaction_bankings` */

DROP TABLE IF EXISTS `tblacc_transaction_bankings`;

CREATE TABLE `tblacc_transaction_bankings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `withdrawals` decimal(15,2) NOT NULL DEFAULT 0.00,
  `deposits` decimal(15,2) NOT NULL DEFAULT 0.00,
  `payee` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_transaction_bankings` */

/*Table structure for table `tblacc_transfers` */

DROP TABLE IF EXISTS `tblacc_transfers`;

CREATE TABLE `tblacc_transfers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transfer_funds_from` int(11) NOT NULL,
  `transfer_funds_to` int(11) NOT NULL,
  `transfer_amount` decimal(15,2) DEFAULT NULL,
  `date` varchar(45) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblacc_transfers` */

/*Table structure for table `tblactivity_log` */

DROP TABLE IF EXISTS `tblactivity_log`;

CREATE TABLE `tblactivity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `date` datetime NOT NULL,
  `staffid` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staffid` (`staffid`)
) ENGINE=InnoDB AUTO_INCREMENT=176 DEFAULT CHARSET=utf8;

/*Data for the table `tblactivity_log` */

insert  into `tblactivity_log`(`id`,`description`,`date`,`staffid`) values 
(1,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-11-28 18:46:01','Kirti Kumar'),
(2,'New Leads Status Added [StatusID: 2, Name: New]','2022-11-28 18:56:08','Kirti Kumar'),
(3,'New Custom Field Added [VIN]','2022-11-28 19:31:04','Kirti Kumar'),
(4,'New Warehouse Item Added [ID:1, Test]','2022-11-28 19:32:12','Kirti Kumar'),
(5,'New Proposal Created [ID: 1]','2022-11-28 19:38:32','Kirti Kumar'),
(6,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-11-28 22:00:06','Kirti Kumar'),
(7,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-11-29 10:48:06','Kirti Kumar'),
(8,'Invoice Item Updated [ID: 1, Test]','2022-11-29 11:05:30','Kirti Kumar'),
(9,'Invoice Item Updated [ID: 1, Test]','2022-11-29 11:05:45','Kirti Kumar'),
(10,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-01 12:31:51','Kirti Kumar'),
(11,'Proposal Updated [ID:1]','2022-12-01 13:35:28','Kirti Kumar'),
(12,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-02 15:36:46','Kirti Kumar'),
(13,'New Warehouse Item Added [ID:2, ]','2022-12-02 16:54:26','Kirti Kumar'),
(14,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-02 17:15:20','Kirti Kumar'),
(15,'New Warehouse Item Added [ID:3, ]','2022-12-02 17:21:03','Kirti Kumar'),
(16,'commodity Attachment Deleted [commodityID: 3]','2022-12-02 17:22:29','Kirti Kumar'),
(17,'commodity Attachment Deleted [commodityID: 2]','2022-12-02 17:22:29','Kirti Kumar'),
(18,'commodity Attachment Deleted [commodityID: 1]','2022-12-02 17:22:29','Kirti Kumar'),
(19,'commodity Attachment Deleted [commodityID: 1]','2022-12-02 17:22:29','Kirti Kumar'),
(20,'commodity Attachment Deleted [commodityID: 1]','2022-12-02 17:22:29','Kirti Kumar'),
(21,'commodity Attachment Deleted [commodityID: 1]','2022-12-02 17:22:29','Kirti Kumar'),
(22,'New Warehouse Item Added [ID:4, ]','2022-12-02 17:24:03','Kirti Kumar'),
(23,'New Warehouse Item Added [ID:5, ]','2022-12-02 17:26:15','Kirti Kumar'),
(24,'commodity Attachment Deleted [commodityID: 5]','2022-12-02 17:29:41','Kirti Kumar'),
(25,'commodity Attachment Deleted [commodityID: 5]','2022-12-02 17:29:41','Kirti Kumar'),
(26,'New Warehouse Item Added [ID:6, ]','2022-12-02 17:30:18','Kirti Kumar'),
(27,'commodity Attachment Deleted [commodityID: 6]','2022-12-02 17:40:49','Kirti Kumar'),
(28,'commodity Attachment Deleted [commodityID: 6]','2022-12-02 17:40:49','Kirti Kumar'),
(29,'commodity Attachment Deleted [commodityID: 6]','2022-12-02 17:40:49','Kirti Kumar'),
(30,'New Warehouse Item Added [ID:7, ]','2022-12-02 17:42:26','Kirti Kumar'),
(31,'New Warehouse Item Added [ID:8, ]','2022-12-02 17:54:27','Kirti Kumar'),
(32,'commodity Attachment Deleted [commodityID: 8]','2022-12-02 18:10:20','Kirti Kumar'),
(33,'commodity Attachment Deleted [commodityID: 8]','2022-12-02 18:10:20','Kirti Kumar'),
(34,'New Warehouse Item Added [ID:9, ]','2022-12-02 18:11:09','Kirti Kumar'),
(35,'commodity Attachment Deleted [commodityID: 9]','2022-12-02 18:13:30','Kirti Kumar'),
(36,'commodity Attachment Deleted [commodityID: 9]','2022-12-02 18:13:30','Kirti Kumar'),
(37,'New Warehouse Item Added [ID:10, ]','2022-12-02 18:13:49','Kirti Kumar'),
(38,'New Warehouse Item Added [ID:11, ]','2022-12-02 18:28:01','Kirti Kumar'),
(39,'commodity Attachment Deleted [commodityID: 11]','2022-12-02 18:31:54','Kirti Kumar'),
(40,'commodity Attachment Deleted [commodityID: 11]','2022-12-02 18:31:54','Kirti Kumar'),
(41,'commodity Attachment Deleted [commodityID: 11]','2022-12-02 18:31:54','Kirti Kumar'),
(42,'commodity Attachment Deleted [commodityID: 10]','2022-12-02 18:31:54','Kirti Kumar'),
(43,'commodity Attachment Deleted [commodityID: 10]','2022-12-02 18:31:54','Kirti Kumar'),
(44,'New Warehouse Item Added [ID:12, ]','2022-12-02 18:32:25','Kirti Kumar'),
(45,'Custom Field Updated [VIN]','2022-12-02 21:50:11','Kirti Kumar'),
(46,'Custom Field Updated [VIN]','2022-12-02 21:54:21','Kirti Kumar'),
(47,'New Custom Field Added [Brand]','2022-12-02 21:54:45','Kirti Kumar'),
(48,'New Custom Field Added [Model]','2022-12-02 21:56:09','Kirti Kumar'),
(49,'New Custom Field Added [Category]','2022-12-02 21:57:04','Kirti Kumar'),
(50,'Custom Field Updated [Category]','2022-12-02 22:00:37','Kirti Kumar'),
(51,'New Custom Field Added [Year]','2022-12-02 22:01:07','Kirti Kumar'),
(52,'New Custom Field Added [Engine]','2022-12-02 22:07:29','Kirti Kumar'),
(53,'New Custom Field Added [Engine Size]','2022-12-02 22:07:50','Kirti Kumar'),
(54,'New Custom Field Added [Mileage]','2022-12-02 22:08:17','Kirti Kumar'),
(55,'New Custom Field Added [Transmission]','2022-12-02 22:10:15','Kirti Kumar'),
(56,'New Custom Field Added [Fuel Type]','2022-12-02 22:10:37','Kirti Kumar'),
(57,'New Custom Field Added [Body Type]','2022-12-02 22:11:03','Kirti Kumar'),
(58,'New Custom Field Added [Kilometers]','2022-12-02 22:13:42','Kirti Kumar'),
(59,'New Custom Field Added [Exterior Color]','2022-12-02 22:18:09','Kirti Kumar'),
(60,'New Custom Field Added [Interior Color]','2022-12-02 22:18:29','Kirti Kumar'),
(61,'New Custom Field Added [Seats]','2022-12-02 22:21:37','Kirti Kumar'),
(62,'New Custom Field Added [Doors]','2022-12-02 22:22:27','Kirti Kumar'),
(63,'New Custom Field Added [Top Speed]','2022-12-02 22:25:08','Kirti Kumar'),
(64,'New Custom Field Added [Warranty]','2022-12-02 22:25:38','Kirti Kumar'),
(65,'New Custom Field Added [Tablilla]','2022-12-02 22:29:21','Kirti Kumar'),
(66,'New Custom Field Added [Marbete]','2022-12-02 22:29:52','Kirti Kumar'),
(67,'New Custom Field Added [Key Number]','2022-12-02 22:31:18','Kirti Kumar'),
(68,'New Custom Field Added [Auto Expreso ID Number]','2022-12-02 22:31:45','Kirti Kumar'),
(69,'New Custom Field Added [Radio Code]','2022-12-02 22:33:59','Kirti Kumar'),
(70,'New Custom Field Added [Mechanical]','2022-12-02 22:37:40','Kirti Kumar'),
(71,'New Custom Field Added [Interiors]','2022-12-02 22:38:04','Kirti Kumar'),
(72,'Custom Field Updated [Exteriors]','2022-12-02 22:38:57','Kirti Kumar'),
(73,'New Custom Field Added [Security]','2022-12-02 22:39:29','Kirti Kumar'),
(74,'New Custom Field Added [Mechanical]','2022-12-02 22:40:06','Kirti Kumar'),
(75,'New Custom Field Added [Entertainment]','2022-12-02 22:40:30','Kirti Kumar'),
(76,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-03 11:05:03','Kirti Kumar'),
(77,'New Warehouse Item Added [ID:13, 3C4NJCAB6LT135740]','2022-12-03 17:14:04','Kirti Kumar'),
(78,'commodity Attachment Deleted [commodityID: 13]','2022-12-03 17:40:50','Kirti Kumar'),
(79,'commodity Attachment Deleted [commodityID: 13]','2022-12-03 17:40:50','Kirti Kumar'),
(80,'commodity Attachment Deleted [commodityID: 12]','2022-12-03 17:40:58','Kirti Kumar'),
(81,'commodity Attachment Deleted [commodityID: 12]','2022-12-03 17:40:58','Kirti Kumar'),
(82,'commodity Attachment Deleted [commodityID: 12]','2022-12-03 17:40:58','Kirti Kumar'),
(83,'New Warehouse Item Added [ID:14, 3C4NJCAB6LT135740]','2022-12-03 17:41:46','Kirti Kumar'),
(84,'New Custom Field Added [Estimated Credit Score]','2022-12-03 20:10:04','Kirti Kumar'),
(85,'Custom Field Updated [SSN]','2022-12-03 20:11:17','Kirti Kumar'),
(86,'New Custom Field Added [Estimated Credit Score]','2022-12-03 20:11:38','Kirti Kumar'),
(87,'New Custom Field Added [Trade In]','2022-12-03 20:11:57','Kirti Kumar'),
(88,'New Custom Field Added [Down Payment]','2022-12-03 20:12:19','Kirti Kumar'),
(89,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-05 19:13:28','Kirti Kumar'),
(90,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-06 12:35:32','Kirti Kumar'),
(91,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-06 21:31:57','Kirti Kumar'),
(92,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-07 19:16:05','Kirti Kumar'),
(93,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-09 12:42:44','Kirti Kumar'),
(94,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-10 13:05:49','Kirti Kumar'),
(95,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-13 17:44:37','Kirti Kumar'),
(96,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-14 18:39:03','Kirti Kumar'),
(97,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-20 20:07:51','Kirti Kumar'),
(98,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-29 11:56:19','Kirti Kumar'),
(99,'Items Group Created [Name: Parts]','2022-12-29 11:57:21','Kirti Kumar'),
(100,'New Custom Field Added [Transportation Type]','2022-12-29 12:09:08','Kirti Kumar'),
(101,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2022-12-31 22:52:39','Kirti Kumar'),
(102,'New Custom Field Added [Available Status]','2022-12-31 22:56:22','Kirti Kumar'),
(103,'Custom Field Deleted [34]','2022-12-31 22:58:54','Kirti Kumar'),
(104,'New Custom Field Added [Available Status]','2022-12-31 23:04:25','Kirti Kumar'),
(105,'Custom Field Updated [Available Status]','2022-12-31 23:06:35','Kirti Kumar'),
(106,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2023-01-02 11:40:19','Kirti Kumar'),
(107,'New Warehouse Item Added [ID:15, Jeep Wrangler]','2023-01-02 13:15:03','Kirti Kumar'),
(108,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2023-01-03 10:56:48','Kirti Kumar'),
(109,'Proposal Status Changes [ProposalID:1, Status:Accepted,Client Action: 1]','2023-01-03 12:24:24','Kirti Kumar'),
(110,'New Warehouse Item Added [ID:16, Mazda MX-5 Miata RF]','2023-01-03 15:13:32','Kirti Kumar'),
(111,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2023-01-03 16:02:50','Kirti Kumar'),
(112,'New Proposal Created [ID: 2]','2023-01-03 21:37:31','Kirti Kumar'),
(113,'New Proposal Created [ID: 3]','2023-01-03 21:56:51','Kirti Kumar'),
(114,'Proposal Updated [ID:3]','2023-01-03 22:06:06','Kirti Kumar'),
(115,'New Proposal Created [ID: 4]','2023-01-03 22:10:31','Kirti Kumar'),
(116,'User Successfully Logged In [User Id: 1, Is Staff Member: Yes, IP: ::1]','2023-01-04 16:09:59','Kirti Kumar'),
(117,'New Custom Field Added [Type]','2023-01-04 18:38:20','Kirti Kumar'),
(118,'New Custom Field Added [Type]','2023-01-04 18:38:21','Kirti Kumar'),
(119,'Custom Field Updated [Type]','2023-01-04 18:39:08','Kirti Kumar'),
(120,'Custom Field Deleted [37]','2023-01-04 18:39:47','Kirti Kumar'),
(121,'New Custom Field Added [Trade In?]','2023-01-04 18:47:41','Kirti Kumar'),
(122,'Custom Field Updated [Type]','2023-01-04 18:49:35','Kirti Kumar'),
(123,'Custom Field Updated [Trade In?]','2023-01-04 18:49:58','Kirti Kumar'),
(124,'New Custom Field Added [Financing entity]','2023-01-04 19:04:06','Kirti Kumar'),
(125,'New Custom Field Added [APR]','2023-01-04 19:11:31','Kirti Kumar'),
(126,'New Custom Field Added [Down Payment]','2023-01-04 19:12:46','Kirti Kumar'),
(127,'New Custom Field Added [Payment Term]','2023-01-04 19:13:57','Kirti Kumar'),
(128,'Custom Field Updated [Trade In?]','2023-01-04 19:14:39','Kirti Kumar'),
(129,'Custom Field Updated [Trade In?]','2023-01-04 19:14:52','Kirti Kumar'),
(130,'Custom Field Updated [Trade In?]','2023-01-04 19:15:00','Kirti Kumar'),
(131,'Custom Field Updated [Payment Term]','2023-01-04 19:15:24','Kirti Kumar'),
(132,'New Custom Field Added [Monthly payment]','2023-01-04 19:17:56','Kirti Kumar'),
(133,'New Custom Field Added [Balance]','2023-01-04 19:18:21','Kirti Kumar'),
(134,'Custom Field Updated [Down Payment]','2023-01-04 19:18:54','Kirti Kumar'),
(135,'Custom Field Updated [Down Payment]','2023-01-04 19:19:19','Kirti Kumar'),
(136,'Custom Field Updated [Trade In?]','2023-01-04 19:19:46','Kirti Kumar'),
(137,'Custom Field Updated [Down Payment]','2023-01-04 19:20:03','Kirti Kumar'),
(138,'Custom Field Updated [Trade In?]','2023-01-04 19:21:29','Kirti Kumar'),
(139,'Custom Field Deleted [41]','2023-01-04 19:21:56','Kirti Kumar'),
(140,'Custom Field Deleted [39]','2023-01-04 19:23:45','Kirti Kumar'),
(141,'Custom Field Updated [Trade In?]','2023-01-04 19:24:07','Kirti Kumar'),
(142,'Custom Field Updated [Type]','2023-01-04 19:24:23','Kirti Kumar'),
(143,'Custom Field Updated [Trade In?]','2023-01-04 19:24:31','Kirti Kumar'),
(144,'New Custom Field Added [Down Payment]','2023-01-04 19:25:42','Kirti Kumar'),
(145,'Custom Field Updated [APR]','2023-01-04 19:26:12','Kirti Kumar'),
(146,'Custom Field Updated [Payment Term]','2023-01-04 19:26:20','Kirti Kumar'),
(147,'Custom Field Updated [Monthly]','2023-01-04 19:26:32','Kirti Kumar'),
(148,'Custom Field Updated [Balance]','2023-01-04 19:26:40','Kirti Kumar'),
(149,'Custom Field Updated [Monthly Payment]','2023-01-04 19:27:17','Kirti Kumar'),
(150,'Custom Field Updated [Down Payment]','2023-01-04 19:28:00','Kirti Kumar'),
(151,'Custom Field Updated [Monthly Payment]','2023-01-04 19:28:12','Kirti Kumar'),
(152,'New Custom Field Added [Tradein]','2023-01-04 19:28:32','Kirti Kumar'),
(153,'New Custom Field Added [Make]','2023-01-04 19:31:15','Kirti Kumar'),
(154,'Custom Field Updated [Trade In?]','2023-01-04 19:31:49','Kirti Kumar'),
(155,'Custom Field Updated [Type]','2023-01-04 19:32:04','Kirti Kumar'),
(156,'Custom Field Updated [Trade In?]','2023-01-04 19:32:32','Kirti Kumar'),
(157,'New Custom Field Added [Model]','2023-01-04 19:33:24','Kirti Kumar'),
(158,'New Custom Field Added [Year]','2023-01-04 19:33:47','Kirti Kumar'),
(159,'New Custom Field Added [Color]','2023-01-04 19:34:04','Kirti Kumar'),
(160,'New Custom Field Added [Mileage]','2023-01-04 19:34:31','Kirti Kumar'),
(161,'New Custom Field Added [Tradein VIN]','2023-01-04 21:12:20','Kirti Kumar'),
(162,'New Custom Field Added [Make]','2023-01-04 21:59:00','Kirti Kumar'),
(163,'New Custom Field Added [Model]','2023-01-04 21:59:35','Kirti Kumar'),
(164,'New Custom Field Added [Year]','2023-01-04 22:00:13','Kirti Kumar'),
(165,'New Custom Field Added [Tablilla]','2023-01-04 22:01:23','Kirti Kumar'),
(166,'New Custom Field Added [Millaje]','2023-01-04 22:01:59','Kirti Kumar'),
(167,'New Custom Field Added [Color]','2023-01-04 22:02:37','Kirti Kumar'),
(168,'New Custom Field Added [Marbete]','2023-01-04 22:03:03','Kirti Kumar'),
(169,'New Custom Field Added [Vence]','2023-01-04 22:03:46','Kirti Kumar'),
(170,'New Custom Field Added [Due]','2023-01-04 22:04:22','Kirti Kumar'),
(171,'Custom Field Updated [Trade In?]','2023-01-04 22:09:28','Kirti Kumar'),
(172,'Custom Field Updated [Type]','2023-01-04 22:09:39','Kirti Kumar'),
(173,'New Custom Field Added [Financing entity]','2023-01-04 22:10:16','Kirti Kumar'),
(174,'Custom Field Deleted [62]','2023-01-04 22:12:55','Kirti Kumar'),
(175,'Custom Field Updated [Type]','2023-01-04 22:13:20','Kirti Kumar');

/*Table structure for table `tblannouncements` */

DROP TABLE IF EXISTS `tblannouncements`;

CREATE TABLE `tblannouncements` (
  `announcementid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `message` text DEFAULT NULL,
  `showtousers` int(11) NOT NULL,
  `showtostaff` int(11) NOT NULL,
  `showname` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `userid` varchar(100) NOT NULL,
  PRIMARY KEY (`announcementid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblannouncements` */

/*Table structure for table `tblapplicable_staff` */

DROP TABLE IF EXISTS `tblapplicable_staff`;

CREATE TABLE `tblapplicable_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `commission_policy` int(11) NOT NULL,
  `applicable_staff` longtext NOT NULL,
  `name` varchar(255) NOT NULL,
  `datecreated` datetime NOT NULL,
  `addedfrom` int(11) NOT NULL,
  `is_client` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblapplicable_staff` */

/*Table structure for table `tblappointly_appointment_types` */

DROP TABLE IF EXISTS `tblappointly_appointment_types`;

CREATE TABLE `tblappointly_appointment_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(191) NOT NULL,
  `color` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_appointment_types` */

insert  into `tblappointly_appointment_types`(`id`,`type`,`color`) values 
(1,'Maintanence','#0000ff');

/*Table structure for table `tblappointly_appointments` */

DROP TABLE IF EXISTS `tblappointly_appointments`;

CREATE TABLE `tblappointly_appointments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `google_event_id` varchar(191) DEFAULT NULL,
  `google_calendar_link` varchar(191) DEFAULT NULL,
  `google_meet_link` varchar(191) DEFAULT NULL,
  `google_added_by_id` int(11) DEFAULT NULL,
  `outlook_event_id` varchar(191) DEFAULT NULL,
  `outlook_calendar_link` varchar(255) DEFAULT NULL,
  `outlook_added_by_id` int(11) DEFAULT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `notes` longtext DEFAULT NULL,
  `contact_id` int(11) DEFAULT NULL,
  `by_sms` tinyint(1) DEFAULT NULL,
  `by_email` tinyint(1) DEFAULT NULL,
  `hash` varchar(191) DEFAULT NULL,
  `notification_date` datetime DEFAULT NULL,
  `external_notification_date` datetime DEFAULT NULL,
  `date` date NOT NULL,
  `start_hour` varchar(191) NOT NULL,
  `approved` tinyint(1) NOT NULL DEFAULT 0,
  `created_by` int(11) DEFAULT NULL,
  `reminder_before` int(11) DEFAULT NULL,
  `reminder_before_type` varchar(10) DEFAULT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT 0,
  `cancelled` tinyint(1) NOT NULL DEFAULT 0,
  `cancel_notes` text DEFAULT NULL,
  `source` varchar(191) DEFAULT NULL,
  `type_id` int(11) NOT NULL DEFAULT 0,
  `feedback` smallint(6) DEFAULT NULL,
  `feedback_comment` text DEFAULT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `custom_recurring` tinyint(4) NOT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `last_recurring_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_appointments` */

/*Table structure for table `tblappointly_attendees` */

DROP TABLE IF EXISTS `tblappointly_attendees`;

CREATE TABLE `tblappointly_attendees` (
  `staff_id` int(11) NOT NULL,
  `appointment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_attendees` */

/*Table structure for table `tblappointly_callbacks` */

DROP TABLE IF EXISTS `tblappointly_callbacks`;

CREATE TABLE `tblappointly_callbacks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `call_type` varchar(191) NOT NULL,
  `phone_number` varchar(191) NOT NULL,
  `timezone` varchar(191) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `status` varchar(191) NOT NULL DEFAULT '1',
  `message` text NOT NULL,
  `email` varchar(191) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_callbacks` */

/*Table structure for table `tblappointly_callbacks_assignees` */

DROP TABLE IF EXISTS `tblappointly_callbacks_assignees`;

CREATE TABLE `tblappointly_callbacks_assignees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `callbackid` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_callbacks_assignees` */

/*Table structure for table `tblappointly_google` */

DROP TABLE IF EXISTS `tblappointly_google`;

CREATE TABLE `tblappointly_google` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `access_token` varchar(191) NOT NULL,
  `refresh_token` varchar(191) NOT NULL,
  `expires_in` varchar(191) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblappointly_google` */

/*Table structure for table `tblbonus_discipline` */

DROP TABLE IF EXISTS `tblbonus_discipline`;

CREATE TABLE `tblbonus_discipline` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `id_criteria` varchar(200) DEFAULT NULL,
  `type` int(3) NOT NULL,
  `apply_for` varchar(50) DEFAULT NULL,
  `from_time` datetime DEFAULT NULL,
  `lever_bonus` int(11) DEFAULT NULL,
  `approver` int(11) DEFAULT NULL,
  `url_file` longtext DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `id_admin` int(3) DEFAULT NULL,
  `status` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblbonus_discipline` */

/*Table structure for table `tblbonus_discipline_detail` */

DROP TABLE IF EXISTS `tblbonus_discipline_detail`;

CREATE TABLE `tblbonus_discipline_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_bonus_discipline` int(11) NOT NULL,
  `from_time` datetime DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `department_id` longtext DEFAULT NULL,
  `lever_bonus` int(11) DEFAULT NULL,
  `formality` varchar(50) DEFAULT NULL,
  `formality_value` varchar(100) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblbonus_discipline_detail` */

/*Table structure for table `tblcheck_in_out` */

DROP TABLE IF EXISTS `tblcheck_in_out`;

CREATE TABLE `tblcheck_in_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `type_check` int(11) DEFAULT NULL,
  `type` varchar(5) NOT NULL DEFAULT 'W',
  `route_point_id` int(11) DEFAULT NULL,
  `workplace_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblcheck_in_out` */

insert  into `tblcheck_in_out`(`id`,`staff_id`,`date`,`type_check`,`type`,`route_point_id`,`workplace_id`) values 
(1,1,'2022-12-06 21:55:51',1,'W',0,0),
(2,1,'2022-12-06 21:57:40',2,'W',0,0);

/*Table structure for table `tblchecklist` */

DROP TABLE IF EXISTS `tblchecklist`;

CREATE TABLE `tblchecklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblchecklist` */

/*Table structure for table `tblchecklist_allocation` */

DROP TABLE IF EXISTS `tblchecklist_allocation`;

CREATE TABLE `tblchecklist_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblchecklist_allocation` */

/*Table structure for table `tblclients` */

DROP TABLE IF EXISTS `tblclients`;

CREATE TABLE `tblclients` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(191) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 0,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `leadid` int(11) DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT 0,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT 0,
  `longitude` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `default_language` varchar(40) DEFAULT NULL,
  `default_currency` int(11) NOT NULL DEFAULT 0,
  `show_primary_contact` int(11) NOT NULL DEFAULT 0,
  `stripe_id` varchar(40) DEFAULT NULL,
  `registration_confirmed` int(11) NOT NULL DEFAULT 1,
  `addedfrom` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userid`),
  KEY `country` (`country`),
  KEY `leadid` (`leadid`),
  KEY `company` (`company`),
  KEY `active` (`active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblclients` */

/*Table structure for table `tblcommission` */

DROP TABLE IF EXISTS `tblcommission`;

CREATE TABLE `tblcommission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `date` date NOT NULL,
  `is_client` int(11) NOT NULL DEFAULT 0,
  `paid` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission` */

/*Table structure for table `tblcommission_hierarchy` */

DROP TABLE IF EXISTS `tblcommission_hierarchy`;

CREATE TABLE `tblcommission_hierarchy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesman` int(11) NOT NULL,
  `coordinator` int(11) NOT NULL,
  `percent` varchar(45) NOT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission_hierarchy` */

/*Table structure for table `tblcommission_policy` */

DROP TABLE IF EXISTS `tblcommission_policy`;

CREATE TABLE `tblcommission_policy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date DEFAULT NULL,
  `percent_enjoyed` varchar(45) DEFAULT NULL,
  `product_setting` longtext DEFAULT NULL,
  `ladder_setting` longtext DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `commission_policy_type` varchar(45) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `clients` text DEFAULT NULL,
  `client_groups` text DEFAULT NULL,
  `commmission_first_invoices` int(11) NOT NULL DEFAULT 0,
  `number_first_invoices` int(11) NOT NULL DEFAULT 0,
  `percent_first_invoices` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission_policy` */

/*Table structure for table `tblcommission_receipt` */

DROP TABLE IF EXISTS `tblcommission_receipt`;

CREATE TABLE `tblcommission_receipt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` varchar(40) DEFAULT NULL,
  `paymentmethod` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text NOT NULL,
  `transactionid` mediumtext DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `convert_expense` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission_receipt` */

/*Table structure for table `tblcommission_receipt_detail` */

DROP TABLE IF EXISTS `tblcommission_receipt_detail`;

CREATE TABLE `tblcommission_receipt_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `receipt_id` int(11) NOT NULL,
  `commission_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission_receipt_detail` */

/*Table structure for table `tblcommission_salesadmin_group` */

DROP TABLE IF EXISTS `tblcommission_salesadmin_group`;

CREATE TABLE `tblcommission_salesadmin_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `salesadmin` int(11) NOT NULL,
  `customer_group` int(11) NOT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcommission_salesadmin_group` */

/*Table structure for table `tblconsent_purposes` */

DROP TABLE IF EXISTS `tblconsent_purposes`;

CREATE TABLE `tblconsent_purposes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblconsent_purposes` */

/*Table structure for table `tblconsents` */

DROP TABLE IF EXISTS `tblconsents`;

CREATE TABLE `tblconsents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `action` varchar(10) NOT NULL,
  `date` datetime NOT NULL,
  `ip` varchar(40) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `lead_id` int(11) NOT NULL DEFAULT 0,
  `description` text DEFAULT NULL,
  `opt_in_purpose_description` text DEFAULT NULL,
  `purpose_id` int(11) NOT NULL,
  `staff_name` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `purpose_id` (`purpose_id`),
  KEY `contact_id` (`contact_id`),
  KEY `lead_id` (`lead_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblconsents` */

/*Table structure for table `tblcontact_permissions` */

DROP TABLE IF EXISTS `tblcontact_permissions`;

CREATE TABLE `tblcontact_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permission_id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontact_permissions` */

/*Table structure for table `tblcontacts` */

DROP TABLE IF EXISTS `tblcontacts`;

CREATE TABLE `tblcontacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `is_primary` int(11) NOT NULL DEFAULT 1,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `email_verification_key` varchar(32) DEFAULT NULL,
  `email_verification_sent_at` datetime DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_image` varchar(191) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `invoice_emails` tinyint(1) NOT NULL DEFAULT 1,
  `estimate_emails` tinyint(1) NOT NULL DEFAULT 1,
  `credit_note_emails` tinyint(1) NOT NULL DEFAULT 1,
  `contract_emails` tinyint(1) NOT NULL DEFAULT 1,
  `task_emails` tinyint(1) NOT NULL DEFAULT 1,
  `project_emails` tinyint(1) NOT NULL DEFAULT 1,
  `ticket_emails` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`),
  KEY `email` (`email`),
  KEY `is_primary` (`is_primary`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontacts` */

/*Table structure for table `tblcontract_comments` */

DROP TABLE IF EXISTS `tblcontract_comments`;

CREATE TABLE `tblcontract_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext DEFAULT NULL,
  `contract_id` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontract_comments` */

/*Table structure for table `tblcontract_renewals` */

DROP TABLE IF EXISTS `tblcontract_renewals`;

CREATE TABLE `tblcontract_renewals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contractid` int(11) NOT NULL,
  `old_start_date` date NOT NULL,
  `new_start_date` date NOT NULL,
  `old_end_date` date DEFAULT NULL,
  `new_end_date` date DEFAULT NULL,
  `old_value` decimal(15,2) DEFAULT NULL,
  `new_value` decimal(15,2) DEFAULT NULL,
  `date_renewed` datetime NOT NULL,
  `renewed_by` varchar(100) NOT NULL,
  `renewed_by_staff_id` int(11) NOT NULL DEFAULT 0,
  `is_on_old_expiry_notified` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontract_renewals` */

/*Table structure for table `tblcontracts` */

DROP TABLE IF EXISTS `tblcontracts`;

CREATE TABLE `tblcontracts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` longtext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `client` int(11) NOT NULL,
  `datestart` date DEFAULT NULL,
  `dateend` date DEFAULT NULL,
  `contract_type` int(11) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `isexpirynotified` int(11) NOT NULL DEFAULT 0,
  `contract_value` decimal(15,2) DEFAULT NULL,
  `trash` tinyint(1) DEFAULT 0,
  `not_visible_to_client` tinyint(1) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `signed` tinyint(1) NOT NULL DEFAULT 0,
  `signature` varchar(40) DEFAULT NULL,
  `marked_as_signed` tinyint(1) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client` (`client`),
  KEY `contract_type` (`contract_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontracts` */

/*Table structure for table `tblcontracts_types` */

DROP TABLE IF EXISTS `tblcontracts_types`;

CREATE TABLE `tblcontracts_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcontracts_types` */

/*Table structure for table `tblcountries` */

DROP TABLE IF EXISTS `tblcountries`;

CREATE TABLE `tblcountries` (
  `country_id` int(11) NOT NULL AUTO_INCREMENT,
  `iso2` char(2) DEFAULT NULL,
  `short_name` varchar(80) NOT NULL DEFAULT '',
  `long_name` varchar(80) NOT NULL DEFAULT '',
  `iso3` char(3) DEFAULT NULL,
  `numcode` varchar(6) DEFAULT NULL,
  `un_member` varchar(12) DEFAULT NULL,
  `calling_code` varchar(8) DEFAULT NULL,
  `cctld` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`country_id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

/*Data for the table `tblcountries` */

insert  into `tblcountries`(`country_id`,`iso2`,`short_name`,`long_name`,`iso3`,`numcode`,`un_member`,`calling_code`,`cctld`) values 
(1,'AF','Afghanistan','Islamic Republic of Afghanistan','AFG','004','yes','93','.af'),
(2,'AX','Aland Islands','&Aring;land Islands','ALA','248','no','358','.ax'),
(3,'AL','Albania','Republic of Albania','ALB','008','yes','355','.al'),
(4,'DZ','Algeria','People\'s Democratic Republic of Algeria','DZA','012','yes','213','.dz'),
(5,'AS','American Samoa','American Samoa','ASM','016','no','1+684','.as'),
(6,'AD','Andorra','Principality of Andorra','AND','020','yes','376','.ad'),
(7,'AO','Angola','Republic of Angola','AGO','024','yes','244','.ao'),
(8,'AI','Anguilla','Anguilla','AIA','660','no','1+264','.ai'),
(9,'AQ','Antarctica','Antarctica','ATA','010','no','672','.aq'),
(10,'AG','Antigua and Barbuda','Antigua and Barbuda','ATG','028','yes','1+268','.ag'),
(11,'AR','Argentina','Argentine Republic','ARG','032','yes','54','.ar'),
(12,'AM','Armenia','Republic of Armenia','ARM','051','yes','374','.am'),
(13,'AW','Aruba','Aruba','ABW','533','no','297','.aw'),
(14,'AU','Australia','Commonwealth of Australia','AUS','036','yes','61','.au'),
(15,'AT','Austria','Republic of Austria','AUT','040','yes','43','.at'),
(16,'AZ','Azerbaijan','Republic of Azerbaijan','AZE','031','yes','994','.az'),
(17,'BS','Bahamas','Commonwealth of The Bahamas','BHS','044','yes','1+242','.bs'),
(18,'BH','Bahrain','Kingdom of Bahrain','BHR','048','yes','973','.bh'),
(19,'BD','Bangladesh','People\'s Republic of Bangladesh','BGD','050','yes','880','.bd'),
(20,'BB','Barbados','Barbados','BRB','052','yes','1+246','.bb'),
(21,'BY','Belarus','Republic of Belarus','BLR','112','yes','375','.by'),
(22,'BE','Belgium','Kingdom of Belgium','BEL','056','yes','32','.be'),
(23,'BZ','Belize','Belize','BLZ','084','yes','501','.bz'),
(24,'BJ','Benin','Republic of Benin','BEN','204','yes','229','.bj'),
(25,'BM','Bermuda','Bermuda Islands','BMU','060','no','1+441','.bm'),
(26,'BT','Bhutan','Kingdom of Bhutan','BTN','064','yes','975','.bt'),
(27,'BO','Bolivia','Plurinational State of Bolivia','BOL','068','yes','591','.bo'),
(28,'BQ','Bonaire, Sint Eustatius and Saba','Bonaire, Sint Eustatius and Saba','BES','535','no','599','.bq'),
(29,'BA','Bosnia and Herzegovina','Bosnia and Herzegovina','BIH','070','yes','387','.ba'),
(30,'BW','Botswana','Republic of Botswana','BWA','072','yes','267','.bw'),
(31,'BV','Bouvet Island','Bouvet Island','BVT','074','no','NONE','.bv'),
(32,'BR','Brazil','Federative Republic of Brazil','BRA','076','yes','55','.br'),
(33,'IO','British Indian Ocean Territory','British Indian Ocean Territory','IOT','086','no','246','.io'),
(34,'BN','Brunei','Brunei Darussalam','BRN','096','yes','673','.bn'),
(35,'BG','Bulgaria','Republic of Bulgaria','BGR','100','yes','359','.bg'),
(36,'BF','Burkina Faso','Burkina Faso','BFA','854','yes','226','.bf'),
(37,'BI','Burundi','Republic of Burundi','BDI','108','yes','257','.bi'),
(38,'KH','Cambodia','Kingdom of Cambodia','KHM','116','yes','855','.kh'),
(39,'CM','Cameroon','Republic of Cameroon','CMR','120','yes','237','.cm'),
(40,'CA','Canada','Canada','CAN','124','yes','1','.ca'),
(41,'CV','Cape Verde','Republic of Cape Verde','CPV','132','yes','238','.cv'),
(42,'KY','Cayman Islands','The Cayman Islands','CYM','136','no','1+345','.ky'),
(43,'CF','Central African Republic','Central African Republic','CAF','140','yes','236','.cf'),
(44,'TD','Chad','Republic of Chad','TCD','148','yes','235','.td'),
(45,'CL','Chile','Republic of Chile','CHL','152','yes','56','.cl'),
(46,'CN','China','People\'s Republic of China','CHN','156','yes','86','.cn'),
(47,'CX','Christmas Island','Christmas Island','CXR','162','no','61','.cx'),
(48,'CC','Cocos (Keeling) Islands','Cocos (Keeling) Islands','CCK','166','no','61','.cc'),
(49,'CO','Colombia','Republic of Colombia','COL','170','yes','57','.co'),
(50,'KM','Comoros','Union of the Comoros','COM','174','yes','269','.km'),
(51,'CG','Congo','Republic of the Congo','COG','178','yes','242','.cg'),
(52,'CK','Cook Islands','Cook Islands','COK','184','some','682','.ck'),
(53,'CR','Costa Rica','Republic of Costa Rica','CRI','188','yes','506','.cr'),
(54,'CI','Cote d\'ivoire (Ivory Coast)','Republic of C&ocirc;te D\'Ivoire (Ivory Coast)','CIV','384','yes','225','.ci'),
(55,'HR','Croatia','Republic of Croatia','HRV','191','yes','385','.hr'),
(56,'CU','Cuba','Republic of Cuba','CUB','192','yes','53','.cu'),
(57,'CW','Curacao','Cura&ccedil;ao','CUW','531','no','599','.cw'),
(58,'CY','Cyprus','Republic of Cyprus','CYP','196','yes','357','.cy'),
(59,'CZ','Czech Republic','Czech Republic','CZE','203','yes','420','.cz'),
(60,'CD','Democratic Republic of the Congo','Democratic Republic of the Congo','COD','180','yes','243','.cd'),
(61,'DK','Denmark','Kingdom of Denmark','DNK','208','yes','45','.dk'),
(62,'DJ','Djibouti','Republic of Djibouti','DJI','262','yes','253','.dj'),
(63,'DM','Dominica','Commonwealth of Dominica','DMA','212','yes','1+767','.dm'),
(64,'DO','Dominican Republic','Dominican Republic','DOM','214','yes','1+809, 8','.do'),
(65,'EC','Ecuador','Republic of Ecuador','ECU','218','yes','593','.ec'),
(66,'EG','Egypt','Arab Republic of Egypt','EGY','818','yes','20','.eg'),
(67,'SV','El Salvador','Republic of El Salvador','SLV','222','yes','503','.sv'),
(68,'GQ','Equatorial Guinea','Republic of Equatorial Guinea','GNQ','226','yes','240','.gq'),
(69,'ER','Eritrea','State of Eritrea','ERI','232','yes','291','.er'),
(70,'EE','Estonia','Republic of Estonia','EST','233','yes','372','.ee'),
(71,'ET','Ethiopia','Federal Democratic Republic of Ethiopia','ETH','231','yes','251','.et'),
(72,'FK','Falkland Islands (Malvinas)','The Falkland Islands (Malvinas)','FLK','238','no','500','.fk'),
(73,'FO','Faroe Islands','The Faroe Islands','FRO','234','no','298','.fo'),
(74,'FJ','Fiji','Republic of Fiji','FJI','242','yes','679','.fj'),
(75,'FI','Finland','Republic of Finland','FIN','246','yes','358','.fi'),
(76,'FR','France','French Republic','FRA','250','yes','33','.fr'),
(77,'GF','French Guiana','French Guiana','GUF','254','no','594','.gf'),
(78,'PF','French Polynesia','French Polynesia','PYF','258','no','689','.pf'),
(79,'TF','French Southern Territories','French Southern Territories','ATF','260','no',NULL,'.tf'),
(80,'GA','Gabon','Gabonese Republic','GAB','266','yes','241','.ga'),
(81,'GM','Gambia','Republic of The Gambia','GMB','270','yes','220','.gm'),
(82,'GE','Georgia','Georgia','GEO','268','yes','995','.ge'),
(83,'DE','Germany','Federal Republic of Germany','DEU','276','yes','49','.de'),
(84,'GH','Ghana','Republic of Ghana','GHA','288','yes','233','.gh'),
(85,'GI','Gibraltar','Gibraltar','GIB','292','no','350','.gi'),
(86,'GR','Greece','Hellenic Republic','GRC','300','yes','30','.gr'),
(87,'GL','Greenland','Greenland','GRL','304','no','299','.gl'),
(88,'GD','Grenada','Grenada','GRD','308','yes','1+473','.gd'),
(89,'GP','Guadaloupe','Guadeloupe','GLP','312','no','590','.gp'),
(90,'GU','Guam','Guam','GUM','316','no','1+671','.gu'),
(91,'GT','Guatemala','Republic of Guatemala','GTM','320','yes','502','.gt'),
(92,'GG','Guernsey','Guernsey','GGY','831','no','44','.gg'),
(93,'GN','Guinea','Republic of Guinea','GIN','324','yes','224','.gn'),
(94,'GW','Guinea-Bissau','Republic of Guinea-Bissau','GNB','624','yes','245','.gw'),
(95,'GY','Guyana','Co-operative Republic of Guyana','GUY','328','yes','592','.gy'),
(96,'HT','Haiti','Republic of Haiti','HTI','332','yes','509','.ht'),
(97,'HM','Heard Island and McDonald Islands','Heard Island and McDonald Islands','HMD','334','no','NONE','.hm'),
(98,'HN','Honduras','Republic of Honduras','HND','340','yes','504','.hn'),
(99,'HK','Hong Kong','Hong Kong','HKG','344','no','852','.hk'),
(100,'HU','Hungary','Hungary','HUN','348','yes','36','.hu'),
(101,'IS','Iceland','Republic of Iceland','ISL','352','yes','354','.is'),
(102,'IN','India','Republic of India','IND','356','yes','91','.in'),
(103,'ID','Indonesia','Republic of Indonesia','IDN','360','yes','62','.id'),
(104,'IR','Iran','Islamic Republic of Iran','IRN','364','yes','98','.ir'),
(105,'IQ','Iraq','Republic of Iraq','IRQ','368','yes','964','.iq'),
(106,'IE','Ireland','Ireland','IRL','372','yes','353','.ie'),
(107,'IM','Isle of Man','Isle of Man','IMN','833','no','44','.im'),
(108,'IL','Israel','State of Israel','ISR','376','yes','972','.il'),
(109,'IT','Italy','Italian Republic','ITA','380','yes','39','.jm'),
(110,'JM','Jamaica','Jamaica','JAM','388','yes','1+876','.jm'),
(111,'JP','Japan','Japan','JPN','392','yes','81','.jp'),
(112,'JE','Jersey','The Bailiwick of Jersey','JEY','832','no','44','.je'),
(113,'JO','Jordan','Hashemite Kingdom of Jordan','JOR','400','yes','962','.jo'),
(114,'KZ','Kazakhstan','Republic of Kazakhstan','KAZ','398','yes','7','.kz'),
(115,'KE','Kenya','Republic of Kenya','KEN','404','yes','254','.ke'),
(116,'KI','Kiribati','Republic of Kiribati','KIR','296','yes','686','.ki'),
(117,'XK','Kosovo','Republic of Kosovo','---','---','some','381',''),
(118,'KW','Kuwait','State of Kuwait','KWT','414','yes','965','.kw'),
(119,'KG','Kyrgyzstan','Kyrgyz Republic','KGZ','417','yes','996','.kg'),
(120,'LA','Laos','Lao People\'s Democratic Republic','LAO','418','yes','856','.la'),
(121,'LV','Latvia','Republic of Latvia','LVA','428','yes','371','.lv'),
(122,'LB','Lebanon','Republic of Lebanon','LBN','422','yes','961','.lb'),
(123,'LS','Lesotho','Kingdom of Lesotho','LSO','426','yes','266','.ls'),
(124,'LR','Liberia','Republic of Liberia','LBR','430','yes','231','.lr'),
(125,'LY','Libya','Libya','LBY','434','yes','218','.ly'),
(126,'LI','Liechtenstein','Principality of Liechtenstein','LIE','438','yes','423','.li'),
(127,'LT','Lithuania','Republic of Lithuania','LTU','440','yes','370','.lt'),
(128,'LU','Luxembourg','Grand Duchy of Luxembourg','LUX','442','yes','352','.lu'),
(129,'MO','Macao','The Macao Special Administrative Region','MAC','446','no','853','.mo'),
(130,'MK','North Macedonia','Republic of North Macedonia','MKD','807','yes','389','.mk'),
(131,'MG','Madagascar','Republic of Madagascar','MDG','450','yes','261','.mg'),
(132,'MW','Malawi','Republic of Malawi','MWI','454','yes','265','.mw'),
(133,'MY','Malaysia','Malaysia','MYS','458','yes','60','.my'),
(134,'MV','Maldives','Republic of Maldives','MDV','462','yes','960','.mv'),
(135,'ML','Mali','Republic of Mali','MLI','466','yes','223','.ml'),
(136,'MT','Malta','Republic of Malta','MLT','470','yes','356','.mt'),
(137,'MH','Marshall Islands','Republic of the Marshall Islands','MHL','584','yes','692','.mh'),
(138,'MQ','Martinique','Martinique','MTQ','474','no','596','.mq'),
(139,'MR','Mauritania','Islamic Republic of Mauritania','MRT','478','yes','222','.mr'),
(140,'MU','Mauritius','Republic of Mauritius','MUS','480','yes','230','.mu'),
(141,'YT','Mayotte','Mayotte','MYT','175','no','262','.yt'),
(142,'MX','Mexico','United Mexican States','MEX','484','yes','52','.mx'),
(143,'FM','Micronesia','Federated States of Micronesia','FSM','583','yes','691','.fm'),
(144,'MD','Moldava','Republic of Moldova','MDA','498','yes','373','.md'),
(145,'MC','Monaco','Principality of Monaco','MCO','492','yes','377','.mc'),
(146,'MN','Mongolia','Mongolia','MNG','496','yes','976','.mn'),
(147,'ME','Montenegro','Montenegro','MNE','499','yes','382','.me'),
(148,'MS','Montserrat','Montserrat','MSR','500','no','1+664','.ms'),
(149,'MA','Morocco','Kingdom of Morocco','MAR','504','yes','212','.ma'),
(150,'MZ','Mozambique','Republic of Mozambique','MOZ','508','yes','258','.mz'),
(151,'MM','Myanmar (Burma)','Republic of the Union of Myanmar','MMR','104','yes','95','.mm'),
(152,'NA','Namibia','Republic of Namibia','NAM','516','yes','264','.na'),
(153,'NR','Nauru','Republic of Nauru','NRU','520','yes','674','.nr'),
(154,'NP','Nepal','Federal Democratic Republic of Nepal','NPL','524','yes','977','.np'),
(155,'NL','Netherlands','Kingdom of the Netherlands','NLD','528','yes','31','.nl'),
(156,'NC','New Caledonia','New Caledonia','NCL','540','no','687','.nc'),
(157,'NZ','New Zealand','New Zealand','NZL','554','yes','64','.nz'),
(158,'NI','Nicaragua','Republic of Nicaragua','NIC','558','yes','505','.ni'),
(159,'NE','Niger','Republic of Niger','NER','562','yes','227','.ne'),
(160,'NG','Nigeria','Federal Republic of Nigeria','NGA','566','yes','234','.ng'),
(161,'NU','Niue','Niue','NIU','570','some','683','.nu'),
(162,'NF','Norfolk Island','Norfolk Island','NFK','574','no','672','.nf'),
(163,'KP','North Korea','Democratic People\'s Republic of Korea','PRK','408','yes','850','.kp'),
(164,'MP','Northern Mariana Islands','Northern Mariana Islands','MNP','580','no','1+670','.mp'),
(165,'NO','Norway','Kingdom of Norway','NOR','578','yes','47','.no'),
(166,'OM','Oman','Sultanate of Oman','OMN','512','yes','968','.om'),
(167,'PK','Pakistan','Islamic Republic of Pakistan','PAK','586','yes','92','.pk'),
(168,'PW','Palau','Republic of Palau','PLW','585','yes','680','.pw'),
(169,'PS','Palestine','State of Palestine (or Occupied Palestinian Territory)','PSE','275','some','970','.ps'),
(170,'PA','Panama','Republic of Panama','PAN','591','yes','507','.pa'),
(171,'PG','Papua New Guinea','Independent State of Papua New Guinea','PNG','598','yes','675','.pg'),
(172,'PY','Paraguay','Republic of Paraguay','PRY','600','yes','595','.py'),
(173,'PE','Peru','Republic of Peru','PER','604','yes','51','.pe'),
(174,'PH','Philippines','Republic of the Philippines','PHL','608','yes','63','.ph'),
(175,'PN','Pitcairn','Pitcairn','PCN','612','no','NONE','.pn'),
(176,'PL','Poland','Republic of Poland','POL','616','yes','48','.pl'),
(177,'PT','Portugal','Portuguese Republic','PRT','620','yes','351','.pt'),
(178,'PR','Puerto Rico','Commonwealth of Puerto Rico','PRI','630','no','1+939','.pr'),
(179,'QA','Qatar','State of Qatar','QAT','634','yes','974','.qa'),
(180,'RE','Reunion','R&eacute;union','REU','638','no','262','.re'),
(181,'RO','Romania','Romania','ROU','642','yes','40','.ro'),
(182,'RU','Russia','Russian Federation','RUS','643','yes','7','.ru'),
(183,'RW','Rwanda','Republic of Rwanda','RWA','646','yes','250','.rw'),
(184,'BL','Saint Barthelemy','Saint Barth&eacute;lemy','BLM','652','no','590','.bl'),
(185,'SH','Saint Helena','Saint Helena, Ascension and Tristan da Cunha','SHN','654','no','290','.sh'),
(186,'KN','Saint Kitts and Nevis','Federation of Saint Christopher and Nevis','KNA','659','yes','1+869','.kn'),
(187,'LC','Saint Lucia','Saint Lucia','LCA','662','yes','1+758','.lc'),
(188,'MF','Saint Martin','Saint Martin','MAF','663','no','590','.mf'),
(189,'PM','Saint Pierre and Miquelon','Saint Pierre and Miquelon','SPM','666','no','508','.pm'),
(190,'VC','Saint Vincent and the Grenadines','Saint Vincent and the Grenadines','VCT','670','yes','1+784','.vc'),
(191,'WS','Samoa','Independent State of Samoa','WSM','882','yes','685','.ws'),
(192,'SM','San Marino','Republic of San Marino','SMR','674','yes','378','.sm'),
(193,'ST','Sao Tome and Principe','Democratic Republic of S&atilde;o Tom&eacute; and Pr&iacute;ncipe','STP','678','yes','239','.st'),
(194,'SA','Saudi Arabia','Kingdom of Saudi Arabia','SAU','682','yes','966','.sa'),
(195,'SN','Senegal','Republic of Senegal','SEN','686','yes','221','.sn'),
(196,'RS','Serbia','Republic of Serbia','SRB','688','yes','381','.rs'),
(197,'SC','Seychelles','Republic of Seychelles','SYC','690','yes','248','.sc'),
(198,'SL','Sierra Leone','Republic of Sierra Leone','SLE','694','yes','232','.sl'),
(199,'SG','Singapore','Republic of Singapore','SGP','702','yes','65','.sg'),
(200,'SX','Sint Maarten','Sint Maarten','SXM','534','no','1+721','.sx'),
(201,'SK','Slovakia','Slovak Republic','SVK','703','yes','421','.sk'),
(202,'SI','Slovenia','Republic of Slovenia','SVN','705','yes','386','.si'),
(203,'SB','Solomon Islands','Solomon Islands','SLB','090','yes','677','.sb'),
(204,'SO','Somalia','Somali Republic','SOM','706','yes','252','.so'),
(205,'ZA','South Africa','Republic of South Africa','ZAF','710','yes','27','.za'),
(206,'GS','South Georgia and the South Sandwich Islands','South Georgia and the South Sandwich Islands','SGS','239','no','500','.gs'),
(207,'KR','South Korea','Republic of Korea','KOR','410','yes','82','.kr'),
(208,'SS','South Sudan','Republic of South Sudan','SSD','728','yes','211','.ss'),
(209,'ES','Spain','Kingdom of Spain','ESP','724','yes','34','.es'),
(210,'LK','Sri Lanka','Democratic Socialist Republic of Sri Lanka','LKA','144','yes','94','.lk'),
(211,'SD','Sudan','Republic of the Sudan','SDN','729','yes','249','.sd'),
(212,'SR','Suriname','Republic of Suriname','SUR','740','yes','597','.sr'),
(213,'SJ','Svalbard and Jan Mayen','Svalbard and Jan Mayen','SJM','744','no','47','.sj'),
(214,'SZ','Swaziland','Kingdom of Swaziland','SWZ','748','yes','268','.sz'),
(215,'SE','Sweden','Kingdom of Sweden','SWE','752','yes','46','.se'),
(216,'CH','Switzerland','Swiss Confederation','CHE','756','yes','41','.ch'),
(217,'SY','Syria','Syrian Arab Republic','SYR','760','yes','963','.sy'),
(218,'TW','Taiwan','Republic of China (Taiwan)','TWN','158','former','886','.tw'),
(219,'TJ','Tajikistan','Republic of Tajikistan','TJK','762','yes','992','.tj'),
(220,'TZ','Tanzania','United Republic of Tanzania','TZA','834','yes','255','.tz'),
(221,'TH','Thailand','Kingdom of Thailand','THA','764','yes','66','.th'),
(222,'TL','Timor-Leste (East Timor)','Democratic Republic of Timor-Leste','TLS','626','yes','670','.tl'),
(223,'TG','Togo','Togolese Republic','TGO','768','yes','228','.tg'),
(224,'TK','Tokelau','Tokelau','TKL','772','no','690','.tk'),
(225,'TO','Tonga','Kingdom of Tonga','TON','776','yes','676','.to'),
(226,'TT','Trinidad and Tobago','Republic of Trinidad and Tobago','TTO','780','yes','1+868','.tt'),
(227,'TN','Tunisia','Republic of Tunisia','TUN','788','yes','216','.tn'),
(228,'TR','Turkey','Republic of Turkey','TUR','792','yes','90','.tr'),
(229,'TM','Turkmenistan','Turkmenistan','TKM','795','yes','993','.tm'),
(230,'TC','Turks and Caicos Islands','Turks and Caicos Islands','TCA','796','no','1+649','.tc'),
(231,'TV','Tuvalu','Tuvalu','TUV','798','yes','688','.tv'),
(232,'UG','Uganda','Republic of Uganda','UGA','800','yes','256','.ug'),
(233,'UA','Ukraine','Ukraine','UKR','804','yes','380','.ua'),
(234,'AE','United Arab Emirates','United Arab Emirates','ARE','784','yes','971','.ae'),
(235,'GB','United Kingdom','United Kingdom of Great Britain and Nothern Ireland','GBR','826','yes','44','.uk'),
(236,'US','United States','United States of America','USA','840','yes','1','.us'),
(237,'UM','United States Minor Outlying Islands','United States Minor Outlying Islands','UMI','581','no','NONE','NONE'),
(238,'UY','Uruguay','Eastern Republic of Uruguay','URY','858','yes','598','.uy'),
(239,'UZ','Uzbekistan','Republic of Uzbekistan','UZB','860','yes','998','.uz'),
(240,'VU','Vanuatu','Republic of Vanuatu','VUT','548','yes','678','.vu'),
(241,'VA','Vatican City','State of the Vatican City','VAT','336','no','39','.va'),
(242,'VE','Venezuela','Bolivarian Republic of Venezuela','VEN','862','yes','58','.ve'),
(243,'VN','Vietnam','Socialist Republic of Vietnam','VNM','704','yes','84','.vn'),
(244,'VG','Virgin Islands, British','British Virgin Islands','VGB','092','no','1+284','.vg'),
(245,'VI','Virgin Islands, US','Virgin Islands of the United States','VIR','850','no','1+340','.vi'),
(246,'WF','Wallis and Futuna','Wallis and Futuna','WLF','876','no','681','.wf'),
(247,'EH','Western Sahara','Western Sahara','ESH','732','no','212','.eh'),
(248,'YE','Yemen','Republic of Yemen','YEM','887','yes','967','.ye'),
(249,'ZM','Zambia','Republic of Zambia','ZMB','894','yes','260','.zm'),
(250,'ZW','Zimbabwe','Republic of Zimbabwe','ZWE','716','yes','263','.zw');

/*Table structure for table `tblcreditnote_refunds` */

DROP TABLE IF EXISTS `tblcreditnote_refunds`;

CREATE TABLE `tblcreditnote_refunds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `credit_note_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `refunded_on` date NOT NULL,
  `payment_mode` varchar(40) NOT NULL,
  `note` text DEFAULT NULL,
  `amount` decimal(15,2) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcreditnote_refunds` */

/*Table structure for table `tblcreditnotes` */

DROP TABLE IF EXISTS `tblcreditnotes`;

CREATE TABLE `tblcreditnotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 1,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `adminnote` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `clientnote` text DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) NOT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_credit_note` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `reference_no` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency` (`currency`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcreditnotes` */

/*Table structure for table `tblcredits` */

DROP TABLE IF EXISTS `tblcredits`;

CREATE TABLE `tblcredits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `credit_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `date_applied` datetime NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcredits` */

/*Table structure for table `tblcurrencies` */

DROP TABLE IF EXISTS `tblcurrencies`;

CREATE TABLE `tblcurrencies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `symbol` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `decimal_separator` varchar(5) DEFAULT NULL,
  `thousand_separator` varchar(5) DEFAULT NULL,
  `placement` varchar(10) DEFAULT NULL,
  `isdefault` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblcurrencies` */

insert  into `tblcurrencies`(`id`,`symbol`,`name`,`decimal_separator`,`thousand_separator`,`placement`,`isdefault`) values 
(1,'$','USD','.',',','before',1),
(2,'€','EUR',',','.','before',0);

/*Table structure for table `tblcustomer_admins` */

DROP TABLE IF EXISTS `tblcustomer_admins`;

CREATE TABLE `tblcustomer_admins` (
  `staff_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `date_assigned` text NOT NULL,
  KEY `customer_id` (`customer_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomer_admins` */

/*Table structure for table `tblcustomer_groups` */

DROP TABLE IF EXISTS `tblcustomer_groups`;

CREATE TABLE `tblcustomer_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `groupid` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `groupid` (`groupid`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomer_groups` */

/*Table structure for table `tblcustomers_groups` */

DROP TABLE IF EXISTS `tblcustomers_groups`;

CREATE TABLE `tblcustomers_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomers_groups` */

/*Table structure for table `tblcustomfields` */

DROP TABLE IF EXISTS `tblcustomfields`;

CREATE TABLE `tblcustomfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fieldto` varchar(30) DEFAULT NULL,
  `name` varchar(150) NOT NULL,
  `slug` varchar(150) NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `type` varchar(20) NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `display_inline` tinyint(1) NOT NULL DEFAULT 0,
  `field_order` int(11) DEFAULT 0,
  `active` int(11) NOT NULL DEFAULT 1,
  `show_on_pdf` int(11) NOT NULL DEFAULT 0,
  `show_on_ticket_form` tinyint(1) NOT NULL DEFAULT 0,
  `only_admin` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_table` tinyint(1) NOT NULL DEFAULT 0,
  `show_on_client_portal` int(11) NOT NULL DEFAULT 0,
  `disalow_client_to_edit` int(11) NOT NULL DEFAULT 0,
  `bs_column` int(11) NOT NULL DEFAULT 12,
  `default_value` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomfields` */

insert  into `tblcustomfields`(`id`,`fieldto`,`name`,`slug`,`required`,`type`,`options`,`display_inline`,`field_order`,`active`,`show_on_pdf`,`show_on_ticket_form`,`only_admin`,`show_on_table`,`show_on_client_portal`,`disalow_client_to_edit`,`bs_column`,`default_value`) values 
(1,'items','VIN','items_vin',0,'input','',0,1,1,1,0,0,1,1,0,3,''),
(2,'items','Brand','items_brand',0,'input','',0,2,1,1,0,0,0,1,0,3,''),
(3,'items','Model','items_model',0,'input','',0,3,1,1,0,0,0,1,0,3,''),
(4,'items','Category','items_category',0,'input','',0,5,1,1,0,0,0,1,0,3,''),
(5,'items','Year','items_year',0,'input','',0,4,1,1,0,0,0,1,0,3,''),
(6,'items','Engine','items_engine',0,'input','',0,6,1,1,0,0,0,1,0,3,''),
(7,'items','Engine Size','items_engine_size',0,'input','',0,7,1,1,0,0,0,1,0,3,''),
(8,'items','Mileage','items_mileage',0,'input','',0,8,1,1,0,0,0,1,0,3,''),
(9,'items','Transmission','items_transmission',0,'input','',0,9,1,1,0,0,0,1,0,3,''),
(10,'items','Fuel Type','items_fuel_type',0,'input','',0,10,1,1,0,0,0,1,0,3,''),
(11,'items','Body Type','items_body_type',0,'input','',0,11,1,1,0,0,0,1,0,3,''),
(12,'items','Kilometers','items_kilometers',0,'input','',0,12,1,1,0,0,0,1,0,3,''),
(13,'items','Exterior Color','items_exterior_color',0,'input','',0,13,1,1,0,0,0,1,0,3,''),
(14,'items','Interior Color','items_interior_color',0,'input','',0,14,1,1,0,0,0,1,0,3,''),
(15,'items','Seats','items_seats',0,'input','',0,15,1,1,0,0,0,1,0,3,''),
(16,'items','Doors','items_doors',0,'input','',0,16,1,1,0,0,0,1,0,3,''),
(17,'items','Top Speed','items_top_speed',0,'input','',0,17,1,1,0,0,0,1,0,3,''),
(18,'items','Warranty','items_warranty',0,'input','',0,18,1,1,0,0,0,1,0,3,''),
(19,'items','Tablilla','items_tablilla',0,'input','',0,19,1,1,0,0,0,1,0,3,''),
(20,'items','Marbete','items_marbete',0,'input','',0,20,1,1,0,0,0,1,0,3,''),
(21,'items','Key Number','items_key_number',0,'input','',0,21,1,1,0,0,0,1,0,3,''),
(22,'items','Auto Expreso ID Number','items_auto_expreso_id_number',0,'input','',0,22,1,1,0,0,0,1,0,3,''),
(23,'items','Radio Code','items_radio_code',0,'select','Satellite,Other',0,23,1,1,0,0,0,1,0,3,''),
(24,'items','Exteriors','items_mechanical',0,'textarea','',0,24,1,1,0,0,0,1,0,6,''),
(25,'items','Interiors','items_interiors',0,'textarea','',0,25,1,1,0,0,0,1,0,6,''),
(26,'items','Security','items_security',0,'textarea','',0,26,1,1,0,0,0,1,0,6,''),
(27,'items','Mechanical','items_mechanical_2',0,'textarea','',0,27,1,1,0,0,0,1,0,6,''),
(28,'items','Entertainment','items_entertainment',0,'textarea','',0,28,1,1,0,0,0,1,0,6,''),
(29,'leads','SSN','leads_estimated_credit_score',0,'input','',0,1,1,0,0,0,0,0,0,3,''),
(30,'leads','Estimated Credit Score','leads_estimated_credit_score_2',0,'input','',0,2,1,0,0,0,0,0,0,3,''),
(31,'leads','Trade In','leads_trade_in',0,'input','',0,3,1,0,0,0,0,0,0,3,''),
(32,'leads','Down Payment','leads_down_payment',0,'input','',0,4,1,0,0,0,0,0,0,3,''),
(33,'appointly','Transportation Type','appointly_transportation_type',0,'select','Customer drop,\r\nDealer Pickup,\r\nDealer Pickup and Drop,\r\nRentalS\r\n',0,0,1,0,0,0,0,0,0,3,''),
(35,'items','Available Status','items_available_status',0,'select','For Sale,\r\nNot for Sale,\r\nSold',0,23,1,1,0,0,1,1,0,3,''),
(36,'proposal','Type','proposal_type',0,'checkbox','Test Drive,Used Vehicle,Rentals,Maintenance',1,2,1,0,0,0,0,0,0,10,''),
(38,'proposal','Trade In?','proposal_trade_in',0,'checkbox','Yes',1,1,1,0,0,0,0,0,0,2,''),
(40,'proposal','APR','proposal_apr',0,'input','',0,4,1,0,0,0,0,0,0,2,''),
(42,'proposal','Payment Term','proposal_payment_term',0,'input','',0,6,1,0,0,0,0,0,0,2,''),
(43,'proposal','Monthly Payment','proposal_monthly_payment',0,'input','',0,7,1,0,0,0,0,0,0,2,''),
(44,'proposal','Balance','proposal_balance',0,'input','',0,8,1,0,0,0,0,0,0,2,''),
(45,'proposal','Down Payment','proposal_down_payment',0,'input','',0,3,1,0,0,0,0,0,0,2,''),
(46,'proposal','Tradein','proposal_tradein',0,'input','',0,7,1,0,0,0,0,0,0,2,''),
(47,'proposal','Make','proposal_make',0,'input','',0,9,1,0,0,0,0,0,0,3,''),
(48,'proposal','Model','proposal_model',0,'input','',0,10,1,0,0,0,0,0,0,3,''),
(49,'proposal','Year','proposal_year',0,'input','',0,11,1,0,0,0,0,0,0,2,''),
(50,'proposal','Color','proposal_color',0,'input','',0,12,1,0,0,0,0,0,0,2,''),
(51,'proposal','Mileage','proposal_mileage',0,'input','',0,13,1,0,0,0,0,0,0,2,''),
(52,'proposal','Tradein VIN','proposal_tradein_vin',0,'input','',0,14,1,0,0,0,0,0,0,3,''),
(53,'proposal','Make','proposal_make_2',0,'input','',0,15,1,0,0,0,0,0,0,3,''),
(54,'proposal','Model','proposal_model_2',0,'input','',0,16,1,0,0,0,0,0,0,3,''),
(55,'proposal','Year','proposal_year_2',0,'input','',0,17,1,0,0,0,0,0,0,3,''),
(56,'proposal','Tablilla','proposal_tablilla',0,'input','',0,18,1,0,0,0,0,0,0,2,''),
(57,'proposal','Millaje','proposal_millaje',0,'input','',0,19,1,0,0,0,0,0,0,2,''),
(58,'proposal','Color','proposal_color_2',0,'input','',0,20,1,0,0,0,0,0,0,2,''),
(59,'proposal','Marbete','proposal_marbete',0,'input','',0,21,1,0,0,0,0,0,0,2,''),
(60,'proposal','Vence','proposal_vence',0,'input','',0,22,1,0,0,0,0,0,0,2,''),
(61,'proposal','Due','proposal_due',0,'input','',0,23,1,0,0,0,0,0,0,2,'');

/*Table structure for table `tblcustomfieldsvalues` */

DROP TABLE IF EXISTS `tblcustomfieldsvalues`;

CREATE TABLE `tblcustomfieldsvalues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relid` int(11) NOT NULL,
  `fieldid` int(11) NOT NULL,
  `fieldto` varchar(15) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `relid` (`relid`),
  KEY `fieldto` (`fieldto`),
  KEY `fieldid` (`fieldid`)
) ENGINE=InnoDB AUTO_INCREMENT=114 DEFAULT CHARSET=utf8;

/*Data for the table `tblcustomfieldsvalues` */

insert  into `tblcustomfieldsvalues`(`id`,`relid`,`fieldid`,`fieldto`,`value`) values 
(1,1,1,'items_pr','2233232GFXGFXG123'),
(2,1,1,'items','2233232GFXGFXG123'),
(3,12,1,'items_pr','test'),
(4,12,2,'items_pr','test'),
(5,12,3,'items_pr','test'),
(6,12,5,'items_pr','test'),
(7,13,1,'items_pr','3C4NJCAB6LT135740'),
(8,13,2,'items_pr','Jeep1'),
(9,13,3,'items_pr','Compass'),
(10,13,5,'items_pr','2020'),
(11,13,4,'items_pr','Minicompact Car Small Sport Utility Vehicle 2WD'),
(12,13,6,'items_pr','2.4-L L-4 DOHC 16V'),
(13,13,7,'items_pr','2.4'),
(14,13,8,'items_pr','23 miles/gallon'),
(15,13,9,'items_pr','Manual'),
(16,13,10,'items_pr','Regular'),
(17,13,11,'items_pr','Sport Utility Vehicle'),
(18,13,12,'items_pr','2349'),
(19,13,15,'items_pr','5'),
(20,13,16,'items_pr','4'),
(21,13,17,'items_pr','180'),
(22,13,18,'items_pr','1Year'),
(23,13,19,'items_pr','EZ12FR9989'),
(24,13,20,'items_pr','JUI2233'),
(25,13,21,'items_pr','KEY1234'),
(26,13,22,'items_pr','23443'),
(27,13,23,'items_pr','Satellite'),
(28,14,1,'items_pr','3C4NJCAB6LT135740'),
(29,14,2,'items_pr','Jeep'),
(30,14,3,'items_pr','Compass'),
(31,14,5,'items_pr','2020'),
(32,14,4,'items_pr','Minicompact Car Small Sport Utility Vehicle 2WD'),
(33,14,6,'items_pr','2.4-L L-4 DOHC 16V'),
(34,14,7,'items_pr','2.4'),
(35,14,8,'items_pr','23 miles/gallon'),
(36,14,9,'items_pr','Manual'),
(37,14,10,'items_pr','Regular'),
(38,14,11,'items_pr','Sport Utility Vehicle'),
(39,14,15,'items_pr','5'),
(40,14,16,'items_pr','4'),
(41,14,24,'items_pr','<p xss=removed>Exterior Dimensions & Weight</p><br />\r\n<ul><br />\r\n<li>Overall Length : 173.00 In.</li><br />\r\n<li>Overall Width : 73.80 In.</li><br />\r\n<li>Overall Height : 64.60 In.</li><br />\r\n<li>Wheelbase : 103.80 In.</li><br />\r\n<li>Ground Clearance : 7.80 In.</li><br />\r\n</ul><br />\r\n<p xss=removed>Cargo Bed Dimensions</p><br />\r\n<ul><br />\r\n<li>Overall Length : 173.00 In.</li><br />\r\n</ul><br />\r\n<p xss=removed>Mirrors & Windows & Wipers</p><br />\r\n<ul><br />\r\n<li>Power Windows</li><br />\r\n</ul>'),
(42,14,25,'items_pr','<p xss=removed>Interior Features</p><br />\r\n<ul><br />\r\n<li>Cruise Control</li><br />\r\n<li>Telescopic Steering Column</li><br />\r\n</ul><br />\r\n<p xss=removed>Interior Dimensions</p><br />\r\n<ul><br />\r\n<li>Front Headroom : 39.20 In.</li><br />\r\n<li>Rear Headroom : 38.50 In.</li><br />\r\n<li>Front Legroom : 41.80 In.</li><br />\r\n<li>Rear Legroom : 38.30 In.</li><br />\r\n<li>Front Shoulder Room : 56.70 In.</li><br />\r\n<li>Rear Shoulder Room : 55.10 In.</li><br />\r\n<li>Front Hip Room : 54.10 In.</li><br />\r\n<li>Rear Hip Room : 49.20 In.</li><br />\r\n</ul>'),
(43,14,26,'items_pr','<p xss=removed>Safety</p><br />\r\n<ul><br />\r\n<li>Driver Airbag</li><br />\r\n<li>Front Side Airbag</li><br />\r\n<li>Passenger Airbag</li><br />\r\n<li>Side Head Curtain Airbag</li><br />\r\n</ul><br />\r\n<p xss=removed>Anti-Theft & Locks</p><br />\r\n<ul><br />\r\n<li>Child Safety Door Locks</li><br />\r\n<li>Vehicle Anti-Theft</li><br />\r\n</ul><br />\r\n<p xss=removed>Convenience & Comfort</p><br />\r\n<ul><br />\r\n<li>Keyless Start</li><br />\r\n</ul>'),
(44,14,27,'items_pr','<ul><br />\r\n<li>Fuel Type: Regular</li><br />\r\n<li>Fuel Capacity: 13.50 gallons</li><br />\r\n<li>City Mileage : 23 miles/gallon</li><br />\r\n<li>Highway Mileage : 32 miles/gallon</li><br />\r\n<li>Engine : 2.4-L L-4 DOHC 16V</li><br />\r\n<li>Engine Size : 2.4</li><br />\r\n<li>Engine Cylinders : 4</li><br />\r\n<li>Transmission Type : Manual</li><br />\r\n<li>Transmission Gears : 5</li><br />\r\n<li>Driven Wheels : Regular</li><br />\r\n<li>Transmission Gears : 5</li><br />\r\n<li>Anti-Braking System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : Rack & Pinion</li><br />\r\n</ul><br />\r\n<p xss=removed>Braking & Traction</p><br />\r\n<ul><br />\r\n<li>ABS Brakes</li><br />\r\n</ul><br />\r\n<p xss=removed>Chasis</p><br />\r\n<ul><br />\r\n<li>Anti-Brake System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : R&P</li><br />\r\n<li>Front Brake Type : Disc</li><br />\r\n<li>Rear Brake Type : Disc</li><br />\r\n<li>Front Suspension : IND</li><br />\r\n<li>Rear Suspension : IND</li><br />\r\n<li>Tires : 215/65r16</li><br />\r\n</ul><br />\r\n<p xss=removed>Capacities</p><br />\r\n<ul><br />\r\n<li>Standard Seating : 5</li><br />\r\n</ul>'),
(45,14,12,'items_pr','2000'),
(46,14,13,'items_pr','Grey'),
(47,14,14,'items_pr','Black'),
(48,14,17,'items_pr','120'),
(49,14,18,'items_pr','3Months'),
(50,14,19,'items_pr','R-120'),
(51,14,20,'items_pr','566'),
(52,14,21,'items_pr','55656'),
(53,14,22,'items_pr','8888'),
(54,14,23,'items_pr','Satellite'),
(55,14,35,'items_pr','For Sale'),
(56,15,1,'items_pr','1C4HJXDG7KW503346'),
(57,15,2,'items_pr','Jeep'),
(58,15,3,'items_pr','Wrangler'),
(59,15,5,'items_pr','2019'),
(60,15,4,'items_pr','Standard Sport Utility Vehicle Medium Truck'),
(61,15,6,'items_pr','3.6-L V-6 DOHC 24V FFV'),
(62,15,7,'items_pr','3.6'),
(63,15,8,'items_pr','17 miles/gallon'),
(64,15,9,'items_pr','Manual'),
(65,15,10,'items_pr','Regular'),
(66,15,11,'items_pr','Sport Utility Vehicle'),
(67,15,12,'items_pr','1234'),
(68,15,13,'items_pr','Blue'),
(69,15,14,'items_pr','Grey'),
(70,15,15,'items_pr','5'),
(71,15,16,'items_pr','4'),
(72,15,17,'items_pr','130'),
(73,15,18,'items_pr','8Months'),
(74,15,19,'items_pr','j-130'),
(75,15,20,'items_pr','6655'),
(76,15,21,'items_pr','hhyy'),
(77,15,22,'items_pr','55E'),
(78,15,23,'items_pr','Satellite'),
(79,15,35,'items_pr','For Sale'),
(80,15,24,'items_pr','<p xss=removed>Exterior Lighting</p><br />\r\n<ul><br />\r\n<li>Fog Lights</li><br />\r\n</ul><br />\r\n<p xss=removed>Tires & Wheels</p><br />\r\n<ul><br />\r\n<li>Run Flat Tires</li><br />\r\n<li>Steel Wheels</li><br />\r\n</ul><br />\r\n<p xss=removed>Exterior Dimensions & Weight</p><br />\r\n<ul><br />\r\n<li>Overall Length : 188.40 In.</li><br />\r\n<li>Overall Width : 73.80 In.</li><br />\r\n<li>Overall Height : 73.60 In.</li><br />\r\n<li>Wheelbase : 118.40 In.</li><br />\r\n<li>Ground Clearance : 9.70 In.</li><br />\r\n</ul><br />\r\n<p xss=removed>Cargo Bed Dimensions</p><br />\r\n<ul><br />\r\n<li>Overall Length : 188.40 In.</li><br />\r\n</ul>'),
(81,15,25,'items_pr','<p xss=removed>Interior Features</p><br />\r\n<ul><br />\r\n<li>Cruise Control</li><br />\r\n<li>Telescopic Steering Column</li><br />\r\n</ul><br />\r\n<p xss=removed>Interior Dimensions</p><br />\r\n<ul><br />\r\n<li>Front Headroom : 42.60 In.</li><br />\r\n<li>Rear Headroom : 41.70 In.</li><br />\r\n<li>Front Legroom : 41.20 In.</li><br />\r\n<li>Rear Legroom : 38.30 In.</li><br />\r\n<li>Front Shoulder Room : 55.70 In.</li><br />\r\n<li>Rear Shoulder Room : 55.70 In.</li><br />\r\n<li>Front Hip Room : 53.90 In.</li><br />\r\n<li>Rear Hip Room : 56.70 In.</li><br />\r\n</ul>'),
(82,15,26,'items_pr','<p xss=removed>Safety</p><br />\r\n<ul><br />\r\n<li>Driver Airbag</li><br />\r\n<li>Front Side Airbag</li><br />\r\n<li>Passenger Airbag</li><br />\r\n</ul><br />\r\n<p xss=removed>Anti-Theft & Locks</p><br />\r\n<ul><br />\r\n<li>Child Safety Door Locks</li><br />\r\n</ul><br />\r\n<p xss=removed>Convenience & Comfort</p><br />\r\n<ul><br />\r\n<li>Keyless Start</li><br />\r\n</ul>'),
(83,15,27,'items_pr','<ul><br />\r\n<li>Fuel Type: Regular</li><br />\r\n<li>Fuel Capacity: 21.50 gallons</li><br />\r\n<li>City Mileage : 17 miles/gallon</li><br />\r\n<li>Highway Mileage : 23 miles/gallon</li><br />\r\n<li>Engine : 3.6-L V-6 DOHC 24V FFV</li><br />\r\n<li>Engine Size : 3.6</li><br />\r\n<li>Engine Cylinders : 6</li><br />\r\n<li>Transmission Type : Manual</li><br />\r\n<li>Transmission Gears : 6</li><br />\r\n<li>Driven Wheels : Regular</li><br />\r\n<li>Transmission Gears : 6</li><br />\r\n<li>Anti-Braking System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : Recirculating</li><br />\r\n</ul><br />\r\n<p xss=removed>Braking & Traction</p><br />\r\n<ul><br />\r\n<li>ABS Brakes</li><br />\r\n</ul><br />\r\n<p xss=removed>Chasis</p><br />\r\n<ul><br />\r\n<li>Anti-Brake System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : Recirc</li><br />\r\n<li>Front Brake Type : Disc</li><br />\r\n<li>Rear Brake Type : Disc</li><br />\r\n<li>Front Suspension : Live</li><br />\r\n<li>Rear Suspension : Live</li><br />\r\n<li>Front Spring Type : Coil</li><br />\r\n<li>Rear Spring Type : Coil</li><br />\r\n<li>Tires : 245/75r17</li><br />\r\n<li>Run Flat Tires : Std.</li><br />\r\n</ul><br />\r\n<p xss=removed>Capacities</p><br />\r\n<ul><br />\r\n<li>Standard Seating : 5</li><br />\r\n</ul>'),
(84,15,28,'items_pr','<p>Test</p>'),
(85,14,28,'items_pr','<p>Test</p>'),
(86,16,1,'items_pr','JM1NDAM75L0414984'),
(87,16,2,'items_pr','Mazda'),
(88,16,3,'items_pr','MX-5 Miata RF'),
(89,16,5,'items_pr','2020'),
(90,16,4,'items_pr','Convertible'),
(91,16,6,'items_pr','2.0-L L-4 DOHC 16V'),
(92,16,7,'items_pr','2'),
(93,16,8,'items_pr','26 miles/gallon'),
(94,16,9,'items_pr','Automatic'),
(95,16,10,'items_pr','Regular'),
(96,16,11,'items_pr','Convertible'),
(97,16,13,'items_pr',''),
(98,16,14,'items_pr',''),
(99,16,15,'items_pr','2'),
(100,16,16,'items_pr','2'),
(101,16,17,'items_pr','200'),
(102,16,18,'items_pr','6Months'),
(103,16,19,'items_pr','RKO'),
(104,16,20,'items_pr','RKO'),
(105,16,21,'items_pr','555666'),
(106,16,22,'items_pr','343432424'),
(107,16,23,'items_pr','Other'),
(108,16,35,'items_pr','For Sale'),
(109,16,24,'items_pr','<p xss=removed>Tires & Wheels</p><br />\r\n<ul><br />\r\n<li>Alloy Wheels</li><br />\r\n</ul><br />\r\n<p xss=removed>Exterior Dimensions & Weight</p><br />\r\n<ul><br />\r\n<li>Curb Weight-automatic : 24960 Lbs</li><br />\r\n<li>Overall Length : 154.10 In.</li><br />\r\n<li>Overall Width : 68.30 In.</li><br />\r\n<li>Overall Height : 49.00 In.</li><br />\r\n<li>Wheelbase : 90.90 In.</li><br />\r\n<li>Ground Clearance : 5.30 In.</li><br />\r\n</ul><br />\r\n<p xss=removed>Cargo Bed Dimensions</p><br />\r\n<ul><br />\r\n<li>Overall Length : 154.10 In.</li><br />\r\n</ul><br />\r\n<p xss=removed>Mirrors & Windows & Wipers</p><br />\r\n<ul><br />\r\n<li>Power Windows</li><br />\r\n</ul>'),
(110,16,25,'items_pr','<p xss=removed>Interior Features</p><br />\r\n<ul><br />\r\n<li>Cruise Control</li><br />\r\n<li>Telescopic Steering Column</li><br />\r\n</ul><br />\r\n<p xss=removed>Seat</p><br />\r\n<ul><br />\r\n<li>Front Heated Seat</li><br />\r\n</ul>'),
(111,16,26,'items_pr','<p xss=removed>Safety</p><br />\r\n<ul><br />\r\n<li>Driver Airbag</li><br />\r\n<li>Front Side Airbag</li><br />\r\n<li>Passenger Airbag</li><br />\r\n</ul>'),
(112,16,27,'items_pr','<ul><br />\r\n<li>Fuel Type: Regular</li><br />\r\n<li>Fuel Capacity: 11.90 gallons</li><br />\r\n<li>City Mileage : 26 miles/gallon</li><br />\r\n<li>Highway Mileage : 35 miles/gallon</li><br />\r\n<li>Engine : 2.0-L L-4 DOHC 16V</li><br />\r\n<li>Engine Size : 2</li><br />\r\n<li>Engine Cylinders : 4</li><br />\r\n<li>Transmission Type : Automatic</li><br />\r\n<li>Transmission Gears : 6</li><br />\r\n<li>Driven Wheels : Regular</li><br />\r\n<li>Transmission Gears : 6</li><br />\r\n<li>Anti-Braking System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : Rack & Pinion</li><br />\r\n</ul><br />\r\n<p xss=removed>Braking & Traction</p><br />\r\n<ul><br />\r\n<li>ABS Brakes</li><br />\r\n</ul><br />\r\n<p xss=removed>Chasis</p><br />\r\n<ul><br />\r\n<li>Anti-Brake System : 4-Wheel ABS</li><br />\r\n<li>Steering Type : R&P</li><br />\r\n<li>Front Brake Type : Disc</li><br />\r\n<li>Rear Brake Type : Disc</li><br />\r\n<li>Front Suspension : IND</li><br />\r\n<li>Rear Suspension : IND</li><br />\r\n<li>Front Spring Type : Coil</li><br />\r\n<li>Rear Spring Type : Coil</li><br />\r\n<li>Tires : P205/45r17</li><br />\r\n</ul><br />\r\n<p xss=removed>Capacities</p><br />\r\n<ul><br />\r\n<li>Standard Seating : 2</li><br />\r\n<li>Cargo Volume : 4.50 Cu.ft.</li><br />\r\n<li>Maximum Payload : 396 Lbs</li><br />\r\n</ul>'),
(113,16,28,'items_pr','<p>Test</p>');

/*Table structure for table `tblday_off` */

DROP TABLE IF EXISTS `tblday_off`;

CREATE TABLE `tblday_off` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `off_reason` varchar(255) NOT NULL,
  `off_type` varchar(100) NOT NULL,
  `break_date` date NOT NULL,
  `timekeeping` varchar(45) DEFAULT NULL,
  `department` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `repeat_by_year` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblday_off` */

/*Table structure for table `tbldepartments` */

DROP TABLE IF EXISTS `tbldepartments`;

CREATE TABLE `tbldepartments` (
  `departmentid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `imap_username` varchar(191) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `email_from_header` tinyint(1) NOT NULL DEFAULT 0,
  `host` varchar(150) DEFAULT NULL,
  `password` mediumtext DEFAULT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(191) NOT NULL DEFAULT 'INBOX',
  `delete_after_import` int(11) NOT NULL DEFAULT 0,
  `calendar_id` mediumtext DEFAULT NULL,
  `hidefromclient` tinyint(1) NOT NULL DEFAULT 0,
  `manager_id` int(11) DEFAULT 0,
  `parent_id` int(11) DEFAULT 0,
  PRIMARY KEY (`departmentid`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbldepartments` */

/*Table structure for table `tbldismissed_announcements` */

DROP TABLE IF EXISTS `tbldismissed_announcements`;

CREATE TABLE `tbldismissed_announcements` (
  `dismissedannouncementid` int(11) NOT NULL AUTO_INCREMENT,
  `announcementid` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  PRIMARY KEY (`dismissedannouncementid`),
  KEY `announcementid` (`announcementid`),
  KEY `staff` (`staff`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbldismissed_announcements` */

/*Table structure for table `tblemailtemplates` */

DROP TABLE IF EXISTS `tblemailtemplates`;

CREATE TABLE `tblemailtemplates` (
  `emailtemplateid` int(11) NOT NULL AUTO_INCREMENT,
  `type` mediumtext NOT NULL,
  `slug` varchar(100) NOT NULL,
  `language` varchar(40) DEFAULT NULL,
  `name` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` mediumtext NOT NULL,
  `fromname` mediumtext NOT NULL,
  `fromemail` varchar(100) DEFAULT NULL,
  `plaintext` int(11) NOT NULL DEFAULT 0,
  `active` tinyint(4) NOT NULL DEFAULT 0,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`emailtemplateid`)
) ENGINE=InnoDB AUTO_INCREMENT=100 DEFAULT CHARSET=utf8;

/*Data for the table `tblemailtemplates` */

insert  into `tblemailtemplates`(`emailtemplateid`,`type`,`slug`,`language`,`name`,`subject`,`message`,`fromname`,`fromemail`,`plaintext`,`active`,`order`) values 
(1,'client','new-client-created','english','New Contact Added/Registered (Welcome Email)','Welcome aboard','Dear {contact_firstname} {contact_lastname}<br /><br />Thank you for registering on the <strong>{companyname}</strong> CRM System.<br /><br />We just wanted to say welcome.<br /><br />Please contact us if you need any help.<br /><br />Click here to view your profile: <a href=\"{crm_url}\">{crm_url}</a><br /><br />Kind Regards, <br />{email_signature}<br /><br />(This is an automated email, so please don\'t reply to this email address)','{companyname} | CRM','',0,1,0),
(2,'invoice','invoice-send-to-client','english','Send Invoice to Customer','Invoice with number {invoice_number} created','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">We have prepared the following invoice for you: <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Invoice status</strong>: {invoice_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(3,'ticket','new-ticket-opened-admin','english','New Ticket Opened (Opened by Staff, Sent to Customer)','New Support Ticket Opened','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department:</strong> {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a><br /><br />Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(4,'ticket','ticket-reply','english','Ticket Reply (Sent to Customer)','New Ticket Reply','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">You have a new ticket reply to ticket <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket Subject:</strong> {ticket_subject}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(5,'ticket','ticket-autoresponse','english','New Ticket Opened - Autoresponse','New Support Ticket Opened','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Thank you for contacting our support team. A support ticket has now been opened for your request. You will be notified when a response is made by email.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_public_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(6,'invoice','invoice-payment-recorded','english','Invoice Payment Recorded (Sent to Customer)','Invoice Payment Recorded','<span style=\"font-size: 12pt;\">Hello {contact_firstname}&nbsp;{contact_lastname}<br /><br /></span>Thank you for the payment. Find the payment details below:<br /><br />-------------------------------------------------<br /><br />Amount:&nbsp;<strong>{payment_total}<br /></strong>Date:&nbsp;<strong>{payment_date}</strong><br />Invoice number:&nbsp;<span style=\"font-size: 12pt;\"><strong># {invoice_number}<br /><br /></strong></span>-------------------------------------------------<br /><br />You can always view the invoice for this payment at the following link:&nbsp;<a href=\"{invoice_link}\"><span style=\"font-size: 12pt;\">{invoice_number}</span></a><br /><br />We are looking forward working with you.<br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(7,'invoice','invoice-overdue-notice','english','Invoice Overdue Notice','Invoice Overdue Notice - {invoice_number}','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">This is an overdue notice for invoice <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">This invoice was due: {invoice_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(8,'invoice','invoice-already-send','english','Invoice Already Sent to Customer','Invoice # {invoice_number} ','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">At your request, here is the invoice with number <strong># {invoice_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(9,'ticket','new-ticket-created-staff','english','New Ticket Created (Opened by Customer, Sent to Staff Members)','New Ticket Created','<p><span style=\"font-size: 12pt;\">A new support ticket has been opened.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}<br /></span><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(10,'estimate','estimate-send-to-client','english','Send Estimate to Customer','Estimate # {estimate_number} created','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the attached estimate <strong># {estimate_number}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Estimate status:</strong> {estimate_status}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">We look forward to your communication.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}<br /></span>','{companyname} | CRM','',0,1,0),
(11,'ticket','ticket-reply-to-admin','english','Ticket Reply (Sent to Staff)','New Support Ticket Reply','<span style=\"font-size: 12pt;\">A new support ticket reply from {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(12,'estimate','estimate-already-send','english','Estimate Already Sent to Customer','Estimate # {estimate_number} ','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank you for your estimate request.</span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(13,'contract','contract-expiration','english','Contract Expiration Reminder (Sent to Customer Contacts)','Contract Expiration Reminder','<span style=\"font-size: 12pt;\">Dear {client_company}</span><br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(14,'tasks','task-assigned','english','New Task Assigned (Sent to Staff)','New Task Assigned to You - {task_name}','<span style=\"font-size: 12pt;\">Dear {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\">You have been assigned to a new task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}<br /></span><strong>Start Date:</strong> {task_startdate}<br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {task_priority}<br /><br /></span><span style=\"font-size: 12pt;\"><span>You can view the task on the following link</span>: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(15,'tasks','task-added-as-follower','english','Staff Member Added as Follower on Task (Sent to Staff)','You are added as follower on task - {task_name}','<span style=\"font-size: 12pt;\">Hi {staff_firstname}<br /></span><br /><span style=\"font-size: 12pt;\">You have been added as follower on the following task:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Start date:</strong> {task_startdate}</span><br /><br /><span>You can view the task on the following link</span><span>: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(16,'tasks','task-commented','english','New Comment on Task (Sent to Staff)','New Comment on Task - {task_name}','Dear {staff_firstname}<br /><br />A comment has been made on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><strong>Comment:</strong> {task_comment}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(17,'tasks','task-added-attachment','english','New Attachment(s) on Task (Sent to Staff)','New Attachment on Task - {task_name}','Hi {staff_firstname}<br /><br /><strong>{task_user_take_action}</strong> added an attachment on the following task:<br /><br /><strong>Name:</strong> {task_name}<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(18,'estimate','estimate-declined-to-staff','english','Estimate Declined (Sent to Staff)','Customer Declined Estimate','<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) declined estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(19,'estimate','estimate-accepted-to-staff','english','Estimate Accepted (Sent to Staff)','Customer Accepted Estimate','<span style=\"font-size: 12pt;\">Hi</span><br /> <br /><span style=\"font-size: 12pt;\">Customer ({client_company}) accepted estimate with number <strong># {estimate_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(20,'proposals','proposal-client-accepted','english','Customer Action - Accepted (Sent to Staff)','Customer Accepted Proposal','<div>Hi<br /> <br />Client <strong>{proposal_proposal_to}</strong> accepted the following proposal:<br /> <br /><strong>Number:</strong> {proposal_number}<br /><strong>Subject</strong>: {proposal_subject}<br /><strong>Total</strong>: {proposal_total}<br /> <br />View the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>\r\n<div>&nbsp;</div>','{companyname} | CRM','',0,1,0),
(21,'proposals','proposal-send-to-customer','english','Send Proposal to Customer','Proposal With Number {proposal_number} Created','Dear {proposal_proposal_to}<br /><br />Please find our attached proposal.<br /><br />This proposal is valid until: {proposal_open_till}<br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Please don\'t hesitate to comment online if you have any questions.<br /><br />We look forward to your communication.<br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(22,'proposals','proposal-client-declined','english','Customer Action - Declined (Sent to Staff)','Client Declined Proposal','Hi<br /> <br />Customer <strong>{proposal_proposal_to}</strong> declined the proposal <strong>{proposal_subject}</strong><br /> <br />View the proposal on the following link <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(23,'proposals','proposal-client-thank-you','english','Thank You Email (Sent to Customer After Accept)','Thank for you accepting proposal','Dear {proposal_proposal_to}<br /> <br />Thank for for accepting the proposal.<br /> <br />We look forward to doing business with you.<br /> <br />We will contact you as soon as possible<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(24,'proposals','proposal-comment-to-client','english','New Comment  (Sent to Customer/Lead)','New Proposal Comment','Dear {proposal_proposal_to}<br /> <br />A new comment has been made on the following proposal: <strong>{proposal_number}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(25,'proposals','proposal-comment-to-admin','english','New Comment (Sent to Staff) ','New Proposal Comment','Hi<br /> <br />A new comment has been made to the proposal <strong>{proposal_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{proposal_link}\">{proposal_number}</a>&nbsp;or from the admin area.<br /> <br />{email_signature}','{companyname} | CRM','',0,1,0),
(26,'estimate','estimate-thank-you-to-customer','english','Thank You Email (Sent to Customer After Accept)','Thank for you accepting estimate','<span style=\"font-size: 12pt;\">Dear {contact_firstname} {contact_lastname}</span><br /> <br /><span style=\"font-size: 12pt;\">Thank for for accepting the estimate.</span><br /> <br /><span style=\"font-size: 12pt;\">We look forward to doing business with you.</span><br /> <br /><span style=\"font-size: 12pt;\">We will contact you as soon as possible.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(27,'tasks','task-deadline-notification','english','Task Deadline Reminder - Sent to Assigned Members','Task Deadline Reminder','Hi {staff_firstname}&nbsp;{staff_lastname}<br /><br />This is an automated email from {companyname}.<br /><br />The task <strong>{task_name}</strong> deadline is on <strong>{task_duedate}</strong>. <br />This task is still not finished.<br /><br />You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a><br /><br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(28,'contract','send-contract','english','Send Contract to Customer','Contract - {contract_subject}','<p><span style=\"font-size: 12pt;\">Hi&nbsp;{contact_firstname}&nbsp;{contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Please find the <a href=\"{contract_link}\">{contract_subject}</a> attached.<br /><br />Description: {contract_description}<br /><br /></span><span style=\"font-size: 12pt;\">Looking forward to hear from you.</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(29,'invoice','invoice-payment-recorded-to-staff','english','Invoice Payment Recorded (Sent to Staff)','New Invoice Payment','<span style=\"font-size: 12pt;\">Hi</span><br /><br /><span style=\"font-size: 12pt;\">Customer recorded payment for invoice <strong># {invoice_number}</strong></span><br /> <br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(30,'ticket','auto-close-ticket','english','Auto Close Ticket','Ticket Auto Closed','<p><span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">Ticket {ticket_subject} has been auto close due to inactivity.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket #</strong>: <a href=\"{ticket_public_url}\">{ticket_id}</a></span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority:</strong> {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(31,'project','new-project-discussion-created-to-staff','english','New Project Discussion (Sent to Project Members)','New Project Discussion Created - {project_name}','<p>Hi {staff_firstname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(32,'project','new-project-discussion-created-to-customer','english','New Project Discussion (Sent to Customer Contacts)','New Project Discussion Created - {project_name}','<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project discussion created from <strong>{discussion_creator}</strong><br /><br /><strong>Subject:</strong> {discussion_subject}<br /><strong>Description:</strong> {discussion_description}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(33,'project','new-project-file-uploaded-to-customer','english','New Project File(s) Uploaded (Sent to Customer Contacts)','New Project File(s) Uploaded - {project_name}','<p>Hello {contact_firstname} {contact_lastname}<br /><br />New project file is uploaded on <strong>{project_name}</strong> from <strong>{file_creator}</strong><br /><br />You can view the project on the following link: <a href=\"{project_link}\">{project_name}</a><br /><br />To view the file in our CRM you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(34,'project','new-project-file-uploaded-to-staff','english','New Project File(s) Uploaded (Sent to Project Members)','New Project File(s) Uploaded - {project_name}','<p>Hello&nbsp;{staff_firstname}</p>\r\n<p>New project&nbsp;file is uploaded on&nbsp;<strong>{project_name}</strong> from&nbsp;<strong>{file_creator}</strong></p>\r\n<p>You can view the project on the following link: <a href=\"{project_link}\">{project_name}<br /></a><br />To view&nbsp;the file you can click on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></p>\r\n<p>Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(35,'project','new-project-discussion-comment-to-customer','english','New Discussion Comment  (Sent to Customer Contacts)','New Discussion Comment','<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Discussion subject:</strong> {discussion_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Comment</strong>: {discussion_comment}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(36,'project','new-project-discussion-comment-to-staff','english','New Discussion Comment (Sent to Project Members)','New Discussion Comment','<p>Hi {staff_firstname}<br /><br />New discussion comment has been made on <strong>{discussion_subject}</strong> from <strong>{comment_creator}</strong><br /><br /><strong>Discussion subject:</strong> {discussion_subject}<br /><strong>Comment:</strong> {discussion_comment}<br /><br />You can view the discussion on the following link: <a href=\"{discussion_link}\">{discussion_subject}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(37,'project','staff-added-as-project-member','english','Staff Added as Project Member','New project assigned to you','<p>Hi {staff_firstname}<br /><br />New project has been assigned to you.<br /><br />You can view the project on the following link <a href=\"{project_link}\">{project_name}</a><br /><br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(38,'estimate','estimate-expiry-reminder','english','Estimate Expiration Reminder','Estimate Expiration Reminder','<p><span style=\"font-size: 12pt;\">Hello {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\">The estimate with <strong># {estimate_number}</strong> will expire on <strong>{estimate_expirydate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the estimate on the following link: <a href=\"{estimate_link}\">{estimate_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(39,'proposals','proposal-expiry-reminder','english','Proposal Expiration Reminder','Proposal Expiration Reminder','<p>Hello {proposal_proposal_to}<br /><br />The proposal {proposal_number}&nbsp;will expire on <strong>{proposal_open_till}</strong><br /><br />You can view the proposal on the following link: <a href=\"{proposal_link}\">{proposal_number}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(40,'staff','new-staff-created','english','New Staff Created (Welcome Email)','You are added as staff member','Hi {staff_firstname}<br /><br />You are added as member on our CRM.<br /><br />Please use the following logic credentials:<br /><br /><strong>Email:</strong> {staff_email}<br /><strong>Password:</strong> {password}<br /><br />Click <a href=\"{admin_url}\">here </a>to login in the dashboard.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(41,'client','contact-forgot-password','english','Forgot Password','Create New Password','<h2>Create a new password</h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a {companyname}&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}','{companyname} | CRM','',0,1,0),
(42,'client','contact-password-reseted','english','Password Reset - Confirmation','Your password has been changed','<strong><span style=\"font-size: 14pt;\">You have changed your password.</span><br /></strong><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {contact_email}<br /><br />If this wasnt you, please contact us.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(43,'client','contact-set-password','english','Set New Password','Set new password on {companyname} ','<h2><span style=\"font-size: 14pt;\">Setup your new password on {companyname}</span></h2>\r\nPlease use the following link to set up your new password:<br /><br /><a href=\"{set_password_url}\">Set new password</a><br /><br />Keep it in your records so you don\'t forget it.<br /><br />Please set your new password in <strong>48 hours</strong>. After that, you won\'t be able to set your password because this link will expire.<br /><br />You can login at: <a href=\"{crm_url}\">{crm_url}</a><br />Your email address for login: {contact_email}<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(44,'staff','staff-forgot-password','english','Forgot Password','Create New Password','<h2><span style=\"font-size: 14pt;\">Create a new password</span></h2>\r\nForgot your password?<br /> To create a new password, just follow this link:<br /> <br /><a href=\"{reset_password_url}\">Reset Password</a><br /> <br /> You received this email, because it was requested by a <strong>{companyname}</strong>&nbsp;user. This is part of the procedure to create a new password on the system. If you DID NOT request a new password then please ignore this email and your password will remain the same. <br /><br /> {email_signature}','{companyname} | CRM','',0,1,0),
(45,'staff','staff-password-reseted','english','Password Reset - Confirmation','Your password has been changed','<span style=\"font-size: 14pt;\"><strong>You have changed your password.<br /></strong></span><br /> Please, keep it in your records so you don\'t forget it.<br /> <br /> Your email address for login is: {staff_email}<br /><br /> If this wasnt you, please contact us.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(46,'project','assigned-to-project','english','New Project Created (Sent to Customer Contacts)','New Project Created','<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>New project is assigned to your company.<br /><br /><strong>Project Name:</strong>&nbsp;{project_name}<br /><strong>Project Start Date:</strong>&nbsp;{project_start_date}</p>\r\n<p>You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>We are looking forward hearing from you.<br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(47,'tasks','task-added-attachment-to-contacts','english','New Attachment(s) on Task (Sent to Customer Contacts)','New Attachment on Task - {task_name}','<span>Hi {contact_firstname} {contact_lastname}</span><br /><br /><strong>{task_user_take_action}</strong><span> added an attachment on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),
(48,'tasks','task-commented-to-contacts','english','New Comment on Task (Sent to Customer Contacts)','New Comment on Task - {task_name}','<span>Dear {contact_firstname} {contact_lastname}</span><br /><br /><span>A comment has been made on the following task:</span><br /><br /><strong>Name:</strong><span> {task_name}</span><br /><strong>Comment:</strong><span> {task_comment}</span><br /><br /><span>You can view the task on the following link: </span><a href=\"{task_link}\">{task_name}</a><br /><br /><span>Kind Regards,</span><br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),
(49,'leads','new-lead-assigned','english','New Lead Assigned to Staff Member','New lead assigned to you','<p>Hello {lead_assigned}<br /><br />New lead is assigned to you.<br /><br /><strong>Lead Name:</strong>&nbsp;{lead_name}<br /><strong>Lead Email:</strong>&nbsp;{lead_email}<br /><br />You can view the lead on the following link: <a href=\"{lead_link}\">{lead_name}</a><br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(50,'client','client-statement','english','Statement - Account Summary','Account Statement from {statement_from} to {statement_to}','Dear {contact_firstname} {contact_lastname}, <br /><br />Its been a great experience working with you.<br /><br />Attached with this email is a list of all transactions for the period between {statement_from} to {statement_to}<br /><br />For your information your account balance due is total:&nbsp;{statement_balance_due}<br /><br />Please contact us if you need more information.<br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(51,'ticket','ticket-assigned-to-admin','english','New Ticket Assigned (Sent to Staff)','New support ticket has been assigned to you','<p><span style=\"font-size: 12pt;\">Hi</span></p>\r\n<p><span style=\"font-size: 12pt;\">A new support ticket&nbsp;has been assigned to you.</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject</strong>: {ticket_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Department</strong>: {ticket_department}</span><br /><span style=\"font-size: 12pt;\"><strong>Priority</strong>: {ticket_priority}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Ticket message:</strong></span><br /><span style=\"font-size: 12pt;\">{ticket_message}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the ticket on the following link: <a href=\"{ticket_url}\">#{ticket_id}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span></p>','{companyname} | CRM','',0,1,0),
(52,'client','new-client-registered-to-admin','english','New Customer Registration (Sent to admins)','New Customer Registration','Hello.<br /><br />New customer registration on your customer portal:<br /><br /><strong>Firstname:</strong>&nbsp;{contact_firstname}<br /><strong>Lastname:</strong>&nbsp;{contact_lastname}<br /><strong>Company:</strong>&nbsp;{client_company}<br /><strong>Email:</strong>&nbsp;{contact_email}<br /><br />Best Regards','{companyname} | CRM','',0,1,0),
(53,'leads','new-web-to-lead-form-submitted','english','Web to lead form submitted - Sent to lead','{lead_name} - We Received Your Request','Hello {lead_name}.<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,0,0),
(54,'staff','two-factor-authentication','english','Two Factor Authentication','Confirm Your Login','<p>Hi {staff_firstname}</p>\r\n<p style=\"text-align: left;\">You received this email because you have enabled two factor authentication in your account.<br />Use the following code to confirm your login:</p>\r\n<p style=\"text-align: left;\"><span style=\"font-size: 18pt;\"><strong>{two_factor_auth_code}<br /><br /></strong><span style=\"font-size: 12pt;\">{email_signature}</span><strong><br /><br /><br /><br /></strong></span></p>','{companyname} | CRM','',0,1,0),
(55,'project','project-finished-to-customer','english','Project Marked as Finished (Sent to Customer Contacts)','Project Marked as Finished','<p>Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}</p>\r\n<p>You are receiving this email because project&nbsp;<strong>{project_name}</strong> has been marked as finished. This project is assigned under your company and we just wanted to keep you up to date.<br /><br />You can view the project on the following link:&nbsp;<a href=\"{project_link}\">{project_name}</a></p>\r\n<p>If you have any questions don\'t hesitate to contact us.<br /><br />Kind Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(56,'credit_note','credit-note-send-to-client','english','Send Credit Note To Email','Credit Note With Number #{credit_note_number} Created','Dear&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have attached the credit note with number <strong>#{credit_note_number} </strong>for your reference.<br /><br /><strong>Date:</strong>&nbsp;{credit_note_date}<br /><strong>Total Amount:</strong>&nbsp;{credit_note_total}<br /><br /><span style=\"font-size: 12pt;\">Please contact us for more information.</span><br /> <br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(57,'tasks','task-status-change-to-staff','english','Task Status Changed (Sent to Staff)','Task Status Changed','<span style=\"font-size: 12pt;\">Hi {staff_firstname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(58,'tasks','task-status-change-to-contacts','english','Task Status Changed (Sent to Customer Contacts)','Task Status Changed','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}</span><br /><br /><span style=\"font-size: 12pt;\"><strong>{task_user_take_action}</strong> marked task as <strong>{task_status}</strong></span><br /><br /><span style=\"font-size: 12pt;\"><strong>Name:</strong> {task_name}</span><br /><span style=\"font-size: 12pt;\"><strong>Due date:</strong> {task_duedate}</span><br /><br /><span style=\"font-size: 12pt;\">You can view the task on the following link: <a href=\"{task_link}\">{task_name}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(59,'staff','reminder-email-staff','english','Staff Reminder Email','You Have a New Reminder!','<p>Hello&nbsp;{staff_firstname}<br /><br /><strong>You have a new reminder&nbsp;linked to&nbsp;{staff_reminder_relation_name}!<br /><br />Reminder description:</strong><br />{staff_reminder_description}<br /><br />Click <a href=\"{staff_reminder_relation_link}\">here</a> to view&nbsp;<a href=\"{staff_reminder_relation_link}\">{staff_reminder_relation_name}</a><br /><br />Best Regards<br /><br /></p>','{companyname} | CRM','',0,1,0),
(60,'contract','contract-comment-to-client','english','New Comment  (Sent to Customer Contacts)','New Contract Comment','Dear {contact_firstname} {contact_lastname}<br /> <br />A new comment has been made on the following contract: <strong>{contract_subject}</strong><br /> <br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a><br /> <br />Kind Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(61,'contract','contract-comment-to-admin','english','New Comment (Sent to Staff) ','New Contract Comment','Hi {staff_firstname}<br /><br />A new comment has been made to the contract&nbsp;<strong>{contract_subject}</strong><br /><br />You can view and reply to the comment on the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(62,'subscriptions','send-subscription','english','Send Subscription to Customer','Subscription Created','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />We have prepared the subscription&nbsp;<strong>{subscription_name}</strong> for your company.<br /><br />Click <a href=\"{subscription_link}\">here</a> to review the subscription and subscribe.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(63,'subscriptions','subscription-payment-failed','english','Subscription Payment Failed','Your most recent invoice payment failed','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br br=\"\" />Unfortunately, your most recent invoice payment for&nbsp;<strong>{subscription_name}</strong> was declined.<br /><br />This could be due to a change in your card number, your card expiring,<br />cancellation of your credit card, or the card issuer not recognizing the<br />payment and therefore taking action to prevent it.<br /><br />Please update your payment information as soon as possible by logging in here:<br /><a href=\"{crm_url}/login\">{crm_url}/login</a><br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(64,'subscriptions','subscription-canceled','english','Subscription Canceled (Sent to customer primary contact)','Your subscription has been canceled','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />Your subscription&nbsp;<strong>{subscription_name} </strong>has been canceled, if you have any questions don\'t hesitate to contact us.<br /><br />It was a pleasure doing business with you.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(65,'subscriptions','subscription-payment-succeeded','english','Subscription Payment Succeeded (Sent to customer primary contact)','Subscription  Payment Receipt - {subscription_name}','Hello&nbsp;{contact_firstname}&nbsp;{contact_lastname}<br /><br />This email is to let you know that we received your payment for subscription&nbsp;<strong>{subscription_name}&nbsp;</strong>of&nbsp;<strong><span>{payment_total}<br /><br /></span></strong>The invoice associated with it is now with status&nbsp;<strong>{invoice_status}<br /></strong><br />Thank you for your confidence.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,1,0),
(66,'contract','contract-expiration-to-staff','english','Contract Expiration Reminder (Sent to Staff)','Contract Expiration Reminder','Hi {staff_firstname}<br /><br /><span style=\"font-size: 12pt;\">This is a reminder that the following contract will expire soon:</span><br /><br /><span style=\"font-size: 12pt;\"><strong>Subject:</strong> {contract_subject}</span><br /><span style=\"font-size: 12pt;\"><strong>Description:</strong> {contract_description}</span><br /><span style=\"font-size: 12pt;\"><strong>Date Start:</strong> {contract_datestart}</span><br /><span style=\"font-size: 12pt;\"><strong>Date End:</strong> {contract_dateend}</span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(67,'gdpr','gdpr-removal-request','english','Removal Request From Contact (Sent to administrators)','Data Removal Request Received','Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by&nbsp;{contact_firstname} {contact_lastname}<br /><br />You can review this request and take proper actions directly from the admin area.','{companyname} | CRM','',0,1,0),
(68,'gdpr','gdpr-removal-request-lead','english','Removal Request From Lead (Sent to administrators)','Data Removal Request Received','Hello&nbsp;{staff_firstname}&nbsp;{staff_lastname}<br /><br />Data removal has been requested by {lead_name}<br /><br />You can review this request and take proper actions directly from the admin area.<br /><br />To view the lead inside the admin area click here:&nbsp;<a href=\"{lead_link}\">{lead_link}</a>','{companyname} | CRM','',0,1,0),
(69,'client','client-registration-confirmed','english','Customer Registration Confirmed','Your registration is confirmed','<p>Dear {contact_firstname} {contact_lastname}<br /><br />We just wanted to let you know that your registration at&nbsp;{companyname} is successfully confirmed and your account is now active.<br /><br />You can login at&nbsp;<a href=\"{crm_url}\">{crm_url}</a> with the email and password you provided during registration.<br /><br />Please contact us if you need any help.<br /><br />Kind Regards, <br />{email_signature}</p>\r\n<p><br />(This is an automated email, so please don\'t reply to this email address)</p>','{companyname} | CRM','',0,1,0),
(70,'contract','contract-signed-to-staff','english','Contract Signed (Sent to Staff)','Customer Signed a Contract','Hi {staff_firstname}<br /><br />A contract with subject&nbsp;<strong>{contract_subject} </strong>has been successfully signed by the customer.<br /><br />You can view the contract at the following link: <a href=\"{contract_link}\">{contract_subject}</a>&nbsp;or from the admin area.<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(71,'subscriptions','customer-subscribed-to-staff','english','Customer Subscribed to a Subscription (Sent to administrators and subscription creator)','Customer Subscribed to a Subscription','The customer <strong>{client_company}</strong> subscribed to a subscription with name&nbsp;<strong>{subscription_name}</strong><br /><br /><strong>ID</strong>:&nbsp;{subscription_id}<br /><strong>Subscription name</strong>:&nbsp;{subscription_name}<br /><strong>Subscription description</strong>:&nbsp;{subscription_description}<br /><br />You can view the subscription by clicking <a href=\"{subscription_link}\">here</a><br />\r\n<div style=\"text-align: center;\"><span style=\"font-size: 10pt;\">&nbsp;</span></div>\r\nBest Regards,<br />{email_signature}<br /><br /><span style=\"font-size: 10pt;\"><span style=\"color: #999999;\">You are receiving this email because you are either administrator or you are creator of the subscription.</span></span>','{companyname} | CRM','',0,1,0),
(72,'client','contact-verification-email','english','Email Verification (Sent to Contact After Registration)','Verify Email Address','<p>Hello&nbsp;{contact_firstname}<br /><br />Please click the button below to verify your email address.<br /><br /><a href=\"{email_verification_url}\">Verify Email Address</a><br /><br />If you did not create an account, no further action is required</p>\r\n<p><br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(73,'client','new-customer-profile-file-uploaded-to-staff','english','New Customer Profile File(s) Uploaded (Sent to Staff)','Customer Uploaded New File(s) in Profile','Hi!<br /><br />New file(s) is uploaded into the customer ({client_company}) profile by&nbsp;{contact_firstname}<br /><br />You can check the uploaded files into the admin area by clicking <a href=\"{customer_profile_files_admin_link}\">here</a> or at the following link:&nbsp;{customer_profile_files_admin_link}<br /><br />{email_signature}','{companyname} | CRM','',0,1,0),
(74,'staff','event-notification-to-staff','english','Event Notification (Calendar)','Upcoming Event - {event_title}','Hi {staff_firstname}! <br /><br />This is a reminder for event <a href=\\\"{event_link}\\\">{event_title}</a> scheduled at {event_start_date}. <br /><br />Regards.','','',0,1,0),
(75,'subscriptions','subscription-payment-requires-action','english','Credit Card Authorization Required - SCA','Important: Confirm your subscription {subscription_name} payment','<p>Hello {contact_firstname}</p>\r\n<p><strong>Your bank sometimes requires an additional step to make sure an online transaction was authorized.</strong><br /><br />Because of European regulation to protect consumers, many online payments now require two-factor authentication. Your bank ultimately decides when authentication is required to confirm a payment, but you may notice this step when you start paying for a service or when the cost changes.<br /><br />In order to pay the subscription <strong>{subscription_name}</strong>, you will need to&nbsp;confirm your payment by clicking on the follow link: <strong><a href=\"{subscription_authorize_payment_link}\">{subscription_authorize_payment_link}</a></strong><br /><br />To view the subscription, please click at the following link: <a href=\"{subscription_link}\"><span>{subscription_link}</span></a><br />or you can login in our dedicated area here: <a href=\"{crm_url}/login\">{crm_url}/login</a> in case you want to update your credit card or view the subscriptions you are subscribed.<br /><br />Best Regards,<br />{email_signature}</p>','{companyname} | CRM','',0,1,0),
(76,'invoice','invoice-due-notice','english','Invoice Due Notice','Your {invoice_number} will be due soon','<span style=\"font-size: 12pt;\">Hi {contact_firstname} {contact_lastname}<br /><br /></span>You invoice <span style=\"font-size: 12pt;\"><strong># {invoice_number} </strong>will be due on <strong>{invoice_duedate}</strong></span><br /><br /><span style=\"font-size: 12pt;\">You can view the invoice on the following link: <a href=\"{invoice_link}\">{invoice_number}</a></span><br /><br /><span style=\"font-size: 12pt;\">Kind Regards,</span><br /><span style=\"font-size: 12pt;\">{email_signature}</span>','{companyname} | CRM','',0,1,0),
(77,'estimate_request','estimate-request-submitted-to-staff','english','Estimate Request Submitted (Sent to Staff)','New Estimate Request Submitted','<span> Hello,&nbsp;</span><br /><br />{estimate_request_email} submitted an estimate request via the {estimate_request_form_name} form.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />==<br /><br />{estimate_request_submitted_data}<br /><br />Kind Regards,<br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),
(78,'estimate_request','estimate-request-assigned','english','Estimate Request Assigned (Sent to Staff)','New Estimate Request Assigned','<span> Hello {estimate_request_assigned},&nbsp;</span><br /><br />Estimate request #{estimate_request_id} has been assigned to you.<br /><br />You can view the request at the following link: <a href=\"{estimate_request_link}\">{estimate_request_link}</a><br /><br />Kind Regards,<br /><span>{email_signature}</span>','{companyname} | CRM','',0,1,0),
(79,'estimate_request','estimate-request-received-to-user','english','Estimate Request Received (Sent to User)','Estimate Request Received','Hello,<br /><br /><strong>Your request has been received.</strong><br /><br />This email is to let you know that we received your request and we will get back to you as soon as possible with more information.<br /><br />Best Regards,<br />{email_signature}','{companyname} | CRM','',0,0,0),
(80,'notifications','non-billed-tasks-reminder','english','Non-billed tasks reminder (sent to selected staff members)','Action required: Completed tasks are not billed','Hello {staff_firstname}<br><br>The following tasks are marked as complete but not yet billed:<br><br>{unbilled_tasks_list}<br><br>Kind Regards,<br><br>{email_signature}','{companyname} | CRM','',0,1,0),
(81,'invoice','invoices-batch-payments','english','Invoices Payments Recorded in Batch (Sent to Customer)','We have received your payments','Hello {contact_firstname} {contact_lastname}<br><br>Thank you for the payments. Please find the payments details below:<br><br>{batch_payments_list}<br><br>We are looking forward working with you.<br><br>Kind Regards,<br><br>{email_signature}','{companyname} | CRM','',0,1,0),
(82,'appointly','appointment-cron-reminder-to-staff','english','Appointment reminder (Sent to Staff and Attendees)','You have an upcoming appointment!','<span style=\\\"font-size: 12pt;\\\"> Hello {staff_firstname} {staff_lastname} </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> You have an upcoming appointment that is need to be held date {appointment_date} and location {appointment_location}</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong>Additional info for your appointment:</strong></span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can view this appointment at the following link:</strong> <a href=\"{appointment_admin_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(83,'appointly','appointment-recurring-to-staff','english','Appointment recurring (Sent to Staff and Attendees)','Recurring appointment was re-created!','<span style=\\\"font-size: 12pt;\\\"> Hello {staff_firstname} {staff_lastname} </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> Your recurring appointment was recreated with date {appointment_date} and location {appointment_location}</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong> Additional info for your appointment:</strong></span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can view this appointment at the following link:</strong> <a href=\"{appointment_admin_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(84,'appointly','appointment-cancelled-to-staff','english','Appointment cancelled (Sent to Staff and Attendees)','Appointment has been cancelled!','<span style=\\\"font-size: 12pt;\\\"> Hello {staff_firstname} {staff_lastname}. </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> The appointment that needed to be held on date {appointment_date} and location {appointment_location} with contact {appointment_client_name} is cancelled.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(85,'appointly','appointment-cancelled-to-contact','english','Appointment cancelled (Sent to Contact)','Your appointment has been cancelled!','<span style=\\\"font-size: 12pt;\\\"> Hello {appointment_client_name}. </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> The appointment that needed to be held on date {appointment_date} and location {appointment_location} is now cancelled.</span><br /><br /><span style=\\\"font-size:12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(86,'appointly','appointment-cron-reminder-to-contact','english','Appointment reminder (Sent to Contact)','You have an upcoming appointment!','<span style=\\\"font-size: 12pt;\\\"> Hello {appointment_client_name}. </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> You have an upcoming appointment that is need to be held date {appointment_date} and location {appointment_location}.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong>Additional info for your appointment</strong></span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can view this appointment at the following link:</strong> <a href=\"{appointment_public_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(87,'appointly','appointment-recurring-to-contacts','english','Appointment recurring (Sent to Contact)','Recurring appointment was re-created!','<span style=\\\"font-size: 12pt;\\\"> Hello {appointment_client_name}. </span><br /><br /><span style=\\\"font-size: 12pt;\\\"> Your recurring appointment was recreated with date {appointment_date} and location {appointment_location}.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong>Additional info for your appointment</strong></span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can view this appointment at the following link:</strong> <a href=\"{appointment_public_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(88,'appointly','appointment-approved-to-staff','english','Appointment approved (Sent to Staff and Atendees)','You are added as a appointment attendee!','<span style=\\\"font-size: 12pt;\\\"> Hello {staff_firstname} {staff_lastname}.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"> You are added as a appointment attendee.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can view this appointment at the following link:</strong> <a href=\"{appointment_admin_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(89,'appointly','appointment-approved-to-contact','english','Appointment approved (Sent to Contact)','Your appointment has been approved!','<span style=\\\"font-size: 12pt;\\\"> Hello {appointment_client_name}.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"> You appointment has been approved!</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>Appointment scheduled date to start:</strong> {appointment_date}</span><br /><span style=\\\"font-size: 12pt;\\\"><strong>You can keep track of your appointment at the following link:</strong> <a href=\"{appointment_public_url}\">Your appointment URL</a></span><br /><span style=\\\"font-size: 12pt;\\\"><br/>If you have any questions Please contact us for more information.</span><br /><br /><span style=\\\"font-size: 12pt;\\\"><br />Kind Regards</span><br /><br /><span style=\\\"font-size: 12pt;\\\">{email_signature}</span>','{companyname} | CRM',NULL,0,1,0),
(90,'appointly','appointment-submitted-to-staff','english','New appointment request (Sent to Responsible Person)','New appointment request via external form!','<span 12pt=\"\"><span 12pt=\"\">Hello {staff_firstname} {staff_lastname}<br /><br />New appointment request submitted via external form</span>.<br /><br /><span 12pt=\"\"><strong>Appointment Subject:</strong> {appointment_subject}</span><br /><br /><span 12pt=\"\"><strong>Appointment Description:</strong> {appointment_description}</span><br /><br /><span 12pt=\"\"><strong>Appointment requested scheduled start date:</strong> {appointment_date}</span><br /><br /><span 12pt=\"\"><strong>You can view this appointment request at the following link:</strong> <a href=\"{appointment_admin_url}\">{appointment_admin_url}</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(91,'appointly','callback-assigned-to-staff','english','Assigned to callback (Sent to Staff)','You have been assigned to handle a new callback!','<span 12pt=\"\"><span 12pt=\"\">Hello {staff_firstname} {staff_lastname}<br /><br />An admin assigned a callback to you, you can view this callback request at the following link:</strong> <a href=\"{admin_url}/appointly/callbacks\">{admin_url}/appointly/callbacks</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(92,'appointly','newcallback-requested-to-staff','english','New callback request (Sent to Callbacks Responsible Person)','You have a new callback request!','<span 12pt=\"\"><span 12pt=\"\">Hello {staff_firstname} {staff_lastname}<br /><br />A new callback request has just been submitted, fast navigate to callbacks to view latest callback submitted:</strong> <a href=\"{admin_url}/appointly/callbacks\">{admin_url}/appointly/callbacks</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(93,'appointly','appointly-appointment-request-feedback','english','Request Appointment Feedback (Sent to Client)','Feedback request for appointment!','<span 12pt=\"\"><span 12pt=\"\">Hello {appointment_client_name} <br /><br />A new feedback request has just been submitted, please leave your comments and thoughts about this past appointment, fast navigate to the appointment to add a feedback:</strong> <a href=\"{appointment_public_url}\">{appointment_public_url}</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(94,'appointly','appointly-appointment-feedback-received','english','New Feedback Received (Sent to Responsible Person)','New appointment feedback rating received!','<span 12pt=\"\"><span 12pt=\"\">Hello {staff_firstname} {staff_lastname} <br /><br />A new feedback rating has been received from client {appointment_client_name}. View the new feedback rating submitted at the following link:</strong> <a href=\"{appointment_admin_url}\">{appointment_admin_url}</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(95,'appointly','appointly-appointment-feedback-updated','english','Feedback Updated (Sent to Responsible Person)','Appointment feedback rating updated!','<span 12pt=\"\"><span 12pt=\"\">Hello {staff_firstname} {staff_lastname} <br /><br />An existing feedback was just updated from client {appointment_client_name}. View the new rating submitted at the following link:</strong> <a href=\"{appointment_admin_url}\">{appointment_admin_url}</a></span><br /><br /><br />{companyname}<br />{crm_url}<br /><span 12pt=\"\"></span></span>','{companyname} | CRM',NULL,0,1,0),
(96,'timesheets_attendance_mgt','attendance_notice','english','Attendance notice','Timesheets - Attendance notice','{staff_name} {type_check} at {date_time}','{companyname} | CRM',NULL,0,1,0),
(97,'timesheets_attendance_mgt','send_request_approval','english','Send request approval','Timesheets - Send request approval to approver','Hi {approver}! <br>-{staff_name} has created an apply for leave and requires your approval. Please go to this link for details and approval: {link}','{companyname} | CRM',NULL,0,1,0),
(98,'timesheets_attendance_mgt','remind_user_check_in','english','Remind user check in','Timesheets - Remind user check in','Remind you to check in today to record the start time of the shift {date_time}','{companyname} | CRM',NULL,0,1,0),
(99,'inventory_warning','inventory-warning-to-staff','english','Inventory warning (Sent to staff)','Inventory warning','Hi {staff_name}! <br /><br />This is a inventory warning<br />{<span 12pt=\"\">notification_content</span>}. <br /><br />Regards.','{companyname} | CRM',NULL,0,1,0);

/*Table structure for table `tblestimate_request_forms` */

DROP TABLE IF EXISTS `tblestimate_request_forms`;

CREATE TABLE `tblestimate_request_forms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `form_key` varchar(32) NOT NULL,
  `type` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext DEFAULT NULL,
  `recaptcha` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `submit_btn_name` varchar(100) DEFAULT NULL,
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `success_submit_msg` text DEFAULT NULL,
  `submit_action` int(11) DEFAULT 0,
  `submit_redirect_url` mediumtext DEFAULT NULL,
  `language` varchar(100) DEFAULT NULL,
  `dateadded` datetime DEFAULT NULL,
  `notify_type` varchar(100) DEFAULT NULL,
  `notify_ids` mediumtext DEFAULT NULL,
  `responsible` int(11) DEFAULT NULL,
  `notify_request_submitted` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblestimate_request_forms` */

/*Table structure for table `tblestimate_request_status` */

DROP TABLE IF EXISTS `tblestimate_request_status`;

CREATE TABLE `tblestimate_request_status` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `statusorder` int(11) DEFAULT NULL,
  `color` varchar(10) DEFAULT NULL,
  `flag` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tblestimate_request_status` */

insert  into `tblestimate_request_status`(`id`,`name`,`statusorder`,`color`,`flag`) values 
(1,'Cancelled',1,'#808080','cancelled'),
(2,'Processing',2,'#007bff','processing'),
(3,'Completed',3,'#28a745','completed');

/*Table structure for table `tblestimate_requests` */

DROP TABLE IF EXISTS `tblestimate_requests`;

CREATE TABLE `tblestimate_requests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `submission` longtext NOT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `date_estimated` datetime DEFAULT NULL,
  `from_form_id` int(11) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `default_language` int(11) NOT NULL,
  `date_added` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblestimate_requests` */

/*Table structure for table `tblestimates` */

DROP TABLE IF EXISTS `tblestimates`;

CREATE TABLE `tblestimates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `clientnote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int(11) DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `pipeline_order` int(11) DEFAULT 1,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `currency` (`currency`),
  KEY `project_id` (`project_id`),
  KEY `sale_agent` (`sale_agent`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblestimates` */

/*Table structure for table `tblevents` */

DROP TABLE IF EXISTS `tblevents`;

CREATE TABLE `tblevents` (
  `eventid` int(11) NOT NULL AUTO_INCREMENT,
  `title` mediumtext NOT NULL,
  `description` text DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime DEFAULT NULL,
  `public` int(11) NOT NULL DEFAULT 0,
  `color` varchar(10) DEFAULT NULL,
  `isstartnotified` tinyint(1) NOT NULL DEFAULT 0,
  `reminder_before` int(11) NOT NULL DEFAULT 0,
  `reminder_before_type` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`eventid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblevents` */

/*Table structure for table `tblexpenses` */

DROP TABLE IF EXISTS `tblexpenses`;

CREATE TABLE `tblexpenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` int(11) NOT NULL,
  `currency` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax2` int(11) NOT NULL DEFAULT 0,
  `reference_no` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `expense_name` varchar(191) DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `billable` int(11) DEFAULT 0,
  `invoiceid` int(11) DEFAULT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `date` date NOT NULL,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `custom_recurring` int(11) NOT NULL DEFAULT 0,
  `last_recurring_date` date DEFAULT NULL,
  `create_invoice_billable` tinyint(1) DEFAULT NULL,
  `send_invoice_to_customer` tinyint(1) NOT NULL,
  `recurring_from` int(11) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `addedfrom` int(11) NOT NULL,
  `vendor` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`),
  KEY `category` (`category`),
  KEY `currency` (`currency`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblexpenses` */

/*Table structure for table `tblexpenses_categories` */

DROP TABLE IF EXISTS `tblexpenses_categories`;

CREATE TABLE `tblexpenses_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblexpenses_categories` */

/*Table structure for table `tblfiles` */

DROP TABLE IF EXISTS `tblfiles`;

CREATE TABLE `tblfiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(40) DEFAULT NULL,
  `visible_to_customer` int(11) NOT NULL DEFAULT 0,
  `attachment_key` varchar(32) DEFAULT NULL,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text DEFAULT NULL,
  `thumbnail_link` text DEFAULT NULL COMMENT 'For external usage',
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT 0,
  `task_comment_id` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

/*Data for the table `tblfiles` */

insert  into `tblfiles`(`id`,`rel_id`,`rel_type`,`file_name`,`filetype`,`visible_to_customer`,`attachment_key`,`external`,`external_link`,`thumbnail_link`,`staffid`,`contact_id`,`task_comment_id`,`dateadded`) values 
(26,14,'commodity_item_file','2.jpg','image/jpeg',0,'19071a54f5459cd28dfaf09eecbc8463',NULL,NULL,NULL,1,0,0,'2022-12-03 17:41:46'),
(27,14,'commodity_item_file','1.jpg','image/jpeg',0,'d227decabad573a197e340a1159a8421',NULL,NULL,NULL,1,0,0,'2022-12-03 17:41:46'),
(28,14,'commodity_item_file','3.jpg','image/jpeg',0,'e4b87c03cb911b97890e0d97b4ba9a2c',NULL,NULL,NULL,1,0,0,'2022-12-03 17:41:47'),
(29,14,'commodity_item_file','4.jpg','image/jpeg',0,'b0439fbf843d45ccb837c8fcd8f7ddc8',NULL,NULL,NULL,1,0,0,'2022-12-03 17:41:47'),
(30,14,'commodity_item_file','5.jpg','image/jpeg',0,'e7426febd3d189fdad87c35c432e151e',NULL,NULL,NULL,1,0,0,'2022-12-03 17:41:47'),
(31,15,'commodity_item_file','2.jpg','image/jpeg',0,'bbb4a60d36fe9ee25c01ba528a97b186',NULL,NULL,NULL,1,0,0,'2023-01-02 13:15:04'),
(32,15,'commodity_item_file','3.jpg','image/jpeg',0,'47cacb0c59e0868d5f8721181a9fe93a',NULL,NULL,NULL,1,0,0,'2023-01-02 13:15:04'),
(33,15,'commodity_item_file','4.jpg','image/jpeg',0,'d78fc01f231b1863cb9ddfa3e986052d',NULL,NULL,NULL,1,0,0,'2023-01-02 13:15:04'),
(34,15,'commodity_item_file','5.jpg','image/jpeg',0,'5bfe4cbbefab1dd7e0ee687008a668d0',NULL,NULL,NULL,1,0,0,'2023-01-02 13:15:04'),
(35,16,'commodity_item_file','page-banner-17.jpg','image/jpeg',0,'62efe2e60269c3aea29af366f6a4139c',NULL,NULL,NULL,1,0,0,'2023-01-03 15:13:32'),
(36,16,'commodity_item_file','banner_car.jpg','image/jpeg',0,'fd2b0c52ffab70145cb4946b92b4caf3',NULL,NULL,NULL,1,0,0,'2023-01-03 15:13:33');

/*Table structure for table `tblform_question_box` */

DROP TABLE IF EXISTS `tblform_question_box`;

CREATE TABLE `tblform_question_box` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `boxtype` varchar(10) NOT NULL,
  `questionid` int(11) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblform_question_box` */

/*Table structure for table `tblform_question_box_description` */

DROP TABLE IF EXISTS `tblform_question_box_description`;

CREATE TABLE `tblform_question_box_description` (
  `questionboxdescriptionid` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `boxid` mediumtext NOT NULL,
  `questionid` int(11) NOT NULL,
  PRIMARY KEY (`questionboxdescriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblform_question_box_description` */

/*Table structure for table `tblform_questions` */

DROP TABLE IF EXISTS `tblform_questions`;

CREATE TABLE `tblform_questions` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `question_order` int(11) NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblform_questions` */

/*Table structure for table `tblform_results` */

DROP TABLE IF EXISTS `tblform_results`;

CREATE TABLE `tblform_results` (
  `resultid` int(11) NOT NULL AUTO_INCREMENT,
  `boxid` int(11) NOT NULL,
  `boxdescriptionid` int(11) DEFAULT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `questionid` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `resultsetid` int(11) NOT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblform_results` */

/*Table structure for table `tblgdpr_requests` */

DROP TABLE IF EXISTS `tblgdpr_requests`;

CREATE TABLE `tblgdpr_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clientid` int(11) NOT NULL DEFAULT 0,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `lead_id` int(11) NOT NULL DEFAULT 0,
  `request_type` varchar(191) DEFAULT NULL,
  `status` varchar(40) DEFAULT NULL,
  `request_date` datetime NOT NULL,
  `request_from` varchar(150) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgdpr_requests` */

/*Table structure for table `tblgoods_delivery` */

DROP TABLE IF EXISTS `tblgoods_delivery`;

CREATE TABLE `tblgoods_delivery` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rel_type` int(11) DEFAULT NULL COMMENT 'type goods delivery',
  `rel_document` int(11) DEFAULT NULL COMMENT 'document id of goods delivery',
  `customer_code` text DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `to_` varchar(100) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL COMMENT 'the reason delivery',
  `staff_id` int(11) DEFAULT NULL COMMENT 'salesman',
  `date_c` date DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `goods_delivery_code` varchar(100) DEFAULT NULL COMMENT 'số chứng từ xuất kho',
  `warehouse_id` int(11) DEFAULT NULL,
  `total_money` varchar(200) DEFAULT NULL,
  `approval` int(11) DEFAULT 0 COMMENT 'status approval ',
  `addedfrom` int(11) DEFAULT NULL,
  `total_discount` varchar(100) DEFAULT NULL,
  `after_discount` varchar(100) DEFAULT NULL,
  `invoice_id` varchar(100) DEFAULT NULL,
  `project` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `requester` int(11) DEFAULT NULL,
  `invoice_no` text DEFAULT NULL,
  `pr_order_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_delivery` */

/*Table structure for table `tblgoods_delivery_detail` */

DROP TABLE IF EXISTS `tblgoods_delivery_detail`;

CREATE TABLE `tblgoods_delivery_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_delivery_id` int(11) NOT NULL,
  `commodity_code` varchar(100) DEFAULT NULL,
  `commodity_name` text DEFAULT NULL,
  `warehouse_id` text DEFAULT NULL,
  `unit_id` text DEFAULT NULL,
  `quantities` text DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `total_money` varchar(200) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `discount_money` varchar(100) DEFAULT NULL,
  `available_quantity` varchar(100) DEFAULT NULL,
  `tax_id` varchar(100) DEFAULT NULL,
  `total_after_discount` varchar(100) DEFAULT NULL,
  `expiry_date` text DEFAULT NULL,
  `lot_number` text DEFAULT NULL,
  `guarantee_period` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_delivery_detail` */

/*Table structure for table `tblgoods_delivery_invoices_pr_orders` */

DROP TABLE IF EXISTS `tblgoods_delivery_invoices_pr_orders`;

CREATE TABLE `tblgoods_delivery_invoices_pr_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) DEFAULT NULL COMMENT 'goods_delivery_id',
  `rel_type` int(11) DEFAULT NULL COMMENT 'invoice_id or purchase order id',
  `type` varchar(100) DEFAULT NULL COMMENT 'invoice,  purchase_orders',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_delivery_invoices_pr_orders` */

/*Table structure for table `tblgoods_receipt` */

DROP TABLE IF EXISTS `tblgoods_receipt`;

CREATE TABLE `tblgoods_receipt` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `supplier_code` varchar(100) DEFAULT NULL,
  `supplier_name` text DEFAULT NULL,
  `deliver_name` text DEFAULT NULL,
  `buyer_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `pr_order_id` int(11) DEFAULT NULL COMMENT 'code puchase request agree',
  `date_c` date DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `goods_receipt_code` varchar(100) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `total_tax_money` varchar(100) DEFAULT NULL,
  `total_goods_money` varchar(100) DEFAULT NULL,
  `value_of_inventory` varchar(100) DEFAULT NULL,
  `total_money` varchar(100) DEFAULT NULL COMMENT 'total_money = total_tax_money +total_goods_money ',
  `addedfrom` int(11) DEFAULT NULL,
  `approval` int(11) DEFAULT 0,
  `project` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `requester` int(11) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `invoice_no` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_receipt` */

/*Table structure for table `tblgoods_receipt_detail` */

DROP TABLE IF EXISTS `tblgoods_receipt_detail`;

CREATE TABLE `tblgoods_receipt_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_receipt_id` int(11) NOT NULL,
  `commodity_code` varchar(100) DEFAULT NULL,
  `commodity_name` text DEFAULT NULL,
  `warehouse_id` text DEFAULT NULL,
  `unit_id` text DEFAULT NULL,
  `quantities` text DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `tax_money` varchar(100) DEFAULT NULL,
  `goods_money` varchar(100) DEFAULT NULL,
  `date_manufacture` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `note` text DEFAULT NULL,
  `discount` varchar(100) DEFAULT NULL,
  `discount_money` varchar(100) DEFAULT NULL,
  `lot_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_receipt_detail` */

/*Table structure for table `tblgoods_transaction_detail` */

DROP TABLE IF EXISTS `tblgoods_transaction_detail`;

CREATE TABLE `tblgoods_transaction_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `goods_receipt_id` int(11) DEFAULT NULL COMMENT 'id_goods_receipt_id or goods_delivery_id',
  `goods_id` int(11) NOT NULL COMMENT ' is id commodity',
  `old_quantity` varchar(100) DEFAULT NULL,
  `quantity` varchar(100) DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `commodity_id` int(11) NOT NULL,
  `warehouse_id` text NOT NULL,
  `note` text DEFAULT NULL,
  `status` int(2) DEFAULT NULL COMMENT '1:Goods receipt note 2:Goods delivery note',
  `purchase_price` varchar(100) DEFAULT NULL,
  `price` varchar(100) DEFAULT NULL,
  `expiry_date` text DEFAULT NULL,
  `lot_number` text DEFAULT NULL,
  `from_stock_name` int(11) DEFAULT NULL,
  `to_stock_name` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`,`commodity_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblgoods_transaction_detail` */

/*Table structure for table `tblgroup_checklist` */

DROP TABLE IF EXISTS `tblgroup_checklist`;

CREATE TABLE `tblgroup_checklist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `meta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblgroup_checklist` */

/*Table structure for table `tblgroup_checklist_allocation` */

DROP TABLE IF EXISTS `tblgroup_checklist_allocation`;

CREATE TABLE `tblgroup_checklist_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `meta` varchar(100) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblgroup_checklist_allocation` */

/*Table structure for table `tblhr_allocation_asset` */

DROP TABLE IF EXISTS `tblhr_allocation_asset`;

CREATE TABLE `tblhr_allocation_asset` (
  `allocation_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) unsigned NOT NULL,
  `asset_name` varchar(100) DEFAULT NULL,
  `assets_amount` int(11) unsigned NOT NULL,
  `status_allocation` int(11) unsigned DEFAULT 0 COMMENT '1: Allocated 0: Unallocated',
  PRIMARY KEY (`allocation_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_allocation_asset` */

/*Table structure for table `tblhr_allowance_type` */

DROP TABLE IF EXISTS `tblhr_allowance_type`;

CREATE TABLE `tblhr_allowance_type` (
  `type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_name` varchar(200) NOT NULL,
  `allowance_val` decimal(15,2) NOT NULL,
  `taxable` tinyint(1) NOT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_allowance_type` */

/*Table structure for table `tblhr_checklist_allocation` */

DROP TABLE IF EXISTS `tblhr_checklist_allocation`;

CREATE TABLE `tblhr_checklist_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_checklist_allocation` */

/*Table structure for table `tblhr_dependent_person` */

DROP TABLE IF EXISTS `tblhr_dependent_person`;

CREATE TABLE `tblhr_dependent_person` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) unsigned DEFAULT NULL,
  `dependent_name` varchar(100) DEFAULT NULL,
  `relationship` varchar(100) DEFAULT NULL,
  `dependent_bir` date DEFAULT NULL,
  `start_month` date DEFAULT NULL,
  `end_month` date DEFAULT NULL,
  `dependent_iden` varchar(20) NOT NULL,
  `reason` longtext DEFAULT NULL,
  `status` int(11) unsigned DEFAULT 0,
  `status_comment` longtext DEFAULT NULL,
  PRIMARY KEY (`id`,`dependent_iden`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_dependent_person` */

/*Table structure for table `tblhr_education` */

DROP TABLE IF EXISTS `tblhr_education`;

CREATE TABLE `tblhr_education` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `programe_id` int(11) DEFAULT NULL,
  `training_programs_name` text NOT NULL,
  `training_places` text DEFAULT NULL,
  `training_time_from` datetime DEFAULT NULL,
  `training_time_to` datetime DEFAULT NULL,
  `date_create` datetime DEFAULT NULL,
  `training_result` varchar(150) DEFAULT NULL,
  `degree` varchar(150) DEFAULT NULL,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_education` */

/*Table structure for table `tblhr_group_checklist_allocation` */

DROP TABLE IF EXISTS `tblhr_group_checklist_allocation`;

CREATE TABLE `tblhr_group_checklist_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(100) NOT NULL,
  `meta` varchar(100) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_group_checklist_allocation` */

/*Table structure for table `tblhr_job_p` */

DROP TABLE IF EXISTS `tblhr_job_p`;

CREATE TABLE `tblhr_job_p` (
  `job_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_name` varchar(100) DEFAULT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`job_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_job_p` */

/*Table structure for table `tblhr_job_position` */

DROP TABLE IF EXISTS `tblhr_job_position`;

CREATE TABLE `tblhr_job_position` (
  `position_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(200) NOT NULL,
  `job_position_description` text DEFAULT NULL,
  `job_p_id` int(11) unsigned NOT NULL,
  `position_code` varchar(50) DEFAULT NULL,
  `department_id` text DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_job_position` */

/*Table structure for table `tblhr_jp_interview_training` */

DROP TABLE IF EXISTS `tblhr_jp_interview_training`;

CREATE TABLE `tblhr_jp_interview_training` (
  `training_process_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_position_id` longtext DEFAULT NULL,
  `training_name` varchar(100) DEFAULT NULL,
  `training_type` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `date_add` datetime DEFAULT NULL,
  `position_training_id` text DEFAULT NULL,
  `mint_point` int(11) DEFAULT NULL,
  `additional_training` varchar(100) DEFAULT '',
  `staff_id` text DEFAULT NULL,
  `time_to_start` date DEFAULT NULL,
  `time_to_end` date DEFAULT NULL,
  PRIMARY KEY (`training_process_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_jp_interview_training` */

/*Table structure for table `tblhr_jp_salary_scale` */

DROP TABLE IF EXISTS `tblhr_jp_salary_scale`;

CREATE TABLE `tblhr_jp_salary_scale` (
  `salary_scale_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `job_position_id` int(11) unsigned NOT NULL,
  `rel_type` varchar(100) DEFAULT NULL COMMENT 'salary:allowance:insurance',
  `rel_id` int(11) DEFAULT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`salary_scale_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_jp_salary_scale` */

/*Table structure for table `tblhr_knowedge_base_article_feedback` */

DROP TABLE IF EXISTS `tblhr_knowedge_base_article_feedback`;

CREATE TABLE `tblhr_knowedge_base_article_feedback` (
  `articleanswerid` int(11) NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`articleanswerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_knowedge_base_article_feedback` */

/*Table structure for table `tblhr_knowledge_base` */

DROP TABLE IF EXISTS `tblhr_knowledge_base`;

CREATE TABLE `tblhr_knowledge_base` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `articlegroup` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `description` text NOT NULL,
  `slug` mediumtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `datecreated` datetime NOT NULL,
  `article_order` int(11) NOT NULL DEFAULT 0,
  `staff_article` int(11) NOT NULL DEFAULT 0,
  `question_answers` int(11) DEFAULT 0,
  `file_name` varchar(255) DEFAULT '',
  `curator` varchar(11) DEFAULT '',
  `benchmark` int(11) DEFAULT 0,
  `score` int(11) DEFAULT 0,
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_knowledge_base` */

/*Table structure for table `tblhr_knowledge_base_groups` */

DROP TABLE IF EXISTS `tblhr_knowledge_base_groups`;

CREATE TABLE `tblhr_knowledge_base_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `group_slug` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `group_order` int(11) DEFAULT 0,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_knowledge_base_groups` */

/*Table structure for table `tblhr_list_staff_quitting_work` */

DROP TABLE IF EXISTS `tblhr_list_staff_quitting_work`;

CREATE TABLE `tblhr_list_staff_quitting_work` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) DEFAULT NULL,
  `staff_name` text DEFAULT NULL,
  `department_name` text DEFAULT NULL,
  `role_name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `dateoff` datetime NOT NULL DEFAULT current_timestamp(),
  `approval` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_list_staff_quitting_work` */

/*Table structure for table `tblhr_p_t_form_question_box` */

DROP TABLE IF EXISTS `tblhr_p_t_form_question_box`;

CREATE TABLE `tblhr_p_t_form_question_box` (
  `boxid` int(11) NOT NULL AUTO_INCREMENT,
  `boxtype` varchar(10) NOT NULL,
  `questionid` int(11) NOT NULL,
  PRIMARY KEY (`boxid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_p_t_form_question_box` */

/*Table structure for table `tblhr_p_t_form_question_box_description` */

DROP TABLE IF EXISTS `tblhr_p_t_form_question_box_description`;

CREATE TABLE `tblhr_p_t_form_question_box_description` (
  `questionboxdescriptionid` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `boxid` mediumtext NOT NULL,
  `questionid` int(11) NOT NULL,
  `correct` int(11) DEFAULT 1 COMMENT '0: correct 1: incorrect',
  PRIMARY KEY (`questionboxdescriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_p_t_form_question_box_description` */

/*Table structure for table `tblhr_p_t_form_results` */

DROP TABLE IF EXISTS `tblhr_p_t_form_results`;

CREATE TABLE `tblhr_p_t_form_results` (
  `resultid` int(11) NOT NULL AUTO_INCREMENT,
  `boxid` int(11) NOT NULL,
  `boxdescriptionid` int(11) DEFAULT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `questionid` int(11) NOT NULL,
  `answer` text DEFAULT NULL,
  `resultsetid` int(11) NOT NULL,
  PRIMARY KEY (`resultid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_p_t_form_results` */

/*Table structure for table `tblhr_p_t_surveyresultsets` */

DROP TABLE IF EXISTS `tblhr_p_t_surveyresultsets`;

CREATE TABLE `tblhr_p_t_surveyresultsets` (
  `resultsetid` int(11) NOT NULL AUTO_INCREMENT,
  `trainingid` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `useragent` varchar(150) NOT NULL,
  `date` datetime NOT NULL,
  `staff_id` int(11) unsigned NOT NULL,
  PRIMARY KEY (`resultsetid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_p_t_surveyresultsets` */

/*Table structure for table `tblhr_position_training` */

DROP TABLE IF EXISTS `tblhr_position_training`;

CREATE TABLE `tblhr_position_training` (
  `training_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` mediumtext NOT NULL,
  `training_type` int(11) unsigned NOT NULL,
  `slug` mediumtext NOT NULL,
  `description` text DEFAULT NULL,
  `viewdescription` text DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `redirect_url` varchar(100) DEFAULT NULL,
  `send` tinyint(1) NOT NULL DEFAULT 0,
  `onlyforloggedin` int(11) DEFAULT 0,
  `fromname` varchar(100) DEFAULT NULL,
  `iprestrict` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `hash` varchar(32) NOT NULL,
  `mint_point` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`training_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_position_training` */

/*Table structure for table `tblhr_position_training_question_form` */

DROP TABLE IF EXISTS `tblhr_position_training_question_form`;

CREATE TABLE `tblhr_position_training_question_form` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `question_order` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_position_training_question_form` */

/*Table structure for table `tblhr_procedure_retire` */

DROP TABLE IF EXISTS `tblhr_procedure_retire`;

CREATE TABLE `tblhr_procedure_retire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_name` text DEFAULT NULL,
  `option_name` text DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `people_handle_id` int(11) NOT NULL,
  `procedure_retire_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_procedure_retire` */

/*Table structure for table `tblhr_procedure_retire_manage` */

DROP TABLE IF EXISTS `tblhr_procedure_retire_manage`;

CREATE TABLE `tblhr_procedure_retire_manage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_procedure_retire` text NOT NULL,
  `department` varchar(250) NOT NULL,
  `datecreator` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_procedure_retire_manage` */

/*Table structure for table `tblhr_procedure_retire_of_staff` */

DROP TABLE IF EXISTS `tblhr_procedure_retire_of_staff`;

CREATE TABLE `tblhr_procedure_retire_of_staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) DEFAULT NULL,
  `option_name` text DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `staffid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_procedure_retire_of_staff` */

/*Table structure for table `tblhr_procedure_retire_of_staff_by_id` */

DROP TABLE IF EXISTS `tblhr_procedure_retire_of_staff_by_id`;

CREATE TABLE `tblhr_procedure_retire_of_staff_by_id` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_name` text DEFAULT NULL,
  `people_handle_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_procedure_retire_of_staff_by_id` */

/*Table structure for table `tblhr_profile_option` */

DROP TABLE IF EXISTS `tblhr_profile_option`;

CREATE TABLE `tblhr_profile_option` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_val` longtext DEFAULT NULL,
  `auto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_profile_option` */

insert  into `tblhr_profile_option`(`option_id`,`option_name`,`option_val`,`auto`) values 
(1,'job_position_prefix','#JOB',1),
(2,'job_position_number','1',1),
(3,'contract_code_prefix','#CONTRACT',1),
(4,'contract_code_number','1',1),
(5,'staff_code_prefix','EC',1),
(6,'staff_code_number','1',1);

/*Table structure for table `tblhr_rec_transfer_records` */

DROP TABLE IF EXISTS `tblhr_rec_transfer_records`;

CREATE TABLE `tblhr_rec_transfer_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `staff_identifi` varchar(20) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_rec_transfer_records` */

/*Table structure for table `tblhr_salary_form` */

DROP TABLE IF EXISTS `tblhr_salary_form`;

CREATE TABLE `tblhr_salary_form` (
  `form_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `form_name` varchar(200) NOT NULL,
  `salary_val` decimal(15,2) NOT NULL,
  `tax` tinyint(1) NOT NULL,
  PRIMARY KEY (`form_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_salary_form` */

/*Table structure for table `tblhr_staff_contract` */

DROP TABLE IF EXISTS `tblhr_staff_contract`;

CREATE TABLE `tblhr_staff_contract` (
  `id_contract` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contract_code` varchar(200) NOT NULL,
  `name_contract` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `start_valid` date DEFAULT NULL,
  `end_valid` date DEFAULT NULL,
  `contract_status` varchar(100) DEFAULT NULL,
  `sign_day` date DEFAULT NULL,
  `staff_delegate` int(11) DEFAULT NULL,
  `hourly_or_month` longtext DEFAULT NULL,
  PRIMARY KEY (`id_contract`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_staff_contract` */

/*Table structure for table `tblhr_staff_contract_detail` */

DROP TABLE IF EXISTS `tblhr_staff_contract_detail`;

CREATE TABLE `tblhr_staff_contract_detail` (
  `contract_detail_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staff_contract_id` int(11) unsigned NOT NULL,
  `type` text DEFAULT NULL,
  `rel_type` text DEFAULT NULL,
  `rel_value` decimal(15,2) DEFAULT 0.00,
  `since_date` date DEFAULT NULL,
  `contract_note` text DEFAULT NULL,
  PRIMARY KEY (`contract_detail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_staff_contract_detail` */

/*Table structure for table `tblhr_staff_contract_type` */

DROP TABLE IF EXISTS `tblhr_staff_contract_type`;

CREATE TABLE `tblhr_staff_contract_type` (
  `id_contracttype` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name_contracttype` varchar(200) NOT NULL,
  `description` longtext DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `insurance` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id_contracttype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_staff_contract_type` */

/*Table structure for table `tblhr_training_allocation` */

DROP TABLE IF EXISTS `tblhr_training_allocation`;

CREATE TABLE `tblhr_training_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_process_id` varchar(100) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `training_type` int(11) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `training_name` varchar(150) DEFAULT NULL,
  `jp_interview_training_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_training_allocation` */

/*Table structure for table `tblhr_type_of_trainings` */

DROP TABLE IF EXISTS `tblhr_type_of_trainings`;

CREATE TABLE `tblhr_type_of_trainings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_type_of_trainings` */

insert  into `tblhr_type_of_trainings`(`id`,`name`) values 
(1,'Basic training');

/*Table structure for table `tblhr_views_tracking` */

DROP TABLE IF EXISTS `tblhr_views_tracking`;

CREATE TABLE `tblhr_views_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `view_ip` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_views_tracking` */

/*Table structure for table `tblhr_workplace` */

DROP TABLE IF EXISTS `tblhr_workplace`;

CREATE TABLE `tblhr_workplace` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `workplace_address` varchar(400) DEFAULT NULL,
  `latitude` double DEFAULT NULL,
  `longitude` double DEFAULT NULL,
  `default` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblhr_workplace` */

/*Table structure for table `tblinternal_delivery_note` */

DROP TABLE IF EXISTS `tblinternal_delivery_note`;

CREATE TABLE `tblinternal_delivery_note` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `internal_delivery_name` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `date_c` date DEFAULT NULL,
  `date_add` date DEFAULT NULL,
  `internal_delivery_code` varchar(100) DEFAULT NULL,
  `approval` int(11) DEFAULT 0 COMMENT 'status approval ',
  `addedfrom` int(11) DEFAULT NULL,
  `total_amount` decimal(15,2) DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblinternal_delivery_note` */

/*Table structure for table `tblinternal_delivery_note_detail` */

DROP TABLE IF EXISTS `tblinternal_delivery_note_detail`;

CREATE TABLE `tblinternal_delivery_note_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `internal_delivery_id` int(11) NOT NULL,
  `commodity_code` varchar(100) DEFAULT NULL,
  `from_stock_name` text DEFAULT NULL,
  `to_stock_name` text DEFAULT NULL,
  `unit_id` text DEFAULT NULL,
  `available_quantity` text DEFAULT NULL,
  `quantities` text DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `into_money` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblinternal_delivery_note_detail` */

/*Table structure for table `tblinventory_commodity_min` */

DROP TABLE IF EXISTS `tblinventory_commodity_min`;

CREATE TABLE `tblinventory_commodity_min` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commodity_id` int(11) NOT NULL,
  `commodity_code` varchar(100) DEFAULT NULL,
  `commodity_name` varchar(100) DEFAULT NULL,
  `inventory_number_min` varchar(100) DEFAULT NULL,
  `inventory_number_max` varchar(100) DEFAULT '0',
  PRIMARY KEY (`id`,`commodity_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `tblinventory_commodity_min` */

insert  into `tblinventory_commodity_min`(`id`,`commodity_id`,`commodity_code`,`commodity_name`,`inventory_number_min`,`inventory_number_max`) values 
(14,14,'3C4NJCAB6LT135740  Jeep Compass','Jeep Compass','0','0'),
(15,15,'1C4HJXDG7KW503346  Jeep Wrangler','Jeep Wrangler','0','0'),
(16,16,'JM1NDAM75L0414984  Mazda MX-5 Miata RF','Mazda MX-5 Miata RF','0','0');

/*Table structure for table `tblinventory_manage` */

DROP TABLE IF EXISTS `tblinventory_manage`;

CREATE TABLE `tblinventory_manage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_id` int(11) NOT NULL,
  `commodity_id` int(11) NOT NULL,
  `inventory_number` varchar(100) DEFAULT NULL,
  `date_manufacture` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `lot_number` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`,`commodity_id`,`warehouse_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblinventory_manage` */

/*Table structure for table `tblinvoicepaymentrecords` */

DROP TABLE IF EXISTS `tblinvoicepaymentrecords`;

CREATE TABLE `tblinvoicepaymentrecords` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `invoiceid` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` varchar(40) DEFAULT NULL,
  `paymentmethod` varchar(191) DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text DEFAULT NULL,
  `transactionid` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `invoiceid` (`invoiceid`),
  KEY `paymentmethod` (`paymentmethod`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblinvoicepaymentrecords` */

/*Table structure for table `tblinvoices` */

DROP TABLE IF EXISTS `tblinvoices`;

CREATE TABLE `tblinvoices` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `clientid` int(11) NOT NULL,
  `deleted_customer_name` varchar(100) DEFAULT NULL,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `status` int(11) DEFAULT 1,
  `clientnote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `last_overdue_reminder` date DEFAULT NULL,
  `last_due_reminder` date DEFAULT NULL,
  `cancel_overdue_reminders` int(11) NOT NULL DEFAULT 0,
  `allowed_payment_modes` mediumtext DEFAULT NULL,
  `token` mediumtext DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) NOT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT 0,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `is_recurring_from` int(11) DEFAULT NULL,
  `last_recurring_date` date DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `sale_agent` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_invoice` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `project_id` int(11) DEFAULT 0,
  `subscription_id` int(11) NOT NULL DEFAULT 0,
  `short_link` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `currency` (`currency`),
  KEY `clientid` (`clientid`),
  KEY `project_id` (`project_id`),
  KEY `sale_agent` (`sale_agent`),
  KEY `total` (`total`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblinvoices` */

/*Table structure for table `tblitem_tax` */

DROP TABLE IF EXISTS `tblitem_tax`;

CREATE TABLE `tblitem_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `itemid` int(11) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  `taxname` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `itemid` (`itemid`),
  KEY `rel_id` (`rel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblitem_tax` */

/*Table structure for table `tblitemable` */

DROP TABLE IF EXISTS `tblitemable`;

CREATE TABLE `tblitemable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `description` mediumtext NOT NULL,
  `long_description` mediumtext DEFAULT NULL,
  `qty` decimal(15,2) NOT NULL,
  `rate` decimal(15,2) NOT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `item_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `qty` (`qty`),
  KEY `rate` (`rate`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tblitemable` */

insert  into `tblitemable`(`id`,`rel_id`,`rel_type`,`description`,`long_description`,`qty`,`rate`,`unit`,`item_order`) values 
(1,1,'proposal','Test','Test',1.00,140.00,'',1),
(2,2,'proposal','Mazda MX-5 Miata RF','VIN : JM1NDAM75L0414984 Make : Mazda Model : MX-5 Miata RF Year : 2020 Transmission : Automatic Engine : 2.0-L L-4 DOHC 16V Fuel : Regular<br />\r\n-Inv-16',1.00,16000.00,'',1),
(4,3,'proposal','Mazda MX-5 Miata RF','VIN : JM1NDAM75L0414984 <br />Make : Mazda <br />Model : MX-5 Miata RF Year : 2020 Transmission : Automatic Engine : 2.0-L L-4 DOHC 16V Fuel : Regular Mileage : 26 miles/gallon<br />\r\n-Inv-16',1.00,16000.00,'',1),
(5,4,'proposal','Mazda MX-5 Miata RF','<p>VIN : JM1NDAM75L0414984<br />\r\nMake : Mazda<br />\r\nModel : MX-5 Miata RF<br />\r\nYear : 2020<br />\r\nTransmission : Automatic<br />\r\nEngine : 2.0-L L-4 DOHC 16V<br />\r\nFuel : Regular<br />\r\nMileage : 26 miles/gallon</p><br />\r\n-Inv-16',1.00,16000.00,'',1);

/*Table structure for table `tblitems` */

DROP TABLE IF EXISTS `tblitems`;

CREATE TABLE `tblitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `long_description` text DEFAULT NULL,
  `rate` decimal(15,2) NOT NULL,
  `tax` int(11) DEFAULT NULL,
  `tax2` int(11) DEFAULT NULL,
  `unit` varchar(40) DEFAULT NULL,
  `group_id` int(11) NOT NULL DEFAULT 0,
  `commodity_code` varchar(100) NOT NULL,
  `commodity_barcode` text DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `sku_code` varchar(200) DEFAULT NULL,
  `sku_name` varchar(200) DEFAULT NULL,
  `purchase_price` decimal(15,2) DEFAULT NULL,
  `sub_group` varchar(200) DEFAULT NULL,
  `commodity_type` int(11) DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `origin` varchar(100) DEFAULT NULL,
  `color_id` int(11) DEFAULT NULL,
  `style_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `size_id` int(11) DEFAULT NULL,
  `commodity_name` varchar(200) NOT NULL,
  `color` text DEFAULT NULL,
  `guarantee` text DEFAULT NULL,
  `profif_ratio` text DEFAULT NULL,
  `active` int(11) DEFAULT 1,
  `long_descriptions` longtext DEFAULT NULL,
  `without_checking_warehouse` int(11) DEFAULT 1,
  `series_id` text DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `attributes` longtext DEFAULT NULL,
  `parent_attributes` longtext DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tax` (`tax`),
  KEY `tax2` (`tax2`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `tblitems` */

insert  into `tblitems`(`id`,`description`,`long_description`,`rate`,`tax`,`tax2`,`unit`,`group_id`,`commodity_code`,`commodity_barcode`,`unit_id`,`sku_code`,`sku_name`,`purchase_price`,`sub_group`,`commodity_type`,`warehouse_id`,`origin`,`color_id`,`style_id`,`model_id`,`size_id`,`commodity_name`,`color`,`guarantee`,`profif_ratio`,`active`,`long_descriptions`,`without_checking_warehouse`,`series_id`,`parent_id`,`attributes`,`parent_attributes`) values 
(14,'Jeep Compass','',15000.00,0,NULL,NULL,1,'3C4NJCAB6LT135740  Jeep Compass','3C4NJCAB6LT135740',1,'3C4NJCAB6LT135740','Jeep Compass',12000.00,'',1,1,'',NULL,0,0,0,'','','','25',1,'',0,NULL,0,NULL,'[]'),
(15,'Jeep Wrangler','<p>1C4HJXDG7KW503346 Jeep Wrangler</p>',15000.00,0,NULL,NULL,1,'1C4HJXDG7KW503346  Jeep Wrangler','1C4HJXDG7KW503346',1,'1C4HJXDG7KW503346','Jeep Wrangler',12000.00,'',1,1,'',NULL,0,0,0,'','','','25',1,'<p>1C4HJXDG7KW503346 Jeep Wrangler</p>',0,NULL,0,NULL,'[]'),
(16,'Mazda MX-5 Miata RF','<p>VIN : JM1NDAM75L0414984<br>Make : Mazda<br>Model : MX-5 Miata RF<br>Year : 2020<br>Transmission : Automatic<br>Engine : 2.0-L L-4 DOHC 16V<br>Fuel : Regular<br>Mileage : 26 miles/gallon</p>',16000.00,0,NULL,NULL,1,'JM1NDAM75L0414984  Mazda MX-5 Miata RF','JM1NDAM75L0414984',1,'JM1NDAM75L0414984','Mazda MX-5 Miata RF',14000.00,'',1,1,'',NULL,0,0,0,'','','','14.28571428571428',1,'<p>VIN : JM1NDAM75L0414984<br />Make : Mazda<br />Model : MX-5 Miata RF<br />Year : 2020<br />Transmission : Automatic<br />Engine : 2.0-L L-4 DOHC 16V<br />Fuel : Regular<br />Mileage : 26 miles/gallon</p>',0,NULL,0,NULL,'[]');

/*Table structure for table `tblitems_groups` */

DROP TABLE IF EXISTS `tblitems_groups`;

CREATE TABLE `tblitems_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `commodity_group_code` varchar(100) DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tblitems_groups` */

insert  into `tblitems_groups`(`id`,`name`,`commodity_group_code`,`order`,`display`,`note`) values 
(1,'Vehicle','VH',0,1,'0'),
(2,'Value Added Services','VAS',0,1,'0'),
(3,'Parts',NULL,NULL,NULL,NULL);

/*Table structure for table `tblknowedge_base_article_feedback` */

DROP TABLE IF EXISTS `tblknowedge_base_article_feedback`;

CREATE TABLE `tblknowedge_base_article_feedback` (
  `articleanswerid` int(11) NOT NULL AUTO_INCREMENT,
  `articleid` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `ip` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`articleanswerid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblknowedge_base_article_feedback` */

/*Table structure for table `tblknowledge_base` */

DROP TABLE IF EXISTS `tblknowledge_base`;

CREATE TABLE `tblknowledge_base` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `articlegroup` int(11) NOT NULL,
  `subject` mediumtext NOT NULL,
  `description` text NOT NULL,
  `slug` mediumtext NOT NULL,
  `active` tinyint(4) NOT NULL,
  `datecreated` datetime NOT NULL,
  `article_order` int(11) NOT NULL DEFAULT 0,
  `staff_article` int(11) NOT NULL DEFAULT 0,
  `question_answers` int(11) DEFAULT 0,
  `file_name` varchar(255) DEFAULT '',
  `curator` varchar(11) DEFAULT '',
  `benchmark` int(11) DEFAULT 0,
  `score` int(11) DEFAULT 0,
  PRIMARY KEY (`articleid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblknowledge_base` */

/*Table structure for table `tblknowledge_base_groups` */

DROP TABLE IF EXISTS `tblknowledge_base_groups`;

CREATE TABLE `tblknowledge_base_groups` (
  `groupid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `group_slug` text DEFAULT NULL,
  `description` mediumtext DEFAULT NULL,
  `active` tinyint(4) NOT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `group_order` int(11) DEFAULT 0,
  PRIMARY KEY (`groupid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblknowledge_base_groups` */

/*Table structure for table `tbllead_activity_log` */

DROP TABLE IF EXISTS `tbllead_activity_log`;

CREATE TABLE `tbllead_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `leadid` int(11) NOT NULL,
  `description` mediumtext NOT NULL,
  `additional_data` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `staffid` int(11) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `custom_activity` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tbllead_activity_log` */

insert  into `tbllead_activity_log`(`id`,`leadid`,`description`,`additional_data`,`date`,`staffid`,`full_name`,`custom_activity`) values 
(1,449,'not_lead_activity_created_proposal','a:1:{i:0;s:98:\"<a href=\"http://localhost/demo/able-crm/admin/proposals/list_proposals/1\" target=\"_blank\">Test</a>\";}','2022-11-28 19:38:32',1,'Kirti Kumar',0),
(2,228,'not_lead_activity_created_proposal','a:1:{i:0;s:117:\"<a href=\"http://localhost/clients/cgs/dms/admin/proposals/list_proposals/2\" target=\"_blank\">hello test ableittech</a>\";}','2023-01-03 21:37:31',1,'Kirti Kumar',0),
(3,228,'not_lead_activity_created_proposal','a:1:{i:0;s:106:\"<a href=\"http://localhost/clients/cgs/dms/admin/proposals/list_proposals/3\" target=\"_blank\">Test Drive</a>\";}','2023-01-03 21:56:51',1,'Kirti Kumar',0),
(4,228,'not_lead_activity_created_proposal','a:1:{i:0;s:109:\"<a href=\"http://localhost/clients/cgs/dms/admin/proposals/list_proposals/4\" target=\"_blank\">Car Insurance</a>\";}','2023-01-03 22:10:31',1,'Kirti Kumar',0);

/*Table structure for table `tbllead_integration_emails` */

DROP TABLE IF EXISTS `tbllead_integration_emails`;

CREATE TABLE `tbllead_integration_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` mediumtext DEFAULT NULL,
  `body` mediumtext DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `leadid` int(11) NOT NULL,
  `emailid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbllead_integration_emails` */

/*Table structure for table `tblleads` */

DROP TABLE IF EXISTS `tblleads`;

CREATE TABLE `tblleads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hash` varchar(65) DEFAULT NULL,
  `name` varchar(191) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `company` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 0,
  `zip` varchar(15) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `assigned` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL,
  `from_form_id` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL,
  `source` int(11) NOT NULL,
  `lastcontact` datetime DEFAULT NULL,
  `dateassigned` date DEFAULT NULL,
  `last_status_change` datetime DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `leadorder` int(11) DEFAULT 1,
  `phonenumber` varchar(50) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `lost` tinyint(1) NOT NULL DEFAULT 0,
  `junk` int(11) NOT NULL DEFAULT 0,
  `last_lead_status` int(11) NOT NULL DEFAULT 0,
  `is_imported_from_email_integration` tinyint(1) NOT NULL DEFAULT 0,
  `email_integration_uid` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `default_language` varchar(40) DEFAULT NULL,
  `client_id` int(11) NOT NULL DEFAULT 0,
  `lead_value` decimal(15,2) DEFAULT NULL,
  `vat` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`),
  KEY `company` (`company`),
  KEY `email` (`email`),
  KEY `assigned` (`assigned`),
  KEY `status` (`status`),
  KEY `source` (`source`),
  KEY `lastcontact` (`lastcontact`),
  KEY `dateadded` (`dateadded`),
  KEY `leadorder` (`leadorder`),
  KEY `from_form_id` (`from_form_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1001 DEFAULT CHARSET=utf8;

/*Data for the table `tblleads` */

insert  into `tblleads`(`id`,`hash`,`name`,`title`,`company`,`description`,`country`,`zip`,`city`,`state`,`address`,`assigned`,`dateadded`,`from_form_id`,`status`,`source`,`lastcontact`,`dateassigned`,`last_status_change`,`addedfrom`,`email`,`website`,`leadorder`,`phonenumber`,`date_converted`,`lost`,`junk`,`last_lead_status`,`is_imported_from_email_integration`,`email_integration_uid`,`is_public`,`default_language`,`client_id`,`lead_value`,`vat`) values 
(1,NULL,'Babara','bkleinerman0','Kleinerman','InnoZ',236,'19178','Philadelphia','Pennsylvania','3 Stuart Place',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bkleinerman0@globo.com','hatena.ne.jp',1,'2151084934',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(2,NULL,'Phylys','pbehning1','Behning','Brainsphere',236,'85383','Peoria','Arizona','73340 Artisan Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pbehning1@usatoday.com','discuz.net',1,'6021626443',NULL,0,0,0,0,NULL,0,NULL,0,58.00,NULL),
(3,NULL,'Rozamond','rstening2','Stening','Innojam',236,'80241','Denver','Colorado','577 Fuller Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'rstening2@alibaba.com','liveinternet.ru',1,'7201950519',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(4,NULL,'Matias','mtomsa3','Tomsa','Fliptune',236,'55565','Monticello','Minnesota','98 Elgar Hill',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mtomsa3@oakley.com','facebook.com',1,'7631098927',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(5,NULL,'Bernardina','bfrogley4','Frogley','Yotz',236,'21275','Baltimore','Maryland','19889 Monterey Place',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bfrogley4@ca.gov','scribd.com',1,'4106802763',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(6,NULL,'Paula','pscard5','Scard','Oloo',236,'70607','Lake Charles','Louisiana','657 Steensland Court',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pscard5@dailymotion.com','issuu.com',1,'3377579122',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(7,NULL,'Katti','kmarklow6','Marklow','Fivebridge',236,'20470','Washington','District of Columbia','23 Kedzie Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'kmarklow6@phoca.cz','g.co',1,'2027567150',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(8,NULL,'Zelig','zbrenneke7','Brenneke','Jabbersphere',236,'85005','Phoenix','Arizona','415 Acker Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'zbrenneke7@tuttocitta.it','github.com',1,'6024061325',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(9,NULL,'Benjie','blavin8','Lavin','Devshare',236,'10029','New York City','New York','4326 Northview Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'blavin8@dmoz.org','apple.com',1,'9174688263',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(10,NULL,'Tilda','tsauvain9','Sauvain','Quire',236,'6825','Fairfield','Connecticut','38324 Kingsford Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tsauvain9@furl.net','cornell.edu',1,'2039233103',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(11,NULL,'Jeramie','jflavertya','Flaverty','Quinu',236,'60681','Chicago','Illinois','6462 Blue Bill Park Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jflavertya@google.es','nps.gov',1,'3126115823',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(12,NULL,'Othilie','ochengb','Cheng','Dabvine',236,'33462','Lake Worth','Florida','75 Holy Cross Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ochengb@mozilla.org','go.com',1,'5617565264',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(13,NULL,'Hannis','hpadgintonc','Padginton','Twitterbeat',236,'98158','Seattle','Washington','7 Hovde Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hpadgintonc@mapy.cz','mlb.com',1,'2069987750',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(14,NULL,'Adelbert','agermand','German','Thoughtsphere',236,'35244','Birmingham','Alabama','1 Hudson Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'agermand@people.com.cn','jimdo.com',1,'2055339519',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(15,NULL,'Lester','lismirniogloue','Ismirnioglou','Thoughtbridge',236,'96825','Honolulu','Hawaii','33 Hansons Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lismirniogloue@tiny.cc','prnewswire.com',1,'8087899805',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(16,NULL,'Thedrick','tdikef','Dike','Quatz',236,'44310','Akron','Ohio','529 Harbort Court',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tdikef@state.tx.us','webnode.com',1,'3309435434',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(17,NULL,'Urbanus','utolandg','Toland','Chatterbridge',236,'90189','Los Angeles','California','96 Pearson Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'utolandg@aboutads.info','biglobe.ne.jp',1,'2133602568',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(18,NULL,'Zulema','zbroomfieldh','Broomfield','Dabvine',236,'91841','Alhambra','California','2136 Anzinger Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'zbroomfieldh@rakuten.co.jp','chronoengine.com',1,'6262397561',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(19,NULL,'Hana','hlemoni','Lemon','Vinte',236,'98442','Tacoma','Washington','300 Armistice Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hlemoni@rakuten.co.jp','constantcontact.com',1,'2534190827',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(20,NULL,'Enos','ephillippsj','Phillipps','Flashpoint',236,'92153','San Diego','California','8 Onsgard Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ephillippsj@altervista.org','tinypic.com',1,'6195538853',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(21,NULL,'North','nbrogdenk','Brogden','Wikizz',236,'34620','Clearwater','Florida','06 Grim Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'nbrogdenk@ucoz.com','fema.gov',1,'7278612661',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(22,NULL,'Brett','brussel','Russe','Thoughtstorm',236,'40576','Lexington','Kentucky','7 Harbort Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'brussel@shop-pro.jp','latimes.com',1,'8594189709',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(23,NULL,'Venita','vstationm','Station','Zoozzy',236,'93750','Fresno','California','6 Dayton Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'vstationm@pagesperso-orange.fr','bloglines.com',1,'5598899878',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(24,NULL,'Megen','mpointn','Point','Skipstorm',236,'25336','Charleston','West Virginia','27253 Norway Maple Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mpointn@biblegateway.com','miibeian.gov.cn',1,'3043264593',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(25,NULL,'Jewel','jpostano','Postan','Yozio',236,'32627','Gainesville','Florida','7872 Elgar Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jpostano@google.ca','patch.com',1,'3528406796',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(26,NULL,'Raleigh','rbaggallyp','Baggally','Voonyx',236,'44485','Warren','Ohio','82903 Schiller Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'rbaggallyp@wikipedia.org','cam.ac.uk',1,'3302623741',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(27,NULL,'Shadow','shuguesq','Hugues','Divanoodle',236,'28220','Charlotte','North Carolina','0057 Dawn Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'shuguesq@usda.gov','tiny.cc',1,'7041388357',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(28,NULL,'Mordecai','mpencottr','Pencott','Edgepulse',236,'6859','Norwalk','Connecticut','941 Pearson Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mpencottr@skype.com','cisco.com',1,'2035551595',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(29,NULL,'Rhodia','rronaldsons','Ronaldson','Jaxspan',236,'88006','Las Cruces','New Mexico','745 Dapin Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'rronaldsons@hao123.com','huffingtonpost.com',1,'5057226453',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(30,NULL,'Lia','lcockaymet','Cockayme','Devshare',236,'72199','North Little Rock','Arkansas','1 Schurz Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lcockaymet@clickbank.net','examiner.com',1,'5017966276',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(31,NULL,'Jone','jfostersmithu','Foster-Smith','Tagpad',236,'19178','Philadelphia','Pennsylvania','263 Spenser Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jfostersmithu@booking.com','usgs.gov',1,'2156096106',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(32,NULL,'Amandy','apeacockev','Peacocke','Fadeo',236,'7544','Paterson','New Jersey','000 3rd Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'apeacockev@discovery.com','e-recht24.de',1,'8621875006',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(33,NULL,'Ardyth','akynseyw','Kynsey','Realpoint',236,'47719','Evansville','Indiana','3 Monica Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'akynseyw@tamu.edu','zdnet.com',1,'8122233069',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(34,NULL,'Dinah','ddudleyx','Dudley','Miboo',236,'76198','Fort Worth','Texas','0 Havey Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ddudleyx@accuweather.com','time.com',1,'6829002808',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(35,NULL,'Catherine','cwrenchy','Wrench','Voomm',236,'36689','Mobile','Alabama','702 Kingsford Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cwrenchy@howstuffworks.com','ehow.com',1,'2519621052',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(36,NULL,'Johny','jborthez','Borthe','Demizz',236,'7522','Paterson','New Jersey','83688 Oak Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jborthez@gnu.org','ifeng.com',1,'2013592216',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(37,NULL,'Haleigh','hmeaders10','Meaders','Rhyzio',236,'76110','Fort Worth','Texas','4 Columbus Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hmeaders10@statcounter.com','narod.ru',1,'6826947354',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(38,NULL,'Molli','mtrout11','Trout','Skyba',236,'91520','Burbank','California','21 Lakewood Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mtrout11@gizmodo.com','chicagotribune.com',1,'6611513223',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(39,NULL,'Noel','nlounds12','Lounds','Digitube',236,'15220','Pittsburgh','Pennsylvania','216 5th Junction',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'nlounds12@baidu.com','home.pl',1,'4123282354',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(40,NULL,'Sylas','ssharply13','Sharply','Babbleopia',236,'7310','Jersey City','New Jersey','077 Charing Cross Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ssharply13@hostgator.com','hatena.ne.jp',1,'5514137650',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(41,NULL,'Blake','bbazell14','Bazell','Kazu',236,'85260','Scottsdale','Arizona','2 Summer Ridge Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bbazell14@telegraph.co.uk','clickbank.net',1,'6239773553',NULL,0,0,0,0,NULL,0,NULL,0,96.00,NULL),
(42,NULL,'Brnaby','boattes15','Oattes','Yodoo',236,'46278','Indianapolis','Indiana','24 Quincy Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'boattes15@ucla.edu','answers.com',1,'3172237028',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(43,NULL,'Anetta','aizakson16','Izakson','Layo',236,'30368','Atlanta','Georgia','0 Lake View Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'aizakson16@goo.gl','sogou.com',1,'4048562031',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(44,NULL,'Eric','eflear17','Flear','Gabcube',236,'75265','Dallas','Texas','3158 Namekagon Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'eflear17@twitter.com','yahoo.com',1,'2148724849',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(45,NULL,'Else','ewhitebrook18','Whitebrook','Ailane',236,'1813','Woburn','Massachusetts','84 Morningstar Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ewhitebrook18@hugedomains.com','forbes.com',1,'3391057163',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(46,NULL,'Janna','jheersma19','Heersma','Jabbersphere',236,'79105','Amarillo','Texas','24 Ridgeway Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jheersma19@symantec.com','storify.com',1,'8065149187',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(47,NULL,'Myer','mtwelves1a','Twelves','Meemm',236,'34949','Fort Pierce','Florida','98 Welch Court',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mtwelves1a@deliciousdays.com','google.cn',1,'7721547484',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(48,NULL,'Staford','stanswell1b','Tanswell','Yacero',236,'79171','Amarillo','Texas','31 Oakridge Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'stanswell1b@berkeley.edu','com.com',1,'8065049203',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(49,NULL,'Nealon','ncristou1c','Cristou','Zoomzone',236,'22096','Reston','Virginia','6804 Chinook Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ncristou1c@xing.com','disqus.com',1,'5714801574',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(50,NULL,'Bern','bgyngyll1d','Gyngyll','Jabberstorm',236,'96805','Honolulu','Hawaii','05000 Main Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bgyngyll1d@facebook.com','lulu.com',1,'8089234304',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(51,NULL,'Quintin','qdelleschi1e','Delleschi','Skipfire',236,'34643','Largo','Florida','77 Hermina Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'qdelleschi1e@indiatimes.com','blogs.com',1,'7274423664',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(52,NULL,'Jeanine','jlahrs1f','Lahrs','Quinu',236,'94159','San Francisco','California','054 Del Sol Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jlahrs1f@ow.ly','t-online.de',1,'4159021344',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(53,NULL,'Hazlett','hyakovlev1g','Yakovlev','Twinder',236,'90840','Long Beach','California','13436 Longview Court',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hyakovlev1g@topsy.com','liveinternet.ru',1,'5622206650',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(54,NULL,'Marji','mpolding1h','Polding','Mydeo',236,'2114','Boston','Massachusetts','79 Lakewood Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mpolding1h@about.com','pcworld.com',1,'5086462473',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(55,NULL,'Pryce','pescalante1i','Escalante','Ntag',236,'29605','Greenville','South Carolina','6 Sherman Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pescalante1i@tripod.com','prnewswire.com',1,'8648071921',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(56,NULL,'Gothart','ghundy1j','Hundy','Linktype',236,'26505','Morgantown','West Virginia','748 Hoard Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ghundy1j@hud.gov','cdc.gov',1,'3043782947',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(57,NULL,'Hugues','hparchment1k','Parchment','Yotz',236,'28299','Charlotte','North Carolina','82776 Upham Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hparchment1k@oracle.com','reddit.com',1,'7045502494',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(58,NULL,'Ileane','iboar1l','Boar','Jamia',236,'90040','Los Angeles','California','0 Corben Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'iboar1l@mac.com','plala.or.jp',1,'7149774123',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(59,NULL,'Bessie','bziemsen1m','Ziemsen','Twitterworks',236,'20189','Dulles','Virginia','47888 Gale Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bziemsen1m@samsung.com','weibo.com',1,'5719921395',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(60,NULL,'Klarika','kmctrustey1n','McTrustey','Trilith',236,'70179','New Orleans','Louisiana','4 Superior Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'kmctrustey1n@pagesperso-orange.fr','washington.edu',1,'5043088357',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(61,NULL,'Pembroke','pzini1o','Zini','Youspan',236,'85710','Tucson','Arizona','0667 Barnett Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pzini1o@icio.us','liveinternet.ru',1,'5205512743',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(62,NULL,'Jen','jboays1p','Boays','Realblab',236,'32225','Jacksonville','Florida','0 Mockingbird Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jboays1p@smh.com.au','youtube.com',1,'9046620573',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(63,NULL,'Wilhelmina','wserle1q','Serle','InnoZ',236,'83732','Boise','Idaho','3 Logan Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'wserle1q@china.com.cn','behance.net',1,'2086015300',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(64,NULL,'Phillis','pmacallen1r','MacAllen','Wordware',236,'33731','Saint Petersburg','Florida','780 7th Hill',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pmacallen1r@squarespace.com','guardian.co.uk',1,'7273151265',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(65,NULL,'Desiri','dantonich1s','Antonich','Tagtune',236,'67210','Wichita','Kansas','8135 Scott Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dantonich1s@nba.com','adobe.com',1,'3165392002',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(66,NULL,'Horace','hmccafferky1t','McCafferky','Meevee',236,'10120','New York City','New York','67762 Cordelia Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hmccafferky1t@vimeo.com','youtu.be',1,'2124614569',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(67,NULL,'Nettie','nolsen1u','Olsen','Skynoodle',236,'46862','Fort Wayne','Indiana','103 Pierstorff Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'nolsen1u@cam.ac.uk','addthis.com',1,'2608147451',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(68,NULL,'Terra','tweich1v','Weich','Livepath',236,'23225','Richmond','Virginia','05586 Sachs Place',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tweich1v@wired.com','scientificamerican.com',1,'7572060227',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(69,NULL,'Guillaume','ggrinnell1w','Grinnell','Yotz',236,'18514','Scranton','Pennsylvania','8522 Ridgeview Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ggrinnell1w@usgs.gov','omniture.com',1,'5708823979',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(70,NULL,'Timmie','tstrasse1x','Strasse','Riffpedia',236,'79710','Midland','Texas','108 Rigney Hill',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tstrasse1x@timesonline.co.uk','360.cn',1,'4324707353',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(71,NULL,'Ninetta','nknapp1y','Knapp','Kare',236,'33075','Pompano Beach','Florida','51 Claremont Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'nknapp1y@uiuc.edu','reuters.com',1,'7547779059',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(72,NULL,'Bren','bdejuares1z','de Juares','Omba',236,'41905','Migrate','Kentucky','209 David Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bdejuares1z@163.com','acquirethisname.com',1,'5028677421',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(73,NULL,'Bette','bfortnon20','Fortnon','Yakitri',236,'30610','Athens','Georgia','31433 Pearson Hill',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bfortnon20@desdev.cn','ifeng.com',1,'7062804602',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(74,NULL,'Anabella','awherry21','Wherry','Browsebug',236,'78235','San Antonio','Texas','586 Starling Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'awherry21@europa.eu','photobucket.com',1,'2108893014',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(75,NULL,'Loree','lgatchell22','Gatchell','Camido',236,'67236','Wichita','Kansas','602 Rutledge Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lgatchell22@simplemachines.org','furl.net',1,'3161607411',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(76,NULL,'Libbie','ldutson23','Dutson','Chatterbridge',236,'78410','Corpus Christi','Texas','06 Dottie Alley',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ldutson23@bbb.org','booking.com',1,'3618507534',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(77,NULL,'Blithe','bdubois24','Dubois','Aibox',236,'32808','Orlando','Florida','3533 Pepper Wood Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bdubois24@vistaprint.com','cnet.com',1,'3215220282',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(78,NULL,'Johannah','jcato25','Cato','Pixope',236,'29615','Greenville','South Carolina','833 Lunder Drive',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jcato25@webmd.com','home.pl',1,'8645780775',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(79,NULL,'Pooh','pyakov26','Yakov','Eire',236,'78225','San Antonio','Texas','451 Larry Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pyakov26@hubpages.com','soup.io',1,'2106068680',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(80,NULL,'Hewet','hbreem27','Breem','Eabox',236,'12205','Albany','New York','21 Dryden Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hbreem27@instagram.com','yolasite.com',1,'5185253753',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(81,NULL,'Lydia','lfowle28','Fowle','Gevee',236,'93715','Fresno','California','2450 Melody Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lfowle28@ibm.com','google.com',1,'5598585207',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(82,NULL,'Cirilo','cowbrick29','Owbrick','Twitterwire',236,'11470','Jamaica','New York','36 Ruskin Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cowbrick29@shinystat.com','epa.gov',1,'7182502770',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(83,NULL,'Jessamyn','jpourvoieur2a','Pourvoieur','Bluejam',236,'70005','Metairie','Louisiana','0 Everett Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jpourvoieur2a@examiner.com','archive.org',1,'5046204513',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(84,NULL,'Jemie','jitshak2b','Itshak','Jabbersphere',236,'90405','Santa Monica','California','1 Pleasure Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jitshak2b@ebay.com','shop-pro.jp',1,'3104193515',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(85,NULL,'Ricki','rscipsey2c','Scipsey','Jaxnation',236,'89436','Sparks','Nevada','62 Kensington Place',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'rscipsey2c@cbc.ca','nymag.com',1,'7759828405',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(86,NULL,'Jorge','jtipping2d','Tipping','Wordpedia',236,'6510','New Haven','Connecticut','4 Delaware Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jtipping2d@webnode.com','hud.gov',1,'2032701607',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(87,NULL,'Stephanie','sguly2e','Guly','Skivee',236,'75710','Tyler','Texas','69 Superior Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'sguly2e@wikipedia.org','arstechnica.com',1,'9035499362',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(88,NULL,'Cyb','cclemerson2f','Clemerson','Gabtune',236,'75210','Dallas','Texas','46928 Springs Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cclemerson2f@paypal.com','tinyurl.com',1,'4692820177',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(89,NULL,'Candida','cstuckley2g','Stuckley','Skimia',236,'60674','Chicago','Illinois','42 Haas Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cstuckley2g@mapy.cz','businessinsider.com',1,'3127298802',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(90,NULL,'Link','lpaolone2h','Paolone','JumpXS',236,'6854','Norwalk','Connecticut','0717 Huxley Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lpaolone2h@samsung.com','scientificamerican.com',1,'2036551784',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(91,NULL,'Mozelle','mkynston2i','Kynston','Yoveo',236,'80920','Colorado Springs','Colorado','712 Arapahoe Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mkynston2i@so-net.ne.jp','about.com',1,'7197955823',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(92,NULL,'Angele','atuther2j','Tuther','Yacero',236,'89036','North Las Vegas','Nevada','271 Manley Alley',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'atuther2j@yahoo.co.jp','163.com',1,'7025004900',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(93,NULL,'Dallas','dsoldi2k','Soldi','Realcube',236,'66205','Shawnee Mission','Kansas','4533 Golden Leaf Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dsoldi2k@prweb.com','domainmarket.com',1,'8169878747',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(94,NULL,'Jayne','jdivina2l','Divina','Tazzy',236,'75367','Dallas','Texas','6007 Stone Corner Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jdivina2l@tamu.edu','google.de',1,'2145787522',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(95,NULL,'Davis','drapa2m','Rapa','Devpulse',236,'37131','Murfreesboro','Tennessee','3076 Basil Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'drapa2m@state.gov','house.gov',1,'6151307231',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(96,NULL,'Saba','schitter2n','Chitter','Tagtune',236,'85045','Phoenix','Arizona','2642 Stang Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'schitter2n@cnn.com','macromedia.com',1,'4801125219',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(97,NULL,'Diandra','dwhiteoak2o','Whiteoak','Skyndu',236,'19605','Reading','Pennsylvania','28 Del Mar Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dwhiteoak2o@nydailynews.com','shutterfly.com',1,'4843510926',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(98,NULL,'Frieda','fbrogan2p','Brogan','Shuffledrive',236,'92825','Anaheim','California','62900 Ronald Regan Junction',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'fbrogan2p@vinaora.com','nba.com',1,'7146308646',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(99,NULL,'Debi','dhartzogs2q','Hartzogs','Photojam',236,'45419','Dayton','Ohio','96618 Reindahl Junction',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dhartzogs2q@mayoclinic.com','sourceforge.net',1,'5139757777',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(100,NULL,'Lilith','lhaslam2r','Haslam','Gigazoom',236,'80235','Denver','Colorado','100 Dixon Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lhaslam2r@gizmodo.com','weibo.com',1,'3031484798',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(101,NULL,'Zerk','zashbrook2s','Ashbrook','Plambee',236,'19605','Reading','Pennsylvania','8 Roxbury Court',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'zashbrook2s@narod.ru','ftc.gov',1,'4845543131',NULL,0,0,0,0,NULL,0,NULL,0,97.00,NULL),
(102,NULL,'Ichabod','ijoll2t','Joll','Oyope',236,'7505','Paterson','New Jersey','1489 Old Gate Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ijoll2t@craigslist.org','constantcontact.com',1,'8627448974',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(103,NULL,'Saw','sasmus2u','Asmus','Chatterbridge',236,'12205','Albany','New York','019 Oriole Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'sasmus2u@shutterfly.com','w3.org',1,'5189615325',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(104,NULL,'Gae','gcuthbert2v','Cuthbert','Tagchat',236,'40250','Louisville','Kentucky','83521 Pawling Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'gcuthbert2v@google.nl','google.de',1,'5026401749',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(105,NULL,'Wenona','wtames2w','Tames','Linktype',236,'64199','Kansas City','Missouri','598 Harbort Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'wtames2w@qq.com','skype.com',1,'8169106095',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(106,NULL,'Bev','bjannex2x','Jannex','Bluejam',236,'79945','El Paso','Texas','0291 Namekagon Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bjannex2x@cmu.edu','squidoo.com',1,'9155238652',NULL,0,0,0,0,NULL,0,NULL,0,58.00,NULL),
(107,NULL,'Gray','gwilliams2y','Williams','Thoughtmix',236,'2453','Waltham','Massachusetts','2135 Grasskamp Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'gwilliams2y@accuweather.com','baidu.com',1,'9789868521',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(108,NULL,'Courtnay','cotowey2z','O\'Towey','Myworks',236,'45419','Dayton','Ohio','4 Grasskamp Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cotowey2z@chron.com','soup.io',1,'9371793457',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(109,NULL,'Terrance','tpaddick30','Paddick','Quatz',236,'55412','Minneapolis','Minnesota','3 Randy Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tpaddick30@naver.com','zdnet.com',1,'9522850655',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(110,NULL,'Ferne','fbraim31','Braim','Jaloo',236,'57188','Sioux Falls','South Dakota','2 Bonner Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'fbraim31@dmoz.org','mapquest.com',1,'6057650475',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(111,NULL,'Akim','ablaza32','Blaza','Ooba',236,'33777','Largo','Florida','43 Kingsford Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ablaza32@nature.com','yahoo.co.jp',1,'7277255007',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(112,NULL,'Laura','ldamsell33','Damsell','Meevee',236,'33421','West Palm Beach','Florida','47 Marcy Hill',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ldamsell33@dedecms.com','vk.com',1,'5614455969',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(113,NULL,'Floria','fdominicacci34','Dominicacci','Brainbox',236,'44511','Youngstown','Ohio','094 Red Cloud Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'fdominicacci34@theatlantic.com','google.cn',1,'3309638517',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(114,NULL,'Javier','jmeenehan35','Meenehan','Voonix',236,'23203','Richmond','Virginia','684 Walton Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jmeenehan35@meetup.com','washingtonpost.com',1,'8042166584',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(115,NULL,'Anders','amelburg36','Melburg','Skiba',236,'33499','Boca Raton','Florida','1127 Mcbride Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'amelburg36@pen.io','mlb.com',1,'5617992458',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(116,NULL,'Matias','mbelsham37','Belsham','Yodo',236,'80910','Colorado Springs','Colorado','34695 Hallows Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mbelsham37@npr.org','cmu.edu',1,'7191210813',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(117,NULL,'Clo','cjerred38','Jerred','Vinder',236,'49444','Muskegon','Michigan','150 Nelson Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cjerred38@zimbio.com','aboutads.info',1,'2314631841',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(118,NULL,'Hilliary','hconford39','Conford','Rooxo',236,'31190','Atlanta','Georgia','2691 Menomonie Alley',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hconford39@indiatimes.com','artisteer.com',1,'4041726766',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(119,NULL,'Dmitri','dghiraldi3a','Ghiraldi','Browseblab',236,'30386','Atlanta','Georgia','66524 Columbus Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dghiraldi3a@dell.com','salon.com',1,'4049402288',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(120,NULL,'Dougy','dkembry3b','Kembry','Realcube',236,'99210','Spokane','Washington','42 Anniversary Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dkembry3b@hud.gov','infoseek.co.jp',1,'5095730859',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(121,NULL,'Mathew','mshiel3c','Shiel','Abatz',236,'78230','San Antonio','Texas','3 Shelley Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mshiel3c@amazonaws.com','hatena.ne.jp',1,'8307770046',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(122,NULL,'Clarence','cflood3d','Flood','Omba',236,'10170','New York City','New York','72 Milwaukee Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cflood3d@cnet.com','cbsnews.com',1,'2121654988',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(123,NULL,'Iormina','ivickress3e','Vickress','Rhynoodle',236,'8603','Trenton','New Jersey','7068 Forest Dale Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ivickress3e@google.com.au','sourceforge.net',1,'6097750688',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(124,NULL,'Giulia','gtomasini3f','Tomasini','Cogilith',236,'68105','Omaha','Nebraska','02 Veith Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'gtomasini3f@merriam-webster.com','sakura.ne.jp',1,'4022357008',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(125,NULL,'Laney','lcereceres3g','Cereceres','Shuffledrive',236,'85311','Glendale','Arizona','22297 Granby Plaza',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'lcereceres3g@washington.edu','wikipedia.org',1,'6026571882',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(126,NULL,'Loreen','ldressel3h','Dressel','Voonder',236,'77305','Conroe','Texas','12664 Thierer Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ldressel3h@ftc.gov','hubpages.com',1,'9362270559',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(127,NULL,'Ethelbert','ekeal3i','Keal','Skimia',236,'98133','Seattle','Washington','1 Crownhardt Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ekeal3i@so-net.ne.jp','shop-pro.jp',1,'4257197795',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(128,NULL,'Rebecka','rmackiewicz3j','Mackiewicz','Izio',236,'63116','Saint Louis','Missouri','566 Cardinal Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'rmackiewicz3j@ovh.net','bloglovin.com',1,'3145214178',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(129,NULL,'Brooke','bspurrior3k','Spurrior','Thoughtblab',236,'78682','Round Rock','Texas','9614 Superior Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bspurrior3k@princeton.edu','amazon.co.jp',1,'5129731561',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(130,NULL,'Eimile','ecaple3l','Caple','Topdrive',236,'72215','Little Rock','Arkansas','8 Service Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'ecaple3l@cpanel.net','pagesperso-orange.fr',1,'5014125922',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(131,NULL,'Micheline','mborgars3m','Borgars','Zooxo',236,'33111','Miami','Florida','8 Marquette Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mborgars3m@livejournal.com','amazonaws.com',1,'7868851335',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(132,NULL,'Jeramey','jkraut3n','Kraut','Gabvine',236,'10024','New York City','New York','5127 Tony Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jkraut3n@virginia.edu','privacy.gov.au',1,'7184914279',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(133,NULL,'Piper','pisaaksohn3o','Isaaksohn','Edgeify',236,'78405','Corpus Christi','Texas','7 Warbler Street',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pisaaksohn3o@businesswire.com','usatoday.com',1,'3618414188',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(134,NULL,'Tanya','tenefer3p','Enefer','Vimbo',236,'73119','Oklahoma City','Oklahoma','7918 Dexter Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tenefer3p@surveymonkey.com','altervista.org',1,'4052338067',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(135,NULL,'Genny','gboycott3q','Boycott','Brainbox',236,'23705','Portsmouth','Virginia','973 Hagan Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'gboycott3q@e-recht24.de','friendfeed.com',1,'7571606547',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(136,NULL,'Bidget','bmarte3r','Marte','Skibox',236,'30061','Marietta','Georgia','1 Pine View Crossing',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bmarte3r@smh.com.au','comsenz.com',1,'7702723743',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(137,NULL,'Kathryn','kmassenhove3s','Massenhove','Vipe',236,'30368','Atlanta','Georgia','0390 Bashford Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'kmassenhove3s@odnoklassniki.ru','yelp.com',1,'4041542316',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(138,NULL,'Maire','mclerk3t','Clerk','Gevee',236,'23225','Richmond','Virginia','48 Sage Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mclerk3t@flavors.me','trellian.com',1,'7576917707',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(139,NULL,'Quinton','qduthie3u','Duthie','Tazz',236,'90810','Long Beach','California','120 Esch Terrace',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'qduthie3u@sina.com.cn','nationalgeographic.com',1,'5626335097',NULL,0,0,0,0,NULL,0,NULL,0,58.00,NULL),
(140,NULL,'Chrystel','cbrave3v','Brave','Topicblab',236,'21290','Baltimore','Maryland','1 Upham Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cbrave3v@gizmodo.com','clickbank.net',1,'4102690829',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(141,NULL,'Amy','agonnin3w','Gonnin','Rhynyx',236,'70607','Lake Charles','Louisiana','82 Moose Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'agonnin3w@businessinsider.com','tamu.edu',1,'3377621882',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(142,NULL,'Damian','dnewberry3x','Newberry','Riffpath',236,'75226','Dallas','Texas','1 Goodland Trail',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dnewberry3x@1688.com','gov.uk',1,'9721341638',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(143,NULL,'Hazlett','hkoene3y','Koene','Aibox',236,'30096','Duluth','Georgia','90 Merrick Parkway',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'hkoene3y@wired.com','dagondesign.com',1,'6785097171',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(144,NULL,'Tedd','tpervew3z','Pervew','Tavu',236,'93709','Fresno','California','28 Magdeline Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'tpervew3z@youtube.com','timesonline.co.uk',1,'5592663096',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(145,NULL,'Pat','pgillbey40','Gillbey','Dynazzy',236,'84409','Ogden','Utah','4 Fallview Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'pgillbey40@baidu.com','zimbio.com',1,'8011940220',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(146,NULL,'Elden','etebb41','Tebb','Tagtune',236,'80045','Aurora','Colorado','8820 Elka Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'etebb41@rediff.com','tmall.com',1,'3033820327',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(147,NULL,'Dulcia','dcridlan42','Cridlan','Bluejam',236,'78426','Corpus Christi','Texas','740 Green Road',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'dcridlan42@skyrock.com','slashdot.org',1,'3616103137',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(148,NULL,'Chaddie','cklaffs43','Klaffs','Dynava',236,'78710','Austin','Texas','41067 Oneill Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cklaffs43@howstuffworks.com','miitbeian.gov.cn',1,'5122245801',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(149,NULL,'Jannel','jelvins44','Elvins','Edgetag',236,'95354','Modesto','California','08137 Oneill Point',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jelvins44@weebly.com','quantcast.com',1,'2097938403',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(150,NULL,'Briggs','brichel45','Richel','Yotz',236,'6816','Danbury','Connecticut','27 Cascade Park',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'brichel45@shutterfly.com','joomla.org',1,'2037995897',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(151,NULL,'Bren','bstribbling46','Stribbling','Cogilith',236,'85210','Mesa','Arizona','14623 Kim Center',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'bstribbling46@google.ca','blogtalkradio.com',1,'4802763816',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(152,NULL,'Obadiah','obonefant47','Bonefant','Realbridge',236,'80161','Littleton','Colorado','648 Basil Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'obonefant47@fotki.com','answers.com',1,'3035687139',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(153,NULL,'Malcolm','mrampling48','Rampling','Trupe',236,'97229','Portland','Oregon','49073 Washington Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mrampling48@flickr.com','nhs.uk',1,'9714246902',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(154,NULL,'Gordie','gomond49','Omond','Feedspan',236,'85219','Apache Junction','Arizona','561 Maple Wood Place',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'gomond49@wp.com','theglobeandmail.com',1,'4809781575',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(155,NULL,'Cedric','cbeeson4a','Beeson','Rhybox',236,'12305','Schenectady','New York','7 Browning Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'cbeeson4a@rediff.com','yandex.ru',1,'5181031032',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(156,NULL,'Murielle','mmaclachlan4b','MacLachlan','Gabvine',236,'83705','Boise','Idaho','93 Karstens Avenue',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'mmaclachlan4b@hibu.com','pcworld.com',1,'2088108561',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(157,NULL,'Francine','fburwell4c','Burwell','Wikibox',236,'80228','Denver','Colorado','9858 Green Ridge Circle',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'fburwell4c@mlb.com','canalblog.com',1,'7206977862',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(158,NULL,'Jude','jmacmenemy4d','MacMenemy','Leenti',236,'80126','Littleton','Colorado','9 Vidon Pass',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jmacmenemy4d@globo.com','bizjournals.com',1,'3035826543',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(159,NULL,'Di','djarmyn4e','Jarmyn','Skimia',236,'30066','Marietta','Georgia','41231 Cordelia Lane',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'djarmyn4e@nps.gov','gizmodo.com',1,'4048006000',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(160,NULL,'Joyan','jgiddens4f','Giddens','Youopia',236,'68134','Omaha','Nebraska','1 Barnett Way',1,'2022-11-28 18:56:11',0,2,1,NULL,NULL,NULL,1,'jgiddens4f@slate.com','foxnews.com',1,'7126585336',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(161,NULL,'Wallie','wpaternoster4g','Paternoster','Ooba',236,'30096','Duluth','Georgia','0374 Nobel Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'wpaternoster4g@trellian.com','chron.com',1,'7709511590',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(162,NULL,'Aleksandr','arapinett4h','Rapinett','Topiczoom',236,'78278','San Antonio','Texas','31 Transport Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'arapinett4h@surveymonkey.com','lycos.com',1,'2102216974',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(163,NULL,'Iorgo','icoite4i','Coite','Buzzster',236,'33915','Cape Coral','Florida','823 Buhler Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'icoite4i@4shared.com','skyrock.com',1,'2398773136',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(164,NULL,'Iggie','icroix4j','Croix','Lazz',236,'28272','Charlotte','North Carolina','78 Lake View Drive',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'icroix4j@gov.uk','skype.com',1,'7047995209',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(165,NULL,'Vernor','vkeynd4k','Keynd','Realcube',236,'95113','San Jose','California','38 Sherman Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vkeynd4k@latimes.com','purevolume.com',1,'4088927841',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(166,NULL,'Dukie','dtompkin4l','Tompkin','Zoomdog',236,'2208','Boston','Massachusetts','8848 Utah Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dtompkin4l@trellian.com','paypal.com',1,'6172540857',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(167,NULL,'Benyamin','bjolin4m','Jolin','Rhybox',236,'15210','Pittsburgh','Pennsylvania','36872 Bowman Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bjolin4m@toplist.cz','stanford.edu',1,'7243972164',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(168,NULL,'Marcie','mtreweke4n','Treweke','Fliptune',236,'57193','Sioux Falls','South Dakota','93843 Crowley Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mtreweke4n@privacy.gov.au','php.net',1,'6057205177',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(169,NULL,'Beatrisa','bdarey4o','Darey','Edgewire',236,'49048','Kalamazoo','Michigan','3 Caliangt Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bdarey4o@icio.us','admin.ch',1,'2697439671',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(170,NULL,'Pietra','pgillbey4p','Gillbey','Dabjam',236,'28242','Charlotte','North Carolina','875 Northfield Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pgillbey4p@gravatar.com','vkontakte.ru',1,'7047694528',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(171,NULL,'Bondie','bmcgarrell4q','McGarrell','Yata',236,'93311','Bakersfield','California','21532 3rd Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bmcgarrell4q@cbsnews.com','google.es',1,'6613275164',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(172,NULL,'Sibeal','scoady4r','Coady','Zava',236,'99220','Spokane','Washington','26 Shoshone Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'scoady4r@sciencedirect.com','tripadvisor.com',1,'5094397913',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(173,NULL,'Luce','lallaker4s','Allaker','Centidel',236,'98424','Tacoma','Washington','4 Forest Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lallaker4s@hud.gov','mozilla.org',1,'2068840484',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(174,NULL,'Jonathon','jgofforth4t','Gofforth','Flashset',236,'80291','Denver','Colorado','7887 Village Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jgofforth4t@java.com','sogou.com',1,'3039528117',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(175,NULL,'Aguie','apriscott4u','Priscott','Yabox',236,'89145','Las Vegas','Nevada','2 Vidon Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'apriscott4u@japanpost.jp','yale.edu',1,'7021694891',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(176,NULL,'Chaddy','cgewer4v','Gewer','Realfire',236,'88553','El Paso','Texas','7 Redwing Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cgewer4v@usnews.com','illinois.edu',1,'9155443575',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(177,NULL,'Sherri','sjaggs4w','Jaggs','Tagfeed',236,'80005','Arvada','Colorado','554 Dawn Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sjaggs4w@github.io','squarespace.com',1,'7204022936',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(178,NULL,'Vivyan','vspreadbury4x','Spreadbury','Jaxworks',236,'77844','College Station','Texas','4506 Sage Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vspreadbury4x@naver.com','oakley.com',1,'9794772708',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(179,NULL,'Britta','bfountian4y','Fountian','Kamba',236,'92640','Fullerton','California','98 Kropf Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bfountian4y@wordpress.org','census.gov',1,'5596020299',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(180,NULL,'Torr','tspringthorpe4z','Springthorpe','Shufflester',236,'63121','Saint Louis','Missouri','70340 Packers Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tspringthorpe4z@xrea.com','w3.org',1,'3143214198',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(181,NULL,'Patric','pkleinschmidt50','Kleinschmidt','Zoozzy',236,'85311','Glendale','Arizona','06 Anthes Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pkleinschmidt50@examiner.com','pagesperso-orange.fr',1,'6024753492',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(182,NULL,'Rebekah','rellen51','Ellen','Voolia',236,'30033','Decatur','Georgia','7 Boyd Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rellen51@ted.com','oracle.com',1,'6788324784',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(183,NULL,'Ranique','rcasserley52','Casserley','Blogtags',236,'2163','Boston','Massachusetts','50 Bayside Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rcasserley52@xing.com','baidu.com',1,'6171537941',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(184,NULL,'Bren','bsmidmoor53','Smidmoor','Skiptube',236,'30375','Atlanta','Georgia','8 Swallow Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bsmidmoor53@salon.com','domainmarket.com',1,'4049990783',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(185,NULL,'Glennis','gbruckmann54','Bruckmann','Buzzdog',236,'95813','Sacramento','California','24 Nova Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gbruckmann54@unicef.org','chicagotribune.com',1,'9165546180',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(186,NULL,'Anet','ahawarden55','Hawarden','Rooxo',236,'17110','Harrisburg','Pennsylvania','22970 Gina Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ahawarden55@drupal.org','goo.ne.jp',1,'7171881584',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(187,NULL,'Ardra','akerfod56','Kerfod','Avamba',236,'14220','Buffalo','New York','74009 Pierstorff Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'akerfod56@tinypic.com','omniture.com',1,'7164019089',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(188,NULL,'Kerri','kwilmott57','Wilmott','Zoonder',236,'55446','Minneapolis','Minnesota','5978 Mayfield Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kwilmott57@icq.com','utexas.edu',1,'9523971757',NULL,0,0,0,0,NULL,0,NULL,0,97.00,NULL),
(189,NULL,'Karine','kdyett58','Dyett','Dabjam',236,'47705','Evansville','Indiana','9354 Sommers Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kdyett58@reuters.com','nih.gov',1,'8122463387',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(190,NULL,'Jaimie','jandrat59','Andrat','Livepath',236,'89706','Carson City','Nevada','44531 Bunker Hill Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jandrat59@geocities.com','examiner.com',1,'7753179606',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(191,NULL,'Tracie','tbloore5a','Bloore','Topicblab',236,'35210','Birmingham','Alabama','49337 Killdeer Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tbloore5a@auda.org.au','arstechnica.com',1,'2058026142',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(192,NULL,'Morgen','mgreatbank5b','Greatbank','Mydo',236,'64082','Lees Summit','Missouri','7 Loftsgordon Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mgreatbank5b@lycos.com','kickstarter.com',1,'8167484161',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(193,NULL,'Phyllis','pdrees5c','Drees','Dabvine',236,'25356','Charleston','West Virginia','8436 Forest Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pdrees5c@msn.com','sphinn.com',1,'3045864479',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(194,NULL,'Mildred','mcorben5d','Corben','Centimia',236,'6705','Waterbury','Connecticut','21 Judy Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mcorben5d@usgs.gov','icio.us',1,'2035618465',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(195,NULL,'Denni','dbocock5e','Bocock','Izio',236,'30245','Lawrenceville','Georgia','853 Lotheville Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dbocock5e@answers.com','google.com.hk',1,'6787911481',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(196,NULL,'Regine','raddy5f','Addy','Brightbean',236,'47812','Terre Haute','Indiana','05139 Shelley Park',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'raddy5f@princeton.edu','icq.com',1,'8128232555',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(197,NULL,'Aimil','abungey5g','Bungey','Omba',236,'10019','New York City','New York','25 Loomis Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'abungey5g@sciencedirect.com','mlb.com',1,'3473258640',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(198,NULL,'Adey','aelby5h','Elby','Buzzshare',236,'88541','El Paso','Texas','90959 Park Meadow Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'aelby5h@360.cn','gizmodo.com',1,'9152544392',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(199,NULL,'Jordan','jgalland5i','Galland','Zoomdog',236,'95219','Stockton','California','09 Monterey Place',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jgalland5i@pagesperso-orange.fr','alibaba.com',1,'2094721518',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(200,NULL,'Purcell','pchetwind5j','Chetwind','Voolith',236,'31119','Atlanta','Georgia','273 Melody Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pchetwind5j@multiply.com','unblog.fr',1,'7705211867',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(201,NULL,'Tobie','tmcdonell5k','McDonell','Skimia',236,'20580','Washington','District of Columbia','99 Weeping Birch Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tmcdonell5k@go.com','oakley.com',1,'2026472825',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(202,NULL,'Mignon','mblackader5l','Blackader','Skynoodle',236,'19495','Valley Forge','Pennsylvania','735 Tony Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mblackader5l@latimes.com','latimes.com',1,'4842934268',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(203,NULL,'Vanny','vphysick5m','Physick','LiveZ',236,'33710','Saint Petersburg','Florida','6 Oakridge Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vphysick5m@dailymotion.com','sciencedirect.com',1,'7278390759',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(204,NULL,'Neile','ndeer5n','Deer','Topicstorm',236,'29605','Greenville','South Carolina','61 Pankratz Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ndeer5n@g.co','issuu.com',1,'8645770395',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(205,NULL,'Rodrigo','rshickle5o','Shickle','Mycat',236,'22156','Springfield','Virginia','74 Lillian Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rshickle5o@scribd.com','oaic.gov.au',1,'5717196620',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(206,NULL,'Nance','nheymann5p','Heymann','Divavu',236,'88574','El Paso','Texas','209 David Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'nheymann5p@sakura.ne.jp','uol.com.br',1,'9155695542',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(207,NULL,'Adelice','arosander5q','Rosander','Devshare',236,'32909','Palm Bay','Florida','3759 Eagle Crest Park',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'arosander5q@guardian.co.uk','elpais.com',1,'3218132745',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(208,NULL,'Celestyn','cpeverell5r','Peverell','Livetube',236,'20503','Washington','District of Columbia','915 Nobel Drive',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cpeverell5r@over-blog.com','comcast.net',1,'2021402555',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(209,NULL,'Enrika','eroden5s','Roden','Rhyloo',236,'6510','New Haven','Connecticut','207 American Ash Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'eroden5s@cyberchimps.com','cornell.edu',1,'2032091955',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(210,NULL,'Mortie','mharnes5t','Harnes','Ntag',236,'37665','Kingsport','Tennessee','9 Luster Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mharnes5t@trellian.com','tinyurl.com',1,'4232549809',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(211,NULL,'Kimball','kstopford5u','Stopford','Kimia',236,'95865','Sacramento','California','246 Armistice Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kstopford5u@cisco.com','yandex.ru',1,'9165923891',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(212,NULL,'Danyette','dmitchell5v','Mitchell','Vipe',236,'32277','Jacksonville','Florida','15564 Cody Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dmitchell5v@youtube.com','vimeo.com',1,'9044409227',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(213,NULL,'Lindie','lebbett5w','Ebbett','Brainbox',236,'55441','Minneapolis','Minnesota','743 Graedel Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lebbett5w@hc360.com','unicef.org',1,'6518686783',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(214,NULL,'Cymbre','cdcosta5x','D\'Costa','Flashset',236,'34205','Bradenton','Florida','682 Fisk Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cdcosta5x@devhub.com','bing.com',1,'9411641736',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(215,NULL,'Mitch','mshorten5y','Shorten','Npath',236,'95852','Sacramento','California','6 Pleasure Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mshorten5y@sina.com.cn','angelfire.com',1,'9165750345',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(216,NULL,'Vale','vfakeley5z','Fakeley','Skyndu',236,'77065','Houston','Texas','0463 Mitchell Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vfakeley5z@fda.gov','mediafire.com',1,'8323080644',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(217,NULL,'Enrika','edunkley60','Dunkley','Bubblemix',236,'55115','Saint Paul','Minnesota','61215 Hoard Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'edunkley60@freewebs.com','zimbio.com',1,'6517507318',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(218,NULL,'Charles','ccalbaithe61','Calbaithe','Lazzy',236,'20073','Washington','District of Columbia','05829 Brickson Park Drive',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ccalbaithe61@businessinsider.com','sohu.com',1,'2024853211',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(219,NULL,'Bunni','bcummine62','Cummine','Zoonoodle',236,'98121','Seattle','Washington','021 Northridge Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bcummine62@who.int','sciencedaily.com',1,'2062883202',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(220,NULL,'Cece','cwagge63','Wagge','Einti',236,'60604','Chicago','Illinois','81282 Dayton Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cwagge63@marriott.com','so-net.ne.jp',1,'6306999376',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(221,NULL,'Lethia','llemonnier64','Lemonnier','Quatz',236,'33023','Hollywood','Florida','5769 Logan Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'llemonnier64@disqus.com','networkadvertising.org',1,'3058638642',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(222,NULL,'Nan','nleyshon65','Leyshon','Leexo',236,'22047','Falls Church','Virginia','0 Glendale Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'nleyshon65@google.ru','phoca.cz',1,'5719365821',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(223,NULL,'Daryn','dedger66','Edger','Twimm',236,'37995','Knoxville','Tennessee','3843 Hanson Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dedger66@army.mil','sciencedirect.com',1,'8658425357',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(224,NULL,'Bay','bashmore67','Ashmore','Trilith',236,'28215','Charlotte','North Carolina','083 Northwestern Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bashmore67@indiatimes.com','google.es',1,'7049651129',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(225,NULL,'Bekki','bcluer68','Cluer','Vimbo',236,'98121','Seattle','Washington','31239 Hintze Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bcluer68@infoseek.co.jp','forbes.com',1,'2069107864',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(226,NULL,'Dorry','ddevany69','Devany','Edgeclub',236,'97232','Portland','Oregon','91886 Autumn Leaf Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ddevany69@opensource.org','angelfire.com',1,'5039893551',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(227,NULL,'Tandy','tgilder6a','Gilder','Dynazzy',236,'85284','Tempe','Arizona','5376 Mitchell Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tgilder6a@apple.com','techcrunch.com',1,'6029649268',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(228,'d1438aa56963d2f1ca5896f7abe45222-cb7146ed934a1da4a9bdf4254113e5de','Abeu','areily6b','Reily','Yata',236,'73190','Oklahoma City','Oklahoma','08588 Doe Crossing Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'areily6b@stumbleupon.com','multiply.com',1,'4058371131',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(229,NULL,'Jaquenetta','jheningham6c','Heningham','Yakijo',236,'30380','Atlanta','Georgia','4 Ramsey Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jheningham6c@discovery.com','boston.com',1,'4042839391',NULL,0,0,0,0,NULL,0,NULL,0,20.00,NULL),
(230,NULL,'Sonnie','sshillitoe6d','Shillitoe','Linktype',236,'10459','Bronx','New York','17 Village Place',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sshillitoe6d@canalblog.com','t.co',1,'9175572683',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(231,NULL,'Andie','asuscens6e','Suscens','JumpXS',236,'99517','Anchorage','Alaska','64051 Mifflin Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'asuscens6e@twitter.com','webs.com',1,'9076259178',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(232,NULL,'Alphonse','athacker6f','Thacker','Vipe',236,'79405','Lubbock','Texas','30 Armistice Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'athacker6f@technorati.com','state.gov',1,'8066128553',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(233,NULL,'Richmound','rthorntondewhirst6g','Thornton-Dewhirst','Trilith',236,'93773','Fresno','California','82 Hoepker Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rthorntondewhirst6g@mapy.cz','wikia.com',1,'5597849802',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(234,NULL,'Barbara-anne','bgiorgielli6h','Giorgielli','Oba',236,'77075','Houston','Texas','337 Sachtjen Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bgiorgielli6h@wp.com','cafepress.com',1,'7138269721',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(235,NULL,'Mariann','mrankcom6i','Rankcom','Buzzbean',236,'19886','Wilmington','Delaware','01 Pine View Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mrankcom6i@diigo.com','parallels.com',1,'3026304140',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(236,NULL,'Rayna','rkissick6j','Kissick','Myworks',236,'28805','Asheville','North Carolina','17554 Menomonie Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rkissick6j@narod.ru','addtoany.com',1,'8282713547',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(237,NULL,'Cordy','cverillo6k','Verillo','Skyba',236,'89166','Las Vegas','Nevada','1 Schiller Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cverillo6k@newyorker.com','behance.net',1,'7022369331',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(238,NULL,'Tony','tdurtnall6l','Durtnall','Rhynyx',236,'77075','Houston','Texas','594 Orin Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tdurtnall6l@umich.edu','cornell.edu',1,'7137942865',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(239,NULL,'Luke','lspurge6m','Spurge','Agivu',236,'23213','Richmond','Virginia','3919 Vernon Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lspurge6m@posterous.com','globo.com',1,'8046913365',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(240,NULL,'Dyanne','dburgoyne6n','Burgoyne','Devpoint',236,'38197','Memphis','Tennessee','5 Buell Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dburgoyne6n@parallels.com','eepurl.com',1,'9013719850',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(241,NULL,'Kettie','kellse6o','Ellse','Voolith',236,'19109','Philadelphia','Pennsylvania','97 Killdeer Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kellse6o@networksolutions.com','amazon.com',1,'6101676005',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(242,NULL,'Jaime','jjahn6p','Jahn','Skidoo',236,'60663','Chicago','Illinois','03 Monterey Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jjahn6p@plala.or.jp','linkedin.com',1,'3125662582',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(243,NULL,'Sibel','sallnatt6q','Allnatt','JumpXS',236,'77288','Houston','Texas','83632 Fisk Park',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sallnatt6q@meetup.com','behance.net',1,'7134421289',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(244,NULL,'Lars','linsworth6r','Insworth','Reallinks',236,'77266','Houston','Texas','9 Forest Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'linsworth6r@deliciousdays.com','sbwire.com',1,'7132358226',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(245,NULL,'Vickie','vmanser6s','Manser','Feednation',236,'40586','Lexington','Kentucky','56557 Loftsgordon Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vmanser6s@liveinternet.ru','hibu.com',1,'8594490038',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(246,NULL,'Basilio','bmatteoli6t','Matteoli','Cogilith',236,'7544','Paterson','New Jersey','28 Thackeray Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bmatteoli6t@gov.uk','buzzfeed.com',1,'8624373034',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(247,NULL,'Lincoln','lbiggin6u','Biggin','Lazz',236,'85215','Mesa','Arizona','751 Hovde Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lbiggin6u@seattletimes.com','list-manage.com',1,'6025772826',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(248,NULL,'Melisenda','mcorrao6v','Corrao','Twitternation',236,'32204','Jacksonville','Florida','69074 Truax Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mcorrao6v@adobe.com','domainmarket.com',1,'9041192705',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(249,NULL,'Mathew','mcreebo6w','Creebo','Edgeify',236,'25321','Charleston','West Virginia','11080 Anderson Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mcreebo6w@webs.com','addtoany.com',1,'3049552778',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(250,NULL,'Isidoro','iferfulle6x','Ferfulle','Yakijo',236,'85210','Mesa','Arizona','31722 Dottie Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'iferfulle6x@reference.com','soundcloud.com',1,'9284687648',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(251,NULL,'Jorge','jmulrooney6y','Mulrooney','Mita',236,'37995','Knoxville','Tennessee','9 Corry Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jmulrooney6y@live.com','histats.com',1,'8652866757',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(252,NULL,'Karlyn','klinbohm6z','Linbohm','Mudo',236,'37605','Johnson City','Tennessee','6 Farmco Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'klinbohm6z@bluehost.com','nasa.gov',1,'4232068766',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(253,NULL,'Nathan','nroyal70','Royal','Jazzy',236,'28235','Charlotte','North Carolina','7470 Mitchell Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'nroyal70@dedecms.com','is.gd',1,'7049869604',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(254,NULL,'Lyle','lparmenter71','Parmenter','Meevee',236,'98447','Tacoma','Washington','73316 Mariners Cove Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lparmenter71@toplist.cz','51.la',1,'2537416589',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(255,NULL,'Denny','dduddell72','Duddell','Flashspan',236,'27264','High Point','North Carolina','87902 Stephen Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dduddell72@xing.com','fema.gov',1,'3365577741',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(256,NULL,'Timothy','thardwidge73','Hardwidge','Feedspan',236,'48217','Detroit','Michigan','5869 Garrison Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'thardwidge73@hugedomains.com','discovery.com',1,'3135358258',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(257,NULL,'Thornton','tlung74','Lung','Gigabox',236,'77299','Houston','Texas','1 Lukken Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tlung74@ezinearticles.com','aboutads.info',1,'7134895386',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(258,NULL,'Robinett','rbaldrey75','Baldrey','Edgeblab',236,'20546','Washington','District of Columbia','352 Valley Edge Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rbaldrey75@wisc.edu','furl.net',1,'2029969077',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(259,NULL,'Paten','plammas76','Lammas','Brainbox',236,'94297','Sacramento','California','4 Wayridge Park',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'plammas76@slideshare.net','free.fr',1,'9169809370',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(260,NULL,'Terza','tgorini77','Gorini','Twimbo',236,'93094','Simi Valley','California','8316 Spenser Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tgorini77@census.gov','reddit.com',1,'8056494108',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(261,NULL,'Charita','ckernley78','Kernley','Skynoodle',236,'7305','Jersey City','New Jersey','802 Sutherland Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ckernley78@constantcontact.com','paginegialle.it',1,'2015072021',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(262,NULL,'Mufi','mrehorek79','Rehorek','Yacero',236,'84145','Salt Lake City','Utah','1752 Iowa Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mrehorek79@yale.edu','google.fr',1,'8014626780',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(263,NULL,'Fowler','femerine7a','Emerine','Twiyo',236,'20551','Washington','District of Columbia','7787 Jackson Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'femerine7a@google.co.uk','fastcompany.com',1,'2024108342',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(264,NULL,'Jorey','jfills7b','Fills','Divape',236,'61629','Peoria','Illinois','5727 Lakewood Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jfills7b@thetimes.co.uk','businessinsider.com',1,'3097858996',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(265,NULL,'Madlin','merrigo7c','Errigo','Skyvu',236,'94302','Palo Alto','California','547 Brentwood Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'merrigo7c@ovh.net','taobao.com',1,'3107759965',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(266,NULL,'Colby','cscroggs7d','Scroggs','LiveZ',236,'95823','Sacramento','California','17 Oneill Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cscroggs7d@biglobe.ne.jp','theglobeandmail.com',1,'5106044831',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(267,NULL,'Jude','jjefferson7e','Jefferson','Jabberstorm',236,'80262','Denver','Colorado','1 1st Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jjefferson7e@harvard.edu','upenn.edu',1,'3031258699',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(268,NULL,'Dina','djewes7f','Jewes','Buzzshare',236,'98481','Tacoma','Washington','218 Susan Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'djewes7f@narod.ru','aol.com',1,'2538011033',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(269,NULL,'Giacobo','gspadazzi7g','Spadazzi','Photolist',236,'53285','Milwaukee','Wisconsin','7 Sutherland Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gspadazzi7g@springer.com','rakuten.co.jp',1,'4145166829',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(270,NULL,'Raf','rlassetter7h','Lassetter','Twinder',236,'89193','Las Vegas','Nevada','3327 Maryland Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rlassetter7h@ehow.com','uol.com.br',1,'7024532609',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(271,NULL,'Rozanna','rwarin7i','Warin','Youspan',236,'23509','Norfolk','Virginia','3 Magdeline Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rwarin7i@indiegogo.com','blogs.com',1,'7577175444',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(272,NULL,'Ynes','yblastock7j','Blastock','Voonyx',236,'46239','Indianapolis','Indiana','3940 Delaware Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'yblastock7j@dell.com','opensource.org',1,'3176060143',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(273,NULL,'Sean','sgarmans7k','Garmans','Oloo',236,'35263','Birmingham','Alabama','16410 Cardinal Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sgarmans7k@go.com','pcworld.com',1,'2056846579',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(274,NULL,'Myles','mbelloch7l','Belloch','Quimba',236,'98447','Tacoma','Washington','487 Harbort Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mbelloch7l@huffingtonpost.com','xing.com',1,'2537515508',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(275,NULL,'Vassily','vpendrigh7m','Pendrigh','Eimbee',236,'79950','El Paso','Texas','7023 Scoville Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vpendrigh7m@opera.com','tamu.edu',1,'9151800116',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(276,NULL,'Rex','rjosephi7n','Josephi','Jetwire',236,'80910','Colorado Springs','Colorado','077 Bobwhite Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rjosephi7n@gizmodo.com','go.com',1,'7196975957',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(277,NULL,'Kale','kclaricoats7o','Claricoats','Buzzshare',236,'89125','Las Vegas','Nevada','793 Gina Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kclaricoats7o@archive.org','parallels.com',1,'7021669298',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(278,NULL,'Baron','bgartrell7p','Gartrell','Avaveo',236,'80945','Colorado Springs','Colorado','51 Nancy Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bgartrell7p@thetimes.co.uk','admin.ch',1,'7193256903',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(279,NULL,'Dorine','dvokes7q','Vokes','Wikizz',236,'99790','Fairbanks','Alaska','044 Transport Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dvokes7q@yelp.com','nature.com',1,'9079207852',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(280,NULL,'Burty','bbubbear7r','Bubbear','Rhyzio',236,'10131','New York City','New York','360 Sunfield Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bbubbear7r@oaic.gov.au','t-online.de',1,'2125440315',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(281,NULL,'Hobie','hbilofsky7s','Bilofsky','Zoonder',236,'92191','San Diego','California','215 Eastlawn Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'hbilofsky7s@ustream.tv','altervista.org',1,'6195937367',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(282,NULL,'Eal','egeldert7t','Geldert','Avamm',236,'47747','Evansville','Indiana','70 Waywood Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'egeldert7t@domainmarket.com','admin.ch',1,'8126115955',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(283,NULL,'Dianna','dprowting7u','Prowting','Voolith',236,'19810','Wilmington','Delaware','92684 Manley Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dprowting7u@craigslist.org','bizjournals.com',1,'3027117412',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(284,NULL,'Phaedra','pbatrim7v','Batrim','Zoomzone',236,'20231','Washington','District of Columbia','174 Aberg Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pbatrim7v@disqus.com','prweb.com',1,'2025198132',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(285,NULL,'Artur','arising7w','Rising','Thoughtsphere',236,'23471','Virginia Beach','Virginia','818 Kedzie Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'arising7w@cocolog-nifty.com','google.fr',1,'7579441301',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(286,NULL,'Alicia','atregien7x','Tregien','Podcat',236,'30066','Marietta','Georgia','2 Ronald Regan Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'atregien7x@twitter.com','etsy.com',1,'7707551874',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(287,NULL,'Kaine','kpadkin7y','Padkin','Livefish',236,'11210','Brooklyn','New York','67084 Leroy Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kpadkin7y@hp.com','barnesandnoble.com',1,'3471896505',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(288,NULL,'Kikelia','kpakeman7z','Pakeman','Feedfire',236,'70033','Metairie','Louisiana','0477 Union Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kpakeman7z@livejournal.com','istockphoto.com',1,'5049058806',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(289,NULL,'Ravi','rcafe80','Cafe','Yacero',236,'61640','Peoria','Illinois','207 Meadow Vale Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rcafe80@sphinn.com','redcross.org',1,'3095774257',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(290,NULL,'Becka','bkirsz81','Kirsz','Babbleset',236,'92424','San Bernardino','California','116 Victoria Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bkirsz81@cafepress.com','simplemachines.org',1,'9097175559',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(291,NULL,'Jethro','jscoffham82','Scoffham','Jetpulse',236,'27157','Winston Salem','North Carolina','9605 Oxford Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jscoffham82@umn.edu','huffingtonpost.com',1,'3369698274',NULL,0,0,0,0,NULL,0,NULL,0,20.00,NULL),
(292,NULL,'Arvin','amedhurst83','Medhurst','Katz',236,'90076','Los Angeles','California','1652 Waubesa Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'amedhurst83@reverbnation.com','geocities.jp',1,'3231460843',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(293,NULL,'Pavlov','pwaight84','Waight','Skipstorm',236,'80045','Aurora','Colorado','13 South Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pwaight84@etsy.com','mashable.com',1,'3033583075',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(294,NULL,'Laina','lfriese85','Friese','Shuffletag',236,'6538','New Haven','Connecticut','4270 Havey Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lfriese85@nifty.com','bravesites.com',1,'2034526839',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(295,NULL,'Sammie','sranderson86','Randerson','Katz',236,'75358','Dallas','Texas','55 Ilene Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sranderson86@skype.com','github.io',1,'2143467929',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(296,NULL,'Bria','bmelin87','Melin','Browsedrive',236,'34210','Bradenton','Florida','58 Eastlawn Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bmelin87@youku.com','live.com',1,'7277957565',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(297,NULL,'Philipa','pgrew88','Grew','Devpoint',236,'80015','Aurora','Colorado','40 Moose Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pgrew88@howstuffworks.com','altervista.org',1,'7205086932',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(298,NULL,'Verna','vgreeson89','Greeson','Jaloo',236,'92415','San Bernardino','California','712 Express Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'vgreeson89@msu.edu','google.fr',1,'9096517458',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(299,NULL,'Yvor','yworthington8a','Worthington','Zoovu',236,'97405','Eugene','Oregon','2059 Butterfield Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'yworthington8a@biglobe.ne.jp','w3.org',1,'5411027740',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(300,NULL,'Brewer','bworden8b','Worden','Youtags',236,'33661','Tampa','Florida','9 Trailsway Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bworden8b@wikimedia.org','who.int',1,'8134808249',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(301,NULL,'Charlie','cwincott8c','Wincott','Reallinks',236,'70149','New Orleans','Louisiana','7095 Scofield Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cwincott8c@taobao.com','state.tx.us',1,'5042748522',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(302,NULL,'Tobye','tjobe8d','Jobe','Gabspot',236,'46239','Indianapolis','Indiana','887 Melody Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tjobe8d@addthis.com','buzzfeed.com',1,'3172452121',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(303,NULL,'Erna','edossantos8e','Dossantos','Dabjam',236,'50330','Des Moines','Iowa','697 Coolidge Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'edossantos8e@wikispaces.com','springer.com',1,'5152763661',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(304,NULL,'Henrietta','hclothier8f','Clothier','Pixonyx',236,'62205','East Saint Louis','Illinois','6818 Meadow Vale Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'hclothier8f@blog.com','shutterfly.com',1,'6189775070',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(305,NULL,'Dominique','dcockle8g','Cockle','Kazu',236,'4109','Portland','Maine','643 Ronald Regan Trail',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dcockle8g@studiopress.com','spotify.com',1,'2079687555',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(306,NULL,'Waly','wdannohl8h','Dannohl','Wikizz',236,'95397','Modesto','California','63 Banding Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'wdannohl8h@ca.gov','soundcloud.com',1,'2099681116',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(307,NULL,'Sallie','swallworth8i','Wallworth','Jabberbean',236,'34210','Bradenton','Florida','6 High Crossing Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'swallworth8i@gmpg.org','nytimes.com',1,'7273195108',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(308,NULL,'Louise','lhaversham8j','Haversham','Quimm',236,'77206','Houston','Texas','383 American Place',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lhaversham8j@vistaprint.com','huffingtonpost.com',1,'7139605431',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(309,NULL,'Barnabas','blowles8k','Lowles','Digitube',236,'23293','Richmond','Virginia','84 Dahle Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'blowles8k@ibm.com','seesaa.net',1,'8046172496',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(310,NULL,'Reg','rvallis8l','Vallis','Zava',236,'10131','New York City','New York','0994 Weeping Birch Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rvallis8l@hibu.com','state.gov',1,'2126616419',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(311,NULL,'Griffy','galtree8m','Altree','Jabbercube',236,'10019','New York City','New York','24 Graceland Crossing',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'galtree8m@odnoklassniki.ru','yolasite.com',1,'9178795563',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(312,NULL,'Shaughn','spuddan8n','Puddan','Divape',236,'22184','Vienna','Virginia','48074 Lakeland Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'spuddan8n@icio.us','squidoo.com',1,'5713818929',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(313,NULL,'Geno','gzoephel8o','Zoephel','Kayveo',236,'33345','Fort Lauderdale','Florida','7737 Buena Vista Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gzoephel8o@bbc.co.uk','desdev.cn',1,'7547536617',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(314,NULL,'Benton','broylance8p','Roylance','Skilith',236,'92717','Irvine','California','84 Butternut Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'broylance8p@senate.gov','sun.com',1,'7142769282',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(315,NULL,'Niki','nscoles8q','Scoles','Tagtune',236,'37240','Nashville','Tennessee','1913 Arrowood Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'nscoles8q@unc.edu','narod.ru',1,'6151975198',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(316,NULL,'Noby','nchurchouse8r','Churchouse','Geba',236,'60646','Chicago','Illinois','450 Jenifer Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'nchurchouse8r@goo.gl','bbc.co.uk',1,'8478201369',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(317,NULL,'Hynda','hduran8s','Duran','Reallinks',236,'11470','Jamaica','New York','20 Jay Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'hduran8s@upenn.edu','columbia.edu',1,'7184726978',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(318,NULL,'Starlin','sfilyakov8t','Filyakov','Bubblemix',236,'20392','Washington','District of Columbia','238 Nancy Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sfilyakov8t@shutterfly.com','shop-pro.jp',1,'2025620293',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(319,NULL,'Moss','mcolbrun8u','Colbrun','Brightdog',236,'26505','Morgantown','West Virginia','2148 Carioca Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mcolbrun8u@toplist.cz','theguardian.com',1,'3042750223',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(320,NULL,'Marianne','mdenziloe8v','Denziloe','Oozz',236,'79940','El Paso','Texas','36 Bobwhite Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mdenziloe8v@usatoday.com','fema.gov',1,'9159147182',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(321,NULL,'Ross','rmulvey8w','Mulvey','Youtags',236,'63158','Saint Louis','Missouri','64278 Cordelia Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rmulvey8w@drupal.org','webnode.com',1,'3147612517',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(322,NULL,'Jordana','jstutard8x','Stutard','Livetube',236,'79764','Odessa','Texas','66779 Bluejay Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jstutard8x@engadget.com','goodreads.com',1,'4325761841',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(323,NULL,'Gayel','gmarzelle8y','Marzelle','Gevee',236,'76162','Fort Worth','Texas','5032 Sunnyside Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gmarzelle8y@pen.io','yandex.ru',1,'6824759324',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(324,NULL,'Alena','adrysdall8z','Drysdall','Buzzdog',236,'44118','Cleveland','Ohio','0 Grayhawk Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'adrysdall8z@theatlantic.com','nih.gov',1,'2164344968',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(325,NULL,'Frants','flere90','Lere','Rhybox',236,'77020','Houston','Texas','743 Bluejay Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'flere90@tinypic.com','jimdo.com',1,'7133910553',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(326,NULL,'Rutter','rokill91','Okill','Jayo',236,'52804','Davenport','Iowa','9511 Doe Crossing Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rokill91@senate.gov','addthis.com',1,'5639712316',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(327,NULL,'Rip','rtaree92','Taree','Edgewire',236,'64142','Kansas City','Missouri','854 La Follette Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rtaree92@nasa.gov','amazon.co.jp',1,'8168216518',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(328,NULL,'Shawn','stuny93','Tuny','Dazzlesphere',236,'32244','Jacksonville','Florida','602 Manley Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'stuny93@weibo.com','over-blog.com',1,'9048910367',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(329,NULL,'Hogan','hmaken94','Maken','Topicware',236,'80305','Boulder','Colorado','8 Fairfield Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'hmaken94@berkeley.edu','shareasale.com',1,'7205287797',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(330,NULL,'Jacky','jebunoluwa95','Ebunoluwa','Aimbo',236,'19805','Wilmington','Delaware','8 Gateway Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jebunoluwa95@stanford.edu','miibeian.gov.cn',1,'3024003026',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(331,NULL,'Caria','cmccreath96','McCreath','Einti',236,'90398','Inglewood','California','1 Cascade Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cmccreath96@ebay.com','hostgator.com',1,'3104418111',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(332,NULL,'Alaine','aphilippson97','Philippson','Jabberbean',236,'8922','New Brunswick','New Jersey','103 Derek Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'aphilippson97@guardian.co.uk','free.fr',1,'7329149383',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(333,NULL,'Eberto','eadkins98','Adkins','Mynte',236,'6726','Waterbury','Connecticut','1812 Grim Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'eadkins98@gmpg.org','virginia.edu',1,'2036396010',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(334,NULL,'Isabeau','itrewman99','Trewman','Cogibox',236,'25389','Charleston','West Virginia','37 Delaware Parkway',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'itrewman99@wp.com','accuweather.com',1,'3043211635',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(335,NULL,'Rhianna','rbatchley9a','Batchley','Mynte',236,'55417','Minneapolis','Minnesota','77 Sycamore Drive',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rbatchley9a@go.com','house.gov',1,'6128046259',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(336,NULL,'Dorian','dvellden9b','Vellden','Browsedrive',236,'80005','Arvada','Colorado','44 Hoard Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'dvellden9b@360.cn','delicious.com',1,'7205103856',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(337,NULL,'Tiff','tdingley9c','Dingley','Yacero',236,'10464','Bronx','New York','1729 Darwin Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tdingley9c@reuters.com','people.com.cn',1,'9144162322',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(338,NULL,'Lissa','lvannet9d','Vannet','Pixope',236,'85311','Glendale','Arizona','64 Kings Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lvannet9d@pbs.org','aboutads.info',1,'6021365443',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(339,NULL,'Ezra','etedridge9e','Tedridge','Fiveclub',236,'10160','New York City','New York','30 Monument Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'etedridge9e@rediff.com','google.co.jp',1,'2122067888',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(340,NULL,'Ethan','eboaler9f','Boaler','Mudo',236,'96805','Honolulu','Hawaii','8335 Sommers Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'eboaler9f@slideshare.net','exblog.jp',1,'8081893560',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(341,NULL,'Christiano','cknightsbridge9g','Knightsbridge','Gabvine',236,'34290','North Port','Florida','6 Shasta Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cknightsbridge9g@china.com.cn','paginegialle.it',1,'9414386456',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(342,NULL,'Kassie','knisius9h','Nisius','Vinte',236,'12242','Albany','New York','37 Northland Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'knisius9h@thetimes.co.uk','360.cn',1,'5189857857',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(343,NULL,'Muire','mjarmain9i','Jarmain','Jaloo',236,'25711','Huntington','West Virginia','0542 Talisman Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mjarmain9i@studiopress.com','cbsnews.com',1,'3046528185',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(344,NULL,'Lezlie','lrazzell9j','Razzell','Oodoo',236,'78426','Corpus Christi','Texas','581 Blue Bill Park Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lrazzell9j@elegantthemes.com','dyndns.org',1,'3615898258',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(345,NULL,'Tamas','tkirtland9k','Kirtland','Kwinu',236,'32255','Jacksonville','Florida','938 Myrtle Pass',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tkirtland9k@chronoengine.com','free.fr',1,'9044187183',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(346,NULL,'Ranique','rclawson9l','Clawson','Zazio',236,'98121','Seattle','Washington','2 Lindbergh Alley',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rclawson9l@stumbleupon.com','angelfire.com',1,'3605445934',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(347,NULL,'Ada','aclemente9m','Clemente','Buzzster',236,'39210','Jackson','Mississippi','92602 Springview Place',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'aclemente9m@nba.com','amazon.de',1,'6018622273',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(348,NULL,'Pauletta','pproudley9n','Proudley','Youbridge',236,'61635','Peoria','Illinois','06 Ohio Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pproudley9n@twitter.com','meetup.com',1,'3093372748',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(349,NULL,'Hynda','hdow9o','Dow','Yodo',236,'32610','Gainesville','Florida','5681 Service Terrace',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'hdow9o@mashable.com','apple.com',1,'3525068981',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(350,NULL,'Leisha','lcobbald9p','Cobbald','Rhycero',236,'33686','Tampa','Florida','565 Sheridan Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lcobbald9p@freewebs.com','canalblog.com',1,'8136187768',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(351,NULL,'Laughton','lsabater9q','Sabater','Kwideo',236,'77554','Galveston','Texas','43080 Sutherland Hill',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lsabater9q@alibaba.com','nasa.gov',1,'4094811860',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(352,NULL,'York','yhannam9r','Hannam','Trudoo',236,'71161','Shreveport','Louisiana','664 Arizona Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'yhannam9r@smugmug.com','google.de',1,'3186806792',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(353,NULL,'Grazia','gmilazzo9s','Milazzo','Devpulse',236,'85748','Tucson','Arizona','4 Cherokee Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gmilazzo9s@hhs.gov','php.net',1,'5203786115',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(354,NULL,'Carlynn','csedgefield9t','Sedgefield','Latz',236,'91199','Pasadena','California','07810 Tennyson Way',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'csedgefield9t@census.gov','hubpages.com',1,'6262550262',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(355,NULL,'Tory','torhrt9u','Orhrt','Vinder',236,'48555','Flint','Michigan','3 Claremont Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'torhrt9u@tuttocitta.it','youtu.be',1,'8103918257',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(356,NULL,'Maryjane','mcutress9v','Cutress','Skyba',236,'28805','Asheville','North Carolina','1 Lighthouse Bay Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mcutress9v@domainmarket.com','scientificamerican.com',1,'8289979249',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(357,NULL,'Cletus','cridde9w','Ridde','Youspan',236,'78296','San Antonio','Texas','18919 Mockingbird Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'cridde9w@google.ca','europa.eu',1,'2105959822',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(358,NULL,'Ephraim','emaccardle9x','MacCardle','Tekfly',236,'77035','Houston','Texas','222 Spohn Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'emaccardle9x@fda.gov','macromedia.com',1,'2813399160',NULL,0,0,0,0,NULL,0,NULL,0,97.00,NULL),
(359,NULL,'Giuseppe','gchicco9y','Chicco','Riffpedia',236,'33805','Lakeland','Florida','40 Eastwood Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gchicco9y@liveinternet.ru','t-online.de',1,'8639341099',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(360,NULL,'Katleen','kmaciejewski9z','Maciejewski','Flashset',236,'6825','Fairfield','Connecticut','5 Annamark Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kmaciejewski9z@ucsd.edu','sohu.com',1,'2031684249',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(361,NULL,'Kara-lynn','kdurnalla0','Durnall','Brightbean',236,'32909','Palm Bay','Florida','04965 Declaration Road',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'kdurnalla0@sbwire.com','jiathis.com',1,'5612525061',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(362,NULL,'Bernetta','bmacgeaneya1','Mac Geaney','Layo',236,'94627','Oakland','California','84230 Ridge Oak Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'bmacgeaneya1@columbia.edu','ox.ac.uk',1,'5109770100',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(363,NULL,'Lorin','lfaulkesa2','Faulkes','Topicblab',236,'33405','West Palm Beach','Florida','34400 Scofield Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lfaulkesa2@illinois.edu','state.gov',1,'7727795773',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(364,NULL,'Jim','jwickmanna3','Wickmann','Cogilith',236,'92186','San Diego','California','30 Loeprich Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'jwickmanna3@elegantthemes.com','plala.or.jp',1,'6191568473',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(365,NULL,'Rutger','rmattheeuwa4','Mattheeuw','Tagopia',236,'8638','Trenton','New Jersey','7 Marcy Avenue',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'rmattheeuwa4@ucla.edu','pcworld.com',1,'6094165234',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(366,NULL,'Gene','gcuttsa5','Cutts','Gigashots',236,'70820','Baton Rouge','Louisiana','633 Stang Center',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'gcuttsa5@dailymail.co.uk','sohu.com',1,'2252989366',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(367,NULL,'Paul','pbucknalla6','Bucknall','Voonyx',236,'77005','Houston','Texas','597 High Crossing Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'pbucknalla6@abc.net.au','berkeley.edu',1,'2149670668',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(368,NULL,'Loreen','llargenta7','Largent','Quire',236,'85271','Scottsdale','Arizona','289 Mesta Street',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'llargenta7@blogtalkradio.com','163.com',1,'4802660091',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(369,NULL,'Tracey','tmacgregora8','MacGregor','Quatz',236,'32590','Pensacola','Florida','150 Larry Point',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'tmacgregora8@seesaa.net','bloglines.com',1,'8502981259',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(370,NULL,'Sofie','sludla9','Ludl','Jabbersphere',236,'20029','Washington','District of Columbia','3 Nancy Drive',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'sludla9@npr.org','businessweek.com',1,'2024104510',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(371,NULL,'Leilah','lliepinaaa','Liepina','Blognation',236,'14652','Rochester','New York','942 Green Circle',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'lliepinaaa@europa.eu','sakura.ne.jp',1,'5854882753',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(372,NULL,'Dickie','ddonovanab','Donovan','Bluejam',236,'78789','Austin','Texas','12 Service Lane',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ddonovanab@cafepress.com','ftc.gov',1,'5121821715',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(373,NULL,'Arni','aisseleeac','Isselee','Blogtag',236,'50320','Des Moines','Iowa','8 Hintze Plaza',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'aisseleeac@networksolutions.com','blogger.com',1,'5152763249',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(374,NULL,'Aluino','abernardotad','Bernardot','Plambee',236,'60351','Carol Stream','Illinois','066 Jenna Junction',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'abernardotad@businesswire.com','surveymonkey.com',1,'3091075404',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(375,NULL,'Christoforo','ccadoreae','Cadore','Yotz',236,'6538','New Haven','Connecticut','558 7th Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'ccadoreae@acquirethisname.com','hugedomains.com',1,'2032445959',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(376,NULL,'Warner','wskillernaf','Skillern','Quaxo',236,'29220','Columbia','South Carolina','62 Thompson Court',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'wskillernaf@themeforest.net','omniture.com',1,'8035805203',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(377,NULL,'Marcellina','mgaitskillag','Gaitskill','Gigashots',236,'43656','Toledo','Ohio','22988 Carioca Park',1,'2022-11-28 18:56:12',0,2,1,NULL,NULL,NULL,1,'mgaitskillag@rakuten.co.jp','yolasite.com',1,'4196662470',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(378,NULL,'Keene','kderksah','Derks','Dynazzy',236,'7104','Newark','New Jersey','01765 Lotheville Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'kderksah@blogtalkradio.com','tamu.edu',1,'9738480405',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(379,NULL,'Kenton','kjancyai','Jancy','Twitterbridge',236,'75507','Texarkana','Texas','70 Eagle Crest Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'kjancyai@naver.com','examiner.com',1,'9039163608',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(380,NULL,'Josh','jdomnickaj','Domnick','Leenti',236,'20051','Washington','District of Columbia','5 Mallory Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jdomnickaj@indiatimes.com','marriott.com',1,'2028839962',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(381,NULL,'Hasty','hcheekeak','Cheeke','Yamia',236,'92519','Riverside','California','790 Washington Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hcheekeak@mozilla.org','tinypic.com',1,'9517049338',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(382,NULL,'Hollyanne','hzywickial','Zywicki','Kayveo',236,'78210','San Antonio','Texas','1 Arizona Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hzywickial@tripod.com','angelfire.com',1,'2101545305',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(383,NULL,'Cynthie','cdomelawam','Domelaw','Dazzlesphere',236,'98664','Vancouver','Washington','999 Butterfield Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cdomelawam@ucla.edu','ucoz.ru',1,'3609536859',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(384,NULL,'Dolley','dvigusan','Vigus','Wordify',236,'34479','Ocala','Florida','61176 Ridge Oak Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dvigusan@kickstarter.com','surveymonkey.com',1,'3522082612',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(385,NULL,'Cecile','cwerndleyao','Werndley','Jetpulse',236,'80255','Denver','Colorado','3327 Oneill Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cwerndleyao@meetup.com','admin.ch',1,'7203351971',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(386,NULL,'Hobart','hcumberap','Cumber','Bubblebox',236,'52245','Iowa City','Iowa','25 Sage Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hcumberap@earthlink.net','scientificamerican.com',1,'3197056940',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(387,NULL,'Dorree','dhodgonaq','Hodgon','Innotype',236,'85215','Mesa','Arizona','18585 Pleasure Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dhodgonaq@goodreads.com','nhs.uk',1,'6021723161',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(388,NULL,'Barbette','bferriesar','Ferries','Jazzy',236,'94257','Sacramento','California','944 New Castle Point',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bferriesar@bravesites.com','nationalgeographic.com',1,'9168071567',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(389,NULL,'Flore','feggertonas','Eggerton','Realcube',236,'14276','Buffalo','New York','06 Esch Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'feggertonas@friendfeed.com','networksolutions.com',1,'7163277572',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(390,NULL,'Chaim','cfacerat','Facer','Brainbox',236,'79999','El Paso','Texas','05 1st Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cfacerat@imageshack.us','diigo.com',1,'9157168285',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(391,NULL,'Heddi','hmerigonau','Merigon','Blogspan',236,'3105','Manchester','New Hampshire','427 Westerfield Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hmerigonau@sitemeter.com','amazon.co.uk',1,'6038410099',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(392,NULL,'Wheeler','wpartingtonav','Partington','Zoomzone',236,'68105','Omaha','Nebraska','369 Pleasure Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'wpartingtonav@salon.com','soup.io',1,'4027180654',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(393,NULL,'Barris','borwellaw','Orwell','Zoomlounge',236,'63169','Saint Louis','Missouri','2726 Dexter Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'borwellaw@msu.edu','sciencedaily.com',1,'3148693221',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(394,NULL,'Clareta','cfibbensax','Fibbens','Flashpoint',236,'40618','Frankfort','Kentucky','04 Jana Point',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cfibbensax@seattletimes.com','imageshack.us',1,'5027035226',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(395,NULL,'Tucky','tbloomay','Bloom','Jaloo',236,'90071','Los Angeles','California','5 Gulseth Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tbloomay@kickstarter.com','ning.com',1,'3107719728',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(396,NULL,'Lorenza','lmeddingsaz','Meddings','Twiyo',236,'92165','San Diego','California','13194 Corry Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'lmeddingsaz@soup.io','ucla.edu',1,'6196774658',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(397,NULL,'Elvyn','ejovicicb0','Jovicic','Muxo',236,'88553','El Paso','Texas','65 Scoville Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ejovicicb0@engadget.com','tmall.com',1,'9154942075',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(398,NULL,'Lenee','ldursleyb1','Dursley','Vinte',236,'33411','West Palm Beach','Florida','296 Ruskin Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ldursleyb1@soundcloud.com','edublogs.org',1,'9543799073',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(399,NULL,'Tanner','tnovkovicb2','Novkovic','Browsebug',236,'19172','Philadelphia','Pennsylvania','18 Sheridan Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tnovkovicb2@fda.gov','psu.edu',1,'2158770905',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(400,NULL,'Oralle','otrevershb3','Treversh','Ooba',236,'88546','El Paso','Texas','5 Fremont Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'otrevershb3@ftc.gov','sbwire.com',1,'9157855472',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(401,NULL,'Hamlin','hbohjeb4','Bohje','Livetube',236,'1610','Worcester','Massachusetts','06714 Dottie Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hbohjeb4@newsvine.com','pagesperso-orange.fr',1,'5082817807',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(402,NULL,'Read','rwrenb5','Wren','Jamia',236,'76305','Wichita Falls','Texas','06856 Marcy Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rwrenb5@tamu.edu','intel.com',1,'9402543877',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(403,NULL,'Averell','aquinnb6','Quinn','Mydeo',236,'81505','Grand Junction','Colorado','54232 Pleasure Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'aquinnb6@amazon.com','dion.ne.jp',1,'9708239854',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(404,NULL,'Galina','gcharretteb7','Charrette','Fivebridge',236,'24024','Roanoke','Virginia','8 Utah Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'gcharretteb7@dmoz.org','illinois.edu',1,'5402680502',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(405,NULL,'Anica','agwynethb8','Gwyneth','Tagcat',236,'20099','Washington','District of Columbia','78 Calypso Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'agwynethb8@google.nl','reverbnation.com',1,'2024031344',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(406,NULL,'Kleon','knarupb9','Narup','Gabspot',236,'59771','Bozeman','Montana','310 Kipling Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'knarupb9@sourceforge.net','quantcast.com',1,'4062719627',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(407,NULL,'Ban','bamthorba','Amthor','Digitube',236,'77250','Houston','Texas','6 Melody Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bamthorba@wsj.com','de.vu',1,'7137221557',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(408,NULL,'Enrique','eoverstreetbb','Overstreet','Ozu',236,'19892','Wilmington','Delaware','50 Leroy Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'eoverstreetbb@icio.us','ustream.tv',1,'3024590375',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(409,NULL,'Sherman','speyrobc','Peyro','Yoveo',236,'94913','San Rafael','California','56324 Weeping Birch Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'speyrobc@epa.gov','mediafire.com',1,'4155694948',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(410,NULL,'Atlanta','adonanbd','Donan','Yotz',236,'80161','Littleton','Colorado','770 Kropf Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'adonanbd@wunderground.com','ehow.com',1,'3037007251',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(411,NULL,'Sholom','sdunbobinbe','Dunbobin','Cogilith',236,'22205','Arlington','Virginia','9718 Oriole Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'sdunbobinbe@deliciousdays.com','qq.com',1,'7038937129',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(412,NULL,'Alexi','alembckebf','Lembcke','Vinder',236,'98008','Bellevue','Washington','975 Wayridge Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'alembckebf@weather.com','reddit.com',1,'2063970124',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(413,NULL,'Christy','ccargenbg','Cargen','Einti',236,'33034','Homestead','Florida','9711 Arizona Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ccargenbg@pbs.org','cdc.gov',1,'7866313105',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(414,NULL,'Faber','fbalharriebh','Balharrie','Quatz',236,'71161','Shreveport','Louisiana','3139 Crest Line Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'fbalharriebh@w3.org','tuttocitta.it',1,'3182725940',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(415,NULL,'Harlan','hdegenhardtbi','Degenhardt','Yakitri',236,'68505','Lincoln','Nebraska','0 Bunting Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'hdegenhardtbi@photobucket.com','huffingtonpost.com',1,'4027491083',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(416,NULL,'Josi','jpegrambj','Pegram','Chatterpoint',236,'77266','Houston','Texas','4710 Sachtjen Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jpegrambj@bluehost.com','1688.com',1,'8322753070',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(417,NULL,'Guntar','grivalbk','Rival','Agivu',236,'77299','Houston','Texas','5 Hintze Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'grivalbk@desdev.cn','google.com.br',1,'7131365460',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(418,NULL,'Clifford','cabbsbl','Abbs','Brightbean',236,'28314','Fayetteville','North Carolina','3 Pankratz Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cabbsbl@army.mil','yellowbook.com',1,'9103241814',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(419,NULL,'Joelle','jjaxonbm','Jaxon','Omba',236,'78230','San Antonio','Texas','627 Katie Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jjaxonbm@altervista.org','ft.com',1,'2106395737',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(420,NULL,'Ina','imaclarenbn','MacLaren','Flashdog',236,'30316','Atlanta','Georgia','82524 Brown Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'imaclarenbn@nature.com','sohu.com',1,'7701927965',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(421,NULL,'Silvester','shearnshawbo','Hearnshaw','Rhynyx',236,'68517','Lincoln','Nebraska','575 Clarendon Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'shearnshawbo@usa.gov','desdev.cn',1,'4029676662',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(422,NULL,'Ranna','rdanetbp','Danet','Chatterpoint',236,'55573','Young America','Minnesota','3 Ruskin Lane',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rdanetbp@fotki.com','who.int',1,'9523729402',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(423,NULL,'Kimmy','kkenewellbq','Kenewell','Yodoo',236,'37919','Knoxville','Tennessee','230 Kropf Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'kkenewellbq@japanpost.jp','go.com',1,'8657649662',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(424,NULL,'Wadsworth','wgeppbr','Gepp','Tagpad',236,'38131','Memphis','Tennessee','573 Brickson Park Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'wgeppbr@wsj.com','meetup.com',1,'9011071743',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(425,NULL,'Glenna','gsnoddonbs','Snoddon','Chatterpoint',236,'47732','Evansville','Indiana','98 3rd Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'gsnoddonbs@sourceforge.net','photobucket.com',1,'8125811183',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(426,NULL,'Ferrell','fcroallbt','Croall','Fivechat',236,'89110','Las Vegas','Nevada','80 Killdeer Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'fcroallbt@telegraph.co.uk','scientificamerican.com',1,'7029289953',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(427,NULL,'Ofilia','oveltmanbu','Veltman','Yombu',236,'57110','Sioux Falls','South Dakota','2916 Dapin Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'oveltmanbu@house.gov','about.com',1,'6051987839',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(428,NULL,'Kelcie','kfreirebv','Freire','Zava',236,'66276','Shawnee Mission','Kansas','4 Graceland Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'kfreirebv@google.com.hk','mail.ru',1,'9137400231',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(429,NULL,'Byram','bgerriebw','Gerrie','Jabberstorm',236,'95054','Santa Clara','California','925 Susan Pass',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bgerriebw@senate.gov','t-online.de',1,'6503531539',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(430,NULL,'Tory','tdussybx','Dussy','Wikizz',236,'32891','Orlando','Florida','5 Brown Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tdussybx@storify.com','ocn.ne.jp',1,'4071916431',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(431,NULL,'Tanitansy','tlowmanby','Lowman','Topdrive',236,'55115','Saint Paul','Minnesota','4650 Loeprich Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tlowmanby@github.io','xrea.com',1,'9521638245',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(432,NULL,'Mariam','mlooksbz','Looks','Vinder',236,'94616','Oakland','California','57 New Castle Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mlooksbz@nyu.edu','ow.ly',1,'4153908428',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(433,NULL,'Rog','rflelloc0','Flello','Aivee',236,'33758','Clearwater','Florida','2 Kinsman Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rflelloc0@seattletimes.com','mysql.com',1,'8133545289',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(434,NULL,'Seline','sbrattyc1','Bratty','Eazzy',236,'98008','Bellevue','Washington','84 Pleasure Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'sbrattyc1@mapquest.com','time.com',1,'2061574999',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(435,NULL,'Nan','nstrangewayc2','Strangeway','Brightdog',236,'20392','Washington','District of Columbia','45794 Wayridge Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nstrangewayc2@xrea.com','bigcartel.com',1,'2026836573',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(436,NULL,'Starr','strehernec3','Treherne','Skyvu',236,'20599','Washington','District of Columbia','86151 Melody Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'strehernec3@geocities.com','yelp.com',1,'2023008707',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(437,NULL,'Shari','sdumbartonc4','Dumbarton','Eire',236,'32505','Pensacola','Florida','47 Havey Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'sdumbartonc4@istockphoto.com','geocities.com',1,'8502757813',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(438,NULL,'Dell','draddanc5','Raddan','Babbleopia',236,'59806','Missoula','Montana','024 Merchant Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'draddanc5@meetup.com','t.co',1,'4066506236',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(439,NULL,'Alverta','athomkinsc6','Thomkins','Avavee',236,'55436','Minneapolis','Minnesota','704 Bunting Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'athomkinsc6@chronoengine.com','imageshack.us',1,'9523553903',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(440,NULL,'Benoit','bbarronc7','Barron','Zava',236,'23213','Richmond','Virginia','2 Oneill Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bbarronc7@google.nl','istockphoto.com',1,'8044520989',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(441,NULL,'Lacee','leffemyc8','Effemy','Meedoo',236,'73135','Oklahoma City','Oklahoma','4964 Canary Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'leffemyc8@miibeian.gov.cn','washington.edu',1,'4055080204',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(442,NULL,'Dennet','dwicksteadc9','Wickstead','Jabbersphere',236,'85005','Phoenix','Arizona','3728 Dunning Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dwicksteadc9@bloglines.com','netlog.com',1,'4808241151',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(443,NULL,'Bernelle','bdonneelyca','Donneely','Roodel',236,'78265','San Antonio','Texas','99 Lawn Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bdonneelyca@1688.com','ucsd.edu',1,'2102950129',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(444,NULL,'Brandyn','bdrugancb','Drugan','Kwideo',236,'6705','Waterbury','Connecticut','0 Eastwood Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bdrugancb@odnoklassniki.ru','last.fm',1,'2033016961',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(445,NULL,'Mikey','mbyramcc','Byram','Trunyx',236,'78210','San Antonio','Texas','89 Sunnyside Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mbyramcc@csmonitor.com','aol.com',1,'2102152533',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(446,NULL,'Nollie','nscogganscd','Scoggans','Zooveo',236,'20503','Washington','District of Columbia','200 American Ash Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nscogganscd@ovh.net','csmonitor.com',1,'2022423597',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(447,NULL,'Philippa','puzellice','Uzelli','Feedmix',236,'7505','Paterson','New Jersey','62 Evergreen Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'puzellice@imgur.com','soup.io',1,'8625812339',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(448,NULL,'Michail','mlutzmanncf','Lutzmann','Browsetype',236,'34238','Sarasota','Florida','86 Utah Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mlutzmanncf@latimes.com','cpanel.net',1,'9418445262',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(449,'c9973c6fd33560f6b3c11969938abb2d-fe3011cb8b549cdcb98e40b846775ad4','Abbe','ajaniccg','Janic','Cogibox',236,'10310','Staten Island','New York','8 Coleman Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ajaniccg@digg.com','tuttocitta.it',1,'7182253923',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(450,NULL,'Wynn','welsterch','Elster','Ozu',236,'12247','Albany','New York','9 Kenwood Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'welsterch@mozilla.com','oaic.gov.au',1,'5181644940',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(451,NULL,'Carl','ccleminshawci','Cleminshaw','Jayo',236,'77276','Houston','Texas','15 Randy Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ccleminshawci@dion.ne.jp','archive.org',1,'7137585164',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(452,NULL,'Rob','rbenwellcj','Benwell','Trudeo',236,'55423','Minneapolis','Minnesota','09307 Bluestem Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rbenwellcj@china.com.cn','issuu.com',1,'7639852835',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(453,NULL,'Cristiano','ccheccuzzick','Checcuzzi','Innotype',236,'29615','Greenville','South Carolina','55057 Ohio Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ccheccuzzick@economist.com','arizona.edu',1,'8646013918',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(454,NULL,'Rick','rglaubercl','Glauber','Ooba',236,'24034','Roanoke','Virginia','69977 Northport Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rglaubercl@toplist.cz','mashable.com',1,'5404660010',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(455,NULL,'Nikita','nkitchenhamcm','Kitchenham','Roodel',236,'61110','Rockford','Illinois','5184 Dexter Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nkitchenhamcm@ibm.com','pcworld.com',1,'8158990798',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(456,NULL,'Alameda','alucchicn','Lucchi','Meeveo',236,'80209','Denver','Colorado','76 Union Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'alucchicn@netvibes.com','latimes.com',1,'7207212326',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(457,NULL,'Darryl','dyeskinco','Yeskin','Jayo',236,'23272','Richmond','Virginia','9 Gulseth Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dyeskinco@csmonitor.com','ca.gov',1,'8043225060',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(458,NULL,'Enos','eganncp','Gann','Einti',236,'40618','Frankfort','Kentucky','985 Grover Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'eganncp@usda.gov','salon.com',1,'5029105643',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(459,NULL,'Bianca','bobingtoncq','Obington','Mybuzz',236,'2453','Waltham','Massachusetts','9 5th Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bobingtoncq@paypal.com','oracle.com',1,'9787607582',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(460,NULL,'Anatollo','apudsallcr','Pudsall','Gigabox',236,'75705','Tyler','Texas','511 Leroy Pass',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'apudsallcr@blogger.com','mysql.com',1,'9033199154',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(461,NULL,'Cleon','ccoathcs','Coath','Skaboo',236,'33680','Tampa','Florida','14 Ruskin Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ccoathcs@globo.com','ucoz.com',1,'8138262017',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(462,NULL,'Noellyn','ncordierct','Cordier','Camimbo',236,'12227','Albany','New York','9900 Sauthoff Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ncordierct@hhs.gov','amazon.co.jp',1,'5181880669',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(463,NULL,'Lynelle','lestoilecu','Estoile','Devify',236,'91103','Pasadena','California','7 Ridgeway Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'lestoilecu@instagram.com','toplist.cz',1,'6268831063',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(464,NULL,'Tatiania','trulercv','Ruler','Zoomcast',236,'57110','Sioux Falls','South Dakota','14444 Everett Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'trulercv@altervista.org','unblog.fr',1,'6057518937',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(465,NULL,'Mandie','mpullancw','Pullan','Jaxworks',236,'11231','Brooklyn','New York','4162 Erie Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mpullancw@samsung.com','tripod.com',1,'2125514833',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(466,NULL,'Gael','gmcinteecx','McIntee','Riffpath',236,'49560','Grand Rapids','Michigan','46 Merry Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'gmcinteecx@addthis.com','infoseek.co.jp',1,'6161434595',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(467,NULL,'Berget','bpozzicy','Pozzi','Plajo',236,'94177','San Francisco','California','208 Spaight Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bpozzicy@house.gov','hatena.ne.jp',1,'4159365734',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(468,NULL,'Daphene','dpittwoodcz','Pittwood','Chatterpoint',236,'80005','Arvada','Colorado','52 Schlimgen Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dpittwoodcz@examiner.com','cloudflare.com',1,'3031236352',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(469,NULL,'Tammy','tmerwoodd0','Merwood','Abata',236,'95108','San Jose','California','7074 Karstens Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tmerwoodd0@google.pl','mac.com',1,'4085031474',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(470,NULL,'Betta','baucoated1','Aucoate','Einti',236,'36628','Mobile','Alabama','12 Dayton Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'baucoated1@prlog.org','fema.gov',1,'2516241210',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(471,NULL,'Dosi','dwickershamd2','Wickersham','Tagchat',236,'90505','Torrance','California','150 Buena Vista Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dwickershamd2@meetup.com','twitter.com',1,'3101724137',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(472,NULL,'Philippa','pconord3','Conor','Zoombeat',236,'34282','Bradenton','Florida','9389 Truax Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'pconord3@t.co','wisc.edu',1,'9419020400',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(473,NULL,'Nadia','nlinwoodd4','Linwood','Meedoo',236,'40581','Lexington','Kentucky','097 Oak Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nlinwoodd4@elegantthemes.com','rakuten.co.jp',1,'8594005085',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(474,NULL,'Sybilla','sscrivenerd5','Scrivener','Devcast',236,'88574','El Paso','Texas','718 Rusk Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'sscrivenerd5@amazon.com','histats.com',1,'9154957125',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(475,NULL,'Angelita','adillandd6','Dilland','Quimm',236,'32590','Pensacola','Florida','75 Lukken Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'adillandd6@cbsnews.com','huffingtonpost.com',1,'8504720827',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(476,NULL,'Babara','bgrzelczakd7','Grzelczak','Jetpulse',236,'53779','Madison','Wisconsin','8 Thompson Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bgrzelczakd7@nifty.com','census.gov',1,'6084941054',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(477,NULL,'Mitchell','mcoand8','Coan','Digitube',236,'55551','Young America','Minnesota','15382 Caliangt Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mcoand8@angelfire.com','blogger.com',1,'9527605634',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(478,NULL,'Cherlyn','ctoed9','Toe','Feedbug',236,'31106','Atlanta','Georgia','151 Hanson Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ctoed9@mysql.com','constantcontact.com',1,'4042116449',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(479,NULL,'Angelina','amyhanda','Myhan','Dabtype',236,'78710','Austin','Texas','2350 Sachs Point',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'amyhanda@plala.or.jp','twitter.com',1,'5125563926',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(480,NULL,'Fara','fkryszkadb','Kryszka','Feedfire',236,'33499','Boca Raton','Florida','688 Armistice Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'fkryszkadb@bloomberg.com','apple.com',1,'5613625957',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(481,NULL,'Candra','cpiersedc','Pierse','Demizz',236,'30323','Atlanta','Georgia','9 Eastlawn Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cpiersedc@latimes.com','disqus.com',1,'6782095363',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(482,NULL,'Berenice','bsnowmandd','Snowman','Fatz',236,'90020','Los Angeles','California','94 John Wall Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bsnowmandd@geocities.jp','cam.ac.uk',1,'2134028700',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(483,NULL,'Krystalle','kalwayde','Alway','Babbleset',236,'53277','Milwaukee','Wisconsin','8222 Hollow Ridge Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'kalwayde@amazon.co.uk','nasa.gov',1,'4148687574',NULL,0,0,0,0,NULL,0,NULL,0,96.00,NULL),
(484,NULL,'Odille','oflewdf','Flew','Skiptube',236,'84605','Provo','Utah','01315 Kinsman Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'oflewdf@prnewswire.com','jugem.jp',1,'8019964804',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(485,NULL,'Isadore','ilivermoredg','Livermore','Gabvine',236,'33763','Clearwater','Florida','9823 Bayside Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ilivermoredg@tripadvisor.com','buzzfeed.com',1,'7274628012',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(486,NULL,'Ari','abartolommeodh','Bartolommeo','Twitternation',236,'94257','Sacramento','California','288 Sunfield Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'abartolommeodh@hexun.com','sciencedaily.com',1,'9165954585',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(487,NULL,'Dickie','dmcgradydi','McGrady','Trilith',236,'33013','Hialeah','Florida','6 Banding Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dmcgradydi@google.nl','canalblog.com',1,'3054874177',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(488,NULL,'Millie','mlaverydj','Lavery','Voolia',236,'30096','Duluth','Georgia','02278 Fisk Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mlaverydj@surveymonkey.com','netscape.com',1,'7709021517',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(489,NULL,'Augie','akurtendk','Kurten','Fiveclub',236,'34605','Brooksville','Florida','7 Paget Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'akurtendk@wikia.com','bizjournals.com',1,'3528134667',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(490,NULL,'Lila','lgrandissondl','Grandisson','Avamm',236,'77055','Houston','Texas','31025 Dawn Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'lgrandissondl@phoca.cz','reuters.com',1,'2815715896',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(491,NULL,'Worthy','wastondm','Aston','Yodo',236,'55446','Minneapolis','Minnesota','7639 Veith Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'wastondm@creativecommons.org','seattletimes.com',1,'7633272091',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(492,NULL,'Jamie','jodochertydn','O\'Docherty','Rooxo',236,'14215','Buffalo','New York','109 Cordelia Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jodochertydn@blogger.com','microsoft.com',1,'7166954216',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(493,NULL,'Carl','cmiqueletdo','Miquelet','Yozio',236,'2283','Boston','Massachusetts','8354 Fairfield Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cmiqueletdo@vkontakte.ru','google.co.uk',1,'7815347748',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(494,NULL,'Dianne','dviledp','Vile','Skinte',236,'96810','Honolulu','Hawaii','3 Haas Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dviledp@nyu.edu','1688.com',1,'8089534665',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(495,NULL,'Editha','eautydq','Auty','Fivechat',236,'10155','New York City','New York','81576 Moose Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'eautydq@ocn.ne.jp','tripadvisor.com',1,'6467949483',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(496,NULL,'Cornell','cbladedr','Blade','Kwinu',236,'71307','Alexandria','Louisiana','0647 Rutledge Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cbladedr@examiner.com','quantcast.com',1,'3188145067',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(497,NULL,'Marysa','mbaldryds','Baldry','LiveZ',236,'10280','New York City','New York','9018 Manitowish Avenue',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mbaldryds@xing.com','google.de',1,'9174233932',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(498,NULL,'Annabal','awiltshawdt','Wiltshaw','Oozz',236,'48258','Detroit','Michigan','3829 Lillian Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'awiltshawdt@sphinn.com','cyberchimps.com',1,'3138937788',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(499,NULL,'Perceval','palyutindu','Alyutin','Dabvine',236,'30089','Decatur','Georgia','3 Clemons Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'palyutindu@msu.edu','yahoo.com',1,'6783139057',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(500,NULL,'Denny','ddaishdv','Daish','Tagcat',236,'40591','Lexington','Kentucky','43 Vera Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ddaishdv@delicious.com','smh.com.au',1,'8591655664',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(501,NULL,'Noby','nmengodw','Mengo','Rhyzio',236,'78260','San Antonio','Texas','048 Evergreen Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nmengodw@histats.com','tiny.cc',1,'2102687447',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(502,NULL,'Sari','scluerdx','Cluer','Jamia',236,'33954','Port Charlotte','Florida','951 Hoard Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'scluerdx@prnewswire.com','wordpress.com',1,'9416497382',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(503,NULL,'Roseanna','rredborndy','Redborn','Rooxo',236,'70160','New Orleans','Louisiana','3279 Cottonwood Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rredborndy@globo.com','slate.com',1,'5041032972',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(504,NULL,'Ardenia','agaltondz','Galton','Skyvu',236,'77705','Beaumont','Texas','75 Clyde Gallagher Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'agaltondz@zdnet.com','jimdo.com',1,'9364308114',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(505,NULL,'Marnia','mscallane0','Scallan','Centizu',236,'98664','Vancouver','Washington','2 Arapahoe Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mscallane0@people.com.cn','exblog.jp',1,'3606000451',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(506,NULL,'Catherin','cmehmete1','Mehmet','Shufflester',236,'88563','El Paso','Texas','5367 Karstens Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cmehmete1@bing.com','nps.gov',1,'9159824238',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(507,NULL,'Alvie','amaddocke2','Maddock','Twitterbridge',236,'32209','Jacksonville','Florida','0 Sunnyside Terrace',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'amaddocke2@moonfruit.com','abc.net.au',1,'9042936730',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(508,NULL,'Rosalie','rrolinsone3','Rolinson','Meevee',236,'46406','Gary','Indiana','075 Packers Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rrolinsone3@mit.edu','google.com',1,'2195790442',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(509,NULL,'Alexa','aprattone4','Pratton','Kwideo',236,'25726','Huntington','West Virginia','97 Scofield Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'aprattone4@domainmarket.com','studiopress.com',1,'3044610049',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(510,NULL,'Merl','mlauxmanne5','Lauxmann','Jaxnation',236,'84605','Provo','Utah','77 Prairie Rose Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mlauxmanne5@home.pl','yahoo.co.jp',1,'8011896850',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(511,NULL,'Ines','inutbeame6','Nutbeam','Twitterworks',236,'77201','Houston','Texas','451 Artisan Plaza',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'inutbeame6@gnu.org','paginegialle.it',1,'8329675625',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(512,NULL,'Lowrance','lfarrone7','Farron','Linkbuzz',236,'44705','Canton','Ohio','0242 Buena Vista Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'lfarrone7@mapy.cz','e-recht24.de',1,'3303665085',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(513,NULL,'Worth','wrochewelle8','Rochewell','Oozz',236,'93794','Fresno','California','63 Carey Lane',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'wrochewelle8@deliciousdays.com','macromedia.com',1,'5592576608',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(514,NULL,'Court','cyankeeve9','Yankeev','Midel',236,'20016','Washington','District of Columbia','24387 Parkside Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cyankeeve9@addtoany.com','github.com',1,'7037945053',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(515,NULL,'Piotr','probbsea','Robbs','Jayo',236,'40215','Louisville','Kentucky','64 Ridge Oak Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'probbsea@tumblr.com','miibeian.gov.cn',1,'5023427792',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(516,NULL,'Fancy','fmayloreb','Maylor','Voomm',236,'77276','Houston','Texas','38971 Oxford Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'fmayloreb@house.gov','nationalgeographic.com',1,'7138754473',NULL,0,0,0,0,NULL,0,NULL,0,96.00,NULL),
(517,NULL,'Jacquelyn','jgrimseyec','Grimsey','Meembee',236,'78726','Austin','Texas','7203 Glendale Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jgrimseyec@theatlantic.com','samsung.com',1,'5126414441',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(518,NULL,'Rafi','rearpeed','Earpe','Dabshots',236,'32255','Jacksonville','Florida','8836 Forest Run Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rearpeed@printfriendly.com','taobao.com',1,'9044250690',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(519,NULL,'Papageno','pinceee','Ince','Zoomzone',236,'77085','Houston','Texas','0 Cottonwood Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'pinceee@studiopress.com','altervista.org',1,'2818216565',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(520,NULL,'Fredrick','fscollanef','Scollan','Edgewire',236,'99205','Spokane','Washington','6 Steensland Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'fscollanef@mediafire.com','who.int',1,'5092202626',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(521,NULL,'Dawn','ddaetheg','D\'Aeth','Kanoodle',236,'20210','Washington','District of Columbia','474 Hoepker Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ddaetheg@usatoday.com','indiegogo.com',1,'2028377710',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(522,NULL,'York','ytwitchetteh','Twitchett','Rhyzio',236,'68510','Lincoln','Nebraska','36586 Packers Pass',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ytwitchetteh@bloomberg.com','admin.ch',1,'4026901064',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(523,NULL,'Meredith','mdallossoei','Dallosso','Gigashots',236,'39534','Biloxi','Mississippi','2162 Mandrake Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'mdallossoei@slate.com','newyorker.com',1,'2287113873',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(524,NULL,'Lou','lfarthingej','Farthing','Yodoo',236,'28055','Gastonia','North Carolina','48691 Emmet Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'lfarthingej@hibu.com','wikimedia.org',1,'7044020156',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(525,NULL,'Alla','adivallek','Divall','Fivebridge',236,'30336','Atlanta','Georgia','6 School Crossing',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'adivallek@nih.gov','xinhuanet.com',1,'4047374732',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(526,NULL,'Gennifer','gvasyutochkinel','Vasyutochkin','Skinder',236,'40505','Lexington','Kentucky','33 Chive Alley',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'gvasyutochkinel@t.co','free.fr',1,'8598954118',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(527,NULL,'Christyna','cjerzykiewiczem','Jerzykiewicz','Dabshots',236,'20566','Washington','District of Columbia','6931 Towne Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cjerzykiewiczem@statcounter.com','cbsnews.com',1,'2024145638',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(528,NULL,'Tami','tmesseren','Messer','Babblestorm',236,'29403','Charleston','South Carolina','94 Eastwood Point',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tmesseren@japanpost.jp','chron.com',1,'8434466869',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(529,NULL,'Shirley','stimmiseo','Timmis','Kwideo',236,'16522','Erie','Pennsylvania','94 Colorado Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'stimmiseo@china.com.cn','webnode.com',1,'8141416468',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(530,NULL,'Grata','gwinbornep','Winborn','Yozio',236,'66160','Kansas City','Kansas','3 Hauk Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'gwinbornep@ft.com','icq.com',1,'9135111600',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(531,NULL,'Cristie','cpitchereq','Pitcher','Rhyzio',236,'20220','Washington','District of Columbia','93 Roxbury Point',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cpitchereq@desdev.cn','sina.com.cn',1,'2027147469',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(532,NULL,'Skylar','shanner','Hann','Flashdog',236,'52410','Cedar Rapids','Iowa','83959 Granby Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'shanner@chron.com','nydailynews.com',1,'3197469846',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(533,NULL,'Jeannette','jneles','Nel','Blogtags',236,'79491','Lubbock','Texas','339 Ridge Oak Parkway',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jneles@ucoz.com','cornell.edu',1,'8068716952',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(534,NULL,'Dominik','dstranioet','Stranio','Yodo',236,'43610','Toledo','Ohio','12 Hansons Hill',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'dstranioet@miibeian.gov.cn','nyu.edu',1,'4196345454',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(535,NULL,'Rachael','rbassindaleeu','Bassindale','Rooxo',236,'77266','Houston','Texas','2 Vera Lane',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rbassindaleeu@amazon.com','godaddy.com',1,'8324873186',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(536,NULL,'Padraic','planteev','Lante','Jayo',236,'32969','Vero Beach','Florida','656 Graedel Lane',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'planteev@multiply.com','github.io',1,'7729713655',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(537,NULL,'Reagan','rbecconsallew','Becconsall','Browseblab',236,'40591','Lexington','Kentucky','64890 Anniversary Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rbecconsallew@loc.gov','xing.com',1,'8593331807',NULL,0,0,0,0,NULL,0,NULL,0,97.00,NULL),
(538,NULL,'Russell','rgroomex','Groom','Thoughtsphere',236,'14220','Buffalo','New York','7578 Bunker Hill Trail',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'rgroomex@bigcartel.com','si.edu',1,'7164784041',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(539,NULL,'Betteanne','billesleyey','Illesley','Dabfeed',236,'19892','Wilmington','Delaware','87 Farragut Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'billesleyey@stumbleupon.com','free.fr',1,'3029243472',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(540,NULL,'Charissa','ceppez','Epp','Oyope',236,'77030','Houston','Texas','4752 Bunting Court',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ceppez@people.com.cn','qq.com',1,'7131810591',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(541,NULL,'Arda','aodamsf0','Odams','Eidel',236,'92186','San Diego','California','400 Lien Circle',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'aodamsf0@cmu.edu','smh.com.au',1,'6195583338',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(542,NULL,'Juan','jwyonf1','Wyon','Gigaclub',236,'80045','Aurora','Colorado','5024 Fairfield Drive',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jwyonf1@springer.com','arizona.edu',1,'3033203785',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(543,NULL,'Theodor','tdezamoraf2','de Zamora','Skilith',236,'40596','Lexington','Kentucky','2953 Marcy Park',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'tdezamoraf2@mtv.com','yandex.ru',1,'8599177144',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(544,NULL,'Janice','jresunf3','Resun','Vinder',236,'49444','Muskegon','Michigan','6 Sage Street',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'jresunf3@tamu.edu','naver.com',1,'2314067298',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(545,NULL,'Caroljean','cdepperf4','Depper','Yozio',236,'32277','Jacksonville','Florida','58907 Jana Junction',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'cdepperf4@omniture.com','pcworld.com',1,'9042045352',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(546,NULL,'Nanete','nmirfinf5','Mirfin','Vimbo',236,'11480','Jamaica','New York','7 Eggendart Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'nmirfinf5@smh.com.au','latimes.com',1,'7187244542',NULL,0,0,0,0,NULL,0,NULL,0,35.00,NULL),
(547,NULL,'Evaleen','ebeldersonf6','Belderson','Lazz',236,'21216','Baltimore','Maryland','8166 Spenser Center',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'ebeldersonf6@sakura.ne.jp','amazon.com',1,'4107828572',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(548,NULL,'Benn','balawayf7','Alaway','Feedbug',236,'23277','Richmond','Virginia','722 Corry Road',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'balawayf7@cafepress.com','meetup.com',1,'8042499761',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(549,NULL,'Martha','msherf8','Sher','Photobug',236,'61614','Peoria','Illinois','16 Jana Way',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'msherf8@cbsnews.com','360.cn',1,'3093033241',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(550,NULL,'Brewster','bluciaf9','Lucia','Demivee',236,'88589','El Paso','Texas','6 Lillian Place',1,'2022-11-28 18:56:13',0,2,1,NULL,NULL,NULL,1,'bluciaf9@npr.org','dailymail.co.uk',1,'9153423348',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(551,NULL,'Marshal','mrumminfa','Rummin','Youspan',236,'20195','Reston','Virginia','933 Sage Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mrumminfa@xinhuanet.com','is.gd',1,'7037626111',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(552,NULL,'Godard','gfoulkesfb','Foulkes','Gabspot',236,'46614','South Bend','Indiana','0 Monument Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gfoulkesfb@about.com','is.gd',1,'5748065410',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(553,NULL,'Jesus','jskokoefc','Skokoe','Feedmix',236,'2745','New Bedford','Massachusetts','092 Nobel Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jskokoefc@surveymonkey.com','edublogs.org',1,'5086513696',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(554,NULL,'Niki','ndowdellfd','Dowdell','Blogtag',236,'43204','Columbus','Ohio','18 Caliangt Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ndowdellfd@taobao.com','census.gov',1,'6143081990',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(555,NULL,'Gerard','gderobertisfe','De Robertis','Dazzlesphere',236,'28305','Fayetteville','North Carolina','4963 Hauk Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gderobertisfe@theatlantic.com','typepad.com',1,'9106078522',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(556,NULL,'Gareth','gaeryff','Aery','Zoonoodle',236,'77055','Houston','Texas','35 Emmet Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gaeryff@over-blog.com','msn.com',1,'7138177689',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(557,NULL,'Karolina','kyockneyfg','Yockney','Rooxo',236,'96815','Honolulu','Hawaii','95 Hoepker Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kyockneyfg@twitter.com','wiley.com',1,'8085201419',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(558,NULL,'Ronica','rarkillfh','Arkill','Voonyx',236,'52804','Davenport','Iowa','0609 Pepper Wood Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rarkillfh@fc2.com','wsj.com',1,'5634201092',NULL,0,0,0,0,NULL,0,NULL,0,20.00,NULL),
(559,NULL,'Lemuel','leyerfi','Eyer','Trudeo',236,'64199','Kansas City','Missouri','27 Kings Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'leyerfi@dot.gov','merriam-webster.com',1,'8161441751',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(560,NULL,'Adorne','aweichfj','Weich','Gigashots',236,'79410','Lubbock','Texas','0 Waxwing Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'aweichfj@so-net.ne.jp','ft.com',1,'8067445669',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(561,NULL,'Annabella','akeppfk','Kepp','JumpXS',236,'31132','Atlanta','Georgia','64 Schurz Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'akeppfk@senate.gov','columbia.edu',1,'4049261339',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(562,NULL,'Darby','ddunderdalefl','Dunderdale','Jetpulse',236,'50393','Des Moines','Iowa','51 Jana Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ddunderdalefl@weather.com','blogger.com',1,'5158613674',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(563,NULL,'Ruthanne','rollingtonfm','Ollington','Skilith',236,'98185','Seattle','Washington','988 Kipling Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rollingtonfm@over-blog.com','woothemes.com',1,'2068247080',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(564,NULL,'Phylys','pseccombefn','Seccombe','Skajo',236,'92505','Riverside','California','74776 Eagle Crest Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pseccombefn@123-reg.co.uk','kickstarter.com',1,'9098234285',NULL,0,0,0,0,NULL,0,NULL,0,96.00,NULL),
(565,NULL,'Roana','rdilletfo','Dillet','Rhynoodle',236,'33742','Saint Petersburg','Florida','4365 Elgar Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rdilletfo@rediff.com','ehow.com',1,'7276262550',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(566,NULL,'Burtie','brohlfsfp','Rohlfs','Photolist',236,'50315','Des Moines','Iowa','03 American Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'brohlfsfp@phoca.cz','amazon.co.uk',1,'5158098612',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(567,NULL,'Zorana','zmccritchiefq','McCritchie','Meezzy',236,'60614','Chicago','Illinois','5834 Merrick Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'zmccritchiefq@jugem.jp','rakuten.co.jp',1,'7734508838',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(568,NULL,'Meredithe','mkaesmakersfr','Kaesmakers','Tambee',236,'32575','Pensacola','Florida','9 Monument Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mkaesmakersfr@t-online.de','go.com',1,'8509758169',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(569,NULL,'Korey','kfishbyfs','Fishby','Photofeed',236,'23242','Richmond','Virginia','31 Sunbrook Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kfishbyfs@statcounter.com','jigsy.com',1,'8045295923',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(570,NULL,'Zahara','zwicherft','Wicher','Divanoodle',236,'79176','Amarillo','Texas','5058 Bunting Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'zwicherft@sphinn.com','posterous.com',1,'8062271482',NULL,0,0,0,0,NULL,0,NULL,0,20.00,NULL),
(571,NULL,'Elka','esheardfu','Sheard','Zoomdog',236,'78225','San Antonio','Texas','32 American Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'esheardfu@independent.co.uk','uol.com.br',1,'2102434445',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(572,NULL,'Mariya','mmingayefv','Mingaye','Zooveo',236,'94142','San Francisco','California','3298 East Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mmingayefv@lycos.com','house.gov',1,'4158443826',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(573,NULL,'Dorey','dbilliardfw','Billiard','Topdrive',236,'44105','Cleveland','Ohio','8687 Erie Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dbilliardfw@google.nl','shop-pro.jp',1,'2164335579',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(574,NULL,'Tanny','torganfx','Organ','Yamia',236,'30351','Atlanta','Georgia','7303 Shoshone Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'torganfx@technorati.com','edublogs.org',1,'4048353676',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(575,NULL,'Almeta','athickinsfy','Thickins','Tazzy',236,'65110','Jefferson City','Missouri','3051 Weeping Birch Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'athickinsfy@ustream.tv','unc.edu',1,'5737408189',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(576,NULL,'Sara','spolkinghornefz','Polkinghorne','Skilith',236,'37924','Knoxville','Tennessee','16 Porter Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'spolkinghornefz@comcast.net','bbb.org',1,'8658657279',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(577,NULL,'Sheff','schittimg0','Chittim','Browsebug',236,'50362','Des Moines','Iowa','43388 Ruskin Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'schittimg0@rambler.ru','shinystat.com',1,'5156535563',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(578,NULL,'Reeba','rmunsong1','Munson','Zoozzy',236,'20005','Washington','District of Columbia','99087 Comanche Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rmunsong1@ning.com','ehow.com',1,'2025789192',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(579,NULL,'Joyce','jbusselg2','Bussel','Tagpad',236,'2163','Boston','Massachusetts','14 Pierstorff Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jbusselg2@gnu.org','wsj.com',1,'6175510938',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(580,NULL,'Micheil','mdalleyg3','Dalley','Skyba',236,'89595','Reno','Nevada','6639 Loeprich Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mdalleyg3@google.es','cnn.com',1,'7757483373',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(581,NULL,'Darya','dgemeaug4','Gemeau','Shuffletag',236,'20041','Washington','District of Columbia','48 6th Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dgemeaug4@ox.ac.uk','patch.com',1,'7038649902',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(582,NULL,'Hugh','hmitchellg5','Mitchell','Mycat',236,'61614','Peoria','Illinois','0941 Magdeline Road',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'hmitchellg5@yandex.ru','posterous.com',1,'3092385928',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(583,NULL,'Laurie','lslotg6','Slot','Photobug',236,'6127','West Hartford','Connecticut','45 Clyde Gallagher Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'lslotg6@cargocollective.com','europa.eu',1,'8605463576',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(584,NULL,'Gary','gmacgillg7','MacGill','Camimbo',236,'53220','Milwaukee','Wisconsin','73926 Arkansas Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gmacgillg7@furl.net','blog.com',1,'4146038293',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(585,NULL,'Kanya','kdreyeg8','Dreye','Abata',236,'55565','Monticello','Minnesota','53538 Mifflin Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kdreyeg8@dion.ne.jp','nifty.com',1,'7633691117',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(586,NULL,'Sybilla','sfayerg9','Fayer','Ntags',236,'26505','Morgantown','West Virginia','21 Ridgeway Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sfayerg9@51.la','usgs.gov',1,'3042384501',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(587,NULL,'Saw','sfurstga','Furst','Skiptube',236,'44305','Akron','Ohio','88 Northridge Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sfurstga@phoca.cz','cbsnews.com',1,'3308888974',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(588,NULL,'Agnese','acowlasgb','Cowlas','Skibox',236,'53726','Madison','Wisconsin','25 Doe Crossing Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'acowlasgb@imageshack.us','examiner.com',1,'6083277278',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(589,NULL,'Clifford','ctrodlergc','Trodler','Innotype',236,'37235','Nashville','Tennessee','6239 Hermina Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ctrodlergc@un.org','shutterfly.com',1,'6151934153',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(590,NULL,'Davon','dfebrygd','Febry','Twitternation',236,'77346','Humble','Texas','773 Farmco Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dfebrygd@unblog.fr','printfriendly.com',1,'7137807809',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(591,NULL,'Kit','kcorkelge','Corkel','Zava',236,'88553','El Paso','Texas','14 Schiller Road',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kcorkelge@ifeng.com','macromedia.com',1,'9152160275',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(592,NULL,'Jervis','jiannellogf','Iannello','Meedoo',236,'92640','Fullerton','California','30 Tomscot Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jiannellogf@homestead.com','google.com.br',1,'5599150517',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(593,NULL,'Antons','akendrewgg','Kendrew','Mita',236,'40576','Lexington','Kentucky','2 Chinook Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'akendrewgg@ed.gov','altervista.org',1,'8598737016',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(594,NULL,'Dusty','dbeechgh','Beech','Abata',236,'96154','South Lake Tahoe','California','48 Stang Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dbeechgh@printfriendly.com','cnn.com',1,'5301464967',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(595,NULL,'Cherianne','celenergi','Elener','Vinder',236,'75705','Tyler','Texas','437 Everett Center',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'celenergi@imdb.com','mysql.com',1,'9034587456',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(596,NULL,'Addy','ahamalgj','Hamal','Kazio',236,'37220','Nashville','Tennessee','5 Mifflin Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ahamalgj@zdnet.com','over-blog.com',1,'6156518248',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(597,NULL,'Sharai','sclemensgk','Clemens','Zoozzy',236,'63169','Saint Louis','Missouri','08 Artisan Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sclemensgk@thetimes.co.uk','issuu.com',1,'3144893921',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(598,NULL,'Konrad','kmabbottgl','Mabbott','Eazzy',236,'15235','Pittsburgh','Pennsylvania','9034 Messerschmidt Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kmabbottgl@seattletimes.com','weibo.com',1,'7247063424',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(599,NULL,'Fania','frickeardgm','Rickeard','Geba',236,'53234','Milwaukee','Wisconsin','1 Dexter Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'frickeardgm@amazon.com','nhs.uk',1,'4141460470',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(600,NULL,'Colman','cdyettgn','Dyett','Shufflebeat',236,'10705','Yonkers','New York','18352 East Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cdyettgn@omniture.com','ow.ly',1,'9149549595',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(601,NULL,'Arturo','aglassongo','Glasson','Pixonyx',236,'19109','Philadelphia','Pennsylvania','5 Hallows Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'aglassongo@va.gov','pen.io',1,'2678118946',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(602,NULL,'Dyana','dertgp','Ert','Flipbug',236,'38143','Memphis','Tennessee','5 Pierstorff Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dertgp@comcast.net','zdnet.com',1,'9011366316',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(603,NULL,'Jamima','jbreedegq','Breede','Mymm',236,'36205','Anniston','Alabama','090 Ludington Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jbreedegq@e-recht24.de','feedburner.com',1,'2564517627',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(604,NULL,'Geri','ggrigsgr','Grigs','Yodo',236,'30351','Atlanta','Georgia','567 Doe Crossing Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ggrigsgr@hud.gov','ovh.net',1,'4041022791',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(605,NULL,'Archambault','asandallgs','Sandall','Livetube',236,'77250','Houston','Texas','09582 Shoshone Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'asandallgs@dagondesign.com','posterous.com',1,'7134348015',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(606,NULL,'Cale','cvaggersgt','Vaggers','Twitterbridge',236,'73190','Oklahoma City','Oklahoma','53103 Carioca Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cvaggersgt@cnbc.com','discovery.com',1,'4051414450',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(607,NULL,'Farris','fbaynomgu','Baynom','Agivu',236,'48295','Detroit','Michigan','2803 Northfield Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'fbaynomgu@google.nl','prnewswire.com',1,'3133627001',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(608,NULL,'Audy','atomblingv','Tomblin','Skinte',236,'91205','Glendale','California','96149 Tomscot Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'atomblingv@state.tx.us','example.com',1,'3236182924',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(609,NULL,'Gill','gjenkengw','Jenken','Photospace',236,'73142','Oklahoma City','Oklahoma','723 Forster Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gjenkengw@delicious.com','qq.com',1,'4058245536',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(610,NULL,'Jan','jsuttlegx','Suttle','Shuffletag',236,'46226','Indianapolis','Indiana','70 Lotheville Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jsuttlegx@storify.com','ycombinator.com',1,'3171639909',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(611,NULL,'Maurine','mcowndengy','Cownden','Dazzlesphere',236,'83757','Boise','Idaho','15481 Tennyson Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mcowndengy@tripadvisor.com','mail.ru',1,'2081383245',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(612,NULL,'Kala','kwebbgz','Webb','Linkbuzz',236,'10454','Bronx','New York','82 Hooker Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kwebbgz@storify.com','senate.gov',1,'7182391802',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(613,NULL,'Carlynn','cdouganh0','Dougan','Jetwire',236,'79165','Amarillo','Texas','15724 Duke Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cdouganh0@github.com','java.com',1,'8062340451',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(614,NULL,'Wilhelm','wclausiush1','Clausius','Browsebug',236,'32830','Orlando','Florida','34 Spohn Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'wclausiush1@amazon.co.jp','mtv.com',1,'4075802603',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(615,NULL,'Alisander','aormanh2','Orman','Skippad',236,'7505','Paterson','New Jersey','2458 Valley Edge Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'aormanh2@51.la','seesaa.net',1,'8627761930',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(616,NULL,'Adolphus','agamesonh3','Gameson','Riffpedia',236,'72118','North Little Rock','Arkansas','4 Springs Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'agamesonh3@cargocollective.com','sogou.com',1,'5016732644',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(617,NULL,'Odey','oscroobyh4','Scrooby','Ntags',236,'76192','Fort Worth','Texas','42303 Mayfield Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'oscroobyh4@uiuc.edu','google.co.uk',1,'6827835730',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(618,NULL,'Daveen','dchristauffourh5','Christauffour','Voolith',236,'70116','New Orleans','Louisiana','6 Arizona Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dchristauffourh5@umich.edu','census.gov',1,'5044496196',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(619,NULL,'Bondie','bdrohanh6','Drohan','Kwinu',236,'40256','Louisville','Kentucky','3792 Steensland Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bdrohanh6@devhub.com','ftc.gov',1,'5027605354',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(620,NULL,'Dewie','dskentelburyh7','Skentelbury','Skippad',236,'46852','Fort Wayne','Indiana','41 Roxbury Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dskentelburyh7@linkedin.com','thetimes.co.uk',1,'2604102736',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(621,NULL,'Morgana','mdalbyh8','Dalby','Mymm',236,'64101','Kansas City','Missouri','10 Hoffman Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mdalbyh8@cmu.edu','naver.com',1,'8162594887',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(622,NULL,'Maurine','mgarardh9','Garard','Fliptune',236,'8104','Camden','New Jersey','4592 Dixon Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mgarardh9@yandex.ru','google.com.au',1,'8563131788',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(623,NULL,'Dita','dlawleffha','Lawleff','Realmix',236,'30311','Atlanta','Georgia','0 Dottie Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dlawleffha@zimbio.com','posterous.com',1,'7705457047',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(624,NULL,'Franz','fphythonhb','Phython','Meedoo',236,'64109','Kansas City','Missouri','646 Larry Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'fphythonhb@economist.com','pcworld.com',1,'8164927883',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(625,NULL,'Agata','asofehc','Sofe','Tekfly',236,'55146','Saint Paul','Minnesota','17442 Loftsgordon Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'asofehc@examiner.com','reuters.com',1,'6518646707',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(626,NULL,'Thane','tbudgetthd','Budgett','Voomm',236,'85083','Phoenix','Arizona','289 Nelson Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tbudgetthd@jigsy.com','diigo.com',1,'6027399707',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(627,NULL,'Phil','pbadwickhe','Badwick','Wikido',236,'44177','Cleveland','Ohio','1 Summer Ridge Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pbadwickhe@gov.uk','wikispaces.com',1,'4407753627',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(628,NULL,'Orson','obretthf','Brett','Yakitri',236,'48224','Detroit','Michigan','36 Fisk Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'obretthf@cafepress.com','drupal.org',1,'3135823560',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(629,NULL,'Peterus','pfillerhg','Filler','Skibox',236,'92424','San Bernardino','California','924 Little Fleur Center',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pfillerhg@google.co.uk','unicef.org',1,'9096316430',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(630,NULL,'Carey','cbeglinhh','Beglin','Tagfeed',236,'95894','Sacramento','California','32 Dixon Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cbeglinhh@chicagotribune.com','sitemeter.com',1,'9161589254',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(631,NULL,'Harley','hverdeyhi','Verdey','Demizz',236,'16107','New Castle','Pennsylvania','665 Fairfield Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'hverdeyhi@nih.gov','mapy.cz',1,'7249895688',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(632,NULL,'Vasili','vmaccarterhj','MacCarter','Avaveo',236,'7195','Newark','New Jersey','0652 Coleman Center',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'vmaccarterhj@google.com','list-manage.com',1,'8627890675',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(633,NULL,'Karyn','ksiebarthk','Siebart','Ooba',236,'29416','Charleston','South Carolina','1 Eastlawn Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ksiebarthk@taobao.com','zdnet.com',1,'8434173206',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(634,NULL,'Lelia','lpaxefordhl','Paxeford','Tagfeed',236,'99252','Spokane','Washington','071 Buell Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'lpaxefordhl@naver.com','nyu.edu',1,'5093810592',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(635,NULL,'Zondra','zlandorhm','Landor','Ainyx',236,'76305','Wichita Falls','Texas','28 Esker Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'zlandorhm@is.gd','pen.io',1,'9403347153',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(636,NULL,'Renato','rchitsonhn','Chitson','Skinix',236,'45238','Cincinnati','Ohio','75331 Maywood Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rchitsonhn@tuttocitta.it','wufoo.com',1,'5138663149',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(637,NULL,'Jaime','jeteenho','Eteen','Realbuzz',236,'55448','Minneapolis','Minnesota','65557 Kingsford Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jeteenho@webnode.com','spiegel.de',1,'6123479846',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(638,NULL,'Royce','rarnohp','Arno','Abata',236,'11215','Brooklyn','New York','3562 Westend Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rarnohp@umn.edu','freewebs.com',1,'7187520830',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(639,NULL,'Barrie','bpickardhq','Pickard','Leexo',236,'80299','Denver','Colorado','87 Del Sol Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bpickardhq@timesonline.co.uk','oakley.com',1,'7205162066',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(640,NULL,'Ches','cgilleasehr','Gillease','Rhyzio',236,'20167','Sterling','Virginia','9 Debs Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cgilleasehr@blogger.com','flavors.me',1,'5715263917',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(641,NULL,'Josselyn','jgaffeyhs','Gaffey','Youtags',236,'77090','Houston','Texas','6 Golden Leaf Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jgaffeyhs@fda.gov','sciencedaily.com',1,'8326171048',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(642,NULL,'Kally','kodohertyht','O\'Doherty','Feedfish',236,'14269','Buffalo','New York','63 Sauthoff Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'kodohertyht@jugem.jp','hud.gov',1,'7165689373',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(643,NULL,'Gloria','gshorthillhu','Shorthill','Vinte',236,'33075','Pompano Beach','Florida','21801 Leroy Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gshorthillhu@ca.gov','e-recht24.de',1,'7544899333',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(644,NULL,'Laurena','lhambribehv','Hambribe','Jabbersphere',236,'63143','Saint Louis','Missouri','55 Schlimgen Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'lhambribehv@flickr.com','bloomberg.com',1,'3143871959',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(645,NULL,'Joela','jkinighw','Kinig','Agivu',236,'35205','Birmingham','Alabama','97010 Macpherson Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jkinighw@etsy.com','youku.com',1,'2055211710',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(646,NULL,'Thatcher','thonnicotthx','Honnicott','Wordtune',236,'64082','Lees Summit','Missouri','066 Ryan Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'thonnicotthx@woothemes.com','prweb.com',1,'8169782888',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(647,NULL,'Vi','vmansionhy','Mansion','Photobug',236,'27621','Raleigh','North Carolina','1 Moose Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'vmansionhy@posterous.com','fastcompany.com',1,'9193478427',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(648,NULL,'Golda','gbraundshz','Braunds','Linkbuzz',236,'99812','Juneau','Alaska','781 Pepper Wood Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gbraundshz@google.nl','trellian.com',1,'9077945140',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(649,NULL,'Corabelle','cloraini0','Lorain','Thoughtstorm',236,'98115','Seattle','Washington','7 Dwight Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cloraini0@imdb.com','issuu.com',1,'2067208197',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(650,NULL,'Tonye','titzchakyi1','Itzchaky','Feedfire',236,'66642','Topeka','Kansas','66429 Carpenter Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'titzchakyi1@nps.gov','usgs.gov',1,'7854358181',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(651,NULL,'Even','ezanettinii2','Zanettini','Digitube',236,'36641','Mobile','Alabama','5 Pine View Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ezanettinii2@plala.or.jp','disqus.com',1,'2513084912',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(652,NULL,'Pepi','pmarvelleyi3','Marvelley','Kwinu',236,'37235','Nashville','Tennessee','09 Superior Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pmarvelleyi3@skype.com','desdev.cn',1,'6152329783',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(653,NULL,'Doll','dchurchmani4','Churchman','Vidoo',236,'75392','Dallas','Texas','340 Columbus Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dchurchmani4@jalbum.net','sciencedirect.com',1,'2147631991',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(654,NULL,'Trey','tdorricotti5','Dorricott','Voonyx',236,'92415','San Bernardino','California','170 Hoard Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tdorricotti5@dell.com','squidoo.com',1,'7601684244',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(655,NULL,'Shari','smacelroyi6','MacElroy','Miboo',236,'76210','Denton','Texas','2 Fair Oaks Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'smacelroyi6@craigslist.org','weather.com',1,'9406386742',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(656,NULL,'Terrance','tlahertyi7','Laherty','Eabox',236,'98411','Tacoma','Washington','40332 Trailsway Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tlahertyi7@list-manage.com','stumbleupon.com',1,'2534353621',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(657,NULL,'Flin','flittlechildi8','Littlechild','Blogspan',236,'99512','Anchorage','Alaska','05 Sundown Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'flittlechildi8@skype.com','t-online.de',1,'9078802742',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(658,NULL,'Yuri','yceschellii9','Ceschelli','Nlounge',236,'91199','Pasadena','California','489 Evergreen Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'yceschellii9@webnode.com','blogtalkradio.com',1,'6263852486',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(659,NULL,'Dana','dbrucksteinia','Bruckstein','Tazzy',236,'77090','Houston','Texas','7662 Gale Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dbrucksteinia@tamu.edu','adobe.com',1,'2812896950',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(660,NULL,'Shane','spearlmanib','Pearlman','Innotype',236,'60604','Chicago','Illinois','938 Katie Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'spearlmanib@psu.edu','toplist.cz',1,'7083432264',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(661,NULL,'Inna','ilacroutzic','Lacroutz','Edgeclub',236,'78715','Austin','Texas','2 Bellgrove Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ilacroutzic@intel.com','cbslocal.com',1,'5126786097',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(662,NULL,'Shaylynn','sarntzenid','Arntzen','Kimia',236,'66105','Kansas City','Kansas','2 Carey Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sarntzenid@networkadvertising.org','va.gov',1,'9137810211',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(663,NULL,'Phaidra','pcallissie','Calliss','Snaptags',236,'47905','Lafayette','Indiana','87 Norway Maple Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pcallissie@bing.com','a8.net',1,'7653707884',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(664,NULL,'Alaric','acantillionif','Cantillion','Brainsphere',236,'8104','Camden','New Jersey','95 Loomis Pass',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'acantillionif@ted.com','flickr.com',1,'8564583898',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(665,NULL,'Gabbey','gbilbreyig','Bilbrey','Tanoodle',236,'79159','Amarillo','Texas','44330 Acker Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'gbilbreyig@issuu.com','gizmodo.com',1,'8068508112',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(666,NULL,'Brigida','bgiblinih','Giblin','Browseblab',236,'79452','Lubbock','Texas','58980 La Follette Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bgiblinih@last.fm','google.com',1,'8067978577',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(667,NULL,'Brewer','bsandifordii','Sandiford','Vipe',236,'94132','San Francisco','California','5662 Del Mar Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bsandifordii@prnewswire.com','amazon.co.uk',1,'4152310230',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(668,NULL,'Catlin','ctomsonij','Tomson','Babbleblab',236,'10120','New York City','New York','2161 Kedzie Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ctomsonij@hao123.com','yale.edu',1,'2126429119',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(669,NULL,'Bunny','bcolmanik','Colman','Topicstorm',236,'91199','Pasadena','California','3254 Springs Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bcolmanik@123-reg.co.uk','nymag.com',1,'6265864421',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(670,NULL,'Sonnie','sphiferil','Phifer','Zoomdog',236,'77095','Houston','Texas','0 Lakewood Gardens Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sphiferil@java.com','earthlink.net',1,'7134105796',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(671,NULL,'Lisetta','lharmstoneim','Harmstone','Abatz',236,'95813','Sacramento','California','48 Arrowood Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'lharmstoneim@slideshare.net','dion.ne.jp',1,'9163122516',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(672,NULL,'Sherie','sgladechein','Gladeche','Photobug',236,'32819','Orlando','Florida','7158 Harbort Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'sgladechein@goodreads.com','woothemes.com',1,'4077166226',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(673,NULL,'Ilsa','isaunderio','Saunder','Feednation',236,'60636','Chicago','Illinois','14 Northview Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'isaunderio@gravatar.com','stanford.edu',1,'7736051087',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(674,NULL,'Pete','pfromantip','Fromant','Ainyx',236,'23228','Richmond','Virginia','624 Nevada Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pfromantip@redcross.org','msu.edu',1,'8049807141',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(675,NULL,'Dorothea','dfarensiq','Farens','Nlounge',236,'10125','New York City','New York','78 Springview Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dfarensiq@wp.com','blinklist.com',1,'2128171919',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(676,NULL,'Jacky','jbertir','Bert','Gigabox',236,'74193','Tulsa','Oklahoma','459 Scoville Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jbertir@sciencedaily.com','biglobe.ne.jp',1,'9187412997',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(677,NULL,'Marlene','mdobbinsonis','Dobbinson','Vimbo',236,'74149','Tulsa','Oklahoma','91 Bunker Hill Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mdobbinsonis@dyndns.org','quantcast.com',1,'9188877960',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(678,NULL,'Cherie','cwitchellit','Witchell','Centizu',236,'92640','Fullerton','California','97 Menomonie Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cwitchellit@thetimes.co.uk','wordpress.org',1,'5593131232',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(679,NULL,'Alessandra','arobersiu','Robers','Skimia',236,'93150','Santa Barbara','California','9961 Lakeland Road',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'arobersiu@yahoo.com','delicious.com',1,'8051579944',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(680,NULL,'Maxi','mclemmowiv','Clemmow','Jabbersphere',236,'15266','Pittsburgh','Pennsylvania','5392 Nevada Parkway',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mclemmowiv@ezinearticles.com','go.com',1,'7502081',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(681,NULL,'Coral','cfarrowiw','Farrow','Realfire',236,'65211','Columbia','Missouri','459 Dottie Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cfarrowiw@unicef.org','springer.com',1,'5739312931',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(682,NULL,'Teddie','tikinix','Ikin','Avamm',236,'44485','Warren','Ohio','5408 Kings Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tikinix@pen.io','geocities.jp',1,'3304566919',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(683,NULL,'Larissa','lmcreynoldiy','McReynold','Zooveo',236,'40215','Louisville','Kentucky','1 Brentwood Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'lmcreynoldiy@google.nl','google.pl',1,'5028240867',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(684,NULL,'Patten','ptillsiz','Tills','Jaxspan',236,'65211','Columbia','Missouri','421 Pankratz Park',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ptillsiz@tumblr.com','columbia.edu',1,'5734424922',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(685,NULL,'Wenda','wmaffuccij0','Maffucci','Trupe',236,'58505','Bismarck','North Dakota','58494 Lake View Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'wmaffuccij0@163.com','51.la',1,'7019968205',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(686,NULL,'Nap','npettengellj1','Pettengell','Youspan',236,'44315','Akron','Ohio','17829 Badeau Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'npettengellj1@weather.com','soup.io',1,'3302203927',NULL,0,0,0,0,NULL,0,NULL,0,76.00,NULL),
(687,NULL,'Rodrigo','rsewardj2','Seward','Quimm',236,'95128','San Jose','California','83 Riverside Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rsewardj2@patch.com','elegantthemes.com',1,'7142308713',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(688,NULL,'Delphine','dsabaterj3','Sabater','Thoughtstorm',236,'95138','San Jose','California','8 Sugar Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dsabaterj3@imdb.com','vimeo.com',1,'4086328107',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(689,NULL,'Adrian','aneseyj4','Nesey','Snaptags',236,'3105','Manchester','New Hampshire','9 Scoville Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'aneseyj4@freewebs.com','sogou.com',1,'6034655900',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(690,NULL,'Clary','cmacmichaelj5','MacMichael','Skynoodle',236,'37416','Chattanooga','Tennessee','3401 Northland Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cmacmichaelj5@dropbox.com','sbwire.com',1,'4231301793',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(691,NULL,'Carmencita','cvarnej6','Varne','Babbleblab',236,'92186','San Diego','California','07 Hintze Place',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cvarnej6@rakuten.co.jp','cam.ac.uk',1,'6196493479',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(692,NULL,'Christen','cevinsj7','Evins','Vinder',236,'33158','Miami','Florida','8 Burning Wood Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'cevinsj7@pagesperso-orange.fr','woothemes.com',1,'7862307175',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(693,NULL,'Domenic','dratledgej8','Ratledge','Rhyzio',236,'33018','Hialeah','Florida','99313 Manley Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dratledgej8@cisco.com','admin.ch',1,'7869515358',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(694,NULL,'Tymon','tdittyj9','Ditty','Tanoodle',236,'20420','Washington','District of Columbia','624 Scofield Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tdittyj9@baidu.com','mediafire.com',1,'2022710497',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(695,NULL,'Magdalena','myansonja','Yanson','Kaymbo',236,'28289','Charlotte','North Carolina','96874 Roxbury Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'myansonja@foxnews.com','mapquest.com',1,'7049174433',NULL,0,0,0,0,NULL,0,NULL,0,20.00,NULL),
(696,NULL,'Helaina','hfoxleyjb','Foxley','Thoughtstorm',236,'95838','Sacramento','California','86118 Memorial Point',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'hfoxleyjb@cnet.com','1und1.de',1,'9164113208',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(697,NULL,'Devlen','dmewittjc','Mewitt','Browseblab',236,'60624','Chicago','Illinois','9032 Lawn Junction',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dmewittjc@example.com','house.gov',1,'7736046380',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(698,NULL,'Jamesy','jclemitsjd','Clemits','Trilith',236,'83732','Boise','Idaho','37345 Prentice Street',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'jclemitsjd@fema.gov','gravatar.com',1,'2089600837',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(699,NULL,'Dasha','dgarronje','Garron','Gigabox',236,'46247','Indianapolis','Indiana','2 Glendale Court',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'dgarronje@webeden.co.uk','cisco.com',1,'3173746711',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(700,NULL,'Tamma','tgulvinjf','Gulvin','Zoombox',236,'50315','Des Moines','Iowa','1 Oak Valley Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tgulvinjf@networkadvertising.org','ow.ly',1,'5155120729',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(701,NULL,'Margret','mrisebarerjg','Risebarer','Oyonder',236,'20414','Washington','District of Columbia','36708 Logan Road',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mrisebarerjg@jugem.jp','msu.edu',1,'2024397625',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(702,NULL,'Teresita','tkingabyjh','Kingaby','Realblab',236,'12255','Albany','New York','28 School Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'tkingabyjh@whitehouse.gov','toplist.cz',1,'5185718036',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(703,NULL,'Carver','caucklandji','Auckland','Thoughtsphere',236,'31165','Atlanta','Georgia','3 Kipling Lane',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'caucklandji@parallels.com','storify.com',1,'4044943116',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(704,NULL,'Evelyn','echazerandjj','Chazerand','Linkbuzz',236,'66215','Shawnee Mission','Kansas','24344 Buena Vista Drive',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'echazerandjj@who.int','skype.com',1,'9134232237',NULL,0,0,0,0,NULL,0,NULL,0,2.00,NULL),
(705,NULL,'Ardis','ahardenjk','Harden','Centimia',236,'55108','Saint Paul','Minnesota','72 Gina Hill',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ahardenjk@prweb.com','chron.com',1,'6518715024',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(706,NULL,'Salem','shansodjl','Hansod','Snaptags',236,'11431','Jamaica','New York','5 Beilfuss Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'shansodjl@vistaprint.com','deviantart.com',1,'2129889017',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(707,NULL,'Mart','mstickinsjm','Stickins','Eidel',236,'70820','Baton Rouge','Louisiana','28 Stone Corner Trail',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'mstickinsjm@icio.us','google.com',1,'2251709912',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(708,NULL,'Reinald','rguswelljn','Guswell','Youopia',236,'44505','Youngstown','Ohio','91 Mesta Circle',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'rguswelljn@dailymail.co.uk','prnewswire.com',1,'3303308239',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(709,NULL,'Dennis','ddudgeonjo','Dudgeon','Oyoyo',236,'75049','Garland','Texas','27008 Heffernan Terrace',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'ddudgeonjo@wp.com','mail.ru',1,'2142953142',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(710,NULL,'Paddy','pmurrigansjp','Murrigans','Devcast',236,'33805','Lakeland','Florida','0086 Scott Road',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pmurrigansjp@tripadvisor.com','disqus.com',1,'8635612869',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(711,NULL,'Bat','beckersalljq','Eckersall','Blogpad',236,'73190','Oklahoma City','Oklahoma','3 Sachtjen Avenue',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'beckersalljq@ucoz.com','un.org',1,'4056835754',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(712,NULL,'Annnora','aghelarduccijr','Ghelarducci','Twitterwire',236,'79165','Amarillo','Texas','00999 Pearson Crossing',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'aghelarduccijr@prweb.com','tinypic.com',1,'8067638964',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(713,NULL,'Petronia','pildenjs','Ilden','Twiyo',236,'36605','Mobile','Alabama','97148 Union Way',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'pildenjs@themeforest.net','feedburner.com',1,'2514714163',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(714,NULL,'Ephraim','estanyonjt','Stanyon','Edgeclub',236,'60614','Chicago','Illinois','62 Jackson Alley',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'estanyonjt@engadget.com','t-online.de',1,'3124430996',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(715,NULL,'Burton','bblooreju','Bloore','Quimba',236,'24004','Roanoke','Virginia','737 Meadow Valley Plaza',1,'2022-11-28 18:56:14',0,2,1,NULL,NULL,NULL,1,'bblooreju@timesonline.co.uk','shareasale.com',1,'5408299450',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(716,NULL,'Philippa','pcheccuzzijv','Checcuzzi','Roombo',236,'40233','Louisville','Kentucky','73647 Mendota Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pcheccuzzijv@tinypic.com','wikipedia.org',1,'5024516049',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(717,NULL,'Ody','ogrichukhanovjw','Grichukhanov','Thoughtmix',236,'40266','Louisville','Kentucky','56012 Johnson Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ogrichukhanovjw@newyorker.com','squidoo.com',1,'5027594046',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(718,NULL,'Bradan','bpavlatajx','Pavlata','Meemm',236,'76905','San Angelo','Texas','90 Cherokee Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bpavlatajx@symantec.com','fc2.com',1,'3256806144',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(719,NULL,'Carlynne','cgynnijy','Gynni','Meevee',236,'75062','Irving','Texas','221 Mandrake Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cgynnijy@digg.com','cyberchimps.com',1,'2142112617',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(720,NULL,'Rory','rgetcliffejz','Getcliffe','Katz',236,'20057','Washington','District of Columbia','4425 Glendale Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rgetcliffejz@amazon.com','amazon.com',1,'2029546177',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(721,NULL,'Eolanda','erhodesk0','Rhodes','Topicware',236,'70124','New Orleans','Louisiana','751 Sauthoff Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'erhodesk0@sciencedaily.com','va.gov',1,'5041223058',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(722,NULL,'Rania','rflintuffk1','Flintuff','Centimia',236,'79769','Odessa','Texas','540 5th Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rflintuffk1@dmoz.org','theglobeandmail.com',1,'4321805400',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(723,NULL,'Jedd','jtemplemank2','Templeman','Talane',236,'77713','Beaumont','Texas','883 Cody Park',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jtemplemank2@parallels.com','ameblo.jp',1,'9366831186',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(724,NULL,'Marcela','mlangrishk3','Langrish','Wikibox',236,'92705','Santa Ana','California','766 Fallview Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mlangrishk3@usnews.com','gnu.org',1,'3103880026',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(725,NULL,'Laird','lkiffek4','Kiffe','Yambee',236,'46814','Fort Wayne','Indiana','0941 Rutledge Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lkiffek4@google.cn','wikia.com',1,'2601635982',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(726,NULL,'Addy','amcelhinneyk5','McElhinney','Voolia',236,'77386','Spring','Texas','6641 New Castle Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'amcelhinneyk5@wikimedia.org','japanpost.jp',1,'2814277328',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(727,NULL,'Bert','bmelhuishk6','Melhuish','Skinix',236,'60567','Naperville','Illinois','828 Shopko Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bmelhuishk6@twitpic.com','ox.ac.uk',1,'6302903744',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(728,NULL,'Alvy','apouldenk7','Poulden','Snaptags',236,'20041','Washington','District of Columbia','77 7th Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'apouldenk7@disqus.com','google.co.jp',1,'7033411265',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(729,NULL,'Cody','cpartenerk8','Partener','Eadel',236,'20260','Washington','District of Columbia','691 Chinook Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cpartenerk8@oracle.com','businessinsider.com',1,'2026478840',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(730,NULL,'Rudie','rgreetk9','Greet','Yotz',236,'78415','Corpus Christi','Texas','9 North Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rgreetk9@g.co','vinaora.com',1,'3618101325',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(731,NULL,'Lily','lrentollka','Rentoll','Skaboo',236,'19131','Philadelphia','Pennsylvania','58721 Darwin Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lrentollka@indiegogo.com','jigsy.com',1,'2155099837',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(732,NULL,'Carling','ccorssenkb','Corssen','Talane',236,'98127','Seattle','Washington','50900 Bluestem Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ccorssenkb@smugmug.com','meetup.com',1,'2063241968',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(733,NULL,'Hanan','hcodronkc','Codron','Brightbean',236,'55417','Minneapolis','Minnesota','33092 Barby Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'hcodronkc@ehow.com','epa.gov',1,'6129653667',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(734,NULL,'Freddy','flumsdenkd','Lumsden','Zoozzy',236,'46699','South Bend','Indiana','30379 Grayhawk Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'flumsdenkd@pen.io','opensource.org',1,'5749315736',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(735,NULL,'Farand','fcrumpeke','Crumpe','Twitterbridge',236,'33320','Fort Lauderdale','Florida','06 Lukken Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'fcrumpeke@adobe.com','blog.com',1,'7545586799',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(736,NULL,'Merrie','mmccluneykf','McCluney','Fiveclub',236,'20370','Washington','District of Columbia','4 4th Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mmccluneykf@un.org','etsy.com',1,'2027932893',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(737,NULL,'Moselle','mpeevorkg','Peevor','Voonyx',236,'46814','Fort Wayne','Indiana','1 Sundown Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mpeevorkg@t.co','blogspot.com',1,'2609246623',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(738,NULL,'Garret','gkerridgekh','Kerridge','Yadel',236,'60351','Carol Stream','Illinois','22674 Ohio Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gkerridgekh@typepad.com','craigslist.org',1,'3099839852',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(739,NULL,'Melvin','mbarrowcliffeki','Barrowcliffe','Leenti',236,'33064','Pompano Beach','Florida','610 Bartelt Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mbarrowcliffeki@fema.gov','ibm.com',1,'9545249160',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(740,NULL,'Lyon','lnealkj','Neal','Shuffletag',236,'66617','Topeka','Kansas','896 Chive Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lnealkj@meetup.com','parallels.com',1,'7857315584',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(741,NULL,'Menard','mhamssonkk','Hamsson','Omba',236,'40510','Lexington','Kentucky','0 Butterfield Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mhamssonkk@reverbnation.com','domainmarket.com',1,'8597573420',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(742,NULL,'Inigo','itrevaskisskl','Trevaskiss','Snaptags',236,'77299','Houston','Texas','25499 Burning Wood Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'itrevaskisskl@nsw.gov.au','weebly.com',1,'7134026060',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(743,NULL,'Giavani','ggentkm','Gent','Skibox',236,'35231','Birmingham','Alabama','83881 Sundown Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ggentkm@mlb.com','nba.com',1,'2052878054',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(744,NULL,'Misti','mfettiskn','Fettis','Browseblab',236,'60614','Chicago','Illinois','90302 Pleasure Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mfettiskn@apache.org','tripod.com',1,'7732839130',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(745,NULL,'Rosemaria','rthurbyko','Thurby','Demimbu',236,'33310','Fort Lauderdale','Florida','91 School Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rthurbyko@t.co','sciencedirect.com',1,'7549463578',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(746,NULL,'Demetria','dsergantkp','Sergant','Jetpulse',236,'37416','Chattanooga','Tennessee','20907 Duke Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'dsergantkp@webs.com','furl.net',1,'4238468276',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(747,NULL,'Isidore','iambergkq','Amberg','Twitterbeat',236,'32969','Vero Beach','Florida','135 Grim Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'iambergkq@smh.com.au','symantec.com',1,'7721174921',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(748,NULL,'Roseanna','rpetrushankokr','Petrushanko','Bluezoom',236,'22313','Alexandria','Virginia','054 Dapin Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rpetrushankokr@cam.ac.uk','nymag.com',1,'5718919400',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(749,NULL,'Damien','dobeyks','Obey','Brightbean',236,'84403','Ogden','Utah','22715 Pine View Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'dobeyks@themeforest.net','spotify.com',1,'8012684483',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(750,NULL,'Oralie','ojarvillekt','Jarville','Kanoodle',236,'85083','Phoenix','Arizona','5338 Vermont Point',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ojarvillekt@mit.edu','unblog.fr',1,'6025453341',NULL,0,0,0,0,NULL,0,NULL,0,61.00,NULL),
(751,NULL,'Spense','ssteetku','Steet','Tavu',236,'33355','Fort Lauderdale','Florida','62316 Sherman Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ssteetku@yahoo.com','jimdo.com',1,'7545827635',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(752,NULL,'Phil','pdargiekv','Dargie','Riffwire',236,'90025','Los Angeles','California','83 Nelson Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pdargiekv@bloomberg.com','is.gd',1,'8188643578',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(753,NULL,'Selie','smcvittykw','McVitty','Aibox',236,'46202','Indianapolis','Indiana','7393 Katie Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'smcvittykw@elpais.com','myspace.com',1,'3172614075',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(754,NULL,'Jard','jmaccostyekx','MacCostye','Pixoboo',236,'49006','Kalamazoo','Michigan','606 Magdeline Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jmaccostyekx@plala.or.jp','nbcnews.com',1,'2697932981',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(755,NULL,'Deerdre','dcapelingky','Capeling','Eazzy',236,'89036','North Las Vegas','Nevada','36426 Basil Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'dcapelingky@wufoo.com','imageshack.us',1,'7028661434',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(756,NULL,'Viv','vlougheedkz','Lougheed','Fatz',236,'85030','Phoenix','Arizona','8 Maryland Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'vlougheedkz@reuters.com','nature.com',1,'6025794089',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(757,NULL,'Estella','epaolonel0','Paolone','Yacero',236,'20220','Washington','District of Columbia','25 Golf Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'epaolonel0@nationalgeographic.com','sakura.ne.jp',1,'2028540305',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(758,NULL,'Rasla','rbawdonl1','Bawdon','Miboo',236,'84130','Salt Lake City','Utah','3273 Merchant Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rbawdonl1@hc360.com','usatoday.com',1,'8016808377',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(759,NULL,'Benyamin','bdamrell2','Damrel','Skyndu',236,'56944','Washington','District of Columbia','8 Luster Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bdamrell2@geocities.com','redcross.org',1,'2024275160',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(760,NULL,'Kris','kbattlesonl3','Battleson','Jabbersphere',236,'40510','Lexington','Kentucky','41 Mandrake Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'kbattlesonl3@is.gd','about.com',1,'8597130576',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(761,NULL,'Fitzgerald','fbrokl4','Brok','Demimbu',236,'14905','Elmira','New York','8091 Mifflin Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'fbrokl4@myspace.com','scientificamerican.com',1,'6077563188',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(762,NULL,'Gonzales','grolfel5','Rolfe','Latz',236,'94089','Sunnyvale','California','4071 Everett Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'grolfel5@facebook.com','samsung.com',1,'4081762649',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(763,NULL,'Marcos','mgandersl6','Ganders','Photobug',236,'38114','Memphis','Tennessee','59 Glacier Hill Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mgandersl6@deliciousdays.com','illinois.edu',1,'9016633885',NULL,0,0,0,0,NULL,0,NULL,0,89.00,NULL),
(764,NULL,'Rosetta','raugurl7','Augur','Jaxworks',236,'79491','Lubbock','Texas','13697 Fairfield Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'raugurl7@youtu.be','is.gd',1,'8062194277',NULL,0,0,0,0,NULL,0,NULL,0,64.00,NULL),
(765,NULL,'Maude','mskurrayl8','Skurray','Nlounge',236,'98166','Seattle','Washington','77011 Hooker Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mskurrayl8@mail.ru','npr.org',1,'2539555817',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(766,NULL,'Leland','lbeartupl9','Beartup','Roomm',236,'80235','Denver','Colorado','4 Oriole Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lbeartupl9@washingtonpost.com','toplist.cz',1,'3031025483',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(767,NULL,'Mariellen','mwysomela','Wysome','Myworks',236,'84110','Salt Lake City','Utah','79123 Village Green Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mwysomela@wiley.com','webmd.com',1,'8012727392',NULL,0,0,0,0,NULL,0,NULL,0,15.00,NULL),
(768,NULL,'Chelsey','cinchcomblb','Inchcomb','Babbleset',236,'30358','Atlanta','Georgia','800 Fulton Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cinchcomblb@theatlantic.com','unc.edu',1,'4042829121',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(769,NULL,'Christiane','cgudyerlc','Gudyer','Bluezoom',236,'36689','Mobile','Alabama','44 Oneill Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cgudyerlc@elegantthemes.com','amazonaws.com',1,'2516876880',NULL,0,0,0,0,NULL,0,NULL,0,56.00,NULL),
(770,NULL,'Rikki','rlabroueld','Labroue','Chatterpoint',236,'75387','Dallas','Texas','112 Corben Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rlabroueld@clickbank.net','google.fr',1,'2146930019',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(771,NULL,'Lukas','lmacandreisle','MacAndreis','Flipbug',236,'87505','Santa Fe','New Mexico','0195 East Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lmacandreisle@ucsd.edu','acquirethisname.com',1,'5056590329',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(772,NULL,'Bartholemy','blorenzinilf','Lorenzini','Riffwire',236,'78278','San Antonio','Texas','37 Mariners Cove Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'blorenzinilf@amazon.co.jp','geocities.com',1,'2104173366',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(773,NULL,'Selene','sstirruplg','Stirrup','Feedfire',236,'36109','Montgomery','Alabama','637 Grim Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'sstirruplg@alexa.com','studiopress.com',1,'3349240361',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(774,NULL,'Benedict','bwahnckelh','Wahncke','Skimia',236,'48092','Warren','Michigan','7 Clyde Gallagher Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bwahnckelh@deviantart.com','cbc.ca',1,'5864720364',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(775,NULL,'Gus','genticknapli','Enticknap','Dabvine',236,'2905','Providence','Rhode Island','592 Burrows Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'genticknapli@tripadvisor.com','live.com',1,'4017007969',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(776,NULL,'Pamella','pdawkeslj','Dawkes','Centizu',236,'91411','Van Nuys','California','19 Ridgeway Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pdawkeslj@php.net','google.com.br',1,'2137198523',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(777,NULL,'Sofie','svinaulk','Vinau','Dynabox',236,'75342','Dallas','Texas','5945 Merchant Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'svinaulk@ameblo.jp','shinystat.com',1,'9723539698',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(778,NULL,'Artemis','amarstonll','Marston','Photobean',236,'20260','Washington','District of Columbia','2 Dunning Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'amarstonll@blogs.com','lycos.com',1,'2024293268',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(779,NULL,'Lynn','lneeveslm','Neeves','Lajo',236,'11231','Brooklyn','New York','90 Westridge Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lneeveslm@indiatimes.com','fastcompany.com',1,'2127397570',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(780,NULL,'Kelcy','kgreensiteln','Greensite','Demimbu',236,'94245','Sacramento','California','17 Butternut Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'kgreensiteln@spotify.com','thetimes.co.uk',1,'9165102911',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(781,NULL,'Clemence','csmylielo','Smylie','Feedfire',236,'20883','Gaithersburg','Maryland','4972 Bultman Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'csmylielo@cmu.edu','altervista.org',1,'2408368316',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(782,NULL,'Nollie','nloiseaulp','L\'oiseau','Tagpad',236,'77010','Houston','Texas','28044 Stang Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'nloiseaulp@discuz.net','1und1.de',1,'7139552443',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(783,NULL,'Matthew','mbiswelllq','Biswell','Vitz',236,'33185','Miami','Florida','24 Thackeray Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mbiswelllq@so-net.ne.jp','wikia.com',1,'3058674537',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(784,NULL,'Filberto','fdartelr','Darte','Yata',236,'11225','Brooklyn','New York','76919 Straubel Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'fdartelr@netvibes.com','blogspot.com',1,'7188532486',NULL,0,0,0,0,NULL,0,NULL,0,10.00,NULL),
(785,NULL,'Colleen','csevinls','Sevin','Jaxnation',236,'89178','Las Vegas','Nevada','348 Meadow Valley Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'csevinls@digg.com','geocities.jp',1,'7025965455',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(786,NULL,'Jobyna','jleprevostlt','Le Prevost','Skibox',236,'40220','Louisville','Kentucky','4987 Amoth Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jleprevostlt@wired.com','sphinn.com',1,'5028319661',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(787,NULL,'Carly','cmillettlu','Millett','Midel',236,'36616','Mobile','Alabama','81849 Moland Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cmillettlu@zimbio.com','gmpg.org',1,'2512953545',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(788,NULL,'Jeremie','jmowsdilllv','Mowsdill','Thoughtmix',236,'35210','Birmingham','Alabama','300 Russell Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jmowsdilllv@tamu.edu','skyrock.com',1,'3346548582',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(789,NULL,'Berkeley','bhebblewaitelw','Hebblewaite','Talane',236,'35810','Huntsville','Alabama','492 Sachtjen Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bhebblewaitelw@e-recht24.de','bravesites.com',1,'2563288959',NULL,0,0,0,0,NULL,0,NULL,0,2.00,NULL),
(790,NULL,'Marisa','mfuggleslx','Fuggles','Oba',236,'90065','Los Angeles','California','92 Burning Wood Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mfuggleslx@latimes.com','foxnews.com',1,'8189974670',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(791,NULL,'Sharron','sledinghamly','Ledingham','Myworks',236,'32835','Orlando','Florida','9 Saint Paul Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'sledinghamly@ocn.ne.jp','ezinearticles.com',1,'4072186547',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(792,NULL,'Skipp','schicklz','Chick','Yadel',236,'78260','San Antonio','Texas','5514 Little Fleur Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'schicklz@networksolutions.com','mit.edu',1,'2104985241',NULL,0,0,0,0,NULL,0,NULL,0,58.00,NULL),
(793,NULL,'Jilleen','jstrainem0','Straine','Buzzster',236,'79699','Abilene','Texas','3 Service Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jstrainem0@livejournal.com','taobao.com',1,'3256873753',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(794,NULL,'Paige','pdutnallm1','Dutnall','Gabvine',236,'78710','Austin','Texas','841 North Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pdutnallm1@oaic.gov.au','cdc.gov',1,'5122971399',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(795,NULL,'Birk','beggintonm2','Egginton','Oyoyo',236,'98447','Tacoma','Washington','62 Melody Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'beggintonm2@accuweather.com','symantec.com',1,'2532346760',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(796,NULL,'Ralina','rcaressm3','Caress','Tagfeed',236,'33018','Hialeah','Florida','8581 Shopko Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rcaressm3@seesaa.net','cafepress.com',1,'7869450084',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(797,NULL,'Aland','amomerym4','Momery','Edgeclub',236,'93034','Oxnard','California','90 Vera Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'amomerym4@gov.uk','facebook.com',1,'8059023144',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(798,NULL,'Porter','ptrembathm5','Trembath','Wikibox',236,'91797','Pomona','California','51439 Cascade Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ptrembathm5@exblog.jp','umn.edu',1,'9099561747',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(799,NULL,'Ninnetta','nmesserm6','Messer','Ooba',236,'66105','Kansas City','Kansas','6 Nancy Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'nmesserm6@ameblo.jp','webs.com',1,'9133057247',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(800,NULL,'Gianna','gmarsonm7','Marson','Yakijo',236,'89130','Las Vegas','Nevada','4467 Oxford Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gmarsonm7@moonfruit.com','chicagotribune.com',1,'7028519045',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(801,NULL,'Odo','ogrichukhanovm8','Grichukhanov','Agivu',236,'77085','Houston','Texas','305 Marcy Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ogrichukhanovm8@cnet.com','guardian.co.uk',1,'2814200138',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(802,NULL,'Robyn','rkopacekm9','Kopacek','Jabberstorm',236,'93740','Fresno','California','9376 Village Green Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rkopacekm9@tripod.com','twitpic.com',1,'5597542131',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(803,NULL,'Baryram','bengallma','Engall','Minyx',236,'64125','Kansas City','Missouri','211 Sunbrook Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bengallma@vimeo.com','multiply.com',1,'8167422460',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(804,NULL,'Kimbra','krosenkrantzmb','Rosenkrantz','Linkbridge',236,'90840','Long Beach','California','991 Express Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'krosenkrantzmb@gizmodo.com','unc.edu',1,'5628865280',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(805,NULL,'Garwin','gwallegemc','Wallege','Photospace',236,'73152','Oklahoma City','Oklahoma','771 Marquette Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gwallegemc@bandcamp.com','slideshare.net',1,'4058149666',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(806,NULL,'Tirrell','tmiddupmd','Middup','Quimba',236,'70142','New Orleans','Louisiana','670 Fallview Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tmiddupmd@webmd.com','uol.com.br',1,'5049627332',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(807,NULL,'Trev','tharrhyme','Harrhy','Agimba',236,'19172','Philadelphia','Pennsylvania','6531 Hooker Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tharrhyme@bbb.org','opera.com',1,'2156107366',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(808,NULL,'Kirsten','kfebremf','Febre','Zoomcast',236,'31405','Savannah','Georgia','082 Johnson Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'kfebremf@facebook.com','oracle.com',1,'9123315196',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(809,NULL,'Idaline','iwarrickmg','Warrick','Wordify',236,'85077','Phoenix','Arizona','885 American Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'iwarrickmg@yahoo.co.jp','fda.gov',1,'6021018332',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(810,NULL,'Alejandro','aholbymh','Holby','Brainlounge',236,'8650','Trenton','New Jersey','59 Melrose Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'aholbymh@abc.net.au','mapquest.com',1,'6097566205',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(811,NULL,'Olive','ocotheymi','Cothey','Twitterworks',236,'39236','Jackson','Mississippi','1 Buell Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ocotheymi@samsung.com','alexa.com',1,'6012581042',NULL,0,0,0,0,NULL,0,NULL,0,44.00,NULL),
(812,NULL,'Herc','hmctrustriemj','McTrustrie','Aimbo',236,'28805','Asheville','North Carolina','18125 Havey Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'hmctrustriemj@msu.edu','taobao.com',1,'8284410703',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(813,NULL,'Bogart','belfittmk','Elfitt','Skaboo',236,'46207','Indianapolis','Indiana','9725 Spohn Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'belfittmk@opensource.org','themeforest.net',1,'3172131774',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(814,NULL,'Hugibert','htroughtonml','Troughton','Kare',236,'44393','Akron','Ohio','251 Towne Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'htroughtonml@java.com','bravesites.com',1,'2343015421',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(815,NULL,'Terese','tpascallmm','Pascall','Realblab',236,'21229','Baltimore','Maryland','4754 Mayer Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tpascallmm@si.edu','over-blog.com',1,'4109132778',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(816,NULL,'Rube','rflippinimn','Flippini','Riffwire',236,'33064','Pompano Beach','Florida','800 Golf Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rflippinimn@google.cn','cnn.com',1,'3051058628',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(817,NULL,'Riccardo','rberthomiermo','Berthomier','Quimba',236,'34745','Kissimmee','Florida','9 Londonderry Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rberthomiermo@cloudflare.com','japanpost.jp',1,'4071341179',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(818,NULL,'Jamesy','jtewnionmp','Tewnion','Thoughtbeat',236,'10310','Staten Island','New York','52205 Arapahoe Park',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jtewnionmp@washingtonpost.com','go.com',1,'7186086552',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(819,NULL,'Prentice','pbattermq','Batter','Photobug',236,'79769','Odessa','Texas','42368 Sauthoff Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pbattermq@cdc.gov','skyrock.com',1,'4324588262',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(820,NULL,'Oates','onettingmr','Netting','Ntags',236,'79165','Amarillo','Texas','9 Kennedy Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'onettingmr@digg.com','wired.com',1,'8069291590',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(821,NULL,'Vassili','vblatchfordms','Blatchford','Latz',236,'19120','Philadelphia','Pennsylvania','605 Jay Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'vblatchfordms@nsw.gov.au','flickr.com',1,'6101517537',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(822,NULL,'Hunt','hcreelmanmt','Creelman','Skiptube',236,'64136','Kansas City','Missouri','91 Old Gate Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'hcreelmanmt@oakley.com','fotki.com',1,'8169586139',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(823,NULL,'Gerta','glecordiermu','Lecordier','Browseblab',236,'43240','Columbus','Ohio','063 Lunder Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'glecordiermu@sohu.com','hhs.gov',1,'7401324481',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(824,NULL,'Shirleen','slipscombemv','Lipscombe','Reallinks',236,'92640','Fullerton','California','537 Hooker Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'slipscombemv@reference.com','lulu.com',1,'5592314572',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(825,NULL,'Milka','mbullantmw','Bullant','Browsetype',236,'78225','San Antonio','Texas','2 Southridge Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mbullantmw@nymag.com','sphinn.com',1,'2103549145',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(826,NULL,'Marielle','mdefreynemx','De Freyne','Twitterbridge',236,'92127','San Diego','California','578 Bellgrove Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mdefreynemx@people.com.cn','bing.com',1,'6194714879',NULL,0,0,0,0,NULL,0,NULL,0,18.00,NULL),
(827,NULL,'Cooper','clyttonmy','Lytton','Thoughtsphere',236,'94105','San Francisco','California','0 Merrick Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'clyttonmy@bandcamp.com','wikipedia.org',1,'3104108605',NULL,0,0,0,0,NULL,0,NULL,0,29.00,NULL),
(828,NULL,'Nicholle','nrowlingsmz','Rowlings','Fanoodle',236,'72199','North Little Rock','Arkansas','78 Anhalt Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'nrowlingsmz@pinterest.com','surveymonkey.com',1,'5014001754',NULL,0,0,0,0,NULL,0,NULL,0,67.00,NULL),
(829,NULL,'Taryn','tvannonin0','Vannoni','Jaxspan',236,'27415','Greensboro','North Carolina','35 La Follette Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tvannonin0@telegraph.co.uk','hubpages.com',1,'3364433934',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(830,NULL,'Rivi','rkirsopn1','Kirsop','Mybuzz',236,'30089','Decatur','Georgia','22943 Dwight Pass',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rkirsopn1@spotify.com','godaddy.com',1,'4049803503',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(831,NULL,'Michell','mchilcottn2','Chilcott','Oozz',236,'78783','Austin','Texas','1 Packers Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mchilcottn2@economist.com','answers.com',1,'5122105488',NULL,0,0,0,0,NULL,0,NULL,0,50.00,NULL),
(832,NULL,'Charleen','cbrezlawn3','Brezlaw','Tavu',236,'33421','West Palm Beach','Florida','7 Lillian Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cbrezlawn3@nasa.gov','livejournal.com',1,'5619842643',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(833,NULL,'Wenona','wvyeln4','Vyel','Divanoodle',236,'55436','Minneapolis','Minnesota','1497 Dahle Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'wvyeln4@gnu.org','blogtalkradio.com',1,'6123094396',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(834,NULL,'Leonanie','lsigwardn5','Sigward','Flashpoint',236,'81005','Pueblo','Colorado','21359 Caliangt Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lsigwardn5@statcounter.com','cloudflare.com',1,'7194376173',NULL,0,0,0,0,NULL,0,NULL,0,51.00,NULL),
(835,NULL,'Phelia','pbodycombn6','Bodycomb','Npath',236,'92619','Irvine','California','80811 8th Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pbodycombn6@timesonline.co.uk','slashdot.org',1,'9497029157',NULL,0,0,0,0,NULL,0,NULL,0,98.00,NULL),
(836,NULL,'Blakeley','bcowterdn7','Cowterd','Rhynyx',236,'92132','San Diego','California','694 Karstens Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bcowterdn7@smugmug.com','blogtalkradio.com',1,'6191121414',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(837,NULL,'Muffin','mrannigann8','Rannigan','Meeveo',236,'20167','Sterling','Virginia','5895 Erie Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mrannigann8@geocities.jp','hubpages.com',1,'5711243105',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(838,NULL,'Jorge','jbosquetn9','Bosquet','Gigashots',236,'78732','Austin','Texas','917 Troy Park',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jbosquetn9@salon.com','mail.ru',1,'5122064393',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(839,NULL,'Drake','drooneyna','Rooney','Thoughtstorm',236,'2109','Boston','Massachusetts','72 Tennessee Pass',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'drooneyna@samsung.com','va.gov',1,'6179301930',NULL,0,0,0,0,NULL,0,NULL,0,91.00,NULL),
(840,NULL,'Ginnifer','gvaggnb','Vagg','Avamba',236,'90035','Los Angeles','California','464 Kedzie Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gvaggnb@nps.gov','forbes.com',1,'3234011239',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(841,NULL,'Templeton','twolseleync','Wolseley','Youopia',236,'50305','Des Moines','Iowa','123 Prairieview Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'twolseleync@plala.or.jp','businessweek.com',1,'5158692097',NULL,0,0,0,0,NULL,0,NULL,0,17.00,NULL),
(842,NULL,'Trever','tdeverehuntnd','De\'Vere - Hunt','Fivechat',236,'97232','Portland','Oregon','5704 Summer Ridge Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tdeverehuntnd@vinaora.com','about.me',1,'5034962748',NULL,0,0,0,0,NULL,0,NULL,0,62.00,NULL),
(843,NULL,'Brandise','bbaudryne','Baudry','Livetube',236,'89150','Las Vegas','Nevada','9903 Atwood Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bbaudryne@g.co','yolasite.com',1,'7024282242',NULL,0,0,0,0,NULL,0,NULL,0,87.00,NULL),
(844,NULL,'Binky','bbrixeynf','Brixey','Teklist',236,'96154','South Lake Tahoe','California','53871 Hanover Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bbrixeynf@squarespace.com','bizjournals.com',1,'5309693292',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(845,NULL,'Sula','sboykettng','Boykett','Flashdog',236,'18018','Bethlehem','Pennsylvania','40 Sutteridge Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'sboykettng@ow.ly','discuz.net',1,'2673938488',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(846,NULL,'Arvin','azisnerosnh','Zisneros','Youspan',236,'29240','Columbia','South Carolina','9247 Claremont Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'azisnerosnh@wikipedia.org','reddit.com',1,'8037988367',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(847,NULL,'Fanni','fkachelerni','Kacheler','Zoombox',236,'30328','Atlanta','Georgia','04 Sugar Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'fkachelerni@geocities.com','1688.com',1,'6783861908',NULL,0,0,0,0,NULL,0,NULL,0,43.00,NULL),
(848,NULL,'Mariam','mquimbynj','Quimby','Pixoboo',236,'13224','Syracuse','New York','1651 Arapahoe Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mquimbynj@globo.com','xrea.com',1,'3157169981',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(849,NULL,'Buddie','bsangsternk','Sangster','Midel',236,'89436','Sparks','Nevada','35065 Lakewood Pass',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bsangsternk@xing.com','wsj.com',1,'7759322262',NULL,0,0,0,0,NULL,0,NULL,0,77.00,NULL),
(850,NULL,'Marjorie','mfrancklinnl','Francklin','Kwinu',236,'14614','Rochester','New York','20072 Dunning Pass',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mfrancklinnl@shinystat.com','artisteer.com',1,'5855074567',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(851,NULL,'Ediva','enetherwoodnm','Netherwood','Minyx',236,'78225','San Antonio','Texas','42868 Kings Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'enetherwoodnm@skyrock.com','utexas.edu',1,'2105223269',NULL,0,0,0,0,NULL,0,NULL,0,72.00,NULL),
(852,NULL,'Clerkclaude','cburdassnn','Burdass','Realbuzz',236,'55557','Young America','Minnesota','46003 Wayridge Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cburdassnn@slate.com','gizmodo.com',1,'9521732397',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(853,NULL,'Collete','corpwoodno','Orpwood','Brainsphere',236,'92878','Corona','California','76747 Lyons Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'corpwoodno@apache.org','census.gov',1,'9511525087',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(854,NULL,'Tabbitha','tliggettnp','Liggett','Buzzshare',236,'59105','Billings','Montana','460 Ridgeway Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tliggettnp@google.com.br','themeforest.net',1,'4068798420',NULL,0,0,0,0,NULL,0,NULL,0,71.00,NULL),
(855,NULL,'Marylinda','mcockcroftnq','Cockcroft','Avaveo',236,'20189','Dulles','Virginia','94 Huxley Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mcockcroftnq@cdc.gov','sun.com',1,'5718311352',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(856,NULL,'Asa','apoddnr','Podd','Divavu',236,'32259','Jacksonville','Florida','2 Reinke Lane',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'apoddnr@slideshare.net','huffingtonpost.com',1,'9042883396',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(857,NULL,'Nerte','nbramens','Brame','Fanoodle',236,'80920','Colorado Springs','Colorado','106 Redwing Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'nbramens@columbia.edu','nifty.com',1,'7199902638',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(858,NULL,'Courtenay','csholemnt','Sholem','Browsebug',236,'78754','Austin','Texas','0 Carey Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'csholemnt@telegraph.co.uk','cargocollective.com',1,'5129486452',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(859,NULL,'Kelbee','kpantonnu','Panton','Innojam',236,'50936','Des Moines','Iowa','5 Harbort Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'kpantonnu@histats.com','liveinternet.ru',1,'5154343412',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(860,NULL,'Wallie','wkinneynv','Kinney','Mydeo',236,'37410','Chattanooga','Tennessee','091 5th Place',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'wkinneynv@w3.org','skyrock.com',1,'4233005415',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(861,NULL,'Rona','rlotheringtonnw','Lotherington','Blogpad',236,'6140','Hartford','Connecticut','25 Lake View Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rlotheringtonnw@statcounter.com','adobe.com',1,'8608545194',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(862,NULL,'Elsy','emulhillnx','Mulhill','Skidoo',236,'20397','Washington','District of Columbia','57548 Russell Way',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'emulhillnx@amazonaws.com','prlog.org',1,'2021612671',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(863,NULL,'Merissa','mnafzigerny','Nafziger','Shufflester',236,'75044','Garland','Texas','91 Moulton Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mnafzigerny@marketwatch.com','seattletimes.com',1,'4693332498',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(864,NULL,'Wait','wmacelroynz','MacElroy','Realbuzz',236,'70165','New Orleans','Louisiana','52 Village Pass',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'wmacelroynz@hostgator.com','cyberchimps.com',1,'5043169544',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(865,NULL,'Charo','cbrooko0','Brook','Skaboo',236,'10249','New York City','New York','6893 Bobwhite Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cbrooko0@gnu.org','virginia.edu',1,'2129502957',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(866,NULL,'Jena','jrheaumeo1','Rheaume','Dabjam',236,'25326','Charleston','West Virginia','05254 Springview Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jrheaumeo1@google.com','hp.com',1,'3049158455',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(867,NULL,'Libby','lklaisero2','Klaiser','Feedfish',236,'36195','Montgomery','Alabama','977 Main Terrace',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'lklaisero2@mashable.com','behance.net',1,'3342917373',NULL,0,0,0,0,NULL,0,NULL,0,32.00,NULL),
(868,NULL,'Elias','edarnodyo3','Darnody','Skippad',236,'21229','Baltimore','Maryland','7971 Fairfield Hill',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'edarnodyo3@desdev.cn','hao123.com',1,'4439470557',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(869,NULL,'Rosco','ryello4','Yell','Gabcube',236,'37995','Knoxville','Tennessee','1 School Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ryello4@addtoany.com','virginia.edu',1,'8659659996',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(870,NULL,'Kendell','kcastellinio5','Castellini','Leexo',236,'30343','Atlanta','Georgia','97 Transport Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'kcastellinio5@digg.com','creativecommons.org',1,'4041881357',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(871,NULL,'Nonnah','nbambrougho6','Bambrough','Tazz',236,'7112','Newark','New Jersey','36 Holy Cross Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'nbambrougho6@gmpg.org','wisc.edu',1,'2011977018',NULL,0,0,0,0,NULL,0,NULL,0,54.00,NULL),
(872,NULL,'Otho','oheckso7','Hecks','Roombo',236,'19892','Wilmington','Delaware','64 Donald Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'oheckso7@google.co.jp','fda.gov',1,'3026974923',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(873,NULL,'Tresa','tweadicko8','Weadick','Mita',236,'98206','Everett','Washington','78489 Fairfield Alley',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'tweadicko8@msu.edu','marriott.com',1,'4251259833',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(874,NULL,'Ambur','atyneo9','Tyne','Twitterbridge',236,'33180','Miami','Florida','4971 Melody Park',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'atyneo9@samsung.com','opera.com',1,'3054266575',NULL,0,0,0,0,NULL,0,NULL,0,28.00,NULL),
(875,NULL,'Susy','slomenoa','Lomen','Oyondu',236,'13217','Syracuse','New York','008 Heffernan Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'slomenoa@phoca.cz','1und1.de',1,'3157986285',NULL,0,0,0,0,NULL,0,NULL,0,74.00,NULL),
(876,NULL,'Prentice','pgrisbrookob','Grisbrook','Kamba',236,'20420','Washington','District of Columbia','24075 Eggendart Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pgrisbrookob@admin.ch','livejournal.com',1,'2028044436',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(877,NULL,'Caren','cluckcuckoc','Luckcuck','Jaloo',236,'15205','Pittsburgh','Pennsylvania','50 Dennis Center',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cluckcuckoc@networkadvertising.org','slideshare.net',1,'4124257744',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(878,NULL,'Marne','mmaynardod','Maynard','Aimbu',236,'79968','El Paso','Texas','1672 Lakeland Junction',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'mmaynardod@indiatimes.com','imgur.com',1,'9157227852',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(879,NULL,'Casar','ceasterbyoe','Easterby','Thoughtmix',236,'92196','San Diego','California','980 Welch Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ceasterbyoe@pbs.org','taobao.com',1,'6193670711',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(880,NULL,'Bernardina','bwildtof','Wildt','Yamia',236,'28278','Charlotte','North Carolina','49311 Forest Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bwildtof@usgs.gov','flickr.com',1,'7042824490',NULL,0,0,0,0,NULL,0,NULL,0,12.00,NULL),
(881,NULL,'Caro','cjovasevicog','Jovasevic','Feedmix',236,'57110','Sioux Falls','South Dakota','716 Magdeline Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cjovasevicog@businesswire.com','hp.com',1,'6052592641',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(882,NULL,'Callean','cglanzoh','Glanz','Skyndu',236,'60624','Chicago','Illinois','70 Arrowood Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cglanzoh@dion.ne.jp','ehow.com',1,'3127277176',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(883,NULL,'Berrie','bdellaoi','Della','Photobean',236,'92505','Riverside','California','35769 Bobwhite Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'bdellaoi@upenn.edu','freewebs.com',1,'9098740858',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(884,NULL,'Jolie','jheninghamoj','Heningham','Quimm',236,'80940','Colorado Springs','Colorado','0235 Barnett Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jheninghamoj@wordpress.com','gravatar.com',1,'7195787770',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(885,NULL,'Chery','cbeavonok','Beavon','Devshare',236,'21211','Baltimore','Maryland','5562 Johnson Circle',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cbeavonok@gizmodo.com','printfriendly.com',1,'4101945436',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(886,NULL,'Rhona','rmonksfieldol','Monksfield','Jayo',236,'37245','Nashville','Tennessee','72906 Michigan Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'rmonksfieldol@seesaa.net','goodreads.com',1,'6154031489',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(887,NULL,'Edsel','egemlbettom','Gemlbett','Fivespan',236,'16107','New Castle','Pennsylvania','0 Milwaukee Point',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'egemlbettom@mayoclinic.com','vinaora.com',1,'7246313314',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(888,NULL,'Jeannine','jwebbeon','Webbe','Kaymbo',236,'97271','Portland','Oregon','813 Debs Trail',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jwebbeon@yahoo.co.jp','aol.com',1,'9716513068',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(889,NULL,'Erin','ebosheroo','Bosher','Quimba',236,'13217','Syracuse','New York','932 Birchwood Street',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'ebosheroo@npr.org','free.fr',1,'3156649474',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(890,NULL,'Joel','jaronstamop','Aronstam','Zoomdog',236,'6922','Stamford','Connecticut','2497 Northport Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jaronstamop@creativecommons.org','bbc.co.uk',1,'2036180665',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(891,NULL,'Sandi','sgilstounoq','Gilstoun','Katz',236,'75221','Dallas','Texas','97804 Shoshone Court',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'sgilstounoq@cnet.com','ebay.com',1,'2142243653',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(892,NULL,'Goldie','gchallaceor','Challace','Dablist',236,'93291','Visalia','California','51 Walton Parkway',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gchallaceor@about.me','hp.com',1,'2098058451',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(893,NULL,'Jose','jbrignallos','Brignall','Blogpad',236,'46857','Fort Wayne','Indiana','239 Corry Point',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jbrignallos@auda.org.au','elegantthemes.com',1,'2607560254',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(894,NULL,'Peggi','pcoullot','Coull','Dazzlesphere',236,'73104','Oklahoma City','Oklahoma','15 Mcguire Avenue',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'pcoullot@liveinternet.ru','blogger.com',1,'4053404997',NULL,0,0,0,0,NULL,0,NULL,0,78.00,NULL),
(895,NULL,'Dolly','dwiddopou','Widdop','Thoughtstorm',236,'98682','Vancouver','Washington','838 Vermont Road',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'dwiddopou@creativecommons.org','hhs.gov',1,'3606431256',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(896,NULL,'Sileas','sdumbartonov','Dumbarton','Zooveo',236,'7544','Paterson','New Jersey','317 Birchwood Crossing',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'sdumbartonov@blogs.com','columbia.edu',1,'8622226136',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(897,NULL,'Cherry','cskallyow','Skally','Twinder',236,'80127','Littleton','Colorado','913 Talisman Point',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'cskallyow@newyorker.com','msu.edu',1,'3031033960',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(898,NULL,'Jaymee','jeatockox','Eatock','Edgeblab',236,'46614','South Bend','Indiana','616 Shelley Plaza',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'jeatockox@independent.co.uk','cbc.ca',1,'5747211710',NULL,0,0,0,0,NULL,0,NULL,0,5.00,NULL),
(899,NULL,'Gradeigh','gphelanoy','Phelan','Twitterbeat',236,'67236','Wichita','Kansas','53232 Carberry Drive',1,'2022-11-28 18:56:15',0,2,1,NULL,NULL,NULL,1,'gphelanoy@twitter.com','printfriendly.com',1,'3165722943',NULL,0,0,0,0,NULL,0,NULL,0,84.00,NULL),
(900,'d7f474ab98f896e05ee794e05528ee4e-076e1e5dea39f45381fc64f8f702dd73','Bernadene','bdoerrenoz','Doerren','Brainbox',236,'90101','Los Angeles','California','8 Ohio Junction',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bdoerrenoz@ask.com','vistaprint.com',1,'2137986969',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(901,'6d6e52944d136ceca6599f53ebe5f7cb-c1ed82013accee0356debd4cc5eef28f','Bogey','bsnowp0','Snow','Skyble',236,'33147','Miami','Florida','1 Westend Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bsnowp0@kickstarter.com','ed.gov',1,'3054805801',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(902,NULL,'Deidre','dgartsydep1','Gartsyde','Leenti',236,'68124','Omaha','Nebraska','4 Union Parkway',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dgartsydep1@topsy.com','desdev.cn',1,'4024125677',NULL,0,0,0,0,NULL,0,NULL,0,96.00,NULL),
(903,NULL,'Hilde','hzannottip2','Zannotti','Talane',236,'92505','Riverside','California','7144 Westerfield Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'hzannottip2@symantec.com','sphinn.com',1,'9097296900',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(904,NULL,'Sybila','scowlamp3','Cowlam','Dabjam',236,'75049','Garland','Texas','7222 Marcy Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'scowlamp3@census.gov','naver.com',1,'2142838760',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(905,NULL,'Tabbie','tmelrosep4','Melrose','Ntags',236,'64187','Kansas City','Missouri','3212 Helena Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'tmelrosep4@hatena.ne.jp','admin.ch',1,'8164035866',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(906,NULL,'Rooney','raugarp5','Augar','Ooba',236,'44191','Cleveland','Ohio','8 Oak Valley Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'raugarp5@nationalgeographic.com','intel.com',1,'2162600684',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(907,NULL,'Quinlan','qspinksp6','Spinks','Leexo',236,'43226','Columbus','Ohio','82893 Green Point',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'qspinksp6@blogspot.com','prnewswire.com',1,'6142567610',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(908,NULL,'Kayla','keburnep7','Eburne','Plambee',236,'10454','Bronx','New York','7980 Valley Edge Lane',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'keburnep7@jiathis.com','ycombinator.com',1,'7186340970',NULL,0,0,0,0,NULL,0,NULL,0,83.00,NULL),
(909,NULL,'Bertram','bsammonp8','Sammon','Devify',236,'20046','Washington','District of Columbia','80755 Ramsey Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bsammonp8@home.pl','networkadvertising.org',1,'2026861273',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(910,NULL,'Dun','dedlynep9','Edlyne','Meejo',236,'21684','Ridgely','Maryland','2 Surrey Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dedlynep9@wikia.com','t-online.de',1,'4109897162',NULL,0,0,0,0,NULL,0,NULL,0,8.00,NULL),
(911,NULL,'Leila','lcamblepa','Camble','Twinte',236,'80279','Denver','Colorado','30 Ohio Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'lcamblepa@linkedin.com','parallels.com',1,'3033532239',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(912,NULL,'Corey','cdemangeonpb','Demangeon','Wikizz',236,'68164','Omaha','Nebraska','331 Welch Place',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cdemangeonpb@squidoo.com','google.nl',1,'4023567409',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(913,NULL,'Preston','pmaccaughanpc','MacCaughan','Vidoo',236,'98109','Seattle','Washington','8632 Hollow Ridge Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'pmaccaughanpc@feedburner.com','g.co',1,'3601589195',NULL,0,0,0,0,NULL,0,NULL,0,31.00,NULL),
(914,NULL,'Kiah','kmessrutherpd','Messruther','Abata',236,'73114','Oklahoma City','Oklahoma','77428 Lakewood Gardens Road',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'kmessrutherpd@trellian.com','com.com',1,'4057744607',NULL,0,0,0,0,NULL,0,NULL,0,2.00,NULL),
(915,NULL,'Arleen','aaldinepe','Aldine','Dabshots',236,'50335','Des Moines','Iowa','49 Sloan Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'aaldinepe@google.es','globo.com',1,'5151442368',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(916,NULL,'Audra','acaropf','Caro','Fanoodle',236,'35805','Huntsville','Alabama','2467 Warner Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'acaropf@reddit.com','ycombinator.com',1,'2565591294',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(917,NULL,'Gale','ggreatreaxpg','Greatreax','Zoombox',236,'33330','Fort Lauderdale','Florida','4 Fisk Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ggreatreaxpg@unesco.org','typepad.com',1,'9545339162',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(918,NULL,'Freddy','fwiskerph','Wisker','Vidoo',236,'10292','New York City','New York','25 Pearson Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'fwiskerph@weebly.com','opensource.org',1,'2124222051',NULL,0,0,0,0,NULL,0,NULL,0,63.00,NULL),
(919,NULL,'Filip','fwhittlespi','Whittles','Twimbo',236,'80305','Boulder','Colorado','3089 Golf Course Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'fwhittlespi@blogger.com','ucla.edu',1,'7206808953',NULL,0,0,0,0,NULL,0,NULL,0,69.00,NULL),
(920,NULL,'Lin','ldearlpj','Dearl','Fadeo',236,'96810','Honolulu','Hawaii','790 Center Avenue',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ldearlpj@skyrock.com','etsy.com',1,'8087768066',NULL,0,0,0,0,NULL,0,NULL,0,55.00,NULL),
(921,NULL,'Sari','sbatrampk','Batram','Zooxo',236,'23509','Norfolk','Virginia','1 Golf View Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sbatrampk@fotki.com','t-online.de',1,'7577048590',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(922,NULL,'Daria','darmandpl','Armand','Chatterbridge',236,'78749','Austin','Texas','75 Westend Road',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'darmandpl@unc.edu','mac.com',1,'5127056640',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(923,NULL,'Mart','mwickespm','Wickes','Mynte',236,'33605','Tampa','Florida','74 Declaration Avenue',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mwickespm@craigslist.org','sfgate.com',1,'8134770412',NULL,0,0,0,0,NULL,0,NULL,0,25.00,NULL),
(924,NULL,'Sammy','soreheadpn','Orehead','Youtags',236,'60078','Palatine','Illinois','3 Cambridge Pass',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'soreheadpn@fastcompany.com','cnn.com',1,'8472208342',NULL,0,0,0,0,NULL,0,NULL,0,60.00,NULL),
(925,NULL,'Joyan','jgossingtonpo','Gossington','Mybuzz',236,'90610','Whittier','California','8 Weeping Birch Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jgossingtonpo@netscape.com','netvibes.com',1,'5621607987',NULL,0,0,0,0,NULL,0,NULL,0,82.00,NULL),
(926,NULL,'Locke','lfistpp','Fist','Pixoboo',236,'20073','Washington','District of Columbia','764 Merrick Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'lfistpp@4shared.com','de.vu',1,'2022379491',NULL,0,0,0,0,NULL,0,NULL,0,80.00,NULL),
(927,NULL,'Stearn','sbolingbrokepq','Bolingbroke','Mymm',236,'6705','Waterbury','Connecticut','6 New Castle Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sbolingbrokepq@godaddy.com','photobucket.com',1,'2031164694',NULL,0,0,0,0,NULL,0,NULL,0,57.00,NULL),
(928,NULL,'Chico','cmuffinpr','Muffin','Devcast',236,'11431','Jamaica','New York','527 Kim Pass',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cmuffinpr@guardian.co.uk','wsj.com',1,'2122410527',NULL,0,0,0,0,NULL,0,NULL,0,70.00,NULL),
(929,NULL,'Ricoriki','rcanaps','Cana','BlogXS',236,'2905','Providence','Rhode Island','8465 Almo Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'rcanaps@cdbaby.com','ucoz.ru',1,'4015875966',NULL,0,0,0,0,NULL,0,NULL,0,19.00,NULL),
(930,NULL,'Lily','ldiblept','Dible','Zava',236,'79176','Amarillo','Texas','12 Redwing Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ldiblept@walmart.com','google.com.au',1,'8068097665',NULL,0,0,0,0,NULL,0,NULL,0,86.00,NULL),
(931,NULL,'Linus','llaitypu','Laity','Eare',236,'70593','Lafayette','Louisiana','67 Mandrake Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'llaitypu@elpais.com','purevolume.com',1,'3372716798',NULL,0,0,0,0,NULL,0,NULL,0,36.00,NULL),
(932,NULL,'Cammy','ckleeweinpv','Kleewein','Lazz',236,'89125','Las Vegas','Nevada','35701 Bay Avenue',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ckleeweinpv@google.cn','mysql.com',1,'7026669305',NULL,0,0,0,0,NULL,0,NULL,0,73.00,NULL),
(933,NULL,'Robin','rjzhakovpw','Jzhakov','Jaxnation',236,'91186','Pasadena','California','7 Oak Valley Lane',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'rjzhakovpw@epa.gov','globo.com',1,'6268693338',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(934,NULL,'Joceline','jbartolomeazzipx','Bartolomeazzi','Aivee',236,'31416','Savannah','Georgia','19180 Prentice Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jbartolomeazzipx@domainmarket.com','ucsd.edu',1,'9126284759',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(935,NULL,'Dorelia','dmccaskillpy','McCaskill','Jaxspan',236,'73197','Oklahoma City','Oklahoma','1 Longview Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dmccaskillpy@newsvine.com','soup.io',1,'4055421249',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(936,NULL,'Dannye','deggletonpz','Eggleton','Gigashots',236,'97286','Portland','Oregon','34 Ryan Point',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'deggletonpz@hc360.com','purevolume.com',1,'5036127591',NULL,0,0,0,0,NULL,0,NULL,0,23.00,NULL),
(937,NULL,'Melloney','mchinneryq0','Chinnery','Topicblab',236,'88569','El Paso','Texas','4311 Delaware Plaza',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mchinneryq0@merriam-webster.com','wp.com',1,'9158183185',NULL,0,0,0,0,NULL,0,NULL,0,38.00,NULL),
(938,NULL,'Leone','lblomefieldq1','Blomefield','Izio',236,'17126','Harrisburg','Pennsylvania','266 Basil Plaza',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'lblomefieldq1@twitpic.com','hao123.com',1,'7171677550',NULL,0,0,0,0,NULL,0,NULL,0,22.00,NULL),
(939,NULL,'Jeannette','jconvilleq2','Conville','Babbleopia',236,'32123','Daytona Beach','Florida','47936 Claremont Pass',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jconvilleq2@earthlink.net','un.org',1,'3864445026',NULL,0,0,0,0,NULL,0,NULL,0,65.00,NULL),
(940,NULL,'Alejandro','aabrashkinq3','Abrashkin','Buzzster',236,'46852','Fort Wayne','Indiana','2 Mallard Way',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'aabrashkinq3@sourceforge.net','nps.gov',1,'2605700818',NULL,0,0,0,0,NULL,0,NULL,0,75.00,NULL),
(941,NULL,'Kimmy','kklainerq4','Klainer','Linklinks',236,'19196','Philadelphia','Pennsylvania','7 American Ash Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'kklainerq4@ed.gov','techcrunch.com',1,'2152114490',NULL,0,0,0,0,NULL,0,NULL,0,9.00,NULL),
(942,NULL,'Sauncho','sleakeq5','Leake','Rooxo',236,'35205','Birmingham','Alabama','9192 Green Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sleakeq5@state.gov','cnn.com',1,'2053543518',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(943,NULL,'Bunnie','bburgisq6','Burgis','Digitube',236,'6145','Hartford','Connecticut','70606 Bowman Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bburgisq6@apple.com','google.it',1,'8602317946',NULL,0,0,0,0,NULL,0,NULL,0,99.00,NULL),
(944,NULL,'Somerset','sworhamq7','Worham','Feedmix',236,'80940','Colorado Springs','Colorado','031 Porter Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sworhamq7@china.com.cn','shop-pro.jp',1,'7192639946',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(945,NULL,'Donielle','dingreeq8','Ingree','JumpXS',236,'19104','Philadelphia','Pennsylvania','7 Center Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dingreeq8@bandcamp.com','latimes.com',1,'2157100333',NULL,0,0,0,0,NULL,0,NULL,0,66.00,NULL),
(946,NULL,'Aile','ajaggsq9','Jaggs','Zoomdog',236,'79977','El Paso','Texas','95 Spohn Point',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ajaggsq9@princeton.edu','quantcast.com',1,'9157437291',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(947,NULL,'Elspeth','efrankenqa','Franken','Devpoint',236,'64144','Kansas City','Missouri','751 Lawn Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'efrankenqa@mac.com','buzzfeed.com',1,'8165759410',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(948,NULL,'Shaun','srivalandqb','Rivaland','Roodel',236,'78210','San Antonio','Texas','0 High Crossing Way',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'srivalandqb@npr.org','behance.net',1,'2101919854',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(949,NULL,'Kial','kdeerrqc','Deerr','Oyoyo',236,'10464','Bronx','New York','7908 Del Sol Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'kdeerrqc@telegraph.co.uk','unblog.fr',1,'9142031414',NULL,0,0,0,0,NULL,0,NULL,0,92.00,NULL),
(950,NULL,'Emmet','emugglestonqd','Muggleston','Twinte',236,'92725','Santa Ana','California','139 Onsgard Parkway',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'emugglestonqd@sogou.com','sfgate.com',1,'7148400538',NULL,0,0,0,0,NULL,0,NULL,0,33.00,NULL),
(951,NULL,'Brendin','bdouglissqe','Dougliss','Voonyx',236,'97296','Portland','Oregon','95 Caliangt Plaza',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bdouglissqe@jalbum.net','washington.edu',1,'5031445539',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(952,NULL,'Drucill','dbarriballqf','Barriball','Blogspan',236,'35290','Birmingham','Alabama','704 Westridge Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dbarriballqf@foxnews.com','tuttocitta.it',1,'2059722751',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(953,NULL,'Giselbert','gtomaszczykqg','Tomaszczyk','Plajo',236,'46825','Fort Wayne','Indiana','24616 Fairview Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'gtomaszczykqg@hibu.com','weebly.com',1,'2605030932',NULL,0,0,0,0,NULL,0,NULL,0,90.00,NULL),
(954,NULL,'Mariel','mloyndonqh','Loyndon','Skyble',236,'80951','Colorado Springs','Colorado','68105 Corben Court',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mloyndonqh@pcworld.com','issuu.com',1,'7191758138',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(955,NULL,'Juliette','jgarvanqi','Garvan','Dynabox',236,'92883','Corona','California','62966 Brickson Park Parkway',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jgarvanqi@sakura.ne.jp','dedecms.com',1,'6265442474',NULL,0,0,0,0,NULL,0,NULL,0,14.00,NULL),
(956,NULL,'Micky','mjaulmeqj','Jaulme','Tazz',236,'35290','Birmingham','Alabama','5 Mandrake Pass',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mjaulmeqj@so-net.ne.jp','clickbank.net',1,'2059787571',NULL,0,0,0,0,NULL,0,NULL,0,85.00,NULL),
(957,NULL,'Alyse','amattekqk','Mattek','Dabtype',236,'21705','Frederick','Maryland','0425 Ridge Oak Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'amattekqk@vk.com','cornell.edu',1,'2403083879',NULL,0,0,0,0,NULL,0,NULL,0,79.00,NULL),
(958,NULL,'Daryl','dglydeql','Glyde','Ntag',236,'75507','Texarkana','Texas','402 Carpenter Drive',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dglydeql@nih.gov','timesonline.co.uk',1,'9034127226',NULL,0,0,0,0,NULL,0,NULL,0,68.00,NULL),
(959,NULL,'Ardenia','aanwellqm','Anwell','Babbleopia',236,'45403','Dayton','Ohio','3 Hauk Plaza',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'aanwellqm@storify.com','google.co.uk',1,'9375286872',NULL,0,0,0,0,NULL,0,NULL,0,58.00,NULL),
(960,NULL,'Pieter','pismirnioglouqn','Ismirnioglou','Fivechat',236,'94660','Oakland','California','273 Anderson Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'pismirnioglouqn@elegantthemes.com','nba.com',1,'5107807738',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(961,NULL,'Marjorie','mgonthardqo','Gonthard','Avamba',236,'95838','Sacramento','California','298 Little Fleur Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mgonthardqo@usatoday.com','fastcompany.com',1,'9163488279',NULL,0,0,0,0,NULL,0,NULL,0,24.00,NULL),
(962,NULL,'Fallon','flauderqp','Lauder','Rhynoodle',236,'89155','Las Vegas','Nevada','682 Mosinee Trail',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'flauderqp@topsy.com','house.gov',1,'7021724814',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(963,NULL,'Jojo','jbrennansqq','Brennans','Jabbersphere',236,'64190','Kansas City','Missouri','7 Sauthoff Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jbrennansqq@addtoany.com','businessweek.com',1,'8165372259',NULL,0,0,0,0,NULL,0,NULL,0,3.00,NULL),
(964,NULL,'Gwenneth','gperoqr','Pero','Meevee',236,'38104','Memphis','Tennessee','699 Valley Edge Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'gperoqr@mac.com','goo.ne.jp',1,'6152146273',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(965,NULL,'Alida','aletcherqs','Letcher','Eayo',236,'15210','Pittsburgh','Pennsylvania','45 Clemons Lane',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'aletcherqs@dyndns.org','intel.com',1,'4121885396',NULL,0,0,0,0,NULL,0,NULL,0,94.00,NULL),
(966,NULL,'Dominica','dalimanqt','Aliman','Flashpoint',236,'93762','Fresno','California','0 Schurz Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dalimanqt@yellowbook.com','theglobeandmail.com',1,'5592170154',NULL,0,0,0,0,NULL,0,NULL,0,48.00,NULL),
(967,NULL,'Rodolphe','rmattussevichqu','Mattussevich','Skilith',236,'19184','Philadelphia','Pennsylvania','76 Reindahl Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'rmattussevichqu@icio.us','com.com',1,'2159363768',NULL,0,0,0,0,NULL,0,NULL,0,16.00,NULL),
(968,NULL,'Dalenna','dswaineqv','Swaine','Bubbletube',236,'78789','Austin','Texas','26 Muir Crossing',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dswaineqv@latimes.com','biblegateway.com',1,'5129397244',NULL,0,0,0,0,NULL,0,NULL,0,34.00,NULL),
(969,NULL,'Janean','jdemalcharqw','De Malchar','Jaxbean',236,'92424','San Bernardino','California','7645 Tomscot Place',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jdemalcharqw@patch.com','people.com.cn',1,'9091033248',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(970,NULL,'Claude','cfrancioliqx','Francioli','Janyx',236,'20051','Washington','District of Columbia','14922 Scott Plaza',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cfrancioliqx@blog.com','360.cn',1,'2023142335',NULL,0,0,0,0,NULL,0,NULL,0,45.00,NULL),
(971,NULL,'Philip','plankesterqy','Lankester','Blogpad',236,'60078','Palatine','Illinois','41866 Pawling Pass',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'plankesterqy@delicious.com','xing.com',1,'8476866000',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(972,NULL,'Elsy','ekitleyqz','Kitley','Trunyx',236,'35225','Birmingham','Alabama','74344 Corscot Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ekitleyqz@washington.edu','dyndns.org',1,'2052067229',NULL,0,0,0,0,NULL,0,NULL,0,88.00,NULL),
(973,NULL,'Cam','cdiggler0','Diggle','Eire',236,'74156','Tulsa','Oklahoma','29 Cambridge Drive',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cdiggler0@auda.org.au','freewebs.com',1,'9186466480',NULL,0,0,0,0,NULL,0,NULL,0,41.00,NULL),
(974,NULL,'Beret','bdankersleyr1','Dankersley','Eire',236,'79955','El Paso','Texas','06934 Weeping Birch Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'bdankersleyr1@intel.com','is.gd',1,'9153973972',NULL,0,0,0,0,NULL,0,NULL,0,46.00,NULL),
(975,NULL,'Lancelot','lfrankowskir2','Frankowski','Realbuzz',236,'21203','Baltimore','Maryland','99353 Anhalt Drive',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'lfrankowskir2@hibu.com','un.org',1,'4104031557',NULL,0,0,0,0,NULL,0,NULL,0,40.00,NULL),
(976,NULL,'Filberto','flomasneyr3','Lomasney','Topiczoom',236,'55146','Saint Paul','Minnesota','7519 Hallows Trail',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'flomasneyr3@creativecommons.org','themeforest.net',1,'6511879446',NULL,0,0,0,0,NULL,0,NULL,0,95.00,NULL),
(977,NULL,'Ardisj','avelr4','Vel','Bluejam',236,'98687','Vancouver','Washington','17512 Dixon Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'avelr4@stumbleupon.com','odnoklassniki.ru',1,'3601833028',NULL,0,0,0,0,NULL,0,NULL,0,30.00,NULL),
(978,NULL,'Theodora','tetienner5','Etienne','Zooveo',236,'27717','Durham','North Carolina','772 Granby Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'tetienner5@miitbeian.gov.cn','google.com.hk',1,'9199564577',NULL,0,0,0,0,NULL,0,NULL,0,11.00,NULL),
(979,NULL,'Dolores','dfullardr6','Fullard','Zoonder',236,'30301','Atlanta','Georgia','38707 Springs Hill',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dfullardr6@mail.ru','virginia.edu',1,'6789525387',NULL,0,0,0,0,NULL,0,NULL,0,81.00,NULL),
(980,NULL,'Charo','cfarrarr7','Farrar','Wordify',236,'32118','Daytona Beach','Florida','64304 Novick Trail',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cfarrarr7@harvard.edu','aol.com',1,'3864771827',NULL,0,0,0,0,NULL,0,NULL,0,21.00,NULL),
(981,NULL,'Misti','mmccallumr8','McCallum','Topiczoom',236,'33028','Hollywood','Florida','9 Declaration Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mmccallumr8@google.ca','indiatimes.com',1,'3055075317',NULL,0,0,0,0,NULL,0,NULL,0,49.00,NULL),
(982,NULL,'Amble','askillingtonr9','Skillington','Gigabox',236,'32830','Orlando','Florida','636 Thackeray Center',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'askillingtonr9@taobao.com','arstechnica.com',1,'4077519726',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL),
(983,NULL,'Douglas','dstrydera','Stryde','Riffwire',236,'90505','Torrance','California','5445 Shasta Place',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dstrydera@aboutads.info','illinois.edu',1,'3109041103',NULL,0,0,0,0,NULL,0,NULL,0,53.00,NULL),
(984,NULL,'Sarina','shamnerrb','Hamner','Izio',236,'79452','Lubbock','Texas','6 Duke Road',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'shamnerrb@skype.com','joomla.org',1,'8061484993',NULL,0,0,0,0,NULL,0,NULL,0,13.00,NULL),
(985,NULL,'Lyndsey','ltroilletrc','Troillet','Bubblemix',236,'28278','Charlotte','North Carolina','1922 Portage Court',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ltroilletrc@nyu.edu','timesonline.co.uk',1,'7048893300',NULL,0,0,0,0,NULL,0,NULL,0,47.00,NULL),
(986,NULL,'Rivi','rtynanrd','Tynan','Skibox',236,'49018','Battle Creek','Michigan','914 Carpenter Alley',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'rtynanrd@usda.gov','seattletimes.com',1,'2699385327',NULL,0,0,0,0,NULL,0,NULL,0,39.00,NULL),
(987,NULL,'Danice','ddumbrillre','Dumbrill','Browsedrive',236,'12325','Schenectady','New York','059 Monument Place',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ddumbrillre@meetup.com','upenn.edu',1,'5185100761',NULL,0,0,0,0,NULL,0,NULL,0,6.00,NULL),
(988,NULL,'Sibley','sfurmagerf','Furmage','Leenti',236,'20557','Washington','District of Columbia','424 Fulton Drive',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sfurmagerf@google.co.jp','deliciousdays.com',1,'2028019157',NULL,0,0,0,0,NULL,0,NULL,0,100.00,NULL),
(989,NULL,'Melina','mfavellrg','Favell','Linkbridge',236,'85020','Phoenix','Arizona','78 Dayton Drive',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mfavellrg@technorati.com','unblog.fr',1,'6021311072',NULL,0,0,0,0,NULL,0,NULL,0,1.00,NULL),
(990,NULL,'Simonne','sdrainsrh','Drains','Oyondu',236,'89087','North Las Vegas','Nevada','94 5th Terrace',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'sdrainsrh@fotki.com','gizmodo.com',1,'7022690730',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(991,NULL,'Jareb','jmarkelri','Markel','Teklist',236,'2912','Providence','Rhode Island','2 Northport Lane',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'jmarkelri@senate.gov','archive.org',1,'4019794667',NULL,0,0,0,0,NULL,0,NULL,0,59.00,NULL),
(992,NULL,'Kelby','kstruttrj','Strutt','Muxo',236,'73167','Oklahoma City','Oklahoma','7 Goodland Park',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'kstruttrj@upenn.edu','unc.edu',1,'4058300162',NULL,0,0,0,0,NULL,0,NULL,0,27.00,NULL),
(993,NULL,'Marco','mkaresrk','Kares','Yadel',236,'76705','Waco','Texas','44 Mendota Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'mkaresrk@linkedin.com','xing.com',1,'2546598682',NULL,0,0,0,0,NULL,0,NULL,0,7.00,NULL),
(994,NULL,'Curr','cburchrl','Burch','Blogtags',236,'18105','Allentown','Pennsylvania','7 Westerfield Place',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'cburchrl@so-net.ne.jp','livejournal.com',1,'6105006198',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(995,NULL,'Dolley','dtriswellrm','Triswell','Eazzy',236,'70505','Lafayette','Louisiana','39373 Ramsey Court',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dtriswellrm@youku.com','nytimes.com',1,'3376295700',NULL,0,0,0,0,NULL,0,NULL,0,26.00,NULL),
(996,NULL,'Drake','ddambrosiorn','D\'Ambrosio','Buzzshare',236,'94137','San Francisco','California','0 Charing Cross Way',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'ddambrosiorn@hao123.com','rediff.com',1,'4156985463',NULL,0,0,0,0,NULL,0,NULL,0,42.00,NULL),
(997,NULL,'Toinette','tcanedoro','Canedo','Blogspan',236,'79923','El Paso','Texas','8100 Trailsway Lane',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'tcanedoro@hibu.com','usa.gov',1,'9154349912',NULL,0,0,0,0,NULL,0,NULL,0,52.00,NULL),
(998,NULL,'Dwayne','dduffittrp','Duffitt','Rhybox',236,'35285','Birmingham','Alabama','37371 Service Circle',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dduffittrp@qq.com','amazon.com',1,'2055724936',NULL,0,0,0,0,NULL,0,NULL,0,93.00,NULL),
(999,NULL,'Dorisa','dtuffeyrq','Tuffey','Kwimbee',236,'16534','Erie','Pennsylvania','7 Mariners Cove Avenue',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'dtuffeyrq@arizona.edu','ycombinator.com',1,'8148591228',NULL,0,0,0,0,NULL,0,NULL,0,37.00,NULL),
(1000,'8591a35ffa65c96f05e5942aa0d97c19-159a679fbff1d4e3bbfd7cecdbb065f0','Konstanze','kmaccaheerr','MacCahee','Shuffletag',236,'20238','Washington','District of Columbia','62 Doe Crossing Street',1,'2022-11-28 18:56:16',0,2,1,NULL,NULL,NULL,1,'kmaccaheerr@vimeo.com','trellian.com',1,'2025870631',NULL,0,0,0,0,NULL,0,NULL,0,4.00,NULL);

/*Table structure for table `tblleads_email_integration` */

DROP TABLE IF EXISTS `tblleads_email_integration`;

CREATE TABLE `tblleads_email_integration` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'the ID always must be 1',
  `active` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `imap_server` varchar(100) NOT NULL,
  `password` mediumtext NOT NULL,
  `check_every` int(11) NOT NULL DEFAULT 5,
  `responsible` int(11) NOT NULL,
  `lead_source` int(11) NOT NULL,
  `lead_status` int(11) NOT NULL,
  `encryption` varchar(3) DEFAULT NULL,
  `folder` varchar(100) NOT NULL,
  `last_run` varchar(50) DEFAULT NULL,
  `notify_lead_imported` tinyint(1) NOT NULL DEFAULT 1,
  `notify_lead_contact_more_times` tinyint(1) NOT NULL DEFAULT 1,
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext DEFAULT NULL,
  `mark_public` int(11) NOT NULL DEFAULT 0,
  `only_loop_on_unseen_emails` tinyint(1) NOT NULL DEFAULT 1,
  `delete_after_import` int(11) NOT NULL DEFAULT 0,
  `create_task_if_customer` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblleads_email_integration` */

insert  into `tblleads_email_integration`(`id`,`active`,`email`,`imap_server`,`password`,`check_every`,`responsible`,`lead_source`,`lead_status`,`encryption`,`folder`,`last_run`,`notify_lead_imported`,`notify_lead_contact_more_times`,`notify_type`,`notify_ids`,`mark_public`,`only_loop_on_unseen_emails`,`delete_after_import`,`create_task_if_customer`) values 
(1,0,'','','',10,0,0,0,'tls','INBOX','',1,1,'assigned','',0,1,0,1);

/*Table structure for table `tblleads_sources` */

DROP TABLE IF EXISTS `tblleads_sources`;

CREATE TABLE `tblleads_sources` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblleads_sources` */

insert  into `tblleads_sources`(`id`,`name`) values 
(2,'Facebook'),
(1,'Google');

/*Table structure for table `tblleads_status` */

DROP TABLE IF EXISTS `tblleads_status`;

CREATE TABLE `tblleads_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `statusorder` int(11) DEFAULT NULL,
  `color` varchar(10) DEFAULT '#28B8DA',
  `isdefault` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblleads_status` */

insert  into `tblleads_status`(`id`,`name`,`statusorder`,`color`,`isdefault`) values 
(1,'Customer',1000,'#7cb342',1),
(2,'New',2,'#28B8DA',0);

/*Table structure for table `tblleave_of_the_year` */

DROP TABLE IF EXISTS `tblleave_of_the_year`;

CREATE TABLE `tblleave_of_the_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `value` double DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblleave_of_the_year` */

/*Table structure for table `tbllist_widget` */

DROP TABLE IF EXISTS `tbllist_widget`;

CREATE TABLE `tbllist_widget` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `add_from` int(11) NOT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `rel_type` varchar(45) DEFAULT NULL,
  `layout` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbllist_widget` */

/*Table structure for table `tblmail_queue` */

DROP TABLE IF EXISTS `tblmail_queue`;

CREATE TABLE `tblmail_queue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engine` varchar(40) DEFAULT NULL,
  `email` varchar(191) NOT NULL,
  `cc` text DEFAULT NULL,
  `bcc` text DEFAULT NULL,
  `message` mediumtext NOT NULL,
  `alt_message` mediumtext DEFAULT NULL,
  `status` enum('pending','sending','sent','failed') DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `headers` text DEFAULT NULL,
  `attachments` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblmail_queue` */

/*Table structure for table `tblmanage_leave` */

DROP TABLE IF EXISTS `tblmanage_leave`;

CREATE TABLE `tblmanage_leave` (
  `leave_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_staff` int(11) NOT NULL,
  `leave_date` int(11) DEFAULT NULL,
  `leave_year` int(11) DEFAULT NULL,
  `accumulated_leave` int(11) DEFAULT NULL,
  `seniority_leave` int(11) DEFAULT NULL,
  `borrow_leave` int(11) DEFAULT NULL,
  `actual_leave` int(11) DEFAULT NULL,
  `expected_leave` int(11) DEFAULT NULL,
  PRIMARY KEY (`leave_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblmanage_leave` */

/*Table structure for table `tblmigrations` */

DROP TABLE IF EXISTS `tblmigrations`;

CREATE TABLE `tblmigrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblmigrations` */

insert  into `tblmigrations`(`version`) values 
(300);

/*Table structure for table `tblmilestones` */

DROP TABLE IF EXISTS `tblmilestones`;

CREATE TABLE `tblmilestones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `description_visible_to_customer` tinyint(1) DEFAULT 0,
  `start_date` date DEFAULT NULL,
  `due_date` date NOT NULL,
  `project_id` int(11) NOT NULL,
  `color` varchar(10) DEFAULT NULL,
  `milestone_order` int(11) NOT NULL DEFAULT 0,
  `datecreated` date NOT NULL,
  `hide_from_customer` int(11) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblmilestones` */

/*Table structure for table `tblmodules` */

DROP TABLE IF EXISTS `tblmodules`;

CREATE TABLE `tblmodules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(55) NOT NULL,
  `installed_version` varchar(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

/*Data for the table `tblmodules` */

insert  into `tblmodules`(`id`,`module_name`,`installed_version`,`active`) values 
(1,'exports','1.0.0',1),
(2,'menu_setup','2.3.0',1),
(3,'theme_style','2.3.0',1),
(4,'hr_profile','1.0.3',1),
(5,'commission','1.0.4',1),
(6,'appointly','1.1.9',1),
(7,'backup','2.3.0',1),
(8,'purchase','1.0.6',1),
(9,'timesheets','1.1.2',1),
(10,'warehouse','1.1.7',1),
(11,'custom_email_and_sms_notifications','2.3.0',1),
(12,'multi_page_wtl','1.0.3',1),
(13,'support_contact','1.0',1),
(14,'accounting','1.0.5',1);

/*Table structure for table `tblnewsfeed_comment_likes` */

DROP TABLE IF EXISTS `tblnewsfeed_comment_likes`;

CREATE TABLE `tblnewsfeed_comment_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `commentid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateliked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblnewsfeed_comment_likes` */

/*Table structure for table `tblnewsfeed_post_comments` */

DROP TABLE IF EXISTS `tblnewsfeed_post_comments`;

CREATE TABLE `tblnewsfeed_post_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `postid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblnewsfeed_post_comments` */

/*Table structure for table `tblnewsfeed_post_likes` */

DROP TABLE IF EXISTS `tblnewsfeed_post_likes`;

CREATE TABLE `tblnewsfeed_post_likes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `postid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateliked` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblnewsfeed_post_likes` */

/*Table structure for table `tblnewsfeed_posts` */

DROP TABLE IF EXISTS `tblnewsfeed_posts`;

CREATE TABLE `tblnewsfeed_posts` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `creator` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `visibility` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `pinned` int(11) NOT NULL,
  `datepinned` datetime DEFAULT NULL,
  PRIMARY KEY (`postid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblnewsfeed_posts` */

/*Table structure for table `tblnotes` */

DROP TABLE IF EXISTS `tblnotes`;

CREATE TABLE `tblnotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `description` text DEFAULT NULL,
  `date_contacted` datetime DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblnotes` */

/*Table structure for table `tblnotifications` */

DROP TABLE IF EXISTS `tblnotifications`;

CREATE TABLE `tblnotifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isread` int(11) NOT NULL DEFAULT 0,
  `isread_inline` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL,
  `description` text NOT NULL,
  `fromuserid` int(11) NOT NULL,
  `fromclientid` int(11) NOT NULL DEFAULT 0,
  `from_fullname` varchar(100) NOT NULL,
  `touserid` int(11) NOT NULL,
  `fromcompany` int(11) DEFAULT NULL,
  `link` mediumtext DEFAULT NULL,
  `additional_data` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblnotifications` */

insert  into `tblnotifications`(`id`,`isread`,`isread_inline`,`date`,`description`,`fromuserid`,`fromclientid`,`from_fullname`,`touserid`,`fromcompany`,`link`,`additional_data`) values 
(1,0,0,'2023-01-03 12:24:24','not_proposal_proposal_accepted',0,0,'',1,1,'proposals/list_proposals/1','a:1:{i:0;s:10:\"PRO-000001\";}'),
(2,0,0,'2023-01-04 16:09:12','not_customer_viewed_proposal',0,0,'',1,1,'proposals/list_proposals/4','a:1:{i:0;s:10:\"PRO-000004\";}');

/*Table structure for table `tbloptions` */

DROP TABLE IF EXISTS `tbloptions`;

CREATE TABLE `tbloptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `value` longtext NOT NULL,
  `autoload` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=535 DEFAULT CHARSET=utf8;

/*Data for the table `tbloptions` */

insert  into `tbloptions`(`id`,`name`,`value`,`autoload`) values 
(1,'dateformat','Y-m-d|%Y-%m-%d',1),
(2,'companyname','Able CRM',1),
(3,'services','1',1),
(4,'maximum_allowed_ticket_attachments','4',1),
(5,'ticket_attachments_file_extensions','.jpg,.png,.pdf,.doc,.zip,.rar',1),
(6,'staff_access_only_assigned_departments','1',1),
(7,'use_knowledge_base','0',1),
(8,'smtp_email','',1),
(9,'smtp_password','',1),
(10,'company_info_format','{company_name}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}',0),
(11,'smtp_port','',1),
(12,'smtp_host','',1),
(13,'smtp_email_charset','utf-8',1),
(14,'default_timezone','Asia/Kolkata',1),
(15,'clients_default_theme','perfex',1),
(16,'company_logo','f87b2a7ed11b2448c7576e243623f135.png',1),
(17,'tables_pagination_limit','25',1),
(18,'main_domain','ablecrm.com',1),
(19,'allow_registration','0',1),
(20,'knowledge_base_without_registration','0',1),
(21,'email_signature','',1),
(22,'default_staff_role','1',1),
(23,'newsfeed_maximum_files_upload','10',1),
(24,'contract_expiration_before','4',1),
(25,'invoice_prefix','INV-',1),
(26,'decimal_separator','.',1),
(27,'thousand_separator',',',1),
(28,'invoice_company_name','',1),
(29,'invoice_company_address','',1),
(30,'invoice_company_city','',1),
(31,'invoice_company_country_code','',1),
(32,'invoice_company_postal_code','',1),
(33,'invoice_company_phonenumber','',1),
(34,'view_invoice_only_logged_in','0',1),
(35,'invoice_number_format','1',1),
(36,'next_invoice_number','1',0),
(37,'active_language','english',1),
(38,'invoice_number_decrement_on_delete','1',1),
(39,'automatically_send_invoice_overdue_reminder_after','1',1),
(40,'automatically_resend_invoice_overdue_reminder_after','3',1),
(41,'expenses_auto_operations_hour','21',1),
(42,'delete_only_on_last_invoice','1',1),
(43,'delete_only_on_last_estimate','1',1),
(44,'create_invoice_from_recurring_only_on_paid_invoices','0',1),
(45,'allow_payment_amount_to_be_modified','1',1),
(46,'rtl_support_client','0',1),
(47,'limit_top_search_bar_results_to','10',1),
(48,'estimate_prefix','EST-',1),
(49,'next_estimate_number','1',0),
(50,'estimate_number_decrement_on_delete','1',1),
(51,'estimate_number_format','1',1),
(52,'estimate_auto_convert_to_invoice_on_client_accept','1',1),
(53,'exclude_estimate_from_client_area_with_draft_status','1',1),
(54,'rtl_support_admin','0',1),
(55,'last_cron_run','',1),
(56,'show_sale_agent_on_estimates','1',1),
(57,'show_sale_agent_on_invoices','1',1),
(58,'predefined_terms_invoice','',1),
(59,'predefined_terms_estimate','',1),
(60,'default_task_priority','2',1),
(61,'dropbox_app_key','',1),
(62,'show_expense_reminders_on_calendar','1',1),
(63,'only_show_contact_tickets','1',1),
(64,'predefined_clientnote_invoice','',1),
(65,'predefined_clientnote_estimate','',1),
(66,'custom_pdf_logo_image_url','',1),
(67,'favicon','favicon.ico',1),
(68,'invoice_due_after','30',1),
(69,'google_api_key','',1),
(70,'google_calendar_main_calendar','',1),
(71,'default_tax','a:0:{}',1),
(72,'show_invoices_on_calendar','1',1),
(73,'show_estimates_on_calendar','1',1),
(74,'show_contracts_on_calendar','1',1),
(75,'show_tasks_on_calendar','1',1),
(76,'show_customer_reminders_on_calendar','1',1),
(77,'output_client_pdfs_from_admin_area_in_client_language','0',1),
(78,'show_lead_reminders_on_calendar','1',1),
(79,'send_estimate_expiry_reminder_before','4',1),
(80,'leads_default_source','',1),
(81,'leads_default_status','2',1),
(82,'proposal_expiry_reminder_enabled','1',1),
(83,'send_proposal_expiry_reminder_before','4',1),
(84,'default_contact_permissions','a:6:{i:0;s:1:\"1\";i:1;s:1:\"2\";i:2;s:1:\"3\";i:3;s:1:\"4\";i:4;s:1:\"5\";i:5;s:1:\"6\";}',1),
(85,'pdf_logo_width','150',1),
(86,'access_tickets_to_none_staff_members','0',1),
(87,'customer_default_country','178',1),
(88,'view_estimate_only_logged_in','0',1),
(89,'show_status_on_pdf_ei','1',1),
(90,'email_piping_only_replies','0',1),
(91,'email_piping_only_registered','0',1),
(92,'default_view_calendar','dayGridMonth',1),
(93,'email_piping_default_priority','2',1),
(94,'total_to_words_lowercase','0',1),
(95,'show_tax_per_item','1',1),
(96,'total_to_words_enabled','0',1),
(97,'receive_notification_on_new_ticket','1',0),
(98,'autoclose_tickets_after','0',1),
(99,'media_max_file_size_upload','10',1),
(100,'client_staff_add_edit_delete_task_comments_first_hour','0',1),
(101,'show_projects_on_calendar','1',1),
(102,'leads_kanban_limit','50',1),
(103,'tasks_reminder_notification_before','2',1),
(104,'pdf_font','freesans',1),
(105,'pdf_table_heading_color','#323a45',1),
(106,'pdf_table_heading_text_color','#ffffff',1),
(107,'pdf_font_size','10',1),
(108,'default_leads_kanban_sort','leadorder',1),
(109,'default_leads_kanban_sort_type','asc',1),
(110,'allowed_files','.png,.jpg,.pdf,.doc,.docx,.xls,.xlsx,.zip,.rar,.txt',1),
(111,'show_all_tasks_for_project_member','1',1),
(112,'email_protocol','smtp',1),
(113,'calendar_first_day','0',1),
(114,'recaptcha_secret_key','',1),
(115,'show_help_on_setup_menu','1',1),
(116,'show_proposals_on_calendar','1',1),
(117,'smtp_encryption','',1),
(118,'recaptcha_site_key','',1),
(119,'smtp_username','',1),
(120,'auto_stop_tasks_timers_on_new_timer','1',1),
(121,'notification_when_customer_pay_invoice','1',1),
(122,'calendar_invoice_color','#FF6F00',1),
(123,'calendar_estimate_color','#FF6F00',1),
(124,'calendar_proposal_color','#84c529',1),
(125,'new_task_auto_assign_current_member','1',1),
(126,'calendar_reminder_color','#03A9F4',1),
(127,'calendar_contract_color','#B72974',1),
(128,'calendar_project_color','#B72974',1),
(129,'update_info_message','',1),
(130,'show_estimate_reminders_on_calendar','1',1),
(131,'show_invoice_reminders_on_calendar','1',1),
(132,'show_proposal_reminders_on_calendar','1',1),
(133,'proposal_due_after','7',1),
(134,'allow_customer_to_change_ticket_status','0',1),
(135,'lead_lock_after_convert_to_customer','0',1),
(136,'default_proposals_pipeline_sort','pipeline_order',1),
(137,'default_proposals_pipeline_sort_type','asc',1),
(138,'default_estimates_pipeline_sort','pipeline_order',1),
(139,'default_estimates_pipeline_sort_type','asc',1),
(140,'use_recaptcha_customers_area','0',1),
(141,'remove_decimals_on_zero','0',1),
(142,'remove_tax_name_from_item_table','0',1),
(143,'pdf_format_invoice','A4-PORTRAIT',1),
(144,'pdf_format_estimate','A4-PORTRAIT',1),
(145,'pdf_format_proposal','A4-PORTRAIT',1),
(146,'pdf_format_payment','A4-PORTRAIT',1),
(147,'pdf_format_contract','A4-PORTRAIT',1),
(148,'swap_pdf_info','0',1),
(149,'exclude_invoice_from_client_area_with_draft_status','1',1),
(150,'cron_has_run_from_cli','0',1),
(151,'hide_cron_is_required_message','0',0),
(152,'auto_assign_customer_admin_after_lead_convert','0',1),
(153,'show_transactions_on_invoice_pdf','1',1),
(154,'show_pay_link_to_invoice_pdf','1',1),
(155,'tasks_kanban_limit','50',1),
(156,'purchase_key','',1),
(157,'estimates_pipeline_limit','50',1),
(158,'proposals_pipeline_limit','50',1),
(159,'proposal_number_prefix','PRO-',1),
(160,'number_padding_prefixes','6',1),
(161,'show_page_number_on_pdf','0',1),
(162,'calendar_events_limit','4',1),
(163,'show_setup_menu_item_only_on_hover','0',1),
(164,'company_requires_vat_number_field','0',1),
(165,'company_is_required','0',1),
(166,'allow_contact_to_delete_files','0',1),
(167,'company_vat','',1),
(168,'di','1669641323',1),
(169,'invoice_auto_operations_hour','21',1),
(170,'use_minified_files','0',1),
(171,'only_own_files_contacts','0',1),
(172,'allow_primary_contact_to_view_edit_billing_and_shipping','0',1),
(173,'estimate_due_after','7',1),
(174,'staff_members_open_tickets_to_all_contacts','1',1),
(175,'time_format','24',1),
(176,'delete_activity_log_older_then','1',1),
(177,'disable_language','0',1),
(178,'company_state','',1),
(179,'email_header','<!doctype html>\r\n                            <html>\r\n                            <head>\r\n                              <meta name=\"viewport\" content=\"width=device-width\" />\r\n                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n                              <style>\r\n                                body {\r\n                                 background-color: #f6f6f6;\r\n                                 font-family: sans-serif;\r\n                                 -webkit-font-smoothing: antialiased;\r\n                                 font-size: 14px;\r\n                                 line-height: 1.4;\r\n                                 margin: 0;\r\n                                 padding: 0;\r\n                                 -ms-text-size-adjust: 100%;\r\n                                 -webkit-text-size-adjust: 100%;\r\n                               }\r\n                               table {\r\n                                 border-collapse: separate;\r\n                                 mso-table-lspace: 0pt;\r\n                                 mso-table-rspace: 0pt;\r\n                                 width: 100%;\r\n                               }\r\n                               table td {\r\n                                 font-family: sans-serif;\r\n                                 font-size: 14px;\r\n                                 vertical-align: top;\r\n                               }\r\n                                   /* -------------------------------------\r\n                                     BODY & CONTAINER\r\n                                     ------------------------------------- */\r\n                                     .body {\r\n                                       background-color: #f6f6f6;\r\n                                       width: 100%;\r\n                                     }\r\n                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n\r\n                                     .container {\r\n                                       display: block;\r\n                                       margin: 0 auto !important;\r\n                                       /* makes it centered */\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                       width: 680px;\r\n                                     }\r\n                                     /* This should also be a block element, so that it will fill 100% of the .container */\r\n\r\n                                     .content {\r\n                                       box-sizing: border-box;\r\n                                       display: block;\r\n                                       margin: 0 auto;\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     HEADER, FOOTER, MAIN\r\n                                     ------------------------------------- */\r\n\r\n                                     .main {\r\n                                       background: #fff;\r\n                                       border-radius: 3px;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .wrapper {\r\n                                       box-sizing: border-box;\r\n                                       padding: 20px;\r\n                                     }\r\n                                     .footer {\r\n                                       clear: both;\r\n                                       padding-top: 10px;\r\n                                       text-align: center;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .footer td,\r\n                                     .footer p,\r\n                                     .footer span,\r\n                                     .footer a {\r\n                                       color: #999999;\r\n                                       font-size: 12px;\r\n                                       text-align: center;\r\n                                     }\r\n                                     hr {\r\n                                       border: 0;\r\n                                       border-bottom: 1px solid #f6f6f6;\r\n                                       margin: 20px 0;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n                                     ------------------------------------- */\r\n\r\n                                     @media only screen and (max-width: 620px) {\r\n                                       table[class=body] .content {\r\n                                         padding: 0 !important;\r\n                                       }\r\n                                       table[class=body] .container {\r\n                                         padding: 0 !important;\r\n                                         width: 100% !important;\r\n                                       }\r\n                                       table[class=body] .main {\r\n                                         border-left-width: 0 !important;\r\n                                         border-radius: 0 !important;\r\n                                         border-right-width: 0 !important;\r\n                                       }\r\n                                     }\r\n                                   </style>\r\n                                 </head>\r\n                                 <body class=\"\">\r\n                                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\">\r\n                                    <tr>\r\n                                     <td>&nbsp;</td>\r\n                                     <td class=\"container\">\r\n                                      <div class=\"content\">\r\n                                        <!-- START CENTERED WHITE CONTAINER -->\r\n                                        <table class=\"main\">\r\n                                          <!-- START MAIN CONTENT AREA -->\r\n                                          <tr>\r\n                                           <td class=\"wrapper\">\r\n                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                              <tr>\r\n                                               <td>',1),
(180,'show_pdf_signature_invoice','1',0),
(181,'show_pdf_signature_estimate','1',0),
(182,'signature_image','',0),
(183,'email_footer','</td>\r\n                             </tr>\r\n                           </table>\r\n                         </td>\r\n                       </tr>\r\n                       <!-- END MAIN CONTENT AREA -->\r\n                     </table>\r\n                     <!-- START FOOTER -->\r\n                     <div class=\"footer\">\r\n                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                          <td class=\"content-block\">\r\n                            <span>{companyname}</span>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </div>\r\n                    <!-- END FOOTER -->\r\n                    <!-- END CENTERED WHITE CONTAINER -->\r\n                  </div>\r\n                </td>\r\n                <td>&nbsp;</td>\r\n              </tr>\r\n            </table>\r\n            </body>\r\n            </html>',1),
(184,'exclude_proposal_from_client_area_with_draft_status','1',1),
(185,'pusher_app_key','',1),
(186,'pusher_app_secret','',1),
(187,'pusher_app_id','',1),
(188,'pusher_realtime_notifications','0',1),
(189,'pdf_format_statement','A4-PORTRAIT',1),
(190,'pusher_cluster','',1),
(191,'show_table_export_button','to_all',1),
(192,'allow_staff_view_proposals_assigned','1',1),
(193,'show_cloudflare_notice','1',0),
(194,'task_modal_class','modal-lg',1),
(195,'lead_modal_class','modal-lg',1),
(196,'show_timesheets_overview_all_members_notice_admins','0',1),
(197,'desktop_notifications','0',1),
(198,'hide_notified_reminders_from_calendar','1',0),
(199,'customer_info_format','{company_name}<br />\r\n{street}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{vat_number_with_label}',0),
(200,'timer_started_change_status_in_progress','1',0),
(201,'default_ticket_reply_status','3',1),
(202,'default_task_status','auto',1),
(203,'email_queue_skip_with_attachments','1',1),
(204,'email_queue_enabled','0',1),
(205,'last_email_queue_retry','',1),
(206,'auto_dismiss_desktop_notifications_after','0',1),
(207,'proposal_info_format','{proposal_to}<br />\r\n{address}<br />\r\n{city} {state}<br />\r\n{country_code} {zip_code}<br />\r\n{phone}<br />\r\n{email}',0),
(208,'ticket_replies_order','asc',1),
(209,'new_recurring_invoice_action','generate_and_send',0),
(210,'bcc_emails','',0),
(211,'email_templates_language_checks','',0),
(212,'proposal_accept_identity_confirmation','1',0),
(213,'estimate_accept_identity_confirmation','1',0),
(214,'new_task_auto_follower_current_member','0',1),
(215,'task_biillable_checked_on_creation','1',1),
(216,'predefined_clientnote_credit_note','',1),
(217,'predefined_terms_credit_note','',1),
(218,'next_credit_note_number','1',1),
(219,'credit_note_prefix','CN-',1),
(220,'credit_note_number_decrement_on_delete','1',1),
(221,'pdf_format_credit_note','A4-PORTRAIT',1),
(222,'show_pdf_signature_credit_note','1',0),
(223,'show_credit_note_reminders_on_calendar','1',1),
(224,'show_amount_due_on_invoice','1',1),
(225,'show_total_paid_on_invoice','1',1),
(226,'show_credits_applied_on_invoice','1',1),
(227,'staff_members_create_inline_lead_status','0',1),
(228,'staff_members_create_inline_customer_groups','0',1),
(229,'staff_members_create_inline_ticket_services','0',1),
(230,'staff_members_save_tickets_predefined_replies','0',1),
(231,'staff_members_create_inline_contract_types','0',1),
(232,'staff_members_create_inline_expense_categories','0',1),
(233,'show_project_on_credit_note','1',1),
(234,'proposals_auto_operations_hour','21',1),
(235,'estimates_auto_operations_hour','21',1),
(236,'contracts_auto_operations_hour','21',1),
(237,'credit_note_number_format','1',1),
(238,'allow_non_admin_members_to_import_leads','0',1),
(239,'e_sign_legal_text','By clicking on \"Sign\", I consent to be legally bound by this electronic representation of my signature.',1),
(240,'show_pdf_signature_contract','1',1),
(241,'view_contract_only_logged_in','0',1),
(242,'show_subscriptions_in_customers_area','1',1),
(243,'calendar_only_assigned_tasks','0',1),
(244,'after_subscription_payment_captured','send_invoice_and_receipt',1),
(245,'mail_engine','phpmailer',1),
(246,'gdpr_enable_terms_and_conditions','1',1),
(247,'privacy_policy','<p><span>Privacy Policy</span></p>',1),
(248,'terms_and_conditions','<p><span>Terms &amp; Conditions</span></p>',1),
(249,'gdpr_enable_terms_and_conditions_lead_form','1',1),
(250,'gdpr_enable_terms_and_conditions_ticket_form','0',1),
(251,'gdpr_contact_enable_right_to_be_forgotten','0',1),
(252,'show_gdpr_in_customers_menu','1',1),
(253,'show_gdpr_link_in_footer','1',1),
(254,'enable_gdpr','1',1),
(255,'gdpr_on_forgotten_remove_invoices_credit_notes','0',1),
(256,'gdpr_on_forgotten_remove_estimates','0',1),
(257,'gdpr_enable_consent_for_contacts','0',1),
(258,'gdpr_consent_public_page_top_block','',1),
(259,'gdpr_page_top_information_block','<p>GDPR page top information block</p>\r\n<div class=\"form-group\">\r\n<div class=\"mce-tinymce mce-container mce-panel\"></div>\r\n</div>',1),
(260,'gdpr_enable_lead_public_form','1',1),
(261,'gdpr_show_lead_custom_fields_on_public_form','0',1),
(262,'gdpr_lead_attachments_on_public_form','0',1),
(263,'gdpr_enable_consent_for_leads','0',1),
(264,'gdpr_lead_enable_right_to_be_forgotten','1',1),
(265,'allow_staff_view_invoices_assigned','1',1),
(266,'gdpr_data_portability_leads','0',1),
(267,'gdpr_lead_data_portability_allowed','',1),
(268,'gdpr_contact_data_portability_allowed','',1),
(269,'gdpr_data_portability_contacts','0',1),
(270,'allow_staff_view_estimates_assigned','1',1),
(271,'gdpr_after_lead_converted_delete','0',1),
(272,'gdpr_show_terms_and_conditions_in_footer','1',1),
(273,'save_last_order_for_tables','0',1),
(274,'company_logo_dark','cca7d06291bf378b0978798b569397ff.png',1),
(275,'customers_register_require_confirmation','0',1),
(276,'allow_non_admin_staff_to_delete_ticket_attachments','0',1),
(277,'receive_notification_on_new_ticket_replies','1',0),
(278,'google_client_id','',1),
(279,'enable_google_picker','1',1),
(280,'show_ticket_reminders_on_calendar','1',1),
(281,'ticket_import_reply_only','0',1),
(282,'visible_customer_profile_tabs','all',0),
(283,'show_project_on_invoice','1',1),
(284,'show_project_on_estimate','1',1),
(285,'staff_members_create_inline_lead_source','0',1),
(286,'lead_unique_validation','[\"email\"]',1),
(287,'last_upgrade_copy_data','',1),
(288,'custom_js_admin_scripts','',1),
(289,'custom_js_customer_scripts','0',1),
(290,'stripe_webhook_id','',1),
(291,'stripe_webhook_signing_secret','',1),
(292,'stripe_ideal_webhook_id','',1),
(293,'stripe_ideal_webhook_signing_secret','',1),
(294,'show_php_version_notice','1',0),
(295,'recaptcha_ignore_ips','',1),
(296,'show_task_reminders_on_calendar','1',1),
(297,'customer_settings','true',1),
(298,'tasks_reminder_notification_hour','21',1),
(299,'allow_primary_contact_to_manage_other_contacts','0',1),
(300,'items_table_amounts_exclude_currency_symbol','1',1),
(301,'round_off_task_timer_option','0',1),
(302,'round_off_task_timer_time','5',1),
(303,'bitly_access_token','',1),
(304,'enable_support_menu_badges','0',1),
(305,'attach_invoice_to_payment_receipt_email','0',1),
(306,'invoice_due_notice_before','2',1),
(307,'invoice_due_notice_resend_after','0',1),
(308,'_leads_settings','true',1),
(309,'show_estimate_request_in_customers_area','0',1),
(310,'gdpr_enable_terms_and_conditions_estimate_request_form','1',1),
(311,'upgraded_from_version','',0),
(312,'identification_key','88275216316696413626384b492c4367',1),
(313,'automatically_stop_task_timer_after_hours','8',1),
(314,'automatically_assign_ticket_to_first_staff_responding','0',1),
(315,'reminder_for_completed_but_not_billed_tasks','0',1),
(316,'staff_notify_completed_but_not_billed_tasks','',1),
(317,'reminder_for_completed_but_not_billed_tasks_days','',1),
(318,'tasks_reminder_notification_last_notified_day','',1),
(319,'staff_related_ticket_notification_to_assignee_only','0',1),
(320,'show_pdf_signature_proposal','1',1),
(321,'enable_honeypot_spam_validation','0',1),
(322,'sms_clickatell_api_key','',1),
(323,'sms_clickatell_active','0',1),
(324,'sms_clickatell_initialized','1',1),
(325,'sms_msg91_sender_id','',1),
(326,'sms_msg91_api_type','api',1),
(327,'sms_msg91_auth_key','',1),
(328,'sms_msg91_active','0',1),
(329,'sms_msg91_initialized','1',1),
(330,'sms_twilio_account_sid','',1),
(331,'sms_twilio_auth_token','',1),
(332,'sms_twilio_phone_number','',1),
(333,'sms_twilio_sender_id','',1),
(334,'sms_twilio_active','0',1),
(335,'sms_twilio_initialized','1',1),
(336,'aside_menu_active','[]',1),
(337,'setup_menu_active','[]',1),
(338,'theme_style','[]',1),
(339,'theme_style_custom_admin_area','',1),
(340,'theme_style_custom_clients_area','',1),
(341,'theme_style_custom_clients_and_admin_area','',1),
(342,'appointly_responsible_person','',1),
(343,'callbacks_responsible_person','',1),
(344,'appointly_show_clients_schedule_button','0',1),
(345,'appointly_tab_on_clients_page','0',1),
(346,'appointly_also_delete_in_google_calendar','1',1),
(347,'appointments_show_past_times','1',1),
(348,'appointments_disable_weekends','1',1),
(349,'appointly_client_meeting_approved_default','0',1),
(350,'appointly_google_client_secret','',1),
(351,'appointly_outlook_client_id','',1),
(352,'appointly_available_hours','[\"08:00\",\"08:30\",\"09:00\",\"09:30\",\"10:00\",\"10:30\",\"11:00\",\"11:30\",\"12:00\",\"12:30\",\"13:00\",\"13:30\",\"14:00\",\"14:30\",\"15:00\",\"15:30\",\"16:00\",\"16:30\",\"17:00\"]',1),
(353,'appointly_default_feedbacks','[\"0\",\"1\",\"2\",\"3\",\"4\",\"5\",\"6\"]',1),
(354,'appointly_busy_times_enabled','1',1),
(355,'callbacks_mode_enabled','1',1),
(356,'appointly_appointments_recaptcha','0',1),
(357,'auto_backup_enabled','0',1),
(358,'auto_backup_every','7',1),
(359,'last_auto_backup','',1),
(360,'delete_backups_older_then','0',1),
(361,'auto_backup_hour','6',1),
(362,'paymentmethod_authorize_acceptjs_active','0',1),
(363,'paymentmethod_authorize_acceptjs_label','Authorize.net Accept.js',1),
(364,'paymentmethod_authorize_acceptjs_public_key','',0),
(365,'paymentmethod_authorize_acceptjs_api_login_id','',0),
(366,'paymentmethod_authorize_acceptjs_api_transaction_key','',0),
(367,'paymentmethod_authorize_acceptjs_description_dashboard','Payment for Invoice {invoice_number}',0),
(368,'paymentmethod_authorize_acceptjs_currencies','USD',0),
(369,'paymentmethod_authorize_acceptjs_test_mode_enabled','0',0),
(370,'paymentmethod_authorize_acceptjs_default_selected','1',1),
(371,'paymentmethod_authorize_acceptjs_initialized','1',1),
(372,'paymentmethod_instamojo_active','0',1),
(373,'paymentmethod_instamojo_label','Instamojo',1),
(374,'paymentmethod_instamojo_api_key','',0),
(375,'paymentmethod_instamojo_auth_token','',0),
(376,'paymentmethod_instamojo_description_dashboard','Payment for Invoice {invoice_number}',0),
(377,'paymentmethod_instamojo_currencies','INR',0),
(378,'paymentmethod_instamojo_test_mode_enabled','1',0),
(379,'paymentmethod_instamojo_default_selected','1',1),
(380,'paymentmethod_instamojo_initialized','1',1),
(381,'paymentmethod_mollie_active','0',1),
(382,'paymentmethod_mollie_label','Mollie',1),
(383,'paymentmethod_mollie_api_key','',0),
(384,'paymentmethod_mollie_description_dashboard','Payment for Invoice {invoice_number}',0),
(385,'paymentmethod_mollie_currencies','EUR',0),
(386,'paymentmethod_mollie_test_mode_enabled','1',0),
(387,'paymentmethod_mollie_default_selected','1',1),
(388,'paymentmethod_mollie_initialized','1',1),
(389,'paymentmethod_paypal_braintree_active','0',1),
(390,'paymentmethod_paypal_braintree_label','Braintree',1),
(391,'paymentmethod_paypal_braintree_merchant_id','',0),
(392,'paymentmethod_paypal_braintree_api_public_key','',0),
(393,'paymentmethod_paypal_braintree_api_private_key','',0),
(394,'paymentmethod_paypal_braintree_currencies','USD',0),
(395,'paymentmethod_paypal_braintree_paypal_enabled','1',0),
(396,'paymentmethod_paypal_braintree_test_mode_enabled','1',0),
(397,'paymentmethod_paypal_braintree_default_selected','1',1),
(398,'paymentmethod_paypal_braintree_initialized','1',1),
(399,'paymentmethod_paypal_checkout_active','0',1),
(400,'paymentmethod_paypal_checkout_label','Paypal Smart Checkout',1),
(401,'paymentmethod_paypal_checkout_client_id','',0),
(402,'paymentmethod_paypal_checkout_secret','',0),
(403,'paymentmethod_paypal_checkout_payment_description','Payment for Invoice {invoice_number}',0),
(404,'paymentmethod_paypal_checkout_currencies','USD,CAD,EUR',0),
(405,'paymentmethod_paypal_checkout_test_mode_enabled','1',0),
(406,'paymentmethod_paypal_checkout_default_selected','1',1),
(407,'paymentmethod_paypal_checkout_initialized','1',1),
(408,'paymentmethod_paypal_active','0',1),
(409,'paymentmethod_paypal_label','Paypal',1),
(410,'paymentmethod_paypal_username','',0),
(411,'paymentmethod_paypal_password','',0),
(412,'paymentmethod_paypal_signature','',0),
(413,'paymentmethod_paypal_description_dashboard','Payment for Invoice {invoice_number}',0),
(414,'paymentmethod_paypal_currencies','EUR,USD',0),
(415,'paymentmethod_paypal_test_mode_enabled','1',0),
(416,'paymentmethod_paypal_default_selected','1',1),
(417,'paymentmethod_paypal_initialized','1',1),
(418,'paymentmethod_payu_money_active','0',1),
(419,'paymentmethod_payu_money_label','PayU Money',1),
(420,'paymentmethod_payu_money_key','',0),
(421,'paymentmethod_payu_money_salt','',0),
(422,'paymentmethod_payu_money_description_dashboard','Payment for Invoice {invoice_number}',0),
(423,'paymentmethod_payu_money_currencies','INR',0),
(424,'paymentmethod_payu_money_test_mode_enabled','1',0),
(425,'paymentmethod_payu_money_default_selected','1',1),
(426,'paymentmethod_payu_money_initialized','1',1),
(427,'paymentmethod_stripe_active','0',1),
(428,'paymentmethod_stripe_label','Stripe Checkout',1),
(429,'paymentmethod_stripe_api_publishable_key','',0),
(430,'paymentmethod_stripe_api_secret_key','',0),
(431,'paymentmethod_stripe_description_dashboard','Payment for Invoice {invoice_number}',0),
(432,'paymentmethod_stripe_currencies','USD,CAD',0),
(433,'paymentmethod_stripe_allow_primary_contact_to_update_credit_card','1',0),
(434,'paymentmethod_stripe_default_selected','1',1),
(435,'paymentmethod_stripe_initialized','1',1),
(436,'paymentmethod_stripe_ideal_active','0',1),
(437,'paymentmethod_stripe_ideal_label','Stripe iDEAL',1),
(438,'paymentmethod_stripe_ideal_api_secret_key','',0),
(439,'paymentmethod_stripe_ideal_api_publishable_key','',0),
(440,'paymentmethod_stripe_ideal_description_dashboard','Payment for Invoice {invoice_number}',0),
(441,'paymentmethod_stripe_ideal_statement_descriptor','Payment for Invoice {invoice_number}',0),
(442,'paymentmethod_stripe_ideal_currencies','EUR',0),
(443,'paymentmethod_stripe_ideal_default_selected','1',1),
(444,'paymentmethod_stripe_ideal_initialized','1',1),
(445,'paymentmethod_two_checkout_active','0',1),
(446,'paymentmethod_two_checkout_label','2Checkout',1),
(447,'paymentmethod_two_checkout_merchant_code','',0),
(448,'paymentmethod_two_checkout_secret_key','',0),
(449,'paymentmethod_two_checkout_description','Payment for Invoice {invoice_number}',0),
(450,'paymentmethod_two_checkout_currencies','USD, EUR, GBP',0),
(451,'paymentmethod_two_checkout_test_mode_enabled','1',0),
(452,'paymentmethod_two_checkout_default_selected','1',1),
(453,'paymentmethod_two_checkout_initialized','1',1),
(454,'warehouse_selling_price_rule_profif_ratio','0',1),
(455,'profit_rate_by_purchase_price_sale','0',1),
(456,'warehouse_the_fractional_part','0',1),
(457,'warehouse_integer_part','0',1),
(458,'auto_create_goods_received','0',1),
(459,'auto_create_goods_delivery','0',1),
(460,'goods_receipt_warehouse','',1),
(461,'barcode_with_sku_code','0',1),
(462,'revert_goods_receipt_goods_delivery','0',1),
(463,'cancelled_invoice_reverse_inventory_delivery_voucher','0',1),
(464,'uncancelled_invoice_create_inventory_delivery_voucher','0',1),
(465,'inventory_auto_operations_hour','0',1),
(466,'automatically_send_items_expired_before','0',1),
(467,'inventorys_cronjob_active','0',1),
(468,'inventory_cronjob_notification_recipients','',1),
(469,'inventory_received_number_prefix','NK',1),
(470,'next_inventory_received_mumber','1',1),
(471,'inventory_delivery_number_prefix','XK',1),
(472,'next_inventory_delivery_mumber','1',1),
(473,'internal_delivery_number_prefix','ID',1),
(474,'next_internal_delivery_mumber','1',1),
(475,'item_sku_prefix','',1),
(476,'goods_receipt_required_po','0',1),
(477,'goods_delivery_required_po','0',1),
(478,'goods_delivery_pdf_display','0',1),
(479,'aside_custom_email_and_sms_notifications_active','[]',1),
(480,'setup_custom_email_and_sms_notifications_active','[]',1),
(481,'support_contact','enable',1),
(482,'support_contact_viber','+396946941040',1),
(483,'support_contact_whatsapp','+396946941040',1),
(484,'support_contact_messenger_username','helpsupport',1),
(485,'support_contact_email_address','info@helpsupport.com',1),
(486,'aio_support_backend','0',1),
(487,'aio_support_frontend','0',1),
(488,'acc_first_month_of_financial_year','January',1),
(489,'acc_first_month_of_tax_year','same_as_financial_year',1),
(490,'acc_accounting_method','accrual',1),
(491,'acc_close_the_books','0',1),
(492,'acc_allow_changes_after_viewing','allow_changes_after_viewing_a_warning',1),
(493,'acc_close_book_password','',1),
(494,'acc_close_book_passwordr','',1),
(495,'acc_enable_account_numbers','0',1),
(496,'acc_show_account_numbers','0',1),
(497,'acc_closing_date','',1),
(498,'acc_add_default_account','1',1),
(499,'acc_add_default_account_new','0',1),
(500,'acc_invoice_automatic_conversion','1',1),
(501,'acc_payment_automatic_conversion','1',1),
(502,'acc_expense_automatic_conversion','1',1),
(503,'acc_tax_automatic_conversion','1',1),
(504,'acc_invoice_payment_account','66',1),
(505,'acc_invoice_deposit_to','88',1),
(506,'acc_payment_payment_account','1',1),
(507,'acc_payment_deposit_to','13',1),
(508,'acc_expense_payment_account','13',1),
(509,'acc_expense_deposit_to','80',1),
(510,'acc_tax_payment_account','29',1),
(511,'acc_tax_deposit_to','1',1),
(512,'acc_expense_tax_payment_account','13',1),
(513,'acc_expense_tax_deposit_to','29',1),
(514,'acc_active_payment_mode_mapping','1',1),
(515,'acc_active_expense_category_mapping','1',1),
(516,'acc_payment_expense_automatic_conversion','1',1),
(517,'acc_payment_sale_automatic_conversion','1',1),
(518,'acc_expense_payment_payment_account','1',1),
(519,'acc_expense_payment_deposit_to','1',1),
(520,'sms_trigger_invoice_overdue_notice','',0),
(521,'sms_trigger_invoice_due_notice','',0),
(522,'sms_trigger_invoice_payment_recorded','',0),
(523,'sms_trigger_estimate_expiration_reminder','',0),
(524,'sms_trigger_proposal_expiration_reminder','',0),
(525,'sms_trigger_proposal_new_comment_to_customer','',0),
(526,'sms_trigger_proposal_new_comment_to_staff','',0),
(527,'sms_trigger_contract_new_comment_to_customer','',0),
(528,'sms_trigger_contract_new_comment_to_staff','',0),
(529,'sms_trigger_contract_expiration_reminder','',0),
(530,'sms_trigger_staff_reminder','',0),
(531,'sms_trigger_appointly_appointment_approved_send_to_client','',0),
(532,'sms_trigger_appointly_appointment_cancelled_to_client','',0),
(533,'sms_trigger_appointly_appointment_reminder_to_client','',0),
(534,'show_project_on_proposal','0',1);

/*Table structure for table `tblp_t_form_question_box_description` */

DROP TABLE IF EXISTS `tblp_t_form_question_box_description`;

CREATE TABLE `tblp_t_form_question_box_description` (
  `questionboxdescriptionid` int(11) NOT NULL AUTO_INCREMENT,
  `description` mediumtext NOT NULL,
  `boxid` mediumtext NOT NULL,
  `questionid` int(11) NOT NULL,
  `correct` int(11) DEFAULT 1 COMMENT '0: correct 1: incorrect',
  PRIMARY KEY (`questionboxdescriptionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblp_t_form_question_box_description` */

/*Table structure for table `tblpayment_modes` */

DROP TABLE IF EXISTS `tblpayment_modes`;

CREATE TABLE `tblpayment_modes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `show_on_pdf` int(11) NOT NULL DEFAULT 0,
  `invoices_only` int(11) NOT NULL DEFAULT 0,
  `expenses_only` int(11) NOT NULL DEFAULT 0,
  `selected_by_default` int(11) NOT NULL DEFAULT 1,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblpayment_modes` */

insert  into `tblpayment_modes`(`id`,`name`,`description`,`show_on_pdf`,`invoices_only`,`expenses_only`,`selected_by_default`,`active`) values 
(1,'Bank',NULL,0,0,0,1,1);

/*Table structure for table `tblpinned_projects` */

DROP TABLE IF EXISTS `tblpinned_projects`;

CREATE TABLE `tblpinned_projects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpinned_projects` */

/*Table structure for table `tblposition_training_question_form` */

DROP TABLE IF EXISTS `tblposition_training_question_form`;

CREATE TABLE `tblposition_training_question_form` (
  `questionid` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) DEFAULT NULL,
  `question` mediumtext NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `question_order` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  PRIMARY KEY (`questionid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblposition_training_question_form` */

/*Table structure for table `tblproject_activity` */

DROP TABLE IF EXISTS `tblproject_activity`;

CREATE TABLE `tblproject_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 0,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `fullname` varchar(100) DEFAULT NULL,
  `visible_to_customer` int(11) NOT NULL DEFAULT 0,
  `description_key` varchar(191) NOT NULL COMMENT 'Language file key',
  `additional_data` text DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproject_activity` */

/*Table structure for table `tblproject_files` */

DROP TABLE IF EXISTS `tblproject_files`;

CREATE TABLE `tblproject_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_name` varchar(191) NOT NULL,
  `original_file_name` mediumtext DEFAULT NULL,
  `subject` varchar(191) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `project_id` int(11) NOT NULL,
  `visible_to_customer` tinyint(1) DEFAULT 0,
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `external` varchar(40) DEFAULT NULL,
  `external_link` text DEFAULT NULL,
  `thumbnail_link` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproject_files` */

/*Table structure for table `tblproject_members` */

DROP TABLE IF EXISTS `tblproject_members`;

CREATE TABLE `tblproject_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproject_members` */

/*Table structure for table `tblproject_notes` */

DROP TABLE IF EXISTS `tblproject_notes`;

CREATE TABLE `tblproject_notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `staff_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproject_notes` */

/*Table structure for table `tblproject_settings` */

DROP TABLE IF EXISTS `tblproject_settings`;

CREATE TABLE `tblproject_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `value` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `project_id` (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproject_settings` */

/*Table structure for table `tblprojectdiscussioncomments` */

DROP TABLE IF EXISTS `tblprojectdiscussioncomments`;

CREATE TABLE `tblprojectdiscussioncomments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `discussion_id` int(11) NOT NULL,
  `discussion_type` varchar(10) NOT NULL,
  `parent` int(11) DEFAULT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `content` text NOT NULL,
  `staff_id` int(11) NOT NULL,
  `contact_id` int(11) DEFAULT 0,
  `fullname` varchar(191) DEFAULT NULL,
  `file_name` varchar(191) DEFAULT NULL,
  `file_mime_type` varchar(70) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblprojectdiscussioncomments` */

/*Table structure for table `tblprojectdiscussions` */

DROP TABLE IF EXISTS `tblprojectdiscussions`;

CREATE TABLE `tblprojectdiscussions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `show_to_customer` tinyint(1) NOT NULL DEFAULT 0,
  `datecreated` datetime NOT NULL,
  `last_activity` datetime DEFAULT NULL,
  `staff_id` int(11) NOT NULL DEFAULT 0,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblprojectdiscussions` */

/*Table structure for table `tblprojects` */

DROP TABLE IF EXISTS `tblprojects`;

CREATE TABLE `tblprojects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `clientid` int(11) NOT NULL,
  `billing_type` int(11) NOT NULL,
  `start_date` date NOT NULL,
  `deadline` date DEFAULT NULL,
  `project_created` date NOT NULL,
  `date_finished` datetime DEFAULT NULL,
  `progress` int(11) DEFAULT 0,
  `progress_from_tasks` int(11) NOT NULL DEFAULT 1,
  `project_cost` decimal(15,2) DEFAULT NULL,
  `project_rate_per_hour` decimal(15,2) DEFAULT NULL,
  `estimated_hours` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `contact_notification` int(11) DEFAULT 1,
  `notify_contacts` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblprojects` */

/*Table structure for table `tblproposal_comments` */

DROP TABLE IF EXISTS `tblproposal_comments`;

CREATE TABLE `tblproposal_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` mediumtext DEFAULT NULL,
  `proposalid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblproposal_comments` */

/*Table structure for table `tblproposals` */

DROP TABLE IF EXISTS `tblproposals`;

CREATE TABLE `tblproposals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(191) DEFAULT NULL,
  `content` longtext DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `datecreated` datetime NOT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL DEFAULT 0.00,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `discount_percent` decimal(15,2) NOT NULL,
  `discount_total` decimal(15,2) NOT NULL,
  `discount_type` varchar(30) DEFAULT NULL,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `currency` int(11) NOT NULL,
  `open_till` date DEFAULT NULL,
  `date` date NOT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `rel_type` varchar(40) DEFAULT NULL,
  `assigned` int(11) DEFAULT NULL,
  `hash` varchar(32) NOT NULL,
  `proposal_to` varchar(191) DEFAULT NULL,
  `project_id` int(11) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 0,
  `zip` varchar(50) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `allow_comments` tinyint(1) NOT NULL DEFAULT 1,
  `status` int(11) NOT NULL,
  `estimate_id` int(11) DEFAULT NULL,
  `invoice_id` int(11) DEFAULT NULL,
  `date_converted` datetime DEFAULT NULL,
  `pipeline_order` int(11) DEFAULT 1,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  `short_link` varchar(100) DEFAULT NULL,
  `processing` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `tblproposals` */

insert  into `tblproposals`(`id`,`subject`,`content`,`addedfrom`,`datecreated`,`total`,`subtotal`,`total_tax`,`adjustment`,`discount_percent`,`discount_total`,`discount_type`,`show_quantity_as`,`currency`,`open_till`,`date`,`rel_id`,`rel_type`,`assigned`,`hash`,`proposal_to`,`project_id`,`country`,`zip`,`state`,`city`,`address`,`email`,`phone`,`allow_comments`,`status`,`estimate_id`,`invoice_id`,`date_converted`,`pipeline_order`,`is_expiry_notified`,`acceptance_firstname`,`acceptance_lastname`,`acceptance_email`,`acceptance_date`,`acceptance_ip`,`signature`,`short_link`,`processing`) values 
(1,'Test','{proposal_items}',1,'2022-11-28 19:38:32',140.00,140.00,0.00,0.00,0.00,0.00,'',1,1,NULL,'2022-11-28',449,'lead',0,'50a043de07cf792c30171cf757b207cf','Janic',NULL,236,'10310','New York','Staten Island','8 Coleman Terrace','ajaniccg@digg.com','7182253923',1,3,NULL,NULL,NULL,1,0,'james','bond','billisoft@gmail.com','2023-01-03 12:24:24','::1','signature.png',NULL,NULL),
(2,'hello test ableittech','{proposal_items}',1,'2023-01-03 21:37:31',16000.00,16000.00,0.00,0.00,0.00,0.00,'',1,1,'2023-01-10','2023-01-03',228,'lead',0,'a24a3e60e766814a12f328851d771d18','Reily',NULL,236,'73190','Oklahoma','Oklahoma City','08588 Doe Crossing Hill','areily6b@stumbleupon.com','4058371131',1,6,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(3,'Test Drive','{proposal_items}',1,'2023-01-03 21:56:51',16000.00,16000.00,0.00,0.00,0.00,0.00,'',1,1,'2023-01-10','2023-01-03',228,'lead',0,'2d3cbf414f6ddf88806b507630ad272d','Reily',NULL,236,'73190','Oklahoma','Oklahoma City','08588 Doe Crossing Hill','areily6b@stumbleupon.com','4058371131',1,6,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),
(4,'Car Insurance','{proposal_items}',1,'2023-01-03 22:10:31',16000.00,16000.00,0.00,0.00,0.00,0.00,'',1,1,'2023-01-10','2023-01-03',228,'lead',0,'815813b645c3e7972a0abdd4f36148a5','Reily',NULL,236,'73190','Oklahoma','Oklahoma City','08588 Doe Crossing Hill','areily6b@stumbleupon.com','4058371131',1,6,NULL,NULL,NULL,1,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

/*Table structure for table `tblpur_approval_details` */

DROP TABLE IF EXISTS `tblpur_approval_details`;

CREATE TABLE `tblpur_approval_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `approve` varchar(45) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `approve_action` varchar(255) DEFAULT NULL,
  `reject_action` varchar(255) DEFAULT NULL,
  `approve_value` varchar(255) DEFAULT NULL,
  `reject_value` varchar(255) DEFAULT NULL,
  `staff_approve` int(11) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `date_send` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_approval_details` */

/*Table structure for table `tblpur_approval_setting` */

DROP TABLE IF EXISTS `tblpur_approval_setting`;

CREATE TABLE `tblpur_approval_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `setting` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_approval_setting` */

/*Table structure for table `tblpur_contacts` */

DROP TABLE IF EXISTS `tblpur_contacts`;

CREATE TABLE `tblpur_contacts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) NOT NULL,
  `is_primary` int(11) NOT NULL DEFAULT 1,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phonenumber` varchar(100) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `email_verified_at` datetime DEFAULT NULL,
  `email_verification_key` varchar(32) DEFAULT NULL,
  `email_verification_sent_at` datetime DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `profile_image` varchar(191) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `invoice_emails` tinyint(1) NOT NULL DEFAULT 1,
  `estimate_emails` tinyint(1) NOT NULL DEFAULT 1,
  `credit_note_emails` tinyint(1) NOT NULL DEFAULT 1,
  `contract_emails` tinyint(1) NOT NULL DEFAULT 1,
  `task_emails` tinyint(1) NOT NULL DEFAULT 1,
  `project_emails` tinyint(1) NOT NULL DEFAULT 1,
  `ticket_emails` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_contacts` */

/*Table structure for table `tblpur_contracts` */

DROP TABLE IF EXISTS `tblpur_contracts`;

CREATE TABLE `tblpur_contracts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `contract_number` varchar(200) NOT NULL,
  `contract_name` varchar(200) NOT NULL,
  `content` longtext DEFAULT NULL,
  `vendor` int(11) NOT NULL,
  `pur_order` int(11) NOT NULL,
  `contract_value` decimal(15,2) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `buyer` int(11) DEFAULT NULL,
  `time_payment` date DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `signed` int(32) NOT NULL DEFAULT 0,
  `note` longtext DEFAULT NULL,
  `signer` int(11) DEFAULT NULL,
  `signed_date` date DEFAULT NULL,
  `signed_status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_contracts` */

/*Table structure for table `tblpur_estimate_detail` */

DROP TABLE IF EXISTS `tblpur_estimate_detail`;

CREATE TABLE `tblpur_estimate_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_estimate` int(11) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `unit_price` decimal(15,0) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `into_money` decimal(15,2) DEFAULT NULL,
  `tax` text DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `total_money` decimal(15,2) DEFAULT NULL,
  `discount_money` decimal(15,2) DEFAULT NULL,
  `discount_%` decimal(15,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_estimate_detail` */

/*Table structure for table `tblpur_estimates` */

DROP TABLE IF EXISTS `tblpur_estimates`;

CREATE TABLE `tblpur_estimates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sent` tinyint(1) NOT NULL DEFAULT 0,
  `datesend` datetime DEFAULT NULL,
  `vendor` int(11) NOT NULL,
  `deleted_vendor_name` varchar(100) DEFAULT NULL,
  `pur_request` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `prefix` varchar(50) DEFAULT NULL,
  `number_format` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `date` date NOT NULL,
  `expirydate` date DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `adjustment` decimal(15,2) DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `vendornote` text DEFAULT NULL,
  `adminnote` text DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) DEFAULT NULL,
  `invoiceid` int(11) DEFAULT NULL,
  `invoiced_date` datetime DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `buyer` int(11) NOT NULL DEFAULT 0,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT NULL,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT NULL,
  `include_shipping` tinyint(1) NOT NULL,
  `show_shipping_on_estimate` tinyint(1) NOT NULL DEFAULT 1,
  `show_quantity_as` int(11) NOT NULL DEFAULT 1,
  `pipeline_order` int(11) NOT NULL DEFAULT 0,
  `is_expiry_notified` int(11) NOT NULL DEFAULT 0,
  `acceptance_firstname` varchar(50) DEFAULT NULL,
  `acceptance_lastname` varchar(50) DEFAULT NULL,
  `acceptance_email` varchar(100) DEFAULT NULL,
  `acceptance_date` datetime DEFAULT NULL,
  `acceptance_ip` varchar(40) DEFAULT NULL,
  `signature` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_estimates` */

/*Table structure for table `tblpur_order_detail` */

DROP TABLE IF EXISTS `tblpur_order_detail`;

CREATE TABLE `tblpur_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_order` int(11) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `unit_price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `into_money` decimal(15,2) DEFAULT NULL,
  `tax` text DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `discount_%` decimal(15,2) DEFAULT NULL,
  `discount_money` decimal(15,2) DEFAULT NULL,
  `total_money` decimal(15,2) DEFAULT NULL,
  `wh_quantity_received` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_order_detail` */

/*Table structure for table `tblpur_order_payment` */

DROP TABLE IF EXISTS `tblpur_order_payment`;

CREATE TABLE `tblpur_order_payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pur_order` int(11) NOT NULL,
  `amount` decimal(15,2) NOT NULL,
  `paymentmode` longtext DEFAULT NULL,
  `date` date NOT NULL,
  `daterecorded` datetime NOT NULL,
  `note` text NOT NULL,
  `transactionid` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_order_payment` */

/*Table structure for table `tblpur_orders` */

DROP TABLE IF EXISTS `tblpur_orders`;

CREATE TABLE `tblpur_orders` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pur_order_name` varchar(100) NOT NULL,
  `vendor` int(11) NOT NULL,
  `estimate` int(11) NOT NULL,
  `pur_order_number` varchar(30) NOT NULL,
  `order_date` date NOT NULL,
  `status` int(32) NOT NULL DEFAULT 1,
  `approve_status` int(32) NOT NULL DEFAULT 1,
  `datecreated` datetime NOT NULL,
  `days_owed` int(11) NOT NULL,
  `delivery_date` date DEFAULT NULL,
  `subtotal` decimal(15,2) NOT NULL,
  `total_tax` decimal(15,2) NOT NULL,
  `total` decimal(15,2) NOT NULL,
  `addedfrom` int(11) NOT NULL,
  `vendornote` text DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `discount_percent` decimal(15,2) DEFAULT 0.00,
  `discount_total` decimal(15,2) DEFAULT 0.00,
  `discount_type` varchar(30) DEFAULT NULL,
  `buyer` int(11) NOT NULL DEFAULT 0,
  `status_goods` int(11) NOT NULL DEFAULT 0,
  `number` int(11) DEFAULT NULL,
  `expense_convert` int(11) DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  `clients` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_orders` */

/*Table structure for table `tblpur_request` */

DROP TABLE IF EXISTS `tblpur_request`;

CREATE TABLE `tblpur_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_rq_code` varchar(45) NOT NULL,
  `pur_rq_name` varchar(100) NOT NULL,
  `rq_description` text DEFAULT NULL,
  `requester` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `request_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL,
  `status_goods` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_request` */

/*Table structure for table `tblpur_request_detail` */

DROP TABLE IF EXISTS `tblpur_request_detail`;

CREATE TABLE `tblpur_request_detail` (
  `prd_id` int(11) NOT NULL AUTO_INCREMENT,
  `pur_request` int(11) NOT NULL,
  `item_code` varchar(100) NOT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `unit_price` decimal(15,2) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `into_money` decimal(15,2) DEFAULT NULL,
  `inventory_quantity` int(11) NOT NULL,
  PRIMARY KEY (`prd_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_request_detail` */

/*Table structure for table `tblpur_unit` */

DROP TABLE IF EXISTS `tblpur_unit`;

CREATE TABLE `tblpur_unit` (
  `unit_id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_name` varchar(100) NOT NULL,
  PRIMARY KEY (`unit_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_unit` */

/*Table structure for table `tblpur_vendor` */

DROP TABLE IF EXISTS `tblpur_vendor`;

CREATE TABLE `tblpur_vendor` (
  `userid` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `company` varchar(200) DEFAULT NULL,
  `vat` varchar(200) DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `country` int(11) NOT NULL DEFAULT 0,
  `city` varchar(100) DEFAULT NULL,
  `zip` varchar(15) DEFAULT NULL,
  `state` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `website` varchar(150) DEFAULT NULL,
  `datecreated` datetime NOT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `leadid` int(11) DEFAULT NULL,
  `billing_street` varchar(200) DEFAULT NULL,
  `billing_city` varchar(100) DEFAULT NULL,
  `billing_state` varchar(100) DEFAULT NULL,
  `billing_zip` varchar(100) DEFAULT NULL,
  `billing_country` int(11) DEFAULT 0,
  `shipping_street` varchar(200) DEFAULT NULL,
  `shipping_city` varchar(100) DEFAULT NULL,
  `shipping_state` varchar(100) DEFAULT NULL,
  `shipping_zip` varchar(100) DEFAULT NULL,
  `shipping_country` int(11) DEFAULT 0,
  `longitude` varchar(191) DEFAULT NULL,
  `latitude` varchar(191) DEFAULT NULL,
  `default_language` varchar(40) DEFAULT NULL,
  `default_currency` int(11) NOT NULL DEFAULT 0,
  `show_primary_contact` int(11) NOT NULL DEFAULT 0,
  `stripe_id` varchar(40) DEFAULT NULL,
  `registration_confirmed` int(11) NOT NULL DEFAULT 1,
  `addedfrom` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_vendor` */

/*Table structure for table `tblpur_vendor_admin` */

DROP TABLE IF EXISTS `tblpur_vendor_admin`;

CREATE TABLE `tblpur_vendor_admin` (
  `staff_id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date_assigned` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblpur_vendor_admin` */

/*Table structure for table `tblpur_vendor_items` */

DROP TABLE IF EXISTS `tblpur_vendor_items`;

CREATE TABLE `tblpur_vendor_items` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `vendor` int(11) NOT NULL,
  `group_items` int(11) DEFAULT NULL,
  `items` int(11) NOT NULL,
  `add_from` int(11) DEFAULT NULL,
  `datecreate` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblpur_vendor_items` */

/*Table structure for table `tblpurchase_option` */

DROP TABLE IF EXISTS `tblpurchase_option`;

CREATE TABLE `tblpurchase_option` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_val` longtext DEFAULT NULL,
  `auto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblpurchase_option` */

insert  into `tblpurchase_option`(`option_id`,`option_name`,`option_val`,`auto`) values 
(1,'purchase_order_setting','1',1),
(2,'pur_order_prefix','#PO',1);

/*Table structure for table `tblrec_criteria` */

DROP TABLE IF EXISTS `tblrec_criteria`;

CREATE TABLE `tblrec_criteria` (
  `criteria_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `criteria_type` varchar(45) NOT NULL,
  `criteria_title` varchar(200) NOT NULL,
  `group_criteria` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `add_date` date DEFAULT NULL,
  `score_des1` text DEFAULT NULL,
  `score_des2` text DEFAULT NULL,
  `score_des3` text DEFAULT NULL,
  `score_des4` text DEFAULT NULL,
  `score_des5` text DEFAULT NULL,
  PRIMARY KEY (`criteria_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblrec_criteria` */

/*Table structure for table `tblrec_job_position` */

DROP TABLE IF EXISTS `tblrec_job_position`;

CREATE TABLE `tblrec_job_position` (
  `position_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `position_name` varchar(200) NOT NULL,
  `position_description` text DEFAULT NULL,
  PRIMARY KEY (`position_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblrec_job_position` */

/*Table structure for table `tblrec_set_transfer_record` */

DROP TABLE IF EXISTS `tblrec_set_transfer_record`;

CREATE TABLE `tblrec_set_transfer_record` (
  `set_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `send_to` varchar(45) NOT NULL,
  `email_to` text DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `add_date` date NOT NULL,
  `subject` text NOT NULL,
  `content` text DEFAULT NULL,
  `order` int(11) NOT NULL,
  PRIMARY KEY (`set_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblrec_set_transfer_record` */

/*Table structure for table `tblrec_transfer_records` */

DROP TABLE IF EXISTS `tblrec_transfer_records`;

CREATE TABLE `tblrec_transfer_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` varchar(11) DEFAULT NULL,
  `staff_identifi` varchar(20) DEFAULT NULL,
  `creator` int(11) DEFAULT NULL,
  `datecreator` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblrec_transfer_records` */

/*Table structure for table `tblrecords_meta` */

DROP TABLE IF EXISTS `tblrecords_meta`;

CREATE TABLE `tblrecords_meta` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `meta` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

/*Data for the table `tblrecords_meta` */

insert  into `tblrecords_meta`(`id`,`name`,`meta`) values 
(1,'staff_identifi','staff_identifi'),
(2,'firstname','firstname'),
(3,'email','email'),
(4,'phonenumber','phonenumber'),
(5,'facebook','facebook'),
(6,'skype','skype'),
(7,'birthday','birthday'),
(8,'birthplace','birthplace'),
(9,'home_town','home_town'),
(10,'marital_status','marital_status'),
(11,'nation','nation'),
(12,'religion','religion'),
(13,'identification','identification'),
(14,'days_for_identity','days_for_identity'),
(15,'place_of_issue','place_of_issue'),
(16,'resident','resident'),
(17,'current_address','current_address'),
(18,'literacy','literacy');

/*Table structure for table `tblrelated_items` */

DROP TABLE IF EXISTS `tblrelated_items`;

CREATE TABLE `tblrelated_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(30) NOT NULL,
  `item_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblrelated_items` */

/*Table structure for table `tblreminders` */

DROP TABLE IF EXISTS `tblreminders`;

CREATE TABLE `tblreminders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `isnotified` int(11) NOT NULL DEFAULT 0,
  `rel_id` int(11) NOT NULL,
  `staff` int(11) NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `notify_by_email` int(11) NOT NULL DEFAULT 1,
  `creator` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `staff` (`staff`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblreminders` */

/*Table structure for table `tblroles` */

DROP TABLE IF EXISTS `tblroles`;

CREATE TABLE `tblroles` (
  `roleid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `permissions` longtext DEFAULT NULL,
  PRIMARY KEY (`roleid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblroles` */

insert  into `tblroles`(`roleid`,`name`,`permissions`) values 
(1,'Employee',NULL);

/*Table structure for table `tblsales_activity` */

DROP TABLE IF EXISTS `tblsales_activity`;

CREATE TABLE `tblsales_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_type` varchar(20) DEFAULT NULL,
  `rel_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `additional_data` text DEFAULT NULL,
  `staffid` varchar(11) DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblsales_activity` */

/*Table structure for table `tblscheduled_emails` */

DROP TABLE IF EXISTS `tblscheduled_emails`;

CREATE TABLE `tblscheduled_emails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(15) NOT NULL,
  `scheduled_at` datetime NOT NULL,
  `contacts` varchar(197) NOT NULL,
  `cc` text DEFAULT NULL,
  `attach_pdf` tinyint(1) NOT NULL DEFAULT 1,
  `template` varchar(197) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblscheduled_emails` */

/*Table structure for table `tblservices` */

DROP TABLE IF EXISTS `tblservices`;

CREATE TABLE `tblservices` (
  `serviceid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`serviceid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblservices` */

/*Table structure for table `tblsessions` */

DROP TABLE IF EXISTS `tblsessions`;

CREATE TABLE `tblsessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) unsigned NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblsessions` */

insert  into `tblsessions`(`id`,`ip_address`,`timestamp`,`data`) values 
('0733le7qdl2fhk9l69pa2739lfi5u0t9','::1',1672838197,'__ci_last_regenerate|i:1672838197;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('0iktrett43en3qdda0beb4dl0nlet98q','::1',1672848606,'__ci_last_regenerate|i:1672848606;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('2auskkm1udl7878ehi8bgh1eh56akm3k','::1',1672840572,'__ci_last_regenerate|i:1672840572;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;message-success|s:20:\"Updated successfully\";__ci_vars|a:1:{s:15:\"message-success\";s:3:\"new\";}'),
('47g38pt8mol4mp5jr01qvr1eunm5651n','::1',1672839967,'__ci_last_regenerate|i:1672839967;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('52dt3snu7v544nshevfuapli5s1gi3i1','::1',1672837576,'__ci_last_regenerate|i:1672837576;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('59fjs7q5b1eq4k9efd5n4dokt2ijqrol','::1',1672845955,'__ci_last_regenerate|i:1672845955;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('6mfkb0djrbh1f5es450fjl1n2javist7','::1',1672837271,'__ci_last_regenerate|i:1672837271;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),
('735bmhao40lg7lg16kn0nlnukfh3dd91','::1',1672828753,'__ci_last_regenerate|i:1672828745;'),
('8t9ad4cpv68c507c0571tf19vv86ird1','::1',1672838543,'__ci_last_regenerate|i:1672838543;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('ai2l143p24j7g9j207a9pl0kbkng6vnl','::1',1672846940,'__ci_last_regenerate|i:1672846940;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;message-success|s:18:\"Added successfully\";__ci_vars|a:1:{s:15:\"message-success\";s:3:\"new\";}'),
('akku2bga6h9860dri33idp816m93nt1e','::1',1672846259,'__ci_last_regenerate|i:1672846259;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('aq1knk8hdq6pmcemjdfcjuuqcgft7pro','::1',1672850062,'__ci_last_regenerate|i:1672850062;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;message-success|s:18:\"Added successfully\";__ci_vars|a:1:{s:15:\"message-success\";s:3:\"new\";}'),
('blgbfpvobdfu60v10o77r8v0jm91fmgt','::1',1672846617,'__ci_last_regenerate|i:1672846616;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('c7737o4ceu6dclae8rnme6turu5ee3s9','::1',1672849740,'__ci_last_regenerate|i:1672849740;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;message-success|s:18:\"Added successfully\";__ci_vars|a:1:{s:15:\"message-success\";s:3:\"new\";}'),
('db8agq07ftn4cfnu8nbija60bi4jnavg','::1',1672847291,'__ci_last_regenerate|i:1672847291;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('dmsqjf3gl101965po2ec37mqoe5sih77','::1',1672839642,'__ci_last_regenerate|i:1672839642;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('fotij76h0ct3ckevkm30up90ag6alde8','::1',1672840875,'__ci_last_regenerate|i:1672840875;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;message-success|s:18:\"Added successfully\";__ci_vars|a:1:{s:15:\"message-success\";s:3:\"new\";}'),
('hc83ufgj952n5aoakk1f5c1vki1oe5hp','::1',1672828751,'__ci_last_regenerate|i:1672828745;red_url|s:73:\"http://localhost/clients/cgs/dms/admin/warehouse/view_commodity_detail/16\";'),
('oh0k5sn9dn7vpks36isq677c7vton64h','::1',1672828751,'__ci_last_regenerate|i:1672828745;red_url|s:65:\"http://localhost/clients/cgs/dms/admin/proposals/list_proposals/4\";'),
('qe7j14v8ssmd6hhe3r55von3j9tp24e7','::1',1672829124,'__ci_last_regenerate|i:1672829124;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|s:0:\"\";'),
('qfpn9qjpiut2u1niik7srkkt249nas8n','::1',1672850363,'__ci_last_regenerate|i:1672850363;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('s3mimadfctufqjbciql9ljav59jb7kr2','::1',1672838856,'__ci_last_regenerate|i:1672838856;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('t36u8vru075oi8eg7lmbb7chl9eu9ip3','::1',1672840270,'__ci_last_regenerate|i:1672840270;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('to006tltan3p2tj28at7lougkba9v6ik','::1',1672850606,'__ci_last_regenerate|i:1672850363;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;'),
('vfcc3c3k3lbtcobj695sf81fja5rrc29','::1',1672839213,'__ci_last_regenerate|i:1672839213;staff_user_id|s:1:\"1\";staff_logged_in|b:1;setup-menu-open|b:1;');

/*Table structure for table `tblsetting_asset_allocation` */

DROP TABLE IF EXISTS `tblsetting_asset_allocation`;

CREATE TABLE `tblsetting_asset_allocation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `meta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblsetting_asset_allocation` */

/*Table structure for table `tblsetting_training` */

DROP TABLE IF EXISTS `tblsetting_training`;

CREATE TABLE `tblsetting_training` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_type` int(11) NOT NULL,
  `position_training` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblsetting_training` */

/*Table structure for table `tblsetting_transfer_records` */

DROP TABLE IF EXISTS `tblsetting_transfer_records`;

CREATE TABLE `tblsetting_transfer_records` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `meta` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblsetting_transfer_records` */

/*Table structure for table `tblshared_customer_files` */

DROP TABLE IF EXISTS `tblshared_customer_files`;

CREATE TABLE `tblshared_customer_files` (
  `file_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblshared_customer_files` */

/*Table structure for table `tblshift_type` */

DROP TABLE IF EXISTS `tblshift_type`;

CREATE TABLE `tblshift_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_type_name` varchar(150) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `time_start` date DEFAULT NULL,
  `time_end` date DEFAULT NULL,
  `time_start_work` varchar(50) DEFAULT NULL,
  `time_end_work` varchar(50) DEFAULT NULL,
  `start_lunch_break_time` varchar(50) DEFAULT NULL,
  `end_lunch_break_time` varchar(50) DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblshift_type` */

/*Table structure for table `tblspam_filters` */

DROP TABLE IF EXISTS `tblspam_filters`;

CREATE TABLE `tblspam_filters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(40) NOT NULL,
  `rel_type` varchar(10) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblspam_filters` */

/*Table structure for table `tblstaff` */

DROP TABLE IF EXISTS `tblstaff`;

CREATE TABLE `tblstaff` (
  `staffid` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `facebook` mediumtext DEFAULT NULL,
  `linkedin` mediumtext DEFAULT NULL,
  `phonenumber` varchar(30) DEFAULT NULL,
  `skype` varchar(50) DEFAULT NULL,
  `password` varchar(250) NOT NULL,
  `datecreated` datetime NOT NULL,
  `profile_image` varchar(191) DEFAULT NULL,
  `last_ip` varchar(40) DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `last_activity` datetime DEFAULT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) DEFAULT NULL,
  `new_pass_key_requested` datetime DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `role` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `default_language` varchar(40) DEFAULT NULL,
  `direction` varchar(3) DEFAULT NULL,
  `media_path_slug` varchar(191) DEFAULT NULL,
  `is_not_staff` int(11) NOT NULL DEFAULT 0,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT 0.00,
  `two_factor_auth_enabled` tinyint(1) DEFAULT 0,
  `two_factor_auth_code` varchar(100) DEFAULT NULL,
  `two_factor_auth_code_requested` datetime DEFAULT NULL,
  `email_signature` text DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `birthplace` varchar(200) DEFAULT NULL,
  `sex` varchar(15) DEFAULT NULL,
  `marital_status` varchar(25) DEFAULT NULL,
  `nation` varchar(25) DEFAULT NULL,
  `religion` varchar(50) DEFAULT NULL,
  `identification` varchar(100) DEFAULT NULL,
  `days_for_identity` date DEFAULT NULL,
  `home_town` varchar(200) DEFAULT NULL,
  `resident` varchar(200) DEFAULT NULL,
  `current_address` varchar(200) DEFAULT NULL,
  `literacy` varchar(50) DEFAULT NULL,
  `orther_infor` text DEFAULT NULL,
  `job_position` int(11) DEFAULT NULL,
  `workplace` int(11) DEFAULT NULL,
  `place_of_issue` varchar(50) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `name_account` varchar(50) DEFAULT NULL,
  `issue_bank` varchar(200) DEFAULT NULL,
  `records_received` longtext DEFAULT NULL,
  `Personal_tax_code` varchar(50) DEFAULT NULL,
  `google_auth_secret` text DEFAULT NULL,
  `team_manage` int(11) DEFAULT 0,
  `staff_identifi` varchar(200) DEFAULT NULL,
  `status_work` varchar(100) DEFAULT NULL,
  `date_update` date DEFAULT NULL,
  PRIMARY KEY (`staffid`),
  KEY `firstname` (`firstname`),
  KEY `lastname` (`lastname`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblstaff` */

insert  into `tblstaff`(`staffid`,`email`,`firstname`,`lastname`,`facebook`,`linkedin`,`phonenumber`,`skype`,`password`,`datecreated`,`profile_image`,`last_ip`,`last_login`,`last_activity`,`last_password_change`,`new_pass_key`,`new_pass_key_requested`,`admin`,`role`,`active`,`default_language`,`direction`,`media_path_slug`,`is_not_staff`,`hourly_rate`,`two_factor_auth_enabled`,`two_factor_auth_code`,`two_factor_auth_code_requested`,`email_signature`,`birthday`,`birthplace`,`sex`,`marital_status`,`nation`,`religion`,`identification`,`days_for_identity`,`home_town`,`resident`,`current_address`,`literacy`,`orther_infor`,`job_position`,`workplace`,`place_of_issue`,`account_number`,`name_account`,`issue_bank`,`records_received`,`Personal_tax_code`,`google_auth_secret`,`team_manage`,`staff_identifi`,`status_work`,`date_update`) values 
(1,'pgkirthikumar@gmail.com','Kirti','Kumar',NULL,NULL,NULL,NULL,'$2a$08$2IV154Ar.Gi08OU4b4bwk.dxW/V/JDskDXO2QifBMKc5CZ.wE9VaG','2022-11-28 14:15:23',NULL,'::1','2023-01-04 16:09:59','2023-01-04 22:13:26',NULL,NULL,NULL,1,NULL,1,NULL,NULL,NULL,0,0.00,0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,0,NULL,NULL,NULL);

/*Table structure for table `tblstaff_departments` */

DROP TABLE IF EXISTS `tblstaff_departments`;

CREATE TABLE `tblstaff_departments` (
  `staffdepartmentid` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `departmentid` int(11) NOT NULL,
  PRIMARY KEY (`staffdepartmentid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblstaff_departments` */

/*Table structure for table `tblstaff_permissions` */

DROP TABLE IF EXISTS `tblstaff_permissions`;

CREATE TABLE `tblstaff_permissions` (
  `staff_id` int(11) NOT NULL,
  `feature` varchar(40) NOT NULL,
  `capability` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblstaff_permissions` */

/*Table structure for table `tblstock_take` */

DROP TABLE IF EXISTS `tblstock_take`;

CREATE TABLE `tblstock_take` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL COMMENT 'the reason stock take',
  `warehouse_id` int(11) DEFAULT NULL,
  `date_stock_take` date DEFAULT NULL,
  `stock_take_code` varchar(100) DEFAULT NULL COMMENT 'số kiểm kê kho',
  `date_add` date DEFAULT NULL,
  `hour_add` date DEFAULT NULL,
  `staff_id` varchar(100) DEFAULT NULL,
  `approval` int(11) DEFAULT 0 COMMENT 'status approval ',
  `addedfrom` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblstock_take` */

/*Table structure for table `tblstock_take_detail` */

DROP TABLE IF EXISTS `tblstock_take_detail`;

CREATE TABLE `tblstock_take_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `stock_take_id` int(11) NOT NULL,
  `commodity_code` varchar(100) DEFAULT NULL,
  `commodity_name` text DEFAULT NULL,
  `unit_id` text DEFAULT NULL,
  `unit_price` varchar(100) DEFAULT NULL,
  `quantity_stock_take` varchar(100) DEFAULT NULL,
  `quantity_accounting_book` varchar(100) DEFAULT NULL,
  `quantity_change` varchar(100) DEFAULT NULL,
  `handling` text DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `approval` int(11) DEFAULT 0 COMMENT 'status approval ',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblstock_take_detail` */

/*Table structure for table `tblsubscriptions` */

DROP TABLE IF EXISTS `tblsubscriptions`;

CREATE TABLE `tblsubscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `description` text DEFAULT NULL,
  `description_in_item` tinyint(1) NOT NULL DEFAULT 0,
  `clientid` int(11) NOT NULL,
  `date` date DEFAULT NULL,
  `terms` text DEFAULT NULL,
  `currency` int(11) NOT NULL,
  `tax_id` int(11) NOT NULL DEFAULT 0,
  `stripe_tax_id` varchar(50) DEFAULT NULL,
  `tax_id_2` int(11) NOT NULL DEFAULT 0,
  `stripe_tax_id_2` varchar(50) DEFAULT NULL,
  `stripe_plan_id` text DEFAULT NULL,
  `stripe_subscription_id` text NOT NULL,
  `next_billing_cycle` bigint(20) DEFAULT NULL,
  `ends_at` bigint(20) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `hash` varchar(32) NOT NULL,
  `created` datetime NOT NULL,
  `created_from` int(11) NOT NULL,
  `date_subscribed` datetime DEFAULT NULL,
  `in_test_environment` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `clientid` (`clientid`),
  KEY `currency` (`currency`),
  KEY `tax_id` (`tax_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblsubscriptions` */

/*Table structure for table `tbltaggables` */

DROP TABLE IF EXISTS `tbltaggables`;

CREATE TABLE `tbltaggables` (
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(20) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `tag_order` int(11) NOT NULL DEFAULT 0,
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `tag_id` (`tag_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltaggables` */

/*Table structure for table `tbltags` */

DROP TABLE IF EXISTS `tbltags`;

CREATE TABLE `tbltags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbltags` */

/*Table structure for table `tbltask_assigned` */

DROP TABLE IF EXISTS `tbltask_assigned`;

CREATE TABLE `tbltask_assigned` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  `assigned_from` int(11) NOT NULL DEFAULT 0,
  `is_assigned_from_contact` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `taskid` (`taskid`),
  KEY `staffid` (`staffid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltask_assigned` */

/*Table structure for table `tbltask_checklist_items` */

DROP TABLE IF EXISTS `tbltask_checklist_items`;

CREATE TABLE `tbltask_checklist_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `taskid` int(11) NOT NULL,
  `description` text NOT NULL,
  `finished` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL,
  `addedfrom` int(11) NOT NULL,
  `finished_from` int(11) DEFAULT 0,
  `list_order` int(11) NOT NULL DEFAULT 0,
  `assigned` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `taskid` (`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltask_checklist_items` */

/*Table structure for table `tbltask_comments` */

DROP TABLE IF EXISTS `tbltask_comments`;

CREATE TABLE `tbltask_comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `taskid` int(11) NOT NULL,
  `staffid` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL DEFAULT 0,
  `file_id` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `file_id` (`file_id`),
  KEY `taskid` (`taskid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltask_comments` */

/*Table structure for table `tbltask_followers` */

DROP TABLE IF EXISTS `tbltask_followers`;

CREATE TABLE `tbltask_followers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `taskid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltask_followers` */

/*Table structure for table `tbltasks` */

DROP TABLE IF EXISTS `tbltasks`;

CREATE TABLE `tbltasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` mediumtext DEFAULT NULL,
  `description` text DEFAULT NULL,
  `priority` int(11) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  `startdate` date NOT NULL,
  `duedate` date DEFAULT NULL,
  `datefinished` datetime DEFAULT NULL,
  `addedfrom` int(11) NOT NULL,
  `is_added_from_contact` tinyint(1) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `recurring_type` varchar(10) DEFAULT NULL,
  `repeat_every` int(11) DEFAULT NULL,
  `recurring` int(11) NOT NULL DEFAULT 0,
  `is_recurring_from` int(11) DEFAULT NULL,
  `cycles` int(11) NOT NULL DEFAULT 0,
  `total_cycles` int(11) NOT NULL DEFAULT 0,
  `custom_recurring` tinyint(1) NOT NULL DEFAULT 0,
  `last_recurring_date` date DEFAULT NULL,
  `rel_id` int(11) DEFAULT NULL,
  `rel_type` varchar(30) DEFAULT NULL,
  `is_public` tinyint(1) NOT NULL DEFAULT 0,
  `billable` tinyint(1) NOT NULL DEFAULT 0,
  `billed` tinyint(1) NOT NULL DEFAULT 0,
  `invoice_id` int(11) NOT NULL DEFAULT 0,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT 0.00,
  `milestone` int(11) DEFAULT 0,
  `kanban_order` int(11) DEFAULT 1,
  `milestone_order` int(11) NOT NULL DEFAULT 0,
  `visible_to_client` tinyint(1) NOT NULL DEFAULT 0,
  `deadline_notified` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `rel_id` (`rel_id`),
  KEY `rel_type` (`rel_type`),
  KEY `milestone` (`milestone`),
  KEY `kanban_order` (`kanban_order`),
  KEY `status` (`status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltasks` */

/*Table structure for table `tbltasks_checklist_templates` */

DROP TABLE IF EXISTS `tbltasks_checklist_templates`;

CREATE TABLE `tbltasks_checklist_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltasks_checklist_templates` */

/*Table structure for table `tbltaskstimers` */

DROP TABLE IF EXISTS `tbltaskstimers`;

CREATE TABLE `tbltaskstimers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `task_id` int(11) NOT NULL,
  `start_time` varchar(64) NOT NULL,
  `end_time` varchar(64) DEFAULT NULL,
  `staff_id` int(11) NOT NULL,
  `hourly_rate` decimal(15,2) NOT NULL DEFAULT 0.00,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `task_id` (`task_id`),
  KEY `staff_id` (`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltaskstimers` */

/*Table structure for table `tbltaxes` */

DROP TABLE IF EXISTS `tbltaxes`;

CREATE TABLE `tbltaxes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `taxrate` decimal(15,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltaxes` */

/*Table structure for table `tbltemplates` */

DROP TABLE IF EXISTS `tbltemplates`;

CREATE TABLE `tbltemplates` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `addedfrom` int(11) NOT NULL,
  `content` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltemplates` */

/*Table structure for table `tblticket_attachments` */

DROP TABLE IF EXISTS `tblticket_attachments`;

CREATE TABLE `tblticket_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `replyid` int(11) DEFAULT NULL,
  `file_name` varchar(191) NOT NULL,
  `filetype` varchar(50) DEFAULT NULL,
  `dateadded` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblticket_attachments` */

/*Table structure for table `tblticket_replies` */

DROP TABLE IF EXISTS `tblticket_replies`;

CREATE TABLE `tblticket_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ticketid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `contactid` int(11) NOT NULL DEFAULT 0,
  `name` text DEFAULT NULL,
  `email` text DEFAULT NULL,
  `date` datetime NOT NULL,
  `message` text DEFAULT NULL,
  `attachment` int(11) DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblticket_replies` */

/*Table structure for table `tbltickets` */

DROP TABLE IF EXISTS `tbltickets`;

CREATE TABLE `tbltickets` (
  `ticketid` int(11) NOT NULL AUTO_INCREMENT,
  `adminreplying` int(11) NOT NULL DEFAULT 0,
  `userid` int(11) NOT NULL,
  `contactid` int(11) NOT NULL DEFAULT 0,
  `merged_ticket_id` int(11) DEFAULT NULL,
  `email` text DEFAULT NULL,
  `name` text DEFAULT NULL,
  `department` int(11) NOT NULL,
  `priority` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `service` int(11) DEFAULT NULL,
  `ticketkey` varchar(32) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` text DEFAULT NULL,
  `admin` int(11) DEFAULT NULL,
  `date` datetime NOT NULL,
  `project_id` int(11) NOT NULL DEFAULT 0,
  `lastreply` datetime DEFAULT NULL,
  `clientread` int(11) NOT NULL DEFAULT 0,
  `adminread` int(11) NOT NULL DEFAULT 0,
  `assigned` int(11) NOT NULL DEFAULT 0,
  `staff_id_replying` int(11) DEFAULT NULL,
  `cc` varchar(191) DEFAULT NULL,
  PRIMARY KEY (`ticketid`),
  KEY `service` (`service`),
  KEY `department` (`department`),
  KEY `status` (`status`),
  KEY `userid` (`userid`),
  KEY `priority` (`priority`),
  KEY `project_id` (`project_id`),
  KEY `contactid` (`contactid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltickets` */

/*Table structure for table `tbltickets_pipe_log` */

DROP TABLE IF EXISTS `tbltickets_pipe_log`;

CREATE TABLE `tbltickets_pipe_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` datetime NOT NULL,
  `email_to` varchar(100) NOT NULL,
  `name` varchar(191) NOT NULL,
  `subject` varchar(191) NOT NULL,
  `message` mediumtext NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltickets_pipe_log` */

/*Table structure for table `tbltickets_predefined_replies` */

DROP TABLE IF EXISTS `tbltickets_predefined_replies`;

CREATE TABLE `tbltickets_predefined_replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(191) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltickets_predefined_replies` */

/*Table structure for table `tbltickets_priorities` */

DROP TABLE IF EXISTS `tbltickets_priorities`;

CREATE TABLE `tbltickets_priorities` (
  `priorityid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`priorityid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tbltickets_priorities` */

insert  into `tbltickets_priorities`(`priorityid`,`name`) values 
(1,'Low'),
(2,'Medium'),
(3,'High');

/*Table structure for table `tbltickets_status` */

DROP TABLE IF EXISTS `tbltickets_status`;

CREATE TABLE `tbltickets_status` (
  `ticketstatusid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `isdefault` int(11) NOT NULL DEFAULT 0,
  `statuscolor` varchar(7) DEFAULT NULL,
  `statusorder` int(11) DEFAULT NULL,
  PRIMARY KEY (`ticketstatusid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `tbltickets_status` */

insert  into `tbltickets_status`(`ticketstatusid`,`name`,`isdefault`,`statuscolor`,`statusorder`) values 
(1,'Open',1,'#ff2d42',1),
(2,'In progress',1,'#22c55e',2),
(3,'Answered',1,'#2563eb',3),
(4,'On Hold',1,'#64748b',4),
(5,'Closed',1,'#03a9f4',5);

/*Table structure for table `tbltimesheets_additional_timesheet` */

DROP TABLE IF EXISTS `tbltimesheets_additional_timesheet`;

CREATE TABLE `tbltimesheets_additional_timesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `additional_day` varchar(45) NOT NULL,
  `status` varchar(45) NOT NULL,
  `timekeeping_type` varchar(50) DEFAULT NULL,
  `timekeeping_value` varchar(45) NOT NULL,
  `approver` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `old_timekeeping` varchar(50) DEFAULT NULL,
  `time_in` varchar(45) DEFAULT NULL,
  `time_out` varchar(45) DEFAULT NULL,
  `overtime_setting` int(11) DEFAULT NULL,
  `reason` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltimesheets_additional_timesheet` */

/*Table structure for table `tbltimesheets_approval_details` */

DROP TABLE IF EXISTS `tbltimesheets_approval_details`;

CREATE TABLE `tbltimesheets_approval_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `approve` varchar(45) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `approve_action` varchar(255) DEFAULT NULL,
  `reject_action` varchar(255) DEFAULT NULL,
  `approve_value` varchar(255) DEFAULT NULL,
  `reject_value` varchar(255) DEFAULT NULL,
  `staff_approve` int(11) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `date_send` datetime DEFAULT NULL,
  `notification_recipient` longtext DEFAULT NULL,
  `approval_deadline` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltimesheets_approval_details` */

/*Table structure for table `tbltimesheets_approval_setting` */

DROP TABLE IF EXISTS `tbltimesheets_approval_setting`;

CREATE TABLE `tbltimesheets_approval_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `setting` longtext NOT NULL,
  `choose_when_approving` int(11) NOT NULL DEFAULT 0,
  `notification_recipient` longtext DEFAULT NULL,
  `number_day_approval` int(11) DEFAULT NULL,
  `departments` text DEFAULT NULL,
  `job_positions` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltimesheets_approval_setting` */

/*Table structure for table `tbltimesheets_day_off` */

DROP TABLE IF EXISTS `tbltimesheets_day_off`;

CREATE TABLE `tbltimesheets_day_off` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `year` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `remain` varchar(45) DEFAULT NULL,
  `accumulated` varchar(45) DEFAULT NULL,
  `days_off` float DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_day_off` */

/*Table structure for table `tbltimesheets_go_bussiness_advance_payment` */

DROP TABLE IF EXISTS `tbltimesheets_go_bussiness_advance_payment`;

CREATE TABLE `tbltimesheets_go_bussiness_advance_payment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `requisition_leave` int(11) NOT NULL,
  `used_to` varchar(200) DEFAULT NULL,
  `amoun_of_money` varchar(200) DEFAULT NULL,
  `request_date` date DEFAULT NULL,
  `advance_payment_reason` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_go_bussiness_advance_payment` */

/*Table structure for table `tbltimesheets_latch_timesheet` */

DROP TABLE IF EXISTS `tbltimesheets_latch_timesheet`;

CREATE TABLE `tbltimesheets_latch_timesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `month_latch` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltimesheets_latch_timesheet` */

/*Table structure for table `tbltimesheets_leave` */

DROP TABLE IF EXISTS `tbltimesheets_leave`;

CREATE TABLE `tbltimesheets_leave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `date_work` date NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_leave` */

/*Table structure for table `tbltimesheets_log_send_notify` */

DROP TABLE IF EXISTS `tbltimesheets_log_send_notify`;

CREATE TABLE `tbltimesheets_log_send_notify` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sent` int(11) NOT NULL DEFAULT 0,
  `staffid` int(11) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `type` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_log_send_notify` */

/*Table structure for table `tbltimesheets_option` */

DROP TABLE IF EXISTS `tbltimesheets_option`;

CREATE TABLE `tbltimesheets_option` (
  `option_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(200) NOT NULL,
  `option_val` longtext DEFAULT NULL,
  `auto` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`option_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_option` */

insert  into `tbltimesheets_option`(`option_id`,`option_name`,`option_val`,`auto`) values 
(1,'shift_applicable_object','',1),
(2,'timekeeping_form','timekeeping_manually',1),
(3,'timekeeping_manually_role','',1),
(4,'timekeeping_task_role','',1),
(5,'csv_clsx_role','',1),
(6,'attendance_notice_recipient','',1),
(7,'allows_updating_check_in_time','1',1),
(8,'allows_to_choose_an_older_date','0',1),
(9,'allow_attendance_by_coordinates','0',1),
(10,'googlemap_api_key','',1),
(11,'allow_attendance_by_route','0',1),
(12,'auto_checkout','0',1),
(13,'auto_checkout_type','1',1),
(14,'auto_checkout_value','1',1),
(15,'send_notification_if_check_in_forgotten','0',1),
(16,'send_notification_if_check_in_forgotten_value','30',1);

/*Table structure for table `tbltimesheets_requisition_leave` */

DROP TABLE IF EXISTS `tbltimesheets_requisition_leave`;

CREATE TABLE `tbltimesheets_requisition_leave` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `reason` text DEFAULT NULL,
  `received_date` date DEFAULT NULL,
  `amount_received` text DEFAULT NULL,
  `approver_id` int(11) NOT NULL,
  `followers_id` int(11) DEFAULT NULL,
  `rel_type` int(11) NOT NULL COMMENT '1:Leave 2:Late_early 3:Go_out 4:Go_on_bussiness',
  `status` int(11) DEFAULT 0 COMMENT '0:Create 1:Approver 2:Reject',
  `place_of_business` longtext DEFAULT NULL,
  `type_of_leave` int(11) DEFAULT 0,
  `according_to_the_plan` int(11) DEFAULT 0,
  `handover_recipients` longtext DEFAULT NULL,
  `datecreated` datetime DEFAULT NULL,
  `number_of_days` float DEFAULT NULL,
  `number_of_leaving_day` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`,`staff_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_requisition_leave` */

/*Table structure for table `tbltimesheets_route` */

DROP TABLE IF EXISTS `tbltimesheets_route`;

CREATE TABLE `tbltimesheets_route` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `route_point_id` int(11) NOT NULL,
  `date_work` date NOT NULL,
  `order` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_route` */

/*Table structure for table `tbltimesheets_route_point` */

DROP TABLE IF EXISTS `tbltimesheets_route_point`;

CREATE TABLE `tbltimesheets_route_point` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `route_point_address` varchar(400) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `distance` double DEFAULT NULL,
  `related_to` int(11) NOT NULL,
  `related_id` int(11) NOT NULL,
  `default` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_route_point` */

/*Table structure for table `tbltimesheets_shift_sc` */

DROP TABLE IF EXISTS `tbltimesheets_shift_sc`;

CREATE TABLE `tbltimesheets_shift_sc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_symbol` varchar(45) NOT NULL,
  `time_start_work` varchar(45) NOT NULL,
  `time_end_work` varchar(45) NOT NULL,
  `start_lunch_break_time` varchar(45) NOT NULL,
  `end_lunch_break_time` varchar(45) NOT NULL,
  `late_latency_allowed` varchar(45) NOT NULL,
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_shift_sc` */

/*Table structure for table `tbltimesheets_shiftwork_sc` */

DROP TABLE IF EXISTS `tbltimesheets_shiftwork_sc`;

CREATE TABLE `tbltimesheets_shiftwork_sc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `date_work` date NOT NULL,
  `shift` int(11) NOT NULL,
  `datecreated` datetime DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_shiftwork_sc` */

/*Table structure for table `tbltimesheets_timekeeper_data` */

DROP TABLE IF EXISTS `tbltimesheets_timekeeper_data`;

CREATE TABLE `tbltimesheets_timekeeper_data` (
  `staff_identifi` varchar(25) NOT NULL,
  `time` datetime NOT NULL,
  `type` varchar(45) NOT NULL,
  PRIMARY KEY (`staff_identifi`,`time`,`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltimesheets_timekeeper_data` */

/*Table structure for table `tbltimesheets_timesheet` */

DROP TABLE IF EXISTS `tbltimesheets_timesheet`;

CREATE TABLE `tbltimesheets_timesheet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `date_work` date NOT NULL,
  `value` text DEFAULT NULL,
  `type` varchar(45) DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `overtime_setting` int(11) DEFAULT NULL,
  `relate_id` int(11) DEFAULT NULL,
  `relate_type` varchar(25) DEFAULT NULL,
  `latch` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_timesheet` */

/*Table structure for table `tbltimesheets_workplace` */

DROP TABLE IF EXISTS `tbltimesheets_workplace`;

CREATE TABLE `tbltimesheets_workplace` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `workplace_address` varchar(400) DEFAULT NULL,
  `latitude` varchar(30) DEFAULT NULL,
  `longitude` varchar(30) DEFAULT NULL,
  `distance` double DEFAULT NULL,
  `default` bit(1) NOT NULL DEFAULT b'0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_workplace` */

/*Table structure for table `tbltimesheets_workplace_assign` */

DROP TABLE IF EXISTS `tbltimesheets_workplace_assign`;

CREATE TABLE `tbltimesheets_workplace_assign` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `staffid` int(11) NOT NULL,
  `workplace_id` int(11) NOT NULL,
  `datecreator` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltimesheets_workplace_assign` */

/*Table structure for table `tbltodos` */

DROP TABLE IF EXISTS `tbltodos`;

CREATE TABLE `tbltodos` (
  `todoid` int(11) NOT NULL AUTO_INCREMENT,
  `description` text NOT NULL,
  `staffid` int(11) NOT NULL,
  `dateadded` datetime NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `datefinished` datetime DEFAULT NULL,
  `item_order` int(11) DEFAULT NULL,
  PRIMARY KEY (`todoid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltodos` */

/*Table structure for table `tbltracked_mails` */

DROP TABLE IF EXISTS `tbltracked_mails`;

CREATE TABLE `tbltracked_mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(32) NOT NULL,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `email` varchar(100) NOT NULL,
  `opened` tinyint(1) NOT NULL DEFAULT 0,
  `date_opened` datetime DEFAULT NULL,
  `subject` mediumtext DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltracked_mails` */

/*Table structure for table `tbltraining_allocation` */

DROP TABLE IF EXISTS `tbltraining_allocation`;

CREATE TABLE `tbltraining_allocation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `training_process_id` varchar(100) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `training_type` int(11) DEFAULT NULL,
  `date_add` datetime NOT NULL DEFAULT current_timestamp(),
  `training_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tbltraining_allocation` */

/*Table structure for table `tbltransfer_records_reception` */

DROP TABLE IF EXISTS `tbltransfer_records_reception`;

CREATE TABLE `tbltransfer_records_reception` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `meta` varchar(50) DEFAULT NULL,
  `staffid` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltransfer_records_reception` */

/*Table structure for table `tbltwocheckout_log` */

DROP TABLE IF EXISTS `tbltwocheckout_log`;

CREATE TABLE `tbltwocheckout_log` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `reference` varchar(64) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `amount` varchar(25) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `invoice_id` (`invoice_id`),
  CONSTRAINT `tbltwocheckout_log_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `tblinvoices` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbltwocheckout_log` */

/*Table structure for table `tbluser_auto_login` */

DROP TABLE IF EXISTS `tbluser_auto_login`;

CREATE TABLE `tbluser_auto_login` (
  `key_id` char(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `staff` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tbluser_auto_login` */

/*Table structure for table `tbluser_meta` */

DROP TABLE IF EXISTS `tbluser_meta`;

CREATE TABLE `tbluser_meta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `staff_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `client_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `contact_id` bigint(20) unsigned NOT NULL DEFAULT 0,
  `meta_key` varchar(191) DEFAULT NULL,
  `meta_value` longtext DEFAULT NULL,
  PRIMARY KEY (`umeta_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tbluser_meta` */

insert  into `tbluser_meta`(`umeta_id`,`staff_id`,`client_id`,`contact_id`,`meta_key`,`meta_value`) values 
(1,1,0,0,'recent_searches','[]');

/*Table structure for table `tblvault` */

DROP TABLE IF EXISTS `tblvault`;

CREATE TABLE `tblvault` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `server_address` varchar(191) NOT NULL,
  `port` int(11) DEFAULT NULL,
  `username` varchar(191) NOT NULL,
  `password` text NOT NULL,
  `description` text DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `creator_name` varchar(100) DEFAULT NULL,
  `visibility` tinyint(1) NOT NULL DEFAULT 1,
  `share_in_projects` tinyint(1) NOT NULL DEFAULT 0,
  `last_updated` datetime DEFAULT NULL,
  `last_updated_from` varchar(100) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblvault` */

/*Table structure for table `tblviews_tracking` */

DROP TABLE IF EXISTS `tblviews_tracking`;

CREATE TABLE `tblviews_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(40) NOT NULL,
  `date` datetime NOT NULL,
  `view_ip` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblviews_tracking` */

insert  into `tblviews_tracking`(`id`,`rel_id`,`rel_type`,`date`,`view_ip`) values 
(1,4,'proposal','2023-01-04 16:09:12','::1');

/*Table structure for table `tblware_body_type` */

DROP TABLE IF EXISTS `tblware_body_type`;

CREATE TABLE `tblware_body_type` (
  `body_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `body_code` varchar(100) DEFAULT NULL,
  `body_name` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`body_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblware_body_type` */

/*Table structure for table `tblware_color` */

DROP TABLE IF EXISTS `tblware_color`;

CREATE TABLE `tblware_color` (
  `color_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `color_code` varchar(100) DEFAULT NULL,
  `color_name` varchar(100) DEFAULT NULL,
  `color_hex` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblware_color` */

/*Table structure for table `tblware_commodity_type` */

DROP TABLE IF EXISTS `tblware_commodity_type`;

CREATE TABLE `tblware_commodity_type` (
  `commodity_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `commondity_code` varchar(100) DEFAULT NULL,
  `commondity_name` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`commodity_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `tblware_commodity_type` */

insert  into `tblware_commodity_type`(`commodity_type_id`,`commondity_code`,`commondity_name`,`order`,`display`,`note`) values 
(1,'UVH','Used Vehicle',1,1,'0'),
(2,'NVH','New Vehicle',2,1,'0'),
(3,'RENT','Rentals',0,1,'0');

/*Table structure for table `tblware_size_type` */

DROP TABLE IF EXISTS `tblware_size_type`;

CREATE TABLE `tblware_size_type` (
  `size_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `size_code` varchar(100) DEFAULT NULL,
  `size_name` text DEFAULT NULL,
  `size_symbol` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`size_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblware_size_type` */

/*Table structure for table `tblware_style_type` */

DROP TABLE IF EXISTS `tblware_style_type`;

CREATE TABLE `tblware_style_type` (
  `style_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `style_code` varchar(100) DEFAULT NULL,
  `style_barcode` text DEFAULT NULL,
  `style_name` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`style_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblware_style_type` */

/*Table structure for table `tblware_unit_type` */

DROP TABLE IF EXISTS `tblware_unit_type`;

CREATE TABLE `tblware_unit_type` (
  `unit_type_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `unit_code` varchar(100) DEFAULT NULL,
  `unit_name` text DEFAULT NULL,
  `unit_symbol` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  PRIMARY KEY (`unit_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `tblware_unit_type` */

insert  into `tblware_unit_type`(`unit_type_id`,`unit_code`,`unit_name`,`unit_symbol`,`order`,`display`,`note`) values 
(1,'E','Each','Each',0,1,'0'),
(2,'PC','Piece','Piece',0,1,'0');

/*Table structure for table `tblwarehouse` */

DROP TABLE IF EXISTS `tblwarehouse`;

CREATE TABLE `tblwarehouse` (
  `warehouse_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `warehouse_code` varchar(100) DEFAULT NULL,
  `warehouse_name` text DEFAULT NULL,
  `warehouse_address` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `state` text DEFAULT NULL,
  `zip_code` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  PRIMARY KEY (`warehouse_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblwarehouse` */

insert  into `tblwarehouse`(`warehouse_id`,`warehouse_code`,`warehouse_name`,`warehouse_address`,`order`,`display`,`note`,`city`,`state`,`zip_code`,`country`) values 
(1,'MN-PONCE','PONCE','',1,1,'','Ponce','Puerto Rico','80134','178');

/*Table structure for table `tblweb_to_lead` */

DROP TABLE IF EXISTS `tblweb_to_lead`;

CREATE TABLE `tblweb_to_lead` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `form_key` varchar(32) NOT NULL,
  `lead_source` int(11) NOT NULL,
  `lead_status` int(11) NOT NULL,
  `notify_lead_imported` int(11) NOT NULL DEFAULT 1,
  `notify_type` varchar(20) DEFAULT NULL,
  `notify_ids` mediumtext DEFAULT NULL,
  `responsible` int(11) NOT NULL DEFAULT 0,
  `name` varchar(191) NOT NULL,
  `form_data` mediumtext DEFAULT NULL,
  `recaptcha` int(11) NOT NULL DEFAULT 0,
  `submit_btn_name` varchar(40) DEFAULT NULL,
  `submit_btn_text_color` varchar(10) DEFAULT '#ffffff',
  `submit_btn_bg_color` varchar(10) DEFAULT '#84c529',
  `success_submit_msg` text DEFAULT NULL,
  `submit_action` int(11) DEFAULT 0,
  `lead_name_prefix` varchar(255) DEFAULT NULL,
  `submit_redirect_url` mediumtext DEFAULT NULL,
  `language` varchar(40) DEFAULT NULL,
  `allow_duplicate` int(11) NOT NULL DEFAULT 1,
  `mark_public` int(11) NOT NULL DEFAULT 0,
  `track_duplicate_field` varchar(20) DEFAULT NULL,
  `track_duplicate_field_and` varchar(20) DEFAULT NULL,
  `create_task_on_duplicate` int(11) NOT NULL DEFAULT 0,
  `dateadded` datetime NOT NULL,
  `is_mpwtl` int(1) DEFAULT 0,
  `form_color` varchar(15) DEFAULT NULL,
  `form_bg_color` varchar(15) DEFAULT NULL,
  `form_theme` varchar(15) DEFAULT 'elegant',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblweb_to_lead` */

/*Table structure for table `tblwh_activity_log` */

DROP TABLE IF EXISTS `tblwh_activity_log`;

CREATE TABLE `tblwh_activity_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `staffid` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `note` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblwh_activity_log` */

/*Table structure for table `tblwh_approval_details` */

DROP TABLE IF EXISTS `tblwh_approval_details`;

CREATE TABLE `tblwh_approval_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `rel_id` int(11) NOT NULL,
  `rel_type` varchar(45) NOT NULL,
  `staffid` varchar(45) DEFAULT NULL,
  `approve` varchar(45) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `approve_action` varchar(255) DEFAULT NULL,
  `reject_action` varchar(255) DEFAULT NULL,
  `approve_value` varchar(255) DEFAULT NULL,
  `reject_value` varchar(255) DEFAULT NULL,
  `staff_approve` int(11) DEFAULT NULL,
  `action` varchar(45) DEFAULT NULL,
  `sender` int(11) DEFAULT NULL,
  `date_send` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblwh_approval_details` */

/*Table structure for table `tblwh_approval_setting` */

DROP TABLE IF EXISTS `tblwh_approval_setting`;

CREATE TABLE `tblwh_approval_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `related` varchar(255) NOT NULL,
  `setting` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `tblwh_approval_setting` */

/*Table structure for table `tblwh_brand` */

DROP TABLE IF EXISTS `tblwh_brand`;

CREATE TABLE `tblwh_brand` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_brand` */

/*Table structure for table `tblwh_custom_fields` */

DROP TABLE IF EXISTS `tblwh_custom_fields`;

CREATE TABLE `tblwh_custom_fields` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `custom_fields_id` int(11) DEFAULT NULL,
  `warehouse_id` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_custom_fields` */

/*Table structure for table `tblwh_loss_adjustment` */

DROP TABLE IF EXISTS `tblwh_loss_adjustment`;

CREATE TABLE `tblwh_loss_adjustment` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(15) DEFAULT NULL,
  `addfrom` int(11) DEFAULT NULL,
  `reason` longtext DEFAULT NULL,
  `time` datetime DEFAULT NULL,
  `date_create` date NOT NULL,
  `status` int(11) NOT NULL,
  `warehouses` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_loss_adjustment` */

/*Table structure for table `tblwh_loss_adjustment_detail` */

DROP TABLE IF EXISTS `tblwh_loss_adjustment_detail`;

CREATE TABLE `tblwh_loss_adjustment_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `items` int(11) DEFAULT NULL,
  `unit` int(11) DEFAULT NULL,
  `current_number` int(15) DEFAULT NULL,
  `updates_number` int(15) DEFAULT NULL,
  `loss_adjustment` int(11) DEFAULT NULL,
  `expiry_date` text DEFAULT NULL,
  `lot_number` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_loss_adjustment_detail` */

/*Table structure for table `tblwh_model` */

DROP TABLE IF EXISTS `tblwh_model`;

CREATE TABLE `tblwh_model` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_model` */

/*Table structure for table `tblwh_series` */

DROP TABLE IF EXISTS `tblwh_series`;

CREATE TABLE `tblwh_series` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `model_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_series` */

/*Table structure for table `tblwh_sub_group` */

DROP TABLE IF EXISTS `tblwh_sub_group`;

CREATE TABLE `tblwh_sub_group` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sub_group_code` varchar(100) DEFAULT NULL,
  `sub_group_name` text DEFAULT NULL,
  `order` int(10) DEFAULT NULL,
  `display` int(1) DEFAULT NULL COMMENT 'display 1: display (yes)  0: not displayed (no)',
  `note` text DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `tblwh_sub_group` */

insert  into `tblwh_sub_group`(`id`,`sub_group_code`,`sub_group_name`,`order`,`display`,`note`,`group_id`) values 
(1,'FB_INSURANCE','Insurance - FB',1,1,'0',2);

/*Table structure for table `tblwork_shift` */

DROP TABLE IF EXISTS `tblwork_shift`;

CREATE TABLE `tblwork_shift` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_code` varchar(45) NOT NULL,
  `shift_name` varchar(200) NOT NULL,
  `shift_type` varchar(200) NOT NULL,
  `department` varchar(45) DEFAULT NULL,
  `position` varchar(45) DEFAULT NULL,
  `add_from` int(11) NOT NULL,
  `staff` text DEFAULT NULL,
  `date_create` date DEFAULT NULL,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `shifts_detail` text NOT NULL,
  `type_shiftwork` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwork_shift` */

/*Table structure for table `tblwork_shift_detail` */

DROP TABLE IF EXISTS `tblwork_shift_detail`;

CREATE TABLE `tblwork_shift_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwork_shift_detail` */

/*Table structure for table `tblwork_shift_detail_day_name` */

DROP TABLE IF EXISTS `tblwork_shift_detail_day_name`;

CREATE TABLE `tblwork_shift_detail_day_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `day_name` varchar(45) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwork_shift_detail_day_name` */

/*Table structure for table `tblwork_shift_detail_number_day` */

DROP TABLE IF EXISTS `tblwork_shift_detail_number_day`;

CREATE TABLE `tblwork_shift_detail_number_day` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `shift_id` int(11) DEFAULT NULL,
  `work_shift_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `tblwork_shift_detail_number_day` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
