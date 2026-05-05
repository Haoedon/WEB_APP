<?php
$mysqli = mysqli_connect('127.0.0.1', 'root', '', 'friends');
if(mysqli_connect_errno()) {
    echo 'Ошибка подключения к БД: ' . mysqli_connect_error();
    exit();
}

// Обработка сохранения изменений
if(isset($_POST['button']) && $_POST['button'] == 'Изменить запись' && isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $surname = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['surname']));
    $name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['name']));
    $comment = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['comment']));
    // ... для сокращения листинга предполагается получение всех остальных полей формы аналогично add.php ...
    
    $sql_update = "UPDATE friends SET surname='$surname', name='$name', comment='$comment' WHERE id=$id";
    if(mysqli_query($mysqli, $sql_update)) {
        echo '<div style="color:green;">Данные изменены</div>';
    }
}

$currentROW = array();

// Получение информации о текущей записи
if(isset($_GET['id'])) {
    $id = (int)$_GET['id'];
    $sql_res = mysqli_query($mysqli, "SELECT * FROM friends WHERE id=$id LIMIT 0, 1");
    if($sql_res) $currentROW = mysqli_fetch_assoc($sql_res);
}

if(!$currentROW) {
    $sql_res = mysqli_query($mysqli, "SELECT * FROM friends ORDER BY surname, name LIMIT 0, 1");
    if($sql_res) $currentROW = mysqli_fetch_assoc($sql_res);
}

// Вывод списка контактов
$sql_res = mysqli_query($mysqli, 'SELECT id, surname, name FROM friends ORDER BY surname, name');
if(!mysqli_errno($mysqli)) {
    echo '<div id="edit_links">';
    while($row = mysqli_fetch_assoc($sql_res)) {
        $displayName = htmlspecialchars($row['surname'] . ' ' . $row['name']);
        if($currentROW && $currentROW['id'] == $row['id']) {
            echo '<div class="selected-record" style="font-weight:bold;">' . $displayName . '</div>';
        } else {
            echo '<a href="?p=edit&id=' . $row['id'] . '">' . $displayName . '</a><br>';
        }
    }
    echo '</div><hr>';

    // Вывод формы для текущей записи
    if($currentROW) {
        $c_id = $currentROW['id'];
        $c_surname = htmlspecialchars($currentROW['surname']);
        $c_name = htmlspecialchars($currentROW['name']);
        $c_comment = htmlspecialchars($currentROW['comment']);
        // ... (остальные поля заполняются аналогично)
        
        echo '<form name="form_edit" method="post" action="/?p=edit&id=' . $c_id . '">
            <input type="text" name="surname" value="' . $c_surname . '" required>
            <input type="text" name="name" value="' . $c_name . '" required>
            <textarea name="comment">' . $c_comment . '</textarea>
            <input type="submit" name="button" value="Изменить запись">
        </form>';
    } else {
        echo 'Записей пока нет';
    }
} else {
    echo 'Ошибка базы данных';
}
mysqli_close($mysqli);
?>