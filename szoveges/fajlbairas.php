<?php
    $fname = "upload/".sha1(microtime().rand(1,1000)).".txt";
    file_put_contents($fname, $_SERVER);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fájlba írás</title>
</head>
<body>
    <a href="<?php print($fname); ?>" target="_blank" >A szerver adatai</a>
</body>
</html>
