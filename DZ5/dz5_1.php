<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DZ4</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="text" name="names">
        <input type="submit" value="Send">
    </form>
    <div class="dz5_1">
    <?php
// create ALPH array
$alph="А, Б, В, Г, Ґ, Д, Е, Є, Ж, З, И, І, Ї, Й, К, Л, М, Н, О, П, Р, С, Т, У, Ф, Х, Ц, Ч, Ш, Щ, Ю, Я,а, б, в, г, ґ, д, е, є, ж, з, и, і, ї, й, к, л, м, н, о, п, р, с, т, у, ф, х, ц, ч, ш, щ, ь, ю, я";
$alphArray=explode(",",$alph);
foreach($alphArray as $key => $letter){
    $alphArray[$key]=trim($letter);
}
//
// var_dump($alphArray);
// $str="ілля, василь , катерина";
if (!empty($_POST['names'])){
$str=$_POST['names'];
$strArr=explode(",",$str);
foreach($strArr as $key => $letter){
    $strArr[$key]=trim($letter);
}

function compaire($word1,$word2) {
    global $alphArray;
    $searchLetterNum = function($letter) use($alphArray){
        return (array_search ( $letter , $alphArray ) );
    };
    $n=0;
    for ($n=0;$n<=mb_strlen($word1);$n++){
        $l1=$searchLetterNum(mb_substr($word1,$n,1));
        $l2=$searchLetterNum(mb_substr($word2,$n,1));
        if ($l1===$l2){
            continue;
        }
        else{
            return ($l1-$l2);
        };
    };
    return 0;
    
};
// echo($compaire("авиль","авиль"));

usort($strArr,"compaire");
echo (implode(", ",$strArr));

}
?>
    </div>


</body>
</html>




