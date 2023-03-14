<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit1']))
{
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $feedback=$_POST['feedback'];
    $peoplenum=$_POST['peoplenum'];
    $numdays=$_POST['numdays'];
    $travelcost=$_POST['travelcost'];
    $locationname=$_POST['locationname'];
    $topic=$_POST['topic'];
    $destinations=$_POST['destinations'];
    $forumimage=$_POST['forumimage'];
    $recommendations=$_POST['recommendations'];
    $likes=$_POST['likes'];
    $dislikes=$_POST['dislikes'];



    $sql="INSERT INTO  tblenquiry(FullName,EmailId,FeedBack,PeopleNum,NumDays,TravelCost,LocationName,Topic,Destinations,forumImage,Recommendations,likes,dislikes) VALUES(:fname,:email,:feedback,:peoplenum,:numdays,:travelcost,:locationname,:topic,:destinations,:forumimage,:recommendations,:likes,:dislikes)";

    $query = $dbh->prepare($sql);
    $query->bindParam(':fname',$fname,PDO::PARAM_STR);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
    $query->bindParam(':feedback',$feedback,PDO::PARAM_STR);
    $query->bindParam(':peoplenum',$peoplenum,PDO::PARAM_STR);
    $query->bindParam(':numdays',$numdays,PDO::PARAM_STR);
    $query->bindParam(':travelcost',$travelcost,PDO::PARAM_STR);
    $query->bindParam(':locationname',$locationname,PDO::PARAM_STR);
    $query->bindParam(':topic',$topic,PDO::PARAM_STR);
    $query->bindParam(':destinations',$destinations,PDO::PARAM_STR);
    $query->bindParam(':forumimage',$forumimage,PDO::PARAM_STR);
    $query->bindParam(':recommendations',$recommendations,PDO::PARAM_STR);
    $query->bindParam(':likes',$likes,PDO::PARAM_STR);
    $query->bindParam(':dislikes',$dislikes,PDO::PARAM_STR);


    $query->execute();


    $lastInsertId = $dbh->lastInsertId();
    if($lastInsertId)
    {
        $msg="Enquiry  Successfully submited";
    }
    else
    {
        $error="Something went wrong. Please try again";
    }

}

?>
<!DOCTYPE HTML>
<html>
<head>
    <title>Add to Forum</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Tourism Management System In PHP" />
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
<!--- /banner-1 ---->
<!--- privacy ---->

<div class="privacy">
    <div class="container">
        <br><br>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="forum.php">Go to Forum</a>&nbsp;<i class="fa fa-angle-right">&nbsp;&nbsp;</i>Add to Forum</li>
        </ol>
<!--        <h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Add to Forum</h3>-->
        <form name="enquiry" method="post">
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php }
            else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
            <p style="width: 350px;">
                <b>Topic</b><input type="text" name="topic" class="form-control" id="topic" placeholder="Enter the topic of the post" required="">
            </p>

            <p style="width: 350px;">
                <b>Location</b>  <input type="text" name="locationname" class="form-control" id="locationname" maxlength="10" placeholder="Enter the Location" required="">
            </p>

            <p style="width: 350px;">
                <b>Destinations</b>  <input type="text" name="destinations" class="form-control" id="destinations" maxlength="10" placeholder="Enter the destinations visited" required="">
            </p>

            <p style="width: 350px;">
                <b>No.of Days</b>  <input type="number" name="numdays" class="form-control" id="numdays" maxlength="10" placeholder="No.of days spent" required="">
            </p>

            <p style="width: 350px;">
                <b>No.of Adults</b>  <input type="number" name="peoplenum" class="form-control" id="peoplenum" maxlength="10" placeholder="No.of Adults went" required="">
            </p>


            <p style="width: 350px;">
                <b>Travel Budget</b>  <input type="number" name="travelcost" class="form-control" id="travelcost" maxlength="10" placeholder="Enter the average budget" required="">
            </p>

            <p style="width: 350px;">
                <b>Feedback</b>  <textarea name="feedback" class="form-control" rows="6" cols="50" id="feedback"  placeholder="Enter your feedback about the tour" required=""></textarea>
            </p>

            <p style="width: 350px;">
                <b>Recommendations</b>  <textarea name="recommendations" class="form-control" rows="6" cols="50" id="recommendations"  placeholder="Any Reccomendations?" required=""></textarea>
            </p>

            <p>Details of the owner of the post</p>
            <p style="width: 350px;">
                <b>Name:</b>  <input type="text" name="fname" class="form-control" id="fname"  placeholder="Enter the place" required="">
            </p>
            <p style="width: 350px;">
                <b>Email address:</b>  <input type="text" name="email" class="form-control" id="email"  placeholder="No.of people travelled" required="">
            </p>

            <p style="width: 350px;">
                <button type="submit" name="submit1" class="btn-primary btn">Submit</button>

            </p>

        </form>


    </div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
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