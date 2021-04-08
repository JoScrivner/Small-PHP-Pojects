<?php
$ok = false; // kezdetben nem OK
if (isset($_POST["login"]) && !filter_input(INPUT_COOKIE, "auth", FILTER_VALIDATE_BOOLEAN)) // a login gomb meg lett nyomva
{
    if (!empty($_POST["nev"]) && !empty($_POST["jelszo"]))  // ki lettek töltve a szövegmezők
    {
        if ($_POST["nev"] == "admin" && $_POST["jelszo"] == "123456aA")
        {
            $ok = true;
            setcookie("auth", "true", time()+3600*24);
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
elseif (filter_input(INPUT_COOKIE, "auth", FILTER_VALIDATE_BOOLEAN))
{
    $ok = true;
}
else
{
    print("<h4>Kérem, adja meg a felhasználói nevet és jelszót!</h4>");
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Beléptető rendszer</title>
    <link href="login.css" rel="stylesheet">
</head>
<body>
<?php
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
else
{
    print("<h1>Sikeres bejelentkezés!</h1>");
}
?>
</body>
</html>