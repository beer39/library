1. Модель данных.
ER модель. Для данной задачи разбивать на большее количество таблиц не стал, т.к. для данных задач, этого достаточно.
Из полученного задания получились таблицы: книга, студент, оборот книг.
![Untitled Workspace (2)](https://user-images.githubusercontent.com/30121298/151359083-a53b56db-6aa0-42ea-81bf-1d398ce809ab.jpg)

2. Популярный автор.

SELECT turnoverBooks.id_book, book.name_author FROM turnoverBooks, book 
WHERE turnoverBooks.id_book = book.id_book
GROUP BY turnoverBooks.id_book
ORDER BY COUNT(*) DESC
LIMIT 1;

или

SELECT turnoverBooks.id_book, book.name_author 
FROM turnoverBooks JOIN book ON turnoverBooks.id_book = book.id_book 
GROUP BY turnoverBooks.id_book ORDER BY COUNT(*) DESC LIMIT 1

![Б1езымянный](https://user-images.githubusercontent.com/30121298/151361195-b26092a1-c536-4d02-bd3f-51a711514793.png)


3. Злостный читатель.
"Злостный читатель" - студент, прочитавший самое большое количество книг.
Подключаемся к бд php файлом, находим часто используемого студента в списке, выводим. Через JS выводим на экран.
