<?php
    for ($i = 0; $i < count($_FILES['testFile']['tmp_name']); $i++)
    //if(count($_FILES) > 0)
    {
        move_uploaded_file($_FILES['testFile']['tmp_name'][$i], $_FILES['testFile']['name'][$i]);
        $text = $_FILES['testFile']['name'][$i];
        $image = imageCreateFromJpeg($_FILES['testFile']['name'][$i]);
        if(($_FILES['testFile']['size'][$i] > 2*1024*1024) || (imageSx($image) > 3000))
            exit('Ширина картинки больше 3000 п., либо размер файла превышает 2 Мб');
        else
        {
            if (preg_match("/script|http|<|>|<|>|SELECT|UNION|UPDATE|exe|exec|INSERT|tmp/",$text))
            {
                //exit('В названии изображения присутствуют запрещённые слова');
                continue;
            }
            else
            {
?>
                <a href=<?php echo $_FILES['testFile']['name'][$i]; ?> target="blank"><img src=<?php echo $_FILES['testFile']['name'][$i]; ?> alt="" height=200 class="picture_link"></a>
                <!--<p><textarea name="info" class="info" rows="15" cols="64"><?php /*print_r($_FILES);*/ ?></textarea></p>-->
<?php
            }
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href = "Lab4_style.css" rel = "stylesheet">
    </head>

    <body>
        <form method="POST" enctype="multipart/form-data" class="my_page">
            <p></p><legend>Выберите файл</legend><p>
            <label for="testFile" class="testFile_label">Обзор..</label>
            <input type="file" name='testFile[]' class="testFile" id="testFile" multiple="multiple">
            <input type="submit" value="Отправить" name="Send" class="Send"></p>
            <p><a href="exit.php" class="exit">Выйти</a></p>
        </form>
    </body>

    
</html>








