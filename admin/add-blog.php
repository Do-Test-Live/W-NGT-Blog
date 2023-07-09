<?php
session_start();
include('../include/dbController.php');
$db_handle = new DBController();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Blog - NEXT INFO TECH</title>

    <?php require_once 'include/css.php'; ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs4.min.css"
          integrity="sha512-ngQ4IGzHQ3s/Hh8kMyG4FC74wzitukRMIcTOoKT3EyzFZCILOPF0twiXOQn75eDINUfKBYmzYn2AA8DkAk8veQ=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <?php require_once 'include/sidebar.php'; ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <?php require_once 'include/topbar.php'; ?>

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-2 text-gray-800">Add Blog</h1>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Blog</h6>
                    </div>
                    <div class="card-body">
                        <form id="blog_form" method="post" action="insert.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label class="form-label">Blog Title</label>
                                <input type="text" class="form-control" id="blog_title" name="blog_title" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="summernote" id="summernote" name="description"></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Description</label>
                                <textarea class="form-control" id="meta_description" name="meta_description" rows="4" required></textarea>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Meta Keywords</label>
                                <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="image" name="image" required/>
                                    <label class="custom-file-label" for="image">Choose file</label>
                                </div>
                            </div>
                            <div class="mb-4 mt-4">
                                <button type="submit" name="add_blog" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <?php require_once 'include/footer.php'; ?>

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<?php require_once 'include/js.php'; ?>

<script src="vendor/summernote/summernote.min.js"></script>
<script src="vendor/summernote/summernote-init.js"></script>
</body>

</html>
