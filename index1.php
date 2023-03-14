<!-- index1.php -->
<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>YATHRAA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <script type="applijewelleryion/x-javascript">
         addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
    </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css'/>
    <link href="css/style.css" rel='stylesheet' type='text/css'/>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link href="css/font-awesome.css" rel="stylesheet">
    <!-- Custom Theme files -->
    <script src="js/jquery-1.12.0.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!--animate-->
    <link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
    <script src="js/wow.min.js"></script>
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
</head>
<body>
<?php include('includes/header.php'); ?>

<div class="banner">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s"
            style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><b><b></h1>
    </div>
</div>

<!--- rupes ---->
<div class="container">
    <div class="rupes">
        <div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
                <a href="offers.html"><i class="fa fa-usd"></i></a>
            </div>
            <div class="rup-rgt">
                <h3>50% OFF upto 50$: Christmas Offers</h3>
                <h4><a href="https://www.expedia.com/lp/b/vacations/christmas-deals">Click to Acquire Your Package</a>
                </h4>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
                <a href="https://www.amari.com/galle-srilanka/special-offers/hotel-packages?gclsrc=aw.ds&&gclid=Cj0KCQiAuP-OBhDqARIsAD4XHpegiArvwFVprFnPEOQndVvkRoE6tKjz1jbFNXp_fj9_57vzmJEPzQUaAgTeEALw_wcB"><i
                            class="fa fa-h-square"></i></a>
            </div>
            <div class="rup-rgt">
                <h3>Hotel Packages - Amari Galle</h3>
                <h4><a href="offers.html">Click to Find Your Perfect Beach Getaway</a></h4>

            </div>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-4 rupes-left wow fadeInDown animated animated" data-wow-delay=".5s"
             style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">
            <div class="rup-left">
                <a href="offers.html"><i class="fa fa-mobile"></i></a>
            </div>
            <div class="rup-rgt">
                <h3>Mobile Boarding Pass</h3>
                <h4><a href="https://www.aa.com/i18n/travel-info/travel-tools/mobile-boarding-pass.jsp">Click to Save
                        Time</a></h4>

            </div>
            <div class="clearfix"></div>
        </div>

    </div>
</div>
<!--- /rupes ---->
<br>
<br>
<h2 style="background-color:#D3D3D3; width:100%; height:50px; line-height:50px"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;News
        Feed<b></h2>
<div class="container">
    <div class="holiday">

        <?php $sql = "SELECT * from travelnews order by rand() limit 1";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <form name="book" method="post">
                    <div class="selectroom_top">
                        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                            <img src="admin/pacakgeimages/<?php echo htmlentities($result->NewsImage); ?>"
                                 class="img-responsive" alt="">
                        </div>

                        <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                            <h2 style="color:#4609d6;"><b></b><?php echo htmlentities($result->NewsHeading); ?></h2>
                            <div class="clearfix"></div>
                        </div>
                        <p style="padding-top: 1%; font-size:12px; color:#000000;"><?php echo htmlentities($result->NewsDescription); ?> </p>
                        <div class="clearfix"></div>
                    </div>

                </form>
            <?php }
        } ?>

    </div>
    <div class="clearfix"></div>
</div>
<!---holiday---->


<h2 style="background-color:#D3D3D3; width:100%; height:50px; line-height:50px"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Most
        Popular Packages<b></h2>
<div class="container">
    <div class="holiday">
        <?php $sql = "SELECT * from tbltourpackages order by rand() limit 4";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <div class="rom-btm">
                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="enterprises/pacakgeimages/<?php echo htmlentities($result->PackageImage); ?>"
                             class="img-responsive" alt="">
                        <h4><?php echo htmlentities($result->PackageName); ?></h4>
                        <a href="package-details.php?pkgid=<?php echo htmlentities($result->PackageId); ?>"
                           class="view">View</a>
                        <br>
                    </div>


                </div>

            <?php }
        } ?>

    </div>
    <div class="clearfix"></div>
</div>
<br>
<br>
<h2 style="background-color:#D3D3D3; width:100%; height:50px; line-height:50px"><b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Most
        Trending Items<b></h2>
<div class="container">
    <div class="holiday">

        <?php $sql = "SELECT * from tblmarket order by rand() limit 4";
        $query = $dbh->prepare($sql);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        $cnt = 1;
        if ($query->rowCount() > 0) {
            foreach ($results as $result) { ?>
                <div class="rom-btm">
                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="enterprises/pacakgeimages/<?php echo htmlentities($result->ProductImage); ?>"
                             class="img-responsive" alt="">
                        <h4><?php echo htmlentities($result->ProductName); ?></h4>
                        <a href="product-details.php?pkgid=<?php echo htmlentities($result->ProductId); ?>"
                           class="view">View</a>
                        <br>
                    </div>


                </div>

            <?php }
        } ?>
</body>


</div>
<div class="clearfix"></div>
</div>
<body>
<br>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
    (function () {
        var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/63d8fcfbc2f1ac1e20308f2c/1go3poe8r';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
</script>
<!--End of Tawk.to Script-->


<?php include('includes/footer.php'); ?>

<!-- signup -->
<?php include('includes/signup.php'); ?>
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php'); ?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php'); ?>
<!-- //write us -->
</body>
</html>
