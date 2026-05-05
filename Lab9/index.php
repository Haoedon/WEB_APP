<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Записная книжка</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php
// Подключаем главное меню сайта
require 'menu.php';

// Если выбран пункт "Просмотр" или параметры не заданы (загрузка по умолчанию)
if (!isset($_GET['p']) || $_GET['p'] == 'viewer') {
    include 'viewer.php';
    
    // Проверка номера страницы
    if(!isset($_GET['pg']) || $_GET['pg'] < 0) $_GET['pg'] = 0;
    
    // Проверка типа сортировки
    if (!isset($_GET['sort']) || ($_GET['sort'] != 'byid' && $_GET['sort'] != 'fam' && $_GET['sort'] != 'birth')) {
        $_GET['sort'] = 'byid';
    }
    
    // Вывод контента с помощью функции из модуля viewer.php
    echo getFriendsList($_GET['sort'], $_GET['pg']);
} else {
    // Подключение других модулей в зависимости от параметра 'p'
    $module = $_GET['p'] . '.php';
    if(file_exists($module)) {
        include $module;
    } else {
        echo "<p>Модуль не найден.</p>";
    }
}
?>

</body>
</html>