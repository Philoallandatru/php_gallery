<?php include("includes/header.php"); ?>

<!--  检查是否登录，未登录则跳转到 login.php -->
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
# 找出当前用户做的评论
$sql = "SELECT * FROM comments WHERE user_id = {$session->user_id}";
$comments = Comment::find_by_query($sql);

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
                        我的评论
                    </h1>

                    <div class="col-md-12">
<!--                 这是一个表       -->
                        <table class="table table-hover">
                            <thead>
                            <tr class="h5">
                                <th>User ID</th>
                                <th>Photo ID</th>
                                <th>作者</th>
                                <th>评论体</th>
                            </tr>
                            </thead>
                            <tbody>

<!--        遍历上面的的comments，把所有这个用户做的评论的信息展示出来                    -->
                            <?php foreach ($comments as $comment) : ?>
                                <tr>
                                    <td><?php echo $comment->user_id; ?></td>
                                    <td><?php echo $comment->photo_id; ?></td>
                                    <td><?php echo $comment->author; ?>
                                        <div class="action_link">
<!--                      点这个a tag删除评论                  -->
                                            <a href="./delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                        </div>
                                    </td>
                                    <td><?php echo $comment->body; ?></td>
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