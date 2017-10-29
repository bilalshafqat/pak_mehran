<!DOCTYPE html>

<?php


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
    <section id="good-food" class="good-food section pd">

        <div class="container  ">

            <div class="title-heading text-center">

                <div class="good-food-title style-1 wow fadeInUp" data-wow-delay=".2s">

                    <h2 class="lg text-uppercase">Today Events</h2>

                </div>
            </div>
        </div>
       <div class="event-details">

        <?php
        $dbHandler = new dbHandler();
        $results = [];
        $results = $dbHandler->getTodayScheduleEvents();
        echo '<div class="container">';
        echo '<div class="row">';
        foreach ($results as $row) {

            echo '<div class="col-md-4 col-sm-4 details-amount">';
            echo '<h5>' . $row[$dbHandler->eventName] . '</h5>';
            echo '<div class="row row-bottom row-top">';
            echo '<div class="col-md-6 table-separator-right table-column ">Event Date <i class="fa fa-calendar"></i></div>';
            echo '<div class="col-md-6 table-column">' . $row [$dbHandler->eventDateStart] . '</div>';
            echo '</div>';
            echo '<div class="row row-bottom">';
            echo '<div class="col-md-6 table-separator-right table-column bg-blue"> Booking Code </div>';
            echo '<div class="col-md-6 table-column bg-red">' . $row[$dbHandler->eventCode] . '</div>';
            echo '</div>';
            echo '<div class="">';
            echo '<div class="row row-bottom">';
            echo '<div class="col-md-6 table-separator-right table-column bg-blue">Total Amount: </div>';
            echo '<div class="col-md-6 table-column bg-red"> Balance </div>';
            echo '</div>';
            echo '<div class="row row-bottom">';
            echo '<div class="col-md-6 table-separator-right table-column">' . $row[$dbHandler->totalAmount] . ' </div>';
            echo '<div class="col-md-6 table-column"> ' . $row[$dbHandler->balance] . '  </div>';
            echo '</div>';
            echo '<div class="row">';
            echo '<div class="col-md-6 table-separator-right table-column">';
            echo '<a href="event_details.php?eventCode='.$row[$dbHandler->eventCode].'" class="btn btn-info"> More Details</a>';
            echo '</div>';
            echo '<div class="col-md-6 table-column">';
            echo '<a href="#time_line" class="btn btn-success" onclick = "doFunction(\'<?php echo $xyz; ?>\')"> Recieve</a>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
            echo '</div>';

        }
        echo '</div>';
        echo '</div>';
        ?>
       </div>
        </section>
    <section id="good-food" class="good-food section pd">

        <div class="container  ">

            <div class="title-heading text-center">

                <div class="good-food-title style-1 wow fadeInUp" data-wow-delay=".2s">

                    <h2 class="lg text-uppercase">Upcoming Events</h2>

                </div>
            </div>
        </div>
        <div class="event-details">

            <?php
            $dbHandler = new dbHandler();
            $results = [];
            $results = $dbHandler->getRecentEvents();
            if($results) {
                echo '<div class="container">';
                echo '<div class="row">';
                foreach ($results as $row) {

                    echo '<div class="col-md-4 col-sm-4 details-amount">';
                    echo '<h5>' . $row[$dbHandler->eventName] . '</h5>';
                    echo '<div class="row row-bottom row-top">';
                    echo '<div class="col-md-6 table-separator-right table-column ">Event Date <i class="fa fa-calendar"></i></div>';
                    echo '<div class="col-md-6 table-column">' . $row [$dbHandler->eventDateStart] . '</div>';
                    echo '</div>';
                    echo '<div class="row row-bottom">';
                    echo '<div class="col-md-6 table-separator-right table-column bg-blue"> Booking Code </div>';
                    echo '<div class="col-md-6 table-column bg-red">' . $row[$dbHandler->eventCode] . '</div>';
                    echo '</div>';
                    echo '<div class="">';
                    echo '<div class="row row-bottom">';
                    echo '<div class="col-md-6 table-separator-right table-column bg-blue">Total Amount: </div>';
                    echo '<div class="col-md-6 table-column bg-red"> Balance </div>';
                    echo '</div>';
                    echo '<div class="row row-bottom">';
                    echo '<div class="col-md-6 table-separator-right table-column">' . $row[$dbHandler->totalAmount] . ' </div>';
                    echo '<div class="col-md-6 table-column"> ' . $row[$dbHandler->balance] . '  </div>';
                    echo '</div>';
                    echo '<div class="row">';
                    echo '<div class="col-md-6 table-separator-right table-column">';
                    echo '<a href="event_details.php?eventCode='.$row[$dbHandler->eventCode].'" class="btn btn-info"> More Details</a>';
                    echo '</div>';
                    echo '<div class="col-md-6 table-column">';
                    echo '<button id="myBtn" class="btn btn-success">Recieve</button>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                echo '</div>';
            }else{
                echo '<div class="container">';
                echo '<div class="alert alert-danger">';
                echo '<h5 class="lg title-body text-center">No Upcoming Events</h5>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>
    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Some text in the Modal..</p>
        </div>

    </div>

    <a href="createevent.php" class="event-create-bt"><i class="fa fa-plus-circle fa-5x" aria-hidden="true"></i></a>
</div>
<!-- SideNav Menu -->


<!-- END / PAGE WRAP -->


<!-- LOAD JQUERY -->
<script src="js/jquery.min.js"></script>

<script src="js/popper.min.js"></script>

<script type="text/javascript" src="js/bootstrap.min.js"></script>


<!-- ANIMATION -->

<script>
    $("#menu-toggle").click(function (e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
</script>
<script>
    function doFunction(data){
        //if you have a html tag in the modal that you want to pass the value to you can do this
        $(".data-tag").html(data);
        $("#time_line").modal();
    }
</script>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>


</body>

</html>