<?php
/**
 * Created by PhpStorm.
 * User: muhammadanas
 * Date: 10/24/17
 * Time: 11:14 PM
 */
include_once 'dbHandler.php';
$dbHandler = new dbHandler();
        $results = [];
        $results = $dbHandler->getAllEvents();
?>

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
    <div class="container">
        <form action="" id="cost-details" method="post">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Event Code</label>
                        <div class='input-group' id='event-code'>
                            <input type='text' name="eventCode" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Customer Name</label>
                        <div class='input-group' id='customer-name'>
                            <input type='text' name="customer-name" class="form-control"/>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Phone Number</label>
                        <div class='input-group' id='phone-number'>
                            <input type='number' name="phone-number" class="form-control"/>
                        </div>
                    </div>
                </div>
        </form>
        <div class="row">
            <div class="col-md-8 col-md-offset-4">
                <h3>Ordered Items</h3>
            </div>
        </div>
        <div class="table-responsive">
            <table class="js-dynamitable table table-bordered" id="table-events">
                <thead>
                <tr>
                    <th>Event Code <span class="js-sorter-desc glyphicon glyphicon-chevron-down pull-right"></span>
                        <span class="js-sorter-asc glyphicon glyphicon-chevron-up pull-right"></span>
                    </th>
                    <th>Event Name <span class="js-sorter-desc glyphicon glyphicon-chevron-down pull-right"></span>
                        <span class="js-sorter-asc glyphicon glyphicon-chevron-up pull-right"></span></th>
                    <th>Date From <span class="js-sorter-desc glyphicon glyphicon-chevron-down pull-right"></span>
                        <span class="js-sorter-asc glyphicon glyphicon-chevron-up pull-right"></span></th>
                    <th>Date To</th>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Phone Number <span class="js-sorter-desc glyphicon glyphicon-chevron-down pull-right"></span>
                        <span class="js-sorter-asc glyphicon glyphicon-chevron-up pull-right"></span></th>
                    <th>Balance<span class="js-sorter-desc glyphicon glyphicon-chevron-down pull-right"></span>
                        <span class="js-sorter-asc glyphicon glyphicon-chevron-up pull-right"></span></th>
                    <th>Details</th>
                    <th>Recieve</th>
                </tr>
                <tr>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class="js-filter  form-control" type="text" value=""></th>
                    <th><input class=" form-control"  disabled="disabled" value=""></th>
                    <th><input class="form-control" disabled="disabled" value=""></th>
                </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($results as $row) {
                        echo '<tr>';
                        echo '<td class="text-right">'.$row[$dbHandler->eventCode].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventName].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventDateStart].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventDateEnd].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventCode].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventCode].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->eventCode].'</td>';
                        echo '<td class="text-left">'.$row[$dbHandler->balance].'</td>';
                        echo '<td><a href="event_details.php?eventCode='.$row[$dbHandler->eventCode].'" class="btn btn-info"> More Details</a></td>';
                        echo '<td><a href="#time_line" class="btn btn-success" onclick = ""> Recieve</a></td>';
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>

<!-- SideNav Menu -->


<!-- END / PAGE WRAP -->


<!-- LOAD JQUERY -->

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/moment.min.js"></script>
<script src="js/bootstrap-datetimepicker.js"></script>
<script src="js/dynamitable.jquery.min.js"></script>
<script src="js/paging.js"></script>


<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- ANIMATION -->

<script>


    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    $(document).ready(function () {
        $('#table-events').paging({limit: 100});
    });
</script>
