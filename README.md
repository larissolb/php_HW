# php_HW
****Update 22.12 *******
Добавлено ДЗ по реализации паттерна стратегии - Logger

****на 22.12*******
1. Исправлены страницы auth.php и share.php, а именно закрытая страница(share.php) доступна только авторизованным
 пользователям, на нее нельзя попасть, набрав в строке запроса ее адрес http://localhost:8000/share.php


****на 17.12*******
Добавление товара в корзину через классы
Папка: constructor


****на 13.12*******
1. Добавлен ajax к форме авторизации и загрузке картинок (папка ajax)


****исправления на 09.12*******
1. Форма регистрации (register.php):
    1.1. Поправлено,чтобы не записывались пустые строчки в файл, где хранятся пользователи)
    1.2. Добавлен автоматический переход на добавление картинок после успешной регистрации (закрытая страница с использование header(location))
2. Форма загрузки картинок (share.php): добавлена возможность выхода (разлогинивание) с автоматическим переходом на форму авторизации  
3. Добавлена форма авторизации - auth.php:
    3.1. Соблюдены условия, чтобы логин (у меня это емейл) был уникальный (проверка, что есть в файле, где хранятся данные пользователей)
    3.2. Проверка пароля по хешу и чтобы соответствовал емейлу(логину), который записан в файле, где хранятся данные пользователей после их регистрации
    3.3. После успешной авторизации открывает закрытую страницу (header(location)), доступную только после авторизации - загрузка картинок. На странице есть возможность разлогиниться

****на 09.12*******
1.Сделана форма регистрации с проверкой на уникальность логина и емейла с записью новых данных от пользователя(пока без ajax)


****на 08.12*******
1. Доделана функция удаления каталогов рекурсией в файле HW.php
2. Реализована загрузка нескольких файлов на сервер с предварительной проверкой на тип и размер с выводом соответствующих сообщений пользователю
Файл, где реализовано - share.php
Папка для хранения прошедших валидацию картинок - imgUsers


****Исправление на 06.12*******
1. Поправлена задача №2, убран unset
2. Поправлены задачи №1 и №2 касательно функций максимального и минимального нахождения значения


***----к 06.12----***
Выполнено:
/*1. создать html форму с одним текстовым полем и кнопкой submit
2. пользователь вводит в форму ссылку (URL адрес)
3. написать обработчик,
который проверяет наличие такой же ссылки в файле,
если не находит, то записывает ее в конец файла */

Добавлена функция поиска в массиве минимального и максимального значения через цикл for и функция массива - сортировку/обратную сортировку

