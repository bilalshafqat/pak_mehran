<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/15/17
 * Time: 12:10 PM
 */
session_start();
include_once 'dbHandler.php';

// …

    $eventCode = $_SESSION['eventCode'];
    $dbHandler = new dbHandler();
    $results = $dbHandler->getSpecificEventDetails($eventCode);
    foreach ($results as $row) {
        $eventName = $row[$dbHandler->eventName];
        $dateFrom = $row[$dbHandler->eventDateStart];
        $dateTo = $row[$dbHandler->eventDateEnd];
        $eventCode = $row[$dbHandler->eventCode];
//        $location = $row[$dbHandler->location];
        $location = "ABC";
    
}


$discount = $_POST["discount"];
$totalCost = $_POST["total"];
$grossTotal = $_POST["grossTotal"];
$itemsArray = $_SESSION["itemsArray"];
$advance = $_POST["total"];
$balance = $_POST["balance"];

$dbHandler = new dbHandler();

$results = [];
$responseEventBooking = '';
$responseCostBooking = '';
$responseItemBooking = '';

$responseCostBooking = $dbHandler->updateQueryForCostBooking($eventCode, $grossTotal, $discount, $totalCost, $balance, $advance);
$rest = $dbHandler->deleteAllItemsOfBooking($eventCode);
if ($responseCostBooking && $rest) {
    foreach ($itemsArray as $itemObj) {
        $eventCode = $eventCode;
        $itemCode = $itemObj["name"];
        $quantityBooked = $itemObj["quantyBooked"];
        $responseItemBooking = $dbHandler->updateQueryForItemsBooking($eventCode, $itemCode, $quantityBooked);
    }
}
?>


<!DOCTYPE html>
<!--[if IE 7 ]>
<html class="ie ie7"> <![endif]-->

<!--[if IE 8 ]>
<html class="ie ie8"> <![endif]-->

<!--[if IE 9 ]>
<html class="ie ie9"> <![endif]-->

<!--[if (gt IE 9)|!(IE)]><!-->
<html class="" lang="en" xmlns="http://www.w3.org/1999/html"> <!--<![endif]-->

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/css/bootstrap-dialog.min.css"
          rel="stylesheet"/>


    <!-- AWE FONT -->

    <link rel="stylesheet" type="text/css" href="css/awe-fonts.css">

    <!-- PAGE STYLE -->

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <!--[if lt IE 9]>

    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>

    <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.34.7/js/bootstrap-dialog.min.js"></script>
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
                <a href="index.php">Dashboard</a>
            </li>
            <li>
                <a href="items_list.php">Search Items</a>
            </li>
            <li>
                <a href="search_event.php">Search Events</a>
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
    <?php
    if ($responseCostBooking && $responseItemBooking) {
        echo '<div class="alert alert-success"> <strong>Success!</strong>' . $eventCode . ' has been Updated Successfully. 
           <a href="index.php">OK</a> To Print Click <a href="printinvoice.php"></a>
           </div>';
    } else {
        echo '<div class="alert alert-danger"> <strong>Success!</strong> has not been Updated Successfully. 
           <a href="index.php">Back</a>
           </div>';
    }


    ?>
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

