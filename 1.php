<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Обработчик времени</title>
    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
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
if (($handle = fopen("data.csv", "r")) !== FALSE) {
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
    $a[$i] = explode(' ', $bigdata[$i][2]);
}

for ($i = 1; $i <= count($bigdata); $i++) {
    $bigdata[$i][2] = $a[$i][0];
    $bigdata[$i][3] = $a[$i][1];
}

for ($i = 1; $i <= count($bigdata); $i++) {
    if ($bigdata[$i][4] == 'Приход') {
        $arr = [
            0 => $bigdata[$i][0],
            1 => $bigdata[$i][1],
            2 => $bigdata[$i][2],
            3 => $bigdata[$i][3],
        ];
    } else {
        $arr = [
            0 => $bigdata[$i][0],
            1 => $bigdata[$i][1],
            2 => $bigdata[$i][2],
            4 => $bigdata[$i][3],
        ];
    }
    $array[$i] = $arr;
}
//echo '<pre>';
//print_r($array);
for ($i = 1; $i <= count($array); $i++) {
    for ($j = 1; $j <= count($array); $j++) {
        if ($array[$i][0] == $array[$j][0] && $array[$i][2] == $array[$j][2]) {
            $array[$i][4] = $array[$j][4];
        }
    }
}

for ($i = 1; $i <= count($array); $i++) {
    if (!isset ($array[$i][3])) {
        unset($array[$i]);
    }
}
//echo '------------------------------------------------------';
//
//echo '<pre>';
//print_r($array);
?>

<div class="table-responsive">
    <table class="table table-bordered table-hover table-striped">
        <thead>
        <tr>
            <th>№id</th>
            <th>ФИО</th>
            <th>Дата</th>
            <th>Время прихода</th>
            <th>Время ухода</th>
            <th>Время работы</th>
            <th>Время работы</th>
        </tr>
        </thead>
        <tbody>
        <?php
        for ($i = 1; $i <= count($array) - 5; $i++) { ?>
            <tr>
                <th><? print_r($array[$i][0]) ?></th>
                <th><? print_r($array[$i][1]) ?></th>
                <th><? print_r($array[$i][2]) ?></th>
                <th><? print_r($array[$i][3]) ?></th>
                <th><? print_r($array[$i][4]) ?></th>
                <th><?
                    $timeIn = explode(':', $array[$i][3]);
                    $tIn = ($timeIn[0] * 60 * 60) + ($timeIn[1] * 60) + ($timeIn[2]);
                    $timeOut = explode(':', $array[$i][4]);
                    $tOut = ($timeOut[0] * 60 * 60) + ($timeOut[1] * 60) + ($timeOut[2]);
                    $timeWork = ($tOut - $tIn);
                    echo gmdate("H:i:s", $timeWork);
                    ?>
                </th>
                <th>
                </th>
            </tr>
        <?php }
        ?>
        </tbody>
    </table>
</div>
</body>
</html>
