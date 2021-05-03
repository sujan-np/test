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
    <div class="container">  
    <h2 class="text-center">UPDATE in PHP Mysqli using jQuery AJAX</h2>  
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">  
                <div class="modal-dialog" role="document">  
                <div class="modal-content">  
                    <div class="modal-header">  
                        <h2 class="modal-title" id="exampleModalLabel"><b>Edit User Record</b></h2>  
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">  
                        <span aria-hidden="true">×</span>  
                        </button>  
                    </div>  
                    <div id="editForm">   
                    </div>  
                </div>  
            </div>  
        </div>   
    </div>

    <script src="jquery-3.5.1.min.js"></script>

    <script type="text/javascript">  
      $(document).ready(function(){  
           // Edit record to mysqli from php using jquery ajax  
           $(document).on("click",".edit-btn",function(){  
                var id = $(this).data('id');  
                $.ajax({  
                     url :"ajax-fetch.php",  
                     type:"POST",  
                     cache:false,  
                     data:{editId:id},  
                     success:function(data){  
                          $("#editForm").html(data);  
                     },  
                });  
           });  
           // User record update to mysqli from php using jquery ajax  
           $(document).on("click","#editSubmit", function(){  
                var edit_id = $("#editId").val();  
                var name = $("#editName").val();  
                var email = $("#editEmail").val();  
                var password = $("#editPassword").val();  
                $.ajax({  
                     url:"ajax-update.php",  
                     type:"POST",  
                     cache:false,  
                     data:{edit_id:edit_id,name:name,email:email,password:password},  
                     success:function(data){  
                          if (data ==1) {  
                               alert("User record updated successfully");  
                               loadTableData();  
                          }else{  
                               alert("Some thing went wrong");       
                          }  
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