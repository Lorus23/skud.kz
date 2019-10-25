<?php


class Timer
{
    public static function getTime()
    {
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
        return $bigdata;
    }

    public static function getCount()
    {
    }

}