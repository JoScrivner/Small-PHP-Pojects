<?php
session_start();
?>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Lorem ipsum</title>
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
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
</body>
</html>