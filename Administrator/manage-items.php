<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
{
    header('location:index.php');
}
else{
    ?>
    <!DOCTYPE HTML>
    <html>
    <head>
        <title>YATHRAA| Admin manage packages</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
        <!-- Bootstrap Core CSS -->
        <link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
        <!-- Custom CSS -->
        <link href="css/style.css" rel='stylesheet' type='text/css' />
        <link rel="stylesheet" href="css/morris.css" type="text/css"/>
        <!-- Graph CSS -->
        <link href="css/font-awesome.css" rel="stylesheet">
        <!-- jQuery -->
        <script src="js/jquery-2.1.4.min.js"></script>
        <!-- //jQuery -->
        <!-- tables -->
        <link rel="stylesheet" type="text/css" href="css/table-style.css" />
        <link rel="stylesheet" type="text/css" href="css/basictable.css" />
        <script type="text/javascript" src="js/jquery.basictable.min.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#table').basictable();

                $('#table-breakpoint').basictable({
                    breakpoint: 768
                });

                $('#table-swap-axis').basictable({
                    swapAxis: true
                });

                $('#table-force-off').basictable({
                    forceResponsive: false
                });

                $('#table-no-resize').basictable({
                    noResize: true
                });

                $('#table-two-axis').basictable();

                $('#table-max-height').basictable({
                    tableWrapper: true
                });
            });
        </script>
        <!-- //tables -->
        <link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
        <link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
        <!-- lined-icons -->
        <link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
        <!-- //lined-icons -->
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Items</li>
            </ol>
            <div class="agile-grids">
                <!-- tables -->

                <div class="agile-tables">
                    <div class="w3l-table-info">
                        <h2>Manage Items</h2>

                        <form class="form-inline" action="manage-items.php" method="post">
                            <input type="text" name="valueToSearch" placeholder="Search by Location..">
                            <button type="submit" name="search" value="Search Record.." id="submit">
                                <i class="fa fa-search"></i>
                            </button>
                            <br>

                        </form>


                        <table id="table">
                            <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Type</th>
                                <th>Provider Details</th>
                                <th>Price</th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php

                            if(isset($_POST['search'])){
                                $searchVal = $_POST['valueToSearch'];
                                if($searchVal != ''){
                                    $sql = "SELECT * from `tblmarket` WHERE `ProductName` LIKE '%$searchVal%' OR `ProductType` LIKE '%$searchVal%'";
                                } else{
                                    $sql = "SELECT * from tblmarket";
                                }
                            }else{
                                $sql = "SELECT * from tblmarket";
                            }


                            $query = $dbh -> prepare($sql);
                            //$query -> bindParam(':city', $city, PDO::PARAM_STR);
                            $query->execute();
                            $results=$query->fetchAll(PDO::FETCH_OBJ);
                            $cnt=1;
                            if($query->rowCount() > 0)
                            {
                                foreach($results as $result)
                                {				?>
                                    <tr>
                                        <td><?php echo htmlentities($result->ProductName);?></td>
                                        <td><?php echo htmlentities($result->ProductType);?></td>
                                        <td><?php echo htmlentities($result->SellerDetails);?></td>
                                        <td><?php echo htmlentities($result->ProductPrice);?></td>

                                        <td>
                                            <?php if($result->Status==1) : ?>
                                                <p>Approved</p>
                                            <?php else : ?>
                                                <form method="post" action="approve-item.php">
                                                    <!--                                            <input type="hidden" name="id" value="--><?php //echo $_POST['id']; ?><!--">-->
                                                    <input type="hidden" name="approve" value="<?php echo $result->ProductId;?>"><button type="submit">Approve</button>
                                                </form>
                                            <?php endif; ?>
                                        </td>

                                        <td>
                                            <form method="post" action="delete-items.php">
                                                <!--                                            <input type="hidden" name="id" value="--><?php //echo $_POST['id']; ?><!--">-->
                                                <input type="hidden" name="delete" value="<?php echo $result->ProductId;?>"><button type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                    <?php $cnt=$cnt+1;} }?>
                            </tbody>
                        </table>
                    </div>
                    </table>


                </div>
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
