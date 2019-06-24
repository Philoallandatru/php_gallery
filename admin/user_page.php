<?php include("includes/header.php"); ?>
<?php if (!$session->is_signed_in()) {redirect("login.php");} ?>

<!-- if not signed, redirect to the login.php page  -->
<?php
if (!$session->is_signed_in()) {
    redirect("login.php");
}

if (isset($_GET['id'])) {
    $user = User::find_by_id($_GET['id']);
}

$user = User::find_by_id($session->user_id);
echo "user_id: " . $session->user_id . "<br>";
echo "is_signed_in(): " . $session->is_signed_in() . "<br>";
echo "session-user_id: " . $_SESSION['user_id'];

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
                    User
                </h1>

                <div class="col-md-12">
                    <table class="table table-hover">
                        <thead>
                        <tr class="h3">
                            <th class="">ID</th>
                            <th>Photo</th>
                            <th>Username</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                        </tr>
                        </thead>
                        <tbody>

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