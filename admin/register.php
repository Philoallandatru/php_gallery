<?php include("includes/header.php"); ?>
<?php

$user = new User();
if (isset($_POST['register'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->lastname = $_POST['lastname'];
        $user->firstname = $_POST['firstname'];
        $user->password = $_POST['password'];

        $user->set_file($_FILES['user_image']);
        $user->upload_photo();
    }
}
redirect("login.php");
?>

    <!--    content     -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Register
                    </h1>


                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group" >
                                <label>User Photo</label>
                                <input type="file" name="user_image" >
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text"  name="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text"  name="firstname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="lastname">lastname</label>
                                <input type="text"  name="lastname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"  name="password" class="form-control">
                            </div>

                            <div>
                                  <input type="submit" name="register" class="btn btn-primary pull-right">
                            </div>
                        </div>
                    </form>



                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->


<?php include("includes/footer.php"); ?>