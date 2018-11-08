

<form action="#" method="post">
    <input type="text" name="text" placeholder="текст который будем записывать">
    <button type="submit">Отправить</button>
</form>


<?php
/**
 * Created by PhpStorm.
 * User: NoteBook
 * Date: 03.11.2018
 * Time: 14:09
 */


//
//if (isset($_POST['text'])) {
//    $fp = fopen('file.txt', 'a+'); // r+ - перезаписывает 1 строчку, а+ записывает в конец файла
//    $text = $_POST['text']."\r\n";
//    fwrite($fp, $text);
//    fclose($fp);
//}
//
//$fp = fopen('file.txt', 'r');
//$a= 0;
//echo 'Массив который возвращает функция file(): </br>';
//print_r($mas = file('file.txt'));
//echo '</br> -------------------------------------------------</br>';
//echo 'Данные которые возвращает  функция fgets(): <br>';
//while( (($data = fgets($fp, 100)) !== false) && $a < 5){
//    echo "<b>".$a.")</b> ";
//    print_r($data);
//    echo "</br>";
//    $a++;
//}
//
//fclose($fp);
//include 'file.txt';

//  Чтение данных из csv файла

//$fp = fopen('testcsv.csv', 'r');
//if ($fp !== false){
//    echo "<table>";
//    while (($data = fgetcsv($fp, 1000, ",")) !== FALSE){
//        echo '<tr>';
//        $num = count($data);
//        for ($i=0; $i<$num; $i++){
//            echo "<td>".$data[$i]."</td>";
//        }
//        echo '</tr>';
//    }
//    echo "</table>";
//}
//fclose($fp);

// Запись данных  из csv в db

$link = mysqli_connect("127.0.0.1", "test_user", "sg2008", "csv");
$mas = [];
$j=0;
$fp = fopen('testcsv.csv', 'r');
if ($fp !== false){
    while (($data = fgetcsv($fp, 1000, ",")) !== FALSE){
        $num = count($data);
        for ($i=0; $i<$num; $i++){
            $mas[$j][$i] = $data[$i];
        }
        $j++;
    }
}
fclose($fp);
echo "<pre>";
foreach ($mas as $value){
    $sql  = "INSERT INTO `data` (`f1`, `f2`, `f3`, `f4`, `f5`, `f6`, `f7`, `f8`, `f9`) VALUES ('".$value[1]."','".$value[2]."','".$value[3]."','".$value[4]."','".$value[5]."','".$value[6]."','".$value[7]."','".$value[8]."','".$value[9]."');";
    print_r($sql);
    $res = mysqli_query($link, $sql);
}
echo "</pre>";
