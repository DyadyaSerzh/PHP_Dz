<html>
<head>
    <title>Форма завантаження файла</title>
    <meta charset="UTF-8">
    </head>
<body>
    
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
        <input type="hidden" name="MAX_FILE_SIZE" value="10000000" >
        Завантажити файл: <br><br>
        <input name="filename" type="file" ><br><br>
        <input type="submit" value="Завантажити" ><br><br>
    </form>
    
    <?php 
        
        //$upload_dir = "C:/Users/mykhailo.pivkach/Documents/NetBeansProjects/unit6_upload/upload";
        $upload_dir = "upload";
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
                if ((date("Ymd")-3)>filectime("$upload_dir/$filename")) {
                    $fileNew="backup/".$filename;
                    rename(("$upload_dir/$filename"), $fileNew);   
                };
                echo "</br>";
                if (getimagesize("$upload_dir/$filename") > 0) {
                    echo '<img src="' . "$upload_dir/$filename" . '">';
                };
                
                // echo date('r',filectime("$upload_dir/$filename"));
            } 
        }
    ?>

</body>
</html>