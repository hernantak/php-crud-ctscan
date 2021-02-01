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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    body {
        background-color: #eee;
    }

    .form-signin {
        max-width: 500px;
        padding: 15px;
        margin: 0 auto;
    }
    .form-signin .form-signin-heading{
        margin-bottom: 10px;
        text-align: center;
    }
    .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-signin .form-control:focus {
        z-index: 2;
    }
    .btn-block {
        display: block;
        width: 25%;
    }
    .btn-cnter-css {
        text-align: -webkit-center;
    }
    .menu-css {
        padding-top: 20px;
        padding-bottom: 60px;
    }
    </style>
</head>
<body>
    <div class="menu-css">
        <button class="btn btn-lg btn-block" type="submit"><i class="fas fa-arrow-circle-left"></i> EDIT DATASET</button>
    </div>

    <div class="container">
        <div class="form-signin">

            <form method="post" action="system/login.php">
                <div class="form-group">
                    <label>NAMA DATASET</label>
                    <input type="text" class="form-control" name="username" required autofocus>
                </div>
                <div class="form-group">
                    <label>NOMOR REKAM MEDIS</label>
                    <input type="password" class="form-control" name="password" required>
                </div>
            </form>

        </div>

    </div>

    <div class="btn-cnter-css">
      <button class="btn btn-lg btn-primary btn-block" type="submit">SIMPAN</button>  
    </div>

</body>
</html>
