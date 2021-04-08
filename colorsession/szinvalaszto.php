<?php
session_start();
if (isset($_POST["set"]))
{
    if (isset($_POST["eloter"]) && isset($_POST["hatter"]))
    {
        $_SESSION["eloter"] = $_POST["eloter"];
        $_SESSION["hatter"] = $_POST["hatter"];
    }
    else
    {
        print("<h1>HIBA!</h1>");
    }
}
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Színválasztó</title>
    <script type="text/javascript">
        function szinBeallit(hatter) {
            var szin = hatter ? document.getElementById("hatter").value : document.getElementById("eloter").value;
            if (hatter)
            {
                document.body.style.backgroundColor = szin;
            }
            else
            {
                document.body.style.color = szin;
            }
        }
    </script>
    <?php
    if (isset($_SESSION["eloter"]) && isset($_SESSION["hatter"]))
    { ?>
        <style>
            body
            {
                background-color: <?php print($_SESSION["hatter"]); ?>;
                color: <?php print($_SESSION["eloter"]); ?>;
            }
        </style>
    <?php
    }
    ?>
</head>
<body>
<form method="post">
    Háttérszín: <input type="color" name="hatter" id="hatter" onchange="szinBeallit(true);" value="<?php if(isset($_SESSION["hatter"])) { print($_SESSION["hatter"]); } ?>"><br>
    Betűszín: <input type="color" name="eloter" id="eloter" onchange="szinBeallit(false);" value="<?php if(isset($_SESSION["eloter"])) { print($_SESSION["eloter"]); } ?>"><br>
    <input type="submit" name="set" value="Beállít"><br>
</form>
<a href="lorem.php" target="_blank">Másik oldal</a>
</body>
</html>
