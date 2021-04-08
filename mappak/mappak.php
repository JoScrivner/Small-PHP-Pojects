<?php
if(isset($_POST["upload"]))
{
    $datum = date("Y-m-d");
    if(is_array($_FILES["file"]) && $_FILES["file"]["error"] === 0 && ($_FILES["file"]["type"] == "text/plain" || $_FILES["file"]["type"] == "text/html"))
    {
        if(!file_exists("./".$datum))
        {
            mkdir($datum);
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], $datum."/".basename($_FILES["file"]["name"]));
    }
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fájlok és mappák</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Kérem, adja meg a fájlt: <input type="file" name="file" accept="text/*"><br>
    <input type="submit" name="upload" value="Feltöltés">
</form>
<div>
    <ul>
        <?php
            $utvonal = ".".(isset($_GET["dir"]) && file_exists($_GET["dir"]) ? "/".$_GET["dir"] : "");
            $mappa = opendir($utvonal);
            while(($fajl = readdir($mappa)) !== false)
            {
                if(trim($fajl) != "" && $fajl != "." && $fajl != ".." && $fajl != pathinfo(__FILE__, PATHINFO_BASENAME))
                {
                    if (is_dir($utvonal."/".$fajl))
                    {
                        print("<li><a href='?dir=$fajl'>$fajl</a></li>");
                    }
                    else
                    {
                        print("<li><a href='".$utvonal."/".$fajl."' download='download'>$fajl</a></li>");
                    }
                }
            }
            closedir($mappa);
        ?>
    </ul>
</div>
</body>
</html>
