-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2018 at 02:27 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webthuongmai`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `first_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `last_name` varchar(50) CHARACTER SET latin1 NOT NULL,
  `email` varchar(150) CHARACTER SET latin1 NOT NULL,
  `password` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `email`, `password`) VALUES
(1, 'Minh Duc', 'Do', 'duc@gmail.com', '123'),
(2, 'Minh Duc', 'Do', 'duc@gmail.com', '26031994');

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `Masach` int(11) NOT NULL,
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
  `Thoigianck` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`Masach`, `Loaisach`, `Tensach`, `Gia`, `anh`, `Sotrang`, `Ngayxuatban`, `Mota`, `Soluong`, `Trangthai`, `Nhaphathanh`, `Chietkhau`, `Thoigianck`) VALUES
(1, 1, '1088 CÂU ĐỐ PHÁT TRIỂN TRÍ TUỆ 3-4 TUỔI (BỘ 4 Q)hahahha', 144000, '20180830211524-51xqyzh2hcl.-ss500-.jpg', 48, '2018-07-02', 'daksndkasjdksla', 97, b'1', 13, 0, NULL),
(5, 7, 'CẨM NANG SINH HOẠT BẰNG TRANH CHO BÉ (BỘ 4Q)', 128000, '20180830211151-t---i-xu---ng--1-.jpg', 45, NULL, 'Cẩm Nang Sinh Hoạt Bằng Tranh Cho Bé - Kĩ Năng Trong Sinh Hoạt Thường Ngày\r\n\r\nCẩm nang sinh hoạt bằng tranh cho bé là bộ sách giáo dục bằng tranh, khổ to, gồm 4 cuốn, là những chỉ dẫn cụ thể bằng tranh về các qui tắc, cách thức ứng xử, hoạt động trong cuộc sống hàng ngày cho trẻ từ khoảng 3 tuổi đến khi vào lớp 1.\r\n\r\n- Cuốn Kĩ năng trong sinh hoạt thường ngày hướng dẫn cho các em tự làm những việc đơn giản như gấp chăn màn, quần áo, đánh răng, rửa mặt, tự dọn đồ chơi sau khi chơi xong, tự mặc quần áo, đi ngủ đúng giờ…\r\n\r\n- Cuốn Kĩ năng khi ăn uống hướng dẫn các em từ cách cầm thìa, đũa sao cho đúng cách, rửa tay trước khi ăn, lấy lượng thức ăn vừa đủ ăn, ăn hết phần của mình…Và còn rất nhiều những bài học thú vị khác đang chờ đón các em!\r\n\r\n- Cuốn Kĩ năng giao tiếp giúp bé sống hòa thuận với mọi người trong gia đình, học cách đối xử với thầy cô, bạn bè, hàng xóm...\r\n\r\n- Cuốn Kĩ năng đi ra ngoài giúp bé trả lời những câu hỏi Đi bằng phương tiện nào? Mang theo những gì? Có nên mua sắm khi đi chơi?...\r\n\r\nCác hướng dẫn trong sách tuy đơn giản, gần gũi nhưng rất quan trọng trong quá trình phát triển của trẻ, giúp trẻ có tính tự lập, biết giúp đỡ ông bà bố mẹ, đối xử tốt với mọi người xung quanh.\r\n\r\n ', 94, b'1', 13, 0, NULL),
(6, 7, 'CÙNG CON LỚN KHÔN - BỘ 1 XÂY DỰNG NHÂN CÁCH (6Q)', 210000, '20180828090846-t---i-xu---ng.jpg', NULL, '2018-07-10', 'Cùng con lớn khôn - Bộ 1 Xây Dựng Nhân Cách (6q)\r\n\r\n------------------\r\nCác em có khả năng trở thành đứa trẻ ngoan và luôn háo hức được thực hiện điều đó.  Tuy nhiên trẻ con thường không nhận thức được những hành vi ích kỷ hay việc coi mình la trung tâm. Tự coi mình là trung tâm thường dẫn đến cách cư xử không hay, và điều đó sẽ dẫn đến những phản ứng tiêu cực từ mọi người xung quanh. Và chẳng bao lâu, con bạn sẽ bị cuốn vào vòng xoay của hành động và phản ứng tiêu cực.\r\nMục đích của bộ sách “CÙNG CON LỚN KHÔN” là giúp các em phá vỡ được vòng xoay của hành động và phản ứng tiêu cực. Con bạn sẽ học cách thay những hành vi không tốt bằng cách những hành vi phù hợp. Mỗi cuốn cùng con lớn khôn được thiết kế để làm những việc sau một cách thỏa mái:\r\n\r\n1. Nhận diện hành vi không tốt\r\n\r\n2. Giải thích nguyên nhân, hành vi không tốt\r\n\r\n3. Thảo luận những ảnh hưởng tiêu cực của các hành vi không tốt\r\n\r\n4. Đưa ra các gợi ý để thay thế những hành vi không hay bằng những hành vi đúng đắn.\r\nTrong khi đọc từng cuốn CÙNG CON LỚN KHÔN khi con cần đọc sẽ đem lại hiệu quả, cả bộ sách cũng được thiết kế dựa theo quá trình phát trển thông thường của một đứa trẻ. Vì vậy, việc giới thiệu các cuốn sách đến con bạn thwo thứ tự được liệt kê ở bìa sau cuốn sách này cũng sẽ thu được kết quả tốt.\r\n\r\nKhi bạn và con đọc bộ sách CÙNG CON LỚN KHÔN, con bạn sẽ xây dựng được thói quen tốt giúp hình thành lòng tự trọng tích cực và những mối quan hệ bền vững. Đọc các cuốn sách này cũng sẽ giúp tạo dựng bầu không khí thân thiện, vui vẻ hơn trong gia đình bạn. Cảm ơn bạn vì cho phép tôi được trở thành 1 phần của hành trình nỗ lực thú vị này\r\n\r\n \r\n\r\nTủ sách kinh điển của Joy Berry là tuyển tập những tựa sách bán chạy nhất trong tủ sách của Joy trong số 240 cuốn sách Kỹ Năng Sống dành cho thiếu nhi.\r\n\r\n \r\n\r\nLà một nhà giáo dục, nhà nghiên cứu phát triển nhân cách, cũng là “người sáng lập bộ sách Kỹ Năng Sống dành cho thiếu nhi”, Joy Berry thấu hiểu các bạn nhỏ. Những cuốn sách của cô dạy các bạn nhỏ cách chịu trách nhiệm cho bản thân và hành động của mình. Với hơn 85 triệu cuốn sách đã được bán ra, Joy đã giúp đỡ hàng triệu bậc phụ huynh và con em họ.', 300, b'1', 19, 0, NULL),
(7, 2, 'VƯỢT QUA CHỨNG TỰ KỶ', 92000, '20180822084102-41jvrdnqpcl.-ss500-.jpg', 412, '2018-08-06', 'VƯỢT QUA CHỨNG TỰ KỶ VỚI THE SON – RISE PROGRAM\r\n\r\n \r\n\r\nKhi còn là một cậu bé, Raun Kaufman được chẩn đoán bởi các chuyên gia rằng cậu mắc hội chứng tự kỷ nặng, với chỉ số IQ thấp dưới 30, và đây là một tình trạng sẽ theo cậu suốt đời, không có gì thay đổi. Nhiều năm sau đó, Raun tốt nghiệp với tấm bằng Đạo Đức Y Sinh của đại học Brown và trở thành một chuyên gia trong lĩnh vực tự kỷ, một nhà giáo dục với niềm đam mê và ăn nói lưu loát. Vậy chuyện gì đã xảy ra?\r\n\r\nMột lời cảm ơn dành cho chương trình The Son-Rise Program®, một phương pháp đột phá được tạo ra bởi chính phụ huynh của Raun, đã giúp ông hồi phục từ chính chứng tự kỷ của mình. ( Câu chuyện của Raun được thuật lại chi tiết trong quyển Son Rise: Tiếp Nối Điều Kì Diệu một quyển sách bán chạy và nhận được giải thưởng của kênh truyền hình NBC dành cho bộ phim truyền hình Son Rise: Điều Kì Diệu Của Tình Yêu Thương).', 100, b'1', 14, 0, NULL),
(8, 1, '200 MIẾNG BÓC DÁN THÔNG MINH - DÀNH CHO TRẺ 2-10 TUỔI (BỘ 6Q)', 264000, '41tvgoec72l.-ss500-.jpg', 32, '2018-08-22', '200 Miếng Bóc Dán Thông Minh - Dành Cho Trẻ 2-10 Tuổi (Bộ 6q)\r\n\r\n \r\n\r\nBộ gồm 6 quyển:\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Tình cảm EQ - Tập 1, Tập 2\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Thông minh IQ - Tập 1, Tập 2\r\n\r\n- 200 miếng bóc dán thông minh phát triển chỉ số Thông minh Sáng tạo CQ - Tập 1, Tập 2\r\n\r\nĐây là một bộ sách bóc dán tranh vô cùng thú vị và bổ ích. Các bạn nhỏ không cần phải tô tô vẽ vẽ, chỉ cần nhìn, lật giở, tìm kiếm, suy nghĩ và sáng tạo một chút, bóc decal và dán… Thế là một bức tranh hoàn chỉnh đã hiện ra trước mắt rồi, thật đẹp phải không nào! Ngoài ra, trong quá trình chơi này, các bạn nhỏ sẽ phát huy được tối đa khả năng tưởng tượng, khả năng phân tích và đánh giá, sức sáng tạo, sự quan sát…', 100, b'1', 17, 0, NULL),
(9, 11, '15 CÁCH GIÚP TRẺ TƯ DUY SỐ HỌC', 69000, '51xqyzh2hcl.-ss500-.jpg', 40, '2018-08-10', 'djkasjdksajka', 50, b'1', 17, 0, NULL),
(10, 2, 'PHÁT TRIỂN KỸ NĂNG GIAO TIẾP (10 Q)', 88000, '20180828110001-20180828092642-toi-thay-hoa-vang-tren-co-xanh.jpg', NULL, '2017-12-19', 'Bộ Sách Kĩ Năng Giao Tiếp (Dành Cho Bé 2-6 Tuổi)\r\n\r\nKhả năng giao tiếp hạn chế dễ tạo nên những tổn thất lớn về tâm sinh lí của mỗi người, nhất là đối với trẻ nhỏ. Bộ sách Kĩ Năng Giao Tiếp sẽ giúp cho các bé 2-6 tuổi nhanh chóng có kĩ năng giao tiếp tốt. Những câu chuyện trong sách khiến bé hiểu khi nào cần nói lời chào, lời mời, lời cảm ơn, lời xin lỗi, v.v...Những câu nói hay, những cử chỉ đẹp sẽ khiến bé trở thành một người thân thiện và vô cùng đáng mến!\r\n\r\nBộ sách là tập hợp của 10 câu chuyện về: Lời Chúc, Lời Tạm Biệt, Lời Cảm Ơn, Lời Từ Chối, Lời Mời, Lời Hứa, Lời Khen, Lời Chào, Lời Xin Lỗi và Lời An Ủi.', 50, b'1', 13, 0, NULL),
(11, 6, 'BỒI ĐẮP TÍNH CÁCH, NUÔI DƯỠNG TÂM HỒN (BỘ 4Q)', 176000, '20180828092642-toi-thay-hoa-vang-tren-co-xanh.jpg', 30, '2018-08-08', 'Bồi Đắp Tính Cách, Nuôi Dưỡng Tâm Hồn - Thói Quen Tốt, Tính Cách Tốt\r\n\r\nCuốn sách sẽ là người bạn đồng hành đáng tin cậy của bậc cha mẹ, phụ huynh để gửi đến bé những bài học giúp xây dựng nên tính cách và tâm hồn tốt đẹp, trong trẻo cho bé ngay từ những tháng năm thơ ấu qua những trang sách ngập tràn hình ảnh và màu sắc sinh động, cuốn hút.', 50, b'1', 13, 0, NULL),
(12, 2, 'Sách nuối dạy trẻ lên 5', 40, 't---i-xu---ng--1-.jpg', 45, '2018-08-05', 'abc 123 xyz', 35, NULL, 14, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `book_category`
--

CREATE TABLE `book_category` (
  `Maloaisach` int(11) NOT NULL,
  `Tenloai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Tinhtrang` bit(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book_category`
--

INSERT INTO `book_category` (`Maloaisach`, `Tenloai`, `Tinhtrang`) VALUES
(1, 'SÁCH PHÁT TRIỂN TRÍ TUỆ', b'1'),
(2, 'Sách Nuôi Dạy Con', b'1'),
(6, 'Sách Nuôi Dưỡng Tâm Hồn', b'1'),
(7, 'Sách Kỹ Năng Sống Cho Bé', b'1'),
(8, 'Bảng Ghép IQ 9 Mảnh', b'1'),
(9, 'Bảng ghép IQ các chủ đề', b'1'),
(11, 'Bảng Ghép IQ 70 Mảnh', b'1'),
(12, 'Bảng Ghép IQ 80 Mảnh', b'1');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `id` int(11) NOT NULL,
  `name` varchar(150) CHARACTER SET latin1 NOT NULL,
  `address` text CHARACTER SET latin1 NOT NULL,
  `telephone` varchar(100) CHARACTER SET latin1 NOT NULL,
  `email` varchar(200) CHARACTER SET latin1 NOT NULL,
  `website` varchar(200) CHARACTER SET latin1 NOT NULL,
  `vat_rate` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`id`, `name`, `address`, `telephone`, `email`, `website`, `vat_rate`) VALUES
(1, 'T? sách thi?u nhi', 'So 18, Ngo 3, Thai Ha, Dong Da, Ha Noi', '01663056625', 'tusachthieunhivn@gmail.com', 'www.24h.com.vn', '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `chitietgiohang`
--

CREATE TABLE `chitietgiohang` (
  `Magiohang` int(11) NOT NULL,
  `Masach` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giamua` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `chitietgiohang`
--

INSERT INTO `chitietgiohang` (`Magiohang`, `Masach`, `Soluong`, `Giamua`) VALUES
(25, 1, 1, 144000);

-- --------------------------------------------------------

--
-- Table structure for table `cthoadon`
--

CREATE TABLE `cthoadon` (
  `Mahd` int(11) NOT NULL,
  `Masach` int(11) NOT NULL,
  `Soluong` int(11) NOT NULL,
  `Giamua` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `cthoadon`
--

INSERT INTO `cthoadon` (`Mahd`, `Masach`, `Soluong`, `Giamua`) VALUES
(11, 1, 1, 144000),
(11, 10, 2, 88000),
(12, 1, 1, 144000),
(12, 5, 2, 128000),
(13, 1, 1, 144000),
(13, 8, 1, 264000),
(14, 1, 1, 144000),
(16, 1, 1, 144000),
(17, 1, 1, 144000),
(18, 1, 1, 144000),
(19, 1, 1, 144000),
(19, 6, 2, 210000);

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `Magiohang` int(11) NOT NULL,
  `Makh` int(11) DEFAULT NULL,
  `Ngaydat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `giohang`
--

INSERT INTO `giohang` (`Magiohang`, `Makh`, `Ngaydat`) VALUES
(22, 5, '2018-09-09'),
(23, 0, '2018-09-12'),
(24, 0, '2018-09-12'),
(25, 6, '2018-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `Mahd` int(11) NOT NULL,
  `Makh` int(11) NOT NULL,
  `Ngaydat` date NOT NULL,
  `Tinhtrang` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`Mahd`, `Makh`, `Ngaydat`, `Tinhtrang`) VALUES
(11, 5, '2018-09-09', 0),
(12, 5, '2018-09-09', 2),
(13, 5, '2018-09-09', 1),
(14, 5, '2018-09-09', 1),
(16, 5, '2018-09-09', 1),
(17, 5, '2018-09-09', 0),
(18, 5, '2018-09-09', 0),
(19, 5, '2018-09-09', 0);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `Manhaphathanh` int(11) NOT NULL,
  `Tennhaphathanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`Manhaphathanh`, `Tennhaphathanh`) VALUES
(13, 'IBook'),
(14, 'Đinh Tỵ 123'),
(17, 'Nhã Nam'),
(19, 'Ping Book'),
(20, 'Thái Hà'),
(21, 'Kim Đồng'),
(22, 'Thái Hà 2');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_ID` int(11) NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Hoten` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Sodt` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Diachi` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Loainguoidung` int(11) NOT NULL,
  `Trangthai` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_ID`, `Email`, `Password`, `Hoten`, `Sodt`, `Diachi`, `Loainguoidung`, `Trangthai`) VALUES
(1, 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'admin', '12345678', 'Ba Đình, Hà Nội', 2, b'1'),
(5, 'vinhdt2910@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'hahhaha', '0963113051', 'hà nội', 2, b'1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`Masach`);

--
-- Indexes for table `book_category`
--
ALTER TABLE `book_category`
  ADD PRIMARY KEY (`Maloaisach`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chitietgiohang`
--
ALTER TABLE `chitietgiohang`
  ADD PRIMARY KEY (`Magiohang`,`Masach`);

--
-- Indexes for table `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`Mahd`,`Masach`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`Magiohang`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`Mahd`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`Manhaphathanh`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `Masach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `book_category`
--
ALTER TABLE `book_category`
  MODIFY `Maloaisach` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `Magiohang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `Mahd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `Manhaphathanh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
