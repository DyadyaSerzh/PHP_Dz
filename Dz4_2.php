<html>
<head>
    <title>DZ4</title>
    <meta charset="UTF-8">
</head>
<body>
    <div class="dz4_2" style="display: grid; grid-template-columns: repeat(12, 1fr); grid-template-rows: repeat(8, 1fr);">
        <?php
            define("M", 12);
            define("N", 8);
            $arr_numbers=[];
            for($m=0;$m<M;$m++){
                for($n=0;$n<N;$n++){
                    array_push($arr_numbers, rand(1,100)); 
                }   
            }
            // var_dump($arr_numbers)
            foreach($arr_numbers as $number)  :
                ?>
                <p><?php echo $number?></p>
                <?php endforeach; ?>
        

    </div>


</body>
</html>
