<?php
if(isset($_POST["upload"]))
{
    $datum = date("Y-m-d");
    if(is_array($_FILES["file"]) && $_FILES["file"]["error"] === 0)
    {
        if(!file_exists("./".$datum))
        {
            mkdir($datum);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], $datum."/".basename($_FILES["file"]["name"]));
        $fajl = file($datum."/".basename($_FILES["file"]["name"]));
    }
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>CSV feltöltés</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Kérem, adja meg a fájlt: <input type="file" name="file" accept="text/*"><br>
    <input type="submit" name="upload" value="Feltöltés">
</form>
<table>
    <?php
        if(isset($fajl))
        {
            print("<tr><th>Név</th><th>Összhiányzás</th></tr>");
            foreach ($fajl as $item) {
                $db = explode(";", $item);
                print("<tr><td>{$db[0]}</td><td>{$db[1]}</td></tr>");
            }
        }
    ?>
</table>
</body>
</html>