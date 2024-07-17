CREATE DATABASE IF NOT EXISTS rslogger;
USE rslogger;
CREATE TABLE IF NOT EXISTS `log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `time` datetime DEFAULT NULL,
  `log_level` int DEFAULT NULL,
  `message` text,
  `metadata` text,
  `trace_id` varchar(45) DEFAULT NULL,
  `trace_attributes` text,
  PRIMARY KEY (`id`),
  KEY `idx_log_level` (`log_level`),
  KEY `idx_trace_id` (`trace_id`),
  KEY `idx_time` (`time`)                                                                                                                                                                 
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

