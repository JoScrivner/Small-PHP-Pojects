<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Beléptető rendszer</title>
    <link href="login.css" rel="stylesheet">
</head>
<body>
<?php
$ok = false; // kezdetben nem OK
if (isset($_POST["login"])) // a login gomb meg lett nyomva
{
    if (!empty($_POST["nev"]) && !empty($_POST["jelszo"]))  // ki lettek töltve a szövegmezők
    {
        if ($_POST["nev"] == "admin" && $_POST["jelszo"] == "123456aA")
        {
            print("<h1>Sikeres bejelentkezés!</h1>");
            $ok = true;
        }
        else
        {
            print("<h1>Hibás felhasználói név és / vagy jelszó!</h1>");
        }
    }
    else
    {
        print("<h3>Nem töltötte ki a szövegmezőket!</h3>");
    }
}
else
{
    print("<h4>Kérem, adja meg a felhasználói nevet és jelszót!</h4>");
}
if(!$ok)  // ha az OK változó hamis
{
    ?>
    <form method="post">
        Felhasználói név: <input type="text" name="nev"><br>
        Jelszó: <input type="password" name="jelszo"><br>
        <input type="submit" value="Bejelentkezés" name="login">
    </form>
    <?php
}
?>
</body>
</html>