-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 26 jan 2012 kl 17:57
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `snippet`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `content` text,
  `snippet_id` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumpning av Data i tabell `comments`
--

INSERT INTO `comments` (`id`, `name`, `content`, `snippet_id`) VALUES
(17, 'Comment to snippet nr 81', 'It''a a very short comment to martas first snippet', 81),
(18, 'Comment to csharp snippet', 'It''s a very short comment', 82),
(19, 'Comment to js snippet', 'Hello, my name is comment.', 83),
(20, 'My first comment', 'I can write comments as well:-)', 85);

-- --------------------------------------------------------

--
-- Tabellstruktur `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `snippet_count` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumpning av Data i tabell `languages`
--

INSERT INTO `languages` (`id`, `name`, `snippet_count`) VALUES
(1, 'PHP', NULL),
(2, 'csharp', NULL),
(3, 'js', NULL),
(4, 'css', NULL);

-- --------------------------------------------------------

--
-- Tabellstruktur `snippets`
--

CREATE TABLE IF NOT EXISTS `snippets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `body` text CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `description` varchar(500) CHARACTER SET utf8 COLLATE utf8_swedish_ci NOT NULL,
  `language_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  FULLTEXT KEY `title` (`title`,`body`,`description`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=87 ;

--
-- Dumpning av Data i tabell `snippets`
--

INSERT INTO `snippets` (`id`, `title`, `body`, `created`, `modified`, `description`, `language_id`, `user_id`) VALUES
(85, 'First PHP snippet by admin', '<?php\r\nrequire_once dirname(__FILE__) . ''/simpletest/autorun.php'';\r\n\r\n/**\r\n * Runs all tests\r\n */\r\nclass AllTests extends TestSuite\r\n{\r\n    function __construct()\r\n    {\r\n        parent::__construct();\r\n        $this->addFile(dirname(__FILE__) . ''/SnippetHandlerTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/CommentTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/FunctionsTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/SnippetTest.php'');\r\n    }\r\n\r\n}\r\n', '2012-01-26 17:54:49', '2012-01-26 17:54:49', 'I can do anything!', 1, 21),
(86, 'Second snippet by marta; csharp', '<?php\r\nrequire_once dirname(__FILE__) . ''/simpletest/autorun.php'';\r\n\r\n/**\r\n * Runs all tests\r\n */\r\nclass AllTests extends TestSuite\r\n{\r\n    function __construct()\r\n    {\r\n        parent::__construct();\r\n        $this->addFile(dirname(__FILE__) . ''/SnippetHandlerTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/CommentTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/FunctionsTest.php'');\r\n        $this->addFile(dirname(__FILE__) . ''/SnippetTest.php'');\r\n    }\r\n\r\n}\r\n', '2012-01-26 17:56:28', '2012-01-26 17:56:28', 'I can delete and edit my own snippets!', 2, 45);

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created`, `modified`) VALUES
(21, 'admin', '19a57a823801dcc0d851fdf1899450233284dc9b', 'admin', '2012-01-19 20:12:59', '2012-01-19 20:12:59'),
(45, 'marta', '19a57a823801dcc0d851fdf1899450233284dc9b', 'user', '2012-01-24 13:23:57', '2012-01-24 13:23:57'),
(46, 'kaja', '19a57a823801dcc0d851fdf1899450233284dc9b', 'user', '2012-01-24 13:27:35', '2012-01-24 13:27:35'),
(47, 'hasse', '19a57a823801dcc0d851fdf1899450233284dc9b', 'user', '2012-01-24 13:28:46', '2012-01-24 13:28:46');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
