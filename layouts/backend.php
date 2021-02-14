<?php
    include "system/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>CTScan</title>

    <!-- Load File CSS Bootstrap  -->
    <link href="<?php echo $base_url.'css/bootstrap.min.css'; ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        min-height: 2000px;
        padding-top: 70px;
    }
    </style>
</head>

<body>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">CTScan</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $base_url.'index.php?page=home'; ?>">Home</a></li>
                    <li><a href="<?php echo $base_url.'index.php?page=data'; ?>">Data</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>Hello, <?php echo $_SESSION['nama'] ?></a></li>
                    <li><a href="<?php echo $base_url.'system/logout.php'; ?>">Logout</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </nav>

    <div class="container">
        <?php include "config.php"; // Load file config.php ?>
    </div>

    <!-- Load file Javascript Bootstrap & jQuery -->
    <script src="<?php echo $base_url.'js/jquery.min.js'; ?>"></script>
    <script src="<?php echo $base_url.'js/bootstrap.min.js'; ?>"></script>
</body>
</html>
