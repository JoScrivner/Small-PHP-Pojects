<html lang="hu">
<head>
    <meta charset="UTF-8">
</head>
<body>
<?php
if(isset($_GET["szoveg"]))
{
    print(str_replace("a", "e", strtolower($_GET["szoveg"])));
}
else
{
    print("<h1>Hibás paraméterezés!</h1>");
}
?>
</body>
</html>
