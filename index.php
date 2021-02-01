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
        padding-top: 40px;
        padding-bottom: 40px;
    }

    .form-signin {
        max-width: 5000px;
        padding: 15px;
        padding-bottom: 130px;
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
        width: 50%;
        height: 140px;
    }
    .add-center {
        text-align: -webkit-center;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-signin">
            <h3 class="form-signin-heading">Distribusi Data Otomatis dan Validasi Hasil Analisis</h2>
            <h3 class="form-signin-heading">Data CT Scan</h2>
        </div>
    </div>
    <div class="col-xs-6 add-center">
        <button onClick="location.href='upload.php'" class="btn btn-default btn-lg btn-block" type="button"><i class="fas fa-upload"></i> UPLOAD DATA</button>
    </div>
    <div class="col-xs-6 add-center">
        <button onClick="location.href='data.php'" class="btn btn-default btn-lg btn-block" type="button"><i class="fas fa-eye"></i> LIHAT DAN VALIDASI DATA</button>
    </div>
</body>
</html>
