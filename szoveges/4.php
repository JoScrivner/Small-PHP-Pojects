<?php
if (isset($_POST["ok"]))
{
    if (is_array($_FILES["file"]) && $_FILES["file"]["error"] == 0 && ($_FILES["file"]["type"] == "text/plain" || $_FILES["file"]["type"] == "text/html"))
    {
        if(!file_exists("./documents"))
        {
            mkdir("documents");
        }
        move_uploaded_file($_FILES["file"]["tmp_name"], "documents/" . basename($_FILES["file"]["name"]));
        $result = file_get_contents("documents/" . basename($_FILES["file"]["name"]));
    }
    else
    {
        $result = false;
    }
}
?>
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <!-- include libraries(jQuery, bootstrap) -->
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>

    <!-- include summernote css/js-->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.8/summernote.js"></script>
    <script>
        $(document).ready(function () {
            $('#summernote').summernote(
                {
                    height: "500px"
                }
            );
        });

        function SaveDocument()
        {
            var docName = prompt("Mi legyen a dokumentum neve? (Kiterjesztés nélkül!)", "test");
            var data =
                {
                    docname: docName,
                    text: $("#summernote").summernote("code"),
                    save: true
                };
            $.ajax(
                {
                    url: "4_ajax.php",
                    type: "post",
                    data: data,
                    success: function (message) {
                        $("#response").html("<h2 style='display: inline'>A mentett állomány: </h2>" + message);
                    }
                }
            )
        }
    </script>
</head>
<body>
<div class="content-fluid">
    <div class="row">
        <div id="response" class="col-lg-offset-1 col-lg-10 centered-text"></div>
    </div>
    <div class="row">
        <div class="col-lg-offset-1 col-lg-10">
            <div id="summernote"><?php print((isset($result) && $result !== false) ? $result : "Nincs fájl, vagy hibás feltöltés!"); ?></div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4" align="center">
            <form enctype="multipart/form-data" method="post">
                <label>Fájl: </label>
                <input type="file" name="file" accept="text/*"><br>
                <input type="submit" name="ok" value="Feltöltés">
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-offset-4 col-lg-4" align="center">
            <input type="button" value="Mentés" onclick="SaveDocument();">
        </div>
    </div>
</div>
</body>
</html>
