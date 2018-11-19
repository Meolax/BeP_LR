<?php
    if(!empty($_POST)){
        header('location: story.php');
    }
?>
<?php
    $fileName = 'content.txt';
    $fileData = fopen($fileName, 'r');
    $oldData = file_get_contents($fileName);
    fclose($fileData);

    if(isset($_REQUEST['OK'])){
        $login = $_POST['login'];
        $text = $_POST['text'];

        $fileName = 'content.txt';
        $dataFile = fopen($fileName, 'w');
        $newData = "<p>".$login.": ".$text."</p>".$oldData;
        $writeNewData = fwrite($dataFile, $newData);
        if($writeNewData){
            fclose($dataFile);
            header('Refresh: 0');
        }                
    }

    
?>
<!DOCTYPE html>
<html>
<head>
    <title>StoryBook</title>
    <meta charset="utf-8">
    <style type="text/css">
        .label{
            float: left;
        }
        .il_lbl{
            margin-bottom: 20px;
        }
        .il_input{
            margin-bottom: 18px;
        }
    </style>
</head>
<body>
    <section>
        <form method="POST">
            <div class="label">Имя:<br class="il_lbl">Сообщение:</div>
            <div><input type="text" name="login" required><br class="il_input">
                 <input type="text" name="text" required><br class="il_input">
            </div>
            <input type="submit" name = "OK" value = "Отправить">
        </form>
        <?php
            echo $oldData;
        ?>
    </section>
</body>
</html>