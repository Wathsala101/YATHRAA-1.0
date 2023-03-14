<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>YATHRAA | Tourist Guides</title>
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
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><b>Tourist Guides<b></h1>
	</div>
</div>
<!--- /banner ---->
<!--- rooms ---->
<div class="rooms">
	<div class="container">
		
		<div class="room-bottom">
			<h3>Explore Tourist Guides</h3>
            <form class="form-inline" action="tourist-guide.php" method="post"  >
                <input type="text" name="valueToSearch" placeholder="Search by Location..">
                <button type="submit" name="search" value="Search Record.." id="submit">
                    <i class="fa fa-search"></i>
                </button>

            </form>
            <div class="nav-right flex-div">
                <br></br>
            </div>
					
<?php

if(isset($_POST['search'])){
    $searchVal = $_POST['valueToSearch'];
    if($searchVal != ''){
        $sql = "SELECT * from `touristguide` WHERE `city` LIKE '%$searchVal%' OR `guidename` LIKE '%$searchVal%'";
    } else{
        $sql = "SELECT * from touristguide";
    }
}else{
    $sql = "SELECT * from touristguide";
}
$query = $dbh->prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{	?>
			<div class="rom-btm">
				<div class="col-md-3 room-left wow fadeInLeft animated" data-wow-delay=".5s">
					<img src="images/guide.png" class="img-responsive" alt="">
                    <p style="font-size:15px; color: black;"><?php echo htmlentities($result->guidename);?></p>
                    <p style="font-size:10px; color: red;"><?php echo htmlentities($result->city);?></p>
                    <p style="font-size:10px;">Contact: <?php echo htmlentities($result->contact);?></p>
                    <p style="font-size:10px;"><a href="https://mail.google.com/mail/?view=cm&fs=1&to=<?php echo htmlentities($result->email);?>" target="_blank">Email: <?php echo htmlentities($result->email);?></a></p>
                    <p style="color:black; font-size:10px;"><?php echo htmlentities($result->bio);?></p>
                    
<!--					<a href="userblog-details.php?ubid=--><?php //echo htmlentities($result->ubId);?><!--" class="view">See more</a>-->
                    <br></br>
				</div>
			
				
			</div>

<?php }} ?>
			
		
		
		</div>
	</div>
</div>
<!--- /rooms ---->
<br></br>
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
