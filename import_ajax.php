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

      font-family: Arial, Helvetica, sans-serif;
    }

    #success_msg {
      margin-left: 30%;
      color: red;

    }
    #email{
      margin-left: -50px;
      color:green;
    }

    #file,#heading {
      text-align: center;
    }
  </style>
</head>

<body>
  <h4 id="heading">import using ajax</h4>
  <div id="success_msg">

  </div>

  <div id="error_msg">

  </div>

  <form id="xml-form" method="post" enctype="multipart/form-data">
    <div id="file">
      <input type="file" name="xml-file" /> <br> <br>
      <button type="submit">Upload</button>
    </div>
  </form>

</body>

</html>
<?php include "footer.php"; ?>

<script>
  $(document).ready(function() {
    $('#xml-form').submit(function(e) {
      e.preventDefault();
      var formData = new FormData(this);
      $.ajax({
        url: 'upload.php',
        type: 'POST',
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          document.getElementById("success_msg").innerHTML = data;
        },
        error: function(data) {
          document.getElementById("error_msg").innerHTML = "something is wrong";
        }
      });
    });
  });
</script>