<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

    <title>Hello, world!</title>
  </head>
  <body>
    <h1>image upload here</h1>
    <form id="f">
    <input type="file" name="file" id="up_file" />
    <input type="submit" name="upload_btn" id="upload_btn" value="upload" />
    </form>
    <br>
    <div class="img_per">
    
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->

    <script>
        $("#f").on("submit", function(e){
            e.preventDefault();
            var formData = new FormData(this); 
            $.ajax({
                url : "upload.php",
                type : "POST",
                data : formData,
                contentType : false, // we use false rather than multipart/form-data,
                processData : false,
                success : function(data){
                    // $('.img_per').html(data);
                    // $('#up_file').val("");
                    console.log(data);
                    alert(data);
                },
                error : function(data){
                  alert(data);
                }
            });
        });
    </script>

  </body>
</html>