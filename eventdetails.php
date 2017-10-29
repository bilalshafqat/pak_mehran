<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/8/17
 * Time: 10:14 PM
 */
?>
<!DOCTYPE html>

<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/1/17
 * Time: 1:31 PM
 */

session_start();
header("Cache-Control: private, max-age=10800, pre-check=10800");
header("Pragma: private");
header("Expires: " . date(DATE_RFC822,strtotime("+2 day")));
include_once 'dbHandler.php';


?>
<!DOCTYPE html>
<!--[if IE 7 ]>
<html class="ie ie7"> <![endif]-->

<!--[if IE 8 ]>
<html class="ie ie8"> <![endif]-->

<!--[if IE 9 ]>
<html class="ie ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!-->
<html class="" lang="en"> <!--<![endif]-->

<head>

    <meta charset="UTF-8">

    <title>Shaheen Shinwari</title>
    <META NAME="ROBOTS" CONTENT="INDEX, FOLLOW, ARCHIVE"/>

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

    <meta name="PAK Mehran Event Services" content="index, follow"/>

    <meta name="keywords" content=""/>

    <meta name="description" content=""/>

    <!-- CSS LIBRARY -->

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">

    <link rel="stylesheet" href="css/bootstrap-datetimepicker.min.css">


    <!-- AWE FONT -->

    <link rel="stylesheet" type="text/css" href="css/awe-fonts.css">

    <!-- PAGE STYLE -->

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>

    <![endif]-->


    <title>Ambrosia</title>


</head>

<body id="page-top" class="home onepage" data-spy="scroll">
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar-wrapper">
        <ul class="sidebar-nav">
            <li class="sidebar-brand">
                <a href="#">
                    Start Bootstrap
                </a>
            </li>
            <li>
                <a href="#">Dashboard</a>
            </li>
            <li>
                <a href="#">Shortcuts</a>
            </li>
            <li>
                <a href="#">Overview</a>
            </li>
            <li>
                <a href="#">Events</a>
            </li>
            <li>
                <a href="#">About</a>
            </li>
            <li>
                <a href="#">Services</a>
            </li>
            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>
    <!-- /#sidebar-wrapper -->

    <!--navbar-->

    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#menu-toggle" data-activates="slide-out" class="button-collapse toggle-button" id="menu-toggle"><i
                    class="fa fa-bars"></i></a>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <h1>PAK Mehran Event Services</h1>
            </div>
        </div>
    </div>
    <div class="container">


        <div class="row bs-wizard" style="border-bottom:0;">

            <div class="col-xs-3 bs-wizard-step complete">
                <div class="text-center bs-wizard-stepnum">Step 1</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Lorem ipsum dolor sit amet.</div>
            </div>

            <div class="col-xs-3 bs-wizard-step complete"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 2</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Nam mollis tristique erat vel tristique. Aliquam erat volutpat.
                    Mauris et vestibulum nisi. Duis molestie nisl sed scelerisque vestibulum. Nam placerat tristique
                    placerat
                </div>
            </div>

            <div class="col-xs-3 bs-wizard-step active"><!-- complete -->
                <div class="text-center bs-wizard-stepnum">Step 3</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center">Integer semper dolor ac auctor rutrum. Duis porta ipsum vitae mi
                    bibendum bibendum
                </div>
            </div>

            <div class="col-xs-3 bs-wizard-step disabled"><!-- active -->
                <div class="text-center bs-wizard-stepnum">Step 4</div>
                <div class="progress">
                    <div class="progress-bar"></div>
                </div>
                <a href="#" class="bs-wizard-dot"></a>
                <div class="bs-wizard-info text-center"> Curabitur mollis magna at blandit vestibulum. Vestibulum ante
                    ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae
                </div>
            </div>
        </div>

        <form action="eventCostDetails.php" method="post">
            <div class="form-group">
                <label for="eventname1">Event Name</label>
                <label for="eventname1" name="eventName"><?php echo $_POST["eventName"]?></label>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date To:</label>
                        <label name="dateTo"><?php echo $_POST["dateTo"]?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Date From:</label>
                        <label name="dateFrom"><?php echo $_POST['dateFrom']?></label>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="location1">Location</label>
                        <label name="location"><?php echo $_POST["location"]?></label>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h3>Ordered Items</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8 col-md-offset-4">
                    <h3>Items with booking on this date</h3>
                </div>
            </div>
            <?php
            $_SESSION['location'] = $_POST["location"];
            $_SESSION['dateFrom'] = $_POST["dateFrom"];
            $_SESSION['dateTo'] = $_POST["dateTo"];
            $_SESSION['eventName'] = $_POST["eventName"];
            $dbHandler = new dbHandler();
            $results = [];

            $dateFrom = date_create($_POST["dateFrom"]);
            date_add($dateFrom, date_interval_create_from_date_string('-6 hour'));
            $dateFrom = date_format($dateFrom, 'Y-m-d H:i:s');

            $dateTo = date_create($_POST["dateTo"]);
            date_add($dateTo, date_interval_create_from_date_string('6 hour'));
            $dateTo= date_format($dateTo, 'Y-m-d H:i:s');

            $results = $dbHandler->getAllItems($dateFrom, $dateTo);
    
            echo '<div class="row">';
            foreach ($results as $row) {
                echo '<div class = "col-md-3">';
                echo '   <div class="item-box">';
                echo '       <div class="title-head title-heading">'.$row[$dbHandler->name].'</div>';

                $quantityLeft = $dbHandler->getQuantityLeft($dateFrom,$dateTo,$row[$dbHandler->itemCode], $row[$dbHandler->quantity]);
                if(intval($quantityLeft) < 2){
                    echo '        <label class="label label-danger">Inventory left: '.$quantityLeft.'</label>';
                }
                else if (intval($quantityLeft) < 5){
                    echo '        <label class="label label-warning">Inventory left: '.$quantityLeft.'</label>';
                }
                else{
                    echo '        <label class="label label-info">Inventory left: '.$quantityLeft.'</label>';
                }

                echo '        <input type="number" class= "form-control"  name='.$row[$dbHandler->itemCode].' id="itme1" placeholder="0" value="0" min="0">';
                echo '    </div>';
                echo '</div>';
            }
            echo ' </div>';
            ?>
            <input type="submit" class="btn btn-primary btn-group-sm" style="margin-top: 2em; width: 500px;"/>
        </form>


    </div>
</div>
</body>

<!-- SideNav Menu -->


<!-- END / PAGE WRAP -->


<!-- LOAD JQUERY -->

<script type="text/javascript" src="js/jquery-1.8.3.min.js" charset="UTF-8"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- ANIMATION -->

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });