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

    <title>Blog Category - NEXT INFO TECH</title>

    <?php require_once 'include/css.php'; ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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

            <?php if (isset($_GET['blog_id'])) {

                $data = $db_handle->runQuery("SELECT * FROM blog where id={$_GET['blog_id']}");
                ?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Edit Blog Category</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Edit Blog Category</h6>
                        </div>
                        <div class="card-body">
                            <form id="blog_form" method="post" action="update.php" enctype="multipart/form-data">
                                <input type="hidden" name="id" value="<?php echo $data[0]["id"]; ?>" required>
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" id="blog_title" name="name"
                                           placeholder="" value="<?php echo $data[0]["name"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Title</label>
                                    <input type="text" class="form-control" id="meta_title" name="meta_title"
                                           placeholder="" value="<?php echo $data[0]["meta_title"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Description</label>
                                    <textarea class="form-control" id="meta_description" name="meta_description"
                                              rows="4" required><?php echo $data[0]["meta_description"]; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Meta Keywords</label>
                                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords"
                                           placeholder="" value="<?php echo $data[0]["meta_keywords"]; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Status</label>
                                    <select class="form-control" name="status">
                                        <option value="0" <?php if($data[0]["status"]==0) echo 'selected'; ?>>Disable</option>
                                        <option value="1" <?php if($data[0]["status"]==1) echo 'selected'; ?>>Enable</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image <a href="../<?php echo $data[0]["image"]; ?>"
                                                                       target="_blank">(View)</a></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image"/>
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>
                                </div>
                                <div class="mb-4 mt-4">
                                    <button type="submit" name="update_blog" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            <?php } else {

                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Blog Category Data</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Blog Category Data</h6>
                        </div>
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <a href="add-blog.php" class="btn btn-primary">Add Blog Category</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Meta Title</th>
                                        <th>Meta Description</th>
                                        <th>Meta Keywords</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Category</th>
                                        <th>Meta Title</th>
                                        <th>Meta Description</th>
                                        <th>Meta Keywords</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    <?php
                                    $query = "SELECT * FROM blog_category order by id desc";
                                    $data = $db_handle->runQuery($query);
                                    $row_count = $db_handle->numRows($query);
                                    for ($i = 0; $i < $row_count; $i++) {
                                        ?>
                                        <tr>
                                            <td><?php echo $i + 1; ?></td>
                                            <td><?php echo $data[$i]["name"]; ?></td>
                                            <td><?php echo $data[$i]["meta_title"]; ?></td>
                                            <td><?php echo $data[$i]["meta_description"]; ?></td>
                                            <td><?php echo $data[$i]["meta_keywords"]; ?></td>
                                            <td><a href="../<?php echo $data[$i]["image"]; ?>" target="_blank">image</a>
                                            </td>
                                            <td><?php echo $data[$i]["status"]; ?></td>
                                            <td>
                                                <a href="blog.php?blog_id=<?php echo $data[$i]["id"]; ?>"
                                                   class="btn btn-info">Edit</a>
                                                <button type="button" class="btn btn-danger mt-3"
                                                        onclick="blogCategoryDelete(<?php echo $data[$i]["id"]; ?>)">Delete
                                                </button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
                <?php

            } ?>
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

<script>
    function blogCategoryDelete(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'get',
                    url: 'delete.php',
                    data: {
                        blog_id: id
                    },
                    success: function (data) {

                        Swal.fire(
                            'Deleted!',
                            'Your blog has been deleted.',
                            'success'
                        ).then((result) => {
                            window.location = 'blog-details.php';
                        });

                    }
                });
            } else {
                Swal.fire(
                    'Cancelled!',
                    'Your Blog is safe :)',
                    'error'
                ).then((result) => {
                    window.location = 'blog-details.php';
                });
            }
        })
    }
</script>
</body>

</html>
