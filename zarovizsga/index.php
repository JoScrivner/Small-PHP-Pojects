<?php
session_start();
if (!isset($_SESSION["email"]))  // ha NEM vagyunk belépve
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
        if (isset($_SESSION["email"]))
        {
            print($_SESSION["email"]);
        }
        else
        {
            print("Lorem ipsum");
        }
        ?>
    </title>
    <link rel="stylesheet" href="stilus.css">
    <script>
        function VeletlenSzin() {
            var r = (Math.random()*256).toFixed(0);
            var g = (Math.random()*256).toFixed(0);
            var b = (Math.random()*256).toFixed(0);
            document.getElementById("harmadik").style.color = "rgb("+r+","+g+","+b+")";
        }
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
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris massa lectus, eleifend congue ante id, auctor ullamcorper eros. Integer at purus sit amet eros luctus convallis. Mauris auctor nibh velit, at laoreet felis mollis vitae. Proin mollis sem quis ullamcorper fringilla. Aliquam eget condimentum mauris. Pellentesque feugiat quam sed sem blandit euismod. Phasellus egestas nec velit quis egestas. Nullam venenatis auctor nibh, vel aliquam leo suscipit quis. In vel cursus odio. Duis pulvinar turpis magna, ac ornare erat gravida sit amet. Curabitur molestie mauris vel vulputate pharetra. Nullam a aliquet lectus. Quisque eu tellus molestie, mattis diam sit amet, gravida arcu. Aenean ut sem vel ex tempor suscipit sed nec leo. In euismod, elit in lobortis mattis, massa nisl varius augue, in varius tellus eros pretium metus. Donec rutrum convallis ligula sit amet euismod.</p>
    <p>Nam dolor sem, egestas at nulla eu, egestas bibendum ante. Aliquam maximus eros eget consequat interdum. Fusce auctor finibus tincidunt. Mauris et lacus luctus, dictum erat sit amet, ullamcorper enim. Nam sollicitudin felis non sodales ullamcorper. Donec vel ex nisl. Ut vulputate mi imperdiet dui dignissim maximus. In est augue, consequat non ex id, pellentesque imperdiet dui. Duis aliquam blandit felis, in molestie metus imperdiet at. Praesent metus dui, accumsan vel justo non, rutrum volutpat orci.</p>
    <p id="harmadik" onmouseover="VeletlenSzin()">Mauris vel laoreet neque, vulputate ullamcorper nulla. Ut accumsan ligula ac velit ultrices, et bibendum justo egestas. Aenean in rutrum urna, eu pulvinar neque. Vestibulum vestibulum nulla felis, ut laoreet dolor posuere ac. Integer tempus viverra enim, id auctor enim porta vitae. Morbi nec pretium dolor. Praesent consequat urna rutrum orci iaculis, placerat pellentesque leo ornare.</p>
    <p>Donec ultrices rutrum eros, sit amet malesuada ex mattis et. Praesent hendrerit aliquam augue, a egestas leo bibendum eu. Cras euismod lectus a neque auctor, vel porttitor ipsum mollis. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce non dolor turpis. In iaculis ut dui non accumsan. Mauris vehicula sodales erat vel fringilla. Curabitur gravida tempor nunc vel eleifend. Nam porttitor vel lorem sed facilisis. Aenean est ex, pretium a scelerisque sed, placerat id tellus. Cras arcu odio, porttitor et sapien quis, molestie congue libero. Fusce eleifend consequat ex et luctus. Aliquam volutpat sem dolor, at efficitur risus consectetur vel.</p>
    <p>Nunc vestibulum est ipsum, et vulputate est pulvinar nec. Donec nec semper ipsum. Praesent mi arcu, malesuada in nulla nec, posuere ultrices lorem. Duis sed est gravida nibh vestibulum hendrerit eget in eros. Maecenas tortor ipsum, pellentesque id tellus eget, commodo dapibus arcu. Ut non turpis ante. Mauris et ornare arcu. Maecenas non libero urna. Etiam posuere felis congue quam scelerisque posuere a vitae leo. Aliquam tincidunt mauris magna, nec euismod urna dignissim sit amet.</p>
</div>
</body>