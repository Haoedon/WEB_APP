<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Лабораторная работа А-8: Результат анализа</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    // Листинг А-8.1 (исправлены синтаксические ошибки оригинала)
    if (isset($_POST['data']) && trim($_POST['data']) !== '') {
        $original_text = $_POST['data'];
        echo '<div class="src_text">' . htmlspecialchars($original_text) . '</div>';
        
        // Листинг А-8.4: перекодировка в CP1251 для корректной работы однобайтовых функций
        $text_cp = iconv("utf-8", "cp1251//IGNORE", $original_text);
        if ($text_cp === false) $text_cp = $original_text;
        
        test_it($text_cp);
    } else {
        echo '<div class="src_error">Нет текста для анализа</div>';
    }
    ?>

    <a href="index.html" class="back-link">Другой анализ</a>

    <?php
    // Основная функция анализа (Листинги А-8.2, А-8.3 + доработки по заданию)
    function test_it($text) {
        echo '<table>';
        echo '<tr><th>Параметр</th><th>Значение</th></tr>';

        // 1. Количество символов
        $total_chars = strlen($text);
        echo "<tr><td>Количество символов</td><td>{$total_chars}</td></tr>";

        // Подготовка наборов символов для быстрой проверки
        $digits_arr = array_fill_keys(str_split('0123456789'), true);
        $punct_arr  = array_fill_keys(str_split('.,!?;:()[]{}"\'-—–«»…'), true);

        $cifra_amount = 0;
        $punct_amount = 0;
        $letter_amount = 0;
        $upper_amount = 0;
        $lower_amount = 0;
        $word = '';
        $words = array();
        $len = strlen($text);

        for ($i = 0; $i < $len; $i++) {
            $char = $text[$i];
            $code = ord($char);

            // Цифры
            if (isset($digits_arr[$char])) $cifra_amount++;

            // Буквы и регистр (диапазоны CP1251: A-Z, a-z, А-Я, а-я, Ё, ё)
            $is_upper = ($code >= 65 && $code <= 90) || ($code >= 192 && $code <= 223) || $code == 168;
            $is_lower = ($code >= 97 && $code <= 122) || ($code >= 224 && $code <= 255) || $code == 184;

            if ($is_upper || $is_lower) {
                $letter_amount++;
                if ($is_upper) $upper_amount++;
                else $lower_amount++;
            }

            // Знаки препинания
            if (isset($punct_arr[$char])) $punct_amount++;

            // Разбиение на слова (пробел или знак препинания = разделитель)
            if ($char === ' ' || isset($punct_arr[$char])) {
                if ($word !== '') {
                    $words[$word] = isset($words[$word]) ? $words[$word] + 1 : 1;
                    $word = '';
                }
            } else {
                $word .= $char;
            }
        }
        // Сохраняем последнее слово, если текст не заканчивается разделителем
        if ($word !== '') {
            $words[$word] = isset($words[$word]) ? $words[$word] + 1 : 1;
        }

        // 2-6. Вывод статистики
        echo "<tr><td>Количество букв</td><td>{$letter_amount}</td></tr>";
        echo "<tr><td>Количество заглавных букв</td><td>{$upper_amount}</td></tr>";
        echo "<tr><td>Количество строчных букв</td><td>{$lower_amount}</td></tr>";
        echo "<tr><td>Количество знаков препинания</td><td>{$punct_amount}</td></tr>";
        echo "<tr><td>Количество цифр</td><td>{$cifra_amount}</td></tr>";
        echo "<tr><td>Количество слов</td><td>" . count($words) . "</td></tr>";

        // 7. Вхождения символов (без учета регистра)
        $symbs = test_symbs($text);
        echo "<tr><td>Вхождения символов (без учета регистра)</td><td>";
        foreach ($symbs as $s => $count) {
            if ($s === ' ' || $s === "\n" || $s === "\r" || $s === "\t") continue;
            $utf8_s = iconv("cp1251", "utf-8", $s);
            echo htmlspecialchars($utf8_s) . " → " . $count . "<br>";
        }
        echo "</td></tr>";

        // 8. Слова и вхождения, отсортированные по алфавиту
        ksort($words);
        echo "<tr><td>Слова и их вхождения</td><td>";
        foreach ($words as $w => $cnt) {
            $utf8_w = iconv("cp1251", "utf-8", $w);
            echo htmlspecialchars($utf8_w) . " → " . $cnt . "<br>";
        }
        echo "</td></tr>";

        echo '</table>';
    }

    // Функция подсчета частоты символов (Листинг А-8.3)
    function test_symbs($text) {
        $symbs = array();
        $l_text = strtolower($text);
        $len = strlen($l_text);
        for ($i = 0; $i < $len; $i++) {
            $char = $l_text[$i];
            if (isset($symbs[$char])) $symbs[$char]++;
            else $symbs[$char] = 1;
        }
        return $symbs;
    }
    ?>
</body>
</html>