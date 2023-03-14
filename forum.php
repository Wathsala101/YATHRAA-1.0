<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>YATHRAA | Forum</title>
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
    <script>
        new WOW().init();
    </script>
    <!--//end-animate-->
</head>
<body>
<?php include('includes/header.php');?>
<!--- banner ---->
<div class="banner-3">


    <div class="container">

        <h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><b>YATHRAA - Forum<b></h1>

    </div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
    <div class="container">

        <div class="room-bottom">
            <h3>Forum</h3>
            <ul class="hm"><a href="enquiry.php"><i class="fa fa-pencil-square-o"></i></a></ul>
            <br> </br>
            <html>
            <style>

                }
                input[type=text] {

                    width: 1000px;
                    box-sizing: border-box;
                    border: 2px solid #ccc;
                    border-radius: 4px;
                    font-size: 16px;
                    background-color: white;
                    background-image: url('searchicon.png');
                    background-position: 10px 10px;
                    background-repeat: no-repeat;
                    padding: 12px 20px 12px 40px;
                    -webkit-transition: width 0.4s ease-in-out;
                    transition: width 0.4s ease-in-out;
                }
                input[type=submit] {

                    display: inline-block;
                    padding: 10px 25px;
                    font-size: 10px;
                    cursor: pointer;
                    text-align: center;
                    text-decoration: none;
                    outline: none;
                    color: #4609d6;
                    background-color: #4609d6;
                    border: none;
                    margin-left: auto;
                    margin-right: auto;


                }
            </style>

            <body>



            <form class="form-inline" action="forum.php" method="post"  >
                <input type="text" name="valueToSearch" placeholder="Search by Location..">
                <button type="submit" name="search" value="Search Record.." id="submit">
                    <i class="fa fa-search"></i>
                </button>

            </form>



            <?php
            if(isset($_POST['search'])){
                $searchVal = $_POST['valueToSearch'];
                if($searchVal != ''){
                    $sql = "SELECT * from `tblenquiry` WHERE `Topic` LIKE '%$searchVal%' OR `LocationName` LIKE '%$searchVal%' OR `Destinations` LIKE '%$searchVal%'";
                } else{
                    $sql = "SELECT * from tblenquiry";
                }
            }else{
                $sql = "SELECT * from tblenquiry WHERE Status=1";
            }
            $query = $dbh->prepare($sql);
            $query->execute();
            $results=$query->fetchAll(PDO::FETCH_OBJ);
            $cnt=1;
            if($query->rowCount() > 0)
            {
            foreach($results as $result)
            {	?>

            <form action="submitReview.php" method="post">
                <div class="rom-btm">
                    <div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
                        <img src="admin/forumImages/<?php echo htmlentities($result->forumImage);?>" class="img-responsive" alt="">
                    </div>
                    <div class="col-md-6 room-midle wow fadeInUp animated" data-wow-delay=".5s">
                        <h4><?php echo htmlentities($result->forumImage);?></h4>
                        <h3><?php echo htmlentities($result->Topic);?></h3>
                        <h6>Posted on: <?php echo htmlentities($result->PostingDate);?> by <?php echo htmlentities($result->FullName);?></h6>
                        <p>Location: <?php echo htmlentities($result->LocationName);?></p>
                        <h5><b>Destinations: </b> <?php echo htmlentities($result->Destinations);?></h5>
                        <h4>No.of days: <?php echo htmlentities($result->NumDays);?> days | No.of adults: <?php echo htmlentities($result->PeopleNum);?></h4>
                        <h5>Travel Budget: <?php echo htmlentities($result->TravelCost);?> LKR</h5>
                        <br>
                        <h7><b></b> <?php echo htmlentities($result->FeedBack);?></h7>
                        <br>
                        <br>
                        <h6>Reccomendations: <b></b> <?php echo htmlentities($result->Recommendations);?></h6>
                        <br><br>
                        <div class="selectroom-info animated wow fadeInUp animated" data-wow-duration="1200ms" data-wow-delay="500ms" style="visibility: visible; animation-duration: 1200ms; animation-delay: 500ms; animation-name: fadeInUp; margin-top: -70px">
                            <ul
                            <ul class="fa-plus-square-o">
                                <label class="inputLabel">Reviews</label>
                                <input class="special" type="text" name="comment" required="">
                            </ul>
                            <?php if($_SESSION['login'])
                            {?>
                                <ul class="spe" align="center">
                                    <button type="submit" name="submit2" class="btn-primary btn">    Review   </button>
                                </ul>



                              <p><?php echo htmlentities($result->UserEmail);?></p>
                              <p><?php echo htmlentities($result->Description);?></p>


                            <?php } else {?>
                                <li class="sigi" align="center" style="margin-top: 1%">
                                    <a href="#" data-toggle="modal" data-target="#myModal4" class="btn-primary btn" >Sign-in to Review</a></li>
                            <?php } ?>
                            <div class="clearfix"></div>

                            <h4><?php echo htmlentities($result->Description);?></h4>


                            <ul>
                        </div>

                    </div>
            </form>
            <div class="col-md-3 room-right wow fadeInRight animated" data-wow-delay=".5s">
                <?php if($_SESSION['like']==$result->id) : ?>

                    <form action="dislikes.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $result->id;?>">
                        <input type="hidden" name="dislikes" value="<?php echo $result->dislikes;?>">
                        <button type="submit" class="fa fa-thumbs-down" name="dislike">Dislike&nbsp;<?php echo htmlentities($result->dislikes);?></button>
                    </form>

                <?php else : ?>
                    <form action="likes.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $result->id;?>">
                        <input type="hidden" name="likes" value="<?php echo $result->likes;?>">
                        <button type="submit" class="fa fa-thumbs-up" name="like">Like&nbsp;</button>
                    </form>
                <?php endif; ?>

                <p>Likes: <?php echo htmlentities($result->likes);?></p>







                <br><br>


            </div>
            <div class="clearfix"></div>
        </div>

        <?php }} ?>



    </div>
</div>
</div>
<!--- /rooms ---->

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
<!-- //write us -->
</body>
</html>