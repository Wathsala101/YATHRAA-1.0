<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>

<!DOCTYPE HTML>
<html>
<head>
    <title>Travel Planner</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
    <link href="css/style.css" rel='stylesheet' type='text/css' />
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
    <link rel="stylesheet" href="css/jquery-ui.css" />
    <script>
        new WOW().init();
    </script>
    <script src="js/jquery-ui.js"></script>
    <script>
        $(function() {
            $( "#datepicker,#datepicker1" ).datepicker();
        });
    </script>
    <style>
        .errorWrap {
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #dd3d36;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
        .succWrap{
            padding: 10px;
            margin: 0 0 20px 0;
            background: #fff;
            border-left: 4px solid #5cb85c;
            -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
            box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
        }
    </style>
</head>
<body>
<!-- top-header -->
<?php include('includes/header.php');?>
<div class="banner-3">
    <div class="container">
        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><b>Discover<b></h1>
    </div>
</div>
<!--- /banner ---->
<!--- selectroom ---->
<div class="selectroom">
    <div class="container">
        <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <?php
        $pid=intval($_GET['pkgid']);
        $sql = "SELECT * from tbldiscover where Id=:pid";
        $query = $dbh->prepare($sql);
        $query -> bindParam(':pid', $pid, PDO::PARAM_STR);
        $query->execute();
        $results=$query->fetchAll(PDO::FETCH_OBJ);
        $cnt=1;
        if($query->rowCount() > 0)
        {
            foreach($results as $result)
            {	?>

                <form name="book" method="post">
                    <div class="selectroom_top">
                        <div class="col-md-4 selectroom_left wow fadeInLeft animated" data-wow-delay=".5s">
                            <img src="admin/pacakgeimages/<?php echo htmlentities($result->Image);?>" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-8 selectroom_right wow fadeInRight animated" data-wow-delay=".5s">
                            <h2><?php echo htmlentities($result->Destination);?></h2>
                            <h4 style="padding-top: 1%"><b>Significance: <?php echo htmlentities($result->Significance);?></b></h4>
                            <p><b>Location:</b> <?php echo htmlentities($result->Location);?></p>
                            <p style="padding-top: 1%"><?php echo htmlentities($result->Description);?> </p>


                        </div>


                        <div class="clearfix"></div>
                    </div>
                    <div class="selectroom_top">
                        <h3 style="color: #0f0f0f"><b>What Can We do?<b></h3><br>
                        <p><ol class="fa fa-star">&nbsp;<style="padding-top: 1%"><?php echo htmlentities($result->About);?></p></ol>
                        <p><ol class="fa fa-star">&nbsp;<style="padding-top: 1%"><?php echo htmlentities($result->About1);?></p></ol>
                        <p><ol class="fa fa-star">&nbsp;<style="padding-top: 1%"><?php echo htmlentities($result->About2);?></p></ol>

                        <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">

                            <ul>

                            </ul>
                        </div>



                    </div>
                </form>


            <?php }} ?>


    </div>
    <ul class="spe" align="center">
        <a href="discover-plan.php">
            <button id="show-map" class="btn-primary btn"><b>Plan Your Trip</b></button>
        </a>
    </ul>


    <?php include('includes/Index.html');?>
</div>
<!--- /selectroom ---->
<!--- /footer-top ---->
<?php include('includes/footer.php');?>
<!-- signup -->
<?php include('includes/signup.php');?>
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
</body>
</html>
