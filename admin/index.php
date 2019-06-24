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
//echo "session->user_id: " .$session->user_id;
//echo "session->is_signed_in: " . $session->is_signed_in();


//global $database;
//$username = "Pyra";
//$sql = "SELECT * FROM users WHERE username = " . $username;
//$result = mysqli_query($database->connection, $sql);

//echo "User number: " . User::duplicated_username("Pyra");
//echo User::duplicated_username("Pyra");

include("includes/admin_content.php");
?>

<?php


?>

        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>