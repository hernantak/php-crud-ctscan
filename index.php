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
    <link href="css/all.css" rel="stylesheet">
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
    .form-css {
        max-width: 5000px;
        padding: 15px;
        padding-bottom: 130px;
        margin: 0 auto;
    }
    .form-css .form-css-heading{
        margin-bottom: 10px;
        text-align: center;
    }
    .form-css .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
    }
    .form-css .form-control:focus {
        z-index: 2;
    }
    .btn-css {
        background-color: white;
        border-color: currentColor;
        width: 65%;
        height: 140px;
        text-align: center;
    }
    .add-center {
        text-align: -webkit-center;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-css">
            <h3 class="form-css-heading">Distribusi Data Otomatis dan Validasi Hasil Analisis</h2>
            <h3 class="form-css-heading">Data CT Scan</h2>
        </div>
    </div>
    <div class="container">
        <div class="form-css">
            <div class="col-xs-6 add-center">
                <button class="btn-css" onClick="location.href='upload.php'" type="button"><i class="fas fa-upload"></i> UPLOAD DATA</button>
            </div>
            <div class="col-xs-6 add-center">
                <button class="btn-css" onClick="location.href='data.php'" type="button"><i class="fas fa-eye"></i> LIHAT DAN VALIDASI DATA</button>
            </div>
        </div>
    </div>
</body>
</html>
