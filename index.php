<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Third</title>
</head>
<body>
    <?php
        header('Content-Type: text/html; charset=UTF-8');

        $user = 'u67427'; // Заменить на ваш логин uXXXXX
        $pass = '3193980'; // Заменить на пароль, такой же, как от SSH
        $host='localhost';
        $db_name='u67427';
        $db_table='users';
        $link = mysqli_connect($host, $user, $pass, $db_name);
    ?>
    <img class="cat" src="cat.png">
    <h1 class="head">Заполните форму</h1>
    <form method="POST" action="connect.php">
        <div class="input" >
            <input name="name" class="text" type="text" placeholder="Username">
            <input name="tel" type="tel" class="text" placeholder="+7(999)-99-99" >
            <input name="email" type="email" class="text" placeholder="example@gmail.com">
            <input name="date" type="date" class="text">
            <div class="gender">
                <label> <input type="radio" name="gen" class="chek" value="man">Мужской</label>
                <label> <input type="radio" name="gen" class="chek" value="woman">Женский</label>
            </div>
            <select name="selection[]" multiple class="select" size="5">
                <option disabled>Выберите любымый язык программирования</option>
                <option value="Pascal">Pascal</option>
                <option value="C">C</option>
                <option value="C++">C++</option>
                <option value="JavaScript">JavaScript</option>
                <option value="PHP">PHP</option>
                <option value="Python" >Python</option>
                <option value="Java">Java</option>
                <option value="Haskel" >Haskel</option>
                <option value="Clojure" >Clojure</option>
                <option value="Prolog" >Prolog</option>
                <option value="Scala" >Scala</option>
            </select>
            <textarea name="biography" class="textarea" placeholder="Биография"></textarea>
            <label><input type="checkbox" name="check" class="chek" value="YES">С контрактом ознакомлен (а)</label>
            <input type="submit" value="Сохранить" class="submit">
        </div>
    </form>
    <img class="catSecond" src="cat.jpg">
    <img class="catThird" src="catThird.jpg">
</body>
</html>