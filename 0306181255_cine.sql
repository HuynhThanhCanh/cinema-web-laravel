-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for 0306181255_cine
CREATE DATABASE IF NOT EXISTS `0306181255_cine` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `0306181255_cine`;

-- Dumping structure for table 0306181255_cine.chi_nhanhs
CREATE TABLE IF NOT EXISTS `chi_nhanhs` (
  `MaChiNhanh` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenChiNhanh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongRap` tinyint(4) NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `MaNV` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaChiNhanh`),
  KEY `chi_nhanhs_manv_foreign` (`MaNV`),
  CONSTRAINT `chi_nhanhs_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `nhan_viens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.chi_nhanhs: ~1 rows (approximately)
/*!40000 ALTER TABLE `chi_nhanhs` DISABLE KEYS */;
INSERT INTO `chi_nhanhs` (`MaChiNhanh`, `TenChiNhanh`, `SoLuongRap`, `DiaChi`, `SDT`, `MaNV`, `TrangThai`) VALUES
	(1, 'CB2NT Vạn Hạnh MAll', 1, '11 Sư Vạn Hạnh, Phường 12, Quận 10, Thành phố Hồ Chí Minh', '02838625588', 1, 1);
/*!40000 ALTER TABLE `chi_nhanhs` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.chuc_vus
CREATE TABLE IF NOT EXISTS `chuc_vus` (
  `MaCV` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenCV` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaCV`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.chuc_vus: ~3 rows (approximately)
/*!40000 ALTER TABLE `chuc_vus` DISABLE KEYS */;
INSERT INTO `chuc_vus` (`MaCV`, `TenCV`, `TrangThai`) VALUES
	(1, 'Quản lý', 1),
	(2, 'Bán vé', 1),
	(3, 'Giữ xe', 1);
/*!40000 ALTER TABLE `chuc_vus` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.ds_ves
CREATE TABLE IF NOT EXISTS `ds_ves` (
  `MaDsVe` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `SoLuong` tinyint(4) NOT NULL,
  `TongThanhTien` decimal(65,2) NOT NULL,
  `MaTV` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaDsVe`),
  KEY `ds_ves_matv_foreign` (`MaTV`),
  CONSTRAINT `ds_ves_matv_foreign` FOREIGN KEY (`MaTV`) REFERENCES `thanh_viens` (`MaThanhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.ds_ves: ~4 rows (approximately)
/*!40000 ALTER TABLE `ds_ves` DISABLE KEYS */;
INSERT INTO `ds_ves` (`MaDsVe`, `SoLuong`, `TongThanhTien`, `MaTV`, `TrangThai`) VALUES
	(1, 2, 500000.00, 1, 1),
	(2, 5, 1000000.00, 1, 1),
	(3, 5, 1000000.00, 2, 1),
	(4, 10, 2000000.00, 2, 1);
/*!40000 ALTER TABLE `ds_ves` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.ghes
CREATE TABLE IF NOT EXISTS `ghes` (
  `MaGhe` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `MaLoaiGhe` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `ChiSoHang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ChiSoCot` tinyint(4) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaGhe`),
  KEY `ghes_maloaighe_foreign` (`MaLoaiGhe`),
  CONSTRAINT `ghes_maloaighe_foreign` FOREIGN KEY (`MaLoaiGhe`) REFERENCES `loai_ghes` (`MaLoaiGhe`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.ghes: ~50 rows (approximately)
/*!40000 ALTER TABLE `ghes` DISABLE KEYS */;
INSERT INTO `ghes` (`MaGhe`, `MaLoaiGhe`, `ChiSoHang`, `ChiSoCot`, `TrangThai`) VALUES
	('A1', 'VIP1', 'A', 1, 1),
	('A10', 'VIP1', 'A', 10, 1),
	('A2', 'VIP1', 'A', 2, 1),
	('A3', 'VIP1', 'A', 3, 1),
	('A4', 'VIP1', 'A', 4, 1),
	('A5', 'VIP1', 'A', 5, 1),
	('A6', 'VIP1', 'A', 6, 1),
	('A7', 'VIP1', 'A', 7, 1),
	('A8', 'VIP1', 'A', 8, 1),
	('A9', 'VIP1', 'A', 9, 1),
	('B1', 'TE1', 'B', 1, 1),
	('B10', 'TE1', 'B', 10, 1),
	('B2', 'TE1', 'B', 2, 1),
	('B3', 'TE1', 'B', 3, 1),
	('B4', 'TE1', 'B', 4, 1),
	('B5', 'TE1', 'B', 5, 1),
	('B6', 'TE1', 'B', 6, 1),
	('B7', 'TE1', 'B', 7, 1),
	('B8', 'TE1', 'B', 8, 1),
	('B9', 'TE1', 'B', 9, 1),
	('C1', 'BT1', 'C', 1, 1),
	('C10', 'BT1', 'C', 10, 1),
	('C2', 'BT1', 'C', 2, 1),
	('C3', 'BT1', 'C', 3, 1),
	('C4', 'BT1', 'C', 4, 1),
	('C5', 'BT1', 'C', 5, 1),
	('C6', 'BT1', 'C', 6, 1),
	('C7', 'BT1', 'C', 7, 1),
	('C8', 'BT1', 'C', 8, 1),
	('C9', 'BT1', 'C', 9, 1),
	('D1', 'BT1', 'D', 1, 1),
	('D10', 'BT1', 'D', 10, 1),
	('D2', 'BT1', 'D', 2, 1),
	('D3', 'BT1', 'D', 3, 1),
	('D4', 'BT1', 'D', 4, 1),
	('D5', 'BT1', 'D', 5, 1),
	('D6', 'BT1', 'D', 6, 1),
	('D7', 'BT1', 'D', 7, 1),
	('D8', 'BT1', 'D', 8, 1),
	('D9', 'BT1', 'D', 9, 1),
	('E1', 'BT1', 'E', 1, 1),
	('E10', 'BT1', 'E', 10, 1),
	('E2', 'BT1', 'E', 2, 1),
	('E3', 'BT1', 'E', 3, 1),
	('E4', 'BT1', 'E', 4, 1),
	('E5', 'BT1', 'E', 5, 1),
	('E6', 'BT1', 'E', 6, 1),
	('E7', 'BT1', 'E', 7, 1),
	('E8', 'BT1', 'E', 8, 1),
	('E9', 'BT1', 'E', 9, 1);
/*!40000 ALTER TABLE `ghes` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.gias
CREATE TABLE IF NOT EXISTS `gias` (
  `MaGia` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `DonGia` decimal(8,2) NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaGia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.gias: ~3 rows (approximately)
/*!40000 ALTER TABLE `gias` DISABLE KEYS */;
INSERT INTO `gias` (`MaGia`, `DonGia`, `TrangThai`) VALUES
	(1, 50000.00, 1),
	(2, 100000.00, 1),
	(3, 150000.00, 1);
/*!40000 ALTER TABLE `gias` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.gioi_han_tuois
CREATE TABLE IF NOT EXISTS `gioi_han_tuois` (
  `MaGioiHan` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenGioiHan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaGioiHan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.gioi_han_tuois: ~2 rows (approximately)
/*!40000 ALTER TABLE `gioi_han_tuois` DISABLE KEYS */;
INSERT INTO `gioi_han_tuois` (`MaGioiHan`, `TenGioiHan`, `TrangThai`) VALUES
	(1, '18+', 1),
	(2, '12+', 1);
/*!40000 ALTER TABLE `gioi_han_tuois` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.lich_chieus
CREATE TABLE IF NOT EXISTS `lich_chieus` (
  `MaLichChieu` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `MaThoiGianChieu` bigint(20) unsigned NOT NULL,
  `NgayChieu` date NOT NULL,
  `MaPhim` bigint(20) unsigned NOT NULL,
  `MaRap` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaLichChieu`),
  UNIQUE KEY `lich_chieus_mathoigianchieu_marap_unique` (`MaThoiGianChieu`,`MaRap`),
  KEY `lich_chieus_maphim_foreign` (`MaPhim`),
  KEY `lich_chieus_marap_foreign` (`MaRap`),
  CONSTRAINT `lich_chieus_maphim_foreign` FOREIGN KEY (`MaPhim`) REFERENCES `phims` (`MaPhim`),
  CONSTRAINT `lich_chieus_marap_foreign` FOREIGN KEY (`MaRap`) REFERENCES `raps` (`MaRap`),
  CONSTRAINT `lich_chieus_mathoigianchieu_foreign` FOREIGN KEY (`MaThoiGianChieu`) REFERENCES `thoi_gian_chieus` (`MaThoiGianChieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.lich_chieus: ~2 rows (approximately)
/*!40000 ALTER TABLE `lich_chieus` DISABLE KEYS */;
INSERT INTO `lich_chieus` (`MaLichChieu`, `MaThoiGianChieu`, `NgayChieu`, `MaPhim`, `MaRap`, `TrangThai`) VALUES
	(1, 1, '2020-12-20', 1, 1, 1),
	(2, 2, '2020-12-20', 1, 1, 1);
/*!40000 ALTER TABLE `lich_chieus` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.loai_ghes
CREATE TABLE IF NOT EXISTS `loai_ghes` (
  `MaLoaiGhe` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TenLoaiGhe` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `MaGia` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaLoaiGhe`),
  KEY `loai_ghes_magia_foreign` (`MaGia`),
  CONSTRAINT `loai_ghes_magia_foreign` FOREIGN KEY (`MaGia`) REFERENCES `gias` (`MaGia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.loai_ghes: ~3 rows (approximately)
/*!40000 ALTER TABLE `loai_ghes` DISABLE KEYS */;
INSERT INTO `loai_ghes` (`MaLoaiGhe`, `TenLoaiGhe`, `MaGia`, `TrangThai`) VALUES
	('BT1', 'Ghế bình thường', 2, 1),
	('TE1', 'Ghế trẻ em', 1, 1),
	('VIP1', 'Ghế Vip', 3, 1);
/*!40000 ALTER TABLE `loai_ghes` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.loai_phims
CREATE TABLE IF NOT EXISTS `loai_phims` (
  `MaLoaiPhim` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenLoaiPhim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `MaNV` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaLoaiPhim`),
  UNIQUE KEY `loai_phims_tenloaiphim_unique` (`TenLoaiPhim`),
  KEY `loai_phims_manv_foreign` (`MaNV`),
  CONSTRAINT `loai_phims_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `nhan_viens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.loai_phims: ~2 rows (approximately)
/*!40000 ALTER TABLE `loai_phims` DISABLE KEYS */;
INSERT INTO `loai_phims` (`MaLoaiPhim`, `TenLoaiPhim`, `MaNV`, `TrangThai`) VALUES
	(1, 'Tình cảm', 1, 1),
	(2, 'Hành động', 1, 1);
/*!40000 ALTER TABLE `loai_phims` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=313 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table 0306181255_cine.migrations: ~26 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(287, '2020_11_26_124046_create_phims_table', 1),
	(288, '2020_11_26_161406_create_nhan_viens_table', 1),
	(289, '2020_11_26_162438_create_chuc_vus_table', 1),
	(290, '2020_11_26_162602_create_loai_phims_table', 1),
	(291, '2020_11_26_165343_create_raps_table', 1),
	(292, '2020_11_26_170047_create_chi_nhanhs_table', 1),
	(293, '2020_11_27_054906_create_ghes_table', 1),
	(294, '2020_11_27_055504_create_gias_table', 1),
	(295, '2020_11_27_055729_create_gioi_han_tuois_table', 1),
	(296, '2020_11_27_055911_create_ves_table', 1),
	(297, '2020_11_27_060228_create_thoi_gian_chieus_table', 1),
	(298, '2020_11_27_060432_create_lich_chieus_table', 1),
	(299, '2020_11_27_060602_create_ds_ves_table', 1),
	(300, '2020_11_28_144701_create_loai_ghes_table', 1),
	(301, '2020_11_29_032727_add_constraint_key_phims', 1),
	(302, '2020_11_29_033911_add_constraint_key_loai_phims', 1),
	(303, '2020_11_29_040516_add_constraint_key_nhan_viens', 1),
	(304, '2020_11_29_040942_add_constraint_key_raps', 1),
	(305, '2020_11_29_041505_add_constraint_key_chi_nhanhs', 1),
	(306, '2020_11_29_041941_add_constraint_key_ghes', 1),
	(307, '2020_11_29_060437_add_constraint_key_ves', 1),
	(308, '2020_11_29_062628_add_constraint_key_lich_chieus', 1),
	(309, '2020_11_29_070334_add_constraint_key_loai_ghes', 1),
	(310, '2020_12_10_151858_create_thanh_viens_table', 1),
	(311, '2020_12_10_154805_add_constraint_key_ds_ves', 1),
	(312, '2020_12_16_173934_create_users_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.nhan_viens
CREATE TABLE IF NOT EXISTS `nhan_viens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `HoNV` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` date NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `MaCV` bigint(20) unsigned NOT NULL,
  `MaNQL` bigint(20) unsigned DEFAULT NULL,
  `TenTK` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `nhan_viens_macv_foreign` (`MaCV`),
  KEY `nhan_viens_manql_foreign` (`MaNQL`),
  CONSTRAINT `nhan_viens_macv_foreign` FOREIGN KEY (`MaCV`) REFERENCES `chuc_vus` (`MaCV`),
  CONSTRAINT `nhan_viens_manql_foreign` FOREIGN KEY (`MaNQL`) REFERENCES `nhan_viens` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.nhan_viens: ~3 rows (approximately)
/*!40000 ALTER TABLE `nhan_viens` DISABLE KEYS */;
INSERT INTO `nhan_viens` (`id`, `HoNV`, `name`, `Avatar`, `NgaySinh`, `DiaChi`, `SDT`, `email`, `MaCV`, `MaNQL`, `TenTK`, `password`, `TrangThai`) VALUES
	(1, 'Phạm', 'Nhựt', 'CamNhung.jpg', '2000-10-10', 'Bến Tre', '0911079197', 'nhatminh785@gmail.com', 1, NULL, 'nhutdzvl', '$2y$10$WJ7mq5zlZSewrmkRq4tCBu/GpTya./oHDZKrfI11kxbEc.UOnMvdi', 1),
	(2, 'Huỳnh', 'Cảnh', 'canh.jpg', '2000-10-02', 'Bình Thuận', '12345678', 'canhcdth18pmc@gmail.com', 3, 1, 'canhngu123', '$2y$10$ejj2YA3m0KIzrMrkKPpzwOfkHHLyeMuFJ.WJcm401uvxGpjyabgpO', 1),
	(3, 'Trần', 'Thảo', 'thao.jpg', '2000-10-02', 'HCM', '123456789', 'thaocdth18pmc@gmail.com', 2, 1, 'thao1234', '$2y$10$XT3Z5/rkPYJLGeyYb9SIleYeJ9OfEck1orvG.d0mvU8Jx2i.D3kVy', 1);
/*!40000 ALTER TABLE `nhan_viens` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.phims
CREATE TABLE IF NOT EXISTS `phims` (
  `MaPhim` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenPhim` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `NgayDKChieu` date NOT NULL,
  `NgayKetThuc` date NOT NULL,
  `ThoiLuong` smallint(6) NOT NULL,
  `DaoDien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DienVien` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `Diem` tinyint(4) NOT NULL DEFAULT '0',
  `HinhAnh` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LinkPhim` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaLoaiPhim` bigint(20) unsigned NOT NULL,
  `MaNV` bigint(20) unsigned NOT NULL,
  `Nhan` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaPhim`),
  KEY `phims_maloaiphim_foreign` (`MaLoaiPhim`),
  KEY `phims_manv_foreign` (`MaNV`),
  KEY `phims_nhan_foreign` (`Nhan`),
  CONSTRAINT `phims_maloaiphim_foreign` FOREIGN KEY (`MaLoaiPhim`) REFERENCES `loai_phims` (`MaLoaiPhim`),
  CONSTRAINT `phims_manv_foreign` FOREIGN KEY (`MaNV`) REFERENCES `nhan_viens` (`id`),
  CONSTRAINT `phims_nhan_foreign` FOREIGN KEY (`Nhan`) REFERENCES `gioi_han_tuois` (`MaGioiHan`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.phims: ~2 rows (approximately)
/*!40000 ALTER TABLE `phims` DISABLE KEYS */;
INSERT INTO `phims` (`MaPhim`, `TenPhim`, `NgayDKChieu`, `NgayKetThuc`, `ThoiLuong`, `DaoDien`, `DienVien`, `Diem`, `HinhAnh`, `LinkPhim`, `MaLoaiPhim`, `MaNV`, `Nhan`, `TrangThai`) VALUES
	(1, 'Ròm', '2020-10-10', '2020-11-10', 180, 'Trần Thanh Huy', 'Trần Anh Khoa', 4, 'rom.jpg', 'XRm1P7oGpMQ', 2, 1, 1, 1),
	(2, 'Tiệc trăng máu', '2020-10-10', '2020-11-10', 210, 'Trần Thanh Huy', 'Trần Anh Khoa', 5, 'tiectrangmau.jpg', 'XRm1P7oGpMQ', 2, 1, 1, 1);
/*!40000 ALTER TABLE `phims` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.raps
CREATE TABLE IF NOT EXISTS `raps` (
  `MaRap` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenRap` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongGhe` tinyint(4) NOT NULL,
  `MaChiNhanh` bigint(20) unsigned NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaRap`),
  KEY `raps_machinhanh_foreign` (`MaChiNhanh`),
  CONSTRAINT `raps_machinhanh_foreign` FOREIGN KEY (`MaChiNhanh`) REFERENCES `chi_nhanhs` (`MaChiNhanh`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.raps: ~2 rows (approximately)
/*!40000 ALTER TABLE `raps` DISABLE KEYS */;
INSERT INTO `raps` (`MaRap`, `TenRap`, `SoLuongGhe`, `MaChiNhanh`, `TrangThai`) VALUES
	(1, 'Rap1', 50, 1, 1),
	(2, 'Rap2', 50, 1, 1);
/*!40000 ALTER TABLE `raps` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.thanh_viens
CREATE TABLE IF NOT EXISTS `thanh_viens` (
  `MaThanhVien` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HoTV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenTV` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `SDT` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenDN` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  `ThoiGianTao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ThoiGianCapNhatCuoi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`MaThanhVien`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.thanh_viens: ~2 rows (approximately)
/*!40000 ALTER TABLE `thanh_viens` DISABLE KEYS */;
INSERT INTO `thanh_viens` (`MaThanhVien`, `Avatar`, `HoTV`, `TenTV`, `NgaySinh`, `SDT`, `Email`, `TenDN`, `Password`, `DiaChi`, `TrangThai`, `ThoiGianTao`, `ThoiGianCapNhatCuoi`) VALUES
	(1, NULL, 'Huỳnh', 'Thanh Cảnh', '2000-10-02', '0947479207', 'huynhthanhcanh.top@gmail.com', 'canh123', '12345', 'Bình Thạnh', 1, '2020-12-26 12:56:22', '2020-12-26 12:56:22'),
	(2, NULL, 'Phạm', 'Minh Nhựt', '2000-10-02', '0911079197', 'phamminhnhut@gmail.com', 'nhut123', '12345', 'Nhà Bè', 1, '2020-12-26 12:56:22', '2020-12-26 12:56:22');
/*!40000 ALTER TABLE `thanh_viens` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.thoi_gian_chieus
CREATE TABLE IF NOT EXISTS `thoi_gian_chieus` (
  `MaThoiGianChieu` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ThoiGianChieu` time NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaThoiGianChieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.thoi_gian_chieus: ~2 rows (approximately)
/*!40000 ALTER TABLE `thoi_gian_chieus` DISABLE KEYS */;
INSERT INTO `thoi_gian_chieus` (`MaThoiGianChieu`, `ThoiGianChieu`, `TrangThai`) VALUES
	(1, '16:30:00', 1),
	(2, '19:30:00', 1);
/*!40000 ALTER TABLE `thoi_gian_chieus` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table 0306181255_cine.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table 0306181255_cine.ves
CREATE TABLE IF NOT EXISTS `ves` (
  `MaVe` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `TenVe` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaDsVe` bigint(20) unsigned NOT NULL,
  `ThanhTien` decimal(8,2) NOT NULL DEFAULT '0.00',
  `ThoiGianMua` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `MaLichChieu` bigint(20) unsigned NOT NULL,
  `MaGhe` varchar(5) COLLATE utf8_unicode_ci NOT NULL,
  `TrangThai` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`MaVe`),
  KEY `ves_malichchieu_foreign` (`MaLichChieu`),
  KEY `ves_maghe_foreign` (`MaGhe`),
  KEY `ves_madsve_foreign` (`MaDsVe`),
  CONSTRAINT `ves_madsve_foreign` FOREIGN KEY (`MaDsVe`) REFERENCES `ds_ves` (`MaDsVe`),
  CONSTRAINT `ves_maghe_foreign` FOREIGN KEY (`MaGhe`) REFERENCES `ghes` (`MaGhe`),
  CONSTRAINT `ves_malichchieu_foreign` FOREIGN KEY (`MaLichChieu`) REFERENCES `lich_chieus` (`MaLichChieu`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table 0306181255_cine.ves: ~2 rows (approximately)
/*!40000 ALTER TABLE `ves` DISABLE KEYS */;
INSERT INTO `ves` (`MaVe`, `TenVe`, `MaDsVe`, `ThanhTien`, `ThoiGianMua`, `MaLichChieu`, `MaGhe`, `TrangThai`) VALUES
	(1, 'Vé Xem Phim', 1, 50000.00, '2020-12-26 12:56:22', 1, 'A9', 1),
	(2, 'Vé Xem Phim', 1, 50000.00, '2020-12-26 12:56:22', 1, 'A10', 1);
/*!40000 ALTER TABLE `ves` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
