  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Zingage | Scan</title>
    <!-- Bootstrap latest compiled and minified CSS -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/css/bootstrap.min.css"/>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/css/fancy-sidebar.css"/>

  </head>

    <div id="wrapper">
        <!-- Sidebar -->
        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li class="sidebar-brand">
                    <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . $logo_page ?>">
                        <img id="logo" class="img-responsive" src="<?= "/zingage/web/images/" . $logo_img ?>" alt="AEML"/>
                    </a>
                </li>
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">About</a>
                </li>
                <li>
                    <a href="#">Events</a>
                </li>
                <li>
                    <a href="#">Team</a>
                </li>
                <li>
                    <a href="#">Services</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>
        </nav>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                <span class="hamb-top"></span>
    			<span class="hamb-middle"></span>
				<span class="hamb-bottom"></span>
            </button>

        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/components/jquery/jquery.min.js"></script>
<!-- Bootstrap, doit être chargé après JQuery -->
<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>

<script type="text/javascript" src="<?php echo "http://" . $_SERVER['SERVER_NAME'] . "/zingage/" ?>web/js/fancy-sidebar.js"></script>