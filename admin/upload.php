<?php include("includes/header.php"); 
if(!$session->is_signed_in()){redirect("login.php");}
 $message ='';
if(isset($_POST['submit'])){
    $photo = new Photo();
    $photo->title = $_POST['title'];
   // $photo->caption = $_POST['caption'];
  //  $photo->description = $_POST['description'];
    $photo->set_file($_FILES['file_upload']);
    if($photo->save()){
        $message = "<h1>Photo Uploaded Successfully </h1>";
    } else {
       
       $message = join('<br>', $photo->errors);
    }
}
?>

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
          
           <?php include 'includes/nav_top.php'?>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <?php include 'includes/sidebar.php'?>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

             <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Blank Page
                            <small>Subheading</small>
                            
                        </h1>
                        <?php echo $message;?>
                        <form method="POST" action="upload.php" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" placeholder="title" class="form-control">
                            </div>
<!--                            <div class="form-group">
                                <label>Caption</label>
                                <input type="text" name="caption" placeholder="caption" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" name="description" id="" cols="30" rows="10" placeholder="Enter Description"></textarea>
                             
                           </div>-->
                            <div class="form-group">
                                <input type="file" name="file_upload">
                            </div>
                            <input type="submit" name="submit">
                        </form>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>