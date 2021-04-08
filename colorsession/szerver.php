<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Szerver adatok</title>
</head>
<body>
<?php
print("<h3>Az ön böngészője: {$_SERVER["HTTP_USER_AGENT"]} </h3>");
print("<h3>A szerver IP-címe: {$_SERVER["SERVER_ADDR"]} </h3>");
print("<h3>A szerver protokollja: {$_SERVER["SERVER_PROTOCOL"]} </h3>");
?>
</body>
</html>
