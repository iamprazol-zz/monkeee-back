-- MySQL dump 10.13  Distrib 5.7.23, for Linux (x86_64)
--
-- Host: localhost    Database: monkeee
-- ------------------------------------------------------
-- Server version	5.7.23-0ubuntu0.18.04.1
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO,POSTGRESQL' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table "categories"
--

DROP TABLE IF EXISTS "categories";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "categories" (
  "id" int(10) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "categories"
--

LOCK TABLES "categories" WRITE;
/*!40000 ALTER TABLE "categories" DISABLE KEYS */;
INSERT INTO "categories" VALUES (1,'techno','2018-10-25 05:27:18','2018-10-25 05:27:18'),(2,'deep house','2018-10-25 05:27:18','2018-10-25 05:27:18'),(3,'latino americano','2018-10-25 05:27:18','2018-10-25 05:27:18');
/*!40000 ALTER TABLE "categories" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "club_galleries"
--

DROP TABLE IF EXISTS "club_galleries";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "club_galleries" (
  "id" int(10) unsigned NOT NULL,
  "club_id" int(10) unsigned NOT NULL,
  "picture" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "description" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "club_galleries"
--

LOCK TABLES "club_galleries" WRITE;
/*!40000 ALTER TABLE "club_galleries" DISABLE KEYS */;
INSERT INTO "club_galleries" VALUES (1,1,'lll','Small Picure description 1','2018-10-25 05:27:18','2018-10-25 05:27:18'),(2,1,'lslaslals','Small Picure description 2','2018-10-25 05:27:18','2018-10-25 05:27:18'),(3,1,'ldldld','Small Picure description 3','2018-10-25 05:27:18','2018-10-25 05:27:18');
/*!40000 ALTER TABLE "club_galleries" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "clubs"
--

DROP TABLE IF EXISTS "clubs";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "clubs" (
  "id" int(10) unsigned NOT NULL,
  "suburb_id" int(10) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "address" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "description" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "cover_photo" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "clubs"
--

LOCK TABLES "clubs" WRITE;
/*!40000 ALTER TABLE "clubs" DISABLE KEYS */;
INSERT INTO "clubs" VALUES (1,1,'Club Doroty','Valley View Road 26','Super Beautiful club.','poudel','2018-10-25 05:27:17','2018-10-25 05:27:17'),(2,2,'Club Margot','Nortond Driver 27','We are techno  club.','kushal','2018-10-25 05:27:17','2018-10-25 05:27:17'),(3,4,'Maroon','new york','Best club in the NY!','saksj.jpg',NULL,NULL);
/*!40000 ALTER TABLE "clubs" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "events"
--

DROP TABLE IF EXISTS "events";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "events" (
  "id" int(10) unsigned NOT NULL,
  "club_id" int(10) unsigned NOT NULL,
  "category_id" int(10) unsigned NOT NULL,
  "date" date NOT NULL,
  "opening" time NOT NULL,
  "closing" time NOT NULL,
  "picture" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "description" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "price" int(10) unsigned NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "events"
--

LOCK TABLES "events" WRITE;
/*!40000 ALTER TABLE "events" DISABLE KEYS */;
INSERT INTO "events" VALUES (1,1,1,'2018-11-14','22:00:00','04:00:00','www.themonkey.com/event/pic_1.png',' mi vida loca ','beautifull event of techno music tututut ',20,'2018-10-25 05:27:18','2018-10-25 05:27:18'),(2,2,1,'2018-10-30','22:00:00','10:00:00','htpps://www.monkee.com// file_path',' Name 2 event','Descripètion event club; lorem ipsum ',10,'2018-10-25 05:27:18','2018-10-25 05:27:18'),(3,1,1,'2018-10-30','04:00:00','16:36:00','htpps://www.monkee.com// file_path',' Name 3 Event ','beautifull event of techno music tututut ',0,'2018-10-25 05:27:18','2018-10-25 05:27:18'),(4,2,3,'2018-11-01','02:00:00','07:07:00','kk.jpg','Rock the pub','best rocing band are invited',50,NULL,NULL);
/*!40000 ALTER TABLE "events" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "migrations"
--

DROP TABLE IF EXISTS "migrations";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "migrations" (
  "id" int(10) unsigned NOT NULL,
  "migration" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "batch" int(11) NOT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "migrations"
--

LOCK TABLES "migrations" WRITE;
/*!40000 ALTER TABLE "migrations" DISABLE KEYS */;
INSERT INTO "migrations" VALUES (92,'2014_10_12_000000_create_users_table',1),(93,'2014_10_12_100000_create_password_resets_table',1),(94,'2018_10_25_081354_create_suburbs_table',1),(95,'2018_10_25_081406_create_clubs_table',1),(96,'2018_10_25_081420_create_events_table',1),(97,'2018_10_25_081433_create_club_galleries_table',1),(98,'2018_10_25_081442_create_categories_table',1);
/*!40000 ALTER TABLE "migrations" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "password_resets"
--

DROP TABLE IF EXISTS "password_resets";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "password_resets" (
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "token" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  KEY "password_resets_email_index" ("email")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "password_resets"
--

LOCK TABLES "password_resets" WRITE;
/*!40000 ALTER TABLE "password_resets" DISABLE KEYS */;
/*!40000 ALTER TABLE "password_resets" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "suburbs"
--

DROP TABLE IF EXISTS "suburbs";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "suburbs" (
  "id" int(10) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "postalcode" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "suburbs"
--

LOCK TABLES "suburbs" WRITE;
/*!40000 ALTER TABLE "suburbs" DISABLE KEYS */;
INSERT INTO "suburbs" VALUES (1,'Gosford','2250','2018-10-25 05:27:17','2018-10-25 05:27:17'),(2,'Mardi','2230','2018-10-25 05:27:17','2018-10-25 05:27:17'),(3,'Wyoming','2200','2018-10-25 05:27:17','2018-10-25 05:27:17'),(4,'Woy Woy','2250','2018-10-25 05:27:17','2018-10-25 05:27:17');
/*!40000 ALTER TABLE "suburbs" ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table "users"
--

DROP TABLE IF EXISTS "users";
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE "users" (
  "id" int(10) unsigned NOT NULL,
  "name" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "email" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "email_verified_at" timestamp NULL DEFAULT NULL,
  "password" varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  "remember_token" varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  "created_at" timestamp NULL DEFAULT NULL,
  "updated_at" timestamp NULL DEFAULT NULL,
  PRIMARY KEY ("id"),
  UNIQUE KEY "users_email_unique" ("email")
);
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table "users"
--

LOCK TABLES "users" WRITE;
/*!40000 ALTER TABLE "users" DISABLE KEYS */;
/*!40000 ALTER TABLE "users" ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-10-27 12:50:01
