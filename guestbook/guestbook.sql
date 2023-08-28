-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: 2020 年 3 月 24 日 03:10
-- サーバのバージョン： 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `guestbook`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'データID（主キー／連番）',
  `m_name` varchar(50) NOT NULL COMMENT '名前',
  `m_mail` varchar(50) NOT NULL COMMENT 'メールアドレス',
  `m_message` text NOT NULL COMMENT 'メッセージ',
  `m_dt` datetime NOT NULL COMMENT '書き込み日時',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=13 ;

--
-- テーブルのデータのダンプ `message`
--

INSERT INTO `message` (`m_id`, `m_name`, `m_mail`, `m_message`, `m_dt`) VALUES
(1, '鈴木一郎', 'aaa@sangi.jp', 'おはようございます。', '2016-01-01 09:00:00'),
(2, '鈴木二郎', 'bbb@sangi.jp', 'いただきます。', '2016-02-02 12:00:00'),
(3, '鈴木三郎', 'ccc@sangi.jp', 'ごちそうさまでした。', '2016-03-03 13:00:00'),
(4, '吉田幸央', 'yoshida@sangi.ac.jp', 'お世話になります。', '2015-12-16 15:46:19'),
(5, '静岡太郎', 'shizuokatarou@sangi.jp', 'いってきます。\r\nいってらっしゃい。', '2015-12-16 15:48:11'),
(6, '静岡花子', 'shizuokahanako@sangi.jp', 'ただいま。\r\n今日のご飯は？', '2015-12-16 17:24:49'),
(7, '産技五郎', 'sangigorou@sangi.jp', 'ハンバーグとコーンスープに、\r\nサラダも付くよ。', '2015-12-24 12:09:23'),
(8, '加藤舞', 'e15010@sangi.jp', 'ミニオン。', '2016-04-27 14:19:25'),
(9, '静岡太郎', 'yoshida@sangi.ac.jp', 'コメントが入ります。', '2016-11-22 09:45:44'),
(10, '焼津一郎', 'yaizu@sangi.jp', '焼津市民です。', '2019-04-24 12:00:00'),
(11, '藤枝二郎', 'fujieda@sangi.jp', '藤枝市民です。', '2019-04-24 12:00:00'),
(12, 'あいうえお', 'yoshida@sangi.jp', 'おおおおおおおおおおお\r\nいいいいいいいいいいい', '2019-05-08 10:50:20');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
