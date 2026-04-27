<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа А-8: Ввод текста</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Введите текст для анализа</h2>
    <form action="result.php" method="POST">
        <textarea name="data" rows="10" cols="50" placeholder="Введите английский или русский текст..."></textarea>
        <br>
        <input type="submit" value="Анализировать">
    </form>
</body>
</html>