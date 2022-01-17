<html>
<head>
    <title>Форма завантаження файла</title>
    <meta charset="UTF-8">
    </head>
<body>
    <style>
        img {
            max-width: 500px;
        }
    </style>
    
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
        Завантажити файл: <br><br>
        <input name="filename" type="file" ><br><br>
        <input type="submit" value="Завантажити" ><br><br>
    </form>
    
    <?php 
        
        //$upload_dir = "C:/Users/mykhailo.pivkach/Documents/NetBeansProjects/unit6_upload/upload";
        $upload_dir = "upload";
        $dest=[];
        if (isset($_FILES['filename'])) {
            $filename = $_FILES['filename']['name'];
            $tmp_filename = $_FILES['filename']['tmp_name'];
            move_uploaded_file($tmp_filename, "$upload_dir/$filename");
        }
        
        //var_dump($upload_files);
        
        $upload_files = scandir($upload_dir);
        if (!file_exists('backup')) {
            mkdir('backup');
        };
        
        

        foreach ($upload_files as $filename) {
            if ($filename !== "." && $filename !== ".." ) {
                // dz 6.1 перевірка дати і переміщення
                if ((date("Ymd")-3)>filectime("$upload_dir/$filename")) {
                    $fileNew="backup/".$filename;
                    rename(("$upload_dir/$filename"), $fileNew);   
                };
                // end 6.1
                
                $reg='/^.*\.(txt)$/i';
                if (preg_match($reg, $filename)) {
                    fopen("$upload_dir/$filename", 'r');
                    $strArr=[];
                    $fileArr=file("$upload_dir/$filename");
                    
                    foreach ($fileArr as $str) {
                        $str1=explode(" ",$str);
                        foreach ($str1 as $str) {
                            $strArr[]=$str;
                        }
                    };
                    foreach($strArr as $word) {
                        
                        // dz 6.2
                        if (trim($word)=="тест") {
                            unlink("$upload_dir/$filename");
                            break;
                            // end dz6.2            
                            
                        };
                        //dz 6.3
                        if ($filename=='source.txt') {
                            $tempWord=[];
                            for ($n=0;$n<=mb_strlen($word);$n++){
                                array_unshift($tempWord,mb_substr($word,$n,1));
                            };
                            $dest[]=implode("",$tempWord);
                            
                        };
                    };
                    
                    
                };
                
                echo "</br>";
                if (getimagesize("$upload_dir/$filename") > 0) {
                    echo '<img src="' . "$upload_dir/$filename" . '">';
                };
                
                // echo date('r',filectime("$upload_dir/$filename"));
            } 
        }
        //dz 6.3
        implode(" ",$dest);
        if(file_exists("$upload_dir/source.txt")){
            // fopen("$upload_dir/dest.txt",'w+');
            $file=fopen("$upload_dir/dest.txt",'w');
            fwrite($file, implode(" ",$dest));
            // echo (implode(" ",$dest));
            fclose($file);
        };
    ?>

</body>
</html>