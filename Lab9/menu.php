<div id="menu">
<?php
// Если нет параметра меню, устанавливаем 'viewer' по умолчанию
if(!isset($_GET['p'])) $_GET['p'] = 'viewer';

// Функция хелпер для выделения активного пункта меню
function getMenuClass($current_p, $target_p) {
    return ($current_p == $target_p) ? ' class="selected"' : '';
}

echo '<a href="/?p=viewer"' . getMenuClass($_GET['p'], 'viewer') . '>Просмотр</a>';
echo '<a href="/?p=add"' . getMenuClass($_GET['p'], 'add') . '>Добавление записи</a>';
echo '<a href="/?p=edit"' . getMenuClass($_GET['p'], 'edit') . '>Редактирование записи</a>';
echo '<a href="/?p=delete"' . getMenuClass($_GET['p'], 'delete') . '>Удаление записи</a>';

// Если выбран пункт "Просмотр", выводим подменю для сортировки
if($_GET['p'] == 'viewer') {
    echo '<div id="submenu">';
    
    $sort = isset($_GET['sort']) ? $_GET['sort'] : 'byid';
    
    echo '<a href="/?p=viewer&sort=byid"' . ($sort == 'byid' ? ' class="selected"' : '') . '>По-умолчанию</a>';
    echo '<a href="/?p=viewer&sort=fam"' . ($sort == 'fam' ? ' class="selected"' : '') . '>По фамилии</a>';
    echo '<a href="/?p=viewer&sort=birth"' . ($sort == 'birth' ? ' class="selected"' : '') . '>По дате рождения</a>';
    
    echo '</div>';
}
?>
</div>