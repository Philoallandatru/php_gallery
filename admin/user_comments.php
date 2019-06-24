<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<?php
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
                        My Comments
                    </h1>

                    <div class="col-md-12">
                        <table class="table table-hover">
                            <thead>
                            <tr class="h5">
                                <th>User ID</th>
                                <th>Photo ID</th>
                                <th>Author</th>
                                <th>Body</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($comments as $comment) : ?>
                                <tr>
                                    <td><?php echo $comment->user_id; ?></td>
                                    <td><?php echo $comment->photo_id; ?></td>
                                    <td><?php echo $comment->author; ?>
                                        <div class="action_link">
                                            <a href="./delete_comment.php?id=<?php echo $comment->id; ?>">Delete</a>
                                            <a href="./edit_comment.php?id=<?php echo $comment->id; ?>">Edit</a>
                                            <a>View</a>
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