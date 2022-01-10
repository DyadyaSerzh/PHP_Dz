<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        Введіть декілька цілих чисел<input type="text" name="nums">
        <input type="submit" value="Send">
    </form>

    <?php
    if (!empty($_POST['nums'])){
        $nums=$_POST['nums'];
        $nums=explode(" ",$nums);
        $numsArr=[];
        $sum=0;
        $pare=0;
        $noPare=[];
        foreach($nums as $num){
            if (!(preg_match('/^\-?\+?\d+$/', $num))){
                echo "$num - не являється цілим числом";
            }
            else {
                $numsArr[]=$num;
                $sum+=$num;
                if($num==0)continue;
                else {
                    ($num%2)?$noPare[]=$num:$pare++;
                };
            };
            $len=count($numsArr);
            $average = $sum/$len;
        };
        echo ("сумма чисел = $sum, середнє значення = $average , парних - $pare</br>");
        $noPare = implode(", ",$noPare);
        echo ("непарні =>> $noPare");
        
    };
    ?>
</body>
</html>