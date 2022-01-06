<?php
$alph="а, б, в, г, ґ, д, е, є, ж, з, и, і, ї, й, к, л, м, н, о, п, р, с, т, у, ф, х, ц, ч, ш, щ, ь, ю, я";

$alphArray=explode(",",$alph);
foreach($alphArray as $key => $letter){
    $alphArray[$key]=trim($letter);
}
// var_dump($alphArray);
$str="ілля, василь , катерина";
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
var_dump($strArr)
// echo count($strArr);


// $compaire((mb_substr($str,0,1)),(mb_substr($str,2,1)))


?>
