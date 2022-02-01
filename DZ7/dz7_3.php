<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
    <input type="text">
    </form>
    <?php
    // квадрат
        class Square
        {
            public $side=0;
            function __construct($s=5){
                $this->side=$s;
            }
            public function getArea(){
                return $this->side*$this->side;
            }
        };
        $testSquare=new Square();
        echo "площа квадрата із стороною $testSquare->side дорівнює ";
        echo $testSquare->getArea() ;
        echo "</br>";
        // прямокутник
        class Rectangle
        {
            public $side1=0;
            public $side2=0;
            function __construct($s1=5,$s2=7){
                $this->side1=$s1;
                $this->side2=$s2;
            }
            public function getArea(){
                return $this->side1*$this->side2;
            }
        }
        $testRectangle=new Rectangle();
        echo "площа прямокутника із сторонами $testRectangle->side1 та $testRectangle->side2  дорівнює ";
        echo $testRectangle->getArea(); 
        echo "</br>";
        // трикутник

        class Triangle
        {
            public $side1=0;
            public $height=0;
            
            function __construct($s1=5,$s2=7){
                $this->side1=$s1;
                $this->height=$s2;
                
            }
            public function getArea(){
                return $this->side1*$this->height/2;
            }
        }
        $testTriangle=new Triangle();
        echo "площа трикутника із стороною $testTriangle->side1 та висотою $testTriangle->height  дорівнює ";
        echo $testTriangle->getArea();
        echo "</br>";
        // круг
        class Round
        {
            public $rad=0;
            
            function __construct($r=5){
                $this->rad=$r;
            }
            public function getArea(){
                return $this->rad**2*pi();
            }
        }
        $testRound=new Round();
        echo "площа круга із радіусом $testRound->rad  дорівнює ";
        echo $testRound->getArea();
        echo "</br>";
        
    ?>
    
</body>
</html>