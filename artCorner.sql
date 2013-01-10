-- phpMyAdmin SQL Dump
-- version 2.8.0.1
-- http://www.phpmyadmin.net
-- 
-- Host: custsql-ipg04.eigbox.net
-- Generation Time: Jan 08, 2013 at 10:14 PM
-- Server version: 5.0.91
-- PHP Version: 4.4.9
-- 
-- Database: `art_corner`
-- 

-- --------------------------------------------------------

-- 
-- Table structure for table `comments`
-- 

CREATE TABLE `comments` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `entry_id` int(11) default NULL,
  `body` text,
  `author` varchar(100) default NULL,
  `email` varchar(255) default NULL,
  `date` varchar(30) default NULL,
  `robot` varchar(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=294 DEFAULT CHARSET=latin1 AUTO_INCREMENT=294 ;

-- 
-- Dumping data for table `comments`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `entries`
-- 

CREATE TABLE `entries` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `title` varchar(128) default NULL,
  `body` text,
  `posted_by` varchar(255) default NULL,
  `date` varchar(30) default NULL,
  `category` varchar(100) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- 
-- Dumping data for table `entries`
-- 


-- --------------------------------------------------------

-- 
-- Table structure for table `users`
-- 

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL auto_increment,
  `firstName` varchar(200) default NULL,
  `lastName` varchar(200) default NULL,
  `userName` varchar(200) default NULL,
  `email` varchar(255) default NULL,
  `password` varchar(200) default NULL,
  `robot` varchar(3) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- 
-- Dumping data for table `users`
-- 

INSERT INTO `users` VALUES (1, 'Jessica', 'Sears', 'swamp', 'swampgliders@gmail.com', 'a7bb5fad30c5ad8e6360433e36fe8f87', 'yes');
