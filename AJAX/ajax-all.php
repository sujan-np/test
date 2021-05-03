<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

</head>

<body>
    <?php
    $con = mysqli_connect("localhost", "root", "", "test")
        or die("Unable to connect" . mysqli_connect_error());
    ?>


    <?php
    $sql = "SELECT *
                FROM student";

    $result = mysqli_query($con, $sql);
    ?>

    <!-- code to update each records -->
    <?php
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name = $_POST['fname'];

        $update_query = "UPDATE student 
                            SET name='$name'
                            WHERE id=$id";

        $res = mysqli_query($con, $update_query);

        if ($res) {
            echo "Succesfully updated";
        } else {
            echo "Failed to update";
        }
    }
    ?>

    <!-- code to delete selected record -->
    <?php
    if (isset($_POST['del'])) {
        $id = $_POST['id'];

        $delete_query = "DELETE FROM student
                            WHERE id=$id";

        $res = mysqli_query($con, $delete_query);

        if ($res) {
            echo "Succesfully deleted";
        } else {
            echo "Failed to delete";
        }
    }
    ?>

    <!-- code to insert record -->
    <?php
    if (isset($_POST['insert_submit'])) {
        $full_name = $_POST['full_name'];

        $insert_query = "INSERT INTO student(name) 
                            VALUES('$full_name')";

        $insert_res = mysqli_query($con, $insert_query);

        if ($insert_res) {
            echo "Succesfully Inserted";
        } else {
            echo "Failed to Insert";
        }
    }
    ?>

    <table>
        <tr>
            <th>ID:</th>
            <th>Name:</th>
            <th>Edit:</th>
            <th>Delete:</th>
        </tr>

        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>

            <tr>
                <td>
                    <?php
                    echo $row['id'];
                    ?>
                </td>
                <td><?php echo $row['name']; ?></td>
                <td>
                    <a class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#uModal<?php echo $row['id'] ?>" href="ajax-all.php?edit=<?php echo $row['id']; ?>">Update</a>

                    <!-- Modal -->
                    <div class="modal fade" id="uModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Edit</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="text" class="form-control" name="fname" placeholder="Name">
                                        </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <input type="submit" value="Update" name="update" class="btn btn-primary">
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </td>
                <td>
                    <button class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#dModal<?php echo $row['id'] ?>">Delete:</button>

                    <!-- Modal -->
                    <div class="modal fade" id="dModal<?php echo $row['id'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Delete</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST">
                                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                                        Are you sure?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                    <input type="submit" value="Yes" name="del" class="btn btn-primary">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tr>

        <?php
        }
        ?>

    </table>
    <div class="container"></div>

    

    <?php
    mysqli_close($con);
    ?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>

</html>