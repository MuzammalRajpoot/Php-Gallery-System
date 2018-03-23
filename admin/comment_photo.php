<?php include("includes/header.php"); 
if(!$session->is_signed_in()){redirect("login.php");}
if(empty($_GET['id'])){
    redirect("photos.php");
}

$comments = Comment::find_the_comments($photo_id = $_GET['id']);

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
                            All Comment
                            <small>Subheading</small>
                        </h1>
                        <div class="col-md-12">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Comments</th>
                                        <th>Id</th>
                                        <th>photo_id</th>
                                        <th>Author</th>
                                        <th>Body</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php foreach ($comments as $comment): ?>
                                    <tr>
                                        <td>
                                            <div class="picture_links">
                                                <a href="delete_comment.php?id=<?php echo $comment->id;?>">Delete</a>
                                                <a href="edit_comment.php?id=<?php echo $comment->id;?>">Edit</a>
                                                <a href="view_comment.php?id=<?php echo $comment->id;?>">View</a>
                                            </div>
                                        </td>
                                            <td><?php echo $comment->id;?></td>
                                            <td><?php echo $comment->photo_id;?></td>
                                            <td><?php echo $comment->author;?></td>
                                            <td><?php echo $comment->body;?></td>
                                    </tr>       
                                       <?php endforeach;?>
                                       
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

  <?php include("includes/footer.php"); ?>