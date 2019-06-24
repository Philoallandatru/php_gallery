<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
$message = "";
if (isset($_POST['submit'])) {
    $photo = new Photo();
    $photo->title = $_POST['title'];
    $photo->set_file($_FILES['file_upload']);
    $photo->user_id = $session->user_id;

    if (isset($_POST['caption']))
        $photo->caption = $_POST['caption'];

    if (isset($_POST['description']))
        $photo->description = $_POST['description'];

    if (isset($_POST['alternate_text']))
        $photo->alternate_text = $_POST['alternate_text'];

    if (!$photo->save()) {
        $message = join("<br>", $photo->custom_errors);
    } else {
        $message = "Photo upload successfully";

    }
}

?>

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <?php include("includes/top_nav.php") ?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php  include("includes/user_side_nav.php"); ?>

        <!-- /.navbar-collapse -->

    </nav>

<!--    content     -->
    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Upload
                        <small>Subheading</small>
                    </h1>

                    <?php echo $message; ?>
                    <div class="col-md-6">
                        <form action="user_upload.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="file" name="file_upload" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text"  name="caption" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="alternate_text">Alternate Text</label>
                                <input type="text"  name="alternate_text" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10">
                                        </textarea>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" class="form-control">
                            </div>

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