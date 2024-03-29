<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php

# 这个页面显示这个用户上传了哪些照片

$user_id = $session->user_id;
$sql = "SELECT * FROM photos WHERE user_id = {$user_id}";
$photos = Photo::find_by_query($sql);


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
                        我上传的照片
                    </h1>

<!--                    <div class="alert alert-success" role="alert">-->
<!--                        --><?php //echo $session->message; ?>
<!--                    </div>-->

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>照片</th>
                                    <th>ID</th>
                                    <th>文件名</th>
                                    <th>标题</th>
                                    <th>大小</th>
                                    <th>评论数</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($photos as $photo) : ?>
                                <tr>
                                    <td><img class="img-thumbnail admin-photo-thumbnail" src="<?php echo $photo->picture_path(); ?>" alt="">
                                    <div class="action_links">
                                        <a href="./delete_photo.php?id=<?php echo $photo->id; ?>">Delete</a>
                                        <a href="./edit_photo.php?id=<?php echo $photo->id; ?>">Edit</a>
                                        <a href="../photo.php?id=<?php echo $photo->id; ?>">View</a>
                                    </div>

                                    </td>

                                    <td><?php echo $photo->id; ?></td>
                                    <td><?php echo $photo->filename; ?></td>
                                    <td><?php echo $photo->title; ?></td>
                                    <td><?php echo $photo->size; ?></td>
                                    <td>
                                        <a href="comment_photo.php?id=<?php echo $photo->id; ?>">
                                        <?php echo count(Comment::find_the_comments($photo->id));?>
                                        </a>
                                    </td>
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