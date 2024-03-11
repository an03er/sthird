<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="connectStyle.css">
    </head>
    <body>
        <?php
        $errors=false;
        if (empty($_POST['name'])) {
            print('Заполните имя </br>');
            $errors=true;
        }
        if (strlen($_POST['name'])>150){
            print(' Длина имени не должна превышать 150 символов </br>');
            $errors=true;
        }
        if (empty($_POST['tel'])) {
            print(' Укажите телефон </br>');
            $errors=true;
        }
        if (empty($_POST['email'])){
            print( 'Укажите email </br>');
            $errors=true;
        }
        if (empty($_POST['date'])){
            print(' Введите дату </br>');
            $errors=true;
        }
        if (empty($_POST['gen'])){
            print(' Укажите пол </br>');
            $errors=true;
        }
        if (empty($_POST['selection'])){
            print(' Выберите язык программирования </br>');
            $errors=true;
        }
        if (empty($_POST['biography'])){
            print(' Укажите биографию </br>');
            $errors=true;
        }
        if (strlen($_POST['name'])>250){
            print(' Длина биографии не должна превышать 250 символов </br>');
            $errors=true;
        }
        if (empty($_POST['check'])){
            print(' Ознакомьтесь с контрактом </br> </br> </br> </br>');
            $errors=true;
        }
    ?>        
        <a href="index.php">Вернуться к форме</a>
    </br>
        <?php
        if ($errors==true){
            $logo="<img src='catError.jpg'>";
            echo "</br>"."</br>"."</br>".$logo;
            exit();
        }
        header('Content-Type: text/html; charset=UTF-8');

        $user = 'u67427'; 
        $pass = '3193980'; 
        $host='localhost';
        $db_name='u67427';
        $db_table='users';
        $link = mysqli_connect($host, $user, $pass, $db_name);
        $db = new PDO('mysql:host=localhost;dbname=u67427', $user, $pass,
          [PDO::ATTR_PERSISTENT => true, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); 
        
        $name=htmlspecialchars($_POST['name']);
        $email=htmlspecialchars($_POST['email']);
        $tel=htmlspecialchars($_POST['tel']);
        $date=htmlspecialchars($_POST['date']);
        $gender=htmlspecialchars($_POST['gen']);
        $language=array();
        foreach($_POST['selection'] as $option) {
            array_push($language,$option);
        }
        $biography=array();
        $text = explode("\n", $_POST['biography']);
        foreach ($text as $value) {
            array_push($biography,$value);
        }
        $box=htmlspecialchars($_POST['check']);
        try {
            $data = array( 'name' => $name, 'email' => $email, 'tel' => $tel, 'date' => $date,'gender'=>$gender, 'language' => implode(",",$language), 'biography' => implode("\n",$biography), 'box' => $box); 
            $query = $db->prepare("INSERT INTO $db_table (name, email, tel, date, gender, language, biography, box) values (:name, :email, :tel, :date,:gender, :language, :biography, :box)");
            $query->execute($data);
          $result = true;
        }
        catch(PDOException $e){
          print('Error : ' . $e->getMessage());
          exit();
        }
        if ($result) {
            echo "</br>"."</br>"."</br>"."Спасибо! Информация успешно занесена в базу данных";
            $logo="<img src='catGood.jpg'>";
            echo "</br>"."</br>"."</br>".$logo."</br>"."</br>"."</br>";
        }
        $user = 'u67427';
        $pass = '3193980';
        $host='localhost';
        $db_name='u67427';
        $db_table='users';
        $link = mysqli_connect($host, $user, $pass, $db_name);
        $sql = "SELECT * FROM users";
        $result = mysqli_query($link, $sql);
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
        print("Содержимое базы данных");
        foreach ($rows as $row) {
            print(" Имя: " . $row['name'] . "<br>". " Email: " . $row['email'] . "<br>"." Номер телефона:". "<br>". " Дата рождения: " .$row['date'] . "<br>". " Пол: " . $row['gender'] . "<br>". " Любимый язык: ". $row['language'] . "<br>". " Биография: ". $row['biography'] . "<br>" . " Согласен с контрактом: ". $row['box'] . "<br>");
            print("</br>"."</br>");
        }
        ?>
    </body>
</html>