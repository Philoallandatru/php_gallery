<?php include("includes/header.php"); ?>

<!-- if not signed, redirect to the login.php page  -->
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

            <?php include("includes/top_nav.php") ?>

            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php  include("includes/side_nav.php"); ?>

            <!-- /.navbar-collapse -->


        </nav>
<?php
include("includes/admin_content.php");
?>

        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>