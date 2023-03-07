<?php

include('security.php');
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container">
    <div class="col-md-12">
        <div class="row">
            <div class="col-xl-10 col-lg-12 col-md-9">
                <h3 class="text-center">Upload</h3>
                <?php if (isset($_GET['error'])) : ?>

                    <p><? echo $_GET['error']; ?></p>
                <?php endif ?>

                <form action="code.php" method="POST" class="my-5" method="POST" enctype="multipart/form-data">
                    <input type="file" name="my_image" class="form-control"></input>
                    <input type="submit" name="submit" value="Upload" class="btn btn-success my-3">
                </form>
            </div>
            <div class="col-xl-10 col-lg-12 col-md-9">
                <h3 class="text-center">Portfolio</h3>
                <?php
                $query = "SELECT * FROM users ORDER BY id DESC";
                $query_run = mysqli_query($connection, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    while ($images = mysqli_fetch_assoc($query_run)) { ?>

                        <div class="alb">
                            <img src="uploads/<?= $images['image'] ?>">
                        </div>

                <?php  }
                } ?>

            </div>
        </div>
    </div>

    <?php
    include('includes/scripts.php');
    include('includes/footer.php');
    ?>






    <!--     $query = "SELECT * FROM users WHERE id='$id";
    $query_run = mysqli_query($connexion, $query);

    if (mysqli_num_rows($query_run) > 0) {

        $row = mysqli_fetch_assoc($query_run); -->