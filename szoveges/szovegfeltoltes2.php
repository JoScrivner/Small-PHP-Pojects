<?php
    if(isset($_POST["upload"]))
    {
        if($_FILES["txt"]["error"] === 0 && $_FILES["txt"]["type"] == "text/plain")
        {
            if(!file_exists("./upload"))
            {
                mkdir("upload");
            }
            $fname = "upload/".basename($_FILES["txt"]["name"]);
            move_uploaded_file($_FILES["txt"]["tmp_name"], $fname);
            $fajl = nl2br(strip_tags(file_get_contents($fname)));
        }
        else
        {
            $error = "Hiba történt a feltöltés során.";
        }
    }
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Szöveg feltöltése</title>
</head>
<body>
<form method="post" enctype="multipart/form-data">
    Kérem, adja meg a szöveges állományt: <input type="file" name="txt" accept="text/plain"><br>
    <input type="submit" name="upload" value="Feltöltés"><br>
</form>
<?php
    if(isset($fajl))
    {
        print("<div><i>{$fajl}</i></div>");
    }
    elseif (isset($error))
    {
        print("<h1>{$error}</h1>");
    }
?>
</body>
</html>
