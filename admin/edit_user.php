<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>
<?php


if (empty($_GET['id'])) {
    redirect("users.php");
} else {
    $id = $_GET['id'];
    $user = User::find_by_id($id);
    if (isset($_POST['update'])) {
        if ($user) {
            $user->username = $_POST['username'];
            $user->lastname = $_POST['lastname'];
            $user->firstname = $_POST['firstname'];
            $user->password = $_POST['password'];

            if (empty($_FILES['user_image'])) {
                $user->save();
            } else {
                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();

                redirect("edit_user.php?id={$user->id}");
            }
        }
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
                        Add User
                    </h1>

                    <div class="col-md-6">
                        <img class="img-thumbnail" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                    </div>

                    <form action="edit_user.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label>User Photo</label>
                                <input type="file" name="user_image" value="<?php echo  $user->user_image;?>">
                            </div>

                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text"  name="username" class="form-control" value="<?php echo  $user->username;?>">
                            </div>

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text"  name="firstname" class="form-control" value="<?php echo  $user->firstname;?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">lastname</label>
                                <input type="text"  name="lastname" class="form-control" value="<?php echo  $user->lastname;?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password"  name="password" class="form-control" value="<?php echo  $user->password;?>">
                            </div>

                            <div>
                                <a class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                            </div>

                            <div class="form-group">
                                  <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                            </div>

                            <div>
                                <a class="btn btn-warning pull-left" href="users.php">Leave</a>
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