<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
$message = "";
if (isset($_POST['submit'])) {
    $phote = new Photo();
    $phote->title = $_POST['title'];
    $phote->set_file($_FILES['file_upload']);
    if (!$phote->save()) {
        $message = join("<br>", $phote->custom_errors);
    } else {
        $message = "Photo upload successfully";

    }
}


?>


    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <?php include("includes/top_nav.php") ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php  include("includes/side_nav.php"); ?>

        <!-- /.navbar-collapse -->

    </nav>

<!--    content     -->
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        上传
                    </h1>

                    <?php echo $message; ?>
                    <div class="col-md-6">
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>标题
                                <input type="text" name="title" class="form-control">
                                </label>
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            <input type="submit" name="submit" class="form-control">
                        </form>
                    </div>




                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->


<?php include("includes/footer.php"); ?>