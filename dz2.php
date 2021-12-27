<html>
<head>
    <title>Форма</title>
    <meta charset="UTF-8">
</head>
<body>
    <div class="btn_dz">
        <button onclick="ShowDz(0)">show dz1</button>
        <button onclick="ShowDz(1)">show dz2</button>
        <button onclick="ShowDz(2)">show dz3</button>
        <button onclick="ShowDz(3)">show dz4</button>
                
    </div>
<!--Dz 1-->
<div class="dz1 dz">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        dz1 = Введіть список імен через кому <input type="text" name="name"><br>
        <input type="submit">
    </form>
</div>
<div class="dz2 dz">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        dz2 = Введіть довільний імейл <input type="text" name="name2"><br>
        <input type="submit">
    </form>
</div>
<div class="dz3 dz">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        dz3 = Введіть прізвище, ім'я та по-батькові<input type="text" name="name3"><br>
        <input type="submit">
    </form>
</div>
<div class="dz4 dz">
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        dz4 = Введіть текст з інтернет адресом<input type="text" name="name4"><br>
        <input type="submit">
    </form>
</div>
<?php
//Dz 1
if (!empty($_POST['name'])) {
    $name = $_POST['name'];
    echo str_replace(",",";",$name);
}
//dz2
if (!empty($_POST['name2'])) {
    $name2 = $_POST['name2'];
    $pattern = '/.\@*.\.+[^.]/i';
    $res=(preg_match($pattern,$name2));
    if ($res===1){echo 'введено вірно';}
     else {
         {echo 'введено невірно';}
    }
}
//dz3
if (!empty($_POST['name3'])) {
    $name3 = $_POST['name3'];
    echo ("$name3</br>");
    $name3 =mb_strtoupper($name3);
    $name3 = trim($name3);
    $leter_first=mb_substr($name3,0,1);
    $numSec=(mb_strpos($name3, ' '))+1;
    $leter_second=mb_substr($name3,$numSec,1);
    $numThird=(mb_strpos($name3, ' ',$numSec))+1;
    $leter_Third=mb_substr($name3,$numThird,1);
    echo ("$leter_first.$leter_second.$leter_Third");
}
//dz4
if (!empty($_POST['name4'])) {
    $name4 = $_POST['name4'];
    $search_pos=0;
    $start_http=mb_strpos($name4, ('http://'),$search_pos);
    $start_https=mb_strpos($name4, ('https://'),$search_pos);
    $start_ftp=mb_strpos($name4, ('ftp://'),$search_pos);
    // проверка на наличие адреса в тексте
    if ($start_http!==FALSE) {
        $end_http=mb_strpos($name4,' ',$start_http);
        if($end_http===false){$html_name=mb_substr($name4,$start_http);}
        else{$html_name=mb_substr($name4,$start_http,($end_http-$start_https));};
        $rep_link="<a href='$html_name'>$html_name</a>";
//        echo "$end_http $html_name";
        echo str_replace($html_name,$rep_link,$name4);
    };
    //Поскольку функции еще не проходили - запускаю проверку для каждого варианта
    if ($start_https!==FALSE) {
        $end_http=mb_strpos($name4,' ',$start_https);
        if($end_http===FALSE){$html_name=mb_substr($name4,$start_https);}
        else{$html_name=mb_substr($name4,$start_https,($end_http-$start_https));}
        $rep_link="<a href='$html_name'>$html_name</a>";
        echo str_replace($html_name,$rep_link,$name4);
    //        echo ("<a href='$full_name'>$full_name</a>");
    };
    //Поскольку функции еще не проходили - запускаю проверку для каждого варианта
     if ($start_ftp!==FALSE) {
        $end_http=mb_strpos($name4,' ',$start_ftp);
        if($end_http===false){$html_name=mb_substr($name4,$start_ftp);}
        else{$html_name=mb_substr($name4,$start_ftp,($end_http-$start_ftp));};
        $rep_link="<a href='$html_name'>$html_name</a>";
//        echo "$end_http $html_name";
        echo str_replace($html_name,$rep_link,$name4);
    //        echo ("<a href='$full_name'>$full_name</a>");
    };
}

//$i = 0;
$i = 10;

do {
    echo "Значення i: " . $i . "<br>";
    $i++;
} while($i < 10);

?>
    <script>
        let num=window.localStorage.getItem('key')
        console.log(num==true)
        if(num==undefined){num=0}
        else{}
        console.log(num)
        let dz=document.querySelectorAll('.dz')
        let dz1=document.querySelector('.dz1')
        let dz2=document.querySelector('.dz1')
        let ShowDz=(num)=>{
            dz.forEach((el)=>{
                window.localStorage.setItem('key',num)
                el.style.display='none'
                dz[num].style.display='block'
            })
        }
        ShowDz(num)
    </script>
</body>
</html>