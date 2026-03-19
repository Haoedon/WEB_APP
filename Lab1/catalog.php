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
        .categories {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin: 20px 0;
        }
        .category {
            flex: 1;
            min-width: 200px;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            text-align: center;
        }
        .products {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 20px;
        }
        .product {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 15px;
            transition: transform 0.3s;
        }
        .product:hover {
            transform: translateY(-5px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }
        .product img {
            max-width: 100%;
            height: 150px;
            object-fit: contain;
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
        <h1>Каталог лекарств</h1>
        
        <div class="categories">
            <div class="category">
                <h2>Простуда и грипп</h2>
            </div>
            <div class="category">
                <h2>Витамины</h2>
            </div>
            <div class="category">
                <h2>Сердечно-сосудистые</h2>
            </div>
            <div class="category">
                <h2>ЖКТ</h2>
            </div>
        </div>
        
        <div class="products">
            <div class="product">
                <!-- Динамические фотографии - вариант 1 -->
                <img src="fotos/aspirin<?php echo (date('s') % 2 + 1); ?>.jpg" alt="Аспирин">
                <h3>Аспирин</h3>
                <p>Производитель: Bayer</p>
                <p>Цена: 150 руб.</p>
                <button>В корзину</button>
            </div>
            
            <div class="product">
                <!-- Динамические фотографии - вариант 2 -->
                <img src="fotos/nurofen<?php echo (date('s') % 2 == 0 ? 3 : 4); ?>.jpg" alt="Нурофен">
                <h3>Нурофен</h3>
                <p>Производитель: Reckitt Benckiser</p>
                <p>Цена: 250 руб.</p>
                <button>В корзину</button>
            </div>
            
            <div class="product">
                <!-- Динамические фотографии - вариант 1 -->
                <img src="fotos/citromon<?php echo (date('s') % 2 + 1); ?>.jpg" alt="Цитрамон">
                <h3>Цитрамон</h3>
                <p>Производитель: Фармстандарт</p>
                <p>Цена: 90 руб.</p>
                <button>В корзину</button>
            </div>
            
            <div class="product">
                <!-- Динамические фотографии - вариант 2 -->
                <img src="fotos/vitaminec<?php echo (date('s') % 2 == 0 ? 3 : 4); ?>.jpg" alt="Витамин С">
                <h3>Витамин С</h3>
                <p>Производитель: Solgar</p>
                <p>Цена: 450 руб.</p>
                <button>В корзину</button>
            </div>
        </div>
        
        <!-- Динамические таблицы -->
        <?php
        // Первая строка таблицы полностью формируется PHP
        echo '<table>';
        echo '<tr><th>Группа препаратов</th><th>Количество позиций</th><th>Популярность</th></tr>';
        ?>
        
        <!-- Вторая строка таблицы -->
        <tr>
            <td><?php echo 'Простуда и грипп'; ?></td>
            <td><?php echo '125'; ?></td>
            <td><?php echo '★★★★☆'; ?></td>
        </tr>
        <tr>
            <td><?php echo 'Витамины'; ?></td>
            <td><?php echo '85'; ?></td>
            <td><?php echo '★★★★★'; ?></td>
        </tr>
        <tr>
            <td><?php echo 'Сердечно-сосудистые'; ?></td>
            <td><?php echo '67'; ?></td>
            <td><?php echo '★★★☆☆'; ?></td>
        </tr>
        </table>
        
        <h2>Как выбрать лекарство</h2>
        <p>При выборе лекарственного препарата важно учитывать не только симптомы, но и возможные противопоказания. Рекомендуем проконсультироваться с врачом перед началом приема любых лекарств.</p>
        
        <p>В нашем каталоге вы можете отфильтровать препараты по различным параметрам: цене, производителю, действующему веществу. Также доступен поиск по симптомам - просто опишите ваши проявления, и система предложит подходящие варианты.</p>
        
    
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