<?php include("includes/header.php"); ?>

<?php if(!$session->is_signed_in()) {redirect("login.php");} ?>

<?php 

if(empty($_GET['id'])){
    redirect('users.php');
}

   $user = User::find_by_id($_GET['id']);
      if(isset($_POST['update'])){
       If($user){
       $user->username = $_POST['username'];
       $user->first_name = $_POST['first_name'];
       $user->last_name = $_POST['last_name'];
       $user->password = $_POST['password'];
       if(empty($_FILES['user_image'])){
           
           $user->save();
            redirect("edit_user.php?id={$user->id}");
       }else{
        $user->set_file($_FILES['user_image']);
        $user->save_user_image_and_data();
        redirect("edit_user.php?id={$user->id}");
            }
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
                           Edit User
                            <small>Subheading</small>
                        </h1>
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="col-md-6 col-md-offset-3">
                                <div class="form-group">
                                    <input type="file" name="user_image">
                                    <a href="#" class="thumbnail"><img src="<?php echo $user->user_image();?>"></a>
                               </div>
                                <div class="form-group">
                                    <label for="Username">Username</label>
                                    <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username;?>" >
                               </div>
                                <div class="form-group">
                                    <label for="First Name">First Name</label>
                                    <input type="text" name="first_name" class="form-control" placeholder="First Name"  value="<?php echo $user->first_name;?>" >
                               </div>
                                <div class="form-group">
                                    <label for="Last Name">Last Name</label>
                                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $user->last_name;?>"  >
                               </div> 
                                <div class="form-group">
                                    <label for="Password">Password</label>
                                    <input type="text" name="password" class="form-control" placeholder="Password"  value="<?php echo $user->password;?>" >
                               </div>
                                <div class="form-group">
                                    <input type="submit" name="update" class="btn btn-primary">
                                </div>
                                  <div class="form-group">
                                      <a  href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger">Delete</a>
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