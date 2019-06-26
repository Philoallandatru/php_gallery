<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
$users = User::find_all();
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
                        Users
                    </h1>
<!--                    <div class="alert alert-success" role="alert">-->
<!--                        --><?php //echo $message; ?>
<!--                    </div>-->

                    <a class="btn btn-primary" href="add_user.php">添加用户r</a>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>照片</th>
                                <th>用户名</th>
                                <th>名</th>
                                <th>姓</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user) : ?>
                                <tr>
                                    <td><?php echo $user->id; ?></td>
                                    <td><img class="img-thumbnail user_image" src="<?php echo $user->image_path_and_placeholder(); ?>" alt=""></td>
                                    <td><?php echo $user->username; ?>
                                        <div class="action_link">
                                            <a href="./delete_user.php?id=<?php echo $user->id; ?>">删除</a>
                                            <a href="./edit_user.php?id=<?php echo $user->id; ?>">编辑</a>
                                        </div>
                                    </td>
                                    <td><?php echo $user->firstname; ?></td>
                                    <td><?php echo $user->lastname; ?></td>
                                </tr>
                            <?php endforeach; ?>
                            <tr></tr>
                            <tr></tr>
                            <tr></tr>
                            </tbody>
                        </table>
                        <!--      end of table                   -->

                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->

    </div>

    <!-- /#page-wrapper -->


<?php include("includes/footer.php"); ?>