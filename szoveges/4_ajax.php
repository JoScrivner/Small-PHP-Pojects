<?php
if(isset($_POST["save"]) && isset($_POST["docname"]) && isset($_POST["text"]))
{
    if(!file_exists("./documents"))
    {
        mkdir("documents");
    }
    $fullFile = "<html><head><meta charset='utf-8'></head><body>".$_POST["text"]."</body></html>";
    file_put_contents("documents/".$_POST["docname"].".html", $fullFile);
    print("<a href=\"documents/".$_POST["docname"].".html\" download>".$_POST["docname"].".html</a>");
}
?>