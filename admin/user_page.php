<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>
<!--  用户的主页 -->
<!-- if not signed, redirect to the login.php page  -->


<?php
# 根据用户的id构建这个用户对象
$user = User::find_by_id($session->user_id);

?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php  include("includes/user_side_nav.php"); ?>

            <!-- /.navbar-collapse -->


        </nav>

    <div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    我的主页
                </h1>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr class="h3">
                            <th class="">ID</th>
                            <th>照片</th>
                            <th>用户名</th>
                            <th>名</th>
                            <th>姓</th>
                        </tr>
                        </thead>
                        <tbody>
<!--   显示这个用户的信息（通过echo这个用户的性质）  -->
                            <tr>
                                <td><?php echo $user->id; ?></td>
                                <td><img class="img-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                                <td><?php echo $user->username; ?>
                                    <div class="action_link">
                                        <a href="./user_edit_profile.php?id=<?php echo $user->id; ?>">Edit</a>
                                    </div>
                                </td>
                                <td><?php echo $user->firstname; ?></td>
                                <td><?php echo $user->lastname; ?></td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>