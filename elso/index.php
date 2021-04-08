<?php
echo("<ul>");
for($i=1; $i<=100; $i++)
{
    $piros= $i % 3 == 0 ? "style='color:red'" : "";
    echo("<li ".$piros.">".$i."</li>");
}
echo("</ul>");
