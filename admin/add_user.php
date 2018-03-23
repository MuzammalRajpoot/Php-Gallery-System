<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

   $user = new User();
   if(isset($_POST['create'])){
       If($user){
       $user->username = $_POST['username'];
       $user->first_name = $_POST['first_name'];
       $user->last_name = $_POST['last_name'];
       $user->password = $_POST['password'];
       $user->set_file($_FILES['user_image']);
       $user->save_user_image_and_data();
       }
       
    } 

 ?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->



        <?php include("includes/nav_top.php") ?>

         <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <?php include("includes/sidebar.php"); ?>
        </nav>
            <div id="page-wrapper">
                <div class="container-fluid">
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                           Add User
                            <small>Subheading</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input type="file" name="user_image">
                               </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" >
                               </div>
                                <div class="form-group">
                                    <label for="First Name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name" >
                               </div>
                                <div class="form-group">
                                    <label for="Last Name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" >
                               </div> 
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password" >
                               </div>
                                <div class="form-group">
                                    <input type="submit" name="create" class="btn btn-primary">
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