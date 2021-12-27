<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>
    <div class="dz1 dz">dz1
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <select name="fuel"  >Выберите тип топлива
                <option selected value="75">Дизель</option>
                <option value="50">Бензин</option>
            </select><br>
            Введите объем двигателя <input type="text" name="engine">куб.см.<br>
            Введите год выпуска <input type="text" name="year"><br>
            Введите цену авто <input type="text" name="price"><br>

            <input type="submit" value="Отправить">
        </form>
    <?php

// проверка ввода данных
if (!empty($_POST['engine'])&&!empty($_POST['year'])&&!empty($_POST['price'])){
$engine = $_POST['engine'];
$fuel = $_POST['fuel'];
$year = $_POST['year'];
$price = $_POST['price'];
$now=date("Y");
    if($year>1970&&$year<2021){
        // рассчет формулы
        
        $age=$now-$year;
        if($age<1)$age=1;
        $actsiz = $fuel*$engine/1000*$age;
        echo " акциз=$actsiz </br>"  ;
        $fullprice=$price+$actsiz;
        echo "стоимость авто с учетом акциза = $fullprice";
    }
 else {
        echo 'год введен неверно';    
    }
}
 else {
    echo 'Заполните все поля';
}


?>
    <hr>
    </div>
    <div>
        dz2<br>
        <?php 
        for($i=2002;$i<=2100;$i+=4){
            echo "год проведения ЧМ по футболу ==>> $i<br>";
        };
        ?>
    </div>
    <hr>
    <div >dz3<hr>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            Введите высоту пирамиды<input type="text" name="height"><br>
            <input type="submit" value="Отправить">
            <?php
            if (!empty($_POST['height'])){
            $height = $_POST['height'];
            $print='#';
                if($height>0&&$height<16){
                    for($i=1;$i<=$height;$i++){
                        echo "<span style='float:right'>$print</span></br>";
                        $print.='#';
                    }
                }
            else {echo "высота должна быть от 1 до 15";}}
            ?>
            
        </form>
    </div>
    <hr>
    <div>dz4<br>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        Передайте рядок цілих додатніх чисел від 1 до 100 розділених комою<input type="text" name="numbers"><br>
        <input type="submit" value="Отправить">
    </form>
        <?php 
        $progres=70 ;
        if (!empty($_POST['numbers'])){
            $search_pos=0;    
            $start_num=0;
            $arrayNum=[];
            $numbers=$_POST['numbers'];
            testGoto:
            $end_num=mb_strpos($numbers, (','),$search_pos);
            
            if($end_num){$num =trim( mb_substr($numbers,$start_num,$end_num-$start_num));
            // var_dump($num);
            $arrayNum[]=$num;
            $start_num=$end_num+1;
            $search_pos=$end_num+1;
            goto testGoto ;
            }
            else{$num =trim(mb_substr($numbers,$start_num));
                $arrayNum[]=$num;
                
            if (!preg_match('/^\+?\d+$/', $num)||$num>100||$num==0) {
                echo " Передайте рядок цілих додатніх чисел від 1 до 100 розділених комою:-)";
            }
            
            
        }
        
        foreach ($arrayNum as $value){
            echo "<progress max=100 value=$value> </progress>$value<br>";
        };
    }
    ?>
        
        <?php
        
        ?>
    </div>
    
    

</body>
</html>