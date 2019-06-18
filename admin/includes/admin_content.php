<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Home Page of Admin
                    <small>Subheading</small>
                </h1>
<!--    Test code  -->
                <?php
                $users = User::find_all_users();
                foreach ($users as $user) {
                    echo $user->username . "<br>";
                }

                $found_user = User::find_user_by_id(2);
                echo $found_user->username;
                echo "<hr>";

//                $user = new User();
//                $user->username = "Hikari";
//                $user->password = "Rex";
//                $user->lastname = "Hikaritian";
//                $user->firstname = "Homura";
//                $user->create();
                $user = User::find_user_by_id(4);
                $user->delete();

                ?>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Blank Page
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>