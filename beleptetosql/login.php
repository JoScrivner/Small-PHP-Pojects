<?php
session_start();  // KÖTELEZŐEN AZ ELSŐ UTASÍTÁS!!!
$sql = @mysqli_connect("localhost", "root", "", "shop");
if ($sql === false)
{
    die("Hiba történt az adatbázis elérésekor: ".mysqli_connect_error());
}
mysqli_set_charset($sql,'utf8');
if (isset($_POST["login"])) // a login gomb meg lett nyomva
{
    if (!empty($_POST["nev"]) && !empty($_POST["jelszo"]))  // ki lettek töltve a szövegmezők
    {
        $eredm = mysqli_query($sql, "SELECT * FROM felhasznalo WHERE usernev='{$_POST["nev"]}' AND jelszo=SHA1('{$_POST["jelszo"]}')");
        if (mysqli_num_rows($eredm)>0)  // van ilyen nevű felhasználó
        {
            $adat = mysqli_fetch_assoc($eredm);
            $_SESSION["userid"] = $adat["id"];  // felhasználó id-jének mentése a session-be
            $_SESSION["nev"] = $adat["teljesnev"];
            header("Location: index.php");
        }
        else
        {
            print("<h1>Hibás e-mail cím és / vagy jelszó!</h1>");
        }
    }
    else
    {
        print("<h3>Nem töltötte ki a szövegmezőket!</h3>");
    }
}
elseif (isset($_SESSION["userid"]))  // ha be vagyunk már jelentkezve
{
    header("Location: index.php");
}
else  // nem vagyunk még bejelentkezve
{
    print("<h4>Kérem, adja meg az e-mail címet és jelszót!</h4>");
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="stilus.css">
    <script>
        function Info() {
            window.alert("Adja meg a felhasználónevét és a megfelelő jelszót, majd nyomja meg a Bejelentkezés gombot.");
        }
    </script>
</head>
<body>
<form method="post">
    <table>
        <tr><td><input type="text" name="nev" placeholder="Felhasználói név"></td></tr>
        <tr><td><input type="password" name="jelszo" placeholder="Jelszó"></td></tr>
        <tr><td><input type="submit" name="login" value="Bejelentkezés"></td></tr>
    </table>
</form>
<img src="info.png" onclick="Info()">
</body>
</html>
