<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Szöveges</title>
</head>
<body>
<form method="get">

    Szöveg: <input type="text" name="szoveg"><br>
    <input type="submit" name="submit" value="Mehet">

</form>


<?php
if (isset($_GET["submit"])) // a gomb meg lett nyomva
{
    if(isset($_GET["szoveg"]))
    {
        $szoveg = $_GET["szoveg"];
        print(str_replace('a', 'e', strtolower($szoveg)));
    }
    else
    {
        print("<h1>Hibás paraméterezés!</h1>");
    }
}

?>

</body>
</html>
