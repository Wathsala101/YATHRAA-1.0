<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_POST['submit']))
{
$destination=$_POST['destination'];
$location=$_POST['location'];
$significance=$_POST['significance'];
$description=$_POST['description'];
$about=$_POST['about'];
$about1=$_POST['about1'];
$about2=$_POST['about2'];
$specialfacts=$_POST['specialfacts'];
$image=$_FILES["image"]["name"];
move_uploaded_file($_FILES["image"]["tmp_name"],"pacakgeimages/".$_FILES["image"]["name"]);

$sql="INSERT INTO tbldiscover(Destination,Location,Significance,Description,About,About1,About2,SpecialFacts,Image) VALUES(:destination,:location,:significance,:description,:about,:about1,:about2,:specialfacts,:image)";
$query = $dbh->prepare($sql);
$query->bindParam(':destination',$destination,PDO::PARAM_STR);
$query->bindParam(':location',$location,PDO::PARAM_STR);
$query->bindParam(':significance',$significance,PDO::PARAM_STR);
$query->bindParam(':description',$description,PDO::PARAM_STR);
$query->bindParam(':about',$about,PDO::PARAM_STR);
$query->bindParam(':about1',$about1,PDO::PARAM_STR);
$query->bindParam(':about2',$about2,PDO::PARAM_STR);
$query->bindParam(':specialfacts',$specialfacts,PDO::PARAM_STR);
$query->bindParam(':image',$image,PDO::PARAM_STR);
$query->execute();

$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Package Created Successfully";
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
<title>YATHRAA | Admin Create Place</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
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
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
              <!--header start here-->
<?php include('includes/header.php');?>
							
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
	<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="create-place.php">Home</a><i class="fa fa-angle-right"></i>Add Destination</li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Add Destination</h3>
  	        	  <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Destination</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="destination" id="destination" placeholder="Enter the destination" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="location" id="location" placeholder="Enter the location" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Significance</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="significance" id="significance" placeholder="Explain the significance briefly" required>
									</div>
								</div>

<div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Description</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="description" id="description" placeholder="Describe about the destination" required>
                                    </div>
                                </div>

<div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">More About the Destination</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="about" id="about" placeholder="what can we do?" required>
                                        <input type="text" class="form-control1" name="about1" id="about1" placeholder="what can we do?" >
                                        <input type="text" class="form-control1" name="about2" id="about2" placeholder="what can we do?" >
                                    </div>
                                </div>

<div class="form-group">
                                    <label for="focusedinput" class="col-sm-2 control-label">Special Facts</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control1" name="specialfacts" id="specialfacts" placeholder="Any special facts" required>

                                    </div>
                                </div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Image</label>
									<div class="col-sm-8">
										<input type="file" name="image" id="image" required>
									</div>
								</div>	

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<button type="submit" name="submit" class="btn-primary btn">Submit</button>

				<button type="reset" class="btn-inverse btn">Reset</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
					<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
<?php } ?>