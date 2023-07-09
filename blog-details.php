<?php
include('include/dbController.php');
$db_handle = new DBController();

$url = $_SERVER['REQUEST_URI'];
$title = substr($url, strrpos($url, '/') + 1);
$title = strtok($title, '?');
$string = str_replace("-", " ", $title);

$extension = '../';
$bcName = '';
$meta_title = '';
$meta_description = '';
$meta_keywords = '';
$image = '';
$description = '';


$query = "SELECT * FROM blog where meta_title='$string'";

$data = $db_handle->runQuery($query);
$row = $db_handle->numRows($query);
for ($j = 0; $j < $row; $j++) {
    $bcName = ucwords(strtolower($data[$j]["title"]));
    $meta_title = $data[$j]["meta_title"];
    $meta_description = $data[$j]["meta_description"];
    $meta_keywords = $data[$j]["meta_keywords"];
    $image = $data[$j]["image"];
    $description = $data[$j]["description"];

}

if ($row == 0) {
    echo "<script>
                window.location.href='../Home';
                </script>";
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <meta content="<?php echo $meta_description; ?>" name="description">
    <meta content="<?php echo $meta_keywords; ?>" name="keywords"/>
    <meta content="NGT Blog" name="author">

    <meta content="NGT Blog" property="og:title"/>
    <meta content="https://blog.ngt.hk/<?php echo $image; ?>" property="og:image"/>
    <meta content="<?php echo $meta_title; ?>" property="og:image:alt"/>
    <meta content="<?php echo $meta_title; ?>" property="og:description"/>
    <meta content="https://blog.ngt.hk" property="og:url"/>
    <meta content="website" property="og:type"/>

    <title><?php echo $meta_title; ?></title>
    <link href="<?php echo $extension; ?>assets/images/logo/favicon.ico" rel="icon" type="image/x-icon">

    <link href="<?php echo $extension; ?>assets/vendor/Bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <link href="<?php echo $extension; ?>assets/vendor/FontAwesome/css/all.min.css" rel="stylesheet"/>
    <link href="<?php echo $extension; ?>assets/vendor/OwlCarousel/css/owl.carousel.min.css" rel="stylesheet"/>
    <link href="<?php echo $extension; ?>assets/css/style.css" rel="stylesheet"/>

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
                                                                                src="<?php echo $extension; ?>assets/images/logo/ngt.png"/></a>
            </div>
        </nav>
    </div>
</header>


<section class="ngt-demo pb-5">
    <section class="container pt-5 pb-5">
        <div class="owl-carousel">
            <?php
            $query = "SELECT * FROM blog where meta_title='$string'";
            $data = $db_handle->runQuery($query);
            $row_count = $db_handle->numRows($query);
            for ($i = 0; $i < $row_count; $i++) {
                ?>
                <div class="item">
                    <div class="row ngt-slider">
                        <div class="col-lg-7 blog-details-slider pb-3 text-center d-flex justify-content-center align-items-center">
                            <div class="row pt-md-0 pb-md-0 pt-5 pb-5">
                                <div class="col-md-3 d-md-flex justify-content-center align-items-center d-none">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?>assets/images/blog/Limg.png"/>
                                </div>
                                <div class="col-md-6 col-12">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?><?php echo $data[$i]["image"]; ?>"/>
                                </div>
                                <div class="col-md-3 d-md-flex justify-content-center align-items-center d-none">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?>assets/images/blog/rimg.png"/>
                                </div>
                                <div class="col-md-6 col-12 mx-auto pb-md-0 pb-5">
                                    <h4 class="mt-4 ngt-demo-title"><?php echo $data[$i]["title"]; ?> </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 pb-3">
                            <h4 class="ngt-demo-title"><?php echo $data[$i]["title"]; ?></h4>
                            <div class="text-white">
                                <?php echo strip_tags($data[$i]["description"],'<p>'); ?>
                            </div>
                            <div class="text-end">
                                <a class="btn btn-primary ngt-blog-btn-back mt-3" href="<?php echo $extension; ?>Home">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
            <?php
            $query = "SELECT * FROM blog where meta_title!='$string' order by rand() limit 2";
            $data = $db_handle->runQuery($query);
            $row_count = $db_handle->numRows($query);
            for ($i = 0; $i < $row_count; $i++) {
                ?>
                <div class="item">
                    <div class="row ngt-slider">
                        <div class="col-lg-7 blog-details-slider pb-3 text-center d-flex justify-content-center align-items-center">
                            <div class="row pt-md-0 pb-md-0 pt-5 pb-5">
                                <div class="col-md-3 d-md-flex justify-content-center align-items-center d-none">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?>assets/images/blog/Limg.png"/>
                                </div>
                                <div class="col-md-6 col-12">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?><?php echo $data[$i]["image"]; ?>"/>
                                </div>
                                <div class="col-md-3 d-md-flex justify-content-center align-items-center d-none">
                                    <img alt="" class="img-fluid"
                                         src="<?php echo $extension; ?>assets/images/blog/rimg.png"/>
                                </div>
                                <div class="col-md-6 col-12 mx-auto pb-md-0 pb-5">
                                    <h4 class="mt-4 ngt-demo-title"><?php echo $data[$i]["title"]; ?> </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 pb-3">
                            <h4 class="ngt-demo-title"><?php echo $data[$i]["title"]; ?></h4>
                            <div class="text-white">
                                <?php echo strip_tags($data[$i]["description"],'<p>'); ?>
                            </div>
                            <div class="text-end">
                                <a class="btn btn-primary ngt-blog-btn-back mt-3" href="<?php echo $extension; ?>Home">
                                    Back
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </section>
</section>
<section class="ngt-footer-outer">

</section>

<script src="<?php echo $extension; ?>assets/vendor/Bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo $extension; ?>assets/vendor/jQuery/jquery-3.6.4.min.js"></script>
<script src="<?php echo $extension; ?>assets/vendor/OwlCarousel/js/owl.carousel.min.js"></script>
<script src="<?php echo $extension; ?>assets/js/main.js"></script>
<script>
    $(document).ready(function () {
        $('.owl-carousel').owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: false,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            navText: [
                "<img src='<?php echo $extension; ?>assets/images/slider/left.png'>",
                "<img src='<?php echo $extension; ?>assets/images/slider/right.png'>"
            ]
        });

    });
</script>
</body>
</html>
