<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Introduction</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- <script type="text/javascript" src="jquery-3.5.1.min.js"></script> -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
</head>
<body>
    <!-- Asynchronous Javascript And XML==AJAX -->
    <!-- Techniques for creating fast and dynamic web pages without even reloading the whole page -->
    <!-- $.ajax(
        {
            url:filename.php, //Jun file bata datako CRUD operation garnu pane ho
            type:"POST", //"GET" is default value
            data:String/Array/Object
            success:funcion(data){
                //return the file which was in first attrubute
            }
        }
    )
    -->
     
    <div class="h1 text-center">PHP with Ajax</div>

    <div class="d-flex">
        <input type="button" value="Load More" class="mx-auto btn-primary" id="load-button">
    </div>

    <div id="table-data">
        <table class="table">
            <tr>
                <th>ID:</th>
                <th>Name:</th>
            </tr>
            <tr>
                <td>0</td>
                <td>Dummy Data</td>
            </tr>
        </table>
    </div>


    <script type="text/javascript">
        $(document).ready(function(){
            $("#load-button").on("click",function(e){
                $.ajax({
                    url:"ajax-load.php",
                    type:"POST",
                    success:function(data){
                        $("#table-data").html(data);
                    }
                });
            });
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>