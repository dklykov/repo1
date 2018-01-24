-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Май 30 2012 г., 14:33
-- Версия сервера: 5.1.28
-- Версия PHP: 5.4.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- База данных: `cake`
--

-- --------------------------------------------------------

--
-- Структура таблицы `dreams`
--

CREATE TABLE IF NOT EXISTS `dreams` (
  `id` int(10) NOT NULL,
  `Title` varchar(1000) NOT NULL,
  `Descr` varchar(4000) NOT NULL,
  `userid` decimal(10,0) NOT NULL,
  `created` date NOT NULL,
  `fullfilled` date NOT NULL,
  `Votes` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dreams`
--

