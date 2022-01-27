<?
$db = mysql_connect ("localhost","root", "");
mysql_query ("CREATE DATABASE library");
mysql_select_db ("library",$db);
mysql_query ("SET NAMES utf8");


mysql_query ("create table if not exists `book` (
  `id_book` int not null AUTO_INCREMENT,
  `name_book` varchar(255) not null,
  `name_author` varchar(255) not null,
  `publich_name` varchar(255) not null,
  `genre` varchar(100) not null,
	`year_publish` int(4) not null,
  `number_books` int not null,
  PRIMARY KEY (id_book)
) engine=innodb default charset=utf8;");

mysql_query ("INSERT INTO `book` (`id_book`, `name_book`, `name_author`, `publich_name`, `genre`, `year_publish`, `number_books`) VALUES
  ('', 'Робинзон Крузо', 'Даниель Дефо', 'Клевер Медиа Групп', 'роман', 1719, 15),
  ('', 'Рождество в домике Петсона', 'Нурдквист Свен', 'Белая ворона', 'сказки', 2014, 20),
  ('', 'Славянские мифы', 'Александра Баркова', 'Манн, Иванов и Фербер', 'Эпос и фольклор', 2022, 15),
  ('', 'Секреты JavaScript ниндзя', 'Джон Резиг, Беэр Бибо', 'Вильямс', 'учебная литература', 2016, 13),
  ('', 'JavaScript. Подробное руководство', 'Дэвид Флэнаган', 'OREILLY', 'учебная литература', 2020, 5),
  ('', 'Выразительный JavaScript', 'Хавербеке Марейн', 'Питер', 'учебная литература', 2019, 8),
  ('', 'Изучаем SQL', 'Алан Бьюли', 'OREILLY', 'учебная литература', 2007, 9)
;");


mysql_query ("create table if not exists `student` (
  `id_st` int not null,
  `name_stud` varchar(255) not null,
  `groups` varchar(10) not null,
  `phone` bigint(11) not null,
  PRIMARY KEY (id_st)
) engine=innodb default charset=utf8;");

mysql_query ("INSERT INTO `student` (`id_st`, `name_stud`, `groups`, `phone`) VALUES
  ('2315', 'Уржумов Сергей Юрьевич', '18-ЗИЭ', 89527856315),
  ('2316', 'Астапенко Дмитрий Валерьевич', '18-ЗИЭ', 89064152632),
  ('2211', 'Петров Николай Викторович', '17-ЗИЭ', 89528596523),
  ('2210', 'Иванов Иван Иванович', '17-ЗИЭ', 89115269853),
  ('2111', 'Грибов Олег Иванович', '16-ЗИЭ', 89067458654)
;");



mysql_query ("create table if not exists `turnoverBooks` (
  `id_tur` int not null AUTO_INCREMENT,
  `id_book` int(11) not null,
  `id_stud` int(11) not null,
  `date_in` date not null,
  `date_out` date not null,
  PRIMARY KEY (id_tur)
) engine=innodb default charset=utf8;");

mysql_query ( "alter table turnoverBooks
  add foreign key (id_book) references book (id_book);");

mysql_query ( "alter table turnoverBooks
  add foreign key (id_stud) references student (id_st);");


// mysql_query ("INSERT INTO `student` (`id_tur`, `id_book`, `id_stud`, `date_in`, `date_out`) VALUES
  // (NULL, '1', '2111', '2022-01-04', '2022-01-14'),
  // (NULL, '4', '2211', '2022-01-02', '2022-01-15'),
  // (NULL, '1', '2315', '2022-01-09', '2022-01-12'),
  // (NULL, '2', '2210', '2022-01-03', '2022-01-22'),
  // (NULL, '1', '2315', '2022-01-08', '2022-01-13'),
  // (NULL, '1', '2315', '2022-01-07', '2022-01-22'),
  // (NULL, '1', '2315', '2022-01-06', '2022-01-21'),
  // (NULL, '1', '2315', '2022-01-05', '2022-01-25')
// ;");

// задание 2
// Напишите SQL-запрос, который бы возвращал самого популярного автора за год

// SELECT turnoverBooks.id_book, book.name_author
// FROM turnoverBooks, book
// WHERE turnoverBooks.id_book = book.id_book
// GROUP BY turnoverBooks.id_book
// ORDER BY COUNT(*) DESC
// LIMIT 1;

// или

// SELECT turnoverBooks.id_book, book.name_author FROM turnoverBooks JOIN book ON turnoverBooks.id_book = book.id_book 
// GROUP BY turnoverBooks.id_book ORDER BY COUNT(*) DESC LIMIT 1
?>