<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
    <input name="first" type="text" ><br><br>
    <input name="second" type="text" ><br><br>
    <input type="radio" name="radio" checked id="" value="+">+
    <input type="radio" name="radio" id="" value="-">-
    <input type="radio" name="radio" id="" value="*">*
    <input type="radio" name="radio" id="" value="/">/<br><br>
    <input type="submit">
    
    
</form>
    <?php
        class Calc{
            public $first;
            public $second;
            public function Plus(){
                return $this->first+$this->second;
            }
            public function Minus(){
                return $this->first-$this->second;
            }
            public function Mnozh(){
                return $this->first*$this->second;
            }
            public function Dilen(){
                return $this->first/$this->second;
            }
        }
        
        if((!empty($_POST['first'])&!empty($_POST['second']))) {
            $num=new Calc();
            $num->first=(float)$_POST['first'];
            $num->second=(float)$_POST['second'];
            $radio=(string)$_POST['radio'];
            
            if ($radio=="+"){
                $result=$num->Plus();
            };
            if ($radio=="-"){
                $result=$num->Minus();
            };
            if ($radio=="*"){
                $result=$num->Mnozh();
            };
            if ($radio=="/"){
                $result=$num->Dilen();
            };
            echo $result;
            
         }        
         
       


    ?>
    
</body>
</html>