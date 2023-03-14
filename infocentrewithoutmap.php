<?php
session_start();
error_reporting(0);
include('includes/config.php');
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Info centre</title>
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

<div class="banner-3">
	<div class="container">
		<h1 class="wow zoomIn animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: zoomIn;"><b>Information Center<b></h1>
	</div>
</div>
<!--- rooms ---->
<div class="rooms">
	<div class="container">
		
		<div class="room-bottom">
			


<br></br>
<form class="form-inline" action="infocentrewithoutmap.php" method="post"  >
<input type="text" name="valueToSearch" placeholder="Search by Location..">
<button type="submit" name="search" value="Search Record.." id="submit">
<i class="fa fa-search"></i>
     </button>

</form>
<?php 
if(isset($_POST['search'])){
    $searchVal = $_POST['valueToSearch'];
    if($searchVal != ''){
        $sql = "SELECT * from `blogplaces` WHERE `Place` LIKE '%$searchVal%' OR `Location` LIKE '%$searchVal%' OR `Description` LIKE '%$searchVal%'";
    } else{
        $sql = "SELECT * from blogplaces ";
    }
}else{
	$sql = "SELECT * from blogplaces ";
}
$query = $dbh->prepare($sql);
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
				<h2><?php echo htmlentities($result->Place);?></h2>
				<p><b>Location :</b> <?php echo htmlentities($result->Location);?></p>
						<div class="clearfix"></div>
			</div>
				<p style="padding-top: 1%"><?php echo htmlentities($result->Description);?> </p>	
				<div class="clearfix"></div>
		</div>
	
		</form>








<?php }} ?>
			
	
		
		</div>
	</div>
</div>
<!--- /rooms ---->
<!--- Map ---->



		<!--- Map---->	
<!--- /footer-top ---->

<!-- signup -->
<?php include('includes/signup.php');?>			
<!-- //signu -->
<!-- signin -->
<?php include('includes/signin.php');?>			
<!-- //signin -->
<!-- write us -->
<?php include('includes/write-us.php');?>
<?php include('includes/footer.php');?>		
</body>
</html>