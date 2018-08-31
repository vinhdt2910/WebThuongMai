-- MySQL dump 10.16  Distrib 10.1.13-MariaDB, for Win32 (AMD64)
--
-- Host: localhost    Database: webthuongmai
-- ------------------------------------------------------
-- Server version	10.1.13-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (1,'Minh Duc','Do','duc@gmail.com','123'),(2,'Minh Duc','Do','duc@gmail.com','26031994');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book` (
  `Masach` int(11) NOT NULL AUTO_INCREMENT,
  `Loaisach` int(11) NOT NULL,
  `Tensach` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Gia` double DEFAULT NULL,
  `anh` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sotrang` int(11) DEFAULT NULL,
  `Ngayxuatban` date DEFAULT NULL,
  `Mota` text COLLATE utf8_unicode_ci,
  `Soluong` int(11) DEFAULT NULL,
  `Trangthai` bit(1) DEFAULT NULL,
  `Nhaphathanh` int(11) DEFAULT NULL,
  `Chietkhau` int(11) NOT NULL DEFAULT '0',
  `Thoigianck` date DEFAULT NULL,
  PRIMARY KEY (`Masach`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book`
--

LOCK TABLES `book` WRITE;
/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` VALUES (1,1,'1088 CÂU ĐỐ PHÁT TRIỂN TRÍ TUỆ 3-4 TUỔI (BỘ 4 Q)',144000,'20180830211524-51xqyzh2hcl.-ss500-.jpg',48,'2018-07-02','daksndkasjdksla',100,'',13,0,NULL),(5,7,'CẨM NANG SINH HOẠT BẰNG TRANH CHO BÉ (BỘ 4Q)',128000,'20180830211151-t---i-xu---ng--1-.jpg',45,NULL,'Cẩm Nang Sinh Hoạt Bằng Tranh Cho Bé - Kĩ Năng Trong Sinh Hoạt Thường Ngày\r\n\r\nCẩm nang sinh hoạt bằng tranh cho bé là bộ sách giáo dục bằng tranh, khổ to, gồm 4 cuốn, là những chỉ dẫn cụ thể bằng tranh về các qui tắc, cách thức ứng xử, hoạt động trong cuộc sống hàng ngày cho trẻ từ khoảng 3 tuổi đến khi vào lớp 1.\r\n\r\n- Cuốn Kĩ năng trong sinh hoạt thường ngày hướng dẫn cho các em tự làm những việc đơn giản như gấp chăn màn, quần áo, đánh răng, rửa mặt, tự dọn đồ chơi sau khi chơi xong, tự mặc quần áo, đi ngủ đúng giờ…\r\n\r\n- Cuốn Kĩ năng khi ăn uống hướng dẫn các em từ cách cầm thìa, đũa sao cho đúng cách, rửa tay trước khi ăn, lấy lượng thức ăn vừa đủ ăn, ăn hết phần của mình…Và còn rất nhiều những bài học thú vị khác đang chờ đón các em!\r\n\r\n- Cuốn Kĩ năng giao tiếp giúp bé sống hòa thuận với mọi người trong gia đình, học cách đối xử với thầy cô, bạn bè, hàng xóm...\r\n\r\n- Cuốn Kĩ năng đi ra ngoài giúp bé trả lời những câu hỏi Đi bằng phương tiện nào? Mang theo những gì? Có nên mua sắm khi đi chơi?...\r\n\r\nCác hướng dẫn trong sách tuy đơn giản, gần gũi nhưng rất quan trọng trong quá trình phát triển của trẻ, giúp trẻ có tính tự lập, biết giúp đỡ ông bà bố mẹ, đối xử tốt với mọi người xung quanh.\r\n\r\n ',100,'',13,0,NULL),(6,7,'CÙNG CON LỚN KHÔN - BỘ 1 XÂY DỰNG NHÂN CÁCH (6Q)',210000,'20180828090846-t---i-xu---ng.jpg',NULL,'2018-07-10','Cùng con lớn khôn - Bộ 1 Xây Dựng Nhân Cách (6q)\r\n\r\n------------------\r\nCác em có khả năng trở thành đứa trẻ ngoan và luôn háo hức được thực hiện điều đó.  Tuy nhiên trẻ con thường không nhận thức được những hành vi ích kỷ hay việc coi mình la trung tâm. Tự coi mình là trung tâm thường dẫn đến cách cư xử không hay, và điều đó sẽ dẫn đến những phản ứng tiêu cực từ mọi người xung quanh. Và chẳng bao lâu, con bạn sẽ bị cuốn vào vòng xoay của hành động và phản ứng tiêu cực.\r\nMục đích của bộ sách “CÙNG CON LỚN KHÔN” là giúp các em phá vỡ được vòng xoay của hành động và phản ứng tiêu cực. Con bạn sẽ học cách thay những hành vi không tốt bằng cách những hành vi phù hợp. Mỗi cuốn cùng con lớn khôn được thiết kế để làm những việc sau một cách thỏa mái:\r\n\r\n1. Nhận diện hành vi không tốt\r\n\r\n2. Giải thích nguyên nhân, hành vi không tốt\r\n\r\n3. Thảo luận những ảnh hưởng tiêu cực của các hành vi không tốt\r\n\r\n4. Đưa ra các gợi ý để thay thế những hành vi không hay bằng những hành vi đúng đắn.\r\nTrong khi đọc từng cuốn CÙNG CON LỚN KHÔN khi con cần đọc sẽ đem lại hiệu quả, cả bộ sách cũng được thiết kế dựa theo quá trình phát trển thông thường của một đứa trẻ. Vì vậy, việc giới thiệu các cuốn sách đến con bạn thwo thứ tự được liệt kê ở bìa sau cuốn sách này cũng sẽ thu được kết quả tốt.\r\n\r\nKhi bạn và con đọc bộ sách CÙNG CON LỚN KHÔN, con bạn sẽ xây dựng được thói quen tốt giúp hình thành lòng tự trọng tích cực và những mối quan hệ bền vững. Đọc các cuốn sách này cũng sẽ giúp tạo dựng bầu không khí thân thiện, vui vẻ hơn trong gia đình bạn. Cảm ơn bạn vì cho phép tôi được trở thành 1 phần của hành trình nỗ lực thú vị này\r\n\r\n \r\n\r\nTủ sách kinh điển của Joy Berry là tuyển tập những tựa sách bán chạy nhất trong tủ sách của Joy trong số 240 cuốn sách Kỹ Năng Sống dành cho thiếu nhi.\r\n\r\n \r\n\r\nLà một nhà giáo dục, nhà nghiên cứu phát triển nhân cách, cũng là “người sáng lập bộ sách Kỹ Năng Sống dành cho thiếu nhi”, Joy Berry thấu hiểu các bạn nhỏ. Những cuốn sách của cô dạy các bạn nhỏ cách chịu trách nhiệm cho bản thân và hành động của mình. Với hơn 85 triệu cuốn sách đã được bán ra, Joy đã giúp đỡ hàng triệu bậc phụ huynh và con em họ.',300,'',19,0,NULL),(7,2,'VƯỢT QUA CHỨNG TỰ KỶ',92000,'20180822084102-41jvrdnqpcl.-ss500-.jpg',412,'2018-08-06','VƯỢT QUA CHỨNG TỰ KỶ VỚI THE SON – RISE PROGRAM\r\n\r\n \r\n\r\nKhi còn là một cậu bé, Raun Kaufman được chẩn đoán bởi các chuyên gia rằng cậu mắc hội chứng tự kỷ nặng, với chỉ số IQ thấp dưới 30, và đây là một tình trạng sẽ theo cậu suốt đời, không có gì thay đổi. Nhiều năm sau đó, Raun tốt nghiệp với tấm bằng Đạo Đức Y Sinh của đại học Brown và trở thành một chuyên gia trong lĩnh vực tự kỷ, một nhà giáo dục với niềm đam mê và ăn nói lưu loát. Vậy chuyện gì đã xảy ra?\r\n\r\nMột lời cảm ơn dành cho chương trình The Son-Rise Program®, một phương pháp đột phá được tạo ra bởi chính phụ huynh của Raun, đã giúp ông hồi phục từ chính chứng tự kỷ của mình. ( Câu chuyện của Raun được thuật lại chi tiết trong quyển Son Rise: Tiếp Nối Điều Kì Diệu một quyển sách bán chạy và nhận được giải thưởng của kênh truyền hình NBC dành cho bộ phim truyền hình Son Rise: Điều Kì Diệu Của Tình Yêu Thương).',100,'',14,0,NULL),(8,1,'200 MIẾNG BÓC DÁN THÔNG MINH - DÀNH CHO TRẺ 2-10 TUỔI (BỘ 6Q)',264000,'41tvgoec72l.-ss500-.jpg',32,'2018-08-22','200 Miếng Bóc Dán Thông Minh - Dành Cho Trẻ 2-10 Tuổi (Bộ 6q)\r\n\r\n \r\n\r\nBộ gồm 6 quyển:\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Tình cảm EQ - Tập 1, Tập 2\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Thông minh IQ - Tập 1, Tập 2\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Thông minh Sáng tạo CQ - Tập 1, Tập 2\r\n\r\nĐây là một bộ sách bóc dán tranh vô cùng thú vị và bổ ích. Các bạn nhỏ không cần phải tô tô vẽ vẽ, chỉ cần nhìn, lật giở, tìm kiếm, suy nghĩ và sáng tạo một chút, bóc decal và dán… Thế là một bức tranh hoàn chỉnh đã hiện ra trước mắt rồi, thật đẹp phải không nào! Ngoài ra, trong quá trình chơi này, các bạn nhỏ sẽ phát huy được tối đa khả năng tưởng tượng, khả năng phân tích và đánh giá, sức sáng tạo, sự quan sát…',100,'',17,0,NULL),(9,11,'15 CÁCH GIÚP TRẺ TƯ DUY SỐ HỌC',69000,'51xqyzh2hcl.-ss500-.jpg',40,'2018-08-10','djkasjdksajka',50,'',17,0,NULL),(10,2,'PHÁT TRIỂN KỸ NĂNG GIAO TIẾP (10 Q)',88000,'20180828110001-20180828092642-toi-thay-hoa-vang-tren-co-xanh.jpg',NULL,'2017-12-19','Bộ Sách Kĩ Năng Giao Tiếp (Dành Cho Bé 2-6 Tuổi)\r\n\r\nKhả năng giao tiếp hạn chế dễ tạo nên những tổn thất lớn về tâm sinh lí của mỗi người, nhất là đối với trẻ nhỏ. Bộ sách Kĩ Năng Giao Tiếp sẽ giúp cho các bé 2-6 tuổi nhanh chóng có kĩ năng giao tiếp tốt. Những câu chuyện trong sách khiến bé hiểu khi nào cần nói lời chào, lời mời, lời cảm ơn, lời xin lỗi, v.v...Những câu nói hay, những cử chỉ đẹp sẽ khiến bé trở thành một người thân thiện và vô cùng đáng mến!\r\n\r\nBộ sách là tập hợp của 10 câu chuyện về: Lời Chúc, Lời Tạm Biệt, Lời Cảm Ơn, Lời Từ Chối, Lời Mời, Lời Hứa, Lời Khen, Lời Chào, Lời Xin Lỗi và Lời An Ủi.',50,'',13,0,NULL),(11,6,'BỒI ĐẮP TÍNH CÁCH, NUÔI DƯỠNG TÂM HỒN (BỘ 4Q)',176000,'20180828092642-toi-thay-hoa-vang-tren-co-xanh.jpg',30,'2018-08-08','Bồi Đắp Tính Cách, Nuôi Dưỡng Tâm Hồn - Thói Quen Tốt, Tính Cách Tốt\r\n\r\nCuốn sách sẽ là người bạn đồng hành đáng tin cậy của bậc cha mẹ, phụ huynh để gửi đến bé những bài học giúp xây dựng nên tính cách và tâm hồn tốt đẹp, trong trẻo cho bé ngay từ những tháng năm thơ ấu qua những trang sách ngập tràn hình ảnh và màu sắc sinh động, cuốn hút.',50,'',13,0,NULL),(12,2,'Sách nuối dạy trẻ lên 5',40,'t---i-xu---ng--1-.jpg',45,'2018-08-05','abc 123 xyz',35,NULL,14,0,NULL);
/*!40000 ALTER TABLE `book` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `book_category`
--

DROP TABLE IF EXISTS `book_category`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `book_category` (
  `Maloaisach` int(11) NOT NULL AUTO_INCREMENT,
  `Tenloai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tinhtrang` bit(1) DEFAULT NULL,
  PRIMARY KEY (`Maloaisach`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `book_category`
--

LOCK TABLES `book_category` WRITE;
/*!40000 ALTER TABLE `book_category` DISABLE KEYS */;
INSERT INTO `book_category` VALUES (1,'SÁCH PHÁT TRIỂN TRÍ TUỆ',''),(2,'Sách Nuôi Dạy Con',''),(6,'Sách Nuôi Dưỡng Tâm Hồn',''),(7,'Sách Kỹ Năng Sống Cho Bé',''),(8,'Bảng Ghép IQ 9 Mảnh',''),(9,'Bảng ghép IQ các chủ đề',''),(10,'Bảng Ghép IQ 60 Mảnh',''),(11,'Bảng Ghép IQ 70 Mảnh',''),(12,'Bảng Ghép IQ 80 Mảnh','');
/*!40000 ALTER TABLE `book_category` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `business`
--

DROP TABLE IF EXISTS `business`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `business` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `address` text NOT NULL,
  `telephone` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business`
--

LOCK TABLES `business` WRITE;
/*!40000 ALTER TABLE `business` DISABLE KEYS */;
INSERT INTO `business` VALUES (1,'Nguyen Nam Book Store','So 18, Ngo 3, Thai Ha, Dong Da, Ha Noi','01663056625','minhducdo2603@gmail.com','www.24h.com.vn',10.00);
/*!40000 ALTER TABLE `business` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chitietgiohang`
--

DROP TABLE IF EXISTS `chitietgiohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `chitietgiohang` (
  `Magiohang` int(11) NOT NULL,
  `Masach` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giamua` double NOT NULL,
  PRIMARY KEY (`Magiohang`,`Masach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chitietgiohang`
--

LOCK TABLES `chitietgiohang` WRITE;
/*!40000 ALTER TABLE `chitietgiohang` DISABLE KEYS */;
INSERT INTO `chitietgiohang` VALUES (2,1,3,144000),(2,8,6,264000);
/*!40000 ALTER TABLE `chitietgiohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cthoadon`
--

DROP TABLE IF EXISTS `cthoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cthoadon` (
  `Mahd` int(11) NOT NULL,
  `Masach` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giamua` double NOT NULL,
  PRIMARY KEY (`Mahd`,`Masach`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cthoadon`
--

LOCK TABLES `cthoadon` WRITE;
/*!40000 ALTER TABLE `cthoadon` DISABLE KEYS */;
INSERT INTO `cthoadon` VALUES (1,8,5,4000),(1,9,5,3000),(1,11,5,9000);
/*!40000 ALTER TABLE `cthoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `giohang`
--

DROP TABLE IF EXISTS `giohang`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `giohang` (
  `Magiohang` int(11) NOT NULL AUTO_INCREMENT,
  `Makh` int(11) DEFAULT NULL,
  `Ngaydat` date DEFAULT NULL,
  PRIMARY KEY (`Magiohang`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `giohang`
--

LOCK TABLES `giohang` WRITE;
/*!40000 ALTER TABLE `giohang` DISABLE KEYS */;
INSERT INTO `giohang` VALUES (2,4,'2018-08-29');
/*!40000 ALTER TABLE `giohang` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `hoadon` (
  `Mahd` int(11) NOT NULL AUTO_INCREMENT,
  `Makh` int(11) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Tinhtrang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Mahd`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hoadon`
--

LOCK TABLES `hoadon` WRITE;
/*!40000 ALTER TABLE `hoadon` DISABLE KEYS */;
INSERT INTO `hoadon` VALUES (1,1,'2018-04-03','Pending');
/*!40000 ALTER TABLE `hoadon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `publisher`
--

DROP TABLE IF EXISTS `publisher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `publisher` (
  `Manhaphathanh` int(11) NOT NULL AUTO_INCREMENT,
  `Tennhaphathanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`Manhaphathanh`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `publisher`
--

LOCK TABLES `publisher` WRITE;
/*!40000 ALTER TABLE `publisher` DISABLE KEYS */;
INSERT INTO `publisher` VALUES (13,'IBook'),(14,'Đinh Tỵ 123'),(17,'Nhã Nam'),(19,'Ping Book'),(20,'Thái Hà'),(21,'Kim Đồng'),(22,'Thái Hà 2');
/*!40000 ALTER TABLE `publisher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL AUTO_INCREMENT,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sodt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Loainguoidung` int(11) NOT NULL,
  `Trangthai` bit(1) NOT NULL,
  PRIMARY KEY (`User_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','admin','12345678','Ba Đình, Hà Nội',1,''),(4,'vinhdt2910@gmail.com','e10adc3949ba59abbe56e057f20f883e','vinhdaica','0963113051','hà nội',2,'');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-08-31  3:17:49
