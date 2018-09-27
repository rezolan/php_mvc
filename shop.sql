-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Сен 27 2018 г., 15:50
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `short_text` varchar(1000) NOT NULL,
  `text` varchar(10000) NOT NULL,
  `autor` varchar(50) NOT NULL,
  `img` varchar(10000) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `title`, `short_text`, `text`, `autor`, `img`) VALUES
(1, 'Title1', 'Short text1', '1Lorem ipsum dolor sit amet1', 'autor1', 'img.jpg'),
(2, 'Title2', 'Short tex2', '2Lorem ipsum dolor sit amet2', 'autor2', 'img.jpg'),
(3, 'Title3', 'Short text3', '3Lorem ipsum dolor sit amet3', 'autor3', 'img.jpg'),
(4, 'Title4', 'Short text4', '4Lorem ipsum dolor sit amet4', 'autor4', 'img.jpg'),
(5, 'Title5', 'Short text5', '5Lorem ipsum dolor sit amet5', 'autor5', 'img.jpg'),
(6, 'Title6', 'Short text6', '6Lorem ipsum dolor sit amet6', 'autor6', 'img.jpg'),
(7, 'Title7', 'Short text7', '7Lorem ipsum dolor sit amet7', 'autor7', 'img.jpg'),
(8, 'Title8', 'Short text8', '8Lorem ipsum dolor sit amet8', 'autor8', 'img.jpg'),
(9, 'Title9', 'Short text9', '9Lorem ipsum dolor sit amet9', 'autor9', 'img.jpg'),
(10, 'Title10', 'Short text10', '10Lorem ipsum dolor sit amet10', 'autor10', 'img.jpg'),
(11, 'Title11', 'Short tex11', '11Lorem ipsum dolor sit amet11', 'autor11', 'img.jpg'),
(12, 'Title12', 'Short text3', '12Lorem ipsum dolor sit amet12', 'autor12', 'img.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
