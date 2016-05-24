<?php
if($_POST['submit']) {
//Кол-во ячеек/Кол-во фишек
$fieldsCount=$_POST['fieldsCount'];
$chipCount=$_POST['chipCount'];
//Ф-ция подсчета факториала числа
function factorial($x) {
    if($x===0) {
        return 1;
    }
    else {
        return factorial($x-1)*$x;
    }
}
//Считаем факториал каждого входного числа
$fieldsFactorial=factorial($fieldsCount);
$chipFactorial=factorial($chipCount);
//Ф-ция подсчета числа вариантов из кол-ва ячеек по кол-ву фишек.Получаем кол-во вариаций.
function variants($fieldsCount,$chipCount,$fieldsFactorial,$chipFactorial) {
    $u=$fieldsCount-$chipCount;
    return $fieldsFactorial/(factorial($u)*$chipFactorial);
}
$v=variants($fieldsCount,$chipCount,$fieldsFactorial,$chipFactorial);
    //Если вариаций больше 10 - "".Если вариаций меньше 10 - возвращает "Меньше 10 вариаций"
    function less10($v) {
        if($v>10) {
            return "";
        }
        else {
            return "Меньше 10 вариаций";
        }
    }
    //Пустой прямугольник убирает при 
    function rectangle($fieldsCount) {
        if($fieldsCount>4) {
            return "";
        }
        else {
            return "style='display:none'";
        }
    }
	//Не выводит число вариаций если меньше 10 вариаций 
	function countfield($v) {
        if($v<10) {
            return "";
        }
        else {
            return $v;
        }
    }
	
    //Выводит Ячейки
    function qwe1($fieldsCount) {
        if ($fieldsCount>4) {
            for($i=1;$i<=$fieldsCount;$i++) {
                echo "<td valign='top' align='center'>Ячейка {$i}</td>";
            }
        }
    }
    //Выводит Вариации
    function qwe2($v) {
        if ($v>10) {
            for($i=1;$i<=$v;$i++) {
                echo "<tr><td valign='top' align='center'>Вариант {$i}</td></tr>";
            }
        }
    }
}
?>

<html>
<head>
	<meta charset="utf-8" />
	<title></title>
</head>
<body>
    <?php echo countfield($v); ?>
    <?php echo less10($v); ?>
<table border="1" cellpadding="7" cellspacing="0">
   <tr>
     <td valign='top' align='center' <?php echo rectangle($fieldsCount); ?>></td>
     <?php echo qwe1($fieldsCount); ?>
     <?php echo qwe2($v); ?> 
   </tr>   
  </table> 
</body>
</html>