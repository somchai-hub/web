/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.8.3-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	11.8.3-MariaDB-1+b1 from Debian

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

--
-- Table structure for table `attractions`
--

DROP TABLE IF EXISTS `attractions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `attractions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `phone_number` varchar(50) DEFAULT NULL,
  `map_link` text DEFAULT NULL,
  `price_range` varchar(50) DEFAULT NULL,
  `cover_image` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `attractions_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=68 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attractions`
--

LOCK TABLES `attractions` WRITE;
/*!40000 ALTER TABLE `attractions` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `attractions` VALUES
(1,'สถานีเกษตรหลวงอ่างขาง','โครงการหลวงแห่งแรกของไทย ชมดอกไม้เมืองหนาว ซากุระเมืองไทย (นางพญาเสือโคร่ง) และแปลงไร่ชาท่ามกลางหุบเขา อากาศเย็นตลอดปี','อ.ฝาง จ.เชียงใหม่','053-969-476','https://maps.app.goo.gl/AsAsXVC4JEbnnFgo6','50 บาท','angkhang.jpg',1,'2026-02-03 02:52:44'),
(2,'อุทยานแห่งชาติดอยผ้าห่มปก (บ่อน้ำพุร้อนฝาง)','บ่อน้ำพุร้อนธรรมชาติที่มีน้ำพุ่งสูง มีกิจกรรมต้มไข่ อาบน้ำแร่ และเส้นทางเดินศึกษาธรรมชาติ','อ.ฝาง จ.เชียงใหม่','084-483-4689','https://maps.app.goo.gl/QRMzDNDnXhcbAAoLA','50-100 บาท','fang_hotspring.jpg',1,'2026-02-03 02:52:44'),
(3,'วัดท่าตอน','วัดสวยที่ตั้งเรียงรายตามไหล่เขา มีเจดีย์แก้วแก้วเก้าชั้น สามารถมองเห็นวิวแม่น้ำกกและชุมชนแม่อายได้แบบพาโนรามา','อ.แม่อาย จ.เชียงใหม่','053-053-609','https://maps.app.goo.gl/19oJt5GJLNiHvx888','ฟรี','wat_thaton.jpg',2,'2026-02-03 02:52:44'),
(4,'สวนส้มธนาธร (สวน 8)','สวนส้มขนาดใหญ่ที่มีชื่อเสียง มีบริการรถรางชมสวน ทิวทัศน์สวยงามเหมาะกับการถ่ายรูป','อ.แม่อาย จ.เชียงใหม่','083-766-7447','https://maps.app.goo.gl/TH5Rt8tCQw4js9188','40 บาท','thanathon_orchard.jpg',1,'2026-02-03 02:52:44'),
(5,'ดอยปู่หมื่น','หมู่บ้านชาวลาหู่ แหล่งปลูกชาอัสสัมและกาแฟชั้นดี บรรยากาศเงียบสงบ สัมผัสวิถีชีวิตชนเผ่า','อ.แม่อาย จ.เชียงใหม่','-','https://maps.app.goo.gl/o7dv6ZeTGjtp7hNv8','ฟรี','doi_pu_muen.jpg',1,'2026-02-03 02:52:44'),
(6,'บ่อน้ำมันฝาง (ศูนย์การเรียนรู้ปิโตรเลียมภาคเหนือ)','แหล่งเรียนรู้เกี่ยวกับปิโตรเลียมแห่งแรกของไทย มีพิพิธภัณฑ์และบ่อน้ำมันดิบที่ยังใช้งานอยู่ บรรยากาศร่มรื่น เหมาะแก่การมาศึกษาหาความรู้','อ.ฝาง จ.เชียงใหม่','053-969-100','https://maps.app.goo.gl/hoJ36zUzPPRYeTWS9','ฟรี','fang_oil_field.jpg',1,'2026-02-04 02:22:34'),
(7,'น้ำตกโป่งน้ำดัง','น้ำตกสวยงามที่ตั้งอยู่ในอุทยานแห่งชาติดอยผ้าห่มปก น้ำใสไหลเย็นตลอดปี มีพื้นที่สำหรับกางเต็นท์และปิกนิก ท่ามกลางธรรมชาติที่อุดมสมบูรณ์','อ.ฝาง จ.เชียงใหม่','053-453-517','https://maps.app.goo.gl/bvg7UN8HkSnxeh619','50-100+ บาท','pong_nam_dang.jpg',1,'2026-02-04 02:22:34'),
(8,'วัดเจดีย์งาม','วัดเก่าแก่คู่บ้านคู่เมืองฝาง มีเจดีย์ทรงระฆังคว่ำศิลปะล้านนาผสมพม่าที่สวยงาม และวิหารไม้สักทองแกะสลักวิจิตรบรรจง','อ.ฝาง จ.เชียงใหม่','053-451-377','https://maps.app.goo.gl/s7S7g1kvNdjk2JUw8','ฟรี','wat_chedi_ngam.jpg',2,'2026-02-04 02:22:34'),
(9,'ไร่ชา 2000','จุดชมวิวไร่ชาขั้นบันไดที่สวยงามที่สุดแห่งหนึ่งบนดอยอ่างขาง โดยเฉพาะยามเช้าที่มีทะเลหมอกลอยคลอเคลียกับแปลงชา','ดอยอ่างขาง อ.ฝาง จ.เชียงใหม่','053-884-848','https://maps.app.goo.gl/FJzGKtTd6V4pwdSP6','ฟรี','tea_plantation_2000.jpg',1,'2026-02-04 02:22:34'),
(10,'ไร่สตรอเบอร์รี่บ้านนอแล','ชมแปลงสตรอเบอร์รี่ขั้นบันไดตามไหล่เขา พร้อมวิวทิวทัศน์แนวชายแดนไทย-พม่า ที่สวยงามแปลกตา','ดอยอ่างขาง อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/CfhEvbz1F95dHcrt9','ฟรี','nor_lae_strawberry.jpg',1,'2026-02-04 02:22:34'),
(11,'บ้านขอบด้ง','หมู่บ้านชาวเขาเผ่ามูเซอดำ สัมผัสวิถีชีวิตวัฒนธรรมดั้งเดิม และเลือกซื้อสินค้าหัตถกรรมพื้นบ้าน ของที่ระลึก','ดอยอ่างขาง อ.ฝาง จ.เชียงใหม่','081-173-0548','https://maps.app.goo.gl/XLaYrFFmnyndyz4q8','ฟรี','ban_khop_dong.jpg',1,'2026-02-04 02:22:34'),
(12,'ดอยสันจุ๊','จุดชมวิวและแหล่งดูนกที่สำคัญ มีนกหายากหลากหลายสายพันธุ์ อาศัยอยู่ท่ามกลางป่าดิบเขาที่สมบูรณ์','อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/5BM5sqX4XCoAmxz87','ฟรี','doi_san_ju.jpg',1,'2026-02-04 02:22:34'),
(13,'เขื่อนแม่มาว','อ่างเก็บน้ำขนาดใหญ่ที่โอบล้อมด้วยภูเขา บรรยากาศเงียบสงบ เหมาะแก่การพักผ่อนหย่อนใจและชมวิวพระอาทิตย์ตก','อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/npmiWNoHZdNZy3bHA','ฟรี','mae_mao_dam.jpg',1,'2026-02-04 02:22:34'),
(14,'วัดศรีบุญเรือง','วัดสวยสไตล์ล้านนาประยุกต์ มีอุโบสถที่งดงามและการตกแต่งภายในที่วิจิตรตระการตา เป็นที่เคารพศรัทธาของชาวฝาง','อ.ฝาง จ.เชียงใหม่','053-451-226','https://maps.app.goo.gl/hYjX4sMJRA7uem6R6','ฟรี','wat_si_bun_rueang.jpg',2,'2026-02-04 02:22:34'),
(15,'สวนร้อยใจรักษ์','สวนดอกไม้เมืองหนาวนานาพันธุ์ที่จัดตกแต่งอย่างสวยงาม มีมุมถ่ายรูปมากมายและร้านกาแฟบรรยากาศดี','อ.แม่อาย จ.เชียงใหม่','063-663-2966','https://maps.app.goo.gl/zwB9eCHfqe62ozoN9','50 บาท','roi-jai-rak.jpg',1,'2026-02-04 02:22:34'),
(16,'วัดแม่อายหลวง','วัดเก่าแก่ที่มีสถาปัตยกรรมแบบไทใหญ่ผสมล้านนา มีพระเจดีย์สีทองอร่ามและวิหารไม้ที่สวยงาม','อ.แม่อาย จ.เชียงใหม่','-','https://maps.app.goo.gl/poN4VQ9MdyjX7d2m8','ฟรี','wat_mae_ai_luang.jpg',2,'2026-02-04 02:22:34'),
(17,'ล่องเรือแม่น้ำกก (ท่าตอน)','กิจกรรมล่องเรือชมทัศนียภาพสองฝั่งแม่น้ำกก สัมผัสวิถีชีวิตชุมชนริมน้ำ สามารถล่องไปถึงจังหวัดเชียงรายได้','บ้านท่าตอน อ.แม่อาย จ.เชียงใหม่','053-459-427','https://maps.app.goo.gl/gVKDEDgBrwRptkQF9','350-400 บาท (เหมาลำ)','kok_river_boat.jpg',1,'2026-02-04 02:22:34'),
(18,'ดอยลาง','แหล่งดูนกระดับโลกและจุดชมวิวชายแดนไทย-พม่า มีอากาศหนาวเย็นตลอดปี เป็นที่นิยมของนักดูนกและช่างภาพ','อ.แม่อาย จ.เชียงใหม่','096-735-7092','https://maps.app.goo.gl/8ZryhzdnRc2Dm8ic7','ฟรี','doi_lang.jpg',1,'2026-02-04 02:22:34'),
(19,'วัดพระธาตุสบฝาง','วัดเก่าแก่ตั้งอยู่บนยอดดอยบริเวณที่แม่น้ำฝางไหลมาบรรจบกับแม่น้ำกก มองเห็นวิวแม่น้ำสองสีสวยงาม','อ.แม่อาย จ.เชียงใหม่','-','https://maps.app.goo.gl/RkMJnLutATMV4xjq7','ฟรี','wat_sop_fang.jpg',2,'2026-02-04 02:22:34'),
(20,'ถ้ำห้วยบอน','ถ้ำหินปูนขนาดใหญ่ ภายในมีหินงอกหินย้อยรูปร่างแปลกตา สวยงามตามธรรมชาติ ตั้งอยู่ในเขตอุทยานแห่งชาติดอยผ้าห่มปก','อ.ฝาง จ.เชียงใหม่','053-453-517','https://maps.app.goo.gl/vUM11nDm4jTskQkL8','ฟรี','huay_bon_cave.jpg',1,'2026-02-04 02:22:34'),
(21,'คาเฟ่ เดอ ฝาง (Cafe de Fang)','ร้านกาแฟและอาหารทำเลดี อยู่หน้าโชว์รูมโตโยต้าฝาง','ต.เวียง อ.ฝาง จ.เชียงใหม่','081-568-1569, 053-451-568','https://maps.app.goo.gl/zgYxgBRVLDMaDjor5','50-89+ บาท','Cafe-de-Fang.jpg',3,'2026-02-09 20:14:42'),
(22,'ธิดาคูซีน (Thida Cuisine)','ร้านอาหารไทย-จีน ขึ้นชื่อเรื่องเป็ดย่าง เหมาะสำหรับครอบครัว','222 หมู่ 1 ต.เวียง อ.ฝาง','053-451-016','https://maps.app.goo.gl/M7vqVMqQeoHUA2qf8','100-150+ บาท','Thida-Cuisine.jpg',3,'2026-02-09 20:14:42'),
(23,'ทาโมร่า คาเฟ่ แอนด์ อีทเทอรี่ (Tamora Cafe & Eatery)','คาเฟ่และร้านอาหารบรรยากาศดี บนถนนเลี่ยงเมืองฝาง','188 หมู่ 3 ถนนเลี่ยงเมืองฝาง ต.เวียง อ.ฝาง','095-235-9694','https://maps.app.goo.gl/wHubS5KBY35V7LE1A','60-90+ บาท','Tamora-Cafe-Eatery.jpg',3,'2026-02-09 20:14:42'),
(27,'เซมิงค์ คาเฟ่ (Say Mink Cafe)','คาเฟ่บรรยากาศดอยอ่างขาง ใกล้สวน 80','ตำบล โป่งน้ำร้อน อ.ฝาง จ.เชียงใหม่','093-196-1303','https://maps.app.goo.gl/QcZvPGqHCVxwpbko8','50-80+ บาท','Say-Mink-Cafe.jpg',3,'2026-02-09 20:14:42'),
(28,'สโมสรอ่างขาง','ร้านอาหารภายในสถานีเกษตรหลวง ใช้วัตถุดิบโครงการหลวง','ภายในสถานีเกษตรหลวงอ่างขาง อ.ฝาง จ.เชียงใหม่','053-969-476','https://maps.app.goo.gl/BuyBpGqhXTGfSqSs6','120-200+ บาท','smosorn-angkhang.jpg',3,'2026-02-09 20:14:42'),
(29,'พิพิธภัณฑ์โรงงานหลวงที่ 1 (ฝาง)','พิพิธภัณฑ์มีชีวิต ตั้งอยู่ตีนดอยทางขึ้นอ่างขาง คนละจุดกับสถานีเกษตรฯ','บ้านยาง ต.แม่งอน อ.ฝาง จ.เชียงใหม่','053-051-021','https://maps.app.goo.gl/PbfSm2VqaduVj1Wj6','ฟรี','musuemfang1.jpg',5,'2026-02-09 20:25:32'),
(30,'ศาลเจ้าแม่กวนอิม พระโพธิสัตว์กวนอิมหยกขาว','ศาลเจ้าแม่กวนอิมหยกขาว ภายในมูลนิธิส่งเสริมพระพุทธศาสนา','บ้านยาง ต.แม่งอน อ.ฝาง จ.เชียงใหม่','053-345-123','https://maps.app.goo.gl/hTN4V24wyKs48wv69','ฟรี','jao-mae-koan-ain.jpg',2,'2026-02-09 20:25:32'),
(31,'วัดศรีมงคล (วัดก๋ง - พระนอนไม้สักทอง)','วัดสวยที่มีพระนอนไม้สักทอง ห่างจากตัวเมืองฝางเล็กน้อย','บ้านสันทราย ต.สันทราย อ.ฝาง จ.เชียงใหม่','089-851-5464','https://maps.app.goo.gl/La3d2goibeNxBmNf8','ฟรี','wat-srimongkon.jpg',2,'2026-02-09 20:25:32'),
(32,'ศาลหลักเมืองฝาง & อนุสาวรีย์พระเจ้าฝาง','สิ่งศักดิ์สิทธิ์คู่บ้านคู่เมือง หน้าที่ว่าการอำเภอฝาง','หน้าที่ว่าการอำเภอฝาง ต.เวียง อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/FgyuhREvWZTDJSPj7','ฟรี','san-jao-lak.jpg',2,'2026-02-09 20:25:32'),
(33,'วัดพระบาทอุดม','วัดบนเนินเขาเล็กๆ ในตัวเมืองฝาง ใกล้โรงพยาบาลฝาง','ต.เวียง อ.ฝาง จ.เชียงใหม่','093-170-9627','https://maps.app.goo.gl/uHEje6e1ybAxgKzXA','ฟรี','wat-pra-bad.jpg',2,'2026-02-09 20:25:32'),
(34,'วัดจองแป้น','วัดศิลปะไทใหญ่/เงี้ยว ตั้งอยู่ในตลาดฝาง','ต.เวียง (ในตลาดฝาง) อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/dbfqA4WE6PqVdPtr7','ฟรี','wat-jong-pan.jpg',2,'2026-02-09 20:25:32'),
(35,'สวนส้มปรีชา ฝาง (Preecha Orange Orchard)','สวนส้มบรรยากาศดี มีมุมถ่ายรูปพร็อพแน่น ทางไปดอยผ้าห่มปก','ต.โป่งน้ำร้อน (ก่อนถึงอุทยานฯ)','089-631-4198','https://maps.app.goo.gl/r9BLVX8i937Hx34g9','50 บาท','Preecha-Orange-Orchard.jpg',1,'2026-02-09 20:25:32'),
(36,'Kalaya Tea Room (กัลยา ที รูม)','ร้านชาและขนมในป่าบรรยากาศส่วนตัว (ต้องโทรจองก่อนเข้า)','ต.โป่งน้ำร้อน (ทางเข้าลึกลับ อยู่ท่ามกลางป่า)','093-241-9456','https://www.google.com/maps/search/?api=1&query=Kalaya+Tea+Room','150-300 บาท',NULL,NULL,'2026-02-09 20:25:32'),
(37,'ดอยป่าคา (หมู่บ้านชาวลาหู่)','โฮมสเตย์ชุมชนและจุดกางเต็นท์สัมผัสวิถีชีวิตชาวลาหู่','ต.ม่อนปิ่น อ.ฝาง จ.เชียงใหม่','086-193-4770','https://maps.app.goo.gl/PSWwrBne8gPqZxBZ7','100-500 บาท','doi-pa-ka.jpg',1,'2026-02-09 20:25:32'),
(39,'Maekok River Village Resort (แม่กก ริเวอร์ วิลเลจ รีสอร์ท)','รีสอร์ทหรูติดแม่น้ำกก วิวสวย สิ่งอำนวยความสะดวกครบครันที่สุดในย่านนี้','84 หมู่ 3 ต.ท่าตอน อ.แม่อาย จ.เชียงใหม่','053-459-328, 089-262-6784','https://maps.app.goo.gl/vdLudn1SoK6N55347','1,800 - 3,500+ บาท','Maekok-River-Village-Resort.jpg',4,'2026-02-09 20:28:25'),
(40,'Saranya River House (สรัญญา ริเวอร์เฮาส์)','ที่พักสะอาด สไตล์บ้านพักตากอากาศริมน้ำ บรรยากาศอบอุ่น','265 หมู่ 3 ต.ท่าตอน อ.แม่อาย จ.เชียงใหม่','053-053-638, 081-884-2977','https://maps.app.goo.gl/AunUMZxFC7dvw5n16','1,200 - 1,800 บาท','Saranya-River-House.jpg',4,'2026-02-09 20:28:25'),
(41,'Old Trees House (โอลด์ ทรีส์ เฮาส์)','รีสอร์ทบูทีคขนาดเล็ก บนเนินเขา บรรยากาศเงียบสงบในสวนสวย','206 หมู่ 14 ต.ท่าตอน อ.แม่อาย จ.เชียงใหม่','095-691-1182','https://maps.app.goo.gl/RHbgSjyvQfYBtQiK9','1,500 - 2,200 บาท','Old-Trees-House.jpg',4,'2026-02-09 20:28:25'),
(42,'Areeya Phuree Resort (อารียา ภูรี รีสอร์ท)','ที่พักเรือนไม้ริมน้ำ บรรยากาศร่มรื่น เหมาะกับการนั่งชิลริมระเบียง','610 หมู่ 3 ต.ท่าตอน อ.แม่อาย จ.เชียงใหม่','053-053-662, 095-685-3377','https://maps.app.goo.gl/LFijd787SqLzkw29A','800 - 1,500 บาท','Areeya-Phuree-Resort',4,'2026-02-09 20:28:25'),
(43,'Thaton Hill Resort (ท่าตอน ฮิลล์ รีสอร์ท)','รีสอร์ทบนเนินเขา วิวแม่น้ำกกมุมสูงแบบพาโนรามา','36 หมู่ 3 ต.ท่าตอน อ.แม่อาย จ.เชียงใหม่','053-053-609','https://maps.app.goo.gl/S2cHk3969d2EjsVk8','800 - 1,200 บาท','Thaton-Hill-Resort.jpg',4,'2026-02-09 20:28:25'),
(44,'Khun Mai Baan Suan Resort (คุณใหม่ บ้านสวน รีสอร์ท)','รีสอร์ทท่ามกลางสวนส้มและแปลงสตรอว์เบอร์รี บรรยากาศร่มรื่น ติดแม่น้ำฝาง ห้องพักสไตล์ลอฟท์ปูนเปลือย','306 หมู่ 5 ต.แม่อาย อ.แม่อาย จ.เชียงใหม่','053-459-087, 081-993-2791','https://maps.app.goo.gl/yiPLR7Zj97rmgEBy7','600 - 1,500 บาท','Khun-Mai-Baan-Suan-Resort.jpg',4,'2026-02-09 20:28:25'),
(46,'วัดดอยแก้ว','วัดบนเนินเขา บรรยากาศเงียบสงบ ชมวิวมุมกว้างของทุ่งนาแม่อาย','ต.แม่อาย อ.แม่อาย จ.เชียงใหม่','055-454-153','https://maps.app.goo.gl/FARevPvwP9ZgnpsFA','ฟรี','wat-doi-kaeo.jpg',2,'2026-02-09 21:12:25'),
(49,'สำนักปฏิบัติธรรมดอยเทพเนรมิต','สถานปฏิบัติธรรมบนดอย บรรยากาศร่มรื่น เหมาะแก่การเจริญสติ','อ.แม่อาย จ.เชียงใหม่','089-016-6474','https://maps.app.goo.gl/V5YuMDgnSYpwZYMn9','ฟรี','mae-saow.jpg',2,'2026-02-09 21:12:25'),
(50,'วัดพระธาตุแสงรุ้ง','วัดสวยสไตล์ล้านนาประยุกต์ ตั้งอยู่บนเนินเขา มองเห็นวิวอำเภอแม่อาย','ต.แม่นาวาง อ.แม่อาย จ.เชียงใหม่','-','https://maps.app.goo.gl/98Bf39vmQqM4Z6iw7','ฟรี','wat-pra-tad.jpg',2,'2026-02-09 21:12:25'),
(51,'บ้านฝางละมุน (Baan Fang Lamoon)','ที่พักน่ารักอบอุ่น วิวภูเขา มีดาดฟ้าสำหรับนั่งทานอาหารชมบรรยากาศยามเย็น บริการเป็นกันเอง ใกล้แหล่งท่องเที่ยวบ้านแม่มาว','167 เวียง ตำบล เวียง อำเภอ ฝาง เชียงใหม่','080-391-5249','https://maps.app.goo.gl/1SY3CiHrEGcsYa84A','600 - 1,200 บาท','Baan-Fang-Lamoon.jpg',4,'2026-02-11 03:38:32'),
(52,'ฮามีการ์เด้นโฮมสเตย์ (Ha Me Garden)','โฮมสเตย์ท่ามกลางทุ่งนา บรรยากาศเงียบสงบ มีฟาร์มสัตว์เล็กๆ ให้เดินชมและให้อาหาร ยามเช้ามีหมอกปกคลุม อากาศสดชื่น','ตำบล เวียง อำเภอ ฝาง เชียงใหม่','089-431-2135','https://maps.app.goo.gl/S5foAtyf9ZvmvuJY9','1,000 - 1,500 บาท','Ha-Me-Garden.jpg',4,'2026-02-11 03:38:32'),
(53,'สวนผักฮิมดอย โฮมสเตย์ (Pak Himdoi Farm Homestay)','ที่พักสัมผัสธรรมชาติ ติดลำธาร มีแปลงผักปลอดสารพิษให้เยี่ยมชม อากาศเย็นสบายตลอดปี เหมาะแก่การพักผ่อนทานอาหารพื้นเมือง','ตำบล โป่งน้ำร้อน อ.ฝาง จ.เชียงใหม่','099-634-9797','https://maps.app.goo.gl/CBTfGpmMdpdx5NCq5','1,500 - 2,000 บาท','Pak-Himdoi-Farm-Homestay.jpg',4,'2026-02-11 03:38:32'),
(54,'บ้านสวนปวิชญา เกษตรอินทรีย์','ที่พักสไตล์เกษตรอินทรีย์ บรรยากาศร่มรื่น เงียบสงบ เป็นส่วนตัว เหมาะสำหรับการพักผ่อนท่ามกลางธรรมชาติในอำเภอฝาง','ตำบล เวียง อำเภอ ฝาง เชียงใหม่ 50110','091-851-6035','https://maps.app.goo.gl/KNMux89XURX73qsp8','250 - 300 บาท','Suan-Insee.jpg',4,'2026-02-11 03:38:32'),
(55,'อุ้มฮุ่ม โฮมสเตย์ (Aumhum Homestay)','โฮมสเตย์แนวคิดสวนป่าเกษตรอินทรีย์ รายล้อมด้วยต้นไม้นานาพันธุ์ เน้นวิถีชีวิตยั่งยืน บรรยากาศร่มรื่นและเงียบสงบ','111 ม. 6 บ้านหัวนา ต.ม่อนปิ่น อ.ฝาง จ.เชียงใหม่','095-453-5293','https://maps.app.goo.gl/5vjFJJbLzP7tKTNw6','1,700 - 2,000 บาท','Aumhum-Homestay.jpg',4,'2026-02-11 03:38:32'),
(56,'บ้านใหม่หัวฝาย','โฮมสเตย์ชุมชนใกล้เขื่อนบ้านลาน (อ่างเก็บน้ำแม่มาว) วิวสวยเหมือนสวิตเซอร์แลนด์เมืองไทย บรรยากาศภูเขาและสายน้ำ เหมาะสำหรับคนรักธรรมชาติ','หมู่ 3 ต.โป่งน้ำร้อน อ.ฝาง จ.เชียงใหม่','084-739-4476','https://maps.app.goo.gl/a1PrjThvPWmpjPMu7','350 บาท ต่อคน/คืน','Baan-Mai-Huafai.jpg',4,'2026-02-11 03:38:32'),
(57,'โฮเทล ดาวา (Hotel Dawa)','โรงแรมสไตล์ลอฟท์มินิมอล ตกแต่งทันสมัย สะอาด วิวสวยมองเห็นดอยผ้าห่มปก มีสิ่งอำนวยความสะดวกครบครัน','242 ม.1 ถนนหมายเลข 107 เลี่ยงเมืองฝาง สันทราย อ.ฝาง จ.เชียงใหม่','087-576-0838','https://maps.app.goo.gl/Lcq1fyiBri7jU4Gu6','500 - 800 บาท','Hotel-Dawa.jpg',4,'2026-02-11 03:38:32'),
(58,'โรงแรมฝางวิลล่า (Fang Villa Hotel)','ที่พักราคาประหยัดใจกลางเมืองฝาง สะอาด เดินทางสะดวก ใกล้ตลาดและแหล่งของกิน คุ้มค่าคุ้มราคา','ถ. โชตนา ต.เวียง อ.ฝาง จ.เชียงใหม่','086-451-7682','https://maps.app.goo.gl/sTFD46jaePQreFPz7','400 - 600 บาท','Fang-Villa-Hotel.jpg',4,'2026-02-11 03:38:32'),
(60,'อ่างขางวิลล่า','ที่พักทำเลดีใกล้สถานีเกษตรหลวงอ่างขางและจุดชมวิว เดินทางสะดวก บรรยากาศเรียบง่ายท่ามกลางหุบเขา','ต.แม่งอน อ.ฝาง จ.เชียงใหม่','053-450-022, 053-450-010','https://maps.app.goo.gl/fw2LRFcXhc3ZLwnb8','800 - 1,500 บาท','Angkhang-Villa.jpg',4,'2026-02-11 03:38:32'),
(61,'เลาติง อ่างขาง','ที่พักสไตล์จีนยูนนาน ตั้งอยู่ใจกลางบ้านคุ้ม ใกล้ถนนคนเดินและร้านอาหาร รองรับนักท่องเที่ยวแบบหมู่คณะ','62 หมู่ 5 ต.แม่งอน อ.ฝาง จ.เชียงใหม่','053-450-005','https://maps.app.goo.gl/eQYo8nYWQchPT8ni6','1,500 - 3,500 บาท','lao-ting-hotel.jpg',4,'2026-02-11 03:38:32'),
(63,'จุดกางเต็นท์ม่อนสน','จุดชมวิวทะเลหมอกและพระอาทิตย์ขึ้นที่สวยงามบนดอยอ่างขาง อากาศหนาวเย็น มีลานกางเต็นท์และอุปกรณ์ให้เช่าสำหรับสายแคมป์ปิ้ง','ม่อนสน ดอยอ่างขาง อ.ฝาง จ.เชียงใหม่','-','https://maps.app.goo.gl/vXKGDpZrLa8gxY5z7','30 - 250 บาท','mon-son.jpg',1,'2026-02-11 03:38:32'),
(64,'ฝาง โมเดิร์น โฮเทล (Fang Modern Hotel)','โรงแรมสไตล์โมเดิร์น ด้านหลังติดทุ่งนา วิวสวยยามเช้า ห้องพักกว้างขวางสะอาด มีที่จอดรถสะดวกสบาย','เลขที่ 426 หมู่ 3 ต.เวียง อ.ฝาง จ.เชียงใหม่','086-439-1843','https://maps.app.goo.gl/qf3eNB2Yd6WddVEz9','450 - 2,400 บาท','Fang-Modern-Hotel.jpg',4,'2026-02-11 03:38:32'),
(65,'โรงแรม สลีปปิ้ง ทรี (Sleeping Tree Hotel)','โรงแรมตั้งอยู่ใจกลางเมืองฝาง ใกล้โรงพยาบาลและร้านสะดวกซื้อ ห้องพักสะอาดกว้างขวาง ตกแต่งทันสมัย','16/1 หมู่ 4 ต.เวียง อ.ฝาง จ.เชียงใหม่','095-415-6514','https://maps.app.goo.gl/Hwp4KmiBQHAfjQwZ6','600 - 1,000 บาท','Sleeping-Tree-Hotel.jpg',4,'2026-02-11 03:38:32'),
(66,'โรงแรม แทนเจอรีน วิลล์ (Tangerine Ville Hotel)','โรงแรมมาตรฐานขนาดใหญ่ในอำเภอฝาง รองรับการจัดประชุมสัมมนา ห้องพักสะดวกสบาย พร้อมบุฟเฟต์อาหารเช้า','117, 117/1 หมู่ 2, ต.สันทราย อ.ฝาง จ.เชียงใหม่','053-452-114','https://maps.app.goo.gl/pkCktezzrS7w9Kq46','800 - 1,500+ บาท','Tangerine-Ville-Hotel.jpg',4,'2026-02-11 03:38:32'),
(67,'ต้นฝาง โฮเทล (Ton Fang Hotel)','ที่พักติดถนนใหญ่ เดินทางสะดวก หาง่าย ดีไซน์ทันสมัย ห้องพักสะอาดกว้างขวาง มีระบบรักษาความปลอดภัยและคาเฟ่บริการ','104 ถนนโชตนา ต.เวียง อ.ฝาง จ.เชียงใหม่','053-451-248','https://maps.app.goo.gl/4K3vWzNKCHu4nT6Z6','400 - 700 บาท','Ton-Fang-Hotel.png',4,'2026-02-11 03:38:32');
/*!40000 ALTER TABLE `attractions` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `categories` VALUES
(1,'ธรรมชาติ'),
(2,'วัดและสถานที่ทางศาสนา'),
(3,'คาเฟ่และร้านอาหาร'),
(4,'ที่พัก'),
(5,'พิพิธภัณฑ์');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `attraction_id` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `attraction_id` (`attraction_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`attraction_id`) REFERENCES `attractions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reviews`
--

LOCK TABLES `reviews` WRITE;
/*!40000 ALTER TABLE `reviews` DISABLE KEYS */;
set autocommit=0;
/*!40000 ALTER TABLE `reviews` ENABLE KEYS */;
UNLOCK TABLES;
commit;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` enum('admin','user') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `profile_image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
set autocommit=0;
INSERT INTO `users` VALUES
(1,'admin','$2y$10$lTWJK80Tt/MbHodTNQhpdeFQZd80n36D7B9IoZj9XkhmUgYISqiqK','admin@localtravel.com','admin','2026-02-03 02:10:57',NULL),
(3,'user1','$2y$10$tt/gYHYCiTYd8hBnDHnOJuz0yV9fcaNINilVM0UX4RfdHlLdTMvki','user1@gmail.com','user','2026-02-03 02:19:22',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
commit;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2026-02-25  9:59:24
