<?php
if(isset($_GET["x"]) && isset($_GET["y"]))
{
    $x = $_GET["x"];
    $y = $_GET["y"];
    $fekete=true;
    echo("<table border='1'>");
    for($i = 0; $i<$x;$i++)
    {
        $szin=$fekete;
        echo("<tr>");
        for ($j = 0; $j<$y; $j++)
        {
            $css = "style='background-color:".($szin ? "black" : "white")."'";
            echo("<td width='30' height='30' ".$css."></td>");
            $szin= !$szin;
        }
        echo("</tr>");
        $fekete= !$fekete;
    }
    echo("</table>");
}
else
{
    echo("Hiányzó paraméter(ek)!");
}