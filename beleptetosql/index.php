<?php
session_start();
$sql = @mysqli_connect("localhost", "root", "", "shop");
if ($sql === false)
{
    die("Hiba történt az adatbázis elérésekor: ".mysqli_connect_error());
}
mysqli_set_charset($sql,'utf8');
if (!isset($_SESSION["userid"]))  // ha NEM vagyunk belépve
{
    header("Location: login.php");
}
elseif (isset($_POST["kilep"]))
{
    session_destroy();  // megszünteti a session-t
    header("Location: login.php");
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>
        <?php
        if (isset($_SESSION["nev"]))
        {
            print($_SESSION["nev"]." vásárlásai");
        }
        ?>
    </title>
    <link rel="stylesheet" href="stilus.css">
    <script>
        function Udvozol() {
            document.getElementById("udv").innerText = "Üdvözöljük!";
        }
    </script>
</head>
<body onload="window.setTimeout('Udvozol()', 5000)">
<h1 id="udv"></h1>
<form method="post">
    <input type="submit" name="kilep" value="Kilépés">
</form>
<div>
    <?php
    $eredm = mysqli_query($sql, "SELECT * FROM vasarlas WHERE felh_id={$_SESSION["userid"]}");
    if (mysqli_num_rows($eredm)>0)
    {
        print("<table>");
        print("<tr><th>Időpont</th><th>Összeg</th></tr>");
        while ($sor = mysqli_fetch_assoc($eredm))
        {
            print("<tr><td>{$sor["idopont"]}</td><td>{$sor["osszeg"]} Ft</td></tr>");
        }
        print("</table>");
    }
    else
    {
        print("Nincs még vásárlás.");
    }
    ?>
</div>
</body>