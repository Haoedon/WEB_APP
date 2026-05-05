<?php
function getFriendsList($type, $page) {
    // Подключение к БД
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'friends');
    if(mysqli_connect_errno()) {
        return 'Ошибка подключения к БД: ' . mysqli_connect_error();
    }
    
    // Запрос для определения числа записей
    $sql_res = mysqli_query($mysqli, 'SELECT COUNT(*) FROM friends');
    if(mysqli_errno($mysqli) || !($row = mysqli_fetch_row($sql_res))) {
         return 'Неизвестная ошибка БД';
    }
    
    $TOTAL = $row[0];
    if(!$TOTAL) {
        return '<p>В таблице нет данных</p>';
    }
    
    $PAGES = ceil($TOTAL / 10);
    if($page >= $PAGES) $page = $PAGES - 1;
    
    $offset = $page * 10;
    
    // Определение сортировки
    $order_by = 'id ASC';
    if ($type == 'fam') $order_by = 'surname ASC';
    if ($type == 'birth') $order_by = 'birth_date ASC';
    
    // Запрос выборки записей
    $sql = 'SELECT * FROM friends ORDER BY ' . $order_by . ' LIMIT ' . $offset . ', 10';
    $sql_res = mysqli_query($mysqli, $sql);
    
    // Формирование таблицы
    $ret = '<table border="1" cellpadding="5" cellspacing="0">';
    $ret .= '<tr><th>Фамилия</th><th>Имя</th><th>Отчество</th><th>Пол</th><th>Дата рождения</th><th>Телефон</th><th>Адрес</th><th>Email</th><th>Комментарий</th></tr>';
    
    while($row = mysqli_fetch_assoc($sql_res)) {
        $ret .= '<tr>
            <td>'.htmlspecialchars($row['surname']).'</td>
            <td>'.htmlspecialchars($row['name']).'</td>
            <td>'.htmlspecialchars($row['patronymic']).'</td>
            <td>'.htmlspecialchars($row['gender']).'</td>
            <td>'.htmlspecialchars($row['birth_date']).'</td>
            <td>'.htmlspecialchars($row['telephone']).'</td>
            <td>'.htmlspecialchars($row['address']).'</td>
            <td>'.htmlspecialchars($row['mail']).'</td>
            <td>'.htmlspecialchars($row['comment']).'</td>
        </tr>';
    }
    $ret .= '</table>';
    
    // Пагинация
    if ($PAGES > 1) {
        $ret .= '<div id="pages">Страницы: ';
        for($i = 0; $i < $PAGES; $i++) {
            if($i != $page) {
                $ret .= '<a href="?p=viewer&sort='.$type.'&pg='.$i.'">'.($i+1).'</a> ';
            } else {
                $ret .= '<span class="current-page">'.($i+1).'</span> ';
            }
        }
        $ret .= '</div>';
    }
    
    mysqli_close($mysqli);
    return $ret;
}
?>