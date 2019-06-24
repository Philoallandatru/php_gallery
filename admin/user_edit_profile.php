<?php
# 编辑用户的信息

include("includes/header.php");
include("includes/photo_library_modal.php");
?>

<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>
<?php


if (empty($_GET['id'])) {
    redirect("user_page.php");
} else {
    $id = $_GET['id'];
    $user = User::find_by_id($id); # 找到要编辑哪个用户对象
    if (isset($_POST['update'])) { # 如果点了update按钮的话
        # 更新所有用户对象的信息
        if ($user) {
            $user->username = $_POST['username'];
            $user->lastname = $_POST['lastname'];
            $user->firstname = $_POST['firstname'];
            $user->password = $_POST['password'];

            # 更新用户的头像需要上传图片, 也就是set_file()和upload_file()
            if (empty($_FILES['user_image'])) {
                $user->save();
                redirect("user_page.php");
                $session->message("The user has been updated!"); # 这里要设置消息
            } else {
                $user->set_file($_FILES['user_image']);
                $user->upload_photo();
                $user->save();
                $session->message("The user has been updated!");

//                redirect("edit_user.php?id={$user->id}");
                redirect("user_page.php");
            }
        }
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
                        编辑我的信息
                    </h1>

<!--        image and data toggle            -->
                    <div class="col-md-6 user_image_box" >
                        <a href="#" data-toggle="modal" data-target="#photo-library">
                            <img class="img-thumbnail user_img_edit" src="<?php echo $user->image_path_and_placeholder(); ?>" alt="">
                        </a>
                    </div>

                    <form action="user_edit_profile.php?id=<?php echo $_GET['id']; ?>" method="post" enctype="multipart/form-data">
                        <div class="col-md-6">
                            <div class="form-group" >
                                <label>用户头像</label>
                                <input type="file" name="user_image" value="<?php echo  $user->user_image;?>">
                            </div>

                            <div class="form-group">
                                <label for="username">用户名</label>
                                <input type="text"  name="username" class="form-control" value="<?php echo  $user->username;?>">
                            </div>

                            <div class="form-group">
                                <label for="firstname">名</label>
                                <input type="text"  name="firstname" class="form-control" value="<?php echo  $user->firstname;?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">姓</label>
                                <input type="text"  name="lastname" class="form-control" value="<?php echo  $user->lastname;?>">
                            </div>

                            <div class="form-group">
                                <label for="password">密码</label>
                                <input type="password"  name="password" class="form-control" value="<?php echo  $user->password;?>">
                            </div>

                            <div>
                                <a id="user-id" class="btn btn-danger" href="delete_user.php?id=<?php echo $user->id; ?>">Delete</a>
                            </div>

                            <div class="form-group">
                                  <input type="submit" name="update" class="btn btn-primary pull-right" value="更新">
                            </div>

                            <div>
                                <a class="btn btn-warning pull-left" href="user_page.php">离开</a>
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