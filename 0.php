<!DOCTYPE html>
<html lang="ru">
<head>
    <title>Обработчик рабочеговремени</title>
    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<?php
$row = 0;
if (($handle = fopen("spisok.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        $data = str_replace(PHP_EOL, ' ', $data);
        $num = count($data);
        for ($c = 0; $c < $num; $c++) {
            $bigdata[$row][$c] = $data[$c];
            if ($c == 4) {
                $a[$i] = explode(':', $bigdata[$row][4]);
                $h = $a[$i][0];
                $m = $a[$i][1];
                $bigdata[$row][4] = $h * 60 * 60 + $m * 60;
            }
        }
        $row++;
    }
    fclose($handle);
}
/*------------------------------------------------------*/

function get_data1($bigdata, $id_client)
{
    $arr_date = array();
    $sum = 0;
    $return_data = array();
    for ($x = 0; $x < count($bigdata); $x++) {
        if ($bigdata[$x][0] == $id_client) {

            if ($bigdata[$x][1]) {
                $return_data['fio'] = $bigdata[$x][1];
            }
            $date1 = '';
            $date1 = $bigdata[$x][2];
            $date1 = explode(".", $date1);
            $date1 = $date1[1] . '.' . $date1[0] . '.' . $date1[2];

            $arr_date[] = strtotime($date1);
            if (ceil($bigdata[$x][4]) > 0) {
                $sum = $sum + ceil($bigdata[$x][4]);
            }
        }
    }
    $min_date = date("d.m.Y", min($arr_date));
    $max_date = date("d.m.Y", max($arr_date));
//    $sum = $sum / 60 / 60;

    $sec = $sum % 60;
    $sum = floor($sum / 60);
    $min = $sum % 60;
    $sum = floor($sum / 60);

    $return_data['min_date'] = $min_date;
    $return_data['max_date'] = $max_date;
    $return_data['sum'] = $sum;
    $return_data['min'] = $min;
    $return_data['sec'] = $sec;
    return $return_data;
}


$idd_array = array();
for ($x = 0; $x < count($bigdata); $x++) {
    if (ceil(trim($bigdata[$x][0])) > 0) {
        $idd_array[$x] = ceil(trim($bigdata[$x][0]));
    }
}
$idd_array = array_unique(array_values($idd_array));


echo '<div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                            <tr>
                                <th>ФИО</th>
                                <th>Диапазон дат:</th>
                                <th>Общее время работы в ч:м:с</th>
                            </tr>
                            </thead>
                            <tbody>';

foreach ($idd_array as $id_client) {
    $rez = get_data1($bigdata, $id_client);
    ?>
    <tr>
        <th><?php echo $rez["fio"] ?></th>
        <th><?php echo $rez["min_date"] . ' - ' . $rez["max_date"] ?></th>
        <th><?php echo $rez["sum"].'ч: '.$rez["min"].'мин: '.$rez["sec"].'сек'; ?></th>
    </tr>
<?php } ?>

</tbody>
</table>
</div>
</div>
<a href="index.php" class="btn btn-primary">Посчитать одного сотрудника</a>
