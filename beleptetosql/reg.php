<?php
if(isset($_POST["regisztral"]))
{
    if(!empty($_POST["usernev"]) && !empty($_POST["jelszo"]) && !empty($_POST["jelszo2"]) && !empty($_POST["email"]) && !empty($_POST["teljesnev"]))
    {
        if($_POST["jelszo"] == $_POST["jelszo2"])
        {
            $eredm = mysqli_query($sql, "SELECT * FROM felhasznalo WHERE usernev='{$_POST["nev"]}'");
            if (mysqli_num_rows($eredm)===0)  // nincs ilyen felhasználónév
            {
                $usernev=mysqli_real_escape_string($_POST["usernev"]);
                $jelszo=mysqli_real_escape_string($_POST["jelszo"]);
                $teljesnev=mysqli_real_escape_string($_POST["teljesnev"]);
                $eredm = mysqli_query($sql, "INSERT INTO felhasznalo(usernev, jelszo, email, teljesnev, szuldatum) VALUES ('$usernev', SHA1('$jelszo'), '{$_POST["email"]}', '$teljesnev', '{$_POST["datum"]}')");
                if($eredm===false)
                {
                    print("<h4>Hiba történt a regisztráció során!</h4>");
                }
            }
            else
            {
                print("<h4>A felhasználónév már foglalt!</h4>");
            }
        }
    }
    else
    {
        print("<h1>Nem töltötte ki a szövegmezőket!</h1>");
    }
}
elseif(isset($_POST["vissza"]))
{
    header("Location: login.php");
}
?>

<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Bejelentkezés</title>
    <link rel="stylesheet" href="stilus.css">
</head>
<body>
<table>
<form method="post">
    <table>
        <tr><td>Felhasználónév:</td><td><input type="text" name="usernev"></td></tr>
        <tr><td>Jelszó:</td><td><input type="password" name="jelszo"></td></tr>
        <tr><td>Jelszó újra:</td><td><input type="password" name="jelszo2"></td></tr>
        <tr><td>E-mail cím:</td><td><input type="email" name="email"></td></tr>
        <tr><td>Teljes név:</td><td><input type="text" name="teljesnev"></td></tr>
        <tr><td>Születési dátum:</td><td><input type="date" name="datum" value="<?php print(date('Y-m-d')); ?>"></td></tr>
        <tr><td><input type="submit" name="regisztral" value="Regisztráció"></td><td><input type="submit" name="vissza" value="Vissza a belépőoldalra"></td></tr>
    </table>
</form>
</table>
</body>
</html>
