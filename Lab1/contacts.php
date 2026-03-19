<?php
// Основные переменные для страницы
$title = 'Тимошкин Р.В., группа 241-352 - Лабораторная работа №А-1';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <!-- Динамический заголовок страницы (title) -->
    <title><?php echo $title; ?></title>
    <style>
        /* Стили для сайта онлайн-аптеки (аналогичны index.php) */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        header {
            background-color: #2E8B57;
            color: white;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        nav {
            margin: 10px 0;
        }
        nav a {
            color: white;
            text-decoration: none;
            padding: 8px 15px;
            margin-right: 5px;
            border-radius: 4px;
            transition: all 0.3s;
        }
        nav a:hover {
            background-color: #3CB371;
            text-shadow: 0 0 2px white;
        }
        .content {
            max-width: 1200px;
            margin: 80px auto 20px;
            padding: 0 20px;
            flex: 1;
            /* Добавляем нижний отступ, чтобы контент не скрывался под футером */
            padding-bottom: 60px; /* Высота футера + небольшой запас */
        }
        .contact-info {
            display: flex;
            flex-wrap: wrap;
            gap: 30px;
            margin: 20px 0;
        }
        .info-block {
            flex: 1;
            min-width: 300px;
        }
        .map {
            width: 100%;
            height: 300px;
            background-color: #f0f0f0;
            margin: 20px 0;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 1px solid #ddd;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        footer {
            background-color: #444;
            color: #aaa;
            text-align: center;
            padding: 15px 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }
        .photo-section {
            display: flex;
            gap: 20px;
            margin: 20px 0;
            flex-wrap: wrap;
        }
        .photo-section img {
            max-width: 200px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <header>
        <h1>Аптека "Здоровье"</h1>
        <nav>
            <a href="<?php 
            // Динамическое меню - первый фрагмент PHP-кода
            $name = 'Главная страница';
            $link = 'index.php';
            $current_page = ($link == basename($_SERVER['PHP_SELF']));
            echo $link; 
            ?>" class="<?php 
            // Динамическое меню - второй фрагмент PHP-кода
            if($current_page) echo 'selected_menu'; 
            echo '">';
            echo $name; 
            ?></a>
            
            <a href="<?php 
            // Аналогично для второй ссылки
            $name = 'Каталог';
            $link = 'catalog.php';
            $current_page = ($link == basename($_SERVER['PHP_SELF']));
            echo $link; 
            ?>" class="<?php 
            if($current_page) echo 'selected_menu'; 
            echo '">';
            echo $name; 
            ?></a>
            
            <a href="<?php 
            // Аналогично для третьей ссылки
            $name = 'Контакты';
            $link = 'contacts.php';
            $current_page = ($link == basename($_SERVER['PHP_SELF']));
            echo $link; 
            ?>" class="<?php 
            if($current_page) echo 'selected_menu'; 
            echo '">';
            echo $name; 
            ?></a>
        </nav>
    </header>
    
    <div class="content">
        <h1>Контактная информация</h1>
        
        <div class="contact-info">
            <div class="info-block">
                <h2>Наш адрес</h2>
                <p>г. Москва, ул. Здоровья, д. 15</p>
                <p>Ближайшее метро: Станция метро "Здоровье"</p>
                
                <h2>Режим работы</h2>
                <p>Понедельник-пятница: 8:00 - 22:00</p>
                <p>Суббота-воскресенье: 9:00 - 21:00</p>
                <p>Без перерыва на обед</p>
                
                <h2>Телефоны</h2>
                <p>Консультация и заказы: +7 (495) 123-45-67</p>
                <p>Доставка: +7 (495) 765-43-21</p>
                <p>Факс: +7 (495) 111-22-33</p>
            </div>
            
            <div class="info-block">
                <h2>Электронная почта</h2>
                <p>info@zdorovie-apteka.ru</p>
                <p>support@zdorovie-apteka.ru</p>
                
                <h2>Социальные сети</h2>
                <p>ВКонтакте: vk.com/zdorovie_apteka</p>
                <p>Instagram: @zdorovie_apteka</p>
                <p>Telegram: @zdorovie_apteka_bot</p>
                
                <h2>Онлайн-консультация</h2>
                <p>Режим работы: ежедневно с 9:00 до 21:00</p>
                <p>Среднее время ожидания: 2-5 минут</p>
            </div>
        </div>
        
        <div class="map">
            [Здесь будет карта с расположением аптеки]
        </div>
        
        <!-- Динамические фотографии -->
        <div class="photo-section">
            <!-- Динамические фотографии - вариант 1 -->
            <img src="fotos/outview<?php echo (date('s') % 2 + 1); ?>.jpg" alt="Внешний вид аптеки">
            <!-- Динамические фотографии - вариант 2 -->
            <img src="fotos/inview<?php echo (date('s') % 2 == 0 ? 3 : 4); ?>.jpg" alt="Интерьер аптеки">
        </div>
        
        <!-- Динамические таблицы -->
        <?php
        // Первая строка таблицы полностью формируется PHP
        echo '<table>';
        echo '<tr><th>Способ связи</th><th>Время ответа</th><th>Особенности</th></tr>';
        ?>
        
        <!-- Вторая строка таблицы -->
        <tr>
            <td><?php echo 'Телефон'; ?></td>
            <td><?php echo 'Мгновенно'; ?></td>
            <td><?php echo 'Консультация специалиста'; ?></td>
        </tr>
        <tr>
            <td><?php echo 'Электронная почта'; ?></td>
            <td><?php echo 'до 24 часов'; ?></td>
            <td><?php echo 'Подробный ответ'; ?></td>
        </tr>
        <tr>
            <td><?php echo 'Онлайн-чат'; ?></td>
            <td><?php echo '2-5 минут'; ?></td>
            <td><?php echo 'Удобство общения'; ?></td>
        </tr>
        </table>
        
        <h2>Как к нам добраться</h2>
        <p>От станции метро "Здоровье" идти прямо по улице Здоровья 5 минут. Аптека расположена в жилом комплексе "Здоровье-Парк" на первом этаже.</p>
        
        <p>На автомобиле: от центра города двигайтесь по проспекту Мира до улицы Здоровья, поверните направо. У нас есть собственная парковка для клиентов.</p>
        
        <p>Мы всегда рады видеть вас в нашей аптеке! Наши квалифицированные фармацевты готовы проконсультировать вас по любому препарату и помочь подобрать оптимальное решение для ваших проблем со здоровьем.</p>
    </div>
    
    <!-- Динамический подвал (footer) -->
    <footer>
        <?php 
        // Форматируем дату и время в соответствии с требованиями
        // d.m.Y - день.месяц.год (с ведущими нулями)
        // H-i:s - часы-минуты:секунды (с ведущими нулями)
        date_default_timezone_set('Europe/Moscow'); 
        echo 'Сформировано ' . date('d.m.Y') . ' в ' . date('H-i:s');
        ?>
    </footer>
</body>
</html>