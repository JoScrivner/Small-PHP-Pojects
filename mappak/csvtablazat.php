<?php

?>

<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Fájlok és mappák</title>

</head>
<body>
<form method="post" enctype="multipart/form-data">
    Kérem, adja meg a fájlt: <input type="file" name="file" accept="text/*"><br>
    <input type="submit" name="upload" value="Feltöltés">
</form>
<div>

  <table border = "1">
  <tr>
   <th>Név</th>
   <th>Hiányzás</th>
  </tr>
    <?php

    if(isset($_POST["upload"]))
    {
        $datum = date("Y-m-d");
        if(is_array($_FILES["file"]) && $_FILES["file"]["error"] === 0 && ($_FILES["file"]["type"] == "text/plain" || $_FILES["file"]["type"] == "text/html"))
        {
            if(!file_exists("./".$datum))
            {
                mkdir($datum);
            }
            move_uploaded_file($_FILES["file"]["tmp_name"], $datum."/".basename($_FILES["file"]["name"]));
        }
        //$fajl = file($datum."/".basename($_FILES["file"]["name"]));
    }

    $data = file($datum."/".basename($_FILES["file"]["name"]));
    foreach ($data as $line){
        $lineArray = explode(";", $line);
        list($Nev, $Miss) = $lineArray;
        ?>
   <tr>
   <td>$Nev</td>
   <td>$Miss</td>
   </tr>
<?php
    } // end foreach
    //print the bottom of the table
    print "</table>";
    ?>
</div>

</body>
</html>

