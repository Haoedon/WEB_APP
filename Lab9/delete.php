<?php
$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'friends');
if(mysqli_connect_errno()) {
    echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    exit();
}

// Обработка удаления
if(isset($_GET['del_id'])) {
    $del_id = (int)$_GET['del_id'];
    
    // Сначала получаем фамилию для вывода в сообщение
    $res = mysqli_query($mysqli, "SELECT surname FROM friends WHERE id=$del_id LIMIT 1");
    if($res && $row = mysqli_fetch_assoc($res)) {
        $del_surname = htmlspecialchars($row['surname']);
        
        // Удаляем запись
        if(mysqli_query($mysqli, "DELETE FROM friends WHERE id=$del_id")) {
            echo '<div style="color:red; font-weight:bold;">Запись с фамилией ' . $del_surname . ' удалена</div>';
        }
    }
}

// Вывод списка контактов (Фамилия И.О.)
$sql_res = mysqli_query($mysqli, 'SELECT id, surname, name, patronymic FROM friends ORDER BY surname');
if(!mysqli_errno($mysqli)) {
    echo '<div id="delete_links">';
    $has_records = false;
    while($row = mysqli_fetch_assoc($sql_res)) {
        $has_records = true;
        
        $surname = htmlspecialchars($row['surname']);
        // Формирование инициалов
        $name_initial = !empty($row['name']) ? mb_substr($row['name'], 0, 1) . '.' : '';
        $patronymic_initial = !empty($row['patronymic']) ? mb_substr($row['patronymic'], 0, 1) . '.' : '';
        
        $displayName = $surname . ' ' . $name_initial . $patronymic_initial;
        
        // Ссылка на удаление (добавляем onclick для защиты от случайного нажатия)
        echo '<a href="?p=delete&del_id=' . $row['id'] . '" onclick="return confirm(\'Точно удалить?\');">' . $displayName . '</a><br>';
    }
    
    if(!$has_records) {
        echo '<p>Список контактов пуст.</p>';
    }
    echo '</div>';
} else {
    echo 'Ошибка базы данных';
}

mysqli_close($mysqli);
?>