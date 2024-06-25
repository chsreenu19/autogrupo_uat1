/*
SQLyog Community v13.1.9 (64 bit)
MySQL - 10.4.22-MariaDB : Database - rents
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `tbl_body_type` */

DROP TABLE IF EXISTS `tbl_body_type`;

CREATE TABLE `tbl_body_type` (
  `body_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `body_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`body_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_body_type` */

insert  into `tbl_body_type`(`body_type_id`,`body_type_name`) values 
(1,'Sport Utility Vehicle'),
(2,'Pickup Truck'),
(3,'Sedan'),
(4,'Minivan'),
(5,'Coupe'),
(6,'Hatchback'),
(7,'SUV'),
(8,'Pickup'),
(9,'Van');

/*Table structure for table `tbl_brand` */

DROP TABLE IF EXISTS `tbl_brand`;

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL AUTO_INCREMENT,
  `brand_name` varchar(255) NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_brand` */

insert  into `tbl_brand`(`brand_id`,`brand_name`) values 
(1,'jeep'),
(2,'ford'),
(3,'chevrolet'),
(4,'nissan'),
(5,'dodge'),
(6,'honda'),
(7,'kia'),
(8,'hyundai'),
(9,'mazda'),
(10,'toyota'),
(11,'volkswagen'),
(12,'chrysler'),
(13,'mitsubishi'),
(14,'ram');

/*Table structure for table `tbl_car` */

DROP TABLE IF EXISTS `tbl_car`;

CREATE TABLE `tbl_car` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `car_category_id` int(11) DEFAULT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `model_id` int(11) DEFAULT NULL,
  `body_type_id` int(11) DEFAULT NULL,
  `fuel_type_id` int(11) DEFAULT NULL,
  `transmission_type_id` int(11) DEFAULT NULL,
  `vin` varchar(255) DEFAULT NULL,
  `car_condition` varchar(10) DEFAULT NULL,
  `engine` varchar(100) DEFAULT NULL,
  `engine_size` varchar(100) DEFAULT NULL,
  `exterior_color` varchar(100) DEFAULT NULL,
  `interior_color` varchar(100) DEFAULT NULL,
  `seat` varchar(100) DEFAULT NULL,
  `door` varchar(100) DEFAULT NULL,
  `top_speed` varchar(100) DEFAULT NULL,
  `kilometer` varchar(100) DEFAULT NULL,
  `mileage` varchar(100) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `warranty` varchar(100) DEFAULT NULL,
  `featured_photo` varchar(255) DEFAULT NULL,
  `regular_price` varchar(20) DEFAULT NULL,
  `sale_price` varchar(20) DEFAULT NULL,
  `seller_id` int(11) DEFAULT NULL,
  `specs_machinical` text DEFAULT NULL,
  `specs_exteriors` text DEFAULT NULL,
  `specs_interiors` text DEFAULT NULL,
  `specs_entertainment` text DEFAULT NULL,
  `specs_security` text DEFAULT NULL,
  `dms_id` int(10) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car` */

insert  into `tbl_car`(`car_id`,`title`,`description`,`address`,`city`,`state`,`zip_code`,`country`,`map`,`car_category_id`,`brand_id`,`model_id`,`body_type_id`,`fuel_type_id`,`transmission_type_id`,`vin`,`car_condition`,`engine`,`engine_size`,`exterior_color`,`interior_color`,`seat`,`door`,`top_speed`,`kilometer`,`mileage`,`year`,`warranty`,`featured_photo`,`regular_price`,`sale_price`,`seller_id`,`specs_machinical`,`specs_exteriors`,`specs_interiors`,`specs_entertainment`,`specs_security`,`dms_id`,`status`) values 
(1,'Jeep Wrangler','','','','','','','',1,1,1,1,1,1,'1C4HJXDG7KW503346','Used Car','2.0-L L-4 DOHC 16V Turbo','2','Grey','Black','5','4',NULL,NULL,'17 miles/gallon',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust::','3.jpg','35995.00','35995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 21.50 gallons</li>\r\n	<li>City Mileage : 17 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V Turbo</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Recirculating</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Recirc</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : Live</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 245/75r17</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n	<li>Steel Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 188.40 In.</li>\r\n	<li>Overall Width : 73.80 In.</li>\r\n	<li>Overall Height : 73.60 In.</li>\r\n	<li>Wheelbase : 118.40 In.</li>\r\n	<li>Ground Clearance : 9.70 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 188.40 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 42.60 In.</li>\r\n	<li>Rear Headroom : 41.70 In.</li>\r\n	<li>Front Legroom : 41.20 In.</li>\r\n	<li>Rear Legroom : 38.30 In.</li>\r\n	<li>Front Shoulder Room : 55.70 In.</li>\r\n	<li>Rear Shoulder Room : 55.70 In.</li>\r\n	<li>Front Hip Room : 53.90 In.</li>\r\n	<li>Rear Hip Room : 56.70 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',92,1),
(2,'Ford Escape','','','','','','','',2,2,2,1,2,2,'1fmcu0f70jua38579','Used Car','2.5-L L-4 DOHC 16V','2.5','Charcoal Black (Cloth)','Blue Metallic','5','4',NULL,NULL,'21 miles/gallon',2018,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','21995.00','21995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 15.70 gallons</li>\r\n	<li>City Mileage : 21 miles/gallon</li>\r\n	<li>Highway Mileage : 29 miles/gallon</li>\r\n	<li>Engine : 2.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P235/55r17</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 178.10 In.</li>\r\n	<li>Overall Width : 72.40 In.</li>\r\n	<li>Overall Height : 66.30 In.</li>\r\n	<li>Wheelbase : 105.90 In.</li>\r\n	<li>Ground Clearance : 7.80 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 178.10 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.90 In.</li>\r\n	<li>Rear Headroom : 39.00 In.</li>\r\n	<li>Front Legroom : 43.10 In.</li>\r\n	<li>Rear Legroom : 37.30 In.</li>\r\n	<li>Front Shoulder Room : 55.90 In.</li>\r\n	<li>Rear Shoulder Room : 55.20 In.</li>\r\n	<li>Front Hip Room : 54.50 In.</li>\r\n	<li>Rear Hip Room : 52.40 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',76,1),
(3,'Ford F_150','','','','','','','',3,2,3,2,2,2,'1FTEW1EP0JKC89970','Used Car','5.0-L V-8 SMPI DOHC Flexible','5','White','Shadow Black,Magma Red Metallic,Lightning Blue Metallic,Oxford White,Stone Gray Metallic,Race Red,In','5','4',NULL,NULL,'17 miles/gallon',2018,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','37995.00','37995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 26.00 gallons</li>\r\n	<li>City Mileage : 17 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 5.0-L V-8 SMPI DOHC Flexible</li>\r\n	<li>Engine Size : 5</li>\r\n	<li>Engine Cylinders : 8</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : 265/60r18</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 243.70 In.</li>\r\n	<li>Overall Width : 79.90 In.</li>\r\n	<li>Overall Height : 75.70 In.</li>\r\n	<li>Wheelbase : 156.80 In.</li>\r\n	<li>Ground Clearance : 8.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 243.70 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.80 In.</li>\r\n	<li>Rear Headroom : 40.40 In.</li>\r\n	<li>Front Legroom : 43.90 In.</li>\r\n	<li>Rear Legroom : 43.60 In.</li>\r\n	<li>Front Shoulder Room : 66.70 In.</li>\r\n	<li>Rear Shoulder Room : 65.90 In.</li>\r\n	<li>Front Hip Room : 62.50 In.</li>\r\n	<li>Rear Hip Room : 64.70 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n	<li>Passenger Multi-Adjustable Power Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',88,1),
(4,'Chevrolet Sonic','','','','','','','',0,3,4,3,3,1,'1G1JA5SH3F4127787','Used Car','4 Cylinder Engine','4 Cylinder Engine','GRI',NULL,'5',NULL,NULL,'113426','68329',2015,NULL,'3.jpg','8995.00','8995.00',6,NULL,NULL,NULL,NULL,NULL,35,1),
(5,'Nissan Altima','','','','','','','',4,4,5,3,1,0,'1N4BL4CV1NN312388','Used Car','2.5-L L-4 DOHC 16V','2.5','Black',NULL,'5','4',NULL,NULL,'27 miles/gallon',2022,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','33995.00','33995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 16.20 gallons</li>\r\n	<li>City Mileage : 27 miles/gallon</li>\r\n	<li>Highway Mileage : 37 miles/gallon</li>\r\n	<li>Engine : 2.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type :</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 235/40r19</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Automatic Headlights</li>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Rear Spoiler</li>\r\n	<li>Splash Guards</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.90 In.</li>\r\n	<li>Wheelbase : 111.20 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n	<li>Power Adjustable Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Heated Steering Wheel</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.10 In.</li>\r\n	<li>Rear Headroom : 36.90 In.</li>\r\n	<li>Front Legroom : 43.80 In.</li>\r\n	<li>Rear Legroom : 35.20 In.</li>\r\n	<li>Front Shoulder Room : 58.20 In.</li>\r\n	<li>Rear Shoulder Room : 57.10 In.</li>\r\n	<li>Front Hip Room : 54.70 In.</li>\r\n	<li>Rear Hip Room : 54.50 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n</ul>\r\n\r\n<p>Roof</p>\r\n\r\n<ul>\r\n	<li>Power Sunroof</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Electronic Parking Aid</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',103,1),
(7,'Dodge Grand Caravan','2C4RDGCG1HR758217','','','','','','',6,5,7,4,1,2,'2C4RDGCG1HR758217','Used Car','3.6-L V-6 DOHC 24V','3.6','CHARCOAL GREY','BLK','7','4',NULL,NULL,'17 miles/gallon',2017,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','22995.00','22995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 20.00 gallons</li>\r\n	<li>City Mileage : 17 miles/gallon</li>\r\n	<li>Highway Mileage : 25 miles/gallon</li>\r\n	<li>Engine : 3.6-L V-6 DOHC 24V</li>\r\n	<li>Engine Size : 3.6</li>\r\n	<li>Engine Cylinders : 6</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P225/65r17</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 7</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Splash Guards</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 202.80 In.</li>\r\n	<li>Overall Width : 78.70 In.</li>\r\n	<li>Overall Height : 68.90 In.</li>\r\n	<li>Wheelbase : 121.20 In.</li>\r\n	<li>Ground Clearance : 5.60 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 202.80 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Electrochromic Interior Rearview Mirror</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.80 In.</li>\r\n	<li>Rear Headroom : 39.30 In.</li>\r\n	<li>Front Legroom : 40.70 In.</li>\r\n	<li>Rear Legroom : 36.50 In.</li>\r\n	<li>Front Shoulder Room : 63.70 In.</li>\r\n	<li>Rear Shoulder Room : 64.10 In.</li>\r\n	<li>Front Hip Room : 58.40 In.</li>\r\n	<li>Rear Hip Room : 65.00 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>DVD Player</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',74,1),
(9,'Ford Bronco','','','','','','','',2,2,9,1,1,2,'3FMCR9B6XMRA54612','Used Car','1.5-L L-3','1.5','GRY','GRY','5','4',NULL,NULL,NULL,2021,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','37995.00','37995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 16.00 gallons</li>\r\n	<li>City Mileage :</li>\r\n	<li>Highway Mileage :</li>\r\n	<li>Engine : 1.5-L L-3</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 3</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.70 In.</li>\r\n	<li>Overall Width : 74.30 In.</li>\r\n	<li>Overall Height : 70.20 In.</li>\r\n	<li>Wheelbase : 105.10 In.</li>\r\n	<li>Ground Clearance : 7.80 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.70 In.</li>\r\n</ul>\r\n','<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 41.50 In.</li>\r\n	<li>Rear Headroom : 41.70 In.</li>\r\n	<li>Front Legroom : 42.40 In.</li>\r\n	<li>Rear Legroom : 36.90 In.</li>\r\n	<li>Front Shoulder Room : 57.30 In.</li>\r\n	<li>Rear Shoulder Room : 55.60 In.</li>\r\n	<li>Front Hip Room : 55.20 In.</li>\r\n	<li>Rear Hip Room : 53.40 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n</ul>\r\n',87,1),
(10,'Honda Fit','','','','','','','',7,6,10,6,1,3,'3HGGK5H65LM725868','Used Car','1.5-L L-4 SOHC 16V','1.5','White',NULL,'5','4',NULL,NULL,'31 miles/gallon',2020,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','25995.00','25995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 10.60 gallons</li>\r\n	<li>City Mileage : 31 miles/gallon</li>\r\n	<li>Highway Mileage : 36 miles/gallon</li>\r\n	<li>Engine : 1.5-L L-4 SOHC 16V</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Torsion BAR</li>\r\n	<li>Tires : 185/55r16 83H</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 161.80 In.</li>\r\n	<li>Overall Width : 67.00 In.</li>\r\n	<li>Overall Height : 60.00 In.</li>\r\n	<li>Wheelbase : 99.60 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 161.80 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.50 In.</li>\r\n	<li>Rear Headroom : 37.50 In.</li>\r\n	<li>Front Legroom : 41.40 In.</li>\r\n	<li>Rear Legroom : 39.30 In.</li>\r\n	<li>Front Shoulder Room : 54.80 In.</li>\r\n	<li>Rear Shoulder Room : 52.60 In.</li>\r\n	<li>Front Hip Room : 51.50 In.</li>\r\n	<li>Rear Hip Room : 45.10 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',89,1),
(11,'Kia Rio','','','','','','','',8,7,11,3,1,2,'3KPA24AB1KE239296','Used Car','1.6-L L-4 DOHC 16V','1.6','White',NULL,'5','4',NULL,NULL,'28 miles/gallon',2019,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','19995.00','19995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 11.90 gallons</li>\r\n	<li>City Mileage : 28 miles/gallon</li>\r\n	<li>Highway Mileage : 37 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P185/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.60 In.</li>\r\n	<li>Overall Width : 67.90 In.</li>\r\n	<li>Overall Height : 57.10 In.</li>\r\n	<li>Wheelbase : 101.60 In.</li>\r\n	<li>Ground Clearance : 5.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.60 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.90 In.</li>\r\n	<li>Rear Headroom : 37.40 In.</li>\r\n	<li>Front Legroom : 42.10 In.</li>\r\n	<li>Rear Legroom : 33.50 In.</li>\r\n	<li>Front Shoulder Room : 54.10 In.</li>\r\n	<li>Rear Shoulder Room : 53.30 In.</li>\r\n	<li>Front Hip Room : 52.90 In.</li>\r\n	<li>Rear Hip Room : 52.40 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',96,1),
(12,'Kia Rio 5','','','','','','','',8,7,12,6,1,2,'3KPA25AD9LE287427','Used Car','1.6-L L-4 DOHC 16V','1.6','White','BLK','5','5',NULL,NULL,'33 miles/gallon',2020,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','19995.00','19995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 11.90 gallons</li>\r\n	<li>City Mileage : 33 miles/gallon</li>\r\n	<li>Highway Mileage : 41 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P185/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 160.00 In.</li>\r\n	<li>Overall Width : 67.90 In.</li>\r\n	<li>Overall Height : 57.10 In.</li>\r\n	<li>Wheelbase : 101.60 In.</li>\r\n	<li>Ground Clearance : 5.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 160.00 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.90 In.</li>\r\n	<li>Rear Headroom : 38.00 In.</li>\r\n	<li>Front Legroom : 42.10 In.</li>\r\n	<li>Rear Legroom : 33.50 In.</li>\r\n	<li>Front Shoulder Room : 54.10 In.</li>\r\n	<li>Rear Shoulder Room : 53.30 In.</li>\r\n	<li>Front Hip Room : 52.90 In.</li>\r\n	<li>Rear Hip Room : 52.40 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',94,1),
(13,'Hyundai Accent Sedan','','','','','','','',0,8,13,3,3,2,'3KPC24A69LE119257','Used Car','4 Cylinder Engine','4 Cylinder Engine','CRE','GREY','5',NULL,NULL,'23875','14383',2020,NULL,'3.jpg','20995.00','20995.00',6,NULL,NULL,NULL,NULL,NULL,43,1),
(14,'Kia Forte','','','','','','','',9,7,14,3,1,4,'3KPF34AD4KE034995','Used Car','2.0-L L-4 DOHC 16V','2','Blue',NULL,'5','4',NULL,NULL,'30 miles/gallon',2019,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','25995.00','25995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 14.00 gallons</li>\r\n	<li>City Mileage : 30 miles/gallon</li>\r\n	<li>Highway Mileage : 40 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT w/OD</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P205/55r16</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 182.70 In.</li>\r\n	<li>Overall Width : 70.90 In.</li>\r\n	<li>Overall Height : 56.50 In.</li>\r\n	<li>Wheelbase : 106.30 In.</li>\r\n	<li>Ground Clearance : 5.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 182.70 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.80 In.</li>\r\n	<li>Rear Headroom : 37.50 In.</li>\r\n	<li>Front Legroom : 42.20 In.</li>\r\n	<li>Rear Legroom : 35.70 In.</li>\r\n	<li>Front Shoulder Room : 56.10 In.</li>\r\n	<li>Rear Shoulder Room : 55.30 In.</li>\r\n	<li>Front Hip Room : 53.00 In.</li>\r\n	<li>Rear Hip Room : 51.10 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',95,1),
(15,'Mazda 2','','','','','','','',8,9,15,6,1,2,'3MDDJBBV5KM310666','Used Car','1.5-L L-4 DOHC 16V','1.5','Dark Blue',NULL,NULL,'4',NULL,NULL,NULL,2019,'Basic:: \r\nPowertrain:: \r\nRust::','3.jpg','16995.00','16995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity:</li>\r\n	<li>City Mileage :</li>\r\n	<li>Highway Mileage :</li>\r\n	<li>Engine : 1.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System :</li>\r\n	<li>Steering Type :</li>\r\n</ul>\r\n',NULL,NULL,NULL,NULL,98,1),
(16,'Toyota Yaris Sedan','','','','','','','',8,10,16,6,1,1,'3MYDLBYV8KY523054','Used Car','1.5-L L-4 DOHC 16V','1.5','White',NULL,'5','2',NULL,NULL,'32 miles/gallon',2019,'Basic:: \r\nPowertrain:: \r\nRust::','3.jpg','21995.00','21995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 11.60 gallons</li>\r\n	<li>City Mileage : 32 miles/gallon</li>\r\n	<li>Highway Mileage : 40 miles/gallon</li>\r\n	<li>Engine : 1.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 5</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 5</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P185/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.20 In.</li>\r\n	<li>Overall Width : 66.70 In.</li>\r\n	<li>Overall Height : 58.50 In.</li>\r\n	<li>Wheelbase : 101.20 In.</li>\r\n	<li>Ground Clearance : 5.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.20 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.20 In.</li>\r\n	<li>Rear Headroom : 36.80 In.</li>\r\n	<li>Front Legroom : 41.90 In.</li>\r\n	<li>Rear Legroom : 34.40 In.</li>\r\n	<li>Front Shoulder Room : 53.10 In.</li>\r\n	<li>Rear Shoulder Room : 50.00 In.</li>\r\n	<li>Front Hip Room : 48.60 In.</li>\r\n	<li>Rear Hip Room : 49.50 In.</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>Navigation Aid</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',105,1),
(17,'Nissan Sentra','','','','','','','',9,4,17,3,4,1,'3N1CB7APXHY287279','Used Car','1.6-L L-4 DOHC 16V Turbo','1.6','Black','Brilliant Silver,Deep Blue Pearl,Gun Metallic,Super Black,Aspen White,Red Alert','5','4',NULL,NULL,'26 miles/gallon',2017,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','19995.00','19995.00',6,'<ul>\r\n	<li>Fuel Type: Premium</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 26 miles/gallon</li>\r\n	<li>Highway Mileage : 32 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V Turbo</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Premium</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P205/50r17</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 15.10 Cu.ft.</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Rear Spoiler</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 3009 Lbs</li>\r\n	<li>Overall Length : 182.50 In.</li>\r\n	<li>Overall Width : 69.30 In.</li>\r\n	<li>Overall Height : 59.00 In.</li>\r\n	<li>Wheelbase : 106.30 In.</li>\r\n	<li>Ground Clearance : 5.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 182.50 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.50 In.</li>\r\n	<li>Rear Headroom : 36.70 In.</li>\r\n	<li>Front Legroom : 42.50 In.</li>\r\n	<li>Rear Legroom : 37.40 In.</li>\r\n	<li>Front Shoulder Room : 54.70 In.</li>\r\n	<li>Rear Shoulder Room : 53.90 In.</li>\r\n	<li>Front Hip Room : 50.90 In.</li>\r\n	<li>Rear Hip Room : 50.10 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Front Heated Seat</li>\r\n</ul>\r\n\r\n<p>Roof</p>\r\n\r\n<ul>\r\n	<li>Power Sunroof</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',104,1),
(18,'Nissan Kicks','','','','','','','',9,4,18,6,1,4,'3N1CP5BV1LL509085','Used Car','1.6-L L-4','1.6','Charcoal Gray',NULL,'5','4',NULL,NULL,'31 miles/gallon',2020,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','26995.00','26995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 10.80 gallons</li>\r\n	<li>City Mileage : 31 miles/gallon</li>\r\n	<li>Highway Mileage : 36 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT w/OD</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 205/60r16</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 169.10 In.</li>\r\n	<li>Overall Width : 69.30 In.</li>\r\n	<li>Overall Height : 62.40 In.</li>\r\n	<li>Wheelbase : 103.10 In.</li>\r\n	<li>Ground Clearance : 7.00 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 169.10 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.70 In.</li>\r\n	<li>Rear Headroom : 38.50 In.</li>\r\n	<li>Front Legroom : 43.70 In.</li>\r\n	<li>Rear Legroom : 33.20 In.</li>\r\n	<li>Front Shoulder Room : 53.00 In.</li>\r\n	<li>Rear Shoulder Room : 53.20 In.</li>\r\n	<li>Front Hip Room : 50.90 In.</li>\r\n	<li>Rear Hip Room : 49.10 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',73,1),
(19,'Toyota Tacoma','','','','','','','',3,10,19,2,1,2,'3TYAZ5CN6MT007993','Used Car','3.5-L V-6 DOHC 24V','3.5','BLUE','BLK','5','4',NULL,NULL,'19 miles/gallon',2021,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','38995.00','38995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 21.10 gallons</li>\r\n	<li>City Mileage : 19 miles/gallon</li>\r\n	<li>Highway Mileage : 24 miles/gallon</li>\r\n	<li>Engine : 3.5-L V-6 DOHC 24V</li>\r\n	<li>Engine Size : 3.5</li>\r\n	<li>Engine Cylinders : 6</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P245/75r16</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 225.50 In.</li>\r\n	<li>Overall Width : 74.40 In.</li>\r\n	<li>Overall Height : 70.60 In.</li>\r\n	<li>Wheelbase : 140.60 In.</li>\r\n	<li>Ground Clearance : 9.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 225.50 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.70 In.</li>\r\n	<li>Rear Headroom : 38.30 In.</li>\r\n	<li>Front Legroom : 42.90 In.</li>\r\n	<li>Rear Legroom : 32.60 In.</li>\r\n	<li>Front Shoulder Room : 58.30 In.</li>\r\n	<li>Rear Shoulder Room : 58.90 In.</li>\r\n	<li>Front Hip Room : 57.20 In.</li>\r\n	<li>Rear Hip Room : 56.30 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n',108,1),
(20,'Volkswagen Jetta','','','','','','','',8,11,20,3,1,2,'3VWC57BU3KM164668','Used Car','1.4-L L-4 DOHC 20V','1.4','Black',NULL,'5','4',NULL,NULL,'30 miles/gallon',2019,'Basic:72 Months: 72,000 miles\r\nPowertrain:72 Months: 72,000 miles\r\nRust:84 Months: 100,000 miles','3.jpg','25995.00','25995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 30 miles/gallon</li>\r\n	<li>Highway Mileage : 40 miles/gallon</li>\r\n	<li>Engine : 1.4-L L-4 DOHC 20V</li>\r\n	<li>Engine Size : 1.4</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P205/55r H</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 185.10 In.</li>\r\n	<li>Overall Width : 70.80 In.</li>\r\n	<li>Overall Height : 57.40 In.</li>\r\n	<li>Wheelbase : 105.70 In.</li>\r\n	<li>Ground Clearance : 5.60 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 185.10 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.50 In.</li>\r\n	<li>Rear Headroom : 37.20 In.</li>\r\n	<li>Front Legroom : 41.10 In.</li>\r\n	<li>Rear Legroom : 37.40 In.</li>\r\n	<li>Front Shoulder Room : 55.90 In.</li>\r\n	<li>Rear Shoulder Room : 54.00 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Front Heated Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',79,1),
(21,'Toyota Highlander SUV','','','','','','','',0,10,21,7,3,2,'5TDZZRFH8JS273202','Used Car','V6 Cylinder Engine','V6 Cylinder Engine','White','GREY','5',NULL,NULL,NULL,NULL,2018,NULL,'3.jpg','33995.00','33995.00',6,NULL,NULL,NULL,NULL,NULL,64,1),
(22,'Toyota Tacoma 4WD Pickup','','','','','','','',0,10,22,8,3,2,'5TFCZ5AN6KX177527','Used Car','V6 Cylinder Engine','V6 Cylinder Engine','BLA','GREY','5',NULL,NULL,'44834','27009',2019,NULL,'3.jpg','38995.00','38995.00',6,NULL,NULL,NULL,NULL,NULL,63,1),
(23,'Toyota Tacoma','','','','','','','',10,10,19,2,1,2,'5TFRX5GN0KX140447','Used Car','2.7-L L-4 DOHC 16V','2.7','White',NULL,'4','2',NULL,NULL,'20 miles/gallon',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','28995.00','28995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 21.10 gallons</li>\r\n	<li>City Mileage : 20 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 2.7-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.7</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P245/75r16</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 4</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n	<li>Overall Width : 74.40 In.</li>\r\n	<li>Overall Height : 70.60 In.</li>\r\n	<li>Wheelbase : 127.40 In.</li>\r\n	<li>Ground Clearance : 9.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.70 In.</li>\r\n	<li>Rear Headroom : 34.90 In.</li>\r\n	<li>Front Legroom : 42.90 In.</li>\r\n	<li>Rear Legroom : 24.60 In.</li>\r\n	<li>Front Shoulder Room : 58.30 In.</li>\r\n	<li>Rear Shoulder Room : 56.50 In.</li>\r\n	<li>Front Hip Room : 57.20 In.</li>\r\n	<li>Rear Hip Room : 51.70 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',107,1),
(24,'Toyota Tacoma','','','','','','','',10,10,19,2,1,2,'5TFRX5GN1KX140442','Used Car','2.7-L L-4 DOHC 16V','2.7','White',NULL,'4','2',NULL,NULL,'20 miles/gallon',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','28995.00','28995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 21.10 gallons</li>\r\n	<li>City Mileage : 20 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 2.7-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.7</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P245/75r16</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 4</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n	<li>Overall Width : 74.40 In.</li>\r\n	<li>Overall Height : 70.60 In.</li>\r\n	<li>Wheelbase : 127.40 In.</li>\r\n	<li>Ground Clearance : 9.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.70 In.</li>\r\n	<li>Rear Headroom : 34.90 In.</li>\r\n	<li>Front Legroom : 42.90 In.</li>\r\n	<li>Rear Legroom : 24.60 In.</li>\r\n	<li>Front Shoulder Room : 58.30 In.</li>\r\n	<li>Rear Shoulder Room : 56.50 In.</li>\r\n	<li>Front Hip Room : 57.20 In.</li>\r\n	<li>Rear Hip Room : 51.70 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',109,1),
(25,'Toyota Tacoma','','','','','','','',10,10,19,2,1,2,'5TFRX5GN7KX140333','Used Car','2.7-L L-4 DOHC 16V','2.7','White',NULL,'4','2',NULL,NULL,'20 miles/gallon',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','28995.00','28995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 21.10 gallons</li>\r\n	<li>City Mileage : 20 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 2.7-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.7</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P245/75r16</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 4</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n	<li>Overall Width : 74.40 In.</li>\r\n	<li>Overall Height : 70.60 In.</li>\r\n	<li>Wheelbase : 127.40 In.</li>\r\n	<li>Ground Clearance : 9.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 212.30 In.</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.70 In.</li>\r\n	<li>Rear Headroom : 34.90 In.</li>\r\n	<li>Front Legroom : 42.90 In.</li>\r\n	<li>Rear Legroom : 24.60 In.</li>\r\n	<li>Front Shoulder Room : 58.30 In.</li>\r\n	<li>Rear Shoulder Room : 56.50 In.</li>\r\n	<li>Front Hip Room : 57.20 In.</li>\r\n	<li>Rear Hip Room : 51.70 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',106,1),
(27,'Used','2019','','','','','','',0,8,13,0,0,0,'3kpc24a35ke058672','Used Car',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2019,NULL,'3.jpg','0.00','0.00',6,NULL,NULL,NULL,NULL,NULL,7,1),
(28,'Mitsubishi Outlander','','','','','','','',2,13,24,1,1,3,'JA4APUAU7MU000577','Used Car','2.0-L L-4 DOHC 16V','2','Blue',NULL,'5','4',NULL,NULL,'24 miles/gallon',2021,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: 100,000 miles','3.jpg','27995.00','27995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 16.60 gallons</li>\r\n	<li>City Mileage : 24 miles/gallon</li>\r\n	<li>Highway Mileage : 30 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P225/55r18</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 21.70 Cu.ft.</li>\r\n	<li>Maximum Payload : 1223 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Rear Spoiler</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 3120 Lbs</li>\r\n	<li>Overall Length : 171.90 In.</li>\r\n	<li>Overall Width : 71.30 In.</li>\r\n	<li>Overall Height : 64.80 In.</li>\r\n	<li>Wheelbase : 105.10 In.</li>\r\n	<li>Ground Clearance : 8.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n	<li>Electrochromic Interior Rearview Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.40 In.</li>\r\n	<li>Rear Headroom : 37.90 In.</li>\r\n	<li>Front Legroom : 41.60 In.</li>\r\n	<li>Rear Legroom : 36.30 In.</li>\r\n	<li>Front Shoulder Room : 56.20 In.</li>\r\n	<li>Rear Shoulder Room : 55.50 In.</li>\r\n	<li>Front Hip Room : 52.10 In.</li>\r\n	<li>Rear Hip Room : 51.60 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n	<li>Load Bearing Exterior Rack</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Electronic Parking Aid</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',24,1),
(29,'Mitsubishi Outlander Sport','','','','','','','',2,13,24,1,1,3,'JA4APUAU8MU026976','Used Car','2.0-L L-4 DOHC 16V','2','Charcoal Gray',NULL,'5','4',NULL,NULL,'24 miles/gallon',2021,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: 100,000 miles','3.jpg','27995.00','27995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 16.60 gallons</li>\r\n	<li>City Mileage : 24 miles/gallon</li>\r\n	<li>Highway Mileage : 30 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P225/55r18</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 21.70 Cu.ft.</li>\r\n	<li>Maximum Payload : 1223 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Rear Spoiler</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 3120 Lbs</li>\r\n	<li>Overall Length : 171.90 In.</li>\r\n	<li>Overall Width : 71.30 In.</li>\r\n	<li>Overall Height : 64.80 In.</li>\r\n	<li>Wheelbase : 105.10 In.</li>\r\n	<li>Ground Clearance : 8.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n	<li>Electrochromic Interior Rearview Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.40 In.</li>\r\n	<li>Rear Headroom : 37.90 In.</li>\r\n	<li>Front Legroom : 41.60 In.</li>\r\n	<li>Rear Legroom : 36.30 In.</li>\r\n	<li>Front Shoulder Room : 56.20 In.</li>\r\n	<li>Rear Shoulder Room : 55.50 In.</li>\r\n	<li>Front Hip Room : 52.10 In.</li>\r\n	<li>Rear Hip Room : 51.60 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n	<li>Load Bearing Exterior Rack</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Electronic Parking Aid</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',22,1),
(31,'Usado','','','','','','','',0,1,26,0,0,0,'3c4njcab6l1135740','Used Car',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,2020,NULL,'3.jpg','26995.00','26995.00',6,NULL,NULL,NULL,NULL,NULL,18,1),
(33,'Toyota C-HR SUV','','','','','','','',0,10,28,7,3,2,'JTNKHMBX8J1003223','Used Car','4 Cylinder Engine','4 Cylinder Engine','Gray','BLACK','5',NULL,NULL,'86163','51906',2018,NULL,'3.jpg','25995.00','25995.00',6,NULL,NULL,NULL,NULL,NULL,61,1),
(34,'Hyundai Tucson SUV','','','','','','','',0,8,29,7,3,2,'KM8J23A46LU032963','Used Car','4 Cylinder Engine',NULL,'GRC','BLACK','5',NULL,NULL,'79480','47880',2020,NULL,'3.jpg','26995.00','26995.00',6,NULL,NULL,NULL,NULL,NULL,45,1),
(35,'Hyundai Elantra','','','','','','','',5,8,30,3,1,2,'KMHD74LF1LU990878','Used Car','1.6-L L-4 DOHC 16V','1.6','Gray',NULL,'5','4',NULL,NULL,'31 miles/gallon',2020,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: unlimited miles','3.jpg','25995.00','25995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 14.00 gallons</li>\r\n	<li>City Mileage : 31 miles/gallon</li>\r\n	<li>Highway Mileage : 41 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P195/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 181.90 In.</li>\r\n	<li>Overall Width : 70.90 In.</li>\r\n	<li>Overall Height : 56.50 In.</li>\r\n	<li>Wheelbase : 106.30 In.</li>\r\n	<li>Ground Clearance : 5.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 181.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.30 In.</li>\r\n	<li>Rear Headroom : 37.30 In.</li>\r\n	<li>Front Legroom : 42.20 In.</li>\r\n	<li>Rear Legroom : 35.70 In.</li>\r\n	<li>Front Shoulder Room : 56.20 In.</li>\r\n	<li>Rear Shoulder Room : 55.30 In.</li>\r\n	<li>Front Hip Room : 53.40 In.</li>\r\n	<li>Rear Hip Room : 51.90 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',90,1),
(37,'Hyundai Venue','','','','','','','',12,8,31,1,1,0,'KMHRB8A31NU145746','Used Car','1.6-L L-4 DOHC 16V','1.6','Dark Red',NULL,'5','4',NULL,NULL,'29 miles/gallon',2022,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: unlimited miles','3.jpg','26995.00','26995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 11.90 gallons</li>\r\n	<li>City Mileage : 29 miles/gallon</li>\r\n	<li>Highway Mileage : 33 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type :</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 185/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 159.10 In.</li>\r\n	<li>Wheelbase : 99.20 In.</li>\r\n	<li>Ground Clearance : 6.70 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 159.10 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Heated Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.40 In.</li>\r\n	<li>Rear Headroom : 38.60 In.</li>\r\n	<li>Front Legroom : 41.30 In.</li>\r\n	<li>Rear Legroom : 34.30 In.</li>\r\n	<li>Front Shoulder Room : 53.90 In.</li>\r\n	<li>Rear Shoulder Room : 53.70 In.</li>\r\n	<li>Front Hip Room : 52.10 In.</li>\r\n	<li>Rear Hip Room : 43.50 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>First Aid Kit</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',91,1),
(38,'Kia Rio','','','','','','','',8,7,11,3,2,1,'KNADM4A31G6542301','Used Car','1.6-L L-4 DOHC 16V','1.6','Gray','Bright Silver,Digital Yellow,Clear White,Urban Blue','5','4',NULL,NULL,'27 miles/gallon',2016,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','11995.00','11995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 11.40 gallons</li>\r\n	<li>City Mileage : 27 miles/gallon</li>\r\n	<li>Highway Mileage : 38 miles/gallon</li>\r\n	<li>Engine : 1.6-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.6</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P185/65r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 13.70 Cu.ft.</li>\r\n</ul>\r\n','<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Rear Spoiler</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n	<li>Steel Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 2656 Lbs</li>\r\n	<li>Overall Length : 172.00 In.</li>\r\n	<li>Overall Width : 67.70 In.</li>\r\n	<li>Overall Height : 57.30 In.</li>\r\n	<li>Wheelbase : 101.20 In.</li>\r\n	<li>Ground Clearance : 5.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.00 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.00 In.</li>\r\n	<li>Rear Headroom : 37.60 In.</li>\r\n	<li>Front Legroom : 43.80 In.</li>\r\n	<li>Rear Legroom : 31.10 In.</li>\r\n	<li>Front Shoulder Room : 53.10 In.</li>\r\n	<li>Rear Shoulder Room : 52.10 In.</li>\r\n	<li>Front Hip Room : 52.10 In.</li>\r\n	<li>Rear Hip Room : 51.20 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',97,1),
(39,'Kia Seltos','','','','','','','',13,7,32,1,1,5,'KNDEP2AA2M7144599','Used Car','2.0-L L-4 DOHC 16V','2','Charcoal Gray',NULL,'5','4',NULL,NULL,'27 miles/gallon',2021,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','26995.00','26995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 27 miles/gallon</li>\r\n	<li>Highway Mileage : 31 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Auto-Shift Manual w/OD</li>\r\n	<li>Transmission Gears : 7</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 7</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P215/55r17</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.00 In.</li>\r\n	<li>Overall Width : 70.90 In.</li>\r\n	<li>Overall Height : 63.60 In.</li>\r\n	<li>Wheelbase : 103.50 In.</li>\r\n	<li>Ground Clearance : 7.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 172.00 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.00 In.</li>\r\n	<li>Rear Headroom : 38.40 In.</li>\r\n	<li>Front Legroom : 41.40 In.</li>\r\n	<li>Rear Legroom : 38.00 In.</li>\r\n	<li>Front Shoulder Room : 55.50 In.</li>\r\n	<li>Rear Shoulder Room : 54.70 In.</li>\r\n	<li>Front Hip Room : 53.50 In.</li>\r\n	<li>Rear Hip Room : 52.80 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',82,1),
(41,'Mitsubishi Mirage','','','','','','','',8,13,33,6,1,0,'ML32AWHJ9NH001407','Used Car','1.2-L L-3 DOHC','1.2','Black',NULL,'5','5',NULL,NULL,'36 miles/gallon',2022,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: 100,000 miles','3.jpg','22995.00','22995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 9.20 gallons</li>\r\n	<li>City Mileage : 36 miles/gallon</li>\r\n	<li>Highway Mileage : 43 miles/gallon</li>\r\n	<li>Engine : 1.2-L L-3 DOHC</li>\r\n	<li>Engine Size : 1.2</li>\r\n	<li>Engine Cylinders : 3</li>\r\n	<li>Transmission Type :</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P175/55r15</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 151.40 In.</li>\r\n	<li>Wheelbase : 96.50 In.</li>\r\n	<li>Ground Clearance : 6.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 151.40 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.00 In.</li>\r\n	<li>Rear Headroom : 37.20 In.</li>\r\n	<li>Front Legroom : 41.70 In.</li>\r\n	<li>Rear Legroom : 34.20 In.</li>\r\n	<li>Front Shoulder Room : 51.70 In.</li>\r\n	<li>Rear Shoulder Room : 51.00 In.</li>\r\n	<li>Front Hip Room : 48.80 In.</li>\r\n	<li>Rear Hip Room : 46.40 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Front Heated Seat</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>Subwoofer</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Electronic Parking Aid</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',101,1),
(42,'Mitsubishi Mirage G4','','','','','','','',4,13,34,3,1,1,'ML32FUFJ2MHF06666','Used Car','1.2-L L-3 DOHC','1.2','Charcoal Gray',NULL,'5','4',NULL,NULL,'33 miles/gallon',2021,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: 100,000 miles','3.jpg','20995.00','20995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 9.20 gallons</li>\r\n	<li>City Mileage : 33 miles/gallon</li>\r\n	<li>Highway Mileage : 40 miles/gallon</li>\r\n	<li>Engine : 1.2-L L-3 DOHC</li>\r\n	<li>Engine Size : 1.2</li>\r\n	<li>Engine Cylinders : 3</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 5</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 5</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Drum</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Semi</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P165/65r14</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 12.40 Cu.ft.</li>\r\n	<li>Maximum Payload : 947 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Steel Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-manual : 2117 Lbs</li>\r\n	<li>Overall Length : 169.50 In.</li>\r\n	<li>Overall Width : 65.70 In.</li>\r\n	<li>Overall Height : 59.20 In.</li>\r\n	<li>Wheelbase : 100.40 In.</li>\r\n	<li>Ground Clearance : 6.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 169.50 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.90 In.</li>\r\n	<li>Rear Headroom : 36.80 In.</li>\r\n	<li>Front Legroom : 41.70 In.</li>\r\n	<li>Rear Legroom : 37.30 In.</li>\r\n	<li>Front Shoulder Room : 51.70 In.</li>\r\n	<li>Rear Shoulder Room : 51.20 In.</li>\r\n	<li>Front Hip Room : 48.20 In.</li>\r\n	<li>Rear Hip Room : 46.70 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>Subwoofer</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Electronic Parking Aid</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',102,1),
(44,'Nissan Armada','','','','','','','',2,4,36,1,2,2,'JN8AY2NC8H9509325','Used Car','5.6-L V-8 DOHC 32V','5.6','Charcoal Gray','Super Black,Forged Copper,Hermosa Blue,Gun Metallic,Brilliant Silver,Mocha Almond','8','4',NULL,NULL,'13 miles/gallon',2017,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','39995.00','39995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 26.00 gallons</li>\r\n	<li>City Mileage : 13 miles/gallon</li>\r\n	<li>Highway Mileage : 18 miles/gallon</li>\r\n	<li>Engine : 5.6-L V-8 DOHC 32V</li>\r\n	<li>Engine Size : 5.6</li>\r\n	<li>Engine Cylinders : 8</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 7</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 7</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P275/60r20</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 8</li>\r\n	<li>Cargo Volume : 16.50 Cu.ft.</li>\r\n	<li>Maximum Towing : 8500 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Exterior Features</p>\r\n\r\n<ul>\r\n	<li>Running Boards</li>\r\n	<li>Skid Plate</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 5963 Lbs</li>\r\n	<li>Overall Length : 208.90 In.</li>\r\n	<li>Overall Width : 79.90 In.</li>\r\n	<li>Overall Height : 75.80 In.</li>\r\n	<li>Wheelbase : 121.10 In.</li>\r\n	<li>Ground Clearance : 9.20 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 208.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Electrochromic Interior Rearview Mirror</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rain Sensing Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.80 In.</li>\r\n	<li>Rear Headroom : 40.00 In.</li>\r\n	<li>Front Legroom : 41.90 In.</li>\r\n	<li>Rear Legroom : 41.00 In.</li>\r\n	<li>Front Shoulder Room : 63.80 In.</li>\r\n	<li>Rear Shoulder Room : 63.40 In.</li>\r\n	<li>Front Hip Room : 59.20 In.</li>\r\n	<li>Rear Hip Room : 58.40 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n	<li>Passenger Multi-Adjustable Power Seat</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Area Tiedowns</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n\r\n<p>Roof</p>\r\n\r\n<ul>\r\n	<li>Power Sunroof</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>DVD Player</li>\r\n	<li>Subwoofer</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',110,1),
(45,'Hyundai Sonata','','','','','','','',4,8,37,3,1,2,'5NPEF4JA3NH142193','Used Car','2.5-L L-4 DOHC 16V','2.5','Charcoal Gray',NULL,'5','4',NULL,NULL,'27 miles/gallon',2022,'Basic:60 Months: 60,000 miles\r\nPowertrain:120 Months: 100,000 miles\r\nRust:84 Months: unlimited miles','3.jpg','37995.00','37995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 15.90 gallons</li>\r\n	<li>City Mileage : 27 miles/gallon</li>\r\n	<li>Highway Mileage : 37 miles/gallon</li>\r\n	<li>Engine : 2.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : P215/55r17</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Automatic Headlights</li>\r\n	<li>Daytime Running Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.90 In.</li>\r\n	<li>Overall Width : 73.20 In.</li>\r\n	<li>Wheelbase : 111.80 In.</li>\r\n	<li>Ground Clearance : 5.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 40.00 In.</li>\r\n	<li>Rear Headroom : 38.40 In.</li>\r\n	<li>Front Legroom : 46.10 In.</li>\r\n	<li>Rear Legroom : 34.80 In.</li>\r\n	<li>Front Shoulder Room : 57.90 In.</li>\r\n	<li>Rear Shoulder Room : 56.10 In.</li>\r\n	<li>Front Hip Room : 54.60 In.</li>\r\n	<li>Rear Hip Room : 54.40 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Net</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n\r\n<p>Roof</p>\r\n\r\n<ul>\r\n	<li>Power Sunroof</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>First Aid Kit</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n	<li>Remote Ignition</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',111,1),
(46,'Jeep Compass SUV','','','','','','','',0,1,26,7,3,2,'3C4NJCAB6LT135740','Used Car','4 Cylinder Engine','4 Cylinder Engine','WHITE','BLACK','5',NULL,NULL,NULL,NULL,2020,NULL,'3.jpg','26995.00','26995.00',6,NULL,NULL,NULL,NULL,NULL,51,1),
(47,'Toyota CH-R','','','','','','','',14,10,38,1,2,2,'NMTKHMBX3JR056613','Used Car','2.0-L L-4 DOHC 16V','2','Black','Radiant Green Mica R-Code,Blue Eclipse Metallic R-Code,Ruby Flare Pearl,Ruby Flare Pearl R-Code,Magn','5','4',NULL,NULL,'27 miles/gallon',2018,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust::','3.jpg','24995.00','24995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 27 miles/gallon</li>\r\n	<li>Highway Mileage : 31 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 225/50r V</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.20 In.</li>\r\n	<li>Overall Width : 70.70 In.</li>\r\n	<li>Overall Height : 61.60 In.</li>\r\n	<li>Wheelbase : 103.90 In.</li>\r\n	<li>Ground Clearance : 5.90 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.20 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.10 In.</li>\r\n	<li>Rear Headroom : 38.30 In.</li>\r\n	<li>Front Legroom : 43.50 In.</li>\r\n	<li>Rear Legroom : 31.70 In.</li>\r\n	<li>Front Shoulder Room : 49.00 In.</li>\r\n	<li>Rear Shoulder Room : 52.50 In.</li>\r\n	<li>Front Hip Room : 53.00 In.</li>\r\n	<li>Rear Hip Room : 48.00 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',6,1),
(52,'Honda HRV','','','','','','','',7,6,39,1,1,4,'3CZRU5H35MM704263','Used Car','1.8-L L-4 DOHC 16V','1.8','White','Blk','5','4',NULL,NULL,'28 miles/gallon',2021,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','26995.00','26995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 28 miles/gallon</li>\r\n	<li>Highway Mileage : 34 miles/gallon</li>\r\n	<li>Engine : 1.8-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.8</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT w/OD</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 1</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 215/55r V</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 170.40 In.</li>\r\n	<li>Overall Width : 69.80 In.</li>\r\n	<li>Overall Height : 63.20 In.</li>\r\n	<li>Wheelbase : 102.80 In.</li>\r\n	<li>Ground Clearance : 7.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 170.40 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.50 In.</li>\r\n	<li>Rear Headroom : 38.30 In.</li>\r\n	<li>Front Legroom : 41.20 In.</li>\r\n	<li>Rear Legroom : 39.30 In.</li>\r\n	<li>Front Shoulder Room : 56.80 In.</li>\r\n	<li>Rear Shoulder Room : 54.50 In.</li>\r\n	<li>Front Hip Room : 53.10 In.</li>\r\n	<li>Rear Hip Room : 47.40 In.</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',112,1),
(96,'Toyota Yaris','','','','','','','',15,10,40,3,2,1,'3MYDLBYVXHY149846','Used Car','1.5-L L-4 DOHC 16V','1.5','Mid-Blue Black','Graphite,Abyss,Chromium,Pulse,Stealth,Sapphire,Frost','5','4',NULL,NULL,'30 miles/gallon',2017,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','0.00','0.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 11.60 gallons</li>\r\n	<li>City Mileage : 30 miles/gallon</li>\r\n	<li>Highway Mileage : 39 miles/gallon</li>\r\n	<li>Engine : 1.5-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 185/60r16</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 13.50 Cu.ft.</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 2385 Lbs</li>\r\n	<li>Overall Length : 171.70 In.</li>\r\n	<li>Overall Width : 66.70 In.</li>\r\n	<li>Overall Height : 58.50 In.</li>\r\n	<li>Wheelbase : 101.20 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 171.70 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.20 In.</li>\r\n	<li>Rear Headroom : 36.80 In.</li>\r\n	<li>Front Legroom : 41.90 In.</li>\r\n	<li>Rear Legroom : 34.40 In.</li>\r\n	<li>Front Shoulder Room : 53.10 In.</li>\r\n	<li>Rear Shoulder Room : 50.00 In.</li>\r\n	<li>Front Hip Room : 48.60 In.</li>\r\n	<li>Rear Hip Room : 49.50 In.</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n	<li>First Aid Kit</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n</ul>\r\n',114,1),
(100,'Honda Accord','','','','','','','',5,6,42,3,1,3,'1HGCV1F53LA103811','Used Car','1.5-L L-4 DOHC 16V Turbo','1.5','Charcoal Grey','BLK','5','4',NULL,NULL,'1,854',2020,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','35995.00','35995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 14.80 gallons</li>\r\n	<li>City Mileage : 30 miles/gallon</li>\r\n	<li>Highway Mileage : 38 miles/gallon</li>\r\n	<li>Engine : 1.5-L L-4 DOHC 16V Turbo</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : CVT</li>\r\n	<li>Transmission Gears : 10</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 10</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 225/50r17</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.20 In.</li>\r\n	<li>Overall Width : 73.30 In.</li>\r\n	<li>Overall Height : 57.10 In.</li>\r\n	<li>Wheelbase : 111.40 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 192.20 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 37.50 In.</li>\r\n	<li>Rear Headroom : 37.20 In.</li>\r\n	<li>Front Legroom : 42.30 In.</li>\r\n	<li>Rear Legroom : 40.40 In.</li>\r\n	<li>Front Shoulder Room : 58.30 In.</li>\r\n	<li>Rear Shoulder Room : 56.50 In.</li>\r\n	<li>Front Hip Room : 55.30 In.</li>\r\n	<li>Rear Hip Room : 55.00 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n	<li>Passenger Multi-Adjustable Power Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',119,1),
(101,'Honda HR-V','','','','','','','',2,6,39,1,1,6,'3CZRU5H39NM714733','Used Car','1.8-L L-4 DOHC 16V','1.8','Charcoal Grey','BLK','5','4',NULL,NULL,'9,531',2022,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: unlimited miles','3.jpg','27995.00','27995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 13.20 gallons</li>\r\n	<li>City Mileage : 28 miles/gallon</li>\r\n	<li>Highway Mileage : 34 miles/gallon</li>\r\n	<li>Engine : 1.8-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 1.8</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Continuously Variable Transmission CVT</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Electronic Brake Assistance</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 215/55r V</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Automatic Headlights</li>\r\n	<li>Daytime Running Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 170.40 In.</li>\r\n	<li>Wheelbase : 102.80 In.</li>\r\n	<li>Ground Clearance : 7.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 170.40 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Heated Exterior Mirror</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.50 In.</li>\r\n	<li>Rear Headroom : 38.30 In.</li>\r\n	<li>Front Legroom : 41.20 In.</li>\r\n	<li>Rear Legroom : 39.30 In.</li>\r\n	<li>Front Shoulder Room : 56.80 In.</li>\r\n	<li>Rear Shoulder Room : 54.50 In.</li>\r\n	<li>Front Hip Room : 53.10 In.</li>\r\n	<li>Rear Hip Room : 47.40 In.</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Front Side Airbag With Head Protection</li>\r\n	<li>Passenger Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Locking Pickup Truck Tailgate</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n',118,1),
(102,'MAZDA 2','','','','','','','',8,9,15,1,1,0,'3MDDJBBV1MM409066','Used Car','P5V','1.5','White','BLK',NULL,NULL,NULL,NULL,'4,406',2021,NULL,'3.jpg','20995.00','20995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity:</li>\r\n	<li>City Mileage :</li>\r\n	<li>Highway Mileage :</li>\r\n	<li>Engine : P5V</li>\r\n	<li>Engine Size : 1.5</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type :</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears :</li>\r\n	<li>Anti-Braking System :</li>\r\n	<li>Steering Type :</li>\r\n</ul>\r\n',NULL,NULL,NULL,NULL,116,1),
(105,'Ford Eco Sport','','','','','','','',14,2,44,6,2,2,'MAJ6P1WL0JC232679','Used Car','2.0-L L-4 DOHC 16V','2','Medium Stone','BLK','5','4',NULL,NULL,'35,100',2018,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust::','3.jpg','19995.00','19995.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 13.60 gallons</li>\r\n	<li>City Mileage : 23 miles/gallon</li>\r\n	<li>Highway Mileage : 29 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 205/50r17</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 161.30 In.</li>\r\n	<li>Overall Width : 69.50 In.</li>\r\n	<li>Overall Height : 65.10 In.</li>\r\n	<li>Wheelbase : 99.20 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 161.30 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 39.60 In.</li>\r\n	<li>Rear Headroom : 37.50 In.</li>\r\n	<li>Front Legroom : 42.90 In.</li>\r\n	<li>Rear Legroom : 36.70 In.</li>\r\n	<li>Front Shoulder Room : 53.30 In.</li>\r\n	<li>Rear Shoulder Room : 51.30 In.</li>\r\n	<li>Front Hip Room : 51.60 In.</li>\r\n	<li>Rear Hip Room : 50.90 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',120,1),
(106,'Civic hatchback','','','','','','','',9,6,8,6,1,7,'SHHFK7H81KU215297','Used Car','2.0-L L-4 DOHC 16V Turbo','2','Charcoal Grey','BLK','5','4',NULL,NULL,'31 miles/gallon',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust::','3.jpg','24995.00','24995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 12.40 gallons</li>\r\n	<li>City Mileage : 31 miles/gallon</li>\r\n	<li>Highway Mileage : 40 miles/gallon</li>\r\n	<li>Engine : 2.0-L L-4 DOHC 16V Turbo</li>\r\n	<li>Engine Size : 2</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual w/OD</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 215/50r H</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 177.90 In.</li>\r\n	<li>Overall Width : 70.80 In.</li>\r\n	<li>Overall Height : 56.50 In.</li>\r\n	<li>Wheelbase : 106.30 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 177.90 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Telescopic Steering Column</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 37.60 In.</li>\r\n	<li>Rear Headroom : 37.40 In.</li>\r\n	<li>Front Legroom : 42.30 In.</li>\r\n	<li>Rear Legroom : 36.00 In.</li>\r\n	<li>Front Shoulder Room : 56.90 In.</li>\r\n	<li>Rear Shoulder Room : 55.00 In.</li>\r\n	<li>Front Hip Room : 53.70 In.</li>\r\n	<li>Rear Hip Room : 48.80 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',117,1),
(126,'Chrysler Pacifica','','','','','','','',11,12,23,9,2,2,'2C4RC1GG2HR504090','Rentals','3.6-L V-6 DOHC 24V','3.6','Gray',NULL,'7','4',NULL,NULL,'18 miles/gallon',2017,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust:60 Months: 100,000 miles','3.jpg','160.00','160.00',6,'<ul>\r\n	<li>Fuel Type: Regular Unleaded</li>\r\n	<li>Fuel Capacity: 19.00 gallons</li>\r\n	<li>City Mileage : 18 miles/gallon</li>\r\n	<li>Highway Mileage : 28 miles/gallon</li>\r\n	<li>Engine : 3.6-L V-6 DOHC 24V</li>\r\n	<li>Engine Size : 3.6</li>\r\n	<li>Engine Cylinders : 6</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 9</li>\r\n	<li>Driven Wheels : Regular Unleaded</li>\r\n	<li>Transmission Gears : 9</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 235/60r18</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 7</li>\r\n	<li>Cargo Volume : 32.30 Cu.ft.</li>\r\n	<li>Maximum Towing : 3600 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n	<li>High Intensity Discharge Headlights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 4330 Lbs</li>\r\n	<li>Overall Length : 203.60 In.</li>\r\n	<li>Overall Width : 79.60 In.</li>\r\n	<li>Overall Height : 69.90 In.</li>\r\n	<li>Wheelbase : 121.60 In.</li>\r\n	<li>Ground Clearance : 5.10 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 203.60 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Electrochromic Interior Rearview Mirror</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 38.40 In.</li>\r\n	<li>Rear Headroom : 38.40 In.</li>\r\n	<li>Front Legroom : 41.10 In.</li>\r\n	<li>Rear Legroom : 39.00 In.</li>\r\n	<li>Front Shoulder Room : 63.80 In.</li>\r\n	<li>Rear Shoulder Room : 63.00 In.</li>\r\n	<li>Front Hip Room : 59.00 In.</li>\r\n	<li>Rear Hip Room : 64.80 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Driver Multi-Adjustable Power Seat</li>\r\n	<li>Front Heated Seat</li>\r\n	<li>Front Power Lumbar Support</li>\r\n	<li>Passenger Multi-Adjustable Power Seat</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Area Tiedowns</li>\r\n</ul>\r\n\r\n<p>Climate Control</p>\r\n\r\n<ul>\r\n	<li>Air Conditioning</li>\r\n	<li>Separate Driver/Front Passenger Climate Controls</li>\r\n</ul>\r\n\r\n<p>Roof</p>\r\n\r\n<ul>\r\n	<li>Power Sunroof</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>Voice Activated Telephone</li>\r\n	<li>Navigation Aid</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n	<li>Vehicle Anti-Theft</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless StartCH</li>\r\n</ul>\r\n',3,1),
(128,'Hyundai Elantra Sedan','','','','','','','',0,8,30,3,3,2,'KMHLL4AG0MU187192','Used Car','4 Cylinder Engine','4 Cylinder Engine','CEM','BROWN','5',NULL,NULL,'24933','15020',2021,NULL,'3.jpg','26995.00','26995.00',6,NULL,NULL,NULL,NULL,NULL,49,1),
(129,'Jeep Renegade','','','','','','','',2,1,35,1,4,1,'ZACCJBBT9GPC59006','Used Car','1.4-L L-4 DOHC 16V Turbo','1.4','Orange','Granite Crystal Metallic Clear Coat,Jetset Blue,Mojave Sand,Colorado Red,Solar Yellow,Black,Glacier ','5','4',NULL,NULL,'24 miles/gallon',2016,'Basic:: \r\nPowertrain:: \r\nRust::','3.jpg','14995.00','14995.00',6,'<ul>\r\n	<li>Fuel Type: Premium</li>\r\n	<li>Fuel Capacity: 12.70 gallons</li>\r\n	<li>City Mileage : 24 miles/gallon</li>\r\n	<li>Highway Mileage : 31 miles/gallon</li>\r\n	<li>Engine : 1.4-L L-4 DOHC 16V Turbo</li>\r\n	<li>Engine Size : 1.4</li>\r\n	<li>Engine Cylinders : 4</li>\r\n	<li>Transmission Type : Manual</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Driven Wheels : Premium</li>\r\n	<li>Transmission Gears : 6</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n	<li>Traction Control</li>\r\n	<li>Vehicle Stability Control System</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : IND</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Coil</li>\r\n	<li>Tires : 215/65r16</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 5</li>\r\n	<li>Cargo Volume : 18.50 Cu.ft.</li>\r\n	<li>Maximum Towing : 2000 Lbs</li>\r\n</ul>\r\n','<p>Exterior Lighting</p>\r\n\r\n<ul>\r\n	<li>Daytime Running Lights</li>\r\n	<li>Fog Lights</li>\r\n</ul>\r\n\r\n<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Alloy Wheels</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Curb Weight-automatic : 3183 Lbs</li>\r\n	<li>Overall Length : 166.60 In.</li>\r\n	<li>Overall Width : 74.20 In.</li>\r\n	<li>Overall Height : 66.50 In.</li>\r\n	<li>Wheelbase : 101.20 In.</li>\r\n	<li>Ground Clearance : 7.90 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 166.60 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n	<li>Interval Wipers</li>\r\n	<li>Rear Window Defogger</li>\r\n</ul>\r\n','<p>Interior Features</p>\r\n\r\n<ul>\r\n	<li>Cruise Control</li>\r\n	<li>Tachometer</li>\r\n	<li>Leather Steering Wheel</li>\r\n	<li>Steering Wheel Mounted Controls</li>\r\n	<li>Telescopic Steering Column</li>\r\n	<li>Adjustable Foot Pedals</li>\r\n	<li>Tire Pressure Monitor</li>\r\n	<li>Trip Computer</li>\r\n</ul>\r\n\r\n<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 41.10 In.</li>\r\n	<li>Rear Headroom : 40.50 In.</li>\r\n	<li>Front Legroom : 41.20 In.</li>\r\n	<li>Rear Legroom : 35.10 In.</li>\r\n	<li>Front Shoulder Room : 55.90 In.</li>\r\n	<li>Rear Shoulder Room : 55.10 In.</li>\r\n	<li>Front Hip Room : 53.10 In.</li>\r\n	<li>Rear Hip Room : 51.90 In.</li>\r\n</ul>\r\n\r\n<p>Storage</p>\r\n\r\n<ul>\r\n	<li>Cargo Area Tiedowns</li>\r\n</ul>\r\n','<p>Entertainment, Communication &amp; Navigation</p>\r\n\r\n<ul>\r\n	<li>AM/FM Radio</li>\r\n	<li>Voice Activated Telephone</li>\r\n	<li>Subwoofer</li>\r\n</ul>\r\n','<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Remote Controls &amp; Release</p>\r\n\r\n<ul>\r\n	<li>Keyless Entry</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n	<li>Power Door Locks</li>\r\n</ul>\r\n',93,1),
(130,'Mitsubishi Outlander','','','','','','','',0,13,25,0,0,0,'JA4J3TA82NZ017283','Used Car',NULL,NULL,'Charcoal Gray',NULL,NULL,NULL,NULL,NULL,NULL,2022,NULL,'3.jpg','35995.00','35995.00',6,NULL,NULL,NULL,NULL,NULL,21,1),
(131,'KIA RIO','','','','','','','',0,7,11,0,0,0,'3KPA24AB2JE076138','Used Car',NULL,NULL,'White','BLK',NULL,NULL,NULL,NULL,'58395',2018,NULL,'3.jpg','14995.00','14995.00',6,NULL,NULL,NULL,NULL,NULL,126,1),
(132,'RAM WARLOCK','','','','','','','',16,14,41,2,1,2,'1C6RR7LT8KS696651','Used Car','3.6-L V-6 DOHC 24V FFV','3.6','Blue','BLK','6','4',NULL,NULL,'27664',2019,'Basic:36 Months: 36,000 miles\r\nPowertrain:60 Months: 60,000 miles\r\nRust::','3.jpg','36995.00','36995.00',6,'<ul>\r\n	<li>Fuel Type: Regular</li>\r\n	<li>Fuel Capacity: 26.00 gallons</li>\r\n	<li>City Mileage : 16 miles/gallon</li>\r\n	<li>Highway Mileage : 23 miles/gallon</li>\r\n	<li>Engine : 3.6-L V-6 DOHC 24V FFV</li>\r\n	<li>Engine Size : 3.6</li>\r\n	<li>Engine Cylinders : 6</li>\r\n	<li>Transmission Type : Automatic</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Driven Wheels : Regular</li>\r\n	<li>Transmission Gears : 8</li>\r\n	<li>Anti-Braking System : 4-Wheel ABS</li>\r\n	<li>Steering Type : Rack &amp; Pinion</li>\r\n</ul>\r\n\r\n<p>Braking &amp; Traction</p>\r\n\r\n<ul>\r\n	<li>ABS Brakes</li>\r\n</ul>\r\n\r\n<p>Chasis</p>\r\n\r\n<ul>\r\n	<li>Anti-Brake System : 4-Wheel ABS</li>\r\n	<li>Steering Type : R&amp;P</li>\r\n	<li>Front Brake Type : Disc</li>\r\n	<li>Rear Brake Type : Disc</li>\r\n	<li>Front Suspension : IND</li>\r\n	<li>Rear Suspension : Live</li>\r\n	<li>Front Spring Type : Coil</li>\r\n	<li>Rear Spring Type : Leaf</li>\r\n	<li>Tires : P265/70r17</li>\r\n	<li>Run Flat Tires : Std.</li>\r\n</ul>\r\n\r\n<p>Capacities</p>\r\n\r\n<ul>\r\n	<li>Standard Seating : 6</li>\r\n</ul>\r\n','<p>Tires &amp; Wheels</p>\r\n\r\n<ul>\r\n	<li>Run Flat Tires</li>\r\n</ul>\r\n\r\n<p>Exterior Dimensions &amp; Weight</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 229.00 In.</li>\r\n	<li>Overall Width : 79.40 In.</li>\r\n	<li>Overall Height : 77.50 In.</li>\r\n	<li>Wheelbase : 140.50 In.</li>\r\n</ul>\r\n\r\n<p>Cargo Bed Dimensions</p>\r\n\r\n<ul>\r\n	<li>Overall Length : 229.00 In.</li>\r\n</ul>\r\n\r\n<p>Mirrors &amp; Windows &amp; Wipers</p>\r\n\r\n<ul>\r\n	<li>Power Windows</li>\r\n</ul>\r\n','<p>Interior Dimensions</p>\r\n\r\n<ul>\r\n	<li>Front Headroom : 41.00 In.</li>\r\n	<li>Rear Headroom : 39.90 In.</li>\r\n	<li>Front Legroom : 41.00 In.</li>\r\n	<li>Rear Legroom : 40.30 In.</li>\r\n	<li>Front Shoulder Room : 66.00 In.</li>\r\n	<li>Rear Shoulder Room : 65.70 In.</li>\r\n	<li>Front Hip Room : 63.20 In.</li>\r\n	<li>Rear Hip Room : 63.20 In.</li>\r\n</ul>\r\n\r\n<p>Seat</p>\r\n\r\n<ul>\r\n	<li>Front Split Bench Seat</li>\r\n</ul>\r\n',NULL,'<p>Safety</p>\r\n\r\n<ul>\r\n	<li>Driver Airbag</li>\r\n	<li>Front Side Airbag</li>\r\n	<li>Passenger Airbag</li>\r\n	<li>Side Head Curtain Airbag</li>\r\n</ul>\r\n\r\n<p>Anti-Theft &amp; Locks</p>\r\n\r\n<ul>\r\n	<li>Child Safety Door Locks</li>\r\n</ul>\r\n\r\n<p>Convenience &amp; Comfort</p>\r\n\r\n<ul>\r\n	<li>Keyless Start</li>\r\n</ul>\r\n',121,1),
(133,'Civic Coupe','','','','','','','',0,6,8,5,0,0,'2HGFC4A58JH309541','Used Car',NULL,NULL,'Gray',NULL,NULL,NULL,NULL,NULL,NULL,2018,NULL,'3.jpg','19995.00','19995.00',6,NULL,NULL,NULL,NULL,NULL,72,1),
(134,'Mazda 3','','','','','','','',0,9,43,0,0,1,'JM1BL1TF7D1765096','Used Car',NULL,NULL,'SILVER','BLK',NULL,'4',NULL,NULL,'77,982',2013,NULL,'3.jpg','8995.00','8995.00',6,NULL,NULL,NULL,NULL,NULL,124,1);

/*Table structure for table `tbl_car_category` */

DROP TABLE IF EXISTS `tbl_car_category`;

CREATE TABLE `tbl_car_category` (
  `car_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`car_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car_category` */

insert  into `tbl_car_category`(`car_category_id`,`car_category_name`) values 
(1,'Standard Sport Utility Vehicle Medium Truck'),
(2,'Standard Sport Utility Vehicle'),
(3,'Standard Pickup Truck'),
(4,'Minicompact Car'),
(5,'Large Car'),
(6,'Cargo Van'),
(7,'Small Station Wagon'),
(8,'Compact Car'),
(9,'Mid-Size Car'),
(10,'Heavy Truck'),
(11,'Minivan'),
(12,'Mid-Size Station Wagon'),
(13,'Small Sport Utility Vehicle 4WD'),
(14,'Small Sport Utility Vehicle'),
(15,'Subcompact Car'),
(16,'Medium Truck');

/*Table structure for table `tbl_car_photo` */

DROP TABLE IF EXISTS `tbl_car_photo`;

CREATE TABLE `tbl_car_photo` (
  `car_photo_id` int(11) NOT NULL AUTO_INCREMENT,
  `photo` varchar(255) NOT NULL,
  `car_id` int(11) NOT NULL,
  PRIMARY KEY (`car_photo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2919 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_car_photo` */

insert  into `tbl_car_photo`(`car_photo_id`,`photo`,`car_id`) values 
(1202,'54.jpg',27),
(1203,'54.jpg',27),
(1204,'54.jpg',27),
(1205,'54.jpg',27),
(1206,'54.jpg',27),
(1207,'54.jpg',27),
(1208,'54.jpg',27),
(1209,'54.jpg',27),
(1210,'54.jpg',27),
(1211,'54.jpg',31),
(1212,'54.jpg',31),
(1213,'54.jpg',31),
(1214,'54.jpg',31),
(1215,'54.jpg',31),
(1216,'54.jpg',31),
(1217,'54.jpg',31),
(1218,'54.jpg',31),
(2724,'54.jpg',1),
(2725,'54.jpg',1),
(2726,'54.jpg',1),
(2727,'54.jpg',1),
(2728,'54.jpg',1),
(2734,'54.jpg',2),
(2735,'54.jpg',2),
(2736,'54.jpg',2),
(2737,'54.jpg',2),
(2738,'54.jpg',2),
(2739,'54.jpg',2),
(2740,'54.jpg',2),
(2741,'54.jpg',2),
(2742,'54.jpg',4),
(2743,'54.jpg',4),
(2744,'54.jpg',4),
(2745,'54.jpg',4),
(2746,'54.jpg',4),
(2747,'54.jpg',100),
(2748,'54.jpg',100),
(2749,'54.jpg',100),
(2750,'54.jpg',5),
(2751,'54.jpg',5),
(2752,'54.jpg',5),
(2753,'54.jpg',5),
(2754,'54.jpg',5),
(2756,'54.jpg',101),
(2757,'54.jpg',101),
(2758,'54.jpg',101),
(2759,'54.jpg',101),
(2760,'54.jpg',101),
(2761,'54.jpg',9),
(2762,'54.jpg',9),
(2763,'54.jpg',9),
(2764,'54.jpg',9),
(2765,'54.jpg',10),
(2766,'54.jpg',10),
(2767,'54.jpg',10),
(2768,'54.jpg',10),
(2769,'54.jpg',10),
(2770,'54.jpg',11),
(2771,'54.jpg',11),
(2772,'54.jpg',11),
(2773,'54.jpg',11),
(2774,'54.jpg',12),
(2775,'54.jpg',12),
(2776,'54.jpg',13),
(2777,'54.jpg',13),
(2778,'54.jpg',13),
(2779,'54.jpg',13),
(2780,'54.jpg',13),
(2781,'54.jpg',13),
(2782,'54.jpg',14),
(2783,'54.jpg',14),
(2784,'54.jpg',14),
(2785,'54.jpg',14),
(2786,'54.jpg',14),
(2787,'54.jpg',14),
(2788,'54.jpg',18),
(2789,'54.jpg',18),
(2790,'54.jpg',18),
(2791,'54.jpg',18),
(2792,'54.jpg',18),
(2793,'54.jpg',19),
(2794,'54.jpg',19),
(2795,'54.jpg',19),
(2796,'54.jpg',19),
(2797,'54.jpg',19),
(2798,'54.jpg',19),
(2799,'54.jpg',19),
(2800,'54.jpg',19),
(2801,'54.jpg',19),
(2802,'54.jpg',19),
(2803,'54.jpg',19),
(2804,'54.jpg',19),
(2805,'54.jpg',20),
(2806,'54.jpg',20),
(2807,'54.jpg',20),
(2808,'54.jpg',20),
(2809,'54.jpg',20),
(2810,'54.jpg',45),
(2811,'54.jpg',45),
(2812,'54.jpg',45),
(2813,'54.jpg',45),
(2814,'54.jpg',45),
(2815,'54.jpg',21),
(2816,'54.jpg',21),
(2817,'54.jpg',21),
(2818,'54.jpg',21),
(2819,'54.jpg',21),
(2820,'54.jpg',21),
(2821,'54.jpg',22),
(2822,'54.jpg',22),
(2823,'54.jpg',22),
(2824,'54.jpg',22),
(2825,'54.jpg',22),
(2830,'54.jpg',29),
(2831,'54.jpg',29),
(2832,'54.jpg',29),
(2833,'54.jpg',29),
(2834,'54.jpg',29),
(2839,'54.jpg',44),
(2840,'54.jpg',44),
(2841,'54.jpg',44),
(2842,'54.jpg',44),
(2843,'54.jpg',44),
(2844,'54.jpg',33),
(2845,'54.jpg',33),
(2846,'54.jpg',33),
(2847,'54.jpg',33),
(2848,'54.jpg',33),
(2849,'54.jpg',34),
(2850,'54.jpg',34),
(2851,'54.jpg',34),
(2852,'54.jpg',34),
(2853,'54.jpg',34),
(2854,'54.jpg',34),
(2855,'54.jpg',34),
(2856,'54.jpg',34),
(2857,'54.jpg',35),
(2858,'54.jpg',35),
(2859,'54.jpg',35),
(2860,'54.jpg',35),
(2861,'54.jpg',128),
(2862,'54.jpg',128),
(2863,'54.jpg',128),
(2864,'54.jpg',128),
(2865,'54.jpg',128),
(2866,'54.jpg',128),
(2867,'54.jpg',37),
(2868,'54.jpg',37),
(2869,'54.jpg',37),
(2870,'54.jpg',37),
(2871,'54.jpg',38),
(2872,'54.jpg',38),
(2873,'54.jpg',38),
(2874,'54.jpg',38),
(2875,'54.jpg',39),
(2876,'54.jpg',39),
(2877,'54.jpg',39),
(2878,'54.jpg',39),
(2879,'54.jpg',39),
(2880,'54.jpg',39),
(2881,'54.jpg',39),
(2882,'54.jpg',39),
(2883,'54.jpg',41),
(2884,'54.jpg',41),
(2885,'54.jpg',47),
(2886,'54.jpg',47),
(2887,'54.jpg',47),
(2888,'54.jpg',47),
(2889,'54.jpg',47),
(2890,'54.jpg',47),
(2891,'54.jpg',28),
(2892,'54.jpg',28),
(2893,'54.jpg',28),
(2894,'54.jpg',28),
(2895,'54.jpg',130),
(2896,'54.jpg',130),
(2897,'54.jpg',130),
(2898,'54.jpg',130),
(2899,'54.jpg',17),
(2900,'54.jpg',17),
(2901,'54.jpg',17),
(2902,'54.jpg',17),
(2903,'54.jpg',17),
(2904,'54.jpg',17),
(2905,'54.jpg',17),
(2906,'54.jpg',17),
(2907,'54.jpg',17),
(2908,'54.jpg',17),
(2909,'54.jpg',132),
(2910,'54.jpg',132),
(2911,'54.jpg',132),
(2912,'54.jpg',132),
(2913,'54.jpg',132),
(2914,'54.jpg',133),
(2915,'54.jpg',134),
(2916,'54.jpg',134),
(2917,'54.jpg',134),
(2918,'54.jpg',134);

/*Table structure for table `tbl_category` */

DROP TABLE IF EXISTS `tbl_category`;

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_category` */

/*Table structure for table `tbl_comment` */

DROP TABLE IF EXISTS `tbl_comment`;

CREATE TABLE `tbl_comment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_body` text NOT NULL,
  `code_main` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_comment` */

insert  into `tbl_comment`(`id`,`code_body`,`code_main`) values 
(1,'<div id=\"fb-root\"></div>\r\n<script>(function(d, s, id) {\r\n  var js, fjs = d.getElementsByTagName(s)[0];\r\n  if (d.getElementById(id)) return;\r\n  js = d.createElement(s); js.id = id;\r\n  js.src = \"//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10&appId=323620764400430\";\r\n  fjs.parentNode.insertBefore(js, fjs);\r\n}(document, \'script\', \'facebook-jssdk\'));</script>','<div class=\"fb-comments\" data-href=\"https://developers.facebook.com/docs/plugins/comments#configurator\" data-numposts=\"5\"></div>');

/*Table structure for table `tbl_faq` */

DROP TABLE IF EXISTS `tbl_faq`;

CREATE TABLE `tbl_faq` (
  `faq_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_title` varchar(255) NOT NULL,
  `faq_content` text NOT NULL,
  `faq_category_id` int(11) NOT NULL,
  PRIMARY KEY (`faq_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_faq` */

insert  into `tbl_faq`(`faq_id`,`faq_title`,`faq_content`,`faq_category_id`) values 
(1,'Question Title 1','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',1),
(2,'Question Title 2','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',1),
(3,'Question Title 3','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(4,'Question Title 4','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(5,'Question Title 5','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',2),
(6,'Question Title 6','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3),
(7,'Question Title 7','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3),
(8,'Question Title 8','<p>Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit. Sea ad audire utamur. Ut mei ridens minimum intellegat, perpetua euripidis te qui, ad consul intellegebat comprehensam eum.</p>\r\n',3);

/*Table structure for table `tbl_faq_category` */

DROP TABLE IF EXISTS `tbl_faq_category`;

CREATE TABLE `tbl_faq_category` (
  `faq_category_id` int(11) NOT NULL AUTO_INCREMENT,
  `faq_category_name` varchar(255) NOT NULL,
  PRIMARY KEY (`faq_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_faq_category` */

insert  into `tbl_faq_category`(`faq_category_id`,`faq_category_name`) values 
(1,'General Questions'),
(2,'Client Query'),
(3,'Technical Questions');

/*Table structure for table `tbl_file` */

DROP TABLE IF EXISTS `tbl_file`;

CREATE TABLE `tbl_file` (
  `file_id` int(11) NOT NULL AUTO_INCREMENT,
  `file_title` varchar(255) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  PRIMARY KEY (`file_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `tbl_file` */

/*Table structure for table `tbl_fuel_type` */

DROP TABLE IF EXISTS `tbl_fuel_type`;

CREATE TABLE `tbl_fuel_type` (
  `fuel_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `fuel_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`fuel_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_fuel_type` */

insert  into `tbl_fuel_type`(`fuel_type_id`,`fuel_type_name`) values 
(1,'Regular'),
(2,'Regular Unleaded'),
(3,'Gasoline'),
(4,'Premium');

/*Table structure for table `tbl_menu` */

DROP TABLE IF EXISTS `tbl_menu`;

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_type` varchar(255) NOT NULL,
  `menu_name` varchar(255) NOT NULL,
  `category_or_page_slug` varchar(255) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `menu_parent` int(11) NOT NULL,
  `menu_url` varchar(255) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_menu` */

insert  into `tbl_menu`(`menu_id`,`menu_type`,`menu_name`,`category_or_page_slug`,`menu_order`,`menu_parent`,`menu_url`) values 
(17,'Other','Home','',1,0,'https://rapidoapps.com/clients/auto1/rentals/'),
(36,'Page','Contact Us','contact-us',8,0,''),
(38,'Page','Testimonial','testimonial',5,0,''),
(41,'Page','New Car','new-car',1,40,''),
(42,'Page','Old Car','old-car',2,40,''),
(45,'Page','Rentals','rentals',4,0,''),
(47,'Page','Inventory','old-car-1',3,0,'');

/*Table structure for table `tbl_model` */

DROP TABLE IF EXISTS `tbl_model`;

CREATE TABLE `tbl_model` (
  `model_id` int(11) NOT NULL AUTO_INCREMENT,
  `model_name` varchar(255) NOT NULL,
  `brand_id` int(11) NOT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_model` */

insert  into `tbl_model`(`model_id`,`model_name`,`brand_id`) values 
(1,'wrangler',1),
(2,'escape',2),
(3,'f-150',2),
(4,'sonic',3),
(5,'altima',4),
(6,'charger',5),
(7,'grand caravan',5),
(8,'civic',6),
(9,'bronco sport',2),
(10,'fit',6),
(11,'rio',7),
(12,'rio5',7),
(13,'accent',8),
(14,'forte',7),
(15,'mazda2',9),
(16,'yaris',10),
(17,'sentra',4),
(18,'kicks',4),
(19,'tacoma',10),
(20,'jetta',11),
(21,'highlander',10),
(22,'tacoma 2wd',10),
(23,'pacifica',12),
(24,'outlander sport',13),
(25,'outlander',13),
(26,'compass',1),
(27,'rogue',4),
(28,'c-hr',10),
(29,'tucson',8),
(30,'elantra',8),
(31,'venue',8),
(32,'seltos',7),
(33,'mirage',13),
(34,'mirage g4',13),
(35,'renegade',1),
(36,'armada',4),
(37,'sonata',8),
(38,'ch-r',10),
(39,'hr-v',6),
(40,'yaris ia',10),
(41,'1500 classic',14),
(42,'accord',6),
(43,'3',9),
(44,'ecosport',2);

/*Table structure for table `tbl_news` */

DROP TABLE IF EXISTS `tbl_news`;

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL AUTO_INCREMENT,
  `news_title` varchar(255) NOT NULL,
  `news_slug` varchar(255) NOT NULL,
  `news_content` text NOT NULL,
  `news_date` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `publisher` varchar(255) NOT NULL,
  `total_view` int(11) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`news_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_news` */

insert  into `tbl_news`(`news_id`,`news_title`,`news_slug`,`news_content`,`news_date`,`photo`,`category_id`,`publisher`,`total_view`,`meta_title`,`meta_keyword`,`meta_description`) values 
(1,'Cu vel choro exerci pri et oratio iisque','cu-vel-choro-exerci-pri-et-oratio-iisque','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-1.jpg',3,'John Doe',15,'Cu vel choro exerci pri et oratio iisque','',''),
(2,'Epicurei necessitatibus eu facilisi postulant ','epicurei-necessitatibus-eu-facilisi-postulant-','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-2.jpg',3,'John Doe',6,'Epicurei necessitatibus eu facilisi postulant ','',''),
(3,'Mei ut errem legimus periculis eos liber','mei-ut-errem-legimus-periculis-eos-liber','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-3.jpg',3,'John Doe',1,'Mei ut errem legimus periculis eos liber','',''),
(4,'Id pro unum pertinax oportere vel','id-pro-unum-pertinax-oportere-vel','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-4.jpg',4,'John Doe',0,'Id pro unum pertinax oportere vel','',''),
(5,'Tollit cetero cu usu etiam evertitur','tollit-cetero-cu-usu-etiam-evertitur','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-5.jpg',4,'John Doe',23,'Tollit cetero cu usu etiam evertitur','',''),
(6,'Omnes ornatus qui et te aeterno','omnes-ornatus-qui-et-te-aeterno','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-6.jpg',4,'John Doe',2,'Omnes ornatus qui et te aeterno','',''),
(7,'Vix tale noluisse voluptua ad ne','vix-tale-noluisse-voluptua-ad-ne','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-7.jpg',2,'John Doe',0,'Vix tale noluisse voluptua ad ne','',''),
(8,'Liber utroque vim an ne his brute','liber-utroque-vim-an-ne-his-brute','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-8.jpg',2,'John Doe',12,'Liber utroque vim an ne his brute','',''),
(9,'Nostrum copiosae argumentum has','nostrum-copiosae-argumentum-has','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-9.jpg',1,'John Doe',12,'Nostrum copiosae argumentum has','',''),
(10,'An labores explicari qui eu','an-labores-explicari-qui-eu','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-10.jpg',1,'John Doe',4,'An labores explicari qui eu','',''),
(11,'Lorem ipsum dolor sit amet','lorem-ipsum-dolor-sit-amet','<p>Lorem ipsum dolor sit amet, qui case probo velit no, an postea scaevola partiendo mei. Id mea fuisset perpetua referrentur. Ut everti ceteros mei, alii discere eum no, duo id malis iuvaret. Ad sint everti accusam vel, ea viderer suscipiantur pri. Brute option minimum in cum, ignota iuvaret an pro.</p>\r\n\r\n<p>Solum atqui intellegebat mea an. Ne ius alterum aliquam. Ea nec populo aliquid mentitum, vis in meliore atomorum, sanctus consequat vituperatoribus duo ea. Ad doctus pertinacia ius, virtute fuisset id has, eum ut modo principes. Qui eu labore adversarium, oporteat delicata qui ut, an qui meliore principes. Id aliquid dolorum nam.</p>\r\n\r\n<p>Reque pericula philosophia ut mei, volumus eligendi mandamus has an. In nobis consulatu pri, has at timeam scaevola, has simul quaeque et. Te nec sale accumsan. Dolorem prodesset efficiendi sea ea.</p>\r\n\r\n<p>Et habeo modus debitis pri, vel quis fierent albucius ne. Ea animal meliore usu, nec etiam dolorum atomorum at, nam in audire mandamus omittantur. Cu ius dicam officiis molestiae, mea volumus officiis cotidieque no. Ut vel possim interpretaris, idque probatus antiopam has ad. Facilisi qualisque te sea, no dolorum mnesarchum usu.</p>\r\n\r\n<p>Eum tota graeci impetus an, eirmod invenire rationibus ne mel. Ignota habemus eum ex, vis omnesque delicata perpetua an. Sit id modo invidunt sapientem, ne eum vocibus dolores phaedrum. Case praesent appellantur eu per.</p>\r\n','05-09-2017','news-11.jpg',1,'John Doe',18,'Lorem ipsum dolor sit amet','','');

/*Table structure for table `tbl_page` */

DROP TABLE IF EXISTS `tbl_page`;

CREATE TABLE `tbl_page` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_name` varchar(255) NOT NULL,
  `page_slug` varchar(255) NOT NULL,
  `page_content` text NOT NULL,
  `page_layout` varchar(255) NOT NULL,
  `banner` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_page` */

insert  into `tbl_page`(`page_id`,`page_name`,`page_slug`,`page_content`,`page_layout`,`banner`,`status`,`meta_title`,`meta_keyword`,`meta_description`) values 
(1,'About Us','about-us','<p>Lorem ipsum dolor sit amet, at pro eleifend vulputate, vim movet regione ad. Has veritus adipisci aliquando eu, fugit eripuit dignissim per ea, sanctus omittam assueverit his ex. Nulla affert vix in, ei sea dolore dolores vivendum. Vix eros postea an, ius suas ubique habemus an, wisi nulla ex mel. Saepe postulant concludaturque at has. Exerci tincidunt interesset ne per, pro bonorum utroque appetere ad.</p>\r\n\r\n<p>Est ea corpora deserunt cotidieque, quo te vero melius assentior, pri ex velit altera iuvaret. Tibique hendrerit voluptaria ad quo. Ut appetere reprimique qui, aliquip suscipiantur ex eos. Nibh vero nusquam his eu, agam summo democritum mea ne. Ius in novum scripta, atqui appetere efficiantur an vel, ex probo modus temporibus nam.</p>\r\n\r\n<p>Ea feugiat nominavi quo, debet gubergren elaboraret at cum, mel timeam vivendo mentitum cu. Aeque civibus luptatum cu eos. Novum facilisi insolens his et, ex aliquip tibique laboramus vim. Vix brute appellantur ei.</p>\r\n\r\n<p>Nec eros viderer ne, mel ad suas offendit suavitate, te pri laoreet legendos hendrerit. Per ut paulo urbanitas mediocritatem, in sea facilisis imperdiet torquatos, ea vis soleat fierent pertinacia. Maiestatis reprimique no est, ut ius esse tation. Nam animal discere omnesque at. Evertitur adipiscing vis ei, his ut luptatum recteque, et idque mundi vim.</p>\r\n\r\n<p>Adhuc vocibus at mei, nulla altera eu vim. At sit quot ferri everti. Mea ea doming dictas possim. Te mea facete nominati constituam, no discere democritum has, ei nam eirmod vocent deserunt. Eu wisi voluptatibus mea, elit errem ad pro, vim quando denique id. Labitur accommodare eam at.</p>\r\n','Full Width Page Layout','page-banner-1.jpg','Active','About Us - Car Listing Website','',''),
(2,'Contact Us','contact-us','','Contact Us Page Layout','page-banner-2.jpg','Active','Contact Us  - Car Listing Website','',''),
(7,'FAQ','faq','','FAQ Page Layout','page-banner-7.jpg','Inactive','FAQ - Car Listing Website','',''),
(9,'Blog','blog','','Blog Page Layout','page-banner-9.jpg','Active','Blog - Car Listing Website','',''),
(11,'Testimonial','testimonial','','Testimonial Page Layout','page-banner-11.jpg','Active','Testimonial - CarListing Website','',''),
(12,'New Car','new-car','','New Car Page Layout','page-banner-12.jpg','Active','New Cars - CarListing Website','',''),
(13,'Old Car','old-car','','Old Car Page Layout','page-banner-13.jpg','Active','Old Cars - CarListing Website','',''),
(15,'Pricing','pricing','','Pricing Page Layout','page-banner-15.jpg','Inactive','Pricing - Car Listing Website','',''),
(17,'Rentals','rentals','','Rentals','page-banner-17.jpg','Active','','',''),
(18,'Inventory','old-car-1','','Old Car Page Layout','page-banner-18.png','Active','','','');

/*Table structure for table `tbl_payment` */

DROP TABLE IF EXISTS `tbl_payment`;

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_id` int(11) NOT NULL,
  `payment_date` varchar(20) NOT NULL,
  `expire_date` varchar(20) NOT NULL,
  `txnid` varchar(255) NOT NULL,
  `paid_amount` int(11) NOT NULL,
  `pricing_plan_id` int(11) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_payment` */

insert  into `tbl_payment`(`id`,`seller_id`,`payment_date`,`expire_date`,`txnid`,`paid_amount`,`pricing_plan_id`,`payment_status`,`payment_id`) values 
(1,10,'2017-12-17','2017-12-27','3VW96364K6934123M',10,1,'Completed','1513472506'),
(2,10,'2017-12-30','2018-01-09','74G405774B946000A',10,1,'Completed','1513476596'),
(3,10,'2017-12-01','2017-12-11','',10,1,'Pending','1513478974'),
(4,6,'2017-12-17','2017-12-27','',10,1,'Completed','1513483925'),
(5,6,'2017-12-17','2017-12-27','',10,1,'Completed','1513487335'),
(6,6,'2017-12-17','2017-12-27','1G785796W6728403S',10,1,'Completed','1513487537'),
(7,6,'2018-02-01','2018-02-11','',10,1,'Completed','1513679014'),
(8,6,'2022-09-04','2032-09-24','',20,2,'Completed','1662296370');

/*Table structure for table `tbl_pricing_plan` */

DROP TABLE IF EXISTS `tbl_pricing_plan`;

CREATE TABLE `tbl_pricing_plan` (
  `pricing_plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `pricing_plan_name` varchar(255) NOT NULL,
  `pricing_plan_price` varchar(20) NOT NULL,
  `pricing_plan_day` varchar(100) NOT NULL,
  `pricing_plan_item_allow` varchar(10) NOT NULL,
  `pricing_plan_description` text NOT NULL,
  PRIMARY KEY (`pricing_plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_pricing_plan` */

insert  into `tbl_pricing_plan`(`pricing_plan_id`,`pricing_plan_name`,`pricing_plan_price`,`pricing_plan_day`,`pricing_plan_item_allow`,`pricing_plan_description`) values 
(1,'Basic','10','10','20','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n'),
(2,'Gold','20','20','40','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n'),
(3,'Platinum','30','30','60','<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n\r\n<p>Lorem ipsum dolor sit amet</p>\r\n');

/*Table structure for table `tbl_seller` */

DROP TABLE IF EXISTS `tbl_seller`;

CREATE TABLE `tbl_seller` (
  `seller_id` int(11) NOT NULL AUTO_INCREMENT,
  `seller_name` varchar(100) NOT NULL,
  `seller_email` varchar(100) NOT NULL,
  `seller_phone` varchar(100) NOT NULL,
  `seller_address` text NOT NULL,
  `seller_city` varchar(255) NOT NULL,
  `seller_state` varchar(255) NOT NULL,
  `seller_country` varchar(255) NOT NULL,
  `seller_password` varchar(255) NOT NULL,
  `seller_token` varchar(255) NOT NULL,
  `seller_time` varchar(255) NOT NULL,
  `seller_access` int(11) NOT NULL,
  PRIMARY KEY (`seller_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_seller` */

insert  into `tbl_seller`(`seller_id`,`seller_name`,`seller_email`,`seller_phone`,`seller_address`,`seller_city`,`seller_state`,`seller_country`,`seller_password`,`seller_token`,`seller_time`,`seller_access`) values 
(6,'Patrick Smith','seller@gmail.com','770-507-2797','1965 Elk Creek Road','Stockbridge','GA','USA','81dc9bdb52d04dc20036dbd8313ed055','','',1),
(10,'Charles Saddler','per111@shop.com','770-507-2798','1965 Elk Creek Road','Stockbridge','GA','USA','c4ca4238a0b923820dcc509a6f75849b','','',1),
(11,'james bond','billisoft@gmail.com','9849049255','queens\r\nblvd','Select City','ny','India','81dc9bdb52d04dc20036dbd8313ed055','7e791fb0c8dcb1dd3cc59343a5cb783d','1662294704',0);

/*Table structure for table `tbl_settings` */

DROP TABLE IF EXISTS `tbl_settings`;

CREATE TABLE `tbl_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) NOT NULL,
  `favicon` varchar(255) NOT NULL,
  `footer_about` text NOT NULL,
  `footer_copyright` text NOT NULL,
  `contact_address` text NOT NULL,
  `contact_email` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `contact_fax` varchar(255) NOT NULL,
  `contact_map_iframe` text NOT NULL,
  `receive_email` varchar(255) NOT NULL,
  `receive_email_subject` varchar(255) NOT NULL,
  `receive_email_thank_you_message` text NOT NULL,
  `seller_email_subject` varchar(255) NOT NULL,
  `seller_email_thank_you_message` text NOT NULL,
  `forget_password_message` text NOT NULL,
  `total_recent_news_footer` int(10) NOT NULL,
  `total_popular_news_footer` int(10) NOT NULL,
  `total_recent_news_sidebar` int(11) NOT NULL,
  `total_popular_news_sidebar` int(11) NOT NULL,
  `total_recent_news_home_page` int(11) NOT NULL,
  `meta_title_home` text NOT NULL,
  `meta_keyword_home` text NOT NULL,
  `meta_description_home` text NOT NULL,
  `banner_login` varchar(255) NOT NULL,
  `banner_registration` varchar(255) NOT NULL,
  `banner_forget_password` varchar(255) NOT NULL,
  `banner_blog` varchar(255) NOT NULL,
  `banner_car` varchar(255) NOT NULL,
  `banner_search` varchar(255) NOT NULL,
  `search_title` varchar(255) NOT NULL,
  `search_photo` varchar(255) NOT NULL,
  `testimonial_photo` varchar(255) NOT NULL,
  `newsletter_text` text NOT NULL,
  `mod_rewrite` varchar(10) NOT NULL,
  `paypal_email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_settings` */

insert  into `tbl_settings`(`id`,`logo`,`favicon`,`footer_about`,`footer_copyright`,`contact_address`,`contact_email`,`contact_phone`,`contact_fax`,`contact_map_iframe`,`receive_email`,`receive_email_subject`,`receive_email_thank_you_message`,`seller_email_subject`,`seller_email_thank_you_message`,`forget_password_message`,`total_recent_news_footer`,`total_popular_news_footer`,`total_recent_news_sidebar`,`total_popular_news_sidebar`,`total_recent_news_home_page`,`meta_title_home`,`meta_keyword_home`,`meta_description_home`,`banner_login`,`banner_registration`,`banner_forget_password`,`banner_blog`,`banner_car`,`banner_search`,`search_title`,`search_photo`,`testimonial_photo`,`newsletter_text`,`mod_rewrite`,`paypal_email`) values 
(1,'logo.png','favicon.png','<p>Footer Sample about us</p>\r\n','Copyright © 2022 All Rights Reserved.','Test Address','info@rapidoapps.com','1234567889','1234567890','','info@ableittech.com','Visitor Email Message','Thank you for sending email. We will contact you shortly.','Car Website - Seller section message','Your message is successfully sent to the seller of this car.','A confirmation link is sent to your email address. You will get the password reset information in there.',3,3,4,4,7,'Company1','auto, automotive, car, cab, truck, car listing, car directory, car selling, finance, car business, inventory, car rent, old car, used car, new car','AutoMobiles','banner_login.jpg','banner_registration.jpg','banner_forget_password.jpg','banner_blog.jpg','banner_car.jpg','banner_search.jpg','Cars Directory','search.jpg','testimonial.png','Subscribete a nuestro Mailing List para que recibas las mejores Ofertas de Auto1','Off','info@ableittech.com');

/*Table structure for table `tbl_social` */

DROP TABLE IF EXISTS `tbl_social`;

CREATE TABLE `tbl_social` (
  `social_id` int(11) NOT NULL AUTO_INCREMENT,
  `social_name` varchar(30) NOT NULL,
  `social_url` varchar(255) NOT NULL,
  `social_icon` varchar(30) NOT NULL,
  PRIMARY KEY (`social_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_social` */

insert  into `tbl_social`(`social_id`,`social_name`,`social_url`,`social_icon`) values 
(1,'Facebook','https://www.facebook.com/auto1pr/','fa fa-facebook'),
(2,'Twitter','','fa fa-twitter'),
(3,'LinkedIn','','fa fa-linkedin'),
(4,'Google Plus','','fa fa-google-plus'),
(5,'Pinterest','','fa fa-pinterest'),
(6,'YouTube','https://www.youtube.com/channel/UC-v6iXQRge0IsY7la-2Txnw','fa fa-youtube'),
(7,'Instagram','','fa fa-instagram'),
(8,'Tumblr','','fa fa-tumblr'),
(9,'Flickr','','fa fa-flickr'),
(10,'Reddit','','fa fa-reddit'),
(11,'Snapchat','','fa fa-snapchat'),
(12,'WhatsApp','','fa fa-whatsapp'),
(13,'Quora','','fa fa-quora'),
(14,'StumbleUpon','','fa fa-stumbleupon'),
(15,'Delicious','','fa fa-delicious'),
(16,'Digg','','fa fa-digg');

/*Table structure for table `tbl_subscriber` */

DROP TABLE IF EXISTS `tbl_subscriber`;

CREATE TABLE `tbl_subscriber` (
  `subs_id` int(11) NOT NULL AUTO_INCREMENT,
  `subs_email` varchar(255) NOT NULL,
  `subs_date` varchar(100) NOT NULL,
  `subs_date_time` varchar(100) NOT NULL,
  `subs_hash` varchar(255) NOT NULL,
  `subs_active` int(11) NOT NULL,
  PRIMARY KEY (`subs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_subscriber` */

insert  into `tbl_subscriber`(`subs_id`,`subs_email`,`subs_date`,`subs_date_time`,`subs_hash`,`subs_active`) values 
(4,'jbbr.1990@gmail.com','2017-08-10','2017-08-10 07:44:23','',1);

/*Table structure for table `tbl_testimonial` */

DROP TABLE IF EXISTS `tbl_testimonial`;

CREATE TABLE `tbl_testimonial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_testimonial` */

insert  into `tbl_testimonial`(`id`,`name`,`designation`,`company`,`photo`,`comment`) values 
(1,'John Doe','Managing Director','ABC Inc.','testimonial-1.jpg','Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit.'),
(2,'Dadiv Smith','CEO','SS Multimedia','testimonial-2.jpg','Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit.'),
(3,'Stefen Carman','Chairman','GH Group','testimonial-3.jpg','Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit.'),
(4,'Gary Brent','CFO','XYZ It Solution','testimonial-4.jpg','Mei ut errem legimus periculis, eos liber epicurei necessitatibus eu, facilisi postulant vel no. Ad mea commune disputando, cu vel choro exerci. Pri et oratio iisque atomorum, enim detracto mei ne, id eos soleat iudicabit. Ne reque reformidans mei, rebum delicata consequuntur an sit.');

/*Table structure for table `tbl_transmission_type` */

DROP TABLE IF EXISTS `tbl_transmission_type`;

CREATE TABLE `tbl_transmission_type` (
  `transmission_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `transmission_type_name` varchar(255) NOT NULL,
  PRIMARY KEY (`transmission_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_transmission_type` */

insert  into `tbl_transmission_type`(`transmission_type_id`,`transmission_type_name`) values 
(1,'Manual'),
(2,'Automatic'),
(3,'CVT'),
(4,'CVT w/OD'),
(5,'Auto-Shift Manual w/OD'),
(6,'Continuously Variable Transmission CVT'),
(7,'Manual w/OD');

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

insert  into `tbl_user`(`id`,`full_name`,`email`,`phone`,`password`,`photo`,`role`,`status`) values 
(1,'John Doe','admin@gmail.com','0177777777','81dc9bdb52d04dc20036dbd8313ed055','user-1.jpg','Super Admin','Active');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
