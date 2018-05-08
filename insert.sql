INSERT INTO `artist` (`id`, `first_name`, `surname`, `birthday`, `nation`) VALUES
(1, 'J. C.', ' Dahl', '1788-02-24', 'Norvec');

INSERT INTO `create_at` (`id`, `create_date`, `create_month`, `create_year`) VALUES
(1, '1', '1', '1826');

INSERT INTO `show_at` (`id`, `name`, `nation`) VALUES
(1, 'Frankfurt am Main', 'Almanya');

INSERT INTO `art` (`id`, `artistid`, `typeid`, `create_atid`, `show_atid`, `category_id`, `score`, `vote`, `imagePath`) VALUES
(1, 1, 1, 1, 1, 2, NULL, 3, 'images/r1.jpg');

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Heykel'),
(2, 'Resim'),
(3, 'Seramik');

INSERT INTO `type` (`id`, `title`, `start_year`, `end_year`) VALUES
(1, 'romantizm', '1810', '1850'),
(2, 'naturalizm', '1890', '1923'),
(3, 'realizm', '1830', '1870'),
(4, 'empresyonizm', '1877', '1950'),
(5, 'postempresyonizm', '1839', '1906');

INSERT INTO `artist` (`id`, `first_name`, `surname`, `birthday`, `nation`) VALUES
(2, 'Salvador', ' Dali', '1904-01-23', 'Ispanya');

INSERT INTO `create_at` (`id`, `create_date`, `create_month`, `create_year`) VALUES
(2, '1', '1', '1931');

INSERT INTO `show_at` (`id`, `name`, `nation`) VALUES
(2, 'Barcelona Museum Of Dali', 'Ispanya');

INSERT INTO `art` (`id`, `artistid`, `typeid`, `create_atid`, `show_atid`, `category_id`, `score`, `vote`, `imagePath`) VALUES
(2, 2, 2, 2, 2, 3, NULL, 3, 'images/r2.jpg');

INSERT INTO `artist` (`id`, `first_name`, `surname`, `birthday`, `nation`) VALUES
(3, 'Michelangelo', ' ', '1483-01-01', 'Italya');

INSERT INTO `create_at` (`id`, `create_date`, `create_month`, `create_year`) VALUES
(3, '1', '1', '1501');

INSERT INTO `show_at` (`id`, `name`, `nation`) VALUES
(3, 'Palazzo Vecchio', 'Italya');

INSERT INTO `art` (`id`, `artistid`, `typeid`, `create_atid`, `show_atid`, `category_id`, `score`, `vote`, `imagePath`) VALUES
(3, 3, 2, 3, 3, 1, NULL, 3, 'images/r3.jpg');
