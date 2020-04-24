-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 24, 2020 at 03:08 PM
-- Server version: 5.7.23-23
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fivotcti_image_funda_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `bid` int(11) NOT NULL,
  `bnr_id` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image_lg` text NOT NULL,
  `image_sm` text NOT NULL,
  `bnr_status` int(3) NOT NULL COMMENT '0- Inactive, 1- Active',
  `created` text NOT NULL,
  `modified` text NOT NULL,
  `url_redirect` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`bid`, `bnr_id`, `title`, `description`, `image_lg`, `image_sm`, `bnr_status`, `created`, `modified`, `url_redirect`) VALUES
(9, 'BNR80317aebaba777650e12dbcfc095e9d6', 'Collection of best Happy Birthday Images', 'Here is the collection of best happy birthday images, which you can download and share with your best friend.', '/admin-panel/images/banner/IMGHD04212020173519.jpg', '/admin-panel/images/banner/IMGSM04212020173519.jpg', 1, '{\"created_on\":\"2020-04-21 05:35:19pm\",\"created_by\":null}', '', 'http://version2.dailyimagefunda.com/Happy-Birthday/happy-birthday-images'),
(10, 'BNRf575db1f15be82f3714886022e866242', 'Best Labour day Images, Quotes and Pictures for social media', '.', '/admin-panel/images/banner/IMGHD04212020174310.jpg', '/admin-panel/images/banner/IMGSM04212020174310.jpg', 1, '{\"created_on\":\"2020-04-21 05:43:10pm\",\"created_by\":null}', '', 'https://dailyimagefunda.com/labour-day-images-quotes-and-pictures');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `blid` int(11) NOT NULL,
  `blg_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `image_lg` text NOT NULL,
  `image_sm` text NOT NULL,
  `content` text NOT NULL,
  `image_alt` text NOT NULL,
  `post_url` text NOT NULL,
  `meta_tag` varchar(200) NOT NULL,
  `meta_desc` varchar(200) NOT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL,
  `blg_status` int(3) NOT NULL COMMENT '0-Inactive, 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`blid`, `blg_id`, `cat_id`, `title`, `description`, `image_lg`, `image_sm`, `content`, `image_alt`, `post_url`, `meta_tag`, `meta_desc`, `created`, `modified`, `blg_status`) VALUES
(8, 'BLGdc18b60b1e41f2dd14b84c77cc9661c3', 'CATafc83c4c4fb8e7ad43f500b27af81770', 'Top Merry Christmas Images | Send Happy Christmas Pictures', 'Hey Readers! today I will tell about Merry Christmas and also provides few best Merry Christmas images, which you can send to your friends, family member, relative, and office colleagues on this Christmas. Sending a message to your loved one is feeling a proud movement for them. but before we will be knowing that what is Merry Christmas and why do we celebrate this western festival.', '/admin-panel/images/blog/IMGHD04232020110454.jpg', '/admin-panel/images/blog/IMGSM04232020110454.jpg', '<p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">Christmas is a festival of Christians which spreads joy and happiness. it is celebrated on the twenty-fifth of December every year as birth anniversary of Lord Jesus Christ. Jesus Christ was born in Bethlehem to mother mary. he is believed as the sun of God.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">There is a holiday on this day to schools colleges and many offices. all the houses and churches are clean, people decorate the Christmas for the celebration, they invite friends and relatives at their home, gifts and cards are the exchange on this day, Christian people sing holy songs and pray to god on Christmas day. a person disguised as Santa clause distributes sweets and gifts to children.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">Especially Children enjoy this festival, They buy sweets and colourful stars to decorate their home and study room. In western countries, employees get long holidays and this occasion they travel outside of their country.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">Nowadays Christmas festival is celebrated by everyone irrespective of their religion and caste. this festival is celebrated globally with great enthusiasm and enjoyment.</p><blockquote class=\"wp-block-quote is-style-default\" style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-style: italic; margin: 0px 15px; outline: 0px; padding: 0px; vertical-align: baseline; quotes: &quot;&quot; &quot;&quot;; color: rgb(61, 61, 61);\"><p style=\"border: 0px; font-family: inherit; font-size: 16px; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><a href=\"https://dailyimagefunda.com/good-night-images/\" style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(2, 159, 178); transition: all 0.3s ease-in-out 0s;\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">50+ Best Good Night Images</strong></a></p></blockquote><blockquote class=\"wp-block-quote\" style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-style: italic; margin: 0px 15px; outline: 0px; padding: 0px; vertical-align: baseline; quotes: &quot;&quot; &quot;&quot;; color: rgb(61, 61, 61);\"><p style=\"border: 0px; font-family: inherit; font-size: 16px; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(2, 159, 178); transition: all 0.3s ease-in-out 0s;\"><a href=\"https://dailyimagefunda.com/good-night-images/\" style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(2, 159, 178); transition: all 0.3s ease-in-out 0s;\">Attractive &amp; Best Good Morning Images</a>.</strong></p></blockquote><h4 style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-weight: 700; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.3; color: rgb(61, 61, 61);\">Best Merry Christmas Images</h4><p style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-weight: 700; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.3; color: rgb(61, 61, 61);\"><img src=\"./../admin-panel/images/blog/IMGHD04232020110546.jpg\" style=\"width: 800px;\"></p><p style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-weight: 700; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.3; color: rgb(61, 61, 61);\"><img src=\"./../admin-panel/images/blog/IMGHD04232020110614.jpg\" style=\"width: 800px;\"></p><h4 style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-weight: 700; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.3; color: rgb(61, 61, 61);\">Why we celebrate Merry Christmas on every November 25th?</h4><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">When I ask my friends circle and relatives that why we celebrate Christmas on the 25th of November. They each of them answered the same and said that&nbsp;<strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Jesus Christ&nbsp;</strong>has taken birth on the day, who is the son of God.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">But friends, in the bible which is the&nbsp;<strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">holy book</strong>&nbsp;for every Christians. In that book,&nbsp;<strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Jesus Christ</strong>&nbsp;birth has not mentioned in the bible. According to&nbsp;<strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\"><a href=\"https://www.whychristmas.com/\" rel=\"nofollow\" style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(2, 159, 178); transition: all 0.3s ease-in-out 0s;\">whychristmas.com</a></strong>&nbsp;website, There has no fixed date of Jesus birth on November 25th. There are several theories behind the birth of Jesus Christ. Let’s skip this point here.</p><h4 style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-weight: 700; margin-right: 0px; margin-bottom: 15px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: both; line-height: 1.3; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Interesting Christmas Facts:</strong></h4><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Santa Claus</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The name of Santa Claus comes from the name of a legendary Christian Saint – St Nicholas. He was famous for his kindness to children and the poor.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Christmas stockings</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The legend says that an old man was in despair because he has no money for his daughter’s dowries. Saint Nicholas dropped a bag of gold down the chimney that fell into a stocking hung up by the fire to dry.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Christmas tree</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The Christmas tree came originally from Germany. It is a symbol of eternal life. In medieval Germany, it was decorated with apples. The first tree has no candles.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Trafalgar Square Christmas tree</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">Trafalgar Square Christmas tree in London is sent giant Christmas tree from Norway. It has been an annual gift to the people of Britain by the city of Oslo since 1947.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">World’s tallest Christmas tree</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">&nbsp;the world’s tallest cut Christmas tree According to the Guinness Book of Record, the world’s tallest cut Christmas tree was a 221 ft (67.36m).</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Christmas card</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The first Christmas card was produced in Britain in 1843 by Henry cole.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Traditional Christmas colours</strong></p><blockquote class=\"wp-block-quote\" style=\"border: 0px; font-family: Roboto, sans-serif; font-size: 20px; font-style: italic; margin: 0px 15px; outline: 0px; padding: 0px; vertical-align: baseline; quotes: &quot;&quot; &quot;&quot;; color: rgb(61, 61, 61);\"><p style=\"border: 0px; font-family: inherit; font-size: 16px; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\">Green is a symbol of life and rebirth.</p><p style=\"border: 0px; font-family: inherit; font-size: 16px; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\">Red is a symbol of the blood of Christ.</p><p style=\"border: 0px; font-family: inherit; font-size: 16px; font-style: inherit; font-weight: inherit; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\">Gold represents the light as well as wealth and loyalty.</p></blockquote><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">The tradition of gifts</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">It seems to have started with the gifts that the wise men brought to Jesus. The exchanging of gifts between people started about the 1800s.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Christmas song</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The biggest selling Christmas single of all time is Bing Crosby’s “white Christmas”</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Santa Claus flying</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The image of Santa Claus flying his play was created by Washington Irving, the author of The Legend of Sleepy Hollow.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Merry Christmas</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The “Merry Christmas” just got well known in the mid-19 century after it showed up in the book “A Christmas Carol” by Charles Dickens.</p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\"><strong style=\"border: 0px; font-family: inherit; font-style: inherit; font-weight: bold; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline;\">Jingle Bells</strong></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify; color: rgb(61, 61, 61);\">The famous Christmas melody ” Jingle Bells” (the one utilized for this video) was initially composed for Thanksgiving and not Christmas!</p>', 'Top Merry Christmas Images', 'merry-christmas-images', 'Meta tag', 'Meta descrition', '{\"created_on\":\"2020-04-23 11:04:54am\",\"created_by\":\"Rohit Kumar S\"}', '{\"modified_on\":\"2020-04-23 11:06:46am\",\"modified_by\":\"Rohit Kumar S\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `ctid` int(11) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `image_lg` text NOT NULL,
  `image_sm` text NOT NULL,
  `trending_order` int(5) NOT NULL,
  `cat_status` int(11) NOT NULL COMMENT '0- Inactive, 1- Active',
  `created` text NOT NULL,
  `modified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`ctid`, `cat_id`, `name`, `image_lg`, `image_sm`, `trending_order`, `cat_status`, `created`, `modified`) VALUES
(21, 'CAT1dbc7ae7c6878788e4ddb0c5cb6d7474', 'Labour day', '/admin-panel/images/category/IMGHD04212020121213.jpg', '/admin-panel/images/category/IMGSM04212020121213.jpg', 0, 1, '{\"created_on\":\"2020-04-21 12:12:13pm\",\"created_by\":\"Rohit Kumar S\"}', ''),
(22, 'CATeb235619c4e0c2d72346bf0c37280b5e', 'Happy Birthday', '/admin-panel/images/category/IMGHD04212020125827.jpg', '/admin-panel/images/category/IMGSM04212020125827.jpg', 0, 1, '{\"created_on\":\"2020-04-21 12:58:27pm\",\"created_by\":\"Rohit Kumar S\"}', ''),
(23, 'CAT4b401c440792bce9aced394478c1f21e', 'Weekend', '/admin-panel/images/category/IMGHD04212020145826.jpg', '/admin-panel/images/category/IMGSM04212020145826.jpg', 0, 1, '{\"created_on\":\"2020-04-21 02:58:26pm\",\"created_by\":null}', ''),
(24, 'CATafc83c4c4fb8e7ad43f500b27af81770', 'Merry Christmas', '/admin-panel/images/category/IMGHD04222020194256.jpg', '/admin-panel/images/category/IMGSM04222020194256.jpg', 0, 1, '{\"created_on\":\"2020-04-22 07:42:56pm\",\"created_by\":\"Rohit Kumar S\"}', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `coid` int(11) NOT NULL,
  `con_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `created` text NOT NULL,
  `con_status` int(3) NOT NULL COMMENT '0-Inactive, 1-Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`coid`, `con_id`, `name`, `email`, `subject`, `message`, `created`, `con_status`) VALUES
(1, 'CON591262bc1c6db7c20cf06871e450d2c1', 'asdfasdf', 'asdf@asdfasdf', 'asdfasdf', 'asdfasdf', '2020-04-16 08:36:46pm', 1),
(2, 'CON08bf470a567750cb8d757eab5d2b22de', 'asdfasdf', 'asdfadsf@asdf', 'asdfadsf@asdf', 'asdfadsf@asdf', '2020-04-16 08:38:15pm', 1),
(3, 'CON6ead08a3b2696b00933abfc692de2a59', 'asdfa@asdfa', 'asdfa@asdfa', 'asdfa@asdfa', 'asdfa@asdfa', '2020-04-16 08:39:16pm', 1),
(4, 'CON730a8fc18fdfd36b37b0108a7c382907', 'asdasdf', 'asdfads@assdfasd.com', 'asdfasdf', 'sfgsdfg', '2020-04-20 08:51:01pm', 1);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gid` int(11) NOT NULL,
  `gal_id` varchar(100) NOT NULL,
  `cat_id` varchar(100) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `gallery_images` text NOT NULL,
  `gal_status` int(3) NOT NULL DEFAULT '1' COMMENT '0-Inactive, 1- Active',
  `created` text NOT NULL,
  `modified` text NOT NULL,
  `featured_image_lg` text NOT NULL,
  `featured_image_sm` text NOT NULL,
  `trending_order` int(10) NOT NULL,
  `image_alt` text NOT NULL,
  `post_url` text NOT NULL,
  `popular_download` int(3) NOT NULL COMMENT '0- Inactive, 1-Active',
  `meta_tag` varchar(200) NOT NULL,
  `meta_desc` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `gal_id`, `cat_id`, `title`, `description`, `gallery_images`, `gal_status`, `created`, `modified`, `featured_image_lg`, `featured_image_sm`, `trending_order`, `image_alt`, `post_url`, `popular_download`, `meta_tag`, `meta_desc`) VALUES
(23, 'GALc81ec69b01e6c3f8e6f47a19afcc4bd5', 'CAT1dbc7ae7c6878788e4ddb0c5cb6d7474', 'Best Labour Day Images, Quotes And Pictures For Social Media', '<p>We have a beautiful collection of labour day images, quotes and pictures for social media. You can share these lovely images with your friends, and family.&nbsp;<span style=\"font-size: 1rem; color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\">We have a beautiful&nbsp;</span><strong style=\"font-size: 1rem; font-weight: bold; border: 0px; font-family: Roboto, sans-serif; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(61, 61, 61); text-align: justify;\">collection of labour day images</strong><span style=\"font-size: 1rem; color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\">, quotes and pictures for social media. You can share these lovely images with your friends, family members, and office colleagues using&nbsp;</span><a href=\"https://www.facebook.com/dailyimagefunda/\" style=\"background-color: rgb(255, 255, 255); font-size: 1rem; color: rgb(2, 159, 178); border: 0px; font-family: Roboto, sans-serif; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; transition: all 0.3s ease-in-out 0s; text-align: justify;\">Facebook</a><span style=\"font-size: 1rem; color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\">, Instagram, and WhatsApp.</span><br></p>', '[{\"imageAlt\":\"Happy labour day\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020123425.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020123425.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"Show a child love &amp; care, child labour is just not fair. Happy Labour Day!<br>\"},{\"imageAlt\":\"Labour day quotes\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020123850.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020123850.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"<p>It is labour indeed that puts the difference in everything.<br><\\/p>\"},{\"imageAlt\":\"Happy labour day images\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020124913.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020124913.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"<p>All labour is directed toward producing some effect. Happy Labour Day!&nbsp;<br><\\/p>\"},{\"imageAlt\":\"Building construction work\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020125118.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020125118.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"<p>The reward of labour is life. Is that not enough? Happy Labour Day!&nbsp;&nbsp;<br><\\/p>\"},{\"imageAlt\":\"Building construction work\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020125423.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020125423.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"<p>Hard work beats talent when talent doesn\'t work hard. - Tim Notke&nbsp;<br><\\/p>\"},{\"imageAlt\":\"1st May: Labour Day\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020125534.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020125534.jpg\\\"]\",\"imageTitle\":\"\",\"imageDesc\":\"<p>The end of labour is to gain leisure.&nbsp;<br><\\/p>\"}]', 1, '{\"created_on\":\"2020-04-21 12:55:48pm\",\"created_by\":\"Rohit Kumar S\"}', '{\"modified_on\":\"2020-04-22 03:25:33pm\",\"modified_by\":null}', '/admin-panel/images/gallery/IMGHD04212020121531.jpg', '/admin-panel/images/gallery/IMGSM04212020121531.jpg', 0, 'Happy labour Day', 'labour-day-images-quotes-and-pictures', 0, 'Meta tag', 'Meta descrition'),
(24, 'GAL20fa4a32d1e7efb2a2d411947888745f', 'CAT4b401c440792bce9aced394478c1f21e', 'Download Best Happy Weekend Images & Pictures | Weekend Quotes', '<p><span style=\"font-family: &quot;Source Sans Pro&quot;;\">?</span>We have a huge collection of Best Happy Weekend Images and quotes. Download and share these weekend quotes with your friends using all social platforms.</p>', '[{\"imageAlt\":\"Best Happy Weekend Images\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020154612.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020154612.jpg\\\"]\",\"imageTitle\":\"Collection of best Happy Weekend Images\",\"imageDesc\":\"<p><span style=\\\"font-family: &quot;Source Sans Pro&quot;;\\\">\\ufeff<\\/span><span style=\\\"color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">Hello friends, In this post, I will share the <\\/span><span style=\\\"font-weight: 600; box-sizing: inherit; color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">Best Happy Weekend Images<\\/span><span style=\\\"color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">, where you can download weekend quotes with images.<\\/span><br><\\/p>\"},{\"imageAlt\":\"Best Happy Weekend Images\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020154727.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020154727.jpg\\\"]\",\"imageTitle\":\"Best Happy Weekend Images\",\"imageDesc\":\"<span style=\\\"color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">We have a huge collection of weekends images and quotes, share these images with family members, friends and relatives using <\\/span><a href=\\\"https:\\/\\/www.facebook.com\\/\\\" style=\\\"color: rgb(0, 127, 172); transition-property: border, background, color; transition-duration: 0.05s; transition-timing-function: ease-in-out; outline: 0px; box-sizing: inherit; font-family: &quot;Noto Serif&quot;; white-space: pre-wrap; background-color: rgb(255, 255, 255);\\\"><span style=\\\"font-family: &quot;Source Sans Pro&quot;;\\\">Facebook<\\/span><\\/a><span style=\\\"color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">, <\\/span><a href=\\\"https:\\/\\/www.instagram.com\\/\\\" style=\\\"color: rgb(0, 127, 172); transition-property: border, background, color; transition-duration: 0.05s; transition-timing-function: ease-in-out; outline: 0px; box-sizing: inherit; font-family: &quot;Noto Serif&quot;; white-space: pre-wrap; background-color: rgb(255, 255, 255);\\\"><span style=\\\"font-family: &quot;Source Sans Pro&quot;;\\\">Instagram<\\/span><\\/a><span style=\\\"color: rgb(25, 30, 35); font-family: &quot;Source Sans Pro&quot;; white-space: pre-wrap;\\\">, WhatsApp and other social platforms.<\\/span>\"},{\"imageAlt\":\"Happy Weekend with family\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020154809.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020154809.jpg\\\"]\",\"imageTitle\":\"Happy Weekend with family\",\"imageDesc\":\"Happy Weekend with family\"},{\"imageAlt\":\"Happy Weekend with family\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020154911.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020154911.jpg\\\"]\",\"imageTitle\":\"Happy Weekend with family\",\"imageDesc\":\"\"},{\"imageAlt\":\"Happy Weekend with family\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020154941.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020154941.jpg\\\"]\",\"imageTitle\":\"Happy Weekend with family\",\"imageDesc\":\"\"},{\"imageAlt\":\"Happy Sunday\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020155017.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020155017.jpg\\\"]\",\"imageTitle\":\"Happy Sunday\",\"imageDesc\":\"\"},{\"imageAlt\":\"Happy weekend on hill station\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020155049.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020155049.jpg\\\"]\",\"imageTitle\":\"Happy weekend on hill station\",\"imageDesc\":\"\"},{\"imageAlt\":\"Enjoy weekend\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020155148.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020155148.jpg\\\"]\",\"imageTitle\":\"Enjoy weekend\",\"imageDesc\":\"\"}]', 1, '{\"created_on\":\"2020-04-21 03:52:01pm\",\"created_by\":null}', '{\"modified_on\":\"2020-04-21 04:47:45pm\",\"modified_by\":null}', '/admin-panel/images/gallery/IMGHD04212020150126.jpg', '/admin-panel/images/gallery/IMGSM04212020150126.jpg', 0, 'Happy weekend images', 'best-happy-weekend-images-and-quotes', 0, '', ''),
(25, 'GAL564e6c6ef1984ed4d4fe420195790139', 'CATeb235619c4e0c2d72346bf0c37280b5e', 'Best Happy Birthday Images | Happy Birthday Wishes & Quotes', '<p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Birthday is a very special day for everyone in his life, On this day everyone surrounds us wish a happy birthday by sending images, wishes and quotes. So we will share a few Happy birthday images to you So that you can send your best one.</span></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">Generally, Birthday comes every year but we always try to make every birthday memorable, So that we can discuss that special movement whole year.</span></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\"><b><a href=\"https://dailyimagefunda.com/merry-christmas-images/\" target=\"_blank\">Attractive Merry Christmas Images</a></b></span></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\"><b><a href=\"https://dailyimagefunda.com/happy-new-year-images/\" target=\"_blank\">Happy New Year Images 2021 Images</a></b></span></p><p style=\"border: 0px; font-family: Roboto, sans-serif; margin-right: 0px; margin-bottom: 20px; margin-left: 0px; outline: 0px; padding: 0px; vertical-align: baseline; text-align: justify;\"><span style=\"font-family: &quot;Source Sans Pro&quot;;\">If you have also planned to wish someone, who is very close to your heart. He/She may bey your parents, family members, friends, colleagues, or anyone. You started planning this special day weeks ago So that you can give surprise to him/her. But before that, we need to schedule our many tasks according to the event.</span></p>', '[{\"imageAlt\":\"Happy birthday quotes and wishes\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020171534.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020171534.jpg\\\"]\",\"imageTitle\":\"Happy birthday quotes and wishes\",\"imageDesc\":\"<span style=\\\"color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\\\">1st thing you need to find a place, where you can celebrate his\\/her birthday. You need some cool happy birthday&nbsp;<\\/span><a href=\\\"https:\\/\\/in.pinterest.com\\/dailyimage\\/happy-new-images-for-besties\\/\\\" rel=\\\"nofollow\\\" style=\\\"border: 0px; font-family: Roboto, sans-serif; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; color: rgb(2, 159, 178); transition: all 0.3s ease-in-out 0s; text-align: justify; background-color: rgb(255, 255, 255);\\\">images<\\/a><span style=\\\"color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\\\">, which you stick on the room. Apart from these things, you also need to prebook the sweets. cake and invite other members who are common to both of us.<\\/span>\"},{\"imageAlt\":\"Happy Birthday Pictures\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020171624.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020171624.jpg\\\"]\",\"imageTitle\":\"Happy Birthday Pictures\",\"imageDesc\":\"<span style=\\\"color: rgb(61, 61, 61); font-family: Roboto, sans-serif; text-align: justify;\\\">Sometimes we may far from our besties and failed to meet and wish him personally, that time we usually send some happy birthday wishes to him\\/her.<\\/span>\"},{\"imageAlt\":\"Birthday Wishing Images\",\"imageName\":\"[\\\"\\/admin-panel\\/images\\/gallery\\/IMGHD04212020172223.jpg\\\",\\\"\\/admin-panel\\/images\\/gallery\\/IMGSM04212020172223.jpg\\\"]\",\"imageTitle\":\"Birthday Wishing Images\",\"imageDesc\":\"\"}]', 1, '{\"created_on\":\"2020-04-21 05:18:29pm\",\"created_by\":null}', '{\"modified_on\":\"2020-04-21 05:30:01pm\",\"modified_by\":null}', '/admin-panel/images/gallery/IMGHD04212020171317.jpg', '/admin-panel/images/gallery/IMGSM04212020171317.jpg', 0, 'Happy Birthday Images', 'happy-birthday-images', 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `permission`
--

CREATE TABLE `permission` (
  `pid` int(255) NOT NULL,
  `permission_name` varchar(150) NOT NULL,
  `is_group` int(1) NOT NULL,
  `parent_group` int(255) NOT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `sbid` int(11) NOT NULL,
  `sb_id` varchar(100) NOT NULL,
  `email` text NOT NULL,
  `created` text NOT NULL,
  `modified` text NOT NULL,
  `sb_status` int(3) NOT NULL COMMENT '0- Inactive, 1- Active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`sbid`, `sb_id`, `email`, `created`, `modified`, `sb_status`) VALUES
(1, 'asdfagsfgsdf345435', 'example@example.com', '2020/11/19', '', 0),
(2, 'asdfasdv3452345324gs', 'example1@example1.com', '2020/11/20', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `user_status` int(2) NOT NULL DEFAULT '1' COMMENT '0 - Inactive\r\n1 - Active\r\n2 - Not Verified\r\n3 - Deleted',
  `created` text NOT NULL,
  `modified` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `user_status`, `created`, `modified`) VALUES
(1, 'Rohit Kumar S', 'rohit35109@fivotech.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '\"{\\\"created_on\\\":\\\"2020-03-21T08:52:38+00:00\\\",\\\"created_by\\\":\\\"1\\\"}\"', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `upid` int(255) NOT NULL,
  `permissions` text NOT NULL,
  `created_on` text NOT NULL,
  `modified_on` text NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`blid`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`ctid`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`coid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `permission`
--
ALTER TABLE `permission`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`sbid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`upid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `blid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `ctid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `coid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `permission`
--
ALTER TABLE `permission`
  MODIFY `pid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `sbid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `upid` int(255) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
