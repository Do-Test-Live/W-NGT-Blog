<?php
include('include/dbController.php');
$db_handle = new DBController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="NGT Blog" name="description">
    <meta content="NGT Blog" name="keywords"/>
    <meta content="NGT Blog" name="author">

    <meta content="NGT Blog" property="og:title"/>
    <meta content="https://blog.ngt.hk/assets/images/desktop/background.png" property="og:image"/>
    <meta content="image/png" property="og:image:type"/>
    <meta content="600" property="og:image:width"/>
    <meta content="400" property="og:image:height"/>
    <meta content="NGT Blog" property="og:image:alt"/>
    <meta content="NGT Blog" property="og:description"/>
    <meta content="https://blog.ngt.hk" property="og:url"/>
    <meta content="website" property="og:type"/>

    <title>NGT Blog</title>
    <link href="assets/images/logo/favicon.ico" rel="icon" type="image/x-icon">

    <link href="assets/vendor/Bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="assets/vendor/FontAwesome/css/all.min.css" rel="stylesheet"/>
    <link href="assets/css/style.css" rel="stylesheet"/>

    <script>
        if (location.protocol !== 'https:') {
            location.replace(`https:${location.href.substring(location.protocol.length)}`);
        }
    </script>
</head>
<body>

<header class="ngt-header-section-outer text-center">
    <div class="ngt-header-section pt-2">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="https://ngt-tech.io/home-zh"><img alt="" class="img-fluid ngt-logo"
                                                                                src="assets/images/logo/ngt.png"/></a>
            </div>
        </nav>
    </div>
</header>

<section class="ngt-demo pb-5">
    <div class="container pt-5 pb-5">
        <div class="row pb-5">
            <?php
            $query = "SELECT * FROM blog order by id desc";
            $data = $db_handle->runQuery($query);
            $row_count = $db_handle->numRows($query);
            for ($i = 0; $i < $row_count; $i++) {
            ?>

            <div class="col-lg-4 pb-3 text-center">
                <img alt="" class="img-fluid" src="<?php echo $data[$i]["image"]; ?>"/>
                <h4 class="text-center mt-4 ngt-demo-title"><?php echo $data[$i]["title"]; ?></h4>
                <p class="text-white ngt-blog-content">
                    <?php echo $data[$i]["meta_description"]; ?>
                </p>
                <a href="Blog-Details/<?php echo $data[$i]["meta_title"]; ?>" class="btn btn-primary ngt-blog-btn mt-3">
                    See More
                </a>
            </div>
            <?php
            }
            ?>
        </div>
    </div>
</section>

<section class="ngt-footer-outer">

</section>

<script src="assets/vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/jQuery/jquery-3.6.4.min.js"></script>
<script src="assets/vendor/OwlCarousel/js/owl.carousel.min.js"></script>
<script src="assets/js/main.js"></script>
</body>
</html>
