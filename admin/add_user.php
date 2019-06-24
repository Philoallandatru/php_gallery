<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>
<?php

$updated = false;
$user = new User();
if (isset($_POST['create'])) {
    if ($user) {
        $user->username = $_POST['username'];
        $user->lastname = $_POST['lastname'];
        $user->firstname = $_POST['firstname'];
        $user->password = $_POST['password'];

        if (User::duplicated_username($user->username) <= 0) {
            $user->set_file($_FILES['user_image']);
            $user->upload_photo();
            $session->message("The user {$user->username} has been added");
            $user->save();
            $updated = true;
        } else {
//            echo "<sciprt>"
            $updated = true;
            $session->message = "用户名重复！";
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
                        添加用户
                    </h1>


                        <?php if ($updated)  { ?>
                        <div class="alert alert-danger" role="alert">
                        <?php    echo $session->message; ?>
                        </div>
                        <?php  }  ?>




                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 col-md-offset-3">
                            <div class="form-group" >
                                <label>头像</label>
                                <input type="file" name="user_image" >
                            </div>

                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text"  name="username" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="firstname">名</label>
                                <input type="text"  name="firstname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="lastname">姓</label>
                                <input type="text"  name="lastname" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password"  name="password" class="form-control">
                            </div>

                            <div>
                                  <input type="submit" name="create" class="btn btn-primary pull-right">
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