<form name="form_add" method="post" action="/?p=add" class="entry-form">
    <input type="text" name="surname" placeholder="Фамилия" required>
    <input type="text" name="name" placeholder="Имя" required>
    <input type="text" name="patronymic" placeholder="Отчество">
    <select name="gender">
        <option value="Мужской">Мужской</option>
        <option value="Женский">Женский</option>
    </select>
    <input type="date" name="birth_date" placeholder="Дата рождения">
    <input type="text" name="telephone" placeholder="Телефон">
    <input type="text" name="address" placeholder="Адрес">
    <input type="email" name="mail" placeholder="E-mail">
    <textarea name="comment" placeholder="Краткий комментарий"></textarea>
    <input type="submit" name="button" value="Добавить запись">
</form>

<?php
if(isset($_POST['button']) && $_POST['button'] == 'Добавить запись') {
    $mysqli = mysqli_connect('127.0.0.1', 'root', '', 'friends');
    if(mysqli_connect_errno()) {
        echo '<div class="error">Ошибка подключения к БД: ' . mysqli_connect_error() . '</div>';
    } else {
        $surname = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['surname']));
        $name = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['name']));
        $patronymic = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['patronymic']));
        $gender = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['gender']));
        $birth = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['birth_date']));
        $phone = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['telephone']));
        $address = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['address']));
        $mail = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['mail']));
        $comment = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST['comment']));

        $sql = "INSERT INTO friends (surname, name, patronymic, gender, birth_date, telephone, address, mail, comment) 
                VALUES ('$surname', '$name', '$patronymic', '$gender', '$birth', '$phone', '$address', '$mail', '$comment')";
                
        $sql_res = mysqli_query($mysqli, $sql);
        
        if(mysqli_errno($mysqli)) {
            echo '<div class="error" style="color:red;">Ошибка: запись не добавлена</div>';
        } else {
            echo '<div class="ok" style="color:green;">Запись добавлена</div>';
        }
        mysqli_close($mysqli);
    }
}
?>