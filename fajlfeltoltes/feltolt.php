<?php
if (isset($_POST["upload"]))
{
    if ($_FILES["pic"]["error"] === 0) //nincs hiba
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $_FILES["pic"]["tmp_name"]); //típus ellenőrzése
        if(strpos($mime, "image") === 0)
        {
            $fname = "upload/".basename($_FILES["pic"]["name"]);
            move_uploaded_file($_FILES["pic"]["tmp_name"], $fname);
            if(file_exists($fname)) //ha létezik a fájl (sikerüolt a mozgatás)
            {
                $error=false;
            }
            else
            {
                $error= "Hiba történt a feltöltés során!";
            }
        }
        else
        {
            $error = "Hibás formátum: " . $mime;
        }
    }
    else
    {
        $error = "Feltöltési hiba: ". $_FILES["pic"]["error"];
    }
}
?>

<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fájl feltöltése és megjelenítése</title>
</head>
<body>
<?php
if(isset($error) && $error !== false)
{
    print("<h1>{$error}</h1>");
}
elseif (isset($fname))
{
    print("<img src='{$fname}'>");
}
?>
    <form method="post" enctype="multipart/form-data">
        Kérem, adja meg a feltöltendő képet:
        <input type="file" name="pic">
        <input type="submit" name="upload" value="Feltölt">
    </form>

</body>

</html>


