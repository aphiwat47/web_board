-- MySQL dump 10.13  Distrib 8.0.34, for Linux (x86_64)
--
-- Host: localhost    Database: hospital
-- ------------------------------------------------------
-- Server version	8.0.34

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_category` bigint NOT NULL AUTO_INCREMENT,
  `name_category` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id_category`)
) ENGINE=InnoDB AUTO_INCREMENT=1008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Anime, Cartoon'),(2,'Technical, Knowledge'),(3,'Country, Region'),(4,'Horror, Thriller'),(5,'Beauty & Cosmetics'),(6,'Natural & Garden'),(7,'Home & Garden'),(8,'Coffee & Tea'),(9,'Travel & Tourist attraction'),(10,'Sports'),(11,'Smartphone'),(12,'Animals'),(13,'Food'),(14,'Movie'),(15,'Pictures'),(16,'Games'),(17,'Gaming gears'),(18,'Music\r\n'),(19,'Celebrity'),(20,'Technology'),(999,'Other');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `comments` (
  `id_comment` bigint unsigned NOT NULL AUTO_INCREMENT,
  `who_comm_id` bigint unsigned NOT NULL,
  `id_comment_at_topic` bigint unsigned NOT NULL,
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `time_created` timestamp NOT NULL,
  `time_update` timestamp NOT NULL,
  `path_pic_comm` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `rule_1` (`who_comm_id`),
  KEY `rule_2` (`id_comment_at_topic`),
  CONSTRAINT `rule_1` FOREIGN KEY (`who_comm_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rule_2` FOREIGN KEY (`id_comment_at_topic`) REFERENCES `posts` (`id_post`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=91 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (18,23,34,'sf','2023-09-29 17:14:08','2023-09-29 17:14:08',NULL),(35,16,42,'จรั๊ฟ','2023-09-30 15:20:55','2023-09-30 15:21:21','image/comment/1696087255.jpg'),(54,16,58,'dsadsadsadsa','2023-10-01 07:10:33','2023-10-01 07:34:11','image/comment/1696144233.png'),(62,33,64,'เราหยุดใช้เครื่องสำอาง แล้วพอกหน้าด้วยสะนาคาผสมน้ำผึ้งและน้ำมะขามเปียก วันเว้นวัน แต่ถ้าพอกทุกวันก้อ สะนาคากับน้ำผึ้งจ้าา  เพราะเกรงว่าถ้าผสมมัขามเปียกทุกว่ามันจะกัดหน้าทำให้หน้าเราบางได้ ตอนนี้ผดเรายุบแล้ว ดีใจมาก','2023-10-01 14:25:20','2023-10-01 14:25:20',NULL),(63,33,63,'ไม่ว่าเมื่อไหร่ที่ไหน แถวก็ยาวแล้วก็มีมนต์ขลังตามแบบฉบับของดิสนีย์แลนด์เสมอเลย  ขอบคุณที่นำทริปมาแบ่งปันนะคะ','2023-10-01 14:28:32','2023-10-01 14:28:32',NULL),(64,33,69,'ไม่ว่าเมื่อไหร่ที่ไหน แถวก็ยาวแล้วก็มีมนต์ขลังตามแบบฉบับของดิสนีย์แลนด์เสมอเลย  ขอบคุณที่นำทริปมาแบ่งปันนะคะ','2023-10-01 14:28:58','2023-10-01 14:28:58',NULL),(65,32,69,'ดีใจที่หนังใช้ฉากประเทศหลายที่สวยๆ ทั้งนั้น','2023-10-01 14:30:38','2023-10-01 14:30:38',NULL),(66,32,67,'ขอโทษนะคะ อันนี้แปลสปอยมาจากภพไหนเนี่ย 5555  ฮาจิเมะไม่ได้โกรธเลยนะคะ','2023-10-01 14:31:19','2023-10-01 14:31:19',NULL),(67,34,66,'so cute','2023-10-01 14:32:13','2023-10-01 14:32:13',NULL),(68,12,67,'ฮาจิเมะก็เดือดเกิน ต่อยหน้าสุคุนะ จนกลับเป็นร่างเดิมเลย สนุกแน่ ร่างจริงสุคุนะออกมาแล้ว น่าจะเห็นท่าใหม่ๆมาแน่','2023-10-01 14:32:54','2023-10-01 14:32:54',NULL),(69,12,63,'ขอบคุณที่มารีวิวให้ชมนะครับ','2023-10-01 14:33:46','2023-10-01 14:33:46',NULL),(70,17,70,'ลองโยนเหรียญดูครับ ถ้าออกหัวสามีคนนี้คือพ่อของลูกครับ ถ้าออกข้างจะเป็นลูกทุ่ม','2023-10-01 14:35:08','2023-10-01 14:35:08',NULL),(72,34,71,'สำหรับหนูยกให้ โดเรม่อนเดอะมูฟวี่ตอน โดเรม่อนกันพ้องเพี้ยนในดงหญ้า ค่ะ','2023-10-01 14:37:48','2023-10-01 14:37:48','image/comment/1696171068.png'),(73,27,71,'สำหรับผมยกให้ ดิอะเมซิ่งสไปเดอะจ้วน4 ครับ  ให้100/10เลยครับ ยิ่งตอนที่พี่เอกนอนอึดตายแล้วนางเอกกระทืบซ้ำยิ่งชอบครับ','2023-10-01 14:44:03','2023-10-01 14:44:03','image/comment/1696171443.jpg'),(74,27,67,'อยากรู้สุคุนะรอดไม่รอดเชียร์อยู่นะครับพรี่','2023-10-01 14:45:27','2023-10-01 14:45:27',NULL),(75,27,73,'สภาพนี้เดินไปดีกว่าครับ','2023-10-01 14:45:48','2023-10-01 14:45:48',NULL),(76,27,68,'ปกติครับน้อนที่บ้านก็เป็น','2023-10-01 14:47:06','2023-10-01 14:47:06',NULL),(77,35,74,'bangsai888 รวยจริงไม่โกหกคัฟผม','2023-10-01 15:08:56','2023-10-01 15:08:56',NULL),(78,16,72,'ซื้อใหม่เถอะครับ ผมคิดว่าซื้อใหม่ถูกกว่าค่าซ่อมอีกครับพี่','2023-10-01 15:21:04','2023-10-01 15:21:21','image/comment/1696173681.jpg'),(84,16,78,'โกโจ โซโมริ','2023-10-02 07:30:57','2023-10-02 07:31:05','image/comment/1696231865.gif'),(85,12,79,'สุดยอดเลยครับ อิอิ','2023-10-02 07:32:20','2023-10-02 07:32:30',NULL),(86,16,79,'สมกันมากเลยครับ ศีลเสมอกัน รักที่ดีคือรักตัวเองครับพี่','2023-10-02 07:36:25','2023-10-02 07:36:25',NULL),(90,39,78,'<script>alert(1);</script>','2023-10-03 06:58:54','2023-10-03 06:58:54',NULL);
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `connection` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `queue` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (5,'2014_10_12_000000_create_users_table',1),(6,'2014_10_12_100000_create_password_reset_tokens_table',1),(7,'2019_08_19_000000_create_failed_jobs_table',1),(8,'2019_12_14_000001_create_personal_access_tokens_table',1),(9,'2014_10_12_100000_create_password_resets_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
INSERT INTO `password_reset_tokens` VALUES ('sathaporn44945@gmail.com','$2y$10$arg3xdETZA6SQqiImP6owuxHQVQQTK0GX8yvO049vl6PnNrk2Exwq','2023-09-28 04:03:59');
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `abilities` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `personal_access_tokens`
--

LOCK TABLES `personal_access_tokens` WRITE;
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id_post` bigint unsigned NOT NULL AUTO_INCREMENT,
  `who_post_id` bigint unsigned NOT NULL,
  `time_created` timestamp NOT NULL,
  `time_update` timestamp NOT NULL,
  `title` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `content` varchar(5000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `path_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category` bigint NOT NULL,
  PRIMARY KEY (`id_post`),
  KEY `rule1` (`who_post_id`),
  KEY `rule2` (`category`),
  CONSTRAINT `rule1` FOREIGN KEY (`who_post_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `rule2` FOREIGN KEY (`category`) REFERENCES `categories` (`id_category`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (18,11,'2023-09-28 14:02:51','2023-09-29 11:57:55','Catlover.xyz','ทองเอก ลำลูกกา.xyzzzzzzzzzzzzzzzzzzzz','image/post/1695926907.png',999),(22,8,'2023-09-29 07:20:30','2023-09-30 14:24:27','test','test','image/post/1695972030.jpg',1),(24,21,'2023-09-29 07:49:28','2023-09-29 07:49:28','อ้วนบางทราย','จ้วนจ้วนจ้วนจ้วน','image/post/1695973768.png',999),(34,23,'2023-09-29 15:18:22','2023-09-29 15:20:48','ผี','qwe','image/post/1696000702.jpg',4),(37,17,'2023-09-29 17:26:32','2023-09-29 17:26:32','iScream ตอนพิเศษ บุกบ้านโจ๊กiScream','-','image/post/1696008392.png',1),(42,23,'2023-09-30 15:13:14','2023-09-30 15:13:14','ไก่','ไก่ (อังกฤษ: Chicken) เป็นสัตว์ปีก มีหลากหลายสายพันธุ์ที่อยู่ในป่าเช่นไก่ป่าอินเดียและไก่ป่าลังกา[1] มีต้นกำเนิดจากเอเชียตะวันออกเฉียงใต้ บินได้ในระยะสั้น หากินตามพื้นดิน ตกไข่ก่อนแล้วจึงฟักเป็นตัว ตัวผู้หงอนใหญ่และเดือยยาว\r\n\r\nเดิมทีไก่เคยเลี้ยงไว้เฉพาะในการแข่งขันหรือในโอกาสพิเศษ ยังไม่เคยมีใครเลี้ยงไก่ไว้เป็นอาหารจนกระทั่งสมัยเฮลเลนิสต์ (ศตวรรษที่ 4–2 ก่อนคริสต์ศักราช)[2][3] โดยหลักมนุษย์เลี้ยงไก่ไว้เป็นแหล่งอาหาร (บริโภคทั้งเนื้อและไข่) และสัตว์เลี้ยง\r\n\r\nไก่ถือเป็นหนึ่งในสัตว์เลี้ยงที่กระจายตัวอย่างแพร่หลายและพบได้ทั่วไปมากที่สุด จากข้อมูลเมื่อ 2018 มีประชากรไก่รวมที่ 23.7 พันล้านตัว[4] จนถึงมากกว่า 19 พันล้านตัวใน ค.ศ. 2011[5] และมีไก่บนโลกนี้มากกว่านกชนิดอื่น ๆ[5]\r\n\r\nการศึกษาทางพันธุกรรมแสดงให้เห็นถึงต้นกำเนิดหลายแห่งในเอเชียใต้, เอเชียตะวันออกเฉียงใต้ และเอเชียตะวันออก[6] แต่เคลดที่พบในทวีปอเมริกา, ยุโรป, ตะวันออกกลาง และแอฟริกามีต้นกำเนิดจากอนุทวีปอินเดีย ไก่เริ่มแพร่กระจายจากอินเดียโบราณไปที่ลิเดียในเอเชียไมเนอร์ตะวันตก แล้วไปที่กรีซในศตวรรษที่ 5 ก่อนคริสตกาล[7] ตามรายงานจากพงศาวดารฟาโรห์ทุตโมสที่ 3 ในประโยค \"นกที่ออกลูกทุกวัน\" ทำให้รู้ว่าไก่เป็นที่รู้จักในอียิปต์มาตั้งแต่กลางศตวรรษที่ 15 ก่อนคริสตกาล โดยมาจากดินแดนระหว่างซีเรียกับชินอาร์ บาบิโลเนีย\r\nGreen-Armytage, Stephen (October 2000). Extraordinary Chickens. Harry N. Abrams. ISBN 978-0-8109-3343-9.\r\nSmith, Page; Charles Daniel (April 2000). The Chicken Book. University of Georgia Press. ISBN 978-0-8203-2213-1.\r\nAndrew Lawler (2014). Why Did the Chicken Cross the World?: The Epic Saga of the Bird that Powers Civilization. Atria Books. ISBN 978-1-4767-2989-3.','image/post/1696086794.jpg',999),(58,8,'2023-10-01 06:49:49','2023-10-01 06:50:25','test','tesd',NULL,1),(61,32,'2023-10-01 13:27:14','2023-10-01 13:31:27','แมว','แมวแมว','image/post/1696166834.gif',12),(63,32,'2023-10-01 14:06:28','2023-10-01 14:06:28','รีวิวเครื่องเล่นใน T O K Y O D I S N E Y L A N D 2023 ฉบับห้ามพลาด!!','恐れが夢に取って代わらないように\r\nDon’t let your fears take the place of your dreams, Walt Disney\r\nช่วงนี้ก็เป็นช่วงปิดเทอม เหล่าพ่อๆแม่ๆ คงพาบรรดาลูกๆไปเที่ยวกัน โดยที่ที่เดินทางง่ายไม่ไกล ส่วนใหญ่ก็ไม่พ้นประเทศญี่ปุ่นเนอะ แล้วเราก็คงต้องพาลูกๆหลานๆ บางทีก็คือเป็นตัวเองนี่แหละ ไปแหล่งที่เรียกว่า สวนสนุกที่มีความสุขที่สุด หรือ Tokyo Disneyland นั่นเอง โดยอันนี้จะเป็นpart รีวิวเกี่ยวกับเครื่องเล่นที่ตัวเองได้เล่นนะ (จริงๆไปมาปีที่แล้วแหละ แต่ยังคิดว่าไม่ outdate) ส่วนรีวิวเรื่องการใช้ application หากมีเวลาจะทำมาให้ดูอีกกระทู้นึงนะซึ่งเดี๋ยวนี้การใช้ applicationของ Disney เองถือว่ามีความทันสมัยมากแล้วก็สามารถดู waiting time ของเครื่องเล่นได้แบบ real time สุดๆ\r\n\r\nก่อนอื่นเลย ขอฝากอีกplatformหนึ่งของผมนั่นคือ facebook page สามารถไปกดติดตามกันได้นะครับ\r\nเพจมีชื่อว่า AUN DEN TE’s: full-time traveller\r\nมีรีวิวที่เที่ยวมากมาย เท่าที่มีเวลาจะเที่ยว --> https://www.facebook.com/aundentes?mibextid=LQQJ4d\r\n————————————\r\nจริงๆแล้วมา Tokyo Disneyland เป็นครั้งที่สามแล้ว บอกก่อนเลยว่าตัวเองเคยเล่นเครื่องเล่นครบหมดละ ในสมัยที่Disneyland ยังมี fastpass แต่สมัยนี้ไม่มีfastpass แล้ว การที่เราจะเล่นให้ครบ ก็คงต้องยืนขาแข็งวนไป แต่ด้วยสภาพและอายุในตอนนี้ เล่นเท่าที่ โดยเล่นได้ ประมาณ 8อย่าง ในความคิดตัวเอง ถือว่า OK แล้วนะ โดยเฉพาะอย่างยิ่งเพิ่งมี beauty and the beast มาเปิดใหม่ เสียเวลายืนรอไปค่อนข้างนานเพราะว่าไม่อยากเสียเงิน premeire access 55\r\nตอนนั้นคือมาช่วงปลาย พย 2565 พอดี เข้าสู่christmas เลยได้บรรยากาศอีกแบบ\r\nโดยแนะนำthe must ที่ห้ามพลาดเลย ก็คือ มีดังต่อไปนี้ แบ่งตามzone ของ Disneyland นะ\r\nหากมาdisneyland เราต้องวางแผนให้มาก่อนparkเปิดนะ จะได้ไม่ต้องริคิวนาน\r\n1.Tomorrowland\r\n\r\nSpace mountain: คะแนน 4.5/5\r\n\r\nBuzz lightyear’s astro bluster: คะแนน 5/5\r\n\r\nMonster Inc, Ride and go seek: คะแนน 5/5\r\n\r\n\r\nStar tours : the adventure continue: คะแนน 4.5/5','image/post/1696169188.jpg',9),(64,17,'2023-10-01 14:07:40','2023-10-01 14:07:40','แพ้เครื่องสำอาง เป็นผื่นที่หน้า จะต้องใช้อะไรแก้ไข','พอดีว่าได้ทำการ มาร์คหน้ามะเขือเทศของ วัตสัน ต่อด้วยการมาร์คหน้าด้วยนีเวีย มัดโฟม สีม่วง มาร์คตอนเช้าคะ พอถึงตอนเย็นเท่านั้นแหละ ผดผื่นมาจากไหนก็ไม่รู้ เป็นมาอาทิตย์ล่ะ ไม่รู้เหมือนกันคะ ว่าจะต้องใช้อะไรดีเพราะตัวเองไม่เคยเป็นแบบนี้มาก่อน เป็นคนผิวหน้าแห้งแต่ไม่เคยเป็นสิวคะ พอมาเป็นไปไม่ถูกเลย ไม่รู้ว่าจะต้องใช้อะไร เพื่อน ๆ ช่วยบอกทีคะ เป็นมา 1 อาทิตย์ล่ะ ยังไม่หายเลย แต่ถ้าจะเป็นกับเครื่องสำอางก็ใช้มาสักประมาณ 2 อาทิตย์ถึง 3 อาทิตย์แล้วนะ ไม่น่าจะเป็นเพราะเครื่องสำอางค่ะ','image/post/1696169260.jpg',5),(65,27,'2023-10-01 14:10:25','2023-10-01 14:11:28','อยากรู้ว่าทำไมอาเซน่อลถึงไม่ได้แชมป์','ตามหัวข้อเลยครับอยากรู้ว่าทำไมอาเซน่อลถึงไม่ได้แชมป์','image/post/1696169425.jpg',10),(66,16,'2023-10-01 14:13:06','2023-10-01 14:13:06','ทำไมแมวส้มถึงป่วนกว่าแมวสีอื่นๆหรอครับ','คือว่าที่บ้านเลี้ยงแมวทั้งหมด20ตัว แต่มีตัวเดียวที่ป่วนที่สุด เล่นสุด นอนสุด ก็คือแมวส้ม','image/post/1696169586.gif',12),(67,33,'2023-10-01 14:13:10','2023-10-01 14:13:10','jujutsu kaisen 237 สุคุนะ vs ฮาจิเมะ','ตัวอย่างและเนื้อหาภาพมาแล้ว\r\n\r\n-สุคุนะ vs ฮาจิเมะ\r\n\r\n-อุราฮิเมะปรากฎตัวมาช่วยสุคุนะต่อสู้\r\n\r\n-แต่ว่าฮาคาริก้ปรากฎตัวมาช่วยฮาจิเมะเช่นกัน\r\n\r\n-ฮาคาริบอกกับอุราฮิเมะไปว่า เขาจะจัดการอุราฮิเมะเอง\r\n\r\n-อุราฮิเมะใช้พลังน้ำแข็งโจมตีใส่ฮาคาริ\r\n\r\n-ฮาคาริได้กางอาณาเขตใส่อุราฮิเมะ\r\n\r\n-ฮาคาริ vs อุราฮิเมะ\r\n\r\n-อุราฮิเมะได้ส่งอาวุธคู่ใจให้แก่ สุคุนะ ที่เรียกว่า คามุยโทกิ  ก่อนสู้กับฮาคาริ ทั้งฮาคาริและอุราฮิเมะต่างอยู่ในอาณาเขตของฮาคาริแล้ว\r\n\r\n-ก่อนที่สุคุนะกับฮาจิเมะต่อสู้กับก็ต้องพูดคุยขิงกันก่อน\r\n\r\n-ฮาจิเมะถามสุคุนะว่า ทำไหมถึงเทพ\r\n\r\n-สุคุนะตอบกลับไปว่า ไม่รู้เหมือนกันแต่เขาเห็นมนุษย์ทุกคนในโลกนี้ต่ำกว่าตนมาตลอดนั้นมาหมายความว่า\r\n\r\n-สุคุนะพุดดูถูกฮาจิเมะว่า กากกว่าตน 5555+ ขนาดโกโจที่เพิ่งตายไปก็เหมือนฮาจิเมะเลยกากเหมือนกัน\r\n\r\n-ฮาจิเมะโกรธพุ่งไปสู้กับสุคุนะทันที\r\n\r\n-ฮาจิเมะพุ่งไปต่อยเตะสุคุนะและฟาดอาวุธไม้เหล้กของตนอย่างเมามมันส์และพ่นพลังงานคำสาปบางอย่างออกจากปากโจมตีใส่สุคุนะ\r\n\r\n-สุคุนะรับมือได้ ไม่ได้บาดเจ็บในการต่อสู้มากนัก แต่ป้องกันการโจมตีของฮาจิเมะได้\r\n\r\n-ฮาจิเมะสามารถควบคุมพลังงานคำสาปของตนได้ทั่วร่างเขาสามารถปล่อยพลังคำสาปโจมตีจากทางไหนก็ได้\r\n\r\n-ฮาจิเมะโจมตีใส่สุคุนะคอมโบต่อเนื่องและปิดท้ายด้วยการยิงพลังงานจากปากของตนโจมตีใส่สุคุนะจนเกิดแรงระเบิดควันฟุ่งกระจายออกมา\r\n\r\n-หน้าสุดท้าย สุคุนะกลายร่างเป็นร่างจุติสมบูรณ์ร่างที่แท้จริงของตนเองควบคุมร่างกายได้เกือบเต็มที่จนเรียกได้ว่า เมกุมิวิญญาณใกล้โดนสุคุนะดูดกลืนเต็มที่แล้ว\r\n\r\nสัปดาห์หน้าไม่งด','image/post/1696169590.jpg',1),(68,17,'2023-10-01 14:15:55','2023-10-01 14:16:10','แมวนอนยืด แบบเนี่ย ปกติไหมครับ ?','เวลานอนก็ต้องนอนยืด แปลกที่ตัวเมียไม่เป็น พ่อเจ้าตัวนี้ก็เป็นเหมือนกัน\r\nอยากทราบว่าปกติไหมครับ','image/post/1696169770.jpg',12),(69,12,'2023-10-01 14:17:15','2023-10-01 14:17:15','The Creator (8/10) l ประเทศไทย..ในแบบที่คุณไม่เคยเห็น (สปอยล์)','เรื่องย่อ The Creator เดอะ ครีเอเตอร์ สงครามระหว่างมนุษย์กับปัญญาประดิษฐ์\r\n\r\nThe Creator เดอะ ครีเอเตอร์ หนังแอ็คชั่น-ไซไฟที่บอกเล่าเรื่องราวในโลกอนาคตเมื่อมนุษย์วิวัฒน์ได้ เหล่าปัญญาประดิษฐ์ก็เช่นกัน เตรียมพร้อมสู่โลกหลังสงครามระหว่างมนุษย์และมนุษย์ (จักรกล) ผลงานการกำกับของ แกเร็ธ เอ็ดเวิร์ดส์ จาก Rogue One กับการถ่ายทำในประเทศไทย เรื่องราวจะเป็นอย่างไรไปติดตามกันเลย\r\n\r\nหนังแอ็คชั่น-ไซไฟฟอร์มยักษ์สุดลุ้นระทึกที่เกิดขึ้นท่ามกลางสงครามในอนาคตระหว่างมนุษย์และเอไอ โจชัว เจ้าหน้าที่พิเศษที่ยังคงโศกเศร้ากับการหายไปของภรรยา ได้รับเลือกให้ไปทำภารกิจตามล่าและฆ่า เดอะ ครีเอเตอร์ ผู้ออกแบบเอไอระดับสูง ที่กำลังอยู่ในระหว่างการผลิตอาวุธสังหารลับเพื่อยุติสงครามในครั้งนี้ รวมไปถึงยุติเผ่าพันธุ์มนุษย์เช่นกัน โจชัวและทีมของเขาจะต้องเดินทางผ่านเขตของศัตรูไปสู่ใจกลางอันดำมืดของพื้นที่ที่มีเพียงเอไออาศัยอยู่เท่านั้น แต่พวกเขากลับพบว่าอาวุธสังหารลับที่เขาได้รับคำสั่งให้ทำลายทิ้งคือเอไอในร่างเด็กหญิงคนหนึ่ง','image/post/1696169835.jpg',14),(70,34,'2023-10-01 14:22:30','2023-10-01 14:22:30','ช่วยด้วยค่ะเครียดมาก','คือตอนนี้หนูตั้งท้องกับสามีอยู่แล้วสามีเป็นคนเจ้าชู้มากแล้วหนูจะรู้ได้ยังไงค่ะว่าเด็กในท้องเป็นลูกของหนู','image/post/1696170150.jpg',999),(71,17,'2023-10-01 14:23:34','2023-10-01 14:23:54','ขอทราบภาพยนต์ในดวงใจของเพื่อนๆหน่อยครับ','ตามหัวข้อเลยครับ อยากทราบว่าภาพยนต์ในดวงใจของเพื่อนๆเป็นเรื่องอะไรกัน\r\nสำหรับเรา เราให้ภาพยนต์เรื่อง 7ประจัญบาน ครับ โดยเฉพาะ\r\nฉากผู้กองสถาพรใส่เกงแดง หยิบเชอรีฟคู่มาควง สุดยอดมากๆครับ','image/post/1696170213.jpg',14),(72,34,'2023-10-01 14:31:08','2023-10-01 14:31:08','ช่วยด้วยค่ะ++!!!!!!!!!!!!!!!!!!!','คือว่าโน๊ตบุ๊คเปิดไปติดอะค่ะมันมีปัญหาอะไรหรอค่ะวอนผู้รู้ช่วยบอกที','image/post/1696170668.jpg',20),(73,17,'2023-10-01 14:41:04','2023-10-01 14:41:04','รถชนครับ!!!!!!!!!!!!','พอดีขับจากเบตง มุ่งหน้าพนมเปญ เจอควายนอนขวางถนนอยู่ครับ เบรกไม่ทัน เลยชนเข้าไปเต็มๆครับ ส่วนควายปลอดภัยดี แต่เสาไฟฟ้าล้มไป5ต้นครับ \r\nอยากทราบว่าราคาซ่อมรถประมาณเท่าไหร่ครับ','image/post/1696171264.jpg',999),(74,35,'2023-10-01 15:08:04','2023-10-01 15:08:04','รวยจริงเค้าไม่พูดเยอะ','ถ้าอยากรู้ว่าผมรวยได้ยังไงดูในคอมเมนต์','image/post/1696172884.jpg',15),(78,16,'2023-10-02 07:30:35','2023-10-02 09:00:02','Gojo Satoru - โกโจ ซาโตรุ','โกโจ  ซาโตรุ ผู้ที่ถูกขนานนามว่าเป็น ผู้ใช้คุณไสยที่แข็งแกร่งที่สุด ทั้งด้านพละกำลัง ความรวดเร็วในการเคลื่อนไหว การตอบสนอง และไหวพริบในการต่อสูง อยู่ในระดับสูง ในอดีตสมัยที่เขายังเรียนอยู่ที่โรงเรียนไสยเวทย์ เขาเคยต่อสู้กับ ฟุชิงุโระ โทจิ พ่อของ ฟุชิงุโระ เมงุมิ ในตอนที่เจออิตาโดริครั้งแรกในฐานะภาชนะของสุคุนะ เขาของให้อิตาโดริเปลี่ยนร่างกับสุคุนะเพื่อมาสู้กับเขา โกโจสามารถสู้กับสุคุนะในตอนนั้นได้อย่างสบายๆ มุคาเกน หรือ วิชาไร้ขีดจำกัด ผู้ใช้สามารถควบคุมพื้นที่ว่างเปล่า เป็นหนึ่งในพื้นฐานของวิชาคุณไสยประจำตระกูลโกโจ ที่ถ้าหากใส่พลังไสยเวทย์เข้าไปและนำมันมาสู่ความเป็นจริงจะก่อให้เกิดวิชาคุณไสยต่างๆ มุเกน คือช่องว่างระหว่างผู้ใช้กับอีกฝ่าย ที่ทำให้การโจมตียิ่งเข้าใกล้ยิ่งช้าลงจนเหมือนกับหยุดนิ่ง เป็นอีกหนึ่งในพื้นฐานของวิชาคุณไสยประจำตระกูลโกโจ ที่ถ้าหากใส่พลังไสยเวทย์เข้าไปและนำมันมาสู่ความเป็นจริงจะก่อให้เกิดวิชาคุณไสยต่างๆ ไสยเวทย์หมุนทวน สีชาด เป็นการบีบอัดมุเกนหรือพื้นที่ว่างเปล่า เมื่อถูกปล่อยออกไปพื้นที่ว่างเปล่านั้นจะระเบิดออกสามารถสร้างความเสียหายได้ในระยะไกล ไสยเวทย์หมุนตาม สีคราม เป็นสนามแม่เหล็กที่ยิ่งใส่พลังไสยเวทย์มากเท่าไหร่ก็จะเกิดแรงดึงดูดมากเท่านั้นสามารถสร้างความเสียหายได้ระยะไกล','image/post/1696231835.gif',1),(79,12,'2023-10-02 07:31:21','2023-10-02 07:35:14','sex กับภรรยาหลังนอกใจ','อยากขอปรึกษาคุณผู้ชายคะ ถ้าคุณไปนอกใจภรรยามา ภรรยาจับได้ และมีการเลิกติดต่อกับมือที่สามแล้ว แต่เรารุ้แหละว่าเขาชอบคนนั้นมาก แต่ก้จับปลาสองมือแหละ ไม่เลิกกับเรา แต่สุดท้ายเขากลับมาและเลิกติดต่อกัน แต่ที่แปลกไปคือเขาไม่มี sex กับเราเลยค่ะ เขาบอกไม่มีอารมณ์ อาจเพราะเราคบกับเขามานาน10กว่าปีแล้วไหม หรือเป็นเพราะยังลืมคนๆนั้นไม่ได้เลยไม่มีอารมณ์ นานไหมคะกว่าอารมณ์เหล่านี้จะหายไป',NULL,999),(82,38,'2023-10-03 06:18:51','2023-10-03 06:20:55','testererqrqerq','testerdsadsadsaffsdfsdfdsa','image/post/1696313931.png',4);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `is_admin` tinyint(1) DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path_pic_profile` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Aphiwat Donyuenyong','63160168@go.buu.ac.th',NULL,1,'$2y$10$EMORfCDjXWgOiQOraml2POdPt9nnE87V26hJTFseDge4gZVA9vv4W',NULL,'2023-09-19 02:03:15','2023-09-30 13:50:40','image/def/user.png','Aphiwat1','Donyuenyong','2001-08-08'),(2,'User','63160136@go.buu.ac.th',NULL,0,'$2y$10$znih3EgGVfhFIpknBql1oeDbucfRUNJBNW3yWamxgX0ICWSzryAiq',NULL,'2023-09-19 02:03:15','2023-10-04 16:28:24','image/def/user.png','aaaa','aaaa','2005-06-04'),(3,'aphiwat','User@user.com',NULL,0,'$2y$10$uqlxNfJVMhQ5mRW/YcPmDe7nbSfi/5cxHd3k.9sAR/47FwfTYDIKO',NULL,'2023-09-22 03:14:18','2023-09-22 03:14:18','image/def/user.png',NULL,NULL,NULL),(4,'Future Man','man@gmail.com',NULL,0,'$2y$10$.w7RDx4RSwPRbFFRZHitz.YT5PCucOIkfTZGm7j2AAAD5tInnOEWO',NULL,'2023-09-22 03:23:52','2023-09-22 03:23:52','image/def/user.png',NULL,NULL,NULL),(8,'Aphiwat Donyuenyong','why@gmail.com',NULL,0,'$2y$10$1iUVQYuk4jSdlPNmsyEsNeRIthYYR0DQiWrMyeQJBUcdCPxANWpWG',NULL,'2023-09-25 02:25:34','2023-10-04 16:23:48','image/profile/1695916175.jpg','Aphiwat','Donyuenyong','2001-08-08'),(9,'apisit','63160161@GO.BUU.AC.TH',NULL,0,'$2y$10$dXFN/ymT98..5qaGReP0a.TWRocqhhdJGMnp2.K39q7c7EWuO5bEm',NULL,'2023-09-25 02:46:20','2023-09-25 02:46:20','image/def/user.png',NULL,NULL,NULL),(11,'Admin.xyz','sathaporn44945@gmail.com',NULL,1,'$2y$10$4Ei2Y3z4kBOHQF0h71wT/ukB3wXnTk932.GeMijgBMVbXGvkwmUXm',NULL,'2023-09-25 13:29:10','2023-10-03 08:20:59','image/profile/1696178135.gif','Sathaporn','Laddawan','2001-08-02'),(12,'koiqfksk','gagao@gmail.com',NULL,0,'$2y$10$M3YN1qXldtGuyEYjNP8zW.DvKDbHuwNIp2RE3tXxW76PiZWm6pUjm',NULL,'2023-09-25 13:58:04','2023-10-02 07:35:46','image/profile/1696169789.jpg','erwss','hseqwrq','2023-10-18'),(13,'phalathorn','63160052@go.buu.ac.th',NULL,0,'$2y$10$L62b1RYYeoGgHiSBhovW2.vqebtjjQLD9lx.H5NrLJWHyL.D6wlx.',NULL,'2023-09-25 14:00:01','2023-09-25 14:00:01','image/def/user.png',NULL,NULL,NULL),(14,'Testtest123','test123@gmail.com',NULL,0,'$2y$10$Gb61YeytcJ2NpNOp1iMkfOaKX/wFm/skcCrrKePpbGOw68/so0E/y',NULL,'2023-09-25 15:02:04','2023-09-25 15:02:04','image/def/user.png',NULL,NULL,NULL),(16,'MemberSpata.xyz','63160162@go.buu.ac.th',NULL,0,'$2y$10$2waODPV3j09gryX1NmC7menviGiEpaKtns4ZqIKWzLQdEJ3Ss1Ly2',NULL,'2023-09-28 14:08:22','2023-10-05 03:11:52','image/profile/1696178125.gif','Sathaporn','Laddawan','2001-07-10'),(17,'garmpoohohae','63160126@go.buu.ac.th',NULL,0,'$2y$10$73Bc1ayK97kNBivS8CE9je0ILauOCiE6uneAMgbip5.xoCBSLZpca',NULL,'2023-09-28 15:02:11','2023-09-29 18:28:46','image/profile/1696011721.png','pond','nacle','2023-12-31'),(20,'Phalathorn','63160052@gmail',NULL,0,'$2y$10$Ulia462bX6ERDkyKLQWeZ.Wm4pqf1jSvCv9Er27PYlLmwwrjNdw/.',NULL,'2023-09-29 07:46:54','2023-09-29 07:47:37','image/profile/1695973657.jpg',NULL,NULL,NULL),(21,'SUPATSORN NEDBUNTERNG','sspatsorn.n@gmail.com',NULL,0,'$2y$10$HI6Q1bAje9i.WMNjDLkL9OkQgruXrU6XACKkgYzd7U7BJez/tpsl6',NULL,'2023-09-29 07:47:09','2023-09-29 07:48:10','image/profile/1695973690.png',NULL,NULL,NULL),(22,'mama','mama@go.buu.ac.th',NULL,0,'$2y$10$ibMYmSqH96hYbSz9l1NBXOftwwhQKcZaj5vJJOEPmK0dWZ32cQ3Ny',NULL,'2023-09-29 09:28:58','2023-09-29 09:28:58','image/def/user.png',NULL,NULL,NULL),(23,'NakomN','nakom@gmail.com',NULL,1,'$2y$10$N0GmKKpVhlQYYmwFKLaH/.ZeCnz5vnc0i5.aYt.fG/Oyrd8zC8/Y.',NULL,'2023-09-29 15:17:59','2023-09-29 18:26:48','image/profile/1696000793.jpg','feg','sgg','2023-09-14'),(24,'Oil','supanya.jui@gmail.com',NULL,0,'$2y$10$.h8NrCMqDSzXahYBQ3rZNuuwPKdjaFPDaoiI2iyIvgrl1Z/tG71DS',NULL,'2023-09-29 15:26:15','2023-09-29 15:26:15','image/def/user.png',NULL,NULL,NULL),(27,'Pattarapol','63160055@go.buu.ac.th',NULL,0,'$2y$10$ofZwQXh4XwWTxUoX2xNXOuaQCeVEJxs6hCTnOSRGBMOM984CNHXkC',NULL,'2023-09-30 13:11:48','2023-09-30 13:13:49','image/profile/1696079629.jpg','จ่าต็อบ','จ็อบอยู่ตราด','2000-09-10'),(29,'sawatdee','oil_0466@gmail.com',NULL,0,'$2y$10$asuO4Ioh.LjOGfabK5AATe.R5dDxz.XJwB5I8Bh50X6VvHIr0cF1C',NULL,'2023-10-01 08:20:32','2023-10-01 08:20:32','image/def/user.png',NULL,NULL,NULL),(32,'nanana','nakominw@gmail.com',NULL,0,'$2y$10$nndQ/JvnhIygK0gMEnZMU.oC1kKLTbeDh.dWEunK2TTdMYX5NYVIO',NULL,'2023-10-01 13:26:54','2023-10-01 13:26:54','image/def/user.png',NULL,NULL,NULL),(33,'qwerrr','qwer@qwer.com',NULL,0,'$2y$10$ld3T6f3sD7VYp3zfr9H90eYs8jzYdUn6RfMW9jEG0yWwcVtS16neC',NULL,'2023-10-01 14:09:14','2023-10-01 14:09:14','image/def/user.png',NULL,NULL,NULL),(34,'nukampong','nukampong221@gmail.com',NULL,0,'$2y$10$GdSJi22i1xgN7gvc.wfwaelEM5kTv.FHaGIl0bZ7Y6WztpZWFL6Ee',NULL,'2023-10-01 14:19:27','2023-10-01 14:21:54','image/profile/1696170114.jpg','แก้มป้อง','ป๋องแป๋ง','1993-10-30'),(35,'เสี่ยนิวบางทราย','soi1dd@gmail.com',NULL,0,'$2y$10$C/YG8t4FTBqP924vViW7HuzTZgvnDDmJ.P1Qm/goK/s67Ef/jGYke',NULL,'2023-10-01 14:48:21','2023-10-01 15:06:49','image/profile/1696172809.jpg','ชินิว','พ่อบ้านใหญ่คุกบางทราย','1984-12-31'),(36,'gumairoo','gumairoo@hotmail.com',NULL,0,'$2y$10$R0qRE7ThdQiHjR6DhaJJqOi8fjF9EYWY7F.t0JHYF3njS5o4iTilq',NULL,'2023-10-02 13:32:02','2023-10-02 13:35:04','image/profile/1696253704.png','ลิปั้ว','มาดงเซา','2003-11-19'),(37,'ซงลงมงเป','kummeesor@go.buu.ac.th',NULL,0,'$2y$10$DlN4oWOgSYR/rrilmZgAeOVcmLeZAEr.ax/fqewZWlP/hBnmohrDm',NULL,'2023-10-03 06:08:52','2023-10-03 06:10:01','image/def/user.png','เซกะลง','ลงกา','2023-10-02'),(38,'nnewess','test@go.buu.ac.th',NULL,0,'$2y$10$PjeLvNTjFzZW0DDwlulKNeVh././CLEXYNEdUCZxyAsKF.CT3WZcG',NULL,'2023-10-03 06:16:23','2023-10-03 06:21:12','image/profile/1696313867.png','Sathaporn','Laddawan','2023-10-01'),(39,'Aekapop Bunpeng','aekapop@buu.ac.th',NULL,0,'$2y$10$1qgTojFHlEkvlMrhodaZPOPmJb9iDSXbVw2sBFJrfAj6YGcGq7Koq',NULL,'2023-10-03 06:57:55','2023-10-03 06:57:55','image/def/user.png',NULL,NULL,NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-10-08 14:17:46
