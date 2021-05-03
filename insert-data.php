<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>Insert Data</title>
  </head>
  <body>
    <p class="text-center display-1">ADD Records with PHP & AJAX</p>
    <div class="row">
        <div class="col-sm-6 my-3">
            Full Name:
            <input type="text" id="fname" class="form-control">
        </div>
        <div class="col-sm-6 my-3 pt-4">
            <input type="submit" id="save-button" value="Save">
        </div>
    </div>

    <div id="table-data">
        
    </div>

    <!-- <script type="text/javascript" src="jquery-3.5.1.min.js"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    

    <script type="text/javascript">
        $(document).ready(function(){

            function loadTable(){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    success:function(data){
                        $("#table-data").html(data);
                    }
                });
            }

            loadTable();

            $("#save-button").on("click",function(e){
                e.preventDefault();
                var fname=$("#fname").val();

                $.ajax({
                    url:"ajax-insert.php",
                    method:"POST",
                    data: {full_name:fname},
                    success:function(data){

                        // if(data == 1){
                        //     loadTable();
                        // }else{
                        //     alert("Unable to insert data");
                        // }
                        loadTable();
                        
                    }
                });
            });

        });
    </script>


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