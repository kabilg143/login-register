<?php

include "header.php";
include "navigation.php";


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>insert xml data using ajax</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  <style>
    body {
      text-align: center;
      font-family: Arial, Helvetica, sans-serif;
    }
    div{
      color: red;
    }
  </style>
</head>

<body>
  <h4>import using ajax</h4>
  <div id="div1">

  </div>

  <div id="div2">

  </div>

  <form id="xml-form" method="post" enctype="multipart/form-data">
    <!-- <strong>select file</strong> <br> -->
    <input type="file" name="xml-file" /> <br> <br>
    <button type="submit">Upload</button>
  </form>

</body>

</html>
<?php include "footer.php"; ?>

<script>
  $(document).ready(function () {
    $('#xml-form').submit(function (e) {
      e.preventDefault();


      var formData = new FormData(this);



      $.ajax({
        url: 'upload.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,

        success: function (data) {
          document.getElementById("div1").innerHTML = data;
        },
        error: function (data) {
          document.getElementById("div2").innerHTML = "something is wrong";
        }
      });
    });
  });

</script>