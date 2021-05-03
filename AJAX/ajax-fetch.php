<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
  <?php  
      // create database connectivity   
      $servername = "localhost";  
      $username = "root";  
      $password = "";  
      $database = "testing";  
      // Create connection  
      $con = new mysqli($servername, $username, $password, $database);  
      // Check connection  
      if ($con->connect_error) {  
            die("Connection failed: " . $con->connect_error);  
      }  


      if (isset($_POST['editId'])) {  
           $editId = $_POST['editId'];  
      }  
      // fetch data from user table..  
      $sql = "SELECT * FROM users WHERE id = {$editId}";  
      $query = $con->query($sql);  
      if ($query->num_rows > 0) {  
      $output = "";  
      while ($row = $query->fetch_assoc()) {  
      $output .= "<form>  
            <div class='modal-body'>  
                 <input type='hidden' class='form-control' id='editId' value='{$row['id']}'>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editName' value='{$row['name']}'>  
             </div>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editEmail' value='{$row['email']}'>  
             </div>  
             <div class='form-group'>  
               <input type='text' class='form-control' id='editPassword' value='{$row['password']}'>  
             </div>  
            </div>  
            <div class='modal-footer'>  
             <button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>  
             <button type='button' class='btn btn-info' id='editSubmit'>Save changes</button>  
            </div>  
          </form>";            
        }  
      }  
      echo $output;  
 ?>  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
    -->
  </body>
</html>