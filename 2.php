<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Gentallela Alela! | </title>

    <!-- Bootstrap core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="fonts/css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animate.min.css" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/maps/jquery-jvectormap-2.0.3.css" />
    <link href="css/icheck/flat/green.css" rel="stylesheet" />
    <link href="css/floatexamples.css" rel="stylesheet" type="text/css" />

    <script src="js/jquery.min.js"></script>
    <script src="js/nprogress.js"></script>

    <!--[if lt IE 9]>
    <script src="../assets/js/ie8-responsive-file-warning.js"></script>
    <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div class="row">
    <div class="col-lg-12">
        <h2>Загрузить CSV файл</h2>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <label for="exampleInputFile">Загрузите CSV файл</label>
            <input type="file" name="csv">
            <button class="btn btn-default">Загрузить</button>
        </form>
    </div>
</div>

<?php
$row = 1;
if (($handle = fopen("1.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $num = count($data);
        for ($c = 0; $c < $num; $c++) {
            $bigdata[$row][$c] = $data[$c];
        }
        $row++;
    }
    fclose($handle);
}

for ($i = 1; $i <= count($bigdata); $i++) {
    $a[$i] = explode(':', $bigdata[$i][4]);
}

for ($i = 1; $i <= count($bigdata); $i++) {
    $h = $h + $a[$i][0];
    $m = $m + $a[$i][1];
}

$time = $h*60*60+$m*60;

$sec = $time % 60;
$time = floor($time / 60);
$min = $time % 60;
$time = floor($time / 60);

?>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>№id</th>
            <th>ФИО</th>
            <th>Общее время работы в Ч:м</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th><?php echo $bigdata[1][0]?></th>
            <th><?php echo $bigdata[1][1]?></th>
            <th><?php echo $time . ":" . $min . ":" . $sec;?></th>
        </tr>

        </tbody>
    </table>
</div>
</body>
</html>
