<html>
<head>
    <title>DZ4 4</title>
    <meta charset="UTF-8">
</head>
<body>
    <div class="dz4_4">
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <textarea name="txtarea" id="" cols="40" rows="10"></textarea>
            <input type="submit" value="Отправить">
        </form>
    </div>
    <?php
        if (!empty($_POST['txtarea'])){
            $txtarea=$_POST['txtarea'];
            $txtArr=explode(" ",$txtarea);
            $textCount=0;
            // echo $textCount;
            foreach($txtArr as $value){
                $textCount+=(mb_strlen($value));
                // echo $textCount;
                if ($textCount<=40){
                    echo "$value ";
                    $textCount+=1;
                }
                else{
                    echo"</br>$value ";
                    $textCount=(mb_strlen($value)+1);
                };

            }


        }
    ?>


</body>
</html>
