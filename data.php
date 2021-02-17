<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CTScan</title>

        <!-- Load File bootstrap.min.css yang ada difolder css -->
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

        <style>
        .align-middle{
            vertical-align: middle !important;
        }
        .menu-css {
            padding-top: 20px;
            padding-bottom: 60px;
        }
        .btn-css {
            background-color: white;
        }
        </style>
    </head>
    <body>
         <div class="menu-css">
            <button onClick="location.href='index.php'" class="btn btn-lg btn-css" type="button"><i class="fas fa-arrow-circle-left"></i> DASHBOARD DATA CTSCAN</button>
        </div>
        <div style="padding: 0 15px;">
            <div id="view"><?php include "view.php"; ?></div>
        </div>

        <!-- Load File jquery.min.js yang ada difolder js -->
        <script src="js/jquery.min.js"></script>
        <!-- Load File bootstrap.min.js yang ada difolder js -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Load file ajax.js yang ada di folder js -->
        <script src="js/ajax.js"></script>
    </body>
</html>

