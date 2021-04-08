<?php
session_start();  // KÖTELEZŐEN AZ ELSŐ UTASÍTÁS!!!
if (isset($_POST["login"])) // a login gomb meg lett nyomva
{
    if (!empty($_POST["email"]) && !empty($_POST["jelszo"]))  // ki lettek töltve a szövegmezők
    {
        if ($_POST["email"] == "a@b.hu" && $_POST["jelszo"] == "123456aA")
        {
            $_SESSION["email"] = $_POST["email"];  // mentés a session-be
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
elseif (isset($_SESSION["email"]))  // ha be vagyunk már jelentkezve
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
            window.alert("Adja meg az e-mail címét és a megfelelő jelszót, majd nyomja meg a Bejelentkezés gombot.");
        }
    </script>
</head>
<body>
<form method="post">
    <table>
        <tr><td><input type="email" name="email" placeholder="E-mail cím"></td></tr>
        <tr><td><input type="password" name="jelszo" placeholder="Jelszó"></td></tr>
        <tr><td><input type="submit" name="login" value="Bejelentkezés"></td></tr>
    </table>
</form>
<img src="info.png" onclick="Info()">
</body>
</html>
