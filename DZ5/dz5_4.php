<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        function fibonacci()
        {
            echo '1';
            $fib = [0,1];
            for($i=1;$i<20;$i++)
            {
                $fib[] = $fib[$i]+$fib[$i-1];
                echo(", ");
                echo ($fib[$i]+$fib[$i-1]);
            }
            return $fib;
        }
        $res=implode(", ",fibonacci());
        
        
    ?>
    
</body>
</html>