--
-- Table structure for table `persistence`
--

CREATE TABLE `persistence` (
  `id` int(11) NOT NULL,
  `shareid` varchar(50) NOT NULL,
  `cookies` mediumtext,
  `dom` longtext,
  `origin` varchar(500) DEFAULT NULL,
  `referer` varchar(1000) DEFAULT NULL,
  `payload` varchar(500) DEFAULT NULL,
  `uri` varchar(1000) DEFAULT NULL,
  `user-agent` varchar(500) DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `archive` int(11) DEFAULT '0',
  `screenshot` longtext,
  `localstorage` longtext,
  `sessionstorage` longtext
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;


ALTER TABLE `payloads` ADD `persistence` BOOLEAN NOT NULL DEFAULT FALSE AFTER `pages`;

--
-- AUTO_INCREMENT for table `persistence`
--
ALTER TABLE `persistence`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;